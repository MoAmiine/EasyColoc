<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Invitation;
use App\Models\Membership;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function store(Request $request, Colocation $colocation)
    {
        if (!$this->isOwner($colocation)) {
            abort(403, 'Seul le propriétaire peut inviter des membres.');
        }

        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email n\'est pas valide',
        ]);

        $isAlreadyMember = $colocation->users()
            ->where('email', $validated['email'])
            ->exists();

        if ($isAlreadyMember) {
            return back()->with('error', 'Cette personne est déjà membre de la colocation.');
        }

        $existingInvitation = Invitation::where('colocation_id', $colocation->id)
            ->where('email', $validated['email'])
            ->whereNull('accepted_at')
            ->where('expires_at', '>', now())
            ->first();

        if ($existingInvitation) {
            return back()->with('error', 'Une invitation est déjà en cours pour cet email.');
        }

        $invitation = Invitation::create([
            'colocation_id' => $colocation->id,
            'email' => $validated['email'],
        ]);

        Mail::to($validated['email'])->send(new InvitationMail($invitation));

        return back()->with('success', 'Invitation envoyée à ' . $validated['email'] . ' !');
    }

    public function accept(string $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        if (!$invitation->isValid()) {
            return redirect()->route('login')->with('error', 'Cette invitation a expiré ou a déjà été utilisée.');
        }

        if (!Auth::check()) {
            session(['invitation_token' => $token]);
            return redirect()->route('login')->with('info', 'Connectez-vous ou créez un compte pour rejoindre la colocation.');
        }

        if (Auth::user()->email !== $invitation->email) {
            abort(403, 'Cette invitation ne vous est pas destinée.');
        }

        $hasActiveColocation = Auth::user()->colocations()
            ->whereNull('memberships.left_at')
            ->exists();

        if ($hasActiveColocation) {
            return redirect()->route('dashboard')->with('error', 'Vous avez déjà une colocation active. Quittez-la d\'abord pour rejoindre une nouvelle.');
        }

        $invitation->colocation->users()->attach(Auth::id(), [
            'role' => 'member',
            'joined_at' => now(),
        ]);

        $invitation->update(['accepted_at' => now()]);

        return redirect()->route('colocation.show', $invitation->colocation)
                         ->with('success', 'Vous avez rejoint la colocation ' . $invitation->colocation->name . ' !');
    }

    public function decline(string $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        $invitation->delete();

        return redirect()->route('home')->with('info', 'Invitation refusée.');
    }

    private function isOwner(Colocation $colocation): bool
    {
        return $colocation->users()
            ->where('user_id', Auth::id())
            ->wherePivot('role', 'owner')
            ->exists();
    }
}
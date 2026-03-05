<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Depense;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaiementController extends Controller
{
    public function payer(Request $request, Colocation $colocation, Depense $depense)
    {
        $user = Auth::user();
        
        if ($user->id === $depense->user_id) {
            return back()->with('error', 'Vous ne pouvez pas payer votre propre dépense.');
        }

        $membersCount = $colocation->users()->count();
        $sharePerPerson = $depense->amount / $membersCount;

        $paiement = Paiement::firstOrNew([
            'debtor_id' => $user->id,
            'creditor_id' => $depense->user_id,
            'colocation_id' => $colocation->id,
        ]);

        if ($paiement->is_paid) {
            return back()->with('info', 'Vous avez déjà payé cette part.');
        }

        $paiement->amount = $sharePerPerson;
        $paiement->is_paid = true;
        $paiement->save();

        return back()->with('success', 'Paiement effectué avec succès !');
    }

    public static function hasPaid(User $user, Depense $depense): bool
    {
        return Paiement::where('debtor_id', $user->id)
            ->where('creditor_id', $depense->user_id)
            ->where('colocation_id', $depense->colocation_id)
            ->where('is_paid', true)
            ->exists();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Depense;
use App\Models\Categorie;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepensesController extends Controller
{

    public function show(Colocation $colocation, Depense $depense)
    {
        $this->checkMember($colocation);

        if ($depense->colocation_id !== $colocation->id) {
            abort(404, 'Dépense non trouvée');
        }

        $members = $colocation->users()
            ->whereNull('memberships.left_at')
            ->get();

        $membersCount = $members->count();
        $sharePerPerson = $membersCount > 0 ? $depense->amount / $membersCount : 0;

        $membersData = $members->map(function ($member) use ($depense, $membersCount, $sharePerPerson) {
            $hasPaid = ($member->id === $depense->user_id) 
                ? true 
                : Paiement::where('debtor_id', $member->id)
                    ->where('creditor_id', $depense->user_id)
                    ->where('colocation_id', $depense->colocation_id)
                    ->where('is_paid', true)
                    ->exists();

            return [
                'user' => $member,
                'hasPaid' => $hasPaid,
                'owes' => $hasPaid ? 0 : $sharePerPerson,
                'shouldReceive' => ($member->id === $depense->user_id) 
                    ? $sharePerPerson * ($membersCount - 1)
                    : 0,
            ];
        });

        return view('depenses.show', compact('colocation', 'depense', 'membersData', 'sharePerPerson'));
    }

    public function create(Colocation $colocation)
    {
        $this->checkMember($colocation);

        $members = $colocation->users()
            ->whereNull('memberships.left_at')
            ->get();

        $categories = Categorie::all();

        return view('depenses.create', compact('colocation', 'members', 'categories'));
    }

    public function store(Request $request, Colocation $colocation)
    {
        $this->checkMember($colocation);

        $validated = $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'amount'      => 'required|numeric|min:0.01',
            'category_id' => 'nullable|exists:categories,id',
            'user_id'     => 'required|exists:users,id',
            'spent_at'    => 'required|date|before_or_equal:today',
        ], [
            'title.required' => 'Le titre est obligatoire',
            'title.min'      => 'Le titre doit faire au moins 3 caractères',
            'amount.min'     => 'Le montant doit être supérieur à 0',
            'spent_at.before_or_equal' => 'La date ne peut pas être dans le futur',
        ]);

        $validated['colocation_id'] = $colocation->id;

        Depense::create($validated);

        return redirect()
            ->route('colocation.show', $colocation)
            ->with('success', 'Dépense ajoutée avec succès !');
    }

    public function edit(Colocation $colocation, Depense $depense)
    {
        $this->checkMember($colocation);

        if ($depense->colocation_id !== $colocation->id) {
            abort(404, 'Dépense non trouvée dans cette colocation');
        }

        if ($depense->user_id !== Auth::id() && !$this->isOwner($colocation)) {
            abort(403, 'Vous ne pouvez modifier que vos propres dépenses');
        }

        $members = $colocation->users()->whereNull('memberships.left_at')->get();
        $categories = Categorie::all();

        return view('depenses.edit', compact('colocation', 'depense', 'members', 'categories'));
    }

    public function update(Request $request, Colocation $colocation, Depense $depense)
    {
        $this->checkMember($colocation);

        if ($depense->colocation_id !== $colocation->id) {
            abort(404);
        }

        if ($depense->user_id !== Auth::id() && !$this->isOwner($colocation)) {
            abort(403);
        }

        $validated = $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'amount'      => 'required|numeric|min:0.01',
            'category_id' => 'nullable|exists:categories,id',
            'user_id'     => 'required|exists:users,id',
            'spent_at'    => 'required|date|before_or_equal:today',
        ]);

        $depense->update($validated);

        return redirect()
            ->route('colocation.show', $colocation)
            ->with('success', 'Dépense mise à jour avec succès !');
    }

    public function destroy(Colocation $colocation, Depense $depense)
    {
        $this->checkMember($colocation);

        if ($depense->colocation_id !== $colocation->id) {
            abort(404);
        }

        if ($depense->user_id !== Auth::id() && !$this->isOwner($colocation)) {
            abort(403);
        }

        $depense->delete();

        return redirect()
            ->route('colocation.show', $colocation)
            ->with('success', 'Dépense supprimée avec succès !');
    }

    private function checkMember(Colocation $colocation): void
    {
        $isMember = $colocation->users()
            ->where('user_id', Auth::id())
            ->whereNull('memberships.left_at')
            ->exists();

        if (!$isMember) {
            abort(403, 'Vous n\'êtes pas membre de cette colocation');
        }
    }

    private function isOwner(Colocation $colocation): bool
    {
        return $colocation->users()
            ->where('user_id', Auth::id())
            ->wherePivot('role', 'owner')
            ->exists();
    }
}
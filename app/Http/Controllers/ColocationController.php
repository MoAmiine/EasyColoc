<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreCollocationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Depense;

class ColocationController extends Controller
{
    public function index()
    {
        $colocations = Auth::user()->colocations()->get();
        return view('colocations.index', compact('colocations'));
    }

    public function create()
    {
        return view('colocations.create');
    }

    public function store(Request $request)
    {
        $collocation = Colocation::create([
            'name' => $request->name,
            'description' => $request->description,
            'invite_code' => strtoupper(Str::random(8)),
            'owner_id' => Auth::id(),
        ]);

        $collocation->users()->attach(Auth::id(), [
            'role' => 'owner',
            'joined_at' => now(),
        ]);

        return redirect()->route('colocation.index')
            ->with('success', "Espace '{$collocation->name}' créé avec succès !");
    }


    
        public function show(Colocation $colocation)
    {
        $colocation->load('users');
        return view('colocations.show', compact('colocation'));
    }
    

    public function edit(Colocation $collocation)
    {
        return view('colocations.edit', compact('collocation'));
    }

    public function update(Request $request, Colocation $collocation)
    {

        $collocation->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('colocation.show', $collocation)->with('success', value: "Colocation modifie avec succès !");
    }

    public function destroy(Colocation $colocation)
    {
        $colocation->delete($colocation);
        return redirect()->route('colocation.index');
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


public function showDepenseDetail(Colocation $colocation, Depense $depense)
{
    $this->checkMember($colocation);
    
    if ($depense->colocation_id !== $colocation->id) {
        abort(404);
    }
    
    $members = $colocation->users()
        ->whereNull('memberships.left_at')
        ->get();
    
    $totalMembers = $members->count();
    
    $sharePerPerson = $totalMembers > 0 ? $depense->amount / $totalMembers : 0;
    
    $membersData = $members->map(function ($member) use ($depense, $sharePerPerson, $totalMembers) {
        return [
            'user' => $member,
            'hasPaid' => $depense->user_id === $member->id,
            'owes' => $depense->user_id === $member->id ? 0 : $sharePerPerson,
            'shouldReceive' => $depense->user_id === $member->id ? $sharePerPerson * ($totalMembers - 1) : 0,
        ];
    });
    
    return view('depenses.show', compact('colocation', 'depense', 'membersData', 'sharePerPerson', 'totalMembers'));
}    
}

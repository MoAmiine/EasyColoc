<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreCollocationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    
}

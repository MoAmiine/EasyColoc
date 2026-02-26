<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreCollocationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations = Auth::user()->colocations()->get();
        return view('colocations.index', compact('colocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colocations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $collocation = Colocation::create([
            'name' => $request->name,
            'description' => $request->description,
            'invite_code' => strtoupper(Str::random(8)),
            'owner_id' => Auth::id(),
        ]);

        $collocation->membres()->attach(Auth::id(), [
            'role' => 'owner',
            'joined_at' => now(),
        ]);

        return redirect()->route('colocation.index')
            ->with('success', "Espace '{$collocation->name}' créé avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDepenseRequest;
use App\Models\Depense;

class DepensesController extends Controller
{
    public function index(Colocation $colocation)
{
    $depenses = $colocation->depenses()->with('user')->latest()->get();
    
    $total = $depenses->sum('amount');

    return view('depenses.index', compact('colocation', 'depenses', 'total'));
}
    public function create(Colocation $colocation)
{
    $colocations = Auth::user()->colocations; 
    
    return view('depenses.create', compact('colocations'));
}
    public function store(StoreDepenseRequest $request)
    {
        Depense::create($request->validated());
        dd('test');
        return redirect()->route('depenses.index')
                         ->with('success', 'Dépense ajoutée avec succès !');
    }
}

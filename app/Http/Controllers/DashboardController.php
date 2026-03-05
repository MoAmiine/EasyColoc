<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Depense;

class DashboardController extends Controller
{
public function index()
    {
        $user = Auth::user();

        $colocations = $user->colocations()
            ->wherePivot('left_at', null)
            ->withCount('users')
            ->get();

        $totalDepenses = Depense::where('user_id', $user->id)->sum('amount');

        $reputation = $user->reputation_score;

        return view('dashboard', compact('colocations', 'totalDepenses', 'reputation'));
    }
}
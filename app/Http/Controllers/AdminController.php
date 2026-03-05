<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Colocation;
use App\Models\Depense;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_colocations' => Colocation::count(),
            'total_spent' => Depense::sum('amount'),
            'banned_users' => User::where('is_banned', true)->count(),
        ];

        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.dashboard', compact('stats', 'users'));
    }

public function toggleBan(User $user)
{
    if ($user->id === auth()->id()) {
        return back()->with('error', 'Vous ne pouvez pas vous bannir vous-même.');
    }

    $user->is_banned = !$user->is_banned;
    $user->save();

    return back()->with('success', $user->is_banned ? 'Utilisateur banni.' : 'Utilisateur débanni.');
}
}

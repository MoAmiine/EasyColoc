<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\HttpCache\Store;
use App\Http\Controllers\DepensesController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/colocations', [ColocationController::class, 'index'])->name('colocation.index');
    Route::get('/colocations/create', [ColocationController::class, 'create'])->name('colocation.create');
    Route::post('/colocations/store', [ColocationController::class, 'store'])->name('colocation.store');
    Route::get('/colocations/details/{colocation}', [ColocationController::class, 'show'])->name('colocation.show');
    Route::get('/colocations/{collocation}/edit', [ColocationController::class, 'edit'])->name('colocation.edit');
    Route::put('/colocations/{collocation}/update', [ColocationController::class, 'update'])->name('colocation.update');
    Route::delete('/colocations/{colocation}/delete', [ColocationController::class, 'destroy'])->name('colocation.delete');
});


Route::middleware('auth')->group(function () {

    Route::get('/colocations/{colocation}/depenses/create', [DepensesController::class, 'create'])->name('depenses.create');
    Route::get('/colocations/{colocation}/depenses/create', [DepensesController::class, 'create'])->name('depenses.create');
    Route::post('/colocations/{colocation}/depenses', [DepensesController::class, 'store'])->name('depenses.store');
    Route::get('/colocations/{colocation}/depenses/{depense}/edit', [DepensesController::class, 'edit'])->name('depenses.edit');
    Route::put('/colocations/{colocation}/depenses/{depense}', [DepensesController::class, 'update'])->name('depenses.update');
    Route::delete('/colocations/{colocation}/depenses/{depense}', [DepensesController::class, 'destroy'])->name('depenses.destroy');
    Route::get('/colocations/{colocation}/depenses/{depense}', [ColocationController::class, 'showDepenseDetail'])->name('depenses.show');
    Route::get('/colocations/{colocation}/depenses/{depense}', [DepensesController::class, 'show'])->name('depenses.show'); 
    Route::post('/colocation/{colocation}/quitter', [ColocationController::class, 'quitter'])->name('colocation.quitter');

    });

Route::middleware('auth')->group(function () {
    
Route::post('/colocations/{colocation}/invitations', [InvitationController::class, 'store'])->name('invitations.store');
Route::get('/invitations/{token}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
Route::get('/invitations/{token}/decline', [InvitationController::class, 'decline'])->name('invitations.decline');
});

Route::post('/colocations/{colocation}/depenses/{depense}/payer', [PaiementController::class, 'payer'])
    ->name('paiements.payer')
    ->middleware('auth');



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin/stats', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/users/{user}/toggle-ban', [AdminController::class, 'toggleBan'])->name('admin.users.ban');
});
require __DIR__ . '/auth.php';

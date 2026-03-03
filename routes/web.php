<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\HttpCache\Store;
use App\Http\Controllers\DepensesController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', IsAdmin::class])->name('admin.dashboard');

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

    Route::get('/colocations/{colocation}/depenses', [DepensesController::class, 'index'])->name('depenses.index');;
    Route::get('/colocations/{colocation}/depenses/create', [DepensesController::class, 'create'])->name('depenses.create');;
    Route::post('/colocations/{colocation}/depenses', [DepensesController::class, 'store'])->name('depenses.store');;
    Route::get('/colocations/{colocation}/depenses/{depense}/edit', [DepensesController::class, 'edit'])->name('depenses.edit');;
    Route::put('/colocations/{colocation}/depenses/{depense}', [DepensesController::class, 'update'])->name('depenses.update');;
    Route::delete('/colocations/{colocation}/depenses/{depense}', [DepensesController::class, 'destroy'])->name('depenses.destroy');
});


require __DIR__ . '/auth.php';

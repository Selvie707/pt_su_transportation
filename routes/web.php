<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Mengubah route /dashboard untuk mengambil data kendaraan
Route::get('/dashboard', [KendaraanController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Group route dengan middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::resource('kendaraan', KendaraanController::class);
    Route::delete('kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
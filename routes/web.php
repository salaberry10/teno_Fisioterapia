<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TratamientoController as AdminTratamientoController;
use App\Http\Controllers\Publico\TratamientoController as PublicoTratamientoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('admin/tratamientos', AdminTratamientoController::class)->middleware('auth')->names('admin.tratamientos');

Route::get('/tratamientos', [PublicoTratamientoController::class, 'index'])->name('tratamientos');

require __DIR__.'/auth.php';
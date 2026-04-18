<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TratamientoController as AdminTratamientoController;
use App\Http\Controllers\Admin\SolicitudController as AdminSolicitudController;
use App\Http\Controllers\Publico\TratamientoController as PublicoTratamientoController;
use App\Http\Controllers\Publico\SolicitudController as PublicoSolicitudController;
use App\Http\Controllers\Publico\ContactoController;
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
Route::resource('admin/solicitudes', AdminSolicitudController::class)->middleware('auth')->names('admin.solicitudes');

Route::get('/tratamientos', [PublicoTratamientoController::class, 'index'])->name('tratamientos');
Route::get('/tratamiento/{slug}', [PublicoTratamientoController::class, 'show'])->name('tratamiento.show');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::post('/solicitudes', [PublicoSolicitudController::class, 'store'])->name('solicitud.store');

require __DIR__.'/auth.php';
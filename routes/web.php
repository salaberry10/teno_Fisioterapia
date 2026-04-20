<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TratamientoController as AdminTratamientoController;
use App\Http\Controllers\Admin\SolicitudController as AdminSolicitudController;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Http\Controllers\Admin\CitaControllerAdmin;
use App\Http\Controllers\Publico\TratamientoController as PublicoTratamientoController;
use App\Http\Controllers\Publico\SolicitudController as PublicoSolicitudController;
use App\Http\Controllers\Publico\CitaControllerPublico;
use App\Http\Controllers\Publico\ContactoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin.index');

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
Route::resource('admin/usuarios', UserControllerAdmin::class)->middleware('auth')->names('admin.usuarios');

// Citas - requiere autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/citas/create', [CitaControllerPublico::class, 'create'])->name('citas.create');
    Route::post('/citas', [CitaControllerPublico::class, 'store'])->name('citas.store');
    Route::get('/citas', [CitaControllerPublico::class, 'misCitas'])->name('citas.mis-citas');
    Route::delete('/citas/{cita}', [CitaControllerPublico::class, 'destroy'])->name('citas.destroy');
});

// Admin citas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/citas', [CitaControllerAdmin::class, 'index'])->name('admin.citas.index');
    Route::put('/admin/citas/{cita}', [CitaControllerAdmin::class, 'update'])->name('admin.citas.update');
    Route::delete('/admin/citas/{cita}', [CitaControllerAdmin::class, 'destroy'])->name('admin.citas.destroy');
    Route::get('/admin/horarios', [CitaControllerAdmin::class, 'horarios'])->name('admin.citas.horarios');
    Route::post('/admin/horarios', [CitaControllerAdmin::class, 'actualizarHorarios'])->name('admin.citas.horarios.update');
});

Route::get('/tratamientos', [PublicoTratamientoController::class, 'index'])->name('tratamientos');
Route::get('/tratamiento/{slug}', [PublicoTratamientoController::class, 'show'])->name('tratamiento.show');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::post('/solicitudes', [PublicoSolicitudController::class, 'store'])->name('solicitud.store');

require __DIR__.'/auth.php';
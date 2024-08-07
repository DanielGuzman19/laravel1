<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // rutas para medicamentos
    Route::resource('medicamentos', MedicamentoController::class);

    // rutas para servicios
    Route::resource('servicios', ServicioController::class);

    // rutas para pacientes
    Route::resource('pacientes', PacienteController::class);

    // rutas para citas
    Route::resource('citas', CitaController::class);
});

require __DIR__.'/auth.php';

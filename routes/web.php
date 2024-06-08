<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

use App\Http\Controllers\AgendaController;

Route::get('/agendas/create', [AgendaController::class, 'create'])->name('agendas.create');
Route::post('/agendas/store', [AgendaController::class, 'store'])->name('agendas.store');


#Menu de la parte de arriba

// Route::get('/', [MenuController::class, 'welcome'])->middleware(['auth', 'verified'])->name('welcome');

Route::get('/dashboard', [MenuController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registrarP', [MenuController::class, 'registrarP'])->middleware(['auth', 'verified'])->name('registrarP');

Route::get('/registrarPS', [MenuController::class, 'registrarPS'])->middleware(['auth', 'verified'])->name('registrarPS');

Route::get('/agendarCitaS', [MenuController::class, 'agendarCitaS'])->middleware(['auth', 'verified'])->name('agendarCitaS');

#Pestaña de pacientes

Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');


#citas

Route::get('/cita/agendar',[CitaController::class, 'agendar_cita'])->middleware(['auth', 'verified'])->name('agendar_cita');

Route::get('/cita/agandar', [CitaController::class, 'create'])->name('cita.agendar');

Route::post('/cita', [CitaController::class, 'store'])->name('cita.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

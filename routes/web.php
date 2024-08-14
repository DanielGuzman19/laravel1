<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Models\Cita;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    // array de citas para mostrar en el calendario
    $citas = Cita::all();
    return view('dashboard', ['citas' => $citas]);
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/dashboard', function () {
    // solo es 1 vista, no se necesita hacer un controlador
    $citas = Cita::all()->map(function ($cita) {
        // enviar los datos en json
        return [
            'title' => 'Cita con ' . $cita->paciente->nombre,
            'start' => $cita->fecha,
            'url' => route('citas.show', $cita->id)
        ];
    });

    return view('dashboard', ['citas' => $citas]);
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

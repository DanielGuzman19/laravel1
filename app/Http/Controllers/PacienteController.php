<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Signo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pacientes.index', [
            'pacientes' => DB::table('pacientes')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'edad' => 'required|integer|min:1|max:120',
            'genero' => 'required|string',
            'fecha_nacimiento' => 'required|date'
        ]);

        // guardar el paciente en una variable para poder acceder a su id
        $paciente = Paciente::create($request->all());

        /*Signo::create([
            'paciente_id' => $paciente->id,
            'paciente_id' => null,
            'temperatura' => null,
            'pulso' => null,
            'saturacion_oxigeno' => null,
            'frecuencia_cardiaca' => null,
            'peso' => null,
            'tension_arterial' => null,
        ]);*/

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', [
            'paciente' => $paciente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', [
            'paciente' => $paciente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'edad' => 'required|integer|min:1|max:120',
            'genero' => 'required|string',
            'fecha_nacimiento' => 'required|date'
        ]);

        $paciente->update($request->all());
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index');
    }
}

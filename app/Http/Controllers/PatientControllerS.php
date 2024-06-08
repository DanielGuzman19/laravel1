<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function create()
    {
        return view('secretaria.registrarPS');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'sex' => 'required|string|in:Masculino,Femenino',
            'phone' => 'required|string|max:15',
        ]);

        Patient::create([
            'nombre_completo' => $request->name,
            'fecha_nacimiento' => $request->birthdate,
            'genero' => $request->sex,
            'telefono' => $request->phone,
        ]);

        return redirect()->route('patients.create')->with('success', 'Paciente registrado exitosamente.');
    }
}


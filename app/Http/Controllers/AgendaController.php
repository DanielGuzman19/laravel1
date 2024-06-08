<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Patient;

class AgendaController extends Controller
{
    public function create()
    {
        $pacientes = Patient::all();
        return view('secretaria.agendarCitaS', compact('pacientes'));
    }


    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_paciente_agenda' => 'required|exists:pacientes,id',
            'fecha' => 'required|date',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Crear una nueva agenda
        Agenda::create([
            'id_paciente_agenda' => $validated['id_paciente_agenda'],
            'fecha' => $validated['fecha'],
            'telefono' => $validated['telefono'],
        ]);

        return redirect()->route('agendas.create')->with('success', 'Cita registrada correctamente');
    }
}

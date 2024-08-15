<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medicamento;
use App\Models\Paciente;
use App\Models\Signo;
use App\Models\Tratamiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('citas.index', [
            'citas' => Cita::all(),
            'pacientes' => Paciente::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        return view('citas.create', [
            'pacientes' => $pacientes,
            'medicamentos' => $medicamentos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|integer|exists:pacientes,id',
            'cuenta' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'nullable|string|max:255',
            'pagado' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'motivo' => 'required|string|max:255',
            'retroalimentacion' => 'required|string|max:255',

            // tratamiento
            'medicamento_id' => 'required|array',
            'desc_tratamiento' => 'required|array',
            'cantidad' => 'required|array',
            'fecha_tratamiento' => 'required|array',

            // signos vitales
            'temperatura' => 'required|string|max:255',
            'pulso' => 'required|string|max:255',
            'saturacion_oxigeno' => 'required|string|max:255',
            'frecuencia_cardiaca' => 'required|string|max:255',
            'peso' => 'required|string|max:255',
            'tension_arterial' => 'required|string|max:255',
        ]);

        // en caso de que los checkbox no estén marcados, se les asigna una string
        $pagado = $request->pagado ?? 'No';
        $estado = $request->estado ?? 'Pendiente';
        $factura = $request->factura ?? 'No';

        // arreglos paralelos
        $fechaTratamientos = $request->fecha_tratamiento;
        $descTratamientos = $request->desc_tratamiento;
        $medicamentoIds = $request->medicamento_id;
        $cantidades = $request->cantidad;

        $cita = Cita::create([
            'fecha' => $request->fecha,
            'paciente_id' => $request->paciente_id,
            'cuenta' => $request->cuenta,
            'factura' => $factura,
            'pagado' => $pagado,
            'estado' => $estado,
            'motivo' => $request->motivo,
            'retroalimentacion' => $request->retroalimentacion,
        ]);

        Signo::create([
            'cita_id' => $cita->id,
            'temperatura' => $request->temperatura,
            'pulso' => $request->pulso,
            'saturacion_oxigeno' => $request->saturacion_oxigeno,
            'frecuencia_cardiaca' => $request->frecuencia_cardiaca,
            'peso' => $request->peso,
            'tension_arterial' => $request->tension_arterial,
        ]);

        for ($i = 0; $i < count($fechaTratamientos); $i++) {
            // Solo crear tratamiento si la fecha y descripción no son nulas
            if ($fechaTratamientos[$i] !== null && $descTratamientos[$i] !== null) {
                Tratamiento::create([
                    'cita_id' => $cita->id,
                    'medicamento_id' => $medicamentoIds[$i],
                    'fecha' => $fechaTratamientos[$i],
                    'desc' => $descTratamientos[$i],
                    'cantidad' => $cantidades[$i],
                ]);

                // Actualizar la cantidad del medicamento
                $medicamento = Medicamento::find($medicamentoIds[$i]);
                if ($medicamento) {
                    // validar que la cantidad no quede negativa
                    if ($medicamento->cantidad - $cantidades[$i] >= 0) {
                        $nuevaCantidad = 0;
                        $nuevaCantidad = $medicamento->cantidad - $cantidades[$i];
                        $medicamento->update([
                            'cantidad' => $nuevaCantidad,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $medicamentos = Medicamento::all();
        $signos = Signo::where('cita_id', $cita->id)->first();
        $pacientes = Paciente::all();
        return view('citas.edit', [
            'cita' => $cita,
            'medicamentos' => $medicamentos,
            'signos' => $signos,
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index');
    }
}

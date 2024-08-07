<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medicamento;
use App\Models\Paciente;
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
            'factura' => 'nullable|string',
            'pagado' => 'nullable|string',
            'estado' => 'nullable|string',
            'motivo' => 'required|string|max:255',
            'retroalimentacion' => 'required|string|max:255',

            // tratamiento
            'medicamento_id' => 'required|array',
            'medicamento_id' => 'required|array',
            'desc_tratamiento' => 'required|array',
        ]);

        // en caso de que los checkbox no estén marcados, se les asigna una
        // string
        $pagado = $request->pagado ?? 'No';
        $estado = $request->estado ?? 'Pendiente';
        $factura = $request->factura ?? 'No';

        // arreglos paralelos hehehehe
        $fechaTratamientos = $request->fecha_tratamiento;
        $descTratamientos = $request->desc_tratamiento;
        $medicamentoIds = $request->medicamento_id;

        $cita = Cita::create([
            'fecha' => Carbon::now(),
            'paciente_id' => $request->paciente_id,
            'cuenta' => $request->cuenta,
            'factura' => $factura,
            'pagado' => $pagado,
            'estado' => $estado,
            'motivo' => $request->motivo,
            'retroalimentacion' => $request->retroalimentacion,
        ]);

        for ($i = 0; $i < count($fechaTratamientos); $i++) {
            // Solo crear tratamiento si la fecha y descripción no son nulas
            if ($fechaTratamientos[$i] !== null && $descTratamientos[$i] !== null) {
                Tratamiento::create([
                    'cita_id' => $cita->id,
                    'medicamento_id' => $medicamentoIds[$i],
                    'fecha' => $fechaTratamientos[$i],
                    'desc' => $descTratamientos[$i],
                ]);
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
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $medicamentos = Medicamento::all();
        return view('medicamentos.index', [
            // 'medicamentos' => $medicamentos
            //
            // muestra solo 15 medicamentos
            'medicamentos' => DB::table('medicamentos')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:1'
        ]);

        Medicamento::create($request->all());
        return redirect()->route('medicamentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', ['medicamento' => $medicamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:1'
        ]);

        $medicamento->update($request->all());
        return redirect()->route('medicamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamentos.index');
    }
}

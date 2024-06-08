<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\User;

class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $usuarioMedico = User::where('tipo', 'doctor')->first(); // Buscar al usuario tipo doctor

        if ($usuarioMedico) {
            Medico::create([
                'nombre' => 'Adrian',
                'telefono' => '8341209557',
                'profesion' => 'Medico General',
                'tipo' => 'Base',
                'id_usuario_medicos' => $usuarioMedico->id,
            ]);
        }
    }
}

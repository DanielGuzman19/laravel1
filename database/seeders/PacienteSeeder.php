<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pacientes')->insert([
            'nombre' => 'Juan',
            'apellidos' => 'Perez',
            'fecha_nacimiento' => '1990-01-01',
            'telefono' => '1234567890',
            'edad' => 31,
            'genero' => 'masculino',
        ]);
        DB::table('pacientes')->insert([
            'nombre' => 'Maria',
            'apellidos' => 'Lopez',
            'fecha_nacimiento' => '1995-01-01',
            'telefono' => '0987654321',
            'edad' => 31,
            'genero' => 'femenino',
        ]);
        DB::table('pacientes')->insert([
            'nombre' => 'Pedro',
            'apellidos' => 'Ramirez',
            'fecha_nacimiento' => '2000-01-01',
            'telefono' => '6789012345',
            'edad' => 31,
            'genero' => 'masculino',
        ]);
    }
}

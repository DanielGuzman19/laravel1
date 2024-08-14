<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicamentos')->insert([
            'nombre' => 'Paracetamol',
            'cantidad' => 100,
            'precio' => 10.5,
        ]);
        DB::table('medicamentos')->insert([
            'nombre' => 'Ibuprofeno',
            'cantidad' => 500,
            'precio' => 15.5,
        ]);
        DB::table('medicamentos')->insert([
            'nombre' => 'Omeprazol',
            'cantidad' => 300,
            'precio' => 20.5,
        ]);
        DB::table('medicamentos')->insert([
            'nombre' => 'Amoxicilina',
            'cantidad' => 200,
            'precio' => 25.5,
        ]);
        DB::table('medicamentos')->insert([
            'nombre' => 'Diclofenaco',
            'cantidad' => 100,
            'precio' => 30.5,
        ]);
    }
}

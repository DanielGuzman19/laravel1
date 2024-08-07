<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // esta tabla solo sirve para guardar los signos vitales de un paciente
        // todos los campos son strings porque solo es información, no se hará
        // ningun cálculo
        Schema::create('signos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->string('temperatura')->nullable();
            $table->string('pulso')->nullable();
            $table->string('saturacion_oxigeno')->nullable();
            $table->string('frecuencia_cardiaca')->nullable();
            $table->string('peso')->nullable();
            $table->string('tension_arterial')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signos');
    }
};

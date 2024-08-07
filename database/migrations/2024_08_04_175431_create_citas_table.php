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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->double('cuenta', 8, 2);
            $table->string('factura');
            $table->string('pagado');
            $table->string('estado');
            $table->string('motivo');
            $table->string('retroalimentacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};

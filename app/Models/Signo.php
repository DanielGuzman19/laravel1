<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'temperatura',
        'pulso',
        'saturacion_oxigeno',
        'frecuencia_cardiaca',
        'peso',
        'tension_arterial',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}

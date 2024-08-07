<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'paciente_id',
        'cuenta',
        'factura',
        'pagado',
        'estado',
        'motivo',
        'retroalimentacion',
    ];

    // relación uno a muchos
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}

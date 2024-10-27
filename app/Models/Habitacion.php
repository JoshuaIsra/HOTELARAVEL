<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitacion';
    protected $fillable = ['precio_noche', 'estado', 'capacidad_personas', 'servicios', 'numero_camas', 'tipo_cama'];
    protected $casts = [
        'servicios' => 'array'
    ];
}

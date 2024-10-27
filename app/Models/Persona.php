<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = ['nombre','apellido','correo','telefono','direccion'];

    public function persona()
    {
        return $this->belongsTo(Persona::class); //nuevo
    }

}

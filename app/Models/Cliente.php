<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Persona
{
    protected $table = 'clientes';
    protected $fillable = ['persona_id', 'estado'];

    public function persona()
    {
        return $this->belongsTo(Persona::class); //nuevo
    }
}

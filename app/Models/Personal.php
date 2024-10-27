<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Persona
{
    
    protected $table = 'personales';
    protected $fillable = ['persona_id',
        'rol', 'turno', 'salario'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Persona
{
    
    protected $table = 'personales';
    protected $fillable = ['persona_id','rol', 'turno', 'salario','type_personal'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}

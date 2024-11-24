<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Limpieza extends Personal
{
    protected $table = 'limpieza';
    protected $fillable = ['persona_id','rol','turno','salario','area'];

    public function personal(){
        return $this->belongsTo(Personal::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{   
    use HasFactory;
   protected $table = "reservas";
   protected $primaryKey = 'id';//idReserva
   protected $fillable = [
    'fecha_reserva',
    'fecha_inicio',
    'fecha_fin',
    'cliente_id',
    'habitacion_id', 
    'estadoreserva',
    'monto_total'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }   

    public function Habitacion(){
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }
    
    public function Factura(){

        return $this->hasOne(Factura::class, 'reserva_id');
    }
}


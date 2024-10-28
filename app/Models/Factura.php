<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $primaryKey = 'idFactura';
    protected $fillable =[
        'reserva_id',
        'fechaEmision',
        'montoTotal',
        'metodoPago',
        'estadoPago'
    ];

    public function reserva(){
        // return $this->belongsTo(Reserva::class, 'reserva_id'); 
        return $this->belongsTo(Reserva::class);
    }

    public function Cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}

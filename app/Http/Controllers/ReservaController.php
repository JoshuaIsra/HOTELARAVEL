<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Response;

class ReservaController extends Controller
{
    public function getReserva(){
        $reserva =Reserva::all();
        return Response::json($reserva);

    }
    public function newReserva(Request $request){
    $reserva = Reserva::create($request->all());
    return Response::json($reserva);
    }

}

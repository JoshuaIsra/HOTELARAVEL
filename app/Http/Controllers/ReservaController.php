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

    public function deleteReserva($id){
        $reserva =Reserva::find($id);

        if(!$reserva){
            return Response::json(['message'=>'Reserva no encontrada'],404);
        }
        $reserva->delete();
        return Response::json(['message'=>'Reserva eliminada'],200);
    }

}

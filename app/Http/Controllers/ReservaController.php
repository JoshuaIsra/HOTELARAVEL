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

    public function updateReserva(Request $request, $id){
        $request->validate([
            'fecha_reserva' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'habitacion_id' => 'required|exists:habitacion,id',
            'estadoReserva' => 'required|string',
        ]);

        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }
        $reserva->update($request->all());
        return response()->json(['success' => 'Reserva actualizada exitosamente', 'reserva' => $reserva], 200);
    
    }

    public function showReserva($id){
        $reserva = Reserva::find($id);
        if(!$reserva){
            return Response::json(['message'=>'Reserva no encontrada'],404);
        }
        return Response::json($reserva);
    }

}

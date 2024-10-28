<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class habitacionController extends Controller
{
    public function gethabitacion()
    {
        $habitacion = Habitacion::whith('cliente')->get();
        if($habitacion->isEmpty()){
            return response()->json(['message'=>'No hay habitaciones registradas'],404);
        }
        return response()->json($habitacion);
        
    }

    public function createhabitacion(Request $request)
    {
        try {
            $habitacion = Habitacion::create($request->all());
            return response()->json($habitacion, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la habitación', 'details' => $e->getMessage()], 400);
        }
    }

    public function updatehabitacion(Request $request, $id)
    {
        try {
            $habitacion = Habitacion::findOrFail($id);
            $habitacion->update($request->all());
            return response()->json($habitacion, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la habitación', 'details' => $e->getMessage()], 400);
        }
    }

    public function deletehabitacion($id)
    {
        try {
            $habitacion = Habitacion::findOrFail($id);
            $habitacion->delete();
            return response()->json(['message' => 'Habitación eliminada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la habitación', 'details' => $e->getMessage()], 400);
        }
    }

    public function showhabitacion($id)
    {
        try {
            $habitacion = Habitacion::findOrFail($id);
            return response()->json($habitacion, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Habitación no encontrada', 'details' => $e->getMessage()], 404);
        }
    }
}

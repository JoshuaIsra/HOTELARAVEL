<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function getFactura(){
    $facturas = Factura::all();
    return response()->json($facturas);

    /*$facturas = Factura::with('cliente')->get();
        return response()->json($facturas);*/
    }

    public function newFactura(Request $request){
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'fechaEmision' => 'required|date',
            'montoTotal' => 'required|numeric',
            'metodoPago' => 'required|string',
            'estadoPago' => 'required|string',
        ]);

        $factura = Factura::create($request->all());
        return response()->json(['success' => 'Factura creada exitosamente', 'factura' => $factura], 201);
    }

    public function updateFactura(Request $request, $id){
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'fechaEmision' => 'required|date',
            'montoTotal' => 'required|numeric',
            'metodoPago' => 'required|string',
            'estadoPago' => 'required|string',
        ]);

        $factura = Factura::find($id);
        $factura->update($request->all());
        return response()->json(['success' => 'Factura actualizada exitosamente', 'factura' => $factura], 200);
    }

    public function deleteFactura($id){
        $factura = Factura::find($id);
        $factura->delete();
        return response()->json(['success' => 'Factura eliminada exitosamente'], 200);
    }

    public function showFactura($id){
        $factura = Factura::find($id);
        return response()->json($factura);
    }
}

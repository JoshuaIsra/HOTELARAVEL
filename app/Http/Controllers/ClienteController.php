<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{   
    public function getcliente(){
        $clientes = Cliente::with('persona')->get();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'persona.nombre' => 'required|string',
                'persona.apellido' => 'required|string',
                'persona.correo' => 'required|string|email',
                'persona.telefono' => 'required|string',
                'persona.direccion' => 'required|string',
                'cliente.estado' => 'required|boolean'
            ]);


            $persona = Persona::create($request->input('persona'));

            // Crear el cliente usando el ID de la persona creada
            $cliente = Cliente::create([
                'persona_id' => $persona->id,
                'estado' => $request->input('cliente.estado')
            ]);

            DB::commit();
            return response()->json($cliente, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al crear el cliente',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function updatecliente(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Validar los datos del request
            $request->validate([
                'persona.nombre' => 'required|string',
                'persona.apellido' => 'required|string',
                'persona.correo' => 'required|string|email',
                'persona.telefono' => 'required|string',
                'persona.direccion' => 'required|string',
                'cliente.estado' => 'required|boolean'
            ]);

            // Encontrar el cliente y la persona asociada
            $cliente = Cliente::findOrFail($id);
            $persona = Persona::findOrFail($cliente->persona_id);

            // Actualizar los datos de la persona
            $persona->update($request->input('persona'));

            // Actualizar los datos del cliente
            $cliente->update($request->input('cliente'));

            DB::commit();
            return response()->json($cliente->load('persona'), 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al actualizar el cliente',
                'details' => $e->getMessage()
            ], 500);
        }
    }


    public function deletecliente($id)
    {
        DB::beginTransaction();
        try {
            $cliente = Cliente::findOrFail($id);

            $cliente->delete();

            DB::commit();
            return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al eliminar el cliente',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    public function showcliente($id){
        try {
            $cliente = Cliente::with('persona')->findOrFail($id);
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Cliente no encontrado',
                'details' => $e->getMessage()
            ], 404);
        }
    }
}




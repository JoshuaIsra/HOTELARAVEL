<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PersonalController extends Controller
{
public function getpersonal(){
    $personal = Personal::with('persona')->get();
    return response()->json($personal);

}
public function store(Request $request){
    DB::beginTransaction();
        try {
            $request->validate([
                'persona.nombre' => 'required|string',
                'persona.apellido' => 'required|string',
                'persona.correo' => 'required|string|email',
                'persona.telefono' => 'required|string',
                'persona.direccion' => 'required|string',
                'personal.rol' => 'required|string',
                'personal.turno' => 'required|string',
                'personal.salario' => 'required|numeric'
            ]);

            // Crear la persona
            $persona = Persona::create($request->input('persona'));

            // Crear el personal usando el ID de la persona creada
            $personal = Personal::create([
                'persona_id' => $persona->id,
                'rol' => $request->input('personal.rol'),
                'turno' => $request->input('personal.turno'),
                'salario' => $request->input('personal.salario')
            ]);

            DB::commit();
            return response()->json($personal, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al crear el personal',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function updatePersonal(Request $request,$id){
        DB::beginTransaction();
        try {
            // Validar los datos del request
            $request->validate([
                'persona.nombre' => 'required|string',
                'persona.apellido' => 'required|string',
                'persona.correo' => 'required|string|email',
                'persona.telefono' => 'required|string',
                'persona.direccion' => 'required|string',
                'personal.rol' => 'required|string',
                'personal.turno' => 'required|string',
                'personal.salario' => 'required|numeric'
            ]);

            // Buscar el personal por ID
            $personal = Personal::find($id);
            $persona = Persona::find($personal->persona_id);
            
            $persona->update($request->input('persona'));

            $personal->update($request->input('personal'));

            DB::commit();
            return response()->json($personal, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al actualizar el personal',
                'details' => $e->getMessage()
            ], 500);
        }
            
    }    
    public function deletePersonal($id){
        DB::beginTransaction();
        try {
            $personal = Personal::find($id);
            $persona = Persona::find($personal->persona_id);
            $personal->delete();
            $persona->delete();
            DB::commit();
            return response()->json(['message' => 'Personal eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al eliminar el personal',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function showPersonal($id){
        $personal = Personal::with('persona')->find($id);
        return response()->json($personal);
    }
    
}



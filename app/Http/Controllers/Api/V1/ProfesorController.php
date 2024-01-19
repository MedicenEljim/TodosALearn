<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Profesores;
use App\Models\Aulas;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $profesores = Profesores::with('aulas')->get();
       return response()->json($profesores, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'Nombre' => ['required', 'string', 'max:20'],
            'Apellidos' => ['required', 'string', 'max:20'],
            'Horario' => ['required', 'date_format:H:i:s'],
            'Cedula' => ['required', 'integer'],
            'ID_aula' => ['required', 'exists:aulas,ID_aula']
        ]);
    
        try { //El try y el catch se utilizan para manejar exepciones(errores que ocurren durante la ejecución de un script)
            $profesor = Profesores::create([
                'Nombre' => $datos['Nombre'], 
                'Apellidos' => $datos['Apellidos'],
                'Horario' => $datos['Horario'],
                'Cedula' => $datos['Cedula'],
                'ID_aula' => $datos['ID_aula'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el profesor', 'message' => $e->getMessage()], 500);
        }
    
        return response()->json(['success' => true, 'message' => 'Profesor creado exitosamente', 'profesor' => $profesor], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profesor = Profesores::with('aulas')->find($id);

        if (!$profesor) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        return response()->json($profesor, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profesor = Profesores::find($id);
    
        if (!$profesor) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }
    
        $datos = $request->validate([
            'Nombre' => ['required', 'string', 'max:20'],
            'Apellidos' => ['required', 'string', 'max:20'],
            'Horario' => ['required', 'date_format:H:i:s'],
            'Cedula' => ['required', 'integer'], 
            'ID_aula' => ['required', 'exists:aulas,ID_aula'],
        ]);
    
        try {
            $profesor->update([
                'Nombre' => $datos['Nombre'],
                'Apellidos' => $datos['Apellidos'],
                'Horario' => $datos['Horario'],
                'Cedula' => $datos['Cedula'],
                'ID_aula' => $datos['ID_aula'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el profesor', 'message' => $e->getMessage()], 500);
        }
    
        return response()->json(['success' => true, 'message' => 'Profesor actualizado con éxito', 'profesor' => $profesor], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profesor = Profesores::find($id);

        if (!$profesor) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        $profesor->delete();
        return response()->json(['success' => true, 'message' => 'Profesor eliminado'], 204);
    }
}

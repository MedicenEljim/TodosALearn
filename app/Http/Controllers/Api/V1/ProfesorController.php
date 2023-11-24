<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Profesores::all(), 200); //200: OK
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
     //Validar los datos de entrada
     $datos = $request->validate([
     'Nombre' => ['required', 'string', 'max:35'],
     'Apellidos' => ['required', 'string', 'max:35'],
     'Horario' => ['required', 'date_format:H:i'],
     'Cedula' => ['required', 'integer'],
     'ID_aula' => ['required', 'integer', 'exists:aula,id'] 
     ]);
    
     //Crear el producto
     $profesores = Profesores::create($datos);
     return response()->json(['success' => true, 'message' => 'profesor creado'], 201);
    //201: Created
     }

    /**
     * Display the specified resource.
     */
    public function show(Profesores $profesores)
    {
        return response()->json($profesores, 200); //200: OK
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesores $profesores)
    {
         //Validar los datos de entrada
 $datos = $request->validate([
    'Nombre' => ['required', 'string', 'max:35'],
    'Apellidos' => ['required', 'string', 'max:35'],
    'Horario' => ['required', 'date_format:H:i'],
    'Cedula' => ['required', 'integer']
    ]);
    //Actualizar el profesor
    $profesores->update($datos);
    return response()->json(['success' => true, 'message' => 'Datos del profesor actualizados'], 200);
   //200: OK
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesores $profesores)
    {
        $profesores->delete();
        return response()->json(['success' => true, 'message' => 'profesor eliminado'], 204);
       //204: No content
    }
}

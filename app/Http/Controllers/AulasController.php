<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aulas = Aulas::all(); 

    return view('aulas.index', compact('aulas')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aulas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'Nombre_del_aula' => 'required|string|max:10', 
        'num_estudiantes' => 'required|integer',
    ]);

    $aula = new Aulas;
    $aula->Nombre_del_aula = $request->Nombre_del_aula; 
    $aula->num_estudiantes = $request->num_estudiantes;

    $aula->save();

    return redirect()->route('aulas.index')->with('success', 'Aula creado con éxito.');
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aula = Aulas::find($id); 
    
        if (!$aula) {
            return redirect()->route('aulas.index')->with('error', 'Aula no encontrada');
        }
    
        return view('aulas.show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aula = Aulas::find($id); 
    
        if (!$aula) {
            return redirect()->route('aulas.index')->with('error', 'Aula no encontrada');
        }
    
        return view('aulas.edit', compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validación de datos
    $request->validate([
        'Nombre_del_aula' => 'required|string|max:10',
        'num_estudiantes' => 'required|integer',
    ]);

    // Buscar el aula por su ID
    $aula = Aulas::find($id);

    if (!$aula) {
        return redirect()->route('aulas.index')->with('error', 'Aula no encontrada');
    }

    // Actualizar los datos del aula
    $aula->Nombre_del_aula = $request->Nombre_del_aula;
    $aula->num_estudiantes = $request->num_estudiantes;
     
    $aula->save();

    return redirect()->route('aulas.index')->with('success', 'Aula actualizada exitosamente');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el aula por su ID
        $aula = Aulas::find($id);
    
        if (!$aula) {
            return redirect()->route('aulas.index')->with('error', 'Aula no encontrada');
        }
    
        // Eliminar el aula de la base de datos
        $aula->delete();
    
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada exitosamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesores::all(); // Recupera todos los registros de profesores
        return view('profesores.index', ['profesores' => $profesores]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validación de datos
    $request->validate([
        'nombre' => 'required',
        'apellidos' => 'required',
        'horario' => 'required',
        
    ]);

    // Crear un nuevo profesor en la base de datos
    Profesores::create([
        'Nombre' => $request->input('nombre'),
        'Apellidos' => $request->input('apellidos'),
        'Horario' => $request->input('horario'),
        
    ]);

    return redirect()->route('profesores.index')->with('success', 'Profesor creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profesor = Profesores::find($id);
    
        if (!$profesor) {
            return redirect()->route('profesores.index')->with('error', 'Profesor no encontrado.');
        }
    
        return view('profesores.show', compact('profesor'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profesor = Profesores::find($id); // Encuentra al profesor por su ID
    
        if (!$profesor) {
            return redirect()->route('profesores.index')->with('error', 'Profesor no encontrado');
        }
    
        return view('profesores.edit', compact('profesor'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:35',
            'apellidos' => 'required|string|max:35',
            'horario' => 'required|date_format:H:i',
           
        ]);
    
        // Buscar al profesor por su ID
        $profesor = Profesores::find($id);
    
        if (!$profesor) {
            return redirect()->route('profesores.index')->with('error', 'Profesor no encontrado');
        }
    
        // Actualizar los datos del profesor
        $profesor->Nombre = $request->nombre;
        $profesor->Apellidos = $request->apellidos;
        $profesor->Horario = $request->horario;
       
    
        // Guardar los cambios en la base de datos
        $profesor->save();
    
        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar al profesor por su ID
        $profesor = Profesores::find($id);
    
        if (!$profesor) {
            return redirect()->route('profesores.index')->with('error', 'Profesor no encontrado');
        }
    
       
        $profesor->delete();
    
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente');
    }
}

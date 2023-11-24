<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use App\Models\Profesores;
use App\Models\ProfesoresAulas;
use Illuminate\Http\Request;

class ProfesoresAulasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesoresAulas = ProfesoresAulas::with('profesores', 'aulas')->get();
        $profesores = Profesores::all();
        $aulas = Aulas::all();

        return view('profesores_aula.index', compact('profesoresAulas', 'profesores', 'aulas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createRelationship(Request $request)
    {
        $request->validate([
            'Profesores_ID' => 'required',
            'ID_aula' => 'required',
        ]);
    
        // Crea una nueva relación entre el profesor y el aula
        $relacion = ProfesoresAulas::create([
            'Profesores_ID' => $request->Profesores_ID,
            'ID_aulas' => $request->ID_aulas,
        ]);
    
        // Agrega un mensaje de depuración
        dd($relacion);
    
        return redirect()->route('profesoresAulas.index')->with('success', 'Relación creada exitosamente');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
       
        $request->validate([
            'Profesores_ID' => 'required',
            'ID_aula' => 'required',
            'ID_profesoresaulas' => 'required', 
        ]);

        // Crea una nueva relación entre el profesor y el aula en la tabla ProfesoresAulas
        ProfesoresAulas::create([
            'Profesores_ID' => $request->Profesores_ID,
            'ID_aula' => $request->ID_aula,
            'ID_profesoresaulas' => $request->ID_profesoresaulas, 
        ]);

        return redirect()->route('profesoresaulas.index')->with('success', 'Profesor agregado al aula exitosamente');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(ProfesoresAulas $profesoresAulas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfesoresAulas $profesoresAulas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfesoresAulas $profesoresAulas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfesoresAulas $profesoresAulas)
    {
        //
    }
}

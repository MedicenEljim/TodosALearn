@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/aulascreate.css') }}">

@section('content')
    <div class="container">
        <h1>Crear Nueva Aula</h1>

       
        <form method="POST" action="{{ route('aulas.store') }}">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre del Aula:</label>
                <input type="text" name="Nombre_del_aula" id="nombre" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="num_estudiantes">Número de Estudiantes:</label>
                <input type="number" name="num_estudiantes" id="num_estudiantes" class="form-control" required>
            </div>

          

            <button type="submit" class="btn btn-primary">Guardar Aula</button>
            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

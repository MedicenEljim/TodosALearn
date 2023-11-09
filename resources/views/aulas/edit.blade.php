@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/aulasedit.css') }}">

@section('content')
    <div class="container">
        <h1>Editar Aula</h1>

        <form method="POST" action="{{ route('aulas.update', $aula->ID_aula) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre del Aula:</label>
                <input type="text" name="Nombre_del_aula" id="Nombre_del_aula" class="form-control" value="{{ $aula->Nombre_del_aula }}" required>
            </div>

            <div class="form-group">
                <label for="num_estudiantes">Número_estudiantes:</label>
                <input type="number" name="num_estudiantes" id="num_estudiantes" class="form-control" value="{{ $aula->num_estudiantes }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Aula</button>
            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

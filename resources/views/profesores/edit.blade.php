@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profesoresedit.css') }}">

@section('content')
    <div class="container">
        <h1>Editar Profesor</h1>

      
        <form method="POST" action="{{ route('profesores.update', $profesor->Profesores_ID) }}">
            @csrf
            @method('PUT') 

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $profesor->Nombre }}" required>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $profesor->Apellidos }}" required>
            </div>

            <div class="form-group">
                <label for="horario">Horario:</label>
                <input type="time" name="horario" id="horario" class="form-control" value="{{ $profesor->Horario }}" required>
            </div>

            <div class="form-group">
                <label for="cedula">Cedula:</label>
                <input type="number" name="cedula" id="cedula" class="form-control" value="{{ $profesor->Cedula }}" required>
            </div>

            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

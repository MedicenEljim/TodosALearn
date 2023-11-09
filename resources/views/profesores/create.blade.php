@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profesorescreate.css') }}">

@section('content')
    <div class="container">
        <h1>Crear Nuevo Profesor</h1>

       
        <form method="POST" action="{{ route('profesores.store') }}">
            @csrf 

            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="horario">Horario:</label>
                <input type="time" name="horario" id="horario" class="form-control" required>
            </div>

           

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('profesores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

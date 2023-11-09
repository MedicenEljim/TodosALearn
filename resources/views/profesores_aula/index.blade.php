@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profesoresaulasindex.css') }}">

@section('content')
<div class="container">
    <h1>Lista de Profesores y Aulas</h1>

    <form method="POST" action="{{ route('profesoresaulas.store') }}">
        @csrf

        <div class="form-group">
            <label for="ID_profesoresaulas">ID de asignación a la relación profesores y aulas:</label>
            <input type="text" name="ID_profesoresaulas" id="ID_profesoresaulas" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id">Selecciona un Profesor:</label>
            <select name="id" id="id" class="form-control">
                @foreach ($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->Nombre }} {{ $profesor->Apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ID_aula">Selecciona un Aula:</label>
            <select name="ID_aula" id="ID_aula" class="form-control">
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->ID_aula }}">{{ $aula->Nombre_del_aula }}</option>
                @endforeach
            </select>
        </div>
    

        <button type="submit" class="btn btn-primary">Agregar Profesor a Aula</button>
    </form>

    @if (count($profesoresAulas) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID_profesoresaulas</th>
                    <th>id</th>
                    <th>ID_aula</th>
                    <th>Nombre del Profesor</th>
                    <th>Apellidos del Profesor</th>
                    <th>Nombre del Aula</th>
                    <th>Num de Estudiantes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesoresAulas as $profesorAula)
                    <tr>
                        <td>{{ $profesorAula->ID_profesoresaulas }}</td>
                        <td>{{ $profesorAula->profesores->id }}</td>
                        <td>{{ $profesorAula->aulas->ID_aula }}</td>
                        <td>{{ $profesorAula->profesores->Nombre }}</td>
                        <td>{{ $profesorAula->profesores->Apellidos }}</td>
                        <td>{{ $profesorAula->aulas->Nombre_del_aula }}</td>
                        <td>{{ $profesorAula->aulas->num_estudiantes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay profesores asignados a aulas.</p>
    @endif
</div>
@endsection

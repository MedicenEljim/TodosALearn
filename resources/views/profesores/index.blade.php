@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profesoresindex.css') }}">

@section('content')
    <div class="container">
        <h1>Lista de Profesores</h1>

        
        <a href="{{ route('profesores.create') }}" class="btn btn-primary mb-3">Nuevo Profesor</a>

        @if (count($profesores) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Profesores_ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Horario</th>
                        <th>Cedula</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->Profesores_ID }}</td>
                            <td>{{ $profesor->Nombre }}</td>
                            <td>{{ $profesor->Apellidos }}</td>
                            <td>{{ $profesor->Horario }}</td>
                            <td>{{ $profesor->Cedula }}</td>
                            <td>
                                <a href="{{ route('profesores.show', $profesor->Profesores_ID) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('profesores.edit', $profesor->Profesores_ID) }}" class="btn btn-primary">Editar</a>

                                <form action="{{ route('profesores.destroy', $profesor->Profesores_ID) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay profesores registrados.</p>
        @endif
    </div>
@endsection

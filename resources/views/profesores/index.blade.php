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
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Horario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->id }}</td>
                            <td>{{ $profesor->Nombre }}</td>
                            <td>{{ $profesor->Apellidos }}</td>
                            <td>{{ $profesor->Horario }}</td>
                            <td>
                                <a href="{{ route('profesores.show', $profesor->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('profesores.edit', $profesor->id) }}" class="btn btn-primary">Editar</a>

                                <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" style="display: inline;">
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

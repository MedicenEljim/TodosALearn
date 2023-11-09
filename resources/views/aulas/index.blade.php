@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/aulasindex.css') }}">

@section('content')
    <div class="container">
        <h1>Lista de Aulas</h1>
        <a href="{{ route('aulas.create') }}" class="btn btn-primary mb-3">Nueva Aula</a>

        @if (count($aulas) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID_aula</th>
                        <th>Nombre_del_aula</th>
                        <th>num_estudiantes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aulas as $aula)
                        <tr>
                            <td>{{ $aula->ID_aula }}</td>
                            <td>{{ $aula->Nombre_del_aula }}</td>
                            <td>{{ $aula->num_estudiantes }}</td>
                            <td>
                                <a href="{{ route('aulas.show', $aula->ID_aula) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('aulas.edit', $aula->ID_aula) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('aulas.destroy', $aula->ID_aula) }}" method="POST" style="display: inline;">
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
            <p>No hay aulas registradas.</p>
        @endif
    </div>
@endsection
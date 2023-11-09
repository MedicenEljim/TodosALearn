@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/aulasshow.css') }}">

@section('content')
    <div class="container">
        <h1>Detalles del Aula</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nombre del Aula: {{ $aula->Nombre_del_aula }}</h4>
                <h4 class="card-text">num de estudiantes: {{ $aula->num_estudiantes }}</h4>
                

                <a href="{{ route('aulas.index') }}" class="btn btn-primary">Volver a la lista de aulas</a>
            </div>
        </div>
    </div>
@endsection

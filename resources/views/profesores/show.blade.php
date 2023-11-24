@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profesoresshow.css') }}">

@section('content')
    <div class="container">
        <h1>Detalles del Profesor</h1>
        

        <div class="card">
            <div class="card-body">
                <p class="card-title">Nombres y Apellidos:{{ $profesor->Nombre }} {{ $profesor->Apellidos }}</p>
                <p class="card-text">Horario: {{ $profesor->Horario }}</p>
                <p class="card-text">Cedula: {{ $profesor->Cedula }}</p>
            </div>
        </div>

        <a href="{{ route('profesores.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection

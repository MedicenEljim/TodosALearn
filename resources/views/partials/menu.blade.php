<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<script src="{{ asset('js/menu.js') }}"></script>

<nav>
    <a id="logo-menu" href="#" class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la aplicación">
    </a>
    <ul class="menu"> 
        <li><a href="{{ route('inicio.index') }}">Inicio</a></li>
        <li><a href="{{ route('profesores.index') }}">Profesores</a></li>
        <li><a href="{{ route('aulas.index') }}">Aulas</a></li>
        <li><a href="{{ route('profesoresaulas.index') }}">Aulas asignadas</a></li>
    </ul>
</nav>

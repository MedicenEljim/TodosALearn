<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos a Learn</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        function mostrarAlerta() {
            alert("Bienvenido Sr./Sra. usuari@. Para navegar en la plataforma, haz clic en el logo.");
        }
    </script>
</head>
<body>
    <header>
        @include('partials.menu')
    </header>

    <button id="importanteBtn" onclick="mostrarAlerta()">Importante</button>

    <div class="container">
        @yield('content') 
    </div>

    <footer>
        <p>Copyright © 2023 - Todos a Learn </p>
    </footer>
</body>
</html>

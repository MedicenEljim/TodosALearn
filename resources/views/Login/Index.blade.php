<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
    <link rel="icon" href="{{ asset('img/icono.png') }}" type="image/png"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
    <title>Inicio de Sesión</title>
</head>
<body>  
    <form action="{{ route('login') }}" method="post" onsubmit="return validateForm()">
        @csrf
        <h1>INICIO DE SESION</h1>
        <hr>         
        @if (isset($error))
            <p class="error">
                {{ $error }}
            </p>
        @endif
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario" required>
        <hr>
        <i class="fa-solid fa-unlock"></i>
        <label>Clave</label>
        <input type="password" name="Clave_Bcrypt" placeholder="Clave" required>

        <button type="submit">Iniciar Sesión</button>
        <a href="{{ route('crearCuenta') }}">Crear cuenta</a>
    </form>

    <script>
        function validateForm() {
            var usuario = document.forms["myForm"]["Usuario"].value;
            var clave = document.forms["myForm"]["Clave_Bcrypt"].value;
            if (usuario == "" || clave == "") {
                alert("Por favor, rellene todos los campos.");
                return false;
            }
        }
    </script>
</body>
</html>

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
    <title>Crear Cuenta</title>
</head>
<body>  
    <form action="{{ route('storeCuenta') }}" method="post" onsubmit="return validateForm()">
        @csrf
        <h1>CREAR CUENTA</h1>
        <hr>         
        @if (session('error'))
            <p class="error">
                {{ session('error') }}
            </p>
        @endif
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario" value="{{ old('Usuario') }}" required>
        <hr>
        <i class="fa-solid fa-unlock"></i>
        <label>Clave</label>
        <input type="password" name="Clave_Bcrypt" placeholder="Clave" required>
        <hr>
        <i class="fa-solid fa-unlock"></i>
        <label>Confirmar Clave</label>
        <input type="password" name="Confirmar_Clave" placeholder="Confirmar Clave" required>
        <label>Nombre completo</label>
        <input type="text" name="Nombre_completo" placeholder="Nombre completo" required>
    
        <button type="submit">Crear Cuenta</button>
        <a href="{{ route('login') }}">Iniciar Sesión</a>
    </form>
    
    <script>
        // Función de validación
        function validateForm() {
            var usuario = document.forms[0]["Usuario"].value;
            var clave = document.forms[0]["Clave_Bcrypt"].value;
            var confirmarClave = document.forms[0]["Confirmar_Clave"].value;
    
            if (usuario === "" || clave === "" || confirmarClave === "") {
                alert("Por favor, rellena todos los campos.");
                return false;
            }
    
            if (clave !== confirmarClave) {
                alert("Las claves no coinciden. Por favor, verifica.");
                return false;
            }
    
            return true;
        }
    </script>
</body>
</html>

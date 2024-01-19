<?php 
    session_start();
    include('Conexión.php');

    if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Usuario = validate($_POST['Usuario']);
        $Clave = validate($_POST['Clave']);

        if (empty('Usuario')) {
           header("location: Index.php?error = Se requiere rellenar el campo de Usuario");
           exit();
        }elseif (empty($Clave)) {
            header("location: Index.php?error = Se requiere rellenar el campo de Clave");
            exit();
        }else{

            //$Clave = md5($Clave);

            $sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' AND Clave= '$Clave'";
            $result = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($result) === 1 ) {
                $row = mysqli_fetch_assoc($result);
                if ($row['Usuario'] === $Usuario &&  $row['Clave'] === $Clave) {
                    $_SESSION['Usuario'] = $row['Usuario'];
                    $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                    $_SESSION['ID'] = $row['ID'];
                    header("Location: Inicio.php ");
                    exit();
                }else {
                    header("Location: Index.php?error= El usuario y la clave son incorrectos");
                    exit();
                }
            }else {
                header("Location: Index.php?error= El usuario y la clave son incorrectos");
                    exit();
            }


        }
    }else {
        header("Location: Index.php");
                    exit();
    }


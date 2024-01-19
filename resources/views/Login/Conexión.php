<?php

    $host = "localhost";
    $User = "root";
    $pass = "";


    $db = "iniciodesesiondb";

    $conexion = mysqli_connect($host, $User, $pass, $db);

    if (!$con) {
        echo "Conexión Fallida";
    }
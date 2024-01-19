<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todosalearn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT ID, Clave FROM usuarios");

while ($row = $result->fetch_assoc()) {
    $bcryptPassword = password_hash($row['Clave'], PASSWORD_BCRYPT);
    $conn->query("UPDATE usuarios SET Clave_Bcrypt = '$bcryptPassword' WHERE ID = " . $row['ID']);
}

$conn->close();

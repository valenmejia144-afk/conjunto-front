<?php

$host = "127.0.0.1";
$usuario = "root";
$contrasena = "root";
$basedatos = "proyecto";

$conexion = mysqli_connect($host, $usuario, $contrasena, $basedatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

echo "Conexión exitosa";

?>
<?php
// Configuración de conexión a la base de datos
$host = "bnezzz1j7fm1kcnkzkpf-mysql.services.clever-cloud.com";
$user = "u0k9oqrrgijpodzx";
$password = "LbrhZXSBSGg0uG6e6Tf7";
$database = "bnezzz1j7fm1kcnkzkpf";
$port = 3306;

$conexion = mysqli_connect($host, $user, $password, $database, $port);

// Verificar la conexión a la base de datos
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
} ?>


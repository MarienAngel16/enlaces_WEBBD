<?php
// Configuración de conexión a la base de datos
$host = "bgfdclelaqlxa6g6zike-mysql.services.clever-cloud.com";
$user = "uvbcw3optec6inwv";
$password = "B8N45VYC7GWktOsJiIEP";
$database = "bgfdclelaqlxa6g6zike";
$port = 3306;

$conexion = mysqli_connect($host, $user, $password, $database, $port);

// Verificar la conexión a la base de datos
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
} ?>





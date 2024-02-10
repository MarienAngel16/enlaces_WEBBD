<?php
/* $servername = "server1242"; */
$username = "u783994482_admin_cute";
$password = "01MundoMediaTv*";
$database = "u783994482_esta_bonita_BD";

$server = "server1242"; // Puedes cambiar esto a la dirección IP o el nombre de dominio de tu servidor MySQL

// Conexión a la base de datos usando MySQLi
$conn = new mysqli("localhost", $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";

// Puedes realizar operaciones en la base de datos aquí

// Cerrar la conexión al final
$conn->close();
?>


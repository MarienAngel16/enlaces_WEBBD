<?php
include_once 'base.php';


// Si se hace clic en el botón
if (isset($_POST['baja_e'])) {
    // Obtiene el valor de $link_enlace
    $link_enlace = $_POST['link_enlace'];
    $clave_contenido = $_POST['clave_contenido'];
    $tipo_enlace = $_POST['tipo_enlace'];

    // Escapa el valor para prevenir inyecciones SQL
    $link_enlace = $mysqli->real_escape_string($link_enlace);
    $clave_contenido = $mysqli->real_escape_string($clave_contenido);
    $tipo_enlace = $mysqli->real_escape_string($tipo_enlace);

    $r = mysqli_query($conexion, "call bajaenlace(' $link_enlace','$tipo_enlace','$clave_contenido')");

}

mysqli_close($conexion);

?>
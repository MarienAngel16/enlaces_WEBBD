<?php
include_once 'base.php';

$consultaContenidos = "SELECT clave, nombre, total FROM contenidos";
$resultadoContenidos = mysqli_query($conexion, $consultaContenidos);

if (mysqli_num_rows($resultadoContenidos) > 0) {
    echo '<div class="btn-group-vertical text-center">';
    while ($filaContenido = mysqli_fetch_assoc($resultadoContenidos)) {
        $claveContenido = $filaContenido['clave'];
        $nombreContenido = $filaContenido['nombre'];
        $total = $filaContenido['total'];

        echo '<a href="funciones/muestra_enlaces.php?clave_en=' . $claveContenido . '" class="btn btn-primary bg-gradient rounded" style="margin: 1px; color: white; font-size: 120%;">' . $claveContenido . ' - ' . $nombreContenido . ' - ' .$total. '</a><br>';
    }
    echo '</div>';
} else {
    echo "No se encontraron contenidos.";
}

if (isset($_GET["clave_en"])) {
    $claveEnlace = mysqli_real_escape_string($conexion, $_GET["clave_en"]);
    
    $consultaEnlaces = "SELECT nombre_en, enlace FROM enlaces WHERE clave='$claveEnlace'";    

    $resultadoEnlaces = mysqli_query($conexion, $consultaEnlaces);

    if (mysqli_num_rows($resultadoEnlaces) > 0) {
        echo '<div class="btn-group-vertical text-center">';
        while ($filaEnlace = mysqli_fetch_assoc($resultadoEnlaces)) {
            $nombreEnlace = $filaEnlace['nombre_en'];
            $linkEnlace = $filaEnlace['enlace'];

            echo '<a href="' . $linkEnlace . '" class="btn btn-primary bg-gradient rounded" style="margin: 1px; color: white; font-size: 120%;">' . $nombreEnlace . '</a><br>';
        }
        echo '</div>';
    } else {
        echo "No se encontraron enlaces.";
    }
}

mysqli_close($conexion);
?>

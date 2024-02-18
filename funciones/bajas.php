<?php
include_once 'base.php';

// Consulta para obtener enlaces dados de baja
$consultaBajas = "SELECT nombre_en, enlace FROM enlaces WHERE activo = 0";
$resultadoBajas = mysqli_query($conexion, $consultaBajas);

if ($resultadoBajas) {
    if (mysqli_num_rows($resultadoBajas) > 0) {
        $enlacesHTML = '<div class="btn-group-vertical text-center">';
        while ($filaBaja = mysqli_fetch_assoc($resultadoBajas)) {
            $nombreBaja = htmlspecialchars($filaBaja['nombre_en']); // Evitar XSS
            $linkBaja = htmlspecialchars($filaBaja['enlace']); // Evitar XSS

            $enlacesHTML .= '<a href="' . $linkBaja . '" class="btn btn-danger bg-gradient rounded" style="margin: 1px; color: white; font-size: 120%;">' . $nombreBaja . '</a><br>';
        }
        $enlacesHTML .= '</div>';
        echo $enlacesHTML;
    } else {
        echo "No se encontraron enlaces dados de baja.";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>

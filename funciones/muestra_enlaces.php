<?php
include_once 'base.php';

$consultaContenidos = "SELECT clave, nombre, total FROM contenidos";
$resultadoContenidos = mysqli_query($conexion, $consultaContenidos);


if (mysqli_num_rows($resultadoContenidos) > 0) {

    echo '<div class="text-center">';
echo '<div style="display: flex; flex-wrap: wrap;">';

while ($filaContenido = mysqli_fetch_assoc($resultadoContenidos)) {
    $claveContenido = $filaContenido['clave'];
    $nombreContenido = $filaContenido['nombre'];
    $total = $filaContenido['total'];

    echo '
    
        <div class="card" style="width: 15rem; background-color:grey;">      
            <div class="card-body">
                <h5 class="card-title">' . $claveContenido . ' - ' . $nombreContenido . ' - ' . $total . '</h5>
                <div class=".text-light muestra_enlaces"> ';


                if ($claveContenido) {                    
                    
                    $consultaEnlaces = "SELECT nombre_en, enlace FROM enlaces WHERE clave='$claveContenido'";    
                
                    $resultadoEnlaces = mysqli_query($conexion, $consultaEnlaces);
                
                    if (mysqli_num_rows($resultadoEnlaces) > 0) {
                        echo '<div class="btn-group-vertical text-center">';
                        while ($filaEnlace = mysqli_fetch_assoc($resultadoEnlaces)) {
                            $nombreEnlace = $filaEnlace['nombre_en'];
                            $linkEnlace = $filaEnlace['enlace'];
                
                            echo '<a href="' . $linkEnlace . '" style="margin: 1px;">' . $nombreEnlace . '</a>
                                  <img src="img/enlace_icono.png" alt=""> 
                            ';
                            
                        }
                        echo '</div>';
                    } else {
                        echo "No se encontraron enlaces.";
                    }
                }


     echo '
                </div>
            </div>
        </div>    
    ';
}

echo '</div>';
echo '</div>';

    
} else {
    echo "No se encontraron contenidos.";
}

mysqli_close($conexion);
?>

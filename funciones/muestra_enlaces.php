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
            <div class="card" style="width: 15rem;">      
                <div class="card-body">
                    <h5 class="card-title">' . $claveContenido . ' - ' . $nombreContenido . ' - ' . $total . '</h5>
                    <div class="muestra_enlaces text-light"> 
        ';

        if ($claveContenido) {                    
            $consultaEnlaces = "SELECT nombre_en, enlace, tipo FROM enlaces WHERE clave='$claveContenido'";    
            $resultadoEnlaces = mysqli_query($conexion, $consultaEnlaces);

            if (mysqli_num_rows($resultadoEnlaces) > 0) {
                echo '<div class="btn-group-vertical text-center">';
                while ($filaEnlace = mysqli_fetch_assoc($resultadoEnlaces)) {
                    $nombreEnlace = $filaEnlace['nombre_en'];
                    $linkEnlace = $filaEnlace['enlace'];
                    $tipoEnlace = $filaEnlace['tipo'];

                    echo '<a href="' . $linkEnlace . '" style="margin: 1px;">' . $nombreEnlace . ' <img style="width:10%;"  src="img/enlace_icono.jpg" alt=""></a>

                          <form action="funciones/muestra_enlaces.php" method="post">   
                              <input type="hidden" name="link_enlace" value="' . $linkEnlace . '">
                              <input type="hidden" name="clave_contenido" value="' . $claveContenido . '">
                              <input type="hidden" name="tipo_enlace" value="' . $tipoEnlace. '">
                              <button class="btn btn-primary" type="submit" name="ejecutar_procedimiento_bajas">Borrar</button>
                          </form>
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
        </div>';
    }

    echo '</div>';
    echo '</div>';
    echo '<script>
            document.querySelectorAll(".card").forEach(function(card) {
                card.addEventListener("mouseenter", function() {
                    card.querySelector(".muestra_enlaces").classList.add("mostrar");
                });

                card.addEventListener("mouseleave", function() {
                    card.querySelector(".muestra_enlaces").classList.remove("mostrar");
                });
            });
          </script>';
} else {
    echo "No se encontraron contenidos.";
}




// Si se hace clic en el botón
if (isset($_POST['ejecutar_procedimiento_bajas'])) {
    // Obtiene el valor de $link_enlace
    $link_enlace = $_POST['link_enlace'];
    $clave_contenido = $_POST['clave_contenido'];
    $tipo_enlace = $_POST['tipo_enlace'];


    $r = mysqli_query($conexion, "call bajaenlace('$link_enlace','$tipo_enlace','$clave_contenido')");

    if ($r) {
        echo "Procedimiento almacenado ejecutado con éxito.";
    } else {
        echo "Error al ejecutar el procedimiento almacenado: " . $mysqli->error;
    }
}






mysqli_close($conexion);
?>

<?php
            include_once 'base.php'; 

            if(isset($_GET["clave_en"])){

                $clave=mysqli_real_escape_string($conexion,$_GET["clave_en"]);   
                
                $consulta = "SELECT nombre_en, enlace FROM enlaces WHERE clave='$clave'";
                $resultado = mysqli_query($conexion, $consulta);            
                

            if (mysqli_num_rows($resultado)> 0) {
                echo '<div class="btn-group-vertical text-center">';
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $nombre = $fila['nombre_en'];
                    $link = $fila['enlace'];

                    echo '<a href="' . $link . '" class="btn btn-primary bg-gradient rounded" style="margin: 1px; color: white; font-size: 120%;">' . $nombre . '</a><br>';
                }
                echo '</div>';
            } else {
                echo "No se encontraron enlaces.";
            }

            mysqli_close($conexion);  }
?>
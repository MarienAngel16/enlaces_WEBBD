<!--   CONEXIÓN CON LA BASE DE DATOS -->
<?php include_once 'base.php';

/* 
<!-- GENERADO DE ARREGLO PARA CLAVES --> */

// Realizar una consulta para obtener los valores de la columna Grupo_id
$consulta = mysqli_query($conexion, "SELECT clave FROM contenidos");

// Crear un arreglo para almacenar los valores de clave y nombre
$claves = array();

// Llenar el arreglo con los valores de la consulta
while ($fila = mysqli_fetch_assoc($consulta)) {
    $claves[] = $fila['clave'];
}

// Cerrar la consulta
mysqli_free_result($consulta); ?>

<html>   
<div class="container">
    <form style="margin:50px;" action="funciones/alta_enlaces.php" method="get">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">

                        <div class="form-group">
                            <label for="clave_e">Clave</label>
                         <select name="clave_e" id="cl" class="form-control" required="required">
                            <option value="" disabled selected>seleccione clave</option>
                            <?php
                            // Iterar sobre el arreglo $grupos y generar las opciones
                            foreach ($claves as $clave) {
                            echo '<option value="' . $clave . '">' . $clave . '</option>'; } 
                            ?>
                         </select>                            
                        </div>

                        <div class="form-group">
                            <label for="nombre_e">Nombre</label>
                            <input type="text" name="nombre_e" id="nom" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo_e" id="tip" class="form-control" required="required">
                        <option value="" disabled selected>Seleccione tipo</option>
                        <option value="Música">Música</option>
                        <option value="Educativo">Educativo</option>
                        <option value="Educativo">Historia</option>
                        <option value="Educativo">Curiosidades</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="ap">Enlaces</label>
                            <input type="text" name="link_e" id="en" class="form-control" required="required">
                        </div>

                        <div class="text-center">
                            <input style="margin:20px;"  class="btn btn-primary" type="submit" value="Guardar Registro">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once 'base.php';

if(isset($_GET["clave_e"])){

    $clave=mysqli_real_escape_string($conexion,$_GET["clave_e"]);
    $nombre=mysqli_real_escape_string($conexion,$_GET["nombre_e"]);
    $tipo=mysqli_real_escape_string($conexion,$_GET["tipo_e"]);
    $link=mysqli_real_escape_string($conexion,$_GET["link_e"]);

$r = mysqli_query($conexion, "call unregistro('$tipo','$clave','$nombre','$link')"); 


if ($r)
{
    echo "<script>alert('Guardado Correctamente');</script>";
}else
{
    echo "<script>alert('No se pudo guardar');</script>";
    }   
    
    mysqli_close($conexion);

}
?>

</html>

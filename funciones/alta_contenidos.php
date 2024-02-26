<?php include_once 'base.php'; ?>

<html>   
<div class="container">
    <form style="margin:50px;" action="funciones/alta_contenidos.php" method="get">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="curp">Clave</label>
                            <input type="text" name="clave_cont" id="clave" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="nom">Nombre (s)</label>
                            <input type="text" name="nombre_cont" id="nom" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="ap">Contenido</label>
                            <input type="text" name="tipo_cont" id="ap" class="form-control" required="required">
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

if(isset($_GET["clave_cont"])) {
    $clave = mysqli_real_escape_string($conexion, $_GET["clave_cont"]);
    $nombre = mysqli_real_escape_string($conexion, $_GET["nombre_cont"]);
    $cont = mysqli_real_escape_string($conexion, $_GET["tipo_cont"]);

    $r = mysqli_query($conexion, "CALL unregistroC('$clave', '$nombre', '$cont')") or die("Problemas en el select");

    if($r) {
        echo "<script language='javascript'>alert('Datos registrados')</script>";
    } else {
        echo "<script language='javascript'>alert('Es probable que esta clave ya exista')</script>";
    }
    mysqli_close($conexion);

//vamos a asegurarnos de que se inserte un registro si la consulta no es la misma)
//en esta parte vamos a agarrar el registro completo
// $busca=mysqli_query($conexion,"select * from contenidos where 
// clave='$clave' and nombre='$nombre'  and contenido='$cont' ");

// $resultado=mysqli_num_rows($busca);

// if ($resultado==1)
// {
//     echo "<br><h1>El registro ya está en la BD</h1>";
// }else
// {
//     $consulta=mysqli_query($conexion, "insert into contenidos (clave,nombre,contenido)values 
//     ('$clave','$nombre','$cont')");
    
//     if($consulta)
//     {
//         echo "<script>alert('Guardado Correctamente');</script>";
//     }else    
//     {
//         echo "<script>alert('No se pudo guardar');</script>";
//     }   
    
//     mysqli_close($conexion);


// }
 }
?>

</html>
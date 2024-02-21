<html>   
<div class="container">
    <form style="margin:50px;" action="funciones/alta_contenidos.php" method="get">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="clave">Clave</label>
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

if(isset($_GET["clave_cont"])){

$clave=mysqli_real_escape_string($conexion,$_GET["clave_cont"]);
$nombre=mysqli_real_escape_string($conexion,$_GET["nombre_cont"]);
$cont=mysqli_real_escape_string($conexion,$_GET["tipo_cont"]);

//vamos a asegurarnos de que se inserte un registro si la consulta no es la misma)
//en esta parte vamos a agarrar el registro completo
$busca=mysqli_query($conexion,"select * from contenido where 
clave='$clave' and nombre='$nombre'  and contenido='$cont' ");

$resultado=mysqli_num_rows($busca);

if ($resultado==1)
{
    echo "<br><h1>El registro ya está en la BD</h1>";
}else
{
    $consulta=mysqli_query($conexion, "insert into contenido (clave,nombre,contenido)values 
    ('$clave','$nombre','$cont')");
    
    if($consulta)
    {
        echo'        
        <div class="row" style="display: block;">
        <h3 
        style="
              margin:5%  auto;
              color: #003D79;
              font-size: 300%;
              text-align: center;" >
              
        Guardado Correctamente     
       
        </h3>
        </div>  ';
    }else    
    {
        echo'        
        <div class="row" style="display: block;">
        <h3 
        style="
              margin:5%  auto;
              color: #003D79;
              font-size: 300%;
              text-align: center;" >
              
        No se pudo guardar
    
        
        </h3>
        </div>  ';
    }   
    
    mysqli_close($conexion);


}
}
?>

</html>
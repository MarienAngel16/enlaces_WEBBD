<html>   
<div class="container">
    <form style="margin:50px;" action="alta.php" method="get">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="curp">CURP Alumno</label>
                            <input type="text" name="curp_id" id="curp" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="nom">Nombre (s)</label>
                            <input type="text" name="nombre" id="nom" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="ap">Apellido Paterno</label>
                            <input type="text" name="paterno" id="ap" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="am">Apellido Materno</label>
                            <input type="text" name="materno" id="am" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="ed">Edad</label>
                            <input type="number" name="edad" id="ed" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="gender">Género</label>
                            <select name="genero" id="gender" class="form-control" required="required">
                               <option value="" disabled selected>seleccione género</option>
                               <option value="opcion1">Femenino</option>
                               <option value="opcion2">Masculino</option>
                            </select>                            
                        </div>

                        <div class="form-group">
                            <label for="gen">Generación</label>
                            <input type="text" name="generacion" id="gen" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="dic">Dirección</label>
                            <input type="text" name="direccion" id="dic" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="mail">Correo</label>
                            <input type="text" name="correo" id="mail" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="tel">Teléfono</label>
                            <input type="text" name="telefono" id="tel" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="proce">Procedencia</label>
                            <input type="text" name="procedencia" id="proce" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label for="group">Grupo</label>
                         <select name="grupo" id="group" class="form-control" required="required">
                            <option value="" disabled selected>seleccione grupo</option>
                            <?php
                            // Iterar sobre el arreglo $grupos y generar las opciones
                            foreach ($grupos as $grupo) {
                            echo '<option value="' . $grupo . '">' . $grupo . '</option>'; } 
                            ?>
                         </select>                            
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

if(isset($_GET["curp_id"])){

$curp=mysqli_real_escape_string($conexion,$_GET["curp_id"]);
$n=mysqli_real_escape_string($conexion,$_GET["nombre"]);
$p=mysqli_real_escape_string($conexion,$_GET["paterno"]);
$m=mysqli_real_escape_string($conexion,$_GET["materno"]);
$e=mysqli_real_escape_string($conexion,$_GET["edad"]);
$g=mysqli_real_escape_string($conexion,$_GET["genero"]);
$gen=mysqli_real_escape_string($conexion,$_GET["generacion"]);
$dic=mysqli_real_escape_string($conexion,$_GET["direccion"]);
$mail=mysqli_real_escape_string($conexion,$_GET["correo"]);
$t=mysqli_real_escape_string($conexion,$_GET["telefono"]);
$pro=mysqli_real_escape_string($conexion,$_GET["procedencia"]);
$group=mysqli_real_escape_string($conexion,$_GET["grupo"]);

//vamos a asegurarnos de que se inserte un registro si la consulta no es la misma)
//en esta parte vamos a agarrar el registro completo
$busca=mysqli_query($conexion,"select * from ALUMNOS where 
Curp_id='$curp' and Nombres='$n'  and A_paterno='$p' and  A_materno='$m' and Edad='$e' and Genero='$gen'
and Generacion='$gen' and Direccion='$dic' and Correo='$mail' and Telefono='$t' and Procedencia='$pro' 
and Grupo_id='$group'
");

$resultado=mysqli_num_rows($busca);

if ($resultado==1)
{
    echo "<br>El registro ya está en la BD";
}else
{
    $consulta=mysqli_query($conexion, "insert into ALUMNOS (Curp_id,Nombres,A_paterno,A_materno,Edad,Genero,Generacion,Direccion,Correo,Telefono,Procedencia,Grupo_id)values 
    ('$curp','$n','$p','$m','$e','$g','$gen','$dic','$mail','$t','$pro','$group')");
    
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
    
        <div class="text-center">
        <a href=consulta.php class="btn btn-primary" >Regresar a Consulta</a>
        </div>  
        
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
    
        <div class="text-center">
        <a href=consulta.php class="btn btn-primary" >Regresar a Consulta</a>
        </div>  
        
        </h3>
        </div>  ';
    }   
    
    mysqli_close($conexion);


}
}
?>

</html>
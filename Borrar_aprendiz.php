<!doctype html>
<html>
    <head>
    <title>Eliminación de Aprendices</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
    <div id="divconsulta" class="container">
        <br>
        <div id="div2">
        <div id="div4" >
        <form name="formulario" role="form" method="post">
        <div class="col-md-12">
        <strong class="lgris">Ingrese criterio de busqueda</strong>
        <br> <br>
        <div class="form-row">
        <div class="form-group col-md-5">
        <input class="form-control" type="number" name="numid" min="9999" max="9999999999999" value="" placeholder="IDENTIFICACIÓN" />
        </div>
        <div class="form-group col-md-3">
        <input class="btn btn-primary" type="submit" value="Eliminar" >
        </div> 
        </div>
        <br>
    </div> 
         </form>
          <br>
</div>


<div id="divconsulta2">
<?php
if ($_SERVER['REQUEST_METHOD']==='POST')
{
    include('funciones.php');
    $vnumid=$_POST['numid'];
    $miconexion=conectar_bd('1234', 'sena_bd');
    $resultado=consulta($miconexion,"select * from aprendices where apre_id='{$vnumid}'");
    $resultado2=consulta($miconexion,"delete from aprendices where apre_id='{$vnumid}'");
    if($resultado->num_rows>0)
{
    $fila = $resultado->fetch_object();
    echo $fila->apre_id." ".$fila->apre_tipoid." ".$fila->apre_id." ".$fila->apre_nombres." ".$fila->apre_apellidos." ".$fila->apre_direccion." ".$fila->apre_telefono." ".$fila->apre_ficha."<br>";
    
    if($resultado2) echo "<br> Datos borrados exitosamente";
}
    else{
        echo "No existen registros";
    }
    $miconexion->close();
}?>
</div>
 </div> 
 </div> 
 </body> 
 </html>



<?php
include('funciones.php');
  session_start();
  $vtipoid=$_POST['tipoid'];
  $vnombres=$_POST['nombres'];
  $vapellidos=$_POST['apellidos'];
  $vdireccion=$_POST['direccion'];
  $vtelefono=$_POST['telefono'];
  $vficha=$_POST['ficha'];

 $miconexion=conectar_bd('', 'sena_bd');
 $resultado=consulta($miconexion,"insert into aprendices (apre_tipoid,apre_nombres,apre_apellidos,apre_direccion,apre_telefono,apre_ficha) 
 values
 ('{$vtipoid}','{$vnombres}','{$vapellidos}','{$vdireccion}','{$vtelefono}','{$vficha}') " );

 if ($resultado)
  {
  echo"Guardado exitoso";
  }
?>
 


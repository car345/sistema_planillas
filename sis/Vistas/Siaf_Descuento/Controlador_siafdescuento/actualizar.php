<?php
include "../../../../conecta.php"; 

if(isset($_POST))
{
$id_planilla_past=$_POST['id_primary1'];
$id_registro=$_POST['id_planilla1'];
$descripcion_planilla=$_POST['nombre_planilla1'];
$codigo_planilla=$_POST['descripcion_planilla1'];
$query="UPDATE  siafdsct SET id_siafdsct='$id_registro',NOMBRE='$descripcion_planilla',FORMULA='$codigo_planilla'where id_siafdsct='$id_planilla_past'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}
?>

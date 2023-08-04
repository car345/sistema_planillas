<?php
include '../../../../conecta.php'; 
if(isset($_POST))
{

$id_planilla=$_POST['id_planilla1'];
$id_planilla_past=$_POST['id_primary1'];
$codigo_planilla=$_POST['codigo_planilla1'];
$descripcion_planilla=$_POST['descripcion_planilla1'];
$excluir=$_POST['excluir1'];
$query="UPDATE  tiplanil SET id_tiplanil='$id_planilla',CODIGO='$codigo_planilla',`DESC`='$descripcion_planilla',EXCLUIR ='$excluir' where id_tiplanil='$id_planilla_past'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}

?>
<?php
include '../../../../conecta.php';
if(isset($_POST))
{
$id_planilla_past=$_POST['id_primary1'];
$id_registro=$_POST['id_programa'];
$descripcion_planilla=$_POST['CODIGO'];
$codigo_planilla=$_POST['DESC'];
$excluir=$_POST['DIVISO'];
$query="UPDATE  programa SET id_programa='$id_registro',CODIGO='$codigo_planilla',`DESC`='$descripcion_planilla',id_divisio ='$excluir' where id_programa='$id_planilla_past'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}
?>
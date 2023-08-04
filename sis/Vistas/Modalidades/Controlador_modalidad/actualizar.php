<?php
include "../../../../conecta.php"; 
if(isset($_POST))
{

$id_modalidad=$_POST['id_modalidad1'];
$id_modalidad_past=$_POST['id_primary1'];
$codigo_modalidad=$_POST['codigo_modalidad1'];
$descripcion_modalidad=$_POST['descripcion_modalidad1'];
$fedu_modalidad=$_POST['fedu_modalidad1'];
$query="UPDATE modali
 SET id_modali='$id_modalidad',CODIGO='$codigo_modalidad',`DESC`='$descripcion_modalidad',FEDU ='$fedu_modalidad' where id_modali='$id_modalidad_past'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}

?>
<?php
 include '../../../../conecta.php'; 
if(isset($_POST))
{
$id_afps=$_POST['id_afps1'];
$id_afps_past=$_POST['id_primary1'];
$codigo_afps=$_POST['codigo_afps1'];
$descripcion_afps=$_POST['descripcion_afps1'];
$cod2_afps=$_POST['cod2_afps1'];
$query="UPDATE afps SET id_afps='$id_afps',CODIGO='$codigo_afps',`DESC`='$descripcion_afps',COD2 ='$cod2_afps' where id_afps='$id_afps_past'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}

?>
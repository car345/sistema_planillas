<?php
include '../../../../conecta.php';
if(isset($_POST))
{
$id_categoria=$_POST['id_categoria1'];
$id_categoria_past=$_POST['id_primary1'];
$descripcion_categoria=$_POST['descripcion_categoria1'];
$basfedu_categoria=$_POST['basfedu_categoria1'];
$query="UPDATE categori SET id_categori='$id_categoria',`DESC`='$descripcion_categoria',BASFEDU ='$basfedu_categoria' where id_categori='$id_categoria_past'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}
?>
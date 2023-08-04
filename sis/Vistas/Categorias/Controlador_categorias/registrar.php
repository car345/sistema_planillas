<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $id_categoria=$_POST['id_categoria'];
    $descripcion_categoria=$_POST['descripcion_categoria'];
    $basfedu_categoria=$_POST['basfedu_categoria'];
    $query ="INSERT INTO categori(id_categori,`DESC`,BASFEDU) VALUES('$id_categoria','$descripcion_categoria','$basfedu_categoria')";
    $resultado= mysqli_query($conn,$query);
    echo "ok";  
 }
?>
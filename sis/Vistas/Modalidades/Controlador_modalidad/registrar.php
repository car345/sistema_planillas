<?php
include "../../../../conecta.php"; 
if(isset($_POST))
{
    $id_modalidad=$_POST['id_modalidad'];
    $codigo_modalidad=$_POST['codigo_modalidad'];
    $descripcion_modalidad=$_POST['descripcion_modalidad'];
    $fedu_modalidad=$_POST['fedu_modalidad'];
    $query ="INSERT INTO modali(id_modali,CODIGO,`DESC`,FEDU) VALUES('$id_modalidad','$codigo_modalidad','$descripcion_modalidad','$fedu_modalidad')";
    $resultado= mysqli_query($conn,$query);
    echo "ok";  
 }
 
?>
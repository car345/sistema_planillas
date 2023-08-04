<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $id_afps=$_POST['id_afps'];
    $codigo_afps=$_POST['codigo_afps'];
    $descripcion_afps=$_POST['descripcion_afps'];
    $cod2_afps=$_POST['cod2_afps'];
    $query ="INSERT INTO afps(id_afps,CODIGO,`DESC`,COD2) VALUES('$id_afps','$codigo_afps','$descripcion_afps','$cod2_afps')";
    $resultado= mysqli_query($conn,$query);
    echo "ok";  
 }
?>
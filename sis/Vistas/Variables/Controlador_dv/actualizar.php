<?php
include '../../../../conecta.php';
if(isset($_POST))
{

    $id=$_POST['idaportes'];
    $id_past=$_POST['id_past'];
    $codigo=$_POST['codigo'];
    $cc=$_POST['cc'];
    $glosa=$_POST['desc'];
    $val=$_POST['val'];
    $detalle=$_POST['det'];
    $queryU = "UPDATE aportes SET REGISTRO='$id',  CODIGO='$codigo', CODIGOC='$cc',`DESCT` ='$glosa', APORTE='$val', DETALLE='$detalle'  WHERE REGISTRO='$id_past' ";
    $resultado = mysqli_query($conn, $queryU);  
    echo "ok";
} 
?> 
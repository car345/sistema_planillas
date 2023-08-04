<?php
include '../../../../conecta.php';
$id_registro=$_POST['registro'];
$cod =$_POST['cod'];
$tipo =$_POST['tipo'];
$sel="SELECT * FROM reportxmes where CODIGO='$cod' and id_meses='9999' and REGPERSO='18923'";
$rest=mysqli_query($conn,$sel);
$vas=mysqli_fetch_assoc($rest);
$desc=$vas['DESCT'];
$importe=$vas['IMPORTE'];
$sql="INSERT INTO renxformula(id_registro,TIPO,CODIGO,DESCT,IMPORTE) VALUES ('$id_registro','$tipo','$cod','$desc','$importe') ";
$result = mysqli_query($conn,$sql);
echo "ok";
?>
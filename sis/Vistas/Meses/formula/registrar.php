<?php
include '../../../../conecta.php';

$id_registro=$_POST['registro'];
$id_mes =$_POST['mes'];
$user=$_POST['user'];
$cod =$_POST['cod'];
$tipo =$_POST['tipo'];

$sel="SELECT * FROM reportxmes where id_meses='$id_mes' and REGPERSO='$user' and id_registro ='$cod' ";

$rest=mysqli_query($conn,$sel);
$vas=mysqli_fetch_assoc($rest);
$desc=$vas['DESCT'];
$importe=$vas['IMPORTE'];

$sql="INSERT INTO formulaxmes(id_registro,REGMES,REGPERSON,TIPO,CODIGO,DESCT,IMPORTE) VALUES ('$id_registro','$id_mes','$user','$tipo','$cod','$desc','$importe') ";

$result = mysqli_query($conn,$sql);
echo "ok";
?>
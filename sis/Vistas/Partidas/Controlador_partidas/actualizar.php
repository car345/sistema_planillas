<?php
include '../../../../conecta.php';

if(isset($_POST))
{
$ID_PARTIDAS_PAST=$_POST['id_primary1'];
$ID_PARTIDAS=$_POST['ID_PARTIDAS'];
$CODIGO=$_POST['CODIGO'];
$FORMULA=$_POST['FORMULA'];
$AUXILIAR=$_POST['AUXILIAR'];
$FORMULARIO=$_POST['id_formular'];
$NOMBRE=$_POST['NOMBRE'];
$query="UPDATE  partidas SET REGISTRO='$ID_PARTIDAS',CODIGO='$CODIGO',FORMULA='$FORMULA',AUXILIAR ='$AUXILIAR' ,FORMULARIO ='$FORMULARIO',NOMBRE ='$NOMBRE' where REGISTRO='$ID_PARTIDAS_PAST'";
$resultado= mysqli_query($conn,$query);  
 echo "ok";
}

?>
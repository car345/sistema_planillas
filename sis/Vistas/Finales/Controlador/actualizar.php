<?php
include '../../../../conecta.php';
if(isset($_POST))
{

    $id=$_POST['id'];
    $categoria=$_POST['categoria'];
    $codigo=$_POST['codigo'];
    $cc=$_POST['cc'];
    $tcr=$_POST['tcr'];
    $glosa=$_POST['glosa'];
    $formula = $_POST['formula'];
    $imprimir=$_POST['imprimir'];
    $leer=$_POST['leer'];
    $ver=$_POST['ver'];
    $encargado=$_POST['encargado'];
    $auxiliar=$_POST['auxiliar'];
    $anular=$_POST['anular'];
    $afecto=$_POST['afecto'];
    $valorabsoluto=$_POST['valorabsoluto'];
    $inicializa=$_POST['inicializa'];
    $detalle=$_POST['detalle'];
    $traba_emp=$_POST['traba_emp'];
    $fecha=$_POST['fecha'];
    $fecha2=$_POST['fecha2'];

    $queryU = "UPDATE aportes SET id_categori='$categoria', CODIGO='$codigo', CODIGOC='$cc', TIPOCR='$tcr', `DESCT` ='$glosa', APORTE='$formula', IMP='$imprimir', LEE='$leer', VER='$ver', ENCARGADO='$encargado', AUXILIAR='$auxiliar', ANULAR='$anular', AFECTO='$afecto', VABSOLUTO='$valorabsoluto', INICIALIZA='$inicializa', DETALLE='$detalle', TRABA_EMP='$traba_emp', FECHA='$fecha', FECHA2='$fecha2' WHERE id_aportes='$id'";
    $resultado = mysqli_query($conn, $queryU);  
    echo "ok";
}else {
    echo $i;
} 

//UPDATE `aporte` SET `id_meses`='[value-1]',`id_aportes`='[value-2]',`CODIGO`='[value-3]',`DESC`='[value-4]',`id_afps`='[value-5]',`V_F`='[value-6]',`APORTE`='[value-7]',`LEE`='[value-8]',`IMP`='[value-9]',`VER`='[value-10]',`TRABA_EMP`='[value-11]',`id_categori`='[value-12]',`APO_RET`='[value-13]',`DETALLE`='[value-14]',`GENERAL`='[value-15]',`AUXILIAR`='[value-16]',`PROPOR`='[value-17]',`EXCLUSIVO`='[value-18]',`ANULAR`='[value-19]',`ENCARGADO`='[value-20]',`INICIALIZA`='[value-21]',`CODIGOC`='[value-22]',`AFECTO`='[value-23]',`TIPOCR`='[value-24]',`VABSOLUTO`='[value-25]',`FECHA`='[value-26]',`FECHA2`='[value-27]',`CODPLAME`='[value-28]' WHERE 1
?> 
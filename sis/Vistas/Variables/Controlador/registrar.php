<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $id=$_POST['id'];
    $categoria=$_POST['id_categoria'];
    $codigo=$_POST['codigo'];
    $cc=$_POST['cc'];
    $tcr=$_POST['tcr'];
    $glosa=$_POST['glosa'];
    $formula = $_POST['formula'];
    $ver=$_POST['ver'];
    $leer=$_POST['leer'];
    $imprimir=$_POST['imprimir'];
    $encargado=$_POST['encargado'];
    $auxiliar=$_POST['auxiliar'];
    $anular=$_POST['anular'];
    $afecto=$_POST['afecto'];
    $val=$_POST['val'];
    $init=$_POST['init'];
    $detalle=$_POST['detalle'];
    $traba_emp=$_POST['traba_emp'];
    $fecha=$_POST['fecha'];
    $fecha2=$_POST['fecha2'];
    //$sql = "SELECT ".implode(", ", $columns) ." FROM $table $where";

    $query ="INSERT INTO aportes(REGISTRO,CODIGO,CODIGOC,DESCT,APORTE,LEE,IMP,VER,AUXILIAR,ANULAR,ENCARGADO,INICIALIZA,
    AFECTO,VABSOLUTO,TIPOCR,id_categori,TRABA_EMP,FECHA,FECHA2) VALUES ('$id','$codigo','$cc','$glosa','$formula','$leer','$imprimir'
    ,'$ver','$auxiliar','$anular','$encargado','$init','$afecto','$val','$tcr'
    ,'$categoria','$traba_emp','$fecha','$fecha2')";
    $resultado = mysqli_query($conn,$query);
    echo "ok";
  

     }
 //INSERT INTO `aporte`(`id_meses`, `id_aportes`, `CODIGO`, `DESC`, `id_afps`, `V_F`, `APORTE`, `LEE`, `IMP`, `VER`, `TRABA_EMP`, `id_categori`, `APO_RET`, `DETALLE`, `GENERAL`, `AUXILIAR`, `PROPOR`, `EXCLUSIVO`, `ANULAR`, `ENCARGADO`, `INICIALIZA`, `CODIGOC`, `AFECTO`, `TIPOCR`, `VABSOLUTO`, `FECHA`, `FECHA2`, `CODPLAME`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]')
?>
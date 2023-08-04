<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $codigo=$_POST['codigo'];
    $cc=$_POST['cc'];
    $desc=$_POST['desc'];
    $aporte = $_POST['val'];    
    $detalle=$_POST['det'];
    //$sql = "SELECT ".implode(", ", $columns) ." FROM $table $where";
    $query ="INSERT INTO aportes(REGISTRO,CODIGO,CODIGOC,DESCT,APORTE,DETALLE,TIPOCR) VALUES ('$codigo','$codigo','$cc','$desc','$aporte','$detalle','0')";
    $resultado = mysqli_query($conn,$query);
    echo "ok";
     }

 //INSERT INTO `aporte`(`id_meses`, `id_aportes`, `CODIGO`, `DESC`, `id_afps`, `V_F`, `APORTE`, `LEE`, `IMP`, `VER`, `TRABA_EMP`, `id_categori`, `APO_RET`, `DETALLE`, `GENERAL`, `AUXILIAR`, `PROPOR`, `EXCLUSIVO`, `ANULAR`, `ENCARGADO`, `INICIALIZA`, `CODIGOC`, `AFECTO`, `TIPOCR`, `VABSOLUTO`, `FECHA`, `FECHA2`, `CODPLAME`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]')
?>
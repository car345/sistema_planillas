<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $id=$_POST['id'];
    $codigo=$_POST['id_codigo'];
    $tcr=$_POST['tcr'];
    $desc=$_POST['desc'];
    $formula = $_POST['formula'];

    //$sql = "SELECT ".implode(", ", $columns) ." FROM $table $where";
    $query ="INSERT INTO items_no (REGISTRO,CODIGO, DESCT,TIPO, FORMULA) VALUES ('$id','$codigo','$desc','$formula','$tcr')";
    $resultado = mysqli_query($conn, $query);
    echo "ok";
  

     }
 //INSERT INTO `aporte`(`id_meses`, `id_aportes`, `CODIGO`, `DESC`, `id_afps`, `V_F`, `APORTE`, `LEE`, `IMP`, `VER`, `TRABA_EMP`, `id_categori`, `APO_RET`, `DETALLE`, `GENERAL`, `AUXILIAR`, `PROPOR`, `EXCLUSIVO`, `ANULAR`, `ENCARGADO`, `INICIALIZA`, `CODIGOC`, `AFECTO`, `TIPOCR`, `VABSOLUTO`, `FECHA`, `FECHA2`, `CODPLAME`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]')
?>
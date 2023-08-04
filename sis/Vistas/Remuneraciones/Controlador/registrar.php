<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $codigo=$_POST['id'];
    $cc=$_POST['cc'];
    $glosa=$_POST['glosa'];
    $detalle=$_POST['detalle'];
    //$sql = "SELECT ".implode(", ", $columns) ." FROM $table $where";
    $array=array();
    $res=mysqli_query($conn,"SELECT DISTINCT id_categori FROM renumeraciones ORDER BY id_categori");
    $select=mysqli_query($conn,"SELECT * FROM renumeraciones where CODIGO='$codigo'");
    $sql=mysqli_num_rows($select);

    while($rest=$res->fetch_assoc())
    {
     $array[]=$rest;
    }

    if($sql<1 )
    {
        foreach($array as $mod)
        {
          $categori=$mod['id_categori'];
          $insert=mysqli_query($conn,"INSERT INTO renumeraciones(CODIGO,CODIGOSIAF,DESCT,APORTE,DETALLE,id_categori) VALUES ('$codigo','$cc','$glosa','0.00','$detalle','$categori')");      
        }
         echo "ok"; 
    }else
    {
        echo "Error";
    }
  
     }
 //INSERT INTO `aporte`(`id_meses`, `id_aportes`, `CODIGO`, `DESC`, `id_afps`, `V_F`, `APORTE`, `LEE`, `IMP`, `VER`, `TRABA_EMP`, `id_categori`, `APO_RET`, `DETALLE`, `GENERAL`, `AUXILIAR`, `PROPOR`, `EXCLUSIVO`, `ANULAR`, `ENCARGADO`, `INICIALIZA`, `CODIGOC`, `AFECTO`, `TIPOCR`, `VABSOLUTO`, `FECHA`, `FECHA2`, `CODPLAME`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]')
?>
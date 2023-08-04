<?php 
include "../../../../conecta.php"; 

if(isset($_POST))
{
 
    $id_primary=$_POST['id_primary1'];
    $id_primary_past=$_POST['id_primary1'];
    $id_codigo=$_POST['CODIGO'];
    $codigo_plaza=$_POST['CODPLAZA'];
    $id_nombre=$_POST['NOMBRE'];
    $apellidos=$_POST['APELLIDOS'];
    $apaterno=$_POST['APATERNO'];
    $amaterno=$_POST['AMATERNO'];
    $tipodoc=$_POST['tipdoc'];
    $numdoc=$_POST['NUMERO_DOC'];
    $fecha_nac=$_POST['FECHA_NACI'];
    $sexo=$_POST['SEXO'];
    $estado=$_POST['estado'];
    $modalidad=$_POST['modali'];
    $cargo=$_POST['CARGO'];
    $areas=$_POST['AREA']; 
    $categoria=$_POST['categori'];
    $afps=$_POST['afps'];
    $codipss=$_POST['CODIGO_IPS'];
    $codigoafp=$_POST['CODIGO_AFP'];
    $fechaing=$_POST['FECHA_ING'];
    $fechacese=$_POST['FECHA_CESE'];
    $ctacte=$_POST['CTA_CTE'];
    $activi=$_POST['id_activi'];
    $partidas=$_POST['id_partidas'];
    $query="UPDATE  datperso SET id_datperso='$id_primary',CODPLAZA='$codigo_plaza',CODIGO='$id_codigo',NOMBRE='$id_nombre',APELLIDOS='$apellidos'
    ,APATERNO='$apaterno',AMATERNO='$amaterno',id_docide='$tipodoc'
    ,NUMERO_DOC='$numdoc',FECHA_NACI='$fecha_nac',SEXO='$sexo'
    ,id_estado='$estado',id_modali='$modalidad',CARGO='$cargo',id_areas='$areas',id_categori='$categoria',id_afps='$afps'
    ,CODIGO_AFP='$codipss',CODIGO_AFP='$codigoafp',FECHA_ING='$fechaing',FECHA_CESE='$fechacese',CTA_CTE='$ctacte',
    id_activi='$activi',id_partidas ='$partidas' where id_datperso='$id_primary_past'";
    $resultado= mysqli_query($conn,$query);  
    echo "ok";
    }
?>
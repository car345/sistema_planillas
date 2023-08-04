<?php 
include '../../../../conecta.php';
 
if(isset($_POST))
{

    $id_codigo=$_POST['CODIGO'];
    $codigo_plaza=$_POST['CODIGO_PLAZA'];
    $id_nombre=$_POST['NOMBRE'];
    $apellidos=$_POST['APELLIDOS'];
    $apaterno=$_POST['APATERNO'];
    $amaterno=$_POST['AMATERNO'];
    $tipodoc=$_POST['tipdoc'];
    $numdoc=$_POST['NUMERO_DOC'];
    $fecha_nac=$_POST['FECHA_NACI'];
    $sexo=$_POST['SEXO'];
    $estado=$_POST['estado'];
    $modalidad=$_POST['modalidad'];
    $cargo=$_POST['CARGO'];
    $areas=$_POST['AREA']; 
    $categoria=$_POST['categoria'];
    $afps=$_POST['afps'];
    $codipss=$_POST['CODIGO_IPS'];
    $codigoafp=$_POST['CODIGO_AFP'];
    $fechaing=$_POST['FECHA_ING'];
    $fechacese=$_POST['FECHA_CESE'];
    $ctacte=$_POST['CTA_CTE'];
    $activi=$_POST['id_activi'];
    $partidas=$_POST['id_partidas'];
    $query ="INSERT INTO datperso(id_datperso,CODPLAZA,CODIGO,NOMBRE,id_areas,APELLIDOS,CODIGO_AFP,CODIGO_IPS,
    id_categori,FECHA_ING,FECHA_CESE,CARGO,id_afps,CTA_CTE,id_estado,id_modali,id_activi,id_partidas,id_docide,NUMERO_DOC,SEXO,
    FECHA_NACI,APATERNO,AMATERNO) VALUES('$id_codigo','$codigo_plaza','$numdoc','$id_nombre','$areas','$apellidos','$codigoafp','$codipss','$categoria',
    '$fechaing','$fechacese','$cargo','$afps','$ctacte','$estado','$modalidad','$activi','$partidas','$tipodoc','$numdoc','$sexo','$fecha_nac'
    ,'$apaterno','$amaterno')"; 
    $vals="SELECT *FROM datperso WHERE id_datperso='$id_codigo'";
    $valQuery= mysqli_query($conn,$vals);
    $lvl=mysqli_num_rows($valQuery);
   if($lvl<1)
   {
    $resultado= mysqli_query($conn,$query);
    echo "ok"; 
   }else{
    echo "repeat";
   }



     
 }

?>
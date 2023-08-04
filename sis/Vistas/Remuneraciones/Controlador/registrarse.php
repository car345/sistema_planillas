<?php
include '../../../../conecta.php';

$cat=$_POST['id_categoria'];
$query = "SELECT count(*) as valid FROM renumeraciones re WHERE id_categori='$cat'" ;
$resultados = mysqli_query($conn, $query); 
$doccs = mysqli_fetch_array($resultados);


if($doccs['valid']==0){
$sql_query = "SELECT * from renumeraciones a where id_categori='4' ORDER BY CODIGO";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
$rec3=array();
while($aportes = mysqli_fetch_assoc($resultset) ) {       
    $rec3[]=$aportes;  
 }
 foreach($rec3 as $aportes ) 
 { 
 $a =$aportes['id_registro'];
 $b = $aportes['APORTE'];
 $c = $aportes['CODIGO'];
 $d = $aportes['DESCT'];
 $e = $aportes['CODIGOSIAF'];
 $f = $aportes['id_categori'];
 $g = $aportes['DETALLE'];

 $queryI = "INSERT INTO renumeraciones(CODIGO,CODIGOSIAF,DESCT,APORTE,DETALLE,id_categori) VALUES ('$c','$e','$d','$b','$g','$cat')";
 $resultI = mysqli_query($conn, $queryI);

echo "ok";
  }
  
 }else 
 {
    echo 'ya existe la categoría';
 }
?>
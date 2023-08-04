<?php

include '../../../../conecta.php';
if(isset($_POST))
{
    $id_mes=$_POST['id_meses'];
    $mes=$_POST['mes'];
    $año=$_POST['year'];
    $planilla=$_POST['tiplanil'];
    $modali=$_POST['modali'];

    $select="SELECT*FROM meses where id_meses='$id_mes'";
    $s=$conn->query($select);
    $m=mysqli_fetch_array($s);
    if($m<1)
    {
        $query = "INSERT INTO meses(id_meses, mes, anio, MODALIDAD, ESTADO, id_tiplanil, FEDU) VALUES ('$id_mes', '$mes', '$año', '$modali', '0', '$planilla', '1')";
        $resultado = mysqli_query($conn, $query);
        
        echo "ok";  
    }else{
        echo "no";
    }
   
 }
?>
<?php

include '../../../../conecta.php';

if(isset($_POST))
{
    $mes=$_POST['id_meses'];
    $aporte=$_POST['id_aporte'];
    $persona=$_POST['REGPERSO'];
    $DESCT=$_POST['DESCT'];  
    // $q="SELECT *FROM in_trab where id_meses='$id_meses' and codigo_datperso='$dni_trabajador'";
    $q="SELECT * FROM persxmes pm  where REGMES='$mes' and REGISTRO='$persona'";    
    $result2 = mysqli_query($conn,$q);
    $resultado2=mysqli_num_rows($result2);
    
    if($resultado2<1){        
        echo "La persona no está registrada en la planilla de pensionistas de este mes.";
    }else{
        $q3="SELECT * FROM reportxmes where id_meses='$mes' and CODIGO='$aporte' and REGPERSO='$persona'";    
        $result3 = mysqli_query($conn,$q3);
        $resultado3=mysqli_num_rows($result3);
        if($resultado3<1){ 
            $queryD = "INSERT INTO reportxmes(id_meses, REGPERSO, CODIGO, DESCT, IMPORTE, PROPOR) VALUES ('$mes','$persona','$aporte','$DESCT','0.00','2')";
            $resultD = mysqli_query($conn, $queryD) or die("database error:". mysqli_error($conn));           
            echo "ok";      
        }else{
            echo "La persona ya está registrada en este descuento";
        }
    }


 }
?>
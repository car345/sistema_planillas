<?php

include '../../../../conecta.php';

if(isset($_POST))
{

    if(strlen($_POST['dni_cliente'])==8)
    {

   
    $id_meses=$_POST['id_meses'];
    $dni_trabajador=$_POST['dni_cliente'];
    // $q="SELECT *FROM in_trab where id_meses='$id_meses' and codigo_datperso='$dni_trabajador'";
    $q="SELECT * FROM persxmes pm inner join datperso d on pm.REGISTRO=d.id_datperso where pm.REGMES='$id_meses' and d.CODIGO='$dni_trabajador'";
    $result2 = mysqli_query($conn,$q);

    $result=mysqli_num_rows($result2);
    
    if($result<1){        
        // $query ="INSERT INTO in_trab(id_meses,codigo_datperso,id_importe,monto) VALUES('$id_meses','$dni_trabajador',' 0',' 0')";

        $queryd = " SELECT * FROM datperso WHERE CODIGO = '$dni_trabajador' ";
        $resultd= mysqli_query($conn,$queryd);
        $dato = mysqli_fetch_array($resultd);

        $a = $dato['id_datperso'];
        $b = $dato['id_areas'];
        $c = $dato['id_categori'];
        $d = $dato['CARGO'];
        $e = $dato['id_afps'];
        $f = $dato['id_estado'];
        $g = $dato['id_modali'];
        $h = $dato['REGCATENC'];
        $i = $dato['id_activi'];
        $j = $dato['id_partidas'];
        $k = $dato['CTA_CTE'];
        $l = $dato['EREFERENC'];
        
    
        $queryI ="INSERT INTO persxmes(REGISTRO, REGMES, REGAREA, REGCATE, CARGO, REG_AFP, ESTADO, REGMODALI, REGCATENC, REGACTIVI, REGPART, CTA_CTE, EREFERENC) VALUES ('$a','$id_meses','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";

        $resultado= mysqli_query($conn,$queryI);  
        echo "ok";  
    }else{
        echo "existe";  
    }
    }else{
        echo "false";
    }


 }
?>
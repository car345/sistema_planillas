<?php

include '../../../../conecta.php';
if(isset($_POST))
{


    $year = $_POST['year'];
    $month = $_POST['month'];
    $id = $_POST['id'];
    if($month=='1'){  
        $year = $year - 1;   
        $month = 12;
    }else{
        $year = $year - 1;
        $month = $month - 1;
    }

    // $q="SELECT *FROM in_trab where id_meses='$id_meses' and codigo_datperso='$dni_trabajador'";
    $q="SELECT * FROM persxmes where anio='$year' and MES='$month'";
    $query= mysqli_query($conn, $q);
    $result=mysqli_num_rows($result);
    if($result>0){
        while($dato=mysqli_fetch_array($query)){
            $a = $dato['REGISTRO'];
            $b = $dato['REGAREA'];
            $c = $dato['REGCATE'];
            $d = $dato['CARGO'];
            $e = $dato['REG_AFP'];
            $f = $dato['ESTADO'];
            $g = $dato['REGMODALI'];
            $h = $dato['REGCATENC'];
            $i = $dato['REGACTIVI'];
            $j = $dato['REGPART'];
            $k = $dato['CTA_CTE'];
            $l = $dato['EREFERENC'];

            $queryI = "INSERT INTO persxmes(REGISTRO, REGMES, REGAREA, REGCATE, CARGO, REG_AFP, ESTADO, REGMODALI, REGCATENC, REGACTIVI, REGPART, CTA_CTE, EREFERENC) VALUES ('$a','$id','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";
            $resultado = mysqli_query($conn, $queryI); 
        }    
        echo "ok";  
    }else{
        echo "ya existe";
    }


 }
?>
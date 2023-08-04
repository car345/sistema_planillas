<?php

include '../../../../conecta.php';
if(isset($_POST))
{

    $id_mes = $_POST['id_mes'];
    $id_persona = $_POST['id_persona'];
    $id_ap = $_POST['aport'];

    
    $sql_query = "SELECT a.CODIGO, a.DESCT, a.APORTE, a.AFECTO FROM aportes a where a.REGISTRO = '$id_ap'";
    
    $resultset = mysqli_query($conn, $sql_query);                
    
    $aport = mysqli_fetch_array($resultset);                   

    $b = $aport['APORTE'];
    $c = $aport['CODIGO'];
    $d = $aport['DESCT'];
    $e = $aport['AFECTO'];
    
    
    $queryI = "INSERT INTO reportxmes(REGMES, REGPERSO, REGAPORT, IMPORTE, RENTA5TA, NUMERO) VALUES ('$id_mes','$id_persona','$id_ap','$b','0','0')";
    $resultI = mysqli_query($conn, $queryI);
    echo "ok"; 

 }

?>
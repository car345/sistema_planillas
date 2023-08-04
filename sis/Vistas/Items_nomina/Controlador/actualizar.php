<?php
include '../../../../conecta.php';
if(isset($_POST))
{
    
    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $formula=$_POST['formula'];
    $tcr=$_POST['tcr'];
    $desc=$_POST['desc'];

    $queryU = "UPDATE items_no SET FORMULA='$formula', CODIGO='$codigo', DESCT='$desc', 
    TIPO='$tcr' WHERE REGISTRO='$id'";
    $resultado = mysqli_query($conn, $queryU);  
    echo "ok";

} 


?> 
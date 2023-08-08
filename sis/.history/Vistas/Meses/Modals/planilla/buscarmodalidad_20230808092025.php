<?php 
 
 include '../../../../../conecta.php';

 if(isset($_POST))
 {
    $id_modalidad=$_POST['cod_modal'];
    $sql="SELECT*FROM categoria where CODIGO ='$id_modalidad'";
    $result=mysqli_num_rows($query);
    mysqli_close($conn);
    $data ='';
   
 }
?>
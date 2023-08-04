<?php  
    include '../../../../conecta.php';
 if($_POST['eliminarcategoria'])
 {
     $id_categoria=$_POST['id'];
     $eliminar="DELETE FROM aportes WHERE REGISTRO=$id_categoria";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
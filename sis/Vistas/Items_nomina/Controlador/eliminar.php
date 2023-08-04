<?php  
    include '../../../../conecta.php';
 if($_POST['eliminarcategoria'])
 {
     $id = $_POST['id'];
     $eliminar="DELETE FROM items_no WHERE REGISTRO=$id";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
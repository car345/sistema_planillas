<?php  
    include '../../../../conecta.php'; 
 if($_POST['eliminarcategoria'])
 {
     $id_categoria=$_POST['id'];
     $eliminar="DELETE FROM categori WHERE id_categori=$id_categoria";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
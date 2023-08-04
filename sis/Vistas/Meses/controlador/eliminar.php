<?php  
    include '../../../../conecta.php'; 
 if($_POST)
 {
 
     $id = $_POST['id'];
     $eliminar = "DELETE FROM planilla WHERE REGISTRO = $id";
     $resultado = mysqli_query($conn, $eliminar);
     echo "ok";
 }
?>
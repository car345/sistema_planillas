<?php
    
    include '../../../../conecta.php';
 if($_POST['eliminarpartida'])
 {
     $id_partidas=$_POST['id'];
     $eliminar="DELETE FROM partidas WHERE REGISTRO=$id_partidas";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
<?php
    
    include '../../../../conecta.php'; 
 if($_POST['eliminarplanilla'])
 {
     $id_planilla=$_POST['id'];
     $eliminar="DELETE FROM tiplanil WHERE id_tiplanil=$id_planilla";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
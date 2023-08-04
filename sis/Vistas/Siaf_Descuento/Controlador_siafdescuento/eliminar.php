<?php
include '../../../../conecta.php'; 
 if($_POST['eliminarsiaf'])
 {
     $id_planilla=$_POST['id'];

     $eliminar1="DELETE FROM siafdsct WHERE id_siafdsct=$id_planilla";
     $resultado1=mysqli_query($conn,$eliminar1);
     echo "ok";
 }
?>
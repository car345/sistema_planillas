<?php
    
    include '../../../../conecta.php'; 
 if($_POST['eliminarprograma'])
 {
     $id_planilla=$_POST['id'];
     $eliminar="DELETE FROM programa WHERE id_programa=$id_planilla";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
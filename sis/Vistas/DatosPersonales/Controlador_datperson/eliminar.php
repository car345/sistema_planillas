<?php  
    include '../../../../conecta.php'; 
 if($_POST['eliminardatperso'])
 {
     $id_datperso=$_POST['id'];
     $eliminar="DELETE FROM datperso WHERE id_datperso=$id_datperso";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
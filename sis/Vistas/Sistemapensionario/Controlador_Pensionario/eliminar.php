<?php  
     include '../../../../conecta.php'; 
 if($_POST['eliminarafps'])
 {
     $id_afps=$_POST['id'];
     $eliminar="DELETE FROM afps WHERE id_afps=$id_afps";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
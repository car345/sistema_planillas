<?php  
include "../../../../conecta.php";  
 if($_POST['eliminarmodalidad'])
 {
     $id_modali=$_POST['id'];
     $eliminar="DELETE FROM modali WHERE id_modali=$id_modali";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
 }
?>
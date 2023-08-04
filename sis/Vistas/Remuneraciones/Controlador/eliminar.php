<?php  
    include '../../../../conecta.php';

    if(isset($_POST))
    {

   
     $idAporte=$_POST['id_categoria_eliminar'];

     $eliminar="DELETE FROM renumeraciones WHERE id_categori ='$idAporte'";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
    }
?>
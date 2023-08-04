<?php  
    include '../../../../conecta.php';
    if(isset($_POST))
    {

     $CODIGO=$_POST['eliminar_codigo'];

     $eliminar="DELETE FROM renumeraciones WHERE CODIGO ='$CODIGO'";
     $resultado=mysqli_query($conn,$eliminar);
     echo "ok";
  }
?>
<?php  
    include '../../../../conecta.php'; 
 if($_POST['eliminar'])
 {
     $id = $_POST['id'];
     $mes = $_POST['mes'];
     $bin="DELETE FROM formulaxmes where REGPERSON='$id' and REGMES='$mes'";
     $bins = mysqli_query($conn,$bin);

     $eliminar="DELETE FROM persxmes WHERE REGISTRO = '$id' and REGMES = '$mes' ";
     $resultado = mysqli_query($conn,$eliminar);

     $eliminarplanilla="DELETE FROM reportxmes where REGPERSO='$id' and id_meses='$mes'";
     $rest = mysqli_query($conn,$eliminarplanilla);
     $eliminarpla="DELETE FROM reportxplanilla where REGPERSO='$id' and REGMES='$mes'";
     $rest3 = mysqli_query($conn,$eliminarpla);
     
     echo "ok";
 }

?>
<?php  
    include '../../../../conecta.php'; 
 if($_POST)
 {
     $id_meses = $_POST['id'];
     $deletxformula="DELETE FROM  formulaxmes  where REGMES= $id_meses";
     $renxformula="DELETE FROM  reportxmes  where id_meses= $id_meses";
     $deletxformulas="DELETE FROM  persxmes  where REGMES= $id_meses";
     $eliminar = "DELETE FROM meses WHERE id_meses = $id_meses";

     $resultado = mysqli_query($conn,$eliminar);
     $resultado1 = mysqli_query($conn,$renxformula);
     $resultado2 = mysqli_query($conn,$deletxformula);
     $resultado2 = mysqli_query($conn,$deletxformulas);
     echo "ok";
 }
?>
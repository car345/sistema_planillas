<?php 
    include '../../../../conecta.php'; 
    if(isset($_POST))
    {

        $id_registro=$_POST['id_siaf'];
        $descripcion_planilla=$_POST['descripcion_siaf'];
        $codigo_planilla=$_POST['formula_siaf'];
        $afps=$_POST['afps_siaf'];
        $query ="INSERT INTO siafdsct (id_siafdsct,NOMBRE,FORMULA) VALUES('$id_registro','$descripcion_planilla','$codigo_planilla')";
        $resultado= mysqli_query($conn,$query);
        echo "ok";  
     }
?>
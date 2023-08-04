<?php 
include '../../../../conecta.php';
    if(isset($_POST))
    {
        $id_registro=$_POST['id_programa'];
        $descripcion_planilla=$_POST['CODIGO'];
        $codigo_planilla=$_POST['DESCRIPCION'];
        $excluir=$_POST['id_divisio'];
        $query ="INSERT INTO programa(id_programa,`DESC`,CODIGO,id_divisio) VALUES('$id_registro','$descripcion_planilla','$codigo_planilla','$excluir')";
        $resultado= mysqli_query($conn,$query);
        echo "ok";  
     }
?>
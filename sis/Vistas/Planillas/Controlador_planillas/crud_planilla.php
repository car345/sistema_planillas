<?php 
    include '../../../../conecta.php'; 
    if(isset($_POST))
    {
        $id_planilla=$_POST['id_planilla'];
        $descripcion_planilla=$_POST['descripcion_planilla'];
        $codigo_planilla=$_POST['codigo_planilla'];
        $excluir=$_POST['excluir'];
        $query ="INSERT INTO tiplanil(id_tiplanil,`DESC`,CODIGO,EXCLUIR) VALUES('$id_planilla','$descripcion_planilla','$codigo_planilla','$excluir')";
        $resultado= mysqli_query($conn,$query);
        echo "ok";  
     }
?>
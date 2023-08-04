<?php
include '../../../../conecta.php';
$boton=$_POST['boton'];
if($boton=='agregararea')
{   $id_area=$_POST['id_area'];
    $codigo_area=$_POST['codigo_area'];
    $descripcion_area=$_POST['descripcion_area'];
    $query ="INSERT INTO areas(id_areas,CODIGO,`DESC`) VALUES('$id_area','$codigo_area','$descripcion_area')";
    $resultado= mysqli_query($conn,$query); 
	echo "ok";
 
  } 
if($boton== 'eliminararea' )
{ 
    $id_area=$_POST['id_area'];
    $eliminar="DELETE FROM areas WHERE id_areas=$id_area";
    $resultado=mysqli_query($conn,$eliminar);
    echo "ok";
}

if($boton== 'actualizararea' )
    { 
        $id_area=$_POST['id_area1'];
        $id_curso_past=$_POST['id_primary'];
        $codigo_area=$_POST['codigo_area1'];
        $descripcion_area=$_POST['descripcion_area1'];
        $query="UPDATE  areas SET id_areas='$id_area',CODIGO='$codigo_area',`DESC`='$descripcion_area' where id_areas='$id_curso_past'";
        $resultado= mysqli_query($conn,$query);  
         echo "ok";
     }
?>
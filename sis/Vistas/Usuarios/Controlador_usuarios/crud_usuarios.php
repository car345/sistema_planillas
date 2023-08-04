<?php
include '../../../../conecta.php';
$boton=$_POST['boton'];
if($boton=='agregar_usuario')
{   $id_usuarios=$_POST['id_usuarios'];
    $nombre_usuario=$_POST['nombre_usuario'];
    $clave_usuario=$_POST['clave_usuario'];
    $admin_usuario=$_POST['admin_usuario'];
    $query ="INSERT INTO usuarios(id_usuarios,NOMBRE, CLAVE, `ADMIN` ) VALUES('$id_usuarios','$nombre_usuario','$clave_usuario', ' $admin_usuario')";
    $resultado= mysqli_query($conn,$query);  
    echo "ok";
} 
if($boton== 'eliminarusuario' )
{ 
    $id_usuario=$_POST['id_usuarios'];
    $eliminar="DELETE FROM usuarios WHERE id_usuarios=$id_usuario";
    $resultado=mysqli_query($conn,$eliminar);
    echo "ok";
}
if($boton== 'actualizarusuario' )
    { 
        $id_usuario=$_POST['id_usuario1'];
        $id_curso_past=$_POST['id_primary'];
        $nombre_usuario=$_POST['nombre_usuario1'];
        $clave_usuario=$_POST['clave_usuario1'];
        $admin_usuario=$_POST['admin_usuario1'];
       
        $query="UPDATE  usuarios SET id_usuarios='$id_usuario', `NOMBRE`='$nombre_usuario',`CLAVE`='$clave_usuario', `ADMIN`='$admin_usuario' where id_usuarios='$id_curso_past'";
        $resultado= mysqli_query($conn,$query);  

         echo "ok";
     }
?>
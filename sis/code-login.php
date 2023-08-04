<?php

    //INICIALIZAR LA SESION
    session_start();
include "../conecta.php";

    $user=$_POST['user'];
    $pass=$_POST['pass']; 
    //VALIDAR CREDENCIALES
        
        $query = "SELECT id_usuarios,NOMBRE,CLAVE,`ADMIN` FROM usuarios WHERE NOMBRE ='$user' AND CLAVE='$pass' " ;
 
        $resultado= mysqli_query($conn,$query); 
        $doccs=mysqli_fetch_assoc($resultado);

        if($user=$doccs['NOMBRE'] && $pass=$doccs['CLAVE'])
        {
            header("location: sistema.php");
        }
        else{
           
            header("location:javascript://history.go(-1)");

        }
   
    


?>

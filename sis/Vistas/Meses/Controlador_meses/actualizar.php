<?php
include '../../../../conecta.php';
if(isset($_POST))
{

    $id=$_POST['id'];
    $mes=$_POST['mes'];
    $year=$_POST['year'];
    $t_p=$_POST['t_p'];
    $modali=$_POST['modali'];
    $query="UPDATE meses SET mes='$mes', anio='$year', MODALIDAD='$modali' where id_meses='$id'";
    $resultado= mysqli_query($conn, $query);  
    echo "ok";
}

?>
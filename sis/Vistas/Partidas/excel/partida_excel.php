<?php
include('../../../config/conexion.php');//CONEXION A LA BD

header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');

?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    
    <caption class="bold" >PARTIDAS</caption>
    <tr>
              <th>REGISTRO </th>
              <th>CODIGO</th>
              <th>FORMULA</th>
              <th>AUXILIAR</th> 
              <th>FORMULARIO</th>
              <th>NOMBRE</th> 
            </tr>
    <?php
    $query=mysqli_query($conexion,"SELECT p.id_partidas, p.FORMULA, p.CODIGO, p.AUXILIAR, p.FORMULARIO, p.NOMBRE FROM partidas p ");
while($area=mysqli_fetch_array($query))
{
?>

    <tr>
        <td><?php echo $area['id_partidas'] ?></td>
        <td><?php echo $area['CODIGO'] ?></td>
        <td><?php echo $area['FORMULA'] ?></td>
        <td><?php echo $area['AUXILIAR'] ?></td>
        <td><?php echo $area['FORMULARIO'] ?></td>
        <td><?php echo $area['NOMBRE'] ?></td>
    </tr>
    <?php  } ?>
</table>

<?php
include('../../../config/conexion.php');//CONEXION A LA BD

header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');

?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    
    <caption class="bold" >MODALIDADES</caption>
    <tr>
              <th>REGISTRO </th>
              <th>CODIGO</th>
              <th>DESC</th>
              <th>BASD FEDU</th> 
            </tr>
    <?php
    $query=mysqli_query($conexion,"SELECT p.id_modali, p.CODIGO, p.DESC, p.FEDU FROM modali p ");
while($area=mysqli_fetch_array($query))
{
?>

    <tr>
        <td><?php echo $area['id_modali'] ?></td>
        <td><?php echo $area['CODIGO'] ?></td>
        <td><?php echo $area['DESC'] ?></td>
        <td><?php echo $area['FEDU'] ?></td>
    </tr>
    <?php  } ?>
</table>

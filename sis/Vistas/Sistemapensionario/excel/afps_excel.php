<?php
include('../../../config/conexion.php');//CONEXION A LA BD
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');
?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <caption class="bold" >AFPS</caption>
    <tr>
              <th>REGISTRO </th>
              <th>CODIGO</th>
              <th>DESC</th>
              <th>COD2</th> 
    </tr>
    <?php
    $query=mysqli_query($conexion,"SELECT p.id_afps, p.DESC, p.CODIGO,p.COD2 FROM afps p ");
while($area=mysqli_fetch_array($query))
{
?>
    <tr>
        <td><?php echo $area['id_afps'] ?></td>
        <td><?php echo $area['CODIGO'] ?></td>
        <td><?php echo $area['DESC'] ?></td>
        <td><?php echo $area['COD2'] ?></td>
    </tr>
    <?php  } ?>
</table>

<?php
include('../../../config/conexion.php');//CONEXION A LA BD

header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');

?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    
    <caption class="bold" >PROGRAMAS</caption>
    <tr>
              <th>REGISTRO </th>
              <th>NOMBRE</th>
              <th>FORMULA</th>
              <th>DESC</th>      
            </tr>
    <?php
    $query=mysqli_query($conexion,"SELECT p.id_afpxsd,r.id_siafdsct,r.NOMBRE,r.FORMULA,s.DESC,s.id_afps,s.DESC FROM afpxsd p inner join  siafdsct  r on p.id_siafdsct=r.id_siafdsct 
    inner join afps s on p.id_afps=s.id_afps");
while($area=mysqli_fetch_array($query))
{
?>
    <tr>
        <td><?php echo $area['id_siafdsct'] ?></td>
        <td><?php echo $area['NOMBRE'] ?></td>
        <td><?php echo $area['FORMULA'] ?></td>
        <td><?php echo $area['DESC'] ?></td>
    </tr>
    <?php  } ?>
</table>

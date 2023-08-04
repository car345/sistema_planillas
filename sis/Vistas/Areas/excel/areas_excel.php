<?php
include('../../../../conecta.php');//CONEXION A LA BD

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');



?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    
    <caption class="bold" >AREAS</caption>
    <?php
    $query=mysqli_query($conn,"SELECT p.id_areas, p.CODIGO, p.DESC FROM areas p ");
while($area=mysqli_fetch_array($query))
{
?>
    <tr>
        <td><?php echo $area['id_areas'] ?></td>
        <td><?php echo $area['CODIGO'] ?></td>
        <td><?php echo $area['DESC'] ?></td>
    </tr>
    <?php  } ?>
</table>

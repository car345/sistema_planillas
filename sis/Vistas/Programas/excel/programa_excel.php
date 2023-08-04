<?php
include('../../../config/conexion.php');//CONEXION A LA BD

header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');

?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    
    <caption class="bold" >PROGRAMAS</caption>
    <tr>
              <th>REGISTRO </th>
              <th>CODIGO</th>
              <th>DESC</th>
              <th>CODIGO DIVISO</th>      
            </tr>
    <?php
    $query=mysqli_query($conexion,"SELECT p.id_programa,p.CODIGO, p.DESC, p.id_divisio,a.CODIGO as codigo_diviso FROM programa p inner join divisio a on p.id_divisio=a.id_divisio");
while($area=mysqli_fetch_array($query))
{
?>
    <tr>
        <td><?php echo $area['id_programa'] ?></td>
        <td><?php echo $area['CODIGO'] ?></td>
        <td><?php echo $area['DESC'] ?></td>
        <td><?php echo $area['codigo_diviso'] ?></td>
    </tr>
    <?php  } ?>
</table>

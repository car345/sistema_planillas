<?php
include('../../../../conecta.php');//CONEXION A LA BD

header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');

?>
<table border="1" cellpadding="2" cellspacing="0" width="100%">
    
    <caption class="bold" >AREAS</caption>
    <tr>
              <th>REGISTRO </th>
              <th>DESC</th>
              <th>BASD FEDU</th> 
            </tr>
    <?php
    $query=mysqli_query($conn,"SELECT p.id_categori, p.BASFEDU, p.DESC FROM categori p ");
while($area=mysqli_fetch_array($query))
{
?>

    <tr>
        <td><?php echo $area['id_categori'] ?></td>
        <td><?php echo $area['DESC'] ?></td>
        <td><?php echo $area['BASFEDU'] ?></td>
    </tr>
    <?php  } ?>
</table>

  <?php 
//Aquí se encuentra la tabla dinámica con su respectivo id para reconocerlo en el script table.js

include '../../../conecta.php';
include '../Plantillas/encabezado.php';
$total=0.00;

  $mes =$_GET['mes'];
  $estado=$_GET['es'];
?>

<main id="main" class="main">


<div class="pagetitle">
      <h1>Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Importes</li>
        </ol>
      </nav>
  </div><!-- Fin Titulo -->
  
  <div class="row row-cols-3">

<?php    

  $sqlmes = "SELECT a.id_meses, a.MES as mes, a.anio as yeara, a.id_tiplanil, t.id_tiplanil, t.DESC as descr FROM meses a 
  inner join tiplanil  t on a.id_tiplanil=t.id_tiplanil where a.id_meses='$mes';";
  $sql_mes = mysqli_query($conn, $sqlmes); 
  $G = mysqli_fetch_array($sql_mes);

?>
        <div class="col-sm-2">
          <label class="fw-bold col-sm-5"for="">Mes</label>
            <input  style="height: 28px; text-transform:uppercase" class="form-control" type="text" disabled value="<?php setlocale(LC_ALL, 'esp');
                   $monthNum  = $G['mes'];
                   $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                   $monthName = strftime('%B', $dateObj->getTimestamp());
                   echo $monthName;?>"></label>
          </div>
          <div class="col-sm-5">
            <label class="fw-bold "for="">Año</label><input style="height: 28px;" class="form-control" type="text" disabled value="<?php echo $G['yeara']; ?>">
          </div>            
          <div class="col-sm-5">
            <label class="fw-bold "for="">Tipo de planilla</label><input style="height: 28px; text-transform:uppercase;" class="form-control" type="text" disabled value="<?php echo $G['descr']; ?>">
          </div>            
        </div>
        <br>
    
      <table class="table table-bordered">
        <thead class="table bg-primary text-white fw-bold text-center">
          <tr>
            <td> CODIGO </td>
            <td> DESCRIPCIÓN </td>
            <td> DETALLE </td>
            <td> IMPORTE </td>
            <td> <?php  if($estado=='1')
            {?>Ver<?php }else{?> Modificar <?php } ?></td>
          </tr>
        </thead>
        <tbody>
<?php    
  $queryH = "SELECT REGISTRO, CODIGO, DESCT, APORTE,DETALLE FROM descuentos ORDER BY CODIGO";                          
  $evento = mysqli_query($conn,$queryH) or die("database error:". mysqli_error($conn));;

  while($helps= mysqli_fetch_assoc($evento)){
  $b=$helps['CODIGO'];
  $report="SELECT sum(IMPORTE) AS IMPORTES FROM reportxplanilla where REGMES='$mes' and PROPOR='2' and CODIGO='$b' ";
  $eventos = mysqli_query($conn,$report) or die("database error:". mysqli_error($conn));
  $re=mysqli_fetch_assoc($eventos);
//     $b=$helps['CODIGO'];
//     $c= $helps['DESCT'];
//     $d= $helps['DETALLE'];
//     $e= $helps['APORTE'];

// $INSERT="INSERT INTO descuentos(CODIGO, DESCT, APORTE, DETALLE) VALUES ('$b','$c','$e','$d')";
// $eventos = mysqli_query($conn,$INSERT) or die("database error:". mysqli_error($conn));;

?>
<tr> 
            <td class="text-center"><?php echo $helps['CODIGO'];?></td>
            <td class="text-center"><?php echo $helps['DESCT'];?></td>
            <td class="text-center"><?php echo $helps['DETALLE'];?></td>
            <td class="text-center"><?php if(isset($re['IMPORTES']))
            {
              echo round((double)$re['IMPORTES'],2);
            }else{
              echo '0.00';
            } ?></td>
            <td class="text-center">
              <a href="desc_perso.php?cod=<?php echo $helps['CODIGO'];?>&mes=<?php echo $mes;?>&DESCT=<?php echo $helps['DESCT'];?>&es=<?php echo $estado;?>"><?php  if($estado=='1')
            {?>Ver<?php }else{?> Registrar <?php } ?></a>
            </td>
          
          </tr>
<?php }  ?>

      </tbody>
      </table>

<?php
  include_once '../Plantillas/footer2.php';
?>


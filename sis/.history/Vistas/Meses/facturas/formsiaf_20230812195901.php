
<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
    $totalf=0;
 //print_r($configuracion);
 $mes=$_GET['m']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<style>
	body {
	font-family: Roboto, Arial, sans-serif;

	margin: 0;
	padding: 5px  20px 0 20px;
} 
	</style>
<body>

<div id="page_pdf">
	<table>
	<tr><th    colspan="70">  UNIVERSIDAD NACIONAL <span>   "HERMILIO VALDIZAN" - HUÀNUCO</span>  </th> </tr>
    <tr><th   class="center"   colspan="80">  FORMULARIO DE  <span> ABONO BANCOS  </span>  </th> </tr>

		<tr> 
        <td></td>    
        <td  class="center" colspan="60"  >Correspondiente al mes :
			<?php
$mesesEnEspanol = array(
    '1' => 'enero',
    '2' => 'febrero',
    '3' => 'marzo',
    '4' => 'abril',
    '5' => 'Mayo',
    '6' => 'junio',
    '7' => 'julio',
    '8' => 'agosto',
    '9' => 'SETIEMBRE',
	'01' => 'enero',
    '02' => 'febrero',
    '03' => 'marzo',
    '04' => 'abril',
    '05' => 'mayo',
    '06' => 'junio',
    '07' => 'julio',
    '08' => 'agosto',
    '09' => 'Setiembre',
    '10' => 'octubre',
    '11' => 'noviembre',
    '12' => 'diciembre'
);
$mesmysql = mysqli_query($conn, "SELECT * FROM meses WHERE id_meses ='$mes'");
$mesac = mysqli_fetch_assoc($mesmysql);
$monthNum = $mesac['MES'];
$monthName = $mesesEnEspanol[$monthNum];
echo $monthName.' '.$mesac['anio'];

?></td>
			</tr>
            <?php 
            $ars=array();
           $ar=array();
            $siaf="SELECT DISTINCT CODIGO FROM partidas where CODIGO IN ('221111','221121') ";
                  $conx=$conn ->query($siaf);
                  while($result=$conx->fetch_assoc())
                {
                    $ar[]=$result;
                }
               
                $siafS="SELECT DISTINCT CODIGO,DESCT FROM divisio where DESCT IN ('SIAF') ";
                $conxS=$conn ->query($siafS);
                while($results=$conxS->fetch_assoc())
              {
                  $ars[]=$results;
              }
             
            ?>
			<tbody>
                <tr></tr>
                <tr></tr>
     <td >PARTIDAS</td>
     <?php
      foreach($ars as $ps) 
        {    
            
     
            
        
        ?>
      
        <td colspan="10"> <?php echo $ps['CODIGO']; ?></td>
      
        <?php 
        }
     ?>
       <td colspan="10">TOTAL</td>
     <?php
      foreach($ar as $p) 
        {    
            
     
            
        
        ?>
        <tr>
        <td> <?php echo $p['CODIGO']; ?></td>
        </tr>
        <?php 
        }
     ?>
<td>TOTALES</td>
</tbody>
	</table>
</div>
</body>
</html>

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
	<tr>
  <th colspan="5"></th>  
  <th    colspan="100">  UNIVERSIDAD NACIONAL <span>   "HERMILIO VALDIZAN" - HUÀNUCO</span>  </th> </tr>
    <tr>
    <th colspan="10"></th>  
      <th   class="center"   colspan="80">  FORMULARIO DE  <span> ABONO BANCOS  </span>  </th> </tr>

		<tr> 
    <th colspan="9"></th>  
        <td colspan="10"></td>    
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
            $siaf="SELECT DISTINCT CODIGO FROM partidas where CODIGO IN ('221111') ";
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
     <td  style="font-size:13px; font-weight: bold;">PARTIDAS</td>
     <?php
      foreach($ars as $ps) 
        {    
            
     
            
        
        ?>
      <td></td>
      <td colspan="10"></td>
        <td colspan="10" style="font-size:13px; font-weight: bold;" > <?php echo $ps['CODIGO']; ?></td>
        <td colspan="10"></td>
        <?php 
        }
     ?>
       <td colspan="10" style="font-size:13px; font-weight: bold;">TOTAL</td>
     
     <?php
      foreach($ar as $p) 
        {    
            
          $finaltotali="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where REGMES='$mes' and r.PROPOR='0'  and DESCT not in('cbonoesp','homog.doc')";
          $sqlfinaly=$conn->query($finaltotali);
          $sqlfinalfetch=$sqlfinaly->fetch_assoc();
   
          $finaltotali1="SELECT sum(IMPORTE) as finalimporte1 FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where REGMES='$mes' and r.PROPOR='2'  and DESCT not in('cbonoesp','homog.doc')";
          $sqlfinaly1=$conn->query($finaltotali1);
          $sqlfinalfetch1=$sqlfinaly1->fetch_assoc();
          
          $finaltotali11="SELECT SUM(r.IMPORTE) AS finalimporte1
          FROM reportxplanilla r
          INNER JOIN datperso d ON r.REGPERSO = d.id_datperso
          WHERE r.REGMES = '$mes' 
            AND r.PROPOR = '2'
            AND r.DESCT LIKE '%AGUINALDO%'";
          $sqlfinaly11=$conn->query($finaltotali11);
          $sqlfinalfetch11=$sqlfinaly11->fetch_assoc();
            
        
        ?>

        <tr><tr></tr></tr>
        <tr>
        <td style="font-size:13px; "> <?php echo $p['CODIGO']; ?></td>
        <td  colspan="11"></td>
        <td style="font-size:13px;">
        <?php echo round($sqlfinalfetch['finalimporte']-$sqlfinalfetch1['finalimporte1'],2);?></td>
        <td  colspan="11"></td>
        <td  colspan="08"></td>
        <td style="font-size:13px;"><?php echo round($sqlfinalfetch['finalimporte']-$sqlfinalfetch1['finalimporte1'],2);?></td>
        </tr>
        <?php 
        }
     ?>

<tr></tr>
                <tr></tr>
                <?php 
            $ars=array();
           $ar=array();
            $siaf="SELECT DISTINCT CODIGO FROM partidas where CODIGO IN ('221121') ";
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
    
     
     <?php
      foreach($ar as $p) 
        {    
            
          $finaltotali="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where REGMES='$mes' and r.PROPOR='0'  and DESCT not in('cbonoesp','homog.doc')";
          $sqlfinaly=$conn->query($finaltotali);
          $sqlfinalfetch=$sqlfinaly->fetch_assoc();
   
          $finaltotali1="SELECT sum(IMPORTE) as finalimporte1 FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where REGMES='$mes' and r.PROPOR='2'  and DESCT not in('cbonoesp','homog.doc')";
          $sqlfinaly1=$conn->query($finaltotali1);
          $sqlfinalfetch1=$sqlfinaly1->fetch_assoc();
          
          $finaltotali11="SELECT SUM(r.IMPORTE) AS finalimporte1
          FROM reportxplanilla r
          INNER JOIN datperso d ON r.REGPERSO = d.id_datperso
          WHERE r.REGMES = '$mes' 
            AND r.PROPOR = '2'
            AND r.DESCT LIKE '%AGUINALDO%'";
          $sqlfinaly11=$conn->query($finaltotali11);
          $sqlfinalfetch11=$sqlfinaly11->fetch_assoc();
            
        
        ?>

        <tr><tr></tr></tr>
        <tr>
        <td style="font-size:13px; "> <?php echo $p['CODIGO']; ?></td>
        <td  colspan="11"></td>
        <td style="font-size:13px;">
        <?php echo number_format(round($sqlfinalfetch11['finalimporte1'],2),2);?>
        <td  colspan="11"></td>
        <td  colspan="08"></td>
        <td style="font-size:13px;"><?php echo number_format(round($sqlfinalfetch11['finalimporte1'],2),2);?></td>
        </tr>
        <?php 
        }
     ?>
<tr></tr>
<tr></tr>
<tr></tr>
          <td style="font-size:13px;">TOTALES</td>
          <td  colspan="11"></td>
          <td style="font-size:13px;"> <?php echo round(($sqlfinalfetch['finalimporte']-$sqlfinalfetch1['finalimporte1'])-$sqlfinalfetch11['finalimporte1'] ,2);?></td>
          <td  colspan="19"></td>
          <td style="font-size:13px;"> <?php echo round(($sqlfinalfetch['finalimporte']-$sqlfinalfetch1['finalimporte1'])-$sqlfinalfetch11['finalimporte1'] ,2);?></td>
</tbody>
	</table>
</div>
</body>
</html>
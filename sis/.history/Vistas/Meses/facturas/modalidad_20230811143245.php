<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
	$totals 		= 0;
	$mes=$_GET['m'];
	$totrx=0;
	$totry=0;
	$totrz=0;
	$totrx1=0;
	$totry1=0;
	$totrz1=0;
 //print_r($configuracion); ?>
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
}  .header {
        position: fixed;
        top: -50px;
        left: 0;
        right: 0;
        height: 50px;
        text-align: center;
        font-size: 14px;
        color: #333;
    }
	</style>
<body>

<div id="page_pdf">
	
<div class="header">
	<p>ad</p>
</div>
	<table >
		
	
	
	<br>
		<thead>
				<tr>
					<td style="font-size:12px; font-weight:bold"  colspan="2">CODIGO</td>
					<td style="font-size:12px; font-weight:bold" colspan="10" >DESCRIPCIÓN</td>
					<td style="font-size:12px; font-weight:bold " colspan="3" >PENSIONISTAS</td>
					<td colspan="5"> </td>
					<td style="font-size:12px; font-weight:bold"  colspan="15" >VIUDEZ</td>
					<td style="font-size:12px; font-weight:bold"  colspan="15" >ORFANDAD</td>
					<td style="font-size:12px; font-weight:bold"  colspan="" >TOTAL</td>
				</tr>
				</thead>
			<tbody>
			<?php
			$array=array();
			$arreglo=array(1,3,21);
			$arraydesc=array();
			$query = mysqli_query($conn,"SELECT DISTINCT CODIGO,DESCT
			FROM reportxplanilla
			WHERE REGMES = '$mes' AND (PROPOR = '1' OR PROPOR = '0') ORDER BY CODIGO ");
	
			while($result=$query->fetch_assoc())
			{
				$array[]=$result;
			}
			
					foreach($array as $row){
			 ?>
				<tr>
				   <?php if($row['DESCT']=='sobrevive')
				   {   }else {  
					$codigo =$row['DESCT'];

					$queryx = mysqli_query($conn,"SELECT sum(p.IMPORTE)as tots FROM reportxplanilla p inner join datperso d on p.REGPERSO=d.id_datperso inner join modali m on d.id_modali=m.id_modali WHERE p.REGMES='$mes' AND p.DESCT='$codigo' AND m.id_modali='1'");
					$queryy = mysqli_query($conn,"SELECT sum(p.IMPORTE)as tots1 FROM reportxplanilla p inner join datperso d on p.REGPERSO=d.id_datperso inner join modali m on d.id_modali=m.id_modali WHERE p.REGMES='$mes' AND p.DESCT='$codigo' AND m.id_modali='3'");
					$queryz = mysqli_query($conn,"SELECT sum(p.IMPORTE)as tots2 FROM reportxplanilla p inner join datperso d on p.REGPERSO=d.id_datperso inner join modali m on d.id_modali=m.id_modali WHERE p.REGMES='$mes' AND p.DESCT='$codigo' AND m.id_modali='21'");
					$resultx=$queryx->fetch_assoc();
					$resulty=$queryy->fetch_assoc();
					$resultz=$queryz->fetch_assoc();
					if (is_numeric($resultx)||is_numeric($resulty)||is_numeric($resultz)) {
						 }
						 else{
						
						 }

						 if($row['DESCT']=='BASICO')
						 {
							echo ' <tr ><td  colspan="2 " style="font-size:12px; font-weight:bold;"> Renumeraciones</td></tr>';
						 }
					?>
					<td  style="font-size:12px;" colspan="2"><?php echo $row['CODIGO']; ?></td>
					<td style="font-size:12px" colspan="10"><?php echo $row['DESCT']; ?></td>
					<td style="font-size:12px" colspan="3"><?php echo number_format($resultx['tots'],2); ?></td>
					<td colspan="5"> </td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($resultz['tots2'],2); ?></td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($resulty['tots1'],2); ?></td>
					<td style="font-size:12px"><?php  
					$totren=0.00;
					$totren=round((float)$resultx['tots'],2)+round((float)$resulty['tots1'],2)+round((float)$resultz['tots2'],2);
					$totren=(float)$totren; ;echo number_format($totren,2); ?></td>
					$total=$total+$totren;
					<?php
					$totrx=$totrx + (double)$resultx['tots'];
					$totry=$totry + (double)$resulty['tots1'];
					$totrz=$totrz + (double)$resultz['tots2'];
				 }   ?>
				</tr>
			<?php	
					}
					$total = $totrx+ $totry+$totrz;
			?>
			<tr>
					<td   style="font-size:12px;" colspan="2"><?php echo '1999' ?></td>
					<td  style="font-size:12px" colspan="1"><?php echo 'TOTAL'  ?></td>
					<td colspan="9"></td>
				
					<td style="font-size:12px"colspan="3"> <?php echo number_format($totrx,2); ?></td>
					<td colspan="5"> </td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($totry,2); ?></td>
					<td style="font-size:12px" colspan="15	"><?php echo number_format($totrz,2); ?></td> 
					<td style="font-size:12px" colspan="5" ><?php echo  number_format($total,2); ?></td>
			</tr>
			<tr><td style="font-size:12px; font-weight:bold;">
				Descuentos
			</td></tr>
			<?php 	
			$querydesc = mysqli_query($conn,"SELECT * FROM `descuentos` ORDER BY CODIGO");
	
	while($result3=$querydesc->fetch_assoc())
	{
		$arraydesc[]=$result3;
	}
	
	foreach($arraydesc as $desc){
		$codigos =$desc['CODIGO'];

					$queryx1 = mysqli_query($conn,"SELECT sum(p.IMPORTE)as tots3 FROM reportxplanilla p inner join datperso d on p.REGPERSO=d.id_datperso inner join modali m on d.id_modali=m.id_modali WHERE p.REGMES='$mes' AND p.CODIGO='$codigos' AND m.id_modali='1'");
					$queryy2 = mysqli_query($conn,"SELECT sum(p.IMPORTE)as tots4 FROM reportxplanilla p inner join datperso d on p.REGPERSO=d.id_datperso inner join modali m on d.id_modali=m.id_modali WHERE p.REGMES='$mes' AND p.CODIGO='$codigos' AND m.id_modali='3'");
					$queryz3 = mysqli_query($conn,"SELECT sum(p.IMPORTE)as tots5 FROM reportxplanilla p inner join datperso d on p.REGPERSO=d.id_datperso inner join modali m on d.id_modali=m.id_modali WHERE p.REGMES='$mes' AND p.CODIGO='$codigos' AND m.id_modali='21'");
					
					$resultx1=$queryx1->fetch_assoc();
					$resulty2=$queryy2->fetch_assoc();
					$resultz3=$queryz3->fetch_assoc();

	if($desc['CODIGO']=='2401' || $desc['CODIGO']=='3005' ||$desc['CODIGO']=='3006'||$desc['CODIGO']=='3012'||$desc['CODIGO']=='3022'||$desc['CODIGO']=='3023'||$desc['CODIGO']=='3024')
	{
	?>

		<tr>
					<td  style="font-size:12px;" colspan="2"><?php echo $desc['CODIGO']; ?></td>
					<td style="font-size:12px" colspan="10"><?php echo $desc['DESCT']; ?></td>
					<td style="font-size:12px" colspan="3"><?php echo number_format($resultx1['tots3'],2); ?></td>
					<td colspan="5"> </td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($resultz3['tots5'],2); ?></td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($resulty2['tots4'],2); ?></td>
					<td style="font-size:12px"><?php  
					$totren1=0.00;
					$totren1=round((float)$resultx1['tots3'],2)+round((float)$resulty2['tots4'],2)+round((float)$resultz3['tots5'],2);
					$totren1=(float)$totren1; ;echo number_format($totren1,2); ?></td>
		</tr>
		
<?php 

$totrx1+= (double) $resultx1['tots3'];
$totry1+= (double) $resulty2['tots4'];
$totrz1+= (double) $resultz3['tots5'];

} else if($desc['CODIGO']=='3027')
		{
		?>	
		<td  style="font-size:12px;" colspan="2"><?php echo $desc['CODIGO']; ?></td>
					<td style="font-size:12px" colspan="10"><?php echo $desc['DESCT']; ?></td>
					<td style="font-size:12px" colspan="3"><?php echo number_format($resultx1['tots3'],2); ?></td>
					<td colspan="5"> </td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($resultz3['tots5'],2); ?></td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($resulty2['tots4'],2); ?></td>
					<td style="font-size:12px">0.00</td>
		<?php 
		}
} 
$totals = $totrx1+ $totry1+$totrz1;?>
<tr>
					<td   style="font-size:12px;" colspan="2"><?php echo '3999' ?></td>
					<td  style="font-size:12px" colspan="1"><?php echo 'TOTALDESC.'  ?></td>
					<td colspan="9"></td>
				
					<td style="font-size:12px"colspan="3"> <?php echo number_format($totrx1,2); ?></td>
					<td colspan="5"> </td>
					
					<td style="font-size:12px" colspan="15	"><?php echo number_format($totrz1,2); ?></td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($totry1,2); ?></td> 
					<td style="font-size:12px" colspan="5" ><?php echo  number_format($totals,2); ?></td>
			</tr>
			<tr ><td  colspan="2 " style="font-size:12px; font-weight:bold;"> Liquido a Pagar</td></tr>
			<tr>
					<td   style="font-size:12px;" colspan="2"><?php echo '4999' ?></td>
					<td  style="font-size:12px" colspan="1"><?php echo 'NETO A PERCIBIR.'  ?></td>
					<td colspan="9"></td>
				
					<td style="font-size:12px"colspan="3"> <?php echo number_format($totrx + $totrx1,2); ?></td>
					<td colspan="5"> </td>
					<td style="font-size:12px" colspan="15"><?php echo number_format($totry + $totrz1,2); ?></td>
					<td style="font-size:12px" colspan="15	"><?php echo number_format($totrz + $totry1,2); ?></td> 
					<td style="font-size:12px" colspan="5" ><?php echo  number_format($total+$totals,2); ?></td>
			</tr>
			</tbody>
		
	</table>
	
</div>
</body>
</html>
<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
	$mes=$_GET['m'];
	$totrx=0;
	$totry=0;
	$totrz=0;
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
}
	</style>
<body>

<div id="page_pdf">
	
	<table >
	<tr><th style=" font-size:15px; font-weight: normal; "   colspan="65" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
	<tr><th style=" font-size:14px; font-weight: normal;"   colspan="60" >Resumen General correspondiente del mes:Enero del año 2023</th> </tr>
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
			$querydesc = mysqli_query($conn,"SELECT * FROM `reportxplanilla` WHERE REGMES='$mes' AND (PROPOR='2') ");
	
	while($result3=$querydesc->fetch_assoc())
	{
		$arraydesc[]=$result3;
	}
	echo print_r($arraydesc);
	foreach($arraydesc as $desc){
	?>
					<tr>
					<td> <?php  echo $?></td>

		
		
		
		</tr>
<?php  } ?>
			</tbody>
		
	</table>
	
</div>
</body>
</html>
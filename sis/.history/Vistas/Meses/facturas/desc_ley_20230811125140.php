<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
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


	<table  >
	<tr><th style=" font-size:15px; font-weight: normal; "   colspan="65" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
	<tr><th style=" font-size:14px; font-weight: normal;"   colspan="60" >Descuentos de Ley del Mes de Enero 2023</th> </tr>
	<br>
	<tr><td style="justify-content:center; font-size:13px;"   colspan="5" > <span  >Sistema Pensionario : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  ESSALUD-CES</td> </tr>
	<br>
		<thead>
				<tr>
					<td style="font-size:10px; font-size:normal;"colspan="1"   >Num</td>
			
					<td style="font-size:10px; "  >Apellidos</td>
					<td style="font-size:10px;  "colspan="3" >Nombre.</td>
					<td style="font-size:10px; "  colspan="20">CÓDIGO AFP.</td>
					<td style="font-size:10px; "  colspan="22">CÓDIGO IPSS.</td>
					<td style="font-size:10px; "  colspan="13">DESC. LEY</td>
				</tr>
				</thead>
			<tbody>
			<?php
			$array=array();
				$desc="SELECT d.NUMERO_DOC,d.NOMBRE,d.APELLIDOS,d.CODIGO_IPS,d.CODIGO_AFP,d.id_datperso FROM reportxplanilla p inner join datperso d  on p.REGPERSO=d.id_datperso
				 where REGMES='$mes' and PROPOR='2' ";
				 $resdesc=$conn->query($desc);
				 while($fila=$resdesc->fetch_assoc())
				 {
					$array[]=$fila;
				 }


$i=1;
				 foreach($array as $descuento)
				 {
					$result=$descuento['id_datperso'];
					$descu="SELECT sum(p.IMPORTE) as importe FROM reportxplanilla p inner join datperso d  on p.REGPERSO=d.id_datperso
					where REGMES='$mes' and REGPERSO='$result' AND PROPOR='2' ";
				 	 $resdescu=$conn->query($descu);
					  $filas=$resdescu->fetch_assoc();
					  $importe=$filas['importe'];
					  $total+=$importe;
			 ?>
				<tr>
				
					<td style="font-size:10px" ><?php echo $i; $i++;?></td>
					<td style="font-size:10px"  ><?php echo $descuento['APELLIDOS']; ?></td>
					<td style="font-size:10px"colspan="" ><?php echo $descuento['NOMBRE']; ?></td>
				
	
					<td style="font-size:10px"colspan="20"><?php echo $descuento['CODIGO_AFP']; ?></td>
					<td style="font-size:10px" colspan="25"><?php echo $descuento['CODIGO_IPS']; ?></td>
					<td style="font-size:10px"colspan="2"><?php echo number_format($importe,2); ?></td>
			
	</tr>
			<?php	
					}
	
			?>
			<tr>
				<td colspan="37" ></td>
				<td colspan="15" style="font-size:10px"> TOTALES: <?php echo number_format($total,2); ?></td>
			</tr>
			</tbody>
		
	</table>
	
</div>
</body>
</html>
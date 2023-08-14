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
	
		
	</table>
	
</div>
</body>
</html>
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
	<tr><th style=" font-size:15px; font-weight: normal; "   colspan="75" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
	<tr><th style=" font-size:14px; font-weight: normal;"   colspan="70" >Descuentos de Ley del Mes de Enero 2023</th> </tr>
	<br>

	<br>
		<thead>
            <tr> 
                <td> DNI:</td>
            </tr>
            <tr>
                <td>APELLIDOS</td>
                <td>NOMBRES</td>
            </tr>
				</thead>
	
		
	</table>
	
</div>
</body>
</html>
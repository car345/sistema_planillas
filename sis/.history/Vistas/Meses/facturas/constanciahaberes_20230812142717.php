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
                <td  style=" font-size:12px; font-weight: normal; "> DNI:</td>
            </tr>
            <tr>
                
                <td  style=" font-size:12px; font-weight: normal; ">APELLIDOS</td>
                <td  style=" font-size:12px; font-weight: normal; ">NOMBRES</td>
                
            </tr>
				</thead>
                <br>
                <thead style='border:.5px solid black '>
                <tr>
            <td style=" font-size:12px; font-weight: normal; ">Mes:</td>
            <td style=" font-size:12px; font-weight: normal; ">Categoria</td>
            <td style=" font-size:12px; font-weight: normal; ">Afiliado</td>

        </tr>
                </thead>

	<tbody '>

        
     
    </tbody>
		
	</table>
	
</div>
</body>
</html>
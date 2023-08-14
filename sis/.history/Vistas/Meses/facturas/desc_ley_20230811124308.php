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
<body>

<div id="page_pdf">


	<table  >
	<tr><th style=" font-size:15px; font-weight: normal; "   colspan="65" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
	<tr><th style=" font-size:14px; font-weight: normal;"   colspan="60" >Descuentos de Ley del Mes de Enero 2023</th> </tr>
	<br>
	<tr><td style="justify-content:center; font-size:13px;"   colspan="5" > <span>Sistema Pensionario :  ESSALUD-CES</td> </tr>
	<br>
		<thead>
				<tr>
					<td style="font-size:9px; font-size:normal;"colspan="1"   >Num</td>
			
					<td style="font-size:9px; "  >Apellidos</td>
					<td style="font-size:9px;  "colspan="3" >Nombre.</td>
					<td style="font-size:9px; "  colspan="20">Codigo Afp.</td>
					<td style="font-size:9px; "  colspan="19">Codigo IPSS.</td>
					<td style="font-size:9px; "  colspan="13">Des Ley</td>
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
			 ?>
				<tr>
				
					<td style="font-size:9px" ><?php echo $i; $i++;?></td>
					<td style="font-size:9px"  ><?php echo $descuento['APELLIDOS']; ?></td>
					<td style="font-size:9px"colspan="" ><?php echo $descuento['NOMBRE']; ?></td>
				
	
					<td style="font-size:9px"colspan="20"><?php echo $descuento['CODIGO_AFP']; ?></td>
					<td style="font-size:9px" colspan="22"><?php echo $descuento['CODIGO_IPS']; ?></td>
					<td style="font-size:9px"colspan="2"><?php echo $importe; ?></td>
			
	</tr>
			<?php	
					}
	
			?>
			</tbody>
		
	</table>
	
</div>
</body>
</html>
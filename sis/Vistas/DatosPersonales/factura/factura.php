<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
 //print_r($configuracion); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="page_pdf">
	<table id="factura_head">
		<tr>
		<!-- <td class="logo_factura">
				<div>
					<img style="width:100px;" src="./img/logo.png">
				</div>
			</td> -->
			<td class="info_empresa">
			
				<div>
					<span style="justify-content:center"  class="h2">UNIVERSIDAD NACIONAL HERMILIO VALDIZAN</span>
					<p>DATOS PERSONALES DE TRABAJADORES</p>	
				</div>
				<?php
				date_default_timezone_set('America/Lima');
				 ?>
			</td>

		</tr>
	</table>

	<table  >
		<thead>
				<tr>
					<td style="font-size:12px; font-weight:bold"  >DNI</td>
					<td style="font-size:12px; font-weight:bold " >NOMBRE.</td>
					<td style="font-size:12px; font-weight:bold"  >APELLIDOS</td>
					<td style="font-size:12px; font-weight:bold"  >SEXO</td>
					<td style="font-size:12px; font-weight:bold"  >Fecha Naci.</td>
					<td style="font-size:12px; font-weight:bold"  >Codigo Afp.</td>
					<td style="font-size:12px; font-weight:bold"  >Codigo Ips.</td>
					<td style="font-size:12px; font-weight:bold"  >Fecha Ing.</td>
					<td style="font-size:12px; font-weight:bold"  >AFP</td>
					<td style="font-size:12px; font-weight:bold"  >CtaCte</td>
				</tr>
				</thead>
			<tbody>
			<?php
					while ($row = mysqli_fetch_assoc($query)){
			 ?>
				<tr>
				
					<td  style="font-size:12px;"><?php echo $row['NUMERO_DOC']; ?></td>
				
					<td style="font-size:12px"><?php echo $row['NOMBRE']; ?></td>
					<td style="font-size:12px"><?php echo $row['APELLIDOS']; ?></td>
					<td style="font-size:12px"><?php echo $row['SEXO']; ?></td>
					<td style="font-size:12px"><?php echo $row['fecha']; ?></td>
					<td style="font-size:12px"><?php echo $row['CODIGO_AFP']; ?></td>
					<td style="font-size:12px"><?php echo $row['CODIGO_IPS']; ?></td>
					<td style="font-size:12px"><?php echo $row['fecha_ing']; ?></td>
					<td style="font-size:12px"><?php echo $row['DESC']; ?></td>
					<td style="font-size:12px"><?php echo $row['CTA_CTE']; ?></td>
					
				</tr>
			<?php	
					}
	
			?>
			</tbody>
		
	</table>
	
</div>
</body>
</html>
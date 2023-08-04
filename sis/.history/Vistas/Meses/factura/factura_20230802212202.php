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
	<title>Facturass</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php echo $anulada; ?><img src="data:image/svg+xml;base64,' . base64_encode($svg) . '" ...>
<div id="page_pdf">
	<table id="factura_head">
		<tr>
		<td class="logo_factura">
				<div>
					<img style="width:200px;" src="../../../img/resacademy.png">
				</div>
			</td>
			<td class="info_empresa">
			
				<div>
					<span class="h2">Empresa de Cursos Online ResAdemy</span>
					<p>Jr. Constituci0on /CEL.96212345 - 964123124</p>
					<p>AV. JR FONAVI II 435 /CEL. 984978988</p>		
				</div>
				<?php
				date_default_timezone_set('America/Lima');
				 ?>
			</td>
			<td class="info_factura " >
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: <strong><?php echo $factura['id_venta']; ?></strong></p>
					<p>Fecha: <?php echo $factura['fecha']; ?></p>
					<p>Hora: <?=date(' g:ia');?></p>
					
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3" >Cliente</span>
					<table class="datos_cliente">
						<tr>
							<td><label>Dni:</label><p><?php echo $factura['dni_usuario']; ?></p></td>
							<td><label>Teléfono:</label> <p><?php echo $factura['telefono']; ?></p></td>
						</tr>
						<tr>
							<td><label>Nombre:</label> <p><?php echo $factura['nombre']; ?></p></td>
						
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle" >
			<thead>
				<tr>
					<th width="50px">Curso.</th>
					<th class="textleft"> ------</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

			<?php

				if($result_detalle > 0){

					while ($row = mysqli_fetch_assoc($query_productos)){
			 ?>
				<tr>
				
					<td><?php echo $row['nombre']; ?></td>
					<td class="textright"><?php echo "--------"?></td>
					<td class="textright"><?php echo $row['precio']; ?></td>
					<td class="textright"><?php echo $row['precio']; ?></td>
				</tr>
			<?php
						$precio_total = $row['precio'];
						$subtotal = round($subtotal + $precio_total, 2);
					}
				}

				$impuesto 	= round($subtotal * (18/ 100), 2);
				$tl_sniva 	= round($subtotal - $impuesto,2 );
				$total 		= round($tl_sniva + $impuesto,2);
			?>
			</tbody>
			<tbody id="detalle_productos">

		</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
					<td class="textright"><span><?php echo $tl_sniva; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>IVA (0.18 %)</span></td>
					<td class="textright"><span><?php echo $impuesto; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span><?php echo $total; ?></span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>
</div>
</body>
</html>
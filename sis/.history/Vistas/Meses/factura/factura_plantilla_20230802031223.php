<?php
$path = './img/Unheval.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/png' . $type . ';base64,' . base64_encode($data);
$total= 0;
$descuentot= 0;
$dats=0.00;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Boleta de Pago </title>
    <link rel="stylesheet" href="./style.css">
</head>
<style>
	@import url('fonts/BrixSansRegular.css');
@import url('fonts/BrixSansBlack.css');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body {
  font-family: Arial, sans-serif;

  margin: 0;
  padding: 20px;
}
p, label, span, table{
	font-family: 'BrixSansRegular';
	font-size: 8.5pt;
	margin: 0;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'BrixSansBlack';
	font-size: 12pt;
	display: block;
	background: #058167;
	color: #FFF;
	text-align: center;
	padding: 3px;
	margin-bottom: 5px;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 8px;
}
.logo_factura{
	width: 25%;
}
.info_empresa{
	width: 50%;
	text-align: center;
}
.info_factura{
	width: 25%;
}
.info_cliente{
	width: 100%;
}
.datos_cliente{
	width: 100%;
}
.datos_cliente tr td{
	width: 70%;

}
.datos_cliente{
	padding: 0px 0px 0 8px;
}
.datos_cliente label{
	width: 60px;
	display: inline-block;
	margin-top: 0px;
}
.datos_cliente p{
	display: inline-block;
	font-size: 8.5pt;
}

.textright{
	text-align: right;
}
.textleft{
	text-align: left;
}
.textcenter{
	text-align: center;
}
.round{
	border-radius: 10px;
	border: 1px solid #0a4661;
	overflow: hidden;
	padding-bottom: 15px;
}
.round p{
	padding: 0 4px;
	
}

#factura_detalle{
	border-collapse: collapse;
}
#factura_detalle thead th{
	background: #058167;
	color: #FFF;
	padding: 1px;
}
#detalle_productos tr:nth-child(even) {
    background: #ededed;
}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}
.anulada{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translateX(-50%) translateY(-50%);
}




.boleta {
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

h1 {
  text-align: center;
  margin-bottom: 10px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.datos-personales {
  margin-bottom: 20px;
}

.datos-personales h3 {
  text-align: center;
  margin-bottom: 10px;
}

.datos-row {
  width: 100%;
  border-collapse: collapse;
}

.datos-row td {
  border: 1px solid #ccc;
  padding: 8px;
}

.datos-row td:first-child {
  background-color: #f0f0f0;
}

hr {
  margin-top: 10px;
  margin-bottom: 10px;
  border: 0;
  border-top: 1px solid #ccc;
}

.datos-alumno {
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ccc;
  padding: 8px;
}

th {
  background-color: #f0f0f0;
}

.observaciones {
  margin-top: 20px;
}

.firma {
  text-align: right;
  margin-top: 20px;
}
</style>
<body>

<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
			<div class="logo-header">
			<img src="<?php echo $base64 ?>" width='250' heigth='250	' />
			</div>
			</td>
			<?php
				date_default_timezone_set('America/Lima');
				 ?>
			<td class="info_empresa">
				<div >
					
					<p style="font-size:13px; font-family: 'BrixSansBlack'; text-transform:uppercase;">Av. Universitaria N° 601-607 Pillco Marca 10003</p>
					<p style="font-size:13px; text-transform:uppercase;" > <span style="text-transform:uppercase;">TELÉFONO: </span>  062-591060</p>
					<p style="font-size:13px; "> <span style="text-transform:uppercase;">CORREO: </span> transparencia@unheval.edu.pe</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Boleta de Pago</span>
					<p>No.: <strong>000001</strong></p>
					<p>Fecha: 20/01/2019</p>
					<p>Hora:<?=date(' g:ia');?></p>
		
				</div>
			</td>
		</tr>
	</table>
	
	<table id="factura_cliente">
		<tr>

		</tr>
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3 mx-auto">Cliente</span>
					<table class="datos_cliente">
					<?php
					while ($row = mysqli_fetch_assoc($query)){
			 ?>		
					<tr>
							<td colspan="3" ><label style="font-size:12px; display:flex">COD: </label><p ><?php echo $row['NUMERO_DOC']?></p></td>
							<td colspan="3" style="font-size:12px; display:flex"><label>NOMBRE:</label><p style="font-size:11px;"><?php echo $row['NOMBRE'].' '.$row['APELLIDOS'];?></p></td>
							<td ><label style="font-size:12px;">CTA:</label> <p><?php echo $row['CTA_CTE']?></p></td>
							<td><label style="font-size:12px;">CARGO:</label> <p ><?php echo $row['CARGO']?></p></td>
						
						</tr>
						
						
						<tr>
							<td><label style="font-size:12px;">S.P:</label> <p><?php echo $row['DESCAF']?></p></td>
							<td  ><label>MODA:</label> <p style="font-size:11px;"><?php echo $row['DESCM']?></p></td>
							<td ><label>CATEGORI:</label> <p><?php echo $row['DESCC']?></p></td>
						
						</tr>
						<tr>
							<td colspan="3"><label>ÁREA:</label> <p><?php echo $row['DESCA']?></p></td>
						</tr>
						<?php
					 }
			 		?>	
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle" class="table-bordered">
			<thead>
				
				<tr>
					<th width="50px"></th>
					<th class="textleft" width="200px">RENUMERACIONES</th>
					<th class="textleft" width="100px"></th>
					<th class="textright" width="40px"> PRECIO </th>
				</tr>
			</thead>
			<tbody id="detalle_productos"  >
			<?php
					while ($row1 = mysqli_fetch_assoc($query1)){
			 ?>	
				<tr>
					<?php if($row1['IMPORTE']>0) {?>
				<td class="textcenter"></td>
					<td class="textleft" style="font-size:12px;"><?php
					if($row1['DESCT']=='cbonoesp')
					{
					} else{echo $row1['DESCT']; }	?></td>
	
					<td class="textcenter" style="font-size:12px;">
						
					</td>
					<td class="textright" style="font-size:12px;"><?php 
		
					if ($row1['DESCT'] == 'cbonoesp') {
						// No se realiza ninguna acción
					} else {
						$var = (float)$row1['IMPORTE'];
						echo $row1['IMPORTE'];
						
						if (is_numeric($var)) {
							$dats=  round((float)$row1['IMPORTE'],2);
							$total = $total + $dats;
						} else {
							// El valor no es numérico, puedes manejarlo según tus necesidades
						}
					}	
						?></td>
						
						
				</tr>
				<?php
				}
					 }
				 ?>	
			
			</tbody>
			<tbody id="detalle_total">

			<td colspan="4"><hr></td>
			<tfoot id="detalle_totales">
				<tr >
					<td colspan="3" class="textright"><span>TOTAL:</span></td>
					<td class="textright"><span ><?php echo round($total,3);?></span></td>
				
				</tr>
				<tr style="border: 0.1px solid black;">
				<td colspan="4">
					<!-- <div>

		<h4 class="label_gracias"> Son :<?php echo $total ?></h4>
	</div> -->
	</td>
	</tr>
				<?php
				$datperso="SELECT*FROM datperso where NUMERO_DOC='$cliente'";
				$mysdesc=$conn->query($datperso);
				$valor=mysqli_fetch_assoc($mysdesc);
				$vars=$valor['id_datperso'];

				$descuento="SELECT*FROM reportxplanilla where REGMES='$mes' and REGPERSO='$vars' and PROPOR='2'" ;
                      $descmysql=mysqli_query($conn,$descuento);
                      while($desct=mysqli_fetch_assoc($descmysql))
                      {      
                ?>
				<tr>
				
				<th width="50px"></th>
				<td class="textleft" style="font-size:12px;">
						<?php echo $desct['DESCT'] ?>
				</td>
				<td colspan="2" class="textright" style="font-size:12px;">
						<?php echo $desct['IMPORTE'];
						$descuentot= $descuentot+round((double)$desct['IMPORTE'],2); ?>
				</td>
				<?php  } ?>
				</tr>
				<tr style="border: 0.1px solid black;">
				<td colspan="4">
					<!-- <div>

		<h4 class="label_gracias"> Son :<?php echo $total ?></h4>
	</div> -->
	</td>
	</tr>
				<tr >
					
					<td colspan="3" class="textright" ><span style="font-size:12px;">TOTAL DESCT: </span></td>
					<td class="textright"><span><?php echo round($descuentot,3);?></span></td>
				</tr>
				<tr style="border: 0.1px solid black;">
				<td colspan="4">
					<!-- <div>

		<h4 class="label_gracias"> Son :<?php echo $total ?></h4>
	</div> -->
	</td>
	</tr>
				<tr>
					<td colspan="3" class="textright" style="font-size:12px;" ><span style="font-size:12px;">NETO A PERCIBIR:</span></td>
					<td class="textright" ><span style="background:yellow"><?php echo round(($total-$descuentot),3);?></span></td>
				</tr>
		
		</tfoot>
	</table>
	<div>
		<h4 class="label_gracias">¡Gracias por su labor en la Universidad!</h4>
	</div>
</div>
</body>
</html>
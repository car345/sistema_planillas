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
	<link href="https://fonts.googleapis.com/css?family=Helvetica+Neue|Georgia|Lato|Roboto|Garamond|Open+Sans&display=swap" rel="stylesheet">
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
	font-family: Roboto, Arial, sans-serif;

  margin: 0;
  padding: 20px;
}
p, label, span, table{
	font-family: Roboto, Arial, sans-serif;
	font-size: 9.5pt;
	margin: 0;
	opacity: .8;
}
.h2{
	font-family: Roboto, Arial, sans-serif;
	font-size: 16pt;
}
.h3{
	font-family: Roboto, Arial, sans-serif;
	font-size: 9pt;
	display: block;
	background: #135FB3;
	opacity: .9;
	color: #fff;
	font-weight: bold;
	padding: 3px;
	
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
	padding: 0px 0px 0 
}
.datos_cliente label{
	width: 60px;
	display: inline-block;
	margin-top: 0px;
}
.datos_cliente p{
	display: flex;
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
	background: #135FB3;
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
  
}

h1 {
  text-align: center;
  margin-bottom: 10px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}





.datos-row {
  display: flex;
  justify-content: space-between;
}

.campo {
  flex-basis: 40%;
  margin-bottom: 5px;
}

.campo p {
  margin: 0;
}

hr {
  margin-top: 5px;
  margin-bottom:5px;
  border: 0;
  border-top: 1px solid #ccc;
}

.datos-alumno {
  margin-bottom: 10px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border-bottom: 1px solid #ccc;
  padding: 2px;
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


.ingresos, .descuentos {
  width: 50%;
}

.ingresos {
  background-color: #e5f7e3;
}

.descuentos {
  background-color: #f7e3e5;
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

	<div class="datos-personales">
	<table id="factura_cliente" >

		<tr>
			<td >
				<div class="info_cliente">
					<span class="h3 ">DATOS PERSONALES</span>
					<table class="datos_cliente">
					<?php
					$arreglo= array();
					$datperso="SELECT*FROM datperso where NUMERO_DOC='$cliente'";
					$mysdesc=$conn->query($datperso);
					$valor=mysqli_fetch_assoc($mysdesc);
					$vars=$valor['id_datperso'];
					$descuento="SELECT*FROM reportxplanilla where REGMES='$mes' and REGPERSO='$vars' and PROPOR='2'" ;
					$descmysql=mysqli_query($conn,$descuento);
					$contador=0;
					while($vue=$descmysql->fetch_assoc())
					{
						$arreglo[]=$vue;
					}

					while ($row = mysqli_fetch_assoc($query)){
			 ?>		
					<tr class="campo">
					<td  style="font-size:12px; "><label style="font-weight: bold;">APELLIDOS:</label><p style="font-size:12px;"><?php echo $row['APELLIDOS'];?></p></td>
					<td  style="font-size:12px; "><label style="font-weight: bold;">NOMBRE:</label><p style="font-size:12px;" ><?php echo $row['NOMBRE'];?></p></td>
					<td ><label style="font-size:12px; display:flex; font-weight: bold;">D.N.I: </label><p style="font-size:12px;" class="campo" ><?php echo $row['NUMERO_DOC']?></p></td>
							
							
							
						
						</tr>
						<td ><label style="font-size:12px; display:flex; font-weight: bold;">CTA:</label> <p style="font-size:12px;"><?php echo $row['CTA_CTE']?></p></td>
							<td ><label style="font-size:12px; display:flex; font-weight: bold;">CARGO:</label> <p style="font-size:12px;" ><?php echo $row['CARGO']?></p></td>
							<td><label style="font-size:12px; font-weight: bold;">SIS.PENSIONARIO:</label> <p style="font-size:12px;"><?php echo $row['DESCAF']?></p></td>
						<tr>
							
							<td  ><label style="font-size:13px;font-weight: bold;">MODALIDAD:</label> <p style="font-size:12px;"><?php echo $row['DESCM']?></p></td>
							<td ><label style="font-size:13px;font-weight: bold;">CATEGORÍA:</label> <p style="font-size:12px;"><?php echo $row['DESCC']?></p></td>
							<td colspan="3"><label style="font-size:13px;font-weight: bold;">ÁREA:</label> <p style="font-size:12px;"><?php echo $row['DESCA']?></p></td>
						</tr>
						
						<?php
					 }
			 		?>	
					</table>
				</div>
			</td>

		</tr>
	</table>
</div>

	<table id="factura_detalle" >
			<thead>
				
				<tr>
					
				 	<th width="50px" class="textleft"   >RENUMERACIONES</th>
					<th width="220px"> </th>
					<th style="background:#FFF;border-bottom:none"></th>
					<th class="textleft" >DESCUENTOS</th>
					<th 	width="50px"> </th>
				</tr>
				
			</thead>

			<tbody id="detalle_productos"   >
			<tr>
				
			<td style="font-size: 11px; font-weight: bold">CONCEPTO</td>
			<td class="textright" style="font-size: 11px; font-weight: bold">MONTO</td>
			<td width="5px" style="background: #FFF; border: none"></td>
			<td  style="font-size: 11px; font-weight: bold">CONCEPTO</td>
			<td class="textright" style="font-size: 11px; font-weight: bold">MONTO</td>

			<?php
					while ($row1 = mysqli_fetch_assoc($query1)){
			 ?>	
			<tr>
			<?php if($row1['IMPORTE']>0) {?>
				
					<td  style="font-size:11px;border-bottom:none;"><?php
					if($row1['DESCT']=='cbonoesp')
					{
					} else{echo $row1['DESCT']; }	?></td>
					<td  class="textright" style="font-size:11px;"><?php 
		
					if ($row1['DESCT'] == 'cbonoesp') {
						// No se realiza ninguna acción
					} else {
						$var = (float)$row1['IMPORTE'];
						echo  number_format((double) $row1['IMPORTE'],2);
						
						if (is_numeric($var)) {
							$dats=  round((float)$row1['IMPORTE'],2);
							$total = $total + $dats;
						} else {
							// El valor no es numérico, puedes manejarlo según tus necesidades
						}
					}	
						?></td>	
						<?php 
			$indiceSeleccionado = $contador;
				if($contador<count($arreglo))
				{

			
							foreach($arreglo as $indice => $valor)
							{
				
								if ($indice == $indiceSeleccionado) {
						?>

						<td width="4px"   style="font-size:11px; background:#FFF; border-bottom:none;" ></td>
								<td   style="font-size:11px;" ><?php echo $valor['DESCT']; ?></td>
								<td  style="font-size:11px;"class="textright"><?php echo number_format($valor['IMPORTE'],2); ?></td>
					<?php
						$contador++;

					?>
					<?php }}
					}else{

					?>
						<td width="4px"   style="background:#FFF; border-bottom:none;"></td>
						<td ></td>
						<td style="border-bottom:none"></td>
					<?php } }?>
					
				</tr>
				
				<?php
					 }
				 ?>		
		</tr>
			</tbody>


			<thead id="detalle_total">
			
			<tr >
		<th  colspan="1" class="textleft"  style="font-size: 11px; font-weight: bold;background: #135FB3; color:white;">TOTAL DE RENUMERACIONES</th>
			
		<th class="textright" style="font-size: 11px; font-weight: bold">S/.12312</th>
			<td width="5px" style="background: #FFF; border: none"></td>
			<th  class="textleft" style="font-size: 11px; font-weight: bold;background: #135FB3; color:white;">TOTAL DE  DESCUENTOS</th>
			<th class="textright" style="font-size: 11px; font-weight: bolder">S/.12312</th>	
		</tr>
			
			</thead>

			<?php
				$datperso="SELECT*FROM datperso where NUMERO_DOC='$cliente'";
				$mysdesc=$conn->query($datperso);
				$valor=mysqli_fetch_assoc($mysdesc);
				$vars=$valor['id_datperso'];

				$descuento="SELECT*FROM reportxplanilla where REGMES='$mes' and REGPERSO='$vars' and PROPOR='2'" ;
                      $descmysql=mysqli_query($conn,$descuento);
                      while($desct=mysqli_fetch_assoc($descmysql))
                      {  
						$descuentot= $descuentot+round((double)$desct['IMPORTE'],2);  
					}   
                ?>

			<?php $path = './img/qr.png';
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$base64 = 'data:image/png' . $type . ';base64,' . base64_encode($data);?>
			<tfoot id="detalle_totales">	
			<tr>
				<td style="margin:30px;"> <div style="border:1px solid black; padding:10px;margin:10px;"><img src="<?php echo $base64 ?>" width='100' heigth='100	' /> </div></td>
				<td style="display: block;border:none;">
				<span style="position: fixed; left: 200px; bottom: 190px; padding-right: 10px;font-size:14px;border:none; ">
					<span style="font-weight: bold; "> TOTAL DE REMUNERACIONES:</span> <?php echo round($total, 3); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style="font-weight: bold;"> TOTAL DE DESCUENTOS:</span>  <?php echo round($descuentot,3);?>
				</span></td>
				<td  style="  display:block; border:none ;font-size:14px;" ><span style="  display:block; position:fixed; left:375px;bottom:150px"> <span style="font-weight: bold;">NETO A PERCIBIR : &nbsp;&nbsp;</span><?php echo round(($total-$descuentot),3);?></span></td>
				<td style=" display:block; position: fixed; left: 200px; bottom: 120px; padding-right: 10px;font-size:14px;border:none; ">LUGAR: AV. UNIVERSITARIA N° 601-607 PILLCO MARCA 10003</td>
			</tr>

			<tr style=" font-size:8px; padding:0; position:absolute; border:none;"><td >La presentación de la boleta electrónica puede ser verificada por el QR</td>
		<td colspan="2"></td>
		<td> <h4>¡Gracias por su labor en la Universidad! </h4></td>
		</tr>
	
		</tfoot>
	</table>

</div>
</body>
</html>
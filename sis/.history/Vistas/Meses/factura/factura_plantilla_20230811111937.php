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
	font-family: Roboto, Arial, sans-serif;
}
body {
	font-family: Roboto, Arial, sans-serif;

  margin: 0;
  padding: 5px  50px 0 30px;
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
	width: 25%;
	

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
	padding: 2px 8px 0 5px;
	
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
	font-family: Roboto, Arial, sans-serif;
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;

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
			<td class="logo_factura" style="border:none;">
			<div class="logo-header" style="border:none;">
			<img src="<?php echo $base64 ?>" width='250' heigth='250	' />
			</div>
			</td>
			<?php
				date_default_timezone_set('America/Lima');
				 ?>
		<td class="info_empresa" style="border:none;">
		
		</td>
			<td class="info_factura"  style="border:none;">
				<div class="round">
					<span class="h3">BOLETA DE PAGO</span>
					<p>No.: <strong>000001</strong></p>
					<p>Fecha:<?php $fechaActual = date('Y-m-d');
					echo $fechaActual; ?></p>
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
					$arreglo1=array();
					$datperso="SELECT*FROM datperso where NUMERO_DOC='$cliente'";
					$mysdesc=$conn->query($datperso);
					$valor=mysqli_fetch_assoc($mysdesc);
					$vars=$valor['id_datperso'];
					$descuento="SELECT*FROM reportxplanilla where REGMES='$mes' and REGPERSO='$vars' and PROPOR='2'" ;
					$descmysql=mysqli_query($conn,$descuento);
					$descuento1="SELECT*FROM reportxplanilla where REGMES='$mes' and REGPERSO='$vars' and PROPOR='2'" ;
					$descmysql1=mysqli_query($conn,$descuento1);
					$contador=0;
					while($vue=$descmysql->fetch_assoc())
					{
						$arreglo[]=$vue;
					}

					while($desct=$descmysql1->fetch_assoc())
					{  
						$arreglo1[]=$desct;
					    
					}
					foreach($arreglo1 as $desct)
					{
						$descuentot= $descuentot+round((double)$desct['IMPORTE'],2); 
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
							
						
							<td  style="border:none;"><label style="font-size:13px;font-weight: bold;">MODALIDAD:</label> <p style="font-size:12px;"><?php echo $row['DESCM']?></p></td>
							<td style="border:none;"><label style="font-size:13px;font-weight: bold;">CATEGORÍA:</label> <p style="font-size:12px;"><?php echo $row['DESCC']?></p></td>
							<td colspan="3" style="border:none;"><label style="font-size:13px;font-weight: bold;">ÁREA:</label> <p style="font-size:12px;"><?php echo $row['DESCA']?></p></td>
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

	<table id="factura_detalle"  style="border:none;">
			<thead  style="border:none;">
				
				<tr style="border:none;" >
					
				 	<th   class="textleft"   >RENUMERACIONES</th >
					 <th   width="100"> </th>
					 <th width="1"> </th>
					<td  style="background:#FFF;border-bottom:none; width:1px;"></td>
					<th class="textleft" >DESCUENTOS</th>
					<th width="1"> </th>
					<th width="50"> </th>
				</tr>
				
			</thead>

			<tbody id="detalle_productos"    >
			<tr>
			<td  style="font-size: 11px; font-weight: bold">CODIGO</td>
			<td style="font-size: 11px; font-weight: bold">CONCEPTO</td>
			<td class="textright" style="font-size: 11px; font-weight: bold">MONTO</td>
			<td width="1px" style="background: #FFF; border: none"></td>
			<td style="background:#0a4661; width:1px; font-size: 11px; font-weight: bold">CODIGO</td>
			<td  style="font-size: 11px; font-weight: bold">CONCEPTO</td>
			<td class="textright" style="font-size: 11px; font-weight: bold">MONTO</td>

			<?php
			$evento=0;
					while ($row1 = mysqli_fetch_assoc($query1)){
			 ?>	
			<tr>
			<?php 
			
			if($row1['IMPORTE']>0) {?>
				
				<td  class="textleft" style="font-size:11px;border-bottom:none;"><?php
					if($row1['DESCT']=='cbonoesp')
					{
					} else{echo $row1['CODIGO']; }	?></td>
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
							$evento++;
							
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

						<td width="2px"   style="font-size:11px; background:#FFF; border-bottom:none;" ></td>
						<td width="1"   style="font-size:11px;" ><?php echo $valor['CODIGO']; ?></td>
								<td    style="font-size:11px;" ><?php echo $valor['DESCT']; ?></td>
								<td  style="font-size:11px;"class="textright"><?php echo number_format($valor['IMPORTE'],2); ?></td>
					<?php
						$contador++;

					?>
					<?php }}
					}else{

					?>
						<td width="4px"   style="background:#FFF; border-bottom:none;"></td>
						<td ></td>
						<td></td>
						<td style="border-bottom:none"></td>
					<?php } }?>
					
				</tr>
				
				<?php
					 }
				 ?>		
		</tr>
			</tbody>


			<thead id="detalle_total">
			<tr></tr>
			<tr >
		<th  colspan="1" class="textleft"  style="font-size: 11px; font-weight: bold;background: #135FB3; color:white;">TOTAL DE RENUMERACIONES</th>
		<th    class="textleft" width="	" class="textright"style="font-size: 11px; font-weight: bold ;border: none">S/.</th>
		
		<th   class="textleft" style="font-size: 11px; font-weight: bold ;border:background: #135FB3; border: none"><?php echo $total; ?></th>
	

			<td width="5px" style="background: #FFF; border: none"></td>
			<th  class="textleft" style="font-size: 11px; font-weight: bold;background: #135FB3; color:white;">TOTAL DE  DESCUENTOS</th>
<th></th>
			<th class="textright" style="font-size: 11px; font-weight: bolder"><?php echo  'S/.'.$descuentot; ?></th>
				
		</tr>
			<?php
			if($evento===30)
			{
				echo '<div style="page-break-after: always;"></div>';
				echo '<div style="page-break-after: always;"></div>';
				
			}?>
			</thead>

			<?php $path = './img/qr.png';
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$base64 = 'data:image/png' . $type . ';base64,' . base64_encode($data);?>
			<tfoot id="detalle_totales" >	
			<tr>
				
				<td  > <div style="border:1px solid black;  padding:10px;margin:10px; "><img src="<?php echo $base64 ?>" width='110' heigth='110	' /> </div>
				</td>
			
				<td style="border:none;  padding:0px;" colspan="5">
						<span style="font-size:12px; font-weight: bold;"> TOTAL REMUNERACIONES:</span>
						
						<span style="font-size:12px;"> <?php echo 'S/. '.round($total, 3); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span style="background:#0a4661">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<span style="  display:block;    left: 560px; top:18px; font-weight: bold;"></span> </span>
						<span style="font-weight: bold ;">&nbsp;&nbsp; NETO A PERCIBIR:</span> <?php echo 'S/. '.round(($total-$descuentot),3);?>
						
						<span style="  display:block;    left: 560px; top:18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						
					</span>
				</td>
		
				<td  style="   border:none ;font-size:9px;"  rowspan="1" >
					<span style="" >
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<span style="font-size:12px; font-weight: bold;"> TOTAL DESCUENTOS:</span>  <span><?php echo 'S/. '.round($descuentot,3);?> </span>
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<span style="font-weight: bold; "> _________________________</span>
					<span style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cesar Bazan Jaimes:</span>
					<span style="font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jefe de la SURPyC</span>
					</span>
				</td>
				
				
				
			
			</tr>

			<tr style=" font-size:8px;   border:none;"><td style=" padding-top:-10px;text-align: center; font-family: Roboto, Arial, sans-serif;">La presentación de la boleta electrónica puede ser verificada por el QR</td>
		<td colspan="2" style="border:none" ></td>
		
		</tr>
		<tr>
			
				<td colspan="8" style="  padding-right: 10px;font-size:9px;border:none;font-family: Roboto, Arial, sans-serif;">
				
					<span style="font-weight: bold; font-size:10px; text-align:center;">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; LUGAR:</span> AV. UNIVERSITARIA N° 601-607 PILLCO MARCA 10003 &nbsp;&nbsp; &nbsp;
					<span style="font-weight: bold; font-size:10px;">TELÉFONO:</span> 062-591060 &nbsp;&nbsp; &nbsp;
					<span style="font-weight: bold; font-size:10px;">CORREO:</span> transparencia@unheval.edu.pe
				</td>
			</tr>

		</tfoot>
	</table>
	<div class="label_gracias" style="text-align: center; ">
	<h4  >¡Gracias por enriquecer nuestra comunidad universitaria con tu valiosa labor! </h4>
	</div>
</div>
</body>
</html>
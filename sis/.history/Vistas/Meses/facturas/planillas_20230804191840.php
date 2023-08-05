<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
	$meses=$_GET['m'];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
	<link href="../../../Resources/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
<?php  	
$armodal=array(1,21,3);
$side=0;
foreach($armodal as $modal)
{
	
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
		?>
<div id="page_pdf">
	<table  class="table table-bordered">
	<tr><th style="justify-content:center; font-size:15px;"   colspan="23" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
	<tr><th style="justify-content:center; font-size:13px;"   colspan="23" >Planilla de pagos</th> </tr>
		<tr> <th style="justify-content:center;font-size:13px;"  colspan="23" >Correspondiente al mes :
			<?php
$mesesEnEspanol = array(
    '1' => 'enero',
    '2' => 'febrero',
    '3' => 'marzo',
    '4' => 'abril',
    '5' => 'Mayo',
    '6' => 'junio',
    '7' => 'julio',
    '8' => 'agosto',
    '9' => 'SETIEMBRE',
	'01' => 'enero',
    '02' => 'febrero',
    '03' => 'marzo',
    '04' => 'abril',
    '05' => 'mayo',
    '06' => 'junio',
    '07' => 'julio',
    '08' => 'agosto',
    '09' => 'Setiembre',
    '10' => 'octubre',
    '11' => 'noviembre',
    '12' => 'diciembre'
);
$mesmysql = mysqli_query($conn, "SELECT * FROM meses WHERE id_meses ='$meses'");
$mesac = mysqli_fetch_assoc($mesmysql);
$monthNum = $mesac['MES'];
$monthName = $mesesEnEspanol[$monthNum];
echo $monthName.' '.$mesac['anio'];
?></th>
			</tr>
			<tr>
			<th style="justify-content:center; font-size:11px; font-weight: normal;"  colspan="13" class="h2">MODALIDAD:<?php 
			$categori_modal="SELECT *FROM modali where id_modali='$modal'";
			$cateG=mysqli_query($conn,$categori_modal);
			$cateGS=mysqli_fetch_assoc($cateG);
			echo $cateGS['DESC'];?> </th> 
		<th style="justify-content:center; font-size:11px; font-weight: normal;"  colspan="5" class="h2">AREAS:<?php echo $cateGS['DESC'];?> </th> </tr>
		<thead style='border:1px solid black ' >
		<?php  	
		?>
		<tr> 

 </tr>
		
		<tr> <th style="font-size:11px;" colspan="1"  > <span style='border-bottom: 0.2px solid black;'> Datos Personales</span></th>
		<th style="font-size:11px; " colspan="10"  > <span style='border-bottom: 0.2px solid black;'> Renumeraciones</span></th>	
		<th style="font-size:11px;" colspan="9"  ><span style='border-bottom: 0.2px solid black;'>Descuentos</span></th>	
		<th style="font-size:11px; " colspan="1"  ><span style='border-bottom: 0.2px solid black;'>Totales</span></th>	
		</tr>
		<tr><td style="font-size:11px; " colspan=""  >CODIGO</td>
		<td style="font-size:11px; " colspan="3"  >NOMBRES</td>
		<td style="font-size:11px; " colspan=""  >(a)</td>
		<?php 

		$query2 =mysqli_query($conn,"SELECT count(*) as datos FROM renumeraciones where id_categori='61' ");	
		$queryQ =mysqli_query($conn,"SELECT * FROM renumeraciones where id_categori='61' order by id_registro");
		$r=mysqli_fetch_assoc($query2);
		$f=0; 
		$uf=(double) $r['datos'];//43
		$l= ((double)$r['datos']/2);//21.5
		$as=(double)$r['datos']; //43

		while ($r5= mysqli_fetch_array($queryQ)){?>
		<?php
		if($f <7)
		{
		$f++;
		echo '<td style="font-size:9px; colspan="1" margin-left:60px; >'.$r5['DESCT'].' </td>';  
		} 
		}
		?>	
			<span style="border-left: 1px solid black; height: 20px; margin: 0 0px 0px 0px; position: absolute; float:left;">

</span>
<td style="font-size:11px; "  >Enf.Essalud</td>
<td style="font-size:11px; "   >D. Judicial</td>
<td style="font-size:11px; "  >Asoc. docen</td>
<td style="font-size:11px; "   >Cooperativ</td>
<td style="font-size:11px; "  >Bco.Interb</td>
<div style="border-left: 1px solid black; height: 30px; margin: 0 6.3px; position:fixed;">

		</div>
		<td style="font-size:11px; "   >T.renumera </td>
<td style="font-size:11px; "  >T. descuento</td>
	</tr>

	<tr ><td style="font-size:11px; " colspan=""  >CATEGORÍA</td>
		<td style="font-size:11px;  " colspan="3"  >APELLIDOS</td>
		<td style="font-size:11px; " colspan=""  >(b)</td>
		<?php
		$cs=array();
		$queryk ="SELECT r.DESCT FROM renumeraciones r where r.id_categori='61' order by r.CODIGO";	
		$des1 = $conn->query($queryk);	
		while ($gr = $des1->fetch_assoc()){
			$cs[]=$gr;
		}

		for($o=$f;$o<13;$o++)
		{
			if($cs[$o]['DESCT']=='cbonoesp'|| $cs[$o]['DESCT']=='homog.doc' )
			{
				
			}else {
				echo '<td style="font-size:9px; margin-left:60px;"  colspan="1"  > '.$cs[$o]['DESCT'].' </td>'; 
			}	
		 
		}
		echo '<td style="font-size:9px;  colspan="1"  > Otros Rem.</td>'; 
		?> 
		<div style="border-left: 1px solid black; height: 20px; margin: 0 0px;">

		</div>
		<td style="font-size:11px; " colspan=""  >Otros.Desc</td>
		<div style="border-left: 1px solid black; height: 20px; margin: 0 220px; position:absolute;">
</div>
<td style="font-size:11px; " colspan=""  ></td>
<td style="font-size:11px; " colspan=""  ></td>
<td style="font-size:11px; " colspan=""  ></td>
<td style="font-size:11px; " colspan=""  ></td>
<td style="font-size:11px;  "   >Neto </td>
<td style="font-size:11px; margin: 0 220px; "  >Firma</td>
	</tr>
	<tr><td style="font-size:11px; " colspan=""  >CTA-CTE</td>
		<td style="font-size:11px; " colspan="2"  >AFILIADO </td>
		<td style="font-size:11px;  " colspan="5"  > CARGO</td>
		
	</tr>
	</tr> 
			</thead>


			<tbody>
			<?php

		
				$query="SELECT f.id_datperso,f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.REGISTRO,af.DESC as afps_desc
				
FROM persxmes p inner join datperso f on p.REGISTRO=f.id_datperso inner join afps af on f.id_afps=af.id_afps where p.REGMES='$meses' AND f.id_modali='$modal' ";
				$resultado1 = $conn->query($query);
				
				$tablef=array();
				$tabla2Datos = array();
				while ($cliente = $resultado1->fetch_assoc()) {
					$tablef[]=$cliente;
				}	

				foreach($tablef as $cliente)
				{

			 ?>
			 		 
		<tr>
		
		<td style="font-size:11px; " colspan=""  ><?php echo $cliente['NUMERO_DOC']; ?></td>
		<td style="font-size:11px; " colspan="3"  ><?php echo $cliente['NOMBRE']; ?></td>
		<td style="font-size:11px; font-weight:bold" colspan=""  >(a)</td>
		<?php
			$i=0;
			$j=0;
			
			$user=$cliente['id_datperso'];
			$sql ="SELECT p.IMPORTE,p.REGPERSO,p.DESCT FROM reportxplanilla p  inner join datperso d on p.REGPERSO=d.id_datperso  where p.REGMES='$meses' AND p.REGPERSO ='$user' and p.PROPOR='0' and id_modali='$modal' order by id_registro";			
			$resultado = $conn->query($sql);	
			$tabla2Datos[]=array();
			while ($fila = $resultado->fetch_assoc()) {
				$tabla2Datos[$cliente['id_datperso']][$j] = $fila;
				$j++;
				$cantidad=count($tabla2Datos[$cliente['id_datperso']]);	
				if($cantidad%44==0)
				{	
					$i++;
				}
				}
		    ?>
		<?php
	$g=0;
	$elemento=0;
			foreach($tabla2Datos[$cliente['id_datperso']] as $importe)
			{
				$g++;
				if($importe['DESCT']=='cbonoesp'||$importe['DESCT']=='homog.doc')
				{

				}else{
					
					if($g<8)
					{
						echo '<td style="font-size:11px; " colspan="1"  > '. round((double)$importe['IMPORTE'],2).' </td>'; 
						
						$elemento=$elemento+ round((double)$importe['IMPORTE'],2);
					}else 
					{

					}
			
					$total =$total+ round((double) $importe['IMPORTE'],2);
					
				}
				
				if($g==7)
				{
					echo '	<div style="border-left: 1px solid black;">
							</div>';
					$less="SELECT p.IMPORTE,p.REGPERSO,p.DESCT,p.CODIGO FROM reportxplanilla p where p.REGMES='$meses' AND p.REGPERSO ='$user' and p.PROPOR='2' order by CODIGO";
					$resultadoF = $conn->query($less);	
					$tabla2DatosF[]=array();
					$jx=0;
					$js=0;
					$ardis=array();
					$ardi=array('Enf.ESSAL','D.JUDICIAL','ASOC.DOCEN','COOPERATIVE','BCO.INTERBANK');
					while ($filas = $resultadoF->fetch_assoc()) {
						$tabla2DatosF[$cliente['id_datperso']][$jx] = $filas;
						$jx++;
						array_push($ardis,$filas['DESCT']);
						$cantidad=count($tabla2DatosF[$cliente['id_datperso']]);
						}
						foreach ($ardi as &$valor) {
							if (!in_array($valor, $ardis)) {
								$valor = '0.00';
							}
						}
						unset($valor);
						$lettotal=0;
							foreach($tabla2DatosF[$cliente['id_datperso']] as $desc)
							{
								if($ardi[0]==$desc['DESCT'])
								{
									$ardi[0]=$desc['IMPORTE'];
								}
								if($ardi[1]==$desc['DESCT'])
								{
									$ardi[1]=$desc['IMPORTE'];
								}
								if($ardi[2]==$desc['DESCT'])
								{
									$ardi[2]=$desc['IMPORTE'];
								}
								if($ardi[3]==$desc['DESCT'])
								{
									$ardi[3]=$desc['IMPORTE'];
								}
								if($ardi[4]==$desc['DESCT'])
								{
									$ardi[4]=$desc['IMPORTE'];
								
								}
							}	
							for ($i = 0; $i < count($ardi); $i++) {
								echo '<td style="font-size:11px; " colspan="1" margin:0 10px; position:absolute; >' . $ardi[$i] . '</td>';
								$lettotal=$lettotal+(double)$ardi[$i];

							}
							echo '	<div style="border-left: 1px solid black;">
							</div>';
							$pointY="SELECT sum(p.IMPORTE) as importefinal FROM reportxplanilla p where p.REGMES='$meses' AND p.REGPERSO ='$user' and p.PROPOR='0' and DESCT NOT IN('cbonoesp','homog.doc') order by CODIGO";
							$querypointY= $conn->query($pointY);
							$queryFetchY=$querypointY->fetch_assoc();
							echo '<td style="font-size:11px; " colspan="1" margin:0 10px; position:absolute; >'. round($queryFetchY['importefinal'],2). '</td>';

							$pointX="SELECT sum(p.IMPORTE) as descfinal FROM reportxplanilla p where p.REGMES='$meses' AND p.REGPERSO ='$user' and p.PROPOR='2' order by CODIGO";
							$querypoint= $conn->query($pointX);
							$queryFetch=$querypoint->fetch_assoc();

							echo '<td style="font-size:11px; " colspan="1" margin:0 10px; position:absolute; >'. (double)$queryFetch['descfinal']. '</td>';
				}
			
				if($g==7)
				{
					echo ' <tr> <td style="font-size:11px; " colspan="1"  > '.$cliente['id_categori'].' </td>'; 	
					echo '<td style="font-size:11px; " colspan="3"  > '.$cliente['APELLIDOS'].' </td> '; 
					echo '<td style="font-size:11px; font-weight:bold " colspan="1"  > (b) </td>';	
				}
				
		
			if($g > 7 && $g < 14)
			{
				echo '<td style="font-size:11px; " colspan="1"  > '. round((double)$importe['IMPORTE'],2).' </td>';
				$elemento=$elemento+ round((double)$importe['IMPORTE'],2);
			}
			if($g==43)
			{
				$resultado=$total-$elemento;
				echo '<td style="font-size:11px; " colspan="1"  > '. ($resultado).' </td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; ></td>';
				$consulta="SELECT sum(p.IMPORTE) as sumadesc FROM reportxplanilla p where p.REGMES='$meses' AND p.REGPERSO ='$user' and p.PROPOR='2' order by CODIGO";
				$conquery=$conn->query($consulta);
				$fers = $conquery->fetch_assoc();
				$fers1=(double)$fers['sumadesc'];
				$descuentofinal=$fers1-$lettotal;
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; >'.number_format($descuentofinal,2 ).'</td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; ></td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; ></td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; ></td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; ></td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; ></td>';
				echo '<td style="font-size:11px; " colspan="1" margin:0 10px; height: 20px; position:absolute; >'.number_format((round($queryFetchY['importefinal'],2)-(double)$queryFetch['descfinal']),2 ).'</td>';
				$total=0;
				$elemento=0;
			}
			}
			echo '<td style="font-size:11px; " colspan="1"  >  </td>';
			
			echo '<tr><td style="font-size:11px;  " colspan="1"  > '.$cliente['CTA_CTE'].' </td>
					<td style="font-size:11px; font-weight: normal;" colspan="2"  > '.$cliente['afps_desc'].' </td>
					<td style="font-size:11px; " colspan="1"  > '.$cliente['CARGO'].' </td>		
			</tr>'; 
			echo '<tr > <td colspan="26"> <hr></td></tr>';
			
		?>
		</tr>
		<tr>
			<?php	
			}
			?>
			<tr colspan='10'> 
			<td colspan='22'> </td>	
			<?php 
			 $finaltotali="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where REGMES='$meses' and r.PROPOR='0' AND id_modali='$modal' and DESCT not in('cbonoesp','homog.doc')";
			 $sqlfinaly=$conn->query($finaltotali);
			 $sqlfinalfetch=$sqlfinaly->fetch_assoc();

			 $finaltotali1="SELECT sum(IMPORTE) as finalimporte1 FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where REGMES='$meses' and r.PROPOR='2' AND id_modali='$modal' and DESCT not in('cbonoesp','homog.doc')";
			 $sqlfinaly1=$conn->query($finaltotali1);
			 $sqlfinalfetch1=$sqlfinaly1->fetch_assoc();
			?>
			<td colspan='15'> Total de Planilla : <?php echo round($sqlfinalfetch['finalimporte']-$sqlfinalfetch1['finalimporte1'],2);?></td>
			<td colspan="30"><hr class=""></td>
		
		</tr>
			</tbody>
	</table>
	<?php  if($side < count($armodal)-1) {?>
	<div style="page-break-after: always;"></div>
	<?php 
$side++;}?>
</div>
<?php
 
unset($cs);
unset($ardis);
unset($ardi);
unset($tabla2Datos);
unset($tabla2DatosF);
unset($tablef);
}
		?>
		
</body>

</html>
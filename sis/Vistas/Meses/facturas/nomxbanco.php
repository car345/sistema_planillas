
<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
    $totalf=0;
 //print_r($configuracion);
 $mes=$_GET['m']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
    <style>
            /* Estilos para centrar el contenido */
            table {
                width: 100%;
            }
            th, td {
                text-align: center;
            }
            th {
                font-size: 15px;
            }
            td {
                font-size: 13px;
            }
        </style>
    
</head>
<body>

<div id="page_pdf">
	<table>
	<tr><th   class="center" style="position:absolute;"  colspan="34">  UNIVERSIDAD NACIONAL <span>   "HERMILIO VALDIZAN" - HUÀNUCO</span>  </th> </tr>
    <tr><th   class="center" style="position:absolute;"  colspan="34">NOMINAS DE TRABAJADORES <span> POR ACTIVIDAD  </span>  </th> </tr>
		<tr> <td  class="center" colspan="34"  >Correspondiente al mes :
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
    '11' => 'diciembre'
);
$mesmysql = mysqli_query($conn, "SELECT * FROM meses WHERE id_meses ='$mes'");
$mesac = mysqli_fetch_assoc($mesmysql);
$monthNum = $mesac['MES'];
$monthName = $mesesEnEspanol[$monthNum];
echo $monthName.' '.$mesac['anio'];

?></td>

			</tr>
            

			<tbody>
   
			</tbody>
	</table>
</div>
</body>
</html>
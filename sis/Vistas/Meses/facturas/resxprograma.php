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
            <?php 
            $armodal=array(1,21,3);

        
                
            $renum=array();
            $cods=array();
   
            $codigo="SELECT DISTINCT  CODIGO,DESCT FROM reportxplanilla where REGMES='$mes' AND DESCT NOT IN ('sindurgenc','sinaguinal','sindu037','dds051-91','sobrevive','COOPERATIV') ORDER BY CODIGO" ;
                  $codigosql=$conn ->query($codigo);
                  while($resultado=$codigosql->fetch_assoc())
                  {
                    $cods[]=$resultado;
                  }

                  foreach($cods as $valores)
                  {
               
            ?>
            <tr><td style="font-weight:normal"   colspan="1" >Item: </td> 
            <th style=" font-size:13px; font-weight:normal"   colspan="1" ><?php echo $valores['CODIGO'].' '.$valores['DESCT']; ?> </th>  
            
        </tr>       
		<tr style=" font-size:13px; font-weight:normal"    ><td colspan="1"><?php echo 'Modalidad' ?><td>: PENSIONISTAS'</td> </td> </tr> 
				<tr>
					<td style="font-size:12px; font-size:normal;"colspan="1"   >Num</td>
                    <td style="font-size:12px; " colspan="1"  >Código</td>
					<td style="font-size:12px; " colspan="1" >Apellidos</td>
					<td style="font-size:12px;  "colspan="2" >Nombres.</td>
					<td style="font-size:12px; "  colspan="9">Categoría</td>
					<td style="font-size:12px; "  colspan="3">Importe</td>
				</tr>
			


			<tbody>
      
            <?php  
             foreach($armodal as $modal)
             {
     
            $ren="SELECT  d.id_datperso,d.CODIGO as codigo,d.APELLIDOS,d.NOMBRE,ca.DESC AS DESCT_CAT  FROM persxmes r inner join datperso d on d.id_datperso=r.REGISTRO
            inner join categori ca on ca.id_categori=d.id_categori  where r.REGMES='$mes' and d.id_modali='$modal'";
            $sqlren=$conn->query($ren);

            while($result=$sqlren->fetch_assoc())
            {
                $renum[]=$result;
            }
           $i=1;
           $modalidad=mysqli_query($conn,"SELECT*FROM modali WHERE id_modali='$modal' ");
            $fetchm=$modalidad->fetch_assoc();

?>        
<tr><td style=" font-size:13px; font-weight:normal"   colspan="1" ><?php if($modal==1)
{  } else { echo 'Modalidad' ?><td><?php echo $fetchm['DESC']; ?></td <?php } ?> </td> </tr> <?php 
            foreach($renum as $persona)
            {
                $a=$valores['CODIGO'];
                $b=$persona['id_datperso'];
                $selectr="SELECT IMPORTE FROM reportxplanilla where  REGMES='$mes' and REGPERSO='$b' and CODIGO ='$a' ";
                $sqlF=$conn->query($selectr);
                $report =$sqlF->fetch_assoc();
            ?>
     		<tr>
                <td style="font-size:12px; font-size:normal;"colspan="1"   ><?php echo $i;?></td>
					<td style="font-size:12px; font-size:normal;"colspan="1"   ><?php echo $persona['codigo']; ?></td>
                    <td style="font-size:12px; font-size:normal;"colspan="1"   ><?php echo $persona['APELLIDOS']; ?></td>
                    <td style="font-size:12px; font-size:normal;"colspan="2"   ><?php echo $persona['NOMBRE']; ?></td>
                    <td style="font-size:12px; font-size:normal;"colspan="9"   ><?php echo $persona['DESCT_CAT']; ?></td>
                    <td style="font-size:12px; font-size:normal;"colspan="1"   ><?php echo number_format(round((double)$report['IMPORTE'],2),2); ?></td>
				</tr>
                
           <?php
            $total=$total+ round((double) $report['IMPORTE'],2) ;
           $i++;} ?>
                <tr><td colspan='2'></td>
                    <td colspan='50' style='letter-spacing:1px;'>Total modalidad: <?php
                
                echo number_format($total,2); ?></td></tr>
           <?php 
        unset($renum);
        $totalf=$total+$totalf;
        $total=0;
        }
   
       
       ?> 
       <tr>
       <td colspan='2'></td><td colspan='46' style='letter-spacing:1px;'>Totales: <?php
                
                echo number_format($totalf,2); ?></td></tr>
       <?php 
       $totalf=0; 
  }

 ?>
			</tbody>
	</table>
</div>
</body>
</html>
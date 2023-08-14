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
	<table>
	<tr><th style=" font-size:15px; font-weight: italic; "   colspan="65" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
    <tr><th style=" font-size:14px; font-weight: italic;"   colspan="60" >Items correpondientes al mes : <?php
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

?></th> </tr>
  
            <?php 
            $armodal=array(1,21,3);

            $renum=array();
            $cods=array();
   
            $codigo="SELECT DISTINCT  CODIGO,DESCT FROM reportxplanilla where REGMES='$mes' AND DESCT NOT IN ('dds051-91','sobrevive') ORDER BY CODIGO LIMIT 5" ;
                  $codigosql=$conn ->query($codigo);
                  while($resultado=$codigosql->fetch_assoc())
                  {
                    $cods[]=$resultado;
                  }

                  foreach($cods as $valores)
                  {
               
            ?>
            <tr><td style=" font-size:15px;font-weight:bold;"    >Item: </td> 
            <td style=" font-size:15px;font-weight:bold;"   colspan="1" ><u><?php echo $valores['CODIGO'].' '.$valores['DESCT']; ?> </td>  
            
        </tr>       
		
				<tr>
					<td style="font-size:13px; font-weight:bold;"colspan="1"   >Num</td>
                    <td style="font-size:13px; font-weight:bold;" colspan="1"  >Código</td>
					<td style="font-size:13px; font-weight:bold;" colspan="1" >Apellidos</td>
					<td style="font-size:13px;  font-weight:bold;"colspan="22" >Nombres.</td>
					<td style="font-size:13px; font-weight:bold;"  colspan="19">Categoría</td>
					<td style="font-size:13px; font-weight:bold;"  colspan="3">Importe</td>
				</tr>
			


			<tbody>
            <tr style=" font-size:12px; font-weight:bold;"    ><td colspan="1"><?php echo 'MODALIDAD' ?><td>: PENSIONISTAS</td> </td> </tr> 
            <?php  
             foreach($armodal as $modal)
             {
     
            $ren="SELECT  d.id_datperso,d.CODIGO as codigo,d.APELLIDOS,d.NOMBRE,ca.DESC AS DESCT_CAT  FROM persxmes r inner join datperso d on d.id_datperso=r.REGISTRO
            inner join categori ca on ca.id_categori=d.id_categori  where r.REGMES='$mes' and d.id_modali='$modal'";
            $sqlren=$conn->query($ren);
                //arreglo de trabajadores de planilla//
            while($result=$sqlren->fetch_assoc())
            {
                $renum[]=$result;
            }

            $i=1;

            $modalidad=mysqli_query($conn,"SELECT*FROM modali WHERE id_modali='$modal' ");
            $fetchm=$modalidad->fetch_assoc();

            ?>        
            <tr><td style=" font-size:11px; font-weight:bold;"   colspan="1" ><?php if($modal==1)
            {  } else { echo 'MODALIDAD:' ?><td style=" font-size:11px; font-weight:normal" ><?php echo $fetchm['DESC']; ?></td <?php } ?> </td> </tr> <?php 
            if(isset($renum))
            {
            foreach($renum as $persona)
            {
                $a=$valores['CODIGO'];
                $b=$persona['id_datperso'];
                $selectr="SELECT IMPORTE FROM reportxplanilla where  REGMES='$mes' and REGPERSO='$b' and CODIGO ='$a' ";
                $sqlF=$conn->query($selectr);
                $report =$sqlF->fetch_assoc();
                if(!empty($report['IMPORTE']))
                {

            ?>
     		<tr>
                <td style="font-size:13px; font-size:normal;"colspan="1"   ><?php echo ' '.$i;?></td>
					<td style="font-size:13px; font-size:normal;"colspan="1"   ><?php echo $persona['codigo']; ?></td>
                    <td style="font-size:13px; font-size:normal;"colspan="1"   ><?php echo $persona['APELLIDOS']; ?></td>
                    <td style="font-size:13px; font-size:normal;"colspan="23"   ><?php echo $persona['NOMBRE']; ?></td>
                    <td style="font-size:13px; font-size:normal;"colspan="19"   ><?php echo $persona['DESCT_CAT']; ?></td>
                    <td style="font-size:13px; font-size:normal;"colspan="1"   ><?php echo number_format(round((double)$report['IMPORTE'],2),2); ?></td>
				</tr>
                
           <?php
            $total=$total+ round((double) $report['IMPORTE'],2) ;
          
          $i++;}}  } ?>
                <tr><td colspan='1'></td>
                    <td colspan='16'> </td>
                    <td colspan='20' style=' font-size:12px; font-weight:normal;    letter-spacing:1px;'>TOTAL MODALIDAD: </td>
                    <td><?php echo number_format($total,2); ?></td>
                </tr>
           <?php 
        unset($renum);
        $totalf=$total+$totalf;
        $total=0;
        }
   
       
       ?> 
       <tr>
       <td colspan='17'></td><td colspan='46' style=' font-size:11px; font-weight:normal;    letter-spacing:1px;'>Totales: <?php
                
                echo number_format($totalf,2); ?></td></tr>
       <?php 
       $totalf=0; 
  ?><div style="page-break-after: always;"></div> <div style="page-break-after: always;"></div> <?php
    }

 ?>

			</tbody>
	</table>
</div>
</body>
</html>
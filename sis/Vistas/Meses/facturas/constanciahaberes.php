<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
 //print_r($configuracion);
 $mes=$_GET['m']; 
 $user=$_GET['user']; 
 $fecha1=$_GET['fecha1']; 
 $fecha2=$_GET['fecha2']; 



// Separar el mes y el año de las fechas proporcionadas por el usuario
$mes1 =  ltrim(substr($fecha1, 5, 2), '0');
$anio1 = substr($fecha1, 0, 4);
$mes2 =  ltrim(substr($fecha2, 5, 2), '0');;
$anio2 = substr($fecha2, 0, 4);

  ?>
 
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


	<table  >

	<tr><th style=" font-size:15px; font-weight: normal; "   colspan="75" >UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"- HUÀNUCO</th> </tr>
	<tr><th style=" font-size:14px; font-weight: normal;"   colspan="75" > <tr> <th style="justify-content:center;font-size:13px;"  colspan="25" >Correspondiente al mes :
			<?php
$mesesEnEspanol = array(
    '1' => 'Enero',
    '2' => 'Febrero',
    '3' => 'Marzo',
    '4' => 'Abril',
    '5' => 'Mayo',
    '6' => 'Junio',
    '7' => 'Julio',
    '8' => 'Agosto',
    '9' => 'Setiembre',
	'01' => 'enero',
    '02' => 'Febrero',
    '03' => 'Marzo',
    '04' => 'Abril',
    '05' => 'Mayo',
    '06' => 'Junio',
    '07' => 'Julio',
    '08' => 'Agosto',
    '09' => 'Setiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre'
);
$mesmysql = mysqli_query($conn, "SELECT * FROM meses WHERE id_meses ='$mes'");
$mesac = mysqli_fetch_assoc($mesmysql);
$monthNum1 = $mes1 ;
$monthNum2 = $mes2 ;
$monthName = $mesesEnEspanol[$monthNum1];
$monthName1 = $mesesEnEspanol[$monthNum2];
echo $monthName.' '.$anio1.' hasta '.$monthName1.' '.$anio2;
?></th> </tr>
	<br>

	<br>
		<thead>
        <?php  $ev="SELECT d.CODIGO,d.APELLIDOS,d.NOMBRE,cat.DESC,af.DESC as descu ,d.id_datperso  FROM datperso d inner join categori cat on d.id_categori=cat.id_categori inner join afps af on d.id_afps=af.id_afps where d.CODIGO ='$user'";
                        $reev=$conn -> query($ev);
                        $fsocio=$reev->fetch_assoc();
                        $id_socio=$fsocio['id_datperso'];
                ?>
            <tr> 
               
                <td  style=" font-size:12px; font-weight: normal; " colspan="2"> DNI:<?php echo $fsocio['CODIGO'];?> </td>
            </tr>
            <tr>
                
                <td  style=" font-size:12px; font-weight: normal; " colspan="5">APELLIDOS:<?php echo $fsocio['APELLIDOS'];?> </td>
                <tr></tr>
                <td style=" font-size:12px; font-weight: normal; ">NOMBRES:<?php echo $fsocio['NOMBRE'];?></td>
                
            </tr>
 
				</thead>
                <br>
                <thead style='border:.5px solid black;  '>
                <tr>
                    <td colspan='1'></td>
                    <td colspan='10'></td>
                    <td style=" font-size:13px; font-weight: normal; "><u>Renumeraciones</u></td></tr>
                <tr >
            <td style=" font-size:12px; font-weight: normal; ">Mes:</td>
            <td style=" font-size:12px; font-weight: normal; ">Categoria</td>
            <td style=" font-size:12px; font-weight: normal; ">Afiliado</td>
        <?php
        $array=array();
        $sql="SELECT DISTINCT CODIGO ,DESCT from renumeraciones group by CODIGO,DESCT  ";
        $sqlresult=$conn->query($sql);
       while($r=$sqlresult->fetch_assoc())
       {
        $array[]=$r;
       }
       foreach($array as $indice => $valor)
       {

        if($indice < 19){ 
        ?>
        
        <td style="font-size:11px;  padding-left:5px;"     ><?php echo $valor['DESCT']; ?> </td>
      <?php  ?>
       
        <?php 
     }
    
    }
    
    ?>
    <td style="font-size:11px;  padding-left:5px;" > Otras Renumeraciones </td>
    <td style="font-size:11px;  padding-left:5px;"> Totales: </td>
        </tr>
                </thead>

	<tbody>
 
        <?php
        $arreglo =array(); 
        $renum=array();
        $sql1 = "SELECT * FROM MESES
        WHERE (anio > '$anio1' OR (anio = '$anio1' AND mes >= $mes1))
        AND (anio < '$anio2' OR (anio = '$anio2' AND mes <= $mes2));";


        $sql_result1= $conn ->query($sql1);
        while($year= $sql_result1->fetch_assoc())
        {
            $arreglo[]=$year;
        }
        
        foreach($arreglo as $m)
        {
            $mese = ($m['MES'] < 10) ? '0' . $m['MES'] : $m['MES'];
            $id_meses=$m['id_meses'];
            $sec="SELECT * FROM reportxplanilla where REGPERSO='$id_socio' and REGMES='$id_meses' and PROPOR='0' and CODIGO NOT IN ('10280'); ";
            $ressec=$conn -> query($sec);
                while($ren=$ressec->fetch_assoc())
                {
                    $renum[]=$ren;
                }
                if(isset($renum))
    {
                ?>
     <tr>
        
        <td style="font-size:11px;"> <?php echo $mese.'-'.$m['anio']; ?></td>
        <td style="font-size:11px;"> <?php echo $fsocio['DESC'];?></td>
        <td style="font-size:11px;"> <?php echo $fsocio['descu'];?></td>
        <?php 
        foreach($renum as $index => $x)
        {

            if($index< 19)
            {

                $subtotal += (double) $x['IMPORTE'];
        ?>

        
        
            <td style="font-size:11px;"><?php echo number_format((double) $x['IMPORTE'],2);?> </td>

        <?php 
          }
$total += (double) $x['IMPORTE'];
        
        }
    
        unset($renum);?>
    <td style="font-size:11px;"><?php echo ($total -$subtotal);?></td>
    <td style="font-size:11px;"><?php echo ($total);?></td>
     </tr>
    <?php 
$total=0;
$subtotal=0; }}?>

    <tr>

    </tr>
        
     
    </tbody>
		
	</table>
	
</div>
</body>
</html>
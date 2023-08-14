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
$mes1 = substr($fecha1, 5, 2);
$anio1 = substr($fecha1, 0, 4);
$mes2 = substr($fecha2, 5, 2);
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
	<tr><th style=" font-size:14px; font-weight: normal;"   colspan="70" >Descuentos de Ley del Mes de Enero 2023</th> </tr>
	<br>

	<br>
		<thead>
            <tr> 
                <td  style=" font-size:12px; font-weight: normal; "> DNI:</td>
            </tr>
            <tr>
                
                <td  style=" font-size:12px; font-weight: normal; ">APELLIDOS</td>
                <td  style=" font-size:12px; font-weight: normal; ">NOMBRES</td>
                
            </tr>
				</thead>
                <br>
                <thead style='border:.5px solid black;  '>
                <tr>
                    <td colspan='1'></td>
                    <td colspan='10'></td>
                    <td style=" font-size:13px; font-weight: normal; "><u>Renumeraciones</u></td></tr>
                <tr style="padding-top:10px;">
            <td style=" font-size:12px; font-weight: normal; ">Mes:</td>
            <td style=" font-size:12px; font-weight: normal; ">Categoria</td>
            <td style=" font-size:12px; font-weight: normal; ">Afiliado</td>
        <?php
        $array=array();
        $sql="SELECT DISTINCT CODIGO ,DESCT from renumeraciones group by CODIGO,DESCT ";
        $sqlresult=$conn->query($sql);
       while($r=$sqlresult->fetch_assoc())
       {
        $array[]=$r;
       }
       foreach($array as $indice => $valor)
       {

        if($indice < 20){ 
        ?>
        
        <td style="font-size:11px;  padding-left:5px;"     ><?php echo $valor['DESCT']; ?> </td>
      <?php  ?>
       
        <?php 
     }
    
    }
    
    ?>
    <td style="font-size:11px;  padding-left:5px;" > Otras Renumeraciones </td>
        </tr>
                </thead>

	<tbody>

        <?php 
        $sql = "SELECT * FROM MESES
        WHERE (anio > '$a' OR (anio = '2009' AND mes >= 2))
        AND (anio < '2023' OR (anio = '2023' AND mes <= 12));";
        ?>
    <tr>

    </tr>
        
     
    </tbody>
		
	</table>
	
</div>
</body>
</html>
<?php
require '../vendor/autoload.php'; // Incluye el archivo de autoloading de la biblioteca
include('../../../../conecta.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
$mes=$_GET['m'];
$importe=0;
function generarArregloExcel($inicio, $fin) {
    $letras = range('A', 'Z');
    $arreglo = array();

    // Generar letras desde $inicio hasta $fin
    for ($i = $inicio; $i <= $fin; $i++) {
        if ($i <= 25) {
            $arreglo[] = $letras[$i];
        } else {
            $letra = $letras[($i / 26) - 1] . $letras[$i % 26];
            $arreglo[] = $letra;
        }
    }

    return $arreglo;
}

// Ejemplo de uso
$inicio = 0;
$fin = 83;
$arreglo = generarArregloExcel($inicio, $fin);

// Imprimir el arreglo generado


// Crear un nuevo objeto de hoja de cálculo
// @codingStandardsIgnoreLine
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar datos a la hoja de cálculo
$sheet->setCellValue('A5', 'CODIGO');
$sheet->setCellValue('B5', 'COD.PLAZA');
$sheet->setCellValue('C5', 'NOMBRE');
$sheet->setCellValue('D5', 'A.PATERNO');
$sheet->setCellValue('E5', 'A.MATERNO');
$sheet->setCellValue('F5', 'SIS.PENSION');
$sheet->setCellValue('G5', 'DOCIDE');
$sheet->setCellValue('H5', 'NUMERO');
$sheet->setCellValue('I5', 'CARGO');
$sheet->setCellValue('J5', 'COD.IPSS');
$sheet->setCellValue('K5', 'COD.AFP');
$sheet->setCellValue('L5', 'CTA_CTE');
$sheet->setCellValue('M5', 'AREAS');
$sheet->setCellValue('N5', 'CATEGORIA');
$sheet->setCellValue('O5', 'MODALIDAD');
$sheet->setCellValue('P5', 'ACTIVIDAD');
$sheet->setCellValue('Q5', 'SUBACTIVIDAD');
$sheet->setCellValue('R5', 'DIVISIONARIA');
$sheet->setCellValue('S5', 'GLOSA');
$sheet->setCellValue('S4', 'DESCRIPCIÓN');
$sheet->setCellValue('S3', 'CODIGO SIAF');
$sheet->setCellValue('S2', 'CODIGO.PLAME');
$sheet->setCellValue('S1', 'DETALLE');



$date="SELECT d.CODIGO,d.CODPLAZA,d.NOMBRE,d.APATERNO,d.AMATERNO,d.NUMERO_DOC,d.CARGO,d.CODIGO_IPS,d.CODIGO_AFP,d.CTA_CTE,d.id_datperso,
a.DESC as DESC_AFPS,do.SIGLA,ar.DESC as DESC_AREAS ,ca.DESC as DESC_CATEGORI, md.DESC as DESC_MODALI  FROM persxmes pe  inner join datperso d  on pe.REGISTRO=d.id_datperso inner join afps a on d.id_afps=a.id_afps inner join docide do on d.id_docide=do.REGISTRO 
inner join areas ar on d.id_areas=ar.id_areas inner join categori ca on d.id_categori=ca.id_categori inner join modali md on d.id_modali=md.id_modali where pe.REGMES='$mes'";
$result=$conn->query($date);
$row = 6; 
$array=array();
$arrays1=array();
$areg=array();
$letras = range('A', 'Z');     
$i=19;   
$j=6;                             
while($fila=$result->fetch_assoc())
{
    $arrays1[]=$fila;
}

foreach($arrays1 as $fila)
{
    $desctfinal=0;
    $importe=0;
    $a=$fila['id_datperso'];
    $sheet->setCellValue('A' . $row, $fila['CODIGO']);
    $sheet->setCellValue('B' . $row, $fila['CODPLAZA']);
    $sheet->setCellValue('C' . $row, $fila['NOMBRE']);
    $sheet->setCellValue('D' . $row, $fila['APATERNO']);
    $sheet->setCellValue('E' . $row, $fila['AMATERNO']);
    $sheet->setCellValue('F' . $row, $fila['DESC_AFPS']);
    $sheet->setCellValue('G' . $row, $fila['SIGLA']);
    $sheet->setCellValue('H' . $row, $fila['NUMERO_DOC']);
    $sheet->setCellValue('I' . $row, $fila['CARGO']);
    $sheet->setCellValue('J' . $row, $fila['CODIGO_IPS']);
    $sheet->setCellValue('K' . $row, $fila['CODIGO_AFP']);
    $sheet->setCellValue('L' . $row, $fila['CTA_CTE']);
    $sheet->setCellValue('M' . $row, $fila['DESC_AREAS']);
    $sheet->setCellValue('N' . $row, $fila['DESC_CATEGORI']);
    $sheet->setCellValue('O' . $row, $fila['DESC_MODALI']);
    $sheet->setCellValue('P' . $row, '');
    $sheet->setCellValue('Q' . $row, '');
    $sheet->setCellValue('R' . $row, '');
    $sheet->setCellValue('S' . $row, '');
    $i=19;
    $r=25;
    $ts=0;
    $planilla="SELECT IMPORTE,DESCT,CODIGO FROM reportxplanilla where REGMES='$mes' and REGPERSO='$a' and (PROPOR='0' OR PROPOR='1') and CODIGO NOT IN('10080') ORDER BY CODIGO";
    $sqls=$conn->query($planilla);
    $rep="SELECT DISTINCT CODIGOSIAF, CODIGO, DETALLE
    FROM renumeraciones
    ORDER BY CODIGO;";
    $recss=$conn->query($rep);
    while($resf=$recss->fetch_assoc())
    {
        $areg[]=$resf;
    }
  foreach($areg as $ref)
  {
    $coordenadar = $arreglo[$r].'3';

    $sheet->setCellValue($arreglo[$r].'1',$ref['DETALLE']);
    $sheet->setCellValue($arreglo[$r].'3',$ref['CODIGOSIAF']);
 
    
    if($r<69)
    {
        $r++;
    }
  }



    while($results=$sqls->fetch_assoc())
    {
        $array[]=$results;
    }
    if(isset($array))
    {

   
    foreach($array as $filas)
    {
        $coordenada = $arreglo[$i].$row;
        $coordenadas = $arreglo[$i].'5';
        $coordenadasX = $arreglo[$i].'4';
      
     if($filas['DESCT']=='sobrevive'||$filas['DESCT']=='sindurgenc'||$filas['DESCT']=='sinaguinal')
     {
     }else{
       
        $sheet->setCellValue($coordenadasX,$filas['CODIGO']);
        $sheet->setCellValue($coordenadas,$filas['DESCT']);
        $sheet->setCellValue($coordenada,$filas['IMPORTE']);
    
        if($filas['DESCT']=='cbonoesp'|| $filas['DESCT']=='DS 276-91'|| $filas['DESCT']=='ESCOLARIDA')
        {

        }else{
            $importe=$importe + round((double)$filas['IMPORTE'],2);
        }
        
        if($i<69)
        {
            $i++;
        }

     }
 
    }
}else 
{
    
}
    $finaltotali="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='0' and DESCT not in('cbonoesp','homog.doc','DS 276-91','ESCOLARIDA')";
    $sqlfinaly=$conn->query($finaltotali);
    $sqlfinalfetch=$sqlfinaly->fetch_assoc();

    $finaltotali1="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='0' and DESCT not in('cbonoesp','homog.doc')";
    $sqlfinaly1=$conn->query($finaltotali1);
    $sqlfinalfetch1=$sqlfinaly1->fetch_assoc();

    $finaltotali12="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='Enf.ESSAL'";
    $sqlfinaly12=$conn->query($finaltotali12);
    $sqlfinalfetch2=$sqlfinaly12->fetch_assoc();

    $finaltotali13="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='ESSALUD VI'";
    $sqlfinaly13=$conn->query($finaltotali13);
    $sqlfinalfetch13=$sqlfinaly13->fetch_assoc(); 

    $finaltotali14="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='D.JUDICIAL'";
    $sqlfinaly14=$conn->query($finaltotali14);
    $sqlfinalfetch14=$sqlfinaly14->fetch_assoc(); 

    $finaltotali15="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='CAJA MUNIC'";
    $sqlfinaly15=$conn->query($finaltotali15);
    $sqlfinalfetch15=$sqlfinaly15->fetch_assoc();

    $finaltotali16="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='ASOC.DOCEN'";
    $sqlfinaly16=$conn->query($finaltotali16);
    $sqlfinalfetch16=$sqlfinaly16->fetch_assoc();

    $finaltotali17="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='COOPERATIV'";
    $sqlfinaly17=$conn->query($finaltotali17);
    $sqlfinalfetch17=$sqlfinaly17->fetch_assoc();

    $finaltotali18="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='BCO.INTERB'";
    $sqlfinaly18=$conn->query($finaltotali18);
    $sqlfinalfetch18=$sqlfinaly18->fetch_assoc();

    $finaltotali19="SELECT sum(IMPORTE) as finalimporte FROM reportxplanilla r inner join datperso d on r.REGPERSO=d.id_datperso where r.REGMES='$mes' and  r.REGPERSO='$a' and r.PROPOR='2' and r.DESCT ='BCO.INTERB'";
    $sqlfinaly19=$conn->query($finaltotali19);
    $sqlfinalfetch19=$sqlfinaly19->fetch_assoc();
    $i++;
    $sheet->setCellValue( $arreglo[$i]. '4', '1998');
    $sheet->setCellValue($arreglo[$i]. '5', 'AFECTO');
    $sheet->setCellValue($arreglo[$i] . $j, $sqlfinalfetch['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i]. '4', '1999');
    $sheet->setCellValue( $arreglo[$i]. '5', 'TOTAL');
    $sheet->setCellValue( $arreglo[$i]. $j, $sqlfinalfetch1['finalimporte']);
    $i++;
    $sheet->setCellValue( $arreglo[$i]. '4', '2401');
    $sheet->setCellValue( $arreglo[$i]. '5', 'Enf.ESSAL');
    $sheet->setCellValue( $arreglo[$i]. $j,  $sqlfinalfetch2['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i] . '5', 'DES.LEY ');
    $sheet->setCellValue($arreglo[$i] . '4', '2999');
    $sheet->setCellValue($arreglo[$i] . $j,  $sqlfinalfetch2['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i] . '4', '3005 ');
    $sheet->setCellValue($arreglo[$i] . '5', 'ESSALUD VI ');
    $sheet->setCellValue($arreglo[$i] . $j,  $sqlfinalfetch13['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i] . '4', '3006 ');
    $sheet->setCellValue($arreglo[$i] . '5', 'D.JUDICIAL ');
    $sheet->setCellValue($arreglo[$i] . $j,  $sqlfinalfetch14['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i]. '4', '3012 ');
    $sheet->setCellValue($arreglo[$i]. '5', 'CAJA MUNIC ');
    $sheet->setCellValue($arreglo[$i]. $j,  $sqlfinalfetch15['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i]. '4', '3022 ');
    $sheet->setCellValue($arreglo[$i]. '5', 'ASOC.DOCEN');
    $sheet->setCellValue($arreglo[$i]. $j,  $sqlfinalfetch16['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i] . '4', '3023 ');
    $sheet->setCellValue($arreglo[$i] . '5', 'COOPERATIV');
    $sheet->setCellValue($arreglo[$i] . $j,  $sqlfinalfetch17['finalimporte']);
    $i++;
    $sheet->setCellValue($arreglo[$i]. '4', '3024 ');
    $sheet->setCellValue($arreglo[$i]. '5', 'BCO.INTERB');
    $sheet->setCellValue($arreglo[$i]. $j,  $sqlfinalfetch18['finalimporte']);
    $i++;
    $val1=0;
    $val2=0;
    $val3=0;
    $val4=0;
    $val5=0;
    $val6=0;
    $val7=0;
    if(isset($sqlfinalfetch2['finalimporte'])) {
       
    $val1= (double)$sqlfinalfetch2['finalimporte'];

    }
    if(isset($sqlfinalfetch13['finalimporte'])) {
       
        $val2= (double)$sqlfinalfetch13['finalimporte'];
    
    }
    if(isset($sqlfinalfetch114['finalimporte'])) {
       
    $val3= (double)$sqlfinalfetch14['finalimporte'];

    }
    if(isset($sqlfinalfetch15['finalimporte'])) {
       
        $val4= (double)$sqlfinalfetch15['finalimporte'];
    
    }
    if(isset($sqlfinalfetch16['finalimporte'])) {
       
        $val5= (double)$sqlfinalfetch16['finalimporte'];
    
    }    
    if(isset($sqlfinalfetch17['finalimporte'])) {
       
        $val6= (double)$sqlfinalfetch17['finalimporte'];
    
    }
    if(isset($sqlfinalfetch17['finalimporte'])) {
       
        $val7= (double)$sqlfinalfetch18['finalimporte'];   
    }

    $totaldesc=$val1+$val2+$val3+$val4+$val5+$val6+$val7;
    $desctfinal=(double)$sqlfinalfetch1['finalimporte']- $totaldesc;
    $sheet->setCellValue($arreglo[$i] . '3', '0999');
    $sheet->setCellValue($arreglo[$i] . '4', '3999');
    $sheet->setCellValue($arreglo[$i]. '5', 'TOTAL.DESC');
    $sheet->setCellValue($arreglo[$i] . $j, $totaldesc);
    $i++;
    $sheet->setCellValue($arreglo[$i] . '1', 'NETO A PERCIBIR');
    $sheet->setCellValue($arreglo[$i] . '3', '0999');
    $sheet->setCellValue($arreglo[$i] . '4', '4999');
    $sheet->setCellValue($arreglo[$i] . '5', 'NETO');
    $sheet->setCellValue($arreglo[$i] . $j, $desctfinal);
    $j++;
    $row++;
    unset($array);
}


$record=0;
foreach($arreglo as $areg)
{
    
    $sheet->getColumnDimension(''.$arreglo[$record].'')->setAutoSize(true);
    
    $columna = $arreglo[$record];

    $style = $sheet->getStyle($columna);
    $alignment = $style->getAlignment();
    $alignment->setHorizontal(Alignment::HORIZONTAL_LEFT);
    
    $record++; 

}
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
    '05' => 'Mayo',
    '06' => 'junio',
    '07' => 'julio',
    '08' => 'agosto',
    '09' => 'Setiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre'
);

$mesmysql = mysqli_query($conn, "SELECT * FROM meses WHERE id_meses ='$mes'");
$mesac = mysqli_fetch_assoc($mesmysql);
$monthNum = $mesac['MES'];
$monthName = $mesesEnEspanol[$monthNum];


// Guardar la hoja de cálculo en un archivo temporal
$tempFileName =  ' mes de '.$monthName.' '.$mesac['anio'].'.xlsx';
// @codingStandardsIgnoreLine
$writer = new Xlsx($spreadsheet);

$writer->save($tempFileName);


// Establecer los encabezados para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . basename($tempFileName) . '"');
header('Content-Length: ' . filesize($tempFileName));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: no-cache');
header('Pragma: no-cache');

// Leer el archivo y enviarlo al navegador
readfile($tempFileName);

// Eliminar el archivo temporal
unlink($tempFileName);
?>
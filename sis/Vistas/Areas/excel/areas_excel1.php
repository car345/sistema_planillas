<?php
require '../vendor/autoload.php'; // Incluye el archivo de autoloading de la biblioteca
include('../../../../conecta.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

$date="SELECT d.CODIGO ,d.CODPLAZA,d.NOMBRE,d.APATERNO,d.AMATERNO,d.NUMERO_DOC,d.CARGO,d.CODIGO_IPS,d.CODIGO_AFP,d.CTA_CTE,
a.DESC,do.SIGLA,ar.DESC as DESC_AREAS ,ca.DESC as DESC_CATEGORI, md.DESC as DESC_MODALI  FROM datperso d inner join afps a on d.id_afps=a.id_afps inner join docide do on d.id_docide=do.REGISTRO 
inner join areas ar on d.id_areas=ar.id_areas inner join categori ca on d.id_categori=ca.id_categori inner join modali md on d.id_modali=md.id_modali";
$result=$conn->query($date);
$row = 6; 
while($fila=$result->fetch_assoc())
{
    $sheet->setCellValue('A' . $row, $fila['CODIGO']);
    $sheet->setCellValue('B' . $row, $fila['CODPLAZA']);
    $sheet->setCellValue('C' . $row, $fila['NOMBRE']);
    $sheet->setCellValue('D' . $row, $fila['APATERNO']);
    $sheet->setCellValue('E' . $row, $fila['AMATERNO']);
    $sheet->setCellValue('F' . $row, $fila['DESC']);
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
    $row++;


}




$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('E')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);
$sheet->getColumnDimension('H')->setAutoSize(true);
$sheet->getColumnDimension('I')->setAutoSize(true);
$sheet->getColumnDimension('J')->setAutoSize(true);
$sheet->getColumnDimension('K')->setAutoSize(true);
$sheet->getColumnDimension('L')->setAutoSize(true);
$sheet->getColumnDimension('M')->setAutoSize(true);
$sheet->getColumnDimension('N')->setAutoSize(true);
$sheet->getColumnDimension('O')->setAutoSize(true);
$sheet->getColumnDimension('P')->setAutoSize(true);
$sheet->getColumnDimension('Q')->setAutoSize(true);
$sheet->getColumnDimension('R')->setAutoSize(true);
$sheet->getColumnDimension('S')->setAutoSize(true);
// Guardar la hoja de cálculo en un archivo temporal
$tempFileName = 'nombre_archivo.xlsx';
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
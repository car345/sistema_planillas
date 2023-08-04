<?php 
	include "../../../../conecta.php";
	require "fpdf/fpdf.php";
	$cliente=$_GET['m'];
	$query = mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.REGISTRO
	FROM persxmes p inner join datperso f on p.REGISTRO=f.id_datperso where p.REGMES='$cliente'");
$query2 =mysqli_query($conn,"SELECT count(*) as datos FROM planilla p inner join datperso f on p.REGPERSO=f.id_datperso inner join aportes a on p.REGAPORT=a.REGISTRO 
where p.REGMES='$cliente' and TIPOCR='1' and PROPOR='1' and f.id_categori ='0'");	


	$pdf= NEW FPDF();
	$pdf->AliasNbPages();
	$pdf->SetMargins(10, 10, 10);
	$pdf->AddPage('A3');
	$pdf->Ln(5);
	$pdf->SetFont("Times", "", 7);
	$pdf->Cell(280, 5,'UNIVERSIDAD NACIONAL "HERMILIO VALDIZAN"', 0, 0, "C");
	$pdf->Ln(6);
	while ($fila =mysqli_fetch_assoc($query)) {
		$pdf->Cell(30, 12,$fila['NOMBRE'], 0, 0, "r");
		$pdf->Cell(30, 12,$fila['APELLIDOS'], 0, 0, "r");
		$pdf->Cell(4, 12,'(a)', 0, 0, "r");
		$pdf->Ln(6);
	}


	$r=mysqli_fetch_assoc($query2);
	$f=0;
	
	$query5 =mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.REGISTRO,p.IMPORTE,a.APORTE,a.DESCT FROM planilla p inner join datperso f on p.REGPERSO=f.id_datperso inner join aportes a on p.REGAPORT=a.REGISTRO 
	where p.REGMES='$cliente'  and PROPOR='1' and TIPOCR='1' ORDER BY a.CODIGO");
$pdf->setX(80);
	while ($r5= mysqli_fetch_array($query5)){
	$l= (double)$r['datos']/2;
	$as=(double) $r['datos'];
	if($f <$l)
		{
			$f++;
			
			$pdf->Cell(10, -12,$r5['IMPORTE'], 0, 0);
			
	
		} 
	
	}
	
	

	$pdf->Ln(6);
	

	$pdf->Output();

?>
<?php

	require_once '../pdf/vendor/autoload.php';
	include "../../../../conecta.php";
	define("DOMPDF_ENABLE_REMOTE", false);
	$cliente=$_GET['id'];
	$mes=$_GET['m'];
	use Dompdf\Dompdf;
	// $query = mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,f.id_modali,f.id_areas,p.REGISTRO
	// FROM persxmes p inner join datperso f on p.REGISTRO=f.id_datperso where f.NUMERO_DOC='$cliente' and p.REGMES='$mes'");

	$query = mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,f.id_modali,f.id_areas,p.REGISTRO, a.DESC as DESCA, af.DESC as DESCAF, m.DESC as DESCM, c.DESC as DESCC FROM persxmes p inner join datperso f on p.REGISTRO=f.id_datperso inner join areas a on f.id_areas=a.id_areas inner join afps af on af.id_afps=f.id_afps inner join modali m on m.id_modali=f.id_modali inner join categori c on c.id_categori=f.id_categori where f.NUMERO_DOC='$cliente' and p.REGMES='$mes'");
	
	$query1 =mysqli_query($conn,"SELECT  DISTINCT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.REGPERSO,p.IMPORTE,p.DESCT,p.CODIGO,re.CODIGOSIAF FROM reportxplanilla p inner join datperso f on p.REGPERSO=f.id_datperso  
	inner join renumeraciones re on p.CODIGO=re.CODIGO where p.REGMES='$mes' and f.NUMERO_DOC='$cliente' and p.PROPOR='0'");	
	
	
			
	ob_start();
		    include(dirname('__FILE__').'/factura_plantilla.php');
		    $html = ob_get_clean();
			// instantiate and use the dompdf class
			$dompdf = new Dompdf();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			ob_end_clean ();
			$dompdf->stream('factura_1.pdf',array('Attachment'=>0));
			
			exit;
?>
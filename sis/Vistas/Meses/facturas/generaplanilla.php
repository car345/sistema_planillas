<?php

	include "../../../../conecta.php";
	require_once '../pdf/vendor/autoload.php';
	
	define("DOMPDF_ENABLE_REMOTE", false);
	use Dompdf\Dompdf;

 		$cliente=$_GET['m'];
		$m=$_GET['m'];
	
        $query_1 = mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.REGISTRO
		FROM persxmes p inner join datperso f on p.REGISTRO=f.id_datperso where p.REGMES='$cliente'");
		while($date=mysqli_fetch_assoc($query_1))
		{
			$categoria[]=$date['id_categori'];
		}

		$query3 =mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.IMPORTE FROM reportxplanilla p inner join datperso f on p.REGPERSO=f.id_datperso where p.REGMES='$cliente' and f.id_categori='61' ORDER BY p.CODIGO");

		$query5 =mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.IMPORTE,p.DESCT FROM reportxplanilla p inner join datperso f on p.REGPERSO=f.id_datperso  where p.REGMES='$cliente' and p.REGPERSO='$m' and PROPOR='0' ORDER BY p.id_registro");
		

		$query6 =mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.CARGO,f.id_categori,f.CTA_CTE,f.id_afps,p.IMPORTE,p.DESCT FROM reportxplanilla p inner join datperso f on p.REGPERSO=f.id_datperso  where p.REGMES='$cliente' and p.REGPERSO='$m' and PROPOR='0' ORDER BY p.id_registro");
		
		
		
		ob_start();
				include(dirname('__FILE__').'/planillas.php');
				$html = ob_get_clean();

				// instantiate and use the dompdf class
				$dompdf = new Dompdf();
				$options=$dompdf->getOptions();
				$options->set(array('isRemoteEnabled '=>true));
				$dompdf->setOptions($options);
				$dompdf->loadHtml($html);
				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('A3', 'landscape');
				// Render the HTML as PDF
				$dompdf->render();
				// Output the generated PDF to Browser
				ob_end_clean ();
				$dompdf->stream('factura_1.pdf',array('Attachment'=>0));
				exit;
		

?>

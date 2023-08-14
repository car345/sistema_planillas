<?php

	include "../../../../conecta.php";
	require_once '../pdf/vendor/autoload.php';
	define("DOMPDF_ENABLE_REMOTE", false);
	
	use Dompdf\Dompdf;

	

		$query = mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.SEXO,DATE_FORMAT(f.FECHA_NACI, '%d/%m/%Y') as fecha,f.CODIGO_AFP,f.CODIGO_IPS
		,DATE_FORMAT(f.FECHA_ING, '%d/%m/%Y') as fecha_ing,f.CTA_CTE,r.DESC
		FROM datperso f inner join afps r on f.id_afps=r.id_afps");

		
			ob_start();
			include(dirname('__FILE__').'/modalidad.php');
			$html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();
			$options=$dompdf->getOptions();
			$options->set(array('isRemoteEnabled '=>true));
			$dompdf->setOptions($options);
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
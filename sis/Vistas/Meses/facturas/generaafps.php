<?php

	include "../../../../conecta.php";
	require_once '../pdf/vendor/autoload.php';
	
	
	use Dompdf\Dompdf;

	

	$query = mysqli_query($conn,"SELECT f.NUMERO_DOC,f.NOMBRE,f.APELLIDOS,f.SEXO,DATE_FORMAT(f.FECHA_NACI, '%d/%m/%Y') as fecha,f.CODIGO_AFP,f.CODIGO_IPS
	,DATE_FORMAT(f.FECHA_ING, '%d/%m/%Y') as fecha_ing,f.CTA_CTE,r.DESC,c.DESC as nombre_categori,e.DESCR as nombre_estado,a.DESC as nombre_area
	FROM datperso f inner join afps r on f.id_afps=r.id_afps inner join categori c on f.id_categori=c.id_categori inner join estado e on f.id_estado=e.id_estado 
	inner join areas a on f.id_areas=a.id_areas");
			ob_start();
		    include(dirname('__FILE__').'/afps.php');
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
		
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			ob_end_clean ();
			$dompdf->stream('datospersonales.pdf',array('attachment'=>0));
			
			exit;
		

?>
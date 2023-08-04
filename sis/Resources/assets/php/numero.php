<?php function numeroEnLetras($numero) {
					$unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve');
					$decenas = array('diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve');
					$decenas2 = array('', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa');
					$centenas = array('', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos');
					$millar = array('mil', 'dos mil', 'tres mil', 'cuatro mil', 'cinco mil');
					if ($numero < 10) {
						return $unidades[$numero];
					} else if ($numero < 20) {
						return $decenas[$numero-10];
					} else if ($numero < 100) {
						$decena = $decenas2[floor($numero/10)];
						$unidad = $numero%10;
						if ($unidad == 0) {
							return $decena;
						} else {
							return $decena." y ".$unidades[$unidad];
						}
					} else if ($numero < 1000) {
						$centena = $centenas[floor($numero/100)];
						$decena = $numero%100;
						if ($decena == 0) {
							return $centena;
						} else if ($decena < 10) {
							return $centena." ".$unidades[$decena];
						} else if ($decena < 20) {
							return $centena." ".$decenas[$decena-10];
						} else {
							$decena2 = $decenas2[floor($decena/10)];
							$unidad = $decena%10;
							if ($unidad == 0) {
								return $centena." ".$decena2;
							} else {
								return $centena." ".$decena2." y ".$unidades[$unidad];
							}
						}

					} 
					else if($numero) {
						
					} else{
						return "Número fuera de rango.";
					}
				}
?>
		
<?php 
    $num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{$siguiente='1';
		 echo 'Aun no hay registros<br><br>';}
						
	else {
		$siguiente=$numObjetsArray['counter']+1;
		echo 'El sistema generar&aacute; el id <span class="red">"'.$numObjetsArray['counter']; echo '"</span> para el pr&oacute;ximo vehiculo<br><br>';
						
	}
	?>
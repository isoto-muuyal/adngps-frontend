<?php 
    $num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM F_EMPRESAS");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{$siguiente='1';
		 echo 'Aun no hay registros<br><br>';}
						
	else {
		$siguiente=$numObjetsArray['counter']+1;
		echo 'Existe (n) <span class="red">"'.$numObjetsArray['counter']; echo '"</span> Empresa (s) en el Sistema<br><br>';
						
	}
	?>
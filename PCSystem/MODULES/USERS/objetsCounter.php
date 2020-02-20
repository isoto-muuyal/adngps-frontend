<?php 
    $num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{$siguiente='1';
		 echo 'Aun no hay registros<br><br>';}
						
	else {
		$siguiente=$numObjetsArray['counter']+1;
		echo '<span class="tha_background">Usted tiene <span class="red">"'.$numObjetsArray['counter']; echo '"</span> Usuarios (s) registrados en el Sistema</span><br><br>';
						
	}
	?>
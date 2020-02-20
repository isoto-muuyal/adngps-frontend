<?php 
 if (isset($_POST['confirma'])) {
				
					$consulta=$_POST['consulta'];
					$confirma=$_POST['confirma']; 
					$numero_telefono=$_POST['numero_telefono']; 
					$numero_serie=$_POST['numero_serie'];
					$mb=$_POST['mb'];
					
	
	$consulta_existencia_de_sims = odbc_exec($conexion, "SELECT Count(*) AS counter FROM C_SIMS WHERE numero_telefono='".$numero_telefono."'");
    
	$numDispositivos = odbc_fetch_array($consulta_existencia_de_sims);
    $numDispositivos['counter'];
	
	if ($numDispositivos['counter']==0) {
					
	$ejecucion=odbc_exec($conexion,"INSERT INTO C_SIMS (numero_telefono,numero_serie,mb,activos) VALUES ('".$numero_telefono."','".$numero_serie."','".$mb."','no')");
	echo '
	
	    <form action="panel.php" method="post" name="formulario1">
			<input name="consulta" type="hidden" value="SMS" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha insertado correctamente</span>
	
	';
	
	}
				
				}
?>
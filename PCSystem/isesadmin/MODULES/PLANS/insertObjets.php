<?php 
  if (isset($_POST['confirma'])) {
				
					$consulta=$_POST['consulta'];
					$confirma=$_POST['confirma']; 
					$descripcion=$_POST['descripcion']; 
					$costo=$_POST['costo'];
					$periodo=$_POST['periodo']; 
					
					
	$consulta_existencia_de_plan = odbc_exec($conexion, "SELECT Count(*) AS counter FROM D_PLANES WHERE descripcion='".$descripcion."'");
    
	$numDispositivos = odbc_fetch_array($consulta_existencia_de_plan);
    $numDispositivos['counter'];
	
	if ($numDispositivos['counter']==0) {
					
	$ejecucion=odbc_exec($conexion,"INSERT INTO D_PLANES (descripcion,costo,periodo) VALUES ('".$descripcion."','".$costo."','".$periodo."')");
	echo '
	    <form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="PLANES" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha insertado correctamente</span>
	
	';
	}
				
				}
?>
<?php 
$id=$_POST['id'];

 	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM C_SIMS WHERE id='".$id."' AND activos='no'");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{echo '
		<div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="SMS" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Imposible<br>ejecutar esta acci&oacute;n<br>!...SIM EN USO...!</span>
		</div>
		</div>
		
		';}
						
	else {
		
						
	
	echo '
	    <div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		Esta seguro de<br>eliminar esta tarjeta sim?<br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="SMS" /><input name="" type="submit" value="no" class="confirma_eliminacion" />	
		</form>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="SMS" />
			<input name="confirmacion" type="hidden" value="si" />
			<input name="id" type="hidden" value="'.$id.'" />
			<input name="" type="submit" value="si" class="confirma_eliminacion" />	
		</form>
		</div>
		</div>
	
	';
	
	if (isset($_POST['confirmacion'])) {
		
		
		$confirmacion=$_POST['confirmacion'];
		$consulta=$_POST['consulta'];
		$id=$_POST['id'];
		
		
		odbc_exec($conexion, "DELETE FROM C_SIMS WHERE id='".$id."'");
		
		echo '
		<div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="SMS" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha eliminado correctamente</span>
		</div>
		</div>
		';
		
		
		}
		
		} 
	
	?>
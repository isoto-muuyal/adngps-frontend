<?php 

			

	
	$id=$_POST['id']; 
	$modelo_gps=$_POST['modelo_gps'];
	
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE modelo_gps='".$modelo_gps."'");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']!=0)
		{echo '
		<div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="GPSMOD" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Imposible<br>ejecutar esta acci&oacute;n<br>!...MODELO EN USO...!</span>
		</div>
		</div>
		
		';}
						
	else {
	
	
	echo '
	    <div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		Esta seguro de<br>eliminar este modelo?<br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="GPSMOD" /><input name="" type="submit" value="no" class="confirma_eliminacion" />	
		</form>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="GPSMOD" />
			<input name="confirmacion" type="hidden" value="si" />
			<input name="id" type="hidden" value="'.$id.'" />
			<input name="modelo_gps" type="hidden" value="'.$modelo_gps.'" />
			<input name="" type="submit" value="si" class="confirma_eliminacion" />	
		</form>
		</div>
		</div>
	';
	
	if (isset($_POST['confirmacion'])) {
		
		
		$confirmacion=$_POST['confirmacion'];
		$consulta=$_POST['consulta'];
		$id=$_POST['id'];
		$modelo_gps=$_POST['modelo_gps'];
		
		
		odbc_exec($conexion, "DELETE FROM B_MODELOS WHERE id='".$id."'");
		
		echo '
		<div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="GPSMOD" /><input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha eliminado correctamente</span>
		</div>
		</div>
		';
		
		
		} 
	}
	?>
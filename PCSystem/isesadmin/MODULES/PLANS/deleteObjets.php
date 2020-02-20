<?php 
			
  $id=$_POST['id'];


  $descripcion=$_POST['descripcion']; 
  $costo=$_POST['costo']; 
		
  $num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE costo='".$id."'");
  $numObjetsArray = odbc_fetch_array($num_objets);
  $numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']!=0)
		{echo '
		<div id="funcion_opacidad">
	    <div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="PLANES" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Imposible<br>ejecutar esta acci&oacute;n<br>!...PLAN ASIGNADO...!<br>a uno o mas veh&iacute;culos</span>
		</div>
		</div>
		
		';}
						
	else {
		
	
		
	
	echo '
	<div id="funcion_opacidad">
	<div id="contenedor_confirmacion">
		Esta seguro de<br>eliminar este plan?<br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="PLANES" />
			<input name="" type="submit" value="no" class="confirma_eliminacion" />	
		</form>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="PLANES" />
			<input name="confirmacion_modifica_planes" type="hidden" value="si" />
			<input name="id" type="hidden" value="'.$id.'" />
			<input name="descripcion" type="hidden" value="'.$descripcion.'" />
			<input name="costo" type="hidden" value="'.$costo.'" />
			
			<input name="" type="submit" value="si" class="confirma_eliminacion" />	
		</form>
		</div>
		</div>
	';
	
	if (isset($_POST['confirmacion_modifica_planes'])) {
		
		
		$confirmacion_modifica_planes=$_POST['confirmacion_modifica_planes'];
		$consulta=$_POST['consulta'];
		$id=$_POST['id'];
		$descripcion=$_POST['descripcion']; echo $descripcion;
		$costo=$_POST['costo']; echo $costo;
		
		
		
		odbc_exec($conexion, " DELETE FROM D_PLANES WHERE id=".$id.";");
		
		
		
		echo '
		<div id="funcion_opacidad">
		<div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="PLANES" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha eliminado correctamente</span>
		</div>
		</div>';
		
		
		}
		
		}
	
	?>
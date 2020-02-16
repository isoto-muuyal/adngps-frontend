<?php 

if (isset($_POST['eliminar']))
{
			
$id=$_POST['id']; 
$nombre_empresa=$_POST['nombre_empresa'];
$consulta=$_POST['consulta'];
	
	echo '
	<div id="funcion_opacidad">
	<div id="contenedor_confirmacion">
		Esta seguro de<br>eliminar este registro?<br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="mostrar_registros" type="hidden" value="si" />';
			if (!isset($_POST['filtro'])) {
							echo'';
						}
						else {
							echo '
							<input name="filtro" type="hidden" value="'.$filtro.'" />
							<input name="objeto" type="hidden" value="'.$objeto.'" />';
						}
			echo '<input name="" type="submit" value="no" class="confirma_eliminacion" />	
		</form>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="confirmacion_elimina" type="hidden" value="si" />
			<input name="eliminar" type="hidden" value="si" />
			<input name="mostrar_registros" type="hidden" value="si" />';
			if (!isset($_POST['filtro'])) {
							echo'';
						}
						else {
							echo '
							<input name="filtro" type="hidden" value="'.$filtro.'" />
							<input name="objeto" type="hidden" value="'.$objeto.'" />';
						}
			echo '<input name="id" type="hidden" value="'.$id.'" />
			      <input name="nombre_empresa" type="hidden" value="'.$nombre_empresa.'" />
			<input name="" type="submit" value="si" class="confirma_eliminacion" />	
		</form>
		</div>
		</div>
	';
	
	if (isset($_POST['confirmacion_elimina'])) {
		
		
		$confirmacion_elimina=$_POST['confirmacion_elimina'];
		$consulta=$_POST['consulta'];
		$id=$_POST['id'];
		$nombre_empresa=$_POST['nombre_empresa'];
		
		
		odbc_exec($conexion, "DELETE FROM F_EMPRESAS WHERE id='".$id."'");
		
		//ACTUALIZACION T USUARIOS 
			odbc_exec($conexion, "UPDATE G_USUARIOS SET nombre_empresa = '".$localFactoryName."' WHERE nombre_empresa='".$nombre_empresa."'"); 
		//ACTUALIZACION T USUARIOS
		
		//ACTUALIZACION T INVENTARIO 
			odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET nombre_empresa = '".$localFactoryName."' WHERE nombre_empresa='".$nombre_empresa."'"); 
		//ACTUALIZACION T INVENTARIO
		
		//ACTUALIZACION T USUARIO PADRE 
			odbc_exec($conexion, "UPDATE G_USUARIOS SET nombre_empresa = '".$localFactoryUser."' WHERE usuario_padre='".$nombre_empresa."'"); 
		//ACTUALIZACION T USUARIO PADRE
		
		//ACTUALIZACION T EMPRESA PADRE 
			odbc_exec($conexion, "UPDATE F_EMPRESAS SET cuenta_maestra = '".$localFactoryName."' WHERE cuenta_maestra='".$nombre_empresa."'"); 
		//ACTUALIZACION T EMPRESA PADRE
		
		echo '
		<div id="funcion_opacidad">
		<div id="contenedor_confirmacion">
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="mostrar_registros" type="hidden" value="si" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha eliminado correctamente</span>
		</div>
		</div>';
		
		
		}
}
	
	?>
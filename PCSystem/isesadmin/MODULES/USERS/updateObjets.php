<?php 
			
		if (isset($_POST['modificar'])) {
		//PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR
		            $consulta=$_POST['consulta'];
					$id=$_POST['id'];
					$nombre_empresa=$_POST['nombre_empresa'];
					$contrasenia=$_POST['contrasenia'];
					$nombre_completo=$_POST['nombre_completo'];
					$correo=$_POST['correo']; 
					$zona_horaria=$_POST['zona_horaria']; 
					$tipo=$_POST['tipo'];
					$activa=$_POST['activa']; 
					$aviso_acceso=$_POST['aviso_acceso']; 
					$geocercas=$_POST['geocercas']; 
					$nombre_usuario=$_POST['nombre_usuario'];
					$Boofer=$_POST['Boofer'];  
					$usuario_padre=$_POST['usuario_padre']; 
					 
					 
					
					
		//USER NAME PROTECTED
		if($nombre_usuario!=$Boofer)
		{	
		$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE nombre_usuario='".$nombre_usuario."'");
    	$numObjetsArray = odbc_fetch_array($num_objets);
		$exist=$numObjetsArray['counter'];
		} else {$exist='0';}
						
		if ($exist!=0){
			
		echo '
		<div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
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
			echo '<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
			</form>
			<br><br>
		<span style="display:block; width:100%;"><br>Imposible<br>ejecutar esta acci&oacute;n<br>!...USUARIO EXISTENTE...!</span>
		    </div>
		</div>
		';
		 
		
		
		}
		else
		{
		
		?>
            
                 <div id="funcion_opacidad">
				 	<div id="contenedor_confirmacion">
                    <?php echo '
                    Esta seguro de<br>modificar este registro?<br><br>
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
						<input name="mostrar_registros" type="hidden" value="si" />';
						if (!isset($_POST['filtro'])) {
							echo'';
						}
						else {
							echo '
							<input name="filtro" type="hidden" value="'.$filtro.'" />
							<input name="objeto" type="hidden" value="'.$objeto.'" />';
						}
                        echo '<input name="confirmacion" type="hidden" value="si" />
                        <input name="id" type="hidden" value="'.$id.'" />
                        <input name="nombre_usuario" type="hidden" value="'.$nombre_usuario.'" />
						<input name="Boofer" type="hidden" value="'.$Boofer.'" />
                        <input name="contrasenia" type="hidden" value="'.$contrasenia.'" />
                        <input name="nombre_empresa" type="hidden" value="'.$nombre_empresa.'" />
						<input name="nombre_completo" type="hidden" value="'.$nombre_completo.'" />
                        <input name="correo" type="hidden" value="'.$correo.'" />
                        <input name="zona_horaria" type="hidden" value="'.$zona_horaria.'" />
                        <input name="usuario_padre" type="hidden" value="'.$usuario_padre.'" />
                        <input name="tipo" type="hidden" value="'.$tipo.'" />
                        <input name="geocercas" type="hidden" value="'.$geocercas.'" />
                        <input name="aviso_acceso" type="hidden" value="'.$aviso_acceso.'" />
                        <input name="activa" type="hidden" value="'.$activa.'" />
						<input name="" type="submit" value="si" class="confirma_eliminacion" />	
                    </form>'; ?>
                 	</div>
                 </div>
			
            <?php } //COMPANIE PROTECTED
			
			} //CIERRE DE PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR ?>
            
            
            
            <?php 
			//SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR
			if (isset($_POST['confirmacion'])) {
				    
					$consulta=$_POST['consulta'];
					$id=$_POST['id'];
					$nombre_empresa=$_POST['nombre_empresa'];
					$contrasenia=$_POST['contrasenia'];
					$nombre_completo=$_POST['nombre_completo'];
					$correo=$_POST['correo']; 
					$zona_horaria=$_POST['zona_horaria']; 
					$tipo=$_POST['tipo'];
					$activa=$_POST['activa']; 
					$aviso_acceso=$_POST['aviso_acceso']; 
					$geocercas=$_POST['geocercas']; 
					$nombre_usuario=$_POST['nombre_usuario'];
					$Boofer=$_POST['Boofer'];  
					$usuario_padre=$_POST['usuario_padre']; 
					
		
					
					//ACTUALIZACION T INVENTARIO 
odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET nombre_usuario = '".$nombre_usuario."' WHERE nombre_usuario='".$Boofer."'"); 					//ACTUALIZACION T INVENTARIO

                    //ACTUALIZACION T INVENTARIO COMPANY 
odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET nombre_empresa = '".$nombre_empresa."' WHERE nombre_usuario='".$Boofer."'"); 					//ACTUALIZACION T INVENTARIO COMPANY
					
					//ACTUALIZACION T USUARIO PADRE 
odbc_exec($conexion, "UPDATE G_USUARIOS SET usuario_padre = '".$nombre_usuario."' WHERE usuario_padre='".$Boofer."'"); 
					//ACTUALIZACION T USUARIO PADRE
					
					//ACTUALIZACION GEOCERCCA NOMBRE EMPRESA 
odbc_exec($conexion, "UPDATE H_GEOCERCAS SET empresa_geo = '".$nombre_empresa."' WHERE user_geo='".$Boofer."'"); 
					//ACTUALIZACION GEOCERCCA NOMBRE EMPRESA
					
					//ACTUALIZACION GEOCERCCA NOMBRE USUARIO  
odbc_exec($conexion, "UPDATE H_GEOCERCAS SET user_geo = '".$nombre_usuario."' WHERE user_geo='".$Boofer."'"); 
  					//ACTUALIZACION GEOCERCCA NOMBRE USUARIO 
					
					
					//ACTUALIZACION 
					odbc_exec($conexion, "UPDATE G_USUARIOS SET nombre_empresa = '".$nombre_empresa."', 
					contrasenia = '".$contrasenia."',
					nombre_completo = '".$nombre_completo."',
					correo = '".$correo."',
					zona_horaria = '".$zona_horaria."',
					tipo = '".$tipo."',
					activa = '".$activa."',
					aviso_acceso = '".$aviso_acceso."',
					geocercas = '".$geocercas."',
					nombre_usuario = '".$nombre_usuario."',
					usuario_padre = '".$usuario_padre."' WHERE id=".$id.";"); 
					//ACTUALIZACION 
		
					
					
					?>
                 
                 <!--MUESTRA DE VENTANA EMERGENTE OPACIDAD-->
                 <div id="funcion_opacidad">
				 	<div id="contenedor_confirmacion">
                    <?php echo '
					
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
						
						
						echo '<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
					</form>
					<br><br>
					<span style="display:block; width:100%;"><br>Modificaci&oacute;n exitosa</span>
					'; ?>
                 	</div>
                 </div>
                 <!--CIERRE DE MUESTRA DE VENTANA EMERGENTE OPACIDAD-->
                 
                 
			
            <?php 
			
			}//CIERRE DEL SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR ?>
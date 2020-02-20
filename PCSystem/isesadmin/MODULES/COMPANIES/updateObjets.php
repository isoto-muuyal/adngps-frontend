<?php 
			
		if (isset($_POST['modificar'])) {
		//PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR
					$id=$_POST['id'];
					$nombre_empresa=$_POST['nombre_empresa'];
					$Boofer=$_POST['Boofer'];  
					$razon_social=$_POST['razon_social'];
					$rfc=$_POST['rfc'];
					$direccion=$_POST['direccion']; 
					$codigo_postal=$_POST['codigo_postal']; 
					$pais=$_POST['pais']; 
					$estado=$_POST['estado']; 
					$ciudad=$_POST['ciudad']; 
					$tipo_empresa=$_POST['tipo_empresa']; 
					$cuenta_maestra=$_POST['cuenta_maestra']; 
					$zona_horaria=$_POST['zona_horaria']; 
					$aviso_acceso=$_POST['aviso_acceso']; 
					$activa=$_POST['activa']; 
					$num_geocercas=$_POST['num_geocercas']; 
					$persona_de_contacto=$_POST['persona_de_contacto']; 
					$telefono=$_POST['telefono']; 
					$correo=$_POST['correo'];
					
					
					
		//CAOMPANIE NAME PROTECTED
		if($nombre_empresa!=$Boofer)
		{	
		$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM F_EMPRESAS WHERE nombre_empresa='".$nombre_empresa."'");
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
		<span style="display:block; width:100%;"><br>Imposible<br>ejecutar esta acci&oacute;n<br>!...EMPRESA EXISTENTE...!</span>
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
                        <input name="nombre_empresa" type="hidden" value="'.$nombre_empresa.'" />
						<input name="Boofer" type="hidden" value="'.$Boofer.'" />
                        <input name="razon_social" type="hidden" value="'.$razon_social.'" />
                        <input name="rfc" type="hidden" value="'.$rfc.'" />
						<input name="direccion" type="hidden" value="'.$direccion.'" />
                        <input name="codigo_postal" type="hidden" value="'.$codigo_postal.'" />
                        <input name="pais" type="hidden" value="'.$pais.'" />
                        <input name="estado" type="hidden" value="'.$estado.'" />
                        <input name="ciudad" type="hidden" value="'.$ciudad.'" />
                        <input name="tipo_empresa" type="hidden" value="'.$tipo_empresa.'" />
                        <input name="cuenta_maestra" type="hidden" value="'.$cuenta_maestra.'" />
                        <input name="zona_horaria" type="hidden" value="'.$zona_horaria.'" />
						<input name="aviso_acceso" type="hidden" value="'.$aviso_acceso.'" />
						<input name="activa" type="hidden" value="'.$activa.'" />
						<input name="num_geocercas" type="hidden" value="'.$num_geocercas.'" />
						<input name="persona_de_contacto" type="hidden" value="'.$persona_de_contacto.'" />
						<input name="telefono" type="hidden" value="'.$telefono.'" />
						<input name="correo" type="hidden" value="'.$correo.'" />
                        <input name="" type="submit" value="si" class="confirma_eliminacion" />	
                    </form>'; ?>
                 	</div>
                 </div>
			
            <?php } //COMPANIE PROTECTED
			
			} //CIERRE DE PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR ?>
            
            
            
            <?php 
			//SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR
			if (isset($_POST['confirmacion'])) {
				    
					$id=$_POST['id'];
					$nombre_empresa=$_POST['nombre_empresa']; 
					$Boofer=$_POST['Boofer'];  
					$razon_social=$_POST['razon_social'];
					$rfc=$_POST['rfc'];
					$direccion=$_POST['direccion']; 
					$codigo_postal=$_POST['codigo_postal']; 
					$pais=$_POST['pais']; 
					$estado=$_POST['estado']; 
					$ciudad=$_POST['ciudad']; 
					$tipo_empresa=$_POST['tipo_empresa']; 
					$cuenta_maestra=$_POST['cuenta_maestra']; 
					$zona_horaria=$_POST['zona_horaria']; 
					$aviso_acceso=$_POST['aviso_acceso']; 
					$activa=$_POST['activa']; 
					$num_geocercas=$_POST['num_geocercas']; 
					$persona_de_contacto=$_POST['persona_de_contacto']; 
					$telefono=$_POST['telefono']; 
					$correo=$_POST['correo']; 
					
		
					
					//ACTUALIZACION T USUARIOS 
			odbc_exec($conexion, "UPDATE G_USUARIOS SET nombre_empresa = '".$nombre_empresa."' WHERE nombre_empresa='".$Boofer."'"); 
					//ACTUALIZACION T USUARIOS
					
					//ACTUALIZACION T INVENTARIO 
			odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET nombre_empresa = '".$nombre_empresa."' WHERE nombre_empresa='".$Boofer."'"); 
					//ACTUALIZACION T INVENTARIO
					
					//ACTUALIZACION T EMPRESA PADRE 
			odbc_exec($conexion, "UPDATE F_EMPRESAS SET cuenta_maestra = '".$nombre_empresa."' WHERE cuenta_maestra='".$Boofer."'"); 
					//ACTUALIZACION T EMPRESA PADRE
					
					
					
		
	
					//ACTUALIZACION 
					odbc_exec($conexion, "UPDATE F_EMPRESAS SET nombre_empresa = '".$nombre_empresa."', 
					razon_social = '".$razon_social."', 
					rfc = '".$rfc."',
					direccion = '".$direccion."', 
					codigo_postal = '".$codigo_postal."',
					pais = '".$pais."',
					estado = '".$estado."',
					ciudad = '".$ciudad."',
					tipo_empresa = '".$tipo_empresa."',
					cuenta_maestra = '".$cuenta_maestra."',
					zona_horaria = '".$zona_horaria."',
					aviso_acceso = '".$aviso_acceso."',
					activa = '".$activa."',
					num_geocercas = '".$num_geocercas."',
					persona_de_contacto = '".$persona_de_contacto."',
					telefono = '".$telefono."',
					correo = '".$correo."' WHERE id=".$id.";"); 
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
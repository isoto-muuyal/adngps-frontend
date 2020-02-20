<?php 
			
		if (isset($_POST['modificar'])) {
		
		
			
			
		
		
		
		
		
		
		//PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR
					$id=$_POST['id'];
					$modelo_gps=$_POST['modelo_gps']; 
					$imei=$_POST['imei'];
					$Boofer=$_POST['Boofer']; 
					$sim=$_POST['sim'];
					$sim_anterior=$_POST['sim_anterior']; 
					$nombre_vehiculo=$_POST['nombre_vehiculo']; 
					$nombre_usuario=$_POST['nombre_usuario'];
					$boofer_user=$_POST['boofer_user']; 
					$fecha_de_instalacion=$_POST['fecha_de_instalacion'];
					$fecha_de_facturacion=$_POST['fecha_de_facturacion']; 
					$costo=$_POST['costo']; 
					$funcion=$_POST['funcion'];
					$consulta=$_POST['consulta'];
					$nombre_usuario_boofer=$_POST['nombre_usuario_boofer'];
					
					
					
		//IMEI PROTECTED
		if($imei!=$Boofer)
		{	
		$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE imei='".$imei."'");
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
			</form><br><br>
		<span style="display:block; width:100%;"><br>Imposible<br>ejecutar esta acci&oacute;n<br>!...IMEI EXISTENTE...!</span>
		    </div>
		</div>
		';
		 
		
		
		}
		else
		{
		
		
		
		if($nombre_usuario!=$localFactoryUser)
		{			
		$consulta_empresa_de_usuario=odbc_exec($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$nombre_usuario."'");
		while ($la_empresa=odbc_fetch_object($consulta_empresa_de_usuario)) 
		{ 
			$nombre_empresa=$la_empresa->nombre_empresa;
		}
		}else {$nombre_empresa=$localFactoryName;}
		
		
		
					
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
                        <input name="modelo_gps" type="hidden" value="'.$modelo_gps.'" />
                        <input name="imei" type="hidden" value="'.$imei.'" />
                        <input name="sim" type="hidden" value="'.$sim.'" />
						<input name="sim_anterior" type="hidden" value="'.$sim_anterior.'" />
                        <input name="nombre_vehiculo" type="hidden" value="'.$nombre_vehiculo.'" />
                        <input name="nombre_empresa" type="hidden" value="'.$nombre_empresa.'" />
                        <input name="nombre_usuario" type="hidden" value="'.$nombre_usuario.'" />
						<input name="boofer_user" type="hidden" value="'.$boofer_user.'" />
                        <input name="fecha_de_instalacion" type="hidden" value="'.$fecha_de_instalacion.'" />
                        <input name="fecha_de_facturacion" type="hidden" value="'.$fecha_de_facturacion.'" />
                        <input name="costo" type="hidden" value="'.$costo.'" />
                        <input name="funcion" type="hidden" value="'.$funcion.'" />
                        <input name="nombre_usuario_boofer" type="hidden" value="'.$nombre_usuario_boofer.'" />
                        <input name="" type="submit" value="si" class="confirma_eliminacion" />	
                    </form>'; ?>
                 	</div>
                 </div>
			
            <?php } //IMEI PROTECTED
			
			
			
			
			} //CIERRE DE PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR ?>
            
            
            
            <?php 
			//SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR
			if (isset($_POST['confirmacion'])) {
				    
					$id=$_POST['id'];
					$modelo_gps=$_POST['modelo_gps']; 
					$imei=$_POST['imei']; 
					$sim=$_POST['sim'];
					$sim_anterior=$_POST['sim_anterior']; 
					$nombre_vehiculo=$_POST['nombre_vehiculo']; 
					$nombre_empresa=$_POST['nombre_empresa']; 
					$nombre_usuario=$_POST['nombre_usuario']; 
					$boofer_user=$_POST['boofer_user'];
					$fecha_de_instalacion=$_POST['fecha_de_instalacion'];
					$fecha_de_facturacion=$_POST['fecha_de_facturacion']; 
					$costo=$_POST['costo']; 
					$funcion=$_POST['funcion'];
					$nombre_usuario_boofer=$_POST['nombre_usuario_boofer'];
					
		
					
					
		
					
					
		//ACTUALIZACION DE SIMS
		if($sim_anterior!=$sim) {
						
		
		$consulta_el_sim_anterior=odbc_exec($conexion, "SELECT * FROM C_SIMS WHERE numero_telefono='".$sim_anterior."'");
					while ($el_sim_anterior=odbc_fetch_object($consulta_el_sim_anterior))
					{
						$id_sim_anterior=$el_sim_anterior->id;
						odbc_exec($conexion, "UPDATE C_SIMS SET activos = 'no' WHERE id='".$id_sim_anterior."'");
						
					}
					
		$consulta_el_sim_seleccionado=odbc_exec($conexion, "SELECT * FROM C_SIMS WHERE numero_telefono='".$sim."'");
					while ($el_sim_seleccionado=odbc_fetch_object($consulta_el_sim_seleccionado))
					{
						$id_sim_seleccionado=$el_sim_seleccionado->id;
						odbc_exec($conexion, "UPDATE C_SIMS SET activos = 'si' WHERE id='".$id_sim_seleccionado."'");
						
					}
		
						
		}
		
		else {echo '';}
		//ACTUALIZACION DE SIMS			
		
	
					//ACTUALIZACION DEl INVENTARIO
					odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET modelo_gps = '".$modelo_gps."', 
					imei = '".$imei."', 
					sim = '".$sim."',
					nombre_vehiculo = '".$nombre_vehiculo."', 
					nombre_empresa = '".$nombre_empresa."',
					nombre_usuario = '".$nombre_usuario."',
					fecha_de_instalacion = '".$fecha_de_instalacion."',
					fecha_de_facturacion = '".$fecha_de_facturacion."',
					costo = '".$costo."',
					funcion = '".$funcion."' WHERE id=".$id.";"); 
					//ACTUALIZACION DEl INVENTARIO

					//ACTUALIZACION DEl INVENTARIO ASIGNACIIONES EXTRAS
					odbc_exec($conexion, "UPDATE EE_ASIGNACIONES_EXTRAS SET  usuario = '".$nombre_usuario."', usuario_primario = '".$nombre_usuario."' WHERE id_servidor='".$id."' AND usuario = '".$nombre_usuario_boofer."' AND usuario_primario = '".$nombre_usuario_boofer."';"); 
					//ACTUALIZACION DEl INVENTARIO ASIGNACIIONES EXTRAS
					
	    odbc_exec($conexion, "UPDATE ZLECTURAS SET DEV_ID = '".$imei."', usuario = '".$nombre_usuario."', 
		nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "UPDATE ZALERTAS SET DEV_ID = '".$imei."', usuario = '".$nombre_usuario."', 
		nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "UPDATE ZEVENTOS SET DEV_ID = '".$imei."', usuario = '".$nombre_usuario."', 
		nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "UPDATE ZEMERGENCIAS SET DEV_ID = '".$imei."', usuario = '".$nombre_usuario."', 
		nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "UPDATE ZKEEPALIVE SET DEV_ID = '".$imei."', usuario = '".$nombre_usuario."', 
		nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "DELETE FROM I_ASIGNACION_GEOCERCAS WHERE id_servidor='".$id."'");
		
		
		
		
		
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
<?php 
			
		if (isset($_POST['modificar'])) {
		//PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR
					$id=$_POST['id'];
					$consulta=$_POST['consulta'];
					$the_user=$_POST['the_user'];
					$select_user=$_POST['select_user'];
					$nombre_vehiculo=$_POST['nombre_vehiculo'];
					
					
					
		?>
        <?php echo '
                 <div id="funcion_opacidad">
				 	<div id="contenedor_confirmacion">
                    
                    Esta seguro de<br>modificar este registro?<br><br>
					<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="'.$consulta.'" />
						<input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="" type="submit" value="no" class="confirma_eliminacion" />	
					</form>
                    <form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="'.$consulta.'" />
						<input name="confirmacion" type="hidden" value="si" />
                        <input name="id" type="hidden" value="'.$id.'" />
						<input name="nombre_vehiculo" type="hidden" value="'.$nombre_vehiculo.'" />
						<input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="select_user" type="hidden" value="'.$select_user.'" />
						<input name="" type="submit" value="si" class="confirma_eliminacion" />	
                    </form> 
                 	</div>
                 </div>';
		}
		//CIERRE DE PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR
		?>
			
            
            
            
            
            <?php 
			//SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR
			if (isset($_POST['confirmacion'])) {
				    
					
					$id=$_POST['id'];
					$consulta=$_POST['consulta'];
					$the_user=$_POST['the_user'];
					$select_user=$_POST['select_user'];
					$nombre_vehiculo=$_POST['nombre_vehiculo'];
					
					if($select_user!=$localFactoryUser)
					{			
					$consulta_empresa_de_usuario=odbc_exec($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$select_user."'");
						while ($la_empresa=odbc_fetch_object($consulta_empresa_de_usuario)) 
							{ 
								$nombre_empresa=$la_empresa->nombre_empresa;
							}
					}else {$nombre_empresa=$localFactoryName;}
		
					
					
					//ACTUALIZACION DEl INVENTARIO
					odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET nombre_empresa = '".$nombre_empresa."' , nombre_vehiculo = '".$nombre_vehiculo."', 
					nombre_usuario = '".$select_user."' WHERE id='".$id."';"); 
					//ACTUALIZACION DEl INVENTARIO
					
					odbc_exec($conexion, "UPDATE ZLECTURAS SET usuario = '".$select_user."', 
					nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
					odbc_exec($conexion, "UPDATE ZALERTAS SET usuario = '".$select_user."', 
					nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
					odbc_exec($conexion, "UPDATE ZEVENTOS SET usuario = '".$select_user."', 
					nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
					odbc_exec($conexion, "UPDATE ZEMERGENCIAS SET usuario = '".$select_user."', 
					nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
					odbc_exec($conexion, "UPDATE ZKEEPALIVE SET usuario = '".$select_user."', 
					nombre_vehiculo = '".$nombre_vehiculo."'  WHERE id_servidor=".$id.";");
		
					odbc_exec($conexion, "DELETE FROM I_ASIGNACION_GEOCERCAS WHERE id_servidor='".$id."'");
		
					
					
					?>
                 
                 <!--MUESTRA DE VENTANA EMERGENTE OPACIDAD-->
                 <div id="funcion_opacidad">
				 	<div id="contenedor_confirmacion">
                    <?php echo '
					
					<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="'.$consulta.'" />
						<input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
					</form>
					<br><br>
					<span style="display:block; width:100%;">Modificaci&oacute;n exitosa</span>
					'; ?>
                 	</div>
                 </div>
                 <!--CIERRE DE MUESTRA DE VENTANA EMERGENTE OPACIDAD-->
                 
                 
			
            <?php 
			
			}//CIERRE DEL SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR ?>
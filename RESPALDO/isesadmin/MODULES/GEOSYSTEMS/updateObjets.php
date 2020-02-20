<?php 
			
		if (isset($_POST['modificar'])) {
		//PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR
					$id=$_POST['id'];
					$consulta=$_POST['consulta'];
					
					if (isset($_POST['c1'])) {$c1=$_POST['c1'];} else {$c1='';}
					if (isset($_POST['c2'])) {$c2=$_POST['c2'];} else {$c2='';}
					if (isset($_POST['c3'])) {$c3=$_POST['c3'];} else {$c3='';}
					if (isset($_POST['c4'])) {$c4=$_POST['c4'];} else {$c4='';}
					if (isset($_POST['c5'])) {$c5=$_POST['c5'];} else {$c5='';}
					
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
                        <input name="c1" type="hidden" value="'.$c1.'" />
                        <input name="c2" type="hidden" value="'.$c2.'" />
                        <input name="c3" type="hidden" value="'.$c3.'" />
						<input name="c4" type="hidden" value="'.$c4.'" />
                        <input name="c5" type="hidden" value="'.$c5.'" />
                        <input name="" type="submit" value="si" class="confirma_eliminacion" />	
                    </form>'; ?>
                 	</div>
                 </div>
			
            <?php 
			
			} //CIERRE DE PRIMER PASO RECEPCION DE DATOS FUNCION MODIFICAR ?>
            
            
            
            <?php 
			//SEGUNDO PASO CONFITMACION DE LA FUNCION MODIFICAR
			if (isset($_POST['confirmacion'])) {
				    
					$id=$_POST['id'];
					$c1=$_POST['c1'];
					$c2=$_POST['c2'];
					$c3=$_POST['c3'];
					$c4=$_POST['c4'];
					$c5=$_POST['c5'];
					
		
					//ACTUALIZACION DEl INVENTARIO
					odbc_exec($conexion, "UPDATE E_INVENTARIO_GENERAL SET c1 = '".$c1."', 
					c2 = '".$c2."', 
					c3 = '".$c3."',
					c4 = '".$c4."', 
					c5 = '".$c5."' WHERE id=".$id.";"); 
					//ACTUALIZACION DEl INVENTARIO
		
					
					
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
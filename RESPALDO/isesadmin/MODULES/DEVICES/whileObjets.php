<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>

    <?php  
	
			
			//LISTADO DE REGISTROS
			if (!isset($_POST['filtro'])) {
				
				
				$sentence="SELECT * FROM E_INVENTARIO_GENERAL";
				$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL");
				$numObjetsArray = odbc_fetch_array($num_objets);
				$numObjetsArray['counter'];
				echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Dispositivos Totales en el Sistema</h1><br />';
			
				}
		    
			else 
			{
	$filtro=$_POST['filtro'];
	$objeto=$_POST['objeto'];
	include 'BTviewAll.php';echo '<br>';
	$sentence="SELECT * FROM E_INVENTARIO_GENERAL WHERE $filtro='".$objeto."'";
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE $filtro ='".$objeto."' ");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
	echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Dispositivos para : "'.$objeto.'"</h1><br />';
				
			
			
			
			
			}
			
			
			
			$consulta_inventario_list=odbc_exec($conexion,$sentence);
		    
		
		    echo '
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">';
				
		     while ($inventarios=odbc_fetch_object($consulta_inventario_list)) {
			 echo '
			
			      <tr class="miTR">
					
					<td class="miTDtitle" align="center">'.$inventarios->imei.'</td>
				  </tr>
			     <form action="panel.php" method="post">
			     <tr class="miTR">
					<td class="miTD" valign="top" align="center" width="10%">
						<span class="sub_header_int">ID:</span><br>'.$inventarios->id.'
					</td>
					<td class="miTD" valign="top" width="13%">
						<span class="sub_header_int">MODELO:</span>
						<br>'; 
						echo'
						<select name="modelo_gps" class="campo_general_FILTER_SELECT">';
							echo '<option>'.$inventarios->modelo_gps.'</option>';
					    	$consulta_modelos_array=odbc_exec($conexion, 'SELECT * FROM B_MODELOS');
					    	while ($los_modelos=odbc_fetch_object($consulta_modelos_array))
							{
							echo '<option>'.$los_modelos->modelo_gps.'</option>';
							}
                    		echo'</select>';
					
							echo '</td>
					
					<td class="miTD" valign="top" width="13%">
						<span class="sub_header_int">IMEI:</span><br>
						<input type="hidden" name="Boofer" value="'.$inventarios->imei.'" class="campo_general_FILTER" />
						<input type="text" name="imei" value="'.$inventarios->imei.'" class="campo_general_FILTER" />
					</td>
					
					<td class="miTD" valign="top" width="16%"><span class="sub_header_int">SIM:</span><br>'; 
						echo'
						<input name="sim_anterior" type="hidden" value="'.$inventarios->sim.'">
						<select name="sim" class="campo_general_FILTER_SELECT">';
							echo '<option>'.$inventarios->sim.'</option>';
					    	$consulta_sims_array=odbc_exec($conexion, "SELECT * FROM C_SIMS WHERE activos='no'");
					    	while ($las_sims=odbc_fetch_object($consulta_sims_array))
							{
							echo '<option>'.$las_sims->numero_telefono.'</option>';
							}
							echo '<option>0</option>';
                    	echo'</select>';
					echo'</td>
					
					
					
					<td class="miTD" valign="top" width="17%">
					<span class="sub_header_int">EMPRESA:</span><br>
					<input type="text" name="" value="'.$inventarios->nombre_empresa.'" class="campo_general_FILTER_NULL" readonly="readonly" />
					</td>
					
					<td class="miTD" valign="top" width="17%"><span class="sub_header_int">USUARIO:</span><br>'; 
						echo'
						
						<select name="nombre_usuario" class="campo_general_FILTER_SELECT">';
							echo '<option>'.$inventarios->nombre_usuario.'</option>';
					    	$consulta_usuarios_array=odbc_exec($conexion, 'SELECT * FROM G_USUARIOS');
					   	 	while ($los_usuarios=odbc_fetch_object($consulta_usuarios_array))
							{
							echo '<option>'.$los_usuarios->nombre_usuario.'</option>';
							}
							echo '<option>'.$localFactoryUser.'</option>';
                    	echo'</select>';
						
						echo '<input type="hidden" name="boofer_user" value="'.$inventarios->nombre_usuario.'" class="campo_general_FILTER" />';
					
					
					echo'</td>
					
					<td class="miTD" valign="top">
					<span class="sub_header_int">VEHICULO:</span><br>
						<input type="text" name="nombre_vehiculo" value="'.$inventarios->nombre_vehiculo.'" class="campo_general_FILTER" />
					</td>
				</tr>
				
				<tr class="miTR">
					
					<td class="miTD" valign="top">
						<span class="sub_header_int">F-ALTA:</span><br>
						'.$inventarios->fecha_alta_en_el_sistema.'
					</td>
					
					<td class="miTD" valign="top">
						<span class="sub_header_int">F-INSTALACION:</span><br>
						<input type="text" name="fecha_de_instalacion" value="'.$inventarios->fecha_de_instalacion.'" class="campo_general_FILTER" />
					</td>
					
					<td class="miTD" valign="top">
						<span class="sub_header_int">F-FACTURACION:</span><br>
						<input type="text" name="fecha_de_facturacion" value="'.$inventarios->fecha_de_facturacion.'" class="campo_general_FILTER" />
					</td>
					
					<td class="miTD" valign="top"><span class="sub_header_int">PLAN:</span><br>'; 
						echo'
						<select name="costo" class="campo_general_FILTER_SELECT">';
							
							$consulta_el_plan=odbc_exec($conexion, "SELECT * FROM D_PLANES WHERE id='".$inventarios->costo."'");
					    	while ($el_plan=odbc_fetch_object($consulta_el_plan))
							{
							echo '<option value="'.$el_plan->id.'">'.$el_plan->descripcion.'-'.$el_plan->costo.'</option>';
							}
							
					    	$consulta_costos_array=odbc_exec($conexion, 'SELECT * FROM D_PLANES');
					    	while ($los_costos=odbc_fetch_object($consulta_costos_array))
							{
							echo '<option value="'.$los_costos->id.'">'.$los_costos->descripcion.'-'.$los_costos->costo.'</option>';
							}
                    	echo'</select>';
					
					echo '</td>
					
					
					<td class="miTD" valign="top" style="color:red;">
						<span class="sub_header_int">ESTATUS:</span><br>
						<select name="funcion" class="campo_general_FILTER_SELECT">
                    		<option>'.$inventarios->funcion.'</option>
							<option>activo</option>
							<option>no activo</option>
                    	</select>
					</td>
					
					<td class="miTD"  valign="top" colspan="2">
					    <span class="sub_header_int">No. Serie SIM:</span><br>';
						$consulta_nu_serie_sim=odbc_exec($conexion,"SELECT * FROM C_SIMS WHERE numero_telefono='".$inventarios->sim."' ");
						while ($the_num_serie_sim=odbc_fetch_object($consulta_nu_serie_sim)) {
						
							if ($the_num_serie_sim->numero_serie!='0')
							{
							$my_num_serie = $the_num_serie_sim->numero_serie;
							}
							else {$my_num_serie = 'sin sim';}
							
							echo '<input type="text" name="extras" value="'.$my_num_serie.'" class="campo_general_FILTER" readonly="readonly" />';
					
						}
						
					    
					echo '</td>
					
					
					
				  </tr>
				  <tr>
					
					<td valign="top">
						
					</td>
					
					<td valign="top">
						
					</td>
					
					<td valign="top">
						
					</td>
					
					<td valign="top">
					
					</td>
					
					
					<td valign="top">
						
					</td>
					
					<td class="miTD" >
					    <input name="consulta" type="hidden" value="DEVICES" />
						<input name="mostrar_registros" type="hidden" value="si" />
						<input name="modificar" type="hidden" value="si" />';
						if (!isset($_POST['filtro'])) {
							echo'';
						}
						else {
							echo '
							<input name="filtro" type="hidden" value="'.$filtro.'" />
							<input name="objeto" type="hidden" value="'.$objeto.'" />';
						}
						echo '<input name="id" type="hidden" value="'.$inventarios->id.'" />
						<input name="" type="submit" value="modificar" class="eliminacion" style="width:100%" />
					</td>
					</form>
					
					<td class="miTD" >
						 <form action="panel.php" method="post">
						 	<input name="consulta" type="hidden" value="clean_devices" />
						 	<input name="id" type="hidden" value="'.$inventarios->id.'" />
						 	<input name="" type="submit" value="Resetear Equipo" class="eliminacion" style="width:100%" title="Cuidado...! Click para resetear este equipo con id de servidor : '.$inventarios->id.'" />
						 </form>
					
					</td>
				  </tr>
				  <tr><td></td></tr>';
			
			} echo '</table>';
			
			//CIERRE DE LISTADO DE REGISTROS
			?>
            
            
			<?php include('updateObjets.php');?>
</body>
</html>
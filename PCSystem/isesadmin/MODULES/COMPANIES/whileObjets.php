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
				
				
				$sentence="SELECT * FROM F_EMPRESAS";
				$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM F_EMPRESAS");
				$numObjetsArray = odbc_fetch_array($num_objets);
				$numObjetsArray['counter'];
				echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Empresas en el Sistema</h1><br />';
			
				}
		    
			else 
			{
	$filtro=$_POST['filtro'];
	$objeto=$_POST['objeto'];
	include 'BTviewAll.php';echo '<br>';
	$sentence="SELECT * FROM F_EMPRESAS WHERE $filtro='".$objeto."'";
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM F_EMPRESAS WHERE $filtro ='".$objeto."' ");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
	echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Registro en "Empresas" para : "'.$objeto.'"</h1><br />';
				
			
			
			
			
			}
			
			
			
			$consulta_inventario_list=odbc_exec($conexion,$sentence);
		    
		
		    echo '
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">';
				
		     while ($inventarios=odbc_fetch_object($consulta_inventario_list)) {
			 echo '
			
			      <tr class="miTR">
					<td class="miTDtitle" align="center">'.$inventarios->nombre_empresa.'</td>
				  </tr>
			     <form action="panel.php" method="post">
			     <tr class="miTR">
				    <td class="miTD" valign="top" width="20%">
						<span class="sub_header_int">EMPRESA:</span><br>
						<input type="hidden" name="Boofer" value="'.$inventarios->nombre_empresa.'" />
						<input type="text" name="nombre_empresa" value="'.$inventarios->nombre_empresa.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top" width="20%">
						<span class="sub_header_int">RAZON SOCIAL:</span><br>
						<input type="text" name="razon_social" value="'.$inventarios->razon_social.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top" width="20%">
						<span class="sub_header_int">RFC:</span><br>
						<input type="text" name="rfc" value="'.$inventarios->rfc.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">PERSONA DE CONTACTO:</span><br>
						<input type="text" name="persona_de_contacto" value="'.$inventarios->persona_de_contacto.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">TELEFONO:</span><br>
						<input type="text" name="telefono" value="'.$inventarios->telefono.'" class="campo_general_FILTER" />
					</td>
					
				</tr>
				
				<tr class="miTR">
				 
				    <td class="miTD" valign="top">
						<span class="sub_header_int">DIRECCION:</span><br>
						<input type="text" name="direccion" value="'.$inventarios->direccion.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">CODIGO POSTAL:</span><br>
						<input type="text" name="codigo_postal" value="'.$inventarios->codigo_postal.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">PAIS:</span><br>
						<input type="text" name="pais" value="'.$inventarios->pais.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">ESTADO:</span><br>
						<input type="text" name="estado" value="'.$inventarios->estado.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">CIUDAD:</span><br>
						<input type="text" name="ciudad" value="'.$inventarios->ciudad.'" class="campo_general_FILTER" />
					</td>
				</tr>
				
				<tr class="miTR">
				   
					<td class="miTD" valign="top">
						<span class="sub_header_int">CORREO:</span><br>
						<input type="text" name="correo" value="'.$inventarios->correo.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">ZONA HORARIA:</span><br>
						<input type="text" name="zona_horaria" value="'.$inventarios->zona_horaria.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top" style="color:red;">
							<span class="sub_header_int">ACTIVA:</span><br>
							<select name="activa" class="campo_general_FILTER_SELECT">
                    			<option>'.$inventarios->activa.'</option>
								<option>SI</option>
								<option>NO</option>
                    		</select>
					</td>
					<td class="miTD" valign="top" style="color:red;">
							<span class="sub_header_int">AVISO ACCESO:</span><br>
							<select name="aviso_acceso" class="campo_general_FILTER_SELECT">
                    			<option>'.$inventarios->aviso_acceso.'</option>
								<option>SI</option>
								<option>NO</option>
                    		</select>
					</td>
					 
					<td class="miTD" valign="top">
						<span class="sub_header_int">GEOCERCAS:</span><br>
						<input type="text" name="num_geocercas" value="'.$inventarios->num_geocercas.'" class="campo_general_FILTER" />
					</td>
					
				</tr>
				
				<tr class="miTR">
					
					<td class="miTD" valign="top">
						<span class="sub_header_int">F-ALTA:</span><br>
						'.$inventarios->fecha_de_registro.'
					</td>
					
					
					<td class="miTD" valign="top" style="color:red;">
							<span class="sub_header_int">TIPO EMPRESA:</span><br>
							<select name="tipo_empresa" class="campo_general_FILTER_SELECT">
                    			<option>'.$inventarios->tipo_empresa.'</option>
								<option>Maestra</option>
								<option>Distribuidor</option>
                    		</select>
					</td>
					
					
					
					<td class="miTD" valign="top" width="20%"><span class="sub_header_int">EMPRESA PADRE:</span><br>'; 
						echo'
						<select name="cuenta_maestra" class="campo_general_FILTER_SELECT">';
							echo '<option>'.$inventarios->cuenta_maestra.'</option>';
							echo '<option>'.$localFactoryName.'</option>';
					    	$consulta_empresas_array=odbc_exec($conexion, "SELECT * FROM F_EMPRESAS WHERE nombre_empresa!='".$inventarios->nombre_empresa."' AND tipo_empresa='Distribuidor'");
					    	while ($las_empresas=odbc_fetch_object($consulta_empresas_array))
							{
							echo '<option>'.$las_empresas->nombre_empresa.'</option>';
							}
                    	echo'</select>';
					
					echo '</td>
					
					<td class="miTD" >
					    <input name="consulta" type="hidden" value="COMPANIES" />
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
						 	<input name="consulta" type="hidden" value="COMPANIES" />
							<input name="mostrar_registros" type="hidden" value="si" />
						 	<input name="id" type="hidden" value="'.$inventarios->id.'" />
							<input name="nombre_empresa" type="hidden" value="'.$inventarios->nombre_empresa.'" />
							<input name="eliminar" type="hidden" value="si" />';
							if (!isset($_POST['filtro'])) {
							echo'';
						}
						else {
							echo '
							<input name="filtro" type="hidden" value="'.$filtro.'" />
							<input name="objeto" type="hidden" value="'.$objeto.'" />';
						}
						 	echo '<input name="" type="submit" value="Eliminar" class="eliminacion" style="width:100%"/>
						 </form>
					
					</td>
				  </tr>
				
				  <tr><td></td></tr>';
			
			} echo '</table>';
			
			//CIERRE DE LISTADO DE REGISTROS
			?>
            
            
			<?php include('updateObjets.php');?>
            <?php include('deleteObjets.php');?>
</body>
</html>
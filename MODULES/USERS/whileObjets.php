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
				
				
				$sentence="SELECT * FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'";
				$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
				$numObjetsArray = odbc_fetch_array($num_objets);
				$numObjetsArray['counter'];
				echo '<h1 class="h1_left">Usted tiene "'.$numObjetsArray['counter'].'" Usuarios en el Sistema</h1><br />';
			
				}
		    
			else 
			{
	$filtro=$_POST['filtro'];
	$objeto=$_POST['objeto'];
	include 'BTviewAll.php';echo '<br>';
	$sentence="SELECT * FROM G_USUARIOS WHERE $filtro='".$objeto."'";
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE $filtro ='".$objeto."' ");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
	echo '<h1 class="h1_left">"'.$objeto.'"</h1><br />';
				
			
			
			
			
			}
			
			
			
			$consulta_inventario_list=odbc_exec($conexion,$sentence);
		    
		
		    echo '
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">';
				
		     while ($inventarios=odbc_fetch_object($consulta_inventario_list)) {
			 echo '
			
			      <tr class="miTR">
					<td class="miTDtitle" align="center">'.$inventarios->nombre_usuario.'</td>
				  </tr>
			     <form action="panel.php" method="post">
			     <tr class="miTR">
				    <td class="miTD" valign="top" width="20%">
						<span class="sub_header_int">USUARIO:</span><br>
						<input type="hidden" name="Boofers" value="'.$inventarios->nombre_usuario.'" />
						<input type="text" name="nombre_usuarios" value="'.$inventarios->nombre_usuario.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top" width="20%">
						<span class="sub_header_int">CONTRASE&Ntilde;A:</span><br>
						<input type="text" name="contrasenias" value="'.$inventarios->contrasenia.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top" width="20%"><span class="sub_header_int">DE LA EMPRESA:</span><br>'; 
						echo'
						<select name="nombre_empresas" class="campo_general_FILTER_SELECT">';
                
			    $consulta_empresas=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$_SESSION['MM_Username']."' ");
                 while ($las_empresas = odbc_fetch_object($consulta_empresas))
                 {
                 $empresas=$las_empresas->nombre_empresa; echo '<option>'.$empresas.'</option>';
                 }
			     
                 
				
				 //$consulta_empresas=odbc_exec ($conexion,"SELECT DISTINCT nombre_empresa FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."' ");
                 //while ($las_empresas = odbc_fetch_object($consulta_empresas))
                 //{
                 //$empresas=$las_empresas->nombre_empresa; echo '<option>'.$empresas.'</option>';
                 //}
                 
          echo ' </select>
						';
					
					echo '</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">NOMBRE COMPLETO:</span><br>
						<input type="text" name="nombre_completos" value="'.$inventarios->nombre_completo.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">CORREO:</span><br>
						<input type="text" name="correos" value="'.$inventarios->correo.'" class="campo_general_FILTER" />
					</td>
					
				</tr>
				
				<tr class="miTR">
				 
				    
					<td class="miTD" valign="top" width="20%"><span class="sub_header_int">USUARIO PADRE:</span><br>'; 
						echo'
						<select name="usuario_padres" class="campo_general_FILTER_SELECT">';
							echo '<option>'.$inventarios->usuario_padre.'</option>';
							
					    	
                    	echo'</select>';
					
					echo '</td>
					<td class="miTD" valign="top" style="color:red;">
							<span class="sub_header_int">TIPO:</span><br>
							<select name="tipos" class="campo_general_FILTER_SELECT">
                    			<option>'.$inventarios->tipo.'</option>
								<option>Maestra</option>
								<!--<option>Distribuidor</option>-->
                    		</select>
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">ZONA HORARIA:</span><br>
						<input type="text" name="zona_horarias" value="'.$inventarios->zona_horaria.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top">
						<span class="sub_header_int">GEOCERCAS:</span><br>
						<input type="text" name="geocercass" value="'.$inventarios->geocercas.'" class="campo_general_FILTER" />
					</td>
					<td class="miTD" valign="top" style="color:red;">
							<span class="sub_header_int">AVISO DE ACCESO:</span><br>
							<select name="aviso_accesos" class="campo_general_FILTER_SELECT">
                    			<option>'.$inventarios->aviso_acceso.'</option>
								<option>SI</option>
								<option>NO</option>
                    		</select>
					</td>
				</tr>
				
				
				
				<tr class="miTR">
					
					<td class="miTD" valign="top">
						<span class="sub_header_int">F-ALTA:</span><br>
						'.$inventarios->fecha_de_registro.'
					</td>
					
					
					<td class="miTD" valign="top" style="color:red;">
							
					</td>
					
					
					
					<td class="miTD" valign="top" style="color:red;">
							<span class="sub_header_int">ACTIVA:</span><br>
							<select name="activas" class="campo_general_FILTER_SELECT">
                    			<option>'.$inventarios->activa.'</option>
								<option>SI</option>
								<option>NO</option>
                    		</select>
					</td>
					
					<td class="miTD" >
					    <input name="consulta" type="hidden" value="admin_data_users" />
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
						echo '<input name="ids" type="hidden" value="'.$inventarios->id.'" />
						<input name="" type="submit" value="modificar" class="eliminacion" style="width:100%" />
					</td>
					</form>
					
					<td class="miTD" >
						 <form action="panel.php" method="post">
						 	<input name="consulta" type="hidden" value="admin_data_users" />
							<input name="mostrar_registros" type="hidden" value="si" />
						 	<input name="ids" type="hidden" value="'.$inventarios->id.'" />
							<input name="nombre_usuarios" type="hidden" value="'.$inventarios->nombre_usuario.'" />
							<input name="nombre_empresas" type="hidden" value="'.$inventarios->nombre_empresa.'" />
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
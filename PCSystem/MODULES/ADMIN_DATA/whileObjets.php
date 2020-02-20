<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style>
.campo_general_FILTER_SELECT {width:80%;}
.campo_general_FILTER {width:90%;}
</style>
</head>

<body>
<?php  
//LISTADO DE REGISTROS
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE nombre_usuario ='".$the_user."' ");
	$numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
	echo '<br><h3>'.$numObjetsArray['counter'].' Dispositivos para : "'.$the_user.'"</h3><br>';
	
	//LIST VIEW CONDITION
	if ($numObjetsArray['counter']=='0'){echo'';}else{
	$listObjets = odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$the_user."'");
		while ($objetsUserlist = odbc_fetch_object($listObjets)) { 
			$idVehicle=$objetsUserlist->id;
			$imeiVehicle=$objetsUserlist->imei;
			$nameVehicle=$objetsUserlist->nombre_vehiculo;
			$nameUser=$objetsUserlist->nombre_usuario;
			
		
	
	
	
	//TABLE FOR GOBERNATOR
	if($_SESSION['MM_Username']==$localFactoryUser) {
		
		echo '
		
		<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">
				
		     <form action="panel.php" method="post">
			 <tr style="font-size:11px; color:red;">
					<td align="center" width="16%">Usuario Actual</td>
					<td align="center" width="16%">ID<br>Veh&iacute;culo</td>
					<td align="center" width="16%">IMEI GPS</td>
					<td align="center" width="16%">Nombre Veh&iacute;culo<br>Renombrar</td>
					<td align="center" width="16%">Usuario asignado<br>a este vehiculo</td>
					<td align="center" width="16%">&nbsp;</td>
			 </tr>
			 <tr class="miTR">
					<td class="miTDtitle" align="center" width="16%">'.$nameUser.'</td>
					<td class="miTDtitle" align="center" width="16%">'.$idVehicle.'</td>
					<td class="miTDtitle" align="center" width="16%">'.$imeiVehicle.'</td>
					<td class="miTDtitle" align="center" width="16%"><input type="text" name="nombre_vehiculo" value="'.$nameVehicle.'" /></td>
					<td class="miTDtitle" align="center" width="16%">'; 
					
					$consulta_usuarios_array=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS");
								
						echo '
						<select name="select_user" class="campo_general_FILTER_SELECT">
							<option>'.$nameUser.'</option>';		
								
								while ($los_usuarios=odbc_fetch_object($consulta_usuarios_array))
								{
								echo '<option>'.$los_usuarios->nombre_usuario.'</option>';
								}
					
						echo '<option>'.$localFactoryUser.'</option>
						</select>';
					
					echo '</td>
					
					<td class="miTDtitle" align="center" width="16%">
					    <input name="modificar" type="hidden" value="ok" />
					    <input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="id" type="hidden" value="'.$idVehicle.'" />
						<input name="consulta" type="hidden" value="admin_data" />
						<input name="" type="submit" value="Guardar cambios" class="eliminacion" style="width:100%" />
					</td>
			 </tr>
			 </form>
				  
			
			</table>';	
	//CLOSE TABLE FOR GOBERNATOR	
	}else{
		
		
		$userTypeList = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
		while ($typeUserList = odbc_fetch_object($userTypeList)) { 
			$tipo=$typeUserList->tipo;
			$the_user_name=$typeUserList->nombre_usuario;
			
		}
			
		    
	
		//DISTRIBUITOR CONDITION
		if ($tipo=='Distribuidor') {
			
		echo '
		
		<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">
				
		     <form action="panel.php" method="post">
			 <tr style="font-size:11px; color:red;">
					<td align="center" width="16%">Usuario Actual</td>
					<td align="center" width="16%">ID<br>Veh&iacute;culo</td>
					<td align="center" width="16%">IMEI GPS</td>
					<td align="center" width="16%">Nombre Veh&iacute;culo<br>Renombrar</td>
					<td align="center" width="16%">Usuario asignado</td>
					<td align="center" width="16%">&nbsp;</td>
			 </tr>
			 <tr class="miTR">
					<td class="miTDtitle" align="center" width="16%">'.$nameUser.'</td>
					<td class="miTDtitle" align="center" width="16%">'.$idVehicle.'</td>
					<td class="miTDtitle" align="center" width="16%">'.$imeiVehicle.'</td>

					<td class="miTDtitle" align="center" width="16%"><input type="text" name="nombre_vehiculo" value="'.$nameVehicle.'" /></td>
					<td class="miTDtitle" align="center" width="16%">'; 
					
					$consulta_usuarios_array=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
								
						echo '
						<select name="select_user" class="campo_general_FILTER_SELECT">
							<option>'.$nameUser.'</option>';		
								
								while ($los_usuarios=odbc_fetch_object($consulta_usuarios_array))
								{
								echo '<option>'.$los_usuarios->nombre_usuario.'</option>';
								}
					
						echo '<option>'.$_SESSION['MM_Username'].'</option>
						</select>';
					
					echo '</td>
					
					<td class="miTDtitle" align="center" width="16%">
					    <input name="modificar" type="hidden" value="ok" />
					    <input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="id" type="hidden" value="'.$idVehicle.'" />
						<input name="boofer_name_principal_user" type="hidden" value="'.$idVehicle.'" />
						<input type="hidden" name="boofer_name_principal_user" value="'.$nameUser.'">
						<input name="consulta" type="hidden" value="admin_data" />
						<input name="" type="submit" value="Guardar cambios" class="eliminacion" style="width:100%" />
					</td>
			 </tr>
			 </form>
				  
			
			</table>';
			
			
		}
		//CLOSE DISTRIBUITOR CONDITION
		
		//MASTER CONDITION
		if ($tipo=='Maestra') {
			
			echo '
		
		<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">
				
		     <form action="panel.php" method="post">
			 <tr style="font-size:11px; color:red;">
					<td align="center" width="16%">Usuario Actual</td>
					<td align="center" width="16%">ID<br>Veh&iacute;culo</td>
					<td align="center" width="16%">IMEI GPS</td>
					<td align="center" width="16%">Nombre Veh&iacute;culo<br>Renombrar</td>
					<td align="center" width="16%">Usuario asignado<br>a este vehiculo</td>
					<td align="center" width="16%">&nbsp;</td>
			 </tr>
			 <tr class="miTR">
					<td class="miTDtitle" align="center" width="16%">'.$nameUser.'</td>
					<td class="miTDtitle" align="center" width="16%">'.$idVehicle.'</td>
					<td class="miTDtitle" align="center" width="16%">'.$imeiVehicle.'</td>
					<td class="miTDtitle" align="center" width="16%"><input type="text" name="nombre_vehiculo" value="'.$nameVehicle.'" /></td>
					
					<td class="miTDtitle" align="center" width="16%">'; 
					
					    echo '
						<select name="select_user" class="campo_general_FILTER_SELECT">
							<option>'.$nameUser.'</option></select>
					</td>
					
					<td class="miTDtitle" align="center" width="16%">
					    <input name="modificar" type="hidden" value="ok" />
					    <input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="id" type="hidden" value="'.$idVehicle.'" />
						<input name="consulta" type="hidden" value="admin_data" />
						<input type="hidden" name="boofer_name_principal_user" value="'.$nameUser.'">
						<input name="" type="submit" value="Guardar cambios" class="eliminacion" style="width:100%" />
					</td>
			 </tr>
			 </form>
				  
			
			</table>';
			
		}
		//CLOSE MASTER CONDITION
	}
	
	}//BUCLE
	
	}//END LIST VIEW CONDITION
	
	
			
//CIERRE DE LISTADO DE REGISTROS
?>
            
            
<?php include('updateObjets.php');?>
</body>
</html>
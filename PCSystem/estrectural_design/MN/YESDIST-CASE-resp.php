<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
		<link rel="stylesheet" type="text/css" href="css/select/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/select/css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/select/css/cs-skin-underline.css" />
</head>

<body>
<?php 
$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
			$numObjetsArray = odbc_fetch_array($num_objets);
			$numObjetsArray['counter'];
						
			if ($numObjetsArray['counter']==0)
			    {
				echo '
		<br>	
		<table width="100%" border="0">
          <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">An&aacute;lisis de Recorridos de<br>Mis Veh&iacute;culos</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:11px;" width="77%">
			<section>
            <form action="panel.php" method="post">
            <select class="cs-select cs-skin-underline" name="filtro_vehiculo">
			<option>Sin Veh&iacute;culos</option>
			</select>
            </section>
            </td>
            <td style="font-size:11px;" width="30%">
                
				<input name="" type="submit" value="ir" style="background:#0b90e5; color:#fff; border:none; height:25px; width:30px; margin-right:5px; float:right; cursor:pointer;">
                </form>
            </td>
          </tr>
        </table>
		';
		}
						
		else {
		
					
	    echo '
		<br>	
		<table width="100%" border="0">
          <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">An&aacute;lisis de Recorridos de<br>Mis Veh&iacute;culos</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:11px;" width="77%">
			<section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="filtro_vehiculo">';
			
			  
	    
					 
				//LISTAMOS TODOS LOS VEHICULOS DE TODOS LOS USUARIOS
				$consulta_todos_usuarios = odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
				while ($rows3 = odbc_fetch_object($consulta_todos_usuarios)) {
					
					$nombre_vehiculo=$rows3->nombre_vehiculo;				
					$id_servidor=$rows3->id;
					
					echo '<option value="'.$nombre_vehiculo.'-'.$id_servidor.'">'.$nombre_vehiculo.'-'.$id_servidor.'</option>';
				
							
					}
				//LISTAMOS TODOS LOS VEHICULOS DE TODOS LOS USUARIOS
					
					
                    
                $fechaD= date ("j");
				$el_dia=$fechaD;
				$fechaM= date ("n");
				$fechaY= date ("Y");
				
				echo '</select>
            </section>
            </td>
            <td style="font-size:11px;" width="30%">
                <input name="consulta" type="hidden" value="mirecorridoenmapa" />
				
				<input name="dia" type="hidden" value="'.$el_dia.'" />
				<input name="mes" type="hidden" value="'.$fechaM.'" />
				<input name="anio" type="hidden" value="'.$fechaY.'" />
				<input name="rango" type="hidden" value="Todo el dia" />
            	<input name="" type="submit" value="ir" style="background:#0b90e5; color:#fff; border:none; height:25px; width:30px; margin-right:5px; float:right; cursor:pointer;">
                </form>
            </td>
          </tr>
        </table>
		';
	
		}	
				
			echo '
		    <br>	
		    <table width="100%" border="0">
            <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">Administrar Interacciones de<br>Mis Uusarios</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
            </tr>
            <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="filtro">
					<option value="'.$mi_user_name.'">'.$mi_user_name.'</option>';
					 
					 //LISTAMOS TODOS LOS USUARIOS
							$consulta_todos_usuarios = odbc_exec ($conexion,"SELECT DISTINCT nombre_usuario FROM G_USUARIOS WHERE usuario_padre='".$mi_user_name."' ");
							while ($rows3 = odbc_fetch_object($consulta_todos_usuarios)) {
		
		    echo '<option value="'.$select_usuarios=$rows3->nombre_usuario.'">'.$select_usuarios=$rows3->nombre_usuario.'</option>';
							
		
							}
					
					
                    
                    
			echo '</select>
            </section>
            </td>
            <td style="font-size:11px;" width="30%">
                <input name="consulta" type="hidden" value="admin_interactions" />
            	<input name="" type="submit" value="ir" style="background:#0b90e5; color:#fff; border:none; height:25px; width:30px; margin-right:5px; float:right; cursor:pointer;">
                </form>
            </td>
          </tr>
        </table>
		';
	
		
		echo '
		    <br>	
		    <table width="100%" border="0">
            <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">Administrar Geocercas de<br>Mis usuarios</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
            </tr>
            <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="user_geocerca">
					<option value="'.$mi_user_name.'">'.$mi_user_name.'</option>';
					 
					 //LISTAMOS TODOS LOS USUARIOS
							$consulta_todos_usuarios = odbc_exec ($conexion,"SELECT DISTINCT nombre_usuario FROM G_USUARIOS WHERE usuario_padre='".$mi_user_name."' ");
							while ($rows3 = odbc_fetch_object($consulta_todos_usuarios)) {
		
		    echo '<option value="'.$select_usuarios=$rows3->nombre_usuario.'">'.$select_usuarios=$rows3->nombre_usuario.'</option>';
							
		
							}
					
					
                    
                    
			echo '</select>
            </section>
            </td>
            <td style="font-size:11px;" width="30%">
                <input name="consulta" type="hidden" value="admin_geocercas" />
            	<input name="" type="submit" value="ir" style="background:#0b90e5; color:#fff; border:none; height:25px; width:30px; margin-right:5px; float:right; cursor:pointer;">
                </form>
            </td>
          </tr>
        </table>
		';
	
	
		echo '
		    <br>	
		    <table width="100%" border="0">
            <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">Control de veh&iacute;culos<br>y Cuentas de Usuarios</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
            </tr>
            <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="the_user">
					<option value="'.$mi_user_name.'">'.$mi_user_name.'</option>';
					 
					 //LISTAMOS TODOS LOS USUARIOS
							$consulta_todos_usuarios = odbc_exec ($conexion,"SELECT DISTINCT nombre_usuario FROM G_USUARIOS WHERE usuario_padre='".$mi_user_name."' ");
							while ($rows3 = odbc_fetch_object($consulta_todos_usuarios)) {
		
		    echo '<option value="'.$select_usuarios=$rows3->nombre_usuario.'">'.$select_usuarios=$rows3->nombre_usuario.'</option>';
							
		
							}
					
					
                    
                    
			echo '</select>
            </section>
            </td>
            <td style="font-size:11px;" width="30%">
                <input name="consulta" type="hidden" value="admin_data" />
            	<input name="" type="submit" value="ir" style="background:#0b90e5; color:#fff; border:none; height:25px; width:30px; margin-right:5px; float:right; cursor:pointer;">
                </form>
            </td>
          </tr>
        </table>
		';

?>
</body>
</html>
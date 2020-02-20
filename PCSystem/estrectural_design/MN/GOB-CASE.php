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
echo '
			
		<table width="100%" border="0">
          <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">Administrar Geocercas</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="user_geocerca">
					<option value="'.$localFactoryUser.'">'.$localFactoryUser.'</option>';
					 
					//LISTAMOS TODAS LAS EMPRESAS
							$consulta_todos_los_usuarios = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS");
							while ($rows2 = odbc_fetch_object($consulta_todos_los_usuarios)) {
		
		echo '<option value="'.$select_usuario=$rows2->nombre_usuario.'">'.$select_usuario=$rows2->nombre_usuario.'</option>';
							
		
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
            <td style="font-size:11px; color:#b5a380" width="77%">Administrar Interacciones</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="filtro">
					<option value="'.$localFactoryUser.'">'.$localFactoryUser.'</option>';
					 
					//LISTAMOS TODOS LOS USUARIOS
							$consulta_todos_usuarios = odbc_exec ($conexion,"SELECT DISTINCT nombre_usuario  FROM E_INVENTARIO_GENERAL");
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
            <td style="font-size:11px; color:#b5a380" width="77%">An&aacute;lisis de Recorridos</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="filtro_vehiculo">';
					 
					//LISTAMOS TODOS LOS VEHICULOS DE TODOS LOS USUARIOS
							$consulta_todos_usuarios = odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL");
							while ($rows3 = odbc_fetch_object($consulta_todos_usuarios)) {
		        $nombre_vehiculo=$rows3->nombre_vehiculo;				
				$id_servidor=$rows3->id;
		echo '<option value="'.$nombre_vehiculo.'-'.$id_servidor.'">'.$nombre_vehiculo.'-'.$id_servidor.'</option>';
							
		
							}
					
					
                    
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
	
	echo '
		<br>	
		<table width="100%" border="0">
          <tr>
            <td style="font-size:11px; color:#b5a380" width="77%">Administrar Datos Usuarios</td>
            <td style="font-size:11px;" width="30%">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:11px;" width="77%">
            <section>
            <form action="" method="post">
            <select class="cs-select cs-skin-underline" name="the_user">
					<option value="'.$localFactoryUser.'">'.$localFactoryUser.'</option>';
					 
					//LISTAMOS TODAS LAS EMPRESAS
							$consulta_todos_los_usuarios = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS");
							while ($rows2 = odbc_fetch_object($consulta_todos_los_usuarios)) {
		
		echo '<option value="'.$select_usuario=$rows2->nombre_usuario.'">'.$select_usuario=$rows2->nombre_usuario.'</option>';
							
		
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
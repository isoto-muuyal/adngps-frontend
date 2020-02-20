<?php 
include ('conexion.php');
?>
<?php include ('conexion.php');

$consulta_si_el_usuario_es_distribuidor=odbc_exec($conexion,"SELECT * FROM G_USUARIOS where nombre_usuario='".$_SESSION['MM_Username']."'");
while($usuario_disribuidor=odbc_fetch_object($consulta_si_el_usuario_es_distribuidor))
{
	$tipo_usuario=$usuario_disribuidor->tipo;
	$empresa=$usuario_disribuidor->nombre_empresa;
}

	$tipo_usuario; 
	$empresa; 

?>
<!DOCTYPE html>
<html>
  <head>
    <style>p {color:#000; text-align:left;}</style>
    <script>
		function seleccionar_todo(){ 
	   for (i=0;i<document.f1.elements.length;i++) 
		  if(document.f1.elements[i].type == "checkbox")	
			 document.f1.elements[i].checked=1 
	} 
		function deseleccionar_todo(){ 
	   for (i=0;i<document.f1.elements.length;i++) 
		  if(document.f1.elements[i].type == "checkbox")	
			 document.f1.elements[i].checked=0 
	}
    </script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title></title>
    
   <link href="css/panel.css" rel="stylesheet" type="text/css" />
	
  </head>
  <body>
  <br />
  
  <div id="contenedor_formulario_modelos">
               
                <h3>Asignaci&oacute;n Veh&iacute;culos - Geo-Cercas</h3>
				
				<?php

				    //$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
					 
					
					if (isset($_POST['miUsuarioFiltroGeo'])) {
						
						$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
						$buscando_sus_geocercas=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE user_geo='".$miUsuarioFiltroGeo."'");}
					
					else {
					$buscando_sus_geocercas=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE user_geo='".$_SESSION['MM_Username']."'");
					}
				     
					 echo '
					 <span style="float:left; margin-top:0px;">Filtro de Geo-cercas&nbsp;&nbsp;</span>
					 <form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="asigna_geocercas" />';
						if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
						
						echo '<select name="id_geocerca" style="padding-top:2px; padding-bottom:2px;">
					 ';
					 while($geocercas_usuarios=odbc_fetch_object($buscando_sus_geocercas))
				     {
					 $geocercas_por_usuario=$geocercas_usuarios->nombre_geo;
					 $elid=$geocercas_usuarios->id;
					 
					 echo '<option value="'.$elid.'">'.$geocercas_por_usuario.'</option>';}
					
					 echo'</select>
				 
				
						<input type="submit" value="Filtrar Geo-cerca" />
					</form>
					<br>';
					
					
					
					
					if(isset($_POST['id_geocerca'])) {
					$id_geocerca=$_POST['id_geocerca'];
					
						$buscando_la_geocercas=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE id='".$id_geocerca."'");
						while($migeocerca=odbc_fetch_object($buscando_la_geocercas))
						{
							$nombre_geocerca=$migeocerca->nombre_geo;
							$mi_id_geocerca=$migeocerca->id;
						}
					
						echo '
						
						
						<div class="contiene_funciones_seleccion">';
						
						echo '<span style="margin:0 auto;"> Geocerca : '.$nombre_geocerca.'</span>
						<span style="margin:0 auto; float:right;">
						<form action="" method="post">
							
							<input name="consulta" type="hidden" value="admin_geocercas">';
							if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
							echo '<input name="" value="ADMINISTRACION DE GEOCERCAS" type="submit">
						</form>
						</span>
						
						
						</div>
						
						<div style="width:100%; overflow:hidden;">
						<h4 style="float:left; margin:0;font-size:10px">Veh&iacute;culos asignados a : "'.$nombre_geocerca.'"</h4>
						
						';
						
						
						
						
						
						
						 //CONTABILIZAR NUMERO DE REGISTROS
					     $contando_vehiculos_asignados_a_esta_geocerca = odbc_exec($conexion, "SELECT Count(*) AS counter FROM I_ASIGNACION_GEOCERCAS where id_geocerca='".$mi_id_geocerca."'");
					     $num_vehiculos_asignados = odbc_fetch_array($contando_vehiculos_asignados_a_esta_geocerca);
					     $num_vehiculos=$num_vehiculos_asignados['counter'];
						 
						 if ($num_vehiculos=='0') {echo '<span style="float:right; font-size:10px; color:red;">No hay veh&iacute;culos asignados a esta Geo-cerca</span>';}
						 else {echo '<span style="float:right; font-size:10px; color:red;">"'.$num_vehiculos.'" Vehiculo asignado (s)</span>';}
						 
						 echo '</div>
						<br><br>';
						 //BUSCAMOS EN ASIGNACION GEOCERCAS - TABLA
						 $buscando_sus_vehiculos_guardados=odbc_exec($conexion,"SELECT * FROM I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$mi_id_geocerca."'");
						 echo '<table width="100%" border="0" style="font-size:10px;" cellpadding="6" cellspacing="0">
						 <tr style="font-weight:bold; background:#e2e2e2" height="30">
							<td>ID Veh&iacute;culo</td>
							<td>Nombre Veh&iacute;culo</td>
							<td>Tipo aviso</td>
							<td>Salida General 1</td>
							<td>Salida General 2</td>
							<td>Estatus</td>
							<td align="center">Gurdar</td>
							<td align="center">Desasignar</td>
						 </tr>
						 ';
						 while($mis_vehiculos_asignados_guardados=odbc_fetch_object($buscando_sus_vehiculos_guardados))
						{
							$id_servidor=$mis_vehiculos_asignados_guardados->id_servidor;
							
							$t_a=$mis_vehiculos_asignados_guardados->tipo_aviso;
							$s_g_1=$mis_vehiculos_asignados_guardados->salida_general_1;
							$s_g_2=$mis_vehiculos_asignados_guardados->salida_general_2;
							$e_v=$mis_vehiculos_asignados_guardados->estatus_vehiculo;
							
							//COTEJAMIENTOS
							if ($t_a=='0') {$tipo_aviso='ninguno';}
							if ($t_a=='1') {$tipo_aviso='al entrar';}
							if ($t_a=='2') {$tipo_aviso='al salir';}
							if ($t_a=='3') {$tipo_aviso='ambos';}
							
							if ($s_g_1=='0') {$salida_general_1='ninguno';}
							if ($s_g_1=='1') {$salida_general_1='activado';}
							if ($s_g_1=='2') {$salida_general_1='desactivado';}
							
							if ($s_g_2=='0') {$salida_general_2='ninguno';}
							if ($s_g_2=='1') {$salida_general_2='activado';}
							if ($s_g_2=='2') {$salida_general_2='desactivado';}
							
							if ($e_v=='0') {$estatus_vehiculo='inactivo';}
							if ($e_v=='1') {$estatus_vehiculo='activo';}
							//COTEJAMIENTOS
							
							echo '
							<form action="panel.php" method="post">
							<tr class="tr_select">
							<td>'.$id_servidor.'</td>
							<td>'; 
							
							$sacando_nombre_vehiculo=odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE id='".$id_servidor."' ");
                            while ($el_nombre_vehiculo = odbc_fetch_object($sacando_nombre_vehiculo))
                            {
                            echo $el_vehiculo=$el_nombre_vehiculo->nombre_vehiculo; 
							
                            }; 
							
							echo'</td>
							<td>
							<select name="t_a" style="width:100%">
								<option value="'.$t_a.'">'.$tipo_aviso.'</option>
								<option value="1">al entrar</option>
								<option value="2">al salir</option>
								<option value="3">ambos</option>
								<option value="0">ninguno</option>
							</select>
							</td>
							<td>
							<select name="s_g_1" style="width:100%">
								<option value="'.$s_g_1.'">'.$salida_general_1.'</option>
								<option value="1">activado</option>
								<option value="2">desactivado</option>
								<option value="0">ninguno</option>
							</select>
							</td>
							<td>
							<select name="s_g_2" style="width:100%">
								<option value="'.$s_g_2.'">'.$salida_general_2.'</option>
								<option value="1">activado</option>
								<option value="2">desactivado</option>
								<option value="0">ninguno</option>
							</select>
							</td>
							<td>
							<select name="e_v" style="width:100%">
								<option value="'.$e_v.'">'.$estatus_vehiculo.'</option>
								<option value="0">inactivo</option>
								<option value="1">activo</option>
							</select>
							</td>
							<td align="center">
							<input name="consulta" type="hidden" value="asigna_geocercas" />
							<input name="elmioIdGeocerca" type="hidden" value="'.$mi_id_geocerca.'" />
							<input name="elmioIdServidor" type="hidden" value="'.$id_servidor.'" />
							<input name="id_geocerca" type="hidden" value="'.$mi_id_geocerca.'" />';
							if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						    if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
							
							echo '<input name="modifica_estatus_vehiculo_geocerca" type="submit" value="guardar" />
							</form></td>
							<td align="center">
							<form action="panel.php" method="post">
							 <input name="consulta" type="hidden" value="asigna_geocercas" />
							 <input name="elmioIdGeocerca" type="hidden" value="'.$mi_id_geocerca.'" />
							 <input name="elmioIdServidor" type="hidden" value="'.$id_servidor.'" />
							 <input name="id_geocerca" type="hidden" value="'.$mi_id_geocerca.'" />';
							 
							if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						    if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
							 
							 echo '<input name="desasignar_geocerca" type="submit" value="desasignar" />
							 </form>
							</td>
						    </tr>
							
							
							';
						}
						
						echo '</table><br><br>';
					     
						echo '
						<form method="post" action="panel.php" style="text-align:center;"> 
						<input name="consulta" type="hidden" value="asigna_geocercas">
						<input name="id_geocerca" type="hidden" value="'.$mi_id_geocerca.'">';
						
						if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
						
						echo '<input name="agregar_vehiculos" type="hidden" value="ok">
						<input type="submit" value="Agregar Veh&iacute;culos" style="margin:0 auto; margin-bottom:20px;" />
						</form>
						';
						
						
						
						if (isset($_POST['agregar_vehiculos']))
						
					    {
						
						$id_geocerca=$_POST['id_geocerca'];
						if (isset($_POST['miEmpresaFiltroGeo'])) {$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];}
						
						if (isset($_POST['miUsuarioFiltroGeo'])) {$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
						
						$buscando_todos_sus_vehiculos=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$miUsuarioFiltroGeo."'");
						
						}
						else {
							$buscando_todos_sus_vehiculos=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
							}
						
					     
						
						
						
						
						echo '<div class="contiene_funciones_seleccion">';
						
						
						echo'
						<a href="javascript:seleccionar_todo()" class="marcar_todo">Marcar todos</a> | 
						<a href="javascript:deseleccionar_todo()" class="marcar_todo">Marcar ninguno</a> 
						</div>';
						
						echo '
						<form name="f1" method="post" id="userform" action="panel.php"> 
						<input name="consulta" type="hidden" value="asigna_geocercas">';
						
						if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
						
						echo '<input name="geocerca" type="hidden" value="'.$id_geocerca.'">
						';
						while($vehiculo=odbc_fetch_object($buscando_todos_sus_vehiculos))
						{
							$miVehiculo=$vehiculo->nombre_vehiculo;
							$miId=$vehiculo->id;
							
							echo '
							<div class="select_asigna_geocerca">
							<input type="checkbox" name="checkboxvar[]" value="'.$miId.'"> '.$miVehiculo.' - '.$miId.' 
							
							</div>';
							
						}
						echo '
						<input type="submit" class="btn_guardar_geocerca_asignacion" value="Agregar"> 
						</form>';
						//BUSCAMOS EN ASIGNACION GEOCERCAS - TABLA
					
						}
					
					}
				
				
				
				
				?>
                
                <br>
                
				
				
            
				<?php 
				if (isset($_POST['checkboxvar'])) 
				{
					$geocerca=$_POST['geocerca'];
					if (isset($_POST['miUsuarioFiltroGeo'])) {$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];}
					if (isset($_POST['miEmpresaFiltroGeo'])) {$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];}
					
					
					
					
					
					
							if ($_POST['checkboxvar'] != '')
		{
									if(is_array($_POST['checkboxvar']))
									{
										
										while (list($key,$value) = each ($_POST['checkboxvar']))
										{
										
										$sql=odbc_exec($conexion,"INSERT INTO I_ASIGNACION_GEOCERCAS (id_geocerca,id_servidor,tipo_aviso,salida_general_1,salida_general_2,estatus_vehiculo) VALUES ('".$geocerca."','".$value."','0','0','0','0')");
										
										echo '
										<div id="funcion_opacidad">
										<div id="contenedor_confirmacion">
										Asignaci&oacute;n con &eacute;xito...<br><br>
										  <form action="panel.php" method="post">
											<input name="consulta" type="hidden" value="asigna_geocercas" />
											<input name="id_geocerca" type="hidden" value="'.$geocerca.'" />';
											
											if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
											
											echo '<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
										  </form>
										</div>
										</div>
										
										';
										
										}
									
									}
							}else {echo '';}
					
					
					
				}
				
				else {echo '';}
				?>



				<?php 
				if (isset($_POST['desasignar_geocerca'])) {
					
					$elmioIdGeocerca=$_POST['elmioIdGeocerca']; 
					$elmioIdServidor=$_POST['elmioIdServidor'];
					if (isset($_POST['miUsuarioFiltroGeo'])) {$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];}
					if (isset($_POST['miEmpresaFiltroGeo'])) {$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];}
					
					
					$consulta = odbc_exec($conexion, "DELETE FROM I_ASIGNACION_GEOCERCAS where id_geocerca='".$elmioIdGeocerca."' AND id_servidor='".$elmioIdServidor."' ");
					
					echo '
					<div id="funcion_opacidad">
				      <div id="contenedor_confirmacion">
					  Se ha desasignado<br>este ve&iacute;culo de esta geo-cerca<br><br>
					  <form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="asigna_geocercas" />
						<input name="id_geocerca" type="hidden" value="'.$elmioIdGeocerca.'" />';
						
						if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
						
						echo '<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
					  </form>
					  </div>
					  </div>
					
					
					
					';		
					
					
					
					
					
					}
				?>
				
				
				
				
				<?php 
				if (isset($_POST['modifica_estatus_vehiculo_geocerca'])) {
					
					$elmioIdGeocerca=$_POST['elmioIdGeocerca']; 
					$elmioIdServidor=$_POST['elmioIdServidor'];
					$t_a=$_POST['t_a']; 
					$s_g_1=$_POST['s_g_1']; 
					$s_g_2=$_POST['s_g_2']; 
					$e_v=$_POST['e_v'];
					if (isset($_POST['miUsuarioFiltroGeo'])) {$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];}
					if (isset($_POST['miEmpresaFiltroGeo'])) {$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];}
					
					
					$consulta = odbc_exec($conexion, "UPDATE I_ASIGNACION_GEOCERCAS SET tipo_aviso='".$t_a."', salida_general_1='".$s_g_1."', salida_general_2='".$s_g_2."', estatus_vehiculo='".$e_v."' where id_geocerca='".$elmioIdGeocerca."' AND id_servidor='".$elmioIdServidor."' ");
					
					echo '
					<div id="funcion_opacidad">
				      <div id="contenedor_confirmacion">
					  El sistema<br>se ha actualizado correctamente<br><br>
					  <form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="asigna_geocercas" />
						<input name="id_geocerca" type="hidden" value="'.$elmioIdGeocerca.'" />';
						
						if (isset($_POST['miUsuarioFiltroGeo'])) {
							$miUsuarioFiltroGeo=$_POST['miUsuarioFiltroGeo'];
							echo '<input name="miUsuarioFiltroGeo" type="hidden" value="'.$miUsuarioFiltroGeo.'" />';
							} else {echo '';}
							
						    if (isset($_POST['miEmpresaFiltroGeo'])) {
							$miEmpresaFiltroGeo=$_POST['miEmpresaFiltroGeo'];
							echo '<input name="miEmpresaFiltroGeo" type="hidden" value="'.$miEmpresaFiltroGeo.'" />';
							} else {echo '';}
						
						echo '<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
					  </form>
					  </div>
					  </div>
					
					
					
					';		
					
					
					
					
					
					}
				?>
    
	
	
	
        
    
  






   


</body>
</html>
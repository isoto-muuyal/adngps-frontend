
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
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
</head>

<body>
<span style="xolor:#999; font-size:10px;">Administra el n&uacute;mero de Geo-cercas para este usuario</span>

<?php
//FORM PARA AGREGAR NUMERO DE GEOCERCAS POR USUARIO DE LA EMPRESA FILTRADA
$user_geocerca = $_POST['user_geocerca']; //echo $user_geocerca;

	
$buscando_su_empresa=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$user_geocerca."'");
while ($laempresadelusuario = odbc_fetch_object($buscando_su_empresa))
{
	
    $empresa=$laempresadelusuario->nombre_empresa; 
	
    if ($empresa==$localFactoryName) {$num_geocercas=$globalGG;}
			else {
			
			$buscando_sus_geocercas_generales=odbc_exec ($conexion,"SELECT * FROM F_EMPRESAS WHERE nombre_empresa='".$empresa."'");
			while ($geocercas = odbc_fetch_object($buscando_sus_geocercas_generales))
			{
			
			$num_geocercas=$geocercas->num_geocercas;
			
			}
			
			
	}	
	
	
	$buscando_sus_geocercas_por_usuario=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$user_geocerca."'");
			while($geocercas_usuarios=odbc_fetch_object($buscando_sus_geocercas_por_usuario))
			{
					
				$usuario=$geocercas_usuarios->nombre_usuario;
				$laempresadelUsuario=$geocercas_usuarios->nombre_empresa;
				$num_geocercas_por_usuario=$geocercas_usuarios->geocercas;
			}	
					 
				 
						  
					
?>	    
			
					
<?php
}

//FORM PARA AGREGAR NUMERO DE GEOCERCAS POR USUARIO DE LA EMPRESA FILTRADA 
?>

					
			    
<?php 
if (isset($_POST['f1'])) {
	
	$num_geocercas_asignadas=$_POST['num_geocercas_asignadas'];
	$boofer_num_geo=$_POST['boofer_num_geo'];
	$num_geocercas=$_POST['num_geocercas']; 
	$user_geocerca=$_POST['user_geocerca']; 
	$laempresadelUsuario=$_POST['empresa'];
	//PRIMER CONDICION NUMEROS ENTEROS
	if(!is_numeric($num_geocercas_asignadas)) {echo '
					 
		<div id="funcion_opacidad">
		<div id="contenedor_confirmacion">
		Error...<br>Porfavor escriba numeros enteros<br><br>
			<form action="#" method="post">
			<input name="consulta" type="hidden" value="admin_geocercas" />
			<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
			
			<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
			</form>
		</div>
		</div>';}
	
		
		
		else {
			
			//SEGUNDA CONDICION NO MAYOR QUE LAS GEOCERCAS DE LA EMPRESA
			if ($num_geocercas_asignadas>$num_geocercas) 
			{
				echo '
					 
				<div id="funcion_opacidad">
				<div id="contenedor_confirmacion">
				Error...<br>Valor por ensima del numero de geocercas de su paquete<br><br>
				<form action="#" method="post">
				<input name="consulta" type="hidden" value="admin_geocercas" />
				<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
			
				<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
				</form>
				</div>
				</div>';
		
		    }
			else {
				
				//SUMA DE LAS GEOCERCAS DE LOS USUARIOS DE LA EMPRESA
				$contador = 0;
				
				$contabilizando_geocercas=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_empresa='".$laempresadelUsuario."'");
				while ($primer_cotejo = odbc_fetch_object($contabilizando_geocercas))
				{
					$primer_cotejo->geocercas;
					$contador = $contador + $primer_cotejo->geocercas;
					
				    
				}
				
				//echo $contador;
				$suma_geocercas=($contador+$num_geocercas_asignadas)-$boofer_num_geo;
				    
					//CONDICION NO SUPERE EL NUMERO DE GEOCERCAS TOTALES
					if ($suma_geocercas>$num_geocercas)
					{
						echo '
						<div id="funcion_opacidad">
						<div id="contenedor_confirmacion">
						Error...<br>Se ha superado el numero de geocercas de la empresa<br><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					
						<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
						</form>
						</div>
						</div>
						';
						
					}
					else {
						
						//EJECUCION ACTUALIZANDO NUMERO DE GEOCERCAS DEL USUARIO
						$ejecucion=odbc_exec($conexion,"UPDATE G_USUARIOS SET geocercas='".$num_geocercas_asignadas."' WHERE nombre_usuario='".$usuario."'");
						echo '
						<div id="funcion_opacidad">
						<div id="contenedor_confirmacion">
						Se ha actualizado correctamente el sistema<br><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					
						<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:90%" />	
						</form>
						</div>
						</div>
						';
						
					}
					//CIERRE DE CONDICION NO SUPERE EL NUMERO DE GEOCERCAS TOTALES
				
				
				//CIERRE DE SUMA DE LAS GEOCERCAS DE LOS USUARIOS DE LA EMPRESA
			
			}
			//CIERRE DE SEGUNDA CONDICION NO MAYOR QUE LAS GEOCERCAS DE LA EMPRESA
		
		}
	    
	//CIERRE DE PRIMER CONDICION NUMEROS ENTEROS	    
	
	
	
	
}

?>


<?php 



//------1.- SELECCION DEL VEHICULO PRINCIPAL
if (isset($_POST['selecciona_vehiculo_principal'])){
	 echo ' <div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
				<span style="font-size:11px; color:#000;">Seleccionar Veh&iacute;culo</span><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="empresa" value="'.$empresa.'" />
						<div style="width:auto;height:auto; overflow:auto; visibility:visible; margin-top:10px;">
						<select name="el_vehiculo_centro" style="width:100%; height:30px;">';
						$vehiculos=odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$user_geocerca."'");
								while ($vehiculos_list = odbc_fetch_object($vehiculos))
				                {
								$miId=$vehiculos_list->nombre_vehiculo;
								echo '
								<option value="'.$vehiculos_list->id.'">'.$vehiculos_list->nombre_vehiculo.'</option>';
								}
						echo'</select></div><br>
						<input name="" type="submit" value="siguiente" class="confirma_eliminacion" />
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input name="" type="submit" value="cancelar" class="confirma_eliminacion" />	
						</form>
			</div>
			</div>';	
}
//------1.- SELECCION DEL VEHICULO PRINCIPAL


//------2.- NOMBRE DE LA GEOCERCA Y EXTRACCION DEL VERTICE PRINCIPAL PARA EL POLIGONO
if (isset($_POST['el_vehiculo_centro'])){
					
			if(!empty($_POST['el_vehiculo_centro'])){
				  $el_vehiculo_centro=$_POST['el_vehiculo_centro'];
				  
				  echo '<div id="funcion_opacidad">
						<div id="contenedor_confirmacion">
						<span style="font-size:11px; color:#000;">Nombre de la Geo-cerca: '.$el_vehiculo_centro.'</span><br>
						<form action="#" method="post">
						<input name="nombre_geo" type="text" style="width:100%; height:30px; margin-top:5px;" /><br><br>
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="latlngCenterVehicle" value="'.$el_vehiculo_centro.'" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="empresa" value="'.$empresa.'" />
						
						<input name="" type="submit" value="siguiente" class="confirma_eliminacion" />	
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input name="selecciona_vehiculo_principal" type="hidden" value="ok" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input name="" type="submit" value="atras" class="confirma_eliminacion" />	
						</form>
						</div>
						</div>';
			}
}

//------2.- NOMBRE DE LA GEOCERCA Y EXTRACCION DEL VERTICE PRINCIPAL PARA EL POLIGONO 


//------3.- CREACION DE LA GEOCERCA 
if (isset($_POST['nombre_geo'])){
	
	//que no este vacio
	if(!empty($_POST['nombre_geo'])){
		
		$nombre_geo=$_POST['nombre_geo'];
		$user_geocerca=$_POST['user_geocerca'];
		$empresa=$_POST['empresa'];
		$latlngCenterVehicle=$_POST['latlngCenterVehicle'];
		
		
		//comprobacion que no exista la geocerca
		$consulta = odbc_exec($conexion, "SELECT Count(*) AS counter FROM H_GEOCERCAS where nombre_geo='".$nombre_geo."' AND user_geo='".$user_geocerca."' ");
		$arr = odbc_fetch_array($consulta);
		echo 'Numero total de registros: '.$arr['counter'].'';
		//comprobacion que no exista la geocerca
		
		if ($arr['counter']==0) {
			
						$nombre_geo=$_POST['nombre_geo'];
						$user_geocerca=$_POST['user_geocerca'];
						$empresa=$_POST['empresa'];
						$latlngCenterVehicle=$_POST['latlngCenterVehicle'];
						
						//consulta de latitut y longitud del vehiculo centro del poligono
						$consulta_datos=odbc_exec($conexion,"SELECT TOP 1 * FROM ZLECTURAS WHERE id_servidor = '".$latlngCenterVehicle."' ORDER BY id DESC");
						while ($datos=odbc_fetch_object($consulta_datos)) 
						{
						$lat=$datos->LAT; 
						$lng=$datos->LON; 
						}
						
						$prime_sum_vertex_lat=$lat+.00001;
						$prime_sum_vertex_lng=$lng-.00009;
						
						$second_sum_vertex_lat=$lat+.00005;
						$second_sum_vertex_lng=$lng+.00005;
						
						$teer_rest_vertex_lat=$lat-.00005;
						$teer_rest_vertex_lng=$lng+.00005;
						
						
						$vertice_uno='lat: '.$prime_sum_vertex_lat.', lng: '.$prime_sum_vertex_lng.'';
						$vertice_dos='lat: '.$second_sum_vertex_lat.', lng: '.$second_sum_vertex_lng.'';
						$vertice_tres='lat: '.$teer_rest_vertex_lat.', lng: '.$teer_rest_vertex_lng.'';
						
						$ejecucion=odbc_exec($conexion,"INSERT INTO H_GEOCERCAS (nombre_geo,user_geo,empresa_geo,cad_ubica_geocerca,estatus) VALUES ('".$nombre_geo."','".$user_geocerca."','".$empresa."', '{".$vertice_uno."},{".$vertice_dos."},{".$vertice_tres."},','activa')");
						
						$consulta_geo_generada=odbc_exec($conexion,"SELECT TOP 1 * FROM H_GEOCERCAS WHERE nombre_geo = '".$nombre_geo."' and user_geo = '".$user_geocerca."' ORDER BY id DESC");
						while ($lageo=odbc_fetch_object($consulta_geo_generada)) 
						{
						$id_geo=$lageo->id; 
						$sql=odbc_exec($conexion,"INSERT INTO I_ASIGNACION_GEOCERCAS (id_geocerca,id_servidor,tipo_aviso,salida_general_1,salida_general_2,estatus_vehiculo) VALUES ('".$id_geo."','".$latlngCenterVehicle."','0','0','0','0')");
						}
						
						
		
						echo '<div id="funcion_opacidad">
						<div id="contenedor_confirmacion">
						<span style="font-size:11px; color:#000;">Su geocerca se ha generado</span>
						<form action="panel.php" method="post">
						
						<input name="consulta" type="hidden" value="edita_geocercas" />
					    <input name="id_geocerca" type="hidden" value="'.$id_geo.'" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input name="" type="submit" value="continuar" class="confirma_eliminacion" style="width:88%" />	
						</form>
						</div>
						</div>';
		
		}
		
		else {//si ya existe->
			 echo '
			 <div id="funcion_opacidad">
			 <div id="contenedor_confirmacion">
			 <span style="color:red">Esta geo-cerca ya existe</span><br><br>
			 <form action="#" method="post">
			 <input name="consulta" type="hidden" value="admin_geocercas" />
			 <input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
			 <input type="hidden" name="el_vehiculo_centro" value="'.$latlngCenterVehicle.'" />
			 <input name="" type="submit" value="atras" class="confirma_eliminacion" style="width:90%" />	
			 </form>
			 </div>
			 </div>
			 ';
			 //si ya existe->
			
			
		}
		
		
		
		
	
	
	} else {//si esta vacio->
			echo '
			<div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
			<span style="color:red">Escriba el<br>Nombre de la Geo-cerca</span><br><br>
			<form action="#" method="post">
			<input name="consulta" type="hidden" value="admin_geocercas" />
			<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
			<input type="hidden" name="el_vehiculo_centro" value="sin" />
			<input name="" type="submit" value="atras" class="confirma_eliminacion" style="width:90%" />	
			</form>
			</div>
			</div>
			';
			//si esta vacio->				
			}
	
}


//------3.- CREACION DE LA GEOCERCA Y EXTRACCION DEL VERTICE PRINCIPAL PARA EL POLIGONO


?>	


<?php 

//------DELETE FUNCTION CONFIRM
if (isset($_POST['delete_confirm'])){
	 
	 $user_geocerca=$_POST['user_geocerca'];
	 $id_geocerca=$_POST['id_geocerca'];
	 
	 odbc_exec($conexion, " DELETE FROM I_ASIGNACION_GEOCERCAS WHERE id_geocerca=".$id_geocerca.";");
	 odbc_exec($conexion, " DELETE FROM H_GEOCERCAS WHERE id=".$id_geocerca.";");
	 
	 echo ' <div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
				<span style="font-size:11px; color:#000;">Eliminaci&oacute;n con &eacute;xito</span><br>
						
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input name="" type="submit" value="continuar" class="confirma_eliminacion" style="width:88%" />	
						</form>
			</div>
			</div>';	
}
//------DELETE FUNCTION CONFIRM

?>










<?php 

                if (isset($_POST['actualiza_estatus_geocerca'])) {
					$user_geocerca=$_POST['user_geocerca'];
					$id_geocerca=$_POST['id_geocerca'];
					$miEstatus=$_POST['miEstatus'];
					
					$ejecucion_actualiza_estatus_geocerca=odbc_exec($conexion,"UPDATE H_GEOCERCAS SET estatus='".$miEstatus."' WHERE id='".$id_geocerca."'");
				
					$query_geo_name=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE id='".$id_geocerca."'");
						while ($geo_name = odbc_fetch_object($query_geo_name))
						{
						$the_geo_name=$geo_name->nombre_geo; 
						}
				
						echo '<br><span style="color:red; font-size:11px;">Se ha actualizado correctamente el estatus de la geo-cerca "'.$the_geo_name.'" a ('.$miEstatus.')</span>';
				
				}
				
				
				  if (isset($_POST['geo_delete'])) {
					$user_geocerca=$_POST['user_geocerca'];
					$id_geocerca=$_POST['id_geocerca'];
					
					$query_geo_name=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE id='".$id_geocerca."'");
						while ($geo_name = odbc_fetch_object($query_geo_name))
						{
						$the_geo_name=$geo_name->nombre_geo; 
						}
					
					echo ' <div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
				<span style="font-size:11px; color:#000;">Esta seguro de<br>eliminar esta Geo-cerca :?</span><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input type="hidden" name="delete_confirm" value="ok" />
						<input name="" type="submit" value="si" class="confirma_eliminacion" />
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input name="" type="submit" value="no" class="confirma_eliminacion" />	
						</form>
			</div>
			</div>';	
					
					//$ejecucion_elimina_geocerca=odbc_exec($conexion,"DELETE FROM H_GEOCERCAS where id='".$id_geocerca."' AND user_geo='".$user_geocerca."'");
				    
				
				}

//LISTADO DE GEOCERCAS
echo '
	<h4 style="width:99%; background:#fff; border-bottom:solid thin #e2e2e2; padding-top: 10px; padding-bottom: 7px; padding-left:1%; color:#006699;">
	Listado de geo-cercas generadas:
	</h4>';
$buscando_geocercas_guardadas=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE user_geo='".$user_geocerca."'");
			 
			echo '<table width="100%" border="0" cellpadding="2" cellspacing="2" style="font-size:10px;">
				<tr bgcolor="#e2e2e2" height="30">
				    <td width="35%">&nbsp;Nombre de la Geocerca</td>
					<td align="center" width="35%">Configuraciones</td>
					<td align="center" width="20%">Cambiar Estatus de Geo-cerca</td>
					<td align="center" width="8%"></td>
					<td align="center" width="2%">Eliminar</td>
				</tr>';
			 while ($geocercas_guardadas = odbc_fetch_object($buscando_geocercas_guardadas))
			{
				$id_geocerca=$geocercas_guardadas->id;
				$estatus=$geocercas_guardadas->estatus;
				
				if ($estatus=='activa') {$estatus_style='background:#6d8800';};
				if ($estatus=='no activa') {$estatus_style='background:red';};
				
			echo '
			
				<tr class="tr_select">
					<td width="25%">&nbsp;<span style="font-weight:bold;">'.$geocercas_guardadas->nombre_geo.'</span></td>
					
					';
					$miUsuarioFiltroGeo=$geocercas_guardadas->user_geo;
					echo '<td align="center">
					<form action="panel.php" method="post">
					<input name="consulta" type="hidden" value="edita_geocercas" />
					<input name="id_geocerca" type="hidden" value="'.$id_geocerca.'" />
					<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					<input type="submit" value="configurar en MAPA" class="geo_btn" style="height:30px;" title="click aqui para editar la ubicacion de la geo-cerca" />
					</form>
					</td>
					<td align="center" valign="center">
					<form action="panel.php" method="post">
					<input name="consulta" type="hidden" value="admin_geocercas" />
					<input name="actualiza_estatus_geocerca" type="hidden" value="ok" />
					<input name="id_geocerca" type="hidden" value="'.$id_geocerca.'" />
					<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					<select name="miEstatus" style="width:100%; float:none; height:30px">
						<option>'.$estatus.'</option>
						<option>activa</option>
						<option>no activa</option>
					</select>
					</td>
					<td align="right" valign="center">
					<input type="submit" value="guardar cambios" style="height:30px; font-size:10px; padding-left:40px; padding-right:40px; padding-top:3px;" title="Actualizar el estatus de esta geo-cerca" class="btn_actualiza_estatus"/>
					</td>
					</form>
					<td align="right" valign="center">
					<form action="panel.php" method="post">
					<input name="consulta" type="hidden" value="admin_geocercas" />
					<input name="geo_delete" type="hidden" value="ok" />
					<input name="id_geocerca" type="hidden" value="'.$id_geocerca.'" />
					<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					<input type="submit" value="eliminar" style="height:30px; font-size:10px; padding-left:40px; padding-right:40px; padding-top:3px;" title="Eliminar esta geo-cerca" class="btn_actualiza_estatus_delete"/>
					</form>
					</td>
				</tr>
				
			';
			
			
			
			
			}
			
			echo '
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
			</table>';
			
			//---CIERRE DE TABLA DE TODAS LAS GEOCERCAS DE LA EMPRESA FILTRADA (GEOCERCA - USUARIO)----------------------------
			 
			//FORMULARIO CREAR GEOCERCA
			echo '

			   <br>
			   <form action="panel.php" method="post">
				    <input name="selecciona_vehiculo_principal" type="hidden" value="ok" />
					<input name="consulta" type="hidden" value="admin_geocercas" />
					<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					<input name="empresa" type="hidden" value="'.$laempresadelUsuario.'" />
					<input name="num_geocercas" type="hidden" value="'.$num_geocercas.'" />
					
					<input type="hidden" value="'.$user_geocerca.'" />
					
			 		<input type="submit" value="Nueva geo-cerca" style=" height:30px;background:#000; color:#fff; border:none; cursor:pointer; padding-left:50px; padding-right:50px;"  />
			 	</form>
				<br>
			';
			//FORMULARIO CREAR GEOCERCA
			
			
			
			
			echo '<span class="derechos">Avl M&eacute;xico Derechos Reservados 2017</span>';

			//LISTADO DE GEOCERCAS
?>			
             
              
 
</body>
</html>
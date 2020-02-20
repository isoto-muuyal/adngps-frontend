<?php 
include ('conexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
		margin:0 auto;
		
      }
      #map_canvas {
        height: 91%;
      }
	  
	  .form {width:50%; height:auto; display:block; background:#ccc;}
    
	
	
	</style>
</head>

<body>
<div style="position:absolute; background:#000; font-size:10px; bottom:30px; left:5px; z-index:300;
					padding:20px; color:#999; -webkit-border-radius:5px;border-radius:5px;">
					<?php 
					$id_geocerca=$_POST['id_geocerca'];
					if (isset($_POST['user_geocerca'])) {$user_geocerca=$_POST['user_geocerca'];}
					$consulta=odbc_exec($conexion,"SELECT * from H_GEOCERCAS WHERE id='".$id_geocerca."'");
					while($la_lectura=odbc_fetch_object($consulta))
					{
						
						$geocerca=$la_lectura->nombre_geo;
						
						
						echo '<h3 style="margin:0;">'.$geocerca.'</h3>';
						
					}
					
					$numero_vehiculos_asignados = odbc_exec($conexion, "SELECT Count(*) AS counter FROM I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$id_geocerca."'");
	                $arr = odbc_fetch_array($numero_vehiculos_asignados);
                    $num_vehiculos_asignados=$arr['counter']; echo 'Veh&iacute;culos asignados :<span style="color:red; font-size:14px;"> '.$num_vehiculos_asignados.'</span><br><br>';
					
					
					?>
					<span style="color:#79aaf3;">INDICACIONES PARA LA EDICI&Oacute;N:</span><br><br>
                    1.- Para mover la geo-cerca arrastre con "click izquierdo"<br />
                    a la posici&oacute;n deseada y suelte.
                    <br /><br />
                    2.- Para Editar la la forma de su geo-cerca
                    <br />
                    Posicionese sobre los vertices de su geo-cerca<br />y con click muevalos a la posici&oacute;nn deseada.
                    <br /><br />
                    3.- Para guardar los valores posicionese sobre la geo-cerca<br />y de un solo click para guardar...<br /><br /> Confirme...!
  </div>
  <?php 
  
  if (isset($_POST['valor'])){
		
		$id_geocerca=$_POST['id_geocerca'];
		$usuario=$_POST['usuario']; 
		$valor=$_POST['valor']; //Esta es la cadena que se guardara para mostrar y editar
		
		$cadena_sola=$_POST['cadena_sola'];
		
		
		
		
		$cadena_sola_lat=$_POST['cadena_sola_lat']; //estas son solo latitudes
		$cadena_sola_lng=$_POST['cadena_sola_lng']; //estas son solo longitudes
		
		
		
		odbc_exec($conexion,"UPDATE H_GEOCERCAS SET cad_ubica_geocerca = '".$valor."', cadena_pura_lat = '".$cadena_sola_lat."', cadena_pura_lng = '".$cadena_sola_lng."', cad_mapa_seguimiento = '".$cadena_sola."' WHERE id='".$id_geocerca."'");
		
		            
				
					
		
		  
  } else {echo'';}
  
  
  
  
  
  ?>
   
    
	
	
<script>
<?php 
echo 'var sites = [';

//CONTABILIZAMOS VEHICULOS ASIGNADOS A GEOCERCA
$numero_vehiculos_asignados = odbc_exec($conexion, "SELECT Count(*) AS counter FROM I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$id_geocerca."'");
$arr = odbc_fetch_array($numero_vehiculos_asignados);
$num_vehiculos_asignados=$arr['counter'];
//CONTABILIZAMOS VEHICULOS ASIGNADOS A GEOCERCA

//CONDICION SI NO HAY VEHICVULOS ASIGNADOS
if ($num_vehiculos_asignados==0) {
	
	$consulta_valor_inicial_geocerca=odbc_exec($conexion,"SELECT * from H_GEOCERCAS WHERE id='".$id_geocerca."'");
    while ($cadena_geocerca=odbc_fetch_object($consulta_valor_inicial_geocerca))
    {
		$ubicacion_geocerca=$cadena_geocerca->cad_ubica_geocerca;
		$nombre_de_geocerca=$cadena_geocerca->nombre_geo;
		$usuario_geo=$cadena_geocerca->user_geo;
	    
		$nombre_vehiculo='';
		$ultima_posicion=$nombre_de_geocerca;
		$resultado_evento='';
		$bateria='Sin Vehiculos para mostrar';
		$velocidad_real=$usuario_geo;
		$lat='23.7062376';
		$lng='-113.9085253';
		$icono='img/iconos/icon_geo.png';
		$id_servidor='';
		$lng2='-92.9085253';
		echo'["Este es el centro de tu geo-cerca '.$nombre_vehiculo.' ;\nGeo-Cerca : '.$ultima_posicion.' ; \n'.$resultado_evento.''.$bateria.'; \nUsuario : '.$velocidad_real.'", '.$lat.', '.$lng.',"'.$icono.'","'.$id_servidor.'"],';
	    echo'["Este es el centro de tu geo-cerca '.$nombre_vehiculo.' ;\nGeo-Cerca : '.$ultima_posicion.' ; \n'.$resultado_evento.''.$bateria.'; \nUsuario : '.$velocidad_real.'", '.$lat.', '.$lng2.',"'.$icono.'","'.$id_servidor.'"],';
	}
	
	
}

//CONDICION SI NO HAY VEHICVULOS ASIGNADOS



//CONDICION SI HAY VEHICULOS ASIGNADOS
else {

//CONSULTAMOS EL NUMERO DE VEHICULOS DE CADA USUARIO
$consulta2=odbc_exec($conexion,"SELECT DISTINCT id_servidor from I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$id_geocerca."'");
while ($los_ids=odbc_fetch_object($consulta2))
{
	$los_ids->id_servidor;
	
	$consulta_datos=odbc_exec($conexion,"SELECT TOP 1 * FROM ZLECTURAS WHERE id_servidor = '".$los_ids->id_servidor."' ORDER BY hora_servidor DESC");
	
	//CREAMOS EL ARRAY QUE DEVUELVA POSICIONES DE VEHICULOS PARA IMPRIMIRLOS EN MAPA
    while ($datos=odbc_fetch_object($consulta_datos)) 
				{
				$id_servidor=$datos->id_servidor;
				$lat=$datos->LAT; 
				$lng=$datos->LON; 
				$velocidad=$datos->SPD;
				$odometro=$datos->DIST; 
				$nombre_vehiculo=$datos->nombre_vehiculo; 
				$ultima_posicion=$datos->hora_servidor;
				$evento=$datos->EVT_ID;
				$bateria=$datos->PWR_VOLT;
				
				
				
				 if(empty($lat)) {echo '';} else {
					 
					 if(empty($lng)) {echo '';} else {
				
						if ($evento==1) {$resultado_evento='Vehiculo apagado'; $icono='img/iconos/icon_rojo.png';};
						if ($evento==2) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
				
						$velocidad_real=round ($velocidad);
						echo'["Vehículo : '.$nombre_vehiculo.' ;\nUltima posición : '.$ultima_posicion.' ; \n'.$resultado_evento.'; \nBateria : '.$bateria.'; \nVelocidad : '.$velocidad_real.'", '.$lat.', '.$lng.',"'.$icono.'","'.$id_servidor.'"],';

					};
				 }
	
	}
	
	
}

}//CONDICION SI HAY VEHICULOS ASIGNADOS

?>
];


var infowindow = null;

function initMap() {
	var centerMap = new google.maps.LatLng(23.644524198573688, -103.33328247070312);
	var myOptions = {
		zoom: 10,
		center: centerMap,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	
	map = new google.maps.Map(document.getElementById('map_canvas'),myOptions );
    
  // Define the LatLng coordinates for the polygon.
    var triangleCoords = [
  
  	<?php 
	$id_geocerca=$_POST['id_geocerca'];
	$consulta=odbc_exec($conexion,"SELECT * from H_GEOCERCAS WHERE id='".$id_geocerca."'");
	while($la_lectura=odbc_fetch_object($consulta))
	{
		
		$val=$la_lectura->cad_ubica_geocerca;
		$usuario=$la_lectura->user_geo;
		
		echo $val;
		
		}
	?>
  
      
  
  ];
  
  

  // Construct the polygon.
  var bermudaTriangle = new google.maps.Polygon({
	editable: true,
	draggable:true,
    paths: triangleCoords,
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: '#000000',
    fillOpacity: 0.5,
	
  });
  
  bermudaTriangle.setMap(map);
  
  // Add a listener for the click event.
  bermudaTriangle.addListener('click', showArrays);

  infoWindow = new google.maps.InfoWindow;
    
	
	setZoom(map, sites);
	setMarkers(map, sites);		
	
	
	
  
  }

function setMarkers(map, markers) {
	for (var i = 0; i < markers.length; i++) {
		var site = markers[i];
		var siteLatLng = new google.maps.LatLng(site[1], site[2]);
		
		
        var marker = new google.maps.Marker({
			position: siteLatLng,
			map: map,
			title: site[0],
            icon: site[3],
            label: site[4],
            
			
			// Markers drop on the map
			animation: false /* google.maps.Animation.DROP */
		});
		
		
	}
}

function setZoom(map, markers) {
	var boundbox = new google.maps.LatLngBounds();
	for ( var i = 0; i < markers.length; i++ )
	{
	  boundbox.extend(new google.maps.LatLng(markers[i][1], markers[i][2]));
	}
	map.setCenter(boundbox.getCenter());
	map.fitBounds(boundbox);
	
}

/** @this {google.maps.Polygon} */
function showArrays(event) {
  // Since this polygon has only one path, we can call getPath() to return the
  // MVCArray of LatLngs.
  var vertices = this.getPath();

  var contentString = '';
  var contentStringsolo = '';
  var contentStringsololat = '';
  var contentStringsololng = '';   
  

  // Iterate over the vertices.
  for (var i =0; i < vertices.getLength(); i++) {
    var xy = vertices.getAt(i);
    contentString += '{lat: ' + xy.lat() + ', lng: ' + xy.lng()+'},';
	contentStringsolo += '[' + xy.lat() + ',' + xy.lng()+'], ';
	contentStringsololat += '' + xy.lat() + ', ';
	contentStringsololng += '' + xy.lng() + ', ';
    }
	
	
  
  

  // Replace the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(event.latLng);
  
  infoWindow.open(map);
 
  
 document.write('<div style="width:99%; height:100%;background:url(img/bg_map.jpg); background-size:100%;position:absolute; top:0; margin:0; "><div style="width:50%; height:30%; background:#f1f1f1; text-align:center; margin-left:25%;padding-top:5%; padding-bottom:5%; margin-top:5%;"><br>Esta Seguro de<br />guardar los valores de esta geo-cerca?...<br><br><form action="panel.php" method="post"><input name="consulta" type="hidden" value="edita_geocercas"><input name="id_geocerca" type="hidden" value="<?php echo $id_geocerca ?>"><input name="user_geocerca" type="hidden" value="<?php echo $user_geocerca ?>"><?php if (isset($_POST['user_geocerca'])) {
								$user_geocerca=$_POST['user_geocerca'];
   								echo '<input name="user_geocerca" type="hidden"  value="'.$user_geocerca.'" >';
   								} else {echo '';}
								if (isset($_POST['user_geocerca'])) {
								$user_geocerca=$_POST['user_geocerca'];
   								echo '<input name="user_geocerca" type="hidden"  value="'.$user_geocerca.'" >';
   								} else {echo '';}?><input name="valor" type="hidden" value="'+contentString+'"><input name="usuario" type="hidden" value="<?php echo $usuario ?>"><input name="cadena_sola_lat" type="hidden" value="'+contentStringsololat+'"><input name="cadena_sola" type="hidden" value="'+contentStringsolo+'"><input name="cadena_sola_lng" type="hidden" value="'+contentStringsololng+'"><input name="" type="submit" value="confirmar" style="padding-left:4%; padding-right:4%; padding-top:1%; padding-bottom:1%; cursor:pointer;"></form><br><br><form action="panel.php" method="post"><input name="consulta" type="hidden" value="edita_geocercas"><input name="id_geocerca" type="hidden" value="<?php echo $id_geocerca ?>"><input name="user_geocerca" type="hidden" value="<?php echo $user_geocerca ?>"><?php if (isset($_POST['miEmpresaFiltroGeo'])) {
								$user_geocerca=$_POST['user_geocerca'];
   								echo '<input name="user_geocerca" type="hidden"  value="'.$user_geocerca.'" >';
   								} else {echo '';}
								if (isset($_POST['user_geocerca'])) {
								$user_geocerca=$_POST['user_geocerca'];
   								echo '<input name="user_geocerca" type="hidden"  value="'.$user_geocerca.'" >';
   								} else {echo '';}?><input name="" type="submit" value="cancelar" style="padding-left:4%; padding-right:4%; padding-top:1%; padding-bottom:1%; cursor:pointer; background:none; border:none; color:red;"></form><br><br></div></div>'); 
  
}



    </script>
   
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $K; ?>&callback=initMap">
    </script>
    
    <div id="map_canvas"></div>    
    
<div style="width:300px; height:350px; overflow:auto; visibility:visible; background:#fff; position:fixed; top:51px; z-index:2000; right:0.2%; box-shadow:0px 0px 4px #999; opacity:1;
padding:3px 3px 13px 3px; font-size:10px; color:#fff;">




<?php 
include ('conexion.php');

//ABRIMOS CICLO DE VEHICULOS ASIGNAODS

if (isset($_POST['user_geocerca'])) {$user_geocerca=$_POST['user_geocerca'];}
					$consulta=odbc_exec($conexion,"SELECT * from H_GEOCERCAS WHERE id='".$id_geocerca."'");
					while($la_lectura=odbc_fetch_object($consulta))
					{
						
						$geocerca=$la_lectura->nombre_geo;
						
						
					}



echo '<h4 style="text-align:center; background:#0b90e5; padding-top:3%; padding-bottom:3%; margin:0;">Geocerca : "'.$geocerca.'"</h4>';
echo '
				
				<div class="menujq">
				<ul>
					<li><a href="javascript:void();" class="a">Veh&iacute;culos asignados esta Geo-cerca</a>
				<ul>
				
				 <li><table width="100%" border="0" cellpadding="0" cellspacing="2" style="margin-top:2px;">';

$consulta_vehiculos_signados=odbc_exec($conexion,"SELECT * from I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$id_geocerca."'");
while ($los_vehiculos=odbc_fetch_object($consulta_vehiculos_signados))
{
	$los_vehiculos->id_servidor;
	
	$consulta_datos_de_vehiculos=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE id = '".$los_vehiculos->id_servidor."' ORDER BY id DESC");
	while ($datos=odbc_fetch_object($consulta_datos_de_vehiculos)) 
				{
				$id_vehicle=$datos->id;
				$nombre_vehiculo=$datos->nombre_vehiculo;
				
				
					
				echo'
                
                       
                       
                     
								<tr bgcolor="#f1f1f1" height="30px;">
									<td width="55%" align="center"><span style="color:red;">'.$nombre_vehiculo.' - '.$id_vehicle.'</span></td>
									<td width="25%" align="center" bgcolor="#000">
										<form name="" action="panel.php" method="post">
											<input name="id_vehicle" type="hidden"  value="'.$id_vehicle.'">
											<input name="user_geocerca" type="hidden"  value="'.$user_geocerca.'" >
											<input name="id_geocerca" type="hidden"  value="'.$id_geocerca.'" >
											<input name="configurar_vehiculos" type="hidden"  value="ok" >
											<input name="consulta" type="hidden"  value="edita_geocercas" >
											<input name="" type="submit" id="btn" value="Configurar" class="btn_geo_edit_green" >
										</form>
									</td>
									<td width="20%" align="center" bgcolor="#000">
										<form name="" action="panel.php" method="post">
											<input name="id_vehicle" type="hidden"  value="'.$id_vehicle.'">
											<input name="user_geocerca" type="hidden"  value="'.$user_geocerca.'" >
											<input name="id_geocerca" type="hidden"  value="'.$id_geocerca.'" >
											<input name="desasignar_vehiculos" type="hidden"  value="ok" >
											<input name="consulta" type="hidden"  value="edita_geocercas" >
											<input name="" type="submit" id="btn" value="Quitar" class="btn_geo_edit" >
										</form>
									</td>
								</tr>';
							
				
				}
}

echo '</table>
					   		
							
							
					   </li>
                       <li>
					   
                      
                       </li>
                  </ul>
               </li>
               <?php } ?>
              
            </ul>
          
         ';
//CERRAMOS CICLO DE VEHICULOS ASIGNAODS
				
				
			
				

?>
<?php 
echo '<br><h4 style="width:96%;text-align:left;padding-top:3%; padding-bottom:3%; padding-left:4%; margin:0; background:#e2e7eb;color:#0063a3;">OPCIONES</h4>';
if (isset($_POST['user_geocerca'])) {$user_geocerca=$_POST['user_geocerca'];}?> 
<form action="panel.php" method="post">
<input name="consulta" type="hidden"  value="edita_geocercas" >
<input name="user_geocerca" type="hidden"  value="<?php echo $user_geocerca?>" >
<input name="id_geocerca" type="hidden"  value="<?php echo $id_geocerca?>" >
<input name="asignacion_vehicular" type="hidden"  value="ok" >
<input name="" type="submit" id="btn" value="Asignar mas veh&iacute;culos" class="btn_configuracion_global" />
</form>
<form action="panel.php" method="post">
<input name="consulta" type="hidden"  value="edita_geocercas" >
<input name="user_geocerca" type="hidden"  value="<?php echo $user_geocerca?>" >
<input name="id_geocerca" type="hidden"  value="<?php echo $id_geocerca?>" >
<input name="geo_delete" type="hidden"  value="ok" >
<input name="" type="submit" id="btn" value="Eliminar esta geo-cerca" class="btn_configuracion_global" />
</form>
<form action="panel.php" method="post">
<input name="consulta" type="hidden"  value="admin_geocercas" >
<input name="user_geocerca" type="hidden"  value="<?php echo $user_geocerca?>" >
<input name="selecciona_vehiculo_principal" type="hidden"  value="ok" >
<input name="" type="submit" id="btn" value="Crear otra geo-cerca" class="btn_configuracion_global" />
</form>
<form action="panel.php" method="post">
<input name="consulta" type="hidden"  value="admin_geocercas" >
<input name="user_geocerca" type="hidden"  value="<?php echo $user_geocerca?>" >
<input name="" type="submit" id="btn" value="Salir y ver la lista de Goe-cercas" class="btn_configuracion_global" style="margin-top:20px; color:#ff7878;" />
</form>

</div>
   
<?php 
//------1.- DELETE FUNCTION
if (isset($_POST['geo_delete'])){
	 echo ' <div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
				<span style="font-size:11px; color:#000;">Esta seguro de<br>eliminar esta Geo-cerca?</span><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="admin_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input type="hidden" name="delete_confirm" value="ok" />
						<input name="" type="submit" value="si" class="confirma_eliminacion" />
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input name="" type="submit" value="no" class="confirma_eliminacion" />	
						</form>
			</div>
			</div>';	
}
//------1.- DELETE FUNCTION



?>

<?php 

//------ASIGN VEHICLES
if (isset($_POST['asignacion_vehicular'])){
	 
	 $user_geocerca=$_POST['user_geocerca'];
	 $id_geocerca=$_POST['id_geocerca'];
	 
	 $geo_name=odbc_exec ($conexion,"SELECT * FROM H_GEOCERCAS WHERE id='".$id_geocerca."'");
		while ($geo_name_select = odbc_fetch_object($geo_name))
		{
			$my_geo=$geo_name_select->nombre_geo;
		}
	 
	  echo '<div id="funcion_opacidad">
						<div id="contenedor_confirmacion" style="margin-top:120px;">
						<span style="font-size:11px; color:#000;">Nombre de la Geo-cerca:</span><br>
						<form action="#" method="post">
						<span style="color:red; font-size:11px;">"'.$my_geo.'"</span><br><br>
						<span style="font-size:11px; color:#000;">Veh&iacute;culos para asignar:</span><br>
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input type="hidden" name="confirm_select" value="ok" />
						<div style="width:auto;height:150px; overflow:auto; visibility:visible; color:#999;">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px;">';
								$vehiculos=odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$user_geocerca."'");
								while ($vehiculos_list = odbc_fetch_object($vehiculos))
				                {
								$miId=$vehiculos_list->id;
								echo '<tr height="30"bgcolor="#fff">
								<td width="10%" valign="middle" align="center"><input type="checkbox" name="checkboxvar[]" value="'.$miId.'" style="width:50%; display:block;" ></td>
								<td width="90%" valign="middle" align="left">&nbsp;&nbsp;'.$vehiculos_list->nombre_vehiculo.' - '.$vehiculos_list->id.'</td>
								</tr>';
								}
								
								
						echo '</table></div><br>
						<input name="" type="submit" value="siguiente" class="confirma_eliminacion" />	
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input name="" type="submit" value="cancelar" class="confirma_eliminacion" />	
						</form>
						</div>
						</div>';	
}
//------ASIGN VEHICLES

?>


<?php 
if (isset($_POST['confirm_select'])){
			if (isset($_POST['checkboxvar'])){
								
								if ($_POST['checkboxvar'] != '')
								{
									if(is_array($_POST['checkboxvar']))
									{
										
										while (list($key,$value) = each ($_POST['checkboxvar']))
										{
											
											//comprobacion que no existen asignaciones
											$consulta_existencia_asignaciones = odbc_exec($conexion, "SELECT Count(*) AS counter FROM I_ASIGNACION_GEOCERCAS where id_servidor='".$value."' AND id_geocerca='".$id_geocerca."' ");
											$arr = odbc_fetch_array($consulta_existencia_asignaciones);
											echo ''.$arr['counter'].'';
											//comprobacion que no existen asignaciones
											
											if ($arr['counter']==0) {
											$sql=odbc_exec($conexion,"INSERT INTO I_ASIGNACION_GEOCERCAS (id_geocerca,id_servidor,tipo_aviso,salida_general_1,salida_general_2,estatus_vehiculo) VALUES ('".$id_geocerca."','".$value."','0','0','0','0')");
											}
										}
									}
								}
								
								echo '
								<div id="funcion_opacidad">
								<div id="contenedor_confirmacion">
								<form action="#" method="post">
								<span style="color:#999">Asignaci&oacute;n exitosa</span><br><br>
								<input name="consulta" type="hidden" value="edita_geocercas" />
								<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
								<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
								<input name="" type="submit" value="continuar" class="confirma_eliminacion" style="width:88%" />	
								</form>
								
								</div>
								</div>';
								
							}
							else {
							echo '
							<div id="funcion_opacidad">
							<div id="contenedor_confirmacion">
							<span style="color:red">No ha seleccionado veh&iacute;culos</span><br><br>
							<form action="#" method="post">
							<input name="consulta" type="hidden" value="edita_geocercas" />
							<input name="guarda_geocerca" type="hidden" value="ok" />
							<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					        <input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
							<input type="hidden" name="asignacion_vehicular" value="ok" />
							<input name="" type="submit" value="atras" class="confirma_eliminacion" style="width:90%" />	
							</form>
							</div>
							</div>
							';
							
			}
}
?>

<?php
//------NO ASIGNATION VEHICLES
if (isset($_POST['desasignar_vehiculos'])){
	 
	 $user_geocerca=$_POST['user_geocerca'];
	 $id_geocerca=$_POST['id_geocerca'];
	 $id_vehicle=$_POST['id_vehicle'];
	 
	 echo ' <div id="funcion_opacidad">
			<div id="contenedor_confirmacion">
				<span style="font-size:11px; color:#000;">Esta seguro de<br>quitar este veh&iacute;culo a esta<br>geo-cerca?</span><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input type="hidden" name="id_vehicle" value="'.$id_vehicle.'" />
						<input type="hidden" name="confirm_desasign" value="ok" />
						<input type="hidden" name="delete_confirm" value="ok" />
						<input name="" type="submit" value="si" class="confirma_eliminacion" />
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input name="" type="submit" value="no" class="confirma_eliminacion" />	
						</form>
			</div>
			</div>';	
	 
	 
}
//------NO ASIGNATION VEHICLES

?>



<?php
//------NO ASIGNATION VEHICLES CONFIRM
if (isset($_POST['delete_confirm'])){
	 
	 $user_geocerca=$_POST['user_geocerca'];
	 $id_geocerca=$_POST['id_geocerca'];
	 $id_vehicle=$_POST['id_vehicle'];
	 
	 odbc_exec($conexion, " DELETE FROM I_ASIGNACION_GEOCERCAS WHERE id_servidor=".$id_vehicle." AND id_geocerca=".$id_geocerca.";");
	 
	 	echo '
							<div id="funcion_opacidad">
							<div id="contenedor_confirmacion">
							<span style="color:red">Desasignaci&oacute;n exitosa</span><br><br>
							<form action="#" method="post">
							<input name="consulta" type="hidden" value="edita_geocercas" />
							<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
					        <input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
							<input name="" type="submit" value="continuar" class="confirma_eliminacion" style="width:90%" />	
							</form>
							</div>
							</div>
							';
	 
	 
}
//------NO ASIGNATION VEHICLES CONFIRM

?>



<?php
//------CONFIGURE VEHICLES
if (isset($_POST['configurar_vehiculos'])){
	 
	 $user_geocerca=$_POST['user_geocerca'];
	 $id_geocerca=$_POST['id_geocerca'];
	 $id_vehicle=$_POST['id_vehicle'];
	 
	 //BUSCAMOS EN ASIGNACION GEOCERCAS - TABLA
	$buscando_sus_vehiculos_guardados=odbc_exec($conexion,"SELECT * FROM I_ASIGNACION_GEOCERCAS WHERE id_servidor='".$id_vehicle."'");
	while($mis_vehiculos_asignados_guardados=odbc_fetch_object($buscando_sus_vehiculos_guardados))
						 {
							$id_servidor=$mis_vehiculos_asignados_guardados->id_servidor;
							
							$t_a=$mis_vehiculos_asignados_guardados->tipo_aviso;
							$s_g_1=$mis_vehiculos_asignados_guardados->salida_general_1;
							$s_g_2=$mis_vehiculos_asignados_guardados->salida_general_2;
							$e_v=$mis_vehiculos_asignados_guardados->estatus_vehiculo;
							
							//COTEJAMIENTOS
							if ($t_a=='0') {$tipo_aviso='ninguno';}
							if ($t_a=='1') {$tipo_aviso='al entrar a la geo-cerca';}
							if ($t_a=='2') {$tipo_aviso='al salir de la geo-cerca';}
							if ($t_a=='3') {$tipo_aviso='en ambos casos';}
							
							if ($s_g_1=='0') {$salida_general_1='ninguno';}
							if ($s_g_1=='1') {$salida_general_1='activado';}
							if ($s_g_1=='2') {$salida_general_1='desactivado';}
							
							if ($s_g_2=='0') {$salida_general_2='ninguno';}
							if ($s_g_2=='1') {$salida_general_2='activado';}
							if ($s_g_2=='2') {$salida_general_2='desactivado';}
							
							if ($e_v=='0') {$estatus_vehiculo='inactivo';}
							if ($e_v=='1') {$estatus_vehiculo='activo';}
							//COTEJAMIENTOS
						 
						    $sacando_nombre_vehiculo=odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE id='".$id_servidor."' ");
                            while ($el_nombre_vehiculo = odbc_fetch_object($sacando_nombre_vehiculo))
                            {
                            $el_vehiculo=$el_nombre_vehiculo->nombre_vehiculo; 
							
                            }; 
						 
						 
						 }
		
	 
	 echo ' <div id="funcion_opacidad">
			<div id="contenedor_confirmacion" style="margin-top:130px;">
				<span style="font-size:11px; color:#000;">Configuraci&oacute;n para<br>El tipo de Notificaciones<br>de este Veh&iacute;culo</span><br>
						<form action="#" method="post">
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input type="hidden" name="id_vehicle" value="'.$id_vehicle.'" />
						<input type="hidden" name="modifica_estatus_vehiculo_geocerca" value="ok" />
						<div style="width:auto;height:230px; overflow:auto; visibility:visible; color:#999;">
						<table width="100%" border="0" style="font-size:10px;" cellpadding="0" cellspacing="0">
							<tr height="10">
								<td align="left">
								Tipo de Aviso<br>para recibir Notificacion
								</td>
							</tr>
							<tr height="30">
								<td>
								<select name="t_a" style="width:100%">
								<option value="'.$t_a.'">'.$tipo_aviso.'</option>
								<option value="1">al entrar a la geo-cerca</option>
								<option value="2">al salir de la geo-cerca</option>
								<option value="3">en ambos casos</option>
								<option value="0">ninguno</option>
							    </select>
								</td>
							</tr>
							<tr height="10">
								<td align="left">
								Salida General 1 (extra y opcional)
								</td>
							</tr>
							<tr height="30">
								<td>
								<select name="s_g_1" style="width:100%">
								<option value="'.$s_g_1.'">'.$salida_general_1.'</option>
								<option value="1">activado</option>
								<option value="2">desactivado</option>
								<option value="0">ninguno</option>
							    </select>
								</td>
							</tr>
							<tr height="10">
								<td align="left">
								Salida General 2 (extra y opcional)
								</td>
							</tr>
							<tr height="30">
								<td>
								<select name="s_g_2" style="width:100%">
								<option value="'.$s_g_2.'">'.$salida_general_2.'</option>
								<option value="1">activado</option>
								<option value="2">desactivado</option>
								<option value="0">ninguno</option>
							    </select>
								</td>
							</tr>
							<tr height="10">
								<td align="left">
								Activar o desactivar el <br>Estatus para recibir notifricaciones
								</td>
							</tr>
							<tr height="30">
								<td>
								<select name="e_v" style="width:100%">
								<option value="'.$e_v.'">'.$estatus_vehiculo.'</option>
								<option value="0">inactivo</option>
								<option value="1">activo</option>
							    </select>
								</td>
							</tr>
						</table>
						</div><br>
						
						<input name="" type="submit" value="guardar" class="confirma_eliminacion" />
						</form>
						<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input name="" type="submit" value="cancelar" class="confirma_eliminacion" />	
						</form>
			</div>
			</div>';	
	 
	 
}
//------CONFIGURE VEHICLES

?>


<?php 
//------CONFIGURE VEHICLES CONFIRM CHANGE STATUS
				if (isset($_POST['modifica_estatus_vehiculo_geocerca'])) {
					
					$user_geocerca=$_POST['user_geocerca'];
					$id_geocerca=$_POST['id_geocerca'];
					$id_vehicle=$_POST['id_vehicle'];
						
					$t_a=$_POST['t_a']; 
					$s_g_1=$_POST['s_g_1']; 
					$s_g_2=$_POST['s_g_2']; 
					$e_v=$_POST['e_v'];
					
					
					
					$consulta = odbc_exec($conexion, "UPDATE I_ASIGNACION_GEOCERCAS SET tipo_aviso='".$t_a."', salida_general_1='".$s_g_1."', salida_general_2='".$s_g_2."', estatus_vehiculo='".$e_v."' where id_geocerca='".$id_geocerca."' AND id_servidor='".$id_vehicle."' ");
					
					echo '
					<div id="funcion_opacidad">
				      <div id="contenedor_confirmacion" style="color:#999;">
					  El sistema<br>se ha actualizado correctamente<br><br>
					  <form action="panel.php" method="post">
					    <input type="hidden" name="user_geocerca" value="'.$user_geocerca.'" />
						<input type="hidden" name="id_geocerca" value="'.$id_geocerca.'" />
						<input name="consulta" type="hidden" value="edita_geocercas" />
						<input name="" type="submit" value="aceptar" class="confirma_eliminacion" style="width:88%" />	
					  </form>
					  </div>
					  </div>
					
					
					
					';		
					
					
					
					
					
					}
//------CONFIGURE VEHICLES CONFIRM CHANGE STATUS
?>
</body>
</html>
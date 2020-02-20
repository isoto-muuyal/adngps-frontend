<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
<?php 
if (!isset($_SESSION)) {
  session_start();
  if (isset($_POST['miEmpresa']))
  $_SESSION['empresa'] = $_POST['miEmpresa']; 
  
  
  
  
}
?>

<?php 

if($_SESSION['MM_Username']!==$localFactoryUser)
{

//CONSULTAMOS EL TIPO DE USUARIO DISTRIBUIDOR O MAESTRO
$consulta_si_el_usuario_es_distribuidor=odbc_exec($conexion,"SELECT * FROM G_USUARIOS where nombre_usuario='".$_SESSION['MM_Username']."'");

//ARREY TIPO DE USUARIO 
while($usuario_disribuidor=odbc_fetch_object($consulta_si_el_usuario_es_distribuidor))
{$tipo_usuario=$usuario_disribuidor->tipo;}
$tipo_usuario;
}


if($_SESSION['MM_Username']==$localFactoryUser)
{

$tipo_usuario='Distribuidor';

}

?>

<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Reverse Geocoding</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 85%;
		width:80%;
		float:left;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	  
	  #contenedor_selecciones{width:17.8%; height:80%; background:#f8f8f8; float:right; text-align:left; padding:1%;
	  font-size:80%; border-left:solid thin #ccc;}
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        position: absolute;
        top: 23%;
        left: 0%;
        margin-left: 0px;
        width: 100%;
		height:56%;
        z-index: 5;
        background:none;
        padding: 0px;
        border: 0px solid #999;
      }
      #latlng {
        width: 100%;
	  }
	  
	  label {
 color:#fff;
}
    </style>
  </head>
  <body>
    <?php 
	    if (isset($_POST['id_vehiculo'])) {$id_vehiculo=$_POST['id_vehiculo']; 
		
				//SACAMOS SOLO EL ID;
					
					
					$nombre_vehiculo=$_POST['nombre_vehiculo']; 
					
					$filtro_vehiculo=$_POST['filtro_vehiculo'];
					
					$dia=$_POST['dia'];  
					$mes=$_POST['mes']; 
					$anio=$_POST['anio']; 
					
					//FUNCION PARA TODO EL DIA DE RECORRIDO
					if($_POST['rango']!=='Todo el dia') { 
					$rango=$_POST['rango']; 
					}
					if($_POST['rango']=='Todo el dia') { 
					$rango='00:00 - 23:59'; 
					}
					//FUNCION PARA TODO EL DIA DE RECORRIDO
					
					
					//explotamos los Rangos SEPARAMOS INICIO Y TERMINO DEL RANGO DE HORAS
					$separcionrango1=$rango;
					$el_inicio = explode (" - ", $separcionrango1 );
					$el_temino = explode (" - ", $separcionrango1 );
					$nuestro_inicio=$el_inicio[0];
					$nuestro_temino=$el_temino[1];
					
					
					$cadena_fecha_inicio=$anio.'-'.$mes.'-'.$dia.' '.$nuestro_inicio.':00';
					$cadena_fecha_temno=$anio.'-'.$mes.'-'.$dia.' '.$nuestro_temino.':00';
					//Cierre de explotamos los Rangos
		
		}
		
		
		
		
		
		
		if (isset($_POST['latlng'])) $latlng=$_POST['latlng']; 
		if (isset($_POST['lat'])) $lat=$_POST['lat']; 
		if (isset($_POST['lng'])) $lng=$_POST['lng']; 
		
	$consulta=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$id_vehiculo."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor DESC ");
	
	
	
	echo '
					
					<form action="panel.php" method="post">
					<table width="100%" align="center" border="0" bgcolor="#f1f1f1" cellpadding="0" cellspacing="0" style="padding-top:0.5%; padding-bottom:0.5%; font-size:75%; font-weight:bold; margin-top:-30px; border-bottom:solid thin #ccc;">
						
						<tr>
						<td width="23%">&nbsp;</td>
						
						<td align="center" valign="middle">Veh&iacute;culo:</td>
						<td align="center" valign="middle">D&iacute;a:</td>
						<td align="center" valign="middle">Mes:</td>
						<td align="center" valign="middle">A&ntilde;o:</td>
						<td align="center" valign="middle">Rango Hrs.:</td>
						<td align="center" valign="middle">&nbsp;</td>
						<td align="center" valign="middle">&nbsp;</td>
						
						<td width="23%">&nbsp;</td>
						
						
						</tr>
						<tr>
						    <td>&nbsp;</td>
							
							<td align="center" valign="bottom">
							    
					<select name="filtro_vehiculo" class="campos_p_recorrido_filtro" style="width:80%;">
								
					<option>'.$filtro_vehiculo.'</option>';
									
									
									
					if ($tipo_usuario=='Distribuidor'){
						
$sacando_nombre_empresa=odbc_exec($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
					
					while ($la_empresa=odbc_fetch_object($sacando_nombre_empresa))
					{
						 $empresa_ok=$la_empresa->nombre_empresa;
						 
						 $buscando_los_vehiculos=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_empresa='".$la_empresa->nombre_empresa."'");
					while ($vehiculos = odbc_fetch_object($buscando_los_vehiculos))
					{
					$vehiculo=$vehiculos->nombre_vehiculo; 
					$id_servidor=$vehiculos->id; 
					
					echo '<option>'.$vehiculo.'-'.$id_servidor.'</option>';
					}
						
					}
					
	
					}
					
					
					
					if ($tipo_usuario=='Maestra'){
					
					$buscando_los_vehiculos=odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
					while ($vehiculos = odbc_fetch_object($buscando_los_vehiculos))
					{
					$vehiculo=$vehiculos->nombre_vehiculo; 
					$id_servidor=$vehiculos->id; 
					
					echo '<option>'.$vehiculo.'-'.$id_servidor.'</option>';
					}
					}
					
					if ($tipo_usuario=='Normal'){
					
					$buscando_los_vehiculos=odbc_exec ($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
					while ($vehiculos = odbc_fetch_object($buscando_los_vehiculos))
					{
					$vehiculo=$vehiculos->nombre_vehiculo; 
					$id_servidor=$vehiculos->id; 
					
					echo '<option>'.$vehiculo.'-'.$id_servidor.'</option>';
					}
					}
					
					echo'</select>
									
                                 
								
							</td>
							<td align="center" valign="bottom">
							 
							 <select name="dia" class="campos_p_recorrido_filtro">
							 <option>'.$dia.'</option>				
							 <option>01</option>
							 <option>02</option>
							 <option>03</option>
							 <option>04</option>
							 <option>05</option>
							 <option>06</option>
							 <option>07</option>
							 <option>08</option>
							 <option>09</option>
							 <option>10</option>
							 <option>11</option>
							 <option>12</option>
							 <option>13</option>
							 <option>14</option>
							 <option>15</option>
							 <option>16</option>
							 <option>17</option>
							 <option>18</option>
							 <option>19</option>
							 <option>20</option>
							 <option>21</option>
							 <option>22</option>
							 <option>23</option>
							 <option>24</option>
							 <option>25</option>
							 <option>26</option>
							 <option>27</option>
							 <option>28</option>
							 <option>29</option>
							 <option>30</option>
							 <option>31</option>
													
							</select>
							</td>
							
							<td align="center" valign="bottom">
							 
							 <select name="mes" class="campos_p_recorrido_filtro">
							 <option>'.$mes.'</option>				
							 <option>01</option>
							 <option>02</option>
							 <option>03</option>
							 <option>04</option>
							 <option>05</option>
							 <option>06</option>
							 <option>07</option>
							 <option>08</option>
							 <option>09</option>
							 <option>10</option>
							 <option>11</option>
							 <option>12</option>
													
							</select>
							</td>
							
							<td align="center" valign="bottom">
							
						    <select name="anio" class="campos_p_recorrido_filtro">
										
						    <option>'.$anio.'</option>
						    <option>2017</option>
							<option>2018</option>
												
						    </select>
							</td>
							
							<td align="center" valign="bottom">
							
							 <select name="rango" class="campos_p_recorrido_filtro" style="width:90%;">
							 
							 <option>'.$rango.'</option>				
							 <option>00:00 - 02:59</option>
							 <option>03:00 - 05:59</option>
							 <option>06:00 - 08:59</option>
							 <option>09:00 - 11:59</option>
							 <option>12:00 - 14:59</option>
							 <option>15:00 - 17:59</option>
							 <option>18:00 - 20:59</option>
							 <option>21:00 - 23:59</option>
							 <option>Todo el dia</option>
													
							</select>
							</td>
							
							
							<td align="center" valign="middle">
							<input name="consulta" type="hidden" value="mirecorridoenmapa" />
                        
                            <input name="" type="submit" value="Filtrar" style="background:#166abf; color:#fff; padding-top:9px; padding-bottom:9px; border:none; cursor:pointer;"/>
							</td>
							<td>&nbsp;</td>
							
							<td>&nbsp;</td>
							
							
						</tr>
					</table>
					</form>';
	
	
	
	
	
	
	echo '
	<div id="contenedor_selecciones">
	<img src="img/iconos/cari.png" /><br><h3 style="margin:0; margin-top:5px; color:#006699; background:#e2e2e2; text-align:center; font-size:14px;">'.$nombre_vehiculo.'</h3><br>
	Direcciones relativas<br>
	D&iacute;a de recorrido : '.$dia.' - '.$mes.' - '.$anio.'<br>
	<br>
	Horario: '.$rango.'<br><br>
	
	<form action="" method="" style="background:#e2e2e2; padding:3%; text-align:center; width:94%;">
	
	   <span style="color:#166abf;">Seleccione el puntos<br>del recorrido para mostrar<br>direcciones relativas</span><br><br>
	   <select name="" id="latlng" style="padding-left:2%; padding-top:4%; padding-bottom:4%;cursor:pointer;">';
	
	while ($Posicion_direccion=odbc_fetch_object($consulta))
	{
		
		
		if($Posicion_direccion->EVT_ID=='1') {$estado='Apagado';}
		if($Posicion_direccion->EVT_ID=='2') {$estado='Encendido';}
		if($Posicion_direccion->EVT_ID=='4') {$estado='Encendido';}
		if($Posicion_direccion->EVT_ID=='5') {$estado='Encendido';}
		echo '<option value="'.$Posicion_direccion->LAT.','.$Posicion_direccion->LON.'">'.$Posicion_direccion->hora_servidor.' - '.$estado.'</option>';
	}
		
		echo '
		
				
				
			</select>
			
			<br><br>
			<input id="submit" type="button" value="Mostrar Direcci&oacute;n" style="padding-top:5%; padding-bottom:5%; background:#166abf; color:#fff; border:solid thin #166abf; width:100%; margin-top:5px; margin-bottom:10px; cursor:pointer;">
			
		</form>
		
		
		</div>';
	  
	?>
    
    <div id="map"></div>
	
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>}
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

          document.getElementById('submit').addEventListener('click', function() {
          geocodeLatLng(geocoder, map, infowindow);
          });
		  
		  var limits = new google.maps.LatLngBounds();
	  
	  <?php 
	  //CONSULTAMOS TODAS LAS POSICIONES DE LOS VEHICULOS PARA LA POLILINEA
$consulta=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$id_vehiculo."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor ASC ");
	
	
	echo 'var flightPlanCoordinates = [';
	
	//ARREY PARA LA POLILINEA
    while ($datos=odbc_fetch_object($consulta)) 
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
				
				if ($evento==1) {$resultado_evento='Vehiculo apagado'; $icono='img/iconos/ico_recorrido.png';};
				if ($evento==2) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/ico_recorrido.png';};
				if ($evento==4) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/ico_recorrido.png';};
				if ($evento==5) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/ico_recorrido.png';};
				
				$velocidad_real=round ($velocidad);
				echo'{lat: '.$lat.', lng: '.$lng.'},';

	               };
				 }
	
				}



	  
	  ?>
	  
	  ];
	  
 var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#a70000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  flightPath.setMap(map);
  
  for(var i in flightPlanCoordinates){
        var marker = new google.maps.Polyline({
            position: flightPlanCoordinates[i]
            , map: map
            , title: i
           
        });
 
        limits.extend(flightPlanCoordinates[i]);
    }
    map.fitBounds(limits);
	
	<?php 
	//CONSULTA EL DESTINO DEL RECORRIDO
	$consulta_ultima_posicion_para_marcador=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$id_vehiculo."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor ASC ");
	
	//ARREY ICONO E INFO VENTANA DE INFORMACION AL POSICIONAR PUNTERO ENCIMA DEL ICONO
	while ($mi_ultima_Posicion_marcador=odbc_fetch_object($consulta_ultima_posicion_para_marcador))
	{
		$elodometrodestino=$mi_ultima_Posicion_marcador->DIST;
		$eltimerdestino=$mi_ultima_Posicion_marcador->TIME;
		
		$latitud_ultima=$mi_ultima_Posicion_marcador->LAT;
		$longitud_ultima=$mi_ultima_Posicion_marcador->LON;
		$nombre_vehiculo_ultimo=$mi_ultima_Posicion_marcador->nombre_vehiculo;
		$id_vehiculo_ultimo=$mi_ultima_Posicion_marcador->id_servidor;
		$fecha_ultimo=$mi_ultima_Posicion_marcador->hora_servidor;
		$estado_vehiculo=$mi_ultima_Posicion_marcador->EVT_ID;
		
		if ($estado_vehiculo==1) {$resultado_evento='Vehiculo apagado'; $icono='img/iconos/red_car.png';};
		if ($estado_vehiculo==2) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/gree_car.png';};
		if ($estado_vehiculo==4) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/gree_car.png';};
		if ($estado_vehiculo==5) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/gree_car.png';};
		}
	?>
	
	var img = new google.maps.MarkerImage("<?php echo $icono ?>");
    var myLatLng = {lat: <?php echo $latitud_ultima ?>, lng: <?php echo $longitud_ultima ?>};
	var marker = new google.maps.Marker({
     position: myLatLng,
     map: map,
     title: 'DESTINO\n<?php echo $fecha_ultimo.'\n' ?>Nombre del Vehículo : <?php echo $nombre_vehiculo_ultimo.'\n' ?>Estado del Vehículo : <?php echo $resultado_evento.'\n'?>ID del Vehículo: <?php echo $id_vehiculo_ultimo ?>',
     icon: img,
     label : "B"
	 
     
    
    });
	
	<?php 
	//CONSULTA EL ORIGEN DEL RECORRIDO
	$consulta_ultima_posicion_para_marcador=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$id_vehiculo."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor DESC ");
	
	//ARREY ICONO E INFO VENTANA DE INFORMACION AL POSICIONAR PUNTERO ENCIMA DEL ICONO
	while ($mi_ultima_Posicion_marcador=odbc_fetch_object($consulta_ultima_posicion_para_marcador))
	{
		$elodometroorigen=$mi_ultima_Posicion_marcador->DIST;
		$eltimerorigen=$mi_ultima_Posicion_marcador->TIME;
		
		$latitud_ultima=$mi_ultima_Posicion_marcador->LAT;
		$longitud_ultima=$mi_ultima_Posicion_marcador->LON;
		$nombre_vehiculo_ultimo=$mi_ultima_Posicion_marcador->nombre_vehiculo;
		$id_vehiculo_ultimo=$mi_ultima_Posicion_marcador->id_servidor;
		$fecha_ultimo=$mi_ultima_Posicion_marcador->hora_servidor;
		$estado_vehiculo=$mi_ultima_Posicion_marcador->EVT_ID;
		
		if ($estado_vehiculo==1) {$resultado_evento='Vehiculo apagado'; $icono='img/iconos/red_car.png';};
		if ($estado_vehiculo==2) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/gree_car.png';};
		if ($estado_vehiculo==4) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/gree_car.png';};
		if ($estado_vehiculo==5) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/gree_car.png';};
		}
	?>
	
	var img = new google.maps.MarkerImage("<?php echo $icono ?>");
    var myLatLng = {lat: <?php echo $latitud_ultima ?>, lng: <?php echo $longitud_ultima ?>};
	var marker = new google.maps.Marker({
     position: myLatLng,
     map: map,
     title: 'ORIGEN\n<?php echo $fecha_ultimo.'\n' ?>Nombre del Vehículo : <?php echo $nombre_vehiculo_ultimo.'\n' ?>Estado del Vehículo : <?php echo $resultado_evento.'\n'?>ID del Vehículo: <?php echo $id_vehiculo_ultimo ?>',
     icon: img,
     label : "A"
     
    
    });
     
	}
	  
	  

      function geocodeLatLng(geocoder, map, infowindow) {
        var input = document.getElementById('latlng').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              map.setZoom(16);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map,
				icon: 'img/iconos/car_map.png'
              });
              infowindow.setContent(results[1].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $K; ?>&callback=initMap">
    </script>
     <div style="position:absolute; background:#000; font-size:10px; bottom:10px; left:5px; z-index:300;
	padding-top:10px; padding-bottom:10px; padding-left:10px; padding-right:10px; color:#666; -webkit-border-radius:5px;border-radius:5px;">
                    
                    <h3 style="margin:0; color:#fff;"><?php echo $nombre_vehiculo ?></h3>
                    Distancia de este recorrido:
					<?php 
					$distancia=$elodometrodestino-$elodometroorigen; echo '<span style="color:#88b8f4">'.$distancia/1000; echo ' Kms<br></span>';
					?>
                    <?php 
					$consulta_vel=odbc_exec($conexion,"SELECT TOP 1 * FROM ZLECTURAS WHERE id_servidor='".$id_vehiculo."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY SPD DESC ");
	
	
	
	
	//ARREY PARA LA MAS ALTA VELOCIDAD
    while ($datosvel=odbc_fetch_object($consulta_vel)) 
				{
					
					$velocidad=$datosvel->SPD;
				    echo 'Velocidad m&aacute;xima alcanzada en este recorrido: <span style="color:#88b8f4;">'.$velocidad_real=round ($velocidad).' Kms/hr.<br></span>';
					
				}
			
					
					?>
                    
                   
                    
                    
     </div>
  </body>
</html>






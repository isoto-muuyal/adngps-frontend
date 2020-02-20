<?php //header ("refresh:60; url=panel.php");

if (isset($_POST['miEmpresa'])) {$miEmpresa=$_POST['miEmpresa'];}

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
      }
      #map_canvas {
        height: 100%;
      }
	  
	  
    </style>
</head>

<body onLoad="initialize()">
<?php 
include ('conexion.php');

//ABRIMOS FUNCION JAVASCRIPT MAP API GOOGLE
echo'<script type="text/javascript">

var sites = [';

//CONSULTAMOS EL NUMERO DE VEHICULOS DE CADA EMPRESA CON LA CONSICION DE QUE ESTEN ACTIVOS 
$consulta2=odbc_exec($conexion,"SELECT DISTINCT id_servidor from ZLECTURAS WHERE usuario='".$miEmpresa."'");


//echo 'numero de gps:'.$num_equpos.'<br><br>';

while ($los_ids=odbc_fetch_object($consulta2))
{
	 $los_ids->id_servidor;
	
	$consulta_datos=odbc_exec($conexion,"SELECT TOP 1 * FROM ZLECTURAS WHERE id_servidor = '".$los_ids->id_servidor."' ORDER BY id DESC");
	
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
				if ($evento==4) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
				if ($evento==5) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
				
				$velocidad_real=round ($velocidad);
				echo'["Vehículo : '.$nombre_vehiculo.' ;\nUltima posición : '.$ultima_posicion.' ; \n'.$resultado_evento.'; \nBateria : '.$bateria.'; \nVelocidad : '.$velocidad_real.'", '.$lat.', '.$lng.',"'.$icono.'","'.$id_servidor.'"],';

	};
				 }
	
				}
	
	
	}











?>
];


var infowindow = null;
	
function initialize() {
	var centerMap = new google.maps.LatLng(45.3517923, 6.3101660);
	var myOptions = {
		zoom: 10	,
		center: centerMap,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	
	setZoom(map, sites);
	setMarkers(map, sites);		
	
	
	infowindow = new google.maps.InfoWindow({
		content: "Loading..."
	});
}
/*
This functions sets the markers (array)
*/
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
/*
Set the zoom to fit comfortably all the markers in the map
*/
function setZoom(map, markers) {
	var boundbox = new google.maps.LatLngBounds();
	for ( var i = 0; i < markers.length; i++ )
	{
	  boundbox.extend(new google.maps.LatLng(markers[i][1], markers[i][2]));
	}
	map.setCenter(boundbox.getCenter());
	map.fitBounds(boundbox);
	
}
</script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo $K; ?>&callback=initMap">
    </script>
  <div id="map_canvas"></div>
  
  <!--INCLUDE MENU SECTION PRINCIPAL MAP-->
  <?php include ('CBTFILTERON.php')?>
  <!--INCLUDE MENU SECTION PRINCIPAL MAP-->
</body>
</html>
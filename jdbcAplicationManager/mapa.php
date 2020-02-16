<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Vista de Recorrido MAPA</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 104%;
		width:72.7%;
		float:left;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	  
	  #contenedor_selecciones{width:25%; height:80%; background:#f8f8f8; float:right; text-align:left; padding:1%;
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
	 if (isset($_POST['cadenaEntrante'])) {
			
			if (!empty($_POST['cadenaEntrante']))
			{
			
			
			$cadenaEntrante=$_POST['cadenaEntrante'];
			$cadena = $cadenaEntrante;
			$array = explode("\n", $cadena);
			$longitud = count($array);
			
			for($i=0; $i<1; $i++)
			  {
			    $cadenaRecibidaSacarVehiculo  = $array[$i];
				$datosCadenaNombreVehiculo = explode(",", $cadenaRecibidaSacarVehiculo);
				$validando = count($datosCadenaNombreVehiculo);
				if ($validando!=9) {header('Location:index.php');}
			  }
		    
			}
			
			else {header('Location:index.php');}
		
		
		}else {header('Location:index.php');}
		
		    
	?>
	 
	<div id="contenedor_selecciones">
	
	<img src="cari.png" /><br>
	<?php 
	for($i=0; $i<1; $i++)
			  {
			    
			    $cadenaRecibidaSacarVehiculo  = $array[$i];
				$datosCadenaNombreVehiculo = explode(",", $cadenaRecibidaSacarVehiculo);
				$NombredelVehiculo = $datosCadenaNombreVehiculo[0];
				$DiaRevision = $datosCadenaNombreVehiculo[1];
				
				
				
				
				echo '<h3 style="margin:0; margin-top:5px; color:#006699; background:#e2e2e2; text-align:center; font-size:14px;">'.$NombredelVehiculo.'</h3><br>';
				echo 'Direcciones relativas<br><br>';
				echo'Fecha de inicio de este recorrido:<br> '.$DiaRevision.'<br><br>';
			  }
			  
			  
			   $laultimalecturaSacaFecha = $array;
		       $ultima_posicion_Fecha_array = array_pop( $laultimalecturaSacaFecha );
		       $datosCadenaUltimaLecturaFecha = explode(",", $ultima_posicion_Fecha_array);
			   $FechaUltimaLectura = $datosCadenaUltimaLecturaFecha[1];
			  
			   echo'Fecha del termino de este recorrido:<br> '.$FechaUltimaLectura.'<br><br>';
	?>
	
	
	
	<br>
	
	
	<form action="" method="" style="background:#f1f1f1; padding:3%; text-align:center; width:94%;">
	
	   <span style="color:#166abf;">Seleccione el puntos<br>del recorrido para mostrar<br>direcciones relativas</span><br><br>
	   <select name="" id="latlng" style="background-color:#FFF;padding-left:2%; padding-top:4%; padding-bottom:4%;cursor:pointer; font-size:10px; color:#777">
	   <?php 
		
			//Recorro todos los elementos PARA EL SELECT
			for($i=0; $i<$longitud; $i++)
			  {
			  //saco el valor de cada elemento
			    $cadenaRecibida  = $array[$i];
				$datosCadena = explode(",", $cadenaRecibida);
				$posicionContinuaSelect = $datosCadena[4].",".$datosCadena[5];
				$hora = $datosCadena[1];
				$estatus = $datosCadena[2];
				echo '<option value="'.$posicionContinuaSelect.'">'.$hora.' - '.$estatus.'</option>';
			  
			}
	    ?>
		
	    </select>
	    <br><br>
	    <input id="submit" type="button" value="Mostrar Direcci&oacute;n" style="text-decoration:underline;padding-top:5%; padding-bottom:5%; color:#006699; width:100%; margin-top:5px; margin-bottom:10px; cursor:pointer;">
	</form>
	<br><br>
    
	<form action="index.php" method="post" style="background:#f1f1f1; padding:3%; text-align:center; width:94%;">
	
	   <span style="color:#999;">Click para salir y<br>generar una nueva consulta</span><br>
	   <input type="submit" value="generar nueva consulta" style="padding-top:5%; padding-bottom:5%;  color:red;  width:100%; margin-top:10px; margin-bottom:10px; cursor:pointer;">
	</form>	
		
	</div>
    
    <div id="map"></div>
	
    <script>
	
	function initMap() {
	
	
	var canterMap = {lat: 20.6769234, lng: -103.3427726}; 
		
	var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
		  center: canterMap
    });
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;

    document.getElementById('submit').addEventListener('click', function() {
          geocodeLatLng(geocoder, map, infowindow);
    });
		 
	var limits = new google.maps.LatLngBounds();
	
	var flightPlanCoordinates = [
		  
	<?php 
		
			//Recorro todos los elementos
			for($i=0; $i<$longitud; $i++)
			  {
			  //saco el valor de cada elemento
			    $cadenaRecibida  = $array[$i];
				$datosCadena = explode(",", $cadenaRecibida);
				$posicionContinua = "{lat: ".$datosCadena[4].", lng: ".$datosCadena[5]."},";
				echo $posicionContinua;
			  
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
	
	
	 //ICONO INICIO DEL RECORRIDO
	 var img = new google.maps.MarkerImage("gree_car.png");
     
	 var myLatLng = <?php 
	 //Saco el valor de la primer lectura para el icono verde del punto de partida del recorrido
			for($i=0; $i<1; $i++)
			  {
			    
			    $cadenaRecibidaPrimerLectura  = $array[$i];
				$datosCadenaPrimerLectura = explode(",", $cadenaRecibidaPrimerLectura);
				$posicionContinuaPrimerLectura = "{lat: ".$datosCadenaPrimerLectura[4].", lng: ".$datosCadenaPrimerLectura[5]."}";
				echo $posicionContinuaPrimerLectura;
			  }
	 ?>;
	 var marker = new google.maps.Marker({
     position: myLatLng,
     map: map,
     title: 'Inicio del recorrido',
     icon: img,
     label : "A"
	 });
	 //CERRAMOS ICONO INICIO DEL RECORRIDO
	 
	 
	 //ICONO FIN DEL RECORRIDO
	 var img = new google.maps.MarkerImage("gree_car.png");
     
	 var myLatLng = <?php 
	 //saco el valor de la ultima lectura
	        $laultimalectura = $array;
		    $ultima_posicion_array = array_pop( $laultimalectura );
		    $datosCadenaUltimaLectura = explode(",", $ultima_posicion_array);
			$posicionContinuaUltimaLectura = "{lat: ".$datosCadenaUltimaLectura[4].", lng: ".$datosCadenaUltimaLectura[5]."}";
			echo $posicionContinuaUltimaLectura;
	 ?>;
	 var marker = new google.maps.Marker({
     position: myLatLng,
     map: map,
     title: 'Termino del recorrido',
     icon: img,
     label : "B"
	 });
	 //ICONO FIN DEL RECORRIDO
	
     
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ-u97p-COsfb_Rzm-GL5UasgEOB-ABkk&callback=initMap">
    </script>
    
	
	
	
  </body>
</html>
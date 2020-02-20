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
<!DOCTYPE html>
<html>
  <head>
    <title>AVL Mexico</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0; 
		background:#f1f1f1;
      }
      #map_canvas {
        height: 75%;
      }
	  
	  
    </style>
    <link href="css/panel.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js"></script>
	<script src="js/js_funcion_abre_opciones_recorrido.js"></script>
  <script>
	function enviaformulario2(){
		win = window.open("mapaEmmpresas.php","myWin", "width=1300, height=750, scrollbars=NO");
		document.miformu2.target='myWin';
		document.miformu2.submit();
		
		}
    </script>

  </head>
 
 


<body onLoad="initialize()">

<?php 
 
 
 if (isset($_POST['filtro_vehiculo'])) 
 
 {$filtro_vehiculo=$_POST['filtro_vehiculo'];
 
 					
					//SACAMOS SOLO EL ID;
					$separcion=$filtro_vehiculo;
					$solo_id = explode ("-", $separcion );
					$nuestro_id=$solo_id[1];
					
					
					
					
					
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
					
					
					//echo $cadena_fecha_inicio.'<br>'.$cadena_fecha_temno;
					
					echo '
					<div id="btn_open_options_travel_filter">Opciones del Recorrido</div>
					<div id="muestra_opciones_filtro_recorrido_movil">
					<form action="panel.php" method="post">
					
					<table width="90%" align="center" border="0" style="font-size:80%;">
						<tr>
							<td width="100%" colspan="3" align="center">
							Veh&iacute;culo:
							<select name="filtro_vehiculo" class="campos_p_recorrido_filtro" style="width:100%;">
								
							<option>'.$filtro_vehiculo.'</option>';
									
									
									
							if ($tipo_usuario=='Distribuidor'){
						
							$query_id_vehicle=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
					
							while ($vehiculos=odbc_fetch_object($query_id_vehicle))
								{
						 
								$vehiculo=$vehiculos->nombre_vehiculo; 
								$id_servidor=$vehiculos->id; 
					
								echo '<option>'.$vehiculo.'-'.$id_servidor.'</option>';
					
						
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
					
					
					
					echo'</select>
							</td>
							
						</tr>
						<tr>
							<td width="33%" align="center">
							D&iacute;a:
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
							<td width="33%" align="center">Mes
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
							<td width="33%" align="center">A&ntilde;o:
							<select name="anio" class="campos_p_recorrido_filtro">
										
						    <option>'.$anio.'</option>
						    <option>2017</option>
							<option>2018</option>
												
						    </select>
							</td>
						</tr>
						
						<tr>
						
						<td width="100%" colspan="3" align="center">
							Rango del Recorrido:
							<select name="rango" class="campos_p_recorrido_filtro" style="width:100%;">
							 
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
						
						</tr>
						
						<tr>
						
						<td width="33%" align="center">
						        <div id="cerrar_opciones_recorrido">CANCELAR</div>
								
						</td>
						<td width="33%" align="center">
							<input name="consulta" type="hidden" value="mirecorridoenmapa" />
							<input name="" type="submit" value="Filtrar" style="background:#166abf; color:#fff; padding-top:9px; padding-bottom:9px; border:none; cursor:pointer;"/>
						</td>
						<td width="33%" align="center">
								<a href="#seguimiento" style="color:#fff;">Ver Historial</a>
						</td>
						
						</tr>
						
						
						
					</table>
					
					
					</form>
					
					</div>
					
					
					';
 
 }


include ('conexion.php');



//ABRIMOS FUNCION JAVASCRIPT MAP API GOOGLE
echo'<script type="text/javascript">

function initMap() {
  var map = new google.maps.Map(document.getElementById("map_canvas"), {
    zoom: 20,
    center: {lat: +28.732830, lng: -106.146441},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  var limits = new google.maps.LatLngBounds();';

	//CONSULTAMOS TODAS LAS POSICIONES DE LOS VEHICULOS PARA LA POLILINEA
$consulta=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$nuestro_id."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor ASC ");
	
	
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
	 
	 if (!isset($_POST['unico']))
	 {
	
	//CONSULTAMOS TODAS LA ULTIMA POSICION PARA EL ICONO
	$consulta_ultima_posicion_para_marcador=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$nuestro_id."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor ASC ");
	
	//ARREY ICONO E INFO VENTANA DE INFORMACION AL POSICIONAR PUNTERO ENCIMA DEL ICONO
	while ($mi_ultima_Posicion_marcador=odbc_fetch_object($consulta_ultima_posicion_para_marcador))
	{
		$latitud_ultima=$mi_ultima_Posicion_marcador->LAT;
		$longitud_ultima=$mi_ultima_Posicion_marcador->LON;
		$nombre_vehiculo_ultimo=$mi_ultima_Posicion_marcador->nombre_vehiculo;
		$id_vehiculo_ultimo=$mi_ultima_Posicion_marcador->id_servidor;
		$fecha_ultimo=$mi_ultima_Posicion_marcador->hora_servidor;
		$estado_vehiculo=$mi_ultima_Posicion_marcador->EVT_ID;
		
		if ($estado_vehiculo==1) {$resultado_evento='Vehiculo apagado'; $icono='img/iconos/icon_rojo.png';};
		if ($estado_vehiculo==2) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
		if ($estado_vehiculo==4) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
		if ($estado_vehiculo==5) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
		
		
		
		}
	
	 }
	 
	 
	 
	 //ACTIVAMOS FUNCION PARA UNICA UBICACION PARA EL ICONO---------------------------
	 
	 else {
		 
		if (isset($_POST['unico']))
		{
		 
		 $rango_unico_recibido=$_POST['rango_unico'];
		 
		 			
		 
		 
		 
	//CONSULTAMOS TODAS LA ULTIMA POSICION PARA EL ICONO
	
	$consulta_ultima_posicion_para_marcadorunico=odbc_exec($conexion,"SELECT * FROM ZLECTURAS WHERE id_servidor='".$nuestro_id."' AND hora_servidor BETWEEN '".$rango_unico_recibido."' AND '".$rango_unico_recibido."' ORDER BY hora_servidor ASC ");
	
	//ARREY ICONO E INFO VENTANA DE INFORMACION AL POSICIONAR PUNTERO ENCIMA DEL ICONO
	while ($mi_ultima_Posicion_marcador=odbc_fetch_object($consulta_ultima_posicion_para_marcadorunico))
	{
		$latitud_ultima=$mi_ultima_Posicion_marcador->LAT;
		$longitud_ultima=$mi_ultima_Posicion_marcador->LON;
		$nombre_vehiculo_ultimo=$mi_ultima_Posicion_marcador->nombre_vehiculo;
		$id_vehiculo_ultimo=$mi_ultima_Posicion_marcador->id_servidor;
		$fecha_ultimo=$mi_ultima_Posicion_marcador->hora_servidor;
		$estado_vehiculo=$mi_ultima_Posicion_marcador->EVT_ID;
		
		if ($estado_vehiculo==1) {$resultado_evento='Vehiculo apagado'; $icono='img/iconos/icon_rojo.png';};
		if ($estado_vehiculo==2) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
		if ($estado_vehiculo==4) {$resultado_evento='Vehiculo encendido'; $icono='img/iconos/icon_verde.png';};
		if ($estado_vehiculo==5) {$resultado_evento='Giro'; $icono='img/iconos/icon_verde.png';};
		
	    }
		
		} 
		 
		 
		}
		
		//ACTIVAMOS FUNCION PARA UNICA UBICACION PARA EL ICONO---------------------------
	
	?>
    var img = new google.maps.MarkerImage("<?php echo $icono ?>");
    var myLatLng = {lat: <?php echo $latitud_ultima ?>, lng: <?php echo $longitud_ultima ?>};
	var marker = new google.maps.Marker({
     position: myLatLng,
     map: map,
     title: 'ULTIMA POSICIÓN\n<?php echo $fecha_ultimo.'\n' ?>Nombre del Vehículo : <?php echo $nombre_vehiculo_ultimo.'\n' ?>Estado del Vehículo : <?php echo $resultado_evento.'\n'?>ID del Vehículo: <?php echo $id_vehiculo_ultimo ?>',
     icon: img,
     label : "<?php echo $id_vehiculo_ultimo ?>"
     
    
    });
	
	
		

	
	
}

</script>
<!--//CERRAMOS FUNCION JAVASCRIPT MAP API GOOGLE-->

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo $K; ?>&callback=initMap">
    </script>
  <div id="map_canvas"></div>
  











<?php 
include ('conexion.php');

if (isset($_POST['filtro_vehiculo'])) {
 
 {$filtro_vehiculo=$_POST['filtro_vehiculo'];}

//CONSULTA A LA TABLA  LECTURAS
$cont=0; 

$consulta2=odbc_exec($conexion,"SELECT top 20 * FROM ZLECTURAS WHERE id_servidor='".$nuestro_id."' AND hora_servidor BETWEEN '".$cadena_fecha_inicio."' AND '".$cadena_fecha_temno."' ORDER BY hora_servidor DESC  ");

if (isset($lat)) 
if (isset($lng)) 
echo '
<div style="width:100%; height:auto; text-align:center; background:#0b90e5; padding-top:1%; padding-bottom:0.7%; margin:0; color:#fff; overflow:hidden;" id="seguimiento">
<h4 style="float:left; margin:0; margin-left:10%;">Historial del veh&iacute;culo : "'.$filtro_vehiculo.'"</h4>

				
</div>
';
if (isset($lat)) 
if (isset($lng)) 
echo '
		<table width="90%" border="1" bordercolor="fff" cellpadding="5" cellspacing="5" align="center"  style="font-size:60%;">
			  <tr style="color:#0b90e5; font-weight:bold;">
			    
				<td>&nbsp;</td>
				<td>ESTATUS</td>
				<td>VELOCIDAD</td>
				
				<td>ULTIMA POSICI&Oacute;N</td>
				
			  </tr>

';
	
//CREAMOS EL ARRAY QUE DEVUELVA POSICIONES DE VEHICULOS PARA IMPRIMIRLOS EN MAPA
while ($datos=odbc_fetch_object($consulta2)) 
				{
				$cont++; 
				$id_servidor=$datos->id_servidor;
				$lat=$datos->LAT; 
				$lng=$datos->LON; 
				$velocidad=$datos->SPD;
				$odometro=$datos->DIST; 
				$nombre_vehiculo=$datos->nombre_vehiculo; 
				$ultima_posicion=$datos->hora_servidor;
				$evento=$datos->EVT_ID;
				$bateria=$datos->PWR_VOLT;
				
				
				$velocidad_real=round ($velocidad);
				$odometro_real=$odometro/1000;
				$odometro_sin_centecimas=round ($odometro_real);
				
			echo '
			<tr>
			    <td>'.$cont.'</td>
				
				<td>';
				 if ($evento==1) {echo '<span style="color:red;">apagado</span>';}
			     if ($evento==2) {echo '<span style="color:#4b6400;">encendido</span>';}
				 if ($evento==4) {echo '<span style="color:#4b6400;">encendido</span>';}
				 if ($evento==5) {echo '<span style="color:#4b6400;">Giro</span>';}
				echo '</td>
				<td>'.$velocidad_real.' Km/hr;</td>
				

				
				
				
				
						
				
						
				
				
				
				
				
				<td>'.$ultima_posicion.'</td>

				
			 
			 
			 
			 </tr>';   
			   
			  
			   
			   
			    
				
				} echo '</table>';
				
				
}
//CERRAMOS CONSULTA A LA TABLA LECTURAS
				
				
			
				

?>
 





</body>
</html>






﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>


</head>

<body>
<div id="CBTI_container">
 
<?php 
include ('conexion.php');

//CONSULTA A LA TABLA LECTURAS
$consulta2=odbc_exec($conexion,"SELECT DISTINCT id_servidor from ZLECTURAS WHERE usuario='".$_SESSION['MM_Username']."' ORDER BY id_servidor");


//echo 'numero de gps:'.$num_equpos.'<br><br>';

echo '<h4 style="text-align:center; background:#0b90e5; padding-top:3%; padding-bottom:3%; margin:0;">Mis Veh&iacute;culos</h4>';

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
				
				
				echo '
				
				<div class="menujq">
                <ul>
                <li><a href="javascript:void();" class="a">'.$id_servidor.' - '.$nombre_vehiculo.' - ';   
			   
			   		if ($evento==1) {echo '<span style="color:red;">vehiculo apagado</span>';}
			   		if ($evento==2) {echo '<span style="color:#53ba00;">vehiculo encendido</span>';}
					if ($evento==4) {echo '<span style="color:#53ba00;">vehiculo encendido</span>';}
					if ($evento==5) {echo '<span style="color:#53ba00;">vehiculo encendido con Giro</span>';}
			   
			   
			   echo' </a>
                  <ul>
                      <li><span class="solo_info_txt">&nbsp;</li>
                      <li>
					  <span class="solo_info_txt" style="font-weight:bold; font-size:45%;">ULTIMA CONEXI&Oacute;N : '.$ultima_posicion.'</span>
					  <br>
					  </li>
                      <li>';
					  
					  $fechaD= date ("j");
					  $el_dia=$fechaD;
				      $fechaM= date ("n");
				      $fechaY= date ("Y");
					  
					   	echo '<form name="" action="panel.php" method="post" >
							    <input name="consulta" type="hidden" value="mirecorridoenmapa" />
								<input name="filtro_vehiculo" type="hidden" value="'.$nombre_vehiculo.'-'.$id_servidor.'" />
								<input name="dia" type="hidden" value="'.$el_dia.'" />
								<input name="mes" type="hidden" value="'.$fechaM.'" />
								<input name="anio" type="hidden" value="'.$fechaY.'" />
								<input name="rango" type="hidden" value="Todo el dia" />
								<input name="" type="submit" id="btn" value=" Recorrido "  style="font-size:50px; width:100%;">
					   		</form>
							<br>
							
							
							<script language="javascript">
						function enviaformulario'.$id_servidor.'() {
								
							 win = window.open("","myWin","width=300,height=370,toolbars=0");            
							  document.a'.$id_servidor.'.target="myWin";
							  document.a'.$id_servidor.'.submit();
							}
					</script>
					<form action="MODULES/INTERACTIONS/index.php" method="post" name="a'.$id_servidor.'">
						<input type="hidden" name="id_servidor" value="'.$id_servidor.'"  />
						<input type="submit" style="font-size:50px;width:100%" value=" Interacciones "  id="windoname" onClick="enviaformulario'.$id_servidor.'();"/>
 					</form>
					<br><br>
							
							
					
							
							
							 
							
							
							
					   </li>
                       <li>
					   
                      
                       </li>
                  </ul>
               </li>
               <?php } ?>
               <!-- Cierre del bucle; asi el arreglo mostrara el numero de li "javascript:void();" que correspondan al numero de vehiculos por empresa-->
            </ul>
            
         </div>
				
				
					
					
				';
				
				}
}
//CERRAMOS CONSULTA A LA TABLA LECTURAS


//EXTRAS CONSULTING

//CONSULTA A LA TABLA LECTURAS
$consulta2=odbc_exec($conexion,"SELECT DISTINCT id_servidor from EE_ASIGNACIONES_EXTRAS WHERE usuario='".$_SESSION['MM_Username']."' AND usuario_primario!='".$_SESSION['MM_Username']."' ORDER BY id_servidor");



//echo 'numero de gps:'.$num_equpos.'<br><br>';

//echo '<h4 style="text-align:center; background:#0b90e5; padding-top:3%; padding-bottom:3%; margin:0;">EXTRAS DEL USUARIO PRINCIPAL</h4>';

while ($los_ids=odbc_fetch_object($consulta2))
{
	 $los_ids->id_servidor;
	 $mis_ids_principals=$los_ids->id_servidor;
	 
	 $consultaextras=odbc_exec($conexion,"SELECT DISTINCT id_servidor from EE_ASIGNACIONES_EXTRAS WHERE usuario='".$_SESSION['MM_Username']."' AND id_servidor!='".$mis_ids_principals."' ORDER BY id_servidor");			
	 
	
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
				
				
				echo '
				
				<div class="menujq">
                <ul>
                <li><a href="javascript:void();" class="a">'.$id_servidor.' - '.$nombre_vehiculo.' - ';   
			   
			   		if ($evento==1) {echo '<span style="color:red;">vehiculo apagado</span>';}
			   		if ($evento==2) {echo '<span style="color:#53ba00;">vehiculo encendido</span>';}
					if ($evento==4) {echo '<span style="color:#53ba00;">vehiculo encendido</span>';}
					if ($evento==5) {echo '<span style="color:#53ba00;">vehiculo encendido con Giro</span>';}
			   
			   
			   echo' </a>
                  <ul>
                      <li><span class="solo_info_txt">&nbsp;</li>
                      <li>
					  <span class="solo_info_txt" style="font-weight:bold; font-size:80%;">ULTIMA CONEXI&Oacute;N : '.$ultima_posicion.'</span>
					  <br>
					  </li>
                      <li>';
					  
					  $fechaD= date ("j");
					  $el_dia=$fechaD;
				      $fechaM= date ("n");
				      $fechaY= date ("Y");
					  
					   	echo '<form name="" action="panel.php" method="post" style="float:left; margin-right:10px; ">
							    <input name="consulta" type="hidden" value="mirecorridoenmapa" />
								<input name="filtro_vehiculo" type="hidden" value="'.$nombre_vehiculo.'-'.$id_servidor.'" />
								<input name="dia" type="hidden" value="'.$el_dia.'" />
								<input name="mes" type="hidden" value="'.$fechaM.'" />
								<input name="anio" type="hidden" value="'.$fechaY.'" />
								<input name="rango" type="hidden" value="Todo el dia" />
								<input name="" type="submit" id="btn" value="Recorrido" class="btn_desplegado_ok">
					   		</form>
							
							
							<script language="javascript">
						function enviaformulario'.$id_servidor.'() {
								
							 win = window.open("","myWin","width=300,height=370,toolbars=0");            
							  document.a'.$id_servidor.'.target="myWin";
							  document.a'.$id_servidor.'.submit();
							}
					</script>
					<form action="MODULES/INTERACTIONS/index.php" method="post" style="float:left; margin-right:10px;" name="a'.$id_servidor.'">
						<input type="hidden" name="id_servidor" value="'.$id_servidor.'"  />
						<input type="submit" value="Interacciones" class="btn_desplegado_ok" id="windoname" onClick="enviaformulario'.$id_servidor.'();"/>
 					</form>
					
							
							
							 
							
							
							
					   </li>
                       <li>
					   
                      
                       </li>
                  </ul>
               </li>
               <?php } ?>
               <!-- Cierre del bucle; asi el arreglo mostrara el numero de li "javascript:void();" que correspondan al numero de vehiculos por empresa-->
            </ul>
            
         </div>
				
				
					
					
				';
				
				}
}
//CERRAMOS CONSULTA A LA TABLA LECTURAS
				
				
			
				

?>
 
</div> 
</body>
</html>
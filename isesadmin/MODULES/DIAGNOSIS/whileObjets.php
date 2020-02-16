<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>



    <?php  
	
			
			//LISTADO DE REGISTROS
			if (!isset($_POST['filtro'])) {
				
				
				$sentence="SELECT * FROM E_INVENTARIO_GENERAL";
				$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL");
				$numObjetsArray = odbc_fetch_array($num_objets);
				$numObjetsArray['counter'];
				echo '<h1 class="h1_left" style="float:left;">'.$numObjetsArray['counter'].' Dispositivos Totales en el Sistema</h1>
				
				 <form action="" method="post" style="float:right;margin-right:3%; margin-bottom:1%;">
               
                
                	
                    <input name="consulta" type="hidden" value="DIAGNOSIS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    
                	<input name="" type="submit" value="Refrescar todas las muestras de Estatus" />
                
                </form>
				
				<br />';
			
				}
		    
			else 
			{
	$filtro=$_POST['filtro'];
	$objeto=$_POST['objeto'];
	include 'BTviewAll.php';echo '<br>';
	$sentence="SELECT * FROM E_INVENTARIO_GENERAL WHERE $filtro='".$objeto."'";
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE $filtro ='".$objeto."' ");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
	echo '<h1 class="h1_left" style="float:left;">'.$numObjetsArray['counter'].' Dispositivos para : "'.$objeto.'"</h1>
	            <form action="" method="post" style="float:right;margin-right:3%; margin-bottom:1%;">
               
                
                	<input name="objeto" type="hidden" value="'.$objeto.'" class="campo_general_FILTER"  />
                    <input name="consulta" type="hidden" value="DIAGNOSIS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="'.$filtro.'" />
                	<input name="" type="submit" value="Refrescar Muestra de Estatus" />
                
                </form>';
				
			
			
			
			
			}
			
			
			
			$consulta_inventario_list=odbc_exec($conexion,$sentence);
		    
		
		    echo '
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">';
				
		    while ($inventarios=odbc_fetch_object($consulta_inventario_list)) {
				 
			
				 
			 echo '
			
			      <tr class="miTR">
					<td class="miTDtitle" align="center">IMEI = "'.$inventarios->imei.'" - id = '.$inventarios->id.'</td>
					
				  </tr>
				 
			     
			     <tr class="miTR">
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">KEEP A LIVE:</span><br>';
						
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM ZKEEPALIVE WHERE id_servidor = '".$inventarios->id."'");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{
		 echo '<span style="width:90%; display:block;background:#873514; color:#fff; padding:2% 5% 2% 5%;">Sin Se&ntilde;al de Vida...</span><br>';}
						
	else {
		
		$consulta_datos=odbc_exec($conexion,"SELECT TOP 1 * FROM ZKEEPALIVE WHERE id_servidor = '".$inventarios->id."' ORDER BY id DESC");
	
	//CREAMOS EL ARRAY QUE DEVUELVA ULTIMO KEEP A LIVE DE VEHICULOS 
    while ($datos=odbc_fetch_object($consulta_datos)) 
				{
				$id_servidor=$datos->id_servidor;
				echo '<br><br><br><br><br><br>Ultima Conexion de Keep A live : <br><span class="red">'.$ultima_conexion=$datos->ULTIMA_CONEXION.'</span>'; 
				
				}
		
						
	}
	
	
	
				
				
				echo '</td>
					
				<td class="miTD" valign="top" align="left" width="20%" style="font-size:12px;">
						<span class="sub_header_int">ESTATUS DE LA ULTIMA POSICI&Oacute;N:</span><br>';
	
						
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM ZLECTURAS WHERE id_servidor = '".$inventarios->id."'");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{
		 echo '<span style="width:90%;display:block;background:#873514; color:#fff; padding:2% 5% 2% 5%;">Sin Lecturas en Sistema...</span><br>';}
						
	else {
	
	
	
	$consulta_datos=odbc_exec($conexion,"SELECT TOP 1 * FROM ZLECTURAS WHERE id_servidor = '".$inventarios->id."' ORDER BY id DESC");
	
	//CREAMOS EL ARRAY QUE DEVUELVA LA ULTIM POSICIONES DE VEHICULOS 
    while ($datos=odbc_fetch_object($consulta_datos)) 
				{
				echo 'ID : <span class="red">'.$id_servidor=$datos->id_servidor.'</span><br>';
				echo 'HDR : <span class="red">'.$hdr=$datos->HDR.'</span><br>';
				echo 'MODEL : <span class="red">'.$model=$datos->MODEL.'</span><br>';
				echo 'Coordenadas Latitud : <span class="red">'.$lat=$datos->LAT.'</span><br>'; 
				echo 'Coordenadas Longitud : <span class="red">'.$lng=$datos->LON.'</span><br>';
				echo 'Satelites : <span class="red">'.$sat=$datos->SATT.'</span><br>';
				
				$evt_id=$datos->EVT_ID;
				 

                if ($evt_id==1) {echo 'Estatus : <span class="red">Vehiculo apagado</span><br>';};
				if ($evt_id==2) {echo 'Estatus : <span class="green">Vehiculo encendido</span><br>';};
				if ($evt_id==4) {echo 'Estatus : <span class="green">Vehiculo encendido</span><br>';};
				if ($evt_id==5) {echo 'Estatus : <span class="green">Vehiculo encendido Giro</span><br>';};
				

				
				
				
				$cadena=$datos->IO;
				for($i=0;$i<strlen($cadena);$i++)
				{
					
					$cadena[0];
					$cadena[1];
					$cadena[2];
					$cadena[3];
					$cadena[4];
					$cadena[5];
					
					
				
				}
				
				if ($cadena[0]=='0') {echo 'Ignici&oacute;n : <span class="red">Apagada</span><br>';}
				if ($cadena[0]=='1') {echo 'Ignici&oacute;n : <span class="green">Encendida</span><br>';}
				
				if ($cadena[1]=='0') {echo 'Entrada 1 : <span class="red">Abierta</span><br>';}
				if ($cadena[1]=='1') {echo 'Entrada 1 : <span class="red">Cerrada</span><br>';}
				
				if ($cadena[2]=='0') {echo 'Entrada 2 : <span class="red">Abierta</span><br>';}
				if ($cadena[2]=='1') {echo 'Entrada 2 : <span class="red">Cerrada</span><br>';}
				
				if ($cadena[3]=='0') {echo 'Entrada 3 : <span class="red">Abierta</span><br>';}
				if ($cadena[3]=='1') {echo 'Entrada 3 : <span class="red">Cerrada</span><br>';}
				
				if ($cadena[4]=='0') {echo 'Salida 1 : <span class="red">Inactiva</span><br>';}
				if ($cadena[4]=='1') {echo 'Salida 1 : <span class="red">Activa</span><br>';}
				
				if ($cadena[5]=='0') {echo 'Salida 2 : <span class="red">Inactiva</span><br>';}
				if ($cadena[5]=='1') {echo 'Salida 2 : <span class="red">Activa</span><br>';}
				
				
				
				
				
				echo 'Veh&iacute;culo : <span class="red">'.$nombre_vehiculo=$datos->nombre_vehiculo.'</span><br>'; 
				echo 'Energ&iacute;a PWR VOLT : <span class="red">'.$bateria=$datos->PWR_VOLT.'</span><br>';
				echo 'Fecha ultima Posici&oacute;n : <span class="red">'.$ultima_posicion=$datos->hora_servidor.'</span><br><br>';
				
				
				}
	}
					echo '</td>
					
					
					
				</tr>
				
				
				  
				  <tr><td></td></tr>';
			
			} echo '</table>';
			
			//CIERRE DE LISTADO DE REGISTROS
			?>
            
            
			
</body>
</html>
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
				
				
				$sentence="SELECT * FROM H_GEOCERCAS";
				$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM H_GEOCERCAS");
				$numObjetsArray = odbc_fetch_array($num_objets);
				$numObjetsArray['counter'];
				echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Geo-cercas Totales en el Sistema</h1><br />';
			
				}
		    
			else 
			{
	$filtro=$_POST['filtro'];
	$objeto=$_POST['objeto'];
	include 'BTviewAll.php';echo '<br>';
	$sentence="SELECT * FROM H_GEOCERCAS WHERE $filtro='".$objeto."'";
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM H_GEOCERCAS WHERE $filtro ='".$objeto."' ");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
	echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Geo-cercas para : "'.$objeto.'"</h1><br />';
				
			
			
			
			
			}
			
			
			
			$consulta_inventario_list=odbc_exec($conexion,$sentence);
		    
		
		    echo '
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">';
				
		     while ($inventarios=odbc_fetch_object($consulta_inventario_list)) {
				 
			
				 
			 echo '
			
			      <tr class="miTR">
					<td class="miTDtitle" align="center">'.$inventarios->nombre_geo.'</td>
					
				  </tr>
				 
			     
			     <tr class="miTR">
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">ID GEOCERCA:</span><br>
					    '.$inventarios->id.'
					</td>
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">NOMBRE GEOCERCA:</span><br>
					    '.$inventarios->nombre_geo.'
					</td>
					
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">USUARIO GEOCERCA :</span><br>
						'.$inventarios->user_geo.'
					</td>
					
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">';
						$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$inventarios->id."'");
						$numObjetsArray = odbc_fetch_array($num_objets);
						$numObjetsArray['counter'];
											
						if ($numObjetsArray['counter']==0)
							{
							 echo 'SIN ASIGNACIONES';}
											
						else { echo '"'.$numObjetsArray['counter'].'" VEHICULO (S) ASIGNADO (S)';}
						
						echo '</span><br>';
						echo '<select name="" class="campo_general_FILTER_SELECT">';
						
							
						$consulta_vehic_sign_geo_array=odbc_exec($conexion, "SELECT * FROM I_ASIGNACION_GEOCERCAS WHERE id_geocerca='".$inventarios->id."'");
					    	while ($los_vehic_asign=odbc_fetch_object($consulta_vehic_sign_geo_array))
							{
							$los_vehic_asign->id_servidor;
							
							$subconsulta_vehic_name_geo_array=odbc_exec($conexion, "SELECT * FROM E_INVENTARIO_GENERAL WHERE id='".$los_vehic_asign->id_servidor."'");
					    		
								while ($los_vehic_name_asign=odbc_fetch_object($subconsulta_vehic_name_geo_array))
								{
								echo '<option>'.$los_vehic_name_asign->nombre_vehiculo.'-'.$los_vehic_name_asign->id.'</option>';
							    }
								
							}
						
						
						echo'</select>';
					echo '</td>
					
					
					
					
				</tr>
				
				
				  
				  <tr><td></td></tr>';
			
			} echo '</table>';
			
			//CIERRE DE LISTADO DE REGISTROS
			?>
            
            
			<?php include('updateObjets.php');?>
</body>
</html>
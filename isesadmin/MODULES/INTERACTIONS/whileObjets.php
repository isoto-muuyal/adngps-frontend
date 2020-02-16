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
				echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Dispositivos Totales en el Sistema</h1><br />';
			
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
	echo '<h1 class="h1_left">'.$numObjetsArray['counter'].' Dispositivos para : "'.$objeto.'"</h1><br />';
				
			
			
			
			
			}
			
			
			
			$consulta_inventario_list=odbc_exec($conexion,$sentence);
		    
		
		    echo '
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">';
				
		     while ($inventarios=odbc_fetch_object($consulta_inventario_list)) {
				 
			$o=$inventarios->c1;
			$o2=$inventarios->c2;
			$o3=$inventarios->c3;
			$o4=$inventarios->c4;
			$o5=$inventarios->c5;
			
			if ($o=='ok') {$f1='checked="checked"';} else {$f1='';}
			if ($o2=='ok') {$f2='checked="checked"';} else {$f2='';}
			if ($o3=='ok') {$f3='checked="checked"';} else {$f3='';}
			if ($o4=='ok') {$f4='checked="checked"';} else {$f4='';}
			if ($o5=='ok') {$f5='checked="checked"';} else {$f5='';}
				 
			 echo '
			
			      <tr class="miTR">
					<td class="miTDtitle" align="center">'.$inventarios->nombre_usuario.'</td>
					<td class="miTDtitle" align="center">id = '.$inventarios->id.'</td>
				  </tr>
				 
			     <form action="panel.php" method="post">
			     <tr class="miTR">
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">APAGAR DE MOTOR:</span><br>
					    <input type="checkbox" name="c1" value="ok" '.$f1.'>
					</td>
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">ENCENDER MOTOR:</span><br>
						<input type="checkbox" name="c2" value="ok" '.$f2.'>
					</td>
					
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">RECETEAR ODOMETRO:</span><br>
						<input type="hidden" name="Boofer" value="'.$inventarios->imei.'" class="campo_general_FILTER" />
						<input type="checkbox" name="c3" value="ok" '.$f3.'>
					</td>
					
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">SALIDA-1 ACTIVAR:</span><br>
						<input type="checkbox" name="c4" value="ok" '.$f4.'>
					</td>
					
					<td class="miTD" valign="top" align="center" width="20%">
						<span class="sub_header_int">SALIDA-1 DESACTIVAR:</span><br>
					    <input type="checkbox" name="c5" value="ok" '.$f5.'>
					</td>
					
					
				</tr>
				
				<tr >
					
					<td  valign="top">
						
					</td>
					
					<td  valign="top">
						
					</td>
					
					<td  valign="top">
						
					</td>
					
					<td valign="top">
					</td>
					
					<td class="miTD" >
						<input name="consulta" type="hidden" value="INTERACTIONS" />
						<input name="mostrar_registros" type="hidden" value="si" />
						<input name="modificar" type="hidden" value="si" />';
						if (!isset($_POST['filtro'])) {
							echo'';
						}
						else {
							echo '
							<input name="filtro" type="hidden" value="'.$filtro.'" />
							<input name="objeto" type="hidden" value="'.$objeto.'" />';
						}
						echo '<input name="id" type="hidden" value="'.$inventarios->id.'" />
						<input name="" type="submit" value="modificar" class="eliminacion" style="width:100%" />
					</td>
				  </tr>
				  </form>
				  <tr><td></td></tr>';
			
			} echo '</table>';
			
			//CIERRE DE LISTADO DE REGISTROS
			?>
            
            
			<?php include('updateObjets.php');?>
</body>
</html>
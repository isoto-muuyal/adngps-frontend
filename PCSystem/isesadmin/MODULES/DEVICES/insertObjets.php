<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php 
 
				
	$consulta=$_POST['consulta'];
	$confirma=$_POST['confirma']; 
	$modelo_gps=$_POST['modelo_gps']; 
	$numero_serie=$_POST['numero_serie'];
	$imei=$_POST['imei'];
	$autoincrement=$_POST['autoincrement'];  
					
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE imei='".$imei."'");
    
	$numObjetsArray = odbc_fetch_array($num_objets);
    $numObjetsArray['counter'];
	
	if ($numObjetsArray['counter']==0) {
					
	$ejecucion=odbc_exec($conexion,"INSERT INTO E_INVENTARIO_GENERAL 
	(
	id,
	modelo_gps,
	numero_serie,
	imei,
	sim,
	nombre_vehiculo,
    nombre_empresa,
    nombre_usuario,
    fecha_de_instalacion,
    fecha_de_facturacion,
    costo,
	funcion,
	c1,
	c2,
	c3,
	c4,
	c5) 
	VALUES 
	(
	'".$autoincrement."',
	'".$modelo_gps."',
	'".$numero_serie."',
	'".$imei."',
	'0', 
	'nuevoMDV',
	'".$localFactoryName."',
	'".$localFactoryUser."',
	'0',
	'0',
	'1',
	'activo',
	'ok',
	'ok',
	'ok',
	'',
	'')");
	
	echo '<span class="notificacion">Registro exit&oacute;so</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="mostrar_registros" type="hidden" value="si" />
			<input name="filtro" type="hidden" value="imei" />
			<input name="objeto" type="hidden" value="'.$imei.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		
	}
	
	else {
		
		echo '<span class="notificacion">Ya existe un registro<br>Verifique los datos</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		}
				
				
?>
</body>
</html>
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
	$nombre_empresa=$_POST['nombre_empresa']; 
	$razon_social=$_POST['razon_social'];
	$rfc=$_POST['rfc'];
	$nombre_usuario=$_POST['nombre_usuario'];
	$contrasenia=$_POST['contrasenia'];
	$direccion=$_POST['direccion']; 
	$codigo_postal=$_POST['codigo_postal']; 
	$pais=$_POST['pais']; 
	$estado=$_POST['estado']; 
	$ciudad=$_POST['ciudad']; 
	$tipo_empresa=$_POST['tipo_empresa']; 
	$cuenta_maestra=$_POST['cuenta_maestra']; 
	$zona_horaria=$_POST['zona_horaria']; 
	$aviso_acceso=$_POST['aviso_acceso']; 
	$activa=$_POST['activa']; 
	$num_geocercas=$_POST['num_geocercas']; 
	$persona_de_contacto=$_POST['persona_de_contacto']; 
	$telefono=$_POST['telefono']; 
	$correo=$_POST['correo'];  
					
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM F_EMPRESAS WHERE nombre_empresa='".$nombre_empresa."'");
    
	$numObjetsArray = odbc_fetch_array($num_objets);
    $numObjetsArray['counter'];
	
	if ($numObjetsArray['counter']==0) {
		
		
	$num_objets2 = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE nombre_usuario='".$nombre_usuario."'");
    
	$numObjetsArray2 = odbc_fetch_array($num_objets2);
    $numObjetsArray2['counter'];
	
	if ($numObjetsArray2['counter']==0) {
					
	$ejecucion=odbc_exec($conexion,"INSERT INTO F_EMPRESAS 
	(
	nombre_empresa,
	razon_social,
	rfc,
	cuenta_maestra,
	telefono,
    direccion,
    codigo_postal,
    pais,
    estado,
    ciudad,
	persona_de_contacto,
	correo,
	zona_horaria,
	aviso_acceso,
	activa,
	num_geocercas,
	tipo_empresa) 
	VALUES 
	(
	'".$nombre_empresa."',
	'".$razon_social."',
	'".$rfc."',
	'".$cuenta_maestra."', 
	'".$telefono."',
	'".$direccion."',
	'".$codigo_postal."',
	'".$pais."',
	'".$estado."',
	'".$ciudad."',
	'".$persona_de_contacto."',
	'".$correo."',
	'".$zona_horaria."',
	'".$aviso_acceso."',
	'".$activa."',
	'".$num_geocercas."',
	'".$tipo_empresa."')");
	
	
	//insercion USUARIO
	$num_objets3 = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS");
    
	$numObjetsArray3 = odbc_fetch_array($num_objets3);
    $numObjetsArray3['counter'];
	
	$autoincrement=$numObjetsArray3['counter']+1;	
	$ejecucion=odbc_exec($conexion,"INSERT INTO G_USUARIOS 
	(
	nombre_empresa,
	contrasenia,
	nombre_completo,
	correo,
	zona_horaria,
    tipo,
    activa,
    aviso_acceso,
    geocercas,
    nombre_usuario,
	usuario_padre) 
	VALUES 
	(
	'".$nombre_empresa."',
	'".$contrasenia."',
	'p*',
	'".$correo."', 
	'".$zona_horaria."',
	'".$tipo_empresa."',
	'".$activa."',
	'".$aviso_acceso."',
	'0',
	'".$nombre_usuario."',
	'".$localFactoryUser."')");
	
	echo '<span class="notificacion">Registro exit&oacute;so</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="mostrar_registros" type="hidden" value="si" />
			<input name="filtro" type="hidden" value="nombre_empresa" />
			<input name="objeto" type="hidden" value="'.$nombre_empresa.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		
	}
	
	else {
		
		echo '<span class="notificacion">Ya existe este usuario<br>Verifique los datos</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		}
		
	}
	
	else {
		
		echo '<span class="notificacion">Ya existe esta Empresa<br>Verifique los datos</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		}
				
				
?>
</body>
</html>
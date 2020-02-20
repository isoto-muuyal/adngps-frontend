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
					$nombre_empresa=$_POST['nombre_empresas'];
					$contrasenia=$_POST['contrasenias'];
					$nombre_completo=$_POST['nombre_completos'];
					$correo=$_POST['correos']; 
					$zona_horaria=$_POST['zona_horarias']; 
					$tipo=$_POST['tipos'];
					$activa=$_POST['activas']; 
					$aviso_acceso=$_POST['aviso_accesos']; 
					$geocercas=$_POST['geocercass']; 
					$nombre_usuario=$_POST['nombre_usuarios'];
					$usuario_padre=$_POST['usuario_padres']; 
					
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE nombre_usuario='".$nombre_usuario."'");
    
	$numObjetsArray = odbc_fetch_array($num_objets);
    $numObjetsArray['counter'];
	
	if ($numObjetsArray['counter']==0) {
		
	//insercion USUARIO
	$num_objets2 = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS");
    
	$numObjetsArray2 = odbc_fetch_array($num_objets2);
    $numObjetsArray2['counter'];
	
	$autoincrement=$numObjetsArray2['counter']+1;	
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
	'".$nombre_completo."',
	'".$correo."', 
	'".$zona_horaria."',
	'".$tipo."',
	'".$activa."',
	'".$aviso_acceso."',
	'".$geocercas."',
	'".$nombre_usuario."',
	'".$usuario_padre."')");
	
	echo '<span class="notificacion">Registro exit&oacute;so</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="mostrar_registros" type="hidden" value="si" />
			<input name="filtro" type="hidden" value="nombre_usuario" />
			<input name="objeto" type="hidden" value="'.$nombre_usuario.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		
	}
	
	
		
	
	
	else {
		
		echo '<span class="notificacion">Ya existe este Usuario<br>Verifique los datos</span><br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="'.$consulta.'" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />
		</form>';
		
		}
				
				
?>
</body>
</html>
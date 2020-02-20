<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php 
if (isset($_POST['consulta'])){
	
		$consulta=$_POST['consulta'];
		
		
		
		//MAPA RECORRRIDOS
		if ($consulta=='mirecorridoenmapa') {include('TRAVEL-MAP/index.php');};
		//MAPA RECORRRIDOS
		
		//DIRECCION MAPA
		if ($consulta=='midireccionenmapa') {include('TRAVEL-MAP/directions.php');};
		//DIRECCION MAPA
		
		//MAPA POR EMPRESA
		if ($consulta=='empresa_hija') {include ('MODULES/FILTERUSERSMAP/index.php');};
		//MAPA POR EMPRESA
		
		//ADMINISTRACION GEOCERCAS
		if ($consulta=='admin_geocercas') {include('MODULES/GEOADMIN/index.php');};
		//ADMINISTRACION GEOCERCAS
		
		//ASIGNACION GEOCERCAS
		if ($consulta=='asigna_geocercas') {include('MODULES/GEOADMIN/GEOASIGN.php');};
		//ASIGNACION  GEOCERCAS
		
		//EDICION GEOCERCAS
		if ($consulta=='edita_geocercas') {include('MODULES/GEOADMIN/GEOEDIT.php');};
		//EDICION  GEOCERCAS
		
		//INTERACCIONES ADMIN
		if ($consulta=='admin_interactions') {include('MODULES/INTERACTIONS_ADMIN/index.php');};
		//INTERACCIONES ADMIN
		
		//DATA ADMIN DEVICES
		if ($consulta=='admin_data') {include('MODULES/ADMIN_DATA/index.php');};
		//DATA ADMIN DEVICES
		
		//DATA ADMIN USERS
		if ($consulta=='admin_data_users') {include('MODULES/USERS/index.php');};
		//DATA ADMIN USERS
		
		
		
		
}

?>
</body>
</html>
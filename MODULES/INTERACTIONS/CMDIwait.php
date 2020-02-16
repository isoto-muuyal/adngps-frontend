<?php 
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>


<?php include ('../../conexion.php');

if (isset($_GET['dASRTSDsghdsjkj2345ahjAYuskksdk'])) {
	

	
	
	$MyPrimariKaySearchConsole=$_GET['dASRTSDsghdsjkj2345ahjAYuskksdk'];
	
	
	
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM K_INTERACCIONES_ESTATUS WHERE id_servidor='".$MyPrimariKaySearchConsole."'");
    $numObjetsArray = odbc_fetch_array($num_objets);
	$numObjetsArray['counter'];
						
	if ($numObjetsArray['counter']==0)
		{
		 
		 echo '<div align="center"><img src="Preloader_2.gif" /></div>';
		 echo '<div align="center" style="position:absolute; top:170px; width:93%;"><h3 style="color:#0b90e5;">Porfavor espere<br>Procesando petici&oacute;n...!<br></h3></div>';
		 header ("refresh:5; url=CMDIwait.php?dASRTSDsghdsjkj2345ahjAYuskksdk=$MyPrimariKaySearchConsole");}
						
	
	
	else {
		
		$consulta_estatus_tipo=odbc_exec($conexion,"SELECT * FROM K_INTERACCIONES_ESTATUS WHERE id_servidor='".$MyPrimariKaySearchConsole."'");
	while($tipo=odbc_fetch_object($consulta_estatus_tipo))
	{
		$t=$tipo->estatus;
		$c=$tipo->comando;
		$f=$tipo->fecha_peticion;
		$d=$tipo->id_servidor;
		
		if ($t=='FALLIDO') {
			
		odbc_exec($conexion, "DELETE FROM K_INTERACCIONES_ESTATUS WHERE id_servidor='".$MyPrimariKaySearchConsole."'");
		
		$ejecucion=odbc_exec($conexion,"INSERT INTO L_INTERACCIONES_HISTORIAL (comando,fecha_peticion,id_servidor,estatus) VALUES ('".$c."','".$f."','".$d."','".$t."')");
			
		echo '<div align="center" style="position:absolute; top:130px; width:93%;"><h3 style="color:red;">Error de Verificaci&oacute;n<br>Vuelva a intentarlo!</h3></div>';
		
		
		
		
		?>
			
		<body onload="setTimeout('window.close()', 2000)"></body>	
			
		
		<?php }
			
			
		if ($t=='ENVIADO') {
			
		odbc_exec($conexion, "DELETE FROM K_INTERACCIONES_ESTATUS WHERE id_servidor='".$MyPrimariKaySearchConsole."'");
		
		$ejecucion=odbc_exec($conexion,"INSERT INTO L_INTERACCIONES_HISTORIAL (comando,fecha_peticion,id_servidor,estatus) VALUES ('".$c."','".$f."','".$d."','".$t."')");	
		echo '<div align="center" style="position:absolute; top:150px; width:93%;"><h3 style="color:#0b90e5;">Petici&oacute;n con &eacute;xito</h3></div>';?>
		<body onload="setTimeout('window.close()', 2000)"></body>	
			
		<?php } 
	}
		
		
						
	}
	
	
	
	
	

}

?>

</html>
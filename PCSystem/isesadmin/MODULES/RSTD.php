<?php include ('conexion.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0" />
<link href="http://fonts.googleapis.com/css?family=Comfortaa:300" rel="stylesheet" type="text/css">
<title>panel</title>
<style>body {margin:0 auto;}</style>
<link href="css/panel.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/funcion_muestra_sub.js"></script>
<script src="js/funcion_abre_menu.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="shortcut icon" href="img/favicon.gif" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>

		<?php
			
			
			
		
	if (isset($_POST['id']))
	{
	
	$id=$_POST['id']; 
	
	
	
	echo '
	<div id="funcion_opacidad">
	<div id="contenedor_confirmacion">
		Esta seguro de<br>Eliminar todo el historial de el id dispositivo : ? '.$id.'<br><br>
		<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="DEVICES" />
						<input name="mostrar_registros" type="hidden" value="si" />
						<input name="" type="submit" value="no" class="confirma_eliminacion" />	
		</form>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="clean_devices" />
			<input name="confirmacion_borra_historial" type="hidden" value="si" />
			<input name="id" type="hidden" value="'.$id.'" />
			<input name="" type="submit" value="si" class="confirma_eliminacion" />	
		</form>
	';
	
	if (isset($_POST['confirmacion_borra_historial'])) {
		
		
		$confirmacion_borra_historial=$_POST['confirmacion_borra_historial'];
		$consulta=$_POST['consulta'];
		$id=$_POST['id'];
		
		
		odbc_exec($conexion, "DELETE FROM ZLECTURAS WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "DELETE FROM ZALERTAS WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "DELETE FROM ZEMERGENCIAS WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "DELETE FROM ZEVENTOS WHERE id_servidor=".$id.";");
		
		odbc_exec($conexion, "DELETE FROM ZKEEPALIVE WHERE id_servidor=".$id.";");
		
		
		
		
		echo '<br><br>
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="DEVICES" />
			<input name="mostrar_registros" type="hidden" value="si" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form>
		<br><br>
		<span style="display:block; width:100%;"><br>SE HA ELIMINADO TODO EL HISTORIAL DEL VEHICULO CON ID SERVIDOR : '.$id.'</span>
		</div>
		</div>';
		
		
		} else {echo '';}
	
	
	
	}
			
		
	?>
    
    
    
    


</body>
</html>
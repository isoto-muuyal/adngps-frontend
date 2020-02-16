<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
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
<br />


			<div id="contenedor_formulario_modelos" style="width:90%">
			<h3>Administraci&oacute;n de Geo-Cercas</h3>
			
			<?php 

			if ($_SESSION['MM_Username']!=$localFactoryUser) {
	
			$consulta_si_el_usuario_es_distribuidor=odbc_exec($conexion,"SELECT * FROM G_USUARIOS where nombre_usuario='".$_SESSION['MM_Username']."'");
			while($usuario_disribuidor=odbc_fetch_object($consulta_si_el_usuario_es_distribuidor))
			{
				$tipo_usuario=$usuario_disribuidor->tipo;
				$empresa=$usuario_disribuidor->nombre_empresa;
	
			}

				$tipo_usuario;
				if ($tipo_usuario=='Distribuidor')
				{
					include ('YESDISTRIBUITOR.php');
				}
				
				if ($tipo_usuario=='Maestra')
				{
					include ('NOTDISTRIBUITOR.php');
				}

	
	
			}
			
			else {include ('GOBUSER.php');}
?>
               
                
				
                
				
			</div>
			
			<br><br>
			
			
    
    
    
    

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer");
</script>
</body>
</html>
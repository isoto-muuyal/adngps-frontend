<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
//NAME-USER 
if (isset($_POST['nombre_usuario']))
	
	{
	include ('conexion.php');	
		
	$loginUsername=$_POST['nombre_usuario'];
    $password=$_POST['contrasenia'];
	
	if($loginUsername!==$localFactoryUser)
	{
	
	//QUERY EXIST
	$consulta2 = odbc_exec ($conexion,"SELECT nombre_usuario, contrasenia FROM G_USUARIOS WHERE nombre_usuario='".$loginUsername."' AND contrasenia='".$password."' ");
	
	while ($rows = odbc_fetch_object($consulta2)) { 
		$rows->nombre_usuario;
		}
	//QUERY EXIST


    //LIST EXIST
	$consulta = odbc_exec($conexion, "SELECT Count(*) AS counter FROM G_USUARIOS WHERE nombre_usuario='".$loginUsername."' 
	AND contrasenia='".$password."'");
    $arr = odbc_fetch_array($consulta);
    $arr['counter'];
	
	if ($arr['counter']==0) {
		
		header('Location:index.php');
		
		}else {
			
		$_SESSION['loggedin'] = true;
	    $_SESSION['MM_Username'] = $loginUsername;
	   
		header('Location:panel.php');	
		}
	//LIST EXIST
	}
	
	if($loginUsername==$localFactoryUser)
	{
	
	//QUERY EXIST
	$consulta2 = odbc_exec ($conexion,"SELECT nombre_usuario, clave FROM A_ADMINS WHERE nombre_usuario='".$loginUsername."' AND clave='".$password."' ");
	
	while ($rows = odbc_fetch_object($consulta2)) { 
		$rows->nombre_usuario;
		}
	//QUERY EXIST


    //LIST EXIST
	$consulta = odbc_exec($conexion, "SELECT Count(*) AS counter FROM A_ADMINS WHERE nombre_usuario='".$loginUsername."' 
	AND clave='".$password."'");
    $arr = odbc_fetch_array($consulta);
    $arr['counter'];
	
	if ($arr['counter']==0) {
		
		header('Location:index.php');
		
		}else {
			
		$_SESSION['loggedin'] = true;
	    $_SESSION['MM_Username'] = $loginUsername;
	   
		header('Location:panel.php');	
		}
	//LIST EXIST
	}
	
	}else {echo '';} ////NAME-USER 


?>
<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>

</body>
</html>
<?php

	if (isset($_POST['nombre_administrador']))
	{
	
	include ('conexion.php');	
		
	$loginUsername=$_POST['nombre_administrador'];
    $password=$_POST['clave'];
	
	
	
	//LISTAMOS RESULTADOS DE UNA CONSULTA
	$consulta2 = odbc_exec ($conexion,"SELECT nombre_administrador, clave FROM A_ADMINS WHERE nombre_administrador='".$loginUsername."' AND clave='".$password."' ");
	
	while ($rows = odbc_fetch_object($consulta2)) { 
		$rows->nombre_administrador;
		}
	
	//LISTAMOS RESULTADOS DE UNA CONSULTA


    //CONTABILIZAR NUMERO DE REGISTROS
	$consulta = odbc_exec($conexion, "SELECT Count(*) AS counter FROM A_ADMINS WHERE nombre_administrador='".$loginUsername."' 
	AND clave='".$password."'");
    
	$arr = odbc_fetch_array($consulta);
    $arr['counter'];
	
	if ($arr['counter']==0) {
		
		header('Location: index.php');
		
		
		
		}else {
			
		$_SESSION['loggedin'] = true;
	    $_SESSION['MM_Username'] = $loginUsername;
	   
        header('Location:panel.php');
			
			}
	//CONTABILIZAR NUMERO DE REGISTROS


	
	}
	
	else {echo '';}
?>
<?php 
session_start();
?>
<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style>body {text-align:center;}</style>
</head>

<body>

<?php include('../../conexion.php');

if (isset($_POST['user_extra_asign']))
{
	echo $user_extra_asign=$_POST['user_extra_asign'];
	echo $principal_user=$_POST['principal_user'];
	echo $vehicle_id=$_POST['vehicle_id'];
	
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM EE_ASIGNACIONES_EXTRAS WHERE usuario='".$user_extra_asign."' AND id_servidor='".$vehicle_id."' AND usuario_primario='".$principal_user."'");
    
	$numObjetsArray = odbc_fetch_array($num_objets);
    $numObjetsArray['counter'];
	
	if ($numObjetsArray['counter']==0) {
		
		$ejecucion=odbc_exec($conexion,"INSERT INTO EE_ASIGNACIONES_EXTRAS 
			(
			usuario,
			id_servidor,
			usuario_primario) 
			VALUES 
			(
			'".$user_extra_asign."',
			'".$vehicle_id."',
			'".$principal_user."')");
		    
			header("Location:multidesignations.php?vhi=$vehicle_id");
		
	}else {header("Location:multidesignations.php?vhi=$vehicle_id");}
	
}
?>

 
</body>
</html>
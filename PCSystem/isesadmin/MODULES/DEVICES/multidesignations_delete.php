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

if (isset($_POST['usuario']))
{
	$usuario=$_POST['usuario'];
	$vehicle_id=$_POST['vehicle_id'];
	odbc_exec($conexion, " DELETE FROM EE_ASIGNACIONES_EXTRAS WHERE usuario='".$usuario."' AND id_servidor='".$vehicle_id."'");
	header("Location:multidesignations.php?vhi=$vehicle_id");
	
}
?>

 
</body>
</html>
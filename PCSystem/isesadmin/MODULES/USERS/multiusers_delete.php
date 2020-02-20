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
	$user_id=$_POST['user_id'];
	odbc_exec($conexion, " DELETE FROM GG_MULTI_USUARIOS WHERE usuario_padre_secundario='".$usuario."' AND id_usuario_hijo='".$user_id."'");
	header("Location:multiusers.php?usid=$user_id");
	
}
?>

 
</body>
</html>
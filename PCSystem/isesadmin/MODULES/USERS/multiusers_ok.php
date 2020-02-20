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

if (isset($_POST['father_extra_asign']))
{
	echo $father_extra_asign=$_POST['father_extra_asign'];
	echo $user=$_POST['user'];
	echo $father=$_POST['father'];
	echo $user_id=$_POST['user_id'];
	
	$num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM GG_MULTI_USUARIOS WHERE usuario_hijo='".$user."' AND id_usuario_hijo='".$user_id."' AND usuario_padre_primario='".$father."' AND usuario_padre_secundario='".$father_extra_asign."'");
    
	$numObjetsArray = odbc_fetch_array($num_objets);
    $numObjetsArray['counter'];
	
	if ($numObjetsArray['counter']==0) {
		
		$ejecucion=odbc_exec($conexion,"INSERT INTO GG_MULTI_USUARIOS 
			(
			usuario_hijo,
			id_usuario_hijo,
			usuario_padre_primario,
			usuario_padre_secundario) 
			VALUES 
			(
			'".$user."',
			'".$user_id."',
			'".$father."',
			'".$father_extra_asign."')");
		    
			header("Location:multiusers.php?usid=$user_id");
		
	}else {header("Location:multiusers.php?usid=$user_id");}
	
}
?>

 
</body>
</html>
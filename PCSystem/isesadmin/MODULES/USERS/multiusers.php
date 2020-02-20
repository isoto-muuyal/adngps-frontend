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
$dato=$_GET['usid'];
$user_father_and_id_query=odbc_exec($conexion, "SELECT * FROM G_USUARIOS WHERE id='".$dato."'");
		while ($user_and_father=odbc_fetch_object($user_father_and_id_query))
			{
			echo $user_and_father->nombre_usuario; echo ' - '.$dato.'<br>';
			echo 'Usuario Padre Primario : '.$user_and_father->usuario_padre;
			
			$user=$user_and_father->nombre_usuario;
			$father=$user_and_father->usuario_padre;

			echo '<h4 style="display:block; width:100%;background:#f1f1f1; text-align:center; color:#999">Seleccionar y Agregar<br />Usuarios padres para '.$user.'</h4>';
			}
?>

<?php 
//$query_users=odbc_exec($conexion, "SELECT * FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
//$query_users=odbc_exec($conexion, "SELECT * FROM G_USUARIOS WHERE nombre_usuario!='".$principal_user."'");
$query_users=odbc_exec($conexion, "SELECT * FROM G_USUARIOS WHERE tipo='Distribuidor' AND nombre_usuario!='".$user."'");
echo '
<form action="multiusers_ok.php" method="post">
<select name="father_extra_asign" style="width:100%; height:30px;">
';
while ($the_users=odbc_fetch_object($query_users))
{
	
	echo '<option>'.$the_users->nombre_usuario.'</option>';
	
}
echo '
<input type="hidden" name="user" value="'.$user.'">
<input type="hidden" name="father" value="'.$father.'">
<input type="hidden" name="user_id" value="'.$dato.'">
<input type="submit" value="agregar" style="width:30%; height:30px; border:none; background:#000; color:#fff; cursor:pointer;">
</select></form>';
?>
<br />
<div style="width:100%; height:273px; overflow:auto; visiblity:visible; background:#e2e2e2; padding-top:2%;">
<h5 style="margin:0; background:#873514; color:#fff; padding-top:5px; padding-bottom:5px;">Usuarios Padres extras Agregados</h5>
<table width="100%" border="0">
<tr bgcolor="#e86937">
	<td width="75%">Usuario</td>
	<td width="25%">Quitar</td>
</tr>
<?php 
$query_extra_users=odbc_exec($conexion, "SELECT * FROM GG_MULTI_USUARIOS WHERE id_usuario_hijo='".$dato."'");
while ($the_users_extras=odbc_fetch_object($query_extra_users))
{
	echo '
	<tr bgcolor="#fff">
	<td width="75%">'.$the_users_extras->usuario_padre_secundario.'</td>
	<td width="25%">
	<form action="multiusers_delete.php" method="post">
	<input type="hidden" name="usuario" value="'.$the_users_extras->usuario_padre_secundario.'">
	<input type="hidden" name="user_id" value="'.$dato.'">
	<input type="submit" value="x" style="background:red; color:#fff">
	</form>
	</td>
	</tr>
	';
	
	
}
?>
</table>
</div>

    
</body>
</html>
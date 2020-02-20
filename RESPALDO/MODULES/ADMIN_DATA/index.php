<?php include ('conexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src="js/jquery.js"></script>
<link rel="shortcut icon" href="img/favicon.gif" />
<style>
.campillo {width:98%; height:30px;}
.campilloselect {width:100%; height:37px;}
.campo_pass {width:20%; height:38px; border:none; padding-left:1%;}
.btncampillo {height:40px; padding-left:10%; padding-right:10%;}
.btncampilloAddNewUser{height:40px; padding-left:5%; padding-right:5%; border:none; background:none; border:solid thin #f7a80f; color:#f7a80f; cursor:pointer;}
.btncampilloAddNewUser:hover {color:#fff; border:solid thin #fff; }
</style>
</head>

<body>
<br />
    
	
	
	<div id="contenedor_formulario_modelos">
	<?php 
	if ($_SESSION['MM_Username']!=$localFactoryUser)
	{
		$the_user=$_POST['the_user'];
		
		$userType = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
				while ($typeUser = odbc_fetch_object($userType)) { 
				$tipo=$typeUser->tipo;
				$pass=$typeUser->contrasenia;
				}
				
				if ($tipo=='Distribuidor')
				{
					echo '
					<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="admin_data_users" />
						<input name="" type="submit" value="CONTROL DE USUARIOS" class="btncampilloAddNewUser" />
					</form><br>';
					
				}
				
				if ($tipo=='Maestra')
				{
					echo 'Su Contrase&ntilde;a
					<form action="panel.php" method="post">
						<input name="consulta" type="hidden" value="admin_data" />
						<input name="the_user" type="hidden" value="'.$the_user.'" />
						<input name="passwordRegene" type="text" value="'.$pass.'" class="campo_pass" />
						<input name="" type="submit" value="Cambiar Contrase&ntilde;a" class="btncampilloAddNewUser" />
					</form><br>';
					
				}
				
				if (isset($_POST['passwordRegene'])) {
					$passwordRegene =  $_POST['passwordRegene']; echo $passwordRegene;
					
					echo '
						<div id="funcion_opacidad">
				 	    <div id="contenedor_confirmacion">
						Esta Seguro de<br>Modificar su Contrase&ntilde;a...?
						<form action="panel.php" method="post">
							<input name="consulta" type="hidden" value="admin_data" />
							<input name="the_user" type="hidden" value="'.$the_user.'" />
							<input name="" type="submit" value="no" class="confirma_eliminacion" />	
					    </form>
						<form action="panel.php" method="post">
							<input name="consulta" type="hidden" value="admin_data" />
							<input name="the_user" type="hidden" value="'.$the_user.'" />
							
							<input name="thepasswordRegene" type="hidden" value="'.$passwordRegene.'" />
							<input name="" type="submit" value="si" class="confirma_eliminacion" />	
                        </form>';
						
						
						echo '</div></div>';
					
					
					
				}
				
				if (isset($_POST['thepasswordRegene'])) {
					$thepasswordRegene = $_POST['thepasswordRegene'];
					
					//PASSWORD UPDATE
					odbc_exec($conexion, "UPDATE G_USUARIOS SET contrasenia = '".$thepasswordRegene."' WHERE nombre_usuario='".$the_user."'"); 
					//PASSWORD UPDATE
							
					
					echo '
					<div id="funcion_opacidad">
				 	<div id="contenedor_confirmacion">
					modificaci&oacute;n exit&oacute;sa
					<form action="index.php" method="post">
						<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
					</form>
					</div></div>
					';
					
					
					
				}
		
		
	}
	?>
	
	
	

	<h3>ASIGNACIONES Y/O CAMBIO DE NOMBRE DE VEHICULOS</h3>
	<?php
		//FIRST CONDITION
		if (isset($_POST['the_user'])) {
			
			$the_user=$_POST['the_user'];
			}
			//CLOSE CONDITION NOT IS GOBERNATOR
		
		
		//CLOSE FIRST CONDITION
	?>
	
	
	
	
	
    <?php include('whileObjets.php')?>
    
    </div>
</body>
</html>
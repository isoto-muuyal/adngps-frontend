<?php include ('conexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src="js/jquery.js"></script>
<link rel="shortcut icon" href="img/favicon.gif" />
<link rel="stylesheet" type="text/css" href="MODULES/USERS/style_users_admin_front.css" />
</head>

<body>

<div id="contenedor_formulario_modelos">
	
	<?php if (!isset($_POST['mostrar_registros'])) {?>
        
        
        <?php include('BTviewAll.php');?><br />
    	<h1 class="h1_left">FORMULARIO PARA AGREGAR USUARIO</h1><br />
        <?php include('objetsCounter.php');?>
        <?php include('objetsRegisterForm.php');?>
    	
      
    <?php } else {
		
		  
		  include ('BTbackAddNew.php'); echo '<br>';
          include ('filtersForm.php'); echo '<br>';
		  include ('whileObjets.php');
		
		}
	
	?>
	
	
    <?php  if (isset($_POST['confirma'])) {?>
            <div id="funcion_opacidad">
				<div id="contenedor_confirmacion">
                  <?php include ('insertObjets.php');?>
                </div>
            </div>
    <?php }?>
    
</div>   
</body>
</html>
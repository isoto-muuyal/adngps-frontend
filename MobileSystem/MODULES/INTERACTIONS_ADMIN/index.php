<?php include ('conexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src="js/jquery.js"></script>
<link rel="shortcut icon" href="img/favicon.gif" />
</head>

<body>
<br />
	<div id="contenedor_formulario_modelos">
	<h3 class="h1_left">GESTION DE INTERACCIONES</h3>
	
        
        <?php 
		include ('whileObjets.php'); echo '<br>';
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
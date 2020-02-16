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

	
	<h1 class="h1_left">GESTION DE INTERACCIONES</h1><br />
	<?php if (!isset($_POST['mostrar_registros'])) {?>
        
        
        
    	
        <?php 
		include ('filtersForm.php'); echo '<br>';
		include ('whileObjets.php'); echo '<br>';
		?><br />
        
    	
      
    <?php } else {
		
		  
		  
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
    
    
</body>
</html>
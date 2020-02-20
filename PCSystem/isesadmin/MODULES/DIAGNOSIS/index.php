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

    
	<h1 class="h1_left">DIAGNOSTICO DE GPS'S</h1><br />
	<?php if (!isset($_POST['mostrar_registros'])) {?>
        
        
        
    	
        <?php 
		include ('filtersForm.php'); echo '<br><h1 style="color:#999">&nbsp;&nbsp;DIGITE EL ID O EL IMEI QUE DESEA DIAGNOSTICAR</h1>';
		//include ('whileObjets.php'); echo '<br>';
		?><br />
        
    	
      
    <?php } else {
		
		  
		  
          include ('filtersForm.php'); echo '<br>';
		  include ('whileObjets.php');
		
		}
	
	?>
	
	
    
    
    
</body>
</html>
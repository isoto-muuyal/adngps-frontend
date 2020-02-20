<?php 
session_start();
?>
<?php include ('modules/SSO.php');?>
<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administraci&oacute;n de Monitoreo GPS</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>body {margin:0 auto; background:url(img/bg_map.jpg); background-size:100%;}</style>
<link href="css/panel.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<link rel="shortcut icon" href="img/favicon.gif" />
</head>

<body>

<div id="header"><?php include ('estrectural_design/HDER.php');?></div>
<div id="menu_general">
	<?php include ('estrectural_design/MN.php');?>
        <?php 
			    include ('conexion.php');
				$fp = fopen("../configC.txt","r");  
				$visitas = intval(fgets($fp));  
				fclose($fp);  
				
				if ($visitas<'22000'){$K=$k1;} 
				if ($visitas>='22000'){$K=$k2;}
	?>

</div>
     
<div id="contenedor_geral">
	
    <?php 
	if (!isset($_POST['consulta'])) {echo '';} 
	
	else {
		 //GENERAL FUNCTIONS CALL
		 
         echo '<div id="contenedor_master">';
		    
		    $consulta=$_POST['consulta'];
			include ('modules/FTS.php');
		 
		 echo '</div>';
		 }
		 //GENERAL FUNCTIONS
	?>

</div>

</body>
</html>
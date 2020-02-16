<?php 
session_start();
?>
<?php include ('conexion.php');	 ?>

<?php 
			
				$fp = fopen("configC.txt","r");  
				$visitas = intval(fgets($fp));  
				$visitas++;  
				fclose($fp);  
				$fp = fopen("configC.txt","w");  
				fputs($fp,$visitas);  
				
				
				    if ($visitas<'22000'){$K=$k1;} 
					if ($visitas>='22000'){$K=$k2;}
				
					if ($visitas=='44000') 
					{$fa=fopen("configC.txt", "w+"); fwrite($fa,""); fclose($fa);} 
			
			
?>

<?php include('MODULES/SSO.php');?>

<?php 
if (!isset($_POST['consulta'])) {
		
		if (!isset($_POST['stop'])) {
        header ("refresh:60; url=panel.php");
		}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0" />
<link href="http://fonts.googleapis.com/css?family=Comfortaa:300" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Trirong" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
<title>MDV</title>
<style>body {margin:0 auto;}</style>
<link href="css/panel.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/funcion_muestra_sub.js"></script>
<script src="js/funcion_abre_menu.js"></script>
<!--<script src="js/funcion_abre_seguimiento.js"></script>-->
<link rel="shortcut icon" href="img/favicon.gif" />
<script src="js/funcion_despliegue.js"></script>
<link href="css/estilo_despliegue.css" rel="stylesheet" type="text/css" />


</head>
<body>
			
<?php include ('estrectural_design/MN.php');?>
<?php include ('estrectural_design/HDER.php');?>

     
    <?php 
	if (!isset($_POST['consulta'])) {
		    $num_objets = odbc_exec($conexion, "SELECT Count(*) AS counter FROM E_INVENTARIO_GENERAL WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
			$numObjetsArray = odbc_fetch_array($num_objets);
			$numObjetsArray['counter'];
								
			if ($numObjetsArray['counter']==0)
				{$siguiente='1';
				 echo '
				 <div align="center" style="position:fixed;text-align:center; color:#555; height:100%; width:100%;
				 /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#45484d+0,000000+100;Black+3D+%231 */
background: #45484d; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover, #45484d 0%, #000000 100%); /* FF3.6-15 */
background: -webkit-radial-gradient(center, ellipse cover, #45484d 0%,#000000 100%); /* Chrome10-25,Safari5.1-6 */
background: radial-gradient(ellipse at center, #45484d 0%,#000000 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#45484d", endColorstr="#000000",GradientType=1 ); /* IE6-9 fallback on horizontal gradient */">
					
					<img src="img/logo_circular.png" width="20%" style="margin-top:10%"/><br />
					<span style="font-size:200%">
					Gps Tracking System</span><br /><br />
					...Sin veh&iacute;culos para Mostrar...
				 
				 </div>';}
								
			else {
				
				include ('MODULES/RINCIPAL-MAP/index.php');
								
			}
		
	} 
		
		if (isset($_POST['inter'])) {
				
				$miID=$_POST['inter'];
				include ('MODULES/INTERACTIONS/index.php');
				
			}
			//GLOBAL CONSULTING
			else { include ('MODULES/FTS.php');}
	?>
  
    
</body>
</html>
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

            
            
            

            <h1>MODELOS GPS</h1><br />
            
            <?php include ('objetsCounter.php');?>

            <table width="50%" border="0" cellpadding="0" cellspacing="0">
			<form action="panel.php" method="post" style="background:#fff;">
	        <tr>
            <td>
            <input type="text" name="modelo_gps" title="Por favor introduzca el modelo para dar de Alta" class="inputCMPO" placeholder="Agregar Modelo GPS" required/>
            
            
            </td>
            <td>
            
			<input name="confirma" type="hidden" value="si" />
            <input name="consulta" type="hidden" value="GPSMOD" />
            
			<input name="" type="submit" value="Agregar" class="inputBTN" />
            </td>
            </form>
            </tr>
            </table>
            <?php 
			if (isset($_POST['modelo_gps']))
			{
			?>
            <div id="funcion_opacidad">
	          <div id="contenedor_confirmacion">
			  <?php include ('insertObjets.php');?>
              </div>
            </div>
            <?php }?>
            
            <?php include ('objetsWhile.php');?>
             
			
			<?php 
			if (isset($_POST['id']))
			{
			?>
			
					<?php include ('deleteObjets.php');?>
    		  
            <?php }?>
   
    


</body>
</html>
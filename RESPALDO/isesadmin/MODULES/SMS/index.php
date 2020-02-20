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

			
             <h1>Tarjetas Sim</h1> <br />     
			<?php include ('objetsCounter.php');?>
		    <form action="panel.php" method="post">
                      
                     <table width="97%" border="0" class="table" cellpadding="0" cellspacing="0">
                     <tr>
                        <td valign="top">
                         N&uacute;mero de Tel&eacute;fono : <br />
                        </td>
                        <td valign="top">
                         N&uacute;mero de Serie : <br />
                        </td>
                        <td valign="top">
                         MB : <br />
                        </td>
                        <td valign="top">
                        
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">
                        	<input type="number" title="Por favor introduzca el n&uacute;mero de telefono de la SIM para dar de Alta" name="numero_telefono"  class="inputCMPO"  required="required">
                        </td>
                        <td valign="top">
                        	<input type="number" title="Por favor introduzca el n&uacute;mero de serie de la SIM para dar de Alta" name="numero_serie"  class="inputCMPO"  required="required">
                        </td>
                        <td valign="top">
                        	<input type="number" title="Por favor introduzca los megas de la SIM para dar de Alta" name="mb"  class="inputCMPO"  required="required" value="1">
                        </td>
                        <td valign="top">
                        
                        <input name="confirma" type="hidden" value="si" />
                        <input name="consulta" type="hidden" value="SMS" />
                       
                        <input name="" type="submit" value="Agregar" class="inputBTN" />
                        
                        </td>
                      </tr>
                    </table>
 				  </form>
                  <br />
                  <?php include ('filtersForm.php');?>
                  
             
            <?php 
			if (isset($_POST['confirma']))
			{
			?>
            <div id="funcion_opacidad">
	          <div id="contenedor_confirmacion">     
			<?php include ('insertObjets.php');?>
              </div>
            </div>
            <?php }?>
            
			<?php if (!isset($_POST['filtro'])) 
					{ include ('while_without_filter.php');}
					else {
					  $filtro=$_POST['filtro'];
					  $objeto=$_POST['objeto'];
					  include ('while_with_filter.php');	
					}
			
			?>
            
			<?php if (isset($_POST['id'])) {?>
            
					<?php include ('deleteObjets.php');?>
    		 
            <?php } ?>
    
    
    
    

</body>
</html>
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

			
            
                <h1>PLANES TARIFARIOS</h1><br />
                <?php include ('objetsCounter.php');?>
                 <form action="panel.php" method="post">
                      
                     <table width="97%" border="0" class="table" cellpadding="0" cellspacing="0">
                     <tr>
                        <td valign="top" width="30%">
                         Descripci&oacute;n : <br />
                        </td>
                        <td valign="top" width="20%">
                         Periodo : <br />
                        </td>
                        <td valign="top" width="25%">
                         Costo : <br />
                        </td>
                        <td valign="top" width="25%">
                        
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">
                        	<input title="Por favor introduzca la descripci&oacute;n del plan para dar de Alta" name="descripcion"  class="inputCMPO"  required="required">
                        </td>
                        <td valign="top">
                        <select name="periodo" class="inputCMPOSelect">
                    	<option>Mensual</option>
                        <option>Bimestral</option>
                        <option>Trimestral</option>
                        <option>Semestral</option>
                        <option>Anual</option>
                        </select>	
                        </td>
                        <td valign="top">
                        	<input type="number" title="Por favor introduzca el costo del plan para dar de Alta" name="costo"  class="inputCMPO"  required="required">
                        </td>
                      
                        <td valign="top">
                        <input name="confirma" type="hidden" value="si" />
                        <input name="consulta" type="hidden" value="PLANES" />
                       
                        <input name="" type="submit" value="Agregar" class="inputBTN" />
                        
                        </td>
                      </tr>
                    </table>
 				  </form>
                
                   
			
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
            
			<?php include ('objetsWhile.php');?>
            
			<?php if (isset($_POST['id'])){?>
            
					<?php include ('deleteObjets.php');?>
    		  
            <?php }?>
    
    
    
    


</body>
</html>
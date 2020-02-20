<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>


    
     <!--FORMULARIO INSERCION EN INVENTARIO-->
     
     <form action="panel.php" method="post">
                      
                     <table width="97%" border="0" class="table" cellpadding="0" cellspacing="0">
                     <tr>
                        <td valign="top" width="25%">
                         MODELO : <br />
                        </td>
                        <td valign="top" width="25%">
                         NUMERO DE SERIE : <br />
                        </td>
                        <td valign="top" width="25%">
                         IMEI : <br />
                        </td>
                        <td valign="top" width="25%">
                        
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">
                        	<select name="modelo_gps" class="inputCMPOSelect">
               				<?php 
                 			$consulta_modelos=odbc_exec ($conexion,"SELECT * FROM B_MODELOS");
                 			while ($los_modelos = odbc_fetch_object($consulta_modelos))
                 			{
                 			$modelos=$los_modelos->modelo_gps; echo '<option>'.$modelos.'</option>';
                 			}
                 			?>
              				</select>
                        </td>
                        <td valign="top">
                        	<input type="number" title="Por favor introduzca el n&uacute;mero de serie del GPS para dar de Alta" name="numero_serie"  class="inputCMPO"  required="required">
                        </td>
                        <td valign="top">
                        	<input type="number" title="Por favor introduzca el IMEI del GPS para dar de Alta" name="imei"  class="inputCMPO"  required="required">
                        </td>
                        <td valign="top">
                         <input name="autoincrement" type="hidden" value="<?php echo $siguiente ?>" />
                         <input name="confirma" type="hidden" value="si" />
                         <input name="consulta" type="hidden" value="DEVICES" />
                       
                        <input name="" type="submit" value="Agregar" class="inputBTN" />
                        
                        </td>
                      </tr>
                    </table>
 				  </form>
     
     
    
     <!--CIERRE DE FORMULARIO INSERCION EN INVENTARIO-->
      
      
               
</body>
</html>
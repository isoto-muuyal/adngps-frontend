<?php include ('conexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>


    
    <!--TYPE FILTERS-->
    <table width="96%" border="0" cellpadding="4" cellspacing="3" class="miTABLEFilterAncha">
              <tr>
              
                
                <!--filtro ID-->
                <form action="" method="post">
                <td valign="bottom" width="40%">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="id" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="DIAGNOSIS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="id" />
                	<input name="" type="submit" value="buscar ID" class="btn_menu_general_FILTER" />
                </td>
                </form>
				
				<!--filtro imei-->
                <form action="" method="post">
                <td valign="bottom" width="40%">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="IMEI" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="DIAGNOSIS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="imei" />
                	<input name="" type="submit" value="buscar IMEI" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
               
               
                
              </tr>
            </table>
            <!--TYPE FILTERS CLOSE-->
      
      
               
</body>
</html>
<?php include ('conexion.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>


    
    <!--TYPE FILTERS-->
    <table width="30%" border="0" cellpadding="0" cellspacing="0" >
              <tr>
              
                <!--filtro SIM-->
                <form action="" method="post">
                <td valign="bottom" width="70%">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" />
                
                </td>
                <td valign="bottom" width="30%">
                	<input name="consulta" type="hidden" value="SMS" />
                    <input name="filtro" type="hidden" value="numero_telefono" />
                	<input name="" type="submit" value="buscar SIM" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
              </tr>
            </table>
            <!--TYPE FILTERS CLOSE-->
      
      
               
</body>
</html>
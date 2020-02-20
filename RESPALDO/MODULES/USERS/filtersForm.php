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
               
                
                 <!--filtro empresas-->
                <form action="" method="post">
                <td valign="bottom" width="13%">
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							echo '<option>'.$_SESSION['MM_Username'].'</option>';
					    	$consulta_usuarios_array=odbc_exec($conexion, "SELECT * FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
					    	while ($los_usuarios=odbc_fetch_object($consulta_usuarios_array))
							{
							echo '<option>'.$los_usuarios->nombre_usuario.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="admin_data_users" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_usuario" />
                	<input name="" type="submit" value="Filtrar Usuario" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
              
                
                
                
                </tr>
                
                
            </table>
            <!--TYPE FILTERS CLOSE-->
            

     

  
</body>
</html>
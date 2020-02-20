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
                <td valign="bottom" width="25%">
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							echo '<option>'.$localFactoryName.'</option>';
					    	$consulta_empresas_array=odbc_exec($conexion, 'SELECT * FROM F_EMPRESAS');
					    	while ($las_empresas=odbc_fetch_object($consulta_empresas_array))
							{
							echo '<option>'.$las_empresas->nombre_empresa.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="INTERACTIONS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_empresa" />
                	<input name="" type="submit" value="Filtrar Empresa" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                <!--filtro usuarios-->
                <form action="" method="post">
                <td valign="bottom" width="25%">
                	
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							echo '<option>'.$localFactoryUser.'</option>';
					    	$consulta_usuarios_array=odbc_exec($conexion, 'SELECT * FROM G_USUARIOS');
					    	while ($los_usuarios=odbc_fetch_object($consulta_usuarios_array))
							{
							echo '<option>'.$los_usuarios->nombre_usuario.'</option>';
							}?>
                    </select>
                
                </td>
                <td valign="bottom" width="6%">
                	<input name="consulta" type="hidden" value="INTERACTIONS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_usuario" />
                	<input name="" type="submit" value="Filtrar Usuario" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                <!--filtro ID-->
                <form action="" method="post">
                <td valign="bottom" width="20%">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="id" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="INTERACTIONS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="id" />
                	<input name="" type="submit" value="buscar ID" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
               
               
                
              </tr>
            </table>
            <!--TYPE FILTERS CLOSE-->
      
      
               
</body>
</html>
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
							
					    	$consulta_empresas_geo_array=odbc_exec($conexion, "SELECT DISTINCT empresa_geo FROM H_GEOCERCAS");
					    	while ($las_empresas_geo=odbc_fetch_object($consulta_empresas_geo_array))
							{
							echo '<option>'.$las_empresas_geo->empresa_geo.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="GEOSYSTEMS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="empresa_geo" />
                	<input name="" type="submit" value="Filtrar Empresa" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                <!--filtro usuarios-->
                <form action="" method="post">
                <td valign="bottom" width="13%">
                	
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							
					    	$consulta_user_geo_array=odbc_exec($conexion, "SELECT DISTINCT user_geo FROM H_GEOCERCAS");
					    	while ($los_users_geo=odbc_fetch_object($consulta_user_geo_array))
							{
							echo '<option>'.$los_users_geo->user_geo.'</option>';
							}?>
                    </select>
                
                </td>
                <td valign="bottom" width="6%">
                	<input name="consulta" type="hidden" value="GEOSYSTEMS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="user_geo" />
                	<input name="" type="submit" value="Filtrar Usuario" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                <!--filtro modelo GPS-->
                <form action="" method="post">
                <td valign="bottom" width="13%">
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							
					    	$consulta_nom_geo_array=odbc_exec($conexion, 'SELECT * FROM H_GEOCERCAS');
					    	while ($las_geo=odbc_fetch_object($consulta_nom_geo_array))
							{
							echo '<option>'.$las_geo->nombre_geo.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="GEOSYSTEMS" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_geo" />
                	<input name="" type="submit" value="Filtrar Nombre Geocerca" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
               
                </tr>
                
                
                
                
                
               
            </table>
            <!--TYPE FILTERS CLOSE-->
      
      
               
</body>
</html>
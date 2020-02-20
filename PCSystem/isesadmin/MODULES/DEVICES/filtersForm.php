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
							echo '<option>'.$localFactoryName.'</option>';
					    	$consulta_empresas_array=odbc_exec($conexion, 'SELECT * FROM F_EMPRESAS');
					    	while ($las_empresas=odbc_fetch_object($consulta_empresas_array))
							{
							echo '<option>'.$las_empresas->nombre_empresa.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_empresa" />
                	<input name="" type="submit" value="Filtrar Empresa" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                <!--filtro usuarios-->
                <form action="" method="post">
                <td valign="bottom" width="13%">
                	
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
                	<input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_usuario" />
                	<input name="" type="submit" value="Filtrar Usuario" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                <!--filtro modelo GPS-->
                <form action="" method="post">
                <td valign="bottom" width="13%">
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							
					    	$consulta_modelos_array=odbc_exec($conexion, 'SELECT * FROM B_MODELOS');
					    	while ($los_modelos=odbc_fetch_object($consulta_modelos_array))
							{
							echo '<option>'.$los_modelos->modelo_gps.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="modelo_gps" />
                	<input name="" type="submit" value="Filtrar Modelo GPS" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                <!--filtro Plan-->
                <form action="" method="post">
                <td valign="bottom" width="15%">
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<?php
							
					    	$consulta_plan_array=odbc_exec($conexion, 'SELECT * FROM D_PLANES');
					    	while ($los_planes=odbc_fetch_object($consulta_plan_array))
							{
							echo '<option value="'.$los_planes->id.'">'.$los_planes->descripcion.'-'.$los_planes->costo.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom">
                    <input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="costo" />
                	<input name="" type="submit" value="Filtrar Planes" class="btn_menu_general_FILTER" />
                </td>
                </form>
                </tr>
                
                
                
                
                
                <tr>
                <!--filtro IMEI-->
                <form action="" method="post">
                <td valign="bottom">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="imei" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="imei" />
                	<input name="" type="submit" value="buscar IMEI" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                
                <!--filtro ID-->
                <form action="" method="post">
                <td valign="bottom">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="id" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="id" />
                	<input name="" type="submit" value="buscar ID" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                <!--filtro SIM-->
                <form action="" method="post">
                <td valign="bottom">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="sim" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="sim" />
                	<input name="" type="submit" value="buscar SIM" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                <!--filtro Vehiculo-->
                <form action="" method="post">
                <td valign="bottom">
                
                	<input name="objeto" type="text" class="campo_general_FILTER" placeholder="veh&iacute;culo" />
                
                </td>
                <td valign="bottom">
                	<input name="consulta" type="hidden" value="DEVICES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_vehiculo" />
                	<input name="" type="submit" value="buscar Veh&iacute;culo" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
              </tr>
            </table>
            <!--TYPE FILTERS CLOSE-->
      
      
               
</body>
</html>
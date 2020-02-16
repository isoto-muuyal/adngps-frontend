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
							
					    	$consulta_empresas_array=odbc_exec($conexion, 'SELECT * FROM F_EMPRESAS');
					    	while ($las_empresas=odbc_fetch_object($consulta_empresas_array))
							{
							echo '<option>'.$las_empresas->nombre_empresa.'</option>';
							}?>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="COMPANIES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="nombre_empresa" />
                	<input name="" type="submit" value="Filtrar Empresa" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                
                <!--filtro empresas-->
                <form action="" method="post">
                <td valign="bottom" width="13%">
                    <select name="objeto" class="campo_general_FILTER_SELECT">';
							<option>Maestra</option>
                            <option>Distribuidor</option>
                    </select>
                	
                
                </td>
                <td valign="bottom" width="6%">
                    <input name="consulta" type="hidden" value="COMPANIES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="tipo_empresa" />
                	<input name="" type="submit" value="Filtrar Tipo" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
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
                    <input name="consulta" type="hidden" value="COMPANIES" />
                    <input name="mostrar_registros" type="hidden" value="ok" />
                    <input name="filtro" type="hidden" value="cuenta_maestra" />
                	<input name="" type="submit" value="Filtrar Padres" class="btn_menu_general_FILTER" />
                </td>
                </form>
                
                </tr>
                
                
            </table>
            <!--TYPE FILTERS CLOSE-->
            
       


  
</body>
</html>
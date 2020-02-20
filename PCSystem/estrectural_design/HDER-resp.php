<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<div id="cont_cabezal">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr >
    <td width="6%" align="center">
    	<div id="icono_abre_menu"><img src="img/menu.png" title="Administraci&oacute;n de Veh&iacute;culos" class="contenedor_menu_general" /></div>
    </td>
    <td width="20%" align="left" valign="middle" style="color:#86AAD2;"><?php echo 'Usuario -'.$_SESSION['MM_Username'] ?></td>
    
	<?php
	    
		echo '
		<td valign="middle" width="14%">
		<form action="panel.php" method="post" title="Ver todos mis veh&iacute;culos en Mapa">
        	<input name="" type="submit" value="Todos mis Vehiculos" style="width:100%; height:30px;background:#444; color:#999; border: solid thin #555; cursor:pointer;"  />
		</form>
		</td>';
		
	?>
	
    <td width="1%">&nbsp;</td>  
    <td width="15%" align="left" valign="middle">
    <?php 
	//CONDICION GENERAL MASTER USER ADMIN
	if ($_SESSION['MM_Username']!==$localFactoryUser) {
	
	
	//SACAMOS NOMBRE EMPRESA Y EL TIPO DE EMPRESA
		
		
	$consultar_nombre_empresa = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
	while ($rows = odbc_fetch_object($consultar_nombre_empresa)) { 
		$N=$rows->nombre_empresa;
		$tipo=$rows->tipo;
		
		//CONSULTAMOS EL TIPO DE EMPRESA - Distribuidor o Maestro -
					if ($tipo=='Distribuidor') {
						
						    echo '
							
							<form name="miformu1" action="panel.php" method="post">
							<table width="100%" cellpadding="0" cellspacing="0" title="Usted puede filtrar sus flotillas">
							<tr><td style="color:#5ea6ef;"></td></tr>
							<tr>
							<td width="70%">
							<input name="consulta" type="hidden" value="empresa_hija" />
							<select name="miEmpresa" style="width:100%; height:30px;">';
							
						//LISTAMOS USUARIOS HIJOS
						$consulta_empresas_hijas = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
							while ($rows2 = odbc_fetch_object($consulta_empresas_hijas)) {
		
							echo '<option>'.$select_empresa=$rows2->nombre_usuario.'</option>'; 
		
							}
							
							echo '
							</select>
							<td>
							
							<td width="30%">
							<input type="submit" id="btn" value="filtrar" style="width:100%; height:30px;background:#0b90e5; color:#fff; border-color:#279ae3; cursor:pointer; border:none;" /></td>
							<tr>
							
							</table>
							
							</form>';
						    //LISTAMOS LAS EMPRESAS HIJAS DE LA EMPRESA QUE SE DISTRIBUIDORA
						
						}
						
					    if ($tipo=='Maestra') {echo '';}
						
					   //CONSULTAMOS EL TIPO DE EMPRESA - Distribuidor o Maestro -
				}
		       //SACAMOS NOMBRE EMPRESA Y EL TIPO DE EMPRESA
	}
	//CIERRE CONDICION GENERAL MASTER USER ADMIN
		
	//LISTAMOS RESULTADOS DE UNA CONSULTA
	?>
    
	
	<?php 
	//CONDICION GENERAL MASTER USER ADMIN TRUE
	if ($_SESSION['MM_Username']==$localFactoryUser) {
		
		
		
		 echo '<form action="panel.php" method="post" title="filtrar todos los usuarios">
							<table width="100%" cellpadding="0" cellspacing="0" >
							<tr>
								<td style="color:#5ea6ef;"></td></tr>
							<tr>
							<td width="70%">
							<input name="consulta" type="hidden" value="empresa_hija" />
							<select name="miEmpresa" style="width:100%; height:30px;">';
							
							//LISTAMOS TODAS LAS EMPRESAS
							$consulta_empresas_hijas = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS");
							while ($rows2 = odbc_fetch_object($consulta_empresas_hijas)) {
		
							echo '<option>'.$select_empresa=$rows2->nombre_usuario.'</option>'; 
		
							}
							
							echo '
							</select>
							<td>
							
							<td width="30%">
							<input type="submit" value="filtrar" style="width:100%; height:30px; background:#0b90e5; color:#fff; border-color:#279ae3; cursor:pointer; border:none;" /></td>
							<tr>
							
							</table>
							</form>';
						    //LISTAMOS LAS EMPRESAS HIJAS DE LA EMPRESA QUE SE DISTRIBUIDORA
		
		
		
		}//CIERRE DE CONDICION GENERAL MASTER USER ADMIN TRUE
	
	
	
	
	?>
    
    </td>
    
    <td>&nbsp;</td>
    <td width="15%"><a href="close.php" style="float:right; color:#fff; margin-top:0.8%;">Cerrar Sesi&oacute;n</a></td>
  </tr>
  
</table>
        
</div>
</body>
</html>
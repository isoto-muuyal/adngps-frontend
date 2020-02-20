<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<div id="cont_cabezal">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:45px;">
  
	<tr height="70">
	<td align="center">Bienvenido "<?php echo $_SESSION['MM_Username'] ?>"</td>
	</tr>
  </table>
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  
	<tr>
	<td width="10%"><div id="icono_abre_menu"><img src="img/menu.png" title="Administraci&oacute;n de Veh&iacute;culos" class="contenedor_menu_general" /></div></td>
	<td align="left" width="50%">
	<a href="close.php" style="float:right; color:#98bfff; margin-top:0.8%; font-size:45px;">Cerrar Sesi&oacute;n&nbsp;</a>
	</td>
	<td width="20%">
	<?php
	    
		echo '
		<td valign="middle" width="14%">
		<form action="panel.php" method="post" title="Ver todos mis veh&iacute;culos en Mapa">
        	<input name="" type="submit" value="Mis Vehiculos" style="width:100%; height:45px;background:#000; font-size:35px; color:#fff; border: solid thin #000; cursor:pointer; text-decoration:underline;"  />
		</form>
		</td>';
		
	?>
	</td>
	</tr>
  </table> 
  
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr >
   
    
	
	
    <td width="1%">&nbsp;</td>  
    <td width="98%" align="center" valign="middle">
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
							<select name="miEmpresa" style="width:100%; height:100px; font-size:50px;">';
							
						//LISTAMOS USUARIOS HIJOS
						$consulta_empresas_hijas = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE usuario_padre='".$_SESSION['MM_Username']."'");
							while ($rows2 = odbc_fetch_object($consulta_empresas_hijas)) {
		
							echo '<option>'.$select_empresa=$rows2->nombre_usuario.'</option>'; 
		
							}
							
							echo '
							</select>
							<td>
							
							<td width="30%">
							<input type="submit" id="btn" value="filtrar" style="width:100%; font-size:50px; height:100px;background:#0b90e5; color:#fff; border-color:#279ae3; cursor:pointer; border:none;" /></td>
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
    
    <td width="1%">&nbsp;</td> 
  </tr>
  
</table>
        
</div>
</body>
</html>
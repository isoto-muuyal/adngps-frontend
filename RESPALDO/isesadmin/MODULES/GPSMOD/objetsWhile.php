<?php 
$consulta_modelos_gps=odbc_exec($conexion,'SELECT * FROM B_MODELOS ');
echo '<br><h1>Listado de Modelos en el sistema:</h1>
		
		<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">
			<tr class="miTR">
				<td class="miTDtitle">NUESTROS MODELOS</td>
				<td class="miTDtitle">FUNCION</td>
			</tr>';
				
while ($modelos=odbc_fetch_object($consulta_modelos_gps)) 
{
echo '<form action="panel.php" method="post">
			      
			<tr class="miTR">
				<td class="miTD"><span class="datos">
					<input type="hidden" name="modelo_gps" value="'.$modelos->modelo_gps.'" />'.$modelos->modelo_gps.'</span>
				</td>
				<td class="miTD"><input name="consulta" type="hidden" value="GPSMOD" />
					<input name="id" type="hidden" value="'.$modelos->id.'" />
					<input name="" type="submit" value="eliminar" class="eliminacion"  style="width:30%;" />
				</td>
			</tr>
	  </form>';
} 

echo '</table>';
?>
<?php 
$consulta_planes=odbc_exec($conexion,'SELECT * FROM D_PLANES ');
			echo '<br><h1>Listado de Planes:</h1>
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">
				  <tr class="miTR">
					<td class="miTDtitle">ID</td>
					<td class="miTDtitle">DESCRIPCION</td>
					<td class="miTDtitle">COSTO</td>
					<td class="miTDtitle">PERIODO</td>
					<td class="miTDtitle">ELIMINAR</td>
					
				  </tr>
				 ';
				
while ($planes=odbc_fetch_object($consulta_planes)) {
			
echo '
			    <form action="panel.php" method="post">
			    <tr class="miTR">
					<td class="miTD">'.$planes->id.'</td>
					<td class="miTD"><input type="hidden" name="descripcion" value="'.$planes->descripcion.'" />'.$planes->descripcion.'</td>
					<td class="miTD"><input type="hidden" name="costo" value="'.$planes->costo.'" />'.$planes->costo.'</td>
					<td class="miTD">'.$planes->periodo.'</td>
					
					<td class="miTD">
					<input name="consulta" type="hidden" value="PLANES" />
						<input name="id" type="hidden" value="'.$planes->id.'" />
						
						<input name="" type="submit" value="eliminar" class="eliminacion" style="width:50%" />
					</td>
				  </tr>
				  </form>
			
				
				 ';
			
			} echo '</table>';
?>
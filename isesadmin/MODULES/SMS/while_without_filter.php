<?php 
$consulta_sims=odbc_exec($conexion,'SELECT * FROM C_SIMS ');
			echo '<br><h1>Listado se Sims:</h1>
			<table border="0" class="miTABLE" cellpadding="10" cellspacing="10">
				  <tr class="miTR">
					<td class="miTDtitle">ID</td>
					<td class="miTDtitle">NUMERO DE TELEFONO</td>
					<td class="miTDtitle">NUMERO DE SERIE </td>
					<td class="miTDtitle">MB </td>
					<td class="miTDtitle">Fecha de Alta </td>
					<td class="miTDtitle">ESTATUS </td>
					<td class="miTDtitle">USUARIO</td>
					<td class="miTDtitle">BAJA</td>
				  </tr>
				';
				
		while ($sims=odbc_fetch_object($consulta_sims)) {
			
			if($sims->activos=='no') {$sims->activos='<span class="si_activos"></span>';}
			if($sims->activos=='si') {$sims->activos='<span class="no_activos"></span>';}
			
			echo '
			    <tr class="miTR">
					<td class="miTD">'.$sims->id.'</td>
					<td class="miTD">'.$sims->numero_telefono.'</td>
					<td class="miTD">'.$sims->numero_serie.'</td>
					<td class="miTD">'.$sims->mb.'</td>
					<td class="miTD">'.$sims->fecha_alta.'</td>
					<td class="miTD">'.$sims->activos.'</td>
					<td class="miTD">'; 
					
					$consulta_usuario=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE sim='".$sims->numero_telefono."' ");
					while ($the_user=odbc_fetch_object($consulta_usuario)) {
						
						echo $the_user->nombre_usuario;
					
					}
					
					echo'</td>
					<td class="miTD">
					<form action="panel.php" method="post">
					    <input name="consulta" type="hidden" value="SMS" />
						<input name="id" type="hidden" value="'.$sims->id.'" />
						<input name="" type="submit" value="eliminar" class="eliminacion" style="width:100%" />
					</form>
					</td>
				  </tr>';
			
			} echo '</table>';
?>
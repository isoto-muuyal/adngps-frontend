<?php 
 if (isset($_POST['confirma'])) {
				
					$consulta=$_POST['consulta']; 
					$confirma=$_POST['confirma']; 
					$modelo_gps=$_POST['modelo_gps'];
					
					
					
	$ejecucion=odbc_exec($conexion,"INSERT INTO B_MODELOS (modelo_gps) VALUES ('".$modelo_gps."')");
	echo '
	     
		 
		<form action="panel.php" method="post">
			<input name="consulta" type="hidden" value="GPSMOD" />
			<input name="" type="submit" value="CONTINUAR" class="confirma_eliminacion" style="width:87%; margin-top:6%;" />	
		</form><br><br>
		<span style="display:block; width:100%;"><br>Se ha insertado correctamente</span>
	
	';
				
				}
?>
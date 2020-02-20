<?php 
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Interactions</title>

<link href="../../css/panel.css" rel="stylesheet" type="text/css">
<style>body {background:#fff;padding:2%;}</style>
</head>
<body>
<?php 
include ('../../conexion.php');
if (isset($_POST['id_servidor'])) {
	
	$id_servidor=$_POST['id_servidor'];
	

echo '

<h4 style="text-align:center; background:#0b90e5; padding-top:4%; padding-bottom:4%; margin:0;">Interacciones</h4>';

$sacamos_imei=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE id='".$id_servidor."'");
while ($el_imei=odbc_fetch_object($sacamos_imei))
{
	 $imei_interacciones=$el_imei->imei; 
	 $dd=$el_imei->id; 
	 echo '<br><span style="color:#039; font-weight:bold;">Veh&iacute;culo : "'.$vehiculo_interacciones=$el_imei->nombre_vehiculo.'" - ID : '.$id_server=$el_imei->id.'</span><br>'; 
	 
	 $sacamos_cabecera=odbc_exec($conexion,"SELECT TOP 1 * FROM ZLECTURAS WHERE DEV_ID='".$imei_interacciones."'");
	 	while ($la_cabecera=odbc_fetch_object($sacamos_cabecera))
		{
			$MIHDR=$la_cabecera->HDR;
			$resultadoHDR = substr($MIHDR, 0, 5);
    	}
	 	
}

$consulta_tipo_interacciones=odbc_exec($conexion,"SELECT * FROM E_INVENTARIO_GENERAL WHERE id='".$id_servidor."'");

while ($las_interacciones=odbc_fetch_object($consulta_tipo_interacciones))
{
	 
	 //c1= APAGAR MOTOR
	 //c2= ENCENDER MOTOR
	 //c3= RESETEAR ODOMETRO
	 //c4= activar salida opcional
	 //c5= desactivar salida opcional
	 
	 $las_interacciones->c1; 
	 	if (!empty($las_interacciones->c1)) {
			
			echo '<br>
			      
			      <form action="#" method="post" class="form_interacciones">
				  Click para activar la funci&oacute;b de Apagado de Motor<br><br>
				    <input name="hd" type="hidden" value="'.$resultadoHDR.'" />
					<input name="i" type="hidden" value="'.$imei_interacciones.'" />
					<input name="c" type="hidden" value="1" />
					<input name="dd" type="hidden" value="'.$dd.'" />
					
				    <input name="" type="submit" value="apagar motor" class="interacciones_btn" />
				  </form><hr color="f8f8f8" /><br>
				  ';
			}
			
		if (!empty($las_interacciones->c2)) {
			echo '
			
			<form action="#" method="post" class="form_interacciones">
			      Click para activar la funci&oacute;b de Encendido de Motor<br><br>
				    <input name="hd" type="hidden" value="'.$resultadoHDR.'" />
					<input name="i" type="hidden" value="'.$imei_interacciones.'" />
					<input name="c" type="hidden" value="2" />
					<input name="dd" type="hidden" value="'.$dd.'" />
					
					<input name="" type="submit" value="encender motor" class="interacciones_btn" />
				  </form><hr color="f8f8f8" /><br>
				  ';
			}
			
		if (!empty($las_interacciones->c3)) {
			echo '
			
			<form action="#" method="post" class="form_interacciones">
			      Click para activar la funci&oacute;b de Resetear Odometro<br><br>
				    <input name="hd" type="hidden" value="'.$resultadoHDR.'" />
					<input name="i" type="hidden" value="'.$imei_interacciones.'" />
					<input name="c" type="hidden" value="3" />
					<input name="dd" type="hidden" value="'.$dd.'" />
					
					<input name="" type="submit" value="Resetear Odometro" class="interacciones_btn" />
				  </form><hr color="f8f8f8" /><br>
				  ';
			}
			
		if (!empty($las_interacciones->c4)) {
			echo '
			
			<form action="#" method="post" class="form_interacciones">
			      <h4 style="text-align:center; background:#0b90e5; color:#fff; padding-top:4%; padding-bottom:4%; margin:0;">Salida Opcional</h4><br>
			      Click para Activar Salida opcional<br><br>
				    <input name="hd" type="hidden" value="'.$resultadoHDR.'" />
					<input name="i" type="hidden" value="'.$imei_interacciones.'" />
					<input name="c" type="hidden" value="4" />
					<input name="dd" type="hidden" value="'.$dd.'" />
					
					<input name="" type="submit" value="activar" class="interacciones_btn" />
				  </form><hr color="f8f8f8" /><br>
				  ';
			}
			
		if (!empty($las_interacciones->c5)) {
			echo '
			
			<form action="#" method="post" class="form_interacciones">
			      Click para Desactivar Salida opcional<br><br>
				    <input name="hd" type="hidden" value="'.$resultadoHDR.'" />
					<input name="i" type="hidden" value="'.$imei_interacciones.'" />
					<input name="c" type="hidden" value="5" />
					<input name="dd" type="hidden" value="'.$dd.'" />
					
					<input name="" type="submit" value="desactivar" class="interacciones_btn" />
				  </form><hr color="f8f8f8" /><br>
				  ';
			}
	 
	 
	 
			  
	 
	 
	 
}





} 



else {echo 'error';}
?>

<?php 
include ('../../conexion.php');
if (isset($_POST['i'])) {
	$c=$_POST['c'];
	$hd=$_POST['hd']; 
	$i=$_POST['i'];
	$dd=$_POST['dd']; 

    odbc_exec($conexion."DELETE FROM K_INTERACCIONES_ESTATUS WHERE id_servidor='".$dd."' ");	
	
	
	if ($c=='1'){
	$comenado=''.$hd.'CMD;'.$i.';02;Disable1';}
	
	if ($c=='2'){
	$comenado=''.$hd.'CMD;'.$i.';02;Enable1';}
	
	if ($c=='3'){
	$comenado=''.$hd.'CMD;'.$i.';02;InitDist';}
	
	if ($c=='4'){
	$comenado=''.$hd.'CMD;'.$i.';02;Enable2';}
	
	if ($c=='5'){
	$comenado=''.$hd.'CMD;'.$i.';02;Disable2';}

    

    $ejecucion=odbc_exec($conexion,"INSERT INTO J_INTERACCIONES_LISTENER (comando,condicion,contador,id_servidor) VALUES ('".$comenado."','false','3','".$dd."')");
	header('Location:CMDIwait.php?dASRTSDsghdsjkj2345ahjAYuskksdk='.$dd.'');
	echo '<span class="notificacion">Se han insertado correctamente los datos</span>';
	
	

}
?>



</body>
</html>
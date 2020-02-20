<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Vista de Recorrido</title>
	<style>body {background:#f8f8f8; margin:0 auto;overflow:hidden;}</style>
  </head>
  
<body>

    <div style="width:98.5%; text-align:left; color:#fff; background:#7a8c9e; padding-top:0.25%; padding-bottom:0.7%; padding-left:1.5%; font-size:16px;"><img src="cariport.png" width="40" />&nbsp;Sistema de Localizaci&oacute;n de Posiciones</div>
	
	<div style="width:41%; float:left; text-align:left; color:#000; margin-left:1%; margin-top:1%;padding-top:0.5%; padding-bottom:0.5%; padding-left:0.5%; padding-right:0.5%;">
		<h3 style="margin:0; color:#000">Instrucciones:</h3>
		<p style="margin:0;">Copie y pegue la cadena<br />o el conjunto de cadenas que desea que el sistema rastre&eacute;.<br><br></p>
		<h3 style="margin:0; color:#000">Notas y ejemplos:</h3><br />
		<p style="margin:0;">1.- Ejemplo 1 (cadena individual) :<br></p>
		<span style="background:#fff;  border:solid thin #e2e2e2; font-size:11px; display:block; width:99%; text-align:left;padding-top:2%; padding-bottom:2%; padding-left:1%; color:#000;">
		HILUX Julio,17/Jun/2017 01:20:36,Vehiculo ha sido Apagado,12,25.709246,-100.160993,0,0,53221.66
		</span>
		<span style="background:#F8F8F8; font-size:12px; display:block; width:99%; text-align:left;padding-top:2%; padding-bottom:2%; padding-left:1%; color:#999;">
		NOTA:<br>
		En este caso no es necesario aplicar un salto de linea.
		</span>
	    <br>
		<p style="margin:0;">2.- Ejemplo 2 (cadenas multiples) :<br></p>
		<span style="background:#fff; border:solid thin #e2e2e2; font-size:11px; display:block; width:99%; text-align:left;padding-top:2%; padding-bottom:2%;padding-left:1%;color:#000;">
		HILUX Julio,17/Jun/2017 01:20:36,Vehiculo ha sido Apagado,12,25.709246,-100.160993,0,0,53221.66<br />
		HILUX Julio,17/Jun/2017 07:43:27,Vehiculo Encendido,12,25.709246,-100.160979,0,0,53221.66<br />
		HILUX Julio,17/Jun/2017 07:44:26,Vehiculo Encendido,12,25.709253,-100.160977,0,0,53221.661
		</span>
		<span style="background:#F8F8F8; font-size:12px; display:block; width:99%; text-align:left;padding-top:2%; padding-bottom:2%; padding-left:1%; color:#999;">
		NOTA:<br>
		Notese que al Incluir varias cadenas usted debera de agregar un salto de linea por cada cadena incluida (presionando la tecla enter)
		<br /><br />
		Tal y lo refiere el ejemplo citado.
		</span>
	</div>
	
	<div style="width:53%; float:right; text-align:left; color:#7c8d9d;padding-top:0.5%;margin-right:1%; margin-top:1%; padding-bottom:0.5%; padding-left:1%; padding-right:1%;">
		<form method="post" action="mapa.php">
		<span style="dislay:block; width:100%; text-align:right;font-size:10px;">INSERTE LA CADENA O CONJUNTO DE CADENAS AQUI:...</span>
		<textarea  name="cadenaEntrante" style="width:99.8%; height:70%;" required></textarea>
		<br>
		<input type="submit" value="obtener detalles" style="width:30%; margin-left:0%; margin-top:1%; padding-top:2%; padding-bottom:2%; cursor:pointer; color:#7a8c9e;">
		</form>
	</div>
	
   
    
    <div style="position:absolute; width:98%; text-align:right; font-size:10px; color:#7a8c9e; padding-top:0.4%; padding-bottom:0.4%; padding-right:2%;background:#d0d8e0; bottom:0;">AVL SYSTEMS; Derechos Reservados 2017</div>
 
    




    
	
	
	
	
  </body>
</html>
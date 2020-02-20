<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
		<link rel="stylesheet" type="text/css" href="css/select/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/select/css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/select/css/cs-skin-underline.css" />
</head>

<body>
<div id="menu_general">
	<h2 style="margin-top:7px;color:#000; font-size:22px;">Menu suntech</h2>
    <div class="cerrar_menu"><img src="img/cerrar.png" width="100%" /></div>
    <?php
    
	//NO GOB CASE	
	if ($_SESSION['MM_Username']!==$localFactoryUser) {
			
			$consultar_tipo_usuario = odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE nombre_usuario='".$_SESSION['MM_Username']."'");
			while ($rows = odbc_fetch_object($consultar_tipo_usuario)) { 
			$tipo=$rows->tipo;
			$mi_user_name=$rows->nombre_usuario;
	        }
			
			//YES DISTRIBUITORS CASE
			if ($tipo=='Distribuidor') 
			{
			include ('MN/YESDIST-CASE.php');	
			}
		    //YES DISTRIBUITORS CASE
				
				
		    //NOT DISTRIBUITORS CASE	
		    else {
			include ('MN/NODIST-CASE.php');
		    }
		    //NOT DISTRIBUITORS	CASE	
			
		
	}
	//NO GOB CASE	
	
	
	
	
	
	//YES GOB CASE	
	if ($_SESSION['MM_Username']==$localFactoryUser) {
	    include ('MN/GOB-CASE.php');
	}
	//YES GOB CASE
	?>
        
        
        
        
				
		
        
        
        <script src="css/select/js/classie.js"></script>
		<script src="css/select/js/selectFx.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
		
    
     
</div>
</body>
</html>
<?php 
session_start();
?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Documento sin título</title>
<style>
body {margin:0 auto;font-family: 'Open Sans Condensed', sans-serif; font-size:80%; background:url(img/bg_map.jpg);
background-size:100%;

}
.admin_text {color:#ccc; font-size:500%;}
.campos {width:96%; padding-left:3%; padding-top:6%; padding-bottom:6%; border:none; background:#f8f8f8; font-size:400%}
.btn_ingreso {width:100%; margin-right:0px; padding-top:8%; padding-bottom:8%; cursor:pointer;border:none; color:#fff; font-size:400%;
background:#b60500;-webkit-border-radius:3px;
	-moz-border-radius:3px;
	-o-border-radius:3px;
	border-radius:3px;

}
h1 {margin-bottom:2px; color:#003243;}
h2 {color:#999; margin-top:2px; font-size:170%; font-weight:normal;}
.table{
	width:96%;
	padding-left:2%; 
	padding-right:2%; 
	padding-bottom:0%;
  padding-top:0%;
  margin-top:10%; 
  background-color:#000;
  -webkit-border-radius:6px;
	-moz-border-radius:6px;
	-o-border-radius:6px;
	border-radius:6px;
	
	behavior: url(css/PIE.htc);}

</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


</head>

<body>
<table align="center" border="0" cellspacing="0" cellpadding="0" class="table">
  <tr>
    <td width="0%"></td>
    <td width="100%" align="center" >
    <br />
    				<img src="img/logo_circular.png" width="100%" />
    				
                     <br />
    				<form action="panel.php" method="post">
                	  
                      <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                	   
                      
                	    <tr>
                	      <td height="30" colspan="2" align="center"><span class="admin_text">Usuario:</span></td>
                        </tr>
                	    <tr bgcolor="#f8f8f8">
						  <td width="20%" height="40" align="center" valign="middle"><img src="img/ico_usuario.png" width="80%" /></td>
                	      <td align="center" valign="middle"><label for="nombre"></label>
                	        <span id="sprytextfield1">
                	        <input name="nombre_usuario" type="text" class="campos" id="nombre_administrador" />
               	          </span>
						  </td>
              	      </tr>
                	   
                	    <tr>
                	      <td height="30" colspan="2" align="center"><span class="admin_text">Contrase&ntilde;a:</span></td>
                        </tr>
                	    
                	    <tr bgcolor="#f8f8f8">
						  <td height="40" width="10%" align="center"> <img src="img/sell.png" width="80%" /></td>
                	      <td align="center"><label for="clave"></label>
                	        <span id="sprytextfield2">
                	        <input name="contrasenia" type="password" class="campos" id="clave"  />
               	         <br /></span></td>
              	      </tr>
                      <tr>
                	      <td colspan="2" align="center">&nbsp;</td>
                        </tr>
                      
                      <tr>
                	      <td colspan="2" align="center"><label for="acceso">
                	        <input name="button" type="submit" class="btn_ingreso" id="button" value="ACCEDER" />
                	        </label>              	        </td>
                        </tr>
                      <tr>
                	      <td colspan="2" align="center">&nbsp;</td>
                        </tr>
                      
                	  
                	   
                	 
              	      </table>
                    
                    
                    
                    </form>
    
    
    
    </td>
    <td width="0%"></td>
  </tr>
 
</table>
<div align="center"><a href="isesadmin" style="text-decoration:none; cursor:alias">.</a></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>


</body>
</html>
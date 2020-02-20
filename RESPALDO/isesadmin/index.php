<?php 
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="https://fonts.googleapis.com/css?family=Denk+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Belleza" rel="stylesheet">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="css/panel.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include ('modules/SS.php');?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>
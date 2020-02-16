<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
<?php 

session_start();
session_destroy();
header("Location: index.php");

?>
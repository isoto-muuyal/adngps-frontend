<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
<?php 
$servidor= "Driver={SQL Server};Server=WIN-L5D6H0K72NT;Database=PAvl2002;Integrated Security=SSPI;Persist Security Info=False;";
$conexion = odbc_connect( $servidor, 'sa', 'Avlmexico$123' );

$localFactoryName='mdv';
$localFactoryUser='Multicom';
$globalGG='1000';

$k1='AIzaSyAJ-u97p-COsfb_Rzm-GL5UasgEOB-ABkk';
$k2='AIzaSyBgcd20sWtMBhoRk5dwqnYG8NmjjqmMzuo';

if ($conexion) {echo '';} else {echo '';}
?>
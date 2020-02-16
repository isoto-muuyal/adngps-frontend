<?php 
if (!isset($_SESSION['MM_Username'])){
	header('Location:index.php');
	}
?>
<?php 
$servidor= "Driver={SQL Server};Server=WIN-KNH80G116J5;Database=PAvl2002;Integrated Security=SSPI;Persist Security Info=False;";
$conexion = odbc_connect( $servidor, 'sa', 'Avlmexico$123' );

$localFactoryName='Avlmexico';
$localFactoryUser='Admin';

$k1='AIzaSyAJ-u97p-COsfb_Rzm-GL5UasgEOB-ABkk';
$k2='AIzaSyBgcd20sWtMBhoRk5dwqnYG8NmjjqmMzuo';


if ($conexion) {echo '';} else {echo '';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<style>
.td_1 {background:#e2e2e2}
.td_2 {background:#f4f4f4}
.td_titles {background:#F1E3CF}
.td_pagos {background:#F1F1F1; color:red; font-weight:bold; text-align:center;}
.letras_tenues {color:#ccc;}
.letras_fuertes {color:#ccc;  padding:5%;}
.letras_fuertes_sin_cobro {color:#000; }
td {background:#F8F8F8}

.col13 {color:red;}
.col14 {color:red;}

.total {background:#e2e2e2; padding:0.2%; color:#000;}
</style>
<body>
<?php
//DOCE MESES
if ($periodo==12) {
	$el_user_filtrado=$_POST['el_user_filtrado'];   
	$periodo=$_POST['periodo'];  
	//CONSULTAMOS EQUIPOS
	$c_equipos=odbc_exec ($conexion,"SELECT * FROM vehiculos_usuarios WHERE nombre_empresa='".$el_user_filtrado."'");
	
	//ARREY EQUIPOS POR EMPRESA
	echo '
	        <table id="sum_table" width="95%" border="0">
			 
			 <tr height="30"> 
			    <td class="td_1" width="10%" align="center">INFO</td>
				<td class="td_1" width="6%" align="center">Enero</td>
				<td class="td_1" width="6%" align="center">Febrero</td>
				<td class="td_1" width="6%" align="center">Marzo</td>
				<td class="td_1" width="6%" align="center">Abril</td>
				<td class="td_1" width="6%" align="center">Mayo</td>
				<td class="td_1" width="6%" align="center">Junio</td>
				<td class="td_1" width="6%" align="center">Julio</td>
				<td class="td_1" width="6%" align="center">Agosto</td>
				<td class="td_1" width="6%" align="center">Septiembre</td>
				<td class="td_1" width="6%" align="center">Octubre</td>
				<td class="td_1" width="6%" align="center">Nobiembre</td>
				<td class="td_1" width="6%" align="center">Diciembre</td>
				<td class="td_1" width="6%" align="center">Este a&ntilde;o cubrira:</td>
				<td class="td_1" width="6%" align="center">Total del Plan</td>
			</tr>
			 
			
			';
	while ($dato_equipos = odbc_fetch_object($c_equipos))
                        {
							$fechaFacturacion=$dato_equipos->fecha_facturacion;
							$nombre_empresa=$dato_equipos->nombre_empresa;
							$usuario=$dato_equipos->usuario;
							$nombre_vehiculo=$dato_equipos->nombre_vehiculo;
							$id_vehiculo=$dato_equipos->id_vehiculo;
							$plan=$dato_equipos->plan;
							$proximo_pago=$dato_equipos->proximo_pago;
							
							
				      		$el_aniobalance= date ("Y");
							
							$m1=$el_aniobalance.'-01-25';
							$m2=$el_aniobalance.'-02-25';
							$m3=$el_aniobalance.'-03-25';
							$m4=$el_aniobalance.'-04-25';
							$m5=$el_aniobalance.'-05-25';
							$m6=$el_aniobalance.'-06-25';
							$m7=$el_aniobalance.'-07-25';
							$m8=$el_aniobalance.'-08-25';
							$m9=$el_aniobalance.'-09-25';
							$m10=$el_aniobalance.'-10-25';
							$m11=$el_aniobalance.'-11-25';
							$m12=$el_aniobalance.'-12-25';
							
							//CONSULTAMOS LOS PLANES PARA SACAR PRECIO DE CADA EQUIPO
							$c_planes=odbc_exec ($conexion,"SELECT * FROM planes WHERE id='".$plan."'");
							while ($dato_plan = odbc_fetch_object($c_planes))
                        	{
							$elPlan=$dato_plan->costo;
							}
							
							$mitotalPlanAnual=$elPlan*12;
							
							
				
				echo '
					<tr height="70">
					<td class="td_2">Fac: '.$fechaFacturacion.'<br>Usuario : '.$usuario.'<br>Vehiculo: '.$nombre_vehiculo.'-'.$id_vehiculo.'</td>';
							
							
							
							if ($fechaFacturacion<=$m1){
							
							echo '<td class="col1" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m2){
							
							echo '<td class="col2" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m3){
							
							echo '<td class="col3" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m4){
							$subtotalesteanio=$elPlan * 9;
							echo '<td class="col4" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m5){
							$subtotalesteanio=$elPlan * 8;
							echo '<td class="col5" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m6){
							$subtotalesteanio=$elPlan *7;
							echo '<td class="col6" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m7){
							$subtotalesteanio=$elPlan * 6;
							echo '<td class="col7" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m8){
							$subtotalesteanio=$elPlan * 5;
							echo '<td class="col8" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m9){
							$subtotalesteanio=$elPlan * 4;
							echo '<td class="col9" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m10){
							$subtotalesteanio=$elPlan * 3;
							echo '<td class="col10" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m11){
							$subtotalesteanio=$elPlan * 2;
							echo '<td class="col11" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>';
							}
							
							if ($fechaFacturacion<=$m12){
							$subtotalesteanio=$elPlan * 1;
							echo '<td class="col12" align="center"><span class="letras_fuertes">'.$elPlan.'</span></td>
							';}
							else {echo '<td class="td_2" align="center"><span class="letras_tenues"></span></td>
							';
							}
								
							if ($fechaFacturacion==$m1) {
							$subtotalesteanio=$elPlan * 12;	
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m2) {
							$subtotalesteanio=$elPlan * 11;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m3) {
							$subtotalesteanio=$elPlan * 10;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m4) {
							$subtotalesteanio=$elPlan * 9;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m5) {
							$subtotalesteanio=$elPlan * 8;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m6) {
							$subtotalesteanio=$elPlan * 7;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m7) {
							$subtotalesteanio=$elPlan * 6;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m8) {
							$subtotalesteanio=$elPlan * 5;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m9) {
							$subtotalesteanio=$elPlan * 4;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m10) {
							$subtotalesteanio=$elPlan * 3;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m11) {
							$subtotalesteanio=$elPlan * 2;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							if ($fechaFacturacion==$m12) {
							$subtotalesteanio=$elPlan * 1;
							echo '<td class="col13" align="center">'.$subtotalesteanio.'</td>';
							}
							
							$totalplan=$elPlan * 12;
							echo '<td class="col14" align="center">'.$totalplan.'</td>';
							
							echo '</tr>';
						}
	
			echo '
					<tr height="30">
						<td class="td_1" width="10%" align="center" style="color:red; font-weight:bold;">TOTALES</td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" align="center"></td>
						<td class="total" width="6%" style="background:#fff; color:red; font-weight:bold; border:solid thin #000;" width="7%" align="center"></td>
						<td class="total" width="6%" style="background:#fff; color:red; font-weight:bold; border:solid thin #000;" width="7%" align="center"></td>
					</tr>
					
					
					
					
				
			
			</table>';
			
			
    
						    
							
				
			
			
				
}
//DOCE MESES
?>


<script>
var getSum = function (colNumber) {
    var sum = 0;
    var selector = '.col' + colNumber;
    
	
	
    $('#sum_table').find(selector).each(function (index, element) {
        sum += parseInt($(element).text());
    });  

    return sum;        
};
$('#sum_table').find('.total').each(function (index, element) {
    $(this).text('$' + getSum(index + 1) + '.00'); 
	
	
});



</script>
</body>
</html>
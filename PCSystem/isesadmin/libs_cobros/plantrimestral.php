<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
//DOCE MESES
			if ($periodo==4) {
				
				$el_user_filtrado=$_POST['el_user_filtrado']; 
			    $periodo=$_POST['periodo']; 
				
				$consulta_pagos=odbc_exec ($conexion,"SELECT * FROM vehiculos_usuarios WHERE nombre_empresa='".$el_user_filtrado."' AND pagos='".$periodo."'");
				
				$numero_de_reultados_array = odbc_exec($conexion, "SELECT Count(*) AS counter FROM vehiculos_usuarios WHERE nombre_empresa='".$el_user_filtrado."' AND pagos='".$periodo."'");
    
						$arrcount = odbc_fetch_array($numero_de_reultados_array);
    					$miNumArray=$arrcount['counter'];
						
						if ($miNumArray!=0) {
						
	
	             echo '
				<div style="background:#f8f8f8; margin-top:20px; overflow:scroll;height:auto;width:96%; padding:2%;">';
				while ($dato_pago = odbc_fetch_object($consulta_pagos))
                        {
							$fechaFacturacion=$dato_pago->fecha_facturacion;
							$nombre_empresa=$dato_pago->nombre_empresa;
							$usuario=$dato_pago->usuario;
							$nombre_vehiculo=$dato_pago->nombre_vehiculo;
							$id_vehiculo=$dato_pago->id_vehiculo;
							$plan=$dato_pago->plan;
							$proximo_pago=$dato_pago->proximo_pago;
							 
							 
							echo '
				
				
				<table width="100%" border="1" bordercolor="e2e2e2" cellpadding="0" cellspacing="0" style="color:#fff">
					  
					  <tr style="color:#999; text-align:center; font-weight:bold;" height="40" bgcolor="#fff">
					  <td width="10%" style="text-align:left;">
					  Fac : '.$fechaFacturacion.'<br>Empresa : '.$nombre_empresa.'<br>Usuario : '.$usuario.'<br>Vehiculo : '.$nombre_vehiculo.' - '.$id_vehiculo.'
					  </td>';
					  
					  $consulta_plan=odbc_exec ($conexion,"SELECT * FROM planes WHERE id='".$plan."'");
						while ($dato_plan = odbc_fetch_object($consulta_plan))
                        {
							$micosto=$dato_plan->costo;
						}
						
					  echo '<td width="7%">';
					         
					  
					  echo 
					  '</td>
					  <td width="7%">';
					  
					  		
					  
					  echo '</td>
					  <td width="7%">'; 
					  
					  		  //PROXIMO PAGO 3
						     $proximo_pago3 = strtotime ( '+3 month' , strtotime ( $fechaFacturacion ) ) ;
							 $proximo_pago3 = date ( 'Y-m-d' , $proximo_pago3 );
							 
							 if ($proximo_pago3==$proximo_pago) {echo '<span class="aviso_prox_pago">'.$proximo_pago3.'</span>';}
							 else {echo $proximo_pago3;}
							 echo '<br>$'.$micosto.'.00';
							 //PROXIMO PAGO 3
					  
					  echo'</td>
					  <td width="7%">';
					  
					  		
					  
					  echo '</td>
					  <td width="7%">';
					  
					  	
					  
					  echo '</td>
					  <td width="7%">';
					  
					  		 //PROXIMO PAGO 6
						     $proximo_pago6 = strtotime ( '+6 month' , strtotime ( $fechaFacturacion ) ) ;
							 $proximo_pago6 = date ( 'Y-m-d' , $proximo_pago6 );
							 if ($proximo_pago6==$proximo_pago) {echo '<span class="aviso_prox_pago">'.$proximo_pago6.'</span>';}
							 else {echo $proximo_pago6;}
							 echo '<br>$'.$micosto.'.00';
							 //PROXIMO PAGO 6
					  
					  echo '</td>
					  <td width="7%">';
					  
					  		
					  
					  echo '</td>
					  <td width="7%">';
					  
					  		
					  
					  echo '</td>
					  <td width="7%">';
					  
					  		//PROXIMO PAGO 9
						     $proximo_pago9 = strtotime ( '+9 month' , strtotime ( $fechaFacturacion ) ) ;
							 $proximo_pago9 = date ( 'Y-m-d' , $proximo_pago9 );
							 if ($proximo_pago9==$proximo_pago) {echo '<span class="aviso_prox_pago">'.$proximo_pago9.'</span>';}
							 else {echo $proximo_pago9;}
							 echo '<br>$'.$micosto.'.00';
							 //PROXIMO PAGO 9
					  
					  echo '</td>
					  <td width="7%">';
					  
					  		
					  
					  echo '</td>
					  <td width="7%">';
					  
					  		
					  
					  echo '</td>
					  <td width="7%">'; 
					  
					         //PROXIMO PAGO 12
						     $proximo_pago12 = strtotime ( '+12 month' , strtotime ( $fechaFacturacion ) ) ;
							 $proximo_pago12 = date ( 'Y-m-d' , $proximo_pago12 );
							 if ($proximo_pago12==$proximo_pago) {echo '<span class="aviso_prox_pago">'.$proximo_pago12.'</span>';}
							 else {echo $proximo_pago12;}
							 echo '<br>$'.$micosto.'.00';
							 //PROXIMO PAGO 12
					  
					  echo '</td>
					  
					  <td bgcolor="#f1f1f1">'; $totalPlan=$micosto * 4; echo 'Total Plan : <br><span style="color:red; font-weight:bold;">$'.$totalPlan.'.00</span>'; echo '</td>
					  </tr>
					  
					 
					</table>';
					

						
					}
					
					        $el_diabalance= '25';
				      		$el_mesbalance= date ("m");
				      		$el_aniobalance= date ("Y");
					  
					  		$fechabalance=$el_aniobalance.'-'.$el_mesbalance.'-'.$el_diabalance;
					  
					  		
					  
					  $consulta_pagos2=odbc_exec ($conexion,"SELECT * FROM vehiculos_usuarios WHERE nombre_empresa='".$el_user_filtrado."' AND pagos='".$periodo."' AND proximo_pago='".$fechabalance."'");
					  
					  $numero_de_reultados = odbc_exec($conexion, "SELECT Count(*) AS counter FROM vehiculos_usuarios WHERE nombre_empresa='".$el_user_filtrado."' AND pagos='".$periodo."' AND proximo_pago='".$fechabalance."'");
    
						$arr = odbc_fetch_array($numero_de_reultados);
    					$miNum=$arr['counter'].' Equipos por cobrar a esta fecha a la empresa '.$el_user_filtrado.'</h3><br>';
					
					while ($dato_pago = odbc_fetch_object($consulta_pagos2))
                        {
							$proximo_pago=$dato_pago->proximo_pago;
							$elPlan=$dato_pago->plan;
							
							 $consulta_costo=odbc_exec ($conexion,"SELECT * FROM planes WHERE id='".$elPlan."'");
							 while ($dato_costo = odbc_fetch_object($consulta_costo))
                        		{
									$miCosto=$dato_costo->costo.'<br>';
									if($miNum!==0) {
									$miBalance=$miCosto * $miNum;
									} else {$miBalance='sin balance';}
								}
							    
						}
				
				     echo '<br><table width="100%" border="0" bgcolor="#fff">
						  <tr height="40">
							<td width="60%"></td>
							<td align="right" width="10%">'.$miNum.'</td>
							<td bgcolor="#f1f1f1" width="30%">';
							if (isset($miBalance)) {echo '<h1 style="color:#000;">Por cobrar: $'.$miBalance.'.00</h1>';}
							echo '</td>
							
						  </tr>
						  
						</table>';
				
					echo '</div>'; } // CIERRE CONDICION miNumArray!=0 
					else {echo '';}
				
				}
			//DOCE MESES
?>
</body>
</html>
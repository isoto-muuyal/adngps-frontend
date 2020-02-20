// JavaScript Document

$(document).on ("ready", main);
function main() {
	
	$("#btn_open_options_travel_filter").on("click", abriendo_opciones);
	$("#cerrar_opciones_recorrido").on("click", cierra_opciones);
	$("#btn_open_options_travel_filter_filter_users").on("click", abriendo_opciones_con_filtro_vehiculo);
	$("#cerrar_opciones_recorrido_con_filtro_vehiculo").on("click", cierra_opciones_con_filtro_vehiculo_ok);
	
	}
	
	function abriendo_opciones() {
		
		$("#muestra_opciones_filtro_recorrido_movil").animate({
			
			opacity:'1',
			height:'220'
			
		},100);
		
	}
	
	function cierra_opciones() {
		
		$("#muestra_opciones_filtro_recorrido_movil").animate({
			
			opacity:'0',
			height:'0'
			
		},100);
		
	}
	
	function abriendo_opciones_con_filtro_vehiculo() {
		
		$("#CBTI_container").animate({
			
			opacity:'1',
			width:'90%',
			
			
		},100);
		
		$("#cerrar_opciones_recorrido_con_filtro_vehiculo").animate({
			
			opacity:'1'
		},100);
		
	}
	
	function cierra_opciones_con_filtro_vehiculo_ok() {
		
		$("#CBTI_container").animate({
			
			opacity:'0',
			width:'0'
			
		},100);
		
		$("#cerrar_opciones_recorrido_con_filtro_vehiculo").animate({
			
			opacity:'0'
		},100);
		
	}
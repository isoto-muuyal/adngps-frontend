// JavaScript Document

$(document).on ("ready", main);
function main() {
	
	$(".mostrar_seguimiento").on("click", abriendo_el_seguimiento);
	$(".ocultar_seguimiento").on("click", cerrando_el_seguimiento);
	}
	
	function abriendo_el_seguimiento() {
		
		$(".ventana_seguimiento_recorridos").animate({
			
			opacity:'1', height:'50%', width:'270px'
		},400);
		$(".mostrar_seguimiento").animate({
			
			marginTop:'-200px'
		},0);
		
		$(".ocultar_seguimiento").animate({
			
			marginTop:'90px'
		},0);
		
	}
	
	function cerrando_el_seguimiento() {
		
		$(".ventana_seguimiento_recorridos").animate({
			
			opacity:'0', height:'0%', width:'0px'
		},10);
		$(".mostrar_seguimiento").animate({
			
			marginTop:'0px'
		},0);
		
		$(".ocultar_seguimiento").animate({
			
			marginTop:'-200px'
		},0);
		
	}
	
	
	
	
		
	
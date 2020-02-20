// JavaScript Document

$(document).on ("ready", main);
function main() {
	
	$("#icono_abre_menu").on("click", abriendo_el_menu);
	$(".cerrar_menu").on("click", cierra_el_menu);
	
	}
	
	function abriendo_el_menu() {
		
		$("#menu_general").animate({
			
			opacity:'1',
			marginLeft:'0'
			
		},300);
		
	}
	
	function cierra_el_menu() {
		
		$("#menu_general").animate({
			
			opacity:'0',
			marginLeft:'-100%'
			
		},300);
		
	}
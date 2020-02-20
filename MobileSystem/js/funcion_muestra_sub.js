// JavaScript Document

	$(document).on("ready", function(){
			
			$( "#funcion_herramientas" ).click(function() {
        		
				$( "#cont_funciones_herramientas" ).animate({
         
		 		opacity: 0,
    			marginTop: "-250px",
				
    
  				}, 0, function() {
   
  				});
				
				$( "#cont_funciones_herramientas" ).animate({
         
		 		opacity: 1,
    			marginTop: "0px",
				
    
  				}, 300, function() {
   
  				});
			});
			
			
			$( "#contenedor_geral" ).click(function() {
        		
				$( "#cont_funciones_herramientas" ).animate({
         
		 		opacity: 0,
    			marginTop: "-250px",
				
    
  				}, 0, function() {
   
  				});
				
			});
					
			
})

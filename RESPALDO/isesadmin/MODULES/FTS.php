<?php 
        //MODELOS GPS
		if ($consulta=='GPSMOD') {include('MODULES/GPSMOD/index.php');};
		//MODELOS GPS
		
		//SIMS
		if ($consulta=='SMS') {include('MODULES/SMS/index.php');};
		//SIMS
		
		//PLANES
		if ($consulta=='PLANES') {include('MODULES/PLANS/index.php');};
		//PLANES
		
		//INVENTARIO GENERAL DISPOSITIVOS
		if ($consulta=='DEVICES') {include('MODULES/DEVICES/index.php');};
		//INVENTARIO GENERAL DISPOSITIVOS
		
		//INVENTARIO_EMPRESAS
		if ($consulta=='COMPANIES') {include('MODULES/COMPANIES/index.php');};
		//INVENTARIO_EMPRESAS
		
		//USUARIOS
		if ($consulta=='USERS') {include('MODULES/USERS/index.php');};
		//USUARIOS
		
		//INTERACTIONS
		if ($consulta=='INTERACTIONS') {include('MODULES/INTERACTIONS/index.php');};
		//INTERACTIONS
		
		//GEOSYSTEMS
		if ($consulta=='GEOSYSTEMS') {include('MODULES/GEOSYSTEMS/index.php');};
		//GEOSYSTEMS
		
		//RESET EQUIPOS cuidado!
		if ($consulta=='clean_devices') {include('MODULES/RSTD.php');};
		//RESET EQUIPOS cuidado!
		
		//RES
		if ($consulta=='admin_geocercas') {include('12admingeocercas.php');};
		//RES

                //DIAGNOSIS
		if ($consulta=='DIAGNOSIS') {include('MODULES/DIAGNOSIS/index.php');};
		//DIAGNOSIS
		
		//VISUALIZADOR Pagos Clientes
		if ($consulta=='pagos_clientes') {include('14pagos_clientes.php');};
		//VISUALIZADOR Pagos Clientes
?>
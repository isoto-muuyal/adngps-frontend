<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<h1>Menu </h1>
    <br /><h5>Inventarios Genrales</h5>
    <form action="panel.php" method="post">
   	  <input name="consulta" type="hidden" value="GPSMOD" />
      <input name="" type="submit" value="Inventario de Modelos" class="btn_menu_general_int"  />
    </form>
    
      <form action="panel.php" method="post">
        <input name="consulta" type="hidden" value="SMS" />
        <input name="" type="submit" value="Inventario tarjetas Sims" class="btn_menu_general_int" />
        </form>
    
    <br /><h5>Empresas y Usuarios</h5>
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="COMPANIES" />
        <input name="" type="submit" value="Las empresas" class="btn_menu_general_int"  />
    </form>
    
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="USERS" />
        <input name="" type="submit" value="Los Usuarios" class="btn_menu_general_int"  />
    </form>
    <br /><h5>Control de Sistema</h5>
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="DEVICES" />
        <input name="" type="submit" value="&bull; Dispositivos - Veh&iacute;culos" class="btn_menu_general_int"  />
    </form>
    
    
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="INTERACTIONS" />
        <input name="" type="submit" value="&bull; Interacciones" class="btn_menu_general_int"  />
    </form>
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="GEOSYSTEMS" />
        <input name="" type="submit" value="&bull; Geo-Cercas" class="btn_menu_general_int"  />
    </form>
    <br /><h5>Finanzas</h5>
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="PLANES" />
        <input name="" type="submit" value="Planes Tarifarios" class="btn_menu_general_int"  />
    </form>
    <!--<form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="pagos_clientes" />
        <input name="" type="submit" value="Pagos Clientes" class="btn_menu_general_int"  />
    </form>-->
    <br /><h5>Diagnostico</h5>
    <form action="panel.php" method="post" >
   	  <input name="consulta" type="hidden" value="DIAGNOSIS" />
        <input name="" type="submit" value="&bull; Estatus Dispositivos" class="btn_menu_general_int"  />
    </form>
</body>
</html>
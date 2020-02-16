<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>



		<!--FORMULARIO INSERCION EN INVENTARIO-->
     <form action="panel.php" method="post">

     <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        <tr class="miTRFilter">
           <td class="miTDtitleFilter" valign="top" width="50%" colspan="2">
           DATOS DEL USUARIO:
           </td>
           
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
           Nombre de Usuario: <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
           Contrase&ntilde;a : <br />
           </td>
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="nombre_usuario" type="text" class="campo_general_FILTER" title="Por favor introduzca el Nombre de Usuario para dar de Alta" required  />
           </td>
            <td class="miTDFilter" valign="top">
           <input name="contrasenia" type="text" class="campo_general_FILTER" title="Por favor introduzca la Contrase&ntilde;a para dar de Alta" required />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
            Nombre Completo : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            Correo : <br />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="nombre_completo" type="text" class="campo_general_FILTER" title="Por favor introduzca el Nombre Completo del Usuario" required />
           </td>
           <td class="miTDFilter" valign="top">
           <input name="correo" type="email" class="campo_general_FILTER" title="Por favor introduzca el correo para recibir notificaciones"  required />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="50%" colspan="2">
           PARA LE EMPRESA:
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="50%" colspan="2">
           <select name="nombre_empresa" class="campo_general_FILTER_SELECT">
               <?php 
			     echo '<option>'.$localFactoryName.'</option>';
                 $consulta_empresas=odbc_exec ($conexion,"SELECT * FROM F_EMPRESAS");
                 while ($las_empresas = odbc_fetch_object($consulta_empresas))
                 {
                 $empresas=$las_empresas->nombre_empresa; echo '<option>'.$empresas.'</option>';
                 }
                 ?>
           </select>
           </td>
        </tr>
        
       </table>
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        <tr class="miTRFilter">
           <td class="miTDtitleFilter" valign="top" width="50%" colspan="2">
           FUNCIONES:
           </td>
           
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
           Usuario Padre: <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
           Tipo de Usuario : <br />
           </td>
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <select name="usuario_padre" class="campo_general_FILTER_SELECT">
               <?php 
			     echo '<option>'.$localFactoryUser.'</option>';
                 $consulta_usuarios=odbc_exec ($conexion,"SELECT * FROM G_USUARIOS WHERE tipo='Distribuidor'");
                 while ($los_usuarios = odbc_fetch_object($consulta_usuarios))
                 {
                 $usuarios=$los_usuarios->nombre_usuario; echo '<option>'.$usuarios.'</option>';
                 }
                 ?>
              </select>
           </td>
            <td class="miTDFilter" valign="top">
           <select name="tipo" class="campo_general_FILTER_SELECT">
               <option>Maestra</option>
               <option>Distribuidor</option>
           </select>
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
            Zona Horaria : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            Geocercas : <br />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="zona_horaria" type="number" class="campo_general_FILTER" title="Por favor introduzca su Zona Horaria para dar de Alta" required />
           </td>
           <td class="miTDFilter" valign="top">
           <input name="geocercas" type="text" class="campo_general_FILTER" value="0" />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
            Activa : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            Aviso de Acceso : <br />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <select name="activa" class="campo_general_FILTER_SELECT">
               <option>SI</option>
               <option>NO</option>
           </select>
           
           </td>
           <td class="miTDFilter" valign="top">
           <select name="aviso_acceso" class="campo_general_FILTER_SELECT">
               <option>NO</option>
               <option>SI</option>
           </select>
           </td>
        </tr>
        
       </table>
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
              <input name="confirma" type="hidden" value="si" />
              <input name="consulta" type="hidden" value="USERS" />
              <input name="" type="submit" value="Agregar Usuario" class="btn_menu_general_FILTER" />
           </td>
           
        </tr>
        
        
        
       
        
        
       </table>
       
       </form>
    
     
    
     <!--CIERRE DE FORMULARIO INSERCION EN INVENTARIO-->





      
      
               
</body>
</html>
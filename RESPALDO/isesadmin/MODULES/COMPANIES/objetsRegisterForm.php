<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>


<!--FORMULARIO INSERCION DE EMPRESAS-->
     <form action="panel.php" method="post">
     
       
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        <tr class="miTRFilter">
           <td class="miTDtitleFilter" valign="top" width="50%" colspan="2">
           DATOS DE LA EMPRESA::
           </td>
           
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%" colspan="2">
           Nombre Empresa : <br />
           </td>
           
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" colspan="2">
           <input name="nombre_empresa" type="text" class="campo_general_FILTER" required />
           </td>
          
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
           Raz&oacute;n Social: <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
           RFC : <br />
           </td>
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="razon_social" type="text" class="campo_general_FILTER" value="p*" />
           </td>
            <td class="miTDFilter" valign="top">
           <input name="rfc" type="text" class="campo_general_FILTER" value="p*" />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
            USUARIO : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            CONTRASE&Ntilde;A : <br />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="nombre_usuario" type="text" class="campo_general_FILTER" required />
           </td>
           <td class="miTDFilter" valign="top">
           <input name="contrasenia" type="text" class="campo_general_FILTER" required />
           </td>
        </tr>
        
       </table>
       
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        <tr class="miTRFilter">
           <td class="miTDtitleFilter" valign="top" width="50%" colspan="2">
           UBICACION:
           </td>
           
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%" colspan="2">
           Direcci&oacute;n : <br />
           </td>
           
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" colspan="2">
           <input name="direccion" type="text" class="campo_general_FILTER" value="p*" />
           </td>
          
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
           C&oacute;digo Postal: <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
           Pais : <br />
           </td>
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="codigo_postal" type="text" class="campo_general_FILTER" value="p*" />
           </td>
            <td class="miTDFilter" valign="top">
           <input name="pais" type="text" class="campo_general_FILTER" value="Mexico" />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
            Estado : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            Ciudad : <br />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="estado" type="text" class="campo_general_FILTER" required />
           </td>
           <td class="miTDFilter" valign="top">
           <input name="ciudad" type="text" class="campo_general_FILTER" required />
           </td>
        </tr>
        
       </table>
       
       
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        <tr class="miTRFilter">
           <td class="miTDtitleFilter" valign="top" width="50%" colspan="3">
           FUNCIONES:
           </td>
           
        </tr>
        
       
        <tr class="miTRFilter" >
           <td class="miTDFilter" valign="top" width="20%">
           Tipo de Cuenta: <br />
           </td>
           <td class="miTDFilter" valign="top" width="50%">
           Empresa Padre : <br />
           </td>
           <td class="miTDFilter" valign="top" width="20%">
           Zona Horaria : <br />
           </td>
        </tr>
        
        <tr class="miTRFilter" >
           <td class="miTDFilter" valign="top">
           <select name="tipo_empresa" class="campo_general_FILTER_SELECT">
               <option>Maestra</option>
               <option>Distribuidor</option>
           </select>
           </td>
            <td class="miTDFilter" valign="top">
            <select name="cuenta_maestra" class="campo_general_FILTER_SELECT">
               <?php 
			     echo '<option>'.$localFactoryName.'</option>';
                 $consulta_empresas=odbc_exec ($conexion,"SELECT * FROM F_EMPRESAS WHERE tipo_empresa='Distribuidor'");
                 while ($las_empresas = odbc_fetch_object($consulta_empresas))
                 {
                 $empresas=$las_empresas->nombre_empresa; echo '<option>'.$empresas.'</option>';
                 }
                 ?>
              </select>
           
           </td>
           <td class="miTDFilter" valign="top">
            <input name="zona_horaria" type="number" class="campo_general_FILTER" required />
           
           </td>
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
            Aviso de Acceso : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            Activa : <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
            Geocercas : <br />
           </td>
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <select name="aviso_acceso" class="campo_general_FILTER_SELECT">
               <option>NO</option>
               <option>SI</option>
           </select>
           </td>
           <td class="miTDFilter" valign="top">
           <select name="activa" class="campo_general_FILTER_SELECT">
               <option>SI</option>
               <option>NO</option>
           </select>
           </td>
           <td class="miTDFilter" valign="top">
           <select name="num_geocercas" class="campo_general_FILTER_SELECT">
               <option>5</option>
               <option>10</option>
               <option>20</option>
               <option>50</option>
               <option>100</option>
               <option>200</option>
               <option>300</option>
           </select>
           </td>
        </tr>
         
       </table>
       
       
       
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        <tr class="miTRFilter">
           <td class="miTDtitleFilter" valign="top" width="50%" colspan="2">
           COMUNICACION:
           </td>
           
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%" colspan="2">
           Persona de contacto : <br />
           </td>
           
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" colspan="2">
           <input name="persona_de_contacto" type="text" class="campo_general_FILTER" required />
           </td>
          
        </tr>
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top" width="25%">
           Tel&eacute;fono: <br />
           </td>
           <td class="miTDFilter" valign="top" width="25%">
           Correo : <br />
           </td>
        </tr>
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
           <input name="telefono" type="text" class="campo_general_FILTER" value="p*" />
           </td>
            <td class="miTDFilter" valign="top">
           <input name="correo" type="text" class="campo_general_FILTER" value="p*" />
           </td>
            
        </tr>
        
        
        
       </table>
       
       <table width="100%" border="0" class="miTABLEFilterLeft" cellpadding="5" cellspacing="5">
        
        <tr class="miTRFilter">
           <td class="miTDFilter" valign="top">
              
              <input name="confirma" type="hidden" value="si" />
              <input name="consulta" type="hidden" value="COMPANIES" />
              <input name="" type="submit" value="Agregar Empresa" class="btn_menu_general_FILTER" />
           </td>
           
        </tr>
        
        
        
       
        
        
       </table>
       
        
    
     
     
                    
     
                     
     <br /> 
                        
     </form>
     <!--CIERRE DE FORMULARIO INSERCION DE EMPRESAS-->


      
      
               
</body>
</html>
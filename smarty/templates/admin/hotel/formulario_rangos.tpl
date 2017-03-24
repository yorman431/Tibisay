<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Scape Travel - Panel Administrativo</title> 
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/imagenes/icono.ico" />
<script type="text/javascript" language="javascript" src="/js/validar.js"></script>
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
{literal}
<script type="text/javascript" src="/js/jquery.js"></script>

<script src="/src/js/jscal2.js"></script>
<script src="/src/js/lang/es.js"></script>
<link rel="stylesheet" type="text/css" href="/src/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="/src/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="/src/css/steel/steel.css" />
<link rel="stylesheet" type="text/css" href="/src/css/reduce-spacing.css" />


	
{/literal}
<!-- InstanceEndEditable -->

</head>  
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" background="/imagenes/fondo_admin.jpg" class="subtituloWeb3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="42%"><img src="/imagenes/logo.jpg" width="400" height="122" /> </td>
          <td width="56%" align="right" valign="middle" class="normalContenido">Panel Central de Utilidades - <span class="subtituloWeb3">Usuario:</span> {$nombre} {$apellido} <img src="/imagenes/user.png" width="30" height="30" align="absmiddle" />
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="597" height="48">
              <param name="movie" value="/swf/redes_hora2.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="/Scripts/expressInstall.swf" />
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="/swf/redes_hora2.swf" width="597" height="48">
                <!--<![endif]--> 
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="swfversion" value="6.0.65.0" />
                <param name="expressinstall" value="/Scripts/expressInstall.swf" />
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                  <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
          </object></td>
          <td width="2%" align="right" valign="middle" class="normalContenido2">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
 
  <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="contenido" -->
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
              {$mensaje}
                  
                
                  <tr>
                    <td class="titulo_promo" colspan="5">Rangos para Niños:</td>
                    <td align="right" class="titulo_promo" colspan="2">Comisionables:</td>
                    <td align="center" class="titulo_promo"><input type="checkbox" name="comisionable" id="comisionable" /></td>
                  </tr>
                  <tr>
                  	<td width="20%">Categoría</td>
                    <td width="10%">Edad Min</td>
                    <td width="10%">Edad Max</td>
                    <td width="20%">Tipo</td>
                    <td width="10%">Tarifa</td>
                    <td width="10%">Weekend</td>
                    <td colspan="2" width="10%" align="center">Acciones</td>
                  </tr>
                  {assign var="cont" value=0}
                  {section name=i loop=$rangokids}
                  <form action="editar_rango.php" method="post" name="form{$rangokids[i].id_ran}" id="form{$rangokids[i].id_ran}">
                  <tr {if $cont eq '0'} class='listado_a'
                    {assign var='cont' value=1} 
                    {else} class='listado_b'
                    {assign var='cont' value=0}{/if}>
                    
                    <td class="subtituloWeb3">
                    	<select name="categoria_nuevo" id="categoria_nuevo" class="editar_ajax{$rangokids[i].id_ran}">
                          <option {if $rangokids[i].etiqueta_ran eq "Infante"} selected='selected'{/if} value="Infante">Infante</option>
                          <option {if $rangokids[i].etiqueta_ran eq "Niño"} selected='selected'{/if} value="Niño">Niño</option>
                        </select></td>
                    <td class="subtituloWeb3"><input name="desde_nuevo" type="text" id="desde_nuevo" value="{$rangokids[i].min_ran}" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax{$rangokids[i].id_ran}" /></td>
                    <td class="subtituloWeb3"><input name="hasta_nuevo" type="text" id="hasta_nuevo" value="{$rangokids[i].max_ran}" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax{$rangokids[i].id_ran}" /></td>
                    <td>
                    	<select name="tipo_nuevo" id="tipo_nuevo" class="editar_ajax{$rangokids[i].id_ran}">
                          <option {if $rangokids[i].tipo_ran eq "precio"} selected='selected'{/if} value="precio">Precio</option>
                          <option {if $rangokids[i].tipo_ran eq "porcentaje"} selected='selected'{/if} value="porcentaje">Porcentaje</option>
                        </select>
                	</td>
                    
                    <td>
                    	<input name="precio_nuevo" type="text" id="precio_nuevo" value="{$rangokids[i].precio_ran}" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax{$rangokids[i].id_ran}" />
                    </td>
                    
                    <td>
                    	<input name="weekend_nuevo" type="text" id="weekend_nuevo" value="{$rangokids[i].weekend_ran}" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax{$rangokids[i].id_ran}" />
                    </td>
                    
                    <td width="30" align="center">
                	<img id="spinner_{$rangokids[i].id_ran}"src="/imagenes/loading_back.gif" width="25" height="24" align="absmiddle" style="display: none;" />
                	</td>
                    
                	<td width="20" align="center">
                    	<a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" title="Eliminar Rango" href="eliminar_rango.php?temp={$temp}&id={$id}=&del={$rangokids[i].id_ran}"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a>
                    </td>
                    
                  </tr>
                  	<input name="id" type="hidden" id="id" value="{$id}" />
                    <input name="temp" type="hidden" id="temp" value="{$temp}" />
                    <input name="envio" type="hidden" id="envio" value="Guardar" />
                    <input name="del" type="hidden" id="del" value="{$rangokids[i].id_ran}" />
                  	
                  </form>
                    {literal}
                    <script type="text/javascript">
                        $('.editar_ajax{/literal}{$rangokids[i].id_ran}{literal}').blur(function(event) {
                        event.preventDefault();
                        console.log($("#form{/literal}{$rangokids[i].id_ran}{literal}").serialize())
                        
                        $("#spinner_{/literal}{$rangokids[i].id_ran}{literal}").show();
                        $.post("editar_rango.php", $("#form{/literal}{$rangokids[i].id_ran}{literal}").serialize())
                        
                        .done(function() {
                            $("#spinner_{/literal}{$rangokids[i].id_ran}{literal}").hide();
                            console.log("esconder spinner");
                        });
                        
                        //console.log ("submit?");
                    });
                    </script>
                    {/literal}
            
                  {/section}
                  
                  <tr bgcolor="#F2CFB1">
                  	<form action="insertar_rango.php" method="post" name="form_nuevo" id="form_nuevo">
                  	<td>
                    	<select name="categoria_nuevo" id="categoria_nuevo">
                          <option selected='selected' value="Infante">Infante</option>
                          <option value="Niño">Niño</option>
                    </select></td>
                    <td>
                    	<input name="desde_nuevo" type="text" id="desde_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    <td>
                    	<input name="hasta_nuevo" type="text" id="hasta_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    <td>
                    	<select name="tipo_nuevo" id="tipo_nuevo">
                          <option selected='selected' value="precio">Precio</option>
                          <option value="porcentaje">Porcentaje</option>
                        </select>
                	</td>
                    <td>
                    	<input name="precio_nuevo" type="text" id="precio_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    
                    <td>
                    	<input name="weekend_nuevo" type="text" id="weekend_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    
                    <td>&nbsp;</td>
                    
                	<td align="center">
                    <input name="id" type="hidden" id="id" value="{$id}" />
                    <input name="temp" type="hidden" id="temp" value="{$temp}" />
                    <input name="envio" type="hidden" id="envio" value="Guardar" />
                    <a  onclick="javascript: return validar_insertar_rango('form_nuevo');" href="#" title="Insertar"><img  src="/imagenes/guardar.png" width="20" height="19" border="0" /></a></td>
                    </form>
                  </tr>
                  
                 
          {$mensaje}
            </table></td>
          </tr>
        </table>
    <!-- InstanceEndEditable --></td>
  </tr>
    <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
  <td width="25%" align="center"><a href="/admin/panel_central.php">Panel <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a title="Volver" href="/admin/hotel/detalle.php?temp={$temp}&id={$id}#tarifas{$temp}">&nbsp;Volver <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="pie">
    Scape Travel | Marketing C.A | Copyright&copy; 2016 Todos los Derechos Reservados - Venezuela</td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

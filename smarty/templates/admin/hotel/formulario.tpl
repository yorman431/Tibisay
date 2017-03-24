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
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
	window.onload = function()
	{
		var editor2 = CKEDITOR.replace( 'contenido',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]
 
    		}
		);
		
		var editor = CKEDITOR.replace( 'condiciones',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]
 
    		}
		);
	};
</script>
	
{/literal}
<link  href="/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','email','','NisEmail');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="768" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
              {$mensaje}
                  <tr>
                    <td align="left" class="subtituloWeb3">Pais:</td>
                    <td class="adminContenido">
                    <select name="pais" id="pais" class="tamano">
                    {section name=i loop=$paises}
                        <option {if $paises[i].id_pais eq $pais} selected='selected'{/if} value="{$paises[i].id_pais}">{$paises[i].nombre_pais}</option>
                    {/section} 
                  </select> 
                    *</td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Estado:</td>
                    <td class="adminContenido"><select name="estado" id="estado" class="tamano">
                    {section name=i loop=$estados}
                        <option {if $estados[i].id_est eq $estado} selected='selected'{/if} value="{$estados[i].id_est}">{$estados[i].nombre_est}</option>
                    {/section} 
                  </select> 
                    *
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="subtituloWeb3">Precio:</td>
                    <td align="left"><input  name="precio" type="text" class="normalContenido" id="precio" value="{$precio}" size="71" maxlength="20" onkeypress="javascripts: return validarnum(event);" /></td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Ciudad:</td>
                    <td class="adminContenido"><input onkeypress="javascripts: return validarletras(event);" name="ciudad" type="text" id="ciudad" value="{$ciudad}" size="71" maxlength="150" /> 
                      *</td>
                  </tr>
                <tr>
                    <td align="left" class="subtituloWeb3">Ubicaci&oacute;n:</td>
                    <td class="adminContenido"><input name="ubicacion" type="text" id="ubicacion" value="{$ubicacion}" size="71" maxlength="150" /> 
                      *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Sector:</td>
                  <td class="adminContenido">
                    <select name="sector" id="sector" class="tamano">
                      <option value="" {if $sector == ''} selected hidden{/if}>Seleccione una opcion</option>
                      <option {if $sector == 'Norte'} selected {/if} value="Norte">Norte</option>
                      <option {if $sector == 'Sur'} selected {/if} value="Sur">Sur</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Nombre</td>
                  <td class="adminContenido"><input name="nombre" type="text" id="nombre" value="{$nombres}" size="71" maxlength="150" />
                  *</td>
                </tr>
                
                
  <tr>
    <td width="205" align="left" valign="top" class="subtituloWeb3">Categor&iacute;a:</td>
    <td width="563" class="adminContenido">
      <select name="categoria" id="categoria" class="tamano">
        	<option {if $categoria eq "2"} selected='selected'{/if} value="2">2 Estrellas</option>
            <option {if $categoria eq "3"} selected='selected'{/if} value="3">3 Estrellas</option>
            <option {if $categoria eq "4"} selected='selected'{/if} value="4">4 Estrellas</option>
            <option {if $categoria eq "5"} selected='selected'{/if} value="5">5 Estrellas</option>
            <option {if $categoria eq "6"} selected='selected'{/if} value="6">Boutique</option>
            <option {if $categoria eq "7"} selected='selected'{/if} value="7">Posada</option>
            
      </select>
    *</span></td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Tipo de Tarifa:</td>
    <td><select name="tipo" id="tipo" class="tamano">
        	<option {if $tipo eq "Habitacion"} selected='selected'{/if} value="Habitacion">Por Habitaci&oacute;n</option>
            <option {if $tipo eq "Persona"} selected='selected'{/if} value="Persona">Por Persona</option>
      </select></td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Prioridad:</td>
    <td><input name="prioridad" type="text" id="prioridad" value="{$prioridad}" size="71" maxlength="4" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Coordenadas:</td>
    <td>Lat: 
      <input  name="latitud" type="text" id="latitud" value="{$latitud}" size="25" maxlength="50" />
      Long:      
  <input  name="longitud" type="text" id="longitud" value="{$longitud}" size="25" maxlength="50" />
  <a onclick="javascript: seleccionar_mapa(); return false;" href="#">Mapa</a></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Condiciones:</td>
    <td><textarea name="condiciones" cols="70" rows="6" id="condiciones"  wrap="physical">{$condiciones}</textarea></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Descripci&oacute;n:</td>
    <td><textarea name="contenido" cols="70" rows="6" id="contenido"  wrap="physical">{$descripcion}</textarea></td> 
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Claves:</td>
    <td><textarea name="claves" cols="70" rows="6" id="claves"  wrap="physical">{$claves}</textarea></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Facilidades:</td>
    <td>
    {section name=i loop=$facilidad}
    	<div class="facilidad">
        <div class="nombre_facilidad">
        <input type="checkbox" name="facilidad{$facilidad[i].id_fac}" id="facilidad{$facilidad[i].id_fac}" title="{$facilidad[i].etiqueta_fac}" {if $facilidad[i].encendido eq "on"} checked="checked" {/if} />
        {$facilidad[i].nombre_fac}</div>
        <div class="fotos5">
             
            <i class="fa {$facilidad[i].etiqueta_fac} color-fa"></i>
            
        </div>
    	</div>
        
    {/section}
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Principal:</td>
    <td><select name="principal" id="principal">
      <option {if $principal eq "si"} selected='selected'{/if} value="si">S&iacute;</option>
      <option {if $principal eq "no"} selected='selected'{/if} value="no">No</option>
      </select>
      (Valor en S&iacute; aparece recomendado en la principal)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="envio" type="submit" class="componentes" id="button2" onclick="javascript: return confirmar('&iquest;Est&aacute; seguro que desea guardar?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/hotel/'" /></td>
  </tr>
          {$mensaje}
            </table></td>
          </tr>
        </table>
      </form>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
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

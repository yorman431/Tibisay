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
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','email','','NisEmail');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="768" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
              {$mensaje}
                  <tr>
                    <td width="205" align="left" class="subtituloWeb3">Nombre Plan:</td>
                    <td width="563" class="adminContenido"><input name="nombre_plan" type="text" id="nombre_plan" value="{$nombre_plan}" size="71" maxlength="150" /> 
                      *</td>
                  </tr>
                <tr>
                    <td align="left" class="subtituloWeb3">Regimen:</td>
                    <td class="adminContenido">
                    	<select name="regimen_plan" id="regimen_plan" class="interno_select">
                            <option {if $regimen_plan eq "Todo Incluido"} selected='selected'{/if} value="Todo Incluido">Todo Incluido</option>
                            <option {if $regimen_plan eq "Solo Desayuno"} selected='selected'{/if} value="Solo Desayuno">Solo Desayuno</option>
                            <option {if $regimen_plan eq "Solo Hospedaje"} selected='selected'{/if} value="Solo Hospedaje">Solo Hospedaje</option>
                            <option {if $regimen_plan eq "Desayuno / Almuerzo / Cena"} selected='selected'{/if} value="Desayuno / Almuerzo / Cena">Desayuno / Almuerzo / Cena</option>
                            <option {if $regimen_plan eq "Pension Completa"} selected='selected'{/if} value="Pension Completa">Pensi&oacute;n Completa</option>
                        </select>
                    	*
                    </td>
                </tr>
                <tr>
                    <td align="left" class="subtituloWeb3">Descipci&oacute;n del Plan:</td>
                    <td class="adminContenido"><input name="descripcion_plan" type="text" id="descripcion_plan" value="{$descripcion_plan}" size="71" maxlength="150" /> 
                      *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Tipo de Tarifa:</td>
                  <td class="adminContenido">
                  	<select name="tipotarifa_plan" id="tipotarifa_plan" class="interno_select">
                    	<option {if $tipotarifa_plan eq "Persona"} selected='selected'{/if} value="Persona">Persona</option>
                    	<option {if $tipotarifa_plan eq "Habitacion"} selected='selected'{/if} value="Habitacion">Habitaci&oacute;n</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Semana Bs.</td>
                  <td class="adminContenido"><input name="precio_plan" type="text" id="precio_plan" value="{$precio_plan}" size="71" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                  *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Fin de Semana Bs.</td>
                  <td class="adminContenido"><input name="weekend_plan" type="text" id="weekend_plan" value="{$weekend_plan}" size="71" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                  *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">M&aacute;ximo de Adultos:<span class="titulo7"><br />
                  Es la cantidad de adultos que entran en el plan</span></td>
                  <td align="left" class="adminContenido">
                    <input name="maxadultos" type="text" id="maxadultos" value="{$maxadultos}" size="71" maxlength="4" onkeypress="javascripts: return validarnum(event);" />
                  *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Orden:</td>
                  <td><input name="prioridad" type="text" id="prioridad" value="{$prioridad}" size="71" maxlength="4" /></td>
                </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">P&uacute;blico:</td>
    <td><select name="publica" id="publica">
      <option {if $publica eq "1"} selected='selected'{/if} value="1">S&iacute;</option>
      <option {if $publica eq "0"} selected='selected'{/if} value="0">No</option>
      </select>
      (Valor en S&iacute; permite mostrar el Plan)</td>
  </tr>
  <tr>
    <td><input name="id" type="hidden" id="id" value="{$id}" /><input name="temporada" type="hidden" id="temporada" value="{$temp}" /></td>
    <td><input name="envio" type="submit" class="componentes" id="button2" onclick="javascript: return confirmar('&iquest;Est&aacute; seguro que desea guardar?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/hotel/detalle.php?id={$id}#tarifas{$temp}'" /></td>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" /> 
<title>Marinart | Panel Administrativo</title>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/imagenes/favicon.ico"> 

<script type="text/javascript" language="javascript" src="/js/validar.js"></script>
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
{literal}

{/literal}
<!-- InstanceEndEditable -->
</head>  
<body>  
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" class="subtituloWeb3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="42%"><img src="/imagenes/logo.jpg" style="padding-left:5px"/> </td>  
          <td width="56%" align="right" valign="middle" class="normalContenido">Panel Central de Utilidades -        <span class="sub_usuario">Usuario:</span> {$nombre} {$apellido} <img src="/imagenes/user.png" width="30" height="30" align="absmiddle" />
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="597" height="48">
              <param name="movie" value="/swf/redes_hora.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="/Scripts/expressInstall.swf" />
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="/swf/redes_hora.swf" width="597" height="48">
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
    <th align="left"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="absbottom" /></span> {$accion}</th>
    <th align="right"><form id="form2" name="form1" method="post" action="">
      <img src="/imagenes/buscar.png" width="25" height="25" align="absmiddle" /></strong>
            <input name="buscar" type="text" id="buscar" onkeypress="javascripts: return validarnum(event);" value="{$cedula}" size="26" maxlength="9"/>
            <input name="envio" type="submit" class="normalContenido" id="envio" value="Buscar" />
    </form></th>
  </tr>
  <tr>
    <td colspan="2" align="center" class="subtituloWeb3">
          {if $mensaje eq ""}
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="titulo_b">Datos Personales:</td>
              <td class="subtituloWeb3">&nbsp;</td>
              <td class="subtituloWeb3">&nbsp;</td>
              <td class="subtituloWeb3">&nbsp;</td>
              <td class="subtituloWeb3">&nbsp;</td>
              <td class="subtituloWeb3">&nbsp;</td>
              </tr>
            <tr class="tituloContenido">
              <td width="18%" class="tituloContenido">Nombre</td>
              <td width="18%" class="tituloContenido">Apellido</td>
              <td width="18%" class="tituloContenido">Tel&eacute;fono</td>
              <td width="18%" class="tituloContenido">Email</td>
              <td width="18" class="tituloContenido">Sexo</td>
              <td width="10%" align="center" class="tituloContenido">N&uacute;mero de ID</td>
              </tr>
            <tr class="normalContenido">
              <td class="normalContenido">{$nombres}</td>
              <td class="normalContenido">{$apellidos}</td>
              <td class="normalContenido">{$celular}</td>
              <td class="normalContenido"><a href="mailto:{$correo}">{$correo}</a></td>
              <td class="normalContenido">{$sexo}</td>
              <td rowspan="4" align="center"><span class="grande">{$id}</span></td>
            </tr>
          
            <tr>
              <td class="subtituloWeb3">Ciudad </td>
              <td class="subtituloWeb3">Fecha Nacimineto</td>
              <td class="subtituloWeb3">Celular</td>
              <td class="subtituloWeb3">Twitter</td>
              <td class="subtituloWeb3">&nbsp;</td>
              </tr>
            <tr>
              <td class="normalContenido">{$estado}</td>
              <td class="normalContenido">{$nacimiento}</td>
              <td class="normalContenido">{$celular}</td>
              <td class="normalContenido">{$mitwitter}</td>
              <td class="normalContenido">&nbsp;</td>
              </tr>
    
            <tr>
              <td class="titulo_b">Datos de Inscripci&oacute;n:</td>
              <td class="subtituloWeb3">&nbsp;</td>
              <td class="subtituloWeb3">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            {if $mensaje2 eq ""}
            <tr>
              <td class="tituloContenido">Banco</td>
              <td class="tituloContenido">N&ordm; Dep&oacute;sito</td>
              <td class="tituloContenido">Monto Dep&oacute;sito</td>
              <td class="tituloContenido">Fecha Dep&oacute;sito</td>
              <td class="tituloContenido">&nbsp;</td>
              </tr>
            <tr class="normalContenido">
              <td>{$banco}</td>
              <td>{$numero}</td>
              <td>{$monto}</td>
              <td>{$fecha}</td>
              <td>&nbsp;</td>
              </tr>
            {else}
            {$mensaje2}
            {/if}
            {if $mensaje3 neq ""}
            {$mensaje3}
            {/if}
            <tr>
              <td colspan="6"><form id="form3" name="form3" method="post" action="">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="31%" class="tituloContenido">Inscripci&oacute;n:
                      <select onchange="javascripts: cambiarmodo();" name="inscrito" class="normalContenido" id="inscrito">
                        <option value="Confirmado" {if $inscrito eq "Confirmado"}selected="selected"{/if}>Confirmado</option>
                        <option value="No Confirmado" {if $inscrito eq "No Confirmado"}selected="selected"{/if}>No Confirmado</option>
                        <option value="Con Problemas" {if $inscrito eq "Con Problemas"}selected="selected"{/if}>Con Problemas</option>
                        </select>
                      {if $inscrito eq "Confirmado"}
                      <img align="absmiddle" src='/imagenes/si.png' width='20' height='20' border='0' name='imagen2'>
                      {else}
                      <img align="absmiddle" src='/imagenes/no.png' width='20' height='20' border='0' name='imagen2'>
                      {/if}
                      </td>
                    <td width="34%" class="tituloContenido">
                    Material Entregado:
                      <select name="material" class="normalContenido" id="material">
                        <option value="Si" {if $material eq "Si"}selected="selected"{/if} >Si</option>
                        <option value="No" {if $material eq "No"}selected="selected"{/if} >No</option>
                        </select>
                      {if $material eq "Si"}
                      <img align="absmiddle" src='/imagenes/si.png' width='20' height='20' border='0' name='imagen2'>
                      {else}
                      <img align="absmiddle" src='/imagenes/no.png' width='20' height='20' border='0' name='imagen2'>
                      {/if}
                      </td>
                    <td width="35%" align="center" class="normalContenido"><input  name="envio" type="submit" id="button3" value="Actualizar" onclick="javascript: return actualizar('&iquest;Seguro desea modificar?')" />
                      <input name="buscar" type="hidden" id="buscar" value="{$cedula}" /></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
            </table>
          {else}
          {$mensaje}
          {/if}</td>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a href="#">&nbsp;Lista Verificaci&oacute;n <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td> 
  </tr>
  <tr>
    <td colspan="3" align="center" class="pie">
   Marinart C.A | Copyright&copy; 2016 All Rights Reserved.</td>
  </tr> 
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" /> 
<title>Marinart | Panel Administrativo</title>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/imagenes/favicon.ico"> 

<script type="text/javascript" language="javascript" src="/js/validar.js"></script>
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
            <th width="967" align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" class="subtituloWeb3">Categoria:</td>
                <td class="normalContenido">{$categoria}</td>
              </tr>
              <tr>
                <td width="98" align="left" class="subtituloWeb3">T&iacute;tulo:</td>
                <td width="402" class="normalContenido">{$titulo}</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Fecha:</td>
                <td class="normalContenido">{$fecha}</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Tipo:</td>
                <td class="normalContenido">
                {if $tipo eq "application/msword"}
                    <img src='/imagenes/word.png' width='32' height='32'/>
                {elseif $tipo eq "application/pdf"}
                    <img src='/imagenes/pdf.png' width='32' height='32'/>
                {elseif $tipo eq "application/vnd.ms-excel"}
                    <img src='/imagenes/xls.png' align='absmiddle' width='32' height='32'/>
                {elseif $tipo eq "application/octet-stream"} 
            <img src='/imagenes/xls.png' align='absmiddle' width='32' height='32'/> 
                {elseif $tipo eq "image/jpeg" || $tipo eq "image/png" || $tipo eq "image/pjpeg" || $tipo eq "image/x-png"} 
                <img src='/imagenes/imagenjpg_big.png' align='absmiddle' width='32' height='32'/>
                 {/if} {$tipo}
     </td>
              </tr>
              <tr>
                <td align="left" valign="top" class="subtituloWeb3">Nombre:</td>
                <td class="normalContenido">{$nombres}</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="subtituloWeb3">Peso:</td>
                <td class="normalContenido">{math equation="$peso/1024" format="%.2f} Kb</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="subtituloWeb3">Descripci&oacute;n:</td>
                <td class="normalContenido"><p>{$contenido|nl2br}</p></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><form id="form1" name="form1" method="post" action="">
                <input name="envio" type="submit"  class="normalContenido" id="envio" value="Descargar" />
                  &nbsp;&nbsp;
                <input type="button" name="Submit3"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/documento/'" />
                <input name="archivo" type="hidden" id="archivo" value="{$id}" />
                </form></td>
              </tr>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
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

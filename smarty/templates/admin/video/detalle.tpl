<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
{literal}
<script type="text/javascript" src="/js/prototype.js"></script>
<script type="text/javascript" src="/js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="/js/lightbox.js"></script>
<link rel="stylesheet" href="/css/lightbox.css" type="text/css" media="screen" />
{/literal}
</head>
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" class="subtituloWeb3">
        {include '../layout/cabezera.tpl'}
    </td>
  </tr>

  <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="contenido" -->
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" valign="top">
          <table width="100%" border="0" cellspacing="8" cellpadding="0">
            <tr>
              <td width="101" align="left" class="subtituloWeb3">Name:</td>
              <td width="625" class="adminContenido">{$nombres}</td>
              </tr>
            <tr>
              <td align="left" class="subtituloWeb3">Date:</td>
              <td class="adminContenido">{$fecha}</td>
            </tr>
            <tr>
              <td align="left" class="subtituloWeb3">Code:</td>
              <td class="adminContenido">{$url}</td>
            </tr>
            <tr>
              <td align="left" class="subtituloWeb3">Type:</td>
              <td class="adminContenido">{$tipo}</td>
            </tr>
            <tr>
              <td align="left" class="subtituloWeb3">Category:</td>
              <td class="adminContenido">{$categoria}</td>
            </tr>
             <tr>
              <td align="left" class="subtituloWeb3">Location:</td>
              <td class="adminContenido">{$ubicacion}</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="subtituloWeb3">Description:</td>
              <td valign="top" class="adminContenido">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="left" valign="top">{$descripcion}</td>
              </tr>
            </table>
        </td>
        <td align="center">
        {if $tipo eq 'Vimeo'}
        <iframe src="http://player.vimeo.com/video/{$url}" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><br />
        <div align="center" class="subtituloWeb3"></div>
        {else}
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" width="300" height="180" src="//www.youtube.com/embed/{$url}" frameborder="0" allowfullscreen></iframe>
          </div>
        {/if}
                </td>
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
    <td width="50%" align="center"><a href="/admin/video">&nbsp;Back <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Logout <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  {include '../layout/pie.tpl'}
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

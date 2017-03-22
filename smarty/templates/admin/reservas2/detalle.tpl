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
<!-- InstanceEndEditable -->
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th width="762" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center" class="titulo">
    <table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="60%" valign="top">
        <table width="90%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class:"subtituloWeb3" colspan="2">
              <h2>{$estatus} - {$reserva}</h2>
            </td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">ID:</td>
            <td class="adminContenido">{$id}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Name:</td>
            <td class="adminContenido">{$nombres}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Last Name:</td>
            <td class="adminContenido">{$apellidos}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Age:</td>
            <td class="adminContenido">{$edad}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Telephone:</td>
            <td class="adminContenido">{$telefono}</td>
          </tr>
          <tr>
            <td width="88" align="left" class="subtituloWeb3">E-mail:</td>
            <td width="477" class="adminContenido">{$correo}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Country:</td>
            <td class="adminContenido">{$pais}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">City:</td>
            <td class="adminContenido">{$estado}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Direction:</td>
            <td class="adminContenido">{$direccion}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">About:</td>
            <td class="adminContenido">{$nosotros}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Transfer:</td>
            <td class="adminContenido">{$traslado}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Return Trip:</td>
            <td class="adminContenido">{$retorno}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Passagers:</td>
            <td class="adminContenido">{$pasajero}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Airport:</td>
            <td class="adminContenido">{$airport}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Airline:</td>
            <td class="adminContenido">{$aerolinea}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Fly Number:</td>
            <td class="adminContenido">{$vuelo}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Date:</td>
            <td class="adminContenido">{$fecha}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Shedule:</td>
            <td class="adminContenido">{$hora}</td>
          </tr>
          </table>
        </td>
      </tr>
    </table>

          </td>
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
    <td width="50%" align="center"><a href="/admin/reservas">&nbsp;Back <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
  {include './layout/header.tpl'}
</head>
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
  <td colspan="3" align="left" class="subtituloWeb3">
    {include './layout/cabezera.tpl'}
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
      <table width="100%" border="0" cellspacing="4" cellpadding="4" class="normal" align="center">
      {$mensaje}
        <tr>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Botonera</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Contenido</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Banner</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Publicidad</td>
        </tr>
        <tr>
          <td height="25" align="center"><a href="/admin/link/"><img src="/imagenes/botonera.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/contenido/"><img src="/imagenes/mi_pedido.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/banner/"><img src="/imagenes/evento.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/publicidad/"><img src="/imagenes/pedidos.png" width="60" height="60" border="0" /></a></td>
        </tr>
        <tr>
          <td width="20%" align="center" class="subtituloWeb3">Hotel</td>
          <td width="20%" align="center" class="subtituloWeb3">Administradores</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Galería</td>
        </tr>
        <tr>
          <td height="25" align="center"><a href="/admin/hotel/"><img src="/imagenes/hoteles.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/usuario/"><img src="/imagenes/msn.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/galeria/"><img src="/imagenes/galeria.png" width="60" height="60" border="0" /></a></td>

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
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesión <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  {include './layout/pie.tpl'}
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

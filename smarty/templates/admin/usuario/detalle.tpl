<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
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
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th width="683" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion|escape:"htmlall"}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center" class="subtituloWeb3"><table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="83" align="left" class="subtituloWeb3">Nombre:</td>
        <td width="401" class="adminContenido">{$nombres|escape:&quot;htmlall&quot;}</td>
      </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Apellido:</td>
        <td class="adminContenido">{$apellidos|escape:&quot;htmlall&quot;}</td>
      </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Correo:</td>
        <td class="adminContenido"><a href="mailto:{$correo}">{$correo|escape:&quot;htmlall&quot;}</a></td>
      </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Usuario:</td>
        <td class="adminContenido">{$login|escape:&quot;htmlall&quot;}</td>
      </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Nivel:</td>
        <td class="adminContenido">{$nivel|escape:&quot;htmlall&quot;}</td>
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
    <td width="50%" align="center"><a href="/admin/usuario">&nbsp;Atrás <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesión <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

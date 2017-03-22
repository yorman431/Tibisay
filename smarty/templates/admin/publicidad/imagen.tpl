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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
    <tr>
      <th colspan="2" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
    </tr>
    <tr>
      <td align="right" class="subtituloWeb3">Nombre:</td>
      <td class="normalContenido"><input name="nombre" type="text" class="componentes" id="nombre" value="{$nombres}" size="48" maxlength="100" />
        *</td>
    </tr>
    <tr>
      <td align="right" class="subtituloWeb3">URL:</td>
      <td class="normalContenido"><input name="url" type="text" class="normalContenido" id="url" value="{$url}" size="48" maxlength="100" /></td>
    </tr>
    <tr>
      <td width="291" align="right" class="subtituloWeb3">Imagen:</td>
      <td width="509"><input name="archivo" type="file" id="archivo" size="33" /></td>
    </tr>
    {$mensaje}
    <tr>
      <td colspan="2" align="center" class="normalContenido"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return confirmar('¿Está seguro que desea eliminar?');" value="Enviar" />
        &nbsp;&nbsp;
        <input name="button2" type="button" class="componentes" id="button2" onclick="javascript: location.href='/admin/{$carpeta}/detalle.php?id={$id}'" value="Cancelar" />
(*) Datos Obligatorios </td>
    </tr>
  </table>
</form>
</td>
  </tr>
    <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
  <td width="25%" align="center"><a href="/admin/panel_central.php">Panel <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="50%" align="center"></td>
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

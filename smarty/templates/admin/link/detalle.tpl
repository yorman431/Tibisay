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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th colspan="8" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion|escape:"htmlall"}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td width="92" align="right" class="subtituloWeb3">Nombre:</td>
    <td width="173" class="adminContenido">{$nombres|escape:"htmlall"}</td>
    <td width="67" align="right" class="adminContenido"><span class="subtituloWeb3">Prioridad:</span></td>
    <td width="96" class="adminContenido">{$prioridad}</td>
    <td width="69" align="right" class="subtituloWeb3">Tipo:</td>
    <td width="87" class="adminContenido">{$tipo}</td>
    <td width="69" align="right" class="subtituloWeb3">Etiqueta:</td>
    <td width="198" class="adminContenido">{$etiqueta}</td>
  </tr>
  <tr>
    <td colspan="8" align="center" class="subtituloWeb3"><table width="60%" border="0" cellspacing="0" cellpadding="0">
      {assign var="cont" value=0}
      {if $mensaje eq ""}
      <tr>
        <td colspan="4" align="center" class="subtituloWeb3">Sub-boton</td>
        </tr>
      <tr> {section name=i loop=$listado}
        <td width="25%" align="center" class="normalContenido2">
          {$listado[i].nombre_sub}<a onclick="javascript: return confirmar('¿Está seguro que desea eliminar?');" href="sublink_borrar.php?id={$listado[i].id_rel}&back={$id}"> <img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" /></a></td>
        {assign var="cont" value=$cont+1}
        {if $cont eq 4}
        {assign var="cont" value=0} </tr>
      <tr> {/if}
        {/section} </tr>
      {else}
      {$mensaje}
      {/if}

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
    <td width="50%" align="center"><a href="/admin/link">&nbsp;Atrás <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="sublink.php?id={$id}">Add SubLink<img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

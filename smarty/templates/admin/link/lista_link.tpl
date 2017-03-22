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
          <th colspan="4" align="left"> <img src="/imagenes/cuadros.png" width="14" height="14" align="texttop" /> Listado de Botones</th>
          <th colspan="4" align="right"><form id="form1" name="form1" method="post" action="">
              <input name="buscar" type="text" id="buscar" value="{$busqueda}" size="30" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        {$error}
        <tr>
          <td width="274" class="subtituloWeb3">Nombre</td>
          <td width="280" class="subtituloWeb3">Etiqueta</td>
          <td width="80" class="subtituloWeb3">Tipo</td>
          <td width="80" class="subtituloWeb3">Prioridad</td>
          <td width="228" class="subtituloWeb3">Id</td>
          <td colspan="3" align="center" class="subtituloWeb3">Acciones</td>
        </tr>
        {if $mensaje eq ""}
        {assign var="cont" value=0}
        {section name=i loop=$listado}
  <tr {if $cont eq '0'} class='listado_a'
        	{assign var='cont' value=1}
			{else} class='listado_b'
            {assign var='cont' value=0}{/if}>
      <td class="adminContenido">{$listado[i].nombre_cat}</td>
      <td class="adminContenido">{$listado[i].etiqueta_cat}</td>
      <td class="adminContenido">{$listado[i].tipo_cat}</td>
    <td class="adminContenido">{$listado[i].prioridad_cat}</td>
    <td class="adminContenido">{$listado[i].id_cat}</td>
    <td width="30" align="center"><a title="Detalles" href="detalle.php?id={$listado[i].id_cat}"><img src="/imagenes/detalle.png" width="30" height="25" border="0" /></a></td>
    <td width="30" align="center"><a title="Editar" href="editar.php?id={$listado[i].id_cat}"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    <td width="30" align="center"><a title="Eliminar" onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar.php?id={$listado[i].id_cat}"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
  </tr>
        {/section}
        {else}
        {$mensaje}
        {/if}

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
    <td width="50%" align="center"><a href="insertar.php">Agregar Botón<img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="sublink_lista.php">Sub-Link list<img src="/imagenes/cambiar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

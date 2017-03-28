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
          <th colspan="3" align="left" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="texttop" /> Principal Banner Images</th>
          <th colspan="5" align="right"><form id="form1" name="form1" method="post" action="">
              <img src="/imagenes/buscar.png" width="25" height="25" align="absmiddle" />
              <input name="buscar" type="text" id="buscar" value="{$busqueda}" size="26" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        <tr>
          <td width="180" class="subtituloWeb3">Imagen</td>
          <td width="180" class="subtituloWeb3">Etiqueta</tdael>
          <td width="180" class="subtituloWeb3">Prioridad</td>
          <td width="100" class="subtituloWeb3">Tipo</td>
          <td width="80" class="subtituloWeb3">Efecto</td>
          <td colspan="3" align="center" class="subtituloWeb3">Acciones</td>
        </tr>
        {if $mensaje eq ""}
        {assign var="cont" value=0}
        {section name=i loop=$listado}
  <tr {if $cont eq '0'} class='listado_a'
        	{assign var='cont' value=1}
			{else} class='listado_b'
            {assign var='cont' value=0}{/if}>
      <td class="adminContenido"><a href="/imagenes/banner/{$listado[i].url_ban}" title="{$listado[i].etiqueta_ban}" rel="lightbox[roadtrip]" >
    <img src="/imagenes/banner/{$listado[i].url_ban}" width="200" border="0" class="fotos opacidad" /></a></td>
      <td class="adminContenido">{$listado[i].etiqueta_ban}</td>
    <td class="adminContenido">{$listado[i].prioridad_ban}</td>
    <td class="adminContenido">{$listado[i].tipo_ban}</td>
    <td class="adminContenido">{$listado[i].efecto_ban}</td>
    <td width="40" align="center"><a href="detalle.php?id={$listado[i].id_ban}" title="Detalles"><img src="/imagenes/detalles.png" width="30" height="25" border="0" /></a></td>
    <td width="40" align="center"><a href="editar.php?id={$listado[i].id_ban}" title="Editar"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    <td width="40" align="center"><a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar.php?id={$listado[i].id_ban}" title="Eliminar"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
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
    <td width="50%" align="center">&nbsp;<a href="insertar.php">Agregar Banner<img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

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
          <th colspan="3" align="left" style="color=#c02d00;"><img src="/imagenes/cuadros.png" width="14" height="14" align="texttop">{$accion}</th>
          <th colspan="5" align="right"><form id="form1" name="form1" method="post" action="">
              <img src="/imagenes/buscar.png" width="25" height="25" align="absmiddle" />
              <input name="buscar" type="text" id="buscar" value="{$busqueda}" size="26" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        <tr>
          <td width="10%" class="subtituloWeb3">Name</td>
          <td width="10%" class="subtituloWeb3">Last Name</td>
          <td width="15%" class="subtituloWeb3">Telephone</td>
          <td width="15%" class="subtituloWeb3">Date</td>
          <td width="10%" class="subtituloWeb3">Transfer</td>
          <td width="10%" class="subtituloWeb3">Fly Number</td>
          <td width="10%" class="subtituloWeb3">Airline</td>
          <td width="10%" class="subtituloWeb3">Schedule</td>
          <td width="10%" colspan="2" align="center" class="subtituloWeb3">Actions</td>
        </tr>
        {if $mensaje eq ""}
        {assign var="cont" value=0}
        {section name=i loop=$listado}
  <tr {if $cont eq '0'} class='listado_a'
        	{assign var='cont' value=1}
			{else} class='listado_b'
            {assign var='cont' value=0}{/if}>
      <td class="adminContenido">{$listado[i].nombre}</td>
    <td class="adminContenido">{$listado[i].apellido}</td>
    <td class="adminContenido">{$listado[i].telefono}</td>
    <td class="adminContenido">{$listado[i].fecha}</td>
    <td class="adminContenido">{$listado[i].traslado}</td>
    <td class="adminContenido">{$listado[i].vuelo}</td>
    <td class="adminContenido">{$listado[i].aerolinea}</td>
    <td class="adminContenido">{$listado[i].hora}</td>
    <td width="5%" align="center"><a title="Done" href="done.php?id={$listado[i].id}&est={$est}"><i class="fa fa-check fa-lg" aria-hidden="true"></i></a></td>
    <td width="5%" align="center"><a title="Detalles" href="detalle.php?id={$listado[i].id}"><img src="/imagenes/detalle.png" width="30" height="25" border="0" /></a></td>
    <td width="5%" align="center"><a title="Editar" href="editar.php?id={$listado[i].id}"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
  </tr>
        {/section}
        {else}
        {$mensaje}
        {/if}
      </table>
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
    <td width="50%" align="center">{if $est neq "1"}<a href="index.php?est=1">Done List{else}<a href="index.php">Waiting List{/if}<img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

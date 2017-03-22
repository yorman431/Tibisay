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
    <th colspan="6" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion|escape:"htmlall"}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td width="110" align="right" class="subtituloWeb3">Nombre:</td>
    <td width="177" class="adminContenido">{$nombres|escape:"htmlall"}</td>
    <td width="69" class="subtituloWeb3">Prioridad:</td>
    <td width="214" class="adminContenido">{$prioridad|escape:"htmlall"}</td>
    <td width="68" class="subtituloWeb3">Etiqueta:</td>
    <td width="199" class="adminContenido">{$etiqueta}</td>
  </tr>
  <tr>
    <td colspan="6" align="center" class="subtituloWeb3"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                  <td align="center" colspan="4" class="subtituloWeb3">Imagenes Asignadas</td>
                  </tr>
                {assign var="cont" value=0}
                {if $mensaje eq ""}
                <tr> {section name=i loop=$listado}
                  <td width="25%" align="center" class="normalContenido2"><a href="/imagenes/{$listado[i].directorio_image}" title="{$listado[i].nombre_image}" rel="lightbox[roadtrip]" ><img border="0" src="/imagenes/miniaturas/{$listado[i].directorio_image}" width="200" class="fotos" /></a><br />
                    {$listado[i].nombre_image} <a onclick="javascript: return confirmar('¿Está seguro que desea eliminar esta imagen?');" href="../galeria/imagen_borrar.php?id={$listado[i].id_image}&amp;back={$id}&amp;tabla=categoria"><img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" /></a></td>
                  {assign var="cont" value=$cont+1}
                  {if $cont eq 3}
                  {assign var="cont" value=0} </tr>
                <tr> {/if}
                  {/section} </tr>
                {else}
                {$mensaje}
                {/if}
                <tr>
                  <td colspan="4" align="center"><a href="imagen.php?id={$id}"><img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" /> Add Image</a></td>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a href="/admin/categoria">&nbsp;Atrás <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

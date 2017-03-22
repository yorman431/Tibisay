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
    <td align="center" class="titulo"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="8">
      <tr>
        <td width="50%" align="center" valign="top"><table width="100%" border="0" cellspacing="8" cellpadding="0">
          <tr>
            <td align="left" class="subtituloWeb3">Categoría:</td>
            <td class="adminContenido">{$categoria}</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Título:</td>
            <td class="adminContenido">{$titulo}</td>
            </tr>
          <tr>
            <td width="79" align="left" class="subtituloWeb3">Sub-Título:</td>
            <td width="261" class="adminContenido">{$subtitulo}</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Fecha:</td>
            <td class="adminContenido">{$fecha}</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Hora:</td>
            <td class="adminContenido">{$hora}</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Autor:</td>
            <td class="adminContenido">{$autor}</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Contenido:</td>
            <td class="adminContenido">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="2" align="left" valign="top">{$contenido}</td>
            </tr>
          </table></td>
        <td width="50%" align="center" valign="top" class="adminContenido"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="4" cellpadding="0">
              <tr>
                <td align="center" colspan="4" class="subtituloWeb3">Imagenes Asignadas</td>
                </tr>
              {assign var="cont" value=0}
              {if $mensaje eq ""}
              <tr> {section name=i loop=$listado}
                <td width="25%" align="center" class="normalContenido2"><a href="/imagenes/{$listado[i].directorio_image}" title="{$listado[i].nombre_image}" rel="lightbox[roadtrip]" ><img border="0" src="/imagenes/{$listado[i].directorio_image}" width="150" class="fotos" /></a><br />
                  {$listado[i].nombre_image} <a onclick="javascript: return confirmar('¿Está seguro que desea eliminar imagen?');" href="../galeria/imagen_borrar.php?id={$listado[i].id_image}&amp;back={$id}&amp;tabla=noticia"><img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" /></a></td>
                {assign var="cont" value=$cont+1}
                {if $cont eq 3}
                {assign var="cont" value=0} </tr>
              <tr> {/if}
                {/section} </tr>
              {else}
              {$mensaje}
              {/if}
              <tr>
                <td colspan="4" align="center"><a href="imagen.php?id={$id}"><img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" />Agregar Imagen</a></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a href="/admin/noticia">&nbsp;Atrás <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

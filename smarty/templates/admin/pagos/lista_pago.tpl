<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" /> 
<title>Marinart | Panel Administrativo</title>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/imagenes/favicon.ico"> 

<script type="text/javascript" language="javascript" src="/js/validar.js"></script>
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>  
<body>  
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" class="subtituloWeb3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="42%"><img src="/imagenes/logo.jpg" style="padding-left:5px"/> </td>  
          <td width="56%" align="right" valign="middle" class="normalContenido">Panel Central de Utilidades -        <span class="sub_usuario">Usuario:</span> {$nombre} {$apellido} <img src="/imagenes/user.png" width="30" height="30" align="absmiddle" />
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="597" height="48">
              <param name="movie" value="/swf/redes_hora.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="/Scripts/expressInstall.swf" />
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="/swf/redes_hora.swf" width="597" height="48">
                <!--<![endif]-->
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="swfversion" value="6.0.65.0" />
                <param name="expressinstall" value="/Scripts/expressInstall.swf" />
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                  <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
          </object></td>
          <td width="2%" align="right" valign="middle" class="normalContenido2">&nbsp;</td>
        </tr>
    </table></td>
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
          <th colspan="6" align="left" class="titulo"> <img src="/imagenes/cuadros.png" width="14" height="14" align="texttop" /> Lista de Pagos Registrados</th>
          <th colspan="4" align="right"><form id="form1" name="form1" method="post" action="">
            <img src="/imagenes/buscar.png" width="24" height="24" align="absmiddle" />
            <input name="buscar" type="text" id="buscar" value="{$busqueda}" size="26" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        <tr class="subtituloWeb3">
          <td width="60" class="subtituloWeb3">Tipo</td>
          <td width="60" class="subtituloWeb3">C&eacute;dula</td>
          <td width="140" class="subtituloWeb3">Nombre</td>
          <td width="140" class="subtituloWeb3">Apellido</td>
          <td width="80" class="subtituloWeb3">Banco</td>
          <td width="80" class="subtituloWeb3">N&uacute;mero</td>
          <td width="80" class="subtituloWeb3">Fecha</td>
          <td width="100" class="subtituloWeb3">Monto</td>
          <td colspan="2" align="center" class="subtituloWeb3">Acciones</td>
        </tr>
        {if $mensaje eq ""}
        {assign var="cont" value=0}
        {section name=i loop=$listado}
  <tr {if $cont eq '0'} class='listado_a'
        	{assign var='cont' value=1} 
			{else} class='listado_b'
            {assign var='cont' value=0}{/if}>
      <td class="adminContenido">{$listado[i].tipo_dep}</td>
    <td class="adminContenido">{$listado[i].cedula_reg}</td>
    <td class="adminContenido">{$listado[i].nombre_reg}</td>
    <td class="adminContenido">{$listado[i].apellido_reg}</td>
    <td class="adminContenido">{$listado[i].banco_dep|truncate:40|escape:"htmlall"}</td>
    <td class="adminContenido">{$listado[i].numero_dep|escape:"htmlall"}</td>
    <td class="adminContenido">{$listado[i].fecha_dep}</td>
    <td class="adminContenido">{$listado[i].monto_dep|escape:"htmlall"}</td>
    <td align="center" width="40">
    {if $listado[i].verificado_dep eq 0}
    	<a onclick="javascript: return confirmar('&iquest; Seguro desea verificar &eacute;ste registro?');" href="editar.php?id={$listado[i].id_dep}&valor=1" title="Verificar">
        <img src="/imagenes/no.png" width="20" height="20" border="0" /></a>
    {else}
    	<a onclick="javascript: return confirmar('&iquest; Seguro desea anular &eacute;ste registro?');" href="editar.php?id={$listado[i].id_dep}&valor=0" title="Anular">
        <img src="/imagenes/si.png" width="20" height="20" border="0" /></a>
    {/if}
    </td>
    <td align="center" width="40"><a title="Eliminar" onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="../pagos/eliminar.php?id={$listado[i].id_dep}"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
    </tr>
        {/section}
        {else}
        {$mensaje}
        {/if}
        <tr>
          <td class="paginacion" align="right" colspan="10">
            <img src="/imagenes/cuadritos.png" width="37" height="11" align="left" />{* display pagination header *}
            {if $mensaje eq ""}
            {$paginate.first}-{$paginate.last} de {$paginate.total} Pagos.
            {* display pagination info *}
            {paginate_prev} {paginate_middle} {paginate_next}
            {/if}
        </td></tr>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a href="imprimir.php">Imprimir <img src="/imagenes/imprimir.png" width="30" height="30" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td> 
  </tr>
  <tr>
    <td colspan="3" align="center" class="pie">
   Marinart C.A | Copyright&copy; 2016 All Rights Reserved.</td>
  </tr> 
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

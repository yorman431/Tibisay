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
          <th colspan="4" align="left"><img src="/imagenes/cuadros.png" width="14" height="14" align="texttop" /> Lista de Documentos Descargables</th>
          <th colspan="4" align="right"><form id="form1" name="form1" method="post" action="">
              <img src="/imagenes/buscar.png" width="25" height="25" align="absmiddle" />
              <input name="buscar" type="text" id="buscar" value="{$busqueda}" size="26" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        <tr>
          <td width="60" class="subtituloWeb3">Categor&iacute;a</td>
          <td width="147" class="subtituloWeb3">T&iacute;tulo</td>
          <td width="152" class="subtituloWeb3">Descripci&oacute;n</td>
          <td width="60" class="subtituloWeb3">Fecha</td>
          <td width="58" class="subtituloWeb3">Tipo</td>
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
      <td class="adminContenido">{$listado[i].titulo_doc|truncate:50}</td>
    <td class="adminContenido">{$listado[i].contenido_doc|truncate:50}</td>
    <td class="adminContenido">{$listado[i].fecha_doc|escape:"htmlall"}</td>
    <td class="adminContenido">
     {if $listado[i].tipo_doc eq "application/msword"}
		<img src='/imagenes/word.png' width='32' height='32'/>
    {elseif $listado[i].tipo_doc eq "application/pdf"}
    	<img src='/imagenes/pdf.png' width='32' height='32'/>
	{elseif $listado[i].tipo_doc eq "application/vnd.ms-excel"}
    	<img src='/imagenes/xls.png' align='absmiddle' width='32' height='32'/>
    {elseif $listado[i].tipo_doc eq "application/octet-stream"} 
            <img src='/imagenes/xls.png' align='absmiddle' width='32' height='32'/> 
	{elseif $listado[i].tipo_doc eq "image/jpeg" || $listado[i].tipo_doc eq "image/png" || $listado[i].tipo_doc eq "image/pjpeg" || $listado[i].tipo_doc eq "image/x-png"}
    <img src='/imagenes/imagenjpg_big.png' align='absmiddle' width='32' height='32'/>
     {/if}
        </td>
    <td width="30" align="center"><a title="Detalles" href="detalle.php?id={$listado[i].id_doc}"><img src="/imagenes/detalle.png" width="30" height="25" border="0" /></a></td>
    <td width="30" align="center"><a title="Editar" href="editar.php?id={$listado[i].id_doc}"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    <td width="30" align="center"><a title="Eliminar" onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar.php?id={$listado[i].id_doc}"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
  </tr>
        {/section}
        {else}
        {$mensaje}
        {/if}
        <tr><td class="paginacion" align="right" colspan="8">
        <img src="/imagenes/cuadritos.png" width="37" height="11" align="left" />{* display pagination header *}
      {if $mensaje eq ""}
      {$paginate.first}-{$paginate.last} de {$paginate.total} Documentos.
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<a href="insertar.php">Insertar Documento <img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

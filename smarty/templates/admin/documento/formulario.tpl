<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" /> 
<title>Marinart | Panel Administrativo</title>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/imagenes/favicon.ico"> 

<script type="text/javascript" language="javascript" src="/js/validar.js"></script>
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
{literal}
<link rel="stylesheet" type="text/css" media="all" href="/calendario/calendar-blue.css" title="blue" />
<script type="text/javascript" src="/calendario/calendar.js"></script>
<script type="text/javascript" src="/calendario/lang/calendar-en.js"></script>
<script type="text/javascript" src="/calendario/calendar-setup.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	window.onload = function()
	{
		var editor = CKEDITOR.replace( 'contenido',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]
 
    		}
		);
		CKFinder.setupCKEditor( editor, '../../ckfinder/' ) ;
	};
</script>
	
{/literal}
<!-- InstanceEndEditable -->
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
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="MM_validateForm('titulo','','R','f_date_c','','R');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="967" align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb">
            <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
            {$mensaje}
              <tr>
                <td width="86" align="left" class="subtituloWeb3">Categor&iacute;a:</td>
                <td width="409" align="left">
                  <select name="categoria" id="categoria">
              {section name=i loop=$listado}
                    <option {if $categoria eq $listado[i].nombre_cat || $categoria eq $listado[i].id_cat} selected='selected'{/if} value="{$listado[i].id_cat}">
                    {$listado[i].nombre_cat}
                    </option>
              {/section}
                  </select></td>
              </tr>
              <tr>
                <td width="90" align="left" class="subtituloWeb3">T&iacute;tulo:</td>
                <td width="405"><input name="titulo" type="text" id="titulo" value="{$titulo}" size="71" maxlength="100" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Fecha:</td>
                <td><span class="normalContenido">
      <input name="fecha" type="text" class="normalContenido" id="f_date_c"   value="{$fecha}" size="30" maxlength="50" readonly="readonly" />
      </span><img src="/calendario/img.gif" name="f_trigger_c" width="20" height="14" align="absmiddle" id="f_trigger_c" style="cursor: pointer; border: 1px solid #005B7D;" title="Seleccionador de Fecha" onmouseover="this.style.background='#005B7D';" onmouseout="this.style.background=''" /> *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Archivo:</td>
                <td class="normalContenido"><input name="documento" type="file" class="normalContenido" id="documento" />
                  *                  
                  (1 Mb m&aacute;x)</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="subtituloWeb3">Descripci&oacute;n:</td>
                <td><textarea name="contenido" cols="70" rows="8" id="contenido">{$contenido}</textarea>
                  *</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="normalContenido"><input name="envio" type="submit" id="envio" onclick="javascript: return validardocumento('&iquest;Est&aacute; seguro que desea guardar?');" value="Guardar"/>
                  &nbsp;
                  <input type="button" name="Submit" value="Cancelar" onclick="javascripts: location.href='/admin/documento'" /> 
                  (*) Datos Obligatorios</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </form>
      {literal}
      <script type='text/javascript'>
	function catcalc(cal) {
		var date = cal.date;
		var time = date.getTime()
		var field = document.getElementById('f_calcdate');
		if (field == cal.params.inputField) {
			field = document.getElementById('f_date_c');
			time -= Date.WEEK;
		} else {
			time += Date.WEEK; 
		}
		var date2 = new Date(time);
		field.value = date2.print('%d/%m/%Y');
	}
	Calendar.setup({
		inputField     :    'f_date_c',   
		ifFormat       :    '%d/%m/%Y',       // formato de fecha
		button         :    'f_trigger_c',
		singleClick    :    true
	});
</script>
      {/literal}
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
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

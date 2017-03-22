<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
{literal}
<link rel="stylesheet" type="text/css" media="all" href="/calendario/calendar-blue.css" title="blue" />
<script type="text/javascript" src="/calendario/calendar.js"></script>
<script type="text/javascript" src="/calendario/lang/calendar-en.js"></script>
<script type="text/javascript" src="/calendario/calendar-setup.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
	window.onload = function()
	{
		CKEDITOR.replace( 'contenido',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]

    		}
		);
	};
</script>

    <link rel="Stylesheet" media="screen" href="/hora/css/reset.css" />
        <link rel="Stylesheet" media="screen" href="/hora/css/styles.css" />
        <link rel="Stylesheet" media="screen" href="/hora/dist/themes/default/ui.core.css" />
        <link rel="Stylesheet" media="screen" href="/hora/dist/themes/default/ui.timepickr.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript" src="/hora/js/jquery.utils.js"></script>
        <script type="text/javascript" src="/hora/js/jquery.strings.js"></script>
        <script type="text/javascript" src="/hora/js/jquery.anchorHandler.js"></script>
        <script type="text/javascript" src="/hora/js/jquery.ui.all.js"></script>
        <script type="text/javascript" src="/hora/src/ui.dropslide.js"></script>
        <script type="text/javascript" src="/hora/src/ui.timepickr.js"></script>


        <script type="text/javascript">
            $(function(){
                //$('#test-1').timepickr({trigger: '#trigger-test'});
              $('#demo-1').timepickr().focus();
              // temporary fix..
              $('.ui-dropslide ol:eq(0) li:first').mouseover();
              // apply theme
              $('#demo-1').next().addClass('dark');
            });
        </script>

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
      <form action="" method="post" name="form1" id="form1">
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          {$mensaje}
          <tr>
            <td align="right" class="subtituloWeb3"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
              {$mensaje}
  <tr>
    <td align="left" class="subtituloWeb3" width="15%">Categoría: {$categoria}</td>
    <td align="left" class="normalContenido" width="75%"><select name="categoria" class="normalContenido" id="categoria">
      <option value="">&lt; Select &gt;</option>
      <option value="Academico" {if $categoria eq "Academico"} selected='selected' {/if}>Academico</option>
      <option value="Tecnología" {if $categoria eq "Tecnología"} selected='selected' {/if}>Tecnología</option>
      <option value="Social" {if $categoria eq "Social"} selected='selected' {/if}>Social</option>
      <option value="Deportes" {if $categoria eq "Deportes"} selected='selected' {/if}>Deportes</option>
      <option value="Cine" {if $categoria eq "Cine"} selected='selected' {/if}>Cine</option>
      <option value="Teatro" {if $categoria eq "Teatro"} selected='selected' {/if}>Teatro</option>
      <option value="Literatura" {if $categoria eq "Literatura"} selected='selected' {/if}>Literatura</option>
      <option value="Eventos" {if $categoria eq "Eventos"} selected='selected' {/if}>Eventos</option>
      <option value="Ideas" {if $categoria eq "Ideas"} selected='selected' {/if}>Ideas</option>
      <option value="Otros" {if $categoria eq "Otros"} selected='selected' {/if}>Otros</option>
    </select>
    *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Título:</td>
    <td align="left" class="normalContenido"><input name="titulo" type="text" class="normalContenido" id="titulo" value="{$titulo}" size="71" maxlength="100" />
    *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Sub-Título:</td>
    <td align="left" class="normalContenido"><input name="subtitulo" type="text" class="normalContenido" id="subtitulo" value="{$subtitulo}" size="71" maxlength="100" />
      *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Fecha:</td>
    <td align="left" class="normalContenido"><span class="normalContenido">
      <input name="fecha" type="text" class="normalContenido" id="f_date_c"   value="{$fecha}" size="30" maxlength="50" readonly="readonly" />
    </span><img src="/calendario/img.gif" name="f_trigger_c" width="20" height="14" align="absmiddle" id="f_trigger_c" style="cursor: pointer; border: 1px solid #005B7D;" title="Seleccionador de Fecha" onmouseover="this.style.background='#005B7D';" onmouseout="this.style.background=''" /> *</td>
  </tr>

  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Hora:</td>
    <td align="left" class="normalContenido">
    	<div id="splash">
            <div id="demo">
                <div id="d-demo-wrapper-1" class="demo-wrapper">
                    <input id="demo-1" type="text" value="{$hora}" class="demo" name="hora" readonly="readonly">
                </div>
            </div>

        </div>
    </td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Autor:</td>
    <td align="left" class="normalContenido"><input name="autor" type="text" class="normalContenido" id="autor" value="{$autor}" size="71" maxlength="100" />
    *</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Contenido:</td>
    <td align="left" class="normalContenido">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" class="subtituloWeb3"><textarea name="contenido" cols="70" rows="6" class="normalContenido" id="contenido"  wrap="physical">{$contenido}</textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return validarnoticia('¿Está seguro que desea eliminar la imagen?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit3"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/noticia/'" />       (*) Required Data</td>
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
    <td width="50%" align="center"></td>
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

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
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','f_date_c','','R');return document.MM_returnValue">
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="right" class="subtituloWeb3"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
              {$mensaje}
                  <tr>
                    <td align="left" class="subtituloWeb3">Nombre</td>
                    <td align="left" class="normalContenido"><input name="nombre" type="text" class="normalContenido" id="nombre" value="{$nombres}" size="71" maxlength="100" />
                    *</td>
                  </tr>
                <tr>
    <td align="left" class="subtituloWeb3">Enlace:</td>
    <td align="left" class="normalContenido">
    <select name="enlace" id="enlace" onchange="javascripts: document.form1.submit();">
              {section name=i  loop=$listado}
                <option {if $enlace eq $listado[i].nombre_cat || $enlace eq $listado[i].id_cat} selected='selected'{/if} value="{$listado[i].id_cat}">{$listado[i].nombre_cat}</option>
              {/section}
              </select>
      *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Sub-Enlace:</td>
    <td align="left" class="normalContenido"><select name="subenlace" id="subenlace">
    			<option value="0">None(Principal)</option>
              {section name=j loop=$listado2}
                <option {if $subenlace eq $listado2[j].nombre_sub}selected='selected'{/if} value="{$listado2[j].id_sub}">{$listado2[j].nombre_sub}</option>
              {/section}
              </select></td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Fecha:</td>
    <td align="left" class="normalContenido"><span class="normalContenido">
      <input name="fecha" type="text" class="normalContenido" id="f_date_c"   value="{$fecha}" size="30" maxlength="50" readonly="readonly" />
		</span><img src="/calendario/img.gif" name="f_trigger_c" width="20" height="14" align="absmiddle" id="f_trigger_c" style="cursor: pointer; border: 1px solid #005B7D;" title="Select Date" onmouseover="this.style.background='#005B7D';" onmouseout="this.style.background=''" /> *</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Prioridad:</td>
    <td align="left" class="normalContenido"><input onkeypress="javascrip: return validarletrasnum(event);" name="prioridad" type="text" class="normalContenido" id="prioridad" value="{$prioridad}" size="71" maxlength="100" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Contenido:</td>
    <td align="left" class="normalContenido">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" class="subtituloWeb3"><textarea name="contenido" cols="70" rows="6" class="normalContenido" id="contenido"  wrap="physical">{$contenido}</textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="center" class="normalContenido"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return validarcontenido('¿Está seguro que desea guardar?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit3"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/contenido/'" />
      (*) Datos Requeridos</td>
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

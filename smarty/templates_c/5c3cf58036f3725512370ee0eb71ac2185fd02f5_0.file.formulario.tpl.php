<?php
/* Smarty version 3.1.30, created on 2017-03-11 18:40:55
  from "D:\Websites\tibisay\smarty\templates\admin\publicidad\formulario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c436a7871418_56529697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c3cf58036f3725512370ee0eb71ac2185fd02f5' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\publicidad\\formulario.tpl',
      1 => 1487191152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/header.tpl' => 1,
    'file:../layout/cabezera.tpl' => 1,
    'file:../layout/pie.tpl' => 1,
  ),
),false)) {
function content_58c436a7871418_56529697 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<?php $_smarty_tpl->_subTemplateRender("file:../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<link rel="stylesheet" type="text/css" media="all" href="/calendario/calendar-blue.css" title="blue" />
<?php echo '<script'; ?>
 type="text/javascript" src="/calendario/calendar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/calendario/lang/calendar-en.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/calendario/calendar-setup.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>


<!-- InstanceEndEditable -->
</head>
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" class="subtituloWeb3">
			<?php $_smarty_tpl->_subTemplateRender("file:../layout/cabezera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="967" align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="left" class="tituloWeb"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
              <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

  <tr>
    <td width="15%" align="left" class="subtituloWeb3">Name:</td>
    <td width="75%" class="normalContenido"><input onkeypress="javascripts: return validarletrasnum(event);" name="nombre" type="text" class="normalContenido" id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
" size="71" maxlength="100" />
      *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Date:</td>
    <td class="normalContenido"><span class="normalContenido">
      <input name="fecha" type="text" class="normalContenido" id="f_date_c"   value="<?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
" size="30" maxlength="50" readonly="readonly" />
      </span><img src="/calendario/img.gif" name="f_trigger_c" width="20" height="14" align="absmiddle" id="f_trigger_c" style="cursor: pointer; border: 1px solid #005B7D;" title="Seleccionador de Fecha" onmouseover="this.style.background='#005B7D';" onmouseout="this.style.background=''" /> *</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Description:</td>
    <td class="normalContenido">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" class="subtituloWeb3"><textarea name="descripcion" cols="70" rows="6" class="normalContenido" id="contenido"  wrap="physical"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</textarea></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input name="envio" type="submit" class="componentes" id="button2" onclick="javascript: return validargaleria('Are you sure you want to save?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/publicidad/'" />
      (*) Required Data</td>
    </tr>
            </table></td>
          </tr>
          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

        </table>
      </form>
      
      <?php echo '<script'; ?>
 type='text/javascript'>
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
<?php echo '</script'; ?>
>
      
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
  <?php $_smarty_tpl->_subTemplateRender("file:../layout/pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</table>
<?php echo '<script'; ?>
 type="text/javascript">
swfobject.registerObject("FlashID");
<?php echo '</script'; ?>
>
</body>
<!-- InstanceEnd --></html>
<?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-03-04 19:37:04
  from "D:\Websites\tibisay\smarty\templates\admin\banner\formulario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb095022daa7_08803978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ba8aae162f4fc237c87cef8edee40426efd022b' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\banner\\formulario.tpl',
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
function content_58bb095022daa7_08803978 (Smarty_Internal_Template $_smarty_tpl) {
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
 type="text/javascript" src="/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	window.onload = function()
	{
		var editor = CKEDITOR.replace( 'descripcion',
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
<?php echo '</script'; ?>
>


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
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="MM_validateForm('etiqueta','','R');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="967" align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="left" class="tituloWeb"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
            <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

              <tr>
                <td width="15%" align="left" class="subtituloWeb3">Label:</td>
                <td width="75%"><input name="etiqueta" type="text" id="etiqueta" value="<?php echo $_smarty_tpl->tpl_vars['etiqueta']->value;?>
" size="71" maxlength="100" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Efect:</td>
                <td><select name="efecto" id="efecto">
<option value="showBars" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "showBars") {?> selected='selected' <?php }?>>Show Bars</option>
<option value="cube" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "cube") {?> selected='selected' <?php }?>>Cube</option>
<option value="showBarsRandom" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "showBarsRandom") {?> selected='selected' <?php }?>>Show Bars Random</option>
<option value="tube" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "tube") {?> selected='selected' <?php }?>>Tube</option>
<option value="cubeStop" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "cubeStop") {?> selected='selected' <?php }?>>Cube Stop</option>
<option value="cubeHide" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "cubeHide") {?> selected='selected' <?php }?>>Cube Hide</option>
<option value="cubeSize" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "cubeSize") {?> selected='selected' <?php }?>>Cube Size</option>
<option value="horizontal" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "horizontal") {?> selected='selected' <?php }?>>Horizontal</option>
<option value="cubeRandom" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "cubeRandom") {?> selected='selected' <?php }?>>Cube Random</option>
<option value="fade" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "fade") {?> selected='selected' <?php }?>>Fade</option>
<option value="fadeFour" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "fadeFour") {?> selected='selected' <?php }?>>Fade Four</option>
<option value="paralell" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "paralell") {?> selected='selected' <?php }?>>Paralell</option>
<option value="blind" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "blind") {?> selected='selected' <?php }?>>Blind</option>
<option value="blindHeight" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "blindHeight") {?> selected='selected' <?php }?>>Blind Height</option>
<option value="directionLeft" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "directionLeft") {?> selected='selected' <?php }?>>Direction Left</option>
<option value="directionTop" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "directionTop") {?> selected='selected' <?php }?>>Direction Top</option>
<option value="directionBottom" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "directionBottom") {?> selected='selected' <?php }?>>Direction Bottom</option>
<option value="directionRight" <?php if ($_smarty_tpl->tpl_vars['efecto']->value == "directionRight") {?> selected='selected' <?php }?>>Direction Right</option>
                </select>
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Link:</td>
                <td class="normalContenido"><input name="vinculo" type="text" id="vinculo" value="<?php echo $_smarty_tpl->tpl_vars['vinculo']->value;?>
" size="71" maxlength="100" /></td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Image:</td>
                <td class="normalContenido"><input type="file" name="documento" id="documento" />
                  *
                  (512 Kb m&aacute;x)</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="subtituloWeb3">Content:</td>
                <td align="left" class="normalContenido">&nbsp;</td>
              </tr>
              <tr>
    <td colspan="2" align="center" valign="top" class="subtituloWeb3"><textarea name="descripcion" cols="70" rows="6" class="normalContenido" id="descripcion"  wrap="physical"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</textarea></td>
    </tr>
              <tr>
                <td colspan="2" align="center"><input name="envio" type="submit" id="envio" onclick="javascript: return validarbanner('Are you sure you want to save?');" value="Guardar"/>
                  &nbsp;
                  <input type="button" name="Submit" value="Cancelar" onclick="javascripts: location.href='/admin/banner'" />
                  (*) Required Data</td>
                </tr>
            </table></td>
          </tr>
        </table>
      </form>

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

<?php
/* Smarty version 3.1.30, created on 2017-03-16 00:22:45
  from "D:\Websites\tibisay\smarty\templates\admin\link\formulario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c9ccc5efffe8_57875064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e1012ccaf568f4c0318278cf412dc790833a832' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\link\\formulario.tpl',
      1 => 1489550387,
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
function content_58c9ccc5efffe8_57875064 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
  <?php $_smarty_tpl->_subTemplateRender("file:../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
      <form action="" method="post" name="form1" class="normal" id="form1" onsubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="center" class="subtituloWeb3"><table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="67" align="left" class="subtituloWeb3">Nombre:</td>
                <td width="320" class="normalContenido"><input name="nombre" type="text" class="componentes" id="nombre"  value="<?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
" size="45" maxlength="50" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Tipo:</td>
                <td class="normalContenido">
                <select name="tipo" id="tipo">
                    <option value="normal" <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "normal") {?> selected="selected"<?php }?> >Normal</option>
                    <option value="up" <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "up") {?> selected="selected"<?php }?> >Up</option>
                     <option value="pie" <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "pie") {?> selected="selected"<?php }?> >Footer</option>
          		</select>
                *
          </td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Etiqueta:</td>
                <td class="normalContenido">
                  <input name="etiqueta" type="text" class="componentes" id="etiqueta" value="<?php echo $_smarty_tpl->tpl_vars['etiqueta']->value;?>
" size="45" maxlength="50" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Prioridad:</td>
                <td class="normalContenido"><input name="prioridad" type="text" class="componentes" id="prioridad" onkeypress="javascripts: return validarletrasnum(event);" value="<?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
" size="45" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Icono:</td>
                <td class="normalContenido"><input name="icono" formnovalidate="formnovalidate" type="text" class="componentes" id="icono" value="" size="45" maxlength="100" />
                  *</td>
              </tr>
              <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

  <tr>
  <td>&nbsp;</td>
    <td align="left"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return confirmar('Are you sure you want to save?');" value="Guardar" />
      &nbsp;&nbsp;
      <input name="button2" type="button" class="componentes" id="button2" onclick="javascript: location.href='/admin/link/'" value="Cancelar" /> <span class="normalContenido">(*) Datos Requeridos</span></td>
  </tr>
            </table></td>
          </tr>
          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

        </table>
      </form>
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
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesión <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

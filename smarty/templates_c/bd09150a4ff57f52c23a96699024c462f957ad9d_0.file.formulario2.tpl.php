<?php
/* Smarty version 3.1.30, created on 2017-03-09 15:41:02
  from "D:\Websites\tibisay\smarty\templates\admin\link\formulario2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c1697ebc23a4_08542521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd09150a4ff57f52c23a96699024c462f957ad9d' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\link\\formulario2.tpl',
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
function content_58c1697ebc23a4_08542521 (Smarty_Internal_Template $_smarty_tpl) {
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
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="967" align="center" ><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="right" class="subtituloWeb3"><table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="74" align="left" class="subtituloWeb3">Name:</td>
                <td width="313"><input name="nombre" type="text" class="componentes" id="nombre"  value="<?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
" size="45" maxlength="50" /></td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Priority:</td>
                <td><input name="prioridad" type="text" class="componentes" id="prioridad" onkeypress="javascripts: return validarletrasnum(event);" value="<?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
" size="45" maxlength="20" /></td>
              </tr>
              <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

  <tr>
    <td colspan="2" align="center"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return confirmar('Are you sure you want to save?');" value="Guardar" />
      &nbsp;&nbsp;
      <input name="button2" type="button" class="componentes" id="button2" onclick="javascript: location.href='/admin/link/sublink_lista.php'" value="Cancelar" /></td>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

<?php
/* Smarty version 3.1.30, created on 2017-03-16 02:40:25
  from "D:\Websites\tibisay\smarty\templates\admin\link\detalle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c9ed09c34413_68685345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4d3b7a0af1ba25a91c64d169c83ae2faabd69fe' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\link\\detalle.tpl',
      1 => 1489550283,
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
function content_58c9ed09c34413_68685345 (Smarty_Internal_Template $_smarty_tpl) {
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th colspan="8" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['accion']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td width="92" align="right" class="subtituloWeb3">Nombre:</td>
    <td width="173" class="adminContenido"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['nombres']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
    <td width="67" align="right" class="adminContenido"><span class="subtituloWeb3">Prioridad:</span></td>
    <td width="96" class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
</td>
    <td width="69" align="right" class="subtituloWeb3">Tipo:</td>
    <td width="87" class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
    <td width="69" align="right" class="subtituloWeb3">Etiqueta:</td>
    <td width="198" class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['etiqueta']->value;?>
</td>
  </tr>
  <tr>
    <td colspan="8" align="center" class="subtituloWeb3"><table width="60%" border="0" cellspacing="0" cellpadding="0">
      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
      <?php if ($_smarty_tpl->tpl_vars['mensaje']->value == '') {?>
      <tr>
        <td colspan="4" align="center" class="subtituloWeb3">Sub-boton</td>
        </tr>
      <tr> <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listado']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
        <td width="25%" align="center" class="normalContenido2">
          <?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_sub'];?>
<a onclick="javascript: return confirmar('¿Está seguro que desea eliminar?');" href="sublink_borrar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_rel'];?>
&back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" /></a></td>
        <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
        <?php if ($_smarty_tpl->tpl_vars['cont']->value == 4) {?>
        <?php $_smarty_tpl->_assignInScope('cont', 0);
?> </tr>
      <tr> <?php }?>
        <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?> </tr>
      <?php } else { ?>
      <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

      <?php }?>

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
    <td width="50%" align="center"><a href="/admin/link">&nbsp;Atrás <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="sublink.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Add SubLink<img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

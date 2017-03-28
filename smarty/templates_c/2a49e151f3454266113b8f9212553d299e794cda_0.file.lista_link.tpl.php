<?php
/* Smarty version 3.1.30, created on 2017-03-27 19:53:20
  from "D:\Websites\tibisay\smarty\templates\admin\link\lista_link.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d951909c5158_51523816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a49e151f3454266113b8f9212553d299e794cda' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\link\\lista_link.tpl',
      1 => 1490283022,
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
function content_58d951909c5158_51523816 (Smarty_Internal_Template $_smarty_tpl) {
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
          <th colspan="4" align="left"> <img src="/imagenes/cuadros.png" width="14" height="14" align="texttop" /> Listado de Botones</th>
          <th colspan="4" align="right"><form id="form1" name="form1" method="post" action="">
              <input name="buscar" type="text" id="buscar" value="<?php echo $_smarty_tpl->tpl_vars['busqueda']->value;?>
" size="30" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        <tr>
          <td width="274" class="subtituloWeb3">Nombre</td>
          <td width="280" class="subtituloWeb3">Etiqueta</td>
          <td width="80" class="subtituloWeb3">Tipo</td>
          <td width="80" class="subtituloWeb3">Prioridad</td>
          <td width="228" class="subtituloWeb3">Id</td>
          <td colspan="3" align="center" class="subtituloWeb3">Acciones</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['mensaje']->value == '') {?>
        <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
        <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listado']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
  <tr <?php if ($_smarty_tpl->tpl_vars['cont']->value == '0') {?> class='listado_a'
        	<?php $_smarty_tpl->_assignInScope('cont', 1);
?>
			<?php } else { ?> class='listado_b'
            <?php $_smarty_tpl->_assignInScope('cont', 0);
}?>>
      <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_cat'];?>
</td>
      <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'];?>
</td>
      <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['tipo_cat'];?>
</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['prioridad_cat'];?>
</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'];?>
</td>
    <td width="30" align="center"><a title="Detalles" href="detalle.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'];?>
"><img src="/imagenes/detalle.png" width="30" height="25" border="0" /></a></td>
    <td width="30" align="center"><a title="Editar" href="editar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'];?>
"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    <td width="30" align="center"><a title="Eliminar" onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'];?>
"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
  </tr>
        <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
        <?php } else { ?>
        <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

        <?php }?>

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
    <td width="50%" align="center"><a href="insertar.php">Agregar Botón<img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;<a href="sublink_lista.php">Sub-Link list<img src="/imagenes/cambiar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

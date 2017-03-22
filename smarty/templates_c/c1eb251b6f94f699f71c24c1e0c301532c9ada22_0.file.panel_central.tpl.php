<?php
/* Smarty version 3.1.30, created on 2017-03-17 20:02:43
  from "D:\Websites\tibisay\smarty\templates\admin\panel_central.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cc32d3745311_22114029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1eb251b6f94f699f71c24c1e0c301532c9ada22' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\panel_central.tpl',
      1 => 1489548310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./layout/header.tpl' => 1,
    'file:./layout/cabezera.tpl' => 1,
    'file:./layout/pie.tpl' => 1,
  ),
),false)) {
function content_58cc32d3745311_22114029 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
  <?php $_smarty_tpl->_subTemplateRender("file:./layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
  <td colspan="3" align="left" class="subtituloWeb3">
    <?php $_smarty_tpl->_subTemplateRender("file:./layout/cabezera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
      <table width="100%" border="0" cellspacing="4" cellpadding="4" class="normal" align="center">
      <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

        <tr>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Botonera</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Contenido</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Banner</td>
          <td width="20%" align="center" class="subtituloWeb3">Categoría</td>

        </tr>
        <tr>
          <td height="25" align="center"><a href="/admin/link/"><img src="/imagenes/botonera.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/contenido/"><img src="/imagenes/mi_pedido.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/banner/"><img src="/imagenes/evento.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/categoria/"><img src="/imagenes/categoria.png" width="60" height="60" border="0" /></a></td>
        </tr>
        <tr>
          <td width="20%" align="center" class="subtituloWeb3">Hotel</td>
          <td width="20%" align="center" class="subtituloWeb3">Administradores</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Galería</td>
          <td width="20%" height="25" align="center" class="subtituloWeb3">Publicidad</td>
        </tr>
        <tr>
          <td height="25" align="center"><a href="/admin/hotel/"><img src="/imagenes/hoteles.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/usuario/"><img src="/imagenes/msn.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/galeria/"><img src="/imagenes/galeria.png" width="60" height="60" border="0" /></a></td>
          <td height="25" align="center"><a href="/admin/publicidad/"><img src="/imagenes/pedidos.png" width="60" height="60" border="0" /></a></td>

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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesión <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <?php $_smarty_tpl->_subTemplateRender("file:./layout/pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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

<?php
/* Smarty version 3.1.30, created on 2017-03-04 19:44:49
  from "D:\Websites\tibisay\smarty\templates\admin\banner\detalle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb0b21cffdb8_26344765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cc9971ed569142c073ccfc9b3c14e96d97be824' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\banner\\detalle.tpl',
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
function content_58bb0b21cffdb8_26344765 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<?php $_smarty_tpl->_subTemplateRender("file:../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript" src="/js/prototype.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/scriptaculous.js?load=effects"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/lightbox.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="/css/lightbox.css" type="text/css" media="screen" />

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
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" valign="top">
        <table width="100%" border="0" cellspacing="8" cellpadding="0">
      <tr>
        <td width="101" align="left" class="subtituloWeb3">Label:</td>
        <td width="625" class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['etiqueta']->value;?>
</td>
      </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Url:</td>
        <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="subtituloWeb3">Type:</td>
        <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="subtituloWeb3">Efect:</td>
        <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['efecto']->value;?>
</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="subtituloWeb3">Link:</td>
        <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['vinculo']->value;?>
</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="subtituloWeb3">Description:</td>
        <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</td>
      </tr>
        </table>
        </td>
        <td width="50%" valign="top">
        <table width="100%" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td width="10%" align="center" class="normalContenido2" valign="top"><a href="/imagenes/banner/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['etiqueta']->value;?>
" rel="lightbox[roadtrip]" >
    <img src="/imagenes/banner/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" width="250" border="0" class="fotos opacidad" /></a><br />
          <?php echo $_smarty_tpl->tpl_vars['etiqueta']->value;?>
</td>
        </tr>
    </table>
        </td>
      </tr>
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
    <td width="50%" align="center"><a href="/admin/banner">Back <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

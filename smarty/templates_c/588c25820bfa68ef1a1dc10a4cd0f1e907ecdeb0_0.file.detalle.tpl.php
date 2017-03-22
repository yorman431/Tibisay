<?php
/* Smarty version 3.1.30, created on 2017-03-17 15:39:41
  from "D:\Websites\tibisay\smarty\templates\admin\contenido\detalle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cbf52dc65d00_57704164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '588c25820bfa68ef1a1dc10a4cd0f1e907ecdeb0' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\contenido\\detalle.tpl',
      1 => 1489549778,
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
function content_58cbf52dc65d00_57704164 (Smarty_Internal_Template $_smarty_tpl) {
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th width="762" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center" class="titulo">
    <table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="60%" valign="top">
        <table width="90%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" class="subtituloWeb3">Nombre:</td>
            <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Vinculo:</td>
            <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</td>
            </tr>
          <tr>
            <td width="88" align="left" class="subtituloWeb3">Sub-Vinculo:</td>
            <td width="477" class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['subcategoria']->value;?>
</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Fecha:</td>
            <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
</td>
            </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Prioridad:</td>
            <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Contenido:</td>
            <td class="adminContenido">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>
</td>
            </tr>
          </table></td>
        <td width="40%" valign="top">
        <table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tr>
                <td align="center" colspan="4" class="subtituloWeb3">Imagenes Asignadas</td>
                </tr>
      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
      <?php if ($_smarty_tpl->tpl_vars['mensaje']->value == '') {?>
      <tr> <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listado']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
        <td width="10%" align="center" class="normalContenido2" valign="top">
          <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" rel="lightbox[roadtrip]" >
            <img border="0" src="/imagenes/<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" class="fotos" style=" width:100px; height:75px;" />
          </a><br />
          <?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>

          <a onclick="javascript: return confirmar('Are you sure you want to delete the image?');" href="imagen_borrar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_image'];?>
&amp;back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;tabla=contenido">
            <img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" />
          </a></td>
        <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
        <?php if ($_smarty_tpl->tpl_vars['cont']->value == 3) {?>
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
  <tr>
    <td colspan="5" align="center"><a href="imagen.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" /> Agregar Imagen</a></td>
  </tr>
    </table></td>
      </tr>
    </table>

          </td>
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
    <td width="50%" align="center"><a href="/admin/contenido">&nbsp;Atrás <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php"Cerrar Sesión <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
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

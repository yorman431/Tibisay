<?php
/* Smarty version 3.1.30, created on 2017-03-11 18:41:15
  from "D:\Websites\tibisay\smarty\templates\admin\publicidad\imagen.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c436bbe8a160_88211265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf586c8924c9f118e9645a2782afb7b76f145b5d' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\publicidad\\imagen.tpl',
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
function content_58c436bbe8a160_88211265 (Smarty_Internal_Template $_smarty_tpl) {
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
    <tr>
      <th colspan="2" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
    </tr>
    <tr>
      <td align="right" class="subtituloWeb3">Name:</td>
      <td class="normalContenido"><input name="nombre" type="text" class="componentes" id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
" size="48" maxlength="100" />
        *</td>
    </tr>
    <tr>
      <td align="right" class="subtituloWeb3">URL:</td>
      <td class="normalContenido"><input name="url" type="text" class="normalContenido" id="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" size="48" maxlength="100" /></td>
    </tr>
    <tr>
      <td width="291" align="right" class="subtituloWeb3">Image:</td>
      <td width="509"><input name="archivo" type="file" id="archivo" size="33" /></td>
    </tr>
    <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

    <tr>
      <td colspan="2" align="center" class="normalContenido"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return confirmar('Are you sure you want to save?');" value="Enviar" />
        &nbsp;&nbsp;
        <input name="button2" type="button" class="componentes" id="button2" onclick="javascript: location.href='/admin/<?php echo $_smarty_tpl->tpl_vars['carpeta']->value;?>
/detalle.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'" value="Cancelar" />
(*) Datos Obligatorios </td>
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

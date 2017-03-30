<?php
/* Smarty version 3.1.30, created on 2017-03-29 22:55:48
  from "D:\Websites\tibisay\smarty\templates\admin\hotel\lista_hotel.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dc1f5414c9f6_93826700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8af60b480e4b7d2620cd4acc643c10b5be763d35' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\hotel\\lista_hotel.tpl',
      1 => 1490755422,
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
function content_58dc1f5414c9f6_93826700 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\Websites\\tibisay\\smarty\\libs\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_paginate_prev')) require_once 'D:\\Websites\\tibisay\\smarty\\libs\\plugins\\function.paginate_prev.php';
if (!is_callable('smarty_function_paginate_middle')) require_once 'D:\\Websites\\tibisay\\smarty\\libs\\plugins\\function.paginate_middle.php';
if (!is_callable('smarty_function_paginate_next')) require_once 'D:\\Websites\\tibisay\\smarty\\libs\\plugins\\function.paginate_next.php';
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
    <td colspan="3" align="left" background="/imagenes/fondo_admin.jpg" class="subtituloWeb3"><?php $_smarty_tpl->_subTemplateRender("file:../layout/cabezera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
          <th colspan="5" align="left"><img src="/imagenes/cuadros.png" width="14" height="14" align="texttop" /> Lista de Hoteles</th>
          <th colspan="5" align="right">
          <form id="form1" name="form1" method="post" action="">
              <img src="/imagenes/buscar.png" width="25" height="25" align="absmiddle" />
              <input name="buscar" type="text" id="buscar" value="<?php echo $_smarty_tpl->tpl_vars['busqueda']->value;?>
" size="26" maxlength="60" />
              <input name="Submit" type="submit" id="button" value="Buscar" />
          </form></th>
        </tr>
        <tr>
          <td width="10" class="subtituloWeb3">P&uacute;blico</td>
          <td width="70" class="subtituloWeb3">C&oacute;digo</td>
          <td width="100" class="subtituloWeb3">Nombre</td>
          <td width="50" class="subtituloWeb3">Categor&iacute;a</td>
          <td width="100" class="subtituloWeb3">Pa&iacute;s</td>
          <td width="58" class="subtituloWeb3">Prioridad</td>
          <td width="58" class="subtituloWeb3">Estado</td>
          <td colspan="4" align="center" class="subtituloWeb3">Acciones</td>
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
    <td class="adminContenido">
    	<?php if ($_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['disponible_hot'] == 0) {?>
            <a onclick="javascript: return confirmar('&iquest; Seguro desea publicar &eacute;ste hotel?');" href="editar4.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_hot'];?>
&valor=1" title="Publicar">
            <img src="/imagenes/no.png" width="20" height="20" border="0" /></a>
        <?php } else { ?>
            <a onclick="javascript: return confirmar('&iquest; Seguro desea ocultar &eacute;ste hotel?');" href="editar4.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_hot'];?>
&valor=0" title="Ocultar">
            <img src="/imagenes/si.png" width="20" height="20" border="0" /></a>
        <?php }?>
    </td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['codigo_hot'];?>
</td>
    <td class="adminContenido"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_hot'],40);?>
</td>
    <td class="adminContenido">
    <?php if ($_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['categoria_hot'] == '6') {?>
    <!--BOUTIQUE -->
    <h4 class="color-fa no_margin2">Boutique</h4>
    
    <?php } elseif ($_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['categoria_hot'] == '7') {?>
    <!--POSADA -->
    <h4 class="color-fa no_margin2">Boutique</h4>
    <?php } else { ?>
    	<?php $_smarty_tpl->_assignInScope('estrella', 1);
?>
    	<?php
$__section_j_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if (true) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= 5; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?> 
         <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['estrella']->value <= $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['categoria_hot']) {?> color-fa <?php } else { ?> color-fa2 <?php }?>"></i>
         <?php $_smarty_tpl->_assignInScope('estrella', $_smarty_tpl->tpl_vars['estrella']->value+1);
?>
         
     
     	<?php
}
}
if ($__section_j_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_1_saved;
}
?> 
    <?php }?>
    
   
    </td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pais_hot'];?>
 <img border="0" align="absmiddle" src="/imagenes/banderas/<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['bandera_hot'];?>
.png" width="16" height="11" /></td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['prioridad_hot'];?>
</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['estado_hot'];?>
</td>
    <td width="30" align="center"><a href="actualizar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_hot'];?>
" title="Actualizar"> <i class="fa fa-upload fa-lg"></i></a></td>
    <td width="30" align="center"><a href="detalle.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_hot'];?>
" title="Detalles"><img src="/imagenes/detalle.png" width="30" height="25" border="0" /></a></td>
    <td width="30" align="center"><a href="editar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_hot'];?>
" title="Editar"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    <td width="30" align="center"><a onclick="return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_hot'];?>
" title="Eliminar"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
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
        
        <tr><td colspan="9" align="right" class="paginacion">
        <?php if ($_smarty_tpl->tpl_vars['mensaje']->value == '') {?>
        
      Hoteles <?php echo $_smarty_tpl->tpl_vars['paginate']->value['first'];?>
-<?php echo $_smarty_tpl->tpl_vars['paginate']->value['last'];?>
 de <?php echo $_smarty_tpl->tpl_vars['paginate']->value['total'];?>
 Existentes.
      
      <?php echo smarty_function_paginate_prev(array(),$_smarty_tpl);?>
 <?php echo smarty_function_paginate_middle(array(),$_smarty_tpl);?>
 <?php echo smarty_function_paginate_next(array(),$_smarty_tpl);?>

      <?php }?>
      </td></tr>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<a href="insertar.php">Insertar Hotel <img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

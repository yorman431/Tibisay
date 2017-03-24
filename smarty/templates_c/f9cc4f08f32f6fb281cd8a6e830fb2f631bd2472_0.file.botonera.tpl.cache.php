<?php
/* Smarty version 3.1.30, created on 2017-03-23 23:30:58
  from "D:\Websites\tibisay\smarty\templates\layout\botonera.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d44ca22921f2_62554797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9cc4f08f32f6fb281cd8a6e830fb2f631bd2472' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\botonera.tpl',
      1 => 1490283024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d44ca22921f2_62554797 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1665658d44ca2254968_10236024';
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/index.php" class="navbar-brand hidden-xs"><img src="/imagenes/logo-navbar.png" alt=""></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="padding-top:17px;">
        <?php
$__section_i_16_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_16_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['enlaces_B']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_16_total = $__section_i_16_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_16_total != 0) {
for ($__section_i_16_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_16_iteration <= $__section_i_16_total; $__section_i_16_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>

            <!--<li class="dropdown">
              <a title="<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'];?>
" href="contenido.php?cont=<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'];?>
" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['icono_cat'];?>
&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;"><?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_cat'];?>
</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
$__section_j_17_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$__section_j_17_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['enlaces']) ? count($_loop) : max(0, (int) $_loop));
$__section_j_17_total = $__section_j_17_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_17_total != 0) {
for ($__section_j_17_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_17_iteration <= $__section_j_17_total; $__section_j_17_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                  <li><a class="transicion" title="<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_cat'];?>
" href="#<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['enlaces'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['nombre_sub'];?>
"><?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['enlaces'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['nombre_sub'];?>
</a></li>
                <?php
}
}
if ($__section_j_17_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_17_saved;
}
?>
              </ul>
            </li>-->

            <?php if ($_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['icono_cat'] != '') {?>
              <li <?php if ($_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'] == $_smarty_tpl->tpl_vars['activo']->value) {?>class="active"<?php }?>><a class="transicion" title="<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'];?>
" <?php if ($_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'] == "HOME") {?>href="/index.php"<?php } else { ?> href="#<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'];?>
 <?php }?>" id="efecto"><?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['icono_cat'];?>
&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;"><?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_cat'];?>
</span></a></li>
            <?php } else { ?>
              <li <?php if ($_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_cat'] == $_smarty_tpl->tpl_vars['activo']->value) {?>class="active"<?php }?>><a class="transicion" title="<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'];?>
" <?php if ($_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'] == "HOME") {?>href="/index.php"<?php } else { ?> href="#<?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_cat'];?>
 "<?php }?> id="efecto"><?php echo $_smarty_tpl->tpl_vars['enlaces_B']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_cat'];?>
</a></li>
            <?php }?>

        <?php
}
}
if ($__section_i_16_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_16_saved;
}
?>
      </ul>
      <ul class="nav navbar-nav navbar-right hidden-xs">
        <li><a href=" https://www.facebook.com/tibisayhotelboutique/" target="_blank"><img src="/imagenes/facebook.png" alt="" height="50" width="50"></a></li>
        <li><a href="https://twitter.com/TibisayHotel"  target="_blank"><img src="/imagenes/twitter.png" alt="" height="50" width="50"></a></li>
        <li><a href="https://www.instagram.com/tibisayhotelboutique/" target="_blank"><img src="/imagenes/instagram.png" alt="" height="50" width="50"></a></li>
      </ul>
    </div>
  </div>
</nav>
<?php }
}

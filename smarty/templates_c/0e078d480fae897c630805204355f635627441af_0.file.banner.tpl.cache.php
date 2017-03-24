<?php
/* Smarty version 3.1.30, created on 2017-03-23 23:30:58
  from "D:\Websites\tibisay\smarty\templates\layout\banner.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d44ca23b2e25_94887925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e078d480fae897c630805204355f635627441af' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\banner.tpl',
      1 => 1490283024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d44ca23b2e25_94887925 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1741758d44ca23947f3_87335937';
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
  <?php
$__section_i_18_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_18_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['banner']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_18_total = $__section_i_18_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_18_total != 0) {
for ($__section_i_18_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_18_iteration <= $__section_i_18_total; $__section_i_18_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['cont']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cont']->value == "0") {?>class="active"<?php }?>></li>
  <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
  <?php
}
}
if ($__section_i_18_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_18_saved;
}
?>
  </ol>

  <div class="carousel-inner" role="listbox">

  <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
  <?php
$__section_i_19_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_19_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['banner']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_19_total = $__section_i_19_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_19_total != 0) {
for ($__section_i_19_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_19_iteration <= $__section_i_19_total; $__section_i_19_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
    <div <?php if ($_smarty_tpl->tpl_vars['cont']->value == "0") {?>class="item active"<?php } else { ?>class="item"<?php }?>>
      <img class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_ban'];?>
" src="/imagenes/banner/<?php echo $_smarty_tpl->tpl_vars['banner']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['url_ban'];?>
">
    </div>
  <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
  <?php
}
}
if ($__section_i_19_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_19_saved;
}
?>

  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.Banner -->
<?php }
}

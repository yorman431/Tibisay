<?php
/* Smarty version 3.1.30, created on 2017-03-27 22:57:07
  from "D:\Websites\tibisay\smarty\templates\admin\layout\cabezera.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d97ca31b6ce5_75239516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '626ca5da9a6f41a09bce5c96abe21762cc61814e' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\layout\\cabezera.tpl',
      1 => 1490283022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d97ca31b6ce5_75239516 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="42%"><img src="/imagenes/logo.png" style="padding-left:5px"/> </td>
    <td width="56%" align="right" valign="middle" class="normalContenido">Panel Central de Utilidades -        <span class="sub_usuario">User:</span> <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
 <img src="/imagenes/user.png" width="30" height="30" align="absmiddle" />
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="597" height="48">
        <param name="movie" value="/swf/redes_hora.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="transparent" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="/Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="/swf/redes_hora.swf" width="597" height="48">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="transparent" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="/Scripts/expressInstall.swf" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
    </object></td>
    <td width="2%" align="right" valign="middle" class="normalContenido2">&nbsp;</td>
  </tr>
</table>
<?php }
}

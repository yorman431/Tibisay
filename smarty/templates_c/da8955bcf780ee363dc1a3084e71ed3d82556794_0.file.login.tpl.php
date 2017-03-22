<?php
/* Smarty version 3.1.30, created on 2017-03-16 00:06:52
  from "D:\Websites\tibisay\smarty\templates\admin\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c9c90c59ae85_70670558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da8955bcf780ee363dc1a3084e71ed3d82556794' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\login.tpl',
      1 => 1489548360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c9c90c59ae85_70670558 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Tibisay Hotel Boutique Margarita | Panel Administrativo</title>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />



<link rel="shortcut icon" href="/imagenes/icono.ico">
<?php echo '<script'; ?>
 type="text/javascript" language="javascript" src="/js/validar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/Scripts/AC_RunActiveContent.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body>
<br />
<br />
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="marco">
  <tr>
    <td align="center"><img src="/imagenes/logo.png" /></td>
  </tr>
  <tr>
    <td class="division"></td>
  </tr>
  <tr>
    <td class="division2"></td>
  </tr>
  <tr>
    <td><form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('login','','R','password','','R');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <td colspan="3" align="center" class="titulo">Autentificación de Usuario </td>
          </tr>
          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

          <tr>
            <td width="67" align="left" class="tituloWeb">Usuario:</td>
            <td width="308"><input name="login" type="text" id="login" size="40" maxlength="20" /></td>
            <td width="72" rowspan="3" align="center" valign="top"><img src="/imagenes/candado.png" width="60" height="60" /></td>
          </tr>
          <tr>
            <td align="left" class="tituloWeb">Contraseña:</td>
            <td><input name="password" type="password" id="password" size="40" maxlength="20" /></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="left"><input name="boton_login" type="submit" value="Entrar" />
            <a href="recuperar_clave.php">&nbsp;&nbsp;&iquest;Olvido la contraseña? </a></td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
<br />
</body>
</html>
<?php }
}

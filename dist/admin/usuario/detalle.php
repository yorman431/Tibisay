<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Usuario
include_once ("../../config/class.usuario.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$usuario = new Usuario;
$usuario->accion="Detalles del Usuario";
$usuario->mostrar_usuario();

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $usuario->nombre);
$smarty->assign("apellidos", $usuario->apellido);
$smarty->assign("correo", $usuario->correo);
$smarty->assign("login", $usuario->login);
$smarty->assign("nivel", $usuario->nivel);
$smarty->assign("tipo", $usuario->tipo);
$smarty->assign("accion", $usuario->accion);
$smarty->display('admin/usuario/detalle.tpl');
/* Fin footer para Smarty */
?> 
<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Eliminar de Usuario
include_once ("../../config/class.login.php");
include_once ("../../config/class.link.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$link = new Link;

$link->eliminar_link();

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
?> 
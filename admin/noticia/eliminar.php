<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Eliminar de Noticia
include_once ("../../config/class.login.php");
include_once ("../../config/class.noticia.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$noticia = new Noticia;

$noticia->eliminar_noticia();

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
?> 
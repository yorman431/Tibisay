<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Index de Usuario
include_once ("../../config/class.galeria.php");
include_once("../../config/conexion.inc.php"); 
include_once ("../../config/class.login.php"); 
session_start();

$auth = new Auth;
$auth->permisos();
//$auth->nivel_acceso(1,"distinto");

$galeria = new Galeria;

$galeria->eliminar_imagen();

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $_GET['id_back']);
$smarty->display('admin/producto/detalle.tpl');
/* Fin footer para Smarty */
?> 
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
include_once ("../../config/class.link.php");
include_once("../../config/conexion.inc.php"); 
session_start();
$link = new Link;

$link->eliminar_sublink();

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $link->listado);
$smarty->assign("accion", $link->accion);
$smarty->assign("id", $_GET['back']);
$smarty->display('admin/link/detalle.tpl');
/* Fin footer para Smarty */
?> 
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
include_once ("../../config/class.categoria.php");
include_once("../../config/conexion.inc.php"); 
session_start();
$categoria = new Categoria;

$categoria->eliminar_subcategoria();

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $categoria->listado);
$smarty->assign("accion", $categoria->accion);
$smarty->assign("id", $_GET['back']);
$smarty->display('admin/categoria/detalle.tpl');
/* Fin footer para Smarty */
?> 
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
include_once ("../../config/class.color.php");
include_once("../../config/conexion.inc.php"); 
session_start();
$color = new Color;
$color->asignar_color();

if($color->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='7' class='error'>No hay colores insertados en la tabla de colores!</td></tr>";
}
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $color->listado);
$smarty->assign("accion", $color->accion);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("id", $_GET['id']);
$smarty->display('admin/colores/color.tpl');
/* Fin footer para Smarty */
?> 
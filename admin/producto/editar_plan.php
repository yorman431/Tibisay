<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Insertar de Producto
include_once ("../../config/class.producto.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$producto = new Producto;
$producto->editar_plan_temporada_producto($conex);

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("id", $_GET['id']);
$smarty->assign("temp", $_GET['temp']);
	
$smarty->assign("nombre_plan", $producto->nombre);
$smarty->assign("descripcion_plan", $producto->descripcion);
$smarty->assign("precio_plan", $producto->precio);
$smarty->assign("maxadultos", $producto->maxadultos);
$smarty->assign("prioridad", $producto->prioridad);
$smarty->assign("publica", $producto->mostrar);

$smarty->assign("listado", $producto->listado);
$smarty->assign("listado2", $producto->listado2);
$smarty->assign("accion", $producto->accion);
$smarty->display('admin/producto/formulario_plan.tpl');
/* Fin footer para Smarty */
?> 
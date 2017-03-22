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
$producto->editar_temporada_producto($conex);

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("id", $producto->id_cat);
	
$smarty->assign("desde", $producto->desde);
$smarty->assign("hasta", $producto->hasta);
$smarty->assign("titulo", $producto->titulo);
$smarty->assign("alternativo", $producto->alternativo);
$smarty->assign("paxadicional", $producto->paxadicional);
$smarty->assign("prioridad", $producto->prioridad);
$smarty->assign("publica", $producto->mostrar);

$smarty->assign("desde_a", $producto->desde_a);
$smarty->assign("hasta_a", $producto->hasta_a);
$smarty->assign("precio_a", $producto->precio_a);
$smarty->assign("desde_b", $producto->desde_b);
$smarty->assign("hasta_b", $producto->hasta_b);
$smarty->assign("precio_b", $producto->precio_b);


$smarty->assign("listado", $producto->listado);
$smarty->assign("listado2", $producto->listado2);
$smarty->assign("accion", $producto->accion);
$smarty->display('admin/producto/formulario_temporada.tpl');
/* Fin footer para Smarty */
?> 
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
include_once ("../../config/class.hotel.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$hotel = new Hotel;
$hotel->editar_plan_temporada_hotel($conex);

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("id", $_GET['id']);
$smarty->assign("temp", $_GET['val']);
	
$smarty->assign("nombre_plan", $hotel->nombre);
$smarty->assign("descripcion_plan", $hotel->descripcion);
$smarty->assign("precio_plan", $hotel->precio);
$smarty->assign("weekend_plan", $hotel->weekend);
$smarty->assign("tipotarifa_plan", $hotel->tipotarifa);
$smarty->assign("regimen_plan", $hotel->regimen);
$smarty->assign("maxadultos", $hotel->maxadultos);
$smarty->assign("maxpaxadd", $hotel->maxpaxadd);
$smarty->assign("prioridad", $hotel->prioridad);
$smarty->assign("publica", $hotel->mostrar);

$smarty->assign("listado", $hotel->listado);
$smarty->assign("listado2", $hotel->listado2);
$smarty->assign("accion", $hotel->accion);
$smarty->force_compile=true;
$smarty->display('admin/hotel/formulario_plan.tpl');
/* Fin footer para Smarty */
?> 
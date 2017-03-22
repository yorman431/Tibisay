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
$hotel->insertar_temporada_hotel($conex);

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("id", $_GET['id']);
	
$smarty->assign("desde", $hotel->desde);
$smarty->assign("hasta", $hotel->hasta);
$smarty->assign("titulo", $hotel->titulo);
$smarty->assign("alternativo", $hotel->alternativo);
$smarty->assign("paxadicional", $hotel->paxadicional);
$smarty->assign("prioridad", $hotel->prioridad);
$smarty->assign("publica", $hotel->mostrar);

$smarty->assign("desde_a", $hotel->desde_a);
$smarty->assign("hasta_a", $hotel->hasta_a);
$smarty->assign("precio_a", $hotel->precio_a);
$smarty->assign("desde_b", $hotel->desde_b);
$smarty->assign("hasta_b", $hotel->hasta_b);
$smarty->assign("precio_b", $hotel->precio_b);

$smarty->assign("listado", $hotel->listado);
$smarty->assign("listado2", $hotel->listado2);
$smarty->assign("accion", $hotel->accion);
$smarty->display('admin/hotel/formulario_temporada.tpl');
/* Fin footer para Smarty */
?> 
<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Index de Producto
include_once ("../../config/class.login.php");
include_once ("../../config/class.hotel.php");
include_once("../../config/conexion.inc.php");
require('../../smarty/libs/SmartyPaginate.class.php');

session_start();

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(3,"igual");

if(isset($_POST['ciudad']) && $_POST['ciudad']!=""){
	$_SESSION['ciudad_admin']= $_POST['ciudad'];
}

if(!isset($_SESSION['ciudad_admin']) && $_SESSION['ciudad_admin']=="")
	$_SESSION['ciudad_admin']="Margarita";

if (isset($_POST['buscar']))
	SmartyPaginate::disconnect();
// required connect
SmartyPaginate::connect();
// set items per page
SmartyPaginate::setLimit(20);
SmartyPaginate::setPrevText('Anterior');
SmartyPaginate::setNextText('Siguiente');
SmartyPaginate::setFirstText('Primer');
SmartyPaginate::setLastText('Último');

$auth = new Auth;
$auth->permisos();

$hotel = new Hotel;
$hotel->listar_hotel();
$data=$hotel->listado;
//print_r($producto->listado);

function get_db_results($_data) {
	SmartyPaginate::setTotal(count($_data));
	return array_slice($_data, SmartyPaginate::getCurrentIndex(),
		SmartyPaginate::getLimit());
}

if($hotel->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='9' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("busqueda", $hotel->buscar);
$smarty->assign("mensaje", $mensaje);
// assign your db results to the template
if($hotel->mensaje=="si")
	$smarty->assign('listado', get_db_results($data));
// assign {$paginate} var
SmartyPaginate::assign($smarty);
// display results
$smarty->force_compile=true;
$smarty->display('admin/hotel/lista_hotel.tpl');
/* Fin footer para Smarty */
?>
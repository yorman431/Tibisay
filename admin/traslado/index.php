<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Certificado
include_once ("../../config/class.login.php");
include_once ("../../config/class.traslado.php");
include_once("../../config/conexion.inc.php");
require('../../smarty/libs/SmartyPaginate.class.php');

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

if (isset($_POST['buscar']))
	SmartyPaginate::disconnect();
// required connect
SmartyPaginate::connect();
// set items per page
SmartyPaginate::setLimit(10);
SmartyPaginate::setPrevText('Anterior');
SmartyPaginate::setNextText('Siguiente');
SmartyPaginate::setFirstText('Primer');
SmartyPaginate::setLastText('�ltimo');

$traslado = new Traslado;
$traslado->listado_admin();
$data=$traslado->listado_admin;

function get_db_results($_data) {
	SmartyPaginate::setTotal(count($_data));
	return array_slice($_data, SmartyPaginate::getCurrentIndex(),
		SmartyPaginate::getLimit());
}

if($traslado->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='7' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("busqueda", $traslado->buscar);
$smarty->assign("mensaje", $mensaje);
// assign your db results to the template
if($traslado->mensaje=="si")
$smarty->assign('listado', get_db_results($data));
// assign {$paginate} var
SmartyPaginate::assign($smarty);
// display results
$smarty->force_compile=true;
$smarty->display('admin/traslado/lista_traslado.tpl');
/* Fin footer para Smarty */
?>

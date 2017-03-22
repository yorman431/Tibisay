<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Index de Categoria
include_once ("../../config/class.login.php");
include_once ("../../config/class.link.php");
include_once("../../config/conexion.inc.php");
require('../../smarty/libs/SmartyPaginate.class.php');

$auth = new Auth;
$auth->permisos();

if (isset($_POST['buscar']))
	SmartyPaginate::disconnect();
// required connect
if($_SESSION['SmartyPaginate']['default']['url']!="/admin/link/index.php"){
	$_SESSION['SmartyPaginate']['default']['url']="/admin/link/index.php";
	SmartyPaginate::disconnect();
}

//echo $_SESSION['SmartyPaginate']['default']['url'];

SmartyPaginate::connect();
// set items per page
SmartyPaginate::setLimit(20);
SmartyPaginate::setPrevText('Anterior');
SmartyPaginate::setNextText('Siguiente');
SmartyPaginate::setFirstText('Primer');
SmartyPaginate::setLastText('Último');

$mensaje="";

function get_db_results($_data) {
	SmartyPaginate::setTotal(count($_data));
	return array_slice($_data, SmartyPaginate::getCurrentIndex(),
		SmartyPaginate::getLimit());
}

if(isset($_POST['tipo']) && $_POST['tipo']!=""){
	$tipo=$_POST['tipo'];
	$_SESSION['tipo']=$tipo;
}else if(isset($_SESSION['tipo']) && $_SESSION['tipo']!=""){
	$tipo=$_SESSION['tipo'];
}else{
	$tipo="normal";
}
	
$link = new Link;
$link->listar_link($tipo);
$data=$link->listado;

if($link->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='7' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
}

if(isset($_GET['error']) && $_GET['error']!="")
	$error="<tr><td align='center' colspan='7' class='error'>No es posible eliminar éste enlace ya que existen contenidos asociados a él!</td></tr>";
	
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("busqueda", $link->buscar);
$smarty->assign("tipo", $tipo);

if(isset($link->listado) && $link->listado!="")
	$smarty->assign('listado', get_db_results($data));
// assign {$paginate} var
SmartyPaginate::assign($smarty);

$smarty->assign("mensaje", $mensaje);
if(isset($_GET['error']) && $_GET['error']!="")
	$smarty->assign("error", $error);
$smarty->display('admin/link/lista_link.tpl');
/* Fin footer para Smarty */
?> 
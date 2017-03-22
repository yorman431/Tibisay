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
include_once ("../../config/class.categoria.php");
include_once("../../config/conexion.inc.php");
require('../../smarty/libs/SmartyPaginate.class.php');

$auth = new Auth;
$auth->permisos();

if (isset($_POST['buscar']))
	SmartyPaginate::disconnect();
// required connect
if($_SESSION['SmartyPaginate']['default']['url']=="/admin/categoria/index.php"){
	$_SESSION['SmartyPaginate']['default']['url']="/admin/categoria/subcategoria_lista.php";
	SmartyPaginate::disconnect();
}

SmartyPaginate::connect();
// set items per page
SmartyPaginate::setLimit(8);
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

$categoria = new Categoria;
$categoria->listar_subcategoria();
$data=$categoria->listado;

if($categoria->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='7' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
}

if(isset($_GET['error']) && $_GET['error']!="")
	$error="<tr><td align='center' colspan='7' class='error'>No es posible eliminar éste subenlace ya que existen contenidos asociados a él!</td></tr>";
	
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("busqueda", $categoria->buscar);

if(isset($categoria->listado) && $categoria->listado!="")
	$smarty->assign('listado', get_db_results($data));
// assign {$paginate} var
SmartyPaginate::assign($smarty);

$smarty->assign("mensaje", $mensaje);
if(isset($_GET['error']) && $_GET['error']!="")
	$smarty->assign("error", $error);
$smarty->display('admin/categoria/lista_subcategoria.tpl');
/* Fin footer para Smarty */
?> 
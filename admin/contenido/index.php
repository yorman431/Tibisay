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
include_once ("../../config/class.contenido.php");
include_once("../../config/conexion.inc.php"); 
require('../../smarty/libs/SmartyPaginate.class.php');

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$contenido = new Contenido;
$contenido->listar_contenido();
$data=$contenido->listado;


if($contenido->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='7' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("busqueda", $contenido->buscar);
$smarty->assign("mensaje", $mensaje);
// assign your db results to the template
if($contenido->mensaje=="si")
$smarty->assign('listado',$data);
$smarty->force_compile=true;
$smarty->display('admin/contenido/lista_contenido.tpl');
/* Fin footer para Smarty */

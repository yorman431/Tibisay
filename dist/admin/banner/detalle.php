<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Producto
include_once ("../../config/class.banner.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$banner=new Banner;
$banner->mostrar_banner();

$mensaje="";
if($banner->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $banner->id);
$smarty->assign("categoria", $banner->get_link2($banner->categoria));
$smarty->assign("subcategoria", $banner->subcategoria);
$smarty->assign("etiqueta", $banner->etiqueta);
$smarty->assign("prioridad", $banner->prioridad);
$smarty->assign("efecto", $banner->efecto);
$smarty->assign("vinculo", $banner->vinculo);
$smarty->assign("url", $banner->url);
$smarty->assign("tipo", $banner->tipo);
$smarty->assign("accion", $banner->accion);
$smarty->assign("mensaje", $mensaje);

// display results
$smarty->force_compile=true;
$smarty->display('admin/banner/detalle.tpl');
/* Fin footer para Smarty */
?> 
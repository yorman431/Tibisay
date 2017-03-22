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
include_once ("../../config/class.banner.php");
include_once ("../../config/class.link.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

if(!isset($banner))
	$banner = new Banner;
$banner->insertar_banner();
$auth->nivel_acceso(1,"distinto");

if(isset($_POST['categoria']) && $_POST['categoria']!=""){
	$banner->buscar_links($_POST['categoria']);
	$smarty->assign("categoria", $_POST['categoria']);
}else{
	$banner->buscar_links(1);
	$smarty->assign("categoria", 1);
}

if($banner->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El archivo supera 1Mb de espacio!</td></tr>";
}else if($banner->mensaje==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>S&oacute;lo se aceptan archivos de Imagen (jpg, jpeg)!</td></tr>";
}else if($banner->mensaje==3){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Por favor no olvide el archivo!</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("categoria", $banner->categoria);
$smarty->assign("etiqueta", $banner->etiqueta);
$smarty->assign("prioridad", $banner->prioridad);
$smarty->assign("efecto", $banner->efecto);
$smarty->assign("vinculo", $banner->vinculo);
$smarty->assign("accion", $banner->accion);
$smarty->assign("listado", $banner->listado);
$smarty->assign("listado2", $banner->listado2);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/banner/formulario.tpl');
/* Fin footer para Smarty */
?> 
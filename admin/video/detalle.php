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
include_once ("../../config/class.video.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$video=new Video;
$video->mostrar_video();



$mensaje="";
if($video->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $video->id);
$smarty->assign("nombres", $video->nombre);
$smarty->assign("fecha", $video->fecha);
$smarty->assign("ubicacion", $video->ubicacion);
$smarty->assign("descripcion", $video->descripcion);
$smarty->assign("url", $video->url);
$smarty->assign("tipo", $video->tipo);
$smarty->assign("categoria", $video->categoria);
$smarty->assign("accion", $video->accion);
$smarty->assign("mensaje", $mensaje);
if(isset($galeria->listado) && $video->listado!="")
	$smarty->assign('listado', $video->listado);
// display results
$smarty->force_compile=true;
$smarty->display('admin/video/detalle.tpl');
/* Fin footer para Smarty */
?> 
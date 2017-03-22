<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Editar de Producto
include_once ("../../config/class.video.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$video = new Video;
$video->editar_video();

if($video->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $video->nombre);
$smarty->assign("fecha", $video->fecha);
$smarty->assign("ubicacion", $video->ubicacion);
$smarty->assign("descripcion", $video->descripcion);
$smarty->assign("tipo", $video->tipo);
$smarty->assign("categoria", $video->categoria);
$smarty->assign("listado", $categoria->listado);
$smarty->assign("url", $video->url);
$smarty->assign("cliente", $video->cliente);
$smarty->assign("accion", $video->accion);
$smarty->display('admin/video/formulario.tpl');
/* Fin footer para Smarty */
?> 
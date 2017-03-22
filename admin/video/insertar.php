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
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.video.php");
include_once ("../../config/class.hotel.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$video = new Video;
$video->insertar_video();

if(isset($galeria->mensaje) && $galeria->mensaje=="error"){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El número de contrato que esta insertando ya existe en el sistema!</td></tr>";
	$smarty->assign("mensaje", $mensaje);
}
$categoria = new Hotel;
$categoria->listar_hotel();	
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $categoria->listado);
$smarty->assign("nombres", $video->nombre);
$smarty->assign("fecha", $video->fecha);
$smarty->assign("descripcion", $video->descripcion);
$smarty->assign("url", $video->url);
$smarty->assign("tipo", $video->tipo);
$smarty->assign("categoria", $categoria->listado);
$smarty->assign("accion", $video->accion);
$smarty->display('admin/video/formulario.tpl');
/* Fin footer para Smarty */
?> 
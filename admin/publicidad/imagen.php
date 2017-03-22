<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Index de Usuario
include_once ("../../config/class.publicidad.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$publicidad = new Publicidad;
$publicidad->insertar_imagen("publicidad");
$mensaje="";

if($publicidad->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El archivo supera 256Kb de espacio!</td></tr>";
}else if($publicidad->mensaje==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>S&oacute;lo se aceptan archivos de Imagen (jpg, jpeg)!</td></tr>";
}else if($publicidad->mensaje==3){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Por favor no olvide el archivo!</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $publicidad->nombre);
$smarty->assign("url", $publicidad->url);
$smarty->assign("fecha", $publicidad->fecha);
$smarty->assign("descripcion", $publicidad->descripcion);
$smarty->assign("accion", $publicidad->accion);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("carpeta", "publicidad");
$smarty->assign("id", $_GET['id']);
$smarty->display('admin/publicidad/imagen.tpl');
/* Fin footer para Smarty */
?> 
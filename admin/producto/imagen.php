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
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 
session_start();

$auth = new Auth;
$auth->permisos();
//$auth->nivel_acceso(1,"distinto");

$galeria = new Galeria;

$galeria->insertar_imagen("producto");
if($galeria->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2'><span class='error'>No olvide la imagen por favor!</span></td></tr>";	
}else if($galeria->mensaje==3){
	$mensaje="<tr><td align='center' colspan='2'><span class='error'>Sólo aceptamos formato de imagen (.jpg o .gif)!</span></td></tr>";	
}else if($galeria->mensaje==2){
	$mensaje="<tr><td align='center' colspan='2'><span class='error'>El Peso de la imagen no debe ser mayor a 1 Mb!</span></td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombre2", $galeria->nombre);
$smarty->assign("fecha", $galeria->fecha);
$smarty->assign("descripcion", $galeria->descripcion);
$smarty->assign("accion", $galeria->accion);
$smarty->assign("carpeta", "producto");
$smarty->assign("mensaje", $mensaje);
$smarty->assign("id", $_GET['id']);
$smarty->display('admin/galeria/imagen.tpl');
/* Fin footer para Smarty */
?> 
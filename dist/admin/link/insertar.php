<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Insertar de Categoria
include_once ("../../config/class.link.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$link = new Link;

$link->insertar_link();
if($link->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>En enlace que esta insertando ya existe en el sistema!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $link->nombre);
$smarty->assign("apellidos", $link->prioridad);
$smarty->assign("accion", $link->accion);
$smarty->assign("etiqueta", $link->etiqueta);
$smarty->assign("tipo", $link->tipo);
$smarty->assign("claves", $link->claves);
$smarty->assign("descripcion", $link->descripcion);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/link/formulario.tpl');
/* Fin footer para Smarty */
?> 
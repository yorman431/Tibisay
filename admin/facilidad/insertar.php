<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Insertar de Usuario
include_once ("../../config/class.facilidad.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$facilidad = new Facilidad;

$facilidad->insertar_facilidad();
if($facilidad->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}else if($facilidad->mensaje==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La clave no coincide con la cofirmación de la clave!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $facilidad->nombre);
$smarty->assign("etiqueta", $facilidad->etiqueta);
$smarty->assign("accion", $facilidad->accion);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/facilidad/formulario.tpl');
/* Fin footer para Smarty */
?> 
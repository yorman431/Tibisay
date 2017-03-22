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
include_once ("../../config/class.publicidad.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$publicidad = new Publicidad;

$publicidad->editar_publicidad();
if($publicidad->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $publicidad->nombre);
$smarty->assign("fecha", $publicidad->fecha);
$smarty->assign("descripcion", $publicidad->descripcion);
$smarty->assign("accion", $publicidad->accion);
$smarty->display('admin/publicidad/formulario.tpl');
/* Fin footer para Smarty */
?> 
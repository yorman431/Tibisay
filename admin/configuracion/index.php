<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Editar de Noticia
include_once ("../../config/class.configuracion.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$configuracion = new Config;

$configuracion->editar_config(1);
if($configuracion->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='ok'>Los datos han sido actualizados exitosamente!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("dolar", $configuracion->dolar);
$smarty->assign("euro", $configuracion->euro);
$smarty->assign("correo", $configuracion->correo);
$smarty->assign("website", $configuracion->website);
$smarty->assign("rif", $configuracion->rif);
$smarty->assign("empresa", $configuracion->empresa);
$smarty->assign("descuento", $configuracion->descuento);
$smarty->assign("aumento", $configuracion->aumento);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/configuracion/formulario.tpl');
/* Fin footer para Smarty */
?> 
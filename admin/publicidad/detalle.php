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
include_once ("../../config/class.publicidad.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$publicidad=new Publicidad;
$publicidad->mostrar_publicidad();

$publicidad->mostrar_imagenes("publicidad");

$mensaje="";
if($publicidad->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}

$publicidad->accion="Detalles de la Publicidad";

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $publicidad->id);
$smarty->assign("nombres", $publicidad->nombre);
$smarty->assign("fecha", $publicidad->fecha);
$smarty->assign("descripcion", $publicidad->descripcion);
$smarty->assign("accion", $publicidad->accion);
$smarty->assign("mensaje", $mensaje);
if(isset($publicidad->listado) && $publicidad->listado!="")
	$smarty->assign('listado', $publicidad->listado);
// display results
$smarty->force_compile=true;
$smarty->display('admin/publicidad/detalle.tpl');
/* Fin footer para Smarty */
?> 
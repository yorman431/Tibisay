<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Usuario
include_once ("../../config/class.facilidad.php");
include_once ("../../config/class.login.php");
include_once ("../../config/class.galeria.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$facilidad = new Facilidad;
$facilidad->accion="Detalles del Facilidad";
$facilidad->mostrar_facilidad();

$imagen=new Galeria;
$imagen->mostrar_imagenes("facilidad");
if($imagen->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}


/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $facilidad->id);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("nombres", $facilidad->nombre);
$smarty->assign("etiqueta", $facilidad->etiqueta);
$smarty->assign("accion", $facilidad->accion);
$smarty->assign("listado", $imagen->listado);
$smarty->display('admin/facilidad/detalle.tpl');
/* Fin footer para Smarty */
?> 
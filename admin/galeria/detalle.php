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
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$galeria=new Galeria;
$galeria->mostrar_galeria();

$galeria->mostrar_imagenes("galeria");

$mensaje="";
if($galeria->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}

$galeria->accion="Detalles de la Galer&iacute;a";

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $galeria->id);
$smarty->assign("nombres", $galeria->nombre);
$smarty->assign("fecha", $galeria->fecha);
$smarty->assign("descripcion", $galeria->descripcion);
$smarty->assign("accion", $galeria->accion);
$smarty->assign("mensaje", $mensaje);
if(isset($galeria->listado) && $galeria->listado!="")
	$smarty->assign('listado', $galeria->listado);
// display results
$smarty->force_compile=true;
$smarty->display('admin/galeria/detalle.tpl');
/* Fin footer para Smarty */
?> 
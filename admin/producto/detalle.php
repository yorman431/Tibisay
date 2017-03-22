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
include_once ("../../config/class.producto.php");
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$producto = new Producto;
$producto->accion="Detalles del Producto";
$producto->mostrar_producto();

$imagen=new Galeria;
$imagen->mostrar_imagenes("producto");
if($imagen->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}
/*
$temporadas = new Producto;
$temporadas->listar_temporada_privada($_GET['id']);

if($temporadas->mensaje!="si"){
	$mensaje2="<tr><td colspan='8' align='center' class='error'>No hay temporadas asignadas a este hotel!</td></tr>";	
}

if($temporadas->mensaje2!="si"){
	$mensaje3="<tr><td colspan='8' align='center' class='error'>No hay planes asignadas a esta temporada!</td></tr>";	
}*/


/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $producto->id);
$smarty->assign("codigo", $producto->codigo);
$smarty->assign("nombres", $producto->nombre);
$smarty->assign("categoria", $producto->categoria);
$smarty->assign("cantidad", $producto->cantidad);
$smarty->assign("fecha", $producto->fecha);
$smarty->assign("lugar", $producto->lugar);
$smarty->assign("prioridad", $producto->prioridad);
$smarty->assign("detal", $producto->detal);
$smarty->assign("mayor", $producto->mayor);
$smarty->assign("limite", $producto->limite);
$smarty->assign("limite2", $producto->limite2);
$smarty->assign("descripcion", $producto->descripcion);
$smarty->assign("claves", $producto->claves);
$smarty->assign("marca", $producto->marca);
//$smarty->assign("temporadas", $temporadas->listado);

$smarty->assign("accion", $producto->accion);
$smarty->assign("listado", $imagen->listado);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("mensaje3", $mensaje3);
$smarty->display('admin/producto/detalle.tpl');
/* Fin footer para Smarty */
?> 
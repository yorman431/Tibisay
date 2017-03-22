<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Contenido
include_once ("../../config/class.contenido.php");
//include_once ("../../config/class.color.php");
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$contenido = new Contenido;
$contenido->accion="Detalles del Contenido";
$contenido->mostrar_contenido();

$imagen=new Galeria;
$imagen->mostrar_imagenes("contenido");
if($imagen->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}
/* 
$color = new Color;
$color->mostrar_colores_producto();

if($color->mensaje!="si"){
	$mensaje2="<tr><td colspan='4' align='center' class='error'>No hay colores asignados!</td></tr>";	
} */

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("id", $contenido->id);
$smarty->assign("nombres", $contenido->nombre);
$smarty->assign("categoria", $contenido->enlace);
$smarty->assign("subcategoria", $contenido->subenlace);
$smarty->assign("fecha", $contenido->fecha);
$smarty->assign("contenido", $contenido->contenido);
$smarty->assign('prioridad', $contenido->prioridad);
$smarty->assign("accion", $contenido->accion);
$smarty->assign("listado", $imagen->listado);
//$smarty->assign("listado2", $color->listado);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("mensaje2", $mensaje2);
$smarty->display('admin/contenido/detalle.tpl');
/* Fin footer para Smarty */
?> 
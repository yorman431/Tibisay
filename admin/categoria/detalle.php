<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Categoria
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$categoria = new Categoria;
$categoria->accion="Detalles de Categoría";
$categoria->mostrar_categoria();

$imagen=new Galeria;
$imagen->mostrar_imagenes("categoria");
if($imagen->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("nombres", $categoria->nombre);
$smarty->assign("id", $categoria->id);
$smarty->assign("prioridad", $categoria->prioridad);
$smarty->assign("listado", $imagen->listado);
$smarty->assign("padre", $categoria->padre);
$smarty->assign("tipo", $categoria->tipo);
$smarty->assign("ciudad", $categoria->ciudad);
$smarty->assign("claves", $categoria->claves);
$smarty->assign("descripcion", $categoria->descripcion);
$smarty->assign("etiqueta", $categoria->etiqueta);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("accion", $categoria->accion);
$smarty->display('admin/categoria/detalle.tpl');
/* Fin footer para Smarty */
?> 
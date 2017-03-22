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
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$categoria = new Categoria;

$categoria->guardar_subcategoria();
if($categoria->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La categoria que esta insertando ya existe en el sistema!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $categoria->nombre);
$smarty->assign("apellidos", $categoria->prioridad);
$smarty->assign("accion", $categoria->accion);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/categoria/formulario.tpl');
/* Fin footer para Smarty */
?> 
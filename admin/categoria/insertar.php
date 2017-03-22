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

if (isset($_POST['tipo']) && $_POST['tipo']!=""){
	$_SESSION['tipo_temporal']=$_POST['tipo'];
	$tipo=$_POST['tipo'];
	$smarty->assign("tipo", $tipo);
}else{
	if (isset($_SESSION['tipo_temporal']) || $_SESSION['tipo_temporal']!=""){
		$tipo=$_SESSION['tipo_temporal'];
		$smarty->assign("tipo", $_SESSION['tipo_temporal']);
	}else{
		$tipo="productos";
		$smarty->assign("tipo", "productos");
	}
}

$categoria->insertar_categoria($tipo);
if($categoria->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La categoria que esta insertando ya existe en el sistema!</td></tr>";	
}


/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("nombres", $categoria->nombre);
$smarty->assign("apellidos", $categoria->prioridad);
$smarty->assign("etiqueta", $categoria->etiqueta);
$smarty->assign("padre", $categoria->padre);
$smarty->assign("claves", $categoria->claves);
$smarty->assign("descripcion", $categoria->descripcion);
$smarty->assign("accion", $categoria->accion);
$smarty->assign("listado", $categoria->listado);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/categoria/formulario.tpl');
/* Fin footer para Smarty */
?> 
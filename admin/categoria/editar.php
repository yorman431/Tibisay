<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Editar de Categoria
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$categoria = new Categoria;

if(isset($_POST['tipo']) && $_POST['tipo']!=""){
	$tipo=$_POST['tipo'];
	$temp= $tipo;
}

$categoria->editar_categoria($tipo);
if($categoria->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}

if($_POST)
	$categoria->tipo=$temp;

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("nombres", $categoria->nombre);
$smarty->assign("apellidos", $categoria->prioridad);
$smarty->assign("etiqueta", $categoria->etiqueta);
$smarty->assign("padre", $categoria->padre);
$smarty->assign("tipo", $categoria->tipo);
$smarty->assign("claves", $categoria->claves);
$smarty->assign("descripcion", $categoria->descripcion);
$smarty->assign("listado", $categoria->listado);
$smarty->assign("accion", $categoria->accion);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/categoria/formulario.tpl');
/* Fin footer para Smarty */
?> 
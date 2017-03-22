<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Editar de Producto
include_once ("../../config/class.contenido.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$contenido = new Contenido;

$contenido->editar_contenido();
if($contenido->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}

if(isset($_POST['enlace']) && $_POST['enlace']!=""){
	$contenido->buscar_enlaces($_POST['enlace']);
	$smarty->assign("enlace", $contenido->get_enlace2($_POST['enlace']));
}else{
	$smarty->assign("enlace", $contenido->enlace);
	$smarty->assign("subenlace", $contenido->subenlace);
}


/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $contenido->listado);
$smarty->assign("listado2", $contenido->listado2);
$smarty->assign("nombres", $contenido->nombre);
$smarty->assign('prioridad', $contenido->prioridad);
$smarty->assign("subenlace", $contenido->subenlace);
$smarty->assign("fecha", $contenido->fecha);
$smarty->assign("contenido", $contenido->contenido);
$smarty->assign("accion", $contenido->accion);
$smarty->display('admin/contenido/formulario.tpl');
/* Fin footer para Smarty */
?> 
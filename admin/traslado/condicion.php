<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Insertar de Producto
include_once ("../../config/class.traslado.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php");

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$traslado = new Traslado;

$traslado->asignar_valores_condiciones();
$traslado->insertar_condiciones();
/*if(isset($_POST['enlace']) && $_POST['enlace']!=""){
	$traslado->buscar_enlaces($_POST['enlace']);
	$smarty->assign("enlace", $_POST['enlace']);
}else{
	$traslado->buscar_enlaces(1);
	$smarty->assign("enlace", 1);
}

if(isset($traslado->mensaje2) && $traslado->mensaje2=="error"){
	$mensaje2="<tr><td align='center' colspan='2' class='error'>El nombre del directorio que esta insertando ya existe en el sistema!</td></tr>";
	$smarty->assign("mensaje", $mensaje2);
	$smarty->assign("enlace", 8);
}*/

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("condiciones", $traslado->condiciones);
$smarty->assign("accion", $traslado->accion);
$smarty->display('admin/traslado/condicion.tpl');
/* Fin footer para Smarty */
?>

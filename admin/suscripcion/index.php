<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Index de Usuario
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php");
 
$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");
$auth->listar_suscripcion();

if($usuario->mensaje!="si"){
	$mensaje="<tr><td align='center' colspan='7' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
}
/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $auth->listado);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/suscripcion/lista_suscripcion.tpl');
/* Fin footer para Smarty */
?> 
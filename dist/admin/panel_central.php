<?php
/* header para Smarty */
require('../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../smarty/templates';
$smarty->compile_dir = '../smarty/templates_c';
$smarty->cache_dir = '../smarty/cache';
$smarty->config_dir = '../smarty/configs';
/*  Fin header para Smarty */
include_once("../config/conexion.inc.php");
include_once ("../config/class.login.php");
require('../smarty/libs/SmartyPaginate.class.php');

//Asignaciones para formulario
session_start();
SmartyPaginate::disconnect();
unset($_SESSION['buscar']);
$auth = new Auth;
$auth->permisos();

if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='5' class='titulo'>Bienvenido a su Sistema de Administraci&oacute;n de Datos de Seturs, Agencia de Viajes. versi&oacuten; 3.0.4</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta &aacute;rea!</td></tr>";	
}else if($auth->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='2' class='error'>$auth->mensaje</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign('mensaje', $mensaje);
$smarty->force_compile=true;
if($_SESSION['nivel_temp']==1)
	$smarty->display('admin/panel_central.tpl');
else if($_SESSION['nivel_temp']==2)
	$smarty->display('admin/panel_central2.tpl');
else if($_SESSION['nivel_temp']==3)
	$smarty->display('admin/panel_central3.tpl');
else if($_SESSION['nivel_temp']==4)
	$smarty->display('admin/panel_central4.tpl');


/* Fin footer para Smarty */
?>
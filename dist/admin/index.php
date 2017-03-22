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

//Asignaciones para formulario
session_start();

$auth = new Auth;
if ($_POST){
	if ($_POST['boton_login'] == "Entrar"){
		$auth->asignar_consulta($_POST['login'],$_POST['password']);
		$auth->login($auth->login, $auth->password);
	}

	if ($_POST['boton_login'] == "Salir")
		$auth->logout();
}

if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='3' class='error'>La sesión de usuario a caducado! ingrese de nuevo!</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='3' class='error'>Usted no posee privilegios pa entrar en esta área!</td></tr>";	
}else if($auth->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='3' class='error'>$auth->mensaje</td></tr>";
}

/* footer para Smarty */
$smarty->assign('mensaje', $mensaje);
$smarty->display('admin/login.tpl');
/* Fin footer para Smarty */
?>
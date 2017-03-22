<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Insertar de Usuario
include_once ("../../config/class.usuario.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$usuario = new Usuario;

$usuario->insertar_usuario();
if($usuario->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}else if($usuario->mensaje==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La clave no coincide con la cofirmación de la clave!</td></tr>";	
}else if($usuario->mensaje==3){
	$mensaje="<tr><td align='center' colspan='4' class='error'>La clave ha utilizar debe contener m&iacute;nimo 4 caracteres!</td></tr>";
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("nombres", $usuario->nombre);
$smarty->assign("apellidos", $usuario->apellido);
$smarty->assign("correo", $usuario->correo);
$smarty->assign("login", $usuario->login);
$smarty->assign("nivel", $usuario->nivel);
$smarty->assign("tipo", $usuario->tipo);
$smarty->assign("accion", $usuario->accion);
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/usuario/formulario.tpl');
/* Fin footer para Smarty */
?> 
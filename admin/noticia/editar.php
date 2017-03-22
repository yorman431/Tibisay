<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Editar de Noticia
include_once ("../../config/class.noticia.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(1,"distinto");

$noticia = new Noticia;

$noticia->editar_noticia();
if($noticia->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("categoria", $noticia->categoria);
$smarty->assign("titulo", $noticia->titulo);
$smarty->assign("subtitulo", $noticia->subtitulo);
$smarty->assign("contenido", $noticia->contenido);
$smarty->assign("fecha", $noticia->fecha);
$smarty->assign("autor", $noticia->autor);
$smarty->assign("accion", $noticia->accion);
$smarty->display('admin/noticia/formulario.tpl');
/* Fin footer para Smarty */
?> 
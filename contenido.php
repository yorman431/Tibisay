<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.login.php");
include_once ("config/class.link.php");
include_once ("config/class.galeria.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.contenido.php");
include_once ("config/class.configuracion.php");
include_once ("config/class.producto.php");
include_once ("config/class.carro.php");
include_once ("config/class.categoria.php");
include_once ("config/class.noticia.php");
include_once("config/conexion.inc.php");
include_once ("config/class.banner.php");


if(!isset($acceso))
	$acceso = new Auth;

if ($_POST['envio'] == "Enviar"){
  $acceso->enviar_contacto();
  $mensaje2="<tr><td align='center' colspan='2' class='ok'>$acceso->mensaje</td></tr>";
  $acceso->mensaje="";
}


if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La sesi�n de usuario a caducado! ingrese de nuevo!</td></tr>";
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta �rea!</td></tr>";
}else if($acceso->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='2' class='error'>$acceso->mensaje</td></tr>";
}

if(!isset($enlaces_B))
  $enlaces_B= new Link();
$enlaces_B->listar_link_menu("normal");
 

if(!isset($banner))
  $banner= new Banner;
$banner->listar_banner_publica(NULL);


if(!isset($contenido))
	$contenido= new Contenido();
$contenido->mostrar_contenido_imagen($_GET['id']);


/* footer para Smarty */
$smarty->assign("accion", 'Promociones');
$smarty->assign("mensaje2", $mensaje2);

$smarty->assign("mensaje", $mensaje);
$smarty->assign("enlaces_B", $enlaces_B->listado);
$smarty->assign("banner", $banner->listado);
$smarty->assign('contenido', $contenido->contenido);
$smarty->assign('activo', $content);

$smarty->clearCache('contenido.tpl');
$smarty->display('contenido.tpl');
<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.noticia.php");
include_once ("config/class.configuracion.php");
include_once ("config/class.login.php");
include_once ("config/class.link.php");
include_once ("config/class.categoria.php");
include_once ("config/class.galeria.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.banner.php");
include_once ("config/class.producto.php");
include_once ("config/class.carro.php");
include_once ("config/class.hotel.php");
include_once("config/conexion.inc.php");

//Asignaciones para formulario
session_start();

$acceso = new Auth;
if ($_POST){
	if ($_POST['enviar'] == "Entrar"){
		$acceso->asignar_consulta($_POST['login'],$_POST['clave']);
		$acceso->login2($acceso->login, $acceso->password);
		$mensaje="<tr><td align='center' colspan='2' class='error'>$acceso->mensaje</td></tr>";
	}
	if ($_POST['enviar'] == "Salir")
		$acceso->logout();
		
	if ($_POST['enviar'] == "Enviar"){
		$acceso->enviar_contacto();
		$mensaje2="<tr><td align='center' colspan='2' class='ok'>$acceso->mensaje</td></tr>";
	}
	
	if (isset($_POST['moneda']))
		$_SESSION['moneda_temp']=$_POST['moneda'];
}

if (isset($_POST['numero_habitaciones']) && $_POST['numero_habitaciones']!="")
		$numero=$_POST['numero_habitaciones'];
else
		$numero=1;

if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La sesión de usuario a caducado! ingrese de nuevo!</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta área!</td></tr>";	
}
//=========================  Cotizacion Recaudando Datos. ==========================

if ($_POST['enviar'] == "Cotizar"){
	if(!isset($calcular))
		$calcular= new Hotel();
	$calcular->calcular_cotizacion();
}
	
if(isset($_GET['temp']) && $_GET['temp']!="" && isset($_GET['id']) && $_GET['id']!="" && isset($_GET['h']) && $_GET['h']!=""){
	$temporada=$_GET['temp']; $hotel=$_GET['h']; $plan=$_GET['id'];
	
	if(!isset($cotizacion))
		$cotizacion= new Hotel();
	$cotizacion->mostrar_hotel_cotizacion($hotel);
	$cotizacion->mostrar_hotel_publico($hotel);
 
}else{
	$mensaje2="<tr><td align='center' colspan='2' class='error'>Error obteniendo datos para cotizar!</td></tr>";	
}


//==================================================================================

if(!isset($catalogo))
	$catalogo= new Producto();
$catalogo->listar_producto_nuevo();
$smarty->assign('nuevos',$catalogo->listado);

if(!isset($catalogo2))
	$catalogo2= new Producto();
$catalogo2->buscar_recomendado($producto->detal, $producto->nombre, $producto->id, $producto->id_cat);
$smarty->assign('recomendado',$catalogo2->listado);

if(!isset($link))
	$link= new Link;
$link->listar_link_menu("normal");
$link->mostrar_link_publico($content);

if(!isset($categoria))
	$categoria= new Categoria;
$categoria->listar_categoria_menu(); 
$smarty->assign("categorias", $categoria->listado);

if(!isset($link3))
	$link3= new Link;
$link3->listar_link_menu("todo");

if(!isset($banner))
	$banner= new Banner;
$banner->listar_banner_publica(23);

$noticia = new Noticia;
$noticia->accion="Últimas Noticias";
$noticia->listar_noticia_publica();

if(!isset($publicidad))
	$publicidad= new Publicidad;
$publicidad->cargar_publicidad("Banner Izquierda");
$smarty->assign("publicidad", $publicidad->listado);

if(!isset($publicidad2))
	$publicidad2= new Publicidad;
$publicidad2->cargar_publicidad("Banner Derecha");
$smarty->assign("publicidad2", $publicidad2->listado);

//Gestion de carro de compras
if(!isset($_SESSION['procesando_carro']))
	$_SESSION['procesando_carro'] = new Carro_Compra;
$_SESSION['procesando_carro']->total_monto();

if(!isset($configuracion))
	$configuracion= new Config;
$configuracion->mostrar_config(1);
$smarty->assign("nombre_empresa", $configuracion->empresa);
$smarty->assign("rif_empresa", $configuracion->rif);

/* footer para Smarty */
$smarty->assign('nombre_uso',$_SESSION['nombre_temporal']);
$smarty->assign('apellido_uso',$_SESSION['apellido_temporal']);

$smarty->assign("accion", $cotizacion->nombre." Cotizaci&oacute;n");
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("enlaces", $link->listado);
$smarty->assign("enlaces_A", $link2->listado);
$smarty->assign("enlaces_C", $link3->listado);
$smarty->assign("banner", $banner->listado);
$smarty->assign('noticias', $noticia->listado);

$smarty->assign("descuento", $_SESSION['procesando_carro']->descuento);
$smarty->assign("total_monto", $_SESSION['procesando_carro']->total);
$smarty->assign("cant_producto", $_SESSION['procesando_carro']->numero);
$smarty->assign("listado", $cotizacion->listado);

$smarty->assign("llegada", $calcular->desde);
$smarty->assign("salida", $calcular->hasta);
$smarty->assign("comentario", $calcular->condiciones);
$smarty->assign("personas", $calcular->listado);
$smarty->assign("subtotal", $calcular->subtotal);
$smarty->assign("comision", $calcular->comision);
$smarty->assign("total", $calcular->total);
$smarty->assign("noches", $calcular->noches);
$smarty->assign("tipo", $calcular->tipo);

$smarty->assign("numero",$numero);
$smarty->assign("temp", $_GET['temp']);
$smarty->assign("hotel", $_GET['h']);
$smarty->assign("plan", $_GET['id']);


$smarty->force_compile=true;
$smarty->display('cotizacion.tpl');
/* Fin footer para Smarty */
?>
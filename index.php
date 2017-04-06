 <?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.login.php");
include_once ("config/class.link.php");
include_once ("config/class.contenido.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.galeria.php");
include_once ("config/class.banner.php");
include_once("config/conexion.inc.php");
include_once("config/class.noticia.php");
include_once("config/class.reserva.php");

session_start();

if(!isset($acceso))
	$acceso = new Auth;
if ($_POST){
	if ($_POST['enviar'] == "Entrar"){
		$acceso->asignar_consulta($_POST['login'],$_POST['clave']);
		$acceso->login2($acceso->login, $acceso->password, NULL);
	}
	if ($_POST['enviar'] == "Salir")
		$acceso->logout();

	if ($_POST['envio'] == "Enviar"){
		$acceso->enviar_contacto();
		$mensaje2="<tr><td align='center' colspan='2' class='ok'>$acceso->mensaje</td></tr>";
		$acceso->mensaje="";
	}
  
  if (isset($_POST['envio']) && $_POST['envio'] == "Guardar"){
    $acceso->enviar_cotizacion();
  }
}

if (isset($_SESSION['mensajeReserva'])){
  $mensajeReserva = "<div class='alert alert-success text-center' role='alert' style='margin-top: -35px; font-size: 18px;'><strong>".$_SESSION['mensajeReserva']."</strong></div>";
  unset($_SESSION['mensajeReserva']);
}

if (isset($_SESSION['mensajeContacto'])){
  $mensajeContacto = "<div class='alert alert-success text-center' role='alert' style='margin-top: -35px; font-size: 18px;'><strong>".$_SESSION['mensajeContacto']."</strong></div>";
  unset($_SESSION['mensajeContacto']);
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
$contenido->listar_contenido_imagen(1, NULL);
$habitaciones = $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(3,1);
$gastronomia= $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(3,2);
$gimnasio = $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(3,4);
$peluqueria = $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(3,5);
$tiendas = $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(5, NULL);
$bodas = $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(6, NULL);
$promociones = $contenido->listado;
$contenido->listado = "";

$contenido->listar_contenido_imagen(7, NULL);
$empresa = $contenido->listado;
$contenido->listado = "";

if(!isset($galeria))
	$galeria = new Galeria();
$galeria->listar_galeria_publica();


if(!isset($publicidad))
	$publicidad= new Publicidad;
$publicidad->cargar_publicidad("Publicidad 1");
$publicidad1 = $publicidad->listado;
$publicidad->listado="";

$publicidad->cargar_publicidad("Publicidad 2");
$publicidad2 = $publicidad->listado;
$publicidad->listado="";

if(!isset($noticia))
  $noticia = new Noticia;
$noticia->listar_noticia_imagen();


if ($_SESSION['mensajeBooking']){
  $smarty->assign('mensajeBooking',$_SESSION['mensajeBooking']);
  unset($_SESSION['mensajeBooking']);
}

if ($_SESSION['mensajeAirport']){
  $smarty->assign('mensajeAirport',$_SESSION['mensajeAirport']);
  unset($_SESSION['mensajeAirport']);
}

/* footer para Smarty */
$smarty->assign("accion", "Inicio");
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("banner", $banner->listado);
$smarty->assign("contenido", $contenido->listado);
$smarty->assign('enlaces_B',$enlaces_B->listado);
$smarty->assign('habitacion', $habitaciones);
$smarty->assign('gastronomia', $gastronomia);
$smarty->assign('gimnasio', $gimnasio);
$smarty->assign('peluqueria', $peluqueria);
$smarty->assign('tiendas', $tiendas);
$smarty->assign('promocion', $promociones);
$smarty->assign('boda', $bodas);
$smarty->assign('publicidad1', $publicidad1);
$smarty->assign('publicidad2', $publicidad2);
$smarty->assign('empresa', $empresa);
$smarty->assign('galeria', $galeria->listado);

$smarty->assign('mensajeReserva', $mensajeReserva);
$smarty->assign('mensajeContacto', $mensajeContacto);
$smarty->force_compile=true;
$smarty->display('index.tpl');
/* Fin footer para Smarty */


<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.login.php");
include_once ("config/class.link.php");
include_once ("config/class.categoria.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.banner.php");
include_once ("config/class.registro.php");
include_once ("config/class.carro.php");
include_once ("config/class.direccion.php");
include_once ("config/class.configuracion.php");
include_once("config/conexion.inc.php");

session_start();
//print_r($_POST);

define('STRIPE_PRIVATE_KEY', 'sk_live_rhqru2tNpxYrXctqPb0fY4fn');
define('STRIPE_PUBLIC_KEY', 'pk_live_yxiBAXo2D2ydzEYa4McS4HGc');

//Autenticación de usuario
$acceso = new Auth;
if ($_POST){
	if ($_POST['enviar'] == "Entrar"){
		$acceso->asignar_consulta($_POST['login'],$_POST['clave']);
		$acceso->login2($acceso->login, $acceso->password);
	}
	if ($_POST['enviar'] == "Salir")
		$acceso->logout();
		
	if (isset($_POST['moneda']))
		$_SESSION['moneda_temp']=$_POST['moneda'];
}
//Mensajes de error
if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La sesión de usuario a caducado! ingrese de nuevo!</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta área!</td></tr>";	
}else if($acceso->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='2' class='error'>$acceso->mensaje</td></tr>";
}


if(isset($_POST['pas']) && $_POST['pas']=="paso1"){
	if(isset($_SESSION['login_temporal'])&& isset($_SESSION['id_temporal'])){
		if(!isset($direccion))
				$direccion = new Direccion;
			//$pedido->insertar_pago();
			$direccion->listar_direccion_publico($_SESSION['id_temporal']);
			$direccion->listar_paises2();
				
			if($direccion->mensaje!="si"){
				$mensaje3="No existen direcciones de env&iacute;o asociadas a su cuenta!";
				$smarty->assign("mensaje3", $mensaje3);
			}else{
				$smarty->assign("direcciones", $direccion->listado);
			}
			
			$smarty->assign("paises", $direccion->listado2);
		
			$paso="paso3";
			$numero_paso=3;
	}else{
		$paso="paso2";
		$numero_paso=2;
	}
	
}else if(isset($_POST['pas']) && $_POST['pas']=="paso2"){
	
	if(!isset($registro))
		$registro= new Registro;
	
	if ($_POST['envio'] == "Enter"){
		
		$registro->login2($_POST['login'], $_POST['clave'], $_SERVER['PHP_SELF']);
		if($registro->mensaje!="ok"){
			$mensaje2="<tr><td align='center' colspan='2' class='error'>".$registro->mensaje."</td></tr>";
			$paso="paso2";
			$numero_paso=2;
			
		}else{
			if(!isset($direccion))
				$direccion = new Direccion;
			//$pedido->insertar_pago();
			$direccion->listar_direccion_publico($_SESSION['id_temporal']);
			$direccion->listar_paises2();
				
			if($direccion->mensaje!="si"){
				$mensaje3="No existen direcciones de env&iacute;o asociadas a su cuenta!";
				$smarty->assign("mensaje3", $mensaje3);
			}else{
				$smarty->assign("direcciones", $direccion->listado);
			}
			
			$smarty->assign("paises", $direccion->listado2);
		
			$paso="paso3";
			$numero_paso=3;
			
			
		}
	}
	
	if ($_POST['envio'] == "Sign me up"){
		$registro->insertar_registro_publico2($conex);
		if($registro->mensaje==1){
			$mensaje3="<tr><td align='center' colspan='2' class='error'>Sorry! the e-mail that is trying to add already exists in the system!</td></tr>";
			
			$smarty->assign("cedula", $registro->cedula);
			$smarty->assign("nombres", $registro->nombre);
			$smarty->assign("apellidos", $registro->apellido);
			$smarty->assign("celular", $registro->celular);
			$smarty->assign("correo", $registro->correo);
			
			
			$paso="paso2";
			$numero_paso=2;
			
		}else{
			if(!isset($direccion))
				$direccion = new Direccion;
			//$pedido->insertar_pago();
			$direccion->listar_direccion_publico($_SESSION['id_temporal']);
			$direccion->listar_paises2();
				
			if($direccion->mensaje!="si"){
				$mensaje3="No existen direcciones de env&iacute;o asociadas a su cuenta!";
				$smarty->assign("mensaje3", $mensaje3);
			}else{
				$smarty->assign("direcciones", $direccion->listado);
			}
			
			$smarty->assign("paises", $direccion->listado2);
		
			$paso="paso3";
			$numero_paso=3;
		}
	}
	
}else if(isset($_POST['pas']) && $_POST['pas']=="paso3"){
	
	if ($_POST['envio'] == "Add Address"){
		if(!isset($direccion))
			$direccion = new Direccion;
		$direccion->insertar_direccion_publico2($_SESSION['id_temporal']);
		$direccion->listar_direccion_publico($_SESSION['id_temporal']);
		
		if($direccion->mensaje!="si"){
				$mensaje3="No existen direcciones de env&iacute;o asociadas a su cuenta!";
				$smarty->assign("mensaje3", $mensaje3);
			}else{
				$smarty->assign("direcciones", $direccion->listado);
			}
			
		$direccion->listar_paises2();
		$smarty->assign("paises", $direccion->listado2);
		
		
		$paso="paso3";
		$numero_paso=3;
	}
	
	if ($_POST['envio'] == "Continue"){
		$_SESSION['direccion'] = $_POST['direccion'];
		$_SESSION['procesando_carro']->total_monto();
		$_SESSION['procesando_carro']->listar_carro();
		
		if($_SESSION['procesando_carro']->mensaje!="si"){
			$mensaje2="<tr><td align='center' colspan='8' class='error'>No hubo resultados de la consulta requerida!</td></tr>";
		}
		
		$smarty->assign('listado',$_SESSION['procesando_carro']->listado);
		$smarty->assign("descuento", $_SESSION['procesando_carro']->descuento);
		$smarty->assign("total_monto", $_SESSION['procesando_carro']->total);
		$smarty->assign("cant_producto", $_SESSION['procesando_carro']->numero);
		$smarty->assign("id", $_SESSION['procesando_carro']->id);
		
		if(!isset($direccion))
			$direccion = new Direccion;
		$direccion_select=$direccion->buscar_direccion($_SESSION['direccion']);
		$smarty->assign("direccion", $direccion_select);
		
		if(!isset($config))
			$config= new Config;
		$config->mostrar_config(1);
		
		$smarty->assign("nombre_empresa", $config->empresa);
		
		$paso="paso4";
		$numero_paso=4;
	}
	
}else if(isset($_POST['pas']) && $_POST['pas']=="paso4"){
	if ($_POST['envio'] == "Place Order"){	
		
		if(!isset($carro))
			$carro = new Carro_Compra;
		$carro->formalizar_pedido($conex);
		
		$smarty->assign("total_pago", $carro->total);
		$smarty->assign("orden", "PED-".$carro->id);
		$smarty->assign("id", $carro->id);
		
	}
	
	//echo "EL monto: ".$_POST['total_monto']." el pedido: ".$carro->id;
	
	$paso="paso5";
	$numero_paso=5;
	
}else if(isset($_POST['pas']) && $_POST['pas']=="paso5"){
	
	//session_destroy();
	
}else{
	unset($_SESSION['publicar']);
	$paso="paso1";
	$numero_paso=1;
}



//Gestion de carro de compras
if(!isset($_SESSION['procesando_carro']))
	$_SESSION['procesando_carro'] = new Carro_Compra;

$_SESSION['procesando_carro']->accion="Shopping Cart";
	//Si se insertan productos al carro	
if(isset($_POST['id'])&& $_POST['id']!="" && isset($_POST['cantidad'])&& $_POST['cantidad']!="")
	$_SESSION['procesando_carro']->insertar_carro();
	//Si se borran productos del carro
if(isset($_GET['pos'])&& $_GET['pos']!="")
	$_SESSION['procesando_carro']->eliminar_producto_carro();
	//Mostrar el Carro_Compra
$_SESSION['procesando_carro']->total_monto();
$_SESSION['procesando_carro']->listar_carro();

if($_SESSION['procesando_carro']->mensaje!="si"){
	$mensaje2="<tr><td align='center' colspan='9' class='error'>No posee ningun producto en su lista de compras!</td></tr>";
}

if(!isset($monedas))
	$monedas = new Carro_Compra;
$monedas->valor_moneda();

if(!isset($link))
	$link= new Link;
$link->listar_link_menu("todo");
$link->mostrar_link_publico($content);

if(!isset($enlaces_A))
	$enlaces_A= new Link();
$enlaces_A->listar_link_menu("normal");

if(!isset($enlaces_B))
	$enlaces_B= new Link();
$enlaces_B->listar_link_menu("arriba");

if(!isset($enlaces_C))
	$enlaces_C= new Link();
$enlaces_C->listar_link_menu("pie");

if(!isset($enlaces_D))
	$enlaces_D= new Link();
$enlaces_D->listar_link_menu("centro");

if(!isset($banner))
	$banner= new Banner;
$banner->listar_banner_publica(1);

if(!isset($publicidad))
	$publicidad= new Publicidad;
$publicidad->cargar_publicidad("Banner Superior");
$smarty->assign("publicidad", $publicidad->listado);

if(!isset($publicidad2))
	$publicidad2= new Publicidad;
$publicidad2->cargar_publicidad("Banner Inferior");
$smarty->assign("publicidad2", $publicidad2->listado);

/* footer para Smarty */
$smarty->assign('nombre_uso',$_SESSION['nombre_temporal']);
$smarty->assign('apellido_uso',$_SESSION['apellido_temporal']);
$smarty->assign("busqueda", $_SESSION['procesando_carro']->buscar);
$smarty->assign("categoria", $nombre);
$smarty->assign("accion", $_SESSION['procesando_carro']->accion);
$smarty->assign("mensaje3", $mensaje3);
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("mensaje", $mensaje);

$smarty->assign('paso', $paso);
$smarty->assign('numero', $numero_paso);

$smarty->assign("enlaces", $link->listado);
$smarty->assign('enlaces_A',$enlaces_A->listado);
$smarty->assign('enlaces_B',$enlaces_B->listado);
$smarty->assign('enlaces_C',$enlaces_C->listado);
$smarty->assign('enlaces_D',$enlaces_D->listado);

$smarty->assign("banner", $banner->listado);
$smarty->assign("moneda",$_SESSION['moneda_temp']);
$smarty->assign("total_monto", $_SESSION['procesando_carro']->total);
$smarty->assign("descuento", $_SESSION['procesando_carro']->descuento);
$smarty->assign("cant_producto", $_SESSION['procesando_carro']->numero);
$smarty->assign("banner", $banner->listado);
$smarty->assign("valor_dollar", $monedas->valor_dollar);
$smarty->assign("valor_euro", $monedas->valor_euro);

$smarty->assign("publishablekey", '<script type="text/javascript">Stripe.setPublishableKey("' . STRIPE_PUBLIC_KEY . '");</script>');
$smarty->assign("pkey", STRIPE_PUBLIC_KEY);

// assign your db results to the template

$smarty->assign('listado',$_SESSION['procesando_carro']->listado);
// display results
$smarty->force_compile=true;
$smarty->display('carro.tpl');
/* Fin footer para Smarty */
?> 
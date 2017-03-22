<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */
include_once ("config/class.producto.php");
include_once ("config/class.configuracion.php");
include_once ("config/class.login.php");
include_once ("config/class.link.php");
include_once ("config/class.categoria.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.banner.php");
include_once ("config/class.noticia.php");
include_once ("config/class.registro.php");
include_once ("config/class.carro.php");
include_once("config/conexion.inc.php");
//Asignaciones para formulario
session_start();
$acceso = new Auth;
$acceso->permisos2();

/*if(!isset($_SESSION['clave']) || $_SESSION['clave']!="si"){
	$_SESSION['val']='clave';
	$_SESSION['volver']=$_SERVER['PHP_SELF'];
	header("location:preguntas_seguridad.php");
	exit();
}*/

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

if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La sesión de usuario a caducado! ingrese de nuevo!</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta área!</td></tr>";	
}else if($acceso->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='2' class='error'>$acceso->mensaje</td></tr>";
}

if(!isset($registro))
	$registro = new Registro;
$registro->editar_clave();
if($registro->mensaje==1){
	$mensaje2="<tr><td align='center' colspan='2' class='error'>Clave actual incorrecta!</td></tr>";	
}else if($registro->mensaje==2){
	$mensaje2="<tr><td align='center' colspan='2' class='error'>No coincide la nueva clave con la confirmación!</td></tr>";
}else if($registro->mensaje==3){
	$mensaje2="<tr><td align='center' colspan='4' class='error'>La clave ha utilizar debe contener m&iacute;nimo 4 caracteres!</td></tr>";
}	

if(!isset($link))
	$link= new Link;
$link->listar_link_menu("normal");

if(!isset($banner))
	$banner= new Banner;
$banner->listar_banner_publica(25);

if(!isset($publicidad))
	$publicidad= new Publicidad;
$publicidad->cargar_publicidad("Banner Izquierda");
$smarty->assign("publicidad", $publicidad->listado);

if(!isset($publicidad2))
	$publicidad2= new Publicidad;
$publicidad2->cargar_publicidad("Banner Derecha");
$smarty->assign("publicidad2", $publicidad2->listado);

$noticia = new Noticia;
$noticia->accion="Últimas Noticias";
$noticia->listar_noticia_publica();
$smarty->assign('noticias', $noticia->listado);

if(!isset($link3))
	$link3= new Link;
$link3->listar_link_menu("todo");
$smarty->assign("enlaces_C", $link3->listado);

if(!isset($configuracion))
	$configuracion= new Config;
$configuracion->mostrar_config(1);
$smarty->assign("nombre_empresa", $configuracion->empresa);
$smarty->assign("rif_empresa", $configuracion->rif);

if(!isset($catalogo))
	$catalogo= new Producto();
$catalogo->listar_producto_nuevo();
$smarty->assign('nuevos',$catalogo->listado);

if(!isset($catalogo2))
	$catalogo2= new Producto();
$catalogo2->buscar_recomendado($producto->detal, $producto->nombre, $producto->id, $producto->id_cat);
$smarty->assign('recomendado',$catalogo2->listado);

if(!isset($categoria))
	$categoria= new Categoria;
$categoria->listar_categoria_menu();
$smarty->assign("categorias", $categoria->listado);

//Gestion de carro de compras

if(!isset($_SESSION['procesando_carro']))
	$_SESSION['procesando_carro'] = new Carro_Compra;
$_SESSION['procesando_carro']->total_monto();

if ($_POST['enviar'] == "Enviar Solicitud-bol"){
		$ida =$_POST['fecha_ida-b'];
		$vuelta=$_POST['fecha_vuelta-b'];
		$resultado = str_replace("/", "-", $ida);
		$resultado2 = str_replace("/", "-", $vuelta);
		$ida = date_create($resultado);
		$vuelta = date_create($resultado2);
		$hoy = date_create('today');
		
if(($ida < $hoy)||($vuelta < $ida)){
	$msj_boletos="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;Las Fecha son incorrectas, verifique los intervalos de IDA y VUELTA </div>";
}elseif($_POST['nombre-b'] =="" ||$_POST['tipo-b'] ==""||$_POST['cedula-b'] ==""||$_POST['email-b'] =="" || $_POST['telefono-b'] =="" || $_POST['fecha_ida-b'] =="" || $_POST['fecha_vuelta-b'] =="" ||$_POST['adultos-b']==""){
			
			$msj_boletos="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;No ha completado los campos en su totalidad </div>";
		}elseif((isset($_POST['menores-b'])&& isset($_POST['edades-b'])&& $_POST['menores-b']!="" && $_POST['edades-b']=="")||(isset($_POST['menores-b'])&& isset($_POST['edades-b'])&& $_POST['menores-b']=="" && $_POST['edades-b']!="")){
		
			$msj_boletos="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;Debe insertar la Cantidad y Edad de &eacute;l o los ni&ntilde;os! </div>";	
		}else{
			
			$acceso->enviar_solicitud_boletos();
			$msj_boletos="<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-ok'></span></strong>&nbsp;$acceso->mensaje</div>";
	}
}

if(!isset($suscripcion) and isset($_POST['email'])){
        $correo=$_POST['email'];
	    $suscripcion= new Auth;
	    $suscripcion->insertar_suscripcion($correo);	
		
}


/* footer para Smarty */
$smarty->assign('nombre_uso',$_SESSION['nombre_temporal']);
$smarty->assign('apellido_uso',$_SESSION['apellido_temporal']);
$smarty->assign('accion',$registro->accion); 
$smarty->assign('mensaje',$mensaje); 
$smarty->assign("moneda",$_SESSION['moneda_temp']);
$smarty->assign('actual',$registro->actual);
$smarty->assign('clavenueva',$registro->clavenueva);
$smarty->assign('confirmar',$registro->confirmar);
$smarty->assign("msj_boletos", $msj_boletos);
$smarty->assign("enlaces", $link->listado);
$smarty->assign("banner", $banner->listado);
$smarty->assign('mensaje2',$mensaje2);
$smarty->assign("nombreb",$_POST['nombre-b']);
$smarty->assign("tipob",$_POST['tipo-b']);
$smarty->assign("cedulab",$_POST['cedula-b']);
$smarty->assign("origenb",$_POST['origen-b']);
$smarty->assign("destinob",$_POST['destino-b']);
$smarty->assign("emailb",$_POST['email-b']);
$smarty->assign("telefonob",$_POST['telefono-b']);
$smarty->assign("fecha_idab",$_POST['fecha_ida-b']);
$smarty->assign("fecha_vueltab",$_POST['fecha_vuelta-b']);
$smarty->assign("adultosb",$_POST['adultos-b']);
$smarty->assign("menoresb",$_POST['menores-b']);
$smarty->assign("edadesb",$_POST['edades-b']);

$smarty->assign("descuento", $_SESSION['procesando_carro']->descuento);
$smarty->assign("total_monto", $_SESSION['procesando_carro']->total);
$smarty->assign("cant_producto", $_SESSION['procesando_carro']->numero);
$smarty->force_compile=true;
$smarty->display('cambiar_clave.tpl');
/* Fin footer para Smarty */
?> 
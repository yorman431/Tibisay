
<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.login.php");
include_once ("config/class.configuracion.php");
include_once ("config/class.link.php");
include_once ("config/class.categoria.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.banner.php");
include_once ("config/class.hotel.php");
include_once ("config/class.producto.php");
include_once("config/conexion.inc.php");

session_start();

if(!isset($hoteles))
	$hoteles = new Hotel;
$hoteles->listar_hotel_imagen();

if(!isset($link))
	$link= new Link;
$link->listar_link_menu("normal");
$link->mostrar_link_publico($content);
$nombre=$link->get_link($_GET['cont']);
if(!isset($link2))
	$link2= new Link;
$link2->listar_link_menu("arriba");

if(!isset($link3))
	$link3= new Link;
$link3->listar_link_menu("normal");
$link3->mostrar_link_publico($content);

if(!isset($link4))
	$link4= new Link;
$link4->listar_link_menu("arriba");

if(!isset($link5))
	$link5= new Link;
$link5->listar_link_menu("abajo");

foreach($link->listado as $key=>$valor){
		$link->listado[$key]['icono_cat']=$link->tam_iconos($valor['icono_cat'],'fa-2x');
}
foreach($link2->listado as $key=>$valor){
		$link2->listado[$key]['icono_cat']=$link2->tam_iconos($valor['icono_cat'],'fa-2x');
}
foreach($link3->listado as $key=>$valor){
		$link3->listado[$key]['icono_cat']=$link->tam_iconos($valor['icono_cat'],'fa-3x');
}
foreach($link4->listado as $key=>$valor){
		$link4->listado[$key]['icono_cat']=$link2->tam_iconos($valor['icono_cat'],'fa-3x');
}

/*if($producto->mensaje!="si"){
	$mensaje2="<div class='alert alert-danger'>No hubo resultados de la consulta requerida!</div>";
}*/
/*if(!isset($categoria))
	$categoria= new Categoria;
$categoria->listar_categoria_menu();
$smarty->assign("categorias", $categoria->listado);*/

if(!isset($banner))
	$banner= new Banner;
$banner->listar_banner_publica(1);

$excursiones = new Producto();
$excursiones->listar_producto_imagen_principal(4);
$paquetes = new Producto();
$paquetes->listar_producto_imagen_principal(9);

if(!isset($publicidad))
	$publicidad= new Publicidad;
$publicidad->cargar_publicidad("Banner Izquierda");
$smarty->assign("publicidad", $publicidad->listado);

if(!isset($publicidad2))
	$publicidad2= new Publicidad;
$publicidad2->cargar_publicidad("Banner Centro");
$smarty->assign("publicidad2", $publicidad2->listado);

if(!isset($publicidad3))
	$publicidad3= new Publicidad;
$publicidad3->cargar_publicidad("Banner Derecha");
$smarty->assign("publicidad3", $publicidad3->listado);

if(!isset($publicidad4))
	$publicidad4= new Publicidad;
$publicidad4->cargar_publicidad("Banner Promocion A");
$smarty->assign("publicidad4", $publicidad4->listado);

if(!isset($publicidad5))
	$publicidad5= new Publicidad;
$publicidad5->cargar_publicidad("Banner Promocion B");
$smarty->assign("publicidad5", $publicidad5->listado);

if(!isset($publicidad6))
	$publicidad6= new Publicidad;
$publicidad6->cargar_publicidad("Banner Promocion C");
$smarty->assign("publicidad6", $publicidad6->listado);

if(!isset($publicidad7))
	$publicidad7= new Publicidad;
$publicidad7->cargar_publicidad("Banner Promocion D");
$smarty->assign("publicidad7", $publicidad7->listado);


if(!isset($configuracion))
	$configuracion= new Config;
$configuracion->mostrar_config(1);
$smarty->assign("nombre_empresa", $configuracion->empresa);
$smarty->assign("rif_empresa", $configuracion->rif);

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

if(!isset($localidades))
	$localidades= new Hotel;
$localidades->listar_localidades();
$smarty->assign('localidades', $localidades->listado);
$smarty->assign('activo',$cont);
$smarty->assign("busqueda", $producto->buscar);
$smarty->assign("ordenar", $hoteles->orden);
$smarty->assign("localidad", $hoteles->localidad);
$smarty->assign("accion", $nombre);
$smarty->assign("categoria", $nombre);
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("msj_boletos", $msj_boletos);
$smarty->assign("enlaces_A", $link->listado);
$smarty->assign("enlaces_B", $link2->listado);
$smarty->assign("enlaces_A2", $link3->listado);
$smarty->assign("enlaces_B2", $link4->listado);
$smarty->assign("enlaces_C", $link5->listado);
$smarty->assign('excursiones', $excursiones->listado);
$smarty->assign('paquetes',$paquetes->listado);
$smarty->assign("banner", $banner->listado);
$smarty->assign("migas",$migas);
$smarty->assign('listado', $hoteles->listado);
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

$smarty->force_compile=true;
$smarty->display('catalogo_hotel.tpl');
/* Fin footer para Smarty */
?> 
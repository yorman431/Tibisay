<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.noticia.php");
include_once ("config/class.login.php");
include_once ("config/class.configuracion.php");
include_once ("config/class.link.php");
include_once ("config/class.categoria.php");
include_once ("config/class.video.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.galeria.php");
include_once ("config/class.banner.php");
include_once ("config/class.producto.php");
include_once ("config/class.hotel.php");
include_once ("config/class.carro.php");
include_once("config/conexion.inc.php");

session_start();
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

if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La sesión de usuario a caducado! ingrese de nuevo!</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta área!</td></tr>";	
}else if($acceso->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='2' class='error'>$acceso->mensaje</td></tr>";
}

if (isset($_POST['envio']) && $_POST['envio'] == "Guardar"){
	$acceso->enviar_cotizacion();
}

if(!isset($hotel))
	$hotel = new Hotel;
$hotel->mostrar_hotel();
$hotel->visita_hotel();

if(!isset($hoteles))
	$hoteles = new Hotel;
$hoteles->mostrar_hotel_img();	
$smarty->assign("detalle_hotel",$hoteles->listado);
$smarty->assign("nombre_hotel",$hotel->nombre);

if(!isset($promociones))
	$promociones = new Producto;
$promociones->promocion_hotel();
$smarty->assign("promociones",$promociones->listado);

$imagen=new Galeria;
$imagen->mostrar_imagenes_nologo("hotel");
if($imagen->mensaje!="si"){
	$mensaje2="<tr><td colspan='4' align='center'>No hay imagen disponible!</td></tr>";	
}

$icono=new Galeria;
$logo=$icono->buscar_logo2($_GET['id'], "hotel");

$facilidad = new Hotel;
$facilidad->listar_facilidad_hotel2($_GET['id']);

$temporadas = new Hotel;
$temporadas->listar_temporada_hotel($_GET['id']);

$icono=new Galeria;
$logo=$icono->buscar_logo2($_GET['id'], "hotel");

$mapas="<script type='text/javascript'>
			  var map;
			  var infowindow;
		
			  function initialize() {
				var pyrmont = new google.maps.LatLng($hotel->latitud, $hotel->longitud);
		
				map = new google.maps.Map(document.getElementById('map'), {
				  mapTypeId: google.maps.MapTypeId.ROADMAP,
				  center: pyrmont,
				  zoom: 16
				});
				
				var image = '/imagenes/$logo';
				var myLatLng = new google.maps.LatLng($hotel->latitud, $hotel->longitud);
				var beachMarker = new google.maps.Marker({
				  position: myLatLng,
				  map: map,
				  icon: image
			  });
		  
				var request = {
				  location: pyrmont,
				  radius: 200,
				  types: ['store']
				};
				infowindow = new google.maps.InfoWindow();
				var service = new google.maps.places.PlacesService(map);
				service.search(request, callback);
			  }
		
			  function callback(results, status) {
				if (status == google.maps.places.PlacesServiceStatus.OK) {
				  for (var i = 0; i < results.length; i++) {
					createMarker(results[i]);
				  }
				}
			  }
		
			  function createMarker(place) {
				var placeLoc = place.geometry.location;
				var marker = new google.maps.Marker({
				  map: map,
				  position: place.geometry.location
				});
		
				google.maps.event.addListener(marker, 'click', function() {
				  infowindow.setContent(place.name);
				  infowindow.open(map, this);
				});
			  }
		
			  google.maps.event.addDomListener(window, 'load', initialize);
			</script>";


//Gestion de carro de compras
if(!isset($_SESSION['procesando_carro']))
	$_SESSION['procesando_carro'] = new Carro_Compra;
$_SESSION['procesando_carro']->total_monto();

/*if(!isset($categoria))
	$categoria= new Categoria;
$categoria->cargar_subcategorias(0);
$smarty->assign("categorias", $categoria->listado);*/

if(!isset($link))
	$link= new Link;
$link->listar_link_menu("normal");
$link->mostrar_link_publico($content);
$nombre=$link->get_link($cont);
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

$excursiones = new Producto();
$excursiones->listar_producto_imagen_principal(4);
$paquetes = new Producto();
$paquetes->listar_producto_imagen_principal(9);



if(!isset($banner))
	$banner= new Banner;
$banner->listar_banner_publica(1);

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

if(!isset($categoria))
	$categoria= new Categoria;
$categoria->listar_categoria_menu();
$smarty->assign("categorias", $categoria->listado);

if(!isset($catalogo))
	$catalogo= new Producto();
$catalogo->listar_producto_nuevo();
$smarty->assign('nuevos',$catalogo->listado);

if(!isset($catalogo2))
	$catalogo2= new Producto();
$catalogo2->buscar_recomendado($producto->detal, $producto->nombre, $producto->id, $producto->id_cat);
$smarty->assign('recomendado',$catalogo2->listado);

if(!isset($configuracion))
	$configuracion= new Config;
$configuracion->mostrar_config(1);
$smarty->assign("nombre_empresa", $configuracion->empresa);
$smarty->assign("rif_empresa", $configuracion->rif);

$noticia = new Noticia;
$noticia->accion="Últimas Noticias";
$noticia->listar_noticia_publica();
if(isset($_POST['hotel']))
	$tem_elec=$_POST['hotel'];	

if(!isset($suscripcion) and isset($_POST['email'])){
	$correo=$_POST['email'];
	$suscripcion= new Auth;
	$suscripcion->insertar_suscripcion($correo);		
}
	
/* footer para Smarty */

if(!isset($videos)){
	$videos= new Video;
	$videos->mostrar_videos_categoria();
}

$smarty->assign('nombre_uso',$_SESSION['nombre_temporal']);
$smarty->assign('apellido_uso',$_SESSION['apellido_temporal']);
$smarty->assign("id", $hotel->id);
$smarty->assign("msj_boletos", $msj_boletos);
$smarty->assign("bandera", $hotel->buscar_bandera($hotel->pais));
$smarty->assign("pais", $hotel->buscar_pais($hotel->pais));
$smarty->assign("estado", $hotel->buscar_estado($hotel->estado));
$smarty->assign("ciudad", $hotel->ciudad);
$smarty->assign("videos", $videos->listado);
$smarty->assign("categoria", $hotel->categoria);
$smarty->assign("codigo", $hotel->codigo);
$smarty->assign("nombres", $hotel->nombre);
$smarty->assign("prioridad", $hotel->prioridad);
$smarty->assign("ubicacion", $hotel->ubicacion);
$smarty->assign("contenido", $hotel->descripcion);
$smarty->assign("condiciones", $hotel->condiciones);
$smarty->assign("claves", $hotel->claves);
$smarty->assign("principal", $hotel->principal);
$smarty->assign("vistas", $hotel->vistas);
$smarty->assign("fecha", $hotel->fecha);
$smarty->assign("tipo", strtoupper($hotel->tipo));
$smarty->assign('noticias', $noticia->listado);
$smarty->assign("facilidades", $facilidad->listado);
$smarty->assign("temporadas", $temporadas->listado);
$smarty->assign("tem_elec",$tem_elec);
$smarty->assign("mapas", $mapas);
$smarty->assign("descripcion", strip_tags($hotel->descripcion));
$smarty->assign("moneda",$_SESSION['moneda_temp']);
//$smarty->assign("recomendado", $recomendado->listado);
$smarty->assign("claves", $hotel->claves);

$smarty->assign("nombre",$_POST['nombre']);
$smarty->assign("tipo",$_POST['tipo']);
$smarty->assign("cedula",$_POST['cedula']);
$smarty->assign("email",$_POST['email']);
$smarty->assign("telefono",$_POST['telefono']);
$smarty->assign("fecha_ida",$_POST['fecha_ida']);
$smarty->assign("fecha_vuelta",$_POST['fecha_vuelta']);
$smarty->assign("adultos",$_POST['adultos']);
$smarty->assign("ninos",$_POST['ninos']);
$smarty->assign("edades",$_POST['edades']);
$smarty->assign("comentario",$_POST['comentario']);

$smarty->assign("accion", "Hoteles &raquo; ".$hotel->nombre);
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("enlaces_A", $link->listado);
$smarty->assign("enlaces_B", $link2->listado);
$smarty->assign("enlaces_A2", $link3->listado);
$smarty->assign("enlaces_B2", $link4->listado);
$smarty->assign("enlaces_C", $link5->listado);
$smarty->assign('excursiones', $excursiones->listado);
$smarty->assign('paquetes',$paquetes->listado);

$smarty->assign("imagenes", $imagen->listado);
$smarty->assign("descuento", $_SESSION['procesando_carro']->descuento);
$smarty->assign("total_monto", $_SESSION['procesando_carro']->total);
$smarty->assign("cant_producto", $_SESSION['procesando_carro']->numero);
$smarty->force_compile=true;
$smarty->display('hotel_detalle.tpl');
/* Fin footer para Smarty */
?> 
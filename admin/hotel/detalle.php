<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Detalle de Producto
include_once ("../../config/class.hotel.php");
//include_once ("../../config/class.color.php");
include_once ("../../config/class.galeria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$auth->nivel_acceso(3,"igual");

$hotel = new Hotel;
$hotel->mostrar_hotel();
$hotel->accion="Detalles del ".$hotel->nombre;

$imagen=new Galeria;
$imagen->mostrar_imagenes("hotel");
if($imagen->mensaje!="si"){
	$mensaje="<tr><td colspan='4' align='center' class='error'>No hay imagen disponible!</td></tr>";	
}


$icono=new Galeria;
$logo=$icono->buscar_logo2($_GET['id'], "hotel");
$facilidad = new Hotel;
$facilidad->listar_facilidad_hotel2($_GET['id']);

$temporadas = new Hotel;
$temporadas->listar_temporada_privada($_GET['id']);

if($temporadas->mensaje!="si"){
	$mensaje2="<tr><td colspan='9' align='center' class='error'>No hay temporadas asignadas a este hotel!</td></tr>";	
}

if($temporadas->mensaje2!="si"){
	$mensaje3="<tr><td colspan='12' align='center' class='error'>No hay planes asignadas a esta temporada!</td></tr>";	
}


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

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("id", $hotel->id);
$smarty->assign("bandera", $hotel->buscar_bandera($hotel->pais));
$smarty->assign("pais", $hotel->buscar_pais($hotel->pais));
$smarty->assign("estado", $hotel->buscar_estado($hotel->estado));
$smarty->assign("ciudad", $hotel->ciudad);
$smarty->assign("categoria", $hotel->categoria);
$smarty->assign("codigo", $hotel->codigo);
$smarty->assign("nombres", $hotel->nombre);
$smarty->assign("prioridad", $hotel->prioridad);
$smarty->assign("ubicacion", $hotel->ubicacion);
$smarty->assign("descripcion", $hotel->descripcion);
$smarty->assign("condiciones", $hotel->condiciones);
$smarty->assign("tipo", $hotel->tipo);
$smarty->assign("claves", $hotel->claves);
$smarty->assign("principal", $hotel->principal);
$smarty->assign("vistas", $hotel->vistas);
$smarty->assign("fecha", $hotel->fecha);
$smarty->assign("facilidad", $facilidad->listado);
$smarty->assign("temporadas", $temporadas->listado);

$smarty->assign("mapas", $mapas);
$smarty->assign("accion", $hotel->accion);
$smarty->assign("listado", $imagen->listado);

if(isset($mensaje) && $mensaje!="")
	$smarty->assign("mensaje", $mensaje);
	
if(isset($mensaje2) && $mensaje2!="")
	$smarty->assign("mensaje2", $mensaje2);

if(isset($mensaje3) && $mensaje3!="")
	$smarty->assign("mensaje3", $mensaje3);

$smarty->display('admin/hotel/detalle.tpl');
/* Fin footer para Smarty */
?> 
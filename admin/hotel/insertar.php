<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Insertar de Producto
include_once ("../../config/class.hotel.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
$hotel = new Hotel;
//var_dump($_POST);exit;
$hotel->insertar_hotel($conex);

if(!isset($categoria2))
	$categoria2= new Categoria;
$categoria2->crearArbol('categoria','id_cat','nombre_cat','padre_cat',0,'&mdash;', 'todos', $_SESSION['ciudad_admin']);


if(isset($hotel->mensaje2) && $hotel->mensaje2=="error"){
	$mensaje2="<tr><td align='center' colspan='2' class='error'>El nombre de producto que esta insertando ya existe en el sistema!</td></tr>";
	$smarty->assign("mensaje", $mensaje2);
	$smarty->assign("categoria", 1);
}

$facilidad = new Hotel;
$facilidad->listar_facilidad_hotel($_GET['id']);

$paises = new Hotel;
$paises->listar_paises();

$estados = new Hotel;
$estados->listar_estados();

$clasificacion = new Categoria;
$clasificacion->categorias_hotel(1);

/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
//$smarty->assign('ciudad_activa', $_SESSION['ciudad_admin']);
$smarty->assign("id", $hotel->id);
$smarty->assign("bandera", $hotel->buscar_bandera($hotel->pais));
$smarty->assign("pais", $hotel->pais);
$smarty->assign("estado",$hotel->estado);
$smarty->assign("ciudad", $hotel->ciudad);
$smarty->assign("categoria", $hotel->categoria);
$smarty->assign("latitud", $hotel->latitud);
$smarty->assign("longitud", $hotel->longitud);
$smarty->assign("codigo", $hotel->codigo);
$smarty->assign("nombres", $hotel->nombre);
$smarty->assign("clasificacion", $clasificacion->listado);
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
$smarty->assign("paises", $paises->listado);
$smarty->assign("estados", $estados->listado);
$smarty->assign("sector", $hotel->sector);

$smarty->assign("listado", $hotel->listado);
$smarty->assign("listado2", $hotel->listado2);
$smarty->assign("accion", $hotel->accion);
$smarty->display('admin/hotel/formulario.tpl');
/* Fin footer para Smarty */
?> 
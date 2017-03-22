<?php
/* header para Smarty */
require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';
/*  Fin header para Smarty */

// Editar de Producto
include_once ("../../config/class.producto.php");
include_once ("../../config/class.hotel.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();
//$auth->nivel_acceso(1,"distinto");

$producto = new Producto;
$producto->editar_producto();
if($producto->mensaje==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>El login que esta insertando ya existe en el sistema!</td></tr>";	
}

$hoteles = new Hotel;
$hoteles->listar_hotel();

if(!isset($categoria2))
       $categoria2= new Categoria;
$categoria2->crearArbol('categoria','id_cat','nombre_cat','padre_cat',0,'&mdash;', 'Productos');


/* footer para Smarty */
$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("listado", $categoria2->listado);
$smarty->assign("listado2", $producto->listado2);
$smarty->assign("categoria", $producto->id_cat);
$smarty->assign("codigo", $producto->codigo);
$smarty->assign("nombres", $producto->nombre);
$smarty->assign("lugar", $producto->lugar);
$smarty->assign("fecha", $producto->fecha);
$smarty->assign("cantidad", $producto->cantidad);
$smarty->assign("principal",$producto->principal);
$smarty->assign("descripcion", $producto->descripcion);
$smarty->assign("claves", $producto->claves);
$smarty->assign("prioridad", $producto->prioridad);
$smarty->assign("detal", $producto->detal);
$smarty->assign("mayor", $producto->mayor);
$smarty->assign("limite", $producto->limite);
$smarty->assign("limite2", $producto->limite2);
$smarty->assign("marca", $producto->marca);
$smarty->assign("hotel",$producto->hotel);
$smarty->assign("hoteles",$hoteles->listado);
$smarty->assign("accion", $producto->accion);
$smarty->display('admin/producto/formulario.tpl');
/* Fin footer para Smarty */
?> 
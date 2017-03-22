<?php
// Index de Producto
include_once ("../../config/class.login.php");
include_once ("../../config/class.hotel.php");
include_once("../../config/conexion.inc.php");	
	 
session_start();
		 
if(!isset($hotel))
	$hotel = new Hotel;
$hotel->calcular_cotizacion();


if ($hotel->listado){
print json_encode($hotel->listado);
}
else{
	echo "{}";
}
	
?> 
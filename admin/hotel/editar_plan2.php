<?php
// Index de Producto
include_once ("../../config/class.login.php");
include_once ("../../config/class.hotel.php");
include_once("../../config/conexion.inc.php");		 

//print_r($_POST);
			
$auth = new Auth;
$auth->permisos();

$hotel = new Hotel;
sleep(1);
$hotel->editar_plan_temporada_hotel2($conex);

/*if ($hotel->listado){
print json_encode($hotel->listado);
}
else{
	echo "{}";
}*/
	
?> 
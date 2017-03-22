<?php
// Index de Producto
include_once ("../../config/class.login.php");
include_once ("../../config/class.hotel.php");
include_once("../../config/conexion.inc.php");		 

//print_r($_POST);

?>
	<script>console.log("mmg duro");</script>
    <?php
			
$auth = new Auth;
$auth->permisos();

$hotel = new Hotel;
sleep(1);
$hotel->editar_rango_ninos($conex);

/*if ($hotel->listado){
print json_encode($hotel->listado);
}
else{
	echo "{}";
}*/
	
?> 
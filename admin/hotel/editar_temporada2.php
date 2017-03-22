<?php
// Insertar de Producto
include_once ("../../config/class.hotel.php");
include_once ("../../config/class.categoria.php");
include_once ("../../config/class.login.php");
include_once("../../config/conexion.inc.php"); 

$auth = new Auth;
$auth->permisos();

$hotel = new Hotel;
sleep(1);
$hotel->editar_temporada_hotel($conex);

?> 
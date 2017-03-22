<?php
// Index de Producto
include_once ("../../config/class.login.php");
include_once ("../../config/class.hotel.php");
include_once("../../config/conexion.inc.php");     

session_start();
     
if(!isset($acceso))
  $acceso = new Auth;
$acceso->listado="";
$zarpe->listar_zarpe_fecha($_GET['fecha']);

$ida =$_POST['fecha_ida'];
$vuelta=$_POST['fecha_vuelta'];
$resultado = str_replace("/", "-", $ida);
$resultado2 = str_replace("/", "-", $vuelta);
$ida = date_create($resultado);
$vuelta = date_create($resultado2);
$hoy = date_create('today');
if(($ida < $hoy)||($vuelta < $ida)){
	
}


if ($zarpe->listado){
print json_encode($zarpe->listado);
}
else{
  echo "{}";
}
  
?>
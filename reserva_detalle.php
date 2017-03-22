<?php
// Index de Producto
include_once ("../../config/class.login.php");
include_once ("../../config/class.zarpe.php");
include_once("../../config/conexion.inc.php");     

session_start();
     
if(!isset($zarpe))
  $zarpe = new Zarpe;
$zarpe->listado="";
$zarpe->listar_zarpe_fecha($_GET['fecha']);


if ($zarpe->listado){
print json_encode($zarpe->listado);
}
else{
  echo "{}";
}
  
?>



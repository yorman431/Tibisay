<?php  

include_once("../../config/conexion.inc.php");

$hotel = $_POST['hotel'];
$sql = "SELECT maxAdultos, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$hotel' GROUP BY maxAdultos";
$consulta = mysql_query($sql) or die(mysql_error());
while($resultado = mysql_fetch_array($consulta)){
	$listado[] = $resultado;
}

echo json_encode($listado);

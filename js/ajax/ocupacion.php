<?php  

include_once("../../config/conexion.inc.php");

$hotel = $_POST['hotel'];
$fecha_inicio = date("Y-m-d", strtotime($_POST['llegada']));
$cPasajero = $_POST['pasajero'];

$sql = "SELECT maxAdultos, nombre, regimen
FROM habitaciones
WHERE maxAdultos = '$cPasajero' AND
  id_temporada = (SELECT id
  FROM temporadas
  WHERE id_alojamiento = '$hotel' AND
  '$fecha_inicio' BETWEEN  fecha_inicio AND fecha_fin)
GROUP BY habitaciones.nombre ORDER BY habitaciones.maxAdultos";
$consulta = mysql_query($sql) or die(mysql_error());
while($resultado = mysql_fetch_array($consulta)){
	$listado[] = $resultado;
}

echo json_encode($listado);

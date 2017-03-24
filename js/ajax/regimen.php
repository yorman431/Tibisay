<?php 

include_once("../../config/conexion.inc.php");

$hotel = $_POST['hotel'];
$nombre = $_POST['nombre'];
$resultado = '';

$sql = "SELECT nombre, regimen FROM habitaciones WHERE nombre = '$nombre' AND id_alojamiento = '$hotel' GROUP BY regimen";
$consulta = mysql_query($sql);

while($respuesta = mysql_fetch_array($consulta)){
	$resultado .= '<option value="'.$respuesta["regimen"].'">'.$respuesta["regimen"].'</option>'; 
}
echo($resultado);

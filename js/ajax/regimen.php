<?php 

include_once("../../config/conexion.inc.php");

$hotel = $_POST['hotel'];
$maxAdultos = $_POST['maxAdultos'];
$resultado = '';

$sql = "SELECT regimen FROM habitaciones WHERE maxAdultos = '$maxAdultos' AND id_alojamiento = '$hotel' GROUP BY regimen";
$consulta = mysql_query($sql);

while($respuesta = mysql_fetch_array($consulta)){
	$resultado .= '<option value="'.$respuesta["regimen"].'">'.$respuesta["regimen"].'</option>'; 
}
echo($resultado);

?>
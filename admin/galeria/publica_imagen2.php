<?php
error_reporting (E_ALL);
// OJO, sólo funciona con imagnes en formato JPEG...


if(isset($_GET['id'])) {
   	//require_once('../producto/Conexion/poseidon.php');
	require("../../config/conexion.inc.php");

	$sql = "SELECT * FROM imagen WHERE id_image='".$_GET['id']."'";
    $consulta = mysql_query($sql);
    $imagen = mysql_result($consulta,0,"binario_image") or die (mysql_error());

    // Envio cabeceras al navegador .. se indica que lo "que vá" es una imagen de formato MIME JPEG
       header ("Content-type: image/jpeg");
    // Generar el thumbnail:

    // Se crea la imagen desde el campo binario de la BD
       $img = imagecreatefromstring($imagen);

   

    // Se entrega al buffer de salida (navegador en este caso) la imagen en formato JPEG
    // El tercer parámetro (100) indica la calidad de la imagen: en porcentaje relación calidad/peso imagen.
      imagejpeg($img,'',100);
	  
	  
}
?> 
<?php
error_reporting (E_ALL);
// OJO, s�lo funciona con im�genes en formato JPEG...
$num=$_GET['anchura'];
$max=$_GET['altura'];
if(isset($_GET['id'])) {
   	//require_once('../producto/Conexion');
	require("../../config/conexion.inc.php");

	$sql = "SELECT * FROM imagen WHERE id_image='".$_GET['id']."'";
    $consulta = mysql_query($sql);
	$resultado=mysql_fetch_array($consulta);
	$nombre=$resultado['nombre_image'];

    $imagen = mysql_result($consulta,0,"binario_image") or die (mysql_error());

    // Envio cabeceras al navegador .. se indica que lo "que v�" es una imagen de formato MIME JPEG
       header ("Content-type: image/jpeg");
	   header("Content-Disposition: attachment; filename=".$nombre);
    // Generar el thumbnail:

    // Se crea la imagen desde el campo binario de la BD
       $img = imagecreatefromstring($imagen);

    // Tama�o del Thumbanil (de la imagen a generar ..)
       $picsize = $num;
       $altura_max = $max;
    // Se obtienen los datos del ancho y alto de la imagen.
       $new_w = imagesx($img);
       $new_h = imagesy($img);
	   
    // Se ajusta al nuevo tama�o
	 if($new_w >= $new_h){
	// Se calcula la relaci�n alto/ancho
       $aspect_ratio = $new_h / $new_w;
       $new_w = $picsize;
       $new_h = abs($new_w * $aspect_ratio);
	 }else{
	// Se calcula la relaci�n ancho/alto
       $aspect_ratio = $new_w / $new_h;
	   $new_h = $altura_max;
       $new_w = abs($new_h * $aspect_ratio);
	 }

    // Se crea la mascara de la imagen nueva
       $dst_img = imagecreatetruecolor($new_w,$new_h);

    // Se copia y reajusta el nuevo tama�o en la nueva imagen.
       imagecopyresampled($dst_img,$img,0,0,0,0,$new_w,$new_h,imagesx($img),imagesy($img));
	   

    // Se entrega al buffer de salida (navegador en este caso) la imagen en formato JPEG
    // El tercer par�metro (100) indica la calidad de la imagen: en porcentaje relaci�n calidad/peso imagen.
       imagejpeg($dst_img,'',100);
}
?> 
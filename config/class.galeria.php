<?php 
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 162)
 * Alejandro José Díaz Delgado. <contacto@diazcreativos.net.ve> escribió este archivo.
 * Mientras conserve
 * este comentario usted puede hacer lo que quiera con este material. Si alguna
 * vez nos encontramos
 * y piensa que este material le fue útil, usted puede invitarme una cerveza
 * en agradecimiento.
 * ----------------------------------------------------------------------------
*/

class Galeria{
	var $nombre;
	var $fecha;
	var $descripcion;
	var $buscar;
	var $mensaje;
	var $accion;
	var $combo;
	var $etiqueta;
	var $listado;
	var $id;
	var $fotos;
	
	function Galeria(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->fecha=$_POST['fecha'];
		$this->descripcion=$_POST['descripcion'];
	}
	
	function listar_galeria(){
		/* Metodo para listar las galerías y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if(isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM galeria WHERE 
			(nombre_gal LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_gal LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			descripcion_gal LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY fecha_gal DESC";
		}else{
			
			$sql="SELECT *, COUNT( * ) AS fotos FROM galeria GROUP BY id_gal";
		}
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$sql="SELECT COUNT( * ) AS fotos FROM imagen WHERE galeria_image=".$resultado['id_gal']." AND tabla_image='galeria'";
			$contar=mysql_query($sql) or die(mysql_error());
			$numero=mysql_fetch_array($contar);
			$resultado['fotos']=$numero['fotos'];
			$this->listado[] = $resultado;
		}
	}
	
	function listar_galeria_publica(){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT * FROM galeria, imagen WHERE galeria_image=id_gal AND tabla_image='galeria' ORDER BY id_image DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function ultima_galeria($pos){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT * FROM galeria, imagen WHERE id_gal=galeria_image AND tabla_image='galeria' AND nombre_gal='$pos' ORDER BY id_gal DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_galeria(){
		/*Metodo para mostrar una galería seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM galeria WHERE id_gal='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $_GET['id'];
			$this->nombre = $resultado['nombre_gal'];
			$this->fecha = $resultado['fecha_gal'];
			$this->descripcion = $resultado['descripcion_gal'];
		} 
	}
	
	function insertar_galeria(){
	/*Metodo para insertar una galería seleccionada */	
		$this->accion="Datos de la Nueva Galer&iacute;a";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			//$this->descripcion=html_entity_decode($this->descripcion);
			$sql="INSERT INTO galeria VALUES ('','$this->nombre', '$this->fecha', '$this->descripcion')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/galeria/");
		}			
	}
	
	function editar_galeria(){
	/*Metodo para editar una galería seleccionada */		
		$this->accion="Editando Datos de la Galer&iacute;a";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			//$this->descripcion=html_entity_decode($this->descripcion);
			$sql="UPDATE galeria SET nombre_gal='$this->nombre', fecha_gal='$this->fecha', descripcion_gal='$this->descripcion' WHERE id_gal='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/galeria/");
		}else{
		  $this->mostrar_galeria();
		}
	}
	
	function eliminar_galeria(){
	/*Metodo para eliminar una galeria seleccionada */	
		$id=$_GET['id'];
		$sql="DELETE FROM galeria WHERE id_gal='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM imagen WHERE galeria_image='$id' AND tabla_image='galeria'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/galeria/");
	}
	
	function mostrar_imagenes($tabla){
		/*Metodo para mostrar las imagenes de la galeria */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM imagen WHERE galeria_image='$id' AND tabla_image='$tabla' ORDER BY id_image";
			$consulta=mysql_query($sql);
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function mostrar_imagenes_nologo($tabla){
		/*Metodo para mostrar las imagenes de la galeria */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM imagen WHERE galeria_image='$id' AND tabla_image='$tabla' AND nombre_image!='mapa' AND nombre_image!='portada'";
			$consulta=mysql_query($sql);
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function mostrar_imagenes3($tabla, $nombre, $condicion){
		/*Metodo para mostrar las imagenes de la galeria */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			if($condicion=="igual")
				$sql="SELECT * FROM imagen WHERE galeria_image='$id' AND tabla_image='$tabla' AND nombre_image='$nombre' ORDER BY id_image";
			else if($condicion=="distinto")
				$sql="SELECT * FROM imagen WHERE galeria_image='$id' AND tabla_image='$tabla' AND nombre_image!='$nombre' ORDER BY id_image";
			
			$consulta=mysql_query($sql);
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function mostrar_imagenes2($tabla){
		/*Metodo para mostrar las imagenes de la galeria */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM imagen WHERE galeria_image='$id' AND tabla_image='$tabla'";
			$consulta=mysql_query($sql);
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function insertar_imagen($carpeta){
	/*Metodo para insertar una imagen a una galería determinada*/	
		$this->accion="Insertar Imagen";
		if (isset($_POST['envio']) && $_POST['envio']=="Enviar"){
			$this->asignar_valores();
			$id=$_GET['id'];
			if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {	
				if ($_FILES['archivo']['type'] == "image/jpeg" || $_FILES['archivo']['type'] == "image/pjpeg" || $_FILES['archivo']['type'] == "image/png"){
						//nombre de la imagen
						if ($_FILES['archivo']['size']>=512000){
							$this->mensaje=1;
						}else{
							if($_FILES['archivo']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['archivo']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
							else if($_FILES['archivo']['type'] == "image/png")
								$archivo = time().".png";
							
							$peso=$_FILES['archivo']['size'];	
							$tipo=$_FILES['archivo']['type'];
	
							$directorio="../../imagenes/".$carpeta;
							if (!is_dir($directorio)) exec("mkdir $directorio");
							$directorio.="/".$archivo;
							$directorio2=$carpeta."/".$archivo;
							$directorio3="../../imagenes/".$carpeta."/".$archivo;
							$temp="../../imagenes/miniaturas/".$carpeta;
							if (!is_dir($temp)) exec("mkdir $temp");
							$directorio4=$temp."/".$archivo;
							
							//echo  $directorio3."<br />";
							//echo  $directorio4."<br /><br />";
							
							//movemos la imagen.
							move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio);
							
							//creart umagen miniatura
							$this->crear_miniatura($directorio3,$directorio4,310, $_FILES['archivo']['type']);
							
							//consulta
							$insertar_imagen=mysql_query("INSERT INTO imagen VALUES ('', '$directorio2', '$tipo', '$id', '$this->nombre', '$carpeta')") or die(mysql_error());
				
							//retornamos
							if($carpeta=="subcategoria")
								header("location:/admin/link/sublink_detalle.php?id=$id");
							else
								header("location:/admin/$carpeta/detalle.php?id=$id");
							exit();
						}
					}else{
						$this->mensaje=2;
					}
				} else {
					//imagen no se pudo subir o no seleccionaron.
					$this->mensaje=3;
				}//fin file upload.	
		  }
	}
	
	function eliminar_imagen(){
		$carpeta=$_GET['tabla'];
		$id=$_GET['id'];
		$id_back=$_GET['back'];
		//Seleccionas página de retorno
		$sql="SELECT directorio_image, nombre_image FROM imagen WHERE id_image='$id' AND tabla_image='$carpeta'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		
		$directorio="../../imagenes/".$resultado['directorio_image'];
		//eliminamos en cadena
		$sql="DELETE FROM imagen WHERE id_image='$id' AND tabla_image='$carpeta'";
		$qr_eliminar=mysql_query($sql) or die(mysql_error());
		unlink($directorio);
		
		$directorio2="../../imagenes/miniaturas/".$resultado['directorio_image'];
		unlink($directorio2);
		
		
		header("location:/admin/$carpeta/detalle.php?id=$id_back");	
		if($carpeta=="subcategoria")
			header("location:/admin/link/sublink_detalle.php?id=$id_back");	
		else
			header("location:/admin/$carpeta/detalle.php?id=$id_back");	
		exit();
	}
	
	function buscar_logo($id){
		/* Metodo para buscar el icono. */
		$sql="SELECT directorio_image FROM producto, imagen WHERE id_pro='$id' AND galeria_image=id_pro AND tabla_image='producto' AND nombre_image='logo' GROUP BY id_pro";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		return $this->modificar_url($resultado['directorio_image']);
	}
	
	function buscar_logo2($id){
		/* Metodo para buscar el icono. */
		$sql="SELECT directorio_image FROM hotel, imagen WHERE id_hot='$id' AND galeria_image=id_hot AND tabla_image='hotel' AND nombre_image='mapa' GROUP BY id_hot";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		return $resultado['directorio_image'];
	}
	
	function crear_miniatura( $pathToImages, $pathToThumbs, $thumbWidth, $tipo ) {
		  //echo "Creating thumbnail for {$fname} <br />";
		  // load image and get image size
		  
		  if($tipo == "image/jpeg")
		  		$img = imagecreatefromjpeg( $pathToImages );
		  else if($tipo == "image/gif")
				$img = imagecreatefromgif( $pathToImages );
		  else if($tipo == "image/png")
				$img = imagecreatefrompng( $pathToImages );
		
		  $width = imagesx( $img );
		  $height = imagesy( $img );
	
		  // calculate thumbnail size
		  $new_width = $thumbWidth;
		  $new_height = floor( $height * ( $thumbWidth / $width ) );
	
		  // create a new temporary image
		  $tmp_img = imagecreatetruecolor( $new_width, $new_height );
		  if($tipo == "image/png"){
			  imagealphablending($tmp_img, false);
		  }
		  	  // copy and resize old image into new image 
		      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
	
		  // save thumbnail into a file
		  if($tipo == "image/jpeg")
		  		imagejpeg( $tmp_img, $pathToThumbs, 100);
		  else if($tipo == "image/gif")
				imagegif( $tmp_img, $pathToThumbs);
		  else if($tipo == "image/png"){
		  		imagesavealpha($tmp_img, true);
				imagepng( $tmp_img, $pathToThumbs);
		  }
	 }
	 
	 function modificar_url($url){
		 /* Metodo para modificar url */
		 $temp=explode("/", $url);
		 $url=$temp[0]."/miniaturas/".$temp[1];
		 return  $url;
	 }
	 
	 function limpiar_metas($string,$corte = null){
		//echo "cadena: ".$string."<br />";
		$caracters_no_permitidos = array("\"","'");
		// paso los caracteres entities tipo &aacute; $gt;etc a sus respectivos html
		$s = html_entity_decode($string,ENT_COMPAT,'ISO-8859-1');
        // quito todas las etiquetas html y php
 		$s = strip_tags($s);
		//elimino todos los retorno de carro
		$s = str_replace("\r", '', $s);
		//en todos los espacios en blanco le añado un <br /> para después eliminarlo
		$s = preg_replace('/(?<!>)n/', "<br />n", $s);
		//elimino la inserción de nuevas lineas
		$s = str_replace("\n", '', $s);
		// elimino tabulaciones y el resto de la cadena
		$s = str_replace("\t", '', $s);
		// elimino caracteres en blanco
		$s = preg_replace('/[ ]+/', ' ', $s);
		$s = preg_replace('/<!--[^-]*-->/', '', $s);
		// vuelvo a hacer el strip para quitar el <br /> que he añadido antes para eliminar las saltos de carro y nuevas lineas
		$s  = strip_tags($s);
		// elimino los caracters como comillas dobles y simples
		$s = str_replace($caracters_no_permitidos,"",$s);
		if (isset($corte) && (is_numeric($corte))){
			$s = mb_substr($s,0,$corte, 'ISO-8859-1');
		}
		
		//echo "Final: ".$s."<br /><br />";
		
		return $s;
    }
}
?>
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

class Publicidad{
	var $nombre;
	var $fecha;
	var $descripcion;
	var $buscar;
	var $mensaje;
	var $accion;
	var $combo;
	var $etiqueta;
	var $url;
	var $directorio;
	var $listado;
	var $lista;
	var $id;
	var $fotos;
	
	function Publicidad(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->url=$_POST['url'];
		$this->fecha=$_POST['fecha'];
		$this->descripcion=$_POST['descripcion'];
	}
	
	function listar_publicidad(){
		/* Metodo para listar las galerías y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if(isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM publicidad WHERE 
			(nombre_pub LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_pub LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			descripcion_pub LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY fecha_pub DESC";
		}else{
			
			$sql="SELECT *, COUNT( * ) AS fotos FROM publicidad GROUP BY id_pub";
		}
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$sql="SELECT COUNT( * ) AS fotos FROM directorio WHERE pertenece_dir=".$resultado['id_pub']." AND tabla_dir='publicidad'";
			$contar=mysql_query($sql) or die(mysql_error());
			$numero=mysql_fetch_array($contar);
			$resultado['fotos']=$numero['fotos'];
			$this->listado[] = $resultado;
		}
	}
	
	function listar_publicidad_publica(){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT * FROM publicidad, directorio WHERE pertenece_dir=id_pub AND tabla_dir='publicidad' GROUP BY id_pub ORDER BY id_pub DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_publicidad(){
		/*Metodo para mostrar una galería seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM publicidad WHERE id_pub='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $_GET['id'];
			$this->nombre = $resultado['nombre_pub'];
			$this->fecha = $resultado['fecha_pub'];
			$this->descripcion = $resultado['descripcion_pub'];
		} 
	}
	
	function insertar_publicidad(){
	/*Metodo para insertar una galería seleccionada */	
		$this->accion="Datos de la Nueva Publicidad";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->descripcion=html_entity_decode($this->descripcion);
			$sql="INSERT INTO publicidad VALUES ('','$this->nombre', '$this->fecha', '$this->descripcion')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/publicidad/");
		}			
	}
	
	function editar_publicidad(){
	/*Metodo para editar una galería seleccionada */		
		$this->accion="Editando Datos de la Publicidad";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->descripcion=html_entity_decode($this->descripcion);
			$sql="UPDATE publicidad SET nombre_pub='$this->nombre', fecha_pub='$this->fecha', descripcion_pub='$this->descripcion' WHERE id_pub='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/publicidad/");
		}else{
		  $this->mostrar_publicidad();
		}
	}
	
	function eliminar_publicidad(){
	/*Metodo para eliminar una galeria seleccionada */	
		$id=$_GET['id'];
		//eliminamos las imagenes del directorio primero
		$sql="SELECT url_dir FROM directorio WHERE pertenece_dir='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado=mysql_fetch_array($consulta)){
			$archivo="../../imagenes/publicidad/".$resultado['url_dir'];
			unlink($archivo);
		}
		//eliminamos el registro del espacio publicitario
		$sql="DELETE FROM publicidad WHERE id_pub='$id'";
		$qr_eliminar=mysql_query($sql) or die(mysql_error());
		//eliminamos el registro de las fotos
		$sql="DELETE FROM directorio WHERE pertenece_dir='$id' AND tabla_dir='publicidad'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/publicidad/");
	}
	
	function cargar_publicidad($pos){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT * FROM publicidad, directorio WHERE id_pub=pertenece_dir AND tabla_dir='publicidad' AND nombre_pub='$pos' ORDER BY id_dir DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function cargar_laterales($pos){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT *, id_pub AS imagenes FROM publicidad WHERE nombre_pub='$pos' ORDER BY id_pub DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$id=$resultado['id_pub'];
			$sql2="SELECT * FROM directorio WHERE pertenece_dir='$id' ORDER BY id_dir ASC";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$lista="";
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$lista[]=$resultado2;
			}
			$resultado['imagenes']=$lista;
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_imagenes($tabla){
		/*Metodo para mostrar las imagenes de la galeria */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM directorio WHERE pertenece_dir='$id' AND tabla_dir='$tabla'";
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
			//echo "El id: ".$id." - El nombre: ".$this->nombre." - El URL: ".$this->url;
			// si hay imagen.
				if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {	
					//revisamos que sea jpg
					if ($_FILES['archivo']['type'] == "image/jpeg" || $_FILES['archivo']['type'] == "image/pjpeg"){
						//nombre de la imagen
						if ($_FILES['archivo']['size']>=256000){
							$this->mensaje=1;
						}else{
							if($_FILES['archivo']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['archivo']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
							
							$peso=$_FILES['archivo']['size'];	
							$tipo=$_FILES['archivo']['type'];
							//movemos la imagen.
							move_uploaded_file($_FILES['archivo']['tmp_name'], "../../imagenes/publicidad/".$archivo);
							//consulta
							$this->contenido=html_entity_decode($this->contenido);
							$sql="INSERT INTO directorio VALUES ('','$this->url', '$archivo', '$tipo', '$id', '$this->nombre', '$carpeta')";
							$consulta=mysql_query($sql) or die(mysql_error());
				
							//retornamos
							header("location:/admin/publicidad/detalle.php?id=$id");
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
	/*Metodo para eliminar un usuario seleccionado */	
		$carpeta=$_GET['tabla'];
		$id=$_GET['id'];
		$id_back=$_GET['back'];
		$sql="SELECT directorio_dir FROM directorio WHERE id_dir='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$archivo="../../imagenes/publicidad/".$resultado['directorio_dir'];
		
		//eliminamos en cadena
		$sql="DELETE FROM directorio WHERE id_dir='$id' AND tabla_dir='$carpeta'";
		$qr_eliminar=mysql_query($sql) or die(mysql_error());
		unlink($archivo);
		header("location:/admin/$carpeta/detalle.php?id=$id_back");	
	}
}
?>
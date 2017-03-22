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

class Video{
	var $nombre;
	var $fecha;
	var $tipo;
	var $categoria;
	var $descripcion;
	var $buscar;
	var $mensaje;
	var $accion;
	var $combo;
	var $ubicacion;
	var $etiqueta;
	var $listado;
	var $id;
	var $fotos;
	var $url;
	var $cliente;
	function Video(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		//$this->fecha=$_POST['fecha'];
		$this->descripcion=$_POST['descripcion'];
		$this->tipo=$_POST['tipo'];
		$this->categoria=$_POST['categoria'];
		$this->ubicacion=$_POST['ubicacion'];
		$this->url=$_POST['url'];
		$this->cliente=$_POST['cliente'];
	}
	
	function listar_video(){
		/* Metodo para listar las galerías y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if(isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			
			$sql="SELECT * FROM video,categoria WHERE 
			(nombre_vid LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_vid LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_vid LIKE '%' '".$_SESSION['buscar']."' '%' OR
			nombre_vid LIKE '%' '".$_SESSION['buscar']."' '%' OR
			nombre_cat LIKE '%' '".$_SESSION['buscar']."' '%' OR
			url_vid LIKE '%' '".$_SESSION['buscar']."' '%' OR
			descripcion_vid LIKE '%' '".$_SESSION['buscar']."' '%')AND id_cat=categoria_vid 
			ORDER BY fecha_vid DESC";
		}else{
			
			$sql="SELECT *, COUNT( * ) AS videos FROM video GROUP BY id_vid";
		}
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$sql2="SELECT nombre_cat FROM categoria WHERE id_cat=".$resultado['categoria_vid'];
			$consulta2=mysql_query($sql2);
			$resultado2 = mysql_fetch_array($consulta2);
			$resultado['categoria_vid']=$resultado2['nombre_cat'];
			$this->listado[] = $resultado;
		}
	}
	
	function listar_videos_publico(){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT *, id_vid AS video FROM video GROUP BY id_vid ORDER BY id_vid DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$sql2="SELECT nombre_hot FROM hotel WHERE id_hot=".$resultado['categoria_vid'];
			$consulta2=mysql_query($sql2);
			$resultado2 = mysql_fetch_array($consulta2);
			$resultado['categoria_vid']=$resultado2['nombre_hot'];
			$this->listado[] = $resultado;
		}
	}
	
	function ultima_galeria(){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT * FROM galeria, imagen WHERE id_gal=galeria_image AND tabla_image='galeria' GROUP BY id_gal ORDER BY id_gal DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_videos_categoria($cat=null){
		
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
		}else if($cat!= null){
			$id=$cat;	
		}
			
			$sql="SELECT * FROM video, hotel WHERE categoria_vid=$id and categoria_vid=id_hot ORDER BY id_vid DESC";
			
			$consulta=mysql_query($sql);
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
	    
	
}

 function mostrar_ultimos(){
			$sql="SELECT * FROM video, categoria WHERE categoria_vid=id_cat ORDER BY nombre_cat,id_vid DESC";
			$consulta=mysql_query($sql);
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
}	 
	 

		function relacionados_video(){
		
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
		}
		
			$sql="SELECT id_cat, nombre_cat FROM video, categoria WHERE id_vid='$id' and categoria_vid=id_cat";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$categoria=$resultado['id_cat'];
			$video=$id;
			$nombre=$resultado['nombre_cat'];
			$sql2="SELECT * FROM video,categoria WHERE categoria_vid='$categoria' AND id_vid!=$video AND id_cat=categoria_vid";
			$consulta2=mysql_query($sql2);
			while($resultado2 = mysql_fetch_array($consulta2)){
			$this->listado[] = $resultado2;
			}
			
	}
	function mostrar_video(){
		/*Metodo para mostrar una galería seleccionada */
		$this->accion="Detalles del Video";
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM video WHERE id_vid='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $_GET['id'];
			$this->nombre = $resultado['nombre_vid'];
			$this->fecha = $resultado['fecha_vid'];
			$this->ubicacion = $resultado['ubicacion_vid'];
			$this->descripcion = $resultado['descripcion_vid'];
			$this->url = $resultado['url_vid'];
			$this->tipo = $resultado['tipo_vid'];
			$sql2="SELECT nombre_hot FROM hotel WHERE id_hot=".$resultado['categoria_vid'];
			$consulta2=mysql_query($sql2);
			$resultado2 = mysql_fetch_array($consulta2);
			$this->categoria = $resultado2['nombre_cat'] ;
			
			
		} 
	}
	
	function insertar_video(){
	/*Metodo para insertar una galería seleccionada */	
		$this->accion="Datos del Nuevo Video";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->descripcion=html_entity_decode($this->descripcion);
			$sql="INSERT INTO video VALUES ('','$this->nombre',CURRENT_TIMESTAMP,'$this->categoria','$this->tipo','$this->url','$this->ubicacion','$this->descripcion')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/video/");
		}else{
			 $this->mostrar_video();
		}			
	}
	
	function editar_video(){
	/*Metodo para editar una galería seleccionada */		
		$this->accion="Editando Datos del Video";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->descripcion=html_entity_decode($this->descripcion);
			$sql="UPDATE video SET nombre_vid='$this->nombre', fecha_vid='$this->fecha', descripcion_vid='$this->descripcion', url_vid='$this->url', ubicacion_vid='$this->ubicacion',tipo_vid='$this->tipo',categoria_vid='$this->categoria' WHERE id_vid='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/video/");
		}else{
		  $this->mostrar_video();
		}
	}
	
	function eliminar_video(){
	/*Metodo para eliminar una galeria seleccionada */	
		$id=$_GET['id'];
		$sql="DELETE FROM video WHERE id_vid='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/video/");
	}
	
	function mostrar_imagenes($tabla){
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
			if(!empty($_FILES['archivo']['name'])){
				$binario_nombre_temporal=$_FILES['archivo']['tmp_name'] ; 
				$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal))); 
				$binario_nombre=$_FILES['archivo']['name']; 
				$binario_peso=$_FILES['archivo']['size'];
				$binario_tipo=$_FILES['archivo']['type']; 
				
				//////////////////////////////////////////////////
				if ($binario_peso >= 1024000)
				{
					return($this->mensaje=2);
				}
				
				$fotolocal = $_FILES['archivo']['name'];
				//////////////////////////////////////////////////
				$nomPartido = explode(".",$fotolocal);
				$extension = $nomPartido[1];
				$extAceptada = false;
				//////////////////////////////////////////////////
				$extensiones = array("jpg","jpeg","JPG","JPEG","gif","GIF");
				$num = count($extensiones);
				$largo = $num - 1;
				for($i=0;$i<=$largo;$i++)
				{
					if($extensiones[$i] == $extension)
					{
						$extAceptada = true;
						break;
					}
				}
				//////////////////////////////////////////////////
				if ($fotolocal == "" || $extAceptada == false)
				{
					return($this->mensaje=3);
				}
				//Insertamos los Datos
				
				$insertar_imagen=mysql_query("INSERT INTO imagen VALUES ('', '$binario_contenido', '$binario_tipo', '$id', '$this->nombre', '$carpeta')") or die(mysql_error());
					header("location:/admin/$carpeta/detalle.php?id=$id");
					exit();
			}else{ 
				
				return($this->mensaje=1);
			}
		}			
	}
	
	function eliminar_imagen(){
		$carpeta=$_GET['tabla'];
		$id=$_GET['id'];
		$id_back=$_GET['back'];
		
		//Seleccionas página de retorno
		$sql="DELETE FROM imagen WHERE id_image='$id' AND tabla_image='$carpeta'";
		$qr_eliminar2=mysql_query($sql) or die(mysql_error());
		header("location:/admin/$carpeta/detalle.php?id=$id_back");	
	}
}
?>
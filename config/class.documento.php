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

class Documento{
	var $titulo;
	var $fecha;
	var $tipo;
	var $peso;
	var $nombre;
	var $contenido;
	var $id;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Documento(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->titulo=$_POST['titulo'];
		$this->fecha=$_POST['fecha'];
		$this->contenido=$_POST['contenido'];

	}
	
	function listar_documento(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM documento WHERE
			(titulo_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			peso_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			contenido_doc LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_doc DESC";
		}else{
			$sql="SELECT * FROM documento ORDER BY id_doc DESC";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_documento_publico(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM documento WHERE cliente_doc='$id' AND 
			(titulo_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			peso_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_doc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			contenido_doc LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_doc DESC";
		}else{
			$sql="SELECT * FROM documento ORDER BY id_doc DESC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_documento(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM documento WHERE id_doc='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->titulo=$resultado['titulo_doc'];
			$this->fecha=$resultado['fecha_doc'];
			$this->tipo=$resultado['tipo_doc'];
			$this->peso=$resultado['peso_doc'];
			$this->nombre=$resultado['nombre_doc'];
			$this->contenido=$resultado['contenido_doc'];
		} 
	}
	
	function insertar_documento(){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos del Nuevo Documento";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
				// si hay imagen.
				if (is_uploaded_file($_FILES['documento']['tmp_name'])) {	
					//revisamos que sea jpg
					if ($_FILES['documento']['type'] == "application/msword" || $_FILES['documento']['type'] == "application/pdf" || $_FILES['documento']['type'] == "application/octet-stream" || $_FILES['documento']['type'] == "application/vnd.ms-excel" || $_FILES['documento']['type'] == "image/jpeg" || $_FILES['documento']['type'] == "image/pjpeg" || $_FILES['documento']['type'] == "image/png" || $_FILES['documento']['type'] == "image/x-png"){
						//nombre de la imagen
						if ($_FILES['documento']['size']>=2048000){
							$this->mensaje=1;
						}else{
							if($_FILES['documento']['type'] == "application/msword")
								$archivo = time().".doc";
							else if($_FILES['documento']['type'] == "application/pdf")
								$archivo = time().".pdf";
							else if($_FILES['documento']['type'] == "application/vnd.ms-excel")
								$archivo = time().".xls";
							else if($_FILES['documento']['type'] == "application/octet-stream")
								$archivo = time().".xls";
							else if($_FILES['documento']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['documento']['type'] == "image/png")
								$archivo = time().".png";
							else if($_FILES['documento']['type'] == "image/x-png")
								$archivo = time().".png";
							else if($_FILES['documento']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
							
							$peso=$_FILES['documento']['size'];	
							$tipo=$_FILES['documento']['type'];
							//movemos la imagen.
							move_uploaded_file($_FILES['documento']['tmp_name'], "../../documentos/".$archivo);
							//consulta
							//$this->contenido=html_entity_decode($this->contenido);
							$consulta=mysql_query("INSERT INTO documento (id_doc, titulo_doc, fecha_doc, tipo_doc, peso_doc, nombre_doc, contenido_doc) VALUES ('','$this->titulo','$this->fecha','$tipo','$peso','$archivo','$this->contenido')") or die(mysql_error());
				
							//retornamos
							header("location:/admin/documento/");
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
	
	function editar_documento(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Documento";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
				if (is_uploaded_file($_FILES['documento']['tmp_name'])) {	
					//revisamos que sea jpg
					if ($_FILES['documento']['type'] == "application/msword" || $_FILES['documento']['type'] == "application/pdf" || $_FILES['documento']['type'] == "application/octet-stream" || $_FILES['documento']['type'] == "application/vnd.ms-excel" || $_FILES['documento']['type'] == "image/jpeg" || $_FILES['documento']['type'] == "image/pjpeg" || $_FILES['documento']['type'] == "image/png" || $_FILES['documento']['type'] == "image/x-png"){
						//nombre de la imagen
						if ($_FILES['documento']['size']>=1024000){
							$this->mensaje=1;
						}else{
							if($_FILES['documento']['type'] == "application/msword")
								$archivo = time().".doc";
							else if($_FILES['documento']['type'] == "application/pdf")
								$archivo = time().".pdf";
							else if($_FILES['documento']['type'] == "application/vnd.ms-excel")
								$archivo = time().".xls";
							else if($_FILES['documento']['type'] == "application/octet-stream")
								$archivo = time().".xls";
							else if($_FILES['documento']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['documento']['type'] == "image/png")
								$archivo = time().".png";
							else if($_FILES['documento']['type'] == "image/x-png")
								$archivo = time().".png";
							else if($_FILES['documento']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
								
							$tipo=$_FILES['documento']['type'];
							$peso=$_FILES['documento']['size'];
							//movemos la imagen.
							move_uploaded_file($_FILES['documento']['tmp_name'], "../../documentos/".$archivo);
							//buscar al que se va a remplazar
							$sql="SELECT nombre_doc FROM documento WHERE id_doc='$id'";
							$consulta=mysql_query($sql) or die(mysql_error());
							$resultado=mysql_fetch_array($consulta);
							$borrando="../../documentos/".$resultado['nombre_doc'];
							unlink($borrando);
							
							//guardamos el nuevo
							//$this->contenido=html_entity_decode($this->contenido);
							$consulta=mysql_query("UPDATE documento SET titulo_doc='$this->titulo', fecha_doc='$this->fecha', tipo_doc='$tipo', peso_doc='$peso', nombre_doc='$archivo', contenido_doc='$this->contenido' WHERE id_doc='$id'") or die(mysql_error());
							//retornamos
							header("location:/admin/documento/");
							exit();
						}
					}else{
						$this->mensaje=2;
					}
				} else {
						//$this->contenido=html_entity_decode($this->contenido);
						$consulta=mysql_query("UPDATE documento SET titulo_doc='$this->titulo', fecha_doc='$this->fecha', contenido_doc='$this->contenido' WHERE id_doc='$id'") or die(mysql_error());
						//retornamos
						header("location:/admin/documento/");
						exit();
				}//fin file upload.
		}else{
		  $this->mostrar_documento();
		}
	}
	
	function eliminar_documento(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="SELECT nombre_doc FROM documento WHERE id_doc='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$archivo="../../documentos/".$resultado['nombre_doc'];
		
		
		//eliminamos en cadena
		$qr_eliminar=mysql_query("DELETE FROM documento WHERE id_doc='$id'") or die(mysql_error());
		unlink($archivo);
		
		header("location:/admin/documento/");
	}
	
	function descargar_documento(){
		$id=$_POST['archivo'];
	/*Metodo para eliminar un usuario seleccionado */	
		$sql="SELECT * FROM documento WHERE id_doc='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$tipo=$resultado['tipo_doc'];
		$archivo = "../../documentos/".$resultado['nombre_doc'];

		$nombre = basename($archivo);   
		ini_set('session.cache_limiter', '');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		header("Content-Type:".$tipo);
		//header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"$nombre\"");
		
		readfile($archivo);
	}
	
	function descargar_documento_publico(){
		$id=$_GET['archivo'];
	/*Metodo para eliminar un usuario seleccionado */	
		$sql="SELECT * FROM documento WHERE id_doc='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$tipo=$resultado['tipo_doc'];
		$archivo = "documentos/".$resultado['nombre_doc'];
		if($tipo=="application/pdf"){
			header("location: $archivo");
			exit();
		}
		$nombre = basename($archivo);   
		ini_set('session.cache_limiter', '');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		header("Content-Type:".$tipo);
		//header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"$nombre\"");
		
		readfile($archivo);
	}
	
}
?>
<?php 
/*
 * ---------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 162)
 * Alejandro José Díaz Delgado. <contacto@diazcreativos.net.ve> escribió este archivo.
 * Mientras conserve
 * este comentario usted puede hacer lo que quiera con este material. Si alguna
 * vez nos encontramos
 * y piensa que este material le fue útil, usted puede invitarme una cerveza
 * en agradecimiento.
 * ----------------------------------------------------------------------------
*/
include_once("class.link.php");

class Banner extends Link{
	var $categoria;
	var $subcategoria;
	var $etiqueta;
	var $url;
	var $tipo;
	var $vinculo;
	var $efecto;
	var $mensaje;
	var $accion;
	var $listado;
	var $listado2;
	var $id;
	var $fotos;
	var $prioridad;
	
	function Banner(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->categoria=$_POST['categoria'];
		$this->subcategoria=$_POST['subcategoria'];
		$this->etiqueta=$_POST['etiqueta'];
		$this->vinculo=$_POST['vinculo'];
		$this->efecto=$_POST['efecto'];
		$this->prioridad=$_POST['prioridad'];
	}
	
	function listar_banner(){
		/* Metodo para listar las galerías y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if(isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM banner WHERE 
			(etiqueta_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			url_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			categoria_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			efecto_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			vinculo_ban LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_ban DESC";
		}else{
			
			$sql="SELECT * FROM banner GROUP BY id_ban DESC";
		}
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$resultado['categoria_ban']=$this->get_link2($resultado['categoria_ban']);
			if($resultado['subcategoria_ban']==1)
				$resultado['subcategoria_ban']="Ninguno";
			else
				$resultado['subcategoria_ban']=$this->get_sublink2($resultado['subcategoria_ban']);
			$this->mensaje="si";
			
			$this->listado[] = $resultado;
		}
	}
	
	function listar_banner_publica($id){
		/* Metodo para listar las galerías y sus opciones. */
		if(isset($_GET['sub'])&& $_GET['sub']!=""){
			$sub=$_GET['sub'];
			$restriccion="categoria_ban='$id' AND subcategoria_ban='$sub'";
		}else{
			$restriccion="categoria_ban='$id' AND subcategoria_ban=0";
		}
			$sql="SELECT * FROM banner WHERE $restriccion ORDER BY prioridad_ban ASC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_banner(){
		/*Metodo para mostrar una galería seleccionada */
		$this->accion="Detalles del Banner";
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM banner WHERE id_ban='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $_GET['id'];
			$this->categoria=$resultado['categoria_ban'];
			if($resultado['subcategoria_ban']==1)
				$this->subcategoria="Ninguno";
			else
				$this->subcategoria=$this->get_sublink2($resultado['subcategoria_ban']);
			$this->etiqueta=$resultado['etiqueta_ban'];
			$this->url=$resultado['url_ban'];
			$this->tipo=$resultado['tipo_ban'];
			$this->vinculo=$resultado['vinculo_ban'];
			$this->efecto=$resultado['efecto_ban'];
			$this->prioridad=$resultado['prioridad_ban'];
		} 
	}
	
	function insertar_banner(){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos del Nuevo Banner";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
				// si hay imagen.
				if (is_uploaded_file($_FILES['documento']['tmp_name'])) {	
					//revisamos que sea jpg
					if ($_FILES['documento']['type'] == "image/jpeg" || $_FILES['documento']['type'] == "image/pjpeg" || $_FILES['documento']['type'] == "image/png"){
						//nombre de la imagen
						if ($_FILES['documento']['size']>=1024000){
							$this->mensaje=1;
						}else{
							if($_FILES['documento']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['documento']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
							else if($_FILES['documento']['type'] == "image/png")
								$archivo = time().".png";
							
							$peso=$_FILES['documento']['size'];	
							$tipo=$_FILES['documento']['type'];
							//movemos la imagen.
							move_uploaded_file($_FILES['documento']['tmp_name'], "../../imagenes/banner/".$archivo);
							//consulta
							//$this->contenido=html_entity_decode($this->contenido);
							$consulta=mysql_query("INSERT INTO banner VALUES ('','$this->categoria', '$this->subcategoria', '$this->etiqueta', '$archivo', '$this->efecto', '$tipo', '$this->vinculo', '$this->prioridad')") or die(mysql_error());
				
							//retornamos
							header("location:/admin/banner/");
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
		$sql="SELECT * FROM link ORDER BY prioridad_cat ASC";
		$consulta=mysql_query($sql)or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}	
	}
	
	function editar_banner(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Banner";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
				if (is_uploaded_file($_FILES['documento']['tmp_name'])) {	
					//revisamos que sea jpg
					if ($_FILES['documento']['type'] == "image/jpeg" || $_FILES['documento']['type'] == "image/pjpeg" || $_FILES['documento']['type'] == "image/png"){
						//nombre de la imagen
						if ($_FILES['documento']['size']>=1024000){
							$this->mensaje=1;
						}else{
							if($_FILES['documento']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['documento']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
							else if($_FILES['documento']['type'] == "image/png")
								$archivo = time().".png";
								
							$tipo=$_FILES['documento']['type'];
							$peso=$_FILES['documento']['size'];
							//movemos la imagen.
							move_uploaded_file($_FILES['documento']['tmp_name'], "../../imagenes/banner/".$archivo);
							//buscar al que se va a remplazar
							$sql="SELECT url_ban FROM banner WHERE id_ban='$id'";
							$consulta=mysql_query($sql) or die(mysql_error());
							$resultado=mysql_fetch_array($consulta);
							$borrando="../../imagenes/banner/".$resultado['url_ban'];
							unlink($borrando);
							
							//guardamos el nuevo
							$this->contenido=html_entity_decode($this->contenido);
							$consulta=mysql_query("UPDATE banner SET categoria_ban='$this->categoria', subcategoria_ban='$this->subcategoria', prioridad_ban='$this->prioridad', etiqueta_ban='$this->etiqueta', url_ban='$archivo', efecto_ban='$this->efecto', tipo_ban='$tipo', vinculo_ban='$this->vinculo' WHERE id_ban='$id'") or die(mysql_error());
							//retornamos
							header("location:/admin/banner/");
							exit();
						}
					}else{
						$this->mensaje=2;
					}
				} else {
						$consulta=mysql_query("UPDATE banner SET categoria_ban='$this->categoria', subcategoria_ban='$this->subcategoria', prioridad_ban='$this->prioridad', etiqueta_ban='$this->etiqueta', efecto_ban='$this->efecto', vinculo_ban='$this->vinculo' WHERE id_ban='$id'") or die(mysql_error());
						//retornamos
						header("location:/admin/banner/");
						exit();
				}//fin file upload.
		}else{
		  $this->mostrar_banner();
		  $sql="SELECT * FROM link ORDER BY prioridad_cat ASC";
		  $consulta=mysql_query($sql);
		  while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
		  }
		  $id=$this->categoria;
		  $sql="SELECT * FROM linkxsub, sublink WHERE link_rel='$id' AND sublink_rel=id_sub ORDER BY prioridad_sub";
		  $buscar=mysql_query($sql);
		  unset($this->listado2);
		  while ($resultado2 = mysql_fetch_array($buscar)){
			    $this->mensaje="si";
			    $this->listado2[] = $resultado2;
		  }
		}
	}
	
	function eliminar_banner(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="SELECT url_ban FROM banner WHERE id_ban='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$archivo="../../imagenes/banner/".$resultado['url_ban'];
		
		
		//eliminamos en cadena
		$qr_eliminar=mysql_query("DELETE FROM banner WHERE id_ban='$id'") or die(mysql_error());
		unlink($archivo);
		
		header("location:/admin/banner/");
	}
}
?>
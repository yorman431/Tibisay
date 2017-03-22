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

class Certificado{
	var $categoria;
	var $nombre;
	var $tipo;
	var $descripcion;
	var $fecha;
	var $fondo;
	var $archivo;
	var $peso;
	var $id;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Certificado(){// Constructor
	}
	
	function convertir_fecha($CampoFecha){
		if(!empty($CampoFecha)){
			if(strpos($CampoFecha,"-")){
				$conv_fecha = split("-",$CampoFecha); $conv_fecha = $conv_fecha[2]."/".$conv_fecha[1]."/".$conv_fecha[0];
			}else{
				$conv_fecha = split("/",$CampoFecha); $conv_fecha = $conv_fecha[2]."-".$conv_fecha[1]."-".$conv_fecha[0];
			}
			return $conv_fecha;
		}
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->categoria=$_POST['categoria'];
		$this->nombre=$_POST['nombre'];
		$this->tipo=$_POST['tipo'];
		$this->descripcion=$_POST['descripcion'];
		$this->fecha=$_POST['fecha'];
	}
	
	function listar_certificado($tipo){
		/* Metodo para listar los certificados y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM certificado WHERE categoria_cer='$tipo' AND
			(nombre_cer LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_cer LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			descripcion_cer LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_cer LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_cer ASC";
		}else{
			$sql="SELECT * FROM certificado WHERE categoria_cer='$tipo' ORDER BY id_cer";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_cer']=$this->convertir_fecha($resultado['fecha_cer']);
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_certificado(){
		/*Metodo para mostrar un certificado seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM certificado WHERE id_cer='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_cer'];
			$this->categoria=$resultado['categoria_cer'];
			$this->nombre=$resultado['nombre_cer'];
			$this->tipo=$resultado['tipo_cer'];
			$this->descripcion=$resultado['descripcion_cer'];
			$this->fecha=$this->convertir_fecha($resultado['fecha_cer']);
			$this->fondo=$resultado['fondo_cer'];
			$this->archivo=$resultado['archivo_cer'];
			$this->peso=$resultado['peso_cer'];
		} 
	}
	
	function insertar_certificado(){
	/*Metodo para editar un certificado seleccionado */	
		$this->accion="Datos del Nuevo Certificado";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			// si hay imagen.
				if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {	
					//revisamos que sea jpg
			
					if ($_FILES['archivo']['type'] == "image/jpeg" || $_FILES['archivo']['type'] == "image/pjpeg" || $_FILES['archivo']['type'] == "image/png" || $_FILES['archivo']['type'] == "image/x-png"){
						//nombre de la imagen
						if ($_FILES['archivo']['size']>=2048000){
							$this->mensaje=1;
						}else{
							if($_FILES['archivo']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['archivo']['type'] == "image/png")
								$archivo = time().".png";
							else if($_FILES['archivo']['type'] == "image/x-png")
								$archivo = time().".png";
							else if($_FILES['archivo']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
							
							$peso=$_FILES['archivo']['size'];	
							$tipo=$_FILES['archivo']['type'];
							//movemos la imagen.
							move_uploaded_file($_FILES['archivo']['tmp_name'], "../../documentos/".$archivo);
					 	}
					}else{
						$this->mensaje=2;
					}
				}else{
					//imagen no se pudo subir o no seleccionaron.
					$peso=0;	
					$tipo="no definido";
					$archivo ="sinfondo.jpg";
				}//fin file upload.
				//consulta
				$this->descripcion=html_entity_decode($this->descripcion);
				$sql="INSERT INTO certificado VALUES ('', '$this->categoria', '$this->nombre', '$this->tipo', '$this->descripcion', '$this->fecha', '$archivo', '$tipo', '$peso')";
				$consulta=mysql_query($sql) or die(mysql_error());
				//retornamos a la lista
				if($this->categoria=="Certificado"){
					header("location:/admin/certificado/");
					exit();
				}else if($this->categoria=="Carnet"){
					header("location:/admin/carnet/");
					exit();
				}
		}			
	}
	
	function editar_certificado(){
	/*Metodo para editar un certificado seleccionado */		
		$this->accion="Editando Datos de Certificado";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {	
					//revisamos que sea jpg
					if ($_FILES['archivo']['type'] == "image/jpeg" || $_FILES['archivo']['type'] == "image/pjpeg" || $_FILES['archivo']['type'] == "image/png" || $_FILES['archivo']['type'] == "image/x-png"){
						//nombre de la imagen
						if ($_FILES['archivo']['size']>=2048000){
							$this->mensaje=1;
						}else{
							if($_FILES['archivo']['type'] == "image/jpeg")
								$archivo = time().".jpg";
							else if($_FILES['archivo']['type'] == "image/png")
								$archivo = time().".png";
							else if($_FILES['archivo']['type'] == "image/x-png")
								$archivo = time().".png";
							else if($_FILES['archivo']['type'] == "image/pjpeg")
								$archivo = time().".jpg";
								
							$tipo=$_FILES['archivo']['type'];
							$peso=$_FILES['archivo']['size'];
							//movemos la imagen.
							move_uploaded_file($_FILES['archivo']['tmp_name'], "../../documentos/".$archivo);
							//buscar al que se va a remplazar
							$sql="SELECT fondo_cer FROM certificado WHERE id_cer='$id'";
							$consulta=mysql_query($sql) or die(mysql_error());
							$resultado=mysql_fetch_array($consulta);
							$borrando="../../documentos/".$resultado['fondo_cer'];
							unlink($borrando);
							
							//guardamos el nuevo
							$this->fecha=$this->convertir_fecha($this->fecha);
							$this->descripcion=html_entity_decode($this->descripcion);
							$consulta=mysql_query("UPDATE certificado SET categoria_cer='$this->categoria', nombre_cer='$this->nombre', tipo_cer='$this->tipo', descripcion_cer='$this->descripcion', fecha_cer='$this->fecha', fondo_cer='$archivo', archivo_cer='$tipo', peso_cer='$peso' WHERE id_cer='$id'") or die(mysql_error());
							//retornamos
							if($this->categoria=="Certificado"){
								header("location:/admin/certificado/detalle.php?id=$id");
								exit();
							}else if($this->categoria=="Carnet"){
								header("location:/admin/carnet/detalle.php?id=$id");
								exit();
							}
						}
					}else{
						$this->mensaje=2;
					}
				} else {
						$this->fecha=$this->convertir_fecha($this->fecha);
						$this->descripcion=html_entity_decode($this->descripcion);
						$sql="UPDATE certificado SET categoria_cer='$this->categoria', nombre_cer='$this->nombre', tipo_cer='$this->tipo', descripcion_cer='$this->descripcion', fecha_cer='$this->fecha' WHERE id_cer='$id'";
						$consulta=mysql_query($sql) or die(mysql_error());
						if($this->categoria=="Certificado"){
							header("location:/admin/certificado/detalle.php?id=$id");
							exit();
						}else if($this->categoria=="Carnet"){
							header("location:/admin/carnet/detalle.php?id=$id");
							exit();
						}
				}//fin file upload.
				
		}else{
		  $this->mostrar_certificado();
		}
	}
	
	function eliminar_certificado($tipo){
	/*Metodo para eliminar un certificado seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM certificado WHERE id_cer='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM imagen WHERE galeria_image='$id'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		if($tipo=="Certificado"){
			header("location:/admin/certificado/");
			exit();
		}else if($tipo=="Carnet"){
			header("location:/admin/carnet/");
			exit();
		}
	}
	
	function borrar_fondo($cat){
	/*Metodo para eliminar un certificado seleccionado */	
		$id=$_GET['id'];
		$peso=0;	
		$tipo="no definido";
		$archivo ="sinfondo.jpg";
		$sql="SELECT fondo_cer FROM certificado WHERE id_cer='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$borrando="../../documentos/".$resultado['fondo_cer'];
		unlink($borrando);
		
		$sql="UPDATE certificado SET fondo_cer='$archivo', archivo_cer='$tipo', peso_cer='$peso' WHERE id_cer='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($cat=="Certificado"){
			header("location:/admin/certificado/detalle.php?id=$id");
			exit();
		}else if($cat=="Carnet"){
			header("location:/admin/carnet/detalle.php?id=$id");
			exit();
		}
	}
}
?>
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

class Facilidad{
	var $id;
	var $nombre;
	var $etiqueta;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Facilidad(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->etiqueta=$_POST['etiqueta'];
	}
	
	function listar_facilidad(){
		/* Metodo para listar las facilidades y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM facilidad WHERE
			(nombre_fac LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			etiqueta_fac LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_fac ASC";
		}else{
			$sql="SELECT * FROM facilidad ORDER BY id_fac";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_facilidad_imagen(){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT *, id_fac AS id_image, id_fac AS nombre_image FROM facilidad GROUP BY id_fac ORDER BY id_fac ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id_fac'];
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='facilidad' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
			$respuesta = mysql_fetch_array($imagenes);
			$resultado['directorio_image']=$respuesta['directorio_image'];
			$resultado['nombre_image']=$respuesta['nombre_image'];
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
		//print_r($this->listado);
	}
	
	function mostrar_facilidad(){
		/*Metodo para mostrar una facilidad seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM facilidad WHERE id_fac='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->nombre = $resultado['nombre_fac'];
			$this->etiqueta = $resultado['etiqueta_fac'];
			$this->id = $resultado['id_fac'];
			
		} 
	}
	
	function insertar_facilidad(){
	/*Metodo para editar una facilidad seleccionado */	
		$this->accion="Datos de la Nueva Facilidad";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
				$sql="SELECT * FROM facilidad WHERE nombre_fac='$this->nombre'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if($resultado=mysql_fetch_array($consulta)){
					$this->mensaje=1;
				}else{
					$sql="INSERT INTO facilidad VALUES ('', '$this->nombre', '$this->etiqueta')";
					$consulta=mysql_query($sql) or die(mysql_error());
					header("location:/admin/facilidad/");
				}	
		}
	}
	
	function editar_facilidad(){
	/*Metodo para editar una facilidad seleccionado */		
		$this->accion="Editando Datos de la Facilidad";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
				$sql="SELECT * FROM facilidad WHERE nombre_fac='$this->nombre' AND id_fac!='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if($resultado=mysql_fetch_array($consulta)){
					$this->mensaje=1;
				}else{
					$sql="UPDATE facilidad SET nombre_fac='$this->nombre', etiqueta_fac='$this->etiqueta' WHERE id_fac='$id'";
					$consulta=mysql_query($sql) or die(mysql_error());
					header("location:/admin/facilidad/");
				}
			
		}else{
		  $this->mostrar_facilidad();
		}
	}
	
	function eliminar_facilidad(){
	/*Metodo para eliminar una facilidad seleccionado */	
		$id=$_GET['id'];
		
		//Eliminamos las imagenes
		$sql="SELECT id_image, directorio_image, nombre_image FROM imagen WHERE galeria_image='$id' AND tabla_image='facilidad'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		while($resultado2=mysql_fetch_array($consulta2)){
			$directorio="../../imagenes/".$resultado2['directorio_image'];
			//eliminamos el registro de la imagen
			$id_imagen=$resultado2['id_image'];
			$sql="DELETE FROM imagen WHERE id_image='$id_imagen'";
			$qr_eliminar=mysql_query($sql) or die(mysql_error());
			//borramos la imagen del directorio
			unlink($directorio);
			if($resultado2['nombre_image']=="logo"){
				$directorio2="../../imagenes/".$this->modificar_url($resultado2['directorio_image']);
				unlink($directorio2);
			}
		}
		
		$sql="DELETE FROM facilidad WHERE id_fac='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/facilidad/");
	}
}
?>
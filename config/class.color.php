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

class Color{
	var $nombre;
	var $codigo;
	var $listado;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $accion;
	var $id;
	
	function Color(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->codigo=$_POST['codigo'];
	}
	
	function listar_color(){
		/* Metodo para listar los colores y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM color WHERE (nombre_color LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			codigo_color LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_color ASC";
		}else{
			$sql="SELECT * FROM color ORDER BY id_color";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_colores_producto(){
		/*Metodo para mostrar la categoria seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM colorxpro, color WHERE producto_cxp='$id' AND id_color=color_cxp ORDER BY id_color ASC";
			$consulta=mysql_query($sql) or die(mysql_error());
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function insertar_color(){
	/*Metodo para insertar un color seleccionado */	
		$this->accion="Insertar Muestra  de Color";
		if (isset($_POST['envio']) && $_POST['envio']=="Enviar"){
			$this->asignar_valores();
			$sql="INSERT INTO color VALUES ('', '$this->nombre', '$this->codigo')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/colores/");
		}			
	}
	
	function asignar_color(){
	/*Metodo para asignar un color seleccionado */	
		$this->accion="Asignar Muestra de Color";
		if (isset($_POST['envio']) && $_POST['envio']=="Enviar"){
			echo $_POST['color'];
			/* $sql="INSERT INTO color VALUES ('', '$this->nombre', '$this->codigo')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/producto/detalle.php?id={$id}"); */
			exit();
		}else{
			$this->listar_color();
		}
	}
	
	function eliminar_color(){
	/*Metodo para eliminar un color seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM color WHERE id_color='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/colores/");
	}
	
}
?>
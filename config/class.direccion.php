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

class Direccion{
	var $usuario;
	var $estado;
	var $municipio;
	var $direccion;
	var $postal;
	var $referencia;
	var $id;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Direccion(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->estado=$_POST['estado'];
		$this->municipio=$_POST['municipio'];
		$this->direccion=$_POST['direccion'];
		$this->postal=$_POST['postal'];
		$this->referencia=$_POST['referencia'];
	}
	
	function listar_direccion(){
		/* Metodo para listar las direcciones y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM direccion WHERE
			(direccion_dir LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			postal_dir LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			referencia_dir LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_ban ASC";
		}else{
			$sql="SELECT * FROM direccion ORDER BY id_dir";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_direccion_publico($usuario){
		/* Metodo para listar las direcciones y sus opciones. */
		$sql="SELECT * FROM direccion WHERE registro_dir='$usuario' ORDER BY id_dir";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['estado_dir']=$this->buscar_estado($resultado['estado_dir']);
			$resultado['municipio_dir']=$this->buscar_municipio($resultado['municipio_dir']);
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_direccion(){
		/*Metodo para mostrar una direcciones seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM direccion WHERE id_dir='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_dir'];
			$this->estado=$resultado['estado_dir'];
			$this->municipio=$resultado['municipio_dir'];
			$this->direccion=$resultado['direccion_dir'];
			$this->postal=$resultado['postal_dir'];
			$this->referencia=$resultado['referencia_dir'];
		}
	}
	
	function buscar_direccion($id){
		/*Metodo para mostrar una tarjeta seleccionada */
		$sql="SELECT * FROM direccion WHERE id_dir='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado = mysql_fetch_array($consulta)){
			$this->id = $resultado['id_dir'];
			$this->estado=$this->buscar_estado($resultado['estado_dir']);
			$this->municipio=$this->buscar_municipio($resultado['municipio_dir']);
			$this->direccion=$resultado['direccion_dir'];
			$this->postal=$resultado['postal_dir'];
			$this->referencia=$resultado['referencia_dir'];
		}
			return $this->estado.", ".$this->municipio.", ".$this->direccion.", CP: ".$this->postal." (".$this->referencia.")";
	}
	
	function insertar_direccion($id){
	/*Metodo para editar una direcciones seleccionada */	
		$this->accion="Datos de Nueva Direcci&oacute;n";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="INSERT INTO direccion VALUES ('', '$id', '$this->estado', '$this->municipio', '$this->direccion', '$this->postal', '$this->referencia', NOW())";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/direccion/");
		}			
	}
	
	function insertar_direccion_publico($id){
	/*Metodo para editar una direcciones seleccionada */	
		$this->accion="Datos de Nueva Direcci&oacute;n";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="INSERT INTO direccion VALUES ('', '$id', '$this->estado', '$this->municipio', '$this->direccion', '$this->postal', '$this->referencia', NOW())";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:registrar_direccion.php?msg=1");
			exit();
		}			
	}
	
	function editar_direccion(){
	/*Metodo para editar una direccion seleccionada */		
		$this->accion="Editando Datos de Direcci&oacute;n";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="UPDATE direccion SET estado_dir='$this->estado', municipio_dir='$this->municipio', direccion_dir='$this->direccion', postal_dir='$this->postal', referencia_dir='$this->referencia' WHERE id_dir='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:registrar_direccion.php?msg=2");
			exit();
			
		}else{
		  $this->mostrar_direccion();
		}
	}
	
	function editar_direccion_publico($usuario){
	/*Metodo para editar una direccion seleccionada */		
		$this->accion="Editando Datos de Direcci&oacute;n";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="UPDATE direccion SET estado_dir='$this->estado', municipio_dir='$this->municipio', direccion_dir='$this->direccion', postal_dir='$this->postal', referencia_dir='$this->referencia' WHERE id_dir='$id' AND registro_dir='$usuario'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:registrar_direccion.php?msg=2");
			exit();
			
		}else{
		  $this->mostrar_direccion();
		}
	}
	
	function eliminar_direccion(){
	/*Metodo para eliminar una direccion seleccionada */	
		$id=$_GET['id'];
		$sql="DELETE FROM direccion WHERE id_dir='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/direccion/");
	}
	
	function eliminar_direccion_publico($usuario){
	/*Metodo para eliminar una direccion seleccionada */	
		$id=$_GET['id'];
		$sql="DELETE FROM direccion WHERE id_dir='$id' AND registro_dir='$usuario'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:registrar_direccion.php?msg=3");
		exit();
	}
	
	function contar_direcciones($usuario){
	/*Metodo para contar las direcciones asociadas a un usuario */
		$sql="SELECT COUNT(*) AS total FROM direccion WHERE registro_dir='$usuario'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		return $resultado['total'];
	}
	
	function listar_estados(){
		/* Metodo para listar los estados y sus opciones. */
		$sql="SELECT * FROM estado ORDER BY id_est ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_municipios($id){
		/* Metodo para listar los municipio y sus opciones. */
		$sql="SELECT * FROM municipio WHERE estado_mun='$id' ORDER BY nombre_mun ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado2[] = $resultado;
		}
	}
	
	function buscar_estado($id){
	/*Metodo para obtener el nombre de un estado */	
		$sql="SELECT nombre_est FROM estado WHERE id_est='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_est'];
	}
	
	function buscar_municipio($id){
	/*Metodo para obtener el nombre de un estado */	
		$sql="SELECT nombre_mun FROM municipio WHERE id_mun='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_mun'];
	}
	
}
?>
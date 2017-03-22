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

class Historial{
	var $tabla;
	var $pertenece;
	var $asunto;
	var $descripcion;
	var $fecha;
	var $hora;
	var $fechamod;
	
	var $nivel;
	var $tipo;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Historial(){// Constructor 
	}
	
	function convertir_fecha($CampoFecha){
		if(!empty($CampoFecha)){
			if(strpos($CampoFecha,"-")){
				$conv_fecha = explode("-",$CampoFecha); $conv_fecha = $conv_fecha[2]."/".$conv_fecha[1]."/".$conv_fecha[0];
			}else{
				$conv_fecha = explode("/",$CampoFecha); $conv_fecha = $conv_fecha[2]."-".$conv_fecha[1]."-".$conv_fecha[0];
			}
			return $conv_fecha;
		}
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->tabla=$_POST['tabla'];
		$this->pertenece=$_POST['pertenece'];
		$this->asunto=$_POST['asunto'];
		$this->descripcion=$_POST['contenido'];
		$this->fecha=$_POST['fecha'];
		$this->hora=$_POST['hora'];
		$this->fechamod=$_POST['fechamod'];
	}
	
	function listar_historial(){
		/* Metodo para listar las  notas de seguimiento y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		
		$sql="SELECT * FROM historial ORDER BY id_his";
		
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_historial_pedido($id){
		/* Metodo para listar las  notas de seguimiento y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		
		$sql="SELECT * FROM historial WHERE pertenece_his='$id' ORDER BY id_his ASC";
		
		$consulta=mysql_query($sql);
		$num=1;
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['numero']=$num++;
			$resultado['fecha_his']=$this->convertir_fecha($resultado['fecha_his']);
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_historial(){
		/*Metodo para mostrar una nota de seguimiento ampliada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM historial WHERE id_his='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->tabla = $resultado['tabla_his'];
			$this->pertenece = $resultado['pertenece_his'];
			$this->asunto = $resultado['asunto_his'];
			$this->descripcion = $resultado['descripcion_his'];
			$this->fecha = $resultado['fecha_his'];
			$this->hora = $resultado['hora_his'];
			$this->fechamod= $resultado['fechamod_his'];
			
		} 
	}
	
	function insertar_historial($id){
	/*Metodo para insertar una nota de seguimiento seleccionada */
		$this->accion="Descripci&oacute; de Nota de Seguimiento";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha = $this->convertir_fecha($this->fecha);
			$sql="INSERT INTO historial VALUES ('', '$this->tabla', '$this->pertenece', '$this->asunto', '$this->descripcion', '$this->fecha', '$this->hora', NOW())";
			
			//echo $sql;
			
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/$this->tabla/editar.php?id=$id");
		}
			
	}
	
	function editar_historial($back){
	/*Metodo para editar una nota de seguimiento seleccionada */
		$this->accion="Editar de Nota de Seguimiento";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			
			$sql="UPDATE historial SET asunto_his='$this->asunto', descripcion_his='$this->descripcion' WHERE id_hiso='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/$this->tabla/editar.php?id=$back");
				
		}else{
		  $this->mostrar_historial();
		}
	}
	
	function eliminar_historial(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id']; $tabla=$_GET['tabla']; $back=$_GET['back']; 
		$sql="DELETE FROM historial WHERE id_his='$id' AND tabla_his='$tabla'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/$tabla/editar.php?id=$back");
	}
}
?>
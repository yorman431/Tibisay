<?php
class Operador{
	var $id;
	var $cantidad;
	var $fecha;
	var $nombre;
	var $apellido;
	var $cedula;
	var $correo;
	var $mensaje;
	var $listado;
	
	function Operador(){// Constructor
	}
	
	
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		//$this->ciudad=$_SESSION['ciudad_admin'];
		$this->nombre=$_POST['nombre'];
		$this->apellido=$_POST['apellido'];
		$this->cantidad=$_POST['cantidad'];
		$this->cedula=$_POST['cedula'];
		$this->correo=$_POST['correo'];
	}
	
	function listar_operador(){
		$sql="SELECT * FROM operador";	
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_op']=$this->convertir_fecha2($resultado['fecha_op']);
			$this->listado[]=$resultado;
		}
		
		
	}
	
	function convertir_fecha($CampoFecha){
		if(!empty($CampoFecha)){
			if(strpos($CampoFecha,"-")){
				$conv_fecha = explode("-",$CampoFecha);$conv_fecha = $conv_fecha[2]."/".$conv_fecha[1]."/".$conv_fecha[0];
			}else{
				$conv_fecha =explode("/",$CampoFecha); $conv_fecha = $conv_fecha[2]."-".$conv_fecha[1]."-".$conv_fecha[0];
			}
			return $conv_fecha;
		}
	}
	function convertir_fecha2($CampoFecha){
		 if(!empty($CampoFecha)){
			$i=strpos($CampoFecha," ");
			$hora=substr($CampoFecha,$i, $CampoFecha);
			$fecha=substr($CampoFecha,0,$i);
			return $this->convertir_fecha($fecha)." ".$hora;
			 
		 }
	}
	
	function insertar_operador(){
		if($_POST){
			$cedula=$_POST['cedula'];
			$sql="SELECT * FROM operador WHERE cedula_op='$cedula'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			if($resultado != null){
			$this->mensaje="no";	
			}else{
			$this->mensaje="si";	
				$this->asignar_valores();
				$sql="INSERT INTO operador VALUES('0',CURRENT_TIMESTAMP,'$this->nombre','$this->apellido','$this->cedula','$this->correo','')";
				$consulta=mysql_query($sql) or die(mysql_error());
				header('location:/admin/operador/');	
			}	
		}
	}
	function detalle_operador(){
		$id=$_GET['id'];
		$sql="SELECT * FROM operador WHERE id_op='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		//$this->fecha=$this->convertir_fecha($this->fecha);
		$this->listado[] = mysql_fetch_array($consulta);	
		
	}
	function eliminar_operador(){
		$id=$_GET['id'];
		$sql="DELETE FROM operador WHERE id_op='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/operador/");	
	}
	
	function editar_operador(){
		
		/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Operador";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="UPDATE operador SET cantidad_op='$this->cantidad', nombre_op='$this->nombre', apellido_op='$this->apellido', cedula_op='$this->cedula' WHERE id_op='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/operador/");
		}else{
			
			$this->mostrar_operador();
			
		}
		
	}
	
	function mostrar_operador(){
		/*Metodo para mostrar un usuario seleccionado */
			$id=$_GET['id'];
			$sql="SELECT * FROM operador WHERE id_op='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_op'];
			$this->apellido=$resultado['apellido_op'];
			$this->cedula=$resultado['cedula_op'];
			$this->correo=$resultado['correo_op'];
			$this->cantidad=$resultado['cantidad_op'];
			$this->fecha=$resultado['fecha_op'];		
}
}
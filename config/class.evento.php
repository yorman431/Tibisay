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

class Evento{
	var $nombre;
	var $categoria;
	var $fecha;
	var $hasta;
	var $hora;
	var $latitud;
	var $longitud;
	var $mytwitter;
	var $myfacebook;
	var $descripcion;
	var $buscar;
	var $mensaje;
	var $accion;
	var $combo;
	var $etiqueta;
	var $listado;
	var $id;
	var $fotos;
	var $principal;
	var $dias;
	var $vistas;
	
	function Evento(){// Constructor
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
		$this->nombre=$_POST['nombre'];
		$this->categoria=$_POST['categoria'];
		$this->fecha=$_POST['fecha'];
		$this->hasta=$_POST['hasta'];
		$this->descripcion=$_POST['descripcion'];
	}
	
	function listar_evento(){
		/* Metodo para listar los eventos y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if(isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM evento WHERE 
			(nombre_eve LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			categoria_eve LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_eve LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			hasta_eve LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			descripcion_eve LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY fecha_eve DESC";
		}else{
			
			$sql="SELECT *, COUNT( * ) AS fotos FROM evento GROUP BY id_eve ORDER BY fecha_eve DESC";
		}
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_eve']=$this->convertir_fecha($resultado['fecha_eve']);
			$resultado['hasta_eve']=$this->convertir_fecha($resultado['hasta_eve']);
			$sql="SELECT COUNT(id_image) AS fotos FROM imagen WHERE galeria_image=".$resultado['id_eve']." AND tabla_image='evento'";
			$contar=mysql_query($sql) or die(mysql_error());
			$numero=mysql_fetch_array($contar);
			$resultado['fotos']=$numero['fotos'];
			$resultado['descripcion_eve']=strip_tags($resultado['descripcion_eve']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_evento2($valor){
		/* Metodo para listar los eventos y sus opciones. */
		date_default_timezone_set('America/Caracas');
		$fecha_actual=date("Y-m-d");
		if($valor=="Anterior"){
			$condicion="fecha_eve<'$fecha_actual'";
			$orden="DESC";
		}else if($valor=="Proximo"){
			$condicion="fecha_eve>='$fecha_actual'";
			$orden="ASC";
		}
		$sql="SELECT * FROM evento, imagen WHERE id_eve=galeria_image AND tabla_image='evento' AND $condicion GROUP BY id_eve ORDER BY fecha_eve $orden";
		
		$sql2="SELECT * FROM evento, imagen WHERE id_eve=galeria_image AND tabla_image='evento' GROUP BY id_eve ORDER BY fecha_eve DESC LIMIT 0, 10";
		
		$this->mensaje="";
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_eve']=$this->convertir_fecha($resultado['fecha_eve']);
			$resultado['hasta_eve']=$this->convertir_fecha($resultado['hasta_eve']);
			$resultado['descripcion_eve']=strip_tags($resultado['descripcion_eve']);
			$this->listado[] = $resultado;
		}
		
		if($this->mensaje==""){
			$consulta=mysql_query($sql2) or die(mysql_error());
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$resultado['fecha_eve']=$this->convertir_fecha($resultado['fecha_eve']);
				$resultado['hasta_eve']=$this->convertir_fecha($resultado['hasta_eve']);
				$resultado['descripcion_eve']=strip_tags($resultado['descripcion_eve']);
				$this->listado[] = $resultado;
			}
		}
	}
	
	function buscar_evento($fecha_buscar){
		/* Metodo para listar los eventos y sus opciones. */
		if($fecha_buscar!=""){
			$condicion="('".$fecha_buscar."' BETWEEN fecha_eve AND hasta_eve)";
			$orden="ASC";
		}
		
		$sql="SELECT * FROM evento, imagen WHERE id_eve=galeria_image AND tabla_image='evento' AND $condicion GROUP BY id_eve ORDER BY fecha_eve $orden";
		
		//echo $sql;
		
		$this->mensaje="";
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_eve']=$this->convertir_fecha($resultado['fecha_eve']);
			$resultado['hasta_eve']=$this->convertir_fecha($resultado['hasta_eve']);
			$resultado['descripcion_eve']=strip_tags($resultado['descripcion_eve']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_evento_publica(){
		/* Metodo para listar los eventos y sus opciones. */
		date_default_timezone_set('America/Caracas');
		$fecha_actual=date("Y-m-d");
		$sql="SELECT * FROM evento, imagen WHERE id_eve=galeria_image AND tabla_image='evento' GROUP BY id_eve ORDER BY fecha_eve DESC LIMIT 0 , 3";
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_eve']=$this->convertir_fecha($resultado['fecha_eve']);
			$resultado['hasta_eve']=$this->convertir_fecha($resultado['hasta_eve']);
			$resultado['descripcion_eve']=strip_tags($resultado['descripcion_eve']);
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_evento(){
		/*Metodo para mostrar un evento seleccionado*/
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM evento WHERE id_eve='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id = $_GET['id'];
			$this->nombre = $resultado['nombre_eve'];
			$this->categoria = $resultado['categoria_eve'];
			$this->fecha = $this->convertir_fecha($resultado['fecha_eve']);
			$this->hasta = $this->convertir_fecha($resultado['hasta_eve']);
			$this->descripcion = $resultado['descripcion_eve'];
		} 
	}
	
	function ultimo_evento(){
		/*Metodo para mostrar un evento seleccionado*/
			$sql="SELECT * FROM evento GROUP BY id_eve ORDER BY id_eve DESC LIMIT 0 , 1";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_eve'];
			$this->nombre = $resultado['nombre_eve'];
			$this->descripcion = $resultado['descripcion_eve'];
			$sql="SELECT * FROM imagen WHERE galeria_image='$this->id' AND tabla_image='evento' ORDER BY id_image LIMIT 0 , 2";
			$consulta=mysql_query($sql) or die(mysql_error());
			while($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$resultado['fecha_eve']=$this->convertir_fecha($resultado['fecha_eve']);
				$resultado['hasta_eve']=$this->convertir_fecha($resultado['hasta_eve']);
				$this->listado[] = $resultado;
			}
	}
	
	function insertar_evento(){
	/*Metodo para insertar un evento seleccionado */	
		$this->accion="Datos del Nuevo Evento";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			//$this->descripcion=html_entity_decode($this->descripcion);
			$this->fecha = $this->convertir_fecha($this->fecha);
			$this->hasta = $this->convertir_fecha($this->hasta);
			$sql="INSERT INTO evento VALUES ('','$this->categoria', '$this->nombre', '$this->fecha', '$this->hasta', '$this->descripcion')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/evento/");
		}			
	}
	
	function editar_evento(){
	/*Metodo para editar un evento seleccionado */		
		$this->accion="Editando Datos del Evento";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			//$this->descripcion=html_entity_decode($this->descripcion);
			$this->fecha = $this->convertir_fecha($this->fecha);
			$this->hasta = $this->convertir_fecha($this->hasta);
			$sql="UPDATE evento SET categoria_eve='$this->categoria', nombre_eve='$this->nombre', fecha_eve='$this->fecha', hasta_eve='$this->hasta', descripcion_eve='$this->descripcion' WHERE id_eve='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/evento/");
		}else{
		  $this->mostrar_evento();
		}
	}
	
	function eliminar_evento(){
	/*Metodo para eliminar un evento seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM evento WHERE id_eve='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM imagen WHERE galeria_image='$id' AND tabla_image='evento'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/evento/");
	}
	
	function buscar_fechas(){
	 //Buscar fechas activas para el calendario dinamico
	 	$sql="SELECT fecha_eve, hasta_eve FROM evento GROUP BY id_eve ORDER BY fecha_eve ASC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		$fechas[]="";
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$fecha1=$resultado['fecha_eve'];
			$fecha2=$resultado['hasta_eve'];
			while ($fecha1 <= $fecha2){
				//echo "Rango: ".$fecha1."<br>";
				$swiche=false;
				foreach($fechas as $valor => $indice){
					if($fechas[$valor]==$fecha1) $swiche=true;
				}
				if($swiche==false) $fechas[]=$fecha1;
				$fecha1=date("Y-m-d", strtotime("$fecha1 +1 day"));
			}
		}
		//print_r($fechas);echo "<br />";
		$acumulamos="<script type='text/javascript'> var ENABLED_DATES = {";
		foreach($fechas as $valor => $indice){
			if(isset($fechas[$valor]) && $fechas[$valor]!=""){
				$temp=$fechas[$valor];
				$temp2=explode("-", $temp);
				if($valor>1) $acumulamos.=", ";
				$acumulamos.=$temp2[0].$temp2[1].$temp2[2];
				$acumulamos.=": true";
			}
		}
		$acumulamos.="};</script>";
		//$this->buscar_dias_semana();
		return $acumulamos;
	 }
}
?>
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

class Encuesta{
	var $nombre;
	var $contenido;
	var $orden;
	var $fecha;
	var $observacion;
	var $estado;
	var $id;
	var $pregunta;
	var $listado;
	var $listado2;
	var $buscar;
	var $mensaje;
	var $accion;
	var $titulo;
	
	function Encuesta(){// Constructor
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
		$this->observacion=$_POST['contenido'];
		$this->estado=$_POST['estado'];
		$this->fecha=$_POST['fecha'];
	}
	
	function asignar_valores2(){
		/* Metodo para recibir valores del exterior. */
		$this->orden=$_POST['orden'];
		$this->contenido=$_POST['contenido'];
	}
	
	function listar_encuesta(){
		/* Metodo para listar los encuesta y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM encuesta WHERE
			(nombre_enc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			observacion_enc LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			estado_enc LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_enc ASC";
		}else{
			$sql="SELECT * FROM encuesta ORDER BY id_enc";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_enc']=$this->convertir_fecha($resultado['fecha_enc']);
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_encuesta(){
		/*Metodo para mostrar un encuesta seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM encuesta WHERE id_enc='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_enc'];
			$this->nombre = $resultado['nombre_enc'];
			$this->fecha = $this->convertir_fecha($resultado['fecha_enc']);
			$this->observacion = $resultado['observacion_enc'];
			$this->estado = $resultado['estado_enc'];
		} 
	}
	
	function mostrar_pregunta(){
		/*Metodo para mostrar un encuesta seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM pregunta WHERE id_pre='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_pre'];
			$this->contenido = $resultado['contenido_pre'];
			$this->orden = $resultado['orden_pre'];
		} 
	}
	
	function insertar_encuesta(){
	/*Metodo para editar un encuesta seleccionado */	
		$this->accion="Datos de la Nueva Encuesta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha=date("Y-m-d");
			$this->estado="inactivo";
			$sql="INSERT INTO encuesta VALUES ('', '$this->nombre', '$this->observacion', '$this->fecha','$this->estado')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/encuesta/");
			exit();	
		}
	}
	
	function insertar_pregunta($id){
	/*Metodo para editar un encuesta seleccionado */	
		$this->accion="Insertar Pregunta Nueva";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores2();
			$this->fecha=date("Y-m-d");
			$sql="INSERT INTO pregunta VALUES ('', '$id', '$this->orden', '$this->contenido')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/encuesta/detalle.php?id=$id");
			exit();	
		}
	}
	
	function insertar_opcion($id, $back){
	/*Metodo para editar un encuesta seleccionado */	
		$this->accion="Insertar Opci&oacute;n Nueva";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores2();
			$this->fecha=date("Y-m-d");
			$sql="INSERT INTO opciones VALUES ('', '$id', '$this->contenido', '0')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/encuesta/detalle.php?id=$back");
			exit();
		}
	}
	
	function editar_encuesta(){
	/*Metodo para editar un encuesta seleccionado */		
		$this->accion="Editando Datos de la Encuesta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->fecha=date("Y-m-d");
			$sql="UPDATE encuesta SET nombre_enc='$this->nombre', observacion_enc='$this->observacion', fecha_enc='$this->fecha', estado_enc='$this->estado' WHERE id_enc='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/encuesta/");
			exit();
		}else{
		  $this->mostrar_encuesta();
		}
	}
	
	function editar_pregunta(){
	/*Metodo para editar un encuesta seleccionado */
		$id=$_GET['id'];
		$back=$_GET['back'];		
		$this->accion="Editando Pregunta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores2();
			$this->fecha=date("Y-m-d");
			$sql="UPDATE pregunta SET orden_pre='$this->orden', contenido_pre='$this->contenido' WHERE id_pre='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/encuesta/detalle.php?id=$back");
			exit();
		}else{
		  $this->mostrar_pregunta();
		}
	}
	
	function eliminar_encuesta(){
	/*Metodo para eliminar una encuesta seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM encuesta WHERE id_enc='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/encuesta/");
		exit();
	}
	
	function eliminar_pregunta(){
	/*Metodo para eliminar una encuesta seleccionado */	
		$id=$_GET['id'];
		$back=$_GET['back'];
		$sql="DELETE FROM pregunta WHERE id_pre='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/encuesta/detalle.php?id=$back");
		exit();
	}
	
	function eliminar_opcion(){
	/*Metodo para eliminar una encuesta seleccionado */	
		$id=$_GET['id'];
		$back=$_GET['back'];
		$sql="DELETE FROM opciones WHERE id_opc='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/encuesta/detalle.php?id=$back");
		exit();
	}
	
	function publicar_encuesta(){
		/*Metodo para mostrar una encuesta con sus preguntas y respuestas */
		$sql="SELECT *, id_enc AS preguntas FROM encuesta WHERE estado_enc='activo'";
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->id = $resultado['id_enc'];
			$sql2="SELECT *, id_pre AS respuestas FROM pregunta WHERE encuesta_pre='$this->id' ORDER BY orden_pre";
			$consulta2=mysql_query($sql2);
			$lista="";
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$this->mensaje="si";
				$pregunta=$resultado2['id_pre'];
				$sql3="SELECT * FROM opciones WHERE pregunta_opc='$pregunta'";
				$consulta3=mysql_query($sql3);
				$lista2="";
				while ($resultado3 = mysql_fetch_array($consulta3)){
					$this->mensaje="si";
					$lista2[]= $resultado3;
				}
				$resultado2['respuestas']=$lista2;
				$lista[] = $resultado2;
			}
			$resultado['preguntas']=$lista;
			$this->listado[] = $resultado;
		}
	}
	
	function publicar_encuesta2($id){
		/*Metodo para mostrar una encuesta con sus preguntas y respuestas */
		$sql="SELECT *, id_enc AS preguntas FROM encuesta WHERE id_enc='$id'";
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->id = $resultado['id_enc'];
			$sql2="SELECT *, id_pre AS respuestas FROM pregunta WHERE encuesta_pre='$this->id' ORDER BY orden_pre";
			$consulta2=mysql_query($sql2);
			$lista="";
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$this->mensaje="si";
				$pregunta=$resultado2['id_pre'];
				$sql3="SELECT * FROM opciones WHERE pregunta_opc='$pregunta'";
				$consulta3=mysql_query($sql3);
				$lista2="";
				while ($resultado3 = mysql_fetch_array($consulta3)){
					$this->mensaje="si";
					$lista2[]= $resultado3;
				}
				$resultado2['respuestas']=$lista2;
				$lista[] = $resultado2;
			}
			$resultado['preguntas']=$lista;
			$this->listado[] = $resultado;
		}
	}
	
	function calcular_encuesta(){
	/*Metodo para sumar una encuesta seleccionado */
		session_start();
		//print_r($_POST);
		if(!isset($_SESSION['voto']) || $_SESSION['voto']!=""){
			
			foreach($_POST as $valor => $indice){
				if($_POST[$valor]!=""){
					$id=$_POST[$valor];
					$sql="UPDATE opciones SET voto_opc=voto_opc+1 WHERE id_opc='$id'";
					$consulta=mysql_query($sql) or die(mysql_error());
					//Comparamos a ver si hay rrespuestas Personalizada
					$sql2="SELECT * FROM opciones WHERE id_opc='$id'";
					$consulta2=mysql_query($sql2) or die(mysql_error());
					$resultado=mysql_fetch_array($consulta2);
					if($resultado['opcion_opc']=="Otro"){
						$id_otro=$resultado['id_opc'];
						$temp="opcion".$resultado['id_opc'];
						//echo $temp;
						$valor=$_POST[$temp];
						//buscamos Similitudes en las personalizadas
						$sql3="SELECT * FROM otro WHERE etiqueta_otro='$valor'";
						$consulta3=mysql_query($sql3) or die(mysql_error());
						if($resultado2=mysql_fetch_array($consulta3)){
							$id_temp=$resultado2['id_otro'];
							$sql4="UPDATE otro SET voto_otro=voto_otro+1 WHERE id_otro='$id_temp'";
						}else{
							$sql4="INSERT INTO otro VALUES ('', '$valor', '$id_otro', '1')";
						}
						$consulta4=mysql_query($sql4) or die(mysql_error());
					}
						
				}
			}
			
			$_SESSION['voto']="si";
			$this->mensaje=1;
			
		}
	}
	
	function cargar_opciones($id){
	/*Metodo para sumar una encuesta seleccionado */	
		$sql="SELECT * FROM opciones WHERE pregunta_opc='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado2[] = $resultado;
		}
	} 
	
	function resultado_encuesta($encuesta, $id){
		/*Metodo para cargar el resultado de encuestas */
		$this->listado=""; $this->listado2="";
		$sql2="SELECT * FROM pregunta WHERE encuesta_pre='$encuesta' AND id_pre='$id'";
		$consulta2=mysql_query($sql2) or die(mysql_error());
		$resultado2 = mysql_fetch_array($consulta2);
		$this->titulo=$resultado2['contenido_pre'];
		$id_pre=$resultado2['id_pre'];
		$this->cargar_opciones($id_pre);
		foreach($this->listado2 as $valor => $indice){
			$num=$this->listado2[$valor]['voto_opc'];
			$this->listado[]=$num;
		}
	}
	
	function cargar_preguntas($id){
	/*Metodo para sumar una encuesta seleccionado */	
		$sql="SELECT * FROM pregunta WHERE encuesta_pre='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	} 
}
?>
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

class Pregunta{
	var $pregunta;
	var $respuesta;
	var $id;
	var $listado;
	var $listado2;
	var $listado3;
	var $listado4;
	var $buscar;
	var $mensaje;
	var $existe;
	var $accion;
	
	function Pregunta(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->pregunta=$_POST['pregunta'];
		$this->cuenta=$_POST['cuenta'];
		$this->numero=$_POST['numero'];
		$this->titular=$_POST['titular'];
		$this->rif=$_POST['rif'];
	}
	
	function listar_preguntas(){
		/* Metodo para listar las pregunta y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM preguntas WHERE
			(pregunta_pre LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_pre ASC";
		}else{
			$sql="SELECT * FROM preguntas ORDER BY pregunta_pre";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_pregunta_usuario($id){
		/* Metodo para listar las pregunta y sus opciones. */
		$sql="SELECT * FROM preguntas, respuestas WHERE id_pre=pregunta_res AND registro_res='$id' ORDER BY id_pre, pregunta_pre";
		$this->listado=""; $this->listado2=""; $this->listado3=""; $this->listado4="";
		$this->existe="no";
		$consulta=mysql_query($sql) or die(mysql_error());
		if(!$resultado = mysql_fetch_array($consulta)){
			$sql="SELECT * FROM preguntas ORDER BY id_pre, pregunta_pre";
			$consulta=mysql_query($sql) or die(mysql_error());
			$temp=1;
			$num=0;
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si"; 
				if($temp<=5)
					$this->listado[] = $resultado;
				if($temp>5 && $temp<=10)
					$this->listado2[] = $resultado;
				if($temp>10 && $temp<=15)
					$this->listado3[] = $resultado;
				if($temp>15 && $temp<=20)
					$this->listado4[] = $resultado;
				$temp++;
			}
		}else{
			$this->existe="si";
			do{
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}while ($resultado = mysql_fetch_array($consulta));
		}
		
		//print_r($this->listado); echo "<br /><br />"; print_r($this->listado2); echo "<br /><br />"; print_r($this->listado3); echo "<br /><br />"; print_r($this->listado4); echo "<br /><br />";
	}
	
	function mostrar_pregunta(){
		/*Metodo para mostrar una pregunta seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM pregunta WHERE id_pre='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_pre'];
			$this->pregunta = $resultado['pregunta_pre'];
		} 
	}
	
	function insertar_pregunta(){
	/*Metodo para editar una pregunta seleccionado */	
		$this->accion="Datos de la Pregunta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="SELECT * FROM pregunta WHERE pregunta_pre='$this->pregunta'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="INSERT INTO pregunta VALUES ('', '$this->pregunta')";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/pregunta/");
			}
		}			
	}
	
	function editar_pregunta(){
	/*Metodo para editar una pregunta seleccionado */		
		$this->accion="Editando Pregunta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="SELECT * FROM pregunta WHERE pregunta_pre='$this->pregunta' AND id_pre!='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="UPDATE pregunta SET pregunta_pre='$this->pregunta' WHERE id_pre='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/pregunta/");
			}
		}else{
		  $this->mostrar_pregunta();
		}
	}
	
	function eliminar_pregunta(){
	/*Metodo para eliminar una pregunta seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM pregunta WHERE id_pre='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/pregunta/");
	}
	
	function verificar_respuestas($id, $variable){
	/*Metodo para verificar las respuestas de cada pregunta */
		if(isset($_POST['respuesta1']) && $_POST['respuesta1']!=""){
			$respuesta['respuesta1']=$_POST['respuesta1'];
		}else{
			header("location:/preguntas_seguridad.php?msg=1");
			exit();
		}
		
		if(isset($_POST['respuesta2']) && $_POST['respuesta2']!=""){
			$respuesta['respuesta2']=$_POST['respuesta2'];
		}else{
			header("location:/preguntas_seguridad.php?msg=1");
			exit();
		}
		
		if(isset($_POST['respuesta3']) && $_POST['respuesta3']!=""){
			$respuesta['respuesta3']=$_POST['respuesta3'];
		}else{
			header("location:/preguntas_seguridad.php?msg=1");
			exit();
		}
		
		if(isset($_POST['respuesta4']) && $_POST['respuesta4']!=""){
			$respuesta['respuesta4']=$_POST['respuesta4'];
		}else{
			header("location:/preguntas_seguridad.php?msg=1");
			exit();
		}
		
		$evaluacion="si";
		
		foreach($respuesta as $valor => $indice){
			$temp=$respuesta[$valor];	
			$sql="SELECT * FROM preguntas, respuestas WHERE id_pre=pregunta_res AND registro_res='$id' AND respuesta_res='$temp' ORDER BY id_pre, pregunta_pre";
			//echo $sql."<br />";
			$consulta=mysql_query($sql) or die(mysql_error());
			if(!$resultado=mysql_fetch_array($consulta)){
				$evaluacion="no";
				//echo "mosca entro";
			}else{
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		}
		
		//echo "evaluacion: ".$evaluacion;
		if($evaluacion=="si"){
			$_SESSION[$variable]="si";
			$id=$_SESSION['id_temporal']; $ip=$_SERVER['REMOTE_ADDR'];
			$sql="INSERT INTO ipusuario VALUES ('', '$id', '$ip', NOW())";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			$volver=$_SESSION['volver']."?v=ok"; 
			//echo "Para Volver:".$_SESSION['volver'];
			header("location: $volver");
			exit();
		}else{
			$_SESSION['$variable']="no";
			header("location: ".$_SERVER['PHP_SELF']."?msg=1");
			exit();
		}
	}
	
	function guardar_respuestas($id){
	/*Metodo para verificar las respuestas de cada pregunta */
		if(isset($_POST['respuesta1']) && $_POST['respuesta1']!="")
			$respuesta['respuesta1']=$_POST['respuesta1'];
		if(isset($_POST['respuesta2']) && $_POST['respuesta2']!="")
			$respuesta['respuesta2']=$_POST['respuesta2'];
		if(isset($_POST['respuesta3']) && $_POST['respuesta3']!="")
			$respuesta['respuesta3']=$_POST['respuesta3'];
		if(isset($_POST['respuesta4']) && $_POST['respuesta4']!="")
			$respuesta['respuesta4']=$_POST['respuesta4'];
			
		if(isset($_POST['categoria1']) && $_POST['categoria1']!="")
			$preguntas['categoria1']=$_POST['categoria1'];
		if(isset($_POST['categoria2']) && $_POST['categoria2']!="")
			$preguntas['categoria2']=$_POST['categoria2'];
		if(isset($_POST['categoria3']) && $_POST['categoria3']!="")
			$preguntas['categoria3']=$_POST['categoria3'];
		if(isset($_POST['categoria4']) && $_POST['categoria4']!="")
			$preguntas['categoria4']=$_POST['categoria4'];
		
		$evaluacion="si";
		$i=1;
		
		foreach($respuesta as $valor => $indice){
			$temp=$respuesta[$valor]; $temp2=$preguntas["categoria".$i];
		    //echo "Respuesta: ".$temp." - Pregunta: ".$temp2." - ".$indice."<br /><br />";
			$sql="INSERT INTO respuestas VALUES ('', '$temp2', '$id', '$temp')";
			$consulta=mysql_query($sql) or die(mysql_error());
			$i++;
		}
		$_SESSION['preguntas']="si";
		$id=$_SESSION['id_temporal']; $ip=$_SERVER['REMOTE_ADDR'];
		$sql="INSERT INTO ipusuario VALUES ('', '$id', '$ip', NOW())";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location: ".$_SESSION['volver']);
		exit();
	}
}
?>
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

class Mapa{
	var $contenido;
	var $latitud;
	var $longitud;
	var $buscar;
	var $mensaje;
	var $accion;
	var $etiqueta;
	var $listado;
	var $id;
	
	function Mapa(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->contenido=$_POST['contenido'];
		$this->latitud=$_POST['latitud'];
		$this->longitud=$_POST['longitud'];
	}
	
	function listar_mapa(){
		/* Metodo para listar las galerías y sus opciones. */
		$sql="SELECT * FROM mapa ORDER BY id_map";
		
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$sql="SELECT * FROM imagen WHERE galeria_image=".$resultado['id_map']." AND tabla_image='mapa'";
			$contar=mysql_query($sql) or die(mysql_error());
			$numero=mysql_fetch_array($contar);
			$resultado['fotos']=$numero['fotos'];
			$this->listado[] = $resultado;
		}
	}
	
	function listar_mapa_publica(){
		/* Metodo para listar las galerías y sus opciones. */
		$sql="SELECT id_pro, nombre_pro, latitud_pro, longitud_pro, directorio_image, descripcion_pro, telefono_pro, email_pro FROM producto, imagen WHERE galeria_image=id_pro AND nombre_image='logo' AND latitud_pro!='0' AND longitud_pro!='0' AND tabla_image='producto' GROUP BY id_pro ORDER BY id_pro DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si"; $temp="";
			$temp=explode("/",$resultado['directorio_image']);
			$resultado['directorio_image']=$temp[1];
			$resultado['descripcion_pro']=substr($this->limpiar_metas($resultado['descripcion_pro'],""), 0, 170);
			$resultado['descripcion_pro'].="...";
			
			$resultado[5]=substr($this->limpiar_metas($resultado['descripcion_pro'],""), 0, 170);
			$resultado[5].="...";
			
			$buscar=$resultado['id_pro'];
			//$resultado['descripcion_pro']=trim($resultado['descripcion_pro']);
			$sql2="SELECT categoria_per FROM pertenece WHERE producto_per='$buscar' LIMIT 0,1";
			$categoria=mysql_query($sql2) or die(mysql_error());
			$respuesta2 = mysql_fetch_array($categoria);
			$resultado['categoria']=$respuesta2['categoria_per'];
				
			$this->listado[] = $resultado;
		}
		//print_r($this->listado);
	}
	
	function listar_mapa_publica2(){
		/* Metodo para listar las galerías y sus opciones. */
		$sql="SELECT id_hot, nombre_hot, latitud_hot, longitud_hot, directorio_image, descripcion_hot FROM hotel, imagen WHERE galeria_image=id_hot AND nombre_image!='mapa' AND latitud_hot!='0' AND longitud_hot!='0' AND tabla_image='hotel' GROUP BY id_hot ORDER BY id_hot DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si"; $temp="";
			$temp=explode("/",$resultado['directorio_image']);
			$resultado['directorio_image']=$temp[1];
			$resultado['descripcion_hot']=substr($this->limpiar_metas($resultado['descripcion_hot'],""), 0, 170);
			$resultado['descripcion_hot'].="...";
			
			$resultado[5]=substr($this->limpiar_metas($resultado['descripcion_hot'],""), 0, 170);
			$resultado[5].="...";
			
			$buscar=$resultado['id_hot'];
			//$resultado['descripcion_pro']=trim($resultado['descripcion_pro']);
				
			$this->listado[] = $resultado;
		}
		//print_r($this->listado);
	}
	
	function ultimo_mapa($pos){
		/* Metodo para listar las galerías y sus opciones. */
			$sql="SELECT * FROM mapa, imagen WHERE id_map=galeria_image AND tabla_image='mapa' AND contenido_map='$pos' ORDER BY id_map DESC";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_mapa(){
		/*Metodo para mostrar una galería seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM mapa WHERE id_map='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id = $_GET['id'];
			$this->contenido = $resultado['contenido_map'];
			$this->latitud = $resultado['latitud_map'];
			$this->longitud = $resultado['longitud_map'];
		} 
	}
	
	function insertar_mapa(){
	/*Metodo para insertar una galería seleccionada */	
		$this->accion="Datos del Nuevo Mapa";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->contenido=$_GET['back'];
			$sql="INSERT INTO mapa VALUES ('','$this->contenido', '$this->latitud', '$this->longitud')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/contenido/detalle.php?id=$this->contenido");
			exit();
		}			
	}
	
	function editar_mapa(){
	/*Metodo para editar una galería seleccionada */		
		$this->accion="Editando Datos del Mapa";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$this->asignar_valores();
			$this->contenido=$_GET['id'];
			$id=$_GET['back'];
			$sql="UPDATE mapa SET contenido_map='$id', latitud_map='$this->latitud', longitud_map='$this->longitud' WHERE id_map='$this->contenido'";
		
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/contenido/detalle.php?id=$id");
			exit();
		}else{
		  $this->mostrar_mapa();
		}
	}
	
	function eliminar_mapa(){
	/*Metodo para eliminar una galeria seleccionada */	
		$id=$_GET['id'];
		$back=$_GET['back'];
		$sql="DELETE FROM mapa WHERE id_map='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM imagen WHERE galeria_image='$id' AND tabla_image='mapa'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/contenido/detalle.php?id=$back");
	}
	
	function limpiar_metas($string,$corte = null){
		//echo "cadena: ".$string."<br />";
		$caracters_no_permitidos = array("\"","'");
		// paso los caracteres entities tipo &aacute; $gt;etc a sus respectivos html
		$s = html_entity_decode($string,ENT_COMPAT,'UTF-8');
        // quito todas las etiquetas html y php
 		$s = strip_tags($s);
		//elimino todos los retorno de carro
		$s = str_replace("\r", '', $s);
		//en todos los espacios en blanco le añado un <br /> para después eliminarlo
		$s = preg_replace('/(?<!>)n/', "<br />n", $s);
		//elimino la inserción de nuevas lineas
		$s = str_replace("\n", '', $s);
		// elimino tabulaciones y el resto de la cadena
		$s = str_replace("\t", '', $s);
		// elimino caracteres en blanco
		$s = preg_replace('/[ ]+/', ' ', $s);
		$s = preg_replace('/<!--[^-]*-->/', '', $s);
		// vuelvo a hacer el strip para quitar el <br /> que he añadido antes para eliminar las saltos de carro y nuevas lineas
		$s  = strip_tags($s);
		// elimino los caracters como comillas dobles y simples
		$s = str_replace($caracters_no_permitidos,"",$s);
		if (isset($corte) && (is_numeric($corte))){
			$s = mb_substr($s,0,$corte, 'UTF-8');
		}
		
		//echo "Final: ".$s."<br /><br />";
		
		return $s;
    }
	
}
?>
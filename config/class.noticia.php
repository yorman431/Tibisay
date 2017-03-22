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

class Noticia{
	var $categoria;
	var $titulo;
	var $subtitulo;
	var $contenido;
	var $id;
	var $fecha;
	var $autor;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Noticia(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->categoria=$_POST['categoria'];
		$this->titulo=$_POST['titulo'];
		$this->subtitulo=$_POST['subtitulo'];
		$this->contenido=$_POST['contenido'];
		$this->fecha=$_POST['fecha'];
		$this->autor=$_POST['autor'];
	}
	
	function listar_noticia(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM noticia WHERE
			(categoria_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			titulo_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			subtitulo_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			autor_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			contenido_not LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_not DESC";
		}else{
			$sql="SELECT * FROM noticia ORDER BY id_not DESC";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$resultado['contenido_not']=strip_tags($resultado['contenido_not']);
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_noticia_publica(){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT * FROM noticia, imagen WHERE galeria_image=id_not AND tabla_image='noticia' AND nombre_image='portada' GROUP BY id_not ORDER BY id_not DESC ";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$resultado['contenido_not']=strip_tags($resultado['contenido_not']);
			//$resultado['titulo_not']= strtolower($resultado['titulo_not']);
			//$resultado['titulo_not']=ucwords($resultado['titulo_not']);
			$this->mensaje="si";
			//echo $resultado['contenido_not']."<br /><br />";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_noticia_imagen(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM noticia, imagen WHERE galeria_image=id_not AND tabla_image='noticia' AND
			(categoria_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			titulo_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			subtitulo_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			fecha_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			autor_not LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			contenido_not LIKE '%' '".$_SESSION['buscar']."' '%') 
			GROUP BY id_not ORDER BY id_not DESC";
		}else{
			$sql="SELECT * FROM noticia, imagen WHERE galeria_image=id_not AND tabla_image='noticia' GROUP BY id_not ORDER BY id_not DESC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$resultado['contenido_not']=strip_tags($resultado['contenido_not']);
			$resultado['titulo_not']= strtolower($resultado['titulo_not']);
			$resultado['titulo_not']=ucwords($resultado['titulo_not']);
			$this->mensaje="si";
			//echo $resultado['contenido_not']."<br /><br />";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_noticia(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM noticia WHERE id_not='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->categoria = $resultado['categoria_not'];
			$this->titulo = $resultado['titulo_not'];
			$this->subtitulo = $resultado['subtitulo_not'];
			$this->contenido = $resultado['contenido_not'];
			$this->fecha = $resultado['fecha_not'];
			$this->autor = $resultado['autor_not'];
			
		} 
	}
	
	function insertar_noticia(){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos de la Nueva Noticia";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			//$this->contenido=mysql_real_escape_string($this->contenido);
			$this->contenido=mysql_real_escape_string($this->contenido);
			$sql="INSERT INTO noticia VALUES ('', '$this->categoria', '$this->titulo', '$this->subtitulo', '$this->contenido', '$this->fecha', '$this->autor')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/noticia/");	
		}			
	}
	
	function editar_noticia(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos de Noticia";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->contenido=mysql_real_escape_string($this->contenido);
			//$this->contenido=html_entity_decode($this->contenido);
			$sql="UPDATE noticia SET categoria_not='$this->categoria', titulo_not='$this->titulo', subtitulo_not='$this->subtitulo', contenido_not='$this->contenido', fecha_not='$this->fecha', autor_not='$this->autor' WHERE id_not='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/noticia/");
		}else{
		  $this->mostrar_noticia();
		}
	}
	
	function eliminar_noticia(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM noticia WHERE id_not='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM imagen WHERE galeria_image='$id' AND tabla_image='noticia'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/noticia/");
	}
	
	function limpiar_metas($string,$corte = null){
		//echo "cadena: ".$string."<br />";
		$caracters_no_permitidos = array("\"","'");
		// paso los caracteres entities tipo &aacute; $gt;etc a sus respectivos html
		$s = html_entity_decode($string,ENT_COMPAT,'ISO-8859-1');
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
			$s = mb_substr($s,0,$corte, 'ISO-8859-1');
		}
		
		//echo "Final: ".$s."<br /><br />";
		
		return $s;
    }
}
?>
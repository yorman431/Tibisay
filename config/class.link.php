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

class Link{
	var $codigo;
	var $nombre;
	var $link;
	var $sublink;
	var $id;
	var $prioridad;
	var $etiqueta;
	var $descripcion;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	var $claves;
	var $tipo;
	var $icono;
	function Link(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->prioridad=$_POST['prioridad'];
		$this->etiqueta=$_POST['etiqueta'];
		$this->descripcion=$_POST['descripcion'];
		$this->claves=$_POST['claves'];
		$this->tipo=$_POST['tipo'];
		$this->icono=$_POST['icono'];
	}
	
	function asignar_valores2(){
		/* Metodo para recibir valores del exterior. */
		$this->id=$_POST['id_link'];
		$this->prioridad=$_POST['id_sublink'];
		$this->etiqueta=$_POST['etiqueta'];
	}
	
	function listar_link($tipo){
		/* Metodo para listar las categorias de productos. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM link WHERE tipo_cat='$tipo' AND
			(prioridad_cat LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			etiqueta_cat LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_cat LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY prioridad_cat ASC";
		}else{
			$sql="SELECT * FROM link WHERE tipo_cat='$tipo' ORDER BY tipo_cat, prioridad_cat ASC";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_link_menu($tipo){ 
		/* Metodo para listar las categorias de productos. */
		if(isset($tipo) && $tipo=="todo")
			$sql="SELECT * , id_cat AS subenlaces FROM link ORDER BY prioridad_cat ASC";
		else
			$sql="SELECT *, id_cat AS subenlaces FROM link WHERE tipo_cat='$tipo' ORDER BY prioridad_cat ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$id=$resultado['id_cat'];
			
			if($id==27){
			$sql="SELECT *  FROM categoria WHERE padre_cat='1' ORDER BY prioridad_cat ASC";
		   }else if($id==30){
			$sql="SELECT * FROM categoria WHERE padre_cat='4' ORDER BY prioridad_cat ASC";
		   }else{
			$sql="SELECT * FROM linkxsub, sublink WHERE link_rel='$id' AND sublink_rel=id_sub ORDER BY prioridad_sub ASC";
		   }
			$consulta2=mysql_query($sql) or die(mysql_error());
			$lista="";
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$lista[]=$resultado2;
			}
			
			$resultado['enlaces']=$lista;
			
			$sql3="SELECT * FROM imagen WHERE galeria_image='$id' AND tabla_image='link'";
			$consulta3=mysql_query($sql3) or die(mysql_error());
			$lista2="";
			while ($resultado3 = mysql_fetch_array($consulta3)){
				$lista2[]=$resultado3;
			}
			
			$resultado['imagenes']=$lista2;
			
			$this->listado[] = $resultado;
			
			
		}
	}
	
	function listar_sublink(){
		/* Metodo para listar las categorias de productos. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM sublink WHERE
			(prioridad_sub LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_sub LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY prioridad_sub ASC";
		}else{
			$sql="SELECT * FROM sublink ORDER BY prioridad_sub ASC";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_link(){
		/*Metodo para mostrar la categoria seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM link WHERE id_cat='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_cat'];
			$this->etiqueta=$resultado['etiqueta_cat'];
			$this->descripcion=$resultado['descripcion_cat'];
			$this->claves=$resultado['claves_cat'];
			$this->tipo=$resultado['tipo_cat'];
			$this->prioridad=$resultado['prioridad_cat'];
			$this->icono=$resultado['icono_cat'];
			$sql="SELECT * FROM linkxsub, sublink WHERE link_rel='$id' AND sublink_rel=id_sub ORDER BY prioridad_sub ASC";
			$consulta=mysql_query($sql);
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function mostrar_link_publico($id){
		/*Metodo para mostrar la categoria seleccionada */
			$sql="SELECT * FROM link WHERE id_cat='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_cat'];
			$this->etiqueta=$resultado['etiqueta_cat'];
			$this->descripcion=$resultado['descripcion_cat'];
			$this->claves=$resultado['claves_cat'];
			$this->tipo=$resultado['tipo_cat'];
			$this->prioridad=$resultado['prioridad_cat'];
	}
	
	function tam_iconos($iconos,$tam){
			$cad1=explode('">',$iconos);
			$iconos=$cad1[0]." ".$tam.'">'.$cad1[1];
			return $iconos;
	}
	
	function cargar_sublink(){
		/*Metodo para mostrar la categoria seleccionada */
		if (isset($_GET['cont']) && $_GET['cont']!=""){
			$id=$_GET['cont'];
			$sql="SELECT *, id_sub AS etiqueta, id_sub AS directorio_image, id_sub AS nombre_image FROM link, linkxsub, sublink WHERE id_cat='$id' AND link_rel=id_cat AND sublink_rel=id_sub ORDER BY prioridad_sub ASC";
			$consulta=mysql_query($sql);
			while ($resultado = mysql_fetch_array($consulta)){
				$buscar=$resultado['id_sub'];
				$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='subcategoria' ORDER BY id_image";
				$imagenes=mysql_query($sql) or die(mysql_error());
				$respuesta = mysql_fetch_array($imagenes);
				$resultado['directorio_image']=$respuesta['directorio_image'];
				$resultado['nombre_image']=$respuesta['nombre_image'];
				$resultado['etiqueta']=$this->modificar_url($resultado['nombre_sub']);
				$resultado['etiqueta_cat']=$this->modificar_url($resultado['etiqueta_cat']);
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		} 
	}
	
	function mostrar_sublink(){
		/*Metodo para mostrar la subcategoria seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM sublink WHERE id_sub='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_sub'];
			$this->prioridad=$resultado['prioridad_sub'];
			$this->etiqueta=$resultado['etiqueta_sub'];
		} 
	}
	
	function insertar_link(){
	/*Metodo para insertar una categoria */	
		$this->accion="Datos del Nuevo Enlace";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="SELECT * FROM link WHERE nombre_cat='999999'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="INSERT INTO link VALUES ('', '$this->tipo', '$this->nombre', '$this->etiqueta', '$this->claves', '$this->descripcion', '$this->prioridad','$this->icono')";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/link/");
				exit();
			}
		}			
	}
	
		function insertar_sublink(){
	/*Metodo para vincular una subcategoria  */	
		$this->accion="Seleccione el Sub Enlace";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores2();
			$sql="INSERT INTO linkxsub VALUES ('', '$this->id', '$this->prioridad')";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/link/detalle.php?id=$this->id");
		}else if (isset($_POST['envio']) && $_POST['envio']=="Add Nueva"){
			$this->asignar_valores2();
			header("location:/admin/link/sublink_insertar.php?id=$this->id");
		}else{
			$sql="SELECT * FROM sublink ORDER BY nombre_sub, prioridad_sub ASC";
			$consulta=mysql_query($sql);
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
			}
		}
	}

    function guardar_sublink(){
        /*Metodo para insetar una subcategoria */
        $this->accion="New Sub-Link Data";
        if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
            $this->asignar_valores();
            $this->id=$_GET['id'];
            $sql="SELECT * FROM sublink WHERE nombre_sub='$this->nombre'";
            $consulta=mysql_query($sql) or die(mysql_error());
            if($resultado=mysql_fetch_array($consulta)){
                $this->mensaje=1;
            }else{
                $sql="INSERT INTO sublink VALUES ('', '$this->nombre', '$this->prioridad')";
                $consulta=mysql_query($sql) or die(mysql_error());
                if(isset($this->id) && $this->id!="")
                    header("location:/admin/link/sublink.php?id=$this->id");
                else
                    header("location:/admin/link/sublink_lista.php");
            }
        }
    }
	
	function editar_link(){
	/*Metodo para editar una categoria */		
		$this->accion="Editando Datos del Enlace";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="SELECT * FROM link WHERE nombre_cat='999999' AND id_cat!='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="UPDATE link SET tipo_cat='$this->tipo', nombre_cat='$this->nombre', etiqueta_cat='$this->etiqueta', claves_cat='$this->claves', descripcion_cat='$this->descripcion', prioridad_cat='$this->prioridad',icono_cat='$this->icono' WHERE id_cat='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/link/");
			}
		}else{
		  $this->mostrar_link();
		}
	}
	
	function editar_sublink(){
	/*Metodo para editar una subcategoria */		
		$this->accion="Editando Datos del Subenlace";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="SELECT * FROM sublink WHERE nombre_sub='$this->nombre' AND id_sub!='$id'";
			$sql="UPDATE sublink SET nombre_sub='$this->nombre', prioridad_sub='$this->prioridad' WHERE id_sub='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/link/sublink_lista.php");
			
		}else{
		  $this->mostrar_sublink();
		}
	}
	
	function eliminar_link(){
	/*Metodo para eliminar una categoria */	
		$id=$_GET['id'];
		$sql="SELECT id_con FROM contenido WHERE enlace_con='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado=mysql_fetch_array($consulta)){
		    header("location:/admin/link/?error=1");
		}else{
			$sql="DELETE FROM link WHERE id_cat='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			$sql="DELETE FROM linkxsub WHERE link_rel='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/link/");
		}
	}
	
	function eliminar_sublink2(){
	/*Metodo para eliminar una categoria */	
		$id=$_GET['id'];
		$sql="SELECT id_con FROM contenido WHERE subenlace_con='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado=mysql_fetch_array($consulta)){
		    header("location:/admin/link/sublink_lista.php?error=2");
		}else{
			$sql="DELETE FROM sublink WHERE id_sub='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/link/sublink_lista.php");
		}
	}
		
	function eliminar_sublink(){
	/*Metodo para eliminar una subcategoria */	
		$id=$_GET['id'];
		$back=$_GET['back'];
		$sql="DELETE FROM linkxsub WHERE id_rel='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/link/detalle.php?id=$back");
	}
	
	public function get_link($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT etiqueta_cat FROM link WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['etiqueta_cat'];
	}
	
	public function get_link2($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_cat FROM link WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_cat'];
	}
	
	public function get_sublink($id){
	/*Metodo para obtener el nombre de una subcategoria */	
		$sql="SELECT etiqueta_sub FROM link WHERE id_sub='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['etiqueta_sub'];
	}
	
	public function get_sublink2($id){
	/*Metodo para obtener el nombre de una subcategoria */	
		$sql="SELECT nombre_sub FROM sublink WHERE id_sub='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_sub'];
	}
	
	function modificar_url($url) {
		//Rememplazamos caracteres especiales latinos
		$find = array(' ');
		$repl = array('-');
		$url = str_replace ($find, $repl, $url);
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, utf8_encode($url));
		//utf8_decode();
		// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+');
		$url = str_replace ($find, '-', $url);
		
		// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^A-Za-z0-9\-<>\_]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '_', '');
		$url = preg_replace ($find, $repl, $url);
		ucwords($url);
	
	return $url;
	}
	
	function buscar_links($id){
	/*Metodo para buscar el nombre de la categoria */	
		$this->asignar_valores();
		$sql="SELECT * FROM linkxsub, sublink WHERE link_rel='$id' AND sublink_rel=id_sub ORDER BY prioridad_sub";
		$buscar=mysql_query($sql);
		unset($this->listado2);
		while ($resultado = mysql_fetch_array($buscar)){
			$this->mensaje="si";
			$this->listado2[] = $resultado;
		}
		
	}
	
	function get_links_todos($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_cat FROM link WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_cat'];
	}
	
}
?>
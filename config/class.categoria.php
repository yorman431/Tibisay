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

class Categoria{
	var $codigo;
	var $ciudad;
	var $nombre;
	var $categoria;
	var $subcategoria;
	var $id;
	var $prioridad;
	var $etiqueta;
	var $padre;
	var $descripcion;
	var $listado;
	var $listado2;
	var $ruta;
	var $suiche=false;
	var $buscar;
	var $mensaje;
	var $accion;
	var $tipo;
	var $vistas;
	var $claves;
	
	function Categoria(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->prioridad=$_POST['prioridad'];
		$this->etiqueta=$_POST['etiqueta'];
		$this->padre=$_POST['padre'];
		$this->tipo=$_POST['tipo'];
		$this->descripcion=$_POST['contenido'];
		$this->claves=$_POST['claves'];
	}
	
	function asignar_valores2(){
		/* Metodo para recibir valores del exterior. */
		$this->id=$_POST['id_cat'];
		$this->prioridad=$_POST['id_sub'];
	}

	function listar_categoria($tipo){
		/* Metodo para listar las categorias de categorias. */
		$this->codigo=$tipo;
		$this->crearArbol('categoria','id_cat','nombre_cat','padre_cat',0,'&mdash;', $tipo);
	}
	
	//function crearArbol($tabla,$id_field,$show_data,$link_field,$parent,$prefix){
	function crearArbol($tabla, $id_field, $show_data, $link_field, $parent, $prefix, $tipo){
		/*Armar query*/
		if($tipo=="todos" || $tipo=="") $restriccion="AND (tipo_cat='centro' OR tipo_cat='normal')"; else  $restriccion="AND tipo_cat='$tipo'";
		
		$sql="SELECT *,id_cat AS ruta FROM ".$tabla." WHERE ".$link_field."=".$parent." ".$restriccion;
	 	
		/*Asumiendo que se usa MySQL (se puede cambiar facilmente a otra db)*/
	 
		$consulta=@mysql_query($sql) or die(mysql_error());
		if($consulta){
			   /*Recorrer todos las entradas */
			   while($resultado=mysql_fetch_array($consulta)){
			/* Imprimir campo a mostrar*/
					//echo($prefix.$resultado[$show_data].'<br>');
					$resultado[$show_data]=$prefix."&raquo; ".$resultado[$show_data];
					//$this->buscar_ruta_nodo($resultado['id_cat']);
					//$resultado['ruta']=$this->ruta;
					$this->listado[] = $resultado;
					$this->mensaje="si";
	 
			/* imprimir arbol the "hijos" de este elemento*/
					$this->crearArbol($tabla,$id_field,$show_data, $link_field, $resultado[$id_field], $prefix.$prefix, $tipo, $ciudad);
			   }
		}
	}
	
	function buscar_id_evento($nombre){
		/* Metodo para buscar el Id de una categoria de Evento. */
		$ciudad=$_SESSION['ciudad_admin'];
		$sql="SELECT id_cat FROM categoria WHERE nombre_cat='$nombre'";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		
		return $resultado['id_cat'];
	}
	
	function listar_categoria_menu(){ 
		/* Metodo para listar las categorias de categorias. */
		$sql="SELECT *, id_cat AS lista FROM categoria WHERE padre_cat='0' ORDER BY prioridad_cat,id_cat, nombre_cat ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$padre=$resultado['id_cat'];
			$sql2="SELECT * FROM categoria WHERE padre_cat='$padre' ORDER BY prioridad_cat,id_cat, nombre_cat ASC";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$lista="";
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$lista[]=$resultado2;
			}
			$resultado['lista']=$lista;
			$this->listado[] = $resultado;
		}
	}
	
	function buscar_ruta_nodo($id){
		/* Metodo para listar las categorias de categorias. */
		$sql2="SELECT id_cat,nombre_cat,padre_cat FROM categoria WHERE id_cat='$id'";
		$buscar=mysql_query($sql2)	or die(mysql_error());
		$resultados=mysql_fetch_array($buscar);
		if($this->suiche==false){
			$this->ruta[]=$resultados;
			if($resultados['padre_cat']==0) $this->suiche=true;
			$this->buscar_ruta_nodo($resultados['padre_cat']);
		}
	}
	
	function ruta_categoria($id){
			$this->suiche=false;
			//Cálculo de Ruta de Nodo
			$this->ruta="";
			$temp="";
			$this->buscar_ruta_nodo($id);
			for($i=count($this->ruta)-1;$i>=0;$i--){
				$temp.=" &raquo; ".$this->ruta[$i]['nombre_cat'];
			}
			return($temp);
	}
	
	function mostrar_categoria(){
		/*Metodo para mostrar la categoria seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM categoria WHERE id_cat='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_cat'];
			$this->etiqueta=$resultado['etiqueta_cat'];
			$this->prioridad=$resultado['prioridad_cat'];
			$this->padre=$resultado['padre_cat'];
			$this->tipo=$resultado['tipo_cat'];
			$this->descripcion=$resultado['descripcion_cat'];
			$this->claves=$resultado['claves_cat'];
			$this->vistas = $resultado['vistas_cat'];
			
		//print_r($this->listado);
		}
	}
	function categorias_hotel($padre){
		$sql="SELECT * FROM categoria WHERE padre_cat=$padre";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
						$this->listado[]=$resultado;
		}
			
	}
	
	function mostrar_categoria2($id){
		/*Metodo para mostrar la categoria seleccionada */
			$sql="SELECT * FROM categoria WHERE id_cat='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_cat'];
			$this->etiqueta=$resultado['etiqueta_cat'];
			$this->prioridad=$resultado['prioridad_cat'];
			$this->padre=$resultado['padre_cat'];
			$this->tipo=$resultado['tipo_cat'];
			$this->descripcion=$resultado['descripcion_cat'];
			$this->vistas = $resultado['vistas_cat'];
	}
	
	function cargar_subcategorias($id){
		/*Metodo para mostrar la categoria seleccionada */
			//echo $id;
			$sql="SELECT * FROM categoria, imagen WHERE padre_cat='$id' AND galeria_image=id_cat AND tabla_image='categoria' ORDER BY prioridad_cat, id_cat, nombre_cat";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado = mysql_fetch_array($consulta)){
				do{
					$this->mensaje="si";
					$this->listado[] = $resultado;
				}while ($resultado = mysql_fetch_array($consulta));
			}else{
				$temp=$this->buscar_nodo_raiz($id);
				if(($temp==29 && $id!=367 && $id!=596) || ($temp==628 && $id!=639 && $id!=638)){
					header("location:/catalogo_opcion2.php?id=$id");	
					exit();
				}else{
					header("location:/catalogo_opcion.php?id=$id");	
					exit();
				}
			}
	}
	
	function cargar_subcategorias2($id, $tipo){
		/*Metodo para mostrar la categoria seleccionada */   
			$ciudad=$_SESSION['ciudad_publica'];
			//echo $_SESSION['ciudad_publica'];
			$sql="SELECT * FROM categoria WHERE padre_cat='$id' AND tipo_cat='$tipo' ORDER BY prioridad_cat, nombre_cat";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->listado="";
			if($resultado = mysql_fetch_array($consulta)){
				do{
					$this->mensaje="si";
					$padre=$resultado['id_cat'];
					$sql2="SELECT * FROM categoria WHERE padre_cat='$padre' AND tipo_cat='$tipo' ORDER BY prioridad_cat, nombre_cat ASC";
					$consulta2=mysql_query($sql2) or die(mysql_error());
					$lista="";
					while ($resultado2 = mysql_fetch_array($consulta2)){
						$lista[]=$resultado2;
					}
					$resultado['enlaces']=$lista;
					if(count($lista)<=6) $resultado['columna']="dropdown_1column"; else $resultado['columna']="dropdown_2columns";
					$this->listado[] = $resultado;
				}while ($resultado = mysql_fetch_array($consulta));	
			}
	}
	
	function cargar_subcategorias3($id, $tipo){
		/*Metodo para mostrar la categoria seleccionada */
			$sql="SELECT * FROM categoria, imagen WHERE padre_cat='$id' AND galeria_image=id_cat AND tipo_cat='$tipo' AND tabla_image='categoria' AND nombre_cat!='Ambiente' ORDER BY prioridad_cat, nombre_cat";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->listado="";
			if($resultado = mysql_fetch_array($consulta)){
				do{
					$this->mensaje="si";
					$resultado['descripcion_cat']=strip_tags($resultado['descripcion_cat']);
					$this->listado[] = $resultado;
				}while ($resultado = mysql_fetch_array($consulta));	
			}else{
				header("location:/noticias.php?id=$id&tipo=$tipo");	
				exit();
			}
	}
	
	function cargar_subcategorias4($id, $tipo){
		/*Metodo para mostrar la categoria seleccionada */
			$sql="SELECT * FROM categoria, imagen WHERE padre_cat='$id' AND galeria_image=id_cat AND tipo_cat='$tipo' AND tabla_image='categoria' ORDER BY prioridad_cat, nombre_cat";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->listado="";
			if($resultado = mysql_fetch_array($consulta)){
				do{
					$this->mensaje="si";
					$resultado['descripcion_cat']=strip_tags($resultado['descripcion_cat']);
					$this->listado[] = $resultado;
				}while ($resultado = mysql_fetch_array($consulta));	
			}else{
				header("location:/clasificados.php?id=$id&tipo=$tipo");	
				exit();
			}
	}
	
	function mostrar_subcategoria(){
		/*Metodo para mostrar la subcategoria seleccionada */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM subcategoria WHERE id_sub='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_sub'];
			$this->prioridad=$resultado['prioridad_sub'];
		} 
	}
	
	function insertar_categoria($tipo){
	/*Metodo para insertar una categoria */	
		$this->accion="Datos de Categoria";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$ciudad=$_SESSION['ciudad_admin'];
			/*$sql="SELECT * FROM categoria WHERE nombre_cat='$this->nombre'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{*/
				$sql="INSERT INTO categoria VALUES ('','$this->nombre', '$this->etiqueta', '$this->prioridad', '$this->padre', '$this->tipo', '$this->claves', '$this->descripcion', '0')";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/categoria/");	
			//}
		}
		$this->crearArbol('categoria','id_cat','nombre_cat','padre_cat',0,'&mdash;', $tipo);		
	}
	
	function editar_categoria($tipo){
	/*Metodo para editar una categoria */		
		$this->accion="Editando Datos de Categoria";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			//$sql="SELECT * FROM categoria WHERE nombre_cat='$this->nombre' AND id_cat!='$id'";
			//$consulta=mysql_query($sql) or die(mysql_error());
			//if($resultado=mysql_fetch_array($consulta)){
				//$this->mensaje=1;
			//}else{
				$sql="UPDATE categoria SET nombre_cat='$this->nombre', etiqueta_cat='$this->etiqueta', prioridad_cat='$this->prioridad', padre_cat='$this->padre', tipo_cat='$this->tipo', claves_cat='$this->claves', descripcion_cat='$this->descripcion' WHERE id_cat='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/categoria/");
			//}
		}else{
		  $this->mostrar_categoria();
		  if($tipo=="") $tipo=$this->tipo;
		  $this->crearArbol('categoria','id_cat','nombre_cat','padre_cat',0,'&mdash;', $tipo);
		}
	}
	
	function eliminar_categoria(){
	/*Metodo para eliminar una categoria */	
		$id=$_GET['id'];
		$sql="SELECT id_per FROM pertenece WHERE categoria_per='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado=mysql_fetch_array($consulta)){
		    header("location:/admin/categoria/?error=1");
		}else{
			//Eliminamos las imagenes
			$sql="SELECT id_image, directorio_image, nombre_image FROM imagen WHERE galeria_image='$id' AND tabla_image='categoria'";
			$consulta2=mysql_query($sql) or die(mysql_error());
			while($resultado2=mysql_fetch_array($consulta2)){
				$directorio="../../imagenes/".$resultado2['directorio_image'];
				//eliminamos el registro de la imagen
				$id_imagen=$resultado2['id_image'];
				$sql="DELETE FROM imagen WHERE id_image='$id_imagen'";
				$qr_eliminar=mysql_query($sql) or die(mysql_error());
				//borramos la imagen del directorio
				unlink($directorio);
				if($resultado2['nombre_image']=="logo"){
				 $directorio2="../../imagenes/".$this->modificar_url($resultado2['directorio_image']);
				 unlink($directorio2);
				}
			}
			$sql="DELETE FROM categoria WHERE id_cat='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
		
			header("location:/admin/categoria/");
		}
	}
	
	function get_categoria($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_cat FROM categoria WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_cat'];
	}
	
	function get_claves($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT claves_cat FROM categoria WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['claves_cat'];
	}
	
	function get_descripcion($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT descripcion_cat FROM categoria WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return strip_tags($resultado['descripcion_cat']);
	}
	
	function buscar_nodo_raiz($id){
	/*Metodo para obtener el id del nodo raiz */
		$sql="SELECT id_cat, padre_cat FROM categoria WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		if($resultado['padre_cat']==0)
			return $resultado['id_cat'];
		else
			return $this->buscar_nodo_raiz($resultado['padre_cat']);
	}
	
	function mostrar_ruta_categoria($id){
	/*Metodo para buscar la ruta categoria para mostrar */
		$this->suiche=false; $valor=false;
		$this->ruta=""; $this->categoria="";
		$this->buscar_ruta_nodo($id);
		for($i=count($this->ruta)-1;$i>=0;$i--){
			if($valor==true)
				$this->categoria.=" | ";
			$this->categoria.=$this->ruta[$i]['nombre_cat'];
			$valor=true;
		}
		return $this->categoria;
	}
	
	function modificar_url($url){
		 /* Metodo para modificar url */
		 $temp=explode("/", $url);
		 $url=$temp[0]."/miniatura/".$temp[1];
		 return  $url;
	 }
	 
	 function visita_categoria($id){
		/*Metodo para sumar una visita a un anuncio específico */
		if (isset($id) && $id!=""){
			$sql="UPDATE categoria SET vistas_cat=vistas_cat+1 WHERE id_cat='$id'";
			$sumatoria=mysql_query($sql) or die(mysql_error());
		}
	}
	
}
?>
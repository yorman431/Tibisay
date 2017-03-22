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
include_once("class.link.php");

class Contenido extends Link{
	var $nombre;
	var $enlace;
	var $subenlace;
	var $prioridad;
	var $id;
	var $id_cat;
	var $fecha;
	var $contenido;
	var $listado;
	var $listado2;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $accion;
	var $perfil;
	
	function Contenido(){// Constructor
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
		$this->enlace=$_POST['enlace'];
		$this->subenlace=$_POST['subenlace'];
		$this->fecha=$_POST['fecha'];
		$this->contenido=$_POST['contenido'];
		$this->prioridad = $_POST['prioridad'];
	}
	
	function listar_contenido(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM contenido, link WHERE id_cat=enlace_con AND(nombre_cat LIKE '%' '".$_SESSION['buscar']."' '%' OR 		
			nombre_con LIKE '%' '".$_SESSION['buscar']."' '%' OR	
			fecha_con LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			contenido_con LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY enlace_con, subenlace_con ASC";
		}else{
			$sql="SELECT * FROM contenido, link WHERE id_cat=enlace_con ORDER BY enlace_con, subenlace_con ASC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['enlace_con']=$this->get_enlace2($resultado['enlace_con']);
			if($resultado['subenlace_con']==0)
				$resultado['subenlace_con']="Ninguno";
			else
				$resultado['subenlace_con']=$this->get_subenlace($resultado['subenlace_con']);
			$resultado['fecha_con']=$this->convertir_fecha($resultado['fecha_con']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_contenido_publico($tipo){
		/* Metodo para listar los usuarios y sus opciones. */
		if(isset($_GET['sub'])&& $_GET['sub']!=""){
				$sub=$_GET['sub'];
				$restriccion="'$tipo'=enlace_con AND subenlace_con='$sub'";
			}else{
				$restriccion="'$tipo'=enlace_con AND subenlace_con='1'";
			}
		$sql="SELECT * FROM contenido WHERE $restriccion GROUP BY id_con ORDER BY id_con ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['contenido_con']=$resultado['contenido_con'];
			$resultado['enlace_con']=$this->get_enlace($resultado['enlace_con']);
			$resultado['subenlace_con']=$this->get_subenlace($resultado['subenlace_con']);
			$resultado['fecha_con']=$this->convertir_fecha($resultado['fecha_con']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_contenido_select($tipo){
		/* Metodo para listar los usuarios y sus opciones. */
		$restriccion="'$tipo'=enlace_con AND galeria_image=id_con AND tabla_image='contenido'";
		$sql="SELECT * FROM contenido, imagen WHERE $restriccion GROUP BY id_con ORDER BY id_con ASC LIMIT 0 , 3";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['enlace_con']=$this->get_enlace($resultado['enlace_con']);
			$resultado['subenlace_con']=$this->get_subenlace($resultado['subenlace_con']);
			$resultado['fecha_con']=$this->convertir_fecha($resultado['fecha_con']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_contenido_imagen($tipo, $sub){
		/* Metodo para listar los usuarios y sus opciones. */
		if(isset($sub)){
				$restriccion="'$tipo'=enlace_con AND subenlace_con='$sub'";
			}else{
				$restriccion="'$tipo'=enlace_con";
			}
		$sql="SELECT *, id_con AS directorio_image, id_con AS nombre_image FROM contenido WHERE $restriccion GROUP BY id_con ORDER BY prioridad_con ASC ";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id_con'];
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='contenido' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
            $primero = true;
			while ($respuesta = mysql_fetch_array($imagenes)){
                $resultado['imagen'][] = $respuesta;
                if ($primero == true){
                    $resultado['directorio_image'] = $respuesta['directorio_image'];
                    unset($primero);
                }
            }

			$resultado['enlace_con']=$this->get_enlace($resultado['enlace_con']);
			$resultado['subenlace_con']=$this->get_subenlace($resultado['subenlace_con']);
			$resultado['fecha_con']=$this->convertir_fecha($resultado['fecha_con']);
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_contenido(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM contenido WHERE id_con='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->nombre=$resultado['nombre_con'];
			$this->enlace=$this->get_enlace2($resultado['enlace_con']);
			$this->id_cat=$resultado['enlace_con'];
			$this->prioridad = $resultado['prioridad_con'];
			if($resultado['subenlace_con']==1)
				$this->subenlace="Ninguno";
			else
				$this->subenlace=$this->get_subenlace($resultado['subenlace_con']);
			$this->fecha=$this->convertir_fecha($resultado['fecha_con']);
			$this->contenido=$resultado['contenido_con'];
		} 
	}
	
	function mostrar_contenido_imagen($id){
	  $sql="SELECT * FROM contenido, imagen WHERE '$id' = id_con AND id_con = galeria_image";
	  $consulta = mysql_query($sql) or die(mysql_error());
	  $resultado = mysql_fetch_array($consulta);
	  $this->contenido['nombre'] = $resultado['nombre_con'];
	  $this->contenido['contenido'] = $resultado['contenido_con'];
	  $this->contenido['imagen'] = "/imagenes/".$resultado['directorio_image'];
  }
	
	function insertar_contenido($con){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos del Contenido";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="INSERT INTO contenido VALUES ('', '$this->nombre', '$this->enlace', '$this->subenlace', '$this->fecha', '$this->contenido', '$this->prioridad')";
			$consulta=mysql_query($sql) or die(mysql_error());
			$id=mysql_insert_id($con);
			header("location:/admin/contenido/detalle.php?id=$id");

		}
		$sql="SELECT * FROM link ORDER BY prioridad_cat ASC";
		$consulta=mysql_query($sql)or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function editar_contenido(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Contenido";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="UPDATE contenido SET nombre_con='$this->nombre', enlace_con='$this->enlace', subenlace_con='$this->subenlace', fecha_con='$this->fecha',  contenido_con='$this->contenido', prioridad_con = '$this->prioridad'  WHERE id_con='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/contenido/");
		}else{
		  $this->mostrar_contenido();
		  $sql="SELECT * FROM link ORDER BY prioridad_cat ASC";
		  $consulta=mysql_query($sql);
		  while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
		  }
		  $id=$this->id_cat;
		  $sql="SELECT * FROM linkxsub, sublink WHERE link_rel='$id' AND sublink_rel=id_sub ORDER BY prioridad_sub";
		  $buscar=mysql_query($sql);
		  unset($this->listado2);
		  while ($resultado2 = mysql_fetch_array($buscar)){
			    $this->mensaje="si";
			    $this->listado2[] = $resultado2;
		  }
		}
	}
	
	function eliminar_contenido(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM contenido WHERE id_con='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM imagen WHERE galeria_image='$id' AND tabla_image='contenido'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/contenido/");
	}
	
	function buscar_enlaces($id){
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
	
	function get_enlace($id){
	/*Metodo para obtener el nombre de una categoria */	
        return Link::get_link($id);
	}
	
	function get_enlace2($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_cat FROM link WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_cat'];
	}
	
	function get_subenlace($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_sub FROM sublink WHERE id_sub='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_sub'];
	}
	
	function crear_codigo($cat,$sub){
	/*Metodo para crear códigos de productos */
		$cat=$this->get_categoria($cat);
		$sub=$this->get_subcategoria($sub);
		$codigo=$cat[0];
		$codigo.=$cat[1];
		$codigo.="-";
		$codigo.=$sub[0];
		$codigo.=$sub[1];
		$codigo=strtoupper($codigo);
		$codigo.=".";
		//$sql="SELECT COUNT(*) AS total FROM producto";
		$sql="SELECT MAX(id_pro) AS total FROM producto";
		$count=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_array($count);
		$total=$row['total'];
		$total++;
		if($total<=99 && $total>=10){
			$valor="0";
			$valor.=$total;
		} else if($total<=9){
			$valor="00";
			$valor.=$total;
		}else{
			$valor=$total;
		}
		$codigo.=$valor;
		
		return $codigo;
	}
	
	function cambiar_perfil(){
	/*Metodo para editar un usuario seleccionado */		
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$id=$_POST['perfil'];
			$sql="UPDATE perfiles SET estado_per='inactivo'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			$sql="UPDATE perfiles SET estado_per='activo' WHERE id_per='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/temas/?msg=1");
		}else{
		  	$sql="SELECT id_per FROM perfiles WHERE estado_per='activo'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado=mysql_fetch_array($consulta);
		  	$this->perfil=$resultado['id_per'];
		}
	}
}
?>
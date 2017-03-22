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

class Usuario{
	var $login;
	var $clave;
	var $cofirmar;
	var $nueva_clave;
	var $vieja_clave;
	var $id;
	var $nombre;
	var $apellido;
	var $correo;
	var $nivel;
	var $tipo;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Usuario(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->apellido=$_POST['apellido'];
		$this->correo=$_POST['correo'];
		$this->nivel=$_POST['nivel'];
		$this->tipo=$_POST['tipo'];
		$this->login=$_POST['login'];
		$this->clave=$_POST['clave'];
		$this->confirmar=$_POST['confirmar'];
	}
	
	function listar_usuario(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM usuario WHERE
			(nombre_uso LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			login_uso LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			apellido_uso LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			correo_uso LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_uso ASC";
		}else{
			$sql="SELECT * FROM usuario ORDER BY id_uso";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_usuario(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM usuario WHERE id_uso='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->nombre = $resultado['nombre_uso'];
			$this->apellido = $resultado['apellido_uso'];
			$this->correo = $resultado['correo_uso'];
			$this->login = $resultado['login_uso'];
			$this->nivel = $resultado['nivel_uso'];
			$this->tipo = $resultado['tipo_uso'];
			
		} 
	}
	
	function insertar_usuario(){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos del Nuevo Usuario";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$size=strlen($this->clave);
			if($this->clave!=$this->confirmar){
				$this->mensaje=2;
			}else if($size<=3){
					$this->mensaje=3;
			}else{
				$sql="SELECT * FROM usuario WHERE login_uso='$this->login'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if($resultado=mysql_fetch_array($consulta)){
					$this->mensaje=1;
				}else{
					$sql="INSERT INTO usuario VALUES ('', '$this->nombre', '$this->apellido', '$this->correo', '$this->login', '$this->clave', '$this->nivel', '$this->tipo')";
					$consulta=mysql_query($sql) or die(mysql_error());
					header("location:/admin/usuario/");
				}
			}			
		}
	}
	
	function editar_usuario(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Usuario";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$size=strlen($this->clave);
			if($this->clave!=$this->confirmar){
				$this->mensaje=2;
			}else if($size<=3){
					$this->mensaje=3;
			}else{
				$sql="SELECT * FROM usuario WHERE login_uso='$this->login' AND id_uso!='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if($resultado=mysql_fetch_array($consulta)){
					$this->mensaje=1;
				}else{
					$sql="UPDATE usuario SET nombre_uso='$this->nombre', apellido_uso='$this->apellido', correo_uso='$this->correo', nivel_uso='$this->nivel', tipo_uso='$this->tipo', login_uso='$this->login', clave_uso='$this->clave' WHERE id_uso='$id'";
					$consulta=mysql_query($sql) or die(mysql_error());
					header("location:/admin/usuario/");
				}
			}
		}else{
		  $this->mostrar_usuario();
		}
	}
	
	function eliminar_usuario(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM usuario WHERE id_uso='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/usuario/");
	}
}
?>
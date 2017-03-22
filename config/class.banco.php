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

class Banco{
	var $nombre;
	var $cuenta;
	var $numero;
	var $titular;
	var $rif;
	var $id;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	
	function Banco(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->cuenta=$_POST['cuenta'];
		$this->numero=$_POST['numero'];
		$this->titular=$_POST['titular'];
		$this->rif=$_POST['rif'];
	}
	
	function listar_banco(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM banco WHERE
			(nombre_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			cuenta_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			numero_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			rif_ban LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			titular_ban LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_ban ASC";
		}else{
			$sql="SELECT * FROM banco ORDER BY id_ban";
		}
		$consulta=mysql_query($sql);
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_banco(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM banco WHERE id_ban='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->id = $resultado['id_ban'];
			$this->nombre = $resultado['nombre_ban'];
			$this->cuenta = $resultado['cuenta_ban'];
			$this->numero = $resultado['numero_ban'];
			$this->titular = $resultado['titular_ban'];
			$this->rif = $resultado['rif_ban'];
		} 
	}
	
	function insertar_banco(){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos de Nueva Cuenta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="SELECT * FROM banco WHERE numero_ban='$this->numero'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="INSERT INTO banco VALUES ('', '$this->rif', '$this->nombre', '$this->cuenta', '$this->numero', '$this->titular')";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/banco/");
			}
		}			
	}
	
	function editar_banco(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos de Cuenta";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$sql="SELECT * FROM banco WHERE numero_ban='$this->numero' AND id_ban!='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="UPDATE banco SET rif_ban='$this->rif', nombre_ban='$this->nombre', cuenta_ban='$this->cuenta', numero_ban='$this->numero', titular_ban='$this->titular' WHERE id_ban='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/admin/banco/");
			}
		}else{
		  $this->mostrar_banco();
		}
	}
	
	function eliminar_banco(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM banco WHERE id_ban='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/banco/");
	}
}
?>
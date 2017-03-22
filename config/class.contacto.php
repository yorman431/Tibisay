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
include_once("class.configuracion.php");

class Pedido extends Config{
	var $nombre;
	var $apellido;
	var $nombre;
	var $telefono;
	var $correo;
	var $fecha;
	var $hora;
	var $id;
	var $comentario;
	var $estado;
	
	var $listado;
	var $listado2;
	var $buscar;
	var $mensaje;
	var $accion;
	var $operador;
	var $correo_operador;
	
	function Contacto(){// Constructor
	}
	
	function convertir_fecha($CampoFecha){
		if(!empty($CampoFecha)){
			if(strpos($CampoFecha,"-")){
				$conv_fecha = split("-",$CampoFecha); $conv_fecha = $conv_fecha[2]."/".$conv_fecha[1]."/".$conv_fecha[0];
			}else{
				$conv_fecha = split("/",$CampoFecha); $conv_fecha = $conv_fecha[2]."-".$conv_fecha[1]."-".$conv_fecha[0];
			}
			return $conv_fecha;
		}
	}

	function convertir_hora($CampoHora, $CampoMin, $CampoMer){
		if(!empty($CampoMin)){
			$conv_hora  = $CampoHora.":".$CampoMin." ".$CampoMer;
		}else{
			$conv_hora  =  preg_split("/[:]/",$CampoHora);
			$conv_hora2 = preg_split("/[ ]/",$CampoHora);
			$conv_hora  = $conv_hora[0]."/[:]/".$conv_hora[1];
		}
		return $conv_hora;
	}

	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->nombre=$_POST['nombre'];
		$this->apellido=$_POST['apellido'];
		$this->correo=$_POST['correo'];
		$this->telefono=$_POST['telefono'];
		$this->detal=$_POST['detal'];
		$this->mayor=$_POST['mayor'];
		$this->comentario=$_POST['comentario'];
		$this->estado=$_POST['estado'];
		
		date_default_timezone_set('America/Caracas');

		$this->fecha=date("d/m/Y");
		$this->hora=date("H:i:s");
	}
	
	function listar_contacto(){
		/* Metodo para listar los pedidos y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		
		if($_SESSION['tipo_temp']!="Ventas"){	
			if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
				$this->buscar=$_SESSION['buscar'];
				$sql="SELECT * FROM contacto WHERE (fecha_con LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			nombre_con LIKE '%' '".$_SESSION['buscar']."' '%' OR
				apellido_con LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				correo_con LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				comentario_con LIKE '%' '".$_SESSION['buscar']."' '%') 
				ORDER BY id_con DESC";
			}else{
				$sql="SELECT * FROM contacto ORDER BY id_con DESC";
			}
		}
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_con']=$this->convertir_fecha($resultado['fecha_con']);
			$this->listado[] = $resultado;
		}
	}
	
	
	function mostrar_contacto(){
		/*Metodo para mostrar los pedidos */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM contacto WHERE id_con='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->fecha=$this->convertir_fecha($resultado['fecha_con']);
			$this->hora=$resultado['hora_con'];
			$this->nombre=$resultado['nombre_con'];
			$this->apellido=$resultado['apellido_con'];
			$this->correo=$resultado['correo_con'];
			$this->telefono=$resultado['telefono_con'];
			$this->comentario=$resultado['comentario_con'];
			$this->estado=$resultado['estado_con'];
			$this->operador=$resultado['operador_con'];
		} 
	}
	
	
	function editar_contacto(){
	/*Metodo para editar la información de un pedido*/		
		$this->accion="Editando Estatus del Contacto";
		if (isset($_POST['envio']) && $_POST['envio']=="Actualizar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			
			$sql="SELECT * FROM contacto WHERE id_con='$id'";
			$consulta2=mysql_query($sql) or die(mysql_error());
			$resultado2 = mysql_fetch_array($consulta2);
			if($resultado2['estado_con']!=$this->estado)
				$this->enviar_correos($resultado2['correo_con'], $id);
			
			$sql="UPDATE contacto SET estado_con='$this->estado', comentario_con='$this->descripcion' WHERE id_con='$id'";
			
			/*if($this->estado=="Verificado"){
				$sql="UPDATE deposito SET verificado_dep='1' WHERE pedido_dep='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
			}*/
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/contacto/");
		}else{
		  $this->mostrar_contacto();
		  $this->mostrar_imagenes();
		}
	}
	
	function eliminar_pedido(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="SELECT * FROM contacto WHERE id_con='$id'";
		$buscar=mysql_query($sql) or die(mysql_error());
		while($resultado=mysql_fetch_array($buscar)){
			//$pedido=$resultado['id_con'];
			//$sql="DELETE FROM detalle_pedido WHERE pedido_det='$pedido'";
			//$borrar=mysql_query($sql) or die(mysql_error());
		}
		$sql="DELETE FROM contacto WHERE id_con='$id'";
		$eliminar=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/pedidos/");
	}
	
	function enviar_correos($cliente,$pedido){
	    //metodo para el envio de correos de aviso cuando se registran
		$this->mostrar_config(1);
		$id=$cliente;
		$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg AND id_reg='$id' AND id_ped='$pedido'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		$cuerpo ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$resultado['nombre_reg']."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".$resultado['apellido_reg']."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$resultado['telefono_reg']."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$resultado['correo_reg']."<br />" ;
		$cuerpo .= "<strong>Estado del pedido ".$resultado['codigo_ped'].", Cambi&oacute; a  </strong>".$this->estado."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Actualizaci&oacute;n de Estado de Pedido Betcourvitur.com.ec";
		$subject2= "Actualizaci&oacute;n de Estado de Pedido Betcourvitur.com.ec";
		$basemailfor=$this->correo;
		$basemailfrom = $resultado['correo_reg'];
		$respuesta ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<strong>Reciba un cordial saludo: ".$resultado['nombre_reg']." ".$resultado['apellido_reg']."</strong><br /><br />
		El estado de su pedido ".$resultado['codigo_ped'].", ha cambiado a ".$this->estado.".<br />
		Dicho estado se encuentra reflejado en los datos de su pedido en su cuenta personal.<br><br>
		Una vez mas gracias por confiar en ".$this->empresa.".
		<br /><br /> 
		 Muchas Gracias.<br /><br />
		 Atentamente,<br /><br />
		Departamento de Ventas ".$this->empresa."<br />
		".$this->website."<br />
Twitter: <a href='http://www.twitter.com/seilertravel'>@SeilerTravel</a><br />
Facebook: <a href='http://www.facebook.com/SeilerTravel'>SeilerTravel</a>";
		if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   
		}
	}
	
	function convertir_moneda($valor){
	/*Metodo para modificar la moneda del sistema */
		//echo "Entro: ".$valor;
		$sql="SELECT * FROM configuracion";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		if(isset($_SESSION['moneda_temp']) && $_SESSION['moneda_temp']=="dollar")
			$valor=ceil($valor/$resultado['dolar_conf']);
		if(isset($_SESSION['moneda_temp']) && $_SESSION['moneda_temp']=="euro")
			$valor=ceil($valor/$resultado['euro_conf']);
		return $valor;
	}
	
	function convertir_moneda2($valor, $moneda){
	/*Metodo para modificar la moneda del sistema */
		//echo "Entro: ".$valor;
		$sql="SELECT * FROM configuracion";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		if(isset($moneda) && $moneda=="dollar")
			$valor=ceil($valor/$resultado['dolar_conf']);
		if(isset($moneda) && $moneda=="euro")
			$valor=ceil($valor/$resultado['euro_conf']);
		return $valor;
	}
	
	function maximo_pedido(){
	/*Metodo para modificar la moneda del sistema */
		//echo "Entro: ".$valor;
		$sql="SELECT MAX(id_ped) AS valor FROM pedidos";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		
		return $resultado['valor']+1;
	}
	
	function mostrar_operador($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_uso, apellido_uso FROM usuario WHERE id_uso='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_uso']." ".$resultado['apellido_uso'];
	}
	
	function mostrar_correo_operador($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT correo_uso FROM usuario WHERE id_uso='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['correo_uso'];
	}
	
}
?>
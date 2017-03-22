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

class Tarjeta{
	var $usuario;
	var $primeros;
	var $ultimos;
	var $banco;
	var $tipo;
	var $estado;
	var $direccion;
	var $verificado;
	var $listado;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $accion;
	var $hora;
	var $id;
	
	function Tarjeta(){// Constructor
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
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->primeros=$_POST['primeros'];
		$this->ultimos=$_POST['ultimos'];
		$this->banco=$_POST['banco'];
		$this->tipo=$_POST['tipo'];
		$this->direccion=$_POST['direccion'];
		$this->estado=$_POST['estado'];
	}
	
	function listar_tarjeta(){
		/* Metodo para listar las tarjetas y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM tarjetas, registro, bancos WHERE id_reg=registro_tar AND id_ban=banco_tar AND 
			(nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			apellido_reg LIKE '".$_SESSION['buscar']."' '%' OR 
			cedula_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			banco_tar LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_tar LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			estado_tar LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_tar ASC";
		}else{
			$sql="SELECT * FROM tarjetas, registro, bancos WHERE id_reg=registro_tar AND id_ban=banco_tar ORDER BY id_tar";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_tarjeta_publico($id){
		/* Metodo para listar las tarjetas y sus opciones. */
		$sql="SELECT * FROM tarjetas, registro, bancos WHERE id_reg='$id' AND id_reg=registro_tar AND id_ban=banco_tar ORDER BY estado_tar ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_tarjeta($id){
		/*Metodo para mostrar una tarjeta seleccionada */
		$sql="SELECT * FROM tarjetas WHERE id_tar='$id'";
		$consulta=mysql_query($sql);
		if($resultado = mysql_fetch_array($consulta)){
			$this->primeros = $resultado['primeros_tar'];
			$this->ultimos = $resultado['ultimos_tar'];
			$this->banco = $resultado['banco_tar'];
			$this->tipo = $resultado['tipo_tar'];
			$this->direccion = $resultado['direccion_tar'];
			$this->estado = $resultado['estado_tar'];
		}else
			$this->mensaje=1;
	}
	
	function buscar_tarjeta($id){
		/*Metodo para mostrar una tarjeta seleccionada */
		$sql="SELECT * FROM tarjetas, bancos WHERE id_tar='$id' AND banco_tar=id_ban";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado = mysql_fetch_array($consulta)){
			$this->primeros = $resultado['primeros_tar'];
			$this->ultimos = $resultado['ultimos_tar'];
			$this->banco = $resultado['nombre_ban'];
			$this->tipo = $resultado['tipo_tar'];
			$this->direccion = $resultado['direccion_tar'];
			$this->estado = $resultado['estado_tar'];
		}
			return $this->primeros."**********".$this->ultimos." | ".$this->tipo." (".$this->banco.")";
	}
	
	function insertar_tarjeta(){
	/*Metodo para insertar una tarjeta seleccionada*/	
		$this->accion="Afiliar Tarjeta de Usuario";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="SELECT * FROM tarjeta WHERE registro_tar='$this->numero'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="INSERT INTO tarjeta VALUES ('', '$this->id', '$this->primeros', '$this->ultimos', '$this->banco', '$this->tipo', '$this->estado', NOW())";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:pagos_ok.php?msg=1");
				exit();
			}
		}			
	}
	
	function insertar_tarjeta_publico($id){
	/*Metodo para insertar una tarjeta por parte de uasuario */	
		$this->accion="Afiliar Tarjeta Nueva";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="SELECT * FROM tarjetas WHERE primeros_tar='$this->primeros' AND ultimos_tar='$this->ultimos'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="INSERT INTO tarjetas VALUES ('', '$id', '$this->primeros', '$this->ultimos', '$this->banco', '$this->tipo', 'Activa', NOW(), '$this->direccion')"; 
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:registrar_tarjeta.php?msg=1");
				exit();
			}
		}			
	}
	
	function editar_tarjeta(){
	/*Metodo para editar una tarjeta seleccionado */
		if (isset($_POST['estado']) && $_POST['estado']!="" && isset($_POST['id']) && $_POST['id']!=""){
			$id=$_POST['id'];
			$valor=$_POST['estado'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE tarjetas SET estado_tar='$valor' WHERE id_tar='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location:/admin/tarjeta/");
			exit();
		}
	}
	
	function editar_tarjeta_publico($usuario){
	/*Metodo para editar una tarjetas por parte de un usuario */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			if($_GET['valor']!="Activa" && $_GET['valor']!="Inactiva" && $_GET['valor']!="Bloqueada" && $_GET['valor']!="Robada"){
				header("location:panel_usuario.php?msg=4");
				$_SESSION['tarjetas']="no";
				exit();	
			}else{
				$tarjeta=$_GET['id'];
				$sql="SELECT registro_tar FROM tarjetas WHERE id_tar='$tarjeta'";
				$consulta=mysql_query($sql) or die(mysql_error());
				$resultado=mysql_fetch_array($consulta);
				if(!isset($resultado['registro_tar']) || $resultado['registro_tar']!=$usuario){
					header("location:panel_usuario.php?msg=5");
					$_SESSION['tarjetas']="no";
					exit();
				}else{
					$id=$_GET['id'];
					$valor=$_GET['valor'];
					//echo "Entro: ".$_GET['valor'];
					$sql="UPDATE tarjetas SET estado_tar='$valor' WHERE id_tar='$id'";
					$consulta=mysql_query($sql) or die(mysql_error());
					
					//if($valor==1)
						//$this->enviar_correos2($id);
					header("location:registrar_tarjeta.php?msg=2");
					exit();
				}
			}
		}else{
			header("location:registrar_tarjeta.php");
			exit();
		}
	}
	
	function eliminar_tarjeta(){
	/*Metodo para eliminar una tarjeta seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM tarjetas WHERE id_tar='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/tarjeta/");
		exit();
	}
	
	function eliminar_tarjeta_publico($id){
	/*Metodo para eliminar una tarjeta por parte del usuario */
		$sql="DELETE FROM tarjetas WHERE id_tar='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:registrar_tarjeta.php?msg=3");
		exit();
	}
	
	function listar_bancos_venezolanos(){
	/*Metodo para buscar los bancos de Venezuela */
		$sql="SELECT * FROM bancos ORDER BY nombre_ban";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function contar_tarjetas($usuario){
	/*Metodo para contar las tarjetas asociadas a un usuario */
		$sql="SELECT COUNT(*) AS total FROM tarjetas WHERE registro_tar='$usuario'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		return $resultado['total'];
	}
	
	function enviar_correos($id){
	    //metodo para el envio de correos de aviso cuando se registran
		$sql="SELECT * FROM registro WHERE id_reg='$id'";
		$buscando=mysql_query($sql) or die(mysql_error());
		$respuesta = mysql_fetch_array($buscando);
		$fechita=$this->convertir_fecha($this->fecha);
		$cuerpo ="<img src='http://www.dondealfredobodegon.com/imagenes/logon.jpg' /><br /><br />
		<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: <strong/>".$respuesta['nombre_reg']."<br />" ;
		$cuerpo .= "<strong>Apellido: <strong/>".$respuesta['apellido_reg']."<br />" ;
		$cuerpo .= "<strong>N&deg; Pago: <strong/>$this->numero<br />" ;
		$cuerpo .= "<strong>Tipo Pago: <strong/>$this->tipo<br />" ;
		$cuerpo .= "<strong>Monto: <strong/>$this->monto<br />" ;
		$cuerpo .= "<strong>Fecha Pago: <strong/>$fechita<br />" ;
		date_default_timezone_set('America/Caracas');
		$cuerpo .= "<strong>Fecha Registro: <strong/>".date("d/m/Y - H:i:s")."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Pago de Pedido en Donde Alfredo Bodegón";
		$subject2= "Pago Registrado en Donde Alfredo Bodegón";
		$basemailfor="joseenrique86@gmail.com";
		$basemailfrom = $respuesta['correo_reg'];
		$respuesta ="<img src='http://www.dondealfredobodegon.com/imagenes/logon.jpg' /><br /><br />
		<strong>Reciba un cordial saludo: ".$respuesta['nombre_reg']." ".$respuesta['apellido_reg']."<strong/><br /><br />
		Su pago se encuentra ya registrado en nuestro sistema.<br />
		Estos datos ser&aacute;n verificados y de ser correctos su pedido ser&aacute; aprobado.
		<br /><br />
		Gracias por confiar en Donde Alfredo Bodegón.
		<br /><br /> 
		 Muchas Gracias.<br /><br />
		 Atentamente,<br /><br />
		Departamento de Ventas Donde Alfredo Bodegón<br />
		www.dondealfredobodegon.com<br />
<a href='http://www.twitter.com/dondealfredo'>@DondeAlfredo</a><br />
		<a href='http://www.facebook.com/dondealfredo.bodegon'>Facebook: Donde Alfredo Bodeg&oacute;n</a>";
		if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   
		}
	}
	
	function enviar_correos2($id){
	    //metodo para el envio de correos de aviso cuando se registran
		$sql="SELECT * FROM registro, deposito WHERE cedula_reg=cedula_dep AND id_dep='$id'";
		$buscando=mysql_query($sql) or die(mysql_error());
		$respuesta = mysql_fetch_array($buscando);
		$fechita=$this->convertir_fecha($respuesta['fecha_dep']);
		
		$cuerpo ="<img src='http://www.dondealfredobodegon.com/imagenes/logon.jpg' /><br /><br />
		<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: <strong/>".$respuesta['nombre_reg']."<br />" ;
		$cuerpo .= "<strong>Apellido: <strong/>".$respuesta['apellido_reg']."<br />" ;
		$cuerpo .= "<strong>N&deg; Pago: <strong/>".$respuesta['numero_dep']."<br />" ;
		$cuerpo .= "<strong>Tipo Pago: <strong/>".$respuesta['tipo_dep']."<br />" ;
		$cuerpo .= "<strong>Monto: <strong/>".$respuesta['monto_dep']."<br />" ;
		$cuerpo .= "<strong>Fecha Pago: <strong/>$fechita<br />" ;
		date_default_timezone_set('America/Caracas');
		$cuerpo .= "<strong>Fecha Aprobado: <strong/>".date("d/m/Y - H:i:s")."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Verificación de Pago en Donde Alfredo Bodegón";
		$subject2= "Pago Verificado en Donde Alfredo Bodegón";
		$basemailfor="joseenrique86@gmail.com";
		$basemailfrom = $respuesta['correo_reg'];
		$respuesta ="<img src='http://www.dondealfredobodegon.com/imagenes/logon.jpg' /><br /><br />
		<strong>Reciba un cordial saludo: ".$respuesta['nombre_part']." ".$respuesta['apellido_part']."<strong/><br /><br />
		Su pago se encuentra ya registrado en nuestro sistema.<br />
		Sus datos fueron verificados y su pedido ha sido aprobado.
		<br /><br />
		Gracias por confiar en Donde Alfredo Bodegón.
		<br /><br /> 
		Muchas Gracias.<br /><br />
		 Atentamente,<br /><br />
		Departamento de Ventas Donde Alfredo Bodegón<br />
		www.dondealfredobodegon.com<br />
<a href='http://www.twitter.com/dondealfredo'>@DondeAlfredo</a><br />
		<a href='http://www.facebook.com/dondealfredo.bodegon'>Facebook: Donde Alfredo Bodeg&oacute;n</a>";
		if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   
		}
	}
}
?>
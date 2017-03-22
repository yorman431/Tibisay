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
include_once("class.phpmailer.php");

class Pedido extends Config{
	var $codigo;
	var $cliente;
	var $fecha;
	var $hora;
	var $estado;
	var $id;
	var $monto;
	var $moneda;
	var $tarjeta;
	var $direccion;
	var $telefono;
	var $correo;
	var $cantidad;
	var $limite;
	var $comentario;
	var $listado;
	var $listado2;
	var $buscar;
	var $mensaje;
	var $accion;
	var $operador;
	var $correo_operador;
	
	function Pedido(){// Constructor
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
		$this->codigo=$_POST['codigo'];
		$this->nombre=$_POST['nombre'];
		$this->categoria=$_POST['categoria'];
		$this->subcategoria=$_POST['subcategoria'];
		$this->prioridad=$_POST['prioridad'];
		$this->detal=$_POST['detal'];
		$this->mayor=$_POST['mayor'];
		$this->limite=$_POST['limite'];
		$this->descripcion=$_POST['descripcion'];
		$this->estado=$_POST['estado'];
	}
	
	function listar_pedido(){
		/* Metodo para listar los pedidos y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		
		if($_SESSION['tipo_temp']!="Ventas"){	
			if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
				$this->buscar=$_SESSION['buscar'];
				$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg AND(fecha_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			cantidad_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR
				codigo_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				monto_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				apellido_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%') 
				ORDER BY id_ped DESC";
			}else{
				$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg ORDER BY id_ped DESC";
			}
		}else{
			if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
				$this->buscar=$_SESSION['buscar'];
				$operador=$_SESSION['id_temp'];
				/*$sql="SELECT * FROM pedidos, registro WHERE operador_ped='$operador' AND cliente_ped=id_reg AND(fecha_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			cantidad_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR
				codigo_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				monto_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				apellido_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%') 
				ORDER BY id_ped DESC";*/
				$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg AND(fecha_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			cantidad_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR
				codigo_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				monto_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				apellido_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
				nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%') 
				ORDER BY id_ped DESC";
			}else{
				$operador=$_SESSION['id_temp'];
				//$sql="SELECT * FROM pedidos, registro WHERE operador_ped='$operador' AND cliente_ped=id_reg ORDER BY id_ped DESC";
				$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg ORDER BY id_ped DESC";
			}
		}
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_ped']=$this->convertir_fecha($resultado['fecha_ped']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_pedido_usuario($tipo){
		/* Metodo para listar los pedidios en el perfil de usuario*/
		if($tipo=="Entregado")
			$sentencia="estado_ped='Entregado'";
		else
			$sentencia="estado_ped!='Entregado'";
			
		$id=$_SESSION['id_temporal'];
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg AND id_reg='$id' AND $sentencia AND(fecha_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			cantidad_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR
			codigo_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			monto_ped LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			apellido_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_ped DESC";
		}else{
			$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg AND id_reg='$id' AND $sentencia ORDER BY id_ped DESC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			//$resultado['monto_ped']=$this->convertir_moneda2($resultado['monto_ped'],$resultado['moneda_ped']);
			//echo " | ".$resultado['monto_ped'];
			$resultado['fecha_ped']=$this->convertir_fecha($resultado['fecha_ped']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_producto_categoria(){
		/* Metodo para listar los productos por categoria. */
		$sql="SELECT * FROM producto, imagen, categoria WHERE id_cat=categoria_pro AND galeria_image=id_pro GROUP BY id_cat ORDER BY categoria_pro, prioridad_pro ASC";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_imagenes(){
		$id=$_GET['id'];
		/* Metodo para mostrar las imagenes de los productos. */
		$sql="SELECT nombre_image, id_image, cantidad_det, directorio_image FROM pedidos, detalle_pedido, producto, imagen WHERE id_ped='$id' AND id_ped=pedido_det AND producto_det=id_pro AND galeria_image=id_pro AND tabla_image='producto' GROUP BY id_pro ORDER BY id_det ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_pedido(){
		/*Metodo para mostrar los pedidos */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT *, id_ped AS detalles FROM pedidos, registro WHERE cliente_ped=id_reg AND id_ped='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->codigo=$resultado['codigo_ped'];
			$this->cliente=$resultado['nombre_reg']." ".$resultado['apellido_reg'];
			$this->fecha=$this->convertir_fecha($resultado['fecha_ped']);
			$this->hora=$resultado['hora_ped'];
			$this->estado=$resultado['estado_ped'];
			$this->monto=$resultado['monto_ped'];
			$this->cantidad=$resultado['cantidad_ped'];
			$this->comentario=$resultado['comentario_ped'];
			$this->moneda=$resultado['moneda_ped'];
			$this->tarjeta=$resultado['tarjeta_ped'];
			$this->direccion=$resultado['direccion_ped'];
			$this->telefono=$resultado['telefono_reg']." / ".$resultado['celular_reg'];
			$this->correo=$resultado['correo_reg'];
			$this->operador=$this->mostrar_operador($resultado['operador_ped']);
			$this->correo_operador=$this->mostrar_correo_operador($resultado['operador_ped']);
			
			$sql2="SELECT *, id_det AS planes, id_det AS nombre_pro, id_det AS nombre_image, id_det AS directorio_image FROM detalle_pedido WHERE pedido_det='$this->id' ORDER BY id_det";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$temp2="";
			while($resultado2 = mysql_fetch_array($consulta2)){
				$producto=$resultado2['producto_det'];
				//Buscamos datos de producto
				if($resultado2['cambio_det']=="hotel")
					$sql_pro="SELECT nombre_hot, nombre_image, directorio_image FROM hotel, imagen WHERE id_hot='$producto' AND galeria_image='$producto' AND tabla_image='hotel' AND nombre_image!='mapa' GROUP BY id_hot";
				else if($resultado2['cambio_det']=="producto")
					$sql_pro="SELECT nombre_pro, nombre_image, directorio_image FROM producto, imagen WHERE id_pro='$producto' AND galeria_image='$producto' AND tabla_image='producto' AND nombre_image!='mapa' GROUP BY id_pro";
					
				$consulta_pro=mysql_query($sql_pro) or die(mysql_error());
				$resultado_pro = mysql_fetch_array($consulta_pro);
				if($resultado2['cambio_det']=="hotel")
					$resultado2['nombre_pro']=$resultado_pro['nombre_hot'];
				else if($resultado2['cambio_det']=="producto")
					$resultado2['nombre_pro']=$resultado_pro['nombre_pro'];
					
				$resultado2['nombre_image']=$resultado_pro['nombre_image'];
				$resultado2['directorio_image']=$resultado_pro['directorio_image'];
				
				$resultado2['llegada_det']=$this->convertir_fecha($resultado2['llegada_det']);
				$resultado2['salida_det']=$this->convertir_fecha($resultado2['salida_det']);
				$buscar=$resultado2['id_det'];
				$sql3="SELECT * FROM detalle_producto WHERE detalle_dpro='$buscar' ORDER BY id_dpro";
				$consulta3=mysql_query($sql3) or die(mysql_error());
				$temp="";
				while($resultado3 = mysql_fetch_array($consulta3)){
					$temp[]=$resultado3;
				}
				$resultado2['planes']=$temp;
				$temp2[]=$resultado2;
			}
			//$resultado['detalles']=$temp2;
			$this->mensaje="si";
			$this->listado = $temp2;	
		} 
	}
	
	function mostrar_pedido2($id){
		/*Metodo para mostrar los pedidos */
			$sql="SELECT *, id_ped AS detalles FROM pedidos, registro WHERE cliente_ped=id_reg AND id_ped='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->codigo=$resultado['codigo_ped'];
			$this->cliente=$resultado['nombre_reg']." ".$resultado['apellido_reg'];
			$this->fecha=$this->convertir_fecha($resultado['fecha_ped']);
			$this->hora=$resultado['hora_ped'];
			$this->estado=$resultado['estado_ped'];
			$this->monto=$resultado['monto_ped'];
			$this->cantidad=$resultado['cantidad_ped'];
			$this->comentario=$resultado['comentario_ped'];
			$this->moneda=$resultado['moneda_ped'];
			$this->tarjeta=$resultado['tarjeta_ped'];
			$this->direccion=$resultado['direccion_ped'];
			$this->telefono=$resultado['telefono_reg']." / ".$resultado['celular_reg'];
			$this->correo=$resultado['correo_reg'];
			$this->operador=$this->mostrar_operador($resultado['operador_ped']);
			$this->correo_operador=$this->mostrar_correo_operador($resultado['operador_ped']);
			
			$sql2="SELECT *, id_det AS planes, id_det AS nombre_pro, id_det AS nombre_image, id_det AS directorio_image FROM detalle_pedido WHERE pedido_det='$this->id' ORDER BY id_det";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$temp2="";
			while($resultado2 = mysql_fetch_array($consulta2)){
				$producto=$resultado2['producto_det'];
				//Buscamos datos de producto
				if($resultado2['cambio_det']=="hotel")
					$sql_pro="SELECT nombre_hot, nombre_image, directorio_image FROM hotel, imagen WHERE id_hot='$producto' AND galeria_image='$producto' AND tabla_image='hotel' AND nombre_image!='mapa' GROUP BY id_hot";
				else if($resultado2['cambio_det']=="producto")
					$sql_pro="SELECT nombre_pro, nombre_image, directorio_image FROM producto, imagen WHERE id_pro='$producto' AND galeria_image='$producto' AND tabla_image='producto' AND nombre_image!='mapa' GROUP BY id_pro";
					
				$consulta_pro=mysql_query($sql_pro) or die(mysql_error());
				$resultado_pro = mysql_fetch_array($consulta_pro);
				if($resultado2['cambio_det']=="hotel")
					$resultado2['nombre_pro']=$resultado_pro['nombre_hot'];
				else if($resultado2['cambio_det']=="producto")
					$resultado2['nombre_pro']=$resultado_pro['nombre_pro'];
					
				$resultado2['nombre_image']=$resultado_pro['nombre_image'];
				$resultado2['directorio_image']=$resultado_pro['directorio_image'];
				
				$resultado2['llegada_det']=$this->convertir_fecha($resultado2['llegada_det']);
				$resultado2['salida_det']=$this->convertir_fecha($resultado2['salida_det']);
				$buscar=$resultado2['id_det'];
				$sql3="SELECT * FROM detalle_producto WHERE detalle_dpro='$buscar' ORDER BY id_dpro";
				$consulta3=mysql_query($sql3) or die(mysql_error());
				$temp="";
				while($resultado3 = mysql_fetch_array($consulta3)){
					$temp[]=$resultado3;
				}
				$resultado2['planes']=$temp;
				$temp2[]=$resultado2;
			}
			//$resultado['detalles']=$temp2;
			$this->mensaje="si";
			$this->listado = $temp2;	
		
	}
	
	function editar_pedido(){
	/*Metodo para editar la información de un pedido*/		
		$this->accion="Editando Datos del Pedido";
		if (isset($_POST['envio']) && $_POST['envio']=="Actualizar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			
			$sql="SELECT * FROM pedidos WHERE id_ped='$id'";
			$consulta2=mysql_query($sql) or die(mysql_error());
			$resultado2 = mysql_fetch_array($consulta2);
			if($resultado2['estado_ped']!=$this->estado)
				$this->enviar_correos($resultado2['cliente_ped'],$id);
			
			$sql="UPDATE pedidos SET estado_ped='$this->estado', comentario_ped='$this->descripcion' WHERE id_ped='$id'";
			
			if($this->estado=="Verificado"){
				$sql="UPDATE deposito SET verificado_dep='1' WHERE pedido_dep='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
			}
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/pedidos/");
		}else{
		  $this->mostrar_pedido();
		  $this->mostrar_imagenes();
		}
	}
	
	function eliminar_pedido(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="SELECT * FROM pedidos WHERE id_ped='$id'";
		$buscar=mysql_query($sql) or die(mysql_error());
		while($resultado=mysql_fetch_array($buscar)){
			$pedido=$resultado['id_ped'];
			$sql="DELETE FROM detalle_pedido WHERE pedido_det='$pedido'";
			$borrar=mysql_query($sql) or die(mysql_error());
		}
		$sql="DELETE FROM pedidos WHERE id_ped='$id'";
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

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Actualización de Estado de Pedido Betcourvitur.com.ec");
		$mail->AddAddress($basemailfor, $resultado['nombre_reg']." ".$resultado['apellido_reg']);
		$mail->Subject = utf8_decode("Actualización de Estado de Pedido Betcourvitur.com.ec");
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();
		
		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode("Actualización de Estado de Pedido Betcourvitur.com.ec");
		$mail2->AddAddress($basemailfrom, $resultado['nombre_reg']." ".$resultado['apellido_reg']);
		$mail2->Subject = utf8_decode("Actualización de Estado de Pedido Betcourvitur.com.ec");
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();
		
		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   
		}*/
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
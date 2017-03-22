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

class Pago extends Config{
	var $cedula;
	var $pedido;
	var $banco;
	var $numero;
	var $fecha;
	var $monto;
	var $verificado;
	var $listado;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $tipo;
	var $accion;
	var $hora;
	var $id;
	
	function Pago(){// Constructor
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
		$this->pedido=$_POST['pedido'];
		$this->cedula=$_POST['cedula'];
		$this->banco=$_POST['banco'];
		$this->tipo=$_POST['tipo'];
		$this->numero=$_POST['numero'];
		$this->fecha=$_POST['fecha'];
		$this->monto=$_POST['monto'];
	}
	
	function listar_pago(){
		/* Metodo para listar los pagos y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM deposito, registro WHERE cedula_reg=cedula_dep AND 
			(cedula_dep LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			numero_dep LIKE '".$_SESSION['buscar']."' '%' OR 
			fecha_dep LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			monto_dep LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_dep LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			apellido_reg LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_dep ASC";
		}else{
			$sql="SELECT * FROM deposito, registro WHERE cedula_reg=cedula_dep ORDER BY id_dep";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_dep']=$this->convertir_fecha($resultado['fecha_dep']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_pago_pedido($id){
		/* Metodo para listar los pagos y sus opciones. */
		$sql="SELECT * FROM deposito, pedidos WHERE pedido_dep=id_ped AND pedido_dep='$id'";
		$consulta=mysql_query($sql)or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_dep']=$this->convertir_fecha($resultado['fecha_dep']);
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_pagos($cedula){
		/*Metodo para mostrar un pagos seleccionado */
		$sql="SELECT * FROM deposito WHERE cedula_dep='$cedula'";
		$consulta=mysql_query($sql);
		if($resultado = mysql_fetch_array($consulta)){
			$this->banco = $resultado['banco_dep'];
			$this->tipo = $resultado['tipo_dep'];
			$this->numero = $resultado['numero_dep'];
			$this->fecha = $this->convertir_fecha($resultado['fecha_dep']);
			$this->monto = $resultado['monto_dep'];
			$this->verificado = $resultado['verificado_dep'];
			$this->hora = $resultado['hora_dep'];
		}else
			$this->mensaje=1;
	}
	
	function insertar_pago(){
	/*Metodo para insertar un pagos seleccionado */	
		$this->accion="Registrar Pago de Inscripción";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="SELECT * FROM deposito WHERE numero_dep='$this->numero'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else{
				$sql="INSERT INTO deposito VALUES ('', '$this->cedula', '$this->banco', '$this->numero', '$this->fecha', '$this->monto', NOW(), '$this->tipo', '0')";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:pagos_ok.php?msg=1");
				exit();
			}
		}			
	}
	
	function insertar_pago_publico($id){
	/*Metodo para insertar un pagos seleccionado */	
		$this->accion="Registrar Pago de Inscripción";
		if (isset($_POST['envio']) && $_POST['envio']=="Enviar"){
			$this->asignar_valores();
			$sql="SELECT cedula_reg FROM registro WHERE id_reg='$id'";
			$buscar=mysql_query($sql) or die(mysql_error());
			$resultado=mysql_fetch_array($buscar);
			$this->cedula=$resultado['cedula_reg'];
			$this->fecha=$this->convertir_fecha($this->fecha);
			$moneda=$_SESSION['moneda_temp'];
			// Buscar fecha pedido
			$sql="SELECT fecha_ped, monto_ped FROM pedidos WHERE id_ped='$this->pedido'";
			$consulta_pedido=mysql_query($sql) or die(mysql_error());
			$resultado_pedido=mysql_fetch_array($consulta_pedido);
			$fecha_ped=$resultado_pedido['fecha_ped'];
			$monto_pedido=$resultado_pedido['monto_ped'];
			$fecha_actual=date("Y-m-d");
			
			$sql="SELECT * FROM deposito WHERE numero_dep='$this->numero'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje2=1;
			}else{
				if($this->fecha>=$fecha_ped){
					if($this->fecha<=$fecha_actual){
						if($this->monto<=$monto_pedido){
							$sql="INSERT INTO deposito VALUES ('', '$this->cedula','$this->pedido', '$this->banco', '$this->numero', '$this->fecha', '$this->monto', NOW(), '$this->tipo', '0', '$moneda')";
							$consulta=mysql_query($sql) or die(mysql_error());
							$this->enviar_correos($id);
							$this->mensaje2="ok";
						}else{
							$this->mensaje2=4;
						}
					}else{
						$this->mensaje2=3;
					}
				}else{
					$this->mensaje2=2;
				}
			}
			$this->buscar_pedidos();
		}else{
			$this->buscar_pedidos();
		}			
	}
	
	function insertar_pago_publico2($id){
	/*Metodo para insertar un pagos seleccionado */	
		$this->accion="Registrar Pago de Inscripción";
		if (isset($_POST['envio']) && $_POST['envio']=="Enviar Pedido"){
			$this->asignar_valores();
			$sql="SELECT cedula_reg FROM registro WHERE id_reg='$id'";
			$buscar=mysql_query($sql) or die(mysql_error());
			$resultado=mysql_fetch_array($buscar);
			$this->cedula=$resultado['cedula_reg'];
			$this->fecha=$this->convertir_fecha($this->fecha);
			$moneda=$_SESSION['moneda_temp'];
			$sql="SELECT * FROM deposito WHERE numero_dep='$this->numero'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if($resultado=mysql_fetch_array($consulta)){
				$this->mensaje2=1;
			}else{
				$sql="INSERT INTO deposito VALUES ('', '$this->cedula','', '$this->banco', '$this->numero', '$this->fecha', '$this->monto', NOW(), '$this->tipo', '0', '$moneda')";
				$consulta=mysql_query($sql) or die(mysql_error());
				$this->enviar_correos($id);
				$this->mensaje2="ok";
			}
			$this->buscar_pedidos();
		}else{
			$this->buscar_pedidos();
		}			
	}
	
	function editar_pago(){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE deposito SET verificado_dep='$valor' WHERE id_dep='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			$sql2="SELECT pedido_dep FROM deposito WHERE id_dep='$id'";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$resultado=mysql_fetch_array($consulta2);
			$pedido=$resultado['pedido_dep'];
			
			$sql3="UPDATE pedidos SET estado_ped='Verificado' WHERE id_ped='$pedido'";
			$consulta3=mysql_query($sql3) or die(mysql_error());
			
			if($valor==1)
				$this->enviar_correos2($id);
			header("location:/admin/pagos/");
		}
	}
	
	function eliminar_pago(){
	/*Metodo para eliminar un pagos seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM deposito WHERE id_dep='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/pagos/");
	}
	
	function buscar_pedidos(){
	/*Metodo para buscar los pedidos Activos */
		$id=$_SESSION['id_temporal'];
		$sql="SELECT * FROM pedidos WHERE cliente_ped='$id' AND (estado_ped='En Proceso' OR estado_ped='Verificando Pago') ORDER BY id_ped";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function enviar_correos($id){
	    //metodo para el envio de correos de aviso cuando se registran
		$this->mostrar_config(1);
		$sql="SELECT * FROM registro WHERE id_reg='$id'";
		$buscando=mysql_query($sql) or die(mysql_error());
		$respuesta = mysql_fetch_array($buscando);
		$fechita=$this->convertir_fecha($this->fecha);
		$cuerpo ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$respuesta['nombre_reg']."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".$respuesta['apellido_reg']."<br />" ;
		$cuerpo .= "<strong>N&deg; Pago: </strong>".$this->numero."<br />" ;
		$cuerpo .= "<strong>Tipo Pago: </strong>".$this->tipo."<br />" ;
		$cuerpo .= "<strong>Monto: </strong>".$this->monto."<br />" ;
		$cuerpo .= "<strong>Fecha Pago: </strong>".$fechita."<br />" ;
		date_default_timezone_set('America/Caracas');
		$cuerpo .= "<strong>Fecha Registro: </strong>".date("d/m/Y - H:i:s")."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Pago de Pedido en ".$this->empresa;
		$subject2= "Pago Registrado en ".$this->empresa;
		$basemailfor=$this->correo;
		$basemailfrom = $respuesta['correo_reg'];
		$respuesta ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<strong>Reciba un cordial saludo: ".$respuesta['nombre_reg']." ".$respuesta['apellido_reg']."</strong><br /><br />
		Su pago se encuentra ya registrado en nuestro sistema.<br />
		Estos datos ser&aacute;n verificados y de ser correctos su pedido ser&aacute; aprobado.
		<br /><br />
		Gracias por confiar en ".$this->empresa.".
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
	
	function enviar_correos2($id){
	    //metodo para el envio de correos de aviso cuando se registran
		$this->mostrar_config(1);
		$sql="SELECT * FROM registro, deposito WHERE cedula_reg=cedula_dep AND id_dep='$id'";
		$buscando=mysql_query($sql) or die(mysql_error());
		$respuesta = mysql_fetch_array($buscando);
		$fechita=$this->convertir_fecha($respuesta['fecha_dep']);
		
		$cuerpo ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$respuesta['nombre_reg']."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".$respuesta['apellido_reg']."<br />" ;
		$cuerpo .= "<strong>N&deg; Pago: </strong>".$respuesta['numero_dep']."<br />" ;
		$cuerpo .= "<strong>Tipo Pago: </strong>".$respuesta['tipo_dep']."<br />" ;
		$cuerpo .= "<strong>Monto: </strong>".$respuesta['monto_dep']."<br />" ;
		$cuerpo .= "<strong>Fecha Pago: </strong>".$fechita."<br />" ;
		date_default_timezone_set('America/Caracas');
		$cuerpo .= "<strong>Fecha Aprobado: </strong>".date("d/m/Y - H:i:s")."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Verificación de Pago ".$this->empresa;
		$subject2= "Pago Verificado en ".$this->empresa;
		$basemailfor=$this->correo;
		$basemailfrom = $respuesta['correo_reg'];
		$respuesta ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<strong>Reciba un cordial saludo: ".$respuesta['nombre_part']." ".$respuesta['apellido_part']."</strong><br /><br />
		Su pago se encuentra ya registrado en nuestro sistema.<br />
		Sus datos fueron verificados y su pedido ha sido aprobado.
		<br /><br />
		Gracias por confiar en ".$this->empresa.".
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
}
?>
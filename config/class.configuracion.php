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

class Config{
	var $dolar;
	var $euro;
	var $correo;
	var $rif;
	var $empresa;
	var $website;
	var $descuento;
	var $aumento;
	var $mensaje;
	
	function Config(){// Constructor
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
		$this->dolar=$_POST['dolar'];
		$this->euro=$_POST['euro'];
		$this->correo=$_POST['correo'];
		$this->rif=$_POST['rif'];
		$this->empresa=$_POST['empresa'];
		$this->website=$_POST['website'];
		$this->descuento=$_POST['descuento'];
		$this->aumento=$_POST['aumento'];
	}
	
	
	function mostrar_config($id){
		/*Metodo para mostrar un pagos seleccionado */
		$sql="SELECT * FROM configuracion WHERE id_conf='$id'";
		$consulta=mysql_query($sql);
		if($resultado = mysql_fetch_array($consulta)){
			$this->dolar=$resultado['dolar_conf'];
			$this->euro=$resultado['euro_conf'];
			$this->correo=$resultado['correo_conf'];
			$this->rif=$resultado['rif_conf'];
			$this->empresa=$resultado['empresa_conf'];
			$this->website=$resultado['website_conf'];
			$this->descuento=$resultado['descuento_conf'];
			$this->aumento=$resultado['aumento_conf'];
		}else
			$this->mensaje=1;
	}
	
	function editar_config($id){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="UPDATE configuracion SET dolar_conf='$this->dolar', euro_conf='$this->euro', correo_conf='$this->correo', website_conf='$this->website', rif_conf='$this->rif', empresa_conf='$this->empresa', descuento_conf='$this->descuento', aumento_conf='$this->aumento' WHERE id_conf='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->mensaje=1;
		}
		$this->mostrar_config($id);
	}
	
	function eliminar_config(){
	/*Metodo para eliminar un pagos seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM configuracion WHERE id_conf='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/configuracion/");
	}
	
	
	function enviar_correos_config($id){
	    //metodo para el envio de correos de aviso cuando se registran
		$sql="SELECT * FROM registro WHERE id_reg='$id'";
		$buscando=mysql_query($sql) or die(mysql_error());
		$respuesta = mysql_fetch_array($buscando);
		$fechita=$this->convertir_fecha($this->fecha);
		$cuerpo ="<img width='280' height='136' src='http://www.compratuticket.com.ve/imagenes/logon.jpg' /><br />
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
		$subject= "Pago de Entradas de CompraTuTicket";
		$subject2= "Pago Registrado en CompraTuTicket";
		$basemailfor="compratuticket@gmail.com";
		$basemailfrom = $respuesta['correo_reg'];
		$respuesta ="<img width='280' height='136' src='http://www.compratuticket.com.ve/imagenes/logon.jpg' /><br />
		<strong>Reciba un cordial saludo: ".$respuesta['nombre_reg']." ".$respuesta['apellido_reg']."<strong/><br /><br />
		Su pago se encuentra ya registrado en nuestro sistema.<br />
		Estos datos ser&aacute;n verificados y de ser correctos su pedido ser&aacute; aprobado.
		<br /><br />
		Gracias por confiar en CompraTuTicket.
		<br /><br /> 
		 Muchas Gracias.<br />
		Atentamente,<br /><br />
		Departamento Ventas CompraTuTicket<br />
		www.compratuticket.com.ve<br />
		<a href='http://www.twitter.com/compratuticket'>@CompraTuTicket</a><br />
		<a href='http://www.facebook.com/pages/CompraTuTicket/135147839889750?sk=wall'>Facebook: CompraTuTicket</a>";
		if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   
		}
	}
	
}
?>
<?php

/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42)
 * Luis José Da Silva G. <luisjose@tusitio.com.ve>
 * Alejandro José Díaz Delgado. <contacto@diazcreativos.net.ve>
 * escribieron este archivo.
 * Mientras conserve
 * este comentario usted puede hacer lo que quiera con este material. Si alguna
 * vez nos encontramos
 * y piensa que este material le fue útil, usted puede invitarme una cerveza
 * en agradecimiento.
 * ----------------------------------------------------------------------------
*/
	/* CLASE PARA AUTENTICACION DE USUARIOS Y CAMBIO DE CONTRASEÑA */

include_once("class.configuracion.php");
include_once("class.phpmailer.php");

class Auth extends Config{
	var $login;
	var $password;
	var $new_password;
	var $titulo;
	var $nombre;
	var $apellido;
	var $telefono;
	var $email;
	var $nombreb;
	var $apellidob;
	var $telefonob;
	var $emailb;
	var $comentario;
	var $comentariob;
	var $email_reserva;
	var $fecha;
	var $adultos;
	var $ninos;
	var $cedula;
	var $cedulab;
	var $adultosb;
	var $ninosb;
	var $plan;
	var $hotel;
	var $habitacion;
	var $edades;
	var $edadesb;
	var $boleto;
	var $origen;
	var $origenb;
	var $aeropuerto;
	var $embarque;
	var $excursion;
	var $edad;
	var $edad3;
	var $flota;
	var $mensaje;
	var $sw;
	var $destino;
	var $destinob;
	var $fecha_ida;
	var $fecha_vuelta;
    var $fecha_idab;
	var $fecha_vueltab;
	var $pais;
	var $estado;
	var $direccion;
	var $correoc;

	var $hora;
	var $correo2;
	var $opcion;
	var $observacion;

	function Auth(){// Constructor

	}


	function asignar_consulta($log,$pass){
		/* Metodo para asignar valores de los input
		para realizar consulta de login. */
		$this->login = $log;
		$this->password = $pass;
	}

	function asignar_ingreso(){
		/* Metodo para asignar valores de los input
		para realizar ingreso o cambio  de contraseña */
		$this->nombre=$_POST['nombre'];
		$this->apellido=$_POST['apellido'];
		$this->telefono=$_POST['telefono'];
		$this->email=$_POST['email'];
		$this->comentario=$_POST['comentario'];

	}

	function asignar_ingreso3(){
		$this->nombre=$_POST['nombre'];
		$this->apellido=$_POST['apellido'];
		$this->telefono=$_POST['telefono'];
		$this->correoc=$_POST['correo'];
		$this->edad=$_POST['edad'];
		$this->pais=$_POST['pais'];
		$this->estado=$_POST['estado'];
		$this->direccion=$_POST['direccion'];
	}

		function asignar_ingreso_boletos(){
		/* Metodo para asignar valores de los input
		para realizar ingreso o cambio  de contraseña */
		$this->cedulab=$_POST['nombre-b'];
		$this->nombreb=$_POST['nombre-b'];
		$this->apellidob=$_POST['apellido-b'];
		$this->telefonob=$_POST['telefono-b'];
		$this->emailb=$_POST['email-b'];
		$this->edadesb=$_POST['edades-b'];
		$this->comentariob=$_POST['comentario-b'];
		$this->origenb=$_POST['origen-b'];
		$this->destinob=$_POST['destino-b'];
		$this->fecha_idab=$_POST['fecha_ida-b'];
		$this->fecha_vueltab=$_POST['fecha_vuelta-b'];
		$this->adultosb=$_POST['adultos-b'];
		$this->ninosb=$_POST['menores-b'];
		$this->edadesb=$_POST['edades-b'];

	}

	function asignar_ingreso_traslado(){
		$this->nombre = "";
	  $this->apellido = "";
	  $this->correo2 = "";
	  $this->telefono = "";
	  $this->origen = "";
	  $this->destino = "";
	  $this->fecha = "";
	  $this->hora = "";
	  $this->adultos = "";
	  $this->ninos = "";
	  $this->opcion = "";
	  $this->observacion = "";

		$this->nombre = $_POST['nombre'];
	  $this->apellido = $_POST['apellido'];
	  $this->correo2 = $_POST['correo'];
	  $this->telefono = $_POST['telefono'];
	  $this->origen = $_POST['origen'];
	  $this->destino = $_POST['destino'];
	  $this->fecha = $_POST['fecha'];
	  $this->hora = $_POST['hora'];
	  $this->adultos = $_POST['adulto'];
	  $this->ninos = $_POST['nino'];
	  $this->opcion = $_POST['opcion'];
	  $this->observacion = $_POST['observacion'];
	}
	function asignar_ingreso2(){
		/* Metodo para asignar valores de los input
		para realizar ingreso o cambio  de contraseña */
		$this->fecha=$_POST['fecha'];
		$this->adultos=$_POST['adultos'];
		$this->ninos=$_POST['ninos'];
		$this->edad3=$_POST['edad3'];
		$this->flota=$_POST['flota'];
	}

	function asignar_ingreso_solicitud(){
		/* Metodo para asignar valores de los input
		para realizar ingreso o cambio  de contraseña */
		$this->titulo=$_POST['titulo'];
		$this->nombre=$_POST['nombre'];
		$this->telefono=$_POST['telefono'];
		$this->email=$_POST['email'];
		$this->plan=$_POST['tipo'];
		if(isset($_POST['hotel']) && $_POST['hotel']!="")
			$this->hotel=$_POST['hotel'];
		else if(isset($_POST['hotel2']) && $_POST['hotel2']!="")
			$this->hotel=$_POST['hotel2'];

		$this->habitacion=$_POST['habitacion'];
		$this->edades=$_POST['edades'];
		$this->boleto=$_POST['boleto'];
		$this->origen=$_POST['estado'];
		$this->aeropuerto=$_POST['aeropuerto'];
		$this->adultos=$_POST['adultos'];
		$this->ninos=$_POST['ninos'];
		$this->edades=$_POST['edades'];
		$this->comentario=$_POST['comentario'];
		$this->embarque=$_POST['embarque'];
	}

	function cambiar_password($login_, $old_passwd, $new_passwd){
		// Metodo para cambio de contraseña.
		if (($old_passwd == $user_old_passwd)
		&& ($new_passwd == $confirm_passwd)){
			mysql_query("UPDATE usuarios SET passwd = '$new_passwd'
			WHERE login = '$login_'");

			return true;
       		}
        	else{
			return false;
		}
	}

	function login($_login, $_password){
		// Metodo de ingreso al sistema
		$resultado_login = mysql_query("SELECT * FROM usuario
		WHERE login_uso = '$_login' AND clave_uso = '$_password'");
		$num_rows = mysql_num_rows($resultado_login);
		if ($num_rows == 0){
			$this->mensaje = "Login o contrase&ntilde;a no v&aacute;lida.";
			$_SESSION['estado_temp'] = -1;
		}
		else{
			$fila_login = mysql_fetch_assoc($resultado_login);
			$this->nombre = $fila_login["nombre_uso"];
			$this->apellido = $fila_login["apellido_uso"];
			$this->mensaje = "Bienvenido $this->nombre $this->apellido.";
			$_SESSION['estado_temp'] = 1;
			$_SESSION['login_temp'] = $fila_login["login_uso"];
			$___login = $fila_login["login_uso"];
			$_SESSION['nombre_temp'] = $fila_login["nombre_uso"];
			$_SESSION['apellido_temp'] = $fila_login["apellido_uso"];
			$_SESSION['nivel_temp'] = $fila_login["nivel_uso"];
			$_SESSION['tipo_temp'] = $fila_login["tipo_uso"];
			$_SESSION['id_temp'] = $fila_login["id_uso"];
			//mysql_query ("UPDATE usuarios SET last_login = curdate()
			//WHERE login = $___login");
			//if($_SESSION['_url'])
			header("location: /admin/panel_central.php?msg=1");
		}
	}

	function logout(){
		// Destruyendo sesion y redireccionando al Index.
		//header("location:index.php");
		unset($_SESSION['login_temporal']);
		unset($_SESSION['nombre_temporal']);
		unset($_SESSION['apellido_temporal']);
		unset($_SESSION['id_temporal']);
		unset($_SESSION['ip_temporal']);
		unset($_SESSION['perfil']);
		unset($_SESSION['volver']);
		unset($_SESSION['tarjetas']);
		unset($_SESSION['tarjeta']);
		unset($_SESSION['direccion']);
		header("location: index.php");
		exit();
	}

	function logout2(){
		// Destruyendo sesion y redireccionando al Index.
		session_start();
		session_destroy();
		//header("location:index.php");
		header("location: index.php");
		exit();
	}

	function permisos(){
		session_start();
		if(!isset($_SESSION['login_temp'])  || !isset($_SESSION['nivel_temp'])){
			session_destroy();
			header("location:/index.php?msg=1");
			exit();
		}else{
			$nivel=$_SESSION['nivel_temp'];
			if($nivel!=1 && $nivel!=0 && $nivel!=2 && $nivel!=3 && $nivel!=4){
				session_destroy();
				header("location:/index.php?msg=2");
				exit();
			}
		}
	}

	function permisos2(){
		session_start();
		if(!isset($_SESSION['login_temporal']) || !isset($_SESSION['id_temporal'])){
			session_destroy();
			header("location:/index.php?msg=1");
			exit();
		}
	}

	function login2($_login, $_password, $volver){
		// Metodo de ingreso al sistema de Usuarios Normales
		$this->login($_login,$_password);
		$resultado_login = mysql_query("SELECT * FROM registro
		WHERE login_reg = '$_login' AND clave_reg = '$_password'");
		$num_rows = mysql_num_rows($resultado_login);
		if (isset($num_rows)&& $num_rows == 0){
			$this->mensaje = "Login o clave inv&aacute;lido.";
			$_SESSION['estado_temp'] = -1;
		}
		else{
			$fila_login = mysql_fetch_assoc($resultado_login);
			$this->nombre = $fila_login["nombre_reg"];
			$this->apellido = $fila_login["apellido_reg"];
			$this->mensaje = "Bienvenido $this->nombre $this->apellido.";
			$_SESSION['estado_temporal'] = 1;
			$_SESSION['login_temporal'] = $fila_login["login_reg"];
			$_SESSION['nombre_temporal'] = $fila_login["nombre_reg"];
			$_SESSION['apellido_temporal'] = $fila_login["apellido_reg"];
			$_SESSION['id_temporal'] = $fila_login["id_reg"];
			$_SESSION['catalogo_temporal'] = $fila_login["catalogo_reg"];
			$_SESSION['preguntas'] = "no";
			//mysql_query ("UPDATE usuarios SET last_login = curdate()
			//WHERE login = $___login");
			//if($_SESSION['_url'])
			header("location: ".$volver);
			exit();
		}
	}

	function enviar_contacto(){
	    //metodo para el envio desde el formulario de contacto
		$this->mostrar_config(1);
		$this->asignar_ingreso();
		$cuerpo ="<img src='".$this->website."http://tibisay.diazcreativos.net.ve/imagenes/logon.png' /><br /><br />
		<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Comentarios: </strong>".$this->comentario."<br />";
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Contacto ".$this->empresa;
		$subject2= "Contacto desde Web ".$this->empresa;
		$basemailfor=$this->correo;
		$basemailfor2="adri220487@gmail.com";
		$basemailfrom = $this->email;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";
		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Contacto desde Web ".$this->empresa);
		$mail->AddAddress($basemailfor2, $this->nombre);
		$mail->Subject = utf8_decode("Contacto desde Web ".$this->empresa);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor2;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$mail2->Send();

		//if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   //mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   //mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		//}
	}

	function enviar_solicitud(){
	    //metodo para el envio desde el formulario de contacto
		$this->mostrar_config(1);
		$this->asignar_ingreso_solicitud();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Comentarios: </strong>".$this->comentario."<br />";
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Nombre del Paquete o Promoción: </strong>".$this->titulo."<br />" ;
		$cuerpo .= "<strong>Tipo de Plan: </strong>".$this->plan."<br />" ;
		$cuerpo .= "<strong>Hotel Seleccionado: </strong>".$this->hotel."<br />" ;
		$cuerpo .= "<strong>Tipo de Habitaci&oacute;n: </strong>".$this->habitacion."<br />" ;
		$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adultos, ".$this->ninos." ni&ntilde;os, con edades: ".$this->edades."<br />";

		if($this->boleto=="Si"){
			$cuerpo .= "<strong>Gesti&oacute;n de Boleto: </strong>".$this->boleto	."<br />" ;
			$cuerpo .= "<strong>Ciudad de Origen: </strong>".$this->origen."<br />" ;
			$cuerpo .= "<strong>Aeropuerto de Salida: </strong>".$this->aeropuerto."<br />" ;
		}

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject= "Solicitud de Reserva ".$this->empresa;
		$subject2= "Solicitud de Reserva desde Web ".$this->empresa;
		$basemailfor=$this->correo;
		$basemailfor2="deledenpena@gmail.com";
		$basemailfrom = $this->email;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";
		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Solicitud de Reserva desde Web ".$this->empresa);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode("Solicitud de Reserva desde Web ".$this->empresa);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();
		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}

	function enviar_cotizacion(){
	    //metodo para el envio desde el formulario de contacto
	    $this->asignar_ingreso3();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".$this->apellido."<br />";
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->correoc."<br />" ;
		$cuerpo .= "<strong>Edad: </strong>".$this->edad."<br />";
		$cuerpo .= "<strong>País: </strong>".$this->pais."<br />";
		$cuerpo .= "<strong>Estado: </strong>".$this->estado."<br />";
		$cuerpo .= "<strong>Direccion: </strong>".$this->direccion."<br />";
		$cuerpo .= "<br />";
		$cuerpo .="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<h2><strong>Nombre del Hotel: </strong>".$_SESSION['reserva'][0][0]['hotel']."</h2><br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "<h4>Detalles de la cotización</h4><br />";

		for($row=0; $row < count($_SESSION['reserva']); $row++){
			for($col=0; $col < count($_SESSION['reserva'][$row]); $col++){
				if(isset($_SESSION['reserva'][$row][$col]['regimen'])){
					if ($col == 0){
						$num= $row + 1;
						$cuerpo .= "<h3>HABITACION ".$num."</h3><br />";
						$cuerpo .= "<strong>Régimen: </strong>".$_SESSION['reserva'][$row][$col]['regimen']."<br />";
						$cuerpo .= "<strong>Tipo de Habitación: </strong>".$_SESSION['reserva'][$row][$col]['ocupacion']."<br />";
						$cuerpo .= "<strong> Adultos: </strong>".$_SESSION['reserva'][$row][$col]['adultos']."<br />";
						if (isset($_SESSION['reserva'][$row][$col]['ninos'])){
							$cuerpo .= "<strong> Niños: </strong>".$_SESSION['reserva'][$row][$col]['ninos']."<br />";
						}elseif (isset($_SESSION['reserva'][$row][$col]['infantes'])) {
							$cuerpo .= "<strong> Infantes: </strong>".$_SESSION['reserva'][$row][$col]['infantes']."<br />";
						}
					}
					$cuerpo .= "<strong>Día: </strong>".$col."<br />";
					$cuerpo .= "<strong>Fecha: </strong>".$_SESSION['reserva'][$row][$col]['fecha']."<br />";
					$cuerpo .= "<strong>Tipo de Tarifa: </strong>".$_SESSION['reserva'][$row][$col]['tipotarifa']."<br />";
					$cuerpo .= "<strong>Precio Adulto: </strong>".$_SESSION['reserva'][$row][$col]['precio']."<br />";
					if(isset($_SESSION['reserva'][$row][$col]['preciochd'])){
						$cuerpo .= "<strong>Precio Niño: </strong>".$_SESSION['reserva'][$row][$col]['preciochd']."<br />";
					}elseif (isset($_SESSION['reserva'][$row][$col]['precioinf'])) {
						$cuerpo .= "<strong>Precio Niño: </strong>".$_SESSION['reserva'][$row][$col]['preciochd']."<br />";
					}
				}
				$cuerpo .="<br />";
			}
			if (isset($_SESSION['reserva'][$row]['subtotal'])){
				$cuerpo .= "<strong>Subtotal = ".$_SESSION['reserva'][$row]['subtotal']." Bs.</strong><br /><br />";
			}
		}

		if(isset($_SESSION['reserva']['traslado'])){
			$cuerpo .= "<h4>Translado</h4><br />";
			$cuerpo .= "<strong>Hora: </strong>".$_SESSION['reserva']['traslado']['hora']."<br />";
			$cuerpo .= "<strong>Dirección: </strong>".$_SESSION['reserva']['traslado']['direccion']."<br />";
			$cuerpo .= "<strong>Adultos: </strong>".$_SESSION['reserva']['traslado']['adultos']."<br />";
			if(isset($_SESSION['reserva']['traslado']['ninos'])){
				$cuerpo .= "<strong>Niños: </strong>".$_SESSION['reserva']['traslado']['ninos']."<br />";
			}
			$cuerpo .= "<strong>Ruta: </strong>".$_SESSION['reserva']['traslado']['ruta']."<br />";
			$cuerpo .= "<strong>Precio Adulto: </strong>".$_SESSION['reserva']['traslado']['costoadt']."<br />";
			$cuerpo .= "<strong>Precio Niño: </strong>".$_SESSION['reserva']['traslado']['costochd']."<br />";
			$cuerpo .= "<strong>Subtotal: ".$_SESSION['reserva']['traslado']['subtotal']."</strong><br />";
		}

		$cuerpo .= "<strong>TOTAL = ".$_SESSION['totalreserva']." Bs </strong>";
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject= "Solicitud de Reserva ".$this->empresa;
		$subject2= "Solicitud de Reserva desde Web ".$this->empresa;
		$basemailfor=$this->correo;
		$basemailfrom = "adri220487@gmail.com";
		
		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Solicitud de Cotizacion desde Web ".$this->empresa);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode("Solicitud de Cotizacion desde Web ".$this->empresa);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode("Solicitud de Cotizacion desde Web ".$this->empresa);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode("Solicitud de Cotizacion desde Web ".$this->empresa);
		$mail2->Body = $cuerpo;
		$mail2->AltBody = $cuerpo;
		$exito2 = $mail->Send();
		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
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

 function guardar_reserva(){//hoteles
	$fecha1=$this->convertir_fecha($this->fecha_ida);
	$fecha2=$this->convertir_fecha($this->fecha_vuelta);
	$sql2="SELECT * FROM operador WHERE cantidad_op = (SELECT MIN(cantidad_op) FROM operador)";
		$consulta2=mysql_query($sql2) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta2);
		$this->email_reserva=$resultado['correo_op'];
		$id=$resultado['id_op'];

		$cantidad=1+$resultado['cantidad_op'];
		$sql="INSERT INTO reserva (cedula_res,nombre_res,telefono_res,fecha1_res,fecha2_res,adulto_res,nino_res,edad_res,observacion_res,operador_res,fecha3_res,lugar_res)VALUES('$this->cedula', '$this->nombre','$this->telefono','$fecha1','$fecha2','$this->adultos','$this->ninos','$this->edades','$this->comentario','$id',CURRENT_TIMESTAMP,'$this->hotel')";
		$consulta=mysql_query($sql) or die(mysql_error());
		$sql2="UPDATE operador SET cantidad_op='$cantidad' WHERE id_op=$id";
		$consulta2=mysql_query($sql2) or die(mysql_error());

}

 function guardar_reserva2(){//productos
	$fecha1=$this->convertir_fecha($this->fecha_ida);
	$fecha2=$this->convertir_fecha($this->fecha_vuelta);

		$sql2="SELECT * FROM operador WHERE cantidad_op = (SELECT MIN(cantidad_op) FROM operador)";
		$consulta2=mysql_query($sql2) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta2);
		$this->email_reserva=$resultado['correo_op'];
		$id=$resultado['id_op'];
		$cantidad=1+$resultado['cantidad_op'];
		$sql="INSERT INTO reserva (cedula_res,nombre_res,telefono_res,fecha1_res,fecha2_res,adulto_res,nino_res,edad_res,observacion_res,operador_res,fecha3_res,lugar_res)VALUES('$this->cedula', '$this->nombre','$this->telefono','$fecha1','$fecha2','$this->adultos','$this->ninos','$this->edades','$this->comentario','$id',CURRENT_TIMESTAMP,'$this->excursion')";
		$consulta=mysql_query($sql) or die(mysql_error());
}
	function enviar_solicitud_hotel(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_hotel();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Documento ID: </strong>".$this->tipo."".$this->cedula."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br/>" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->comentario."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Hotel: </strong>".$this->hotel."<br />" ;
		$cuerpo .= "<strong>Fecha Llegada: </strong>".$this->fecha_ida."<br />" ;
		$cuerpo .= "<strong>Fecha Salida: </strong>".$this->fecha_vuelta."<br />" ;
		if(($this->ninos=="")&&($this->edades=="")){
			$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adulto(s)";
		}else{
			$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adulto(s), ".$this->ninos." ni&ntilde;o(s), con edad(es): ".$this->edades."<br />";
		}
		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject = "Solicitud  de  Reserva Hotelera ".$this->empresa;
		$subject2= "Solicitud de Reserva Hotelera en ".$this->empresa;

		$basemailfrom=$this->email;
		$basemailfor=$this->email_reserva;
		//$basemailfrom = $this->email;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";


		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();

		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}
	function asignar_ingreso_hotel(){
		/* Metodo para asignar valores de los input
		para realizar ingreso o cambio  de contraseña */
		$this->hotel=$_POST['hotel'];
		$this->tipo=$_POST['tipo'];
		$this->cedula=$_POST['cedula'];
		$this->nombre=$_POST['nombre'];
		$this->telefono=$_POST['telefono'];
		$this->email=$_POST['email'];
		$this->fecha_ida=$_POST['fecha_ida'];
		$this->fecha_vuelta=$_POST['fecha_vuelta'];
		$this->adultos=$_POST['adultos'];
		$this->ninos=$_POST['ninos'];
		$this->edades=$_POST['edades'];
		$this->comentario=$_POST['comentario'];

		if(($_POST['comentario']=="")){
			$this->comentario='NO POSEE';

		}
		/*var_dump($this->hotel,$this->tipo,$this->cedula,$this->nombre,$this->telefono,$this->email,$this->fecha_ida,$this->fecha_vuelta,$this->adultos,$this->ninos,$this->edades,$this->comentario);
		exit();*/
	}
	function asignar_ingreso_excursion(){
		/* Metodo para asignar valores de los input
		para realizar ingreso o cambio  de contraseña */
		$this->excursion=$_POST['excursion'];
		$this->tipo=$_POST['tipo'];
		$this->cedula=$_POST['cedula'];
		$this->nombre=$_POST['nombre'];
		$this->telefono=$_POST['telefono'];
		$this->email=$_POST['email'];
		$this->fecha_ida=$_POST['fecha_ida'];
		$this->adultos=$_POST['adultos'];
		$this->ninos=$_POST['ninos'];
		$this->edades=$_POST['edades'];
		$this->comentario=$_POST['comentario'];


		if(($_POST['comentario']=="")){
			$this->comentario='NO POSEE';

		}
/*var_dump($this->excursion,$this->tipo,$this->cedula,$this->nombre,$this->telefono,$this->email,$this->fecha_ida,$this->adultos,$this->ninos,$this->edades,$this->comentario);
		exit();*/
	}
	function enviar_solicitud_paquete(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_excursion();
		$this->guardar_reserva2();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Documento ID: </strong>".$this->tipo."".$this->cedula."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->comentario."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Paquete: </strong>".$this->excursion."<br />" ;
		$cuerpo .= "<strong>Fecha Paquete: </strong>".$this->fecha_ida."<br />" ;
		if(($this->ninos=="")&&($this->edades=="")){
			$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adulto(s)";
		}else{
			$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adulto(s), ".$this->ninos." ni&ntilde;o(s), con edad(es): ".$this->edades."<br />";
		}
		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject= "Solicitud de Reserva de Paquete ".$this->empresa;
		$subject2= "Solicitud de Reserva Paquete ".$this->empresa;
		$subject3= "Solicitud de Reserva de Paquete Copia Mercadeo ".$this->empresa;
		$subject4= "Solicitud de Reserva Paquete Copia Gerencia".$this->empresa;
		$basemailfrom=$this->email;
		//$basemailfor="info@seturs.com";
		$basemailfor=$this->email_reserva;
		//$basemailfrom = $this->email;

		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";
		var_dump($cuerpo);
		var_dump($respuesta);exit;

		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();


		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}
	function enviar_solicitud_crucero(){
	    //metodo para el envio desde el formulario de contacto
		$this->mostrar_config(1);
		$this->asignar_ingreso_excursiones();//en este caso utilizo el mismo porque posee los mismos campos
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Comentarios: </strong>".$this->comentario."<br />";
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Nombre del Paquete o Promoción: </strong>".$this->titulo."<br />" ;
		$cuerpo .= "<strong>Fecha de Embarque: </strong>".$this->fecha_ida."<br />" ;
		$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adultos, ".$this->ninos." ni&ntilde;os, con edades: ".$this->edades."<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject= "Solicitud de Reserva ".$this->empresa;
		$subject2= "Solicitud de Reserva desde Web ".$this->empresa;
		$basemailfor=$this->correo;
		$basemailfor2="deledenpena@gmail.com";
		$basemailfrom = $this->email;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";
		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";
		var_dump($cuerpo);
		var_dump($respuesta);exit;
		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Solicitud de Reserva desde Web ".$this->empresa);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode("Solicitud de Reserva desde Web ".$this->empresa);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();

		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}

	function enviar_solicitud_excursion(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_excursion();
		//$this->guardar_reserva2();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Documento ID: </strong>".$this->tipo."".$this->cedula."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->comentario."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Excursi&oacute;n: </strong>".$this->excursion."<br />" ;
		$cuerpo .= "<strong>Fecha Excursi&oacute;n: </strong>".$this->fecha_ida."<br />" ;
		if(($this->ninos=="")&&($this->edades=="")){
			$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adulto(s)";
		}else{
			$cuerpo .= "<strong>Pasajeros: </strong>".$this->adultos." adulto(s), ".$this->ninos." ni&ntilde;o(s), con edad(es): ".$this->edades."<br />";
		}

		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject= "Solicitud de Reserva de Excursión ".$this->empresa;
		$subject2= "Solicitud de Reserva Excursión ".$this->empresa;
		$basemailfrom=$this->email;
		$basemailfor=$this->correo;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br/><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";


		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";
		//var_dump($cuerpo);
		//var_dump($respuesta);exit;
		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();

		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}
	function enviar_solicitud_servicios(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_excursion();
		$this->guardar_reserva2();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Documento ID: </strong>".$this->tipo."".$this->cedula."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->comentario."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Servicio: </strong>".$this->excursion."<br />" ;
		$cuerpo .= "<strong>Fecha Servicio: </strong>".$this->fecha_ida."<br />" ;
		if(($this->ninos=="")&&($this->edades=="")){
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultos." adulto(s)";
		}else{
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultos." adulto(s), ".$this->ninos." ni&ntilde;o(s), con edad(es): ".$this->edades."<br />";
		}

		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject = "Solicitud  de  Reserva Servicio ".$this->empresa;
		$subject2= "Solicitud de Reserva Servicio en ".$this->empresa;
		$basemailfrom=$this->email;
		//$basemailfor="info@seturs.com";
		$basemailfor=$this->email_reserva;
		//$basemailfrom = $this->email;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";


		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();


		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}

	function enviar_solicitud_promociones(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_excursion();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Documento ID: </strong>".$this->tipo."".$this->cedula."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->email."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->comentario."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Promoción: </strong>".$this->excursion."<br />" ;
		$cuerpo .= "<strong>Fecha Promoción: </strong>".$this->fecha_ida."<br />" ;
		if(($this->ninos=="")&&($this->edades=="")){
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultos." adulto(s)";
		}else{
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultos." adulto(s), ".$this->ninos." ni&ntilde;o(s), con edad(es): ".$this->edades."<br />";
		}

		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject = "Solicitud  de  Reserva Promociones ".$this->empresa;
		$subject2= "Solicitud de Reserva Promociones en ".$this->empresa;

		$basemailfrom=$this->email;
		$basemailfor=$this->correo;

		//$basemailfrom = $this->email;
		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";


		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();

		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}


	function enviar_solicitud_boletos(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_boletos();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Documento ID: </strong>".$this->tipob."".$this->cedulab."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombreb."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefonob."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->emailb."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->comentariob."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Fecha Ida: </strong>".$this->fecha_idab."<br />" ;
		$cuerpo .= "<strong>Fecha Vuelta: </strong>".$this->fecha_vueltab."<br />" ;
		$cuerpo .= "<strong>Origen: </strong>".$this->origenb."<br />" ;
		$cuerpo .= "<strong>Destino: </strong>".$this->fecha_vueltab."<br />" ;
		if(($this->ninos-b=="")&&($this->edades-b=="")){
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultosb." adulto(s)";
		}else{
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultosb." adulto(s), ".$this->ninosb." ni&ntilde;o(s), con edad(es): ".$this->edadesb."<br />";
		}

		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject = "Solicitud de cotizaci&aocute;n de Boletos ".$this->empresa;

		$basemailfrom=$this->emailb;
		$basemailfor=$this->correo;

		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombreb." ".$this->apellidob."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";


		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();
		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}

	function enviar_solicitud_traslado(){
	    //metodo para el envio desde el formulario de contacto

		$this->mostrar_config(1);
		$this->asignar_ingreso_traslado();
		$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />
		<u>DATOS DEL CLIENTE:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".$this->apellido."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->telefono."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->correo2."<br />" ;
		$cuerpo .= "<strong>Observaciones: </strong>".$this->observacion."<br />" ;
		$cuerpo .= "<br />";
		$cuerpo .= "----  DATOS DE SOLICITUD  ----";
		$cuerpo .= "<br />";
		$cuerpo .= "<strong>Fecha Transaldo: </strong>".$this->fecha."<br />" ;
		$cuerpo .= "<strong>Origen: </strong>".$this->origen."<br />" ;
		$cuerpo .= "<strong>Destino: </strong>".$this->destino."<br />" ;
		if($this->ninos==""){
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultos." adulto(s)";
		}else{
			$cuerpo .= "<strong>Clientes: </strong>".$this->adultos." adulto(s), ".$this->ninos." ni&ntilde;o(s)<br />";
		}

		$cuerpo .= "<br />";

		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";

		$subject = "Solicitud de Traslado ".$this->empresa;

		$basemailfrom=$this->correo2;
		$basemailfor=$this->correo;

		$respuesta ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) ".$this->nombre." ".$this->apellido."</strong>,<br /><br />

		Hemos recibido satisfactoriamente su solicitud y ser&aacute; procesada a la brevedad. Durante las pr&oacute;ximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n.<br /><br />

		&iexcl;Gracias por contactarnos!<br /><br />

		Tibisay Hotel Boutique<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";

		//echo "From: ".$basemailfrom."<br />";
		//echo "For: ".$basemailfor."<br />";


		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";

		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode($subject);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode($subject);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();

		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode($subject2);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode($subject2);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();
		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );

		}*/
	}


	function recuperar_clave(){
	    //metodo para el envio desde el formulario de contacto
		$this->mostrar_config(1);
		if(!isset($_POST['cedula']) || $_POST['cedula']==""){
			header("location:recuperar_clave.php?msg=3");
			exit();
		}else{
			$cedula=$_POST['cedula'];
		}
		if(!isset($_POST['correo']) || $_POST['correo']==""){
			header("location:recuperar_clave.php?msg=4");
			exit();
		}else{
			$correo=$_POST['correo'];
		}
/* 		echo("Aqui llego");
		exit(); */
		$sql="SELECT * FROM registro WHERE cedula_reg='$cedula' AND correo_reg='$correo'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if(!$resultado=mysql_fetch_array($consulta)){
			header("location:recuperar_clave.php?msg=5");
			exit();
		}else{
			$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />";
			$cuerpo .="<U>SUS DATOS DE USUARIO:</U><br />";
			$cuerpo .="<br />";
			$cuerpo .= "<strong>Nombre: </strong>".$resultado['nombre_reg']."<br />" ;
			$cuerpo .= "<strong>Apellido: </strong>".$resultado['apellido_reg']."<br />" ;
			$cuerpo .= "<strong>Usuario: </strong>".$resultado['login_reg']."<br />" ;
			$cuerpo .= "<strong>Clave: </strong>".$resultado['clave_reg']."<br />" ;
			$cuerpo .= "<br />";
			$cuerpo .= "----  FIN DATOS  ----";
			$cuerpo .= "<br />";
			$subject= "Recuperación de clave ".$this->empresa;
			$redir= "recuperar_clave.php?msg=6";
			$basemailfrom=$this->correo;
			$basemailfor = $correo;

			$mail = new PHPMailer(true);
			$mail->From = $basemailfrom;
			$mail->FromName = utf8_decode("Recuperación de clave ".$this->empresa);
			$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
			$mail->Subject = utf8_decode("Recuperación de clave ".$this->empresa);
			$mail->Body = $cuerpo;
			$mail->AltBody = $cuerpo;
			$exito = $mail->Send();

			//mail ("$basemailfor", "$subject", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );
			//print "<meta HTTP-EQUIV=REFRESH CONTENT=$cuerpo>";
			print "<meta HTTP-EQUIV=REFRESH CONTENT=1;URL=$redir>";
		}
	}

	function correo_suscripcion($correo_envio){
	    //metodo para el envio desde el formulario de contacto
		$this->mostrar_config(1);
		if(!isset($correo_envio) || $correo_envio==""){
			header("location:index.php?msg=4");
			exit();
		}else{
			$correo=$correo_envio;
		}
/* 		echo("Aqui llego");
		exit(); */

			$cuerpo ="<img src='".$this->website."/imagenes/logon.png' /><br /><br />

		<strong>Estimado(a) Usuario</strong>,<br /><br />

		Hemos recibido satisfactoriamente su suscripci&oacute;n. Muy pronto estaremos inform&aacute;ndole sobre nuestras ofertas y promociones directamente a su direcci&oacute;n de correo.<br /><br />

		&iexcl;Gracias por suscribirse!<br /><br />

		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: +58 274 2441729 / 2444455 <br />
		Facebook: <a href='https://www.facebook.com/tibisayhotelboutique'>Tibisay Hotel Boutique</a><br />
		Twitter: <a href='https://twitter.com/TibisayHotel'>@TibisayHotel</a><br />
		Instagram: <a href='https://www.instagram.com/tibisayhotelboutique/'>tibisayhotelboutique</a>";
		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";



			$subject= "Suscripción en ".$this->empresa;
			$basemailfrom=$this->correo;
			$basemailfor = $correo;

			$mail = new PHPMailer(true);
			$mail->From = $basemailfrom;
			$mail->FromName = utf8_decode($subject);
			$mail->AddAddress($basemailfor);
			$mail->Subject = utf8_decode($subject);
			$mail->Body = $cuerpo;
			$mail->AltBody = $cuerpo;
			$exito = $mail->Send();

			//mail ("$basemailfor", "$subject", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );
			//print "<meta HTTP-EQUIV=REFRESH CONTENT=$cuerpo>";

	}

	function validar_ip($ip, $id){
		//metodo para el registroy evaluació de IP de usuario
		$sql="SELECT * FROM ipusuario WHERE registro_ip='$id' AND numero_ip='$ip'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado=mysql_fetch_array($consulta)){
			$_SESSION['preguntas']="si";
			$sql2="INSERT INTO ipusuario VALUES ('', '$id', '$ip', NOW())";
			$consulta2=mysql_query($sql2) or die(mysql_error());
		}else{
			$_SESSION['preguntas']="no";

			$_SESSION['val']='preguntas';
			//$_SESSION['tarjeta_id']=$_GET['id'];
			$_SESSION['volver']=$_SERVER['PHP_SELF'];
			header("location:preguntas_seguridad.php");
			exit();
		}
	}

	function validar_ip2($ip, $id){
		//metodo para el registroy evaluació de IP de usuario
		$_SESSION['preguntas']="no";
		$_SESSION['volver']=$_SERVER['PHP_SELF'];
		//echo "En validar ip: ".$_SESSION['volver'];
		header("location:preguntas_seguridad.php");
		exit();
	}

	function nivel_acceso($num,$tipo){
		if ($tipo=="distinto"){
			if (isset($_SESSION['nivel_temp']) && $_SESSION['nivel_temp']!=$num){
				header("location: /admin/panel_central.php?msg=2");
				exit();
			}
		}else if($tipo=="igual"){
			if (isset($_SESSION['nivel_temp']) && $_SESSION['nivel_temp']==$num){
				header("location: /admin/panel_central.php?msg=2");
				exit();
			}
		}
	}

	function insertar_suscripcion($correo){
	/*Metodo para editar un usuario seleccionado */
		$sql="SELECT * FROM suscripcion WHERE correo_sus='$correo'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado=mysql_fetch_array($consulta)){
			$this->mensaje=1;
		}else{
			$sql2="INSERT INTO suscripcion VALUES ('', '$correo', NOW())";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$this->correo_suscripcion($correo);
			header("location:/index.php");
		}
	}

	function listar_suscripcion(){

	  $sql="SELECT * FROM suscripcion";
	  $consulta=mysql_query($sql) or die(mysql_error());
	  while($resultado=mysql_fetch_array($consulta)){
		$this->listado[] = $resultado;
		$this->mensaje='si';
	  }
	}
	function borrar_suscripcion(){
	   $id=$_GET['id'];
	  $sql="DELETE FROM suscripcion WHERE id_sus='$id'";
	  $consulta=mysql_query($sql) or die(mysql_error());
	  header("location:/admin/suscripcion/");

	}
}
?>

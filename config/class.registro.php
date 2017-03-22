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

class Registro extends Config{
	var $nombre;
	var $apellido;
	var $cedula;
	var $tipo;
	var $sexo;
	var $correo;
	var $correo2;
	var $telefono;
	var $celular;
	var $pais;
	var $estado;
	var $municipio;
	var $direccion;
	var $nacimiento;
	var $lugar;
	var $website;
	var $login;
	var $clave;
	var $confirmar;
	var $publicidad;
	var $medio;
	var $listado;
	var $buscar;
	var $mensaje;
	var $accion;
	var $acepto;
	var $catalogo;
	var $categoria;
	
	function Registro(){// Constructor
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
		$this->acepto=$_POST['acepto'];
		$this->categoria=$_POST['categoria'];
		$this->nombre=$_POST['nombre'];
		$this->apellido=$_POST['apellido'];
		$this->sexo=$_POST['sexo'];
		$this->nacimiento=$_POST['nacimiento'];
		$this->lugar=$_POST['lugar'];
		$this->cedula=$_POST['cedula'];
		$this->tipo=$_POST['tipo'];
		$this->direccion=$_POST['direccion'];
		$this->correo=$_POST['correo'];
		$this->correo2=$_POST['correo2'];
		$this->telefono=$_POST['telefono'];
		$this->celular=$_POST['celular'];
		$this->pais=$_POST['pais'];
		$this->estado=$_POST['estado'];
		$this->municipio=$_POST['municipio'];
		$this->website=$_POST['website'];
		$this->login=$_POST['login2'];
		$this->clave=$_POST['clave2'];
		$this->confirmar=$_POST['confirmar'];
		$this->publicidad=$_POST['publicidad'];
		$this->medio=$_POST['medio']; 
		$this->catalogo=$_POST['catalogo'];
		
		$this->nombre= strtolower($this->nombre);
		$this->correo= strtolower($this->correo);
		$this->correo2= strtolower($this->correo2);
		$this->apellido= strtolower($this->apellido);
		$this->ciudad= strtolower($this->ciudad);
		$this->pais= strtolower($this->pais);
		$this->estado= strtolower($this->estado);
		$this->direccion= strtolower($this->direccion);
		$this->nombre=ucwords($this->nombre); 
		$this->apellido=ucwords($this->apellido);
		$this->ciudad=ucwords($this->ciudad);
		$this->pais=ucwords($this->pais);
		$this->estado=ucwords($this->estado);
		$this->direccion=ucwords($this->direccion);
	}
	
	function asignar_valores2(){
		/* Metodo para recibir valores del exterior. */
		$this->clavenueva=$_POST['clavenueva'];
		$this->actual=$_POST['actual'];
		$this->confirmar=$_POST['confirmar'];
	}
	
	function listar_registro(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT *, id_reg AS edad FROM registro WHERE
			(nombre_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			apellido_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			cedula_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			tipo_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			estado_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			pais_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			direccion_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			correo_reg LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			correo2_reg LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY id_reg DESC";
		}else{
			$sql="SELECT * FROM registro ORDER BY id_reg DESC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			//echo $resultado['nacimiento_reg'];
			//$resultado['edad']=date("Y-m-d")-$resultado['nacimiento_reg'];
			$resultado['estado_reg']=$this->buscar_estado($resultado['estado_reg']);
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function mostrar_registro(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_SESSION['id_temporal']) && $_SESSION['id_temporal']!="")
			$id=$_SESSION['id_temporal'];
		else if(isset($_GET['id']) && $_GET['id']!="")
		    $id=$_GET['id'];
			$sql="SELECT * FROM registro WHERE id_reg='$id'";
			$consulta=mysql_query($sql);
			$resultado = mysql_fetch_array($consulta);
			$this->categoria=$resultado['categoria_reg'];
			$this->nombre=$resultado['nombre_reg'];
			$this->apellido=$resultado['apellido_reg'];
			$this->sexo=$resultado['sexo_reg'];
			$this->nacimiento=$this->convertir_fecha($resultado['nacimiento_reg']);
			$this->lugar=$resultado['lugar_reg'];
			$this->tipo=$resultado['tipo_reg'];
			$this->cedula=$resultado['cedula_reg'];
			$this->direccion=$resultado['direccion_reg'];
			$this->correo=$resultado['correo_reg'];
			$this->correo2=$resultado['correo2_reg'];
			$this->telefono=$resultado['telefono_reg'];
			$this->celular=$resultado['celular_reg'];
			$this->pais=$resultado['pais_reg'];
			$this->estado=$resultado['estado_reg'];
			$this->municipio=$resultado['municipio_reg'];
			$this->website=$resultado['website_reg'];
			$this->login=$resultado['login_reg'];
			$this->publicidad=$resultado['publicidad_reg'];
			$this->medio=$resultado['medio_reg'];
			$this->catalogo=$resultado['catalogo_reg'];
		 
	}
	
	function insertar_registro(){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Registro de Nuevos Usuarios";
		if (isset($_POST['envio']) && $_POST['envio']=="Registrarse"){
			$this->asignar_valores();
			if($this->clave!=$this->confirmar){
				$this->mensaje=2;
			}else{
				$sql="SELECT * FROM registro WHERE login_reg='$this->login' OR cedula_reg='$this->cedula'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if($resultado=mysql_fetch_array($consulta)){
					$this->mensaje=1;
				}else{
					$this->nacimiento=$this->convertir_fecha($this->nacimiento);
					$sql="INSERT INTO registro VALUES ('', '$this->categoria', '$this->tipo', '$this->cedula', '$this->nombre', '$this->apellido', '$this->sexo', '$this->nacimiento', '$this->lugar', '$this->direccion', '$this->correo', '$this->correo2', '$this->telefono', '$this->celular', '$this->pais', '$this->estado', '$this->municipio', '$this->website', '$this->login', '$this->clave', '$this->publicidad', '$this->medio', 'No')";
					$consulta=mysql_query($sql) or die(mysql_error());
					$this->enviar_correos();
					header("location:/admin/registro/");
				}
			}
		}			
	}
	
	function insertar_registro_publico(){
		
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Registro de Nuevos Usuarios";
		if (isset($_POST['envio']) && $_POST['envio']=="Registrarse"){
			$this->asignar_valores();
			
				$sql="SELECT * FROM registro WHERE  cedula_reg='$this->cedula'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if($resultado=mysql_fetch_array($consulta)){
					$this->mensaje=1;
				}elseif($this->acepto =='No'){
					
					$this->mensaje=4;
				}else{
					//$this->nacimiento=$this->convertir_fecha($this->nacimiento);
					$sql="INSERT INTO registro VALUES ('','', '$this->tipo', '$this->cedula', '$this->nombre', '$this->apellido', '$this->sexo', '', '', '', '$this->correo', '', '', '$this->celular','','','', '', '','', '', '$this->medio', '$this->acepto')";
					
					$consulta=mysql_query($sql) or die(mysql_error());
					$this->enviar_correos();
					if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
						$this->login2($this->login, $this->clave);
						header("location: finalizar.php");
   						exit();
					}else{
						header("location:/autenticar.php?msg=ok");
						exit();
					}
				}
			}
		}			
	
	
	function insertar_registro_publico2(){
	/*Metodo para editar un usuario seleccionado */	
		$this->asignar_valores();
		$this->clave=$this->generar_clave();
		$this->login=$this->correo;
		
		$sql="SELECT * FROM registro WHERE login_reg='$this->login' OR cedula_reg='$this->cedula'";
		$consulta=mysql_query($sql) or die(mysql_error());
		if($resultado=mysql_fetch_array($consulta)){
			$this->mensaje=1;
		}else{
			//$this->nacimiento=$this->convertir_fecha($this->nacimiento);
			$sql="INSERT INTO registro VALUES ('', '$this->categoria', '$this->tipo', '$this->cedula', '$this->nombre', '$this->apellido', '$this->sexo', '$this->nacimiento', '$this->lugar', '$this->direccion', '$this->correo', '$this->correo2', '$this->telefono', '$this->celular', '$this->pais', '$this->estado', '$this->municipio', '$this->website', '$this->login', '$this->clave', '$this->publicidad', '$this->medio', 'No')";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->enviar_correos();
			if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
				$this->login2($this->login, $this->clave);
				header("location: finalizar.php");
				exit();
			}else{
				header("location:/autenticar.php?msg=ok");
				exit();
			}
		}
		
					
	}
	
	function editar_registro(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Mi Perfil";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_SESSION['id_temporal']) && $_SESSION['id_temporal']!=""){
			$id=$_SESSION['id_temporal'];
			$this->asignar_valores();
			$this->nacimiento=$this->convertir_fecha($this->nacimiento);
			$sql="UPDATE registro SET categoria_reg='$this->categoria', nombre_reg='$this->nombre', apellido_reg='$this->apellido', sexo_reg='$this->sexo', nacimiento_reg='$this->nacimiento', lugar_reg='$this->lugar', tipo_reg='$this->tipo', cedula_reg='$this->cedula', correo_reg='$this->correo', correo2_reg='$this->correo2', telefono_reg='$this->telefono', celular_reg='$this->celular', direccion_reg='$this->direccion', pais_reg='$this->pais', estado_reg='$this->estado', municipio_reg='$this->municipio', website_reg='$this->website' , publicidad_reg='$this->publicidad', medio_reg='$this->medio' WHERE id_reg='$id'";
			//importante
			$_SESSION['editar_usuario']="no";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->nacimiento=$this->convertir_fecha($this->nacimiento);
			$this->mensaje=2;
			//header("location:/perfil.php");
			
		}else{
		  $this->mostrar_registro();
		}
	}
	
	function editar_registro2(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editar Registro de Cliente";
		if (isset($_POST['envio']) && $_POST['envio']=="Actualizar"){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->nacimiento=$this->convertir_fecha($this->nacimiento);
			$sql="UPDATE registro SET categoria_reg='$this->categoria', nombre_reg='$this->nombre', apellido_reg='$this->apellido', sexo_reg='$this->sexo', nacimiento_reg='$this->nacimiento', lugar_reg='$this->lugar', tipo_reg='$this->tipo', cedula_reg='$this->cedula', correo_reg='$this->correo', correo2_reg='$this->correo2', telefono_reg='$this->telefono', celular_reg='$this->celular', direccion_reg='$this->direccion', pais_reg='$this->pais', estado_reg='$this->estado', municipio_reg='$this->municipio', website_reg='$this->website' , publicidad_reg='$this->publicidad', medio_reg='$this->medio', catalogo_reg='$this->catalogo' WHERE id_reg='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$this->mensaje=2;
			//header("location:/perfil.php");
			
		}else{
		  $this->mostrar_registro();
		}
	}
	
	function editar_clave(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Mi Clave";
		if (isset($_POST['envio']) && $_POST['envio']=="Cambiar"){
			$id=$_SESSION['id_temporal'];
			$this->asignar_valores2();
			$size=strlen($this->clavenueva);
			$sql="SELECT * FROM registro WHERE id_reg='$id' AND clave_reg='$this->actual'";
			$consulta=mysql_query($sql) or die(mysql_error());
			if(!$resultado=mysql_fetch_array($consulta)){
				$this->mensaje=1;
			}else if($size<=3){
					$this->mensaje=3;
			}else if($this->clavenueva==$this->confirmar){
				$sql="UPDATE registro SET clave_reg='$this->clavenueva' WHERE id_reg='$id'";
				$consulta=mysql_query($sql) or die(mysql_error());
				header("location:/panel_usuario.php?msg=3");
			}else{
				$this->mensaje=2;
			}
			
		}
	}
	
	function eliminar_registro(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM registro WHERE id_reg='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="SELECT * FROM pedidos WHERE cliente_ped='$id'";
		$buscar=mysql_query($sql) or die(mysql_error());
		while($resultado=mysql_fetch_array($buscar)){
			$pedido=$resultado['id_ped'];
			$sql="DELETE FROM detalle_pedido WHERE pedido_det='$pedido'";
			$borrar=mysql_query($sql) or die(mysql_error());
		}
		$sql="DELETE FROM pedidos WHERE cliente_ped='$id'";
		$eliminar=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/registro/");
	}
	
	function enviar_correos(){
	    //metodo para el envio de correos de aviso cuando se registran
		if(!isset($config))
			$config= new Config;
		$config->mostrar_config(1);
		
		$cuerpo ="<img src='".$config->website."/imagenes/logon.jpg' /><br /><br />";
		$cuerpo .="<u>DATOS INGRESADOS:</u><br />";
		$cuerpo .="<br />";
		$cuerpo .= "<strong>C&eacute;dula: </strong>".$this->tipo."".$this->cedula."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".$this->nombre."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".$this->apellido."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fono: </strong>".$this->celular."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$this->correo."<br />" ;
		$cuerpo .= "<strong>Encontr&oacute; la Web a trav&eacute;s: </strong>".$this->medio."<br /><br />";
		
		$cuerpo .= "<br />";
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		$subject= "Nuevo Registro en ".$config->empresa;
		$subject2= "Nuevo Registro en ".$config->empresa;
		//$basemailfor=$config->correo;
		$basemailfor="deledenpena@gmail.com";
		$basemailfrom = $this->correo;
		$respuesta ="<img src='".$config->website."/imagenes/logon.jpg' /><br /><br />
		<strong>Reciba un cordial saludo: $this->nombre $this->apellido</strong><br /><br />
		Usted se encuentra ya registrado en nuestro sistema.<br />
		
		<br><br>
		Bienvenido! 
		<br><br> 
		&iexcl;Gracias por confiar en ".$config->empresa.".
		<br /><br /> 
		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Teléfonos: + 58. 295. 266.11.16| + 58. 295. 266.00.70 <br />
		Facebook: <a href='https://www.facebook.com/setursvenezuela/?fref=ts'>Seturs</a><br />
		Twitter: <a href='https://twitter.com/setursvenezuela'>@setursvenezuela</a><br />
		Instagram: <a href='https://www.instagram.com/setursvenezuela/'>setursvenezuela</a>";
		$this->mensaje="Su mensaje ha sido enviado satisfactoriamente!";
		
		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Nueva Cuenta en ".$config->empresa);
		$mail->AddAddress($basemailfor, $this->nombre." ".$this->apellido);
		$mail->Subject = utf8_decode("Nueva Cuenta en ".$config->empresa);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();
		
		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode("Nueva Cuenta en ".$config->empresa);
		$mail2->AddAddress($basemailfrom, $this->nombre." ".$this->apellido);
		$mail2->Subject = utf8_decode("Nueva Cuenta en ".$config->empresa);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();
		
		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   
		}*/
	}
	
	function listar_estados(){
		/* Metodo para listar los estados y sus opciones. */
		$sql="SELECT * FROM estado ORDER BY id_est ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_municipios($id){
		/* Metodo para listar los municipios y sus opciones. */
		$sql="SELECT * FROM municipio WHERE estado_mun='$id' ORDER BY nombre_mun ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado2[] = $resultado;
		}
	}
	
	function listar_aeropuertos(){
		/* Metodo para listar los estados y sus opciones. */
		$sql="SELECT * FROM aeropuerto ORDER BY nombre_aero, id_aero ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function buscar_estado($id){
	/*Metodo para obtener el nombre de un estado */	
		$sql="SELECT nombre_est FROM estado WHERE id_est='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_est'];
	}
	
	function login2($_login, $_password){
		// Metodo de ingreso al sistema de Usuarios Normales
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
			$___login = $fila_login["login_reg"];
			$_SESSION['nombre_temporal'] = $fila_login["nombre_reg"];
			$_SESSION['apellido_temporal'] = $fila_login["apellido_reg"];
			$_SESSION['id_temporal'] = $fila_login["id_reg"];
			$_SESSION['catalogo_temporal'] = $fila_login["catalogo_reg"];
			$_SESSION['preguntas'] = "no";
			
			//mysql_query ("UPDATE usuarios SET last_login = curdate() 
			//WHERE login = $___login");
			//if($_SESSION['_url'])
		}
	}
	
	function generar_clave(){
		//funcion para generar una clave aleatoria
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@|!$%&/()=?¿*-_#";
		$cad = "";
		for($i=0;$i<12;$i++) {
			$cad .= substr($str,rand(0,78),1);
		}
		
		return $cad;
	}
}
?>
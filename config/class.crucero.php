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

class Crucero{
	var $codigo;
	var $nombre;
	var $categoria;
	var $id;
	var $id_cat;
	var $prioridad;
	var $descripcion;
	var $condiciones;
	var $claves;
	var $vistas;
	var $fecha;
	var $disponible;
	//--------------
	var $listado;
	var $listado2;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $ruta;
	var $suiche;
	var $accion;
	
	
	function Crucero(){// Constructor
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
		$this->codigo=$_POST['codigo'];
		$this->nombre=$_POST['nombre'];
		$this->categoria=$_POST['categoria'];
		$this->prioridad=$_POST['prioridad'];
		$this->descripcion=$_POST['descripcion'];
		$this->condiciones=$_POST['condiciones'];
		$this->claves=$_POST['claves'];
		$this->fecha=$_POST['fecha'];
		$this->disponible=$_POST['disponible'];
	}
	
	function listar_crucero(){
		/* Metodo para listar los cruceros y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM crucero, categoria WHERE id_cat=categoria_cru AND
			(nombre_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			prioridad_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR
			codigo_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			descripcion_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			claves_cru LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY disponible_cru, prioridad_cru, categoria_cru ASC";
		}else{
			$sql="SELECT * FROM crucero, categoria WHERE id_cat=categoria_cru ORDER BY disponible_cru, prioridad_cru, categoria_cru ASC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->suiche=false;
			$this->ruta="";
			$resultado['nombre_cat']="";
			$this->buscar_ruta_nodo($resultado['categoria_cru']);
			for($i=count($this->ruta)-1;$i>=0;$i--){
				$resultado['nombre_cat'].=" &raquo; ".$this->ruta[$i]['nombre_cat'];
			}
			$this->listado[] = $resultado;
		}
	}
	
	function listar_crucero_categoria($lim){
		/* Metodo para listar los cruceros de forma limitada. */
		$sql="SELECT * FROM crucero, imagen WHERE galeria_image=id_cru AND tabla_image='crucero' GROUP BY id_cru DESC ORDER BY categoria_cru DESC, prioridad_cru ASC LIMIT 0 , $lim";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_pro']=$this->convertir_fecha($resultado['fecha_pro']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_crucero_imagen($cat){
		/* Metodo para listar los cruceros con imagen. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM crucero, imagen WHERE galeria_image=id_cru AND tabla_image='crucero' AND disponible_cru='1' AND 
			(categoria_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 
	        prioridad_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR
			nombre_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			codigo_cru LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			claves_cru LIKE '%' '".$_SESSION['buscar']."' '%') 
			GROUP BY id_cru ORDER BY categoria_cru, prioridad_cru ASC";
		}else{
			$sql="SELECT * FROM crucero, imagen WHERE galeria_image=id_cru AND tabla_image='crucero' AND disponible_cru='1' GROUP BY id_cru ORDER BY categoria_cru, prioridad_cru ASC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			setlocale(LC_ALL, 'es_ES');
			//$resultado['nombre_pro']=ucwords(strtolower($resultado['nombre_pro']));
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				
			$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_cru']);
			
			$this->descripcion=$resultado['descripcion_cru'];
			$resultado['descripcion_cru']=strip_tags($resultado['descripcion_cru']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_crucero_nuevo(){
		/* Metodo para listar los cruceros nuevos y sus opciones. */
		$sql="SELECT claves_cru, categoria_cru, id_cru, directorio_image, nombre_image, nombre_cru, descripcion_cru  FROM crucero, imagen WHERE galeria_image=id_cru AND tabla_image='crucero' GROUP BY id_cru ORDER BY RAND() LIMIT 0 , 10";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$aux="";
			$this->mensaje="si";
			$resultado['descripcion_cru']=strip_tags($resultado['descripcion_cru']);
			
			$cat=$resultado['categoria_cru'];
			$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$resultado2 = mysql_fetch_array($consulta2);
			$aux=$this->modificar_url($resultado2['claves_cru']);
			$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_cru']);
			$this->listado[] = $resultado;
		}
	}
	
	function buscar_ruta_nodo($id){
		/* Metodo para listar las categorias de categorias. */
		$sql2="SELECT id_cat,nombre_cat,padre_cat FROM categoria WHERE id_cat='$id'";
		$buscar=mysql_query($sql2)	or die(mysql_error());
		$resultados=mysql_fetch_array($buscar);
		if($this->suiche==false){
			$this->ruta[]=$resultados;
			if($resultados['padre_cat']==0) $this->suiche=true;
			$this->buscar_ruta_nodo($resultados['padre_cat']);
		}
	}
	
	function mostrar_crucero(){
		/*Metodo para mostrar un crucero seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM crucero WHERE id_cru='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			setlocale(LC_ALL, 'es_ES');
			//$this->nombre=ucwords(strtolower($resultado['nombre_pro']));
			
			$this->suiche=false;
			$this->ruta=""; $this->categoria="";
			$this->buscar_ruta_nodo($resultado['categoria_cru']);
			for($i=count($this->ruta)-1;$i>=0;$i--){
				$this->categoria.=" &raquo; ".$this->ruta[$i]['nombre_cat'];
			}
			
			$this->id=$id;
			$this->nombre=$resultado['nombre_cru'];
			$this->codigo=$resultado['codigo_cru'];
			$this->id_cat=$resultado['categoria_cru'];
			$this->prioridad=$resultado['prioridad_cru'];
			$this->vistas=$resultado['vistas_cru'];
			$this->fecha=$resultado['fecha_cru'];
			$this->descripcion=$resultado['descripcion_cru'];
			$this->condiciones=$resultado['condiciones_cru'];
			$this->claves=$resultado['claves_cru'];
			$this->disponible=$resultado['disponible_cru'];
		
		} 
	}
	
	function mostrar_crucero_publico($id){
		/*Metodo para mostrar un crucero seleccionado en la parte pública */
		
		$sql="SELECT * FROM crucero WHERE id_pro='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		setlocale(LC_ALL, 'es_ES');
		//$this->nombre=ucwords(strtolower($resultado['nombre_pro']));
		
		$this->suiche=false;
		$this->ruta=""; $this->categoria="";
		$this->buscar_ruta_nodo($resultado['categoria_cru']);
		for($i=count($this->ruta)-1;$i>=0;$i--){
			$this->categoria.=" &raquo; ".$this->ruta[$i]['nombre_cat'];
		}
		
		$this->id=$id;
		$this->nombre=$resultado['nombre_cru'];
		$this->codigo=$resultado['codigo_cru'];
		$this->id_cat=$resultado['categoria_cru'];
		$this->prioridad=$resultado['prioridad_cru'];
		$this->vistas=$resultado['vistas_cru'];
		$this->fecha=$resultado['fecha_cru'];
		$this->descripcion=$resultado['descripcion_cru'];
		$this->condiciones=$resultado['condiciones_cru'];
		$this->claves=$resultado['claves_cru'];
		$this->disponible=$resultado['disponible_cru'];
	
	}
	
	function insertar_crucero($con){
	/*Metodo para editar un crucero seleccionado */	
		$this->accion="Datos del Nuevo Crucero";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="SELECT nombre_cru FROM crucero WHERE nombre_cru='$this->nombre'";
			$verificar=mysql_query($sql) or die(mysql_error());
			if(!$resultado = mysql_fetch_array($verificar)){
				$this->codigo=$this->crear_codigo($this->categoria,"");
				//$this->fecha=$this->convertir_fecha($this->fecha);
				$sql="INSERT INTO crucero VALUES ('', '$this->codigo', '$this->nombre', '$this->categoria', '$this->prioridad', '$this->descripcion', '$this->condiciones', '$this->claves', '0', NOW(), '0')";
				$consulta=mysql_query($sql) or die(mysql_error());
				$id=mysql_insert_id($con);
				header("location:/admin/crucero/detalle.php?id=$id");
			}else{
				$this->mensaje2="error";
			}
		}
		$sql="SELECT * FROM categoria ORDER BY prioridad_cat ASC";
		$consulta=mysql_query($sql)or die(mysql_error());;
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function editar_crucero(){
	/*Metodo para editar un crucero seleccionado */		
		$this->accion="Editando Datos del Crucero";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			//$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="UPDATE crucero SET nombre_cru='$this->nombre', categoria_cru='$this->categoria', prioridad_cru='$this->prioridad', descripcion_cru='$this->descripcion', condiciones_cru='$this->condiciones', claves_cru='$this->claves', disponible_cru='$this->disponible' WHERE id_cru='$id'";
		
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/crucero/");
		}else{ 
		  $this->mostrar_crucero();
		  $sql="SELECT * FROM categoria WHERE tipo_cat='cruceros' ORDER BY prioridad_cat ASC";
		  $consulta=mysql_query($sql) or die(mysql_error());
		  while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
		  }
		}
	}
	
	function eliminar_crucero(){
	/*Metodo para eliminar un crucero seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM crucero WHERE id_cru='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		//Eliminamos las imagenes
		$sql="SELECT id_image, directorio_image, nombre_image FROM imagen WHERE galeria_image='$id' AND tabla_image='crucero' AND nombre_image!='mapa'";
		$consulta2=mysql_query($sql) or die(mysql_error());
		while($resultado2=mysql_fetch_array($consulta2)){
			$directorio="../../imagenes/".$resultado2['directorio_image'];
			//eliminamos el registro de la imagen
			$id_imagen=$resultado2['id_image'];
			$sql="DELETE FROM imagen WHERE id_image='$id_imagen'";
			$qr_eliminar=mysql_query($sql) or die(mysql_error());
			//borramos la imagen del directorio
			unlink($directorio);
			if($resultado2['nombre_image']=="logo"){
				$directorio2="../../imagenes/".$this->modificar_url($resultado2['directorio_image']);
				unlink($directorio2);
			}
		}
		
		header("location:/admin/crucero/");
	}
	
	function buscar_categorias($id){
	/*Metodo para buscar el nombre de la categoria */	
		$this->asignar_valores();
		$sql="SELECT * FROM subxcat, subcategoria WHERE categoria_rel='$id' AND subcategoria_rel=id_sub ORDER BY prioridad_sub";
		$buscar=mysql_query($sql) or die(mysql_error());
		unset($this->listado2);
		while ($resultado = mysql_fetch_array($buscar)){
			$this->mensaje="si";
			$this->listado2[] = $resultado;
		}
	}
	
	function get_categoria($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_cat FROM categoria WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_cat'];
	}
	
		function get_subcategoria($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_sub FROM subcategoria WHERE id_sub='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_sub'];
	}
	
	function crear_codigo($cat,$sub){
	/*Metodo para crear códigos de cruceros */
		$cat=$this->get_categoria($cat);
		$codigo="STC-";
		$codigo.=$cat[0];
		$codigo.=$cat[1];
		$codigo=strtoupper($codigo);
		$codigo.=".";
		//$sql="SELECT COUNT(*) AS total FROM clasificado";
		$sql="SELECT MAX(id_pro) AS total FROM producto";
		$count=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_array($count);
		$total=$row['total'];
		$total++;
		if($total<=999 && $total>=100){
			$valor="0";
			$valor.=$total;
		} else if($total<=99 && $total>=10){
			$valor="00";
			$valor.=$total;
		} else if($total<=9){
			$valor="000";
			$valor.=$total;
		}else{
			$valor=$total;
		}
		$codigo.=$valor;
		
		return $codigo;
	}
	
	function editar_estado(){
	/*Metodo para editar estatus de un crucero seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE crucero SET disponible_cru='$valor' WHERE id_cru='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location:/admin/crucero/");
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
	
	function mostrar_precio($precio){
	/*Metodo para colocar los puntos al precio */
		$cantidad=strlen($precio);
		$variable_cadena = (string)$precio;
		
		$nuevo=""; $num=0;
		for($i=$cantidad;$i>0;$i--){
			if($num>=3){
				$num=0;
				$nuevo.=".";
			}
			$nuevo.=$variable_cadena[$i-1];
			$num++;
		}
		$temp="";
		for($i=strlen($nuevo);$i>=0;$i--){
			$temp.=$nuevo[$i];
		}
		
		return $temp; 
	}
	
	function visita_crucero(){
		/*Metodo para sumar una visita a un crucero específico */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="UPDATE crucero SET vistas_cru=vistas_cru+1 WHERE id_cru='$id'";
			$sumatoria=mysql_query($sql) or die(mysql_error());
		}
	}
	
	function buscar_recomendado($precio, $nombre, $id, $cat){
		/*Metodo para buscar cruceros recomendados */
		$precio_inicial=$precio-50;
		$precio_final=$precio+50;
		$marcas=explode(" ",$nombre);
		$sql="SELECT * FROM crucero, imagen WHERE galeria_image=id_cru AND tabla_image='crucero' AND id_cru!='$id' AND disponible_cru='1' GROUP BY id_cru ORDER BY RAND() LIMIT 0,5";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				//calculando el URL
				setlocale(LC_ALL, 'es_ES');
				//$resultado['nombre_pro']=ucwords(strtolower($resultado['nombre_pro']));
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat' GROUP BY id_cat";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_cru']);
				$this->listado[] = $resultado;
		 }
	}
	
	function buscar_recomendado2($localidad){
		/*Metodo para buscar cruceros recomendados */
		$sql="SELECT * FROM crucero, imagen WHERE galeria_image=id_cru AND tabla_image='crucero' AND disponible_cru='1' AND 
			(nombre_cru LIKE '%' '".$localidad."' '%' OR 																																			  			descripcion_cru LIKE '%' '".$localidad."' '%') GROUP BY id_cru ORDER BY RAND() LIMIT 0,5";
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				//calculando el URL
				setlocale(LC_ALL, 'es_ES');
				//$resultado['nombre_pro']=ucwords(strtolower($resultado['nombre_pro']));
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat' GROUP BY id_cat";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_cru']);
				$this->listado[] = $resultado;
		 }
	}
	
	function disponible_registro(){
	/*Metodo para editar la disponibilidad de un crucero seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE crucero SET disponible_cru='$valor' WHERE id_cru='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			header("location:/admin/crucero/");
			exit();
		}
	}
	
	function modificar_url($url) {
		$url = strtolower($url);
		//Rememplazamos caracteres especiales latinos
		$find = array(' ');
		$repl = array('_');
		$url = str_replace ($find, $repl, $url);
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, utf8_encode($url));
		//utf8_decode();
		// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+');
		$url = str_replace ($find, '_', $url);
		
		// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^a-z0-9\-<>\_]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '_', '');
		$url = preg_replace ($find, $repl, $url);
	
	
	return $url;
	}
	
	function buscar_fechas($crucero){
	 //Buscar fechas activas para el calendario dinamico
	 	date_default_timezone_set('America/Caracas');
		$todas="";
		if(isset($crucero) && $crucero==1)
			$fechas=array("2014-04-22", "2014-04-29", "2014-05-06", "2014-05-13", "2014-05-20", "2014-05-27", "2014-07-15", "2014-07-22", "2014-07-29", "2014-08-05", "2014-08-12", "2014-08-19", "2014-08-26", "2014-09-02", "2014-09-09", "2014-09-16", "2014-09-23", "2014-09-30", "2014-10-07", "2014-10-14", "2014-10-21", "2014-10-28", "2014-11-04", "2014-11-11", "2014-11-18", "2014-11-25", "2014-12-02", "2014-12-09", "2014-12-16", "2014-12-23", "2014-12-30", "2015-01-06");
		else if(isset($crucero) && $crucero==3)
			$fechas=array("2014-12-11", "2014-12-18", "2014-12-25", "2015-01-01", "2015-01-08", "2015-01-15", "2015-01-22", "2015-01-29", "2015-02-05", "2015-02-12", "2015-02-19", "2015-02-26", "2015-03-05", "2015-03-12", "2015-03-19", "2015-03-26", "2015-04-02");
		else if(isset($crucero) && $crucero==4)
			$fechas=array("2014-05-10", "2014-05-17", "2014-05-24", "2014-05-31", "2014-06-07", "2014-06-14", "2014-06-21", "2014-06-28", "2014-07-05", "2014-08-16", "2014-08-23", "2014-08-30", "2014-09-20", "2014-09-27", "2014-10-04");
		else if(isset($crucero) && $crucero==5)
			$fechas=array("2014-06-07", "2014-07-05", "2014-08-02", "2014-08-30");
		else if(isset($crucero) && $crucero==6)
			$fechas=array("2014-06-21", "2014-07-19", "2014-08-16");
		else if(isset($crucero) && $crucero==7)
			$fechas=array("2014-05-05", "2014-05-12", "2014-05-19", "2014-05-26", "2014-06-02", "2014-06-09", "2014-06-16", "2014-06-23", "2014-06-30", "2014-07-07", "2014-07-14", "2014-07-21", "2014-07-28", "2014-08-04", "2014-08-11", "2014-08-18", "2014-08-25", "2014-09-01", "2014-09-18", "2014-09-15", "2014-09-22", "2014-09-29", "2014-10-06", "2014-10-13", "2014-10-20", "2014-10-27", "2014-11-03", "2014-11-10", "2014-11-17", "2014-11-24", "2014-12-01", "2014-12-18", "2014-12-15", "2014-12-22", "2014-12-29", "2015-01-05", "2015-01-12", "2015-01-26", "2015-02-02", "2015-02-09", "2015-02-16", "2015-02-23", "2015-03-02", "2015-03-09", "2015-03-16", "2015-03-23", "2015-03-30", "2015-04-06", "2015-04-13", "2015-04-20", "2015-04-27");
			
		$todas="<script type='text/javascript'> var ENABLED_DATES = {";
		foreach($fechas as $valor => $indice){
			if(isset($fechas[$valor]) && $fechas[$valor]!=""){
				$temp=$fechas[$valor];
				$temp2=explode("-", $temp);
				if($valor>0) $todas.=", "; 
				$todas.=$temp2[0].$temp2[1].$temp2[2];
				$todas.=": true";
			}
		}
		$todas.="};</script>";
		//$this->buscar_dias_semana();
		return $todas;
	 }
	 
	 function buscar_fechas2($crucero){
	 //Buscar fechas activas para el calendario dinamico
	 	date_default_timezone_set('America/Caracas');
		$todas="";
		
		$meses= array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$dias= array("Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado", "Domingo"); 
		
		if(isset($crucero) && $crucero==1)
			$fechas= array("2014-04-22", "2014-04-29", "2014-05-06", "2014-05-13", "2014-05-20", "2014-05-27", "2014-07-15", "2014-07-22", "2014-07-29", "2014-08-05", "2014-08-12", "2014-08-19", "2014-08-26", "2014-09-02", "2014-09-09", "2014-09-16", "2014-09-23", "2014-09-30", "2014-10-07", "2014-10-14", "2014-10-21", "2014-10-28", "2014-11-04", "2014-11-11", "2014-11-18", "2014-11-25", "2014-12-02", "2014-12-09", "2014-12-16", "2014-12-23", "2014-12-30", "2015-01-06");
		else if(isset($crucero) && $crucero==3)
			$fechas= array("2014-12-11", "2014-12-18", "2014-12-25", "2015-01-01", "2015-01-08", "2015-01-15", "2015-01-22", "2015-01-29", "2015-02-05", "2015-02-12", "2015-02-19", "2015-02-26", "2015-03-05", "2015-03-12", "2015-03-19", "2015-03-26", "2015-04-02");
		else if(isset($crucero) && $crucero==4)
			$fechas= array("2014-05-10", "2014-05-17", "2014-05-24", "2014-05-31", "2014-06-07", "2014-06-14", "2014-06-21", "2014-06-28", "2014-07-05", "2014-08-16", "2014-08-23", "2014-08-30", "2014-09-20", "2014-09-27", "2014-10-04");
		else if(isset($crucero) && $crucero==5)
			$fechas= array("2014-06-07", "2014-07-05", "2014-08-02", "2014-08-30");
		else if(isset($crucero) && $crucero==6)
			$fechas= array("2014-05-24", "2014-06-21", "2014-07-19", "2014-08-16");
		else if(isset($crucero) && $crucero==7)
			$fechas= array("2014-05-05", "2014-05-12", "2014-05-19", "2014-05-26", "2014-06-02", "2014-06-09", "2014-06-16", "2014-06-23", "2014-06-30", "2014-07-07", "2014-07-14", "2014-07-21", "2014-07-28", "2014-08-04", "2014-08-11", "2014-08-18", "2014-08-25", "2014-09-01", "2014-09-08", "2014-09-15", "2014-09-22", "2014-09-29", "2014-10-06", "2014-10-13", "2014-10-20", "2014-10-27", "2014-11-03", "2014-11-10", "2014-11-17", "2014-11-24", "2014-12-01", "2014-12-08", "2014-12-15", "2014-12-22", "2014-12-29", "2015-01-05", "2015-01-12", "2015-01-26", "2015-02-02", "2015-02-09", "2015-02-16", "2015-02-23", "2015-03-02", "2015-03-09", "2015-03-16", "2015-03-23", "2015-03-30", "2015-04-06", "2015-04-13", "2015-04-20", "2015-04-27");
		
		foreach($fechas as $valor => $indice){ 
			if(isset($fechas[$valor]) && $fechas[$valor]!=""){ 
				if($fechas[$valor]>=date("Y-m-d")){
					$temp=$fechas[$valor];
					$temp2=explode("-", $temp);
					$nombredia=strtotime($fechas[$valor]);
					$fechas_finales[]=$dias[date('w', $nombredia)-1].", ".$temp2[2]." de ".$meses[$temp2[1]-1]." de ".$temp2[0];
				}
			}
		}
		
		return $fechas_finales;
	 }
	 
	 function limpiar_metas($string,$corte = null){
		//echo "cadena: ".$string."<br />";
		$caracters_no_permitidos = array("\"","'");
		// paso los caracteres entities tipo &aacute; $gt;etc a sus respectivos html
		$s = html_entity_decode($string,ENT_COMPAT,'ISO-8859-1');
        // quito todas las etiquetas html y php
 		$s = strip_tags($s);
		//elimino todos los retorno de carro
		$s = str_replace("\r", '', $s);
		//en todos los espacios en blanco le añado un <br /> para después eliminarlo
		$s = preg_replace('/(?<!>)n/', "<br />n", $s);
		//elimino la inserción de nuevas lineas
		$s = str_replace("\n", '', $s);
		// elimino tabulaciones y el resto de la cadena
		$s = str_replace("\t", '', $s);
		// elimino caracteres en blanco
		$s = preg_replace('/[ ]+/', ' ', $s);
		$s = preg_replace('/<!--[^-]*-->/', '', $s);
		// vuelvo a hacer el strip para quitar el <br /> que he añadido antes para eliminar las saltos de carro y nuevas lineas
		$s  = strip_tags($s);
		// elimino los caracters como comillas dobles y simples
		$s = str_replace($caracters_no_permitidos,"",$s);
		if (isset($corte) && (is_numeric($corte))){
			$s = mb_substr($s,0,$corte, 'ISO-8859-1');
		}
		
		//echo "Final: ".$s."<br /><br />";
		
		return $s;
    }
}
?>
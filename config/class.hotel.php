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

include_once("class.facilidad.php");

class Hotel{
	var $id;
	var $pais;
	var $estado;
	var $ciudad;
	var $categoria;
	var $localidad;
	var $codigo;
	var $nombre;
	var $prioridad;
	var $latitud;
	var $longitud;
	var $ubicacion;
	var $descripcion;
	var $condiciones;
	var $claves;
	var $principal;
	var $vistas;
	var $fecha;
	var $id_cat;
	var $listado;
	var $listado2;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $mensaje3;
	var $accion;
	var $nodos;
	var $facilidad;
	var $orden;
	var $sector;
	//Variables para Temporada
	var $desde;
	var $hasta;
	var $titulo;
	var $alternativo;
	var $paxadicional;
	var $mostrar;
	var $desde_a;
	var $hasta_a;
	var $precio_a;
	var $desde_b;
	var $hasta_b;
	var $precio_b;
	var $tipo;
	//Variables para Plan
	var $precio;
	var $maxadultos;
	var $maxpaxadd;
	var $maxAdc;
	var $precioAdc;
	var $temporada;
	var $plan;
	var $noches;
	var $subtotal;
	var $comision;
	var $total;
	var $weekend;
	var $tipotarifa;
	var $regimen;
	
	//Variables para Rangos
	var $minimo;
	var $maximo;
	
	function Hotel(){// Constructor
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
	
	function restar_fechas($fecha_uno, $fecha_dos){
		//calculo timestam de las dos fechas 
		$fecha1=explode("-",$fecha_uno);
		$fecha2=explode("-",$fecha_dos);
		
		$timestamp1 = mktime(0,0,0,$fecha1[1],$fecha1[2],$fecha1[0]); 
		$timestamp2 = mktime(4,12,0,$fecha2[1],$fecha2[2],$fecha2[0]); 
		
		//resto a una fecha la otra 
		$segundos_diferencia = $timestamp1 - $timestamp2; 
		//echo $segundos_diferencia; 
		
		//convierto segundos en días 
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
		
		//obtengo el valor absoulto de los días (quito el posible signo negativo) 
		$dias_diferencia = abs($dias_diferencia); 
		
		//quito los decimales a los días de diferencia 
		$dias_diferencia = floor($dias_diferencia); 
		
		return $dias_diferencia;
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		//$this->ciudad=$_SESSION['ciudad_admin'];
		$this->pais=$_POST['pais'];
		$this->estado=$_POST['estado'];
		$this->ciudad=$_POST['ciudad'];
		$this->categoria=$_POST['categoria'];
		$this->nombre=$_POST['nombre'];
		$this->clasificacion=$_POST['clasificacion'];
		$this->prioridad=$_POST['prioridad'];
		$this->latitud=$_POST['latitud'];
		$this->longitud=$_POST['longitud'];
		$this->ubicacion=$_POST['ubicacion'];
		$this->descripcion=$_POST['contenido'];
		$this->condiciones=$_POST['condiciones'];
		$this->claves=$_POST['claves'];
		$this->principal=$_POST['principal'];
		$this->facilidad=$_POST['facilidad'];
		$this->tipo=$_POST['tipo'];
		$this->precio=$_POST['precio'];
		$this->sector = $_POST['sector'];
	}
	
	function asignar_valores2(){
		/* Metodo para recibir valores del exterior. */
		//$this->ciudad=$_SESSION['ciudad_admin'];
		
		$this->id=$_POST['id'];
		$this->desde=$_POST['desde'];
		$this->hasta=$_POST['hasta'];
		$this->titulo=$_POST['titulo'];
		$this->alternativo=$_POST['alternativo'];
		$this->paxadicional=$_POST['paxadicional'];
		$this->prioridad=$_POST['prioridad'];
		$this->mostrar=$_POST['publica'];
		
		$this->desde_a=$_POST['desde_a'];
		$this->hasta_a=$_POST['hasta_a'];
		$this->precio_a=$_POST['precio_a'];
		$this->desde_b=$_POST['desde_b'];
		$this->hasta_b=$_POST['hasta_b'];
		$this->precio_b=$_POST['precio_b'];
		
	}
	
	function asignar_valores3(){
		/* Metodo para recibir valores del exterior. */
		//$this->ciudad=$_SESSION['ciudad_admin'];
		
		$this->id=$_POST['id'];
		$this->temporada=$_POST['temporada'];
		$this->nombre=$_POST['nombre_plan'];
		$this->descripcion=$_POST['descripcion_plan'];
		$this->precio=$_POST['precio_plan'];
		$this->weekend=$_POST['weekend_plan'];
		$this->regimen=$_POST['regimen_plan'];
		$this->tipotarifa=$_POST['tipotarifa_plan'];
		$this->maxadultos=$_POST['maxadultos'];
		$this->maxAdc=$_POST['maxAdc'];
		$this->precioAdc=$_POST['precioAdc'];
		//$this->maxpaxadd=$_POST['maxpaxadd'];
		$this->prioridad=$_POST['prioridad'];
		$this->mostrar=$_POST['publica'];
		
	}
	
	function asignar_valores4(){
		/* Metodo para recibir valores del exterior. */
		$this->id=$_POST['id'];
		$this->temporada=$_POST['temp'];
		$this->categoria=$_POST['categoria_nuevo'];
		$this->precio=$_POST['precio_nuevo'];
		$this->weekend=$_POST['weekend_nuevo'];
		$this->maximo=$_POST['hasta_nuevo'];
		$this->minimo=$_POST['desde_nuevo'];
		$this->tipo=$_POST['tipo_nuevo'];
		
	}
	
	// select categoria.ciudad_cat, producto.nombre_pro from categoria inner join pertenece on pertenece.categoria_per = categoria.id_cat inner join producto on producto.id_pro = pertenece.producto_per where producto.ciudad_pro = 'Panama'
	
	function listar_hotel(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
			if(isset($_SESSION['buscar']) && $_SESSION['buscar']!="")
				$this->keywords=$_SESSION['buscar'];
				$palabras[] = $this->keywords;
				//array_unshift($palabras, $this->keywords);
			
			$ciudad=$_SESSION['ciudad_admin'];
				
			if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
				$this->buscar=$_SESSION['buscar'];
				$sql="SELECT * FROM hotel, categoria WHERE ";
				$sql.= " (";
				foreach($palabras as $valor => $indice){
					$sql.="ciudad_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					categoria_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					ubicacion_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					claves_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					categoria_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					nombre_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					descripcion_hot LIKE '%' '".$palabras[$valor]."' '%' OR ";
				}
				$sql.="id_hot LIKE '%' '".$palabras[$valor]."' '%') GROUP BY id_hot ORDER BY disponible_hot, prioridad_hot, nombre_hot ASC";
			}else{
				$sql="SELECT * FROM hotel GROUP BY id_hot ORDER BY disponible_hot, prioridad_hot, nombre_hot ASC";
			}
			//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			
			$resultado['bandera_hot']=$this->buscar_bandera($resultado['pais_hot']);
			$resultado['pais_hot']=$this->buscar_pais($resultado['pais_hot']);
			$resultado['estado_hot']=$this->buscar_estado($resultado['estado_hot']);
			
			$this->listado[] = $resultado;
		}
	}
	
	
	
	function listar_hotel_categoria($lim){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT * FROM hotel, imagen WHERE galeria_image=id_hot AND tabla_image='hotel' AND disponible_hot='1' GROUP BY id_hot DESC ORDER BY categoria_hot DESC, prioridad_hot ASC LIMIT 0 , $lim";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_hot']=$this->convertir_fecha($resultado['fecha_hot']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_hotel_imagen(){
		
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT *, id_hot AS nombre_image, id_hot AS directorio_image, id_hot AS facilidades FROM hotel WHERE disponible_hot='1'";
		
		if (isset($_POST['localidad'])){
			if($_POST['localidad']!=""){	
				$this->localidad=$_POST['localidad'];
				$_SESSION['localidad']=$_POST['localidad'];
				$sql.=" AND ciudad_hot='$this->localidad' ";
			}else{
				$this->localidad="";
				$_SESSION['localidad']="";
			}
		}else if(isset($_SESSION['localidad']) && $_SESSION['localidad']!=""){
			$this->localidad=$_SESSION['localidad'];
			$sql.=" AND ciudad_hot='$this->localidad' ";
		}
		
		//$sql.=" GROUP BY id_hot ";
		
		if (isset($_POST['orden'])){	
			if($_POST['orden']!=""){
				$this->orden=$_POST['orden'];
				$_SESSION['orden']=$_POST['orden'];
				$sql.=" ORDER BY $this->orden ";
			}else{
				$this->orden="";
				$_SESSION['orden']="";
			}
		}else if(isset($_SESSION['orden']) && $_SESSION['orden']!=""){
			$this->orden=$_SESSION['orden'];
			$sql.=" ORDER BY $this->orden ";
		}else{
			$sql.="ORDER BY nombre_hot ASC, vistas_hot DESC";
		}
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			//
			$this->mensaje="si";
			$buscar=$resultado['id_hot'];
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='hotel' AND nombre_image!='mapa' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
			$respuesta = mysql_fetch_array($imagenes);
			$resultado['nombre_image']=$respuesta['nombre_image'];
			$resultado['directorio_image']=$respuesta['directorio_image'];
			
			$resultado['facilidades']=$this->listar_facilidad_hotel3($buscar);
			
			
			$resultado['estado_hot']=$this->buscar_estado($resultado['estado_hot']);
			//$resultado['fecha_hot']=$this->convertir_fecha($resultado['fecha_hot']);
			$this->descripcion=$resultado['descripcion_hot'];
			$resultado['descripcion_hot']=strip_tags($resultado['descripcion_hot']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_hotel_imagen2(){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT *, id_hot AS nombre_image, id_hot AS directorio_image, id_hot AS facilidades FROM hotel WHERE disponible_hot='1' AND principal_hot='si' GROUP BY id_hot ORDER BY prioridad_hot ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			//
			$this->mensaje="si";
			$buscar=$resultado['id_hot'];
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='hotel' AND nombre_image!='mapa' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
			$respuesta = mysql_fetch_array($imagenes);
			$resultado['nombre_image']=$respuesta['nombre_image'];
			$resultado['directorio_image']=$respuesta['directorio_image'];
			
			$resultado['facilidades']=$this->listar_facilidad_hotel3($buscar);
			//print_r($resultado['facilidades']);
			
			$resultado['estado_hot']=$this->buscar_estado($resultado['estado_hot']);
			//$resultado['fecha_hot']=$this->convertir_fecha($resultado['fecha_hot']);
			$this->descripcion=$resultado['descripcion_hot'];
			$resultado['descripcion_hot']=strip_tags($resultado['descripcion_hot']);
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
	
	function mostrar_hotel(){
		/*Metodo para mostrar un usuario seleccionado */
		if ((isset($_GET['id']) && $_GET['id']!="")||(isset($_POST['hotel']) && $_POST['hotel']!=""))
		{
			if(isset($_GET['id']) ){
				$id=$_GET['id'];
			}elseif(isset($_POST['hotel'])){
				$id=$_POST['hotel'];	
			}
			$sql="SELECT * FROM hotel WHERE id_hot='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->pais=$resultado['pais_hot'];
			$this->estado=$resultado['estado_hot'];
			$this->ciudad=$resultado['ciudad_hot'];
			$this->categoria=$resultado['categoria_hot'];
			$this->codigo=$resultado['codigo_hot'];
			$this->nombre=$resultado['nombre_hot'];
			$this->prioridad=$resultado['prioridad_hot'];
			$this->latitud=$resultado['latitud_hot'];
			$this->longitud=$resultado['longitud_hot'];
			$this->ubicacion=$resultado['ubicacion_hot'];
			$this->descripcion=$resultado['descripcion_hot'];
			$this->condiciones=$resultado['condiciones_hot'];
			$this->tipo=$resultado['tarifa_hot'];
			$this->claves=$resultado['claves_hot'];
			$this->principal=$resultado['principal_hot'];
			$this->fecha=$resultado['fecha_hot'];
			$this->vistas=$resultado['vistas_hot'];
			$this->sector=$resultado['sector_hot'];
		} 
	}
	function mostrar_hotel_img(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM hotel WHERE id_hot='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			
			$id=$resultado['id_hot'];
			$this->nombre=$resultado['nombre_hot'];
			$sql2="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$id' AND nombre_image!='mapa' AND nombre_image!='portada' AND tabla_image='hotel' ORDER BY id_image";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$this->listado[]=$resultado2;
			}
		} 
	}
	function mostrar_hotel_publico($id){
		/*Metodo para mostrar un usuario seleccionado */
			$sql="SELECT * FROM hotel WHERE id_hot='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->pais=$resultado['pais_hot'];
			$this->estado=$resultado['estado_hot'];
			$this->ciudad=$resultado['ciudad_hot'];
			$this->categoria=$resultado['categoria_hot'];
			$this->codigo=$resultado['codigo_hot'];
			$this->nombre=$resultado['nombre_hot'];
			$this->prioridad=$resultado['prioridad_hot'];
			$this->latitud=$resultado['latitud_hot'];
			$this->longitud=$resultado['longitud_hot'];
			$this->ubicacion=$resultado['ubicacion_hot'];
			$this->descripcion=$resultado['descripcion_hot'];
			$this->condiciones=$resultado['condiciones_hot'];
			$this->tipo=$resultado['tarifa_hot'];
			$this->claves=$resultado['claves_hot'];
			$this->principal=$resultado['principal_hot'];
			$this->fecha=$resultado['fecha_hot'];
			$this->vistas=$resultado['vistas_hot'];
	}
	
	function mostrar_temporada(){ 
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM temporadas WHERE id='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->id_cat=$resultado['id_alojamiento'];
			$this->desde=$this->convertir_fecha($resultado['fecha_inicio']);
			$this->hasta=$this->convertir_fecha($resultado['fecha_fin']);
			$this->titulo=$resultado['titulo_adicional'];
			$this->alternativo=$resultado['texto_alternativo'];
			$this->paxadicional=$resultado['precio_pax_adic'];
			$this->prioridad=$resultado['orden'];
			$this->mostrar=$resultado['activa'];
			
			$this->desde_a=$resultado['edadNinosDesde1'];
			$this->hasta_a=$resultado['edadNinosHasta1'];
			$this->precio_a=$resultado['precio_ninos'];
			
			$this->desde_b=$resultado['edadNinosDesde2'];
			$this->hasta_b=$resultado['edadNinosHasta2'];
			$this->precio_b=$resultado['precio_ninos2'];
		} 
	}
	
	function mostrar_plan(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['temp']) && $_GET['temp']!=""){
			$id=$_GET['id'];
			$temp=$_GET['temp'];
			$sql="SELECT * FROM habitaciones WHERE id='$temp'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->id_cat=$resultado['id'];
			$this->nombre=$resultado['nombre'];
			$this->prioridad=$resultado['orden'];
			$this->mostrar=$resultado['listar'];
			$this->descripcion=$resultado['descripcion'];
			$this->precio=$resultado['precio'];
			$this->weekend=$resultado['weekend'];
			$this->tipotarifa=$resultado['tipotarifa'];
			$this->regimen=$resultado['regimen'];
			$this->maxadultos=$resultado['maxAdultos'];
			$this->maxpaxadd=$resultado['maxNumPaxAdic'];
		} 
	}
	
	function insertar_hotel($con){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos del Nuevo Hotel";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="SELECT nombre_hot FROM hotel WHERE nombre_hot='$this->nombre'";
			$verificar=mysql_query($sql) or die(mysql_error());
			if(!$resultado = mysql_fetch_array($verificar)){
				$this->codigo=$this->crear_codigo($this->nombre);
				$sql="INSERT INTO hotel VALUES ('', '$this->pais', '$this->estado', '$this->ciudad', '$this->categoria', '$this->codigo', '$this->nombre','$this->prioridad', '$this->latitud', '$this->longitud', '$this->ubicacion', '$this->descripcion', '$this->condiciones', '$this->tipo', '$this->claves', '$this->principal', '0', NOW(), '1', '$this->precio', '$this->sector')";
				$consulta=mysql_query($sql) or die(mysql_error());
				$id=mysql_insert_id($con);
				$temp="";
				//Guardado de categorias multiples o simples
				/*foreach($this->categoria as $valor => $indice){
					$temp=$this->categoria[$valor];
					$sql="INSERT INTO pertenece VALUES ('', '$id', '$temp')";
					$consulta=mysql_query($sql) or die(mysql_error());
				}*/
				
				//Guardado de recomendado multiples o simples
				/*foreach($this->recomendado as $valor => $indice){
					$temp2=$this->recomendado[$valor];
					$sql2="INSERT INTO recomendado VALUES ('', '$id', '$temp2')";
					$consulta2=mysql_query($sql2) or die(mysql_error());
				}*/
				
				//Actualizando facilidades de producto
				$sql="SELECT count(*) AS total FROM facilidad";
				$consulta=mysql_query($sql) or die(mysql_error());
				$resultado = mysql_fetch_array($consulta);
				
				for($i=1; $i<=$resultado['total']; $i++){
					if(isset($_POST['facilidad'.$i]) && $_POST['facilidad'.$i]=="on"){
						$sql="INSERT INTO tiene VALUES ('', '$id', '$i')";
						$consulta=mysql_query($sql) or die(mysql_error());
					}
				}
			
				header("location:/admin/hotel/detalle.php?id=$id");
				exit();
			}else{
				$this->mensaje2="error";
			}
		}
	}
	
	function editar_hotel(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Hotel";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="UPDATE hotel SET pais_hot='$this->pais', estado_hot='$this->estado', ciudad_hot='$this->ciudad', categoria_hot='$this->categoria', nombre_hot='$this->nombre', prioridad_hot='$this->prioridad', latitud_hot='$this->latitud', longitud_hot='$this->longitud', ubicacion_hot='$this->ubicacion', descripcion_hot='$this->descripcion', condiciones_hot='$this->condiciones', tarifa_hot='$this->tipo', claves_hot='$this->claves', principal_hot='$this->principal', precio_hot='$this->precio', sector_hot = '$this->sector'  WHERE id_hot='$id'";
			
			$consulta=mysql_query($sql) or die(mysql_error());
			
			//Evaluamos Pertenece a Categorias
			$this->evaluar_existencia($id, 'pertenece', 'hotel_per', 'categoria_per', $this->categoria);
			
			//Evaluamos Pertenece a Recomendado
			//$this->evaluar_existencia($id, 'recomendado', 'hotel_rec', 'categoria_rec', $this->recomendado);
				
			//Actualizando facilidades de producto
			$sql="SELECT count(*) AS total FROM facilidad";
			$consulta=mysql_query($sql) or die(mysql_error());
		  	$resultado = mysql_fetch_array($consulta);
			
			//Borrar Facilidades Anteriores
			$sql="DELETE FROM tiene WHERE hotel_rel='$id'";
			$borrar_facilidad=mysql_query($sql) or die(mysql_error());
			
			for($i=1; $i<=$resultado['total']; $i++){
				if(isset($_POST['facilidad'.$i]) && $_POST['facilidad'.$i]=="on"){
					$sql="INSERT INTO tiene VALUES ('', '$id', '$i')";
					$consulta=mysql_query($sql) or die(mysql_error());
				}
			}
			header("location:/admin/hotel/");
			exit();
		}else{
		  $this->mostrar_hotel();
		}
	}
	
	function eliminar_hotel(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM hotel WHERE id_hot='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		//Eliminamos las imagenes
		$sql="SELECT id_image, directorio_image, nombre_image FROM imagen WHERE galeria_image='$id' AND tabla_image='hotel'";
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
		//Borrar Facilidades Anteriores
		$sql="DELETE FROM tiene WHERE hotel_rel='$id'";
		$borrar_facilidad=mysql_query($sql) or die(mysql_error());
		
		//Borrar las categorias asignadas
		$sql="DELETE FROM pertenece WHERE hotel_per='$id'";
		$borrar_facilidad=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/hotel/");
		exit();
	}
	
	function buscar_categorias($id){
	/*Metodo para buscar el nombre de la categoria */	
		$this->asignar_valores();
		$sql="SELECT * FROM subxcat, subcategoria WHERE categoria_rel='$id' AND subcategoria_rel=id_sub ORDER BY nombre_sub, prioridad_sub";
		$buscar=mysql_query($sql);
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
	
	function crear_codigo($cat){
	/*Metodo para crear códigos de productos */
		//$cat=$this->get_categoria($cat);
		$codigo="STH-";
		$codigo.=$cat[0];
		$codigo.=$cat[1];
		$codigo=strtoupper($codigo);
		$codigo.=".";
		//$sql="SELECT COUNT(*) AS total FROM producto";
		$sql="SELECT MAX(id_hot) AS total FROM hotel";
		$count=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_array($count);
		$total=$row['total'];
		$total++;
		if($total<=99 && $total>=10){
			$valor="0";
			$valor.=$total;
		} else if($total<=9){
			$valor="00";
			$valor.=$total;
		}else{
			$valor=$total;
		}
		$codigo.=$valor;
		
		return $codigo;
	}
	
	function editar_estado(){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE hotel SET aprobado_hot='$valor' WHERE id_hot='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location:/admin/hotel/");
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
	
	function listar_facilidad_hotel($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT etiqueta_fac,id_fac, nombre_fac, id_fac AS id_image, id_fac AS nombre_image, id_fac AS encendido FROM facilidad GROUP BY id_fac ORDER BY id_fac ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id_fac'];
			
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='facilidad' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
			$respuesta = mysql_fetch_array($imagenes);
			$resultado['directorio_image']=$respuesta['directorio_image'];
			$resultado['nombre_image']=$respuesta['nombre_image'];
			
			$sql="SELECT facilidad_rel FROM tiene WHERE hotel_rel='$id' AND facilidad_rel='$buscar'";
			$facilidad=mysql_query($sql) or die(mysql_error());
			if($busca_fac = mysql_fetch_array($facilidad))
				$resultado['encendido']="on";
			else
				$resultado['encendido']="off";
				
			$this->mensaje="si";
			$this->listado[] = $resultado;
			
		}
	}
	
	function listar_facilidad_hotel2($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT id_fac, nombre_fac,etiqueta_fac, id_fac AS directorio_image, id_fac AS nombre_image FROM facilidad, hotel, tiene WHERE id_hot='$id' AND id_hot=hotel_rel AND id_fac=facilidad_rel GROUP BY id_fac ORDER BY id_fac ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id_fac'];
			
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='facilidad' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
			$respuesta = mysql_fetch_array($imagenes);
			$resultado['directorio_image']=$respuesta['directorio_image'];
			$resultado['nombre_image']=$respuesta['nombre_image'];
				
			$this->mensaje="si";
			$this->listado[] = $resultado;
			
		}
	}
	
	function listar_facilidad_hotel3($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT id_fac, nombre_fac,etiqueta_fac, id_fac AS directorio_image, id_fac AS nombre_image FROM facilidad, hotel, tiene WHERE id_hot='$id' AND id_hot=hotel_rel AND id_fac=facilidad_rel GROUP BY id_fac ORDER BY id_fac ASC LIMIT 0, 6";
		$consulta=mysql_query($sql) or die(mysql_error());
		$this->listado2="";
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id_fac'];
			
			$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='facilidad' ORDER BY id_image";
			$imagenes=mysql_query($sql) or die(mysql_error());
			$respuesta = mysql_fetch_array($imagenes);
			$resultado['directorio_image']=$respuesta['directorio_image'];
			$resultado['nombre_image']=$respuesta['nombre_image'];
			
			$this->listado2[]=$resultado;
			
		}
		return $this->listado2;
	}
	
	function modificar_url($url){
		 /* Metodo para modificar url */
		 $temp=explode("/", $url);
		 $url=$temp[0]."/miniatura/".$temp[1];
		 return  $url;
	 }
	 
	 function evaluar_existencia($id, $tabla, $labelA, $labelB, $arreglo){
		//Borrado de categorias multiples o simples
		$sql="SELECT * FROM $tabla WHERE $labelA='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		while($resultado = mysql_fetch_array($consulta)){
			$swiche="no"; $cat="";
			if(isset($arreglo) && $arreglo!=""){
				foreach($arreglo as $valor => $indice){
					if($resultado[$labelB]==$arreglo[$valor]){
						$swiche="si"; 
					}
				}
			}
			$cat=$resultado[$labelB];
			if($swiche=="no"){
				$sql2="DELETE FROM $tabla WHERE $labelA='$id' AND $labelB='$cat'";
				$consulta2=mysql_query($sql2) or die(mysql_error());
			}
		}
		
		$cat="";
		//Guardado de categorias multiples o simples
		if(isset($arreglo) && $arreglo!=""){
			foreach($arreglo as $valor => $indice){
				$cat=$arreglo[$valor];
				$sql="SELECT * FROM $tabla WHERE $labelA='$id' AND $labelB='$cat'";
				$consulta=mysql_query($sql) or die(mysql_error());
				if(!$resultado = mysql_fetch_array($consulta)){
					$sql="INSERT INTO $tabla VALUES ('', '$id', '$cat')";
					$consulta=mysql_query($sql) or die(mysql_error());
				}
			}
		}
	 }
	 
	 function buscar_recomendado($id){
	 //Buscar productos recoemdados en categoria
	 	$sql="SELECT id_hot, nombre_hot, prioridad_hot, directorio_image, nombre_image, categoria_rec FROM hotel, imagen, recomendado WHERE id_hot=galeria_image AND tabla_image='hotel' AND nombre_image='logo' AND id_hot=hotel_rec AND categoria_rec='$id' GROUP BY id_hot ORDER BY prioridad_hot";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	 }
	 
	 function buscar_recomendado_inicio($id){
	 //Buscar productos recoemdados en categoria parala inicial
	 	$restriccion="";
		//$ciudad=$_SESSION['ciudad_publica'];
	 	$nodos=$this->buscar_nodos_hijos($id);
		foreach($nodos as $valor => $indice){
			$restriccion.="categoria_per='".$nodos[$valor]."' OR ";
		}
		$restriccion.="categoria_per='0'";
	 	$sql="SELECT id_hot, nombre_hot, prioridad_hot, directorio_image, nombre_image, categoria_per FROM hotel, imagen, pertenece WHERE ($restriccion) AND producto_per=id_hot AND id_hoto=galeria_image AND tabla_image='hotel' AND nombre_image='logo' AND principal_hot='si' GROUP BY id_hot ORDER BY prioridad_hot";
		//echo $sql."<br /><br />";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	 }
	 
	 function buscar_nodos_hijos($id){
		 //Buscar productos recomendados en categoria para la página inicial
		 $sql="SELECT id_cat FROM categoria WHERE padre_cat='$id'";
		 $buscando=mysql_query($sql) or die(mysql_error());
		 if($nodos = mysql_fetch_array($buscando)){
			 do{
			 	$this->nodos[] = $nodos['id_cat'];
				$this->buscar_nodos_hijos($nodos['id_cat']);
			 }while($nodos = mysql_fetch_array($buscando));
		 }
		 return $this->nodos;
	 }
	 
	 function visita_hotel(){
		/*Metodo para sumar una visita a un anuncio específico */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="UPDATE hotel SET vistas_hot=vistas_hot+1 WHERE id_hot='$id'";
			$sumatoria=mysql_query($sql) or die(mysql_error());
		}
	}
	
	function listar_paises(){
		/* Metodo para listar los estados y sus opciones. */
		$sql="SELECT * FROM pais ORDER BY nombre_pais ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
	}
	
	function listar_suplementos(){
		/* Metodo para listar los suplementos disponibles. */
		$sql="SELECT * FROM suplemento ORDER BY id_sup ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
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
	
	function buscar_estado($id){
	/*Metodo para obtener el nombre de un estado */	
		$sql="SELECT nombre_est FROM estado WHERE id_est='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_est'];
	}
	
	function buscar_pais($id){
	/*Metodo para obtener el nombre de un estado */	
		$sql="SELECT nombre_pais FROM pais WHERE id_pais='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_pais'];
	}
	
	function buscar_bandera($id){
	/*Metodo para obtener el nombre de un estado */	
		$sql="SELECT bandera_pais FROM pais WHERE id_pais='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return strtolower($resultado['bandera_pais']);
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
	
	function buscar_resultado(){
			if(isset($_SESSION['keywords']) && $_SESSION['keywords']!="")
			$this->keywords=$_SESSION['keywords'];
				//$palabras=explode(" ",$this->keywords);
				$palabras[]=$this->keywords;
			$this->mensaje="";
			//$ciudad=$_SESSION['ciudad_publica'];
			//Procesando Busqueda en Directorio   ==================================================///
			$sql="SELECT id_hot, nombre_hot, categoria_hot, descripcion_hot, estado_hot, ciudad_hot, ubicacion_hot FROM hotel WHERE ";
			
			if(isset($this->categoria) && $this->categoria!="")
				$sql.="categoria_hot='$this->categoria' AND ";
			
			if(isset($this->localidad) && $this->localidad!="")
				$sql.="ciudad_hot='$this->localidad' AND ";
			
			$sql.= "(";
			foreach($palabras as $valor => $indice){
				if($palabras[$valor]!=""){
					$sql.="nombre_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					ubicacion_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					claves_hot LIKE '%' '".$palabras[$valor]."' '%' OR 
					condiciones_hot LIKE '%' '".$palabras[$valor]."' '%' OR ";
				}
			}
			$sql.="id_hot LIKE '%' '".$palabras[$valor]."' '%') AND disponible_hot='1' GROUP BY id_hot ORDER BY prioridad_hot, nombre_hot ASC";
			//echo $sql;
			$consulta=mysql_query($sql) or die(mysql_error());
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$buscar=$resultado['id_hot'];
				$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='hotel' AND nombre_image!='mapa' ORDER BY id_image";
				$imagenes=mysql_query($sql) or die(mysql_error());
				$respuesta = mysql_fetch_array($imagenes);
				
				$temp="";
				
				$sql2="SELECT * FROM tiene, facilidad, imagen WHERE hotel_rel='$buscar' AND facilidad_rel=id_fac AND galeria_image=id_fac AND tabla_image='facilidad' ORDER BY id_fac LIMIT 0,6";
				$facilidades=mysql_query($sql2) or die(mysql_error());
				while($respuesta2 = mysql_fetch_array($facilidades)){
					$temp[]=$respuesta2;
				}
				$datos['facilidades']=$temp;
				
				$datos['id_hot']=$resultado['id_hot'];
				$datos['categoria_hot']=$resultado['categoria_hot'];
				$datos['nombre_hot']=$resultado['nombre_hot'];
				$datos['estado_hot']=$this->buscar_estado($resultado['estado_hot']);
				$datos['ciudad_hot']=$resultado['ciudad_hot'];
				$datos['ubicacion_hot']=$resultado['ubicacion_hot'];
				$datos['nombre_hot']=$resultado['nombre_hot'];
				$datos['descripcion_hot']=strip_tags($resultado['descripcion_hot']);
				$datos['directorio_image']=$respuesta['directorio_image'];
				$datos['nombre_image']=$respuesta['nombre_image'];
				$hotel=$resultado['id_hot'];
				$cat=$resultado['categoria_hot'];
				$datos['url']="hotel_detalle.php?id=$hotel";
				$this->listado[] = $datos;
				$datos="";
			}
			
			
			//Procesando Busqueda en Eventos  =====================================================///
			/*$sql="SELECT id_eve, categoria_eve, nombre_eve, fecha_eve, hora_eve, descripcion_eve FROM evento WHERE ";
			$sql.= "(";
			foreach($palabras as $valor => $indice){
				if($palabras[$valor]!=""){
					$sql.="nombre_eve LIKE '%' '".$palabras[$valor]."' '%' OR 
					descripcion_eve LIKE '%' '".$palabras[$valor]."' '%' OR 
					mytwitter_eve LIKE '%' '".$palabras[$valor]."' '%' OR 
					myfacebook_eve LIKE '%' '".$palabras[$valor]."' '%' OR ";
				}
			}
			$sql.="id_eve LIKE '%' '".$palabras[$valor]."' '%') GROUP BY id_eve ORDER BY fecha_eve DESC";
			$consulta=mysql_query($sql) or die(mysql_error());
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$buscar=$resultado['id_eve'];
				$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='evento' AND nombre_image='logo' ORDER BY id_image";
				$imagenes=mysql_query($sql) or die(mysql_error());
				$respuesta = mysql_fetch_array($imagenes);
				
				$datos['id']=$resultado['id_eve'];
				$datos['categoria']=$resultado['categoria_eve'];
				$datos['nombre']=$resultado['nombre_eve'];
				if($resultado['fecha_eve']!="")
					$datos['comun1']="Fecha: ".$this->convertir_fecha($resultado['fecha_eve']);
				if($resultado['hora_eve']!="")
					$datos['comun2']="Hora: ".$resultado['hora_eve'];
				$datos['descripcion']=strip_tags($resultado['descripcion_eve']);
				$datos['imagen']=$respuesta['directorio_image'];
				$datos['nombre_image']=$respuesta['nombre_image'];
				$evento=$resultado['id_eve'];
				$cat=$resultado['categoria_eve'];
				$datos['url']="evento_detalle.php?id=$evento&cat=$cat";
				if(isset($this->listado) && $this->listado!="")
					array_push($this->listado, $datos);
				else
					$this->listado[] = $datos;
				$datos="";
			}
			
			//Procesando Busqueda en Noticias, Recetas, Horoscopo  ==================================///
			$sql="SELECT id_not, categoria_not, titulo_not, fecha_not, autor_not, contenido_not, tipo_cat FROM noticia, categoria WHERE ";
			$sql.= "categoria_not=id_cat AND (";
			foreach($palabras as $valor => $indice){
				if($palabras[$valor]!=""){
					$sql.="titulo_not LIKE '%' '".$palabras[$valor]."' '%' OR 
					contenido_not LIKE '%' '".$palabras[$valor]."' '%' OR 
					subtitulo_not LIKE '%' '".$palabras[$valor]."' '%' OR 
					autor_not LIKE '%' '".$palabras[$valor]."' '%' OR ";
				}
			}
			$sql.="id_not LIKE '%' '".$palabras[$valor]."' '%') GROUP BY id_not ORDER BY fecha_not DESC";
			$consulta=mysql_query($sql) or die(mysql_error());
			while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$buscar=$resultado['id_not'];
				$sql="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$buscar' AND tabla_image='noticia' ORDER BY id_image";
				$imagenes=mysql_query($sql) or die(mysql_error());
				$respuesta = mysql_fetch_array($imagenes);
				
				$datos['id']=$resultado['id_not'];
				$datos['categoria']=$resultado['categoria_not'];
				$datos['nombre']=$resultado['titulo_not'];
				if($resultado['fecha_not']!="")
					$datos['comun1']="Publicado: ".$this->convertir_fecha($resultado['fecha_not']);
				$datos['comun2']="";
				$datos['descripcion']=strip_tags($resultado['contenido_not']);
				$datos['imagen']=$respuesta['directorio_image'];
				$datos['nombre_image']=$respuesta['nombre_image'];
				$noticia=$resultado['id_not'];
				$tipo=ucfirst($resultado['tipo_cat']);
				$datos['url']="noticia_detalle.php?id=$noticia&tipo=$tipo";
				if(isset($this->listado) && $this->listado!="")
					array_push($this->listado, $datos);
				else
					$this->listado[] = $datos;
				$datos="";
			}
			//print_r($this->listado);*/
			
	}
	
	function listar_temporada_privada($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$this->mensaje = ""; $this->mensaje2 = ""; $this->mensaje3 = "";
		$sql="SELECT *, id AS habitacion FROM temporadas WHERE id_alojamiento='$id' ORDER BY orden";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$buscar=$resultado['id'];
			$lista=""; $lista2="";
			$sql2="SELECT * FROM habitaciones WHERE id_alojamiento='$id' AND id_temporada='$buscar' ORDER BY orden";
			//echo $sql2."<br />";
			$habitaciones=mysql_query($sql2) or die(mysql_error());
			while ($respuesta = mysql_fetch_array($habitaciones)){
				$this->mensaje2="si";
				//$respuesta['precio']=$this->mostrar_precio($respuesta['precio']);
				$lista[]=$respuesta;
			}
			
			$resultado['habitacion']=$lista;
			
			$sql3="SELECT * FROM rango_ninos WHERE temporada_ran='$buscar' ORDER BY etiqueta_ran";
			//echo $sql3."<br />";
			$rangos=mysql_query($sql3) or die(mysql_error());
			while ($respuesta2 = mysql_fetch_array($rangos)){
				$this->mensaje3="si";
				//$respuesta['precio']=$this->mostrar_precio($respuesta['precio']);
				$lista2[]=$respuesta2;
			}
			
			$resultado['rangokids']=$lista2;
			$resultado['fecha_inicio']=$this->convertir_fecha($resultado['fecha_inicio']);
			$resultado['fecha_fin']=$this->convertir_fecha($resultado['fecha_fin']);
			$this->listado[] = $resultado;
			
		}
		//print_r($this->listado);
	}
	
	function listar_temporada_hotel($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT *, id AS habitacion FROM temporadas WHERE id_alojamiento='$id' AND activa='1' ORDER BY orden";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id'];
			$lista="";
			$sql2="SELECT * FROM habitaciones WHERE id_alojamiento='$id' AND id_temporada='$buscar' AND listar='1' ORDER BY orden";
			//echo $sql2."<br />";
			$habitaciones=mysql_query($sql2) or die(mysql_error());
			while ($respuesta = mysql_fetch_array($habitaciones)){
				$respuesta['precio']=$this->mostrar_precio($respuesta['precio']);
				$lista[]=$respuesta;
			}
			//print_r($lista);
			$resultado['fecha_inicio']=$this->convertir_fecha($resultado['fecha_inicio']);
			$resultado['fecha_fin']=$this->convertir_fecha($resultado['fecha_fin']);
			$resultado['habitacion']=$lista;
			$this->mensaje="si";
			$this->listado[] = $resultado;
			
		}
	}
	
	function insertar_temporada_hotel(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Insertar Nueva Temporada";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores2();
			$this->desde=$this->convertir_fecha($this->desde);
			$this->hasta=$this->convertir_fecha($this->hasta);
			
			$sql="INSERT INTO temporadas VALUES ('', '$this->id', '$this->mostrar', '$this->prioridad', 'Por Fecha', '0', '$this->desde', '$this->hasta', '0', '0', '$this->alternativo', '0', '0', '$this->titulo', 'NULL', '$this->paxadicional', 'NULL', '$this->desde_a', '$this->hasta_a', '$this->precio_a', '0', 'NULL', '$this->desde_b', '$this->hasta_b', '$this->precio_b', '0', 'NULL', '0', '0', '0', '0', 'NULL')";
			
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/detalle.php?id=$id#next");
			exit();
		}
	}
	
	function editar_temporada_hotel(){
	/*Metodo para editar un temporada seleccionado */		
		$this->accion="Editar Temporada";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			if(isset($_GET['id']) && $_GET['id']!="")
				$temporada=$_GET['id'];
			else if(isset($_POST['id']) && $_POST['id']!="")
				$temporada=$_POST['id'];
			$this->asignar_valores2();
			$this->alternativo=utf8_decode($this->alternativo);
			$this->desde=$this->convertir_fecha($this->desde);
			$this->hasta=$this->convertir_fecha($this->hasta);
			
			$sql="UPDATE temporadas SET activa='$this->mostrar', orden='$this->prioridad', fecha_inicio='$this->desde', fecha_fin='$this->hasta', texto_alternativo='$this->alternativo', titulo_adicional='$this->titulo', precio_pax_adic='$this->paxadicional', edadNinosDesde1='$this->desde_a', edadNinosHasta1='$this->hasta_a', precio_ninos='$this->precio_a', edadNinosDesde2='$this->desde_b', edadNinosHasta2='$this->hasta_b', precio_ninos2='$this->precio_b' WHERE id='$temporada'";
			
			//error_log("¡La base de datos de Musiu ".$this->alternativo." - id: ".$_POST['id']."- desde: ".$_POST['desde']." hasta: ".$_POST['hasta']." Consulta: ".$sql." no está disponible!", 0);
			
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/detalle.php?id=$id#tarifas$temporada");
			exit();
		}else{
			$this->mostrar_temporada();
		}
	}
	
	function editar_plan2(){
	/*Metodo para editar un plan seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor']; 
			$back=$_GET['back'];
			$ancla=$_GET['ancla'];
			
			$sql="UPDATE habitaciones SET listar='$valor' WHERE id='$id'";
			//echo "Entro: ".$sql;
			$consulta=mysql_query($sql) or die(mysql_error());
			
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location: /admin/hotel/detalle.php?id=$back#tarifas$ancla");
		}
	}
	
	function editar_rango_ninos(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Editar Datos del Rango";
		$this->asignar_valores4();
		$update = $_POST['del'];
		//$this->descripcion=utf8_decode($this->descripcion);
		//$this->nombre=utf8_decode($this->nombre);
		$sql="UPDATE rango_ninos SET etiqueta_ran='$this->categoria', min_ran='$this->minimo', max_ran='$this->maximo', tipo_ran='$this->tipo', precio_ran='$this->precio', weekend_ran='$this->weekend', temporada_ran='$this->temporada' WHERE id_ran='$update'";
		
		$id=$this->id;
		$consulta=mysql_query($sql) or die(mysql_error());
	}
	
	function editar_temporada2(){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor']; 
			$back=$_GET['back'];
			
			$sql="UPDATE temporadas SET activa='$valor' WHERE id='$id'";
			//echo "Entro: ".$sql;
			$consulta=mysql_query($sql) or die(mysql_error());
			
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location: /admin/hotel/detalle.php?id=$back#tarifas$id");
		}
	}
	
	function insertar_plan_temporada_hotel(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Insertar Nuevo Plan";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores3();
			//error_log("¡La base de datos de Oracle ".$this->nombre." no está disponible!", 0);
			$sql="INSERT INTO habitaciones VALUES ('', '$this->id', '$this->temporada', '$this->nombre', '$this->regimen', '$this->prioridad', '$this->mostrar', '$this->precio', '$this->weekend', '$this->descripcion', '$this->tipotarifa', '$this->maxadultos', 'NULL', '$this->maxpaxadd', 'NULL')";
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/detalle.php?id=$id#tarifas$this->temporada");
			exit();
		}
	}
	
	function insertar_plan_temporada_hotel2(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Insertar Nuevo Plan";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores3();
			$this->descripcion=utf8_decode($this->descripcion);
			$this->nombre=utf8_decode($this->nombre);
			//error_log("¡La base de datos de Oracle ".$this->nombre." no está disponible!", 0);
			$sql="INSERT INTO habitaciones VALUES ('', '$this->id', '$this->temporada', '$this->nombre', '$this->regimen', '$this->prioridad', '$this->mostrar', '$this->precio', '$this->weekend', '$this->descripcion', '$this->tipotarifa', '$this->maxadultos', '$this->precioAdc', '$this->maxAdc', 'NULL')";
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/detalle.php?id=$id#tarifas$this->temporada");
			exit();
		}
	}
	
	function insertar_rango_ninos(){
	/*Metodo para insertar un rango de tarifa niños */		
		$this->accion="Insertar Tarifa de Ni&ntilde;os";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores4();
			$sql="INSERT INTO rango_ninos VALUES ('', '$this->categoria', '$this->minimo', '$this->maximo', '$this->tipo', '$this->precio', '$this->weekend', '$this->temporada')";
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/lista_rangos.php?temp=$this->temporada&id=$id");
			exit();
		}
	}
	
	function editar_plan_temporada_hotel(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Editar Datos del Plan";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores3();
			$temporada=$_GET['val'];
			//error_log("¡La base de datos de Oracle ".$this->descripcion." no está disponible!", 0);
			$sql="UPDATE habitaciones SET nombre='$this->nombre', regimen='$this->regimen',, orden='$this->prioridad', listar='$this->mostrar', precio='$this->precio', weekend='$this->weekend', descripcion='$this->descripcion', tipotarifa='$this->tipotarifa', maxAdultos='$this->maxadultos', maxNumPaxAdic='$this->maxpaxadd' WHERE id='$this->temporada'";
			
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/detalle.php?id=$id#tarifas$temporada");
			exit();
		}else{
			$this->mostrar_plan();
		}
	}
	
	function editar_plan_temporada_hotel2(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Editar Datos del Plan";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores3();
			$this->descripcion=utf8_decode($this->descripcion);
			$this->nombre=utf8_decode($this->nombre);
			error_log("¡La base de datos de Oracle ".$this->descripcion." no está disponible!", 0);
			$sql="UPDATE habitaciones SET nombre='$this->nombre', regimen='$this->regimen', orden='$this->prioridad', listar='$this->mostrar', precio='$this->precio', weekend='$this->weekend', descripcion='$this->descripcion', tipotarifa='$this->tipotarifa', maxAdultos='$this->maxadultos', precio_pax_adic='$this->precioAdc', maxNumPaxAdic='$this->maxAdc' WHERE id='$this->temporada'";
			
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/hotel/detalle.php?id=$id#next");
			exit();
		}else{
			$this->mostrar_plan();
		}
	}
	
	function eliminar_plan_temporada(){
	/*Metodo para eliminar un plan de temporada */	
		$id=$_GET['id'];
		$plan=$_GET['plan'];
		$temporada=$_GET['temp'];
		$sql="DELETE FROM habitaciones WHERE id='$plan' AND id_temporada='$temporada' AND id_alojamiento='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/hotel/detalle.php?id=$id#tarifas$temporada");
		exit();
	}
	
	function eliminar_rango_ninos(){
	/*Metodo para eliminar un registro de tarifas de niños */	
		$id=$_GET['id'];
		$temp=$_GET['temp'];
		$del=$_GET['del'];
		$sql="DELETE FROM rango_ninos WHERE id_ran='$del' AND temporada_ran='$temp'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/hotel/lista_rangos.php?temp=$temp&id=$id");
		exit();
	}
	
	function eliminar_temporada(){
	/*Metodo para eliminar una temporada */	
		$id=$_GET['id'];
		$temporada=$_GET['temp'];
		
		$sql="DELETE FROM temporadas WHERE id='$temporada' AND id_alojamiento='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		$sql="DELETE FROM habitaciones WHERE id_temporada='$temporada' AND id_alojamiento='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		
		header("location:/admin/hotel/detalle.php?id=$id#tarifas");
		exit();
	}

	
	function mostrar_hotel_cotizacion($hotel, $temporada, $plan){
		/*Metodo para mostrar un usuario seleccionado */
			$sql="SELECT * FROM hotel, temporadas, habitaciones WHERE id_hot='$hotel' AND temporadas.id_alojamiento='$hotel' AND temporadas.id='$temporada' AND temporadas.id=habitaciones.id_temporada AND habitaciones.id='$plan'";
			
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$resultado['fecha_inicio']=$this->convertir_fecha($resultado['fecha_inicio']);
			$resultado['fecha_fin']=$this->convertir_fecha($resultado['fecha_fin']);
			$resultado['precio']=$this->mostrar_precio($resultado['precio']);
			if($resultado['maxAdultos']==NULL)
				$resultado['maxAdultos']=4;
			$this->listado[]=$resultado;
	}
	
	function calcular_cotizacion(){
		/*Metodo para mostrar un usuario seleccionado */
		$hotel=$_GET['hotel'];
		$adultos=$_GET['adultos'];
		if(isset($_GET['infantes']) && $_GET['infantes']!="") $infantes=$_GET['infantes']; else $infantes=0;
		if(isset($_GET['ninos']) && $_GET['ninos']!="") $ninos=$_GET['ninos']; else $ninos=0;
		$llegada=$_GET['llegada'];
		$salida=$_GET['salida'];
		
		$this->desde=$_GET['llegada'];
		$this->hasta=$_GET['salida'];
		
		//$habitaciones=$_POST['numero'];
		
		$numero_personas=$adultos;
		
		$noches=$this->restar_fechas($this->convertir_fecha($llegada), $this->convertir_fecha($salida));
		$this->noches=$noches;
		
		$sql="SELECT * FROM hotel, temporadas, habitaciones WHERE id_hot='$hotel' AND temporadas.id_alojamiento='$hotel' AND temporadas.id=habitaciones.id_temporada AND habitaciones.maxAdultos='$numero_personas'";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		$fee=1000;
		
		$this->tipo=$resultado['tarifa_hot'];
		
		setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
		date_default_timezone_set('America/Caracas');
		$fecha1 = $this->convertir_fecha($llegada);
		$fecha2 = date("Y-m-d", strtotime($this->convertir_fecha($salida) ."- 1 days"));
		
		$creado=$fecha_hoy= date("Y-m-d");
	
		if(isset($resultado['tarifa_hot']) && $resultado['tarifa_hot']=="Persona"){
			//cotizamos con precio por persona
			
			for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
				$sql_buscar="SELECT * FROM temporadas, habitaciones WHERE temporadas.id = habitaciones.id_temporada AND ('$i' BETWEEN temporadas.fecha_inicio AND temporadas.fecha_fin) AND habitaciones.maxAdultos='$numero_personas'";
				
					$consulta_buscar=mysql_query($sql_buscar) or die(mysql_error());
					if($resultado_buscar = mysql_fetch_array($consulta_buscar)){
						$fecha_actual=$i;
						$numero_dia=date("w",strtotime($fecha_actual));
						$total_dia_adulto[]=$resultado_buscar['precio']*$adultos;
						$total_dia_infantes[]=$resultado_buscar['precio_ninos']*$infantes;
						$total_dia_ninos[]=$resultado_buscar['precio_ninos2']*$ninos;
					}
					
			}
			
			$habitacion=$resultado_buscar['nombre'];
			
			$subtotal= array_sum($total_dia_adulto) + array_sum($total_dia_infantes) + array_sum($total_dia_ninos);
				$this->subtotal=$subtotal;
			$comision=$fee;
				$this->comision=$comision;
			$total=$subtotal+$comision;
				$this->total=$total;
			
		}
		
		if(isset($resultado['tarifa_hot']) && $resultado['tarifa_hot']=="Habitacion"){
			//cotizamos con precio por persona
			
			for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
				$sql_buscar="SELECT * FROM temporadas, habitaciones WHERE temporadas.id = habitaciones.id_temporada AND ('$i' >= temporadas.fecha_inicio AND $i <= temporadas.fecha_fin) AND habitaciones.maxAdultos='$numero_personas'";
				
					$consulta_buscar=mysql_query($sql_buscar) or die(mysql_error());
					if($resultado_buscar = mysql_fetch_array($consulta_buscar)){
						$fecha_actual=$i;
						$numero_dia=date("w",strtotime($fecha_actual));
						$total_dia_adulto[]=$resultado_buscar['precio']*$adultos;
						$total_dia_infantes[]=$resultado_buscar['precio_ninos']*$infantes;
						$total_dia_ninos[]=$resultado_buscar['precio_ninos2']*$ninos;
					}
			}
			
			$habitacion=$resultado_buscar['nombre'];
			
			$subtotal= array_sum($total_dia_adulto) + array_sum($total_dia_infantes) + array_sum($total_dia_ninos);
				$this->subtotal=$subtotal;
			$comision=$fee;
				$this->comision=$comision;
			$total=$subtotal+$comision;
				$this->total=$total;			
		}
		
		$observaciones=$_POST['comentario'];
		$this->condiciones=$_POST['comentario'];
		$this->mensaje2="si";
		
		$this->listado['subtotal']=$subtotal;
		$this->listado['comision']=$fee;
		$this->listado['total']=$total;
		
		$this->listado['personas'][]= array("costo" => array_sum($total_dia_adulto), "tipo" => "Adultos", "cantidad" => $adultos);
		$this->listado['personas'][]= array("costo" => array_sum($total_dia_infantes), "tipo" => "Infantes", "cantidad" => $infantes);
		$this->listado['personas'][]= array("costo" => array_sum($total_dia_ninos), "tipo" => "Niños", "cantidad" => $ninos);
		
		$this->listado['llegada']=$llegada;
		$this->listado['salida']=$salida;
		$this->listado['habitacion']=$habitacion;
		$this->listado['noches']=$noches;
	}
	
	function listar_localidades(){
		/* Metodo para listar los estados y sus opciones. */
		$sql="SELECT ciudad_hot FROM hotel GROUP BY ciudad_hot ORDER BY ciudad_hot ASC";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
		//print_r($this->listado);
	}
	
	function disponible_registro(){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE hotel SET disponible_hot='$valor' WHERE id_hot='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			header("location:/admin/hotel/");
			exit();
		}
	}
	
	function buscar_rango_ninos($id, $temp){
	/*Metodo para listar los rangos de precios de niños */
		$sql="SELECT * FROM rango_ninos WHERE temporada_ran='$temp'";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}	
	}
}
?>
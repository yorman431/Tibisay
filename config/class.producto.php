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

class Producto{
	var $codigo;
	var $nombre;
	var $categoria;
	var $cantidad;
	var $prioridad;
	var $id;
	var $id_cat;
	var $detal;
	var $mayor;
	var $limite;
	var $limite2;
	var $fecha;
	var $lugar;
	var $descripcion;
	var $claves;
	var $marca;
	var $listado;
	var $listado2;
	var $hotel;
	var $buscar;
	var $mensaje;
	var $mensaje2;
	var $ruta;
	var $suiche;
	var $accion;
	var $vistas;
	//Variables para Temporada
	var $desde;
	var $hasta;
	var $titulo;
	var $alternativo;
	var $paxadicional;
	var $mostrar;
	var $tipo;
	var $desde_a;
	var $hasta_a;
	var $precio_a;
	var $desde_b;
	var $hasta_b;
	var $precio_b;
	var $principal;
	//Variables para Plan
	var $precio;
	var $maxadultos;
	var $temporada;
	var $plan;
	var $noches;
	var $subtotal;
	var $comision;
	var $total;
	
	function Producto(){// Constructor
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
		$this->marca=$_POST['marca'];
		$this->fecha=$_POST['fecha'];
		$this->categoria=$_POST['categoria'];
		$this->hotel=$_POST['hoteles'];
		$this->cantidad=$_POST['cantidad'];
		$this->lugar=$_POST['lugar'];
		$this->prioridad=$_POST['prioridad'];
		$this->detal=$_POST['detal'];
		$this->mayor=$_POST['mayor'];
		$this->limite=$_POST['limite'];
		$this->descripcion=$_POST['descripcion'];
		$this->claves=$_POST['claves'];
		$this->segmento=$_POST['segmento'];
		$this->principal=$_POST['principal'];
		
		
	}
	function promocion_hotel(){
	$id=$_GET['id'];
	$sql="SELECT * FROM producto, imagen WHERE 
			hotel_pro='$id' AND galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' AND categoria_pro='9' 
			GROUP BY id_pro ORDER BY categoria_pro, prioridad_pro ASC";
			$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
		
	}
	function listar_producto(){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
			
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM producto, categoria WHERE id_cat=categoria_pro AND
			(nombre_cat LIKE '%' '".$_SESSION['buscar']."' '%' OR 																																			  			prioridad_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR
			codigo_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			nombre_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			marca_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			limite_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			claves_pro LIKE '%' '".$_SESSION['buscar']."' '%') 
			ORDER BY disponible_pro, prioridad_pro, categoria_pro ASC";
		}else{
			$sql="SELECT * FROM producto, categoria WHERE id_cat=categoria_pro  ORDER BY disponible_pro, prioridad_pro, categoria_pro ASC";
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->suiche=false;
			$this->ruta="";
			$resultado['nombre_cat']="";
			$this->buscar_ruta_nodo($resultado['categoria_pro']);
			for($i=count($this->ruta)-1;$i>=0;$i--){
				$resultado['nombre_cat'].=" &raquo; ".$this->ruta[$i]['nombre_cat'];
			}
			$this->listado[] = $resultado;
		}
	}
	
	function listar_producto_categoria($lim){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT * FROM producto, imagen WHERE galeria_image=id_pro AND tabla_image='producto' AND categoria_pro='4' GROUP BY id_pro DESC ORDER BY categoria_pro DESC, prioridad_pro ASC LIMIT 0 , $lim";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$resultado['fecha_pro']=$this->convertir_fecha($resultado['fecha_pro']);
			$this->listado[] = $resultado;
		}
	}
	
	function listar_producto_imagen($condicion){
		/* Metodo para listar los usuarios y sus opciones. */
		if (isset($_POST['buscar']))
			$_SESSION['buscar']=$_POST['buscar'];
		$cat=$_SESSION['categoria_actual'];	
		if (isset($_SESSION['buscar']) && $_SESSION['buscar']!=""){	
			$this->buscar=$_SESSION['buscar'];
			$sql="SELECT * FROM producto, imagen WHERE 
			categoria_pro='$cat' AND galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' AND nombre_image='$condicion' AND 
			(categoria_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
	        prioridad_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR
			nombre_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			marca_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			codigo_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			limite_pro LIKE '%' '".$_SESSION['buscar']."' '%' OR 
			claves_pro LIKE '%' '".$_SESSION['buscar']."' '%') 
			GROUP BY id_pro ORDER BY categoria_pro, prioridad_pro ASC";
		}else{
			$sql="SELECT * FROM producto, imagen WHERE 
			categoria_pro='$cat' AND galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' AND nombre_image='$condicion' 
			GROUP BY id_pro ORDER BY categoria_pro, prioridad_pro ASC";
			
		}
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			setlocale(LC_ALL, 'es_ES');
			//$resultado['nombre_pro']=ucwords(strtolower($resultado['nombre_pro']));
			$resultado['detal_pro']=$this->convertir_moneda($resultado['detal_pro']);
			$resultado['mayor_pro']=$this->convertir_moneda($resultado['mayor_pro']);
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				
			$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
			$temp=$resultado['limite_pro'];
			$resultado['limite_pro']="";
			//echo "Numero: ".$temp;
			
			for($i=1;$i<=$temp;$i++){
				if($i<=12)
					$resultado['limite_pro'][]=$i;
			}
			$this->descripcion=$resultado['descripcion_pro'];
			$resultado['descripcion_pro']=strip_tags($resultado['descripcion_pro']);
			$this->listado[] = $resultado;
		}
	}
	function mostrar_producto_img(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM producto WHERE id_pro='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$id=$resultado['id_pro'];
			$sql2="SELECT directorio_image, nombre_image FROM imagen WHERE galeria_image='$id' AND tabla_image='producto'ORDER BY id_image";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			
			while ($resultado2 = mysql_fetch_array($consulta2)){
				$this->listado[]=$resultado2;
			}
		}
	}
	
	function listar_producto_imagen_principal($condicion){
		$sql="SELECT * FROM producto, imagen WHERE categoria_pro='$condicion' AND galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' AND principal_pro='si' AND nombre_image='portada' ORDER BY prioridad_pro";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$this->listado[] = $resultado;
		}
		
		
	}
	function listar_producto_imagen2($localidad){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT * FROM producto, imagen WHERE categoria_pro='9' AND galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' AND 
			(nombre_pro LIKE '%' '".$localidad."' '%' OR 
	        descripcion_pro LIKE '%' '".$localidad."' '%') 
			GROUP BY id_pro ORDER BY RAND() ASC";
		
		//echo $sql;
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			setlocale(LC_ALL, 'es_ES');
			//$resultado['nombre_pro']=ucwords(strtolower($resultado['nombre_pro']));
			$resultado['detal_pro']=$this->convertir_moneda($resultado['detal_pro']);
			$resultado['mayor_pro']=$this->convertir_moneda($resultado['mayor_pro']);
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				
			$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
			$temp=$resultado['limite_pro'];
			$resultado['limite_pro']="";
			//echo "Numero: ".$temp;
			
			for($i=1;$i<=$temp;$i++){
				if($i<=12)
					$resultado['limite_pro'][]=$i;
			}
			$this->descripcion=$resultado['descripcion_pro'];
			$resultado['descripcion_pro']=strip_tags($resultado['descripcion_pro']);
			$this->listado[] = $resultado;
		}
	}
	 
	function listar_producto_nuevo2(){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT claves_pro, categoria_pro, id_pro, detal_pro, mayor_pro, directorio_image, nombre_image, marca_pro, nombre_pro, limite_pro, descripcion_pro  FROM producto, imagen WHERE categoria_pro!='4' AND galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' AND nombre_image='portada' GROUP BY id_pro ORDER BY categoria_pro DESC, RAND() LIMIT 0,4";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$aux="";
			$this->mensaje="si";
			$resultado['detal_pro']=$this->mostrar_precio($this->convertir_moneda($resultado['detal_pro']));
			$resultado['mayor_pro']=$this->mostrar_precio($this->convertir_moneda($resultado['mayor_pro']));
			$resultado['descripcion_pro']=strip_tags($resultado['descripcion_pro']);
			
			$temp=$resultado['limite_pro'];
			$resultado['limite_pro']="";
			//echo "Numero: ".$temp;
			
			for($i=1;$i<=$temp;$i++){
				if($i<=12) $resultado['limite_pro'][]=$i; else break;
			}
			
				$cat=$resultado['categoria_pro'];
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
			
			$this->listado[] = $resultado;
		}
	}
	
	function listar_producto_nuevo(){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT claves_pro, categoria_pro, id_pro, detal_pro, mayor_pro, directorio_image, nombre_image, marca_pro, nombre_pro, limite_pro, descripcion_pro  FROM producto, imagen WHERE galeria_image=id_pro AND tabla_image='Producto' AND disponible_pro='1' GROUP BY id_pro ORDER BY RAND() LIMIT 0 , 10";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$aux="";
			$this->mensaje="si";
			$resultado['detal_pro']=$this->mostrar_precio($this->convertir_moneda($resultado['detal_pro']));
			$resultado['mayor_pro']=$this->mostrar_precio($this->convertir_moneda($resultado['mayor_pro']));
			$resultado['descripcion_pro']=strip_tags($resultado['descripcion_pro']);
			
			$temp=$resultado['limite_pro'];
			$resultado['limite_pro']="";
			//echo "Numero: ".$temp;
			
			for($i=1;$i<=$temp;$i++){
				if($i<=12) $resultado['limite_pro'][]=$i; else break;
			}
			
				$cat=$resultado['categoria_pro'];
				$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
				$consulta2=mysql_query($sql2) or die(mysql_error());
				$resultado2 = mysql_fetch_array($consulta2);
				$aux=$this->modificar_url($resultado2['claves_cat']);
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
			
			$this->listado[] = $resultado;
		}
	}
	
	function listar_producto_vendido(){
		/* Metodo para listar los usuarios y sus opciones. */
		$sql="SELECT SUM(cantidad_det) AS TotalVentas, claves_pro, categoria_pro, producto_det, detal_pro, mayor_pro, id_pro, id_pro AS directorio_image FROM producto, detalle_pedido WHERE producto_det=id_pro GROUP BY producto_det ORDER BY SUM(cantidad_det) DESC LIMIT 0 , 5";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$aux="";
			$id_buscar=$resultado['id_pro'];
			$sql2="SELECT directorio_image FROM imagen WHERE galeria_image='$id_buscar'";
			$buscar=mysql_query($sql2)	or die(mysql_error());
			$resultados=mysql_fetch_array($buscar);
			$resultado['directorio_image']=$resultados['directorio_image'];
			$this->mensaje="si";
			$resultado['detal_pro']=$this->convertir_moneda($resultado['detal_pro']);
			$resultado['mayor_pro']=$this->convertir_moneda($resultado['mayor_pro']);
			
			$cat=$resultado['categoria_pro'];
			$sql2="SELECT * FROM categoria WHERE id_cat='$cat'";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$resultado2 = mysql_fetch_array($consulta2);
			$aux=$this->modificar_url($resultado2['claves_cat']);
			$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
				
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
	
	function mostrar_producto(){
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM producto WHERE id_pro='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->codigo=$resultado['codigo_pro'];
			setlocale(LC_ALL, 'es_ES');
			//$this->nombre=ucwords(strtolower($resultado['nombre_pro']));
			$this->nombre=$resultado['nombre_pro'];
			$this->principal=$resultado['principal_pro'];
			$this->suiche=false;
			$this->ruta=""; $this->categoria="";
			$this->buscar_ruta_nodo($resultado['categoria_pro']);
			for($i=count($this->ruta)-1;$i>=0;$i--){
				$this->categoria.=" &raquo; ".$this->ruta[$i]['nombre_cat'];
			}
			
			$this->id_cat=$resultado['categoria_pro'];
			$this->prioridad=$resultado['prioridad_pro'];
			$this->vistas=$resultado['vistas_pro'];
			$this->hotel=$resultado['hotel_pro'];
			$this->detal=$this->convertir_moneda($resultado['detal_pro']);
			$this->mayor=$this->convertir_moneda($resultado['mayor_pro']);
			
			$this->cantidad=$resultado['limite_pro'];
			$this->fecha=$this->convertir_fecha($resultado['fecha_pro']);
			$temp=$resultado['limite_pro'];
			$this->limite2=$temp=10;
			//echo "Numero: ".$temp;
			for($i=1;$i<=$temp;$i++){
				if($i<=12) $this->limite[]=$i; else break;
			}
			$this->descripcion=$resultado['descripcion_pro'];
			$this->claves=$resultado['claves_pro'];
			$this->marca=$resultado['marca_pro'];
		
		} 
	}
	
	function mostrar_producto_publico($id){
		/*Metodo para mostrar un usuario seleccionado */
		
		$sql="SELECT * FROM producto WHERE id_pro='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		$this->id=$id;
		$this->codigo=$resultado['codigo_pro'];
		setlocale(LC_ALL, 'es_ES');
		//$this->nombre=ucwords(strtolower($resultado['nombre_pro']));
		$this->nombre=$resultado['nombre_pro'];
		
		$this->suiche=false;
		$this->ruta=""; $this->categoria="";
		$this->buscar_ruta_nodo($resultado['categoria_pro']);
		for($i=count($this->ruta)-1;$i>=0;$i--){
			$this->categoria.=" &raquo; ".$this->ruta[$i]['nombre_cat'];
		}
		
		$this->id_cat=$resultado['categoria_pro'];
		$this->prioridad=$resultado['prioridad_pro'];
		$this->vistas=$resultado['vistas_pro'];
		
		$this->detal=$this->convertir_moneda($resultado['detal_pro']);
		$this->mayor=$this->convertir_moneda($resultado['mayor_pro']);
		
		$this->cantidad=$resultado['limite_pro'];
		$this->fecha=$this->convertir_fecha($resultado['fecha_pro']);
		$temp=$resultado['limite_pro'];
		$this->limite2=$temp=10;
		//echo "Numero: ".$temp;
		for($i=1;$i<=$temp;$i++){
			if($i<=12) $this->limite[]=$i; else break;
		}
		$this->descripcion=$resultado['descripcion_pro'];
		$this->claves=$resultado['claves_pro'];
		$this->marca=$resultado['marca_pro'];
	
	}
	
	function insertar_producto($con){
	/*Metodo para editar un usuario seleccionado */	
		$this->accion="Datos del Nuevo Producto";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores();
			$sql="SELECT nombre_pro FROM producto WHERE nombre_pro='$this->nombre'";
			$verificar=mysql_query($sql) or die(mysql_error());
			if(!$resultado = mysql_fetch_array($verificar)){
				$this->codigo=$this->crear_codigo($this->categoria,"");
				$this->fecha=$this->convertir_fecha($this->fecha);
				$sql="INSERT INTO producto VALUES ('', '$this->codigo', '$this->nombre', '$this->categoria', '$this->prioridad', '$this->detal', '$this->mayor', '$this->limite', '$this->descripcion' , '$this->claves', '0', '$this->marca', '0','$this->principal','$this->hotel')";
				$consulta=mysql_query($sql) or die(mysql_error());
				$id=mysql_insert_id($con);
				header("location:/admin/producto/detalle.php?id=$id");
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
	
	function editar_producto(){
	/*Metodo para editar un usuario seleccionado */		
		$this->accion="Editando Datos del Producto";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$this->asignar_valores();
			$this->fecha=$this->convertir_fecha($this->fecha);
			$sql="UPDATE producto SET nombre_pro='$this->nombre', categoria_pro='$this->categoria', prioridad_pro='$this->prioridad', detal_pro='$this->detal', mayor_pro='$this->mayor', limite_pro='$this->limite', descripcion_pro='$this->descripcion', claves_pro='$this->claves', marca_pro='$this->marca',hotel_pro='$this->hotel',principal_pro='$this->principal' WHERE id_pro='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/producto/");
		}else{
		  $this->mostrar_producto();
		  $sql="SELECT * FROM categoria ORDER BY prioridad_cat ASC";
		  $consulta=mysql_query($sql) or die(mysql_error());
		  while ($resultado = mysql_fetch_array($consulta)){
				$this->mensaje="si";
				$this->listado[] = $resultado;
		  }
		}
	}
	
	function eliminar_producto(){
	/*Metodo para eliminar un usuario seleccionado */	
		$id=$_GET['id'];
		$sql="DELETE FROM producto WHERE id_pro='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		header("location:/admin/producto/");
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
	/*Metodo para crear códigos de clasificados */
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
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE producto SET aprobado_pro='$valor' WHERE id_pro='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location:/admin/producto/");
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
	
	function visita_producto(){
		/*Metodo para sumar una visita a un anuncio específico */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="UPDATE producto SET vistas_pro=vistas_pro+1 WHERE id_pro='$id'";
			$sumatoria=mysql_query($sql) or die(mysql_error());
		}
	}
	
	function buscar_recomendado($precio, $nombre, $id, $cat){
		/*Metodo para buscar autos recomendados */
		$precio_inicial=$precio-50;
		$precio_final=$precio+50;
		$marcas=explode(" ",$nombre);
		$sql="SELECT * FROM producto, imagen WHERE galeria_image=id_pro AND tabla_image='producto' AND id_pro!='$id' AND disponible_pro='1' AND categoria_pro!='10' AND nombre_image='portada' GROUP BY id_pro ORDER BY RAND() LIMIT 0,5";
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
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
				
				$temp=$resultado['limite_pro'];
				$resultado['limite_pro']="";
				//echo "Numero: ".$temp;
				
				for($i=1;$i<=$temp;$i++){
					if($i<=12) $resultado['limite_pro'][]=$i; else break;
				}
				
				$resultado['detal_pro']=$this->mostrar_precio($resultado['detal_pro']);
				$this->listado[] = $resultado;
		 }
	}
	
	function buscar_recomendado_hotel($precio, $nombre, $id, $cat){
		/*Metodo para buscar autos recomendados */
		$precio_inicial=$precio-50;
		$precio_final=$precio+50;
		$marcas=explode(" ",$nombre);
		$sql="SELECT * FROM producto, imagen WHERE galeria_image=id_pro AND tabla_image='producto' AND id_pro!='$id' AND disponible_pro='1' AND categoria_pro!='10' AND nombre_image='portada' GROUP BY id_pro ORDER BY RAND()";
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
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
				
				$temp=$resultado['limite_pro'];
				$resultado['limite_pro']="";
				//echo "Numero: ".$temp;
				
				for($i=1;$i<=$temp;$i++){
					if($i<=12) $resultado['limite_pro'][]=$i; else break;
				}
				
				$resultado['detal_pro']=$this->mostrar_precio($resultado['detal_pro']);
				$this->listado[] = $resultado;
		 }
	}
	
	function buscar_recomendado2($localidad){
		/*Metodo para buscar autos recomendados */
		$sql="SELECT * FROM producto, imagen WHERE galeria_image=id_pro AND tabla_image='producto' AND disponible_pro='1' AND categoria_pro!='10' AND 
			(nombre_pro LIKE '%' '".$localidad."' '%' OR 																																			  			descripcion_pro LIKE '%' '".$localidad."' '%') GROUP BY id_pro ORDER BY RAND() LIMIT 0,5";
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
				$resultado['url']=$aux."_".$this->modificar_url($resultado['claves_pro']);
				
				$temp=$resultado['limite_pro'];
				$resultado['limite_pro']="";
				//echo "Numero: ".$temp;
				
				for($i=1;$i<=$temp;$i++){
					if($i<=12) $resultado['limite_pro'][]=$i; else break;
				}
				
				$resultado['detal_pro']=$this->mostrar_precio($resultado['detal_pro']);
				$this->listado[] = $resultado;
		 }
	}
	
	function disponible_registro(){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor'];
			//echo "Entro: ".$_GET['valor'];
			$sql="UPDATE producto SET disponible_pro='$valor' WHERE id_pro='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());
			
			header("location:/admin/producto/");
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
	
	//////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////          Planes y Temporadas           ////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////
	
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
		$this->maxadultos=$_POST['maxadultos'];
		$this->prioridad=$_POST['prioridad'];
		$this->mostrar=$_POST['publica'];
		
	}
	
	function mostrar_temporada(){ 
		/*Metodo para mostrar un usuario seleccionado */
		if (isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$sql="SELECT * FROM temporadas2 WHERE id='$id'";
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
			$sql="SELECT * FROM habitaciones2 WHERE id='$temp'";
			$consulta=mysql_query($sql) or die(mysql_error());
			$resultado = mysql_fetch_array($consulta);
			$this->id=$id;
			$this->id_cat=$resultado['id'];
			$this->nombre=$resultado['nombre'];
			$this->prioridad=$resultado['orden'];
			$this->mostrar=$resultado['listar'];
			$this->descripcion=$resultado['descripcion'];
			$this->precio=$resultado['precio'];
			$this->maxadultos=$resultado['maxAdultos'];
		} 
	}
	
	function listar_temporada_privada($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT *, id AS planes FROM temporadas2 WHERE id_alojamiento='$id' ORDER BY orden";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$buscar=$resultado['id'];
			$lista="";
			$sql2="SELECT * FROM habitaciones2 WHERE id_alojamiento='$id' AND id_temporada='$buscar' ORDER BY orden";
			//echo $sql2."<br />";
			$habitaciones=mysql_query($sql2) or die(mysql_error());
			while ($respuesta = mysql_fetch_array($habitaciones)){
				$this->mensaje2="si";
				$respuesta['precio']=$this->mostrar_precio($respuesta['precio']);
				$lista[]=$respuesta;
			}
			$resultado['habitacion']=$lista;
			$resultado['fecha_inicio']=$this->convertir_fecha($resultado['fecha_inicio']);
			$resultado['fecha_fin']=$this->convertir_fecha($resultado['fecha_fin']);
			$this->listado[] = $resultado;
			
		}
	}
	
	function listar_temporada_producto($id){
		/* Metodo para listar los facilidades y sus opciones. */
		$sql="SELECT *, id AS habitacion FROM temporadas2 WHERE id_alojamiento='$id' AND activa='1' ORDER BY orden";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$buscar=$resultado['id'];
			$lista="";
			$sql2="SELECT * FROM habitaciones2 WHERE id_alojamiento='$id' AND id_temporada='$buscar' AND listar='1' ORDER BY orden";
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
	
	function insertar_temporada_producto(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Insertar Nueva Temporada";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores2();
			$this->desde=$this->convertir_fecha($this->desde);
			$this->hasta=$this->convertir_fecha($this->hasta);
			
			$sql="INSERT INTO temporadas2 VALUES ('', '$this->id', '$this->mostrar', '$this->prioridad', 'Por Fecha', '0', '$this->desde', '$this->hasta', '0', '0', '$this->alternativo', '0', '0', '$this->titulo', 'NULL', '$this->paxadicional', 'NULL', '$this->desde_a', '$this->hasta_a', '$this->precio_a', '0', 'NULL', '$this->desde_b', '$this->hasta_b', '$this->precio_b', '0', 'NULL', '0', '0', '0', '0', 'NULL')";
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/producto/detalle.php?id=$id#next");
			exit();
		}
	}
	
	function editar_temporada_producto(){
	/*Metodo para editar un temporada seleccionado */		
		$this->accion="Editar Temporada";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$temporada=$_GET['id'];
			$this->asignar_valores2();
			$this->desde=$this->convertir_fecha($this->desde);
			$this->hasta=$this->convertir_fecha($this->hasta);
			
			$sql="UPDATE temporadas2 SET activa='$this->mostrar', orden='$this->prioridad', fecha_inicio='$this->desde', fecha_fin='$this->hasta', texto_alternativo='$this->alternativo', titulo_adicional='$this->titulo', precio_pax_adic='$this->paxadicional', edadNinosDesde1='$this->desde_a', edadNinosHasta1='$this->hasta_a', precio_ninos='$this->precio_a', edadNinosDesde2='$this->desde_b', edadNinosHasta2='$this->hasta_b', precio_ninos2='$this->precio_b' WHERE id='$temporada'";
			
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/producto/detalle.php?id=$id#next");
			exit();
		}else{
			$this->mostrar_temporada();
		}
	}
	
	function editar_plan2(){
	/*Metodo para editar un pagos seleccionado */	
		if (isset($_GET['valor']) && $_GET['valor']!="" && isset($_GET['id']) && $_GET['id']!=""){
			$id=$_GET['id'];
			$valor=$_GET['valor']; 
			$back=$_GET['back'];
			
			$sql="UPDATE habitaciones2 SET listar='$valor' WHERE id='$id'";
			//echo "Entro: ".$sql;
			$consulta=mysql_query($sql) or die(mysql_error());
			
			//if($valor==1)
				//$this->enviar_correos2($id);
			header("location: /admin/producto/detalle.php?id=$back#next");
		}
	}
	
	function insertar_plan_temporada_producto(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Insertar Nuevo Plan";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores3();
			
			$sql="INSERT INTO habitaciones2 VALUES ('', '$this->id', '$this->temporada', '$this->nombre', '$this->prioridad', '$this->mostrar', '$this->precio', '$this->descripcion', '$this->maxadultos', 'NULL', 'NULL', 'NULL')";
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/producto/detalle.php?id=$id#next");
			exit();
		}
	}
	
	function editar_plan_temporada_producto(){
	/*Metodo para insertar un temporada seleccionado */		
		$this->accion="Editar Datos del Plan";
		if (isset($_POST['envio']) && $_POST['envio']=="Guardar"){
			$this->asignar_valores3();
			
			$sql="UPDATE habitaciones2 SET nombre='$this->nombre', orden='$this->prioridad', listar='$this->mostrar', precio='$this->precio', descripcion='$this->descripcion', maxAdultos='$this->maxadultos' WHERE id='$this->temporada'";
			$id=$this->id;
			$consulta=mysql_query($sql) or die(mysql_error());
			header("location:/admin/producto/detalle.php?id=$id#next");
			exit();
		}else{
			$this->mostrar_plan();
		}
	}
	
	function mostrar_producto_cotizacion($producto, $temporada, $plan){
		/*Metodo para mostrar un usuario seleccionado */
			$sql="SELECT * FROM producto, temporadas2, habitaciones2 WHERE id_pro='$producto' AND temporadas2.id_alojamiento='$producto' AND temporadas2.id='$temporada' AND temporadas2.id=habitaciones2.id_temporada AND habitaciones2.id='$plan'";
			
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
		$producto=$_POST['producto'];
		$plan=$_POST['plan'];
		$temporada=$_POST['temp'];
		$fecha_llegada=$_POST['llegada'];
			$this->desde=$_POST['llegada'];
		$fecha_salida=$_POST['salida'];
			$this->hasta=$_POST['salida'];
		
		$sql="SELECT * FROM producto, temporadas2, habitaciones2 WHERE id_pro='$producto' AND temporadas2.id_alojamiento='$producto' AND temporadas2.id='$temporada' AND temporadas2.id=habitaciones2.id_temporada AND habitaciones2.id='$plan'";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		//echo "Noches: ".$noches;
		$arreglo_datos="";
		$adultos=""; $infantes=""; $ninos="";
		$i=1;
		$temp="";
		$adultos+=$_POST['numero_adultos'.$i];
			$temp[]=$_POST['numero_adultos'.$i];
		$infantes+=$_POST['ninos_a'.$i];
			$temp[]=$_POST['ninos_a'.$i];
		$ninos+=$_POST['ninos_b'.$i];
			$temp[]=$_POST['ninos_b'.$i];
		$temp[]=$resultado['precio'];
		$temp[]=$resultado['precio_ninos'];
		$temp[]=$resultado['precio_ninos2'];
		$arreglo_dato[]=$temp;
		
		$this->listado=$arreglo_dato;
		$_SESSION['personas']=$arreglo_dato;
		//print_r($this->listado);
		
		$numero_personas=$adultos+$infantes+$ninos;
		$fee=1000;
	
			//cotizamos con precio completo
			$total_adulto=($resultado['precio']*$adultos);
			$total_infantes=($resultado['precio_ninos']*$infantes);
			$total_ninos=($resultado['precio_ninos2']*$ninos);
			
			$subtotal=$total_adulto+$total_infantes+$total_ninos;
				$this->subtotal=$subtotal;
			$comision=$fee;
				$this->comision=$comision;
			$total=$subtotal+$comision;
				$this->total=$total;
			
			/*echo "Monto Adulto: ".$total_adulto."<br />";
			echo "Monto Infantes: ".$total_infantes."<br />";
			echo "Monto Ni&ntilde;os: ".$total_ninos."<br />";
			echo "Subtotal: ".$subtotal."<br />";
			echo "Comision: ".$comision."<br />";
			echo "Total: ".$total."<br /><br />";*/

		
		$observaciones=$_POST['comentario'];
		$this->condiciones=$_POST['comentario'];
		$this->mensaje2="si";
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
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

class Carro_Compra extends Config{
	var $ahorro;
	var $cantidad;
	var $producto;
	var $total;
	var $numero;
	var $descuento;
	var $prioridad;
	var $id;
	var $detal;
	var $mayor;
	var $limite;
	var $descripcion;
	var $listado;
	var $listado2;
	var $temporal=array("imagen", "codigo", "nombre", "categoria", "cantidad", "precio", "id", "tipo", "detalles", "observaciones", "subtotal", "comision", "total");
	var $buscar;
	var $mensaje;
	var $accion;
	var $valor_dollar;
	var $valor_euro;
	//Variables para Temporada
	var $desde;
	var $hasta;
	var $titulo;
	var $alternativo;
	var $paxadicional;
	var $mostrar;
	var $tipo;
	//Variables para Plan
	var $precio;
	var $temporada;
	var $plan;
	var $noches;
	var $subtotal;
	var $comision;
	var $observaciones;
	
	var $seleccion;
	var $operador;
	
	function Carro_Compra(){// Constructor
	}
	
	function asignar_valores(){
		/* Metodo para recibir valores del exterior. */
		$this->cantidad=$_POST['cantidad'];
		$this->producto=$_POST['id'];
	}
	
	function asignar_valores2(){
		/* Metodo para recibir valores del exterior. */
		$this->cantidad=$_POST['cantidad'];
		$this->temporada=$_POST['temp'];
		$this->plan=$_POST['plan'];
		$this->producto=$_POST['hotel'];
		$this->noches=$_POST['noches'];
		$this->listado2=$_SESSION['personas'];
		$this->observaciones=$_POST['observaciones'];
		$this->subtotal=$_POST['subtotal'];
		$this->comision=$_POST['comision'];
		$this->total=$_POST['total'];
		$this->desde=$_POST['desde'];
		$this->hasta=$_POST['hasta'];
		$this->tipo=$_POST['tipo'];
	}
	
	function asignar_valores3(){
		/* Metodo para recibir valores del exterior. */
		$this->cantidad=$_POST['cantidad'];
		$this->temporada=$_POST['temp'];
		$this->plan=$_POST['plan'];
		$this->producto=$_POST['producto'];
		$this->noches=$_POST['noches'];
		$this->listado2=$_SESSION['personas'];
		$this->observaciones=$_POST['observaciones'];
		$this->subtotal=$_POST['subtotal'];
		$this->comision=$_POST['comision'];
		$this->total=$_POST['total'];
		$this->desde=$_POST['desde'];
		$this->hasta=$_POST['hasta'];
		$this->tipo=$_POST['tipo'];
	}
	
	function listar_carro(){
		/* Metodo para listar los productos y sus opciones. */
		$this->mensaje="no";
		if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
			unset($this->listado);
			$carro_size=count($_SESSION['carro']);
			foreach($_SESSION['carro'] as $valor => $indice){
			//for($i=0;$i<=$carro_size;$i++){
				if($_SESSION['carro'][$valor]!=""){
					$this->mensaje="si";
					$this->listado[] = $_SESSION['carro'][$valor];
				}
			}
		}
		
		//print_r($this->listado);
	}
	
	function insertar_carro(){
	/*Metodo para insertar un pedido seleccionado */
		$this->asignar_valores3();
		$buscar=false;
		if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
			foreach($_SESSION['carro'] as $valor => $indice){
				if($_SESSION['carro'][$valor]['id']==$this->producto){
					$_SESSION['carro'][$valor]['cantidad']=$_SESSION['carro'][$valor]['cantidad']+$this->cantidad;
					$buscar=true;
				}
			}
	    }
		
		//print_r($_POST);
		
		if($buscar==false){
		$sql="SELECT producto.nombre_pro, producto.codigo_pro, producto.detal_pro, imagen.directorio_image, categoria.nombre_cat  
		FROM producto 
		INNER JOIN categoria ON producto.categoria_pro=categoria.id_cat
		INNER JOIN imagen ON producto.id_pro=imagen.galeria_image AND imagen.tabla_image='producto' AND nombre_image!='mapa' 
		WHERE producto.id_pro='$this->producto'";
		
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		//Roberto Edit
			$_SESSION['carro'][]=array(
			"imagen"=>$resultado['directorio_image'], 
			"codigo"=>$resultado['codigo_pro'], 
			"nombre"=>$resultado['nombre_pro'], 
			"categoria"=>$resultado['nombre_cat'], 
			"cantidad"=>$this->cantidad, 
			"precio"=>$resultado['detal_pro'], 
			"id"=>$this->producto, 
			"tipo"=>$this->get_categoria($this->tipo),
			"detalles"=>$this->listado2,  
			"observaciones"=>$this->observaciones,  
			"subtotal"=>$this->subtotal, 
			"comision"=>$this->comision, 
			"total"=>$this->total, 
			"desde"=>$this->desde, 
			"hasta"=>$this->hasta, 
			"noches"=>$this->noches, 
			"borrar"=>"producto");
			
			
		
		/* print_r($_SESSION['carro']);
		echo $carro_size; */
		}
	}
	
	function insertar_carro_hotel(){
	/*Metodo para insertar un pedido seleccionado */
		$this->asignar_valores2();
		$buscar=false;
		
		if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
			foreach($_SESSION['carro'] as $valor => $indice){
				if($_SESSION['carro'][$valor]['id']==$this->producto){
					$_SESSION['carro'][$valor]['cantidad']=$_SESSION['carro'][$valor]['cantidad']+$this->cantidad;
					$buscar=true;
				}
			}
	    }
		if($buscar==false){
		$sql="SELECT hotel.nombre_hot, hotel.codigo_hot, hotel.id_hot, imagen.directorio_image, temporadas.id  
		FROM hotel 
		INNER JOIN temporadas ON hotel.id_hot=temporadas.id_alojamiento
		INNER JOIN imagen ON hotel.id_hot=imagen.galeria_image AND imagen.tabla_image='hotel' AND nombre_image!='mapa'
		WHERE hotel.id_hot='$this->producto'";
		
		//echo $sql;
		
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		//Roberto Edit
			$_SESSION['carro'][]=array(
			"imagen"=>$resultado['directorio_image'], 
			"codigo"=>$resultado['codigo_hot'], 
			"nombre"=>$resultado['nombre_hot'], 
			"categoria"=>"Hotel", 
			"cantidad"=>$this->cantidad, 
			"precio"=>$resultado['detal_pro'], 
			"id"=>$this->producto, 
			"tipo"=>$this->tipo,
			"detalles"=>$this->listado2, 
			"observaciones"=>$this->observaciones, 
			"subtotal"=>$this->subtotal, 
			"comision"=>$this->comision, 
			"total"=>$this->total, 
			"desde"=>$this->desde, 
			"hasta"=>$this->hasta, 
			"noches"=>$this->noches, 
			"borrar"=>"hotel");
		
		//print_r($_SESSION['carro']);
		//echo $carro_size; */
		}
	}
	
	function eliminar_producto_carro($tipo){
	/*Metodo para eliminar un producto del carro*/ 
		  $id=$_GET['pos'];
		  $ncontrado=false;
		  $posicion=0;
		  foreach($_SESSION['carro'] as $valor => $indice){
			   if($_SESSION['carro'][$valor]['codigo']==$id && $_SESSION['carro'][$valor]['borrar']==$tipo){
				$ncontrado=true;
				$posicion=$valor;
			   }
		  }
		  if($ncontrado==true)
		  unset($_SESSION['carro'][$posicion]);
	}
	
	function total_monto(){
	/*Metodo para buscar el nombre de la categoria */
		if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
			$carro_size=count($_SESSION['carro']);
			if($carro_size<=0){
				$this->numero=0;
				$this->total=0;
				$this->descuento=0;
			}else{
				$this->numero=0;
				$this->total=0;
				$this->descuento=0;
				$total_detal=0;
				$total_mayor=0;
				foreach($_SESSION['carro'] as $valor => $indice){
					$this->numero = $this->numero+$_SESSION['carro'][$valor]['cantidad'];
					$total_detal = $total_detal+($_SESSION['carro'][$valor]['total']);
					//$total_mayor = $total_mayor+($_SESSION['carro'][$valor]['precio_may']*$_SESSION['carro'][$valor]['cantidad']);
				}
	
					$this->total=$total_detal;
					$this->descuento=0;
				
				
				/* for($i=0;$i<=$carro_size-1;$i++){
					$this->numero = $this->numero+$_SESSION['carro'][$i]['cantidad'];
					$this->total = $this->total+($_SESSION['carro'][$i]['precio']*$_SESSION['carro'][$i]['cantidad']);
				} */
			}
		}else{
			$this->numero=0;
			$this->total=0;
			$this->descuento=0;
		}
		//Aqui s convierte la moneda antesde guardar!!!===================>>>>>>>>>>>
		$this->total=$this->convertir_moneda($this->total);
		$this->descuento=$this->convertir_moneda($this->descuento);
	}
	
	function formalizar_pedido($con){
	/*Metodo para insertar el pedido en la base de datos */
		if(isset($_SESSION['carro']) && $_SESSION['carro']!=""){
			//Recolectando datos del pedido
			$sql="SELECT MAX(id_ped) AS total FROM pedidos";
			$count=mysql_query($sql) or die(mysql_error());
			$row=mysql_fetch_array($count);
			$total=$row['total'];
			$total++;
			$codigo="PED-".$total;
			
			$cliente=$_SESSION['id_temporal'];
						
			$fecha=date("Y-m-d");
			$hora=date("h:i:s");
			$this->total_monto();
			$cantidad=$this->numero;
			
			$comentario=$_POST['comentario'];
			$descuento=$_POST['descuento'];
			$subtotal=$_POST['subtotal'];
			$tarjeta= $_POST['tarjeta'];
			$direccion= $_POST['direccion'];
			$moneda=$_SESSION['moneda_temp'];
			/*
			echo "La tarjeta: ".$_POST['tarjeta']."<br /><br />";
			echo "La Direccion: ".$_POST['direccion']."<br /><br />";
			
			echo "El Descuento: ".$_POST['descuento']."<br /><br />";
			echo "EL Subtotal: ".$_POST['subtotal']."<br /><br />";
			*/
			$monto=$this->total-$descuento;
			$this->seleccionar_operador();
			$id_pago=mysql_insert_id($con);
			$sql="INSERT INTO pedidos (codigo_ped, cliente_ped, fecha_ped, hora_ped, subtotal_ped, descuento_ped, monto_ped, cantidad_ped, comentario_ped, moneda_ped, direccion_ped, tarjeta_ped, operador_ped) VALUES ('$codigo', '$cliente', '$fecha', '$hora', '$subtotal', '$descuento', '$monto', '$cantidad', '$comentario', '$moneda', '$direccion', '$tarjeta', '$this->operador')";
			
			$consulta=mysql_query($sql) or die(mysql_error());
			//Insertando los detalles del pedido
			$carro_size=count($_SESSION['carro']);
			
			$pedido=mysql_insert_id($con);
			//Asignar id de pedido a pago
			//$sql="UPDATE deposito SET pedido_dep='$pedido' WHERE id_dep='$id_pago'";
			//$actualizar=mysql_query($sql) or die(mysql_error());
			
			
			foreach($_SESSION['carro'] as $valor => $indice){
				$producto = $_SESSION['carro'][$valor]['id'];
				$tipo = $_SESSION['carro'][$valor]['tipo'];
				$cantidad = $_SESSION['carro'][$valor]['cantidad'];
				$subtotal = $_SESSION['carro'][$valor]['subtotal'];
				$comision = $_SESSION['carro'][$valor]['comision'];
				$total = $_SESSION['carro'][$valor]['total'];
				$observaciones = $_SESSION['carro'][$valor]['observaciones'];
				$desde = $this->convertir_fecha($_SESSION['carro'][$valor]['desde']);
				$hasta = $this->convertir_fecha($_SESSION['carro'][$valor]['hasta']);
				$noches = $_SESSION['carro'][$valor]['noches'];
				$camino = $_SESSION['carro'][$valor]['borrar'];
				
				$sql="INSERT INTO detalle_pedido VALUES ('', '$pedido', '$producto', '$tipo', '$cantidad', '$subtotal', '$comision', '$total', '$observaciones', '$desde', '$hasta', '$noches', '$camino')";
				$consulta=mysql_query($sql) or die(mysql_error());
				
				$detalle=mysql_insert_id($con);
			
				foreach($_SESSION['carro'][$valor]['detalles'] as $valor2 => $indice){
					
					$cantidad = $_SESSION['carro'][$valor]['detalles'][$valor2][0];
					$precio = $_SESSION['carro'][$valor]['detalles'][$valor2][3];
					$sql2="INSERT INTO detalle_producto VALUES ('', '$producto', '$detalle', 'Adultos', '$cantidad', '$precio', '$valor2')";
					$consulta=mysql_query($sql2) or die(mysql_error());
					
					$cantidad = $_SESSION['carro'][$valor]['detalles'][$valor2][1];
					$precio = $_SESSION['carro'][$valor]['detalles'][$valor2][4];
					$sql3="INSERT INTO detalle_producto VALUES ('', '$producto', '$detalle', 'Infantes', '$cantidad', '$precio', '$valor2')";
					$consulta=mysql_query($sql3) or die(mysql_error());
					
					$cantidad = $_SESSION['carro'][$valor]['detalles'][$valor2][2];
					$precio = $_SESSION['carro'][$valor]['detalles'][$valor2][5];
					$sql4="INSERT INTO detalle_producto VALUES ('', '$producto', '$detalle', '".utf8_decode('Niños')."', '$cantidad', '$precio', '$valor2')";
					$consulta=mysql_query($sql4) or die(mysql_error());
					
				}
			}
			
			unset($_SESSION['carro']);
			
			//Envio de correos informativos
			$this->enviar_correos($cliente, $this->seleccion);
			header("location: pedido_exitoso.php?id=$pedido");
			exit();
		}
	}
	
	function get_direccion($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT direccion_reg, ciudad_reg, estado_reg, pais_reg FROM registro WHERE id_reg='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		
		$dir=$resultado['direccion_reg'].", ".$resultado['ciudad_reg'].", ".$resultado['estado_reg']." - ".$resultado['pais_reg'];
		
		return $dir;
	}
	
	function enviar_correos($cliente, $operador){
	    //metodo para el envio de correos de aviso cuando se registran
		$this->mostrar_config(1);
		$id=$cliente;
		$sql="SELECT * FROM pedidos, registro WHERE cliente_ped=id_reg AND id_reg='$id' ORDER BY id_ped DESC";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado = mysql_fetch_array($consulta);
		
		$cuerpo ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />";
		$cuerpo .="<u>DATOS DEL CLIENTE:</u><br /><br />";
		
		$cuerpo .= "<strong>C&eacute;dula: </strong>".$resultado['tipo_reg']."".$resultado['cedula_reg']."<br />" ;
		$cuerpo .= "<strong>Nombre: </strong>".utf8_decode($resultado['nombre_reg'])."<br />" ;
		$cuerpo .= "<strong>Apellido: </strong>".utf8_decode($resultado['apellido_reg'])."<br />" ;
		$cuerpo .= "<strong>Tel&eacute;fonos: </strong>".$resultado['celular_reg']." / ".$resultado['telefono_reg']."<br />" ;
		$cuerpo .= "<strong>E-mail: </strong>".$resultado['correo_reg']."<br />" ;
		$cuerpo .= "<strong>Pedido C&oacute;digo:</strong> ".$resultado['codigo_ped']."<br />";
		$cuerpo .= "<strong>Cantidad de Productos:</strong> ".$resultado['cantidad_ped']."<br />";
		$cuerpo .= "<strong>Monto Aproximado a Cancelar:</strong> ".$resultado['monto_ped']."<br />";
		$cuerpo .= "<strong>Observaciones Generales:</strong> ".$resultado['comentario_ped']."<br /><br />";
		$cuerpo .="<u>DATOS DE SOLICITUD:</u><br />";
		
		$pedido=$resultado['id_ped'];
		$nomnre=$resultado['nombre_reg'];
		$apellido=$resultado['apellido_reg'];
		
		//Buscando los Datos del Pedido
		$sql2="SELECT *, id_det AS planes, id_det AS nombre_pro, id_det AS nombre_image, id_det AS directorio_image FROM detalle_pedido WHERE pedido_det='$pedido' ORDER BY id_det";
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
			$i=0;
			$numero=count($temp2);
			$tabla.="<table width='100%' border='0' align='left' cellpadding='6' cellspacing='4'>";
			while($i<$numero){
				//echo "Iter: ".$temp2[$i]['cambio_det'];
				if($temp2[$i]['cambio_det']=="hotel"){
					$tabla.="<tr bgcolor='#eeeeee'><td>
					<img src='http://www.Betcourvitur.com.ec/imagenes/miniaturas/".$temp2[$i]['directorio_image']."' width='120' border='0' />
		<br />".$temp2[$i]['codigo_pro']." 
					</td>
					<td>".$temp2[$i]['nombre_pro']."</td>
			
					<td colspan='3'>".$temp2[$i]['noches_det']." noches, entrada ".$temp2[$i]['llegada_det']." salida ".$temp2[$i]['salida_det']."</td> 
    				<td>Bs. ".$temp2[$i]['total_det']."</td>
    				</tr>
	
					<tr>
        			<td colspan='6' align='left'>";
			
					  $num=0;
					  $j=0;
					  $temporal="";
					  $numero2=count($temp2[$i]['planes']);
					  while($j<$numero2){
						  if($temp2[$i]['planes'][$j]['cambio_dpro']!=$temporal){
								$num++;	
								$tabla.="<br /> Habitaci&oacute;n ".$num;
						  }
						 $cambio=$temp2[$i]['planes'][$j]['cambio_dpro'];
						  
						   $tabla.=" | ".$temp2[$i]['planes'][$j]['cantidad_dpro']." ".$temp2[$i]['planes'][$j]['nombre_dpro'].", Bs."; 
						  
						  if($temp2[$i]['tipo_det']=="Habitacion"){
							$tabla.= $temp2[$i]['planes'][$j]['precio_dpro']*$temp2[$i]['noches_det'];
		
						  }else{
							$tabla.= $temp2[$i]['planes'][$j]['cantidad_dpro']*$temp2[$i]['planes'][$j]['precio_dpro']*$temp2[$i]['noches_det']; 
                  
						  }	
						  
						  
					  $temporal=$temp2[$i]['planes'][$j]['cambio_dpro'];
					  $j++;	
					  }
				  
						$tabla.="</td></tr>
						<tr>
						<td colspan='6' align='left'>
						<strong>Subtotal:</strong> Bs. ".$temp2[$i]['subtotal_det']." | 
						<strong>Gastos Administrativos:</strong> Bs. ".$temp2[$i]['comision_det']." | 
						<strong>Inversi&oacute;n:</strong> Bs. ".$temp2[$i]['total_det']."</td>
						</tr>
						
						<tr>
						<td colspan='6' align='left'>
						<strong>Observaciones:</strong> ".$temp2[$i]['observaciones_det']."</td>
						</tr>
						
						"; 
				  
						
					}else if($temp2[$i]['cambio_det']=="producto"){
						$tabla.="<tr bgcolor='#eeeeee'><td>
					<img src='http://www.Betcourvitur.com.ec/imagenes/miniaturas/".$temp2[$i]['directorio_image']."' width='120' border='0' />
		<br />".$temp2[$i]['codigo_pro']." 
					</td>
					<td>".$temp2[$i]['nombre_pro']."</td>
			
					<td colspan='3'>".$temp2[$i]['tipo_det']." | salida ".$temp2[$i]['llegada_det']."</td> 
    				<td>Bs. ".$temp2[$i]['total_det']."</td>
    				</tr>";
					
					
					$tabla.="<tr>
        	<td colspan='6' align='left'>";
					$num=0;
				    $j=0;
				    $temporal="";
				    $numero2=count($temp2[$i]['planes']);
					while($j<$numero2){
						if($temp2[$i]['planes'][$j]['cambio_dpro']!=$temporal){
								$num++;	
								$tabla.="<br /> Detalles";
						  }
						 $cambio=$temp2[$i]['planes'][$j]['cambio_dpro'];
              
						$tabla.=" | ".$temp2[$i]['planes'][$j]['cantidad_dpro']." ".$temp2[$i]['planes'][$j]['nombre_dpro'].", Bs.";
					  
						$tabla.= $temp2[$i]['planes'][$j]['precio_dpro']*$temp2[$i]['noches_det'];
		
						$temporal=$temp2[$i]['planes'][$j]['cambio_dpro'];
						$j++;	
					}
    		
					$tabla.="</td></tr>
					<tr>
						<td colspan='6' align='left'>
						<strong>Subtotal:</strong> Bs. ".$temp2[$i]['subtotal_det']." | 
						<strong>Gastos Administrativos:</strong> Bs. ".$temp2[$i]['comision_det']." | 
						<strong>Inversi&oacute;n:</strong> Bs. ".$temp2[$i]['total_det']."</td>
						</tr>
						
						<tr>
						<td colspan='6' align='left'>
						<strong>Observaciones:</strong> ".$temp2[$i]['observaciones_det']."</td>
						</tr>"; 
					}
    				$i++;
  				}
				
				$tabla.="<tr>
   	 <td colspan='6' align='left'>
   	   <div>Montos Total de la Solicitud</div>
   	   <div>Total: Bs.".$resultado['monto_ped']."</div>
       </td></tr>";
				
				$tabla.= "</table>";
		
		$cuerpo .= $tabla;
		$cuerpo .= "----  FIN DATOS  ----";
		$cuerpo .= "<br />";
		
		/*print_r($temp2);
		echo "<br /><br />".$cuerpo;
		exit();*/
		
		$subject= "Solicitud de Reserva ".$this->empresa;
		$subject2= "Solicitud de Reserva ".$this->empresa;
		
		$basemailfor=$operador;
		$basemailfor2="paquetesweb@gmail.com";
		$basemailfor3="marabino20@gmail.com";
		$basemailfrom = $resultado['correo_reg'];
		
		$respuesta ="<img src='".$this->website."/imagenes/logon.jpg' /><br /><br />
		<strong>Estimado(a) ".$resultado['nombre_reg']." ".$resultado['apellido_reg'].",</strong><br />
		¡Tenemos el agrado de tramitar su solicitud de reserva en Betcourvitur.com.ec!<br /><br />
		A continuación, le presentamos un detalle de los servicios tramitados en su solicitud.
		<br /><br />"
		
		.$tabla.
		
		"<br /><br />
		<strong>Pedido C&oacute;digo:</strong> ".$resultado['codigo_ped']."<br />
		<strong>Cantidad de Productos:</strong> ".$resultado['cantidad_ped']."<br />
		<strong>Monto Aproximado a Cancelar:</strong> ".$resultado['monto_ped']."<br />
		<strong>Observaciones Generales:</strong> ".$resultado['comentario_ped']."
		<br /><br />
		
		En las próximas horas uno de nuestros representantes se comunicar&aacute; con usted para atender directamente su petici&oacute;n. Si desea observar e imprimir los datos de su solicitud de reserva, puede acceder a su cuenta de usuario en Betcourvitur.com.ec y dirigirse a la secci&oacute;n \"Mis Pedidos\".<br /><br />
		
		<strong>IMPORTANTE:</strong>
Esta cotizaci&oacute;n puede estar sujeta a cambio de tarifa y disponibilidad sin previo aviso. Un representante del Departamento de Ventas OnLine le confirmar&aacute; el status de cada uno de los servicios solicitados y verificar&aacute; las condiciones de la tarifa ofertada.<br /><br />

		¡Gracias por contactarnos! Deseamos que disfrute sus próximas vacaciones,
		<br /><br /> 
		¡Seiler Travel, todos los destinos en una sola agencia!
		<br /><br /> 
		Atentamente,<br />
		Departamento de Ventas ".$this->empresa."<br />
		Tel&eacute;fonos: +58-295-2671060 / +58-295-2670200<br />
		Celulares: +58-416-6963828 / +58-424-8427600<br />
		Facebook: <a href='http://www.facebook.com/SeilerTravel'>SeilerTravel</a><br />
		Twitter: <a href='http://www.twitter.com/seilertravel'>@SeilerTravel</a><br />
		Instagram: <a href='http://www.instagram.com/seilertravel'>@SeilerTravel</a>";
		
		$mail = new PHPMailer(true);
		$mail->From = $basemailfrom;
		$mail->FromName = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail->AddAddress($basemailfor, $nombre." ".$apellido);
		$mail->Subject = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail->Body = $cuerpo;
		$mail->AltBody = $cuerpo;
		$exito = $mail->Send();
		
		$mail2 = new PHPMailer(true);
		$mail2->From = $basemailfor;
		$mail2->FromName = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail2->AddAddress($basemailfrom, $nombre." ".$apellido);
		$mail2->Subject = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail2->Body = $respuesta;
		$mail2->AltBody = $respuesta;
		$exito2 = $mail2->Send();
		
		$mail3 = new PHPMailer(true);
		$mail3->From = $basemailfrom;
		$mail3->FromName = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail3->AddAddress($basemailfor2, $nombre." ".$apellido);
		$mail3->Subject = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail3->Body = $cuerpo;
		$mail3->AltBody = $cuerpo;
		$exito3 = $mail3->Send();
		
		$mail4 = new PHPMailer(true);
		$mail4->From = $basemailfrom;
		$mail4->FromName = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail4->AddAddress($basemailfor3, $nombre." ".$apellido);
		$mail4->Subject = utf8_decode("Solicitud de Reserva ".$this->empresa);
		$mail4->Body = $cuerpo;
		$mail4->AltBody = $cuerpo;
		$exito4 = $mail4->Send();

		/*if(mail ("$basemailfor", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" )){
		   mail ("$basemailfrom", "$subject", "$respuesta", "From: $basemailfor\nContent-Type: text/html" );
		   mail ("$basemailfor2", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );
		   mail ("$basemailfor3", "$subject2", "$cuerpo", "From: $basemailfrom\nContent-Type: text/html" );
		   
		   
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
	
	function valor_moneda(){
		$sql="SELECT * FROM configuracion";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		$this->valor_dollar=$resultado['dolar_conf'];
		$this->valor_euro=$resultado['euro_conf'];
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
	
	function get_categoria($id){
	/*Metodo para obtener el nombre de una categoria */	
		$sql="SELECT nombre_cat FROM categoria WHERE id_cat='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);

		return $resultado['nombre_cat'];
	}
	
	function seleccionar_operador(){
	/*Metodo para obtener el correo y el id del operador asignado*/	
		//buscar pdidos previos de usuario
		$cliente=$_SESSION['id_temporal'];
		$fecha_actual=date("Y-m-d");
		$ant=date("Y-m-d", strtotime("$fecha_actual -2 day"));
		
		$sql_previo="SELECT fecha_ped, operador_ped, cliente_ped FROM pedidos WHERE cliente_ped='$cliente' AND fecha_ped BETWEEN '$ant' AND '$fecha_actual' GROUP BY operador_ped";
		$consulta_previo=mysql_query($sql_previo) or die(mysql_error());
		
		//print_r($resultado_previo);
	    //echo $fecha_actual." - ".$ant."<br /><br />";
			
		if($resultado_previo=mysql_fetch_array($consulta_previo)){
			//echo "quedo aqui<br /><br />";
			$id_operador=$resultado_previo['operador_ped'];
		}else{
			
			$sql2="SELECT operador_ped, cliente_ped, COUNT(*) As total FROM pedidos GROUP BY operador_ped";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$temp=99999999; $id_operador=0;
			
			while($resultado2=mysql_fetch_array($consulta2)){
				//filtro de no repetición
				$sql3="SELECT operador_ped FROM pedidos ORDER BY id_ped DESC LIMIT 0,1";
				$consulta3=mysql_query($sql3) or die(mysql_error());
				$resultado3=mysql_fetch_array($consulta3);
				
				//echo "<br /><br />";
				//print_r($resultado2);
				//echo "<br />Ultimo ".$resultado3['operador_ped']."<br />";
				if($temp> $resultado2['total']){//&& $resultado2['operador_ped']!=$resultado3['operador_ped']){ 
				   $temp=$resultado2['total'];
				  //$id_operador=$resultado2['operador_ped'];
				  ///////////////	MOSCA AQUÍ  ///////////////
				  $id_operador=20;
				   //echo "<br /><br />entro temp: ".$temp." id: ".$id_operador;
				}
			}
			
		}
		
		$sql="SELECT * FROM usuario WHERE id_uso='$id_operador'";
		$consulta=mysql_query($sql) or die(mysql_error());
	    $resultado=mysql_fetch_array($consulta);
		
		//$this->seleccion=$resultado['correo_uso'];
		//$this->operador=$resultado['id_uso'];
		
		
		$this->seleccion="reservas8.integral@Betcourvitur.com.ec";
		$this->operador=22;
		
		//echo $this->seleccion." <br /><br />";
		//echo $this->operador;
		
		//exit();
		
		
		//$pos=rand(0, 5);
		//$correos=array("online@Betcourvitur.com.ec","reservas7.integral@gmail.com", "reservas8.integral@gmail.com");
	}
	
}
?>
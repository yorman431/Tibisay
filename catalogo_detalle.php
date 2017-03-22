<?php
/* header para Smarty */
require('config/setup.php');
$smarty = new objeto_smarty;
/*  Fin header para Smarty */

include_once ("config/class.noticia.php");
include_once ("config/class.login.php");
include_once ("config/class.configuracion.php");
include_once ("config/class.link.php");
include_once ("config/class.categoria.php");
include_once ("config/class.publicidad.php");
include_once ("config/class.galeria.php");
include_once ("config/class.banner.php");
include_once ("config/class.producto.php");
include_once ("config/class.carro.php");
include_once("config/conexion.inc.php");

session_start();
//var_dump($_POST);exit;
$acceso = new Auth;
if ($_POST){
	if ($_POST['enviar'] == "Entrar"){
		$acceso->asignar_consulta($_POST['login'],$_POST['clave']);
		$acceso->login2($acceso->login, $acceso->password);
	}
	if ($_POST['enviar'] == "Salir")
		$acceso->logout();
		
	if (isset($_POST['moneda']))
		$_SESSION['moneda_temp']=$_POST['moneda'];
}

if ($_POST['enviar'] == "Enviar Solicitud"){
	$excursion = new Producto;
	$ida =$_POST['fecha_ida'];
	$resultado = str_replace("/", "-", $ida);
	$ida = date_create($resultado);
	$hoy = date_create('today');	
	if($ida < $hoy){
	$mensaje3="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;Las Fecha es incorrectas, verifique </div>";
	$error='si';
	$smarty->assign("error", $error);
		}else if($_POST['nombre'] == "" ||$_POST['tipo'] == ""||$_POST['cedula'] == ""||$_POST['email'] == ""
		|| $_POST['telefono'] == ""|| $_POST['fecha_ida'] == "" ||$_POST['adultos']== ""){
			
			$mensaje3="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;No ha completado los campos en su totalidad </div>";
			$error='si';
			$smarty->assign("error", $error);
		}elseif((isset($_POST['ninos'])&& isset($_POST['edades'])&& $_POST['ninos']!="" && $_POST['edades']=="")||(isset($_POST['ninos'])&& isset($_POST['edades'])&& $_POST['ninos']=="" && $_POST['edades']!="")){
		
			$mensaje3="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;Debe insertar la Edad de &eacute;l o los ni&ntilde;os! </div>";	
			$error='si';
			$smarty->assign("error", $error);
		}else{
	
			if(isset($_POST['excursion']) && $_POST['excursion'] !=""){
				$excursion->mostrar_producto();	
				$_POST['excursion']=$excursion->nombre;//Nombre del Producto para colocarlo en la Solicitud
			}
			
			if (isset($_POST['opc_exc']) && ($_POST['opc_exc'] == 'Excursiones')){
				$acceso->enviar_solicitud_excursion();
					
			}elseif(isset($_POST['opc_cru']) && ($_POST['opc_cru'] == 'Cruceros')){
				$acceso->enviar_solicitud_crucero();
					
			}elseif(isset($_POST['opc_prom']) && ($_POST['opc_prom'] == 'Promociones')){
				$acceso->enviar_solicitud_promociones();
				
			}
	       $mensaje3="<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close'    data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-ok'></span></strong>&nbsp;$acceso->mensaje</div>";
		    $error='no';
			$smarty->assign("error", $error);
		
		}
}

  


if(isset($_GET['msg']) && $_GET['msg']==1){
	$mensaje="<tr><td align='center' colspan='2' class='error'>La sesión de usuario a caducado! ingrese de nuevo!</td></tr>";	
}else if(isset($_GET['msg']) && $_GET['msg']==2){
	$mensaje="<tr><td align='center' colspan='2' class='error'>Usted no posee privilegios pa entrar en esta área!</td></tr>";	
}else if($acceso->mensaje!=""){
	$mensaje="<tr><td align='center' colspan='2' class='error'>$acceso->mensaje</td></tr>";
}

if(!isset($producto))
	$producto = new Producto;
$producto->mostrar_producto();
$producto->visita_producto();

if(!isset($productos))
	$productos = new Producto;
$productos->mostrar_producto_img();
$smarty->assign("opciones_img", $productos->listado);

if(!isset($imagen))
	$imagen=new Galeria;
$imagen->mostrar_imagenes3("producto", "portada", "distinto");
if($imagen->mensaje!="si"){
	$mensaje2="<tr><td colspan='4' align='center'>No hay imagen disponible!</td></tr>";	
}

//Gestion de carro de compras
if(!isset($_SESSION['procesando_carro']))
	$_SESSION['procesando_carro'] = new Carro_Compra;
$_SESSION['procesando_carro']->total_monto();

/*if(!isset($categoria))
	$categoria= new Categoria;
$categoria->cargar_subcategorias(0);
$smarty->assign("categorias", $categoria->listado);*/

if(!isset($link))
	$link= new Link;
$link->listar_link_menu("normal");
$link->mostrar_link_publico($content);
$nombre=$link->get_link($cont);
if(!isset($link2))
	$link2= new Link;
$link2->listar_link_menu("arriba");

if(!isset($link3))
	$link3= new Link;
$link3->listar_link_menu("normal");
$link3->mostrar_link_publico($content);

if(!isset($link4))
	$link4= new Link;
$link4->listar_link_menu("arriba");

if(!isset($link5))
	$link5= new Link;
$link5->listar_link_menu("abajo");

foreach($link->listado as $key=>$valor){
		$link->listado[$key]['icono_cat']=$link->tam_iconos($valor['icono_cat'],'fa-2x');
}
foreach($link2->listado as $key=>$valor){
		$link2->listado[$key]['icono_cat']=$link2->tam_iconos($valor['icono_cat'],'fa-2x');
}
foreach($link3->listado as $key=>$valor){
		$link3->listado[$key]['icono_cat']=$link->tam_iconos($valor['icono_cat'],'fa-3x');
}
foreach($link4->listado as $key=>$valor){
		$link4->listado[$key]['icono_cat']=$link2->tam_iconos($valor['icono_cat'],'fa-3x');
}
if(!isset($banner))
	$banner= new Banner;
$banner->listar_banner_publica(1);

$excursiones = new Producto();
$excursiones->listar_producto_imagen_principal(4);
$paquetes = new Producto();
$paquetes->listar_producto_imagen_principal(9);

if(!isset($publicidad))
	$publicidad= new Publicidad;
$publicidad->cargar_publicidad("Banner Izquierda");
$smarty->assign("publicidad", $publicidad->listado);

if(!isset($publicidad2))
	$publicidad2= new Publicidad;
$publicidad2->cargar_publicidad("Banner Centro");
$smarty->assign("publicidad2", $publicidad2->listado);

if(!isset($publicidad3))
	$publicidad3= new Publicidad;
$publicidad3->cargar_publicidad("Banner Derecha");
$smarty->assign("publicidad3", $publicidad3->listado);

if(!isset($publicidad4))
	$publicidad4= new Publicidad;
$publicidad4->cargar_publicidad("Banner Promocion A");
$smarty->assign("publicidad4", $publicidad4->listado);

if(!isset($publicidad5))
	$publicidad5= new Publicidad;
$publicidad5->cargar_publicidad("Banner Promocion B");
$smarty->assign("publicidad5", $publicidad5->listado);

if(!isset($publicidad6))
	$publicidad6= new Publicidad;
$publicidad6->cargar_publicidad("Banner Promocion C");
$smarty->assign("publicidad6", $publicidad6->listado);

if(!isset($publicidad7))
	$publicidad7= new Publicidad;
$publicidad7->cargar_publicidad("Banner Promocion D");
$smarty->assign("publicidad7", $publicidad7->listado);

$noticia = new Noticia;
$noticia->accion="Últimas Noticias";
$noticia->listar_noticia_publica();
$smarty->assign('noticias', $noticia->listado);

if(!isset($categoria))
	$categoria= new Categoria;
$categoria->listar_categoria_menu();
$smarty->assign("categorias", $categoria->listado);

if(!isset($catalogo))
	$catalogo= new Producto();
$catalogo->listar_producto_nuevo();
$smarty->assign('nuevos',$catalogo->listado);

if(!isset($catalogo2))
	$catalogo2= new Producto();
$catalogo2->buscar_recomendado($producto->detal, $producto->nombre, $producto->id, $producto->id_cat);
$smarty->assign('recomendado',$catalogo2->listado);

if(!isset($configuracion))
	$configuracion= new Config;
$configuracion->mostrar_config(1);
$smarty->assign("nombre_empresa", $configuracion->empresa);
$smarty->assign("rif_empresa", $configuracion->rif);

$temporadas = new Producto;
$temporadas->listar_temporada_producto($_GET['id']);

if (isset($_GET['cat']) && $_GET['cat']!="")
	$num_cat=$_GET['cat'];

if(!isset($suscripcion) and isset($_POST['email'])){
        $correo=$_POST['email'];
	    $suscripcion= new Auth;
	    $suscripcion->insertar_suscripcion($correo);		
}

if ($_POST['enviar'] == "Enviar Solicitud-bol"){
		$ida =$_POST['fecha_ida-b'];
		$vuelta=$_POST['fecha_vuelta-b'];
		$resultado = str_replace("/", "-", $ida);
		$resultado2 = str_replace("/", "-", $vuelta);
		$ida = date_create($resultado);
		$vuelta = date_create($resultado2);
		$hoy = date_create('today');
		
if(($ida < $hoy)||($vuelta < $ida)){
	$msj_boletos="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;Las Fecha son incorrectas, verifique los intervalos de IDA y VUELTA </div>";
}elseif($_POST['nombre-b'] =="" ||$_POST['tipo-b'] ==""||$_POST['cedula-b'] ==""||$_POST['email-b'] =="" || $_POST['telefono-b'] =="" || $_POST['fecha_ida-b'] =="" || $_POST['fecha_vuelta-b'] =="" ||$_POST['adultos-b']==""){
			
			$msj_boletos="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;No ha completado los campos en su totalidad </div>";
		}elseif((isset($_POST['menores-b'])&& isset($_POST['edades-b'])&& $_POST['menores-b']!="" && $_POST['edades-b']=="")||(isset($_POST['menores-b'])&& isset($_POST['edades-b'])&& $_POST['menores-b']=="" && $_POST['edades-b']!="")){
		
			$msj_boletos="<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-remove'></span></strong>&nbsp;Debe insertar la Cantidad y Edad de &eacute;l o los ni&ntilde;os! </div>";	
		}else{
			
			$acceso->enviar_solicitud_boletos();
			$msj_boletos="<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-ok'></span></strong>&nbsp;$acceso->mensaje</div>";
	}
}



/* footer para Smarty */
$smarty->assign('nombre_uso',$_SESSION['nombre_temporal']);
$smarty->assign('apellido_uso',$_SESSION['apellido_temporal']);
$smarty->assign("id", $producto->id);
$smarty->assign('num_cat',$num_cat);
$smarty->assign("codigo", $producto->codigo);
$smarty->assign("nombres", $producto->nombre);
$smarty->assign("categoria", $producto->categoria);
$smarty->assign("fecha", $producto->fecha);
$smarty->assign("cantidad", $producto->cantidad);
$smarty->assign("lugar", $producto->lugar);
$smarty->assign("detal", $producto->detal);
$smarty->assign("mayor", $producto->mayor);
$smarty->assign("limite", $producto->limite);
$smarty->assign("contenido", $producto->descripcion);
$smarty->assign("descripcion", substr($producto->limpiar_metas($producto->descripcion,""), 0, 140));
$smarty->assign("moneda",$_SESSION['moneda_temp']);
$smarty->assign("vistas", $producto->vistas);
//$smarty->assign("recomendado", $recomendado->listado);
$smarty->assign("claves", $producto->claves);
$smarty->assign("marca", $producto->marca);
$smarty->assign("msj_boletos", $msj_boletos);
$smarty->assign("accion", $producto->nombre);
$smarty->assign("mensaje3", $mensaje3);
$smarty->assign("mensaje2", $mensaje2);
$smarty->assign("mensaje", $mensaje);
$smarty->assign("enlaces_A", $link->listado);
$smarty->assign("enlaces_B", $link2->listado);
$smarty->assign("enlaces_A2", $link3->listado);
$smarty->assign("enlaces_B2", $link4->listado);
$smarty->assign("enlaces_C", $link5->listado);
$smarty->assign('excursiones', $excursiones->listado);
$smarty->assign('paquetes',$paquetes->listado);
$smarty->assign("nombreb",$_POST['nombre-b']);
$smarty->assign("tipob",$_POST['tipo-b']);
$smarty->assign("cedulab",$_POST['cedula-b']);
$smarty->assign("origenb",$_POST['origen-b']);
$smarty->assign("destinob",$_POST['destino-b']);
$smarty->assign("emailb",$_POST['email-b']);
$smarty->assign("telefonob",$_POST['telefono-b']);
$smarty->assign("fecha_idab",$_POST['fecha_ida-b']);
$smarty->assign("fecha_vueltab",$_POST['fecha_vuelta-b']);
$smarty->assign("adultosb",$_POST['adultos-b']);
$smarty->assign("menoresb",$_POST['menores-b']);
$smarty->assign("edadesb",$_POST['edades-b']);
$smarty->assign("nombre",$_POST['nombre']);
$smarty->assign("tipo",$_POST['tipo']);
$smarty->assign("cedula",$_POST['cedula']);
$smarty->assign("email",$_POST['email']);
$smarty->assign("telefono",$_POST['telefono']);
$smarty->assign("fecha_ida",$_POST['fecha_ida']);
$smarty->assign("adultos",$_POST['adultos']);
$smarty->assign("ninos",$_POST['ninos']);
$smarty->assign("edades",$_POST['edades']);
$smarty->assign("comentario",$_POST['comentario']);
$smarty->assign("banner", $banner->listado);
$smarty->assign("temporadas", $temporadas->listado);
$smarty->assign("imagenes", $imagen->listado);
$smarty->assign("descuento", $_SESSION['procesando_carro']->descuento);
$smarty->assign("total_monto", $_SESSION['procesando_carro']->total);
$smarty->assign("cant_producto", $_SESSION['procesando_carro']->numero);
$smarty->force_compile=true;
$smarty->display('catalogo_detalle.tpl');
/* Fin footer para Smarty */
?> 
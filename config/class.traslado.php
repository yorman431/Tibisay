<?php

class Traslado{

var $ruta;
var $costo;
var $costo_nino;
var $condiciones;

var $nombre;
var $apellido;
var $correo;
var $telefono;
var $origen;
var $destino;
var $fecha;
var $hora;
var $adulto;
var $nino;
var $opcion;
var $observacion;

var $listado_admin;
var $listado_reserva;
var $mensaje;

function __construct(){

}

function asignar_valores_admin(){
  $this->ruta = $_POST['ruta'];
  $this->costo = $_POST['costo'];
  $this->costo_nino = $_POST['costo_nino'];
}

function asignar_valores_reserva(){
  $this->nombre = $_POST['nombre'];
  $this->apellido = $_POST['apellido'];
  $this->correo = $_POST['correo'];
  $this->telefono = $_POST['telefono'];
  $this->origen = $_POST['origen'];
  $this->destino = $_POST['destino'];
  $this->fecha = $_POST['fecha'];
  $this->hora = $_POST['hora'];
  $this->adulto = $_POST['adulto'];
  $this->nino = $_POST['nino'];
  $this->opcion = $_POST['opcion'];
  $this->observacion = $_POST['observacion'];
}

function asignar_valores_admin2($id){
  $sql = "SELECT * FROM traslado WHERE id = '$id'";
  $consulta = mysql_query($sql) or die (mysql_error());
  $resultado = mysql_fetch_array($consulta);
  $this->ruta = $resultado['ruta'];
  $this->costo = $resultado['costo'];
  $this->costo_nino = $resultado['costo_nino'];
  $this->costo_pax_adc = $resultado['costo_pax_adc'];
}

function asignar_valores_condiciones(){
  $sql = "SELECT * FROM condiciones WHERE id = 1";
  $consulta = mysql_query($sql) or die (mysql_error());
  $resultado = mysql_fetch_array($consulta);
  $this->condiciones = $resultado['condiciones'];
}

function insertar_condiciones(){
  if (isset($_POST['envio']) && $_POST['envio'] == 'Guardar'){
    $this->condiciones = $_POST['condiciones'];
    $sql = "UPDATE condiciones SET condiciones = '$this->condiciones' WHERE id = 1";
    $consulta = mysql_query($sql) or die (mysql_error());
    header("location: /admin/traslado");
    exit();
  }
}

function insertar_admin(){
  if (isset($_POST['envio']) && $_POST['envio'] == 'Guardar'){
    $this->asignar_valores_admin();
    $sql = "INSERT INTO traslado VALUES ('', '$this->ruta','$this->costo', '$this->costo_nino')";
    $consulta=mysql_query($sql) or die(mysql_error());
    header("location:/admin/traslado");
    exit();
  }
}

function editar_admin(){
  if (isset($_POST['enviar']) && $_POST['enviar'] == 'Guardar'){
    $this->asignar_valores_admin();
    $id = $_GET['id'];
    $sql = "UPDATE transporte SET ruta = '$this->ruta', costo = '$this->costo', costo_nino = '$this->costo_nino' WHERE id = '$id'";
    $consulta = mysql_query($sql) or die(mysql_error());
    header("location:/admin/traslado");
    exit();
  }
}

function eliminar_traslado(){
  if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM traslado WHERE id = '$id'";
    $consulta = mysql_query($sql) or die (mysql_error());
    header("location: /admin/traslado");
    exit();
  }
}

function listado_admin(){
  $sql = "SELECT * FROM traslado";
  $consulta = mysql_query($sql) or die(mysql_error());
  while($resultado = mysql_fetch_array($consulta)){
    $this->listado_admin[] = $resultado;
    $this->mensaje = "si";
  }
}

}

?>

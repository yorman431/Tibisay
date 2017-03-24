<?php
require_once('Classes/PHPExcel.php');

class EXCEL extends PHPExcel{
  
  var $file;
  var $excelReader;
  var $excelObj;
  var $excelHoja;
  var $lastRow;
  var $lastColumn;
  var $cantidadOk;
  var $cantidadNOk;
  var $accion;

  var $mensaje;
  var $canTemp;

  var $id_alojamiento;
  var $id_temporada;
  
  var $tipotarifa;
  var $listar = 1;
  var $nombreHab;
  var $regimenHab;
  var $precioHab;
  
  var $ciclo = 'por fecha';
  var $fecha_inicio;
  var $fecha_fin;
  var $activa = 1;
  
  //TODO: Valores que requiren atención, muchos valores estatico y deben ser dinamicos
  var $etiqueta_ran = 'Niño';
  var $min_ran = 7;
  var $max_ran = 12;
  var $tipo_ran = 'precio';
  var $precio_ran;
  
  public function __construct(){
  }
  
  function limpiarVariables(){
    $this->id_temporada;
  
    $this->nombreHab;
    $this->regimenHab;
    $this->precioHab;
  
    $this->fecha_inicio;
    $this->fecha_fin;
    
    $this->precio_ran;
  }
  
  function checkFile(){
    session_start();
    /* Desabilitado por manejo de archivos de forma temporal

    $directorio = 'archivos/';
    $directorioFinal = $directorio.basename($_FILES['excel']['name']);

    */
    $this->cantidadOk = 0;
    $this->cantidadNOk = 0;
    $this->accion = "Actualización de Productos";
    $this->id_alojamiento = $_GET['id'];
  
    $extension = pathinfo(basename($_FILES['excel']['name']), PATHINFO_EXTENSION);

    if ($extension != 'xls' && $extension != 'xlsx'){
      $this->mensaje = "Error al cargar el archivo, archivo no válido";
    }else{
      if ($_FILES['excel']['tmp_name']){
        $this->asignarArchivo($_FILES['excel']['tmp_name']);
        $this->limpiar_data();
        $this->recorrerExcel();
      }else{
        $this->mensaje = "Error. No se pudo cargar el archivo";
      }
    }
    $_SESSION['mensaje'] = $this->mensaje;
    header("location:/admin/producto/");
  }

  function asignarArchivo($archivo){
    $this->file = $archivo; //asignamos a una variable la ubicacion del archivo excel
    $this->excelReader = PHPExcel_IOFactory::createReaderForFile($this->file); //utilizamos esta funcion para leer el archivo excel
    $this->excelObj = $this->excelReader->load($this->file); //transformamos el archivo excel en un objeto para facilitar su uso
    $this->excelHoja = $this->excelObj->getSheet(0); //getSheet nos permite especificar cual hoja del excel queremos cargar
    $this->lastRow = $this->excelHoja->getHighestRow(); //obtenemos la cantidad max de filas del archivo excel
    $this->lastColumn = $this->excelHoja->getHighestColumn(); //obtenemos la cantidad max de columnas del archivo excel
  }

  function recorrerExcel(){
    
    for($i = 25; $i <= $this->lastRow; $i++){
      $this->fecha_inicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->excelHoja->getCell('H'.$i)->getValue())));
      $this->fecha_fin = date("Y-m-d", strtotime(str_replace('/', '-', $this->excelHoja->getCell('K'.$i)->getValue())));;
      
      
      if ($this->fecha_inicio != ''){
        $this->cargarTemporada($i);
  
        $this->limpiarVariables();
      }else{
        $this->limpiarVariables();
      }
      
      if ($this->canTemp == 41){
        $j = $i + 1;
        $control = $this->excelHoja->getCell('B'.$j)->getValue();
        if ($control != ''){
          $i = $i + 22;
        }else{
          $i = $i + 21;
        }
        $j = 0;
      }
      
      
    }
    $this->mensaje = "Productos Actualizados: ".$this->cantidadOk." Productos NO Actualizados: ".$this->cantidadNOk;
  }

  function cargarTemporada($column){
    $this->canTemp = $this->canTemp +1;
    $sql = "SELECT id, id_alojamiento, fecha_inicio, fecha_fin FROM temporadas WHERE id_alojamiento = '$this->id_alojamiento' AND fecha_inicio = '$this->fecha_inicio' AND fecha_fin = '$this->fecha_fin'";
    $consulta = mysql_query($sql) or die(mysql_error());
    $filas = mysql_num_rows($consulta);
    
    if ($filas != 0){
      $resultado = mysql_fetch_array($consulta);
      $this->id_temporada = $resultado['id'];
  
      $this->cargarHabitacion($column);
      
      $this->cantidadOk = $this->cantidadOk + 1;
    }else{
      $sql2 = "INSERT INTO temporadas (id_alojamiento, tipo_ciclo, fecha_inicio, fecha_fin) VALUES ('$this->id_alojamiento','$this->ciclo', '$this->fecha_inicio', '$this->fecha_fin')";
      $consulta2 = mysql_query($sql2) or die (mysql_error());
      $this->id_temporada = mysql_insert_id();
      $this->cargarHabitacion($column);
      $this->cantidadNOk = $this->cantidadNOk + 1;
    }
  }
  
  function cargarHabitacion($column){
    
    $this->nombreHab = ucwords(strtolower($this->excelHoja->getCell('B'.$column)->getValue()));
    $this->regimenHab = ucwords(strtolower($this->excelHoja->getCell('F'.$column)->getValue()));
    $this->precio_ran = $this->excelHoja->getCell('Z'.$column)->getValue();
    
    if ($this->regimenHab == 'Solo Desayuno'){
      $this->tipotarifa = 'Habitacion';
    }else{
      $this->tipotarifa = 'Persona';
    }
  
    for($i = 1; $i <= 6; $i++){
      switch ($i){
        case 1:
          $this->precioHab = $this->excelHoja->getCell('M'.$column)->getValue();
          $this->precioHab = str_replace('.','',$this->precioHab);
          $this->precioHab = str_replace(',','.',$this->precioHab);
          
          if ($this->precioHab != 0){
            $nombre = $this->nombreHab." Sencilla";
            $sql3 = "SELECT id, id_alojamiento, id_temporada, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento' AND id_temporada = '$this->id_temporada' AND nombre = '$nombre' AND regimen = '$this->regimenHab'";
            $consulta3 = mysql_query($sql3) or die (mysql_error());
            $filas = mysql_num_rows($consulta3);
            if ($filas != 0){
              $resultado = mysql_fetch_array($consulta3);
              $id = $resultado['id'];
              echo('');
              $sql4 = "UPDATE habitaciones SET nombre = '$nombre', regimen = '$this->regimenHab', tipotarifa = '$this->tipotarifa' WHERE id = '$id'";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }else{
              $sql4 = "INSERT INTO habitaciones VALUES('', '$this->id_alojamiento', '$this->id_temporada', '$nombre', '$this->regimenHab', '', '$this->listar', '$this->precioHab', '0', NULL, '$this->tipotarifa', '1', '0', '0', '0', '$this->precio_ran')";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }
          }
          break;
          
        case 2:
          $this->precioHab = $this->excelHoja->getCell('N'.$column)->getValue();
          $this->precioHab = str_replace('.','',$this->precioHab);
          $this->precioHab = str_replace(',','.',$this->precioHab);
          
          if ($this->precioHab != 0){
            $nombre = $this->nombreHab." Doble";
            $sql3 = "SELECT id, id_alojamiento, id_temporada, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento' AND id_temporada = '$this->id_temporada' AND nombre = '$nombre' AND regimen = '$this->regimenHab'";
            $consulta3 = mysql_query($sql3) or die (mysql_error());
            $filas = mysql_num_rows($consulta3);
            if ($filas != 0){
              $resultado = mysql_fetch_array($consulta3);
              $id = $resultado['id'];
              $sql4 = "UPDATE habitaciones SET nombre = '$nombre', regimen = '$this->regimenHab', tipotarifa = '$this->tipotarifa' WHERE id = '$id'";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }else{
              $sql4 = "INSERT INTO habitaciones VALUES('', '$this->id_alojamiento', '$this->id_temporada', '$nombre', '$this->regimenHab', '', '$this->listar', '$this->precioHab', '0', NULL, '$this->tipotarifa', '2', '0', '0', '0', '$this->precio_ran')";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }
          }
          break;
          
        case 3:
          $this->precioHab = $this->excelHoja->getCell('O'.$column)->getValue();
          $this->precioHab = str_replace('.','',$this->precioHab);
          $this->precioHab = str_replace(',','.',$this->precioHab);
          
          if ($this->precioHab != 0){
            $nombre = $this->nombreHab." Triple";
            $sql3 = "SELECT id, id_alojamiento, id_temporada, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento' AND id_temporada = '$this->id_temporada' AND nombre = '$nombre' AND regimen = '$this->regimenHab'";
            $consulta3 = mysql_query($sql3) or die (mysql_error());
            $filas = mysql_num_rows($consulta3);
    
            if ($filas != 0){
              $resultado = mysql_fetch_array($consulta3);
              $id = $resultado['id'];
              $sql4 = "UPDATE habitaciones SET nombre = '$nombre', regimen = '$this->regimenHab', tipotarifa = '$this->tipotarifa' WHERE id = '$id'";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }else{
              $sql4 = "INSERT INTO habitaciones VALUES('', '$this->id_alojamiento', '$this->id_temporada', '$nombre', '$this->regimenHab', '', '$this->listar', '$this->precioHab', '0', NULL, '$this->tipotarifa', '3', '0', '0', '0', '$this->precio_ran')";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }
          }
          break;
          
        case 4:
          $this->precioHab = $this->excelHoja->getCell('R'.$column)->getValue();
          $this->precioHab = str_replace('.','',$this->precioHab);
          $this->precioHab = str_replace(',','.',$this->precioHab);
          
          if ($this->precioHab != 0){
            $nombre = $this->nombreHab." Cuadruple";
            $sql3 = "SELECT id, id_alojamiento, id_temporada, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento' AND id_temporada = '$this->id_temporada' AND nombre = '$nombre' AND regimen = '$this->regimenHab'";
            $consulta3 = mysql_query($sql3) or die (mysql_error());
            $filas = mysql_num_rows($consulta3);
    
            if ($filas != 0){
              $resultado = mysql_fetch_array($consulta3);
              $id = $resultado['id'];
              $sql4 = "UPDATE habitaciones SET nombre = '$nombre', regimen = '$this->regimenHab', tipotarifa = '$this->tipotarifa' WHERE id = '$id'";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }else{
              $sql4 = "INSERT INTO habitaciones VALUES('', '$this->id_alojamiento', '$this->id_temporada', '$nombre', '$this->regimenHab', '', '$this->listar', '$this->precioHab', '0', NULL, '$this->tipotarifa', '4', '0', '0', '0', '$this->precio_ran')";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }
          }
          break;
          
        case 5:
          $this->precioHab = $this->excelHoja->getCell('S'.$column)->getValue();
          $this->precioHab = str_replace('.','',$this->precioHab);
          $this->precioHab = str_replace(',','.',$this->precioHab);
          
          if ($this->precioHab != 0){
            $nombre = $this->nombreHab." Quintuple";
            $sql3 = "SELECT id, id_alojamiento, id_temporada, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento' AND id_temporada = '$this->id_temporada' AND nombre = '$nombre' AND regimen = '$this->regimenHab'";
            $consulta3 = mysql_query($sql3) or die (mysql_error());
            $filas = mysql_num_rows($consulta3);
    
            if ($filas != 0){
              $resultado = mysql_fetch_array($consulta3);
              $id = $resultado['id'];
              $sql4 = "UPDATE habitaciones SET nombre = '$nombre', regimen = '$this->regimenHab', tipotarifa = '$this->tipotarifa' WHERE id = '$id'";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }else{
              $sql4 = "INSERT INTO habitaciones VALUES('', '$this->id_alojamiento', '$this->id_temporada', '$nombre', '$this->regimenHab', '', '$this->listar', '$this->precioHab', '0', NULL, '$this->tipotarifa', '5', '0', '0', '0', '$this->precio_ran')";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }
          }
          break;
          
        case 6:
          $this->precioHab = $this->excelHoja->getCell('V'.$column)->getValue();
          $this->precioHab = str_replace('.','',$this->precioHab);
          $this->precioHab = str_replace(',','.',$this->precioHab);
          
          if ($this->precioHab != 0){
            $nombre = $this->nombreHab." Sextuple";
            $sql3 = "SELECT id, id_alojamiento, id_temporada, nombre, regimen FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento' AND id_temporada = '$this->id_temporada' AND nombre = '$nombre' AND regimen = '$this->regimenHab'";
            $consulta3 = mysql_query($sql3) or die (mysql_error());
            $filas = mysql_num_rows($consulta3);
    
            if ($filas != 0){
              $resultado = mysql_fetch_array($consulta3);
              $id = $resultado['id'];
              $sql4 = "UPDATE habitaciones SET nombre = '$nombre', regimen = '$this->regimenHab', tipotarifa = '$this->tipotarifa' WHERE id = '$id'";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }else{
              $sql4 = "INSERT INTO habitaciones VALUES('', '$this->id_alojamiento', '$this->id_temporada', '$nombre', '$this->regimenHab', '', '$this->listar', '$this->precioHab', '0', NULL, '$this->tipotarifa', '6', '0', '0', '0', '$this->precio_ran')";
              $consulta4 = mysql_query($sql4) or die (mysql_error());
            }
          }
          break;
          
        default:
          $this->mensaje = 'Error inseperado, favor comuniquese con Diaz Creativos (0295)-2625553';
          break;
      }
      $this->precioHab = '';
    }
  }
  
  function limpiar_data(){
    $sql = "DELETE FROM habitaciones WHERE id_alojamiento = '$this->id_alojamiento'";
    $consulta = mysql_query($sql) or die (mysql_error());
    $sql2 = "DELETE FROM temporadas WHERE id_alojamiento = '$this->id_alojamiento'";
    $consulta2 = mysql_query($sql2) or die (mysql_error());
  }

  function mostrarExcel(){
    echo("Codigo: ".$this->codigo."  Nombre: ".$this->nombre."  Limite:".$this->limite."<br>");
  }
}
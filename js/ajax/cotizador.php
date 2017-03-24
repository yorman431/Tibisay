<?php  
include_once("../../config/conexion.inc.php");

$hotel = "";
$maxAdultos = "";
$adultos = "";
$regimen = "";
$fecha_i = "";
$fecha_s = "";
$detalles = "";
$chd=0;
$inf=0;
$total = 0;
$subtotal = 0;
$sql = "";
$consulta = "";
$resultado = "";

session_start();

$id_hot= $_POST['hotel'];
$query= "SELECT nombre_hot FROM hotel WHERE id_hot= '$id_hot'";
$cquery= mysql_query($query);
$rquery= mysql_fetch_array($cquery);

$hotel = $rquery['nombre_hot'];
$adultos = $_POST['adultos'];
$ninos= $_POST['cantidadNinos'];
$fechaninos= $_POST['ninos'];
$ocupacion= $_POST['ocupacion'];
$regimen = $_POST['regimen'];
$fecha_i = date("Y-m-d", strtotime($_POST['fecha_i']));
$fecha_s = date("Y-m-d", strtotime($_POST['fecha_s']));
$fecha_actual = $fecha_i;
$dia = date("l", strtotime($fecha_actual));

$hoy= time();
for($i=1; $i <= $ninos; $i++){
	$edadninos[]= intval(($hoy - strtotime($fechaninos[$i]))/31536000);
}

$dias = (strtotime($fecha_s) - strtotime($fecha_i))/86400;
$dias = round($dias);

for ($i = 1; $i <= $dias; $i++){
  
  $sql="SELECT precio, maxAdultos, tipotarifa, nombre, precio_chd FROM habitaciones WHERE nombre = '$ocupacion' AND regimen = '$regimen' AND maxAdultos = '$adultos' AND
				id_temporada = (SELECT id from temporadas	WHERE id_alojamiento = '$id_hot' AND '$fecha_actual' BETWEEN fecha_inicio AND fecha_fin)";
  
  $consulta = mysql_query($sql);
  $resultado = mysql_fetch_array($consulta);
  
  if($ninos != "" && $ninos != 0){
    
    for($j=0; $j < $ninos; $j++){
      $edad= $edadninos[$j];
      $sql2="SELECT min_ran, max_ran FROM rango_ninos WHERE '$edad' BETWEEN min_ran AND max_ran AND temporada_ran = (SELECT id FROM temporadas WHERE '$fecha_actual' BETWEEN fecha_inicio AND fecha_fin)";
      $consulta2= mysql_query($sql2);
      $resultado2= mysql_fetch_array($consulta2);
      if($edadninos[$j] >= $resultado2['min_ran'] && $edadninos[$j] <= $resultado2['max_ran']){
        if($i == 1){
          
          $resultado2['etiqueta_ran'] = utf8_encode($resultado2['etiqueta_ran']);
          if($resultado2['etiqueta_ran'] == 'Niño'){
            if(isset($resultado2['precio_ran'])){
              $descripcion['preciochd']= $resultado2['precio_ran'];
            }else{
              $descripcion['preciochd']= 0;
            }
            $chd= $chd + 1;
          }
          
          if($resultado2['etiqueta_ran'] == 'Infante'){
            if(isset($resultado2['precio_ran'])){
              $descripcion['precioinf']= $resultado2['precio_ran'];
            }else{
              $descripcion['precioinf']= 0;
            }
            $inf = $inf +1;
          }
          
        }
      }else{
        if($i == 1){
          $adultos = $adultos + 1;
        }
      }
    }
    if ($chd != 0){
      $descripcion['ninos'] = $chd;
    }
    
    if($inf != 0){
      $descripcion['infantes']= $inf;
    }
    
    $edad= "";
    $sql2= "";
    $consulta2= "";
    $resultado2= "";
  }
  
  $descripcion['hotel'] = $hotel;
  $descripcion['adultos']= $adultos;
  $descripcion['ocupacion']= $resultado['nombre'];
  $descripcion['regimen'] = $regimen;
  $descripcion['fecha'] = date("d-m-Y",strtotime($fecha_actual));
  $descripcion['dia'] = $dia;
  $descripcion['precio'] = $resultado['precio'];
  $descripcion['tipotarifa']= $resultado['tipotarifa'];
  
  /*if ($dia == "Monday" || $dia == "Tuesday" || $dia == "Wednesday" || $dia == "Thursday" ){
		$sql="SELECT precio, maxAdultos, tipotarifa, nombre FROM habitaciones WHERE id_alojamiento = '$id_hot' AND 
				maxAdultos = '$maxAdultos' AND 
				id_temporada = (SELECT id from temporadas 
				WHERE '$fecha_actual' BETWEEN fecha_inicio AND fecha_fin)";

		$consulta = mysql_query($sql);
		$resultado = mysql_fetch_array($consulta);

		if($ninos != "" || $ninos != 0){

			for($j=0; $j < $ninos; $j++){
				$edad= $edadninos[$j];
				$sql2="SELECT min_ran, max_ran, precio_ran, etiqueta_ran FROM rango_ninos WHERE '$edad' BETWEEN min_ran AND max_ran AND temporada_ran = (SELECT id FROM temporadas WHERE '$fecha_actual' BETWEEN fecha_inicio AND fecha_fin)";
				$consulta2= mysql_query($sql2);
				$resultado2= mysql_fetch_array($consulta2);
				if($edadninos[$j] >= $resultado2['min_ran'] && $edadninos[$j] <= $resultado2['max_ran']){
					if($i == 1){

						$resultado2['etiqueta_ran'] = utf8_encode($resultado2['etiqueta_ran']);
						if($resultado2['etiqueta_ran'] == 'Niño'){
							if(isset($resultado2['precio_ran'])){
								$descripcion['preciochd']= $resultado2['precio_ran'];
							}else{
								$descripcion['preciochd']= 0;
							}
							$chd= $chd + 1;
						}

						if($resultado2['etiqueta_ran'] == 'Infante'){
							if(isset($resultado2['precio_ran'])){
								$descripcion['precioinf']= $resultado2['precio_ran'];
							}else{
								$descripcion['precioinf']= 0;
							}
							$inf = $inf +1;
						}
						
					}
				}else{
					if($i == 1){
						$adultos = $adultos + 1;
					}
				}
			}
			if ($chd != 0){
				$descripcion['ninos'] = $chd;
			}

			if($inf != 0){
				$descripcion['infantes']= $inf;
			}
			
			$edad= "";
			$sql2= "";
			$consulta2= "";
			$resultado2= "";
		}

		$descripcion['hotel'] = $hotel;
		$descripcion['adultos']= $adultos;
		$descripcion['ocupacion']= $resultado['nombre'];
		$descripcion['regimen'] = $regimen;
		$descripcion['fecha'] = date("d-m-Y",strtotime($fecha_actual));
		$descripcion['dia'] = $dia;
		$descripcion['precio'] = $resultado['precio'];
		$descripcion['tipotarifa']= $resultado['tipotarifa'];

	}elseif($dia == "Friday" || $dia == "Saturday" || $dia == "Sunday" ){
		$sql="SELECT  maxAdultos, weekend, tipotarifa, nombre FROM habitaciones WHERE id_alojamiento = '$id_hot' AND	
				maxAdultos = '$maxAdultos' AND
				id_temporada = (SELECT id from temporadas 
                WHERE '$fecha_actual' BETWEEN fecha_inicio AND fecha_fin)";

		$consulta = mysql_query($sql);
		$resultado = mysql_fetch_array($consulta);

		if($ninos != "" || $ninos != 0 && $i == 0){
			
			for($j=0; $j < $ninos; $j++){
				$edad= $edadninos[$j];
				$sql2="SELECT min_ran, max_ran, weekend_ran, etiqueta_ran FROM rango_ninos WHERE '$edad' BETWEEN min_ran AND max_ran AND temporada_ran = (SELECT id FROM temporadas WHERE '$fecha_actual' BETWEEN fecha_inicio AND fecha_fin)";
				$consulta2= mysql_query($sql2);
				$resultado2= mysql_fetch_array($consulta2);
				if($edadninos[$j] >= $resultado2['min_ran'] && $edadninos[$j] <= $resultado2['max_ran']){
					if($i == 1){
						var_dump($resultado2);
						$resultado2['etiqueta_ran'] = utf8_encode($resultado2['etiqueta_ran']);
						if($resultado2['etiqueta_ran'] == 'Niño'){
							if(isset($resultado2['weekend_ran'])){
								$descripcion['preciochd']= $resultado2['weekend_ran'];
							}else{
								$descripcion['preciochd']= 0;
							}
							$chd= $chd + 1;
						}

						if($resultado2['etiqueta_ran'] == 'Infante'){
							if(isset($resultado2['weekend_ran'])){
								$descripcion['precioinf']= $resultado2['weekend_ran'];
							}else{
								$descripcion['precioinf']= 0;
							}
							$inf = $inf +1;
						}
						
					}
				}else{
					if($i == 1){
						$adultos = $adultos + 1;
					}
				}
			}
			if ($chd != 0){
				$descripcion['ninos'] = $chd;
			}
			if($inf != 0){
				$descripcion['infantes']= $inf;
			}
			
			$edad= "";
			$sql2= "";
			$consulta2= "";
			$resultado2= "";
		}

		$descripcion['hotel'] = $hotel;
		$descripcion['adultos']= $adultos;
		$descripcion['regimen'] = $regimen;
		$descripcion['ocupacion']= $resultado['nombre'];
		$descripcion['fecha'] = date("d-m-Y",strtotime($fecha_actual));
		$descripcion['dia'] = $dia;
		$descripcion['precio'] = $resultado['weekend'];
		$descripcion['tipotarifa']= $resultado['tipotarifa'];


	}*/
	
	$fecha_actual = strtotime($fecha_actual) + 86400;
	$fecha_actual = date("Y-m-d", $fecha_actual);
	$dia = "";
	$dia = date("l", strtotime($fecha_actual));
	$subdetalle[] = $descripcion; 

}

$_SESSION['reserva'][] = $subdetalle;
var_dump($_SESSION['reserva']);

for($row=0; $row < count($_SESSION['reserva']); $row++){
	for($col = 0; $col < count($_SESSION['reserva'][$row]); $col++){
		if ($_SESSION['reserva'][$row][$col]['tipotarifa'] == "Habitacion"){
			$subtotal = $subtotal + $_SESSION['reserva'][$row][$col]['precio'];
		}elseif($_SESSION['reserva'][$row][$col]['tipotarifa'] == "Persona"){
			$subtotal = $subtotal + $_SESSION['reserva'][$row][$col]['precio'] * $_SESSION['reserva'][$row][$col]['adultos'];
			if(isset($_SESSION['reserva'][$row][$col]['ninos'])){
				$subtotal = $subtotal + $_SESSION['reserva'][$row][$col]['preciochd'] * $_SESSION['reserva'][$row][$col]['ninos'];
			}
			if (isset($_SESSION['reserva'][$row][$col]['infantes'])) {
				$subtotal = $subtotal + $_SESSION['reserva'][$row][$col]['precioinf'] * $_SESSION['reserva'][$row][$col]['infantes'];
			}
		}


		$_SESSION['reserva'][$row]['subtotal'] = $subtotal;
	}
	$total = $total + $_SESSION['reserva'][$row]['subtotal'];
	$_SESSION['totalreserva']= $total;

	$subtotal = 0;
}


/*$sql="SELECT precio, maxAdultos, weekend FROM habitaciones WHERE id_alojamiento = 2 AND 
id_temporada = (SELECT id from temporadas 
                 WHERE '2016-06-13' BETWEEN fecha_inicio AND fecha_fin)";

$consulta = mysql_query($sql);
$resultado = mysql_fetch_array($consulta);

if ($resultado['tipotarifa'] == "Habitacion"){

	for($i=1; $i<=$dias; $i++){
		$total = $total + $resultado['precio'];
	}

}elseif($resultado['tipotarifa'] == "Persona"){
		
	for($j=1; $j<=$adultos; $j++){
		$total = $total + $resultado['precio'];
	}

	$total = $total * $dias;
}*/

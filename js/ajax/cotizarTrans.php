<?php
include_once("../../config/conexion.inc.php");
	
	session_start();

	if (isset($_POST['direccion']) && $_POST['direccion'] != ""){
		$direccion= $_POST['direccion'];
		$tipo= $_POST['tipo'];
		$hora= $_POST['hora'];
		$hotel = $_POST['hotel'];
		$totaladt=0;
		$totalchd=0;

		if($tipo != 0){
			$sql= "SELECT sector_hot FROM hotel WHERE id_hot='$hotel'";
			$consulta = mysql_query($sql);
			$resultado= mysql_fetch_array($consulta);

			if ($resultado['sector_hot'] == 'Norte') {

				if ($direccion == 1) {

					$id= 1;

				}elseif ($direccion == 2) {
					
					$id= 3;

				}

			}elseif ($resultado['sector_hot'] == 'Sur') {
				
				if ($direccion == 1) {

					$id= 2;

				}elseif ($direccion == 2) {
					
					$id=4;

				}
			}

			$sql3 = "SELECT * FROM traslado WHERE id = '$id'";
			$consulta3 = mysql_query($sql3);
			$resultado3 = mysql_fetch_array($consulta3);
			$ruta = $resultado3['ruta'];
			$costoadt = $resultado3['costo'];
			$costochd = $resultado3['costo_nino'];

			for($row=0; $row < count($_SESSION['reserva']); $row++){
				$totaladt= $totaladt + $_SESSION['reserva'][$row][0]['adultos'];
				if(isset($_SESSION['reserva'][$row][0]['ninos'])){
					$totalchd= $totalchd + $_SESSION['reserva'][$row][0]['ninos'];
				}
			}

			$totaltrans = ($costoadt * $totaladt) + ($costochd * $totalchd);
			
			if ($tipo == 2){
				$totaltrans= $totaltrans * 2;
				$_SESSION['reserva']['traslado']['direccion']= "Ida y Vuelta";
			}else{
				$_SESSION['reserva']['traslado']['direccion']= "Solo Ida";
			}
			$_SESSION['reserva']['traslado']['adultos']= $totaladt;
			$_SESSION['reserva']['traslado']['ninos']= $totalchd;
			$_SESSION['reserva']['traslado']['ruta']= $ruta;
			$_SESSION['reserva']['traslado']['hora']= $hora;
			$_SESSION['reserva']['traslado']['costoadt']= $costoadt;
			$_SESSION['reserva']['traslado']['costochd']= $costochd;
			$_SESSION['reserva']['traslado']['subtotal']= $totaltrans;
			$_SESSION['totalreserva']= $_SESSION['totalreserva'] + $totaltrans;
		}
	}

	var_dump($_SESSION['reserva']);
	echo($_SESSION['totalreserva']);

 ?>
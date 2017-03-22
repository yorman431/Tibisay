<?php 
	session_start();

	if (isset($_SESSION['reserva'])){
		unset($_SESSION['reserva']);
		unset($_SESSION['totalreserva']);
		echo('data limpiada con exito');
	}
 ?>
<?php
	//error_reporting(E_ALL);
	error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
/*
	$servidor = "localhost";
	$usuario = "scapetra_alejo";
	$clave = "DwHoeMwX=Up5";
	$basededatos ="scapetra_contenido";
*/

	$servidor = "localhost";
	$usuario = "root";
	$clave = "";
	$basededatos ="tibisaymargarita";
 /*
	$servidor = "localhost";
	$usuario = "diazcrea_yorman";
	$clave = "Cagg5kxz.";
	$basededatos ="diazcrea_tibisay";
*/

//$enlace_redine = mysql_connect('127.0.0.1','rmoraos_seiler','Uvt+M+}FyOKO') or die ('Ha fallado la conexi�n: '.mysql_error());

//para Mysql usar este script
	$conex = mysql_connect ("$servidor", "$usuario", "$clave")
	or die ('Error de conexi�n: '.mysql_error());
	mysql_select_db($basededatos,$conex) or die ('Error db: '.mysql_error());

//para firebird usar este script
	//$conex=ibase_connect("$basededatos", "$usuario", "$clave");

//
#	ini_set("session.use_only_cookies","1");
#	ini_set("session.cookie_domain","dominio.site");
#	ini_set("session.gc_maxlifetime","1209600");
#	ini_set("session.cookie_lifetime","1209600");
#	//ini_set("session.save_path","/var/sessions");
?>

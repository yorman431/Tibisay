<?php

require('../../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = '../../smarty/templates';
$smarty->compile_dir = '../../smarty/templates_c';
$smarty->cache_dir = '../../smarty/cache';
$smarty->config_dir = '../../smarty/configs';

include_once ("../../config/class.phpexcel.php");
include_once("../../config/conexion.inc.php");
session_start();
$excel = new EXCEL;

if (isset($_POST['subir']) && $_POST['subir'] == 'Enviar'){
  $excel->checkFile();
  header("location:/admin/hotel/");
}

$smarty->assign('nombre', $_SESSION['nombre_temp']);
$smarty->assign('apellido', $_SESSION['apellido_temp']);
$smarty->assign("accion", $excel->accion);
$smarty->assign("carpeta", "producto");
$smarty->assign("mensaje", $mensaje);
$smarty->display('admin/hotel/actualizar.tpl');
<?php

//$app = "/karting";
$temp=$_SERVER['DOCUMENT_ROOT'];

define('SMARTY_DIR', $temp.'/smarty/libs/');
define('FONT_DIR', $temp.'/fonts/');
define('IMAGES_DIR', $temp.'/imagenes/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir($temp.'/smarty/templates/');
$smarty->setCompileDir($temp.'/smarty/templates_c/');
$smarty->setConfigDir($temp.'/smarty/configs/');
$smarty->setCacheDir($temp.'/smarty/cache/');

/*
require_once('../smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../smarty/templates/');
$smarty->setCompileDir('../smarty/template_c/');
$smarty->setConfigDir('../smarty/configs/');
$smarty->setCacheDir('../smarty/cache/');
*/
?>

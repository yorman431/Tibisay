<?php
include_once ("../config/class.login.php");
$usuario = new Auth;
$usuario->logout2();
header("location:login.php");
?> 
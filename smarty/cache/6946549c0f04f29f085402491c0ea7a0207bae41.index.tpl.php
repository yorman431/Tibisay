<?php
/* Smarty version 3.1.30, created on 2017-03-23 23:30:58
  from "D:\Websites\tibisay\smarty\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d44ca24c3940_68342570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8502e2c667bdaf4aa27202a8d7c0209ac6fe7727' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\index.tpl',
      1 => 1490298735,
      2 => 'file',
    ),
    '9a3e520260453c80091977efd0e94ebd4896a78e' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\header.tpl',
      1 => 1490283024,
      2 => 'file',
    ),
    'f9cc4f08f32f6fb281cd8a6e830fb2f631bd2472' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\botonera.tpl',
      1 => 1490283024,
      2 => 'file',
    ),
    '0e078d480fae897c630805204355f635627441af' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\banner.tpl',
      1 => 1490283024,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_58d44ca24c3940_68342570 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<div lang="es">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<meta name="title"   content= "Hotel Tibisay Margarita | Venezuela" />
<meta name="author"  content= "Alejandro  D&iacute;az" />
<meta name="subject" content= "Hotel Tibisay Margarita | Venezuela" />

<meta name="description" content="Hoteles en Margarita" />

<meta name="Keywords" content="" />

<meta name="Language" content="Espa帽ol" />
<meta name="Revisit" content="2 days" />
<meta name="Distribution" content="Global"/>
<meta name="Robots" content="All" />
<title>Inicio | Tibisay Margarita | Venezuela</title>
<link rel="icon" href="/imagenes/favicon.png">
<script src="/js/validar.js"></script>
<script src="/js/jquery.js"></script>
<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="/datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<script type="text/javascript" src="/moment-develop/moment.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/ie-emulation-modes-warning.js"></script>
<script type="text/javascript" src="/datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/ekko-lightbox.js"></script>
<link rel="stylesheet" href="/css/ekko-lightbox.css" type="text/css" media="screen" />

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="/css/navbar-fixed-top.css" rel="stylesheet">
<link href="/css/personalizado/personalizado.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/fonts/style.css">
<link  href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>


<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->

  </head>
<!-- Fin Cabecera
================================================== -->
  <body id="INICIO">
  <!-- Acotinuaci贸n se emplea clase bootstrap para hacer fixed la barra de navegaci贸n-->
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/index.php" class="navbar-brand hidden-xs"><img src="/imagenes/logo-navbar.png" alt=""></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="padding-top:17px;">
        
            <!--<li class="dropdown">
              <a title="HABITACIONES" href="contenido.php?cont=1" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">HABITACIONES</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="HABITACIONES"  href="#HABITACIONES " id="efecto">HABITACIONES</a></li>
            
        
            <!--<li class="dropdown">
              <a title="RESERVAS" href="contenido.php?cont=2" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">RESERVAS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="RESERVAS"  href="#RESERVAS " id="efecto">RESERVAS</a></li>
            
        
            <!--<li class="dropdown">
              <a title="SERVICIOS" href="contenido.php?cont=3" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">SERVICIOS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                                  <li><a class="transicion" title="SERVICIOS" href="#gastronomia">gastronomia</a></li>
                                  <li><a class="transicion" title="SERVICIOS" href="#gimnasio">gimnasio</a></li>
                                  <li><a class="transicion" title="SERVICIOS" href="#peluqueria">peluqueria</a></li>
                                  <li><a class="transicion" title="SERVICIOS" href="#tiendas">tiendas</a></li>
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="SERVICIOS"  href="#SERVICIOS " id="efecto">SERVICIOS</a></li>
            
        
            <!--<li class="dropdown">
              <a title="GALERIAS" href="contenido.php?cont=4" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">GALERIAS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="GALERIAS"  href="#GALERIAS " id="efecto">GALERIAS</a></li>
            
        
            <!--<li class="dropdown">
              <a title="BODAS" href="contenido.php?cont=5" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">BODAS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="BODAS"  href="#BODAS " id="efecto">BODAS</a></li>
            
        
            <!--<li class="dropdown">
              <a title="PROMOCIONES" href="contenido.php?cont=6" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">PROMOS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="PROMOCIONES"  href="#PROMOCIONES " id="efecto">PROMOS</a></li>
            
        
            <!--<li class="dropdown">
              <a title="EMPRESA" href="contenido.php?cont=7" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">EMPRESA</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="EMPRESA"  href="#EMPRESA " id="efecto">EMPRESA</a></li>
            
        
            <!--<li class="dropdown">
              <a title="CONTACTO" href="contenido.php?cont=8" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">CONTACTO</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                          <li ><a class="transicion" title="CONTACTO"  href="#CONTACTO " id="efecto">CONTACTO</a></li>
            
              </ul>
      <ul class="nav navbar-nav navbar-right hidden-xs">
        <li><a href=" https://www.facebook.com/tibisayhotelboutique/" target="_blank"><img src="/imagenes/facebook.png" alt="" height="50" width="50"></a></li>
        <li><a href="https://twitter.com/TibisayHotel"  target="_blank"><img src="/imagenes/twitter.png" alt="" height="50" width="50"></a></li>
        <li><a href="https://www.instagram.com/tibisayhotelboutique/" target="_blank"><img src="/imagenes/instagram.png" alt="" height="50" width="50"></a></li>
      </ul>
    </div>
  </div>
</nav>

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" ></li>
      </ol>

  <div class="carousel-inner" role="listbox">

        <div class="item active">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1489850885.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1489850802.jpg">
    </div>
    
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.Banner -->


    <div class="container-fluid">
      <div class="row HABITACIONES" id="HABITACIONES">
        <div class="col-xs-12" align="center">
          <h2 class="tituloSeccion">HABITACIONES</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/habitacion.png" alt="Habitaciones">
        </div>
        <div class="clearfix"></div>
                  <div class="col-xs-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong>JACUZZI SUITE</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Dos ambientes habitaci&oacute;n principal con jacuzzi grande incorporado, sala de estar completamente equipada y dos ba&ntilde;os, ideal para celebrar su luna de miel o aniversario de bodas.</span></span></span></p>

                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion1" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                                                                                <div  class="item active" >
                              <img class="img-responsive" alt="portada" src="/imagenes/contenido/1489857885.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Jacuzzi Suite" src="/imagenes/contenido/1489857911.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Jacuzzy Suite" src="/imagenes/contenido/1489857947.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Jacuzzi Suite" src="/imagenes/contenido/1489858080.jpg">
                            </div>
                                                                              </div>

                      <a class="left carousel-control" href="#habitacion1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
                <div class="clearfix"></div>
                                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                              </div>
            </div>
          </div>
          <div class="clearfix"></div>
                  <div class="col-xs-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong>BOUTIQUE SUITE</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Ampl&iacute;sima suite con habitacion principal, sala de estar y dos ba&ntilde;os, exquisitamente decorada y con las facilidades que pueda necesitar, ideal para altos ejecutivos en viaje de trabajo o placer.</span></span></span></p>

                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion2" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                                                                                <div  class="item active" >
                              <img class="img-responsive" alt="portada" src="/imagenes/contenido/1489857066.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Boutique Suite" src="/imagenes/contenido/1489857191.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Boutique Suite" src="/imagenes/contenido/1489857216.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Boutique Suite" src="/imagenes/contenido/1489857244.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Boutique Suite" src="/imagenes/contenido/1489857265.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Boutique Suite" src="/imagenes/contenido/1489857476.jpg">
                            </div>
                                                                              </div>

                      <a class="left carousel-control" href="#habitacion2" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion2" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
                <div class="clearfix"></div>
                                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                              </div>
            </div>
          </div>
          <div class="clearfix"></div>
                  <div class="col-xs-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong>JUNIOR SUITE DELUXE</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      <p>
	<span style="font-size:20px;"><span style="font-family:century gothic,serif;">Amplia habitaci&oacute;n amoblada con dos camas matrimoniales, ideal para familias y grupos corporativos. Disponible habitaciones comunicantes con habitaci&oacute;n Junior Suite King.</span></span></p>

                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion16" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                                                                                <div  class="item active" >
                              <img class="img-responsive" alt="portada" src="/imagenes/contenido/1489855042.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite Deluxe" src="/imagenes/contenido/1489855069.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite Deluxe" src="/imagenes/contenido/1489855100.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite Deluxe" src="/imagenes/contenido/1489855133.jpg">
                            </div>
                                                                              </div>

                      <a class="left carousel-control" href="#habitacion16" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion16" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
                <div class="clearfix"></div>
                                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                              </div>
            </div>
          </div>
          <div class="clearfix"></div>
                  <div class="col-xs-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong>JUNIOR SUITE KING</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      <p>
	<span style="font-size:20px;"><span style="font-family:century gothic,serif;">De mayores dimensiones que la Room Deluxe Balcony, se destaca por su amplia cama King Sixe y espectaular vista al mar.</span></span></p>
                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion17" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                                                                                <div  class="item active" >
                              <img class="img-responsive" alt="portada" src="/imagenes/contenido/1489854038.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite King" src="/imagenes/contenido/1489854098.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite King" src="/imagenes/contenido/1489854125.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite King" src="/imagenes/contenido/1489854142.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Junior Suite King" src="/imagenes/contenido/1489854397.jpg">
                            </div>
                                                                              </div>

                      <a class="left carousel-control" href="#habitacion17" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion17" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
                <div class="clearfix"></div>
                                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                              </div>
            </div>
          </div>
          <div class="clearfix"></div>
                  <div class="col-xs-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong>ROOM DELUXE BALCONY</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      <p>
	<span style="font-size:20px;"><span style="font-family:century gothic,serif;">Habitaci&oacute;n funcional ideal para estad&iacute;as cortas, cuenta con un peque&ntilde;o balc&oacute;n donde puede disfrutar la c&aacute;lida brisa marina.</span></span></p>

                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion15" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                                                                                <div  class="item active" >
                              <img class="img-responsive" alt="portada" src="/imagenes/contenido/1489852642.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Room Deluxe Balcony" src="/imagenes/contenido/1489852845.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Room Deluxe Balcony" src="/imagenes/contenido/1489853032.jpg">
                            </div>
                                                                                    <div  class="item" >
                              <img class="img-responsive" alt="Room Deluxe Balcony" src="/imagenes/contenido/1489853121.jpg">
                            </div>
                                                                              </div>

                      <a class="left carousel-control" href="#habitacion15" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion15" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
                <div class="clearfix"></div>
                                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                              </div>
            </div>
          </div>
          <div class="clearfix"></div>
              </div>
    </div>

    <div class="container-fluid ">
      <form class="row RESERVAS" id="RESERVAS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">RESERVAS</h2>
        </div>
        <div class="col-xs-12 separacion-row">
          <img class="center-block" src="/imagenes/reservaBanda.png" alt="Reservas">
        </div>

        <div class="clearfix"></div>
        <form action="" name="formreservas" id="formreservastibisay" class="form-horizontal">
        <div id="formulario_reserva" class="row">
          <div class="col-xs-8 col-xs-offset-2">
            <h3>Solicitud de Reserva</h3>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="numero_habitaciones">Seleccione N潞 de Habitaciones:</label>
                  <select class="form-control form-contacto" name="numero_habitaciones" id="numero_habitaciones" onchange="asignNumeroHabitacion();">
                    <option selected hidden value="">Seleccione Habitaci贸n</option>
                    <option value="1">1 Habitaci贸n</option>
                    <option value="2">2 Habitaciones</option>
                    <option value="3">3 Habitaciones</option>
                    <option value="4">4 Habitaciones</option>
                    <option value="5">5 Habitaciones</option>
                    <option value="6">6 Habitaciones</option>
                    <option value="7">7 Habitaciones</option>
                    <option value="8">8 Habitaciones</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="llegada">Fecha de entrada</label>
                  <div class='input-group date' id='datetimepicker1'>
                    <input type="text" class="form-control form-contacto" name="llegada" id="llegada" placeholder="Fecha de entrada*" value="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="salida">Fecha de salida</label>
                  <div class='input-group date' id='datetimepicker2'>
                    <input type="text" class="form-control form-contacto" name="salida" id="salida" placeholder="Fecha de salida*" value="">
                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                  </div>
                </div>
              </div>

            </div>

            <div class="modal fade" id="reservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-xs-12 text-center titulo-modal">Informacion Personal</div>

                      <form class="form-horizontal" action="" name="reservacion" method="post">

                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-contacto form-group-contacto" name="nombre" placeholder="Nombre" value="" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-contacto form-group-contacto" name="apellido" placeholder="Apellido" value="" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="number" class="form-control form-contacto form-group-contacto" name="telefono" placeholder="N煤mero Telef贸nico" value="" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-contacto form-group-contacto" name="correo" placeholder="Correo Electronico" value="" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="number" class="form-control form-contacto form-group-contacto" min="18" max="90" name="edad" placeholder="Edad" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-contacto form-group-contacto" placeholder="Pais" name="pais" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-contacto form-group-contacto" placeholder="Estado" name="estado" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control form-group-contacto form-contacto" name="direccion" placeholder="Direccion" required>
                          </div>
                        </div>
                        <div class="col-xs-12">
                          <div class="col-xs-6 no_padding">
                            <button type="button" class="form-control btn btn-default" data-dismiss="modal" >Cancel</button>
                          </div>
                          <div class="col-xs-6 no_padding">
                            <input type="hidden" name="envio" value="Guardar">
                            <input type="submit" class="form-control btn btn-success" value="RESERVAR">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="panel_habitacion"></div>

            <div class="col-xs-12 text-right" id="total">
            </div>

            <input name="id_hotel" id="id_hotel" type="hidden" value="1">


          </div><!-- End Row -->

        </div>

        <a id="reserva"></a>

        <hr class="divider" />

        </form>
      </div>
    </div>

    <div class="container-fluid ">
      <div class="row SERVICIOS" id="SERVICIOS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">SERVICIOS</h2>
        </div>
        <div class="col-xs-12" style="background: url('/imagenes/servicioBanda.png') no-repeat center; background-size: cover; height: 95px; width: 100%; margin-top: 29px;"></div>
        <div class="clearfix"></div>
        <div class="container">
          <div class="row">

            <div class="col-md-10 col-md-offset-1 col-xs-12 pills separacion-row">
              <ul class="nav nav-pills centrarNav" role="tablist">
                <li role="presentation"><a href="#gastronomia" aria-controls="gastronomia" role="tab" data-toggle="tab">GASTRONOM脥A</a></li>
                <li role="presentation"><a href="#gimnasio" aria-controls="gimnasio" role="tab" data-toggle="tab">GIMNASIO</a></li>
                <li role="presentation"><a href="#peluqueria" aria-controls="peluqueria" role="tab" data-toggle="tab">PELUQUER脥A</a></li>
                <li role="presentation"><a href="#tiendas" aria-controls="tiendas" role="tab" data-toggle="tab">TIENDAS</a></li>
              </ul>
            </div>

            <div class="col-xs-12">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="gastronomia">
                                            <div>
	<p>
		<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Nuestra carta fue dise&ntilde;ada para complacer los m&aacute;s exigentes paladares. Cocina internacional a la carta con platos frios y calientes, de la cocina internaciona, con&nbsp;un estilo Mediterr&aacute;neo / Fusi&oacute;n que le dar&aacute; un toque de sabor inconfundible. En un ambiente &uacute;nico donde ser&aacute; atendido por los Maestros del Servicio, adem&aacute;s no olvide preguntar por nuestra carta de tapas.</span></span></span></p>
</div>
<p>
	<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Disfrute de una selecci&oacute;n de conteles en Nuestro Lobby Bar Capuccino y luego de cenar divi&eacute;rtase en nuestra barra del Bar Beach.</span></span></span></p>
<div class="col-md-4 col-xs-12">
	<img alt="" class="img-responsive center-block" src="/imagenes/galeria/images/1.png" /></div>
<div class="col-md-4 col-xs-12">
	<img alt="" class="img-responsive center-block" src="/imagenes/galeria/images/2.png" /></div>
<div class="col-md-4 col-xs-12">
	<img alt="" class="img-responsive center-block" src="/imagenes/galeria/images/3.png" /></div>

                                    </div>


                <div role="tabpanel" class="tab-pane fade" id="gimnasio">
                                            <p>
	<img alt="" class="img-responsive" src="/imagenes/galeria/images/Gimnasio-2.jpg" style="width: 400px; height: 267px; border-width: 0px; border-style: solid; margin: 6px; float: right;" /><span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">At egestas tellus, vel condimentum ante. Sed sit amet consectetur nunc, in imperdiet odio. Etiam dictum enim ac justo consequat dignissim. Curabitur convallis dapibus hendrerit. Nam sagittis nunc justo, vitae euismod felis eleifend ac. </span></span></span></p>
<p>
	<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Cras cursus elementum ipsum vitae auctor. Morbi in orci magna. Sed id eleifend eros, sed aliquam neque. Integer felis libero, maximus non ante maximus, iaculis tempor nunc.&nbsp;Sum dolor sit amet, consectetuer adipiscing elit. </span></span></span></p>
<p>
	<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</span></span></span></p>
<p>
	<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Vitae auctor. Morbi in orci magna. Sed id eleifend eros, sed aliquam neque. Integer felis libero, maximus non ante maximus, iaculis tempor nunc.&nbsp;Sum dolor sit amet, consectetuer ad</span></span></span><span century="" style="color: rgb(255, 255, 255); font-family: ">ipiscing</span></p>

                                    </div>

                <div role="tabpanel" class="tab-pane fade" id="peluqueria">
                                            <p style="text-align: left;">
	<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Nunc id blandit libero. Vestibulum posuere libero dictum imperdiet hendrerit. Donec id ante at tortor elementum iaculis. Sed faucibus elementum odio, sed posuere elit facilisis eu. Nam in vestibulum velit. Curabitur at elementum nibh. Suspendisse interdum, augue a faucibus egestas, diam neque cursus nisi, sed varius leo lacus congue augue.&nbsp;</span></span></span></p>

                                    </div>

                <div role="tabpanel" class="tab-pane fade" id="tiendas">
                                            <p style="text-align: left;">
	<span style="color:#fff;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Morbi porttitor accumsan lorem, sed rhoncus mi finibus aliquet. Pellentesque odio velit, congue eget euismod accumsan, fringilla vel justo. Maecenas pulvinar diam tincidunt orci efficitur, non semper leo tincidunt. Nullam at dolor ut dolor lobortis ornare id eu nisl. Donec bibendum ex id nisl egestas, non interdum mi finibus. Phasellus ut consectetur orci, ut hendrerit risus.</span></span></span></p>

                                    </div>
              </div>
            </div>


        </div>
      </div>
    </div>
    </div>

    <div class="container-fluid">
      <div class="row TESTIMONIO" id="TESTIMONIOS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">TESTIMONIOS</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/testimonio.png" alt="Testimonios">
        </div>
        <div class="clearfix"></div>

        <div class="col-xs-4 col-xs-offset-4">
          <div class="row">
            <div class="col-sm-12 col-md-9">
              <div id="TA_selfserveprop821" class="TA_selfserveprop">
                <ul id="pTBWv2MdeA" class="TA_links ZBL8etZ">
                  <li id="OfnFiSw" class="FXTxRsM">
                    <a target="_blank" href="https://www.tripadvisor.com.ve/"><img src="https://www.tripadvisor.com.ve/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                  </li>
                </ul>
              </div>
              <script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=821&amp;locationId=4275246&amp;lang=es_VE&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=true&amp;border=false&amp;display_version=2"></script>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row GALERIA" id="GALERIAS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">GALERIA</h2>
        </div>
        <div class="col-xs-12 separacion-row">
          <img class="center-block" src="/imagenes/galeriaBanda.png" alt="Galerias">
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-12">
          <div class="container">
                        <div class="row">
                                                                <div class="col-xs-6 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489970384.jpg') center no-repeat;   background-size: cover;">
                      <a href="/imagenes/galeria/1489970384.jpg" data-toggle="lightbox" data-footer="Tibisay Hotel Boutique" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-6.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                                                                                                                                                                                                                                <div class="col-xs-2 no_padding" style="overflow: hidden">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489970344.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489970344.jpg" data-toggle="lightbox" data-footer="Habitaci髇 Jacuzzi Suite" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                                                                                                                                                                                                                                <div class="col-xs-4 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489970303.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489970303.jpg" data-toggle="lightbox" data-footer="Tibisay Hotel Boutique" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-4.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>

                  </div>
                                                                                                                                                                                                                                <div class="col-xs-10 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489970263.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489970263.jpg" data-toggle="lightbox" data-footer="Spa Tibisay Hotel Boutique" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-10.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                                                                                                                                                                                                                                <div class="col-xs-2 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489970211.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489970211.jpg" data-toggle="lightbox" data-footer="Luna de Miel en el Tibisay Hotel Boutique" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                                                                                                                                                                                                                                <div class="col-xs-4 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489970165.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489970165.jpg" data-toggle="lightbox" data-footer="Boda en el Tibisay Hotel Boutique" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-4.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                                                                                                                                                                                                                                <div class="col-xs-2 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489969924.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489969924.jpg" data-toggle="lightbox" data-footer="Habitaci髇 Room Deluxe Balcony" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                                                                                                                                                                                                                                <div class="col-xs-6 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/galeria/1489969798.jpg') center no-repeat; background-size: cover;">
                      <a href="/imagenes/galeria/1489969798.jpg" data-toggle="lightbox" data-footer="Tibisay Hotel Boutique" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-6.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>

                  </div>
                                                          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row BODAS separacion-row" id="BODAS">
        <div class="col-xs-12 no_padding">
          <img class="img-responsive center-block banner" src="/imagenes/Bodas.png" alt="Bodas">
        </div>

        <div class="clearfix"></div>
                          <div class="col-xs-12" >
            <div class="container-fluid">
              <div class="row padding">
                                      <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-2 col-xs-12">
                            <h3 class="titulo">EVENTOS CORPORATIVOS</h3>
                            <div class="col-md-4 col-xs-6 no_padding">
                              <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                            </div>
                            <div class="clearfix"></div>
                              <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus placerat ipsum sem, ut consectetur elit finibus fringilla. Phasellus vel turpis purus. In vestibulum ex ac tellus pellentesque, sed fringilla tellus eleifend. Nulla id tristique elit. Pellentesque rhoncus quis eros in lacinia. Aliquam interdum euismod venenatis. Nam condimentum sagittis magna in hendrerit. Aenean aliquet elit a imperdiet convallis.</span></span></span></p>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-xs-12">
                                                              <img class="img-responsive center-block" src="/imagenes/contenido/1489247380.png" alt="">
                                                        </div>
                        </div>
                      </div>
                    </div>
                                                      </div>
            </div>
          </div>
                  <div class="col-xs-12" >
            <div class="container-fluid">
              <div class="row padding">
                                      <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-2 col-xs-12">
                                                              <img class="img-responsive center-block" src="/imagenes/contenido/1489247401.png" alt="">
                                                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-xs-12">
                            <h3 class="titulo">GASTRONOMIA GOURMET</h3>
                            <div class="col-md-4 col-xs-6 no_padding">
                              <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                            </div>
                            <div class="clearfix"></div>
                              <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Mauris quis arcu commodo, pharetra tortor eget, rutrum ipsum. Suspendisse eget ullamcorper erat. Cras euismod tincidunt odio et accumsan. Duis ac lectus magna. Ut fermentum lectus vel eros elementum sodales. Mauris sed urna neque. Ut ac ante molestie, efficitur enim sed, elementum erat. Fusce iaculis ipsum sed ornare pellentesque. Suspendisse eget diam risus. Nam et luctus ante. Nullam diam odio, viverra eget diam vestibulum, ornare accumsan eros. Etiam vestibulum ligula pharetra lorem porta, nec elementum risus efficitur.</span></span></span></p>

                          </div>
                        </div>
                      </div>
                    </div>
                                                      </div>
            </div>
          </div>
                      </div>
    </div>

    <div class="container-fluid">
      <div id="PROMOCIONES" class="row PROMOCIONES paddingLg">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">PROMOCIONES</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/promocion.png" alt="Habitaciones">
        </div>
        <div class="clearfix"></div>

        <div class="col-xs-12">
          <div class="container-fluid">
            <div class="row">
                                            <div class="col-md-3 col-xs-12" >
                  <div class="panel panel-default panelP">
                    <div class="panel-body no_padding no_padding2"">
                      <a href="/contenido.php?id=11"><img class="img-responsive center-block banner" src="/imagenes/contenido/1489970801.jpg"/></a>
                      <div class="col-xs-12" style="min-height: 108px;">
                        <h3 style="color:#7c7201;">PLAYA & SHOPPING</h3>
                      </div>
                    </div>
                    <div class="panel-body no_padding" style="border-top: #cfb652 solid 1px; margin-right: -20px; margin-left: -20px;"></div>
                    <div class="panel-body" style="min-height: 301px">
                        <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam, dolor at euismod pulvinar, lectus velit tempor mi, id ultrices justo libero non nisi. Se(...)
                    </div>
                    <div class="panel-body no_padding">
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive imgMarginDivision">
                    </div>
                    <div class="panel-body padding-off">
                      <h4 class="text-center margin-off"><a class="btn btn-promocion" href="/contenido.php?id=11"><strong>VER <i class="fa fa-mail-reply fa-flip-horizontal"></i></strong></a></h4>
                    </div>
                  </div>
                </div>
                                                                  <div class="col-md-3 col-xs-12" >
                  <div class="panel panel-default panelP">
                    <div class="panel-body no_padding no_padding2"">
                      <a href="/contenido.php?id=12"><img class="img-responsive center-block banner" src="/imagenes/contenido/1489971113.jpg"/></a>
                      <div class="col-xs-12" style="min-height: 108px;">
                        <h3 style="color:#7c7201;">TIBISAY DE NUEVO TE SORPRENDE</h3>
                      </div>
                    </div>
                    <div class="panel-body no_padding" style="border-top: #cfb652 solid 1px; margin-right: -20px; margin-left: -20px;"></div>
                    <div class="panel-body" style="min-height: 301px">
                        <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Nam congue mauris id risus vestibulum, vitae blandit erat scelerisque. Morbi dapibus justo quis neque consequat sodales. Morbi at dui et nulla pharetra pretium. P(...)
                    </div>
                    <div class="panel-body no_padding">
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive imgMarginDivision">
                    </div>
                    <div class="panel-body padding-off">
                      <h4 class="text-center margin-off"><a class="btn btn-promocion" href="/contenido.php?id=12"><strong>VER <i class="fa fa-mail-reply fa-flip-horizontal"></i></strong></a></h4>
                    </div>
                  </div>
                </div>
                                                                  <div class="col-md-3 col-xs-12" >
                  <div class="panel panel-default panelP">
                    <div class="panel-body no_padding no_padding2"">
                      <a href="/contenido.php?id=13"><img class="img-responsive center-block banner" src="/imagenes/contenido/1489971121.jpg"/></a>
                      <div class="col-xs-12" style="min-height: 108px;">
                        <h3 style="color:#7c7201;">DISFRUTA MARGARITA COMO NUNCA ANTES</h3>
                      </div>
                    </div>
                    <div class="panel-body no_padding" style="border-top: #cfb652 solid 1px; margin-right: -20px; margin-left: -20px;"></div>
                    <div class="panel-body" style="min-height: 301px">
                        <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Nam congue mauris id risus vestibulum, vitae blandit erat scelerisque. Morbi dapibus justo quis neque consequat sodales. Morbi at dui et nulla pharetra pretium. P(...)
                    </div>
                    <div class="panel-body no_padding">
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive imgMarginDivision">
                    </div>
                    <div class="panel-body padding-off">
                      <h4 class="text-center margin-off"><a class="btn btn-promocion" href="/contenido.php?id=13"><strong>VER <i class="fa fa-mail-reply fa-flip-horizontal"></i></strong></a></h4>
                    </div>
                  </div>
                </div>
                                                                  <div class="col-md-3 col-xs-12" >
                  <div class="panel panel-default panelP">
                    <div class="panel-body no_padding no_padding2"">
                      <a href="/contenido.php?id=14"><img class="img-responsive center-block banner" src="/imagenes/contenido/1489971098.jpg"/></a>
                      <div class="col-xs-12" style="min-height: 108px;">
                        <h3 style="color:#7c7201;">MARGARITA 4 X 3</h3>
                      </div>
                    </div>
                    <div class="panel-body no_padding" style="border-top: #cfb652 solid 1px; margin-right: -20px; margin-left: -20px;"></div>
                    <div class="panel-body" style="min-height: 301px">
                        <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Sed bibendum elit nec tincidunt mattis. Vivamus placerat diam leo, iaculis bibendum erat venenatis ac. Ut sit amet purus eget nulla rutrum vehicula vel sed velit.(...)
                    </div>
                    <div class="panel-body no_padding">
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive imgMarginDivision">
                    </div>
                    <div class="panel-body padding-off">
                      <h4 class="text-center margin-off"><a class="btn btn-promocion" href="/contenido.php?id=14"><strong>VER <i class="fa fa-mail-reply fa-flip-horizontal"></i></strong></a></h4>
                    </div>
                  </div>
                </div>
                                                        <div class="clearfix"></div>
                                
                          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row PUBLICIDAD paddingLg">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-xs-12 separacion-superior">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="display:none;">
                                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                                        <li data-target="#myCarousel" data-slide-to="1" ></li>
                                                                  </ol>

                  <div class="carousel-inner" role="listbox">
                                                                    <div class="item active" >
                          <img class="img-responsive" alt="" src="/imagenes/publicidad/1489254335.jpg">
                        </div>
                                                                        <div  class="item" >
                          <img class="img-responsive" alt="" src="/imagenes/publicidad/1489254325.jpg">
                        </div>
                                                                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 separacion-superior">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="display:none;">
                                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                                        <li data-target="#myCarousel" data-slide-to="1" ></li>
                                                                  </ol>

                  <div class="carousel-inner" role="listbox">
                                                                    <div class="item active" >
                          <img class="img-responsive" alt="" src="/imagenes/publicidad/1489254373.jpg">
                        </div>
                                                                        <div  class="item">
                          <img class="img-responsive" alt="" src="/imagenes/publicidad/1489254362.jpg">
                        </div>
                                                                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="container-fluid">
    <div class="row EMPRESA" id="EMPRESA">
      <div class="col-xs-12 text-center">
        <h2 class="tituloSeccion">HOTEL</h2>
      </div>
      <div class="col-xs-12">
        <hr class="seccion">
        <img class="center-block relative" src="/imagenes/nosotros.png" alt="Nosotros">
      </div>
      <div class="clearfix"></div>

      <div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="container-fluid">
          <div class="row">
                          <h2 class="tituloSeccion text-center paddingLg">TIBISAY HOTEL BOUTIQUE</h2>
              <div class="col-xs-12">
	<p style="text-align: center;">
		<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Tibisay Hotel Boutique Margarita&nbsp;se encuentra ubicado sobre la Avenida Aldonza Manrique a pocos metros antes de la entrada a la pintoresca ciudad de Pampatar, capital gastron&oacute;mica de la lsla Margarita, con una inigualable vista al Mar Caribe y vecino de los m&aacute;s importantes y exclusivos centros comerciales y discotecas, su ubicaci&oacute;n le permite acceder f&aacute;cilmente a todas las principales avenidas y rutas tur&iacute;sticas.</span></span></span></p>
	<img alt="" class="img-responsive center-block" src="/imagenes/galeria/images/logo-pie.png" style="width: 280px; height: 217px;" /></div>

                      </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
      <div class="row CONTACTO" id="CONTACTO">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">CONTACTO</h2>
        </div>
        <div class="col-xs-12 separacion-row">
          <img class="center-block" src="/imagenes/contactoBanda.png" alt="Contacto">
        </div>
        <div class="col-md-4 col-xs-12 formulario">
            <form action="" method="post" class="form-horizontal" name="contacto" role="form">
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off" style="margin-top: 15px;">
                  <input type="text" class="form-control form-contacto" placeholder="Nombre" name="nombre" id="nombre" value="">
                </div>
              </div>
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off">
                  <input type="email" placeholder="Correo" class="form-control form-contacto" name="email" id="email" value="">
                </div>
              </div>
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off">
                  <input type="number" placeholder="Tel茅fono" class="form-control form-contacto" name="telefono" id="telefono" value="">
                </div>
              </div>
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off">
                  <textarea class="form-control form-contacto" placeholder="Comentario" name="comentario" id="comentario" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <button type="submit" class="form-control btn btn-contacto btn-block" name="envio" value="Enviar">Enviar <i class="fa fa-check-circle pull-right"></i> </button>
                </div>
              </div>
            </form>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body mapa">
              <address>
                <i class="fa fa-map-marker"></i> Playa Moreno - Margarita, Venezuela<br>
                <i class="fa fa-phone"></i> (58) 0295-500.07.00 Ext -2017 Ext -2010<br>
                <strong>Contactos:</strong><br>
                <blockquote>
                  <strong>Reservas:</strong><br>
                  <i class="fa fa-envelope"></i> reservas@tibisayhotelboutique.com<br>
                  <i class="fa fa-envelope"></i> auxreservas@tibisayhotelboutique.com<br>
                  <strong>Gerentes de Ventas: </strong><br>
                  <i class="fa fa-envelope"></i> ventas@tibisayhotelboutique.com<br>
                  <strong>Asistente de Ventas: </strong><br>
                  <i class="fa fa-envelope"></i> ventas1@tibisayhotelboutique.com<br>
                  <strong>Gerentes de Eventos y Banquetes: </strong><br>
                  <i class="fa fa-envelope"></i> eventos@tibisayhotelboutique.com<br>
                  <strong>Coordinadora de Banquetes: </strong><br>
                  <i class="fa fa-envelope"></i> ventas@tibisayhotelboutique.com<br>
                </blockquote>
              </address>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body padding-off">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.6604688213447!2d-63.807106484669106!3d10.988980192177527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c318fa7df3644c3%3A0x85b01b7a86a556ea!2sHotel+Tibisay+Boutique!5e0!3m2!1ses!2sve!4v1489199303064" width="100%" height="424" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 separacion-superior">
          <img src="/imagenes/Logo-Pie.png" alt="" class="img-responsive center-block">
        </div>
        <div class="col-md-3 hidden-xs text-center" style="padding-top:2.2%; padding-bottom:1.6%; font: 14px 'Century Gothic'; color: #545454;">
          Desarrollado por:
          <a href="http://www.diazcreativos.net" target="_blank" style="font: 14px 'Century Gothic'; color: #545454;">
            <img src="/imagenes/Logo-DC.png" alt="" width="34" height="33" style="margin-right: 3px;">Diaz Creativos
          </a>
        </div>
        <div class="col-md-6 hidden-xs text-center" style="padding-top:2.3%; padding-bottom:2%;">
          <span style="color:#545454; font: 14px 'Century Gothic';">Tibisay Hotel Boutique Margarita - Copyright &copy;2017 Todos los derechos reservados.</span>
        </div>
        <div class="visible-xs-block col-xs-12 text-center" style="padding-top:2.3%; padding-bottom:2%;">
          <span style="color:#545454; font: 14px 'Century Gothic';">Tibisay Hotel Boutique Margarita - Copyright &copy;2017 Todos los derechos reservados.</span>
        </div>
        <div class="visible-xs-block col-xs-12">
          <div class="col-xs-12 text-center"><span style="font: 14px 'Century Gothic'; color: #545454;">Desarrollado por:</span></div>
          <a href="http://www.diazcreativos.net" target="_blank">
            <div class="col xs 12">
              <div class="col-xs-4 no_padding" style="margin-top: 15px;"><img src="/imagenes/Logo-DC.png" alt="" class="pull-right" style="margin-right: 3px;" width="34" height="33"></div>
              <div class="col-xs-8 text-left no_padding"><h4 style="font: 14px 'Century Gothic'; color: #545454; padding-top:7%;">Diaz Creativos</h4></div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-xs-12" style="padding-top: 1.5%;">
          <a href="#INICIO" class="transicion" style="color:#cfb652"><img src="/imagenes/Flecha.png" alt="" class="pull-right" width="40" height="40"></a>
        </div>
      </div>
    </div>
  </footer>


    <!-- Latest compiled and minified JavaScript -->
    <script src="/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- InstanceBeginEditable name="pie" -->
    

		<script type="text/javascript">
        $(document).ready(function(){
       //nos desplazamos entre todos los divs
       $('a.transicion').click(function(e){
       e.preventDefault();
          var enlace  = $(this).attr('href');
          $('html, body').animate({
              scrollTop: $(enlace).offset().top - 81
          }, 1000);
       });
      });

   </script>

   <script type="text/javascript">
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
       event.preventDefault();
       $(this).ekkoLightbox();
     });

     $(function () {
       $('#datetimepicker1').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker2').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker9').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker10').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker11').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

    </script>


                <!--Acontinuacion Js de Subir al inicio -->

              <script type="text/javascript">

                    function mostrar2(){
                        document.getElementById('visible2').style.display = 'block';
                        document.getElementById('mostre-todo2').style.display = 'none';
                    }

                    function mostrar3(){
                        document.getElementById('visible3').style.display = 'block';
                        document.getElementById('mostre-todo3').style.display = 'none';
                    }
            	</script>

              <script type="text/javascript">

              </script>

                <script type="text/javascript">

                                $(document).ready(function(){

                             $('.ir-arriba').click(function(){
                                $('body, html').animate({
                                    scrollTop: '0px'
                                }, 300);
                            });

                            $(window).scroll(function(){
                            if( $(this).scrollTop() > 0 ){
                            $('.ir-arriba').slideDown(300);
                             } else {
                                $('.ir-arriba').slideUp(300);
                                 }
                            });

                        });
                      </script>
    



  </body>
</html>
<?php }
}

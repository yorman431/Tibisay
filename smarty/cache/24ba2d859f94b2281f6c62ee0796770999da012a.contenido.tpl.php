<?php
/* Smarty version 3.1.30, created on 2017-03-29 03:23:01
  from "D:\Websites\tibisay\smarty\templates\contenido.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58db0c7522ac93_54142847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '543366c99538cf7cc02178f63264208c0bc2a0ae' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\contenido.tpl',
      1 => 1490750577,
      2 => 'file',
    ),
    '9a3e520260453c80091977efd0e94ebd4896a78e' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\header.tpl',
      1 => 1490647166,
      2 => 'file',
    ),
    '948f10cc339ad88ca43f7ea9d9683f32dabbe644' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\layout\\botonera2.tpl',
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
function content_58db0c7522ac93_54142847 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">
 <head>
   <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<meta name="title"   content= "Hotel Tibisay Margarita | Venezuela" />
<meta name="author"  content= "Alejandro  D&iacute;az" />
<meta name="subject" content= "Hotel Tibisay Margarita | Venezuela" />

<meta name="description" content="Hoteles en Margarita" />

<meta name="Keywords" content="" />

<meta name="Language" content="Español" />
<meta name="Revisit" content="2 days" />
<meta name="Distribution" content="Global"/>
<meta name="Robots" content="All" />
<title>Promociones | Tibisay Margarita | Venezuela</title>
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

 </head>
<!-- Fin Cabecera
================================================== -->
<body id="INICIO">
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

                              <li ><a class="transicion" title="HABITACIONES"  href="/index.php/#HABITACIONES " id="efecto">HABITACIONES</a></li>
              
          
            <!--<li class="dropdown">
              <a title="RESERVAS" href="contenido.php?cont=2" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">RESERVAS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="RESERVAS"  href="/index.php/#RESERVAS " id="efecto">RESERVAS</a></li>
              
          
            <!--<li class="dropdown">
              <a title="SERVICIOS" href="contenido.php?cont=3" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">SERVICIOS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                                  <li><a class="transicion" title="SERVICIOS" href="#LA BARCA BAR RESTAURANT">LA BARCA BAR RESTAURANT</a></li>
                                  <li><a class="transicion" title="SERVICIOS" href="#GYM / ÁREA DE MASAJE">GYM / ÁREA DE MASAJE</a></li>
                                  <li><a class="transicion" title="SERVICIOS" href="#SALÓN DE BELLEZA">SALÓN DE BELLEZA</a></li>
                                  <li><a class="transicion" title="SERVICIOS" href="#TIENDAS">TIENDAS</a></li>
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="SERVICIOS"  href="/index.php/#SERVICIOS " id="efecto">SERVICIOS</a></li>
              
          
            <!--<li class="dropdown">
              <a title="GALERIAS" href="contenido.php?cont=4" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">GALERIAS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="GALERIAS"  href="/index.php/#GALERIAS " id="efecto">GALERIAS</a></li>
              
          
            <!--<li class="dropdown">
              <a title="BODAS" href="contenido.php?cont=5" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">BODAS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="BODAS"  href="/index.php/#BODAS " id="efecto">BODAS</a></li>
              
          
            <!--<li class="dropdown">
              <a title="PROMOCIONES" href="contenido.php?cont=6" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">PROMOS</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="PROMOCIONES"  href="/index.php/#PROMOCIONES " id="efecto">PROMOS</a></li>
              
          
            <!--<li class="dropdown">
              <a title="EMPRESA" href="contenido.php?cont=7" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">EMPRESA</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="EMPRESA"  href="/index.php/#EMPRESA " id="efecto">EMPRESA</a></li>
              
          
            <!--<li class="dropdown">
              <a title="CONTACTO" href="contenido.php?cont=8" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">CONTACTO</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                              </ul>
            </li>-->

                              <li ><a class="transicion" title="CONTACTO"  href="/index.php/#CONTACTO " id="efecto">CONTACTO</a></li>
              
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
        <li data-target="#myCarousel" data-slide-to="2" ></li>
        <li data-target="#myCarousel" data-slide-to="3" ></li>
        <li data-target="#myCarousel" data-slide-to="4" ></li>
        <li data-target="#myCarousel" data-slide-to="5" ></li>
        <li data-target="#myCarousel" data-slide-to="6" ></li>
        <li data-target="#myCarousel" data-slide-to="7" ></li>
        <li data-target="#myCarousel" data-slide-to="8" ></li>
        <li data-target="#myCarousel" data-slide-to="9" ></li>
      </ol>

  <div class="carousel-inner" role="listbox">

        <div class="item active">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455419.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455326.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455366.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490454651.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455447.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455479.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455498.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455514.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455537.jpg">
    </div>
        <div class="item">
      <img class="img-responsive" alt="Tibisay Hotel Boutique" src="/imagenes/banner/1490455585.jpg">
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
      <div class="row CONTENIDO" id="CONTENIDO">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 text-center">
                      <h2 class="tituloSeccion">PROMOCIONES</h2>
                  </div>
                  <div class="col-xs-12">
                      <hr class="seccion">
                      <img class="center-block relative" src="/imagenes/promocion.png" alt="Habitaciones">
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-xs-6">
                      <h3>TIBISAY DE NUEVO TE SORPRENDE 3X2 DE DOMINGO A JUEVES</h3>
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive-imgMarginDivision">
                      <p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Tibisay Hotel Boutique te ofrece una promoci&oacute;n que cautivar&aacute; tus sentidos, si usted reserva una habitaci&oacute;n para 2 personas de domingo a jueves por 3 noches usted solo pagar&aacute; 2 noches la tercera Tibisay te la obsequia porque usted es importante para nosotros, pero no solo le obsequiamos una noche tambi&eacute;n un ni&ntilde;o hasta 7 a&ntilde;os completamente gratis, pregunte por nuestro plan de financiamiento, &iquest;qu&eacute; espera? reserve ya Tibisay Hotel Boutique cautivar&aacute; tus sentidos.</span></span></span></p>
<p>
	<span style="color:#545454;"><span style="font-size:20px;"><span style="font-family:century gothic,serif;">Condiciones: no aplica en temporada alta, no se puede fumar en las habitaciones, el paquete debe estar completamente pagado antes de la fecha de entrada.</span></span></span></p>

                  </div>
                  <div class="col-xs-6">
                      <div class="panel panel-default">
                          <div class="panel-body"><img src="/imagenes/contenido/1490465425.jpg" alt="" class="img-responsive center-block" style="width: 100%;"></div>
                      </div>
                  </div>
                      <div class="col-xs-12 separacion-superior" align="center">
                          <a class="btn btn-default" href="#" onclick="history.back()"><h4 class="no_margin2"><strong>Volver</strong></h4></a>
                      </div>
              </div>
          </div>
      </div>

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
                      <input type="number" placeholder="Teléfono" class="form-control form-contacto" name="telefono" id="telefono" value="">
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
                          <i class="fa fa-envelope"></i> eventos1@tibisayhotelboutique.com<br>
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
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- InstanceBeginEditable name="pie" -->
    <!-- InstanceEndEditable -->

   
  </body>
<!-- InstanceEnd --></html><?php }
}

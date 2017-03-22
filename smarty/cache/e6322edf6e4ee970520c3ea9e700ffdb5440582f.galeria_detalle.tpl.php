<?php
/* Smarty version 3.1.30, created on 2016-12-11 04:40:32
  from "/home/yorman/Websites/rockabeachtour/smarty/templates/galeria_detalle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584ccab0465042_65526581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c357f4b4a836666620546acc25b4b50a4948f5dc' => 
    array (
      0 => '/home/yorman/Websites/rockabeachtour/smarty/templates/galeria_detalle.tpl',
      1 => 1475691668,
      2 => 'file',
    ),
    'f3e09a7b52aeb0f72d9e7f3e37dc4949c5af9f31' => 
    array (
      0 => '/home/yorman/Websites/rockabeachtour/smarty/templates/layout/header.tpl',
      1 => 1475526974,
      2 => 'file',
    ),
    'eb63b96c65d4ea59e2a1c01a22fd16cc96029392' => 
    array (
      0 => '/home/yorman/Websites/rockabeachtour/smarty/templates/layout/botonera2.tpl',
      1 => 1475690394,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_584ccab0465042_65526581 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/plantilla_padre.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<meta name="title"   content= "Rocka Island Tour | Aruba" />
<meta name="author"  content= "Alejandro  D&iacute;az" />
<meta name="subject" content= "Rocka Island Tour | Aruba" />

<meta name="description" content="Tour on Aruba" />

<meta name="Keywords" content="" />

<meta name="Language" content="English" />
<meta name="Revisit" content="2 days" />
<meta name="Distribution" content="Global"/>
<meta name="Robots" content="All" />
<title>Galery Details | RockaBeach Tour | Aruba</title>
<link rel="icon" href="/imagenes/favicon.ico">
<script src="/js/validar.js"></script>
<script src="/js/jquery.js"></script>
<link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="/datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<script type="text/javascript" src="/moment-develop/moment.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="/assets/js/ie-emulation-modes-warning.js"></script>
<script type="text/javascript" src="/datetimepicker/src/js/bootstrap-datetimepicker.js"></script>

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="/css/navbar-fixed-top.css" rel="stylesheet">
<link href="/css/personalizado/personalizado.css" rel="stylesheet">
<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />
<script defer src="/js/flex/jquery.flexslider.js"></script>
<link rel="stylesheet" type="text/css" href="/fonts/style.css">
<link  href="/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>


 <script type="text/javascript">
        $(window).load(function() {
          $('.flexslider').flexslider({
            animation: "slide",
    controlNav: false,
    multipleKeyboard: true
          });
        });
      </script>
  

<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->


  
		 <script type="text/javascript">
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
				controlNav: false,
				multipleKeyboard: true
              });
            });
          </script>
      

    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
  </head>
<!-- Fin Cabecera
================================================== -->
  <body id="INICIO">
  <!-- Acotinuación se emplea clase bootstrap para hacer fixed la barra de navegación-->
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand hidden-xs"><img src="imagenes/logo-navbar.png" alt=""></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="padding-top:17px;">
                                            <li ><a class="transicion" title="ABOUT"  href="index.php#ABOUT" id="efecto">ABOUT US</a></li>
                                                                  <li ><a class="transicion" title="TOURS"  href="index.php#TOURS" id="efecto">TOURS</a></li>
                                                                  <li ><a class="transicion" title="AIRPORT"  href="index.php#AIRPORT" id="efecto">AIRPORT SHUTTLE</a></li>
                                                                  <li ><a class="transicion" title="BOOKING"  href="index.php#BOOKING" id="efecto">BOOKING</a></li>
                                                                  <li ><a class="transicion" title="GALERY"  href="index.php#GALERY" id="efecto">GALERY</a></li>
                                                                  <li ><a class="transicion" title="VIDEOS"  href="index.php#VIDEOS" id="efecto">VIDEOS</a></li>
                                                                  <li ><a class="transicion" title="CONTACT"  href="index.php#CONTACT" id="efecto">CONTACT</a></li>
                                
      </ul>
      <ul class="nav navbar-nav navbar-right hidden-xs" style="background-color:#5bc70d;">
        <li><a href="https://www.facebook.com/RockaBeachTours/?fref=ts" target="_blank"><img src="imagenes/facebook.png" alt="" height="40" width="40"></a></li>
        <li><a href="https://twitter.com/"  target="_blank"><img src="imagenes/twitter.png" alt="" height="40" width="40"></a></li>
        <li><a href="https://www.instagram.com/rockabeachtours/" target="_blank"><img src="imagenes/instagram.png" alt="" height="40" width="40"></a></li>
      </ul>
    </div>
  </div>  
</nav>

	<!-- InstanceBeginEditable name="contenido" -->

    <div class="container-fluid">
		    <div class="row separacion-superior">
    	<div class="col-xs-12 col-md-6 no_padding">
        	<div class="col-xs-12 no_padding no_padding2 separacion-row">
      			 <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                                                                    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                                                                    <li data-target="#myCarousel2" data-slide-to="1" ></li>
                                                                    <li data-target="#myCarousel2" data-slide-to="2" ></li>
                                                                  </ol>

                  <div class="carousel-inner" role="listbox">

                                                        <div class="item active">

                      <img alt="Portada" src="/imagenes/galeria/1480614408.jpg">

                    </div>
                                                        <div class="item">

                      <img alt="RockaBeach Aruba" src="/imagenes/galeria/1480615576.jpg">

                    </div>
                                                        <div class="item">

                      <img alt="RockaBeach Aruba" src="/imagenes/galeria/1480615595.jpg">

                    </div>
                                    
                  </div>

                  <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><!-- /.Banner -->
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
          <div class="row">
            <div class="col-xs-12 separacion-row">
              <h2 class="no_margin2 color-icono" style="color:#ff6600; font-style:italic;">Island Tours With A Twist</h2>
            </div>
            <div class="col-xs-12 text-justify">
              <p>
	Island tours with a twist, here we had a group of Yogis enjoy a peaceful Yoga session on our remarkable Eagle Beach and private island tour.&nbsp;The always vivacious Frankie&rsquo;s Beach Bus ready to start the island tour.</p>

            </div>
          </div>
        </div>
      </div>

      <div class="row separacion-row">

        	<div class="col-xs-4 col-xs-offset-4 form-horizontal" >
          	<a class="btn btn-galeria btn-block " href="#" onclick="history.back()">Volver</a>
         </div>

      </div>
    </div>
    <!-- InstanceEndEditable -->

    <footer>
        <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 separacion-superior">
              <img src="/imagenes/Logo-Pie.png" alt="" class="img-responsive center-block">
            </div>
            <div class="col-md-3 hidden-xs text-center" style="padding-top:2.2%; padding-bottom:1.6%; color:#ffffff;">
                Development by:
                <a href="http://www.diazcreativos.net" target="_blank" style="color:#ffffff;">
                  <img src="/imagenes/Logo-DC.png" alt="" width="30" height="30">Diaz Creativos
                </a>
            </div>
            <div class="col-md-6 hidden-xs text-center" style="padding-top:2.3%; padding-bottom:2%;">
              <span style="color:#ffffff; font-family: 'Century Gothic'; font-weight: bold; font-size: 16px;">RockaBeach Tours - Copyright &copy;2016 All Right Reserved.</span>
            </div>
            <div class="visible-xs-block col-xs-12 text-center" style="padding-top:2.3%; padding-bottom:2%;">
              <span style="color:#ffffff; font-family: 'Century Gothic'; font-weight: bold; font-size: 16px;">RockaBeach Tours - Copyright &copy;2016 All Right Reserved.</span>
            </div>
            <div class="visible-xs-block col-xs-8">
              <div class="col-xs-12 text-center"><span style="color:#ffffff;">Development by</span></div>
              <a href="http://www.diazcreativos.net" target="_blank">
                <div class="col xs 12">
                  <div class="col-xs-4 no_padding" style="margin-top: 15px;"><img src="/imagenes/Logo-DC.png" alt="" class="img-responsive pull-right"></div>
                  <div class="col-xs-8 text-left no_padding"><h4 style="color:#ffffff; padding-top:11%;">Diaz Creativos</h4></div>
                </div>
              </a>
            </div>
             <div class="col-md-3 col-xs-4" style="padding-top: 0.7%;">
               <a href="#INICIO" class="transicion" style="color:#FFFFFF"><img src="imagenes/Flecha.png" alt="" class="img-responsive pull-right"></a>
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
<!-- InstanceEnd --></html>
<?php }
}

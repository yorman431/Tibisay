<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/plantilla_padre.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <meta name="title"   content= "Marinart | Venezuela" />
    <meta name="author"  content= "Alejandro  D&iacute;az" />
    <meta name="subject" content= "Marinart | Venezuela" />
    
    <meta name="description" content="Centro de Impresión" />
    
    <meta name="Keywords" content="" />

    <meta name="Language" content="Spanish" />
    <meta name="Revisit" content="2 days" />
    <meta name="Distribution" content="Global"/>
    <meta name="Robots" content="All" />
    <title>{$accion} | Marinart | Venezuela</title>
    <link rel="icon" href="/imagenes/favicon.ico">
    <script src="/js/validar.js"></script>
    <link href="bootstrap-3.3.4-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.4-dist/js/ie-emulation-modes-warning.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="/css/personalizado/personalizado.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>
	<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" /> 
    <script defer src="/js/flex/jquery.flexslider.js"></script>
    <link rel="stylesheet" type="text/css" href="/fonts/style.css">
		<link  href="/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  
  {literal}
		 <script type="text/javascript">
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
				controlNav: false,
				multipleKeyboard: true
              });
            });
          </script>
      {/literal}
      
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
              
           <a title="Marinar Inicio" href="index.php"><img src="/imagenes/Logo-botonera.png" style="margin-right:15px;"></a> 
            </div>
            
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              
              	{section name=i loop=$enlaces_B}
                	{if $enlaces_B[i].enlaces neq ""} 
                   
											<li class="dropdown">
                          <a title="{$enlaces_B[i].etiqueta_cat}" href="contenido.php?cont={$enlaces_B[i].id_cat}" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">{$enlaces_B[i].icono_cat}&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">{$enlaces_B[i].nombre_cat}</span><span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                        {section name=j loop=$enlaces_B[i].enlaces}
                            <li><a class="transicion" title="{$enlaces_B[i].nombre_cat}" href="#{$enlaces_B[i].enlaces[j].nombre_sub}">{$enlaces_B[i].enlaces[j].nombre_sub}</a>
                            </li>
                        {/section}
                        </ul> 
                      </li>
                    {else}
                    		{if $enlaces_B[i].icono_cat neq ""}
									<li {if $enlaces_B[i].id_cat eq $activo}class="active"{/if}><a class="transicion" title="{$enlaces_B[i].etiqueta_cat}" href="#{$enlaces_B[i].nombre_cat}" id="efecto">{$enlaces_B[i].icono_cat}&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">{$enlaces_B[i].nombre_cat}</span></a></li>
								{else}
									<li {if $enlaces_B[i].id_cat eq $activo}class="active"{/if}><a title="{$enlaces_B[i].etiqueta_cat}" href="#{$enlaces_B[i].nombre_cat}" id="efecto">{$enlaces_B[i].nombre_cat}</a></li>
								{/if}
                    {/if}
               	{/section}
              </ul>
              <ul class="nav navbar-nav navbar-right">
              	<li>
						<a title="Facebook" href="https://www.facebook.com/" class="iconos">
							<img class="img-responsive" src="imagenes/facebook.png" alt="">
						</a>
					</li>
					<li>
						<a title="Twitter" href="http://www.twitter.com/" class="iconos"> 
							<img class="img-responsive" src="imagenes/twitter.png" alt="">
						</a>
					</li>
					<li>
						<a title="Instagram" href="http://www.instagram.com" class="iconos"> 
							<img class="img-responsive" src="imagenes/instagram.png" alt="">
						</a>
					</li>
              </ul>
            </div>
					</div>	
        </nav>
     

    <!-- Banner Principal
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      {assign var="cont" value=0}
      {section name=i loop=$banner}
        <li data-target="#myCarousel" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
      {assign var="cont" value=$cont+1}
      {/section}  
      </ol>
      
      <div class="carousel-inner" role="listbox">
      
      {assign var="cont" value=0}
      {section name=i loop=$banner}
        <div {if $cont eq "0"}class="item active"{else}class="item"{/if}>
          <img class="img-responsive" alt="{$banner[i].etiqueta_ban}" src="/imagenes/banner/{$banner[i].url_ban}">
        </div>
      {assign var="cont" value=$cont+1}
      {/section}
        
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

	
	<!-- InstanceBeginEditable name="contenido" -->
      <div class="row separacion-row">
 		{section name=i loop=$galeria}
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="panel panel-default">
              <div class="panel-body no_padding2 no_padding">
                <a href="/galeria_detalle.php?id={$galeria[i].id_gal}">
                  <img class="img-responsive" src="/imagenes/{$galeria[i].directorio_image}"/>
                </a>
              </div>
              <div class="panel-body">
                <h3 class="no_margin4">{$galeria[i].nombre_gal}</h3>
              </div>
              <div class="panel-footer no_padding no_padding2">
                <div class="row">
                  <div class="col-xs-12 form-horizontal" align="center">
                    <a class="btn btn-info btn-block" href="/galeria_detalle.php?id={$galeria[i].id_gal}">Ver M&aacute;s</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {/section}
      </div>

    <!-- InstanceEndEditable -->
	
    
    <footer>
       <div class="row" id="CONTACTO">
				<div id="cintillo"><img src="imagenes/contactos2.png" alt="" class="img-responsive center-block"></div>
				<div class="container-fluid separacion-superior">
					<div class="col-lg-4 col-lg-offset-4 col-xs-12">
						<form action="" method="post" class="form-horizontal" name="contacto" role="form">
							<div class="form-group">
								<label for="nombre" class="control-label col-md-2 col-xs-3 text-left">Cliente</label>
								<div class="col-md-10 col-xs-9">
									<input type="text" class="form-control" name="nombre" id="nombre" value="{$nombre}">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-md-2 col-xs-3 text-left">Email</label>
								<div class="col-md-10 col-xs-9">
									<input type="email" class="form-control" name="email" id="email" value="{$email}">
								</div>
							</div>
							<div class="form-group">
								<label for="telefono" class="control-label col-md-2 col-xs-3 text-left">Telf.</label>
								<div class="col-md-10 col-xs-9">
									<input type="number" class="form-control" name="telefono" id="telefono" value="{$telefono}">
								</div>
							</div>
							<div class="form-group">
								<label for="comentario" class="control-label col-md-2 col-xs-3 text-left">Mensaje</label>
								<div class="col-md-10 col-xs-9">
									<textarea class="form-control" name="comentario" id="comentario" rows="6">{$comentario}</textarea>
								</div>
							</div>
							<div class="form-group separacion-superior">
								<div class="col-md-3 col-md-offset-5 col-xs-10 col-xs-offset-2">
									<input type="submit" name="envio" class="form-control btn ovalo2 btn-block " value="Enviar">
								</div>
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
					
					<div class="col-lg-1 col-lg-offset-11 col-xs-1 col-xs-offset-11 no_padding" align="right">
						<a href="#INICIO" class="transicion" style="color:#4D4D4D"><img src="imagenes/Flecha.png" alt="" class="img-responsive"></a>
					</div>
					<div class="col-lg-3 col-lg-offset-8 col-xs-11 text-right">
						Programaci&oacute;n y Dise&ntilde;o Web <a href="www.diazcreativos.net.ve"> D&iacute;az Creativos.</a>
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
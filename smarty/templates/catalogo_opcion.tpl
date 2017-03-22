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

<meta name="Title" content="CasaM&aacute;rmol Piedras Naturales | Venezuela" />
<meta name="Author" content="Alejandro Díaz http://www.diazcreativos.net.ve/" />
<meta name="Subject" content="CasaM&aacute;rmol Piedras Naturales" />
<meta name="Description" content="Casam&aacute;rmol es una empresa venezolana ubicada en  la Isla de Margarita, estado Nueva Esparta y en la ciudad de Barcelona, estado Anzo&aacute;tegui." />
<meta name="Keywords" content="venezuela, piedras naturales, marmol, cuarzo, granitos, piedra pizarra, caliza, marmoles, marmol en venezuela, herramientas para marmol, piedras, marmoleria en margarita" />

<meta name="Generator" content="DreamWeaver" /> 
<meta name="Language" content="Spanish" />
<meta name="Revisit" content="7 days" /> 
<meta name="Distribution" content="Global" />
<meta name="Robots" content="All" />
 
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/imagenes/icono.ico" />
<script src="/js/validar.js" type="text/javascript"></script>

<link href="/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
<link rel="stylesheet" href="/css/jshowoff.css" type="text/css" media="screen, projection" />
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/js/jquery.skitter.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.jshowoff.min.js"></script>
<script type="text/javascript" src="/js/jquery.jcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="/css/skin.css" />
<link href="/css/styles.css" type="text/css" media="all" rel="stylesheet" />

{literal}
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
		vertical: false,
        auto: 4,
		easing: 'easeOutBack',
		animation: 'slow',
		scroll: 3,
        wrap: 'circular',
        initCallback: mycarousel_initCallback,
		itemLoadCallback: itemLoadCallbackFunction
    });
});

$(function(){
    // Skitter
    $('.box_skitter_large').skitter();
    
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6623041-24']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
{/literal}
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
       <div class="titulo_principal2">{$accion}</div>
       <div id="entradas4">
       <div class="panel_tabla">
       <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal2">  
         {assign var="cont" value=0}
         {if $mensaje2 eq ""}
         <tr> {section name=i loop=$listado}
           <td width="50%" align="center" valign="top">
             <table border="0" cellpadding="0" cellspacing="2" class="marco2">
              
               <tr>
                 <td align="center">
                   {if $listado[i].etiqueta_pro eq "Vendido"}
                   <div class="nuevo">
                     <img src="/imagenes/sold.png" width="46" height="46" border="0" /></div>
                   {else}{if $listado[i].etiqueta_pro eq "Alquilado"}
                   <div class="nuevo">
                     <img src="/imagenes/rent.png" width="46" height="46" border="0" /></div>
                   {else}{if $listado[i].etiqueta_pro eq "Disponible"}
                   
                   {/if}{/if}{/if}
                   <a href="catalogo_detalle.php?id={$listado[i].id_pro}#next" title="Ver Detalles" >
                 <img alt="{$listado[i].nombre_image}" border="0" src="/imagenes/miniaturas/{$listado[i].directorio_image}" width="200" height="200" class="opacidad"  longdesc="{$listado[i].nombre_pro}" /></a>			               </td>
               </tr> 
                <tr>
                 <th align="center" height="20"><a class="diapo" href="catalogo_detalle.php?id={$listado[i].id_pro}#next">{$listado[i].nombre_pro}</a></th>
               </tr>
           </table></td>
           {assign var="cont" value=$cont+1}
           {if $cont eq 3}
           {assign var="cont" value=0}
         </tr><tr>
           {/if}
           {/section}
           </tr>
         {else}
         {$mensaje2}
         {/if}
         
         {if $mensaje2 eq ""}
         <tr>
           <td align="center" colspan="5">
             {if $pagination neq ""}
             <div class="caja_paginacion">
               <div class="boton_prev">{$pagination[0][0]}</div>
               <div class="caja_num">
                 {section name=j loop=$listado}
                 <div class="boton_num">{$pagination[1][j]}</div>
                 {/section}
                 </div>
               <div class="boton_next">{$pagination[2][0]}</div>
         </div>{/if}</td></tr>
         {/if}
       </table>
       </div>
       </div>
    
    <!-- Fin main centro-->
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
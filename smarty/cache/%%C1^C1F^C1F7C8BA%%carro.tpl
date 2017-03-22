<!-- InstanceBegin template="/Templates/plantilla_progreso.dwt" codeOutsideHTMLIsLocked="false" --><!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="title" content="{$accion} | Tu Operador de Servicios Turísticos | Venezuela" />
    <meta name="author" content="Seturs, Tu Operador de Servicios Turísticos | Venezuela" />
    <meta name="subject" content="{$accion} | Tu Operador de Servicios Turísticos | Venezuela" />
    
    <meta name="description" content="{$descripcion}" />
    
    <meta name="Keywords" content="{$claves}" /> 

    <link rel="icon" href="/imagenes/icono.ico" /> 
    <meta name="Language" content="Spanish" />
    <meta name="Revisit" content="2 days" />
    <meta name="Distribution" content="Global" />
    <meta name="Robots" content="All" />
    <title>{$accion} | Tu Operador de Servicios Turísticos | Venezuela</title>
    <script src="/js/validar.js"></script>
    <link href="/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="/css/personalizado/personalizado.css" rel="stylesheet">
    <link  href="/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <script src="/js/jquery.js"></script>
      
    <!-- InstanceBeginEditable name="head" -->

<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(function() {
	$('#gallery a').lightBox();
});
</script>

<!-- InstanceEndEditable -->
    
    <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" /> 
	  <script defer src="/js/flex/jquery.flexslider.js"></script>
      
      {literal}
		 <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-6623041-31', 'auto');
		  ga('send', 'pageview');
		
		</script>
          
      {/literal}
      
  </head>
<!-- Fin Cabecera
================================================== -->
  <body>

  <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
              <a title="Betcourvitur Viajes y Turismo" href="/index.php"><img src="/imagenes/logotipo.png" width="248" height="68"></a> 
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              	{section name=i loop=$enlaces_A} 
                	{if $enlaces_A[i].enlaces neq ""}
                    	<li class="dropdown">
                          <a title="{$enlaces_A[i].etiqueta_cat}" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{$enlaces_A[i].nombre_cat}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        {if $enlaces_A[i].id_cat eq '27'}
                        {section name=j loop=$enlaces_A[i].enlaces}
                        	
                         <li><a title="{$enlaces_A[i].enlaces[j].nombre_cat}" href="/hoteles.php?cont={$enlaces_A[i].id_cat}&cat={$enlaces_A[i].enlaces[j].id_cat}">{$enlaces_A[i].enlaces[j].nombre_cat}</a>
                            </li>
                          
                        {/section}
                        {elseif $enlaces_A[i].id_cat eq '30'}
                        	{section name=j loop=$enlaces_A[i].enlaces}
                        	
                            <li><a title="{$enlaces_A[i].nombre_cat}" href="/catalogo_opcion.php?cont={$enlaces_A[i].id_cat}&cat={$enlaces_A[i].enlaces[j].id_cat}">{$enlaces_A[i].enlaces[j].nombre_cat}</a>
                            </li>
                          
                        {/section}
                        {/if}
                        </ul>
                        </li>
                    {else}
                    	<li {if $enlaces_A[i].id_cat eq $activo}class="active"{/if}><a title="{$enlaces_A[i].etiqueta_cat}" href="/contenido.php?cont={$enlaces_A[i].id_cat}">{$enlaces_A[i].nombre_cat}</a></li>
                    {/if}
               	{/section}
              </ul>
              
               <ul class="nav navbar-nav navbar-right">
                	{section name=i loop=$enlaces_B}
                	<li><a title="{$enlaces_B[i].etiqueta_cat}" href="/contenido.php?cont={$enlaces_B[i].id_cat}">{$enlaces_B[i].nombre_cat}</a></li>
                	{/section}
                    
                    <li><a target="_blank" title="Síguenos en Twitter" href="https://twitter.com/betcourvitur/"><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li><a target="_blank" title="Síguenos en Facebook" href="https://facebook.com/betcourvitur/"><i class="fa fa-facebook-official fa-lg"></i></a></li>
                    <li><a target="_blank" title="Síguenos en Instagram"  href="https://instagram.com/betcourvitur/"><i class="fa fa-instagram fa-lg"></i></a></li>
              </ul>
            </div>
            
          </div>
        </nav>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-top:64px;">
        	<div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" id="boton-navegacion2" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  
                  
                </div>
                               
                <div id="navbar2" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav alineamiento">
                    {section name=i loop=$enlaces_C}
                        <li><a title="{$enlaces_C[i].etiqueta_cat}" href="/contenido.php?cont={$enlaces_C[i].id_cat}">{$enlaces_C[i].nombre_cat}</a></li>
                    {/section}
                    </ul>
                </div>
            </div>    
    	</nav>   

    <!-- Contenido -->
	<div class="container-fluid">
	<!-- InstanceBeginEditable name="contenido" -->
    <div class="barra_progreso">
    	<div class="barra_panel">
            <div class="opcion_progreso2">Mi Solicitud de Reserva</div>
            <div class="opcion_progreso">Abrir Mi Sesi&oacute;n</div>
            <div class="opcion_progreso">Enviar Mi Solicitud Reserva</div>
        </div>
    </div>
    <div class="clear"></div>      
         <table class="normal" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
           <tr>
             <th colspan="7"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /> Detalles de  Solicitud de Reserva<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
           </tr>
           <tr>
             <td width="70" class="subtituloWeb3">Imagen</td>
             <td width="200" class="subtituloWeb3">Producto</td>
             <td width="250" class="subtituloWeb3" colspan="3">Descripci&oacute;n</td>
             <td width="70" class="subtituloWeb3">Subtotal</td>
             <td width="60" class="subtituloWeb3">Acciones</td>
           </tr>
                      <tr><td align='center' colspan='8' class='error'>No posee ningun producto en su lista de compras!</td></tr>
              
     <tr>
   	 <td colspan="7" align="right">
   	   <div class="titulo">Monto Aproximado</div>
   	   <div class="tituloWeb">Subtotal: Bs 0</div>
   	   <!-- <div class="tituloWeb">Descuento: Bs 0</div>
        <div class="division2"></div> -->
   	   <div class="titulo4">Total: Bs 0</div>
       <div class="division"></div>
       </td>
   	 </tr>
  	<tr>
    <td colspan="7" align="right" class="paginacion">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%" align="left">
    <input onclick="javascript: location.href='index.php'" type="submit" name="button" id="button" value="Continuar Buscando" class="botoncito2" />
    </td>
    <td width="24%" align="center">
    	<input name="descuento" type="hidden" id="descuento" value="0" />
        <input name="subtotal" type="hidden" id="subtotal" value="0" />
    </td>
    <td width="49%" align="right"><input  disabled="disabled"  onclick="javascript: location.href='confirmar_compra.php'" type="submit" name="button2" id="button2" value="Siguiente &raquo;" class="botoncito2" /></td>
  </tr>
</table>

      </td>
  </tr>
         </table>
      <!-- InstanceEndEditable -->
    <!-- Fin contenido -->
    </div>
    
        
    <!-- Rotativas -->
    <div class="container-fluid">    
          <div class="row rotativas"> 
                <div class="col-md-4 no_padding">
                
                	
                    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 560px; height: 269px;">
                        <!-- Slides Container -->
                        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 560px; height: 269px;">
                        {section name=i loop=$publicidad}
                        	<div>
                            {if $publicidad[i].url_dir neq ""}
                    <a title="{$publicidad[i].nombre_dir}" href="{$publicidad[i].url_dir}">
                            <img style="width:650px;" src="/imagenes/publicidad/{$publicidad[i].directorio_dir}" alt="{$publicidad[i].nombre_dir}" u="image" />
                        </a>
                            {else}
                            <img style="width:650px;" src="/imagenes/publicidad/{$publicidad[i].directorio_dir}" alt="{$publicidad[i].nombre_dir}" u="image"  />
                        	{/if}
                    		</div>
                            {/section}
                        </div>
                    </div>

                  
                </div>
                
                <div class="col-md-4">
                	<div class="panel panel-info panel-hotel">
                        <div class="panel-heading" align="center">
                            <h5 class="no_margin2">Encuentra tu Hotel</h5>
                        </div>
                        <div class="panel-body"> 
                            <form class="form-horizontal" action="resultado.php" method="post" name="form_buscar" id="form_buscar" onsubmit="MM_validateForm('keywords','','R');return document.MM_returnValue">
                                
                                <div class="form-group form-group-sm">
                                    <input class="form-control" name="keywords" type="text" id="keywords" value="{$keywords}" maxlength="100" placeholder="Nombre del Hotel" />
                                </div>
                                
                                <div class="row">
                                	<div class="col-md-6">
                                        <div class="form-group form-group-sm">
                                            <label for="localidad">Localidad</label>
                                            <select class="form-control" name="localidad" id="localidad">
                                            <option {if $localidades[i].ciudad_hot eq ""} selected='selected'{/if} value=""><-- Todas --></option>
                                            {section name=i loop=$localidades}
                                                <option {if $localidades[i].ciudad_hot eq $localidad} selected='selected'{/if} value="{$localidades[i].ciudad_hot}">{$localidades[i].ciudad_hot}</option>
                                            {/section} 
                                            </select>
                                        </div>
                                    </div>
                                
                                	<div class="col-md-6">
                                        <div class="form-group form-group-sm">
                                          <label for="categoria">Categor&iacute;a</label>
                                          <select class="form-control" name="categoria" id="categoria">
                                            <option {if $categoria eq ""} selected='selected'{/if} value=""><-- Todas --></option>
                                            <option {if $categoria eq "5"} selected='selected'{/if} value="5">5 Estrellas</option>
                                            <option {if $categoria eq "4"} selected='selected'{/if} value="4">4 Estrellas</option>
                                            <option {if $categoria eq "3"} selected='selected'{/if} value="3">3 Estrellas</option>
                                            <option {if $categoria eq "2"} selected='selected'{/if} value="2">2 Estrellas</option>
                                            <option {if $categoria eq "1"} selected='selected'{/if} value="1">Posada</option>
                                          </select>
                                         </div> 
                                 	</div>
                                 </div>
                                 
                                 <div class="form-group form-group-sm">
                                    <a class="btn btn-block btn-success btn-sm" onclick="javascripts: document.form_buscar.submit(); return false;" href="#" title="Buscar en Betcourvitur On line">Buscar Hotel</a>
                                 </div>
                          	</form>
                      	</div>
                    </div>
                </div>
                
                <div class="col-md-4 no_padding">
                	<div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 560px; height: 269px;">
                        <!-- Slides Container -->
                        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 560px; height: 269px;">
                        {section name=i loop=$publicidad2}
                        	<div>
                            {if $publicidad2[i].url_dir neq ""}
                    <a title="{$publicidad2[i].nombre_dir}" href="{$publicidad2[i].url_dir}">
                            <img style="width:650px;" src="/imagenes/publicidad/{$publicidad2[i].directorio_dir}" alt="{$publicidad2[i].nombre_dir}" u="image" />
                        </a>
                            {else}
                            <img style="width:650px;" src="/imagenes/publicidad/{$publicidad2[i].directorio_dir}" alt="{$publicidad2[i].nombre_dir}" u="image"  />
                        	{/if}
                    		</div>
                            {/section}
                        </div>
                    </div>
              </div>
            </div>
    	</div>
    <!-- /Fin Rotativas -->
    
    <!-- Seccion Noticias -->
    <div class="container-fluid">
        <div class="row">
        	{section name=i loop=$noticias}
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 no_padding">
                <div class="panel panel-default panel-noticias">
                    <div class="panel-heading">
                    	<h5 class="pull-right"><i class="fa fa-newspaper-o fa-lg"></i></h5>
                    	<h5>Noticias</h5>
                    </div>
                    
                    <div class="panel-body">
               	    	<div align="center">
                        <a title="Ver Noticia" href="/noticia_detalle.php?id={$noticias[i].id_not}"><img class="img-responsive opacidad" src="/imagenes/{$noticias[i].directorio_image}" alt="{$noticias[i].titulo_not}" width="350" height="350"></a>
                        </div>
                        <h5>{$noticias[i].titulo_not}</h5>
                        <p>{$noticias[i].contenido_not|truncate:150}</p>
                    </div>
                    
                    <div class="panel-footer">
                    	<a class="btn btn-default btn-block" title="{$noticias[i].titulo_not}" href="/noticia_detalle.php?id={$noticias[i].id_not}">Leer más</a>
                   </div>
                   
                </div>
            </div>
            {/section}
       </div>
    </div>
    <!-- /Seccion Noticias -->
      
    <!-- Redes Sociales -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no_padding">
               <!-- INSTANSIVE WIDGET -->{literal}<script src="//instansive.com/widget/js/instansive.js"></script>{/literal}<iframe src="//instansive.com/widgets/24edeba9e90b53f1771e111ae6ddb207ccf27f59.html" id="instansive_24edeba9e9" name="instansive_24edeba9e9"  scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            	<a class="twitter-timeline" href="https://twitter.com/betcourvitur" data-widget-id="661024121384497152">Tweets por el @betcourvitur.</a>
{literal}<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>{/literal}
            </div>
            
            
        </div>
    </div>
    <!-- Fin Redes Sociales -->
    
    
    <!-- Pie de Pagina -->
    <footer>
    	<div class="container">
            <div class="row">
            
            	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                
                	<div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                        <h5>Menú Principal</h5>
                            <ul class="items">
                            {section name=j loop=$enlaces_A}
                            <li>
    <a  class="foot-btn" title="{$enlaces_A[j].etiqueta_cat}" href="/contenido.php?cont={$enlaces_A[j].id_cat}">{$enlaces_A[j].nombre_cat}</a>
                            </li>
                            {/section}
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
            	<div  class="col-xs-6 col-sm-6 col-md-3 col-lg-3"> 
                     <div class="row">
                     	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                        <h5>Betcourvitur Agencia</h5>
                            <ul class="items">
                            {section name=j loop=$enlaces_C}
                            <li>
    <a  class="foot-btn" title="{$enlaces_C[j].etiqueta_cat}" href="/contenido.php?cont={$enlaces_C[j].id_cat}">{$enlaces_C[j].nombre_cat}</a>
                            </li>
                            {/section}
                            </ul>
                        </div>
                     </div>
                   
                </div>
                 
            	<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2" align="center">
                
                    <h5>Síguenos</h5>
                    <a href="https://instagram.com/betcourvitur/"><i class="fa fa-instagram fa-2x"></i></a>
                    &nbsp;&nbsp;
                    <a href="https://twitter.com/betcourvitur/"><i class="fa fa-twitter fa-2x"></i></a>
                    &nbsp;&nbsp;
                    <a href="https://facebook.com/betcourvitur/"><i class="fa fa-facebook-official fa-2x"></i></a>
                    
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                	
<h5><i class="fa fa-home fa-lg"></i> Av. Amazona N22-49 entre calle Ramirez Davalo y Jeronimo Carrión.</h5>
                    <h5><i class="fa fa-phone fa-lg"></i></i> +593 (02) 254.9882 / +593 (98) 739.6881</h5>
                    <br>
                	<h6>Betcourvitur, S.A. Copyright &copy;2015 | Derechos Reservados</h6>
                    <h6>Programación por <a class="enlace" href="http://www.diazcreativos.net.ve" target="_blank">D&iacute;az Creativos</a></h6>
                    
                    <br>
                    <p class="pull-right"><a href="#"><i class="fa fa-arrow-circle-up fa-3x"></i></a></p>
                    
                </div>
                
            </div>
      </div>
</footer>
      <!-- Fin pie de Pagina -->
	
    {literal}
    
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/jssor.slider.mini.js"></script>
    
<script>

    jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true , $ArrowKeyNavigation: true};
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
		
		//responsive code begin
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
    });
	
	jQuery(document).ready(function ($) {
        var options = { $AutoPlay: true , $ArrowKeyNavigation: true};
        var jssor_slider2 = new $JssorSlider$('slider2_container', options);
		
		//responsive code begin
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider2.$ScaleWidth(parentWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
    });
</script>
	{/literal}
  </body>
<!-- InstanceEnd --></html>
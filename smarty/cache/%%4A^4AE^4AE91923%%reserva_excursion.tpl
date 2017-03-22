143
a:4:{s:8:"template";a:1:{s:21:"reserva_excursion.tpl";b:1;}s:9:"timestamp";i:1448461352;s:7:"expires";i:1448464952;s:13:"cache_serials";a:0:{}}<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/plantilla_auxiliar.dwt" codeOutsideHTMLIsLocked="false" -->
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
    <!-- InstanceEndEditable -->
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
              
              <a title="Seturs Viajes y Turismo" href="/index.php"><img src="/imagenes/logotipo.png" style="padding-top:7px;"></a> 
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              	{section name=i loop=$enlaces_A} 
                	{if $enlaces_A[i].enlaces neq ""}
                    	<li {if $enlaces_A[i].id_cat eq $activo}class="dropdown active" {else} class="dropdown"{/if}>
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
              <ul class="nav navbar-nav navbar-right venta">
               	<li><a  class="verde" target="_blank" title="Ventas On-Line" href="#">VENTAS ONLINE</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                	{section name=i loop=$enlaces_B}
                	<li {if $enlaces_B[i].id_cat eq $activo}class="active"{/if}><a title="{$enlaces_B[i].etiqueta_cat}" href="/contenido.php?cont={$enlaces_B[i].id_cat}">{$enlaces_B[i].nombre_cat}</a></li>
                	{/section}
                    
                    
                    
              </ul>
            </div>
            
          </div>
        </nav>
        
        
       
    
    
    <!-- Contenido -->
	<div class="container-fluid">
    
	<!-- InstanceBeginEditable name="contenido" -->
    
    <div class="container">  
       <div class="row" style="margin-top:20px;">	
            <div class="col-lg-push-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="panel panel-default panel-reserva">
                	<div class="panel-heading">
                    	<h4 align="center" class="no_margin2">Formulario para Solicitud de Reserva para Disney</h4>
                    </div>
                    <div class="panel-body">
                		
                                <div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><span class='glyphicon glyphicon-ok'></span></strong>&nbsp;Su mensaje ha sido enviado satisfactoriamente! <a href='/index.php' class='btn btn-success btn-sm pull-right'>Volver al Inicio &nbsp; <i class='fa fa-home' ></i></a></div>
                    
                    </div>
                   </div>   
                 </div>  
           		</div>
         	  </div>

     
    
    
    <!-- InstanceEndEditable -->
    <!-- Fin contenido -->
    </div>
    
    <!-- Publicidad Rotativa Agencia -->
  
    <div class="container-fluid">    
          <div class="row rotativas"> 
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                	<div id="Carousel2" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad}
                                    <li data-target="#Carousel2" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad[i].url_dir neq ""}
                                    <a title="{$publicidad[i].nombre_dir}" href="{$publicidad[i].url_dir}">
                                        <img style="width:650px;" src="/imagenes/publicidad/{$publicidad[i].directorio_dir}" alt="{$publicidad[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:650px;" src="/imagenes/publicidad/{$publicidad[i].directorio_dir}" alt="{$publicidad[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                        <a class="left carousel-control" href="#Carousel2" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#Carousel2" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        
                    </div>
                  
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                	<div id="Carousel3" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad2}
                                    <li data-target="#Carousel3" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad2}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad2[i].url_dir neq ""}
                                    <a title="{$publicidad2[i].nombre_dir}" href="{$publicidad2[i].url_dir}">
                                        <img style="width:650px;"  src="/imagenes/publicidad/{$publicidad2[i].directorio_dir}" alt="{$publicidad2[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:650px;" src="/imagenes/publicidad/{$publicidad2[i].directorio_dir}" alt="{$publicidad2[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                        <a class="left carousel-control" href="#Carousel3" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#Carousel3" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                	<div id="Carousel4" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad3}
                                    <li data-target="#Carousel4" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad3}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad3[i].url_dir neq ""}
                                    <a title="{$publicidad3[i].nombre_dir}" href="{$publicidad3[i].url_dir}">
                                        <img style="width:650px;" src="/imagenes/publicidad/{$publicidad3[i].directorio_dir}" alt="{$publicidad2[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:650px;" src="/imagenes/publicidad/{$publicidad3[i].directorio_dir}" alt="{$publicidad2[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                        <a class="left carousel-control" href="#Carousel4" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#Carousel4" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        
                    </div>
              </div>
            </div>
    	</div>
    <!-- /Fin Publicidad Rotativa Agencia -->
    
    <!-- Seccion Noticias -->
    <!--<div class="container-fluid">
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
                        <a title="Ver Noticia" href="/noticia_detalle.php?id={$noticias[i].id_not}"><img class="img-responsive opacidad" src="/imagenes/{$noticias[i].directorio_image}" alt="{$noticias[i].titulo_not}" width="600" height="600"></a>
                        </div>
                        <h5>{$noticias[i].titulo_not}</h5>
                        <p>{$noticias[i].contenido_not|truncate:140}</p>
                    </div>
                    
                    <div class="panel-footer">
                    	<a class="btn btn-default btn-block" title="{$noticias[i].titulo_not}" href="/noticia_detalle.php?id={$noticias[i].id_not}">Leer más</a>
                   </div>
                   
                </div>
            </div>
            {/section}
       </div>
    </div>-->
    <!-- /Seccion Noticias -->
     <!-- Redes Sociales -->
    <div class="container-fluid fondo_redes">
    	<div class="container">
        <div class="row">
        
        	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-default panel-facebook">
            	<div class="panel-heading" align="center">
                	<i class="fa fa-facebook-official fa-3x"></i>
                </div>
                <div class="panel-body" align="center">
            	<div class="fb-page" data-href="https://www.facebook.com/setursvenezuela/" data-tabs="timeline" data-width="150" data-height="360" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/setursvenezuela/"><a href="https://www.facebook.com/setursvenezuela/">Seturs</a></blockquote></div></div>	
               </div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
           	 <div class="panel panel-default panel-instagram">
            	<div class="panel-heading" align="center">
                	<i class="fa fa-instagram fa-3x"></i>
                 </div>
                 <div class="panel-body" align="center">
                 <!-- INSTANSIVE WIDGET -->{literal}<script src="//instansive.com/widget/js/instansive.js"></script>{/literal}<iframe src="//instansive.com/widgets/24edeba9e90b53f1771e111ae6ddb207ccf27f59.html" id="instansive_24edeba9e9" name="instansive_24edeba9e9"  scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
                </div>
            </div>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            	<div class="panel panel-default panel-twitter">
            	<div class="panel-heading" align="center">
                	<i class="fa fa-twitter fa-3x"></i>
                </div>
                <div class="panel-body">
            	<a class="twitter-timeline" href="https://twitter.com/setursvenezuela" data-widget-id="665195627542937600">Tweets por el @setursvenezuela.</a>
{literal}<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><div id="fb-root">
{/literal}
			</div>
            </div>
          </div>
            
        </div>
    </div>
    </div>
    <!-- Fin Redes Sociales -->
    
    <!-- Publicidad Empresas extras -->
    <div class="container-fluid">
    	<div class="row">
        	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 no_padding">
            
            	<div id="Carousel5" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad4}
                                    <li data-target="#Carousel5" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad4}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad4[i].url_dir neq ""}
                                    <a title="{$publicidad4[i].nombre_dir}" href="{$publicidad4[i].url_dir}">
                                        <img style="width:500px;"  src="/imagenes/publicidad/{$publicidad4[i].directorio_dir}" alt="{$publicidad4[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:500px;" src="/imagenes/publicidad/{$publicidad4[i].directorio_dir}" alt="{$publicidad4[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                        <a class="left carousel-control" href="#Carousel5" data-slide="prev">
                         <!--   <span class="glyphicon glyphicon-chevron-left"></span>-->
                        </a>
                        <a class="right carousel-control" href="#Carousel5" data-slide="next">
                          <!--  <span class="glyphicon glyphicon-chevron-right"></span>-->
                        </a>
                        
                    </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 no_padding">
            	<div id="Carousel6" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad5}
                                    <li data-target="#Carousel6" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad5}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad5[i].url_dir neq ""}
                                    <a title="{$publicidad5[i].nombre_dir}" href="{$publicidad5[i].url_dir}">
                                        <img style="width:500px;" src="/imagenes/publicidad/{$publicidad5[i].directorio_dir}" alt="{$publicidad5[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:500px;" src="/imagenes/publicidad/{$publicidad5[i].directorio_dir}" alt="{$publicidad5[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                        <a class="left carousel-control" href="#Carousel6" data-slide="prev">
                            <!--<span class="glyphicon glyphicon-chevron-left"></span>-->
                        </a>
                        <a class="right carousel-control" href="#Carousel6" data-slide="next">
                            <!--<span class="glyphicon glyphicon-chevron-right"></span>-->
                        </a>
                        
                    </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 no_padding">
            	<div id="Carousel7" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad6}
                                    <li data-target="#Carousel7" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad6}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad6[i].url_dir neq ""}
                                    <a title="{$publicidad6[i].nombre_dir}" href="{$publicidad6[i].url_dir}">
                                        <img style="width:500px;" src="/imagenes/publicidad/{$publicidad6[i].directorio_dir}" alt="{$publicidad6[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:500px;" src="/imagenes/publicidad/{$publicidad6[i].directorio_dir}" alt="{$publicidad6[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                        <a class="left carousel-control" href="#Carousel7" data-slide="prev">
                        <!-- <span class="glyphicon glyphicon-chevron-left"></span>-->
                        </a>
                        <a class="right carousel-control" href="#Carousel7" data-slide="next">
                           <!-- <span class="glyphicon glyphicon-chevron-right"></span>-->
                        </a>
                        
                    </div>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 no_padding">
        		<div id="Carousel8" class="carousel slide carousel-fade" data-ride="carousel">
        		
                        <ol class="carousel-indicators">
                              {assign var="cont" value=0}
                                  {section name=i loop=$publicidad7}
                                    <li data-target="#Carousel8" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                                  {assign var="cont" value=$cont+1}
                              {/section} 
                        </ol>
                
                        <div class="carousel-inner">
                            {assign var="cont" value=1}
                            {section name=i loop=$publicidad7}
                            <div class="item {if $cont eq 1}active{/if}" align="center">
                                {if $publicidad7[i].url_dir neq ""}
                                    <a title="{$publicidad7[i].nombre_dir}" href="{$publicidad7[i].url_dir}">
                                        <img style="width:500px;" src="/imagenes/publicidad/{$publicidad7[i].directorio_dir}" alt="{$publicidad7[i].nombre_dir}" class="img-responsive" />
                                    </a>
                                {else}
                                    <img style="width:500px;" src="/imagenes/publicidad/{$publicidad7[i].directorio_dir}" alt="{$publicidad7[i].nombre_dir}" class="img-responsive" />
                                {/if}
                            </div>
                            {assign var="cont" value=$cont+1}
                            {/section}
                        </div>
                        
                       <a class="left carousel-control" href="#Carousel8" data-slide="prev">
                         	<!--<span class="glyphicon glyphicon-chevron-left"></span>--> 
                        </a>
                        <a class="right carousel-control" href="#Carousel8" data-slide="next">
                          	<!--<span class="glyphicon glyphicon-chevron-right"></span>-->
                        </a>
                        
                    </div>
				</div>
        </div>
    </div>
     <!-- Fin Publicidad -->
    <!-- Pie de Pagina -->
   <footer>
    	<div class="container-fluid">
            <div class="row pinta1">
            
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding-top:30px;">
                
                	<div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                        <!--<h5>Menú Principal</h5>-->
                            <ul class="items">
                            {section name=j loop=$enlaces_A}
                            <li style="padding-top:7px;">
    <a  class="foot-btn" title="{$enlaces_A[j].etiqueta_cat}" href="/contenido.php?cont={$enlaces_A[j].id_cat}">{$enlaces_A[j].nombre_cat|lower|capitalize:true}</a>
                            </li>
                            {/section}
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
            	<div  class="col-xs-12 col-sm-12 col-md-4 col-lg-4" align="center">
                	<img class="img-responsive" src="/imagenes/seturs.png"/>
                </div>
                 
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" align="center" style="padding-top:30px;">
                
                   <!-- <h5>Síguenos</h5>-->
                    <a href="https://www.instagram.com/setursvenezuela/"><i class="fa fa-instagram fa-2x"></i></a>
                    &nbsp;&nbsp;
                    <a href="https://twitter.com/search?q=setursvenezuela&src=typd"><i class="fa fa-twitter fa-2x"></i></a>
                    &nbsp;&nbsp;
                    <a href="https://www.facebook.com/setursvenezuela/?fref=ts"><i class="fa fa-facebook-official fa-2x"></i></a>
                    
                </div>
            
             
                <div class="col-xs-12">
                	<p align="center" class="pull-right"><i class="fa fa-arrow-circle-up fa-2x ir-arriba"></i></p>
<h5 class="no_margin3 elemento_off" align="center"> Av. Bolivar, CCM, Local 39, Porlamar, Isla de Margarita, Edo.Nueva Esparta, Venezuela  | + 58. (295). 266.11.16 | + 58. (295).266.00.70</h5>
                    
                </div>
                
                	 
                
                
            </div>
            <div class="row pinta2">
      			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="min-height:30px; background-color:#176f2b;">
            	<h6 class="pull-left">Seturs, C.A.  |  RIF: J-40217863-8  | Todos los derechos reservados</h6>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="min-height:30px; background-color:#176f2b;">
                    <h6 class="pull-right">Programación por:&nbsp; <a class="enlace" href="http://www.diazcreativos.net.ve" target="_blank">D&iacute;az Creativos</a></h6>
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
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    
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
                      
                      
                      <script type="text/javascript">
	$(document).ready(function() {
		$("#imagen-1").hover(function(){
			
		$(this).find('img').stop().fadeTo(400, 0);
		}, function() {
			
		$(this).find('img').stop().fadeTo(400, 1);
		});	
	});	

	$(document).ready(function() {
		$("#imagen-2").hover(function(){
		
		$(this).find('img').stop().fadeTo(400, 0);
		}, function() {
		
		$(this).find('img').stop().fadeTo(400, 1);
		});	
	});	

	$(document).ready(function() {
		$("#imagen-3").hover(function(){
		
		$(this).find('img').stop().fadeTo(400, 0);
		}, function() {
		
		$(this).find('img').stop().fadeTo(400, 1);
		});	
	});	
	
	$(document).ready(function() {
		$("#imagen-4").hover(function(){
		
		$(this).find('img').stop().fadeTo(400, 0);
		}, function() {
		
		$(this).find('img').stop().fadeTo(400, 1);
		});	
	});	

</script>
                      
                      
	{/literal}
  </body>
<!-- InstanceEnd --></html>
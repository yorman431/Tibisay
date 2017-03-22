<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$accion} | Casa Marmol Piedras Naturales | Venezuela</title>
<meta name="Title" content="Casa Marmol Piedras Naturales | Venezuela" />
<meta name="Author" content="Alejandro Díaz http://www.diazcreativos.net.ve/" />
<meta name="Subject" content="Casa Marmol Piedras Naturales" />
<meta name="Description" content="Casa Marmol Piedras Naturales" />
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
		vertical: true,
        auto: 4,
		easing: 'easeOutBack',
		animation: 'slow',
		scroll: 2,
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

<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(function() {
	$('#gallery a').lightBox();
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
</head>
<body>
	<div id="encabezado"> 
  	    <div id="reloj">
        	<div id="logopequeno"><a href="index.php" title="P&aacute;gina Principal"><img src="/imagenes/logotipo.png" width="326" height="179" border="0" /></a></div>
  	    </div>
    </div>
    <div id="main_centro2">
        <div id="botonera">
          <div id="botonera_B">
   	  		<ul id="menu">
                {section name=i loop=$enlaces_B}
                    <li><a href="contenido.php?cont={$enlaces_B[i].id_cat}#next">{$enlaces_B[i].nombre_cat}</a>
                    {if $enlaces_B[i].enlaces neq ""}
                    <ul id="{$enlaces_B[i].nombre_cat}"><img class="corner_inset_left" alt="" src="/imagenes/vimeo/corner_inset_left.png"/> 
                        {section name=j loop=$enlaces_B[i].enlaces}
                            <li><a href="contenido_sub.php?cont={$enlaces_B[i].id_cat}&sub={$enlaces_B[i].enlaces[j].id_sub}#next">
                            {$enlaces_B[i].enlaces[j].nombre_sub}</a>
                            </li>
                        {/section}<img class="corner_inset_right" alt="" src="/imagenes/vimeo/corner_inset_right.png"/>
                        <li class="last">
                            <img class="corner_left" alt="" src="/imagenes/vimeo/corner_left.png"/>
                            <img class="middle" alt="" src="/imagenes/vimeo/dot.gif"/>
                            <img class="corner_right" alt="" src="/imagenes/vimeo/corner_right.png"/>
                        </li>
                    </ul>
                    {/if}
                    </li>
                {/section}
            </ul>
        </div>
        
        
    </div>
    
    <div id="contenido">
        
        <div id="cont_izquierdo">
        <div class="titulo_principal2">{$accion}</div>
          <div id="entradas2">
            {if $mensaje2 eq ""}
            {section name=i loop=$contenido}
            <div class="caja_registro3">
                {if $contenido[i].id_image neq ""}
                <div class="caja_imagen">
                <a href="#" title="{$contenido[i].nombre_image}">
            <img class="fotos opacidad" src="/admin/galeria/publica_imagen.php?id={$contenido[i].id_image}&amp;anchura=180&amp;altura=135" /></a>
                </div>
                {/if}
            	<div class="caja_contenido">
                    <div class="titulo_amarillo">
                    {$contenido[i].nombre_con}</div>
                    <div class="caja_detalles">
                    {$contenido[i].contenido_con}
                    </div>
        		</div>
                <div class="clear"></div>
            </div>
            {/section}
            {else}
            	{$mensaje2}
            {/if}
            
      	</div>
           
        </div>
        
    </div>
    
    <div id="panel_pie">
    <div id="pie">
    <div id="redes">
    	<div class="redes_icono"><a href="http://www.facebook.com/pages/CasaM%C3%A1rmol/427655037290419" title="S&iacute;guenos en Facebook" target="_blank"><img src="/imagenes/iconos_facebook.png" width="80" height="80" border="0" class="opacidad" /></a></div>
        <div class="redes_icono"><a href="http://www.twitter.com/casamarmol" title="S&iacute;guenos en Twitter" target="_blank"><img src="/imagenes/iconos_twiter.png" width="80" height="80" border="0" class="opacidad" /></a></div>
        <div class="redes_icono"><a href="#" title="S&iacute;guenos en Youtube"><img src="/imagenes/iconos_youtube.png" width="80" height="80" border="0" class="opacidad" /></a></div>
        <div class="redes_icono"><a href="http://mail.casamarmol.com.ve" title="Web Mail"><img src="/imagenes/iconos_mail.png" width="80" height="80" border="0" class="opacidad" /></a></div>
    </div>
    <div class="clear"></div>
	<div id="copy">CasaM&aacute;rmol C.A. RIF: J-29920464-1 / Copyright&copy; 2013 Todos los Derechos Reservados Venezuela<br />
      </div>
	<div id="firma">
      Dise&ntilde;o y Desarrollo: <a class="enlace" href="http://www.diazcreativos.net.ve" target="_blank"><img src="/imagenes/www.diazcreativos.net.ve.png" alt="D&iacute;az Creativos Desarrollo de P&aacute;ginas Web y Multimedia" width="30" height="30" border="0" align="middle" /> www.diazcreativos.net.ve</a></div>
    </div>
	</div>
    
 	<div class="clear"></div>
 </div><!-- Fin main centro-->
</body>
</html>
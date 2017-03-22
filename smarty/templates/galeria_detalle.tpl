<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/plantilla_padre.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    {include './layout/header.tpl'}

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
  {include './layout/botonera2.tpl'}

	<!-- InstanceBeginEditable name="contenido" -->

    <div class="container-fluid">
		    <div class="row separacion-superior">
    	<div class="col-xs-12 col-md-6 no_padding">
        	<div class="col-xs-12 no_padding no_padding2 separacion-row">
      			 <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                      {assign var="cont" value=0}
                      {section name=i loop=$fotos}
                        <li data-target="#myCarousel2" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                      {assign var="cont" value=$cont+1}
                      {/section}
                      </ol>

                  <div class="carousel-inner" role="listbox">

                  {assign var="cont" value=0}
                  {section name=i loop=$fotos}
                    <div {if $cont eq "0"}class="item active"{else}class="item"{/if}>

                      <img alt="{$fotos[i].nombre_image}" src="/imagenes/{$fotos[i].directorio_image}">

                    </div>
                  {assign var="cont" value=$cont+1}
                  {/section}

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
              <h2 class="no_margin2 color-icono" style="color:#ff6600; font-style:italic;">{$nombre}</h2>
            </div>
            <div class="col-xs-12 text-justify">
              {$descripcion}
            </div>
          </div>
        </div>
      </div>

      <div class="row separacion-row">

        	<div class="col-xs-4 col-xs-offset-4 form-horizontal" >
          	<a class="btn btn-galeria btn-block " href="#" onclick="history.back()">Back</a>
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

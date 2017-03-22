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
      
    <!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><form action="" method="post" name="form1" id="form2" onsubmit="MM_validateForm('ano','','R');return document.MM_returnValue">
                <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
                  {$mensaje2}
                  <tr>
                    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Formulario de Cotizaci&oacute;n de Cr&eacute;dito<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
                    </tr>
                  <tr>
                    <td colspan="2" align="left" class="titulo_promo">Coloque los datos necesarios para cotizar su cr&eacute;dito bancario</td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Tipo de Veh&iacute;culo:</td>
                    <td align="left" class="normalContenido"><select name="tipo" class="texto_gen" id="tipo" >
              <option {if $tipo eq "Nuevo"} selected="selected"{/if}  value="Nuevo">Nuevo</option>
              <option {if $tipo eq "Usado"} selected="selected"{/if}  value="Usado">Usado</option>
            </select>
              *</td>
                  </tr>
                  <tr>
                    <td width="183" align="left" class="subtituloWeb3">A&ntilde;o del Veh&iacute;culo:</td>
                    <td width="469" align="left" class="normalContenido"><select name="ano" class="texto_gen" id="ano" >
              <option {if $ano eq "2010"} selected="selected"{/if}  value="2010">2010</option>
              <option {if $ano eq "2011"} selected="selected"{/if}  value="2011">2011</option>
              <option {if $ano eq "2012"} selected="selected"{/if}  value="2012">2012</option>
            </select>
              *</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Valor Tentativo del Veh&iacute;culo:</td>
                    <td align="left" class="normalContenido"><input onkeypress="javascript: return validarnum(event);" value="{$valor_vehiculo}" name="valor_vehiculo" type="text" id="valor_vehiculo" size="58" /> 
                    Bs. *</td>
                    </tr>
                  
                  <tr>
                    <td align="left" class="subtituloWeb3">Valor de Inicial: <span class="adminContenido">(usado: desde el 40% inicial | nuevos: desde 30% inicial)</span></td>
                    <td align="left" class="normalContenido"><input onkeypress="javascript: return validarnum(event);" value="{$valor_inicial}" name="valor_inicial" type="text" id="valor_inicial" size="58" /> 
                      Bs. *</td>
                    </tr>
                    <tr>
                    <td align="left" class="subtituloWeb3">Plazo:</td>
                    <td align="left" class="normalContenido"><select name="plazo" class="texto_gen" id="plazo" >
              <option {if $plazo eq "24"} selected="selected"{/if}  value="24">24 meses</option>
              <option {if $plazo eq "36"} selected="selected"{/if}  value="36">36 meses</option>
              <option {if $plazo eq "48"} selected="selected"{/if}  value="48">48 meses</option>
              <option {if $plazo eq "60"} selected="selected"{/if}  value="60">60 meses</option>
            </select></td>
                    </tr>
                  <tr>
                    <td colspan="2" align="left" class="titulo_promo">Nota: El total de la inicial no incluye seguro ni gastos administrativos</td>
                  </tr>
                  <tr>
                    <td align="left" class="texto_gen3">&nbsp;</td>
                    <td align="left"><input name="envio" type="submit" id="envio" value="Calcular" /> <span class="normalContenido">(*) Datos Obligatorios</span></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            </table>
            <div class="titulo_principal2">Resultados de la Cotizaci&oacute;n</div>
              <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
            <tr>
                    <td align="left" class="subtituloWeb3">Saldo a Financiar:</td>
                    <td align="left" class="normalContenido"><input onkeypress="javascript: return validarnum(event);" value="{$saldo}" name="saldo" type="text" id="saldo" size="58" /> 
                      Bs.</td>
                    </tr>
            <tr>
                    <td width="183" align="left" class="subtituloWeb3">Comisi&oacute;n Bancaria 3%:</td>
                    <td width="469" align="left" class="normalContenido"><input readonly onkeypress="javascript: return validarletras(event);" value="{$comision}" name="comision" type="text" id="comision" size="58" />
                      Bs.</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Cuotas:<span class="adminContenido"> (*)</span></td>
                    <td align="left" class="normalContenido"><input readonly onkeypress="javascript: return validarnum(event);" value="{$cuotas format="%.3f"}" name="cuotas" type="text" id="cuotas" size="58" />
                      Bs.</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Total Monto Inicial Aproximado:</td>
                    <td align="left" class="normalContenido"><input readonly onkeypress="javascript: return validarcorreo(event);" value="{$total}" name="total" type="text" id="total" size="58" />
                      Bs.</td>
                    </tr>
                  <tr>
                    <td colspan="2" align="left" class="subtituloWeb3"><span class="adminContenido">(*) Aproximado,<span class="normalContenido"> ver con el banco ya que depende de la tasa actual del mercado.</span></span></td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">&nbsp;</td>
                    <td align="left" class="normalContenido"><a href="imprimir_cotizacion.php" title="Imprimir Cotizaci&oacute;n" target="_blank">imprimir <img src="/imagenes/imprimir.png" width="30" height="30" align="absmiddle" /></a></td>
                  </tr>
          </table>
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
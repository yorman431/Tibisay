<?php
/* Smarty version 3.1.30, created on 2017-03-29 03:23:01
  from "D:\Websites\tibisay\smarty\templates\contenido.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58db0c75005db5_69779214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '543366c99538cf7cc02178f63264208c0bc2a0ae' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\contenido.tpl',
      1 => 1490750577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./layout/header.tpl' => 1,
    'file:./layout/botonera2.tpl' => 1,
    'file:./layout/banner.tpl' => 1,
  ),
),false)) {
function content_58db0c75005db5_69779214 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1349158db0c74eea551_37972636';
?>
<!DOCTYPE html>
<html lang="es">
 <head>
   <?php $_smarty_tpl->_subTemplateRender("file:./layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 </head>
<!-- Fin Cabecera
================================================== -->
<body id="INICIO">
  <?php $_smarty_tpl->_subTemplateRender("file:./layout/botonera2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php $_smarty_tpl->_subTemplateRender("file:./layout/banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
                      <h3><?php echo $_smarty_tpl->tpl_vars['contenido']->value['nombre'];?>
</h3>
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive-imgMarginDivision">
                      <?php echo $_smarty_tpl->tpl_vars['contenido']->value['contenido'];?>

                  </div>
                  <div class="col-xs-6">
                      <div class="panel panel-default">
                          <div class="panel-body"><img src="<?php echo $_smarty_tpl->tpl_vars['contenido']->value['imagen'];?>
" alt="" class="img-responsive center-block" style="width: 100%;"></div>
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
                      <input type="text" class="form-control form-contacto" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
">
                  </div>
              </div>
              <div class="form-group no_margin">
                  <div class="col-xs-12 padding-off">
                      <input type="email" placeholder="Correo" class="form-control form-contacto" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
                  </div>
              </div>
              <div class="form-group no_margin">
                  <div class="col-xs-12 padding-off">
                      <input type="number" placeholder="Teléfono" class="form-control form-contacto" name="telefono" id="telefono" value="<?php echo $_smarty_tpl->tpl_vars['telefono']->value;?>
">
                  </div>
              </div>
              <div class="form-group no_margin">
                  <div class="col-xs-12 padding-off">
                      <textarea class="form-control form-contacto" placeholder="Comentario" name="comentario" id="comentario" rows="3"><?php echo $_smarty_tpl->tpl_vars['comentario']->value;?>
</textarea>
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
    <?php echo '<script'; ?>
 src="/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/assets/js/docs.min.js"><?php echo '</script'; ?>
>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="/assets/js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
    <!-- InstanceBeginEditable name="pie" -->
    <!-- InstanceEndEditable -->

   
  </body>
<!-- InstanceEnd --></html><?php }
}

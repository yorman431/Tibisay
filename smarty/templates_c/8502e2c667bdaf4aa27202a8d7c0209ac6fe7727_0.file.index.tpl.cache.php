<?php
/* Smarty version 3.1.30, created on 2017-03-29 05:25:44
  from "D:\Websites\tibisay\smarty\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58db29388b24d4_62778654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8502e2c667bdaf4aa27202a8d7c0209ac6fe7727' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\index.tpl',
      1 => 1490757931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./layout/header.tpl' => 1,
    'file:./layout/botonera.tpl' => 1,
    'file:./layout/banner.tpl' => 1,
  ),
),false)) {
function content_58db29388b24d4_62778654 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2817858db2937c661e5_29334018';
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

  <!-- Acotinuación se emplea clase bootstrap para hacer fixed la barra de navegación-->
  <?php $_smarty_tpl->_subTemplateRender("file:./layout/botonera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php $_smarty_tpl->_subTemplateRender("file:./layout/banner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="container-fluid">
    <div class="row HABITACIONES" id="HABITACIONES">
        <div class="col-xs-12" align="center">
          <h2 class="tituloSeccion">HABITACIONES</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/habitacion.png" alt="Habitaciones">
        </div>
        <div class="clearfix"></div>
        <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['habitacion']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong><?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_con'];?>
</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      <?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>
              <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion<?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                          <?php $_smarty_tpl->_assignInScope('cont2', 0);
?>
                          <?php
$__section_j_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen']) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total != 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                            <div <?php if ($_smarty_tpl->tpl_vars['cont2']->value == "0") {?> class="item active" <?php } else { ?> class="item" <?php }?>>
                              <img class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['nombre_image'];?>
" src="/imagenes/<?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['directorio_image'];?>
">
                            </div>
                              <?php $_smarty_tpl->_assignInScope('cont2', $_smarty_tpl->tpl_vars['cont2']->value+1);
?>
                          <?php
}
}
if ($__section_j_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_1_saved;
}
?>
                      </div>

                      <a class="left carousel-control" href="#habitacion<?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion<?php echo $_smarty_tpl->tpl_vars['habitacion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
              <div class="clearfix"></div>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value < count($_smarty_tpl->tpl_vars['habitacion']->value)) {?>
                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="col-xs-12 sepHabitacion"></div>
                <?php }?>
            </div>
          </div>
          <div class="clearfix"></div>
        <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
      </div>

    <div class="row RESERVAS" id="RESERVAS">
          <div class="col-xs-12 text-center">
              <h2 class="tituloSeccion">RESERVAS</h2>
          </div>
          <div class="col-xs-12 separacion-row">
              <img class="center-block" src="/imagenes/reservaBanda.png" alt="Reservas">
          </div>

          <div class="clearfix"></div>
            <div class="col-xs-12">
              <div class="contanier-fluid">
                <div id="formulario_reserva" class="row">
                  <form action="" name="formreservas" id="formreservastibisay" class="form-horizontal">
                      <div class="col-xs-8 col-xs-offset-2">
                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-xs-12">
                                      <h3>Solicitud de Reserva</h3>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <label for="numero_habitaciones">Seleccione Nº de Habitaciones:</label>
                                          <select class="form-control form-contacto" name="numero_habitaciones" id="numero_habitaciones" onchange="asignNumeroHabitacion();">
                                              <option selected hidden value="">Seleccione Habitación</option>
                                              <option value="1">1 Habitación</option>
                                              <option value="2">2 Habitaciones</option>
                                              <option value="3">3 Habitaciones</option>
                                              <option value="4">4 Habitaciones</option>
                                              <option value="5">5 Habitaciones</option>
                                              <option value="6">6 Habitaciones</option>
                                              <option value="7">7 Habitaciones</option>
                                              <option value="8">8 Habitaciones</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <label for="llegada">Fecha de entrada</label>
                                          <div class='input-group date' id='datetimepicker1'>
                                              <input type="text" class="form-control form-contacto" name="llegada" id="llegada" placeholder="Fecha de entrada*" value="<?php echo $_smarty_tpl->tpl_vars['llegada']->value;?>
">
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <label for="salida">Fecha de salida</label>
                                          <div class='input-group date' id='datetimepicker2'>
                                              <input type="text" class="form-control form-contacto" name="salida" id="salida" placeholder="Fecha de salida*" value="<?php echo $_smarty_tpl->tpl_vars['salida']->value;?>
">
                                              <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="modal fade" id="reservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">

                                      <div class="modal-body">
                                          <div class="row">
                                              <div class="col-xs-12 text-center titulo-modal">Informacion Personal</div>

                                              <form class="form-horizontal" action="" name="reservacion" method="post">

                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control form-contacto form-group-contacto" name="nombre" placeholder="Nombre" value="" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control form-contacto form-group-contacto" name="apellido" placeholder="Apellido" value="" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="number" class="form-control form-contacto form-group-contacto" name="telefono" placeholder="Número Telefónico" value="" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control form-contacto form-group-contacto" name="correo" placeholder="Correo Electronico" value="" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="number" class="form-control form-contacto form-group-contacto" min="18" max="90" name="edad" placeholder="Edad" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control form-contacto form-group-contacto" placeholder="Pais" name="pais" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control form-contacto form-group-contacto" placeholder="Estado" name="estado" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control form-group-contacto form-contacto" name="direccion" placeholder="Direccion" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <div class="col-xs-6 no_padding">
                                                          <button type="button" class="form-control btn btn-default" data-dismiss="modal" >Cancel</button>
                                                      </div>
                                                      <div class="col-xs-6 no_padding">
                                                          <input type="hidden" name="envio" value="Guardar">
                                                          <input type="submit" class="form-control btn btn-success" value="RESERVAR">
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div id="panel_habitacion"></div>

                          <div class="col-xs-12 text-right" id="total"></div>

                          <input name="id_hotel" id="id_hotel" type="hidden" value="1">
                      </div>
                  </form>
                </div>
              </div>
            </div>

              <a id="reserva"></a>

              <hr class="divider" />

      </div>

    <div class="row SERVICIOS" id="SERVICIOS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">SERVICIOS</h2>
        </div>
        <div class="col-xs-12" style="background: url('/imagenes/servicioBanda.png') no-repeat center; background-size: cover; height: 95px; width: 100%; margin-top: 29px;"></div>
        <div class="clearfix"></div>
        <div class="container">
          <div class="row">

            <div class="col-md-10 col-md-offset-1 col-xs-12 pills separacion-row">
              <ul class="nav nav-pills centrarNav" role="tablist">
                <li role="presentation"><a href="#gastronomia" aria-controls="gastronomia" role="tab" data-toggle="tab">LA BARCA BAR RESTAURANT</a></li>
                <li role="presentation"><a href="#gimnasio" aria-controls="gimnasio" role="tab" data-toggle="tab">GYM / ÁREA DE MASAJE</a></li>
                <li role="presentation"><a href="#peluqueria" aria-controls="peluqueria" role="tab" data-toggle="tab">SALÓN DE BELLEZA</a></li>
                <li role="presentation"><a href="#tiendas" aria-controls="tiendas" role="tab" data-toggle="tab">TIENDAS</a></li>
              </ul>
            </div>

            <div class="col-xs-12">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="gastronomia">
                    <?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gastronomia']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <?php echo $_smarty_tpl->tpl_vars['gastronomia']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                    <?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
                </div>


                <div role="tabpanel" class="tab-pane fade" id="gimnasio">
                    <?php
$__section_i_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gimnasio']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total != 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <?php echo $_smarty_tpl->tpl_vars['gimnasio']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                    <?php
}
}
if ($__section_i_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_3_saved;
}
?>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="peluqueria">
                    <?php
$__section_i_4_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['peluqueria']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_4_total = $__section_i_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_4_total != 0) {
for ($__section_i_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_4_iteration <= $__section_i_4_total; $__section_i_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <?php echo $_smarty_tpl->tpl_vars['peluqueria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                    <?php
}
}
if ($__section_i_4_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_4_saved;
}
?>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tiendas">
                    <?php
$__section_i_5_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['tiendas']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_5_total = $__section_i_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_5_total != 0) {
for ($__section_i_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_5_iteration <= $__section_i_5_total; $__section_i_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <?php echo $_smarty_tpl->tpl_vars['tiendas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                    <?php
}
}
if ($__section_i_5_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_5_saved;
}
?>
                </div>
              </div>
            </div>


        </div>
      </div>
    </div>

    <div class="row TESTIMONIO" id="TESTIMONIOS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">TESTIMONIOS</h2>
          <h2 class="tituloSeccion">COMÉNTANOS TU EXPERIENCIA</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/testimonio.png" alt="Testimonios">
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4 hidden-xs">
          <img src="/imagenes/tripadvisor1.jpg" alt="Trip Advisor Reward 2016" class="img-responsive center-block">
        </div>

        <div class="col-xs-12 visible-xs-block">
          <div id="TA_selfserveprop906" class="TA_selfserveprop">
            <ul id="ZgnhIgmWCB" class="TA_links 9gVSpH3kZ7">
              <li id="oBOmwi" class="TMSR9gu0">
                <a target="_blank" href="https://www.tripadvisor.com.ve/"><img src="https://www.tripadvisor.com.ve/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
              </li>
            </ul>
          </div>
            <?php echo '<script'; ?>
 src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=906&amp;locationId=4275246&amp;lang=es_VE&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=false&amp;border=false&amp;display_version=2"><?php echo '</script'; ?>
>
        </div>

        <div class="col-md-4 hidden-xs">
              <div id="TA_selfserveprop821" class="TA_selfserveprop">
                <ul id="pTBWv2MdeA" class="TA_links ZBL8etZ">
                  <li id="OfnFiSw" class="FXTxRsM">
                    <a target="_blank" href="https://www.tripadvisor.com.ve/"><img src="https://www.tripadvisor.com.ve/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                  </li>
                </ul>
              </div>
              <?php echo '<script'; ?>
 src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=821&amp;locationId=4275246&amp;lang=es_VE&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=true&amp;border=false&amp;display_version=2"><?php echo '</script'; ?>
>
        </div>

        <div class="col-md-4 col-xs-12">
          <img src="/imagenes/tripadvisor2.jpg" alt="" class="img-responsive center-block">
        </div>
      </div>

    <div class="row GALERIA" id="GALERIAS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">GALERIA</h2>
        </div>
        <div class="col-xs-12 separacion-row">
          <img class="center-block" src="/imagenes/galeriaBanda.png" alt="Galerias">
        </div>

        <div class="clearfix"></div>
        <div class="col-xs-12">
          <div class="container">
            <?php $_smarty_tpl->_assignInScope('cont', "0");
?>
            <div class="row">
              <?php
$__section_i_6_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_6_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['galeria']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_6_total = $__section_i_6_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_6_total != 0) {
for ($__section_i_6_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_6_iteration <= $__section_i_6_total; $__section_i_6_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value > 7) {?>
                  <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 0) {?>
                  <div class="col-md-6 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat;   background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-6.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 1) {?>
                  <div class="col-md-2 col-xs-12 no_padding" style="overflow: hidden">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 2) {?>
                  <div class="col-md-4 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-4.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 3) {?>
                  <div class="col-md-10 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-10.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 4) {?>
                  <div class="col-md-2 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 5) {?>
                  <div class="col-md-4 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-4.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 6) {?>
                  <div class="col-md-2 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cont']->value == 7) {?>
                  <div class="col-md-6 col-xs-12 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
') center no-repeat; background-size: cover;">
                      <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" data-toggle="lightbox" data-footer="<?php echo $_smarty_tpl->tpl_vars['galeria']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-6.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                <?php }?>
                <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
              <?php
}
}
if ($__section_i_6_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_6_saved;
}
?>
            </div>
          </div>
        </div>
      </div>

    <div class="row BODAS separacion-row" id="BODAS">
        <div class="col-xs-12 no_padding">
          <img class="img-responsive center-block banner" src="/imagenes/Bodas.jpg" alt="Bodas">
        </div>

        <div class="clearfix"></div>
        <?php $_smarty_tpl->_assignInScope('cont', "0");
?>
        <?php
$__section_i_7_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_7_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['boda']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_7_total = $__section_i_7_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_7_total != 0) {
for ($__section_i_7_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_7_iteration <= $__section_i_7_total; $__section_i_7_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
          <div class="col-xs-12" <?php if ($_smarty_tpl->tpl_vars['cont']->value >= 2) {?>id="visible2" style="display: none;" <?php }?>>
            <div class="container-fluid">
              <div class="row padding">
                  <?php if ($_smarty_tpl->tpl_vars['cont']->value == 0) {?>
                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-2 col-xs-12">
                            <h3 class="titulo"><?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_con'];?>
</h3>
                            <div class="col-xs-6 no_padding">
                              <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                            </div>
                            <div class="clearfix"></div>
                              <?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-xs-12">
                            <div id="boda<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner" role="listbox" style="min-height: 300px; max-height: 300px;">
                                  <?php $_smarty_tpl->_assignInScope('cont2', 0);
?>
                                  <?php
$__section_j_8_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$__section_j_8_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen']) ? count($_loop) : max(0, (int) $_loop));
$__section_j_8_total = $__section_j_8_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_8_total != 0) {
for ($__section_j_8_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_8_iteration <= $__section_j_8_total; $__section_j_8_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                                    <div <?php if ($_smarty_tpl->tpl_vars['cont2']->value == "0") {?> class="item active" <?php } else { ?> class="item" <?php }?>>
                                      <img class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['nombre_image'];?>
" src="/imagenes/<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['directorio_image'];?>
">
                                    </div>
                                      <?php $_smarty_tpl->_assignInScope('cont2', $_smarty_tpl->tpl_vars['cont2']->value+1);
?>
                                  <?php
}
}
if ($__section_j_8_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_8_saved;
}
?>
                              </div>

                              <a class="left carousel-control" href="#boda<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#boda<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <?php $_smarty_tpl->_assignInScope('cont', "1");
?>
                  <?php } else { ?>
                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-2 col-xs-12">
                            <div id="boda<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" class="carousel slide" data-ride="carousel">

                              <div class="carousel-inner" role="listbox" style="min-height: 300px; max-height: 300px;">
                                  <?php $_smarty_tpl->_assignInScope('cont2', 0);
?>
                                  <?php
$__section_j_9_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$__section_j_9_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen']) ? count($_loop) : max(0, (int) $_loop));
$__section_j_9_total = $__section_j_9_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_9_total != 0) {
for ($__section_j_9_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_9_iteration <= $__section_j_9_total; $__section_j_9_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                                    <div <?php if ($_smarty_tpl->tpl_vars['cont2']->value == "0") {?> class="item active" <?php } else { ?> class="item" <?php }?>>
                                      <img class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['nombre_image'];?>
" src="/imagenes/<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['imagen'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['directorio_image'];?>
">
                                    </div>
                                      <?php $_smarty_tpl->_assignInScope('cont2', $_smarty_tpl->tpl_vars['cont2']->value+1);
?>
                                  <?php
}
}
if ($__section_j_9_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_9_saved;
}
?>
                              </div>

                              <a class="left carousel-control" href="#boda<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#boda<?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-xs-12">
                            <h3 class="titulo"><?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_con'];?>
</h3>
                            <div class="col-xs-6 no_padding">
                              <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                            </div>
                            <div class="clearfix"></div>
                              <?php echo $_smarty_tpl->tpl_vars['boda']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

                          </div>
                        </div>
                      </div>
                    </div>
                      <?php $_smarty_tpl->_assignInScope('cont', "0");
?>
                  <?php }?>
              </div>
            </div>
          </div>
        <?php
}
}
if ($__section_i_7_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_7_saved;
}
?>
        <?php if (count($_smarty_tpl->tpl_vars['boda']->value) > 2) {?>
        <div class="container-fluid" id="mostre-todo2">
          <div class="row">
            <div class="col-xs-12 separacion-superior" align="center">
              <a class="visible btn btn-default" onclick="mostrar2()"><h4 class="no_margin2"><strong>Ver Más</strong></h4></a>
            </div>
          </div>
        </div>
          <?php }?>
      </div>

    <div id="PROMOCIONES" class="row PROMOCIONES paddingLg">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">PROMOCIONES</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/promocion.png" alt="Habitaciones">
        </div>
        <div class="clearfix"></div>

        <div class="col-xs-12">
          <div class="container-fluid">
            <div class="row">
              <?php $_smarty_tpl->_assignInScope('cont', "0");
?>
              <?php
$__section_i_10_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_10_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['promocion']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_10_total = $__section_i_10_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_10_total != 0) {
for ($__section_i_10_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_10_iteration <= $__section_i_10_total; $__section_i_10_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <div class="col-md-3 col-xs-12" <?php if ($_smarty_tpl->tpl_vars['cont']->value >= '4') {?> id="visible3" style="display:none;"<?php }?>>
                  <div class="panel panel-default panelP">
                    <div class="panel-body no_padding no_padding2">
                      <a href="/contenido.php?id=<?php echo $_smarty_tpl->tpl_vars['promocion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_con'];?>
"><img class="img-responsive center-block banner" src="/imagenes/<?php echo $_smarty_tpl->tpl_vars['promocion']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
"/></a>
                    </div>
                  </div>
                </div>
                  <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
                  <?php if (($_smarty_tpl->tpl_vars['cont']->value%4) == "0") {?>
                    <div class="clearfix"></div>
                  <?php }?>
              <?php
}
}
if ($__section_i_10_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_10_saved;
}
?>

              <?php if (count($_smarty_tpl->tpl_vars['promocion']->value) > 4) {?>
                <div class="container-fluid" id="mostre-todo3">
                  <div class="row">
                    <div class="col-xs-12 separacion-superior" align="center">
                      <a class="visible btn btn-default" onclick="mostrar3()"><h4 class="no_margin2"><strong>Ver Más</strong></h4></a>
                    </div>
                  </div>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>

    <div class="row PUBLICIDAD paddingLg">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-xs-12 separacion-superior text-center">
                  <h3 class="titulo2"><strong>CONOZCA NUESTROS ALIADOS</strong></h3>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="display:none;">
                      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
                      <?php
$__section_i_11_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_11_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['publicidad1']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_11_total = $__section_i_11_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_11_total != 0) {
for ($__section_i_11_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_11_iteration <= $__section_i_11_total; $__section_i_11_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['cont']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cont']->value == "0") {?>class="active"<?php }?>></li>
                          <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
                      <?php
}
}
if ($__section_i_11_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_11_saved;
}
?>
                  </ol>

                  <div class="carousel-inner" role="listbox">
                      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
                      <?php
$__section_i_12_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_12_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['publicidad1']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_12_total = $__section_i_12_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_12_total != 0) {
for ($__section_i_12_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_12_iteration <= $__section_i_12_total; $__section_i_12_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <div <?php if ($_smarty_tpl->tpl_vars['cont']->value == "0") {?>class="item active" <?php } else { ?> class="item" <?php }?>>
                          <img class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['publicidad1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_ban'];?>
" src="/imagenes/publicidad/<?php echo $_smarty_tpl->tpl_vars['publicidad1']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_dir'];?>
">
                        </div>
                          <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
                      <?php
}
}
if ($__section_i_12_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_12_saved;
}
?>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 separacion-superior text-center">
                  <h3 class="titulo2"><strong>CONOZCA NUESTROS HOTELES</strong></h3>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="display:none;">
                      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
                      <?php
$__section_i_13_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_13_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['publicidad1']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_13_total = $__section_i_13_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_13_total != 0) {
for ($__section_i_13_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_13_iteration <= $__section_i_13_total; $__section_i_13_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['cont']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['cont']->value == "0") {?>class="active"<?php }?>></li>
                          <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
                      <?php
}
}
if ($__section_i_13_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_13_saved;
}
?>
                  </ol>

                  <div class="carousel-inner" role="listbox">
                      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
                      <?php
$__section_i_14_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_14_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['publicidad2']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_14_total = $__section_i_14_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_14_total != 0) {
for ($__section_i_14_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_14_iteration <= $__section_i_14_total; $__section_i_14_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <div <?php if ($_smarty_tpl->tpl_vars['cont']->value == "0") {?>class="item active" <?php } else { ?> class="item"<?php }?>>
                          <img class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['publicidad2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_ban'];?>
" src="/imagenes/publicidad/<?php echo $_smarty_tpl->tpl_vars['publicidad2']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_dir'];?>
">
                        </div>
                          <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
                      <?php
}
}
if ($__section_i_14_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_14_saved;
}
?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="row EMPRESA" id="EMPRESA">
      <div class="col-xs-12 text-center">
        <h2 class="tituloSeccion">HOTEL</h2>
      </div>
      <div class="col-xs-12">
        <hr class="seccion">
        <img class="center-block relative" src="/imagenes/nosotros.png" alt="Nosotros">
      </div>
      <div class="clearfix"></div>

      <div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="container-fluid">
          <div class="row">
            <?php
$__section_i_15_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_15_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['empresa']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_15_total = $__section_i_15_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_15_total != 0) {
for ($__section_i_15_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_15_iteration <= $__section_i_15_total; $__section_i_15_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
              <h2 class="tituloSeccion text-center paddingLg"><?php echo $_smarty_tpl->tpl_vars['empresa']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_con'];?>
</h2>
              <?php echo $_smarty_tpl->tpl_vars['empresa']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contenido_con'];?>

            <?php
}
}
if ($__section_i_15_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_15_saved;
}
?>
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
 src="/assets/js/docs.min.js"><?php echo '</script'; ?>
>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="/assets/js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
    <!-- InstanceBeginEditable name="pie" -->
    

		<?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function(){
       //nos desplazamos entre todos los divs
       $('a.transicion').click(function(e){
       e.preventDefault();
          var enlace  = $(this).attr('href');
          $('html, body').animate({
              scrollTop: $(enlace).offset().top - 81
          }, 1000);
       });
      });

   <?php echo '</script'; ?>
>

   <?php echo '<script'; ?>
 type="text/javascript">
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
       event.preventDefault();
       $(this).ekkoLightbox();
     });

     $(function () {
       $('#datetimepicker1').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker2').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker9').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker10').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

     $(function () {
       $('#datetimepicker11').datetimepicker({
         format: 'DD-MM-YYYY'
       });
     });

    <?php echo '</script'; ?>
>


                <!--Acontinuacion Js de Subir al inicio -->

              <?php echo '<script'; ?>
 type="text/javascript">

                    function mostrar2(){
                        document.getElementById('visible2').style.display = 'block';
                        document.getElementById('mostre-todo2').style.display = 'none';
                    }

                    function mostrar3(){
                        document.getElementById('visible3').style.display = 'block';
                        document.getElementById('mostre-todo3').style.display = 'none';
                    }
            	<?php echo '</script'; ?>
>

              <?php echo '<script'; ?>
 type="text/javascript">

              <?php echo '</script'; ?>
>

                <?php echo '<script'; ?>
 type="text/javascript">

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
                      <?php echo '</script'; ?>
>
    



  </body>
</html>
<?php }
}

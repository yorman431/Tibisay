<!DOCTYPE html>
<div lang="es"><!-- InstanceBegin template="/Templates/plantilla_padre.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    {include './layout/header.tpl'}
  </head>
<!-- Fin Cabecera
================================================== -->
  <body id="INICIO">
  <!-- Acotinuación se emplea clase bootstrap para hacer fixed la barra de navegación-->
  {include './layout/botonera.tpl'}
      {include './layout/banner.tpl'}

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
        {section i $habitacion}
          <div class="col-xs-12">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-xs-12">
                  <div class="col-md-2 col-xs-hidden"></div>
                  <div class="col-md-10 col-xs-12 texto">
                    <h3 class="titulo"><strong>{$habitacion[i].nombre_con}</strong></h3>
                    <div class="col-xs-6 no_padding">
                      <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix"></div>
                      {$habitacion[i].contenido_con}
                    <div class="col-md-3 col-xs-4 no_padding">
                      <a href="#RESERVAS" class="btn btn-reserva text-center transicion">RESERVAR</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12">
                  <div class="col-md-10 col-xs-12">
                    <div id="habitacion{$habitacion[i].id_con}" class="carousel slide" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                          {assign var="cont2" value=0}
                          {section j $habitacion[i].imagen}
                            <div {if $cont2 eq "0"} class="item active" {else} class="item" {/if}>
                              <img class="img-responsive" alt="{$habitacion[i].imagen[j].nombre_image}" src="/imagenes/{$habitacion[i].imagen[j].directorio_image}">
                            </div>
                              {assign var="cont2" value=$cont2+1}
                          {/section}
                      </div>

                      <a class="left carousel-control" href="#habitacion{$habitacion[i].id_con}" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#habitacion{$habitacion[i].id_con}" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-hidden"></div>
                </div>
                <div class="clearfix"></div>
                {if $cont < $habitacion|@count}
                  <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
                    <div class="col-md-8 col-md-offset-2 col-xs-12 sepHabitacion">
                      <img src="/imagenes/division.png" alt="" class="img-responsive center-block">
                    </div>
                  </div>
                {else}
                  <div class="col-xs-12 sepHabitacion"></div>
                {/if}
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        {/section}
      </div>
    </div>

    <div class="container-fluid ">
      <div class="row RESERVAS" id="RESERVAS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">RESERVAS</h2>
        </div>
        <div class="col-xs-12 separacion-row">
          <img class="center-block" src="/imagenes/reservaBanda.png" alt="Reservas">
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #ccc;">
          <a class="btn btn-default btn-block" title="Reservar Hotel" href="#" onClick="mostrar_formulario_reserva();"> <i class="fa fa-calendar-check-o"></i> Solicitar Reserva</a>
        </div>

        <a id="reserva"></a>

        <hr class="divider" />

        <div id="formulario_reserva" class="row" hidden="">
          <div class="col-xs-8 col-xs-offset-2">
            <h3>Solicitud de Reserva {$nombre_hotel}</h3>

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="numero_habitaciones">Seleccione Nº de Habitaciones:</label>
                  <select class="form-control" name="numero_habitaciones" id="numero_habitaciones" onchange="asignNumeroHabitacion();">
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
                    <input type="text" class="form-control" name="llegada" id="llegada" placeholder="Fecha de entrada*" value="{$llegada}">
                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="salida">Fecha de salida</label>
                  <div class='input-group date' id='datetimepicker2'>
                    <input type="text" class="form-control" name="salida" id="salida" placeholder="Fecha de salida*" value="{$salida}">
                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
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

            <div class="col-xs-12 text-right" id="total">
            </div>

            <input name="id_hotel" id="id_hotel" type="hidden" value="{$id}">


          </div><!-- End Row -->

        </div>
      </div>
    </div>

    <div class="container-fluid ">
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
                <li role="presentation"><a href="#gastronomia" aria-controls="gastronomia" role="tab" data-toggle="tab">GASTRONOMÍA</a></li>
                <li role="presentation"><a href="#gimnasio" aria-controls="gimnasio" role="tab" data-toggle="tab">GIMNASIO</a></li>
                <li role="presentation"><a href="#peluqueria" aria-controls="peluqueria" role="tab" data-toggle="tab">PELUQUERÍA</a></li>
                <li role="presentation"><a href="#tiendas" aria-controls="tiendas" role="tab" data-toggle="tab">TIENDAS</a></li>
              </ul>
            </div>

            <div class="col-xs-12">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="gastronomia">
                    {section i $gastronomia}
                        {$gastronomia[i].contenido_con}
                    {/section}
                </div>


                <div role="tabpanel" class="tab-pane fade" id="gimnasio">
                    {section i $gimnasio}
                        {$gimnasio[i].contenido_con}
                    {/section}
                </div>

                <div role="tabpanel" class="tab-pane fade" id="peluqueria">
                    {section i $peluqueria}
                        {$peluqueria[i].contenido_con}
                    {/section}
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tiendas">
                    {section i $tiendas}
                        {$tiendas[i].contenido_con}
                    {/section}
                </div>
              </div>
            </div>


        </div>
      </div>
    </div>
    </div>

    <div class="container-fluid">
      <div class="row TESTIMONIO" id="TESTIMONIOS">
        <div class="col-xs-12 text-center">
          <h2 class="tituloSeccion">TESTIMONIOS</h2>
        </div>
        <div class="col-xs-12">
          <hr class="seccion">
          <img class="center-block relative" src="/imagenes/testimonio.png" alt="Testimonios">
        </div>
        <div class="clearfix"></div>

        <div class="col-xs-4 col-xs-offset-4">
          <div class="row">
            <div class="col-sm-12 col-md-9">
              <div id="TA_selfserveprop821" class="TA_selfserveprop">
                <ul id="pTBWv2MdeA" class="TA_links ZBL8etZ">
                  <li id="OfnFiSw" class="FXTxRsM">
                    <a target="_blank" href="https://www.tripadvisor.com.ve/"><img src="https://www.tripadvisor.com.ve/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                  </li>
                </ul>
              </div>
              {literal}<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=821&amp;locationId=4275246&amp;lang=es_VE&amp;rating=true&amp;nreviews=4&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=true&amp;border=false&amp;display_version=2"></script>{/literal}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
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
            {assign cont "0"}
            <div class="row">
              {section i $galeria}
                {if $cont > 7}
                  {assign var="cont" value= 0}
                {/if}
                {if $cont == 0}
                  <div class="col-xs-6 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat;   background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-6.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                {/if}
                {if $cont == 1}
                  <div class="col-xs-2 no_padding" style="overflow: hidden">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                {/if}
                {if $cont == 2}
                  <div class="col-xs-4 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-4.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>

                  </div>
                {/if}
                {if $cont == 3}
                  <div class="col-xs-10 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-10.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                {/if}
                {if $cont == 4}
                  <div class="col-xs-2 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                {/if}
                {if $cont == 5}
                  <div class="col-xs-4 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-4.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                {/if}
                {if $cont == 6}
                  <div class="col-xs-2 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-2.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>
                  </div>
                {/if}
                {if $cont == 7}
                  <div class="col-xs-6 no_padding" style="overflow: hidden;">
                    <div class="col-xs-12 efecto-hover" style="background: url('/imagenes/{$galeria[i].directorio_image}') center no-repeat; background-size: cover;">
                      <a href="/imagenes/{$galeria[i].directorio_image}" data-toggle="lightbox" data-footer="{$galeria[i].nombre_image}" data-gallery="GALERIA">
                        <img src="/imagenes/col-xs-6.png" alt="" class="img-responsive fullHeigh">
                      </a>
                    </div>

                  </div>
                {/if}
                {assign var="cont" value=$cont + 1}
              {/section}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row BODAS separacion-row" id="BODAS">
        <div class="col-xs-12 no_padding">
          <img class="img-responsive center-block banner" src="/imagenes/Bodas.png" alt="Bodas">
        </div>

        <div class="clearfix"></div>
        {assign var="cont" value="0"}
        {section i $boda}
          <div class="col-xs-12" {if $cont >= 2}id="visible2" style="display: none;" {/if}>
            <div class="container-fluid">
              <div class="row padding">
                  {if $cont == 0}
                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-2 col-xs-12">
                            <h3 class="titulo">{$boda[i].nombre_con}</h3>
                            <div class="col-md-4 col-xs-6 no_padding">
                              <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                            </div>
                            <div class="clearfix"></div>
                              {$boda[i].contenido_con}
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-xs-12">
                              {section j $boda[i].imagen}
                                <img class="img-responsive center-block" src="/imagenes/{$boda[i].imagen[j].directorio_image}" alt="">
                              {/section}
                          </div>
                        </div>
                      </div>
                    </div>
                      {assign var="cont" value="1"}
                  {else}
                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-2 col-xs-12">
                              {section j $boda[i].imagen}
                                <img class="img-responsive center-block" src="/imagenes/{$boda[i].imagen[j].directorio_image}" alt="">
                              {/section}
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-10 col-xs-12">
                            <h3 class="titulo">{$boda[i].nombre_con}</h3>
                            <div class="col-md-4 col-xs-6 no_padding">
                              <hr class="habitacionT"><i class="fa fa-circle habitacion2T" aria-hidden="true"></i>
                            </div>
                            <div class="clearfix"></div>
                              {$boda[i].contenido_con}
                          </div>
                        </div>
                      </div>
                    </div>
                      {assign var="cont" value="0"}
                  {/if}
              </div>
            </div>
          </div>
        {/section}
        {if $boda|@count gt 2}
        <div class="container-fluid" id="mostre-todo2">
          <div class="row">
            <div class="col-xs-12 separacion-superior" align="center">
              <a class="visible btn btn-default" onclick="mostrar2()"><h4 class="no_margin2"><strong>Ver Más</strong></h4></a>
            </div>
          </div>
        </div>
          {/if}
      </div>
    </div>

    <div class="container-fluid">
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
              {assign cont "0"}
              {section i $promocion}
                <div class="col-md-3 col-xs-12" {if $cont >= '4'} id="visible3" style="display:none;"{/if}>
                  <div class="panel panel-default panelP">
                    <div class="panel-body no_padding no_padding2"">
                      <a href="/contenido.php?id={$promocion[i].id_con}"><img class="img-responsive center-block banner" src="/imagenes/{$promocion[i].directorio_image}"/></a>
                      <div class="col-xs-12" style="min-height: 108px;">
                        <h3 style="color:#7c7201;">{$promocion[i].nombre_con}</h3>
                      </div>
                    </div>
                    <div class="panel-body no_padding" style="border-top: #cfb652 solid 1px; margin-right: -20px; margin-left: -20px;"></div>
                    <div class="panel-body" style="min-height: 301px">
                        {$promocion[i].contenido_con|truncate:280:"(...)":true}
                    </div>
                    <div class="panel-body no_padding">
                      <img src="/imagenes/divisionPromo.png" alt="" class="img-responsive imgMarginDivision">
                    </div>
                    <div class="panel-body padding-off">
                      <h4 class="text-center margin-off"><a class="btn btn-promocion" href="/contenido.php?id={$promocion[i].id_con}"><strong>VER <i class="fa fa-mail-reply fa-flip-horizontal"></i></strong></a></h4>
                    </div>
                  </div>
                </div>
                  {assign var=cont value=$cont+1}
                  {if ($cont % 4) == "0"}
                    <div class="clearfix"></div>
                  {/if}
              {/section}

              {if $promocion|@count gt 4}
                <div class="container-fluid" id="mostre-todo3">
                  <div class="row">
                    <div class="col-xs-12 separacion-superior" align="center">
                      <a class="visible btn btn-default" onclick="mostrar3()"><h4 class="no_margin2"><strong>Ver Más</strong></h4></a>
                    </div>
                  </div>
                </div>
              {/if}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row PUBLICIDAD paddingLg">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-xs-12 separacion-superior">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="display:none;">
                      {assign var="cont" value=0}
                      {section name=i loop=$publicidad1}
                        <li data-target="#myCarousel" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                          {assign var="cont" value=$cont+1}
                      {/section}
                  </ol>

                  <div class="carousel-inner" role="listbox">
                      {assign var="cont" value=0}
                      {section name=i loop=$publicidad1}
                        <div {if $cont eq "0"}class="item active" {else} class="item" {/if}>
                          <img class="img-responsive" alt="{$publicidad1[i].etiqueta_ban}" src="/imagenes/publicidad/{$publicidad1[i].directorio_dir}">
                        </div>
                          {assign var="cont" value=$cont+1}
                      {/section}
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 separacion-superior">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="display:none;">
                      {assign var="cont" value=0}
                      {section name=i loop=$publicidad1}
                        <li data-target="#myCarousel" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
                          {assign var="cont" value=$cont+1}
                      {/section}
                  </ol>

                  <div class="carousel-inner" role="listbox">
                      {assign var="cont" value=0}
                      {section name=i loop=$publicidad2}
                        <div {if $cont eq "0"}class="item active" {else} class="item"{/if}>
                          <img class="img-responsive" alt="{$publicidad2[i].etiqueta_ban}" src="/imagenes/publicidad/{$publicidad2[i].directorio_dir}">
                        </div>
                          {assign var="cont" value=$cont+1}
                      {/section}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="container-fluid">
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
            {section i $empresa}
              <h2 class="tituloSeccion text-center paddingLg">{$empresa[i].nombre_con}</h2>
              {$empresa[i].contenido_con}
            {/section}
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
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
                  <input type="text" class="form-control form-contacto" placeholder="Nombre" name="nombre" id="nombre" value="{$nombre}">
                </div>
              </div>
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off">
                  <input type="email" placeholder="Correo" class="form-control form-contacto" name="email" id="email" value="{$email}">
                </div>
              </div>
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off">
                  <input type="number" placeholder="Teléfono" class="form-control form-contacto" name="telefono" id="telefono" value="{$telefono}">
                </div>
              </div>
              <div class="form-group no_margin">
                <div class="col-xs-12 padding-off">
                  <textarea class="form-control form-contacto" placeholder="Comentario" name="comentario" id="comentario" rows="3">{$comentario}</textarea>
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
                  <i class="fa fa-envelope"></i> ventas@tibisayhotelboutique.com<br>
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
    <script src="/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- InstanceBeginEditable name="pie" -->
    {literal}

		<script type="text/javascript">
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

   </script>

   <script type="text/javascript">
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

    </script>


                <!--Acontinuacion Js de Subir al inicio -->

              <script type="text/javascript">

                    function mostrar2(){
                        document.getElementById('visible2').style.display = 'block';
                        document.getElementById('mostre-todo2').style.display = 'none';
                    }

                    function mostrar3(){
                        document.getElementById('visible3').style.display = 'block';
                        document.getElementById('mostre-todo3').style.display = 'none';
                    }
            	</script>

              <script type="text/javascript">

              </script>

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
    {/literal}



  </body>
</html>

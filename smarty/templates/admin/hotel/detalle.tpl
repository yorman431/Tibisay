<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
{include '../layout/header.tpl'}
{literal}
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&sensor=true"></script>

<script src="/src/js/jscal2.js"></script>
<script src="/src/js/lang/es.js"></script>
<link rel="stylesheet" type="text/css" href="/src/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="/src/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="/src/css/steel/steel.css" />
<link rel="stylesheet" type="text/css" href="/src/css/reduce-spacing.css" />

{/literal}
<!-- InstanceEndEditable -->

</head>  
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" background="/imagenes/fondo_admin.jpg" class="subtituloWeb3">
        {include '../layout/cabezera.tpl'}
    </td>
  </tr>
 
  <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="contenido" -->
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td width="372" align="left" valign="top" class="subtituloWeb3">
    <table width="100%" border="0" cellpadding="0" cellspacing="4">
      <tr>
        <th colspan="2" align="center">Datos Principales</th>
        </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Nombre:</td>
        <td class="adminContenido">{$nombres}
          <div style="float:right; "><a title="Editar" href="/admin/hotel/editar.php?id={$id}"> <img class="opacidad" src="/imagenes/editar.png" width="25" height="25" border="0" align="absmiddle" /></a></div></td>
      </tr>
      <tr>
    <td align="left" class="subtituloWeb3">Codigo:</td>
    <td class="adminContenido">{$codigo}</td>
    </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Categoria:</td>
    <td class="adminContenido">{$categoria} <img border="0" align="absmiddle" src="/imagenes/{$categoria}.png" width="60" /></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Tipo de Tarifa:</td>
    <td class="adminContenido">Por {$tipo}</td>
  </tr>
  <tr>
    <td width="91" align="left" valign="top" class="subtituloWeb3">Pais:</td>
    <td width="310" class="adminContenido">{$pais} <img border="0" align="absmiddle" src="/imagenes/banderas/{$bandera}.png" width="16" height="11" /></td>
    </tr>
  <tr>
    <td valign="top" align="left" class="subtituloWeb3">Estado:</td>
    <td class="adminContenido">
    	{$estado}</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Ciudad:</td>
    <td class="adminContenido">{$ciudad}</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Ubicaci&oacute;n:</td>
    <td class="adminContenido">{$ubicacion}</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Prioridad:</td>
    <td class="adminContenido">{$prioridad}</td>
  </tr>
  <tr>
    <td valign="top" align="left" class="subtituloWeb3">Condiciones:</td>
    <td class="adminContenido">{$condiciones}</td>
    </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Calves:</td>
    <td class="adminContenido">{$claves}</td>
    </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Publicar en Inicio:</td>
    <td class="adminContenido">{$principal}</td>
    </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Vistas:</td>
    <td class="adminContenido">{$vistas}</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Fecha de &Uacute;ltima Edici&oacute;n:</td>
    <td class="adminContenido">{$fecha}</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Facilidades:</td>
    <td class="adminContenido">
      {section name=i loop=$facilidad}
      <div class="fotos6">
        {if $facilidad[i].directorio_image neq ""}
        <img title="{$facilidad[i].nombre_fac}" border="0" align="absmiddle" src="/imagenes/miniaturas/{$facilidad[i].directorio_image}" class="opacidad" height="50" width="50" />
        {/if}
        </div>
      {/section}
      </td>
  </tr>
    </table></td>
    <td width="372" align="center" valign="top" class="adminContenido">
    <table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <th align="center" colspan="4">Im&aacute;genes Asignadas</th>
          </tr>
          {assign var="cont" value=0}
          {if $mensaje eq ""}
          <tr> {section name=i loop=$listado}
            <td width="25%" align="center" bgcolor="#eeeeee" class="normalContenido2">
            <div id="gallery">
            <a href="/imagenes/{$listado[i].directorio_image}" title="{$listado[i].nombre_image}" ><img border="0" src="/imagenes/miniaturas/{$listado[i].directorio_image}" class="fotos" width="100" /></a></div><br />
              {$listado[i].nombre_image} <a onclick="javascript: return confirmar('&iquest;Esta seguro que desea borrar la imagen?');" href="../galeria/imagen_borrar.php?id={$listado[i].id_image}&amp;back={$id}&amp;tabla=hotel"><img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" /></a></td>
            {assign var="cont" value=$cont+1}
            {if $cont eq 3}
            {assign var="cont" value=0} </tr>
          <tr> {/if}
            {/section} </tr>
          {else}
          {$mensaje}
          {/if}
  <tr>
    <td colspan="4" align="center"><a href="../hotel/imagen.php?id={$id}"><img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" /> Insertar Imagen</a></td>
  </tr>
        </table>
    </td>
  </tr>
  <tr>
    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Descripci&oacute;n<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td colspan="2" align="left">{$descripcion}</td>
    </tr>
  <tr>
    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Ubicaci&oacute;n en Mapa<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
    </tr>
  <tr>
    <td colspan="2" align="center">
    	{$mapas}
      <div id="map"></div>
      <br />
      </td>
  </tr>
  <tr>
    <th colspan="2" align="center"><a id="tarifas"></a><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Temporadas del {$nombres}<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
    </tr>
  {if $mensaje2 eq ""}
  <tr>
    <td colspan="2" align="center">
    	{section name=i loop=$temporadas}
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
    	      <tr>
    	        <td bgcolor="#CCCCCC" align="center"><a id="tarifas{$temporadas[i].id}"></a>{if $temporadas[i].activa eq "0"} <a onclick="javascript: return confirmar('&iquest; Seguro desea publicar &eacute;ste temporada?');" href="editar3	.php?id={$temporadas[i].id}&valor=1&back={$id}" title="Publicar"> <img src="/imagenes/no.png" width="20" height="20" border="0" /></a> {else} <a onclick="javascript: return confirmar('&iquest; Seguro desea ocultar &eacute;ste temporada?');" href="editar3.php?id={$temporadas[i].id}&valor=0&back={$id}" title="Ocultar"> <img src="/imagenes/si.png" width="20" height="20" border="0" /></a> {/if} </td>
    	        <td class="titulo_alt" colspan="6" bgcolor="#CCCCCC">
                <form action="editar_plan3.php" method="post" name="form{$temporadas[i].id}" id="form{$temporadas[i].id}">
                <strong>Temporada Del
    	          <input readonly="readonly" class="interno_fecha editar_ajax3{$temporadas[i].id}" type="text" name="desde" id="fecha_inicio{$temporadas[i].id}" value="{$temporadas[i].fecha_inicio}" />
                  <button id="f_btn1-{$temporadas[i].id}">...</button> 
{literal}
    <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "fecha_inicio{/literal}{$temporadas[i].id}{literal}",
        trigger    : "f_btn1-{/literal}{$temporadas[i].id}{literal}",
        onSelect   : function() { this.hide();
		
		$("#spinner_{/literal}{$temporadas[i].id}{literal}").show();
				$.post("editar_temporada2.php", $("#form{/literal}{$temporadas[i].id}{literal}").serialize())
				
				.done(function() {
					$("#spinner_{/literal}{$temporadas[i].id}{literal}").hide();
					console.log("esconder spinner");
				});
				
				console.log ("submit?");
				
		 },
        showTime   : false,
        dateFormat : "%d/%m/%Y"
      });
    //]]></script>{/literal}
    
    	          al
    	          <input readonly="readonly" class="interno_fecha editar_ajax3{$temporadas[i].id}" type="text" name="hasta" id="fecha_fin{$temporadas[i].id}" value="{$temporadas[i].fecha_fin}" />
                  <button id="f_btn2-{$temporadas[i].id}">...</button> 

    {literal}
    <script type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "fecha_fin{/literal}{$temporadas[i].id}{literal}",
        trigger    : "f_btn2-{/literal}{$temporadas[i].id}{literal}",
        onSelect   : function() { this.hide();
		
				$("#spinner_{/literal}{$temporadas[i].id}{literal}").show();
				$.post("editar_temporada2.php", $("#form{/literal}{$temporadas[i].id}{literal}").serialize())
				
				.done(function() {
					$("#spinner_{/literal}{$temporadas[i].id}{literal}").hide();
					console.log("esconder spinner");
				});
				
				console.log ("submit?");
		 },
        showTime   : false,
        dateFormat : "%d/%m/%Y"
      });
    //]]></script>{/literal}
    
    	          </strong> | Texto Alternativo:
    	          <input class="interno3 editar_ajax2{$temporadas[i].id}" type="text" name="alternativo" id="alternativo" value="{$temporadas[i].texto_alternativo}" />
                  
                  <input type="hidden" name="id" value="{$temporadas[i].id}" />
                  <input type="hidden" name="prioridad" value="{$temporadas[i].orden}" />
                  <input type="hidden" name="publica" value="{$temporadas[i].activa}" />
                  <input type="hidden" name="envio" value="Guardar" />
                  
                  <input type="hidden" name="desde_a" value="{$temporadas[i].edadNinosDesde1}" />
                  <input type="hidden" name="hasta_a" value="{$temporadas[i].edadNinosHasta1}" />
                  <input type="hidden" name="precio_a" value="{$temporadas[i].precio_ninos}" />
                  
                  <input type="hidden" name="desde_b" value="{$temporadas[i].edadNinosDesde2}" />
                  <input type="hidden" name="hasta_b" value="{$temporadas[i].edadNinosHasta2}" />
                  <input type="hidden" name="precio_b" value="{$temporadas[i].precio_ninos2}" />
                  
                  </form>
                  
                  
    {literal}
    <script type="text/javascript">
    $('.editar_ajax2{/literal}{$temporadas[i].id}{literal}').blur(function(event) {
		event.preventDefault();
		console.log($("#form{/literal}{$temporadas[i].id}{literal}").serialize())
		
		$("#spinner_{/literal}{$temporadas[i].id}{literal}").show();
		$.post("editar_temporada2.php", $("#form{/literal}{$temporadas[i].id}{literal}").serialize())
		
		.done(function() {
			$("#spinner_{/literal}{$temporadas[i].id}{literal}").hide();
			console.log("esconder spinner");
		});
		
		console.log ("submit?");
	});
	
    </script>
	{/literal}
    
                  </td>
                  <td bgcolor="#CCCCCC"><img id="spinner_{$temporadas[i].id}"src="/imagenes/loading_back.gif" width="25" height="24" align="absmiddle" style="display: none;" /></td>
                
    	        <td bgcolor="#CCCCCC" align="center" width="30"><a href="editar_temporada.php?id={$temporadas[i].id}" title="Editar"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    	        <td bgcolor="#CCCCCC" align="center" width="30"><a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar_temporada.php?temp={$temporadas[i].id}&id={$id}" title="Eliminar"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
  	        </tr>
            {if $temporadas[i].rangokids neq ""}
            <tr  bgcolor="#eee">
            	<td colspan="8" class="titulo_alt">
                     {section name=j loop=$temporadas[i].rangokids}
                	 {$temporadas[i].rangokids[j].etiqueta_ran} de {$temporadas[i].rangokids[j].min_ran} a {$temporadas[i].rangokids[j].max_ran} a&ntilde;os, Bs. {$temporadas[i].rangokids[j].precio_ran} |
                     {/section}
                </td>
                <td colspan="2" align="center"><a href="lista_rangos.php?temp={$temporadas[i].id}&id={$id}" title="Tarifas Niños"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
            </tr>
            {else}
            	<tr>
                	<td colspan='8' align='center' class='error'>No hay rango de tarifas de ni&ntilde;os asignadas a esta temporada!</td>
                    <td colspan="2" align="center" class='error'><a href="lista_rangos.php?temp={$temporadas[i].id}&id={$id}" title="Tarifas Niños"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
                </tr>
            {/if}
    	      <tr>
    	        <td width="10" align="center" class="subtituloWeb3">P&uacute;blico</td>
    	        <td width="20" class="subtituloWeb3">N&ordm; Adultos</td>
    	        <td width="280" class="subtituloWeb3">Habitaci&oacute;n</td>
                <td width="80" class="subtituloWeb3">R&eacute;gimen</td>
                <td width="80" class="subtituloWeb3">Tipo Tarifa</td>
    	        <td width="110" class="subtituloWeb3">Semana</td>
    	        <td width="20" class="subtituloWeb3">Orden</td>
    	        <td colspan="3" align="center" class="subtituloWeb3">Acciones</td>
  	        </tr>
    	      {if $mensaje3 eq ""}
    	      {assign var="cont" value=0}
    	      {section name=j loop=$temporadas[i].habitacion}
              
    	    <tr {if $cont eq '0'} class='listado_a'
        	{assign var='cont' value=1} 
			{else} class='listado_b'
            {assign var='cont' value=0}{/if}>
              <form action="editar_plan2.php" method="post" name="form{$temporadas[i].habitacion[j].id}" id="form{$temporadas[i].habitacion[j].id}">
    	        
    	        <td class="adminContenido" align="center"> {if $temporadas[i].habitacion[j].listar eq "0"} <a onclick="javascript: return confirmar('&iquest; Seguro desea publicar &eacute;ste registro?');" href="editar2.php?id={$temporadas[i].habitacion[j].id}&valor=1&back={$id}&ancla={$temporadas[i].id}" title="Publicar"> <img src="/imagenes/no.png" width="20" height="20" border="0" /></a> {else} <a onclick="javascript: return confirmar('&iquest; Seguro desea ocultar &eacute;ste registro?');" href="editar2.php?id={$temporadas[i].habitacion[j].id}&valor=0&back={$id}&ancla={$temporadas[i].id}" title="Ocultar"> <img src="/imagenes/si.png" width="20" height="20" border="0" /></a> {/if}
                </td>

    	        <td class="adminContenido">
                	<input onkeypress="javascript: return validarnum(event);" class="interno_corto editar_ajax{$temporadas[i].habitacion[j].id}" type="text" name="maxadultos" id="maxadultos" value="{$temporadas[i].habitacion[j].maxAdultos}" />
                </td>
                
                <td class="adminContenido">
                	<input class="interno editar_ajax{$temporadas[i].habitacion[j].id}" type="text" name="nombre_plan" id="nombre_plan" value="{$temporadas[i].habitacion[j].nombre}" />
                </td>
                
                <td class="adminContenido">
                	<select name="regimen_plan" id="regimen_plan" class="interno_select editar_ajax{$temporadas[i].habitacion[j].id}">
                        <option {if $temporadas[i].habitacion[j].regimen eq "Todo Incluido"} selected='selected'{/if} value="Todo Incluido">Todo Incluido</option>
                        <option {if $temporadas[i].habitacion[j].regimen eq "Solo Desayuno"} selected='selected'{/if} value="Solo Desayuno">Solo Desayuno</option>
                        <option {if $temporadas[i].habitacion[j].regimen eq "Desayuno Y Cena"} selected='selected'{/if} value="Desayuno Y Cena">Desayuno Y Cena</option>
                        <option {if $temporadas[i].habitacion[j].regimen eq "Pension Completa"} selected='selected'{/if} value="Pension Completa">Pensi&oacute;n Completa</option>
                  	</select>
                </td>
                
                <td class="adminContenido">
                	<select name="tipotarifa_plan" id="tipotarifa_plan" class="interno_select editar_ajax{$temporadas[i].habitacion[j].id}">
                    	<option {if $temporadas[i].habitacion[j].tipotarifa eq "Persona"} selected='selected'{/if} value="Persona">Persona</option>
                    	<option {if $temporadas[i].habitacion[j].tipotarifa eq "Habitacion"} selected='selected'{/if} value="Habitacion">Habitaci&oacute;n</option>
                    </select>
                </td>
                
    	        <td class="adminContenido">Bs.
    	          <input onkeypress="javascript: return validarnum(event);" class="interno_precio editar_ajax{$temporadas[i].habitacion[j].id}" type="text" name="precio_plan" id="precio_plan" value="{$temporadas[i].habitacion[j].precio}" />
                </td>
                
    	        <td class="adminContenido">
                	<input onkeypress="javascript: return validarnum(event);" class="interno_precio editar_ajax{$temporadas[i].habitacion[j].id}" type="text" name="prioridad" id="prioridad" value="{$temporadas[i].habitacion[j].orden}"/>
                </td>
                
    	        <td width="30" align="center">
                	<img id="spinner_{$temporadas[i].habitacion[j].id}"src="/imagenes/loading_back.gif" width="25" height="24" align="absmiddle" style="display: none;" />
                </td>
                
    	        <td width="30" align="center">
                	<a href="editar_plan.php?id={$id}&temp={$temporadas[i].habitacion[j].id}&val={$temporadas[i].id}" title="Editar"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a>
                </td>
                
    	        <td width="30" align="center">
                	<a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar_plan.php?id={$id}&temp={$temporadas[i].id}&plan={$temporadas[i].habitacion[j].id}" title="Eliminar"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a>
    	          <input type="hidden" name="id" value="{$id}" />
                  <input type="hidden" name="temporada" value="{$temporadas[i].habitacion[j].id}" />
                  <input type="hidden" name="envio" value="Guardar" />
                  <input type="hidden" name="publica" value="{$temporadas[i].habitacion[j].listar}" />
    	        </td>
              </form>
            {literal}
            <script type="text/javascript">
                $('.editar_ajax{/literal}{$temporadas[i].habitacion[j].id}{literal}').blur(function(event) {
                event.preventDefault();
                console.log($("#form{/literal}{$temporadas[i].habitacion[j].id}{literal}").serialize())
                
                $("#spinner_{/literal}{$temporadas[i].habitacion[j].id}{literal}").show();
                $.post("editar_plan2.php", $("#form{/literal}{$temporadas[i].habitacion[j].id}{literal}").serialize())
                
                .done(function() {
                    $("#spinner_{/literal}{$temporadas[i].habitacion[j].id}{literal}").hide();
                    console.log("esconder spinner");
                });
                
                //console.log ("submit?");
            });
            </script>
            {/literal}
  	        </tr> 
            
    	      {/section}
    	      {else}
    	      {$mensaje3}
    	      {/if}
              <tr bgcolor="#F2CFB1">
              <form action="insertar_plan2.php" method="post" name="form_nuevo{$temporadas[i].id}" id="form_nuevo{$temporadas[i].id}">
    	        
    	          <td align="center" class="adminContenido">
                  	<img src="/imagenes/nuevo.png" width="22" height="22" border="0" align="absmiddle" />
                  </td>

    	          <td class="adminContenido">
                	<input onkeypress="javascript: return validarnum(event);" class="interno_corto" type="text" name="maxadultos" id="maxadultos{$temporadas[i].id}" value="" placeholder="Num" />
                  </td>
                  
                  <td class="adminContenido">
                  	<input class="interno" type="text" name="nombre_plan" id="nombre_plan{$temporadas[i].id}" value="" placeholder="Nombre" />
                  </td>
                  
                  <td class="adminContenido">
                    <select name="regimen_plan" id="regimen_plan{$temporadas[i].id}" class="interno_select">
                        <option selected='selected' value="Todo Incluido">Todo Incluido</option>
                        <option value="Solo Desayuno">Solo Desayuno</option>
                        <option value="Desayuno Y Cena">Desayuno Y Cena</option>
                        <option value="Pension Completa">Pensi&oacute;n Completa</option>
                      </select>
                  </td>
                
                  <td class="adminContenido">
                      <select name="tipotarifa_plan" id="tipotarifa_plan{$temporadas[i].id}" class="interno_select">
                        <option selected='selected' value="Persona">Persona</option>
                        <option value="Habitacion">Habitaci&oacute;n</option>
                      </select>
                  </td>
                
    	          <td class="adminContenido">Bs. 
    	          	<input onkeypress="javascript: return validarnum(event);" class="interno_precio" type="text" name="precio_plan" id="precio_plan{$temporadas[i].id}" value="" placeholder="Precio" />
                  </td>
                  
    	          <td class="adminContenido"><input onkeypress="javascript: return validarnum(event);" class="interno_precio" type="text" name="prioridad" id="prioridad{$temporadas[i].id}" value="" placeholder="Num" /></td>
    	       <td width="30" align="center">
                
                <img id="spinner_{$temporadas[i]}"src="/imagenes/loading_back.gif" width="22" height="21" align="absmiddle" style="display: none;" /></td>
    	        <td width="30" align="center">
                
                <a  onclick="javascript: return validar_insertar_plan({$temporadas[i].id});" href="#tarifas{$temporadas[i].id}" title="Insertar"><img  src="/imagenes/guardar.png" width="25" height="24" border="0" /></a>
                
                </td>
    	        <td width="30" align="center"><!-- class="insertar_ajax{$temporadas[i].id}" -->
                <input type="hidden" name="id" value="{$id}" />
                  <input type="hidden" name="temporada" value="{$temporadas[i].id}" />
                  <input type="hidden" name="envio" value="Guardar" />
                  <input type="hidden" name="publica" value="1" />
                  
    	        </td>
              </form>
              {literal}
                <script type="text/javascript">
				$('.insertar_ajax{/literal}{$temporadas[i].id}{literal}').click(function(event) {
					event.preventDefault();
					console.log($("#form_nuevo{/literal}{$temporadas[i].id}{literal}").serialize())
					
					$("#spinner_{/literal}{$temporadas[i].id}{literal}").show();
					$.post("insertar_plan2.php", $("#form_nuevo{/literal}{$temporadas[i].id}{literal}").serialize())
					
					.done(function() {
						$("#spinner_{/literal}{$temporadas[i].id}{literal}").hide();
						console.log("esconder spinner");
					});
					
					//console.log ("submit?");
				});
				</script>
              {/literal}
              </tr>
  <tr>
    <td colspan="12" align="center"><a href="insertar_plan.php?id={$id}&temp={$temporadas[i].id}">Insertar Plan <img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" /></a></td>
  </tr>
  	      </table>
      {/section}
      </td>
  </tr>
  {else}
        {$mensaje2}
  {/if}
</table>
    <!-- InstanceEndEditable --></td>
  </tr>
    <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
  <td width="25%" align="center"><a href="/admin/panel_central.php">Panel <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a title="Volver" href="/admin/hotel">&nbsp;Volver <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a> &nbsp;&nbsp; <a title="Editar" href="/admin/hotel/editar.php?id={$id}">Editar <img src="/imagenes/editar.png" width="25" height="25" border="0" align="absmiddle" /></a> &nbsp;&nbsp; <a href="insertar_temporada.php?id={$id}">Insertar Temporada <img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  {include '../layout/pie.tpl'}
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

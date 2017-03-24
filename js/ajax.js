function cotizarHotelAjax(){
	var url = '/admin/hotel/cotizar_hotel.php';
	var hotel = $("#hotel").val();
	var adultos = $("#adultos").val();
	var infantes = $("#infantes").val();
	var ninos = $("#ninos").val();
	var llegada = $("#llegada").val();
	var salida = $("#salida").val();

	//console.log("hotel: " + hotel + " adultos: " + adultos + " infantes: " + infantes + " ninos: " + ninos + " llegada: " + llegada + " salida: " + salida);

	$.ajax({
		url:url,
		type:'GET',
		//contentType:false,
		data:{"hotel": hotel, "adultos": adultos, "infantes": infantes, "ninos": ninos, "llegada": llegada, "salida": salida},
		beforeSend: function(){ $("#loading2").show();},
		complete: function(){ $("#loading2").hide();}
		//processData:false,
		//cache:false
	}).success(function(r){
	    //console.log("r: ", r);
		//a = $.parseJSON('{"mmg":"12345"}');
    	datos = $.parseJSON(r);
		//console.log("parseado");
		console.log (datos);
		$('#resultado').show(); // Remove the data.
		$('#contenido tr').remove(); // Remove the data.
		var subtotal = ""; var total = ""; var comision = "";
		$.each(datos.personas, function(index, item) { // Iterates through a collection
			$('#contenido').append('<tr><td align=\'center\'>' + datos.habitacion + ' - Noches: ' + datos.noches + '</td><td align=\'center\'>' + item.tipo + '</td><td align=\'center\'>' + item.cantidad + '</td><td align=\'center\'> Bs.' + item.costo + '</td></tr>');
			subtotal = datos.subtotal;
			total = datos.total;
			comision = datos.comision;
		  });
		$("#subtotal").empty(); // Remove the data.
		$("#subtotal").append(subtotal)
		$("#comision").empty(); // Remove the data.
		$("#comision").append(comision)
		$("#total_inversion").empty(); // Remove the data.
		$("#total_inversion").append(total)
	 })
	  .error(function(a,b,c){
		  console.log("a: ", a, " b: ", b, " c: ", c);
		  console.log(a.responseText);
		  emensaje = jQuery.parseJSON(a.responseText);

	   }
	);
}


/*function cargar_tipohab(llegada, salida){
	$.ajax({
		url: url,
		type: 'POST',
		data:{
			"llegada": llegada,
			"salida": salida
		},
		success: function (data){
      $('#').append(data);
    },
    error : function(xhr, status){
      alert('Disculpe, existió un problema');
		}
	})
}*/

function asigCantidad_Ninos(cantidad, id, num){
	var cadena = "";
	if(cantidad >= 1){
		$("#"+id).empty();
		for (i=1; i<=cantidad; i++){
			cadena += '<tr><th width="30%" valign="middle">Niño '+i+' </th><td><div class="input-group date"><input type="text" class="form-control" name="nino'+i+'" id="datetimepicke'+num+i+'" placeholder="Fecha de Nacimiento*" value=""><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div><script type="text/javascript">$(function () {$(\'#datetimepicke'+num+i+'\').datetimepicker({viewMode: \'days\',format: \'DD-MM-YYYY\'});});</script></td></tr>';
		}
		$("#"+id).append(cadena);
	}else{
		$("#"+id).empty();
	}
}


function asignNumeroHabitacion(){
	var habitaciones = $("#numero_habitaciones").val();
	var llegada = $("#llegada").val();
	var salida = $("#salida").val();
	var opt = '<option selected hidden value="">Seleccione Ocupación</option>';

	if(habitaciones >= 1){
        $("#panel_habitacion").empty();
        for (var i=1; i<=habitaciones; i++){
            $("#panel_habitacion").append('<div class="panel panel-default" style="margin-bottom:15px;"><div class="panel-heading"><h4 align="center">Información Habitación '+i+'</h4></div><div class="panel-body"><form action="" method="post" name="form1" id="form'+i+'"><div class="row"><div class="col-md-4"><div class="form-group"><label for="adultos">N&deg; Adultos</label><select onchange="cargarOcupacion(this.value, \'ninos'+i+'\', \'ocupacion'+i+'\')" class="form-control" name="adultos" id="adultos'+i+'"><option value="0" selected hidden>Seleccione Cantidad</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="ocupacion">Ocupación:</label><select class="form-control" name="ocupacion" id="ocupacion'+i+'" onchange="cargar_regimen(this.value, \'regimen'+i+'\')">'+opt+'</select></div></div><div class="col-md-4"><div class="form-group"><label for="regimen">Regimen:</label><select class="form-control" name="regimen" id="regimen'+i+'"></select></div></div><div class="col-xs-12"><hr></div><div class="col-md-4"><div class="form-group"><label for="adultos">N&deg; Niños</label><select onchange="javascrip: asigCantidad_Ninos(this.value, \'cantidadNinos'+i+'\', \''+i+'\')" class="form-control" name="ninos" id="ninos'+i+'"><option selected hidden value="0">Seleccione Cantidad</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div></div><div class="col-md-8"><table class="table table-condensed table-condensed" id="cantidadNinos'+i+'"></table></div><!-- end col-md-8 --></div></form></div></div></div>');
        }
        $("#panel_habitacion").append('<div class="panel panel-default" style="margin-bottom:15px;"><div class="panel-heading"><h4 align="center">Traslado</h4></div><div class="panel-body"><form action="" method="post" name="form1" id="traslado"><div class="row"><div class="col-md-4"><div class="form-group"><label for="Tipo">Tipo:</label><select class="form-control" name="Tipo" id="TipoTrans"><option value="0" selected>Sin Traslado</option><option value="1">Solo Ida</option><option value="2">Ida y Vuelta</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="hora">Hora:</label><select class="form-control" name="hora" id="HoraTrans"><option value="5:30">5:30am</option><option value="6:00">6:00am</option><option value="6:30">6:30am</option><option value="7:00">7:00am</option><option value="7:30">7:30am</option><option value="8:00">8:00am</option><option value="8:30">8:30am</option><option value="9:00">9:00am</option><option value="9:30">9:30am</option><option value="10:00">10:00am</option><option value="10:30">10:30am</option><option value="11:00">11:00am</option><option value="11:30">11:30am</option><option value="12:00">12:00pm</option><option value="12:30">12:30pm</option><option value="13:00">1:00pm</option><option value="13:30">1:30pm</option><option value="14:00">2:00pm</option><option value="14:30">2:30pm</option><option value="15:00">3:00pm</option><option value="15:30">3:30pm</option><option value="16:00">4:00pm</option><option value="16:30">4:30pm</option><option value="17:00">5:00pm</option><option value="17:30">5:30pm</option><option value="18:00">6:00pm</option><option value="18:30">6:30pm</option><option value="19:00">7:00pm</option><option value="19:30">7:30pm</option><option value="20:00">8:00pm</option><option value="20:30">8:30pm</option><option value="21:00">9:00pm</option><option value="21:30">9:30pm</option><option value="22:00">10:00pm</option><option value="22:30">10:30pm</option><option value="23:00">11:00pm</option><option value="23:30">11:30pm</option><option value="0:00">12:00am</option><option value="0:30">12:30am</option><option value="1:00">1:00am</option><option value="1:30">1:30am</option><option value="2:00">2:00am</option><option value="2:30">2:30am</option><option value="3:00">3:00am</option><option value="3:30">3:30am</option><option value="4:00">4:00am</option><option value="4:30">4:30am</option><option value="5:00">5:00am</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="Direccion">Direccion</label><select class="form-control" name="Direccion" id="DireccionTrans"><option selected hidden>Seleccione una opcion</option><option value="1">Aeropuerto - Hotel</option><option value="2">Ferry - Hotel</option></select></div></div>');
        $("#panel_habitacion").append('<div class="form-group no_margin2"><div class="col-xs-6 no_padding"><button type="button" class="form-control btn btn-block btn-formulario" onclick="cotizar_general()">Cotizar</button></div><div class="col-xs-6 no_padding"><button type="button" class="form-control btn btn-block btn-formulario" data-toggle="modal" data-target="#reservacion">RESERVAR!</button></div></div></div>');
    }

	/*for (j=0; j<=data.length; j++){
		opcion = opcion+'<option value="'+data[j].maxAdultos+'">'+data[j].nombre+'</option>';
	}*/
}

function cargarOcupacion(maxAdultos,ninos, ocupacion){
	var llegada = $("#llegada").val();
	var Cninos = parseInt($("#"+ninos).val());
	maxAdultos = parseInt(maxAdultos);
	var pasajero = Cninos + maxAdultos;
    var hotel = $("#id_hotel").val();
    var cont = 0;
    var opt = '<option selected hidden value="">Seleccione Ocupación</option>';
	console.log('llegada: '+llegada+' Pasajeros: '+pasajero+' ocupacion: '+ocupacion+'hotel: '+hotel);
	$.ajax({
        url: 'js/ajax/ocupacion.php',
        type: 'POST',
        data:{
            hotel: hotel,
            llegada: llegada,
			pasajero: maxAdultos + Cninos
        },
        dataType: 'json',
        success: function (data) {
            while (data[cont]) {
                opt = opt + '<option value="' + data[cont].nombre + '">' + data[cont].nombre + '</option>';
                cont = cont + 1;
            }
            $("#" + ocupacion).empty();
            $("#" + ocupacion).append(opt);
        }
	})
}

function cargar_regimen(nombre, regimen){
	var hotel = $("#id_hotel").val();
	$.ajax({
		url: 'js/ajax/regimen.php',
		type: 'POST',
		data:{
			nombre: nombre,
			hotel: hotel
		},
		dataType:'html',
		success: function(data){
			$("#"+regimen).empty();
			$("#"+regimen).append(data);
		}
	})
}

function cotizar_general(){
	var hab = $("#numero_habitaciones").val();
	reiniciar();
	for(var j = 1; j <=hab; j++){
		cotizar('ocupacion'+j, 'regimen'+j, 'adultos'+j, 'ninos'+j, 'form'+j);
	}
	cotizarTraslado();
	mostrarTotal();
}

function reiniciar(){
	$.ajax({
		url: 'js/ajax/reinicio.php',
		type: 'POST',
		data: {
			mensaje: 'limpiar'
		},
		async: false, 
		dataType: 'html',
		success: function(data){
			console.log(data);
		}
	})
}

function cotizar(ocupacion, regimen, cantAdulto, ninos, formulario){
	var hotel = $("#id_hotel").val();
	var ocupacion = $("#"+ocupacion).val();
	var adultos = $("#"+cantAdulto).val();
	var regimen = $("#"+regimen).val();
	var fecha_i = $("#llegada").val();
	var fecha_s = $("#salida").val();
	var ninos = $("#"+ninos).val();
	var ninosedad2= [];
	if(ninos != "" || ninos != 0){
		for (var i=1; i<=ninos; i++){
			ninosedad2[i]= $("#"+formulario+" input[name=nino"+i+"]").val();
		}
	}

	$.ajax({
		url: 'js/ajax/cotizador.php',
		type: 'POST',
		data:{
			hotel: hotel,
			ocupacion: ocupacion,
			adultos: adultos,
			regimen: regimen,
			fecha_i: fecha_i,
			fecha_s: fecha_s,
			ninos: ninosedad2,
			cantidadNinos: ninos
		},
		dataType: 'html',
		async: false,
		success: function(data){
			console.log(data);
		}
	})
}

function cotizarTraslado(){
	tipo= $("#TipoTrans").val();
	hora= $("#HoraTrans").val();
	direccion= $("#DireccionTrans").val();
	hotel = $("#id_hotel").val();
	$.ajax({
		url: 'js/ajax/cotizarTrans.php',
		type: 'POST',
		data:{
			direccion: direccion,
			tipo: tipo,
			hora: hora,
			hotel: hotel
		},
		async: false,
		dataType: 'html',
		success: function(data){
			console.log(data);
		}
	})
}

function mostrarTotal(){
	$.ajax({
		url: 'js/ajax/mostrarTotal.php',
		type: 'POST',
		async: false,
		dataType: 'html',
		success: function(data){
			$('#total').empty();
			$('#total').append('<p style="font-size: 16px; font-weight:bolder;">Total Bs.: '+data+'</p>');
		}
	})
}
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

function asigCantidad_Ninos(cantidad, id, idHab){
	var cadena = "";
	if(cantidad >= 1){
		$("#"+id).empty();
		for (var i=1; i<=cantidad; i++){
			cadena += '<tr><th width="30%" valign="middle" style="color: #fff; font: 20px \'Century Gothic\';">Niño '+i+' </th><td><div class="input-group date"><input type="text" class="form-control form-contacto" name="nino'+i+'" id="datetimepicke'+idHab+i+'" placeholder="Fecha de Nacimiento*" value=""><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div><script type="text/javascript">$(function () {$(\'#datetimepicke'+idHab+i+'\').datetimepicker({viewMode: \'days\',format: \'DD-MM-YYYY\'});});</script></td></tr>';
		}
		$("#"+id).append(cadena);
	}else{
		$("#"+id).empty();
	}

	cargarOcupacion(idHab);
}


function asignNumeroHabitacion(){
	var habitaciones = $("#numero_habitaciones").val();
	var llegada = $("#llegada").val();
	var salida = $("#salida").val();
	var opt = '<option selected hidden value="">Seleccione Ocupación</option>';

	if(habitaciones >= 1){
        $("#panel_habitacion").empty();
        for (var i=1; i<=habitaciones; i++){
            $("#panel_habitacion").append('<div class="panel panel-default" style="margin-bottom:15px;"><div class="panel-body"><h3 align="center">Información Habitación '+i+'</h3></div><div class="panel-body"><form action="" method="post" name="form1" id="form'+i+'"><div class="row"><div class="col-md-4"><div class="form-group"><label for="adultos">N&deg; Adultos</label><select onchange="cargarninos(this.value, '+i+')" class="form-control form-contacto" name="adultos" id="adultos'+i+'"><option value="0" selected hidden>Seleccione Cantidad</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="ocupacion">Ocupación:</label><select class="form-control form-contacto" name="ocupacion" id="ocupacion'+i+'" onchange="cargar_regimen(this.value, \'regimen'+i+'\')">'+opt+'</select></div></div><div class="col-md-4"><div class="form-group"><label for="regimen">Regimen:</label><select class="form-control form-contacto" name="regimen" id="regimen'+i+'"></select></div></div><div class="col-xs-12"><hr></div><div class="col-md-4"><div class="form-group"><label for="adultos">N&deg; Niños</label><select onchange="asigCantidad_Ninos(this.value, \'cantidadNinos'+i+'\', \''+i+'\')" class="form-control form-contacto" name="ninos" id="ninos'+i+'"><option selected hidden value="-1">Requiere Adulto</option></select></div></div><div class="col-md-8"><table class="table table-condensed table-condensed" id="cantidadNinos'+i+'"></table></div><!-- end col-md-8 --></div></form></div></div></div>');
        }
        $("#panel_habitacion").append('<div class="col-xs-6 no_padding"><div class="form-group"><button type="button" class="form-control btn btn-block btn-default2" onclick="cotizar_general()">Cotizar</button></div></div><div class="col-xs-6 no_padding"><div class="form-group"><button type="button" class="form-control btn btn-block btn-default2" data-toggle="modal" data-target="#reservacion">RESERVAR!</button></div></div>');
    }

	/*for (j=0; j<=data.length; j++){
		opcion = opcion+'<option value="'+data[j].maxAdultos+'">'+data[j].nombre+'</option>';
	}*/
}


function cargarninos(adultos, idHab) {
    var maxNinos = 4 - adultos;
    var opt;

    opt = '<option selected hidden value="0">Cantidad de Niños</option>';

    for (var i = 0; i <= maxNinos; i++){
        opt = opt + '<option value="'+i+'">'+i+'</option>';
    }

    $("#ninos" + idHab).empty();
    $("#ninos" + idHab).append(opt);

    cargarOcupacion(idHab);
}

function cargarOcupacion(idHab){

	var hotel = $("#id_hotel").val();
    var llegada = $("#llegada").val();
    var Cninos = parseInt($("#ninos"+idHab).val());
    var adultos = parseInt($("#adultos" + idHab).val());
    var pasajero = Cninos + adultos;

    console.log('Habitacion N: '+idHab+' adultos: '+adultos+' Niños: '+Cninos+' Pasajeros: '+pasajero);

    var cont = 0;

    var opt = '<option selected hidden value="">Seleccione Ocupación</option>';

	$.ajax({
        url: 'js/ajax/ocupacion.php',
        type: 'POST',
        data:{
            hotel: hotel,
            llegada: llegada,
            pasajero: pasajero
        },
        dataType: 'json',
        success: function (data) {
            while (data[cont]) {
                opt = opt + '<option value="' + data[cont].nombre + '">' + data[cont].nombre + '</option>';
                cont = cont + 1;
            }
            $("#ocupacion" + idHab).empty();
            $("#ocupacion" + idHab).append(opt);
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
/*$(document).ready(function()
    {
         $("#btn_ajax").click(function(){
          var url = "validar_reserva.php"; // El script a dónde se realizará la petición.
         
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario_reserva").serialize(),
           success: function(data)
           {
               $("#nombre").html('');
               $("#tipo").html('');
               $("#email").html('');
               $("#cedula").html('');
               $("#telefono").html('');
               $("#fecha_ida").html('');
               $("#adultos").html('');
               $("#ninos").html('');
               $("#edades").html('');
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
            
           });
          
           return false;
      });
  });*/

$(document).on('ready',funcPrincipal);

function funcPrincipal(){
    $('#formulario_reserva').on('submit',ejecutarAjax);
}

function ejecutarAjax(event){

  var datosEnviados =
  {
    
        'tipo' : $('#tipo').val,
      'cedula' : $('#cedula').val,
      'nombre' : $('#nombre').val,
    'telefono' : $('#telefono').val,
       'email' : $('#email').val,
   'fecha_ida' : $('#fecha_ida').val,
     'adultos' : $('#adultos').val,
       'ninos' : $('#ninos').val,
      'edades' : $('#edades').val

  }
    $.ajax({

           type: 'POST',
           url: 'catalogo_detalle.php',
           dataType: 'json',
           data:datosEnviados,
           encode: true
          })
    .done(function(datos){
        if(datos.exito)
          alert(datos.mensaje);//cambiar por alert danger
        else{

          if(datos.errores.tipo)
            alert(datos.errores.tipo);
          if(datos.errores.cedula)
            alert(datos.errores.cedula);
          if(datos.errores.nombre)
            alert(datos.errores.nombre);
          if(datos.errores.telefono)
            alert(datos.errores.telefono);
          if(datos.errores.mail)
            alert(datos.errores.mail);
          if(datos.errores.fecha_ida)
            alert(datos.errores.fecha_ida);
          if(datos.errores.adultos)
            alert(datos.errores.adultos);
          if(datos.errores.ninos)
            alert(datos.errores.ninos);
          if(datos.errores.edades)
            alert(datos.errores.edades);

        }



    });
    event.preventDefault();
}
function buscar_excursion(){
  var url = '/validar_reserva.php';  
  var fecha = $("#fecha").val();
  var cedula = $("#cedula").val();
  var nombre = $("#nombre").val();
  var telefono = $("#telefono").val();
  var email = $("#email").val();
  var fecha_ida = $("#fecha_ida").val();
  var fecha_vuelta = $("#fecha_vuelta").val();
  var adultos = $("#adultos").val;
  var ninos = $("#ninos").val;
  var edades =$("#edades").val
  $.ajax({
    url:url, 
    type:'POST', 
    //contentType:false,
    data:{"fecha": fecha,"cedula": cedula,"nombre": nombre,"telefono": telefono,"email":email,"fecha_ida":fecha_ida,"fecha_vuelta":fecha_vuelta,"adultos":adultos,"ninos":ninos,"edades":edades,"comentario":comentario}, 
    beforeSend: function(){ $("#loading").show();},
    complete: function(){ $("#loading").hide();}
    //processData:false, 
    //cache:false
  }).success(function(r){ 
      datos = $.parseJSON(r);
    //console.log(datos);
    $('#zarpe_buscar').show(); // Remove the data.
    $("#zarpe option").remove(); // Remove all <option> child tags.
      $.each(datos,function(index, item) {
      $("#cedula").append( // Append an object to the inside of the select box
        $("<input></input>") // Yes you can do this.
        .text(item.cedula + " " + item.cedula)
        .val(item.cedula)
      );
    });
    buscar_reserva();
     })
    .error(function(a,b,c){
      emensaje = jQuery.parseJSON(a.responseText);
      alert(emensaje.top);
    
     }
  );  
}
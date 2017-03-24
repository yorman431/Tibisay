// JavaScript Document// JavaScript Document

function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@'); p=val.indexOf('.');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe contener una dirección de e-mail válida.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' debe contener un número.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' debe contener un número entre '+min+' y '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es requerido.\n'; }
    } if (errors) alert('Los siguientes errores han ocurrido:\n'+errors);
    document.MM_returnValue = (errors == '');
} }

function validarnum(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==0 || tecla==9 || tecla==13) return true;
	
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validarletras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==0 || tecla==9 || tecla==13) return true;
    patron =/[A-Za-zñÑíáíóúéÁÉÍÓÚ\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validarletrasnum(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==0 || tecla==9 || tecla==13) return true;
    patron = /[A-Za-zñÑíáíóúéÁÉÍÓÚ\s\d]/; 
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validarletrasnum2(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==0 || tecla==9 || tecla==13) return true;
    patron = /[A-Za-zñÑíáíóúéÁÉÍÓÚ.-_\s\d]/; 
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function validarcorreo(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==0 || tecla==9 || tecla==13) return true;
    patron =/[a-z.@-_-\s\d]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function confirmar(mensaje){
	if (!confirm(mensaje)){
	 	return false;
	}else{
    	return true; 
	}
}

function validarnoticia(mensaje){
	if (document.form1.categoria.value==""){
		alert("Para poder hacer el envío, debe seleccionar una Categoría");
	 	return false;
	}
	if (document.form1.titulo.value==""){
		alert("Para poder hacer el envío, debe insertar un Título!");
	 	return false;
	}
	if (document.form1.subtitulo.value==""){
		alert("Para poder hacer el envío, debe insertar un Subtítulo!");
	 	return false;
	}
	if (document.form1.fecha.value==""){
		alert("Para poder hacer el envío, debe seleccionar una Fecha!");
	 	return false;
	}
	if (document.form1.autor.value==""){
		alert("Para poder hacer el envío, debe insertar un Autor!");
	 	return false;
	}
	
	var editor = CKEDITOR.instances['contenido'].getData().replace(/<[^>]*>/gi, '');
    if (!editor.length){
    	alert("Para poder hacer el envío, debe insertar un Contenido a la Noticia!");
		return false;
    }

	return confirmar(mensaje);
}

function validarevento(mensaje){
	if (document.form1.categoria.value==""){
		alert("Para poder hacer el envío, debe seleccionar una Categoría");
	 	return false;
	}
	
	if (document.form1.nombre.value==""){
		alert("Para poder hacer el envío, debe insertar un Autor!");
	 	return false;
	}
	
	var editor = CKEDITOR.instances['contenido'].getData().replace(/<[^>]*>/gi, '');
    if (!editor.length){
    	alert("Para poder hacer el envío, debe insertar un Contenido a la Noticia!");
		return false;
    }

	return confirmar(mensaje);
}

function validarcombos(){
	if (document.form1.categoria.value=="" || document.form1.subcategoria.value==""){
	alert("Para poder hacer el envío, debe seleccionar una categoría y una subcategoría");
	 return false;
	}
	return confirmar('¿Está seguro que desea guardar?');
}

function validarcontenido(mensaje){
	
	if (document.form1.enlace.value==0){
		alert("Para poder hacer el envío, debe seleccionar una categoría");
	 	return false;
	}
	
	var editor = CKEDITOR.instances['contenido'].getData().replace(/<[^>]*>/gi, '');
    if (!editor.length){
    	alert("Para poder hacer el envío, debe llenar el Contenido!");
		return false;
    }

	return confirmar(mensaje);
}

function validarbanner(mensaje){
	
	var editor = CKEDITOR.instances['contenido'].getData().replace(/<[^>]*>/gi, '');
    if (!editor.length){
    	alert("Para poder hacer el envío, debe llenar el Contenido!");
		return false;
    }

	return confirmar(mensaje);
}

function validardocumento(mensaje){
	
	if (document.form1.categoria.value==""){
		alert("Para poder hacer el envío, debe seleccionar una categoría");
	 	return false;
	}
	
	var editor = CKEDITOR.instances['contenido'].getData().replace(/<[^>]*>/gi, '');
    if (!editor.length){
    	alert("Para poder hacer el envío, debe llenar el Contenido!");
		return false;
    }

	return confirmar(mensaje);
}


function validarcombos3(){
	if (document.form1.estado.value==""){
		alert("Para poder hacer el envío, debe seleccionar un estado");
	 	return false;
	}
	
	if (document.form1.municipio.value==""){
		alert("Para poder hacer el envío, debe seleccionar un municipio");
	 	return false;
	}
	
	if (document.form1.No.checked==true){
		alert("Para poder hacer el envío, debe aceptar los terminos y condiciones!");
		return false;
	}else if (document.form1.Si.checked==true){
    	return true; 
	}
	
	return confirmar('¿Está seguro que desea guardar?');
}

function validar_pago(){
	if (document.form1.pedido.value==""){
		alert("Para poder hacer el envío, debe seleccionar un pedido, si no tiene debe generar uno!");
	 	return false;
	}

	return confirmar('¿Está seguro que desea guardar?');
}

function validarperfil(){
	if (document.form1.estado.value==""){
		alert("Para poder hacer el envío, debe seleccionar un estado");
	 	return false;
	}
	
	if (document.form1.municipio.value==""){
		alert("Para poder hacer el envío, debe seleccionar un municipio");
	 	return false;
	}
	
	return confirmar('¿Está seguro que desea guardar?');
}

function mostrarImagenes() {
/** recolocar indica que se recoloque el documento **/
/** si no recolocamos, solo ocultamos las imágenes **/
	document.imagen1.className = "imagen";
   /**document.imagen1.style.visibility = "visible"; **/
  
}

function ocultarImagenes(recolocar) {

/** recolocar indica que se recoloque el documento **/
/** si no recolocamos, solo ocultamos las imágenes **/
	document.imagen1.className = "imagenNO";
    /**document.imagen1.style.visibility = "hidden"; **/
  
}

function borrar(){

	document.form1.buscar.value = "";
	ocultarImagenes();
}

function validarenter(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13) return false;
	else return true;
}

function contar_palabras(num,e){
	if(validarenter(e)){
		var cadena=document.form1.contenido.value;
		var valor=cadena.split(" ");
		var resta=num-valor.length;
		var temp="";
		document.form1.valores.value=resta;
		if(valor.length>num){
			alert("Disculpe! solo se permiten una cantidad de " +num+ " palabras.");
			for(i=0;i<=num-2; i++){
				temp=temp+valor[i]+" ";
			}
			document.form1.contenido.value=temp; 
			document.form1.valores.value=0;
		}
		return(resta);
	}else{
		return false;
	}
}


function terminos(){
	if (document.form1.No.checked==true){
	alert("Para poder hacer el envío, debe aceptar los terminos y condiciones!");
	 return false;
	}else if (document.form1.Si.checked==true){
    	return true; 
	}
}

function verificarmonto(){
	if (document.form1.No.checked==true){
	alert("Para poder hacer el envío, debe aceptar los terminos y condiciones!");
	 return false;
	}else if (document.form1.Si.checked==true){
    	return true; 
	}
}

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

function itemLoadCallbackFunction(carousel, state)
{
    for (var i = carousel.first; i <= carousel.last; i++) {
        // Check if the item already exists
        if (!carousel.has(i)) {
            // Add the item
            carousel.add(i, "I'm item #" + i);
        }
    }
}; 

function validarformulario(){
	if (document.form2.nombre.value==""){
		alert("Para enviar, debe colocar su nombre");
	 	return false;
	}
	if (document.form2.email.value==""){
		alert("Para enviar, por favor coloque un correo Valido");
	 	return false;
	}
	
	if (document.form2.telefono.value==""){
		alert("Para enviar, por favor coloque un telefono valido");
	 	return false;
	}
	
	if (document.form2.comentario.value==""){
		alert("Para enviar, por favor no olvide su comentario o solicitud");
	 	return false;
	}
	document.form2.submit();
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function validar_insertar_plan(formulario){
	if(document.getElementById('maxadultos'+formulario).value == ""){
		alert("Para poder hacer el envío, debe insertar el máximo de adultos");
	 	return false;
	}
	
	if(document.getElementById('nombre_plan'+formulario).value == ""){
		alert("Para poder hacer el envío, debe insertar el nombre del plan");
	 	return false;
	}
	
	if(document.getElementById('descripcion_plan'+formulario).value == ""){
		alert("Para poder hacer el envío, debe insertar una breve descripción");
	 	return false;
	}
	
	if(document.getElementById('precio_plan'+formulario).value == ""){
		alert("Para poder hacer el envío, debe insertar el precio");
	 	return false;
	}
	
	if(document.getElementById('prioridad'+formulario).value == ""){
		alert("Para poder hacer el envío, debe insertar numero para ordenar");
	 	return false;
	}
	
	document.getElementById('form_nuevo'+formulario).submit();
}

function validar_insertar_rango(){
	
	if(document.getElementById('categoria_nuevo').value == ""){
		alert("Para poder continuar, debe seleccionar una categoría");
	 	return false;
	}
	
	if(document.getElementById('desde_nuevo').value == ""){
		alert("Para poder continuar, debe insertar edad min");
	 	return false;
	}
	
	if(document.getElementById('hasta_nuevo').value == ""){
		alert("Para poder continuar, debe insertar edad max");
	 	return false;
	}
	
	if(document.getElementById('tipo_nuevo').value == ""){
		alert("Para poder continuar, debe seleccionar el tipo");
	 	return false;
	}
	
	if(document.getElementById('precio_nuevo').value == ""){
		alert("Para poder hacer el envío, debe insertar una tarifa");
	 	return false;
	}
	
	document.getElementById('form_nuevo').submit();
}

function mostrar_formulario_reserva(){
	$('#formulario_reserva').show();
	$('html, body').animate({
		scrollTop: $("#reserva").offset().top
	}, 900);
}

function OpenNewWindow(mypage,w,h,myname){
	var win= null;
	var winl = (screen.width-w)/2;
	var wint = (screen.height-h)/2;
	settings='height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars=no,toolbar=no,location=no,status=no,menubar=no,resizable=no,dependent=no'
win=window.open(mypage,myname,settings)
if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
}

function seleccionar_mapa(){
	OpenNewWindow("seleccionar_mapa.php",580,580,"Mapa Google");
}


function pasarvalor(){
	latitud=document.getElementById('latitud');
	longitud=document.getElementById('longitud');
	window.opener.document.form1.latitud.value = latitud.value;
	window.opener.document.form1.longitud.value = longitud.value;
	
	window.close();
}
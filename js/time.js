// JavaScript Document
 var RelojID12 = null  
 var RelojEjecutandose12 = false  
   
 function DetenerReloj12 () {  
     if(RelojEjecutandose12)  
         clearTimeout(RelojID12)  
     RelojEjecutandose12 = false  
 }  
   
 function MostrarHora12 () {  
     NombDiaSemana = new Array ("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
	 NombMes = new Array ("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","Diciembre");
     var ahora = new Date()  
	 //Fecha
	 var NumDiaSemana = ahora.getDay()
	 var NumMes = ahora.getMonth()
	 var Dia = ahora.getDate();
	 var Ano = ahora.getFullYear()
	 var Fecha = NombDiaSemana[NumDiaSemana]+", " + Dia + " de " + NombMes[NumMes] + " de " + Ano + " | "
	 //Hora
     var horas = ahora.getHours()  
     var minutos = ahora.getMinutes()  
     var segundos = ahora.getSeconds()  
     var meridiano = ""  
     
     //ajusta las horas  
     if (horas ==00)
	     horas = 12
	 
	 if (horas > 12) {  
         horas -= 12
         meridiano = " p.m."  
     } else {  
		        meridiano = " a.m."  
         }  
               
     //establece las horas  
     if (horas < 10)  
         ValorHora = "0" + horas  
     else  
         ValorHora = "" + horas  
   
     //establece los minutos  
     if (minutos < 10)  
         ValorHora += ":0" + minutos  
     else  
         ValorHora += ":" + minutos  
               
     //establece los segundos  
     if (segundos < 10)  
         ValorHora += ":0" + segundos  
     else  
         ValorHora += ":" + segundos  
           
     ValorHora += meridiano  
	 Fecha += ValorHora
	 DivAviso=document.getElementById("tiempo");
	 DivAviso.innerHTML=Fecha+"&nbsp;&nbsp;";
   
     //si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta  
     //window.status = ValorHora  
   
     RelojID12 = setTimeout("MostrarHora12()",1000)  
     RelojEjecutandose12 = true  
 }  
   
 function IniciarReloj12 () {  
     DetenerReloj12()  
     MostrarHora12()  
 }  
  
 window.onload = IniciarReloj12;  
 if (document.captureEvents) {           //N4 requiere invocar la funcion captureEvents  
     document.captureEvents(Event.LOAD)  
 }
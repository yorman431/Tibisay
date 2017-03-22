<html>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<head>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	body{
		background:none;
	}
  div#mapita {
    position: relative;
  }

  div#crosshair {
    position: absolute;
    top: 176px;
    height: 41px;
    width: 41px;
    left: 50%;
    margin-left: -20px;
    display: block;
    background: url(/imagenes/crosshair.png);
    background-position: center center;
    background-repeat: no-repeat;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVxneJvAvJX-Sq2MSDctzNlre7mDMwdI8" type="text/javascript"></script>
<script type="text/javascript" src="/js/validar.js"></script>
<script type="text/javascript">
  var map;
  var geocoder;
  var centerChangedLast;
  var reverseGeocodedLast;
  var currentReverseGeocodeResponse;

  function initialize() {
    var latlng = new google.maps.LatLng(10.992424,-64.089535);
    var myOptions = {
      zoom: 11,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();


    setupEvents();
    centerChanged();
  }

  function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();

    setInterval(function() {
      if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    }, 1000);

    google.maps.event.addListener(map, 'zoom_changed', function() {
      document.getElementById("zoom_level").innerHTML = map.getZoom();
    });

    google.maps.event.addListener(map, 'center_changed', centerChanged);

    google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
       map.setZoom(map.getZoom() + 1);
    });

  }

  function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }

  function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    document.getElementById('latlng').innerHTML = latlng;
    document.getElementById('formatedAddress').innerHTML = '';
	
	document.getElementById('latitud').value = map.getCenter().lat();
	document.getElementById('longitud').value = map.getCenter().lng();
    currentReverseGeocodeResponse = null;
  }

  function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
  }

  function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status == 'OK') {
      if(results.length == 0) {
        document.getElementById('formatedAddress').innerHTML = 'None';
      } else {
        document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
      }
    } else {
      document.getElementById('formatedAddress').innerHTML = 'Error';
    }
  }


  function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
      'address': address,
      'partialmatch': true}, geocodeResult);
  }

  function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }
  }

  function addMarkerAtCenter() {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map
    });

    var text = 'Lat/Lng: ' + getCenterLatLngText();
    if(currentReverseGeocodeResponse) {
      var addr = '';
      if(currentReverseGeocodeResponse.size == 0) {
        addr = 'None';
      } else {
        addr = currentReverseGeocodeResponse[0].formatted_address;
      }
      text = text + '<br>' + 'address: <br>' + addr;
    }

    var infowindow = new google.maps.InfoWindow({ content: text });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }

</script>
</head>
<body onLoad="initialize()">
  <div class="alerta2 titulo_promo">Coloque el Hotel dentro del C&iacute;rculo</div>
  <span class="titulo_promo">Buscar Lugares: <input type="text" id="address"/><input type="button" value="Ir" onClick="geocode()"><input type="button" value="Agregar un Marcador Central" onClick="addMarkerAtCenter()"/></span>
  <div id="mapita">
    <div id="map_canvas" style="width:100%; height:400px"></div>
    <div id="crosshair"></div>
  </div>

  <table cellpadding="0" width="96%">
  	<input id="latitud" name="latitud" type="hidden" value="">
    <input id="longitud" name="longitud" type="hidden" value="">
    <tr><td class="titulo_alt" width="20%">Lat/Lng:</td><td width="80%"><div class="titulo_promo" id="latlng"></div></td></tr>
    <tr><td class="titulo_alt">Direcci&oacute;n:</td><td><div class="titulo_promo" id="formatedAddress"></div></td></tr>
    <tr><td class="titulo_alt">Nivel de Zoom:</td><td><div class="titulo_promo" id="zoom_level">2</div></td></tr>
    <tr><td colspan="2" align="right"><a onClick="javascript: return pasarvalor(); return false;" href="#" title="Seleccionar Datos"><span class="boton_seleccionar"></span></a></td></tr>
  </table>
</body>
</html>
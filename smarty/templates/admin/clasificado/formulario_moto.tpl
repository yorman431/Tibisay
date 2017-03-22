<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" /> 
<title>Marinart | Panel Administrativo</title>
<link href="/css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/imagenes/favicon.ico"> 

<script type="text/javascript" language="javascript" src="/js/validar.js"></script>
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- InstanceBeginEditable name="head" -->
{literal}
<link rel="stylesheet" type="text/css" media="all" href="/calendario/calendar-blue.css" title="blue" />
<script type="text/javascript" src="/calendario/calendar.js"></script>
<script type="text/javascript" src="/calendario/lang/calendar-en.js"></script>
<script type="text/javascript" src="/calendario/calendar-setup.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	window.onload = function()
	{
		CKEDITOR.replace( 'contenido',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]
 
    		}
		);
	};
</script>
	
{/literal}
<!-- InstanceEndEditable -->
</head>  
<body>  
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" class="subtituloWeb3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="42%"><img src="/imagenes/logo.jpg" style="padding-left:5px"/> </td>  
          <td width="56%" align="right" valign="middle" class="normalContenido">Panel Central de Utilidades -        <span class="sub_usuario">Usuario:</span> {$nombre} {$apellido} <img src="/imagenes/user.png" width="30" height="30" align="absmiddle" />
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="597" height="48">
              <param name="movie" value="/swf/redes_hora.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
              <param name="expressinstall" value="/Scripts/expressInstall.swf" />
              <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="/swf/redes_hora.swf" width="597" height="48">
                <!--<![endif]-->
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="swfversion" value="6.0.65.0" />
                <param name="expressinstall" value="/Scripts/expressInstall.swf" />
                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                <div>
                  <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
          </object></td>
          <td width="2%" align="right" valign="middle" class="normalContenido2">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
 
  <tr>
    <td colspan="3" align="center" class="division"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="division2"></td>
  </tr>
  <tr>
    <td colspan="3"><!-- InstanceBeginEditable name="contenido" -->
      <form action="" method="post" name="form_anuncio" id="form_anuncio" onsubmit="MM_validateForm('kilometros','','RisNum','precio','','RisNum');return document.MM_returnValue">
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          {$mensaje}
          <tr>
            <td align="right" class="subtituloWeb3">
           <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
            <td width="205" align="left" class="subtituloWeb3">Category:</td>
            <td width="563" align="left"><span class="adminContenido">
                    <select name="categoria" id="categoria">
                    <option {if $cat eq "0"} selected='selected'{/if} value="0">&lt; Category &gt;</option>
              {section name=i loop=$listado}
                <option {if $cat eq $listado[i].nombre_cat || $cat eq $listado[i].id_cat} selected='selected'{/if} value="{$listado[i].id_cat}">{$listado[i].nombre_cat}</option> 
              {/section}
              </select>
                    *</span></td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Type:</td>
            <td align="left" class="adminContenido">
            <select name="tipo" class="texto_gen" id="tipo">
        <option {if $tipo eq "Offered"} selected="selected"{/if} value="Offered">Offered</option>
        <option {if $tipo eq "Looking"} selected="selected"{/if} value="Looking">Looking For</option>
        <option {if $tipo eq "Exchange"} selected="selected"{/if} value="Exchange">Exchange</option>
      </select> 
      *</td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Make:</td>
            <td align="left"><span class="adminContenido">
                    <select name="marca" id="marca" onchange="javascripts: document.form_anuncio.submit();">
                    <option {if $marca eq "0"} selected='selected'{/if} value="0">&lt; Any Make &gt;</option>
              {section name=i loop=$marcas2}
                <option {if $marca eq $marcas2[i].nombre_mac || $marca eq $marcas2[i].id_mac} selected='selected'{/if} value="{$marcas2[i].id_mac}">{$marcas2[i].nombre_mac}</option> 
              {/section}
              </select>
                    *</span></td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Model:</td>
            <td align="left" class="normalContenido"><span class="adminContenido">
            <select name="modelo" id="modelo">
            <option {if $modelo eq "0"} selected='selected'{/if} value="0">&lt; Any Model &gt;</option>
              {section name=i loop=$modelos}
                <option {if $modelo eq $modelos[i].nombre_mod || $modelo eq $modelos[i].id_mod} selected='selected'{/if} value="{$modelos[i].id_mod}">{$modelos[i].nombre_mod}</option> 
              {/section}
              </select>
                    *</span></td>
          </tr>
          <tr>
            <td align="left" class="subtituloWeb3">Year:</td>
            <td align="left" class="normalContenido"><select name="ano" class="texto_gen" id="ano">
        <option {if $ano eq "1960"} selected="selected"{/if} value="1960">1960</option>
        <option {if $ano eq "1961"} selected="selected"{/if} value="1961">1961</option>
        <option {if $ano eq "1962"} selected="selected"{/if} value="1962">1962</option>
        <option {if $ano eq "1963"} selected="selected"{/if} value="1963">1963</option>
        <option {if $ano eq "1964"} selected="selected"{/if} value="1964">1964</option>
        <option {if $ano eq "1965"} selected="selected"{/if} value="1965">1965</option>
        <option {if $ano eq "1966"} selected="selected"{/if} value="1966">1966</option>
        <option {if $ano eq "1967"} selected="selected"{/if} value="1967">1967</option>
        <option {if $ano eq "1968"} selected="selected"{/if} value="1968">1968</option>
        <option {if $ano eq "1969"} selected="selected"{/if} value="1969">1969</option>
        <option {if $ano eq "1970"} selected="selected"{/if} value="1970">1970</option>
        <option {if $ano eq "1971"} selected="selected"{/if} value="1971">1971</option>
        <option {if $ano eq "1972"} selected="selected"{/if} value="1972">1972</option>
        <option {if $ano eq "1973"} selected="selected"{/if} value="1973">1973</option>
        <option {if $ano eq "1974"} selected="selected"{/if} value="1974">1974</option>
        <option {if $ano eq "1975"} selected="selected"{/if} value="1975">1975</option>
        <option {if $ano eq "1976"} selected="selected"{/if} value="1976">1976</option>
        <option {if $ano eq "1977"} selected="selected"{/if} value="1977">1977</option>
        <option {if $ano eq "1978"} selected="selected"{/if} value="1978">1978</option>
        <option {if $ano eq "1979"} selected="selected"{/if} value="1979">1979</option>
        <option {if $ano eq "1980"} selected="selected"{/if} value="1980">1980</option>
        <option {if $ano eq "1981"} selected="selected"{/if} value="1981">1981</option>
        <option {if $ano eq "1982"} selected="selected"{/if} value="1982">1982</option>
        <option {if $ano eq "1983"} selected="selected"{/if} value="1983">1983</option>
        <option {if $ano eq "1984"} selected="selected"{/if} value="1984">1984</option>
        <option {if $ano eq "1985"} selected="selected"{/if} value="1985">1985</option>
        <option {if $ano eq "1986"} selected="selected"{/if} value="1986">1986</option>
        <option {if $ano eq "1987"} selected="selected"{/if} value="1987">1987</option>
        <option {if $ano eq "1988"} selected="selected"{/if} value="1988">1988</option>
        <option {if $ano eq "1989"} selected="selected"{/if} value="1989">1989</option>
        <option {if $ano eq "1990"} selected="selected"{/if} value="1990">1990</option>
        <option {if $ano eq "1991"} selected="selected"{/if} value="1991">1991</option>
        <option {if $ano eq "1992"} selected="selected"{/if} value="1992">1992</option>
        <option {if $ano eq "1993"} selected="selected"{/if} value="1993">1993</option>
        <option {if $ano eq "1994"} selected="selected"{/if} value="1994">1994</option>
        <option {if $ano eq "1995"} selected="selected"{/if} value="1995">1995</option>
        <option {if $ano eq "1996"} selected="selected"{/if} value="1996">1996</option>
        <option {if $ano eq "1997"} selected="selected"{/if} value="1997">1997</option>
        <option {if $ano eq "1998"} selected="selected"{/if} value="1998">1998</option>
        <option {if $ano eq "1999"} selected="selected"{/if} value="1999">1999</option>
        <option {if $ano eq "2000"} selected="selected"{/if} value="2000">2000</option>
        <option {if $ano eq "2001"} selected="selected"{/if} value="2001">2001</option>
        <option {if $ano eq "2002"} selected="selected"{/if} value="2002">2002</option>
        <option {if $ano eq "2003"} selected="selected"{/if} value="2003">2003</option>
        <option {if $ano eq "2004"} selected="selected"{/if} value="2004">2004</option>
        <option {if $ano eq "200"} selected="selected"{/if} value="2005">2005</option>
        <option {if $ano eq "2006"} selected="selected"{/if} value="2006">2006</option>
        <option {if $ano eq "2007"} selected="selected"{/if} value="2007">2007</option>
        <option {if $ano eq "2008"} selected="selected"{/if} value="2008">2008</option>
        <option {if $ano eq "2009"} selected="selected"{/if} value="2009">2009</option>
        <option {if $ano eq "2010"} selected="selected"{/if} value="2010">2010</option>
        <option {if $ano eq "2011"} selected="selected"{/if} value="2011">2011</option>
        <option {if $ano eq "2012"} selected="selected"{/if} value="2012">2012</option>
        <option {if $ano eq ""} selected="selected"{/if} value="">&lt; Select Year &gt;</option>
      </select> 
              *</td>
          </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Body Style:</td>
    <td align="left" class="normalContenido">
         <span class="adminContenido">
            <select name="bodystyle" id="bodystyle">
            <option {if $body eq "0"} selected='selected'{/if} value="0">&lt; Select Body Style &gt;</option>
              {section name=i loop=$bodystyle}
                <option {if $body eq $bodystyle[i].nombre_sty || $body eq $bodystyle[i].id_sty} selected='selected'{/if} value="{$bodystyle[i].id_sty}">{$bodystyle[i].nombre_sty}</option> 
              {/section}
              </select>
                    *</span></td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Milage (Km):</td>
    <td align="left" class="normalContenido">
      <input onkeypress="javascripts: return validarnum(event);" name="kilometros" type="text" class="normalContenido" id="kilometros" value="{$kilometros}" size="60" maxlength="100"  />
      *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Drive Wheel:</td>
    <td align="left" class="normalContenido"><select name="traccion" class="texto_gen" id="traccion">
      <option {if $traccion eq "2 Wheel Drive"} selected="selected"{/if} value="2 Wheel Drive">2 Wheel Drive</option>
      <option {if $traccion eq "4 Wheel Drive"} selected="selected"{/if} value="4 Wheel Drive">4 Wheel Drive</option>
      <option {if $traccion eq "All Wheel Drive"} selected="selected"{/if} value="All Wheel Drive">All Wheel Drive</option>
      <option {if $traccion eq ""} selected="selected"{/if} value="">&lt; Select Drive Type &gt;</option>
      </select> *</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Price ($):</td>
    <td align="left" class="normalContenido"><input onkeypress="javascripts: return validarnum(event);" name="precio" type="text" class="normalContenido" id="precio" value="{$precio}" size="60" maxlength="100"  /> 
      *</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Priority:</td>
    <td align="left" class="normalContenido"><input name="prioridad" type="text" class="normalContenido" id="prioridad" value="{$prioridad}" size="60" maxlength="100"  /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Status:</td>
    <td align="left" class="normalContenido"><select name="estado" class="texto_gen" id="estado">
      <option {if $estado eq "Sold"} selected="selected"{/if} value="Sold">Sold</option>
      <option {if $estado eq "Rented"} selected="selected"{/if} value="Rented">Rented</option>
      <option {if $estado eq "Available"} selected="selected"{/if} value="Available">Available</option>
      <option {if $estado eq ""} selected="selected"{/if} value="">&lt; Changue Estatus &gt;</option>
    </select> &nbsp;<span class="nuevo">new!</span></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Contenido:</td>
    <td align="left" class="normalContenido"><textarea name="contenido" cols="70" rows="6" class="normalContenido" id="contenidos"  wrap="physical">{$contenido}</textarea> 
      *</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" class="normalContenido"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return validaranunciomoto('&iquest;Est&aacute; seguro que desea guardar?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit3"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/clasificado/'" />       (*) Datos Obligatorios</td>
  </tr>
            </table></td>
          </tr>
        </table>
      </form>
       {literal}
      {/literal}
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td> 
  </tr>
  <tr>
    <td colspan="3" align="center" class="pie">
   Marinart C.A | Copyright&copy; 2016 All Rights Reserved.</td>
  </tr> 
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

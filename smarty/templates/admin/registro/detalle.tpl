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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th width="967" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center" class="subtituloWeb3"><form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('cedula','','RisNum','nombre','','R','apellido','','R','correo','','RisEmail','celular','','RisNum','telefono','','NisNum');return document.MM_returnValue">
                <table border="0" align="center" cellpadding="0" cellspacing="0" width="60%">
                  <tr>
                    <td colspan="2" align="center">Datos Personales</th>
                    </td>
                  {$mensaje}
                  <tr>
                    <td width="35%" align="left" class="subtituloWeb3">C&eacute;dula:</td>
                    <td  width="65%" class="normalContenido"><select name="tipo" id="tipo">
                          <option value="V-" {if $tipo eq "V-"} selected='selected' {/if}>V</option>
                          <option value="E-" {if $tipo eq "E-"} selected='selected' {/if}>E</option>
                          <option value="P-" {if $tipo eq "P-"} selected='selected' {/if}>P</option>
                          <option value="RIF:" {if $tipo eq "RIF:"} selected='selected' {/if}>RIF</option>
                          </select> 
                      <input name="cedula" type="text" id="cedula" value="{$cedula}" size="28" maxlength="9" onkeypress="javascript: return validarnum(event);" />
                      *</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Nombre:</td>
                    <td class="normalContenido"><input onkeypress="javascript: return validarletras(event);" name="nombre" type="text" id="nombre" value="{$nombres}" size="40" maxlength="50" />
                      *</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Apellido:</td>
                    <td class="normalContenido"><input onkeypress="javascript: return validarletras(event);" name="apellido" type="text" id="apellido" value="{$apellidos}" size="40" maxlength="50" />
                      *</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Genero:</td>
                    <td class="normalContenido"><input name="sexo" type="radio" value="masculino" {if $sexo eq "masculino" || $sexo eq ""} checked="checked"{/if} />
                      Masculino
                      <input type="radio" name="sexo" value="femenino" {if $sexo eq "femenino"} checked="checked"{/if} />
                      Femenino </td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Correo Personal:</td>
                    <td class="normalContenido"><input onkeypress="javascript: return validarcorreo(event);" name="correo" type="text" id="correo" value="{$correo}" size="40" maxlength="100" />
                      *</td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Celular:</td>
                    <td class="normalContenido"><input name="celular" type="text"  id="celular" value="{$celular}" size="40" maxlength="20" onkeypress="javascripts: return validarnum(event);" /> 
                      *</td>
                    </tr>
                    <tr>
                    <td align="left" class="subtituloWeb3">Tel&eacute;fono de Habitaci&oacute;n:</td>
                    <td class="normalContenido"><input name="telefono" type="text" id="telefono" value="{$telefono}" size="40" maxlength="20" onkeypress="javascripts: return validarnum(event);"/></td>
                    </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Estado:</td>
                    <td class="normalContenido">
                   <select name="estado"  id="estado" onchange="javascripts: document.form1.submit();">
                        <option value="" {if $estado eq ""}selected="selected"{/if} >&lt; Seleccione &gt;</option>
                        {section name=i loop=$estados}
                        <option value="{$estados[i].id_est}" {if $estado eq $estados[i].id_est}selected="selected"{/if} >{$estados[i].nombre_est}</option>
                        {/section}
          			</select>
                    *</td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Municipio:</td>
                    <td class="normalContenido"><select name="municipio"  id="municipio">
                        <option value="" {if $municipio eq ""}selected="selected"{/if} >&lt; Seleccione &gt;</option>
                        {section name=i loop=$municipios}
                        <option value="{$municipios[i].id_mun}" {if $municipio eq $municipios[i].id_mun}selected="selected"{/if} >{$municipios[i].nombre_mun}</option>
                        {/section}
          			</select>
                    *</td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Fecha Nacimiento:</td>
                    <td class="normalContenido"><span class="normalContenido">
                      <input name="nacimiento" type="text" class="normalContenido" id="f_date_c"   value="{$nacimiento}" size="35" maxlength="50" readonly="readonly" />
                      <img src="/calendario/img.gif" name="f_trigger_c" width="20" height="14" align="top" id="f_trigger_c" style="cursor: pointer; border: 1px solid #005B7D;" title="Seleccionador de Fecha" onmouseover="this.style.background='#005B7D';" onmouseout="this.style.background=''" />&nbsp;*</span></td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">&nbsp;</td>
                    <td class="normalContenido">&nbsp;</td>
                  </tr>
                    <tr>
                    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Datos de Participaci&oacute;n<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
                  </tr>
                   {$mensaje2}
                      <tr>
                        <td align="left" class="subtituloWeb3">&iquest;Deseas recibir nuestro bolet&iacute;n                                   electr&oacute;nico?</td>
                        <td align="left" class="normalContenido">S&iacute;
              <input {if $publicidad eq "" || $publicidad eq "si"}checked="checked"{/if} name="publicidad" type="radio" id="radio" value="si"  />
              No                          
              <input {if $publicidad eq "no"}checked="checked"{/if} type="radio" name="publicidad" id="radio2" value="no" /></td>
                      </tr>
                       <tr>
                        <td align="left" class="subtituloWeb3">&iquest;C&oacute;mo nos conoci&oacute;?</td>
                        <td align="left" class="normalContenido"><select name="medio" id="medio">
                          <option {if $medio eq "Google"} selected='selected' {/if} value="Google">B&uacute;squeda en Google</option>
                          <option {if $medio eq "Twitter"} selected='selected' {/if} value="Twitter">Twitter</option>
                          <option {if $medio eq "Facebook"} selected='selected' {/if} value="Facebook">Facebook</option>
                          <option {if $medio eq "Radio"} selected='selected' {/if} value="Radio">Radio</option>
                          <option {if $medio eq "Amigo"} selected='selected' {/if} value="Amigo">Referencia de un Amigo</option>
                          <option {if $medio eq "Periodico"} selected='selected' {/if} value="Periodico">Peri&oacute;dico</option>
                          <option {if $medio eq "Volantes"} selected='selected' {/if} value="Volantes">Volantes Publicitarios</option>
                          <option {if $medio eq "Otros"} selected='selected' {/if} value="Otros">Otros Medios</option>
                        </select></td>
                      </tr>
                       <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="normalContenido"><input onclick="javascript: return validarcombos3();" type="submit" name="envio" id="envio" value="Actualizar" /> 
                        (*) Datos Obligatorios</td>
                      </tr>
</table>
       </form>
   {literal}
			    <script type='text/javascript'>
                function catcalc(cal) {
                    var date = cal.date;
                    var time = date.getTime()
                    var field = document.getElementById('f_calcdate');
                    if (field == cal.params.inputField) {
                        field = document.getElementById('f_date_c');
                        time -= Date.WEEK;
                    } else {
                        time += Date.WEEK; 
                    }
                    var date2 = new Date(time);
                    field.value = date2.print('%d/%m/%Y');
                }
                Calendar.setup({
                    inputField     :    'f_date_c',   
                    ifFormat       :    '%d/%m/%Y',       // formato de fecha
                    button         :    'f_trigger_c',
                    singleClick    :    true
                });
            </script>
      {/literal}
    </td>
    </tr>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a href="/admin/registro">&nbsp;Volver <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

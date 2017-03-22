<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
{literal}
<script type="text/javascript" src="/js/prototype.js"></script>
<script type="text/javascript" src="/js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="/js/lightbox.js"></script>
<link rel="stylesheet" href="/css/lightbox.css" type="text/css" media="screen" />
{/literal}
<!-- InstanceEndEditable -->
</head>
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" class="subtituloWeb3">
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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th width="762" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td align="center" class="titulo">
    <table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="60%" valign="top">
        <table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
          <form action="" method="post">
          <tr>
            <td class:"subtituloWeb3" colspan="2">
              <input type="hidden" name="reserva" value="{$reserva}">
              <h2>{$estatus} - {$reserva}</h2>
            </td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">ID:</td>
            <td class="normalContenido" width="75%">{$id}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Name:</td>
            <td class="normalContenido" width="75%">{$nombres}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Last Name:</td>
            <td class="normalContenido" width="75%">{$apellidos}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Age:</td>
            <td class="normalContenido" width="75%">{$edad}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Telephone:</td>
            <td class="normalContenido" width="75%">{$telefono}</td>
          </tr>
          <tr>
            <td width="88" align="left" width="15%" class="normalContenido">E-mail:</td>
            <td width="477" class="normalContenido" width="75%">{$correo}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Country:</td>
            <td class="normalContenido" width="75%">{$pais}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">City:</td>
            <td class="normalContenido" width="75%">{$estado}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Direction:</td>
            <td class="normalContenido" width="75%">{$direccion}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">About:</td>
            <td class="normalContenido" width="75%">{$nosotros}</td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Date:</td>
            <td class="normalContenido" width="75%"><input type="text" name="fecha" id="datetimepicker" class="normalContenido" size="71" value="{$fecha}"></td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Shedule:</td>
            <td class="normalContenido" width="75%">
              <select name="hora" id="hora1">
                <option {if $hora == '05:30:00'}selected{/if} value="5:30">5:30 A.M</option>
                <option {if $hora == '06:00:00'}selected{/if} value="6:00">6:00 A.M</option>
                <option {if $hora == '06:30:00'}selected{/if} value="6:30">6:30 A.M</option>
                <option {if $hora == '07:00:00'}selected{/if} value="7:00">7:00 A.M</option>
                <option {if $hora == '07:30:00'}selected{/if} value="7:30">7:30 A.M</option>
                <option {if $hora == '08:00:00'}selected{/if} value="8:00">8:00 A.M</option>
                <option {if $hora == '08:30:00'}selected{/if} value="8:30">8:30 A.M</option>
                <option {if $hora == '09:00:00'}selected{/if} value="9:00">9:00 A.M</option>
                <option {if $hora == '09:30:00'}selected{/if} value="9:30">9:30 A.M</option>
                <option {if $hora == '10:00:00'}selected{/if} value="10:00">10:00 A.M</option>
                <option {if $hora == '10:30:00'}selected{/if} value="10:30">10:30 A.M</option>
                <option {if $hora == '11:00:00'}selected{/if} value="11:00">11:00 A.M</option>
                <option {if $hora == '11:30:00'}selected{/if} value="11:30">11:30 A.M</option>
                <option {if $hora == '12:00:00'}selected{/if} value="12:00">12:00 P.M</option>
                <option {if $hora == '12:30:00'}selected{/if} value="12:30">12:30 P.M</option>
                <option {if $hora == '13:00:00'}selected{/if} value="13:00">1:00 P.M</option>
                <option {if $hora == '13:30:00'}selected{/if} value="13:30">1:30 P.M</option>
                <option {if $hora == '14:00:00'}selected{/if} value="14:00">2:00 P.M</option>
                <option {if $hora == '14:30:00'}selected{/if} value="14:30">2:30 P.M</option>
                <option {if $hora == '15:00:00'}selected{/if} value="15:00">3:00 P.M</option>
                <option {if $hora == '15:30:00'}selected{/if} value="15:30">3:30 P.M</option>
                <option {if $hora == '16:00:00'}selected{/if} value="16:00">4:00 P.M</option>
                <option {if $hora == '16:30:00'}selected{/if} value="16:30">4:30 P.M</option>
                <option {if $hora == '17:00:00'}selected{/if} value="17:00">5:00 P.M</option>
                <option {if $hora == '17:30:00'}selected{/if} value="17:30">5:30 P.M</option>
                <option {if $hora == '18:00:00'}selected{/if} value="18:00">6:00 P.M</option>
                <option {if $hora == '18:30:00'}selected{/if} value="18:30">6:30 P.M</option>
                <option {if $hora == '19:00:00'}selected{/if} value="19:00">7:00 P.M</option>
                <option {if $hora == '19:30:00'}selected{/if} value="19:30">7:30 P.M</option>
                <option {if $hora == '20:00:00'}selected{/if} value="20:00">8:00 P.M</option>
                <option {if $hora == '20:30:00'}selected{/if} value="20:30">8:30 P.M</option>
                <option {if $hora == '21:00:00'}selected{/if} value="21:00">9:00 P.M</option>
                <option {if $hora == '21:30:00'}selected{/if} value="21:30">9:30 P.M</option>
                <option {if $hora == '22:00:00'}selected{/if} value="22:00">10:00 P.M</option>
                <option {if $hora == '22:30:00'}selected{/if} value="22:30">10:30 P.M</option>
                <option {if $hora == '23:00:00'}selected{/if} value="23:00">11:00 P.M</option>
                <option {if $hora == '23:30:00'}selected{/if} value="23:30">11:30 P.M</option>
                <option {if $hora == '00:00:00'}selected{/if} value="0:00">12:00 A.M</option>
                <option {if $hora == '00:30:00'}selected{/if} value="0:30">12:30 A.M</option>
                <option {if $hora == '01:00:00'}selected{/if} value="1:00">1:00 A.M</option>
                <option {if $hora == '01:30:00'}selected{/if} value="1:30">1:30 A.M</option>
                <option {if $hora == '02:00:00'}selected{/if} value="2:00">2:00 A.M</option>
                <option {if $hora == '02:30:00'}selected{/if} value="2:30">2:30 A.M</option>
                <option {if $hora == '03:00:00'}selected{/if} value="3:00">3:00 A.M</option>
                <option {if $hora == '03:30:00'}selected{/if} value="3:30">3:30 A.M</option>
                <option {if $hora == '04:00:00'}selected{/if} value="4:00">4:00 A.M</option>
                <option {if $hora == '04:30:00'}selected{/if} value="4:30">4:30 A.M</option>
                <option {if $hora == '05:00:00'}selected{/if} value="5:00">5:00 A.M</option>
              </select>
            </td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Location:</td>
            <td class="normalContenido" width="75%"><input type="text" name="ubicacion" class="normalContenido" size="71" value="{$ubicacion}"></td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Drop Off:</td>
            <td class="normalContenido" width="75%"><input type="text" name="drop" class="normalContenido" size="71" value="{$dropoff}"></td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Adults:</td>
            <td class="normalContenido" width="75%"><input type="number" name="adultos" class="normalContenido" size="71" value="{$adultos}"></td>
          </tr>
          <tr>
            <td align="left" width="15%" class="normalContenido">Childs:</td>
            <td class="normalContenido" width="75%"><input type="number" name="ninos" class="normalContenido" size="71" value="{$ninos}"></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input name="envio" type="hidden" value="Guardar"/>
              <input type="submit" class="componentes" id="button2" onclick="javascript: return validarcontenido('Are you sure you want to save?');" value="Save" />
              &nbsp;
              <input type="button" name="Submit"  class="normalContenido" value="Cancel" onclick="javascripts: location.href='/admin/galeria/'" />
            </td>
            </tr>
          </form>
        </table>
        </td>
      </tr>
    </table>

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
    <td width="50%" align="center"><a href="/admin/reservas">&nbsp;Back <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Logout <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  {include '../layout/pie.tpl'}
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
{literal}
  <script type="text/javascript">
    $(function () {
      $('#datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY'
      });
    });
  </script>
{/literal}
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
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
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','apellido','','R','correo','','RisEmail','login','','R','clave','','R','nivel','','RinRange1:4');return document.MM_returnValue">
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="100%" align="center" class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="center" class="subtituloWeb3"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="26%" align="left" class="subtituloWeb3">Nombre:</td>
                <td width="74%" align="left" class="normalContenido"><input name="nombre" type="text" class="componentes" id="nombre" onkeypress="javascripts: return validarletras(event);" value="{$nombres}" size="55" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Apellido:</td>
                <td align="left" class="normalContenido"><input name="apellido" type="text" class="componentes" id="apellido" onkeypress="javascripts: return validarletras(event);" value="{$apellidos}" size="55" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Correo:</td>
                <td align="left" class="normalContenido"><input name="correo" type="text" class="componentes" id="correo" value="{$correo}" size="55" maxlength="50" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Usuario:</td>
                <td align="left" class="normalContenido"><input name="login" type="text" class="componentes" id="login" onkeypress="javascripts: return validarletrasnum(event);" value="{$login}" size="55" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Contraseña:</td>
                <td align="left" class="normalContenido"><input name="clave" type="password" class="componentes" id="clave" size="55" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Confirme Constraseña:</td>
                <td align="left" class="normalContenido"><input name="confirmar" type="password" class="componentes" id="confirmar" size="55" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Nivel:</td>
                <td align="left" class="normalContenido"><input name="nivel" type="text" class="componentes" id="nivel" onkeypress="javascripts: return validarnum(event);" value="{$nivel}" size="55" maxlength="1" />
                  *</td>
              </tr>
              {$mensaje}
  <tr>
  <td>&nbsp;</td>
    <td align="left"><input name="envio" type="submit" class="componentes" id="button3" onclick="javascript: return confirmar('¿Está seguro que desea guardar?');" value="Guardar" />
      &nbsp;&nbsp;
      <input name="button" type="button" class="componentes" id="button4" onclick="javascript: location.href='/admin/usuario/'" value="Cancelar" /> <span class="normalContenido">(*) Required Data</span></td>
  </tr>
            </table></td>
          </tr>
        </table>
      </form>
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
    <td width="50%" align="center"></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesión <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  {include '../layout/pie.tpl'}
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>

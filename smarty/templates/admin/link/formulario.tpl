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
      <form action="" method="post" name="form1" class="normal" id="form1" onsubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />{$accion}<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="center" class="subtituloWeb3"><table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="67" align="left" class="subtituloWeb3">Nombre:</td>
                <td width="320" class="normalContenido"><input name="nombre" type="text" class="componentes" id="nombre"  value="{$nombres}" size="45" maxlength="50" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Tipo:</td>
                <td class="normalContenido">
                <select name="tipo" id="tipo">
                    <option value="normal" {if $tipo eq "normal"} selected="selected"{/if} >Normal</option>
                    <option value="up" {if $tipo eq "up"} selected="selected"{/if} >Up</option>
                     <option value="pie" {if $tipo eq "pie"} selected="selected"{/if} >Footer</option>
          		</select>
                *
          </td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Etiqueta:</td>
                <td class="normalContenido">
                  <input name="etiqueta" type="text" class="componentes" id="etiqueta" value="{$etiqueta}" size="45" maxlength="50" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Prioridad:</td>
                <td class="normalContenido"><input name="prioridad" type="text" class="componentes" id="prioridad" onkeypress="javascripts: return validarletrasnum(event);" value="{$prioridad}" size="45" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Icono:</td>
                <td class="normalContenido"><input name="icono" formnovalidate="formnovalidate" type="text" class="componentes" id="icono" value="" size="45" maxlength="100" />
                  *</td>
              </tr>
              {$mensaje}
  <tr>
  <td>&nbsp;</td>
    <td align="left"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return confirmar('Are you sure you want to save?');" value="Guardar" />
      &nbsp;&nbsp;
      <input name="button2" type="button" class="componentes" id="button2" onclick="javascript: location.href='/admin/link/'" value="Cancelar" /> <span class="normalContenido">(*) Datos Requeridos</span></td>
  </tr>
            </table></td>
          </tr>
          {$mensaje}
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

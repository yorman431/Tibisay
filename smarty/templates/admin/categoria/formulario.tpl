<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
                <td width="320" class="normalContenido"><input name="nombre" type="text" class="componentes" id="nombre" onkeypress="javascripts: return validarletrasnum2(event);" value="{$nombres}" size="45" maxlength="50" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Etiqueta:</td>
                <td class="normalContenido"><input name="etiqueta" type="text" class="componentes" id="etiqueta" onkeypress="javascripts: return validarletrasnum2(event);" value="{$etiqueta}" size="45" maxlength="80" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Prioridad:</td>
                <td class="normalContenido"><input name="prioridad" type="text" class="componentes" id="prioridad" onkeypress="javascripts: return validarletrasnum(event);" value="{$apellidos}" size="45" maxlength="20" />
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Pertenece a:</td>
                <td>
                 <select name="padre" id="padre">
                 <option {if $padre eq "0"} selected='selected'{/if} value="0">&lt; Select &gt;</option>
              	{section name=i loop=$listado}
                <option {if $padre eq $listado[i].nombre_cat || $padre eq $listado[i].id_cat} selected='selected'{/if} value="{$listado[i].id_cat}">{$listado[i].nombre_cat}</option>
             	 {/section}
              </select>
                </td>
              </tr>
              {$mensaje}
  <tr>
  <td>&nbsp;</td>
    <td align="left"><input name="envio" type="submit" class="componentes" id="button" onclick="javascript: return confirmar('¿Está seguro que desea guardar?');" value="Guardar" />
      &nbsp;&nbsp;
      <input name="button2" type="button" class="componentes" id="button2" onclick="javascript: location.href='/admin/categoria/'" value="Cancelar" /> <span class="normalContenido">(*) Required Data</span></td>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
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

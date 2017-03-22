<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
{literal}
<link rel="stylesheet" type="text/css" media="all" href="/calendario/calendar-blue.css" title="blue" />

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
    <td colspan="3">
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','f_date_c','','R');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="967" align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="left" class="tituloWeb"><table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
              {$mensaje}
  <tr>
    <td width="84" align="left" class="subtituloWeb3">Name:</td>
    <td width="400" class="normalContenido"><input onkeypress="javascripts: return validarletrasnum(event);" name="nombre" type="text" class="normalContenido" id="nombre" value="{$nombres|escape:'html'}" size="71" maxlength="100" />
      *</td>
  </tr>
  <tr>
    <td width="84" align="left" class="subtituloWeb3">Location:</td>
    <td width="400" class="normalContenido"><input onkeypress="javascripts: return validarletrasnum(event);" name="ubicacion" type="text" class="normalContenido" id="ubicacion" value="{$ubicacion|escape:'html'}" size="71" maxlength="100" />
      *</td>
  </tr>

  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Code:</td>
    <td class="normalContenido"><input name="url" type="text" class="normalContenido" id="url" value="{$url}" size="71" maxlength="100" />
      *</td>
  </tr>
  <tr>
            <td width="15%" align="left" class="subtituloWeb3">Category:</td>
            <td width="75%" class="adminContenido"><span class="adminContenido">
              <select name="categoria" id="categoria">
              {section name=i loop=$listado}
                <option {if $categoria eq $listado[i].nombre_cat || $categoria eq $listado[i].id_cat} selected='selected'{/if} value="{$listado[i].id_cat}">{$listado[i].nombre_cat}</option>
              {/section}
              </select>
              *
            </span></td>
          </tr>
          <tr>
            <td width="15%" align="left" class="subtituloWeb3">Type:</td>
            <td width="75%" class="adminContenido"><span class="adminContenido">
              <select name="tipo" id="tipo">
                <option {if $tipo eq Youtube} selected='selected'{/if} value="Youtube">Youtube</option>
                <option {if $tipo eq Vimeo} selected='selected'{/if} value="Vimeo">Vimeo</option>
              </select>
              *
            </span></td>
          </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Client/WP:</td>
    <td class="normalContenido"><input name="cliente" value="{$cliente}" id="cliente" type="text"/>
      *</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Description:</td>
    <td class="normalContenido"><textarea name="descripcion" cols="70" rows="6" class="normalContenido" id="contenido"  wrap="physical">{$descripcion|escape:'html'}</textarea>
      *</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td class="normalContenido"><input name="envio" type="submit" class="componentes" id="button2" onclick="javascript: return validarcontenido('Are you sure you want to save');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/video/'" />
      (*) Required Data</td>
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
</body>
<!-- InstanceEnd --></html>

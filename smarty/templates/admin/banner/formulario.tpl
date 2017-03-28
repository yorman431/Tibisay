<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
{include '../layout/header.tpl'}
{literal}
<link rel="stylesheet" type="text/css" media="all" href="/calendario/calendar-blue.css" title="blue" />
<script type="text/javascript" src="/calendario/calendar.js"></script>
<script type="text/javascript" src="/calendario/lang/calendar-en.js"></script>
<script type="text/javascript" src="/calendario/calendar-setup.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
	window.onload = function()
	{
		var editor = CKEDITOR.replace( 'descripcion',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]

    		}
		);
		CKFinder.setupCKEditor( editor, '../../ckfinder/' ) ;
	};
</script>

{/literal}
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
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="MM_validateForm('etiqueta','','R');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="967" align="center"><span class="titulo"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /></span>{$accion}<span class="titulo"><img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></span></th>
          </tr>
          <tr>
            <td align="left" class="tituloWeb"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
            {$mensaje}
              <tr>
                <td width="15%" align="left" class="subtituloWeb3">Etiqueta:</td>
                <td width="75%"><input name="etiqueta" type="text" id="etiqueta" value="{$etiqueta}" size="71" maxlength="100" />
                *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Efecto:</td>
                <td><select name="efecto" id="efecto">
<option value="showBars" {if $efecto eq "showBars"} selected='selected' {/if}>Show Bars</option>
<option value="cube" {if $efecto eq "cube"} selected='selected' {/if}>Cube</option>
<option value="showBarsRandom" {if $efecto eq "showBarsRandom"} selected='selected' {/if}>Show Bars Random</option>
<option value="tube" {if $efecto eq "tube"} selected='selected' {/if}>Tube</option>
<option value="cubeStop" {if $efecto eq "cubeStop"} selected='selected' {/if}>Cube Stop</option>
<option value="cubeHide" {if $efecto eq "cubeHide"} selected='selected' {/if}>Cube Hide</option>
<option value="cubeSize" {if $efecto eq "cubeSize"} selected='selected' {/if}>Cube Size</option>
<option value="horizontal" {if $efecto eq "horizontal"} selected='selected' {/if}>Horizontal</option>
<option value="cubeRandom" {if $efecto eq "cubeRandom"} selected='selected' {/if}>Cube Random</option>
<option value="fade" {if $efecto eq "fade"} selected='selected' {/if}>Fade</option>
<option value="fadeFour" {if $efecto eq "fadeFour"} selected='selected' {/if}>Fade Four</option>
<option value="paralell" {if $efecto eq "paralell"} selected='selected' {/if}>Paralell</option>
<option value="blind" {if $efecto eq "blind"} selected='selected' {/if}>Blind</option>
<option value="blindHeight" {if $efecto eq "blindHeight"} selected='selected' {/if}>Blind Height</option>
<option value="directionLeft" {if $efecto eq "directionLeft"} selected='selected' {/if}>Direction Left</option>
<option value="directionTop" {if $efecto eq "directionTop"} selected='selected' {/if}>Direction Top</option>
<option value="directionBottom" {if $efecto eq "directionBottom"} selected='selected' {/if}>Direction Bottom</option>
<option value="directionRight" {if $efecto eq "directionRight"} selected='selected' {/if}>Direction Right</option>
                </select>
                  *</td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Prioridad:</td>
                <td class="normalContenido"><input name="prioridad" type="text" id="prioridad" value="{$prioridad}" size="71" maxlength="100" /></td>
              </tr>
              <tr>
                <td align="left" class="subtituloWeb3">Imagen:</td>
                <td class="normalContenido"><input type="file" name="documento" id="documento" />
                  *
                  (512 Kb m&aacute;x)</td>
              </tr>
              <tr>
                <td align="left" valign="top" class="subtituloWeb3">Descripción:</td>
                <td align="left" class="normalContenido">&nbsp;</td>
              </tr>
              <tr>
    <td colspan="2" align="center" valign="top" class="subtituloWeb3"><textarea name="descripcion" cols="70" rows="6" class="normalContenido" id="descripcion"  wrap="physical">{$descripcion}</textarea></td>
    </tr>
              <tr>
                <td colspan="2" align="center"><input name="envio" type="submit" id="envio" onclick="javascript: return validarbanner('¿Está seguro que desea guardar?');" value="Guardar"/>
                  &nbsp;
                  <input type="button" name="Submit" value="Cancelar" onclick="javascripts: location.href='/admin/banner'" />
                  (*) Datos Requeridos</td>
                </tr>
            </table></td>
          </tr>
        </table>
      </form>

    </td>
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

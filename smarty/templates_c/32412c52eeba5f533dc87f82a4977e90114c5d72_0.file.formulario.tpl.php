<?php
/* Smarty version 3.1.30, created on 2017-03-14 04:36:13
  from "D:\Websites\tibisay\smarty\templates\admin\hotel\formulario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7652dbe86d6_32373089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32412c52eeba5f533dc87f82a4977e90114c5d72' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\hotel\\formulario.tpl',
      1 => 1489462563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/header.tpl' => 1,
    'file:../layout/cabezera.tpl' => 1,
    'file:../layout/pie.tpl' => 1,
  ),
),false)) {
function content_58c7652dbe86d6_32373089 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
    <?php $_smarty_tpl->_subTemplateRender("file:../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript">
	window.onload = function()
	{
		var editor2 = CKEDITOR.replace( 'contenido',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]
 
    		}
		);
		
		var editor = CKEDITOR.replace( 'condiciones',
			{
		toolbar :
			[
            		['Font','FontSize','TextColor','RemoveFormat','-','Table','Image','Source','Templates' ],'/',

            		['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'],['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],['Maximize', 'ShowBlocks']

        		]
 
    		}
		);
	};
<?php echo '</script'; ?>
>
	

<link  href="/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- InstanceEndEditable -->

</head>  
<body>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="marco">
  <tr>
    <td colspan="3" align="left" background="/imagenes/fondo_admin.jpg" class="subtituloWeb3">
        <?php $_smarty_tpl->_subTemplateRender("file:../layout/cabezera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
      <form action="" method="post" name="form1" id="form1" onsubmit="MM_validateForm('nombre','','R','email','','NisEmail');return document.MM_returnValue">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th width="768" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
              <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

                  <tr>
                    <td align="left" class="subtituloWeb3">Pais:</td>
                    <td class="adminContenido">
                    <select name="pais" id="pais" class="tamano">
                    <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['paises']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <option <?php if ($_smarty_tpl->tpl_vars['paises']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_pais'] == $_smarty_tpl->tpl_vars['pais']->value) {?> selected='selected'<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['paises']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_pais'];?>
"><?php echo $_smarty_tpl->tpl_vars['paises']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_pais'];?>
</option>
                    <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?> 
                  </select> 
                    *</td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Estado:</td>
                    <td class="adminContenido"><select name="estado" id="estado" class="tamano">
                    <?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['estados']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <option <?php if ($_smarty_tpl->tpl_vars['estados']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_est'] == $_smarty_tpl->tpl_vars['estado']->value) {?> selected='selected'<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['estados']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_est'];?>
"><?php echo $_smarty_tpl->tpl_vars['estados']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_est'];?>
</option>
                    <?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?> 
                  </select> 
                    *
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="subtituloWeb3">Precio:</td>
                    <td align="left"><input  name="precio" type="text" class="normalContenido" id="precio" value="<?php echo $_smarty_tpl->tpl_vars['precio']->value;?>
" size="71" maxlength="20" onkeypress="javascripts: return validarnum(event);" /></td>
                  </tr>
                  <tr>
                    <td align="left" class="subtituloWeb3">Ciudad:</td>
                    <td class="adminContenido"><input onkeypress="javascripts: return validarletras(event);" name="ciudad" type="text" id="ciudad" value="<?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>
" size="71" maxlength="150" /> 
                      *</td>
                  </tr>
                <tr>
                    <td align="left" class="subtituloWeb3">Ubicaci&oacute;n:</td>
                    <td class="adminContenido"><input name="ubicacion" type="text" id="ubicacion" value="<?php echo $_smarty_tpl->tpl_vars['ubicacion']->value;?>
" size="71" maxlength="150" /> 
                      *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Sector:</td>
                  <td class="adminContenido">
                    <select name="sector" id="sector" class="tamano">
                      <option value="" <?php if ($_smarty_tpl->tpl_vars['sector']->value == '') {?> selected hidden<?php }?>>Seleccione una opcion</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['sector']->value == 'Norte') {?> selected <?php }?> value="Norte">Norte</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['sector']->value == 'Sur') {?> selected <?php }?> value="Sur">Sur</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">Nombre</td>
                  <td class="adminContenido"><input name="nombre" type="text" id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
" size="71" maxlength="150" />
                  *</td>
                </tr>
                
                
  <tr>
    <td width="205" align="left" valign="top" class="subtituloWeb3">Categor&iacute;a:</td>
    <td width="563" class="adminContenido">
      <select name="categoria" id="categoria" class="tamano">
        	<option <?php if ($_smarty_tpl->tpl_vars['categoria']->value == "2") {?> selected='selected'<?php }?> value="2">2 Estrellas</option>
            <option <?php if ($_smarty_tpl->tpl_vars['categoria']->value == "3") {?> selected='selected'<?php }?> value="3">3 Estrellas</option>
            <option <?php if ($_smarty_tpl->tpl_vars['categoria']->value == "4") {?> selected='selected'<?php }?> value="4">4 Estrellas</option>
            <option <?php if ($_smarty_tpl->tpl_vars['categoria']->value == "5") {?> selected='selected'<?php }?> value="5">5 Estrellas</option>
            <option <?php if ($_smarty_tpl->tpl_vars['categoria']->value == "6") {?> selected='selected'<?php }?> value="6">Boutique</option>
            <option <?php if ($_smarty_tpl->tpl_vars['categoria']->value == "7") {?> selected='selected'<?php }?> value="7">Posada</option>
            
      </select>
    *</span></td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Tipo de Tarifa:</td>
    <td><select name="tipo" id="tipo" class="tamano">
        	<option <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "Habitacion") {?> selected='selected'<?php }?> value="Habitacion">Por Habitaci&oacute;n</option>
            <option <?php if ($_smarty_tpl->tpl_vars['tipo']->value == "Persona") {?> selected='selected'<?php }?> value="Persona">Por Persona</option>
      </select></td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Prioridad:</td>
    <td><input name="prioridad" type="text" id="prioridad" value="<?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
" size="71" maxlength="4" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Coordenadas:</td>
    <td>Lat: 
      <input  name="latitud" type="text" id="latitud" value="<?php echo $_smarty_tpl->tpl_vars['latitud']->value;?>
" size="25" maxlength="50" />
      Long:      
  <input  name="longitud" type="text" id="longitud" value="<?php echo $_smarty_tpl->tpl_vars['longitud']->value;?>
" size="25" maxlength="50" />
  <a onclick="javascript: seleccionar_mapa(); return false;" href="#">Mapa</a></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Condiciones:</td>
    <td><textarea name="condiciones" cols="70" rows="6" id="condiciones"  wrap="physical"><?php echo $_smarty_tpl->tpl_vars['condiciones']->value;?>
</textarea></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Descripci&oacute;n:</td>
    <td><textarea name="contenido" cols="70" rows="6" id="contenido"  wrap="physical"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</textarea></td> 
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Claves:</td>
    <td><textarea name="claves" cols="70" rows="6" id="claves"  wrap="physical"><?php echo $_smarty_tpl->tpl_vars['claves']->value;?>
</textarea></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Facilidades:</td>
    <td>
    <?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['facilidad']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
    	<div class="facilidad">
        <div class="nombre_facilidad">
        <input type="checkbox" name="facilidad<?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_fac'];?>
" id="facilidad<?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_fac'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_fac'];?>
" <?php if ($_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['encendido'] == "on") {?> checked="checked" <?php }?> />
        <?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_fac'];?>
</div>
        <div class="fotos5">
             
            <i class="fa <?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_fac'];?>
 color-fa"></i>
            
        </div>
    	</div>
        
    <?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Principal:</td>
    <td><select name="principal" id="principal">
      <option <?php if ($_smarty_tpl->tpl_vars['principal']->value == "si") {?> selected='selected'<?php }?> value="si">S&iacute;</option>
      <option <?php if ($_smarty_tpl->tpl_vars['principal']->value == "no") {?> selected='selected'<?php }?> value="no">No</option>
      </select>
      (Valor en S&iacute; aparece recomendado en la principal)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="envio" type="submit" class="componentes" id="button2" onclick="javascript: return confirmar('&iquest;Est&aacute; seguro que desea guardar?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/hotel/'" /></td>
  </tr>
          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" -->&nbsp;<!-- InstanceEndEditable --></td>
    <td width="25%" align="center"><a href="/admin/cerrar_session.php">Cerrar Sesi&oacute;n <img src="/imagenes/cerrar.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
    <?php $_smarty_tpl->_subTemplateRender("file:../layout/pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</table>
<?php echo '<script'; ?>
 type="text/javascript">
swfobject.registerObject("FlashID");
<?php echo '</script'; ?>
>
</body>
<!-- InstanceEnd --></html>
<?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-03-14 04:36:26
  from "D:\Websites\tibisay\smarty\templates\admin\hotel\formulario_temporada.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7653a0e2c76_16747636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf8da34a7fac6d3dbe59b30167cf84a1bfedef74' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\hotel\\formulario_temporada.tpl',
      1 => 1489462443,
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
function content_58c7653a0e2c76_16747636 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla_admin.dwt" codeOutsideHTMLIsLocked="false" --> 
<head>
    <?php $_smarty_tpl->_subTemplateRender("file:../layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                    <td width="205" align="left" class="subtituloWeb3">Desde:</td>
                    <td width="563" colspan="2" class="adminContenido">
                    <input readonly="readonly" size="20" type="text" id="desde" name="desde" value="<?php echo $_smarty_tpl->tpl_vars['desde']->value;?>
" /><button id="f_btn1">...</button> 
                    * 

    <?php echo '<script'; ?>
 type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "desde",
        trigger    : "f_btn1",
        onSelect   : function() { this.hide() },
        showTime   : false,
        dateFormat : "%d/%m/%Y"
      });
    //]]><?php echo '</script'; ?>
>  <span class="subtituloWeb3">Hasta:</span>
    <input size="20" readonly="readonly" type="text" id="hasta" name="hasta" value="<?php echo $_smarty_tpl->tpl_vars['hasta']->value;?>
" /><button id="f_btn2">...</button> *<br />

    <?php echo '<script'; ?>
 type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "hasta",
        trigger    : "f_btn2",
        onSelect   : function() { this.hide() },
        showTime   : false,
        dateFormat : "%d/%m/%Y"
      });
    //]]><?php echo '</script'; ?>
> </td>
                  </tr>
                <tr>
                    <td align="left" class="subtituloWeb3">Texto Alternativo:</td>
                    <td colspan="2" class="adminContenido"><input name="alternativo" type="text" id="alternativo" value="<?php echo $_smarty_tpl->tpl_vars['alternativo']->value;?>
" size="71" maxlength="150" /> 
                      *</td>
                </tr>
                <tr>
                  <td align="left" class="subtituloWeb3">T&iacute;tulo Adicional:</td>
                  <td colspan="2"><span class="adminContenido">
                    <input name="titulo" type="text" id="titulo" value="<?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
" size="71" maxlength="150" />
                  *</span></td>
                </tr>
                <tr>
    <td align="left" class="subtituloWeb3">Orden:</td>
    <td colspan="2"><input name="prioridad" type="text" id="prioridad" value="<?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
" size="71" maxlength="4" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Publica:</td>
    <td colspan="2"><select name="publica" id="publica">
      <option <?php if ($_smarty_tpl->tpl_vars['publica']->value == "1") {?> selected='selected'<?php }?> value="1">S&iacute;</option>
      <option <?php if ($_smarty_tpl->tpl_vars['publica']->value == "0") {?> selected='selected'<?php }?> value="0">No</option>
      </select>
      (Valor en S&iacute; permite activar la temporada)</td>
  </tr>
  
  <tr>
    <td colspan="3"><div  class="division2"></div></td>
  </tr>
    
  <tr>
    <td colspan="3" class="titulo_promo">Configurar Suplementos</td>
  </tr>
  
  <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['suplementos']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
  <tr class='listado_a'>
    <td colspan="2"><input type="checkbox" name="suplemento1" id="suplemento1" /> 
      <?php echo $_smarty_tpl->tpl_vars['suplementos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_sup'];?>
 
        <input name="noche_a" type="text" id="noche_a" value="<?php echo $_smarty_tpl->tpl_vars['noche_a']->value;?>
" size="11" maxlength="10"/>
noches
<input name="porcentaje_a" type="text" id="porcentaje_a" value="<?php echo $_smarty_tpl->tpl_vars['porcentaje_a']->value;?>
" size="11" maxlength="10"/>
% </td>
    <td align="center" width="40"><a href="#" title="<?php echo $_smarty_tpl->tpl_vars['suplementos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['descripcion_sup'];?>
"><img class="opacidad" src="/imagenes/ayuda2.png" width="20" height="20" align="absmiddle" alt="<?php echo $_smarty_tpl->tpl_vars['suplementos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['descripcion_sup'];?>
" /></a></td>
  </tr>
  <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
  
  <tr>
    <td colspan="3"><div  class="division2"></div></td>
  </tr>
    
  <tr class='listado_a'>
    <td colspan="2"><input type="checkbox" name="suplemento1" id="suplemento1" /> 
      Descuento después de 
        <input name="noche_a" type="text" id="noche_a" value="<?php echo $_smarty_tpl->tpl_vars['noche_a']->value;?>
" size="11" maxlength="10"/>
noches
<input name="porcentaje_a" type="text" id="porcentaje_a" value="<?php echo $_smarty_tpl->tpl_vars['porcentaje_a']->value;?>
" size="11" maxlength="10"/>
% </td>
    <td align="center" width="40"><a href="#"><img class="opacidad" src="/imagenes/ayuda2.png" width="20" height="20" align="absmiddle" /></a></td>
  </tr>
  
  <tr class='listado_b'>
    <td colspan="2"><input type="checkbox" name="suplemento2" id="suplemento2" /> 
      Descuento 
        <input name="porcentaje_b" type="text" id="porcentaje_b" value="<?php echo $_smarty_tpl->tpl_vars['porcentaje_b']->value;?>
" size="11" maxlength="10"/>
        % a partir 
        <input name="noche_b" type="text" id="noche_b" value="<?php echo $_smarty_tpl->tpl_vars['noche_b']->value;?>
" size="11" maxlength="10"/>
noche.</td>
    <td align="center"><a href="#"><img class="opacidad" src="/imagenes/ayuda2.png" width="20" height="20" align="absmiddle" /></a></td>
  </tr>
  <tr class='listado_a'>
    <td colspan="2"><input type="checkbox" name="suplemento3" id="suplemento3" />
      Mínimo de 
        <input name="noche_c" type="text" id="noche_c" value="<?php echo $_smarty_tpl->tpl_vars['noche_c']->value;?>
" size="11" maxlength="10"/>
        noches para poder reservar.</td>
    <td align="center"><a href="#"><img class="opacidad" src="/imagenes/ayuda2.png" width="20" height="20" align="absmiddle" /></a></td>
    </tr>
  <tr class='listado_b'>
    <td colspan="2"><input type="checkbox" name="suplemento4" id="suplemento4" />
      Política de fines de semana 
      <select name="findesemana" id="findesemana">
        <option <?php if ($_smarty_tpl->tpl_vars['findesemana']->value == "1") {?> selected='selected'<?php }?> value="1">Viernes a Sábado</option>
        <option <?php if ($_smarty_tpl->tpl_vars['findesemana']->value == "2") {?> selected='selected'<?php }?> value="2">Viernes a Domingo</option>
        <option <?php if ($_smarty_tpl->tpl_vars['findesemana']->value == "3") {?> selected='selected'<?php }?> value="3">Jueves a Domingo</option>
      </select></td>
    <td align="center"><a href="#"><img class="opacidad" src="/imagenes/ayuda2.png" width="20" height="20" align="absmiddle" /></a></td>
    </tr>
    
    <tr class='listado_a'>
    <td colspan="2"><input type="checkbox" name="suplemento5" id="suplemento5" /> 
      Noche gratis  entre 
        <input name="noche_d_desde" type="text" id="noche_d_desde" value="<?php echo $_smarty_tpl->tpl_vars['noche_d_desde']->value;?>
" size="11" maxlength="10"/>
a 
<input name="noche_d_hasta" type="text" id="noche_d_hasta" value="<?php echo $_smarty_tpl->tpl_vars['noche_d_hasta']->value;?>
" size="11" maxlength="10"/> 
noches.</td>
    <td align="center"><a href="#"><img class="opacidad" src="/imagenes/ayuda2.png" width="20" height="20" align="absmiddle" /></a></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td colspan="2"><input name="envio" type="submit" class="componentes" id="button2" onclick="javascript: return confirmar('&iquest;Est&aacute; seguro que desea guardar?');" value="Guardar" />
      &nbsp;
      <input type="button" name="Submit"  class="normalContenido" value="Cancelar" onclick="javascripts: location.href='/admin/hotel/detalle.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#tarifas<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
'" /></td>
      
      <td><input name="id" type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" /></td>
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

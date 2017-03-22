<?php
/* Smarty version 3.1.30, created on 2017-03-14 04:36:37
  from "D:\Websites\tibisay\smarty\templates\admin\hotel\formulario_rangos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c76545cf4a25_54440154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baf73ed6aa18bd4a5ef8760b1cff6981a7128bcb' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\hotel\\formulario_rangos.tpl',
      1 => 1489462457,
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
function content_58c76545cf4a25_54440154 (Smarty_Internal_Template $_smarty_tpl) {
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
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
          <tr>
            <th align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<img src="/imagenes/cuadritos.png" width="37" height="11" align="right" /></th>
          </tr>
          <tr>
            <td align="right" class="tituloWeb"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
              <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

                  
                
                  <tr>
                    <td class="titulo_promo" colspan="5">Rangos para Niños:</td>
                    <td align="right" class="titulo_promo" colspan="2">Comisionables:</td>
                    <td align="center" class="titulo_promo"><input type="checkbox" name="comisionable" id="comisionable" /></td>
                  </tr>
                  <tr>
                  	<td width="20%">Categoría</td>
                    <td width="10%">Edad Min</td>
                    <td width="10%">Edad Max</td>
                    <td width="20%">Tipo</td>
                    <td width="10%">Tarifa</td>
                    <td width="10%">Weekend</td>
                    <td colspan="2" width="10%" align="center">Acciones</td>
                  </tr>
                  <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
                  <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['rangokids']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                  <form action="editar_rango.php" method="post" name="form<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
" id="form<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
">
                  <tr <?php if ($_smarty_tpl->tpl_vars['cont']->value == '0') {?> class='listado_a'
                    <?php $_smarty_tpl->_assignInScope('cont', 1);
?> 
                    <?php } else { ?> class='listado_b'
                    <?php $_smarty_tpl->_assignInScope('cont', 0);
}?>>
                    
                    <td class="subtituloWeb3">
                    	<select name="categoria_nuevo" id="categoria_nuevo" class="editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
">
                          <option <?php if ($_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_ran'] == "Infante") {?> selected='selected'<?php }?> value="Infante">Infante</option>
                          <option <?php if ($_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['etiqueta_ran'] == "Niño") {?> selected='selected'<?php }?> value="Niño">Niño</option>
                        </select></td>
                    <td class="subtituloWeb3"><input name="desde_nuevo" type="text" id="desde_nuevo" value="<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['min_ran'];?>
" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
" /></td>
                    <td class="subtituloWeb3"><input name="hasta_nuevo" type="text" id="hasta_nuevo" value="<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['max_ran'];?>
" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
" /></td>
                    <td>
                    	<select name="tipo_nuevo" id="tipo_nuevo" class="editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
">
                          <option <?php if ($_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['tipo_ran'] == "precio") {?> selected='selected'<?php }?> value="precio">Precio</option>
                          <option <?php if ($_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['tipo_ran'] == "porcentaje") {?> selected='selected'<?php }?> value="porcentaje">Porcentaje</option>
                        </select>
                	</td>
                    
                    <td>
                    	<input name="precio_nuevo" type="text" id="precio_nuevo" value="<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['precio_ran'];?>
" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
" />
                    </td>
                    
                    <td>
                    	<input name="weekend_nuevo" type="text" id="weekend_nuevo" value="<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['weekend_ran'];?>
" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" class="editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
" />
                    </td>
                    
                    <td width="30" align="center">
                	<img id="spinner_<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
"src="/imagenes/loading_back.gif" width="25" height="24" align="absmiddle" style="display: none;" />
                	</td>
                    
                	<td width="20" align="center">
                    	<a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" title="Eliminar Rango" href="eliminar_rango.php?temp=<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
=&del=<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a>
                    </td>
                    
                  </tr>
                  	<input name="id" type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
                    <input name="temp" type="hidden" id="temp" value="<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
" />
                    <input name="envio" type="hidden" id="envio" value="Guardar" />
                    <input name="del" type="hidden" id="del" value="<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
" />
                  	
                  </form>
                    
                    <?php echo '<script'; ?>
 type="text/javascript">
                        $('.editar_ajax<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
').blur(function(event) {
                        event.preventDefault();
                        console.log($("#form<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
").serialize())
                        
                        $("#spinner_<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
").show();
                        $.post("editar_rango.php", $("#form<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
").serialize())
                        
                        .done(function() {
                            $("#spinner_<?php echo $_smarty_tpl->tpl_vars['rangokids']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_ran'];?>
").hide();
                            console.log("esconder spinner");
                        });
                        
                        //console.log ("submit?");
                    });
                    <?php echo '</script'; ?>
>
                    
            
                  <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
                  
                  <tr bgcolor="#F2CFB1">
                  	<form action="insertar_rango.php" method="post" name="form_nuevo" id="form_nuevo">
                  	<td>
                    	<select name="categoria_nuevo" id="categoria_nuevo">
                          <option selected='selected' value="Infante">Infante</option>
                          <option value="Niño">Niño</option>
                    </select></td>
                    <td>
                    	<input name="desde_nuevo" type="text" id="desde_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    <td>
                    	<input name="hasta_nuevo" type="text" id="hasta_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    <td>
                    	<select name="tipo_nuevo" id="tipo_nuevo">
                          <option selected='selected' value="precio">Precio</option>
                          <option value="porcentaje">Porcentaje</option>
                        </select>
                	</td>
                    <td>
                    	<input name="precio_nuevo" type="text" id="precio_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    
                    <td>
                    	<input name="weekend_nuevo" type="text" id="weekend_nuevo" value="" size="11" maxlength="10" onkeypress="javascripts: return validarnum(event);" />
                    </td>
                    
                    <td>&nbsp;</td>
                    
                	<td align="center">
                    <input name="id" type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
                    <input name="temp" type="hidden" id="temp" value="<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
" />
                    <input name="envio" type="hidden" id="envio" value="Guardar" />
                    <a  onclick="javascript: return validar_insertar_rango('form_nuevo');" href="#" title="Insertar"><img  src="/imagenes/guardar.png" width="20" height="19" border="0" /></a></td>
                    </form>
                  </tr>
                  
                 
          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

            </table></td>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a title="Volver" href="/admin/hotel/detalle.php?temp=<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#tarifas<?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
">&nbsp;Volver <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

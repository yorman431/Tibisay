<?php
/* Smarty version 3.1.30, created on 2017-03-14 04:36:20
  from "D:\Websites\tibisay\smarty\templates\admin\hotel\detalle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c765340867c7_66571411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10fa307cc6ae4574a3bd2f53175487d8c8e00d13' => 
    array (
      0 => 'D:\\Websites\\tibisay\\smarty\\templates\\admin\\hotel\\detalle.tpl',
      1 => 1489462504,
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
function content_58c765340867c7_66571411 (Smarty_Internal_Template $_smarty_tpl) {
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
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
  <tr>
    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" /><?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td width="372" align="left" valign="top" class="subtituloWeb3">
    <table width="100%" border="0" cellpadding="0" cellspacing="4">
      <tr>
        <th colspan="2" align="center">Datos Principales</th>
        </tr>
      <tr>
        <td align="left" class="subtituloWeb3">Nombre:</td>
        <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>

          <div style="float:right; "><a title="Editar" href="/admin/hotel/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <img class="opacidad" src="/imagenes/editar.png" width="25" height="25" border="0" align="absmiddle" /></a></div></td>
      </tr>
      <tr>
    <td align="left" class="subtituloWeb3">Codigo:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['codigo']->value;?>
</td>
    </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Categoria:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
 <img border="0" align="absmiddle" src="/imagenes/<?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
.png" width="60" /></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Tipo de Tarifa:</td>
    <td class="adminContenido">Por <?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
  </tr>
  <tr>
    <td width="91" align="left" valign="top" class="subtituloWeb3">Pais:</td>
    <td width="310" class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
 <img border="0" align="absmiddle" src="/imagenes/banderas/<?php echo $_smarty_tpl->tpl_vars['bandera']->value;?>
.png" width="16" height="11" /></td>
    </tr>
  <tr>
    <td valign="top" align="left" class="subtituloWeb3">Estado:</td>
    <td class="adminContenido">
    	<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Ciudad:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>
</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Ubicaci&oacute;n:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['ubicacion']->value;?>
</td>
  </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Prioridad:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['prioridad']->value;?>
</td>
  </tr>
  <tr>
    <td valign="top" align="left" class="subtituloWeb3">Condiciones:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['condiciones']->value;?>
</td>
    </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Calves:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['claves']->value;?>
</td>
    </tr>
  <tr>
    <td align="left" class="subtituloWeb3">Publicar en Inicio:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['principal']->value;?>
</td>
    </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Vistas:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['vistas']->value;?>
</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Fecha de &Uacute;ltima Edici&oacute;n:</td>
    <td class="adminContenido"><?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="subtituloWeb3">Facilidades:</td>
    <td class="adminContenido">
      <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['facilidad']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
      <div class="fotos6">
        <?php if ($_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'] != '') {?>
        <img title="<?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_fac'];?>
" border="0" align="absmiddle" src="/imagenes/miniaturas/<?php echo $_smarty_tpl->tpl_vars['facilidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" class="opacidad" height="50" width="50" />
        <?php }?>
        </div>
      <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
      </td>
  </tr>
    </table></td>
    <td width="372" align="center" valign="top" class="adminContenido">
    <table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tr>
            <th align="center" colspan="4">Im&aacute;genes Asignadas</th>
          </tr>
          <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
          <?php if ($_smarty_tpl->tpl_vars['mensaje']->value == '') {?>
          <tr> <?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listado']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <td width="25%" align="center" bgcolor="#eeeeee" class="normalContenido2">
            <div id="gallery">
            <a href="/imagenes/<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
" ><img border="0" src="/imagenes/miniaturas/<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['directorio_image'];?>
" class="fotos" width="100" /></a></div><br />
              <?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['nombre_image'];?>
 <a onclick="javascript: return confirmar('&iquest;Esta seguro que desea borrar la imagen?');" href="../galeria/imagen_borrar.php?id=<?php echo $_smarty_tpl->tpl_vars['listado']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_image'];?>
&amp;back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&amp;tabla=hotel"><img border="0" src="/imagenes/eliminar.png" width="15" height="15" align="absmiddle" /></a></td>
            <?php $_smarty_tpl->_assignInScope('cont', $_smarty_tpl->tpl_vars['cont']->value+1);
?>
            <?php if ($_smarty_tpl->tpl_vars['cont']->value == 3) {?>
            <?php $_smarty_tpl->_assignInScope('cont', 0);
?> </tr>
          <tr> <?php }?>
            <?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?> </tr>
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

          <?php }?>
  <tr>
    <td colspan="4" align="center"><a href="../hotel/imagen.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" /> Insertar Imagen</a></td>
  </tr>
        </table>
    </td>
  </tr>
  <tr>
    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Descripci&oacute;n<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
  </tr>
  <tr>
    <td colspan="2" align="left"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</td>
    </tr>
  <tr>
    <th colspan="2" align="center"><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Ubicaci&oacute;n en Mapa<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
    </tr>
  <tr>
    <td colspan="2" align="center">
    	<?php echo $_smarty_tpl->tpl_vars['mapas']->value;?>

      <div id="map"></div>
      <br />
      </td>
  </tr>
  <tr>
    <th colspan="2" align="center"><a id="tarifas"></a><img src="/imagenes/cuadros.png" width="14" height="14" align="left" />Temporadas del <?php echo $_smarty_tpl->tpl_vars['nombres']->value;?>
<img src="/imagenes/cuadritos.png" alt="" width="37" height="11" align="right" /></th>
    </tr>
  <?php if ($_smarty_tpl->tpl_vars['mensaje2']->value == '') {?>
  <tr>
    <td colspan="2" align="center">
    	<?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['temporadas']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="normal">
    	      <tr>
    	        <td bgcolor="#CCCCCC" align="center"><a id="tarifas<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
"></a><?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['activa'] == "0") {?> <a onclick="javascript: return confirmar('&iquest; Seguro desea publicar &eacute;ste temporada?');" href="editar3	.php?id=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
&valor=1&back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Publicar"> <img src="/imagenes/no.png" width="20" height="20" border="0" /></a> <?php } else { ?> <a onclick="javascript: return confirmar('&iquest; Seguro desea ocultar &eacute;ste temporada?');" href="editar3.php?id=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
&valor=0&back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Ocultar"> <img src="/imagenes/si.png" width="20" height="20" border="0" /></a> <?php }?> </td>
    	        <td class="titulo_alt" colspan="8" bgcolor="#CCCCCC">
                <form action="editar_plan3.php" method="post" name="form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" id="form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
">
                <strong>Temporada Del
    	          <input readonly="readonly" class="interno_fecha editar_ajax3<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" type="text" name="desde" id="fecha_inicio<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['fecha_inicio'];?>
" />
                  <button id="f_btn1-<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
">...</button> 

    <?php echo '<script'; ?>
 type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "fecha_inicio<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
",
        trigger    : "f_btn1-<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
",
        onSelect   : function() { this.hide();
		
		$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").show();
				$.post("editar_temporada2.php", $("#form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").serialize())
				
				.done(function() {
					$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").hide();
					console.log("esconder spinner");
				});
				
				console.log ("submit?");
				
		 },
        showTime   : false,
        dateFormat : "%d/%m/%Y"
      });
    //]]><?php echo '</script'; ?>
>
    
    	          al
    	          <input readonly="readonly" class="interno_fecha editar_ajax3<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" type="text" name="hasta" id="fecha_fin<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['fecha_fin'];?>
" />
                  <button id="f_btn2-<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
">...</button> 

    
    <?php echo '<script'; ?>
 type="text/javascript">//<![CDATA[
      Calendar.setup({
        inputField : "fecha_fin<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
",
        trigger    : "f_btn2-<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
",
        onSelect   : function() { this.hide();
		
				$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").show();
				$.post("editar_temporada2.php", $("#form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").serialize())
				
				.done(function() {
					$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").hide();
					console.log("esconder spinner");
				});
				
				console.log ("submit?");
		 },
        showTime   : false,
        dateFormat : "%d/%m/%Y"
      });
    //]]><?php echo '</script'; ?>
>
    
    	          </strong> | Texto Alternativo:
    	          <input class="interno3 editar_ajax2<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" type="text" name="alternativo" id="alternativo" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['texto_alternativo'];?>
" />
                  
                  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" />
                  <input type="hidden" name="prioridad" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['orden'];?>
" />
                  <input type="hidden" name="publica" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['activa'];?>
" />
                  <input type="hidden" name="envio" value="Guardar" />
                  
                  <input type="hidden" name="desde_a" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['edadNinosDesde1'];?>
" />
                  <input type="hidden" name="hasta_a" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['edadNinosHasta1'];?>
" />
                  <input type="hidden" name="precio_a" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['precio_ninos'];?>
" />
                  
                  <input type="hidden" name="desde_b" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['edadNinosDesde2'];?>
" />
                  <input type="hidden" name="hasta_b" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['edadNinosHasta2'];?>
" />
                  <input type="hidden" name="precio_b" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['precio_ninos2'];?>
" />
                  
                  </form>
                  
                  
    
    <?php echo '<script'; ?>
 type="text/javascript">
    $('.editar_ajax2<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
').blur(function(event) {
		event.preventDefault();
		console.log($("#form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").serialize())
		
		$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").show();
		$.post("editar_temporada2.php", $("#form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").serialize())
		
		.done(function() {
			$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").hide();
			console.log("esconder spinner");
		});
		
		console.log ("submit?");
	});
	
    <?php echo '</script'; ?>
>
	
    
                  </td>
                  <td bgcolor="#CCCCCC"><img id="spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
"src="/imagenes/loading_back.gif" width="25" height="24" align="absmiddle" style="display: none;" /></td>
                
    	        <td bgcolor="#CCCCCC" align="center" width="30"><a href="editar_temporada.php?id=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" title="Editar"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
    	        <td bgcolor="#CCCCCC" align="center" width="30"><a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar_temporada.php?temp=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Eliminar"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a></td>
  	        </tr>
            <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rangokids'] != '') {?>
            <tr  bgcolor="#eee">
            	<td colspan="10" class="titulo_alt">
                     <?php
$__section_j_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$__section_j_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rangokids']) ? count($_loop) : max(0, (int) $_loop));
$__section_j_3_total = $__section_j_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_3_total != 0) {
for ($__section_j_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_3_iteration <= $__section_j_3_total; $__section_j_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                	 <?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rangokids'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['etiqueta_ran'];?>
 de <?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rangokids'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['min_ran'];?>
 a <?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rangokids'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['max_ran'];?>
 a&ntilde;os, Bs. <?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rangokids'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['precio_ran'];?>
 |
                     <?php
}
}
if ($__section_j_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_3_saved;
}
?>
                </td>
                <td colspan="2" align="center"><a href="lista_rangos.php?temp=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Tarifas Niños"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
            </tr>
            <?php } else { ?>
            	<tr>
                	<td colspan='10' align='center' class='error'>No hay rango de tarifas de ni&ntilde;os asignadas a esta temporada!</td>
                    <td colspan="2" align="center" class='error'><a href="lista_rangos.php?temp=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="Tarifas Niños"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a></td>
                </tr>
            <?php }?>
    	      <tr>
    	        <td width="10" align="center" class="subtituloWeb3">P&uacute;blico</td>
    	        <td width="20" class="subtituloWeb3">N&ordm; Adultos</td>
    	        <td width="90" class="subtituloWeb3">Habitaci&oacute;n</td>
                <td width="80" class="subtituloWeb3">R&eacute;gimen</td>
    	        <td width="80" class="subtituloWeb3">Pax Adicional Max</td>
                <td width="80" class="subtituloWeb3">Precio Pax Adicional</td>
                <td width="80" class="subtituloWeb3">Tipo Tarifa</td>
    	        <td width="80" class="subtituloWeb3">Semana</td>
                <td width="80" class="subtituloWeb3">Fin Semana</td>
    	        <td width="50" class="subtituloWeb3">Orden</td>
    	        <td colspan="3" align="center" class="subtituloWeb3">Acciones</td>
  	        </tr>
    	      <?php if ($_smarty_tpl->tpl_vars['mensaje3']->value == '') {?>
    	      <?php $_smarty_tpl->_assignInScope('cont', 0);
?>
    	      <?php
$__section_j_4_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_j']) ? $_smarty_tpl->tpl_vars['__smarty_section_j'] : false;
$__section_j_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion']) ? count($_loop) : max(0, (int) $_loop));
$__section_j_4_total = $__section_j_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_4_total != 0) {
for ($__section_j_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_4_iteration <= $__section_j_4_total; $__section_j_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
              
    	    <tr <?php if ($_smarty_tpl->tpl_vars['cont']->value == '0') {?> class='listado_a'
        	<?php $_smarty_tpl->_assignInScope('cont', 1);
?> 
			<?php } else { ?> class='listado_b'
            <?php $_smarty_tpl->_assignInScope('cont', 0);
}?>>
              <form action="editar_plan2.php" method="post" name="form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" id="form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
">
    	        
    	        <td class="adminContenido" align="center"> <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['listar'] == "0") {?> <a onclick="javascript: return confirmar('&iquest; Seguro desea publicar &eacute;ste registro?');" href="editar2.php?id=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
&valor=1&back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&ancla=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" title="Publicar"> <img src="/imagenes/no.png" width="20" height="20" border="0" /></a> <?php } else { ?> <a onclick="javascript: return confirmar('&iquest; Seguro desea ocultar &eacute;ste registro?');" href="editar2.php?id=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
&valor=0&back=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&ancla=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" title="Ocultar"> <img src="/imagenes/si.png" width="20" height="20" border="0" /></a> <?php }?>
                </td>

    	        <td class="adminContenido">
                	<input onkeypress="javascript: return validarnum(event);" class="interno_corto editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="maxadultos" id="maxadultos" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['maxAdultos'];?>
" />
                </td>
                
                <td class="adminContenido">
                	<input class="interno editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="nombre_plan" id="nombre_plan" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['nombre'];?>
" />
                </td>
                
                <td class="adminContenido">
                	<select name="regimen_plan" id="regimen_plan" class="interno_select editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
">
                        <option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['regimen'] == "Todo Incluido") {?> selected='selected'<?php }?> value="Todo Incluido">Todo Incluido</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['regimen'] == "Solo Desayuno") {?> selected='selected'<?php }?> value="Solo Desayuno">Solo Desayuno</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['regimen'] == "Solo Hospedaje") {?> selected='selected'<?php }?> value="Solo Hospedaje">Solo Hospedaje</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['regimen'] == "Desayuno / Almuerzo / Cena") {?> selected='selected'<?php }?> value="Desayuno / Almuerzo / Cena">Desayuno / Almuerzo / Cena</option>
                        <option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['regimen'] == "Pension Completa") {?> selected='selected'<?php }?> value="Pension Completa">Pensi&oacute;n Completa</option>
                  	</select>
                </td>

                  <td class="adminContenido">
                      <input class="interno editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="maxAdc" id="maxAdc" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['maxNumPaxAdic'];?>
" />
                  </td>

                  <td class="adminContenido">
                      <input class="interno editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="precioAdc" id="precioAdc" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['precio_pax_adic'];?>
" />
                  </td>
                
                <td class="adminContenido">
                	<select name="tipotarifa_plan" id="tipotarifa_plan" class="interno_select editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
">
                    	<option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['tipotarifa'] == "Persona") {?> selected='selected'<?php }?> value="Persona">Persona</option>
                    	<option <?php if ($_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['tipotarifa'] == "Habitacion") {?> selected='selected'<?php }?> value="Habitacion">Habitaci&oacute;n</option>
                    </select>
                </td>
                
    	        <td class="adminContenido">Bs.
    	          <input onkeypress="javascript: return validarnum(event);" class="interno_precio editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="precio_plan" id="precio_plan" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['precio'];?>
" />
                </td>
                
                <td class="adminContenido">Bs.
    	          <input onkeypress="javascript: return validarnum(event);" class="interno_precio editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="weekend_plan" id="weekend_plan" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['weekend'];?>
" />
                </td>
                
    	        <td class="adminContenido">
                	<input onkeypress="javascript: return validarnum(event);" class="interno_precio editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" type="text" name="prioridad" id="prioridad" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['orden'];?>
" />
                </td>
                
    	        <td width="30" align="center">
                	<img id="spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
"src="/imagenes/loading_back.gif" width="25" height="24" align="absmiddle" style="display: none;" />
                </td>
                
    	        <td width="30" align="center">
                	<a href="editar_plan.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&temp=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
&val=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" title="Editar"><img src="/imagenes/editar.png" width="25" height="25" border="0" /></a>
                </td>
                
    	        <td width="30" align="center">
                	<a onclick="javascript: return confirmar('&iquest;Seguro desea eliminar este registro?')" href="eliminar_plan.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&temp=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
&plan=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" title="Eliminar"><img src="/imagenes/delete.png" width="25" height="25" border="0" /></a>
    	          <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
                  <input type="hidden" name="temporada" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
" />
                  <input type="hidden" name="envio" value="Guardar" />
                  <input type="hidden" name="publica" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['listar'];?>
" />
    	        </td>
              </form>
            
            <?php echo '<script'; ?>
 type="text/javascript">
                $('.editar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
').blur(function(event) {
                event.preventDefault();
                console.log($("#form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
").serialize())
                
                $("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
").show();
                $.post("editar_plan2.php", $("#form<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
").serialize())
                
                .done(function() {
                    $("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['habitacion'][(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['id'];?>
").hide();
                    console.log("esconder spinner");
                });
                
                //console.log ("submit?");
            });
            <?php echo '</script'; ?>
>
            
  	        </tr> 
            
    	      <?php
}
}
if ($__section_j_4_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_j'] = $__section_j_4_saved;
}
?>
    	      <?php } else { ?>
    	      <?php echo $_smarty_tpl->tpl_vars['mensaje3']->value;?>

    	      <?php }?>
              <tr bgcolor="#F2CFB1">
              <form action="insertar_plan2.php" method="post" name="form_nuevo<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" id="form_nuevo<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
">
    	        
    	          <td align="center" class="adminContenido">
                  	<img src="/imagenes/nuevo.png" width="22" height="22" border="0" align="absmiddle" />
                  </td>

    	          <td class="adminContenido">
                	<input onkeypress="javascript: return validarnum(event);" class="interno_corto" type="text" name="maxadultos" id="maxadultos<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Num" />
                  </td>
                  
                  <td class="adminContenido">
                  	<input class="interno" type="text" name="nombre_plan" id="nombre_plan<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Nombre" />
                  </td>
                  
                  <td class="adminContenido">
                    <select name="regimen_plan" id="regimen_plan<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" class="interno_select">
                        <option selected='selected' value="Todo Incluido">Todo Incluido</option>
                        <option value="Solo Desayuno">Solo Desayuno</option>
                        <option value="Solo Hospedaje">Solo Hospedaje</option>
                        <option value="Desayuno / Almuerzo / Cena">Desayuno / Almuerzo / Cena</option>
                        <option value="Pension Completa">Pensi&oacute;n Completa</option>
                      </select>
                  </td>

                  <td class="adminContenido">
                      <input class="interno" type="text" name="maxAdc" id="maxAdc<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Pax Adc. Max" />
                  </td>

                  <td class="adminContenido">
                      <input class="interno" type="text" name="precioAdc" id="precioAdc<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Precio Pax Adc" />
                  </td>
                
                  <td class="adminContenido">
                      <select name="tipotarifa_plan" id="tipotarifa_plan<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" class="interno_select">
                        <option selected='selected' value="Persona">Persona</option>
                        <option value="Habitacion">Habitaci&oacute;n</option>
                      </select>
                  </td>
                
    	          <td class="adminContenido">Bs. 
    	          	<input onkeypress="javascript: return validarnum(event);" class="interno_precio" type="text" name="precio_plan" id="precio_plan<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Precio" />
                  </td>
                  
                  <td class="adminContenido">Bs. 
    	          	<input onkeypress="javascript: return validarnum(event);" class="interno_precio" type="text" name="weekend_plan" id="weekend_plan<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Precio" />
                  </td>
                  
    	          <td class="adminContenido"><input onkeypress="javascript: return validarnum(event);" class="interno_precio" type="text" name="prioridad" id="prioridad<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" value="" placeholder="Num" /></td>
    	       <td width="30" align="center">
                
                <img id="spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"src="/imagenes/loading_back.gif" width="22" height="21" align="absmiddle" style="display: none;" /></td>
    	        <td width="30" align="center">
                
                <a  onclick="return validar_insertar_plan(<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
);" href="#tarifas<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" title="Insertar"><img  src="/imagenes/guardar.png" width="25" height="24" border="0" /></a>
                
                </td>
    	        <td width="30" align="center"><!-- class="insertar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" -->
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
                  <input type="hidden" name="temporada" value="<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" />
                  <input type="hidden" name="envio" value="Guardar" />
                  <input type="hidden" name="publica" value="1" />
                  
    	        </td>
              </form>
              
                <?php echo '<script'; ?>
 type="text/javascript">
				$('.insertar_ajax<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
').click(function(event) {
					event.preventDefault();
					console.log($("#form_nuevo<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").serialize())
					
					$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").show();
					$.post("insertar_plan2.php", $("#form_nuevo<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").serialize())
					
					.done(function() {
						$("#spinner_<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
").hide();
						console.log("esconder spinner");
					});
					
					//console.log ("submit?");
				});
				<?php echo '</script'; ?>
>
              
              </tr>
  <tr>
    <td colspan="12" align="center"><a href="insertar_plan.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&temp=<?php echo $_smarty_tpl->tpl_vars['temporadas']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
">Insertar Plan <img src="/imagenes/dale.jpg" width="12" height="12" border="0" align="absmiddle" /></a></td>
  </tr>
  	      </table>
      <?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
      </td>
  </tr>
  <?php } else { ?>
        <?php echo $_smarty_tpl->tpl_vars['mensaje2']->value;?>

  <?php }?>
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
    <td width="50%" align="center"><!-- InstanceBeginEditable name="insetar" --><a title="Volver" href="/admin/hotel">&nbsp;Volver <img src="/imagenes/atras.png" width="25" height="25" border="0" align="absmiddle" /></a> &nbsp;&nbsp; <a title="Editar" href="/admin/hotel/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Editar <img src="/imagenes/editar.png" width="25" height="25" border="0" align="absmiddle" /></a> &nbsp;&nbsp; <a href="insertar_temporada.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Insertar Temporada <img src="/imagenes/nuevo.png" width="25" height="25" border="0" align="absmiddle" /></a><!-- InstanceEndEditable --></td>
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

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/index.php" class="navbar-brand hidden-xs"><img src="/imagenes/logo-navbar.png" alt=""></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="padding-top:17px;">
          {section name=i loop=$enlaces_B}

            <!--<li class="dropdown">
              <a title="{$enlaces_B[i].etiqueta_cat}" href="contenido.php?cont={$enlaces_B[i].id_cat}" class="dropdown-toggle" id="efecto" data-toggle="dropdown" role="button" aria-expanded="false">{$enlaces_B[i].icono_cat}&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">{$enlaces_B[i].nombre_cat}</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                {section name=j loop=$enlaces_B[i].enlaces}
                  <li><a class="transicion" title="{$enlaces_B[i].nombre_cat}" href="#{$enlaces_B[i].enlaces[j].nombre_sub}">{$enlaces_B[i].enlaces[j].nombre_sub}</a></li>
                {/section}
              </ul>
            </li>-->

              {if $enlaces_B[i].icono_cat neq ""}
                <li {if $enlaces_B[i].id_cat eq $activo}class="active"{/if}><a class="transicion" title="{$enlaces_B[i].etiqueta_cat}" {if $enlaces_B[i].etiqueta_cat eq "HOME"}href="/index.php"{else} href="/index.php/#{$enlaces_B[i].etiqueta_cat} {/if}" id="efecto">{$enlaces_B[i].icono_cat}&nbsp;&nbsp;<span style="vertical-align:bottom; letter-spacing:0.2em;">{$enlaces_B[i].nombre_cat}</span></a></li>
              {else}
                <li {if $enlaces_B[i].id_cat eq $activo}class="active"{/if}><a class="transicion" title="{$enlaces_B[i].etiqueta_cat}" {if $enlaces_B[i].etiqueta_cat eq "HOME"}href="/index.php"{else} href="/index.php/#{$enlaces_B[i].etiqueta_cat} "{/if} id="efecto">{$enlaces_B[i].nombre_cat}</a></li>
              {/if}

          {/section}
      </ul>
      <ul class="nav navbar-nav navbar-right hidden-xs">
        <li><a href=" https://www.facebook.com/tibisayhotelboutique/" target="_blank"><img src="/imagenes/facebook.png" alt="" height="50" width="50"></a></li>
        <li><a href="https://twitter.com/TibisayHotel"  target="_blank"><img src="/imagenes/twitter.png" alt="" height="50" width="50"></a></li>
        <li><a href="https://www.instagram.com/tibisayhotelboutique/" target="_blank"><img src="/imagenes/instagram.png" alt="" height="50" width="50"></a></li>
      </ul>
    </div>
  </div>
</nav>

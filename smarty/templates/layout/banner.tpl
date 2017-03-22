<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  {assign var="cont" value=0}
  {section name=i loop=$banner}
    <li data-target="#myCarousel" data-slide-to="{$cont}" {if $cont eq "0"}class="active"{/if}></li>
  {assign var="cont" value=$cont+1}
  {/section}
  </ol>

  <div class="carousel-inner" role="listbox">

  {assign var="cont" value=0}
  {section name=i loop=$banner}
    <div {if $cont eq "0"}class="item active"{else}class="item"{/if}>
      <img class="img-responsive" alt="{$banner[i].etiqueta_ban}" src="/imagenes/banner/{$banner[i].url_ban}">
    </div>
  {assign var="cont" value=$cont+1}
  {/section}

  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.Banner -->

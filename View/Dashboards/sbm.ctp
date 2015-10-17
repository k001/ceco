<?php
//armo json:

/*para no poner ultima coma */
$i = 1;
$NumReg = count($arr);

$json = '[';
foreach ($arr as $key => $value) {
    $json .= $value;
    
    if(($NumReg ) <> $i){   /*para no poner ultima coma */ 
        $json .= ',';        
    }
    
    $i++;  
}

$json .= ']';

?>

<?php //print_r($json); die();?>

<script>
     var ar = <?php echo $json; ?>;
</script>

<?php
//cargo jss especificos
    echo $this->Html->script('../assets/js/custom');
    echo $this->Html->script('../assets/js/maps');
?>
                
<div class="ui-layout-center">
    <div id="view-holder" class="ui-layout-content">
      <div class="scroll-pane">
        <ul class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Mesa de Entrada</a></li>
        </ul>
        
        <h3 class="message-header"> .::Geo Padron C.E.C.O::. </h3>
        <button id="fullscreenb"><i class="icon-fullscreen"></i></button>
<!--
        <div class="dashTop">
            <div id="lineChart"></div>
        </div>
-->
        <!-- Seleccionar padron-->
        <div class="dashRow">
            <div class="row-fluid">
                <div class="span6">
                    <select id="select_padron" data-width="auto" title='Cambie de Padron' style="max-height: 20px;"> 
                       <?php 
                       $viendo = '';
                        foreach ($padrones_list as $clave => $value)
                           {
                               ($_GET['padron_id'] == $value['IndexPad']['id'])?$activo = 'selected':$activo = "";
                               echo '<OPTION '.$activo.' VALUE="'.$value['IndexPad']['id'].'">'.$value['IndexPad']['descripcion'].' ['.$value['IndexPad']['cant_registros'].' registros]'.'</OPTION>';
                               ($activo == 'selected')?$viendo =  $value['IndexPad']['descripcion']:'';
                           }   
                       ?>
                    </select>
                </div>
                <div class="span2">
                    <input type="button" class="btn" id="mostrar_padron" value="Mostrar Padron" />
                </div> 
                <br>
                <div class="span12">
                    <div class="radio">
                      <label>
                        <input type="radio" name="usardirecciones" id="opcion1" value="geo_base" checked>
                        <h5>Usar domicilios del padron Base del Sistema</h5>
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="usardirecciones" id="opcion2" value="propias">
                        <h5>Usar domicilios del padron seleccionado (puede que el mismo no este georeferenciado)</h5>
                      </label>
                    </div>
                </div>
   
            </div>
        </div>
        <!--//*************************************************************************************************************//-->
        
        <div class="dashRow">
            <div class="row-fluid">
                <div class="span12">
                    <h2 class="dashHead"><i class="icon-map-marker"></i> Viendo: <?= $viendo?>, <i style="clear: both; color:#004A95";>[<?=$total?> registros georefernciados]</i>
                        <div style="float:right;">
                            <input type="button" id="searchButton" value="Buscar" />
                            <input type="button" id="delButton" value="Limpiar" />
                            <input name="descripcion" id="descripcion" type="text" />
                            
                        </div>
                    </h2>
                    <div class="dashWidget">
                        <div id="map"></div>
                    </div>
                    <div id="results"></div>
                    
                    <div class="CSSTableGenerator" id="dvData">
                        <table id="tabla">
                            <!-- Cabecera de la tabla -->
                            <thead>
                                <tr>
                                    <th><h3>DNI</h3></th>
                                    <th><h3>Nombre</h3></th>
                                    <th><h3>Direccion</h3></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--aqui daos desde maps.js -->                        
                            </tbody>
                        </table>
                    </div>
                    <br/>
                    <input type="button" id="btnExport" value=" Exportar a Excel " />
                    
                </div>
            </div>
        </div>
        
        


      </div> <!-- END scroll-pane -->
    </div> <!-- END view-holder -->
        <div class="codeFooter">
            <button id="slideleftb" class="closed">Slide West</button>
            <button id="sliderightb" class="closed">Slide East</button> 
        </div>

</div> <!-- END Layout Center -->

<!-- MAP -->
<style>
  #map {
    height: 100%;
  }
</style>


<!--para exportar-->
<?php echo $this->html->css('dashboard/sbm/exportar_excel'); ?>

    <script>
    $("#btnExport").click(function(e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
        e.preventDefault();
    });
    
    $('#mostrar_padron').click(function(e){
        window.location.href = '?padron_id='+$('#select_padron').val()+'&usardirecciones='+ $("input[name='usardirecciones']:checked").val();
        e.preventDefault();
    });
    
    //iniciar mapa
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<!--fin exportar a excel-->



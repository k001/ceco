<div class="ui-layout-center">
    <div id="view-holder" class="ui-layout-content">
      <div class="scroll-pane">
        <ul class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Mesa de Entrada</a></li>
        </ul>
        <h1 class="message-header">Panel Principal</h1>
        <button id="fullscreenb"><i class="icon-fullscreen"></i></button>
<!--
        <div class="dashTop">
            <div id="lineChart"></div>
        </div>
-->

        <div class="dashRow">
            <div class="row-fluid">
                <div class="span12">
                    <h2 class="dashHead"><i class="icon-map-marker"></i> Olavarria:</h2>
                    <div class="dashWidget">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        
        

        <div class="dashRow">
            <div class="row-fluid">
                <div class="span6">
                    <h2 class="dashHead"><i class="icon-user"></i> Usuarios:</h2>
                    <div class="dashWidget">
                        
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#4" data-toggle="tab">Administradores</a></li>
                          <li><a href="#5" data-toggle="tab">Usuarios</a></li>
                        </ul>
                        <div class="tab-content ui-layout-content">
                            <div class="tab-pane active" id="4">
                                <ul>
                                    <?php foreach ($usuarios as $key => $value) { ?>
                                    <li>
                                      <img src="img/avatar-profile.png" /> <?php echo $value['users']['nombre']; ?> <span>Modificado: <?php echo $value['users']['modified']; ?></span>
                                    </li>
                                    <?php }; ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="5">
                                <ul>
                                    <li>
                                      No se han creado usuarios.
                                    </li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="span6">
                    <h2 class="dashHead"><i class="icon-list-alt"></i>Padrones Cargados:</h2>
                    <div class="dashWidget">
                        <table class="display" id="data-table">
                        <thead>
                            <tr>
                                <th>Padron</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Descripcion</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td>Afiliados Ceco</td>
                                <td>7585</td>
                                <td>23/08/2015</td>
                                <td class="center">Padron de afiliados activos</td>
                                <td class="center">Pablo Gonzalez</td>
                            </tr>
                            <tr class="even gradeC">
                                <td>De Baja</td>
                                <td>7585</td>
                                <td>23/08/2015</td>
                                <td class="center">Padron de afiliados de Baja</td>
                                <td class="center">Mariela</td>
                            </tr>
                            <tr class="odd gradeA">
                                <td>Ocecac</td>
                                <td>7585</td>
                                <td>23/08/2015</td>
                                <td class="center">Afiliados a OCECAC</td>
                                <td class="center">Mariela</td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Padron</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Descripcion</th>
                                <th>Admin</th>
                            </tr>
                        </tfoot>
                    </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="pagination">
            <ul>
              <li class="disabled"><a href="#">&laquo;</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
        --> 
      </div> <!-- END scroll-pane -->
    </div> <!-- END view-holder -->
        <div class="codeFooter">
            <button id="slideleftb" class="closed">Slide West</button>
      <!--
      <div class="styleSwitch">
        <span>Theme Colors: </span>
        <a href="#" class="grey-box styleBox"
        onclick="setActiveStyleSheet('default'); 
        return false;">default</a>
        <a href="#" class="blue-box styleBox"
        onclick="setActiveStyleSheet('blue'); 
        return false;">blue</a>
        <a href="#" class="orange-box styleBox"
        onclick="setActiveStyleSheet('orange'); 
        return false;">orange</a>
        <a href="#" class="pink-box styleBox"
        onclick="setActiveStyleSheet('pink'); 
        return false;">pink</a>
        <a href="#" class="green-box styleBox"
        onclick="setActiveStyleSheet('green'); 
        return false;">green</a>
        <a href="#" class="black-box styleBox"
        onclick="setActiveStyleSheet('black'); 
        return false;">black</a>
        <a href="#" class="grey-box light-box styleBox"
        onclick="setActiveStyleSheet('grey-light'); 
        return false;">default</a>
        <a href="#" class="blue-box light-box styleBox"
        onclick="setActiveStyleSheet('blue-light'); 
        return false;">blue</a>
        <a href="#" class="orange-box light-box styleBox"
        onclick="setActiveStyleSheet('orange-light'); 
        return false;">orange</a>
        <a href="#" class="pink-box light-box styleBox"
        onclick="setActiveStyleSheet('pink-light'); 
        return false;">pink</a>
        <a href="#" class="green-box light-box styleBox"
        onclick="setActiveStyleSheet('green-light'); 
        return false;">green</a>
        <a href="#" class="black-box light-box styleBox"
        onclick="setActiveStyleSheet('black-light'); 
        return false;">black</a>
      </div>
      -->
            <button id="sliderightb" class="closed">Slide East</button> 
        </div>

</div> <!-- END Layout Center -->


<!-- MAP -->
<style>
  #map {
    height: 100%;
  }
</style>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"async defer></script>    
<script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -36.8899216, lng: -60.3066461},
        zoom: 14
      });
    }
</script>
        
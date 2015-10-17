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

<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
               <!-- <div class="brand">
                    <a href="index-directory.html"><img src="../assets/img/logo.png" alt="logo"></a>
                </div>-->
                <nav class="navigation-items">
                    <div class="wrapper">
                        <ul class="main-navigation navigation-top-header"></ul>
                        <!--<ul class="user-area">
                            <li><a href="sign-in.html">Sign In</a></li>
                            <li><a href="register.html"><strong>Register</strong></a></li>
                        </ul>-->
                       <!-- <a href="submit.html" class="submit-item">
                            <div class="content"><span>Submit Your Item</span></div>
                            <div class="icon">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>-->
                        <div class="toggle-navigation">
                            <div class="icon">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end Navigation-->
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Off Canvas Navigation-->
            <nav class="off-canvas-navigation">
                <header>Navigation</header>
                <div class="main-navigation navigation-off-canvas"></div>
            </nav>
            <!--end Off Canvas Navigation-->
            <!--Page Content-->
            <div id="page-content">
                
                    <div class="search-bar horizontal">
                        <form class="main-search border-less-inputs" role="form" method="post">
                            <div class="input-row">
                                <div class="form-group">
                                    <select name="category" multiple title="Seleccione Filtros" data-live-search="true">
                                        <option value="1">Circuitos</option>
                                        <option value="2" class="sub-category">711</option>
                                        <option value="3" class="sub-category">711A</option>
                                        <option value="4" class="sub-category">711B</option>
                                        <option value="4" class="sub-category">719</option>
                                        <option value="5">Afiliados al PJ</option>
                                        <option value="6">Locallidad</option>
                                        <option value="7" class="sub-category">Olavarria</option>
                                        <option value="8" class="sub-category">Sierra Chica</option>
                                        <option value="9" class="sub-category">Hinojo</option>
                                        <option value="10">Percepcion</option>
                                        <option value="11" class="sub-category">Buena</option>
                                        <option value="12" class="sub-category">Regular</option>
                                        <option value="13" class="sub-category">Mala</option>
                                        <option value="14">Sexo</option>
                                        <option value="15" class="sub-category">Masculino</option>
                                        <option value="16" class="sub-category">Femenino</option>
                                        <option value="17">Limite de Resultados</option>
                                        <option value="18" class="sub-category">1000</option>
                                        <option value="19" class="sub-category">5000</option>   
                                        <option value="20" class="sub-category">10000</option>                                     
                                    </select>
                                </div>
                                
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <button id="searchButton" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    <button id="delButton" type="button" class="btn btn-default"><i class="fa fa-del"></i>Borrar</button>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="descripcion" name="descripcion" />
                                  <div id="ultimo">ultimo</div>
                                </div>    
                                <!-- /.form-group -->
                            </div>
                            <!-- /.input-row -->
                        </form>
                        <!-- /.main-search -->
                    </div>                
                
                
                
            <!-- Map Canvas-->
            <div id="map-canvas" class="map-canvas list-width-30">
                <!-- Map -->
                <div class="map">
                    <div class="toggle-navigation">
                        <div class="icon">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <!--/.toggle-navigation-->
                    <div id="map" class="has-parallax"> </div>
                    <!--/#map-->

                </div>
                <!-- end Map -->
                
                
                
                
                <!--Items List-->
                <div class="items-list mCustomScrollbar _mCS_1">
                    <div class="inner">
                        <header>
                            <h3 id="results">Resultados: </h3>
                        </header>
                        <hr>
                        <div id="filtros">
                            <h3>Filtros</h3>   
                            
                            
                        </div>
                        
                        <hr>
                        <h3>Lista:</h3>
                        <ul id="encontrados" class="results list">

                        </ul>
                    </div>
                    <!--results-->
                </div>
                <!--end Items List-->
            </div>
            <!-- end Map Canvas-->

            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->

    </div>
    <!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->




<!--para exportar-->

<style>
.CSSTableGenerator {
    margin:0px;padding:0px;
    width:100%;
    box-shadow: 10px 10px 5px #888888;
    border:1px solid #000000;
    
    -moz-border-radius-bottomleft:0px;
    -webkit-border-bottom-left-radius:0px;
    border-bottom-left-radius:0px;
    
    -moz-border-radius-bottomright:0px;
    -webkit-border-bottom-right-radius:0px;
    border-bottom-right-radius:0px;
    
    -moz-border-radius-topright:0px;
    -webkit-border-top-right-radius:0px;
    border-top-right-radius:0px;
    
    -moz-border-radius-topleft:0px;
    -webkit-border-top-left-radius:0px;
    border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
    width:100%;
    height:100%;
    margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
    -moz-border-radius-bottomright:0px;
    -webkit-border-bottom-right-radius:0px;
    border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
    -moz-border-radius-topleft:0px;
    -webkit-border-top-left-radius:0px;
    border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
    -moz-border-radius-topright:0px;
    -webkit-border-top-right-radius:0px;
    border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
    -moz-border-radius-bottomleft:0px;
    -webkit-border-bottom-left-radius:0px;
    border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
    
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#e5e5e5; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
    vertical-align:middle;
    
    
    border:1px solid #000000;
    border-width:0px 1px 1px 0px;
    text-align:left;
    padding:7px;
    font-size:10px;
    font-family:Arial;
    font-weight:normal;
    color:#000000;
}.CSSTableGenerator tr:last-child td{
    border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
    border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
    border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
        background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
    background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");  background: -o-linear-gradient(top,#cccccc,b2b2b2);

    background-color:#cccccc;
    border:0px solid #000000;
    text-align:center;
    border-width:0px 0px 1px 1px;
    font-size:14px;
    font-family:Arial;
    font-weight:bold;
    color:#000000;
}
.CSSTableGenerator tr:first-child:hover td{
    background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
    background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");  background: -o-linear-gradient(top,#cccccc,b2b2b2);

    background-color:#cccccc;
}
.CSSTableGenerator tr:first-child td:first-child{
    border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
    border-width:0px 0px 1px 1px;
}
</style>

    <div class="CSSTableGenerator" id="dvData">
        <table id="tabla">
            <!-- Cabecera de la tabla -->
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Nombre Escuela</th>
                    <th>Domicilio Escuela</th>
                    <th>Mesa</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                
        
        
            </tbody>
        </table>
    </div>
    
    
    
    <br/>
    <input type="button" id="btnExport" value=" Exportar a Excel " />
 
    <script>
    $("#btnExport").click(function(e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
        e.preventDefault();
    });
    </script>
            

        




<script>
 //levanto barrio del input para listado
google.maps.event.addDomListener(window, 'load', initialize);

</script>





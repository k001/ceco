<div class="ui-layout-center">
    <div id="view-holder" class="ui-layout-content">
          <div class="scroll-pane">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Padrones</a></li>
                <li><a href="#">Editar Padron</a></li>
            </ul>
          
            <button id="fullscreenb"><i class="icon-fullscreen"></i></button>
    
            <div class="dashRow">
                <div class="row-fluid">
                    <div class="span12">
                        <h2 class="dashHead">Editando a <?=$persona['nombre'].' '.$persona['apellido'].' '.$persona['dni'];?>:
                        <div style="float:right;">
                            <!--<i class="icon-user"></i>-->
                        </div>
                        </h2>
                        <div class="dashWidget">

                            <form action="./" method="get" enctype="application/x-www-form-urlencoded">
                               <label for="nombre">Nombre</label><input type="text" name="nombre" value="<?=$persona['nombre'];?>" />
                               <label for="apellido">Apellido</label><input type="text" name="apellido" value="<?=$persona['apellido'];?>" /> 
                               <label for="pcia">Provincia</label><input type="text" name="pcia" value="<?=$persona['pcia'];?>" /> 
                               <label for="localidad">Localidad</label><input type="text" name="localidad" value="<?=$persona['localidad'];?>" />  
                               <label for="domicilio">Domicilio</label><input type="text" name="domicilio" value="<?=$persona['domicilio'];?>" />  
                               
                               <label for="piso">Piso</label><input type="text" name="piso" value="<?=$persona['piso'];?>" />
                               <label for="sexo">Sexo</label><input type="text" name="sexo" value="<?=$persona['sexo'];?>" />
                               <label for="telfijo">Telefono Fijo</label><input type="text" name="telfijo" value="<?=$persona['telfijo'];?>" />
                               <label for="telmovil">Telefono Movil</label><input type="text" name="telmovil" value="<?=$persona['telmovil'];?>" />
                               <label for="email">Email</label><input type="text" name="email" value="<?=$persona['email'];?>" />
                               <label for="nacimiento">Fecha de Nacimiento</label><input type="date" name="nacimiento" value="<?=$persona['nacimiento'];?>" />
                               
                               <label for="observaciones">Observaciones</label><textarea name="observaciones"><?=$persona['observaciones'];?></textarea>  
                               <label for="latitude">Latitud</label><input type="text" name="latitude" value="<?=$persona['latitude'];?>" />
                               <label for="longitude">Longitud</label><input type="text" name="longitude" value="<?=$persona['longitude'];?>" />
                               <label for="georeferenciado">Georeferenciado (s/n)</label><input type="text" name="georeferenciado" value="<?=$persona['georeferenciado'];?>" />
                               <input type="hidden" name="update" value="1"/>
                               <input type="hidden" name="dni" value="<?=$_GET['dni']; ?>" />
                               <input type="hidden" name="idpad" value="<?=$_GET['idpad']?>" />
                                <hr>
                                <input type="submit" value="Guardar" class="btn" />
                                <br><br>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="codeFooter">
            <button id="slideleftb" class="closed">Slide West</button>
            <button id="sliderightb" class="closed">Slide East</button> 
        </div>
    </div>
</div>   
<div class="ui-layout-center">
    <div id="view-holder" class="ui-layout-content">
          <div class="scroll-pane">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Listado de Usuario</a></li>
            </ul>
          
            <button id="fullscreenb"><i class="icon-fullscreen"></i></button>
    
            <div class="dashRow">
                <div class="row-fluid">
                    <div class="span12">
                        <h2 class="dashHead">Importar Padron:
                       <!-- <div style="float:right;">
                            <i class="icon-user"></i><?php echo $this->Html->link('Nuevo Usuario',array('controller' => 'users', 'action' => 'add'), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                        </div>-->
                        </h2>
                        <div class="dashWidget">
                            
                            <form name="formid" id="formid" method="post" action="vista/" enctype="multipart/form-data" onsubmit="return validar();">
                                <div class="form-group">
                                    <label for="archivo"><p>Archivo .CSV</p>
                                        <input type="file" name="archivo" id="archivo" class="form-control">
                                    </label>
                                    <label for="button">
                                        <button>Subir</button>
                                    </label>
                                </div>
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


<script>
$(function(){ 
    $('#sort').dataTable(); 
    $('[title]').tooltip(); 
}); 
function validar(){

    if(confirm("Esta seguro que desea importar el archivo?")){
        /**
         * verificamos si se selecciono algun archivo
         */
        if($("#archivo").val()==""){
            alert("Seleccione un archivo .csv");
            return false;
        }
        var nombreArchivo=$("#archivo").val().split(".");//recuperamos la extension del archivo a subir
        /**
         * verificamos si la extension es .csv
         */
        if(nombreArchivo[nombreArchivo.length-1]!="csv"){
            alert("ARCHIVO NO VALIDO");
            return false;
        }
    return true;
    }
    else{
        return false;
    }
}
</script> 
<?php
    require_once("/importar_padron/db.php");
    $db = new DB();

    $sql = "SHOW TABLES";
    $tables = $db->execute($sql);

    $object = "Tables_in_".DB_NAME;

    while($row = $tables->fetch_object()){
        $rows[] = $row->$object;
    }
?>


<?php

echo $this->Html->script('../importar_padron/js/jquery.datatables.js');
echo $this->Html->script('../importar_padron/js/bootstrap-datatables.js');
echo $this->Html->script('../importar_padron/js/bootstrap.min.js');

?>





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
                        <h2 class="dashHead">Vista Padron Importado:
                       <!-- <div style="float:right;">
                            <i class="icon-user"></i><?php echo $this->Html->link('Nuevo Usuario',array('controller' => 'users', 'action' => 'add'), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                        </div>-->
                        </h2>
                        <div class="dashWidget">
                            
                            <h3>Detalle de lo Importado</h3>
                            <p id="subtitulo">A continuacion configure donde ingresaran los datos</p>
    
                                <table class="table table-bordered table-condensed">
                                <?php
                            
                                    //SI EL ARCHIVO SE ENVIA Y ADEMÃS SE SUBIO CORRECTAMENTE
                                    if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name']))
                                    {
                                     
                                        //SE ABRE EL ARCHIVO EN MODO LECTURA
                                        $fp = fopen($_FILES['archivo']['tmp_name'], "r");
                            
                                        //SE RECORRE
                                        $c=0;
                                        $cuantos = 0;
                            
                                        // Realizando Barrido
                                        while (!feof($fp)){
                            
                                            // Extrayendo los datos y especificando el separador
                                            $data  = explode(";", fgets($fp));
                                            //$informacion = explode(",", fgets($fp));
                            
                                            $columnas = count($data);
                                            $segundas = $columnas;
                            
                                ?>
                                <?php if($c==0){ ?>
                                        <thead>
                                            <tr>
                                                <?php for($i=0; $i<$columnas; $i++){ ?>
                                                <?php $dato[] = $data[$i]; ?>
                                                <th><p><?= utf8_encode($data[$i]); ?></p></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>    
                                <?php }else{ ?>
                                        <tbody>
                                            <tr>
                                                <?php for($i=0; $i<$columnas; $i++){ ?>
                                                <?php $informacion[] = addslashes($data[$i]); ?>
                                                <td><p><?= utf8_encode(addslashes($data[$i])); ?></p></td>
                                                <?php } ?>
                                                <?php 
                                                    $cuantos++;
                                                ?>
                                            </tr>
                                        </tbody>
                                <?php } ?>
                                    
                                <?php
                                        $c++;
                                        }
                            
                                    }
                                ?>
                                </table>
                                <?php $columnas2 = count($dato); ?>
                                <p id="subtitulo">Detalle de los encabezados</p>
                                <p id="subtitulo"><strong>Primero seleccionamos la tabla y luego seleccionamos la columna</strong> </p>
                                <form name="form1" method="post" action="../save_padron/">
                                    <table class="table table-bordered table-condensed">
                                        <tr>
                                            <?php for($i=0; $i<$columnas2; $i++){ ?>
                                            <td>
                                                <select name="tablas[<?= $i; ?>]" id="tablas_<?= $i; ?>" onchange="manda(<?= $i; ?>)">
                                                    <option value="0">-- Seleccione --</option>
                                                    <?php foreach ($rows as $id => $value){ ?>
                                                    <option value="<?= $value; ?>"><?= $value; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <?php for($i=0; $i<$columnas2; $i++){ ?>
                                            <td><p><strong><?= utf8_encode($dato[$i]); ?></strong></p></td>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <?php for($i=0; $i<$columnas2; $i++){ ?>
                                            <td><div id="carga_<?= $i; ?>"></div></td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                    <h2>cantidad: <?= $cuantos; ?></h2>
                                    <hr>
                                    
                                    <input type="hidden" name="filas" id="filas" value="<?= $cuantos; ?>">
                                    <input type="hidden" name="info" id="info" value="<?= base64_encode(serialize($informacion)); ?>">
                                    <label for="nombre_indexpad">Nombre Corto del Padron: </label><input type="text" name="nombre_indexpad" id="nombre_indexpad" value="">
                                    <label for="nombre_indexpad">Descripcion (max. 255 caracteres): <input type="text" name="descripcion_indexpad" value="">                                 
                                    <input type="submit" name="enviar" id="enviar" value="Guardar Datos">
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
});
function manda(id)
{
    var posicion = id;
    var valor = $('#tablas_'+id).val();
    $('#carga_'+id).load('../labelelement?t='+valor+'&id='+id);  
    //$('#carga_'+id).load('importar_padron/label.php?t='+valor+'&id='+id);
}
</script>

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
                        <h2 class="dashHead">Filtrar Padron <?= $padron_nombre; ?>:
                        <div style="float:right;">
                            <!--<i class="icon-user"></i>-->
                        </div>
                        </h2>
                        <div class="dashWidget">
                          
                           <div id="formu" style="height: 60px;">
                               <form action="./" method="get" enctype="application/x-www-form-urlencoded">
                                   <input type="hidden" name="id_padron" value="<?= $idpad; ?>" />
                                   <label for="busqueda">Ingrese Apellido o DNI:</label><input type="text" name="busqueda" value="" id="busqueda"/>
                                   <input type="submit" value="Buscar" />
                               </form> 
                           </div>
                            <hr>

                            
                            <?php if(isset($padron)){ ?>
                            <table class="display" id="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Domicilio</th>
                                        <th>DNI</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- padron fijo del sistema -->
                                    <?php foreach ($padron as $value) { ?>
                                        <tr class="odd gradeX">
                                            <?php $value = (json_decode($value, true)); ?>
                                            <td><?php echo $value['id']; ?></td>
                                            <td><?php echo $value['nombre'].' '.$value['apellido']; ?></td>
                                            <td><?php echo $value['domicilio']; ?></td>
                                            <td><?php echo $value['dni']; ?></td>
                                            <td class="center"><?php echo $this->Html->link('Ver / Editar',array('controller' => 'padrons', 'action' => 'editar_persona', '?dni='.$value['dni'].'&idpad='.$idpad), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                                            <?php unset($value);?>
                                        </tr>   
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Domicilio</th>
                                        <th>DNI</th>
                                        <th>Editar</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!--
                            <table>
                                <?php foreach ($padron as $value) {
                                    $value = (json_decode($value, true)); 
                                    echo '<tr><td>'.$value['id'].' | '.$value['nombre'].' '.$value['apellido'].' | '.$value['domicilio'].' | '.$value['dni'].
                                    '</td><td>'.
                                    '<a target="_blank" class="btn small-btn" href="../editar_persona?dni='.$value['dni'].'">Editar</a>
                                    </td></tr>';
                                    
                                }
                                ?>
                            </table>
                            -->
                            
                            <?php } ?>
                            
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
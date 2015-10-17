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
                        <h2 class="dashHead">Control de padrones:
                        <div style="float:right;">
                            <i class="icon-user"></i><?php echo $this->Html->link('Importar Padron',array('controller' => 'padrons', 'action' => 'importar'), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                        </div>
                        </h2>
                        <div class="dashWidget">
                            <table class="display" id="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad de Registros</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- padron fijo del sistema -->
                                    <?php foreach ($indexpadrones as $key => $value) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $value['IndexPad']['id']; ?></td>
                                            <td><?php echo $value['IndexPad']['nombre']; ?></td>
                                            <td><?php echo $value['IndexPad']['descripcion']; ?></td>
                                            <td><?php echo $value['IndexPad']['cant_registros']; ?></td>
                                            <td class="center"><?php echo $this->Html->link('Ver / Editar',array('controller' => 'padrons', 'action' => 'edit', $value['IndexPad']['id']), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                                        </tr>   
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad de Registros</th>
                                        <th>Editar</th>
                                    </tr>
                                </tfoot>
                            </table>
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
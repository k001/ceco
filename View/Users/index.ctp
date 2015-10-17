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
                    <div class="span6">
                        <h2 class="dashHead">Usuarios:
                        <div style="float:right;">
                            <i class="icon-user"></i><?php echo $this->Html->link('Nuevo Usuario',array('controller' => 'users', 'action' => 'add'), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                        </div>
                        </h2>
                        <div class="dashWidget">
                            <table class="display" id="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Modificado</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $value) { ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $value['User']['id']; ?></td>
                                            <td><?php echo $value['User']['nombre']; ?></td>
                                            <td><?php echo $value['User']['username']; ?></td>
                                            <td><?php echo $value['User']['modified']; ?></td>
                                            <td class="center"><?php echo $this->Html->link('Editar',array('controller' => 'users', 'action' => 'edit', $value['User']['id']), array('escape' => FALSE, 'class'=>'btn small-btn')); ?> </td>
                                        </tr>   
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Modificado</th>
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





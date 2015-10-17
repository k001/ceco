<div class="ui-layout-center">
    <div id="view-holder" class="ui-layout-content">
          <div class="scroll-pane">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Edicion de Usuario</a></li>
            </ul>
            <h1 class="message-header"> </h1>
            <button id="fullscreenb"><i class="icon-fullscreen"></i></button>
    
            <div class="dashRow">
                <div class="row-fluid">
                    <div class="span12">
                        <h2 class="dashHead">Edicion de Usuario:</h2>
                        <div class="dashWidget">
                          
                            <?php echo $this->Form->create('User'); ?>
                                <div class="form-group">
                                    <fieldset>
                                                <?php 
                                                echo $this->Form->input('username',array('label'=>'Nombre de Usuario'));
                                                echo $this->Form->input('nombre',array('label'=>'Nombre Real'));
                                                echo $this->Form->input('password', array('label'=>'Contraseña'));
                                                echo $this->Form->input('role', array(
                                                    'options' => array('admin' => 'Admin', 'author' => 'Author'),
                                                    'label'=> 'Tipo'
                                                ));
                                                echo $this->Form->input('activo',array('label'=>'Usuario Activo'));
                                            ?>
                                    </fieldset>
                                    <hr>
                                    <?php echo $this->Form->end(__('Enviar')); ?>
                                </div>
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


   






            
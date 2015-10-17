<?php echo phpinfo(); ?>
<div style="background-color: #FFD844;"> <?php echo $this->Session->flash('auth'); ?></div>

<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Off Canvas Navigation-->
            <nav class="off-canvas-navigation">
                <header>Navigation</header>
                <div class="main-navigation navigation-off-canvas"></div>
            </nav>


            <!--Page Content-->
            <div id="page-content">
                <section class="container">
                    <div class="block">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <header>
                                    <h1 class="page-title">ACCESO</h1>
                                </header>
                                <hr>
                                <?php echo $this->Form->create('User'); ?>
                                    <div class="form-group">
                                        <?php echo $this->Form->input('username',array('label' =>'Nombre de Usuario')); ?>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <?php echo $this->Form->input('password', array('label' =>'Contraseña'));?>
                                    </div><!-- /.form-group -->
                                    <div class="form-group clearfix">
                                        <?php echo $this->Form->end(__('Acceder')); ?>
                                    </div><!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.block-->
            </div>
            <!-- end Page Content-->
            <div class="footer-bottom">
                <div class="container">
                    <a href="http://www.interui.net" target="_blank" style="font-size: 10px;">interUI</a>
                </div>
            </div>        
        </div>
        <!-- end Page Canvas-->
    </div>
    <!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->


<!--[if lte IE 9]>
<script type="text/javascript" src="assets/js/ie-scripts.js"></script>
<![endif]-->
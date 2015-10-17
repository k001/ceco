<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('header_dashboard'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>
    <?php echo $this->Session->flash(); ?>

    <!-- MENUES -->
    <?php echo $this->element('dashboard/top'); ?>
    <?php echo $this->element('dashboard/west'); ?>    
    <div class="ui-layout-south footer"></div> <!-- END Layout South -->
    <?php echo $this->element('dashboard/east'); ?>             
            
    <!--CONTENIDO PRINCIPAL DE LAS VISTAS -->        
    <?php echo $this->fetch('content'); ?>
    
    <!-- POP-UP PARA CREAR NOTAS -->        
    <?php echo $this->element('notas'); ?>              
            
</body>
</html>

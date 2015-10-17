<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('header_geo_site'); ?>
</head>
<body class="clearfix with-menu with-shortcuts">
	<div id="container">		
		
		
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
		
		
		<div id="footer">
            <?php //echo $this->element('footer'); ?>
		</div>
	
	
	</div><!--fin id container -->
</body>
</html>

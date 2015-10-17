<?php echo $this->Html->charset(); ?>
<title><?php echo $titulo; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="description" content="">
<meta name="author" content="interUI">
    
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<?php
echo $this->Html->script('../assets/js/jquery-2.1.0.min');
echo $this->Html->script('../assets/js/before.load');
echo $this->Html->script('../assets/js/jquery-migrate-1.2.1.min');
echo $this->Html->script('../assets/bootstrap/js/bootstrap.min');
echo $this->Html->script('../assets/js/smoothscroll');
echo $this->Html->script('../assets/js/bootstrap-select.min');
echo $this->Html->script('../assets/js/jquery.hotkeys');
echo $this->Html->script('../assets/js/jquery.nouislider.all.min');
echo $this->Html->script('../assets/js/jquery.mCustomScrollbar.concat.min');
?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>-->
<?php
//echo $this->Html->script('../assets/js/infobox');
//echo $this->Html->script('../assets/js/richmarker-compiled');
//echo $this->Html->script('../assets/js/markerclusterer');

?>

<?php
//css
echo $this->Html->css('../assets/fonts/font-awesome');
?>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<?php
echo $this->Html->css('../assets/bootstrap/css/bootstrap');
echo $this->Html->css('../assets/css/bootstrap-select.min');
//echo $this->Html->css('../assets/css/owl.carousel');
echo $this->Html->css('../assets/css/jquery.mCustomScrollbar');
echo $this->Html->css('../assets/css/style');
echo $this->Html->css('../assets/css/user.style');
?>

<!--[if lte IE 9]>
<script type="text/javascript" src="assets/js/ie-scripts.js"></script>
<![endif]-->






















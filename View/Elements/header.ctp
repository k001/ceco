<?php echo $this->Html->charset(); ?>
<title><?php echo $titulo; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="description" content="">
<meta name="author" content="interUI">
    
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">




<?php
//para scaffold
//echo $this->Html->css('cake.generic');

echo $this->Html->css('reset3860.css?v=1');
echo $this->Html->css('style3860.css?v=1');
echo $this->Html->css('colors3860.css?v=1');
echo $this->Html->css('reset3860.css?v=1');


echo $this->Html->css('styles/agenda3860.css?v=1');
echo $this->Html->css('styles/dashboard3860.css?v=1');
echo $this->Html->css('styles/form3860.css?v=1');
echo $this->Html->css('styles/modal3860.css?v=1');
echo $this->Html->css('styles/progress-slider3860.css?v=1');
echo $this->Html->css('styles/switches3860.css?v=1');
echo $this->Html->css('styles/table3860.css?v=1');

//con extraños media
echo $this->Html->css('print3860.css?v=1', array('media'=>'print'));
echo $this->Html->css('4803860.css?v=1', array('media'=>'only all and (min-width: 480px)'));
echo $this->Html->css('7683860.css?v=1', array('media'=>'only all and (min-width: 768px)'));
echo $this->Html->css('9923860.css?v=1', array('media'=>'only all and (min-width: 992px)'));
echo $this->Html->css('12003860.css?v=1', array('media'=>'only all and (min-width: 1200px)'));
echo $this->Html->css('2x3860.css?v=1', array('media'=>'only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)'));
echo $this->Html->css('cssf944.css?family=Open+Sans:300');

//JS
echo $this->Html->script('libs/modernizr.custom');



?>


<!-- For progressively larger displays -->
<!-- For Retina displays -->

    <!-- JavaScript at bottom except for Modernizr -->

    <!-- For Modern Browsers -->
    <link rel="shortcut icon" href="/geopadron/site/img/favicons/favicon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="/geopadron/site/img/favicons/favicon.ico">
    <!-- For retina screens -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/geopadron/site/img/favicons/apple-touch-icon-retina.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/geopadron/site/img/favicons/apple-touch-icon-ipad.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="/geopadron/site/img/favicons/apple-touch-icon.png">

    <!-- iOS web-app metas -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="/geopadron/site/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="/geopadron/site/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="/geopadron/site/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

    <!-- Microsoft clear type rendering -->
    <meta http-equiv="cleartype" content="on">

    <!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
    
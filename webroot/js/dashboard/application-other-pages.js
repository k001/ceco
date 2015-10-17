// UI Datepicker
    
$(function() {
    $( "#datepicker" ).datepicker();
});
    

// Bootstrap Accordion and Tooltips
    
$(document).ready(function () {

$('#slideleftb').tooltip({
    placement : 'right',
    title : 'Toggle Sidebar'
});
$('#sliderightb').tooltip({
    placement : 'left',
    title : 'Toggle Sidebar'
});
$('#newb').tooltip({
    title : 'New'
});
$('#settingsb').tooltip({
    title : 'Settings'
});
$('#fullscreenb').tooltip({
    placement : 'left',
    title : 'Full Screen Mode'
});
$(".accordion-toggle").collapse();
});
    

// Sidebar and Fullscreen toggle buttons for jQuery UI Layout Plugin
    
$(function() {
	$( "#slideleftb" ).click(function() {
		$( "#slideleftb" ).toggleClass( "expanded", 200 );
		return false;
	});
	$( "#sliderightb" ).click(function() {
		$( "#sliderightb" ).toggleClass( "expanded", 200 );
		return false;
	});
    $( "#fullscreenb" ).click(function() {
        $( "#fullscreenb" ).toggleClass( "fullscreenMode", 200 );
        return false;
    });
});
    


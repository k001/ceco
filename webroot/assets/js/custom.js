////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// jQuery
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function($) {


    if( $('body').hasClass('navigation-fixed') ){
        $('.off-canvas-navigation').css( 'top', - $('.header').height() );
        $('#page-canvas').css( 'margin-top',$('.header').height() );
    }

    //setInputsWidth();

    //adaptBackgroundHeight();

    // Bootstrap tooltip

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $('.off-canvas-navigation header').css( 'line-height', $('.header').height() + 'px' );

    // Date & Time picker

    if( $('.input-group.date').length > 0 ){
        $('.input-group.date').datepicker({ });
    }
    if( $('.input-daterange').length > 0 ){
        $('.input-daterange').datepicker({
            todayHighlight: true
        });
    }

//  Bootstrap Select ---------------------------------------------------------------------------------------------------

    var select = $('select'); 
    if (select.length > 0){
        select.selectpicker({
            width:'100%'
        });
    }
    var bootstrapSelect = $('.bootstrap-select');
    var dropDownMenu = $('.dropdown-menu');
    bootstrapSelect.on('shown.bs.dropdown', function () {
        dropDownMenu.removeClass('animation-fade-out');
        dropDownMenu.addClass('animation-fade-in');
    });
    bootstrapSelect.on('hide.bs.dropdown', function () {
        dropDownMenu.removeClass('animation-fade-in');
        dropDownMenu.addClass('animation-fade-out');
    });
    bootstrapSelect.on('hidden.bs.dropdown', function () {
        var _this = $(this);
        $(_this).addClass('open');
        setTimeout(function() {
            $(_this).removeClass('open');
        }, 100);
    });

//  Expand content on click --------------------------------------------------------------------------------------------

    $('.expand-content').live('click',  function(e){
        e.preventDefault();
        var children = $(this).attr('data-expand');
        var parentHeight = $(this).closest('.expandable-content').height();
        var contentSize = $( children + ' .content' ).height();
        $( children ).toggleClass('collapsed');
        $( this ).toggleClass('active');
        $( children ).css( 'height' , contentSize );
        if( !$( children).hasClass('collapsed') ){
            setTimeout(function() {
                $( children ).css('overflow', 'visible');
            }, 400);
        }
        else {
            $( children ).css('overflow', 'hidden');
        }
        $('.has-child').live('click',  function(e){
            var parent = $(this).closest('.expandable-content');
            var childHeight = $( $(this).attr('data-expand') + ' .content').height();
            if( $(this).hasClass('active') ){
                $(parent).height( parent.height() + childHeight )
            }
            else {
                $(parent).height(parentHeight);
            }
        });
    });

// Set width for inputs in horizontal search bar -----------------------------------------------------------------------

    $( "#redefine-search-form" ).load( "../assets/external/_search-bar.html", function() {
        setInputsWidth();
        //autoComplete();
    });

//    if( $('#location').length ){
//        autoComplete();
//    }


//  Smooth Navigation Scrolling ----------------------------------------------------------------------------------------

    $('.navigation .nav a[href^="#"], a[href^="#"].roll').on('click',function (e) {
        e.preventDefault();
        var target = this.hash,
            $target = $(target);
        if ($(window).width() > 768) {
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - $('.navigation').height()
            }, 2000)
        } else {
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 2000)
        }
        return false;
    });

    $('body').addClass('page-fade-in');

    $('a').on('click', function (e) {
        var attr = $(this).attr('href');
        //alert( $(this).attr('href') );
        if(attr != undefined){
            if ( attr.indexOf('#') != 0 ) {
                e.preventDefault();
                var goTo = this.getAttribute("href");
                $('body').removeClass('page-fade-in');
                $('body').addClass('page-fade-out');
                setTimeout(function(){
                    window.location = goTo;
                },200);
            }
            else if ( $(this).attr('href') == '#' ) {
                e.preventDefault();
            }
        }
    });


});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function setInputsWidth(){
    var $inputRow = $('.search-bar.horizontal .input-row');
    for( var i=0; i<$inputRow.length; i++ ){
        if( $inputRow.find( $('button[type="submit"]') ).length ){
            $inputRow.find('.form-group:last').css('width','initial');
        }
    }

    var searchBar =  $('.search-bar.horizontal .form-group');
    for( var a=0; a<searchBar.length; a++ ){
        if( searchBar.length <= ( 1 + 1 ) ){
            $('.main-search').addClass('inputs-1');
        }
        else if( searchBar.length <= ( 2 + 1 ) ){
            $('.main-search').addClass('inputs-2');
        }
        else if( searchBar.length <= ( 3 + 1 ) ){
            $('.main-search').addClass('inputs-3');
        }
        else if( searchBar.length <= ( 4 + 1 ) ){
            $('.main-search').addClass('inputs-4');
        }
        else if( searchBar.length <= ( 5 + 1 ) ){
            $('.main-search').addClass('inputs-5');
        }
        else {
            $('.main-search').addClass('inputs-4');
        }
        if( $('.search-bar.horizontal .form-group label').length > 0 ){
            $('.search-bar.horizontal .form-group:last-child button').css('margin-top', 25)
        }
    }
}

// Autocomplete address ------------------------------------------------------------------------------------------------

// Rating --------------------------------------------------------------------------------------------------------------


// Owl Carousel in Modal Window ----------------------------------------------------------------------------------------

function drawOwlCarousel(_rtl){
    $.getScript( "assets/js/owl.carousel.min.js", function( data, textStatus, jqxhr ) {
        $(".image .gallery").owlCarousel({
            rtl: _rtl,
            items: 1,
            nav: true,
            navText: ["",""],
            responsiveBaseElement: ".image"
        });
    });
}




// Adapt background height to block element ----------------------------------------------------------------------------

function adaptBackgroundHeight(){
    $('.background').each(function(){
        if( $(this).children('img').height() < $(this).height() ){
            //$(this).children('img').css('right', ( $(this).children('img').width()/2 -  $(window).width())/2 );
            $(this).children('img').css('width', 'auto');
            $(this).children('img').css('height', '100%');
        }
    });



}
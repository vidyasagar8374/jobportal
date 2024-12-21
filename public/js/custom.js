$(function () {
    'use strict'; // Start of use strict


    /*--------------------------
    scrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*------------------------------------------------------------------
        Year
    ------------------------------------------------------------------*/
    $(function () {
        var theYear = new Date().getFullYear();
        $('#year').html(theYear);
    });

    /*------------------------------------------------------------------
           Mobile Menu Active
        ------------------------------------------------------------------*/
    jQuery('.mobile-menu-active').meanmenu({
        meanMenuContainer: '.mobile-menu-container',
        meanScreenWidth: "993"
    });
    /*--------------------------
       Header Searchbox
      ---------------------------- */
    $('.header-searchtrigger').on('click', function () {
        $(this).find('.fa').toggleClass('fa-search fa-close');
        $(this).siblings('.header-searchbox').toggleClass('is-visible');
    });
    /*------------------------------------------------------------------
		Sign In/Up Popup
    ------------------------------------------------------------------*/

    $('.open-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        mainClass: 'mfp-fade'
    });

    // Popup Gallery JS
    $('.popup-gallery').magnificPopup({
        delegate: '.view-image',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
    });

    //Gallery Filtering
    $(document).ready(function () {

        $(".filter-button").click(function () {
            $(".filter-button").removeClass('current');
            $(this).addClass('current');

            var value = $(this).attr('data-filter');
            if (value == "all") {
                //$('.filter').removeClass('hidden');
                $('.filter').show('1000');
            } else {
                //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.' + value).hide('3000');
                $('.filter').filter('.' + value).show('3000');
            }
        });
        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");

    });

    /*------------------------------------------------------------------
	  CounterUp
    ------------------------------------------------------------------*/

    $('.countdwon-number').counterUp({
        delay: 10,
        time: 2000,
    });

    /*------------------------------------------------------------------
        Navigation 
    ------------------------------------------------------------------*/

    window.onscroll = function () {
        myFunction()
    };
    var header = document.getElementById("navigation");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    /*------------------------------------------------------------------
        Video Popup 
    ------------------------------------------------------------------*/
    $('.video-play-btn').magnificPopup({
        type: 'video'
    });

    /*------------------------------------------------------------------
        Scroll Down Speed
    ------------------------------------------------------------------*/

    $('a.page-scroll').on('click', function (e) {
        var targetHref = $(this).attr('href');
        var navbar = $('.navbar').outerHeight();
        $('html, body').animate({
            scrollTop: $(targetHref).offset().top - navbar
        }, 1250, 'easeInOutExpo');
        e.preventDefault();
    });
    /*------------------------------------------------------------------
        Menu Bar Toggle
    ------------------------------------------------------------------*/

    $('.bar-toggler').on('click', function (e) {
        $('.menu-bar').toggleClass('active');
        $('.bar-toggler').toggleClass('change');
        e.preventDefault();
    });


    /*------------------------------------------------------------------
    FAQ
    ------------------------------------------------------------------*/
    // $('.panel-heading a').on('click', function() {
    //     $('.panel-heading').removeClass('active');
    //     $(this).parents('.panel-heading').addClass('active');
    // });

});

/*------------------------------------------------------------------
 Loader 
------------------------------------------------------------------*/
jQuery(window).on("load scroll", function () {
    'use strict'; // Start of use strict
    // Loader 
    $('#dvLoading').fadeOut('slow', function () {
        $(this).remove();
    });
    $('.google-map').on('click', function () {
        $('.google-map').find('iframe').css("pointer-events", "auto");
    });
    //Animation Numbers	 
    jQuery('.animateNumber').each(function () {
        var num = jQuery(this).attr('data-num');
        var top = jQuery(document).scrollTop() + (jQuery(window).height());
        var pos_top = jQuery(this).offset().top;
        if (top > pos_top && !jQuery(this).hasClass('active')) {
            jQuery(this).addClass('active').animateNumber({
                number: num
            }, 2000);
        }
    });

});
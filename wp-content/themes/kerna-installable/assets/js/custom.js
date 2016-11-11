(function($) {
"use strict";

/* ==============================================
BACK TO TOP -->
=============================================== */

   $(document).ready(function(){
        $('#testimonials').owlCarousel({
            loop:true,
            margin:30,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        })
        $('.shop-carousel').owlCarousel({
            loop:true,
            margin:30,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
        $('.sidebar-slider, .blog-slider').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
        $('.portfolio-slider').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
        $('#teamcarousel, #clients').owlCarousel({
            loop:true,
            margin:30,
            nav:false,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        })
    });

/* ==============================================
PROGRESS BAR -->
=============================================== */

    $('.progress .progress-bar').progressbar({transition_delay: 800});


/* ==============================================
FUN -->
=============================================== */

    function count($this){
        var current = parseInt($this.html(), 10);
        current = current + 10;
        $this.html(++current);
            if(current > $this.data('count')){
                $this.html($this.data('count'));
            } 
            else {    
                setTimeout(function(){count($this)}, 10);
            }
        }        
        $(".stat-count").each(function() {
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        count($(this));
    });

/* ==============================================
HEADER AFFIX -->
=============================================== */

    $('.header').affix({
        offset: {
        top: $('.header').height() }
    }); 

/* ==============================================
MENU HOVER -->
=============================================== */

    jQuery(function($) {
    if($(window).width()>769){
        $('.dropdown').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(100).fadeIn();

        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(100).fadeOut();
        });
        $('.dropdown > a').click(function(){
            location.href = this.href;
        });
        }
    });

/* ==============================================
BACK TOP -->
=============================================== */

    jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.backtotop').css({bottom:"25px"});
        } else {
            jQuery('.backtotop').css({bottom:"-100px"});
        }
    });
    jQuery('.backtotop').click(function(){
        jQuery('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/* ==============================================
LOADER -->
=============================================== */

    $(window).load(function() {
        $('#loader').delay(600).fadeOut('slow');
        $('#loader-container').delay(600).fadeOut('slow');
        $('body').delay(600).css({'overflow':'visible'});
    })

/* ==============================================
ANIMATIONS -->
=============================================== */

    new WOW(
        { offset: 120 }
    ).init();

/* ==============================================
LIGHTBOX -->
=============================================== */

    jQuery('a[data-gal]').each(function() {
        jQuery(this).attr('rel', jQuery(this).data('gal'));
        });     
    jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});

/* ==============================================
REV SLIDER -->
=============================================== */
    jQuery(document).ready(function() {
        jQuery('.tp-banner').show().revolution(
                {
                dottedOverlay:"none",
                delay:16000,
                startwidth:1170,
                startheight:700,
                hideThumbs:200,
                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:4,
                navigationType:"none",
                navigationArrows:"solo",
                navigationStyle:"preview1",
                touchenabled:"on",
                onHoverStop:"on",
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
                parallax:"scroll",
                parallaxBgFreeze:"on",
                parallaxLevels:[10,20,30,40,50,60,70,80,90,100],
                keyboardNavigation:"off",
                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,
                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:20,
                soloArrowLeftVOffset:0,
                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:20,
                soloArrowRightVOffset:0,
                shadow:0,
                fullWidth:"on",
                fullScreen:"off",
                spinner:"spinner4",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"off",                       
                forceFullWidth:"off",                        
                hideThumbsOnMobile:"off",
                hideNavDelayOnMobile:1500,                      
                hideBulletsOnMobile:"off",
                hideArrowsOnMobile:"off",
                hideThumbsUnderResolution:0,
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                startWithSlide:0
        });                           
    }); //ready
/* ==============================================
VIDEO FIX -->
=============================================== */
    // Target your .container, .wrapper, .post, etc.
    $("body").fitVids();

})(jQuery);

 (function($) {
    "use strict";
    /* ==============================================
    ACCORDION -->
    =============================================== */

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('icon_minus-06 icon_plus');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);
    function toggleChevron1(e1) {
        $(e1.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('arrow_carrot-up arrow_carrot-down');
    }
    $('#accordion1').on('hidden.bs.collapse', toggleChevron1);
    $('#accordion1').on('shown.bs.collapse', toggleChevron1);

    

    /* ==============================================
    CIRCLE -->
    =============================================== */

        $('#circle1').circleProgress({
            value:jQuery("#circle1").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle1").attr('data-color') }
        });
        $('#circle2').circleProgress({
            value:jQuery("#circle2").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle2").attr('data-color') }
        });
        $('#circle3').circleProgress({
            value:jQuery("#circle3").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle3").attr('data-color') }
        });
        $('#circle4').circleProgress({
            value:jQuery("#circle4").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle4").attr('data-color') }
        });
        $('#circle5').circleProgress({
            value:jQuery("#circle5").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle5").attr('data-color') }
        });
        $('#circle6').circleProgress({
            value:jQuery("#circle6").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle6").attr('data-color') }
        });
        $('#circle7').circleProgress({
            value:jQuery("#circle7").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle7").attr('data-color') }
        });
        $('#circle8').circleProgress({
            value:jQuery("#circle8").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle8").attr('data-color') }
        });
        $('#circle9').circleProgress({
            value:jQuery("#circle9").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle9").attr('data-color') }
        });
        $('#circle10').circleProgress({
            value:jQuery("#circle10").attr('data-circle'),
            size: 240,
            thickness: 10,
            fill: { color: jQuery("#circle10").attr('data-color') }
        });
        })(jQuery);

/**
 * Created by chienvn on 15/12/2017.
 */

$(document).ready(function () {

    /* Begin : Collapse category */
    $('[data-collapse-cate]').click(function(){
        var self    = this;
        var target  = $(self).data('collapse-cate');
        var $other  = $('[data-collapse-cate="'+target+'"]');
        if(target){
            $other.each(function(index, el){
                if(el === self){
                    $(self).siblings(target).slideToggle();
                    $(self).parent().toggleClass('active');
                }
            });
        }
    });
    /* End : Collapse category */

    /* Begin: Slider for News */
    var itemNewsWidth = 300;
    var itemMarginNewsWidth = 0;
    var minItemsNews = 1;
    var maxItemsNews = 1;
    if(typeof mobile === 'number' && mobile === 1) {
        minItemsNews = 1;
        maxItemsNews = 1;
    }
    var news_slider = function($) {
        $('#wrapNews').flexslider({
            slideshowSpeed:6000,
            animationSpeed:400,
            animation:"slide",
            itemWidth: itemNewsWidth,
            itemMargin: itemMarginNewsWidth,
            controlNav:false,
            directionNav:true,
            pauseOnHover:true,
            direction:"horizontal",
            reverse:false,
            prevText:"back",
            nextText:"next",
            easing:"linear",
            slideshow:true,
            useCSS:false,
            minItems:minItemsNews,
            maxItems:maxItemsNews
        });
    };
    var timer_metaslider_news = function() {
        !window.jQuery ? window.setTimeout(timer_metaslider_news, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_news, 100) : news_slider(window.jQuery);
    };
    timer_metaslider_news();
    /* End: Slider for News */

    /* Begin: Slider for ProdWidget */
    var itemProdWidgetWidth = 105;
    var itemMarginProdWidgetWidth = 30;
    var minItemsProdWidget = 5;
    var maxItemsProdWidget = 5;
    if(typeof mobile === 'number' && mobile === 1) {
        minItemsProdWidget = 3;
        maxItemsProdWidget = 3;
        itemMarginProdWidgetWidth = 3;
    }
    var prod_widget_slider = function($) {
        $('#wrapProdWidgetVisited, #wrapProdWidgetSamePlanType').flexslider({
            animation:"slide",
            itemWidth: itemProdWidgetWidth,
            itemMargin: itemMarginProdWidgetWidth,
            controlNav:false,
            prevText:"",
            nextText:"",
            useCSS:false,
            minItems:minItemsProdWidget,
            maxItems:maxItemsProdWidget
        });
    };
    var timer_metaslider_prod_widget = function() {
        !window.jQuery ? window.setTimeout(timer_metaslider_prod_widget, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_prod_widget, 100) : prod_widget_slider(window.jQuery);
    };
    timer_metaslider_prod_widget();
    /* End: Slider for ProdWidget */


    //New arrival slides
    $('#new-arrival').slick({
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        nextArrow: '<button type="button" class="slick-next">next</button>',
        prevArrow: '<button type="button" class="slick-prev">back</button>',
        appendArrows: $('.new-arrival-nav')

    });

    /* Begin: Shoplist toggle */
    $('.wrap-shoplist .title-general, .wrap-topics-banner-widget .title-general').click(function(){
        $(this).parent().toggleClass('closed');
        $(this).parent().find('.box-shoplist, .wrap-list-banner').slideToggle();
    });

    //Toggle shop
    $('.list-shop-list .item-shop-list .bg-shop-list').click(function(){
        var li = $(this).parent();
        li.toggleClass('active');
        li.find('.details-shop-list').slideToggle();
        li.siblings().removeClass('active')
        li.siblings().find('.details-shop-list').slideUp();
    });

    /* End: Shoplist toggle */

    /* Begin: sliderNewHighend */


    $(window).on('load resize', function() {

        var iWidth = $('#sliderNewHighend').width();

        var slider_new_highend = function($) {

            $('#sliderNewHighend').flexslider({
                slideshowSpeed:3000,
                animationSpeed:400,
                itemWidth: iWidth,
                animation:"slide",
                controlNav:true,
                directionNav:true,
                pauseOnHover:true,
                direction:"horizontal",
                reverse:false,
                prevText:"",
                nextText:"",
                easing:"linear",
                slideshow:false,
                useCSS:true,
                initDelay:2000,
                start: function(slider){
                    setTimeout(
                        function(){
                            var $item = $(slider).find('img.lz:eq('+ (slider.currentSlide+1) +')');
                            if (!$item.attr('data-lzsrc')) return;
                            $item.attr('src', $item.attr('data-lzsrc'))
                            $item.removeAttr('data-lzsrc')
                        },slider.vars.initDelay);
                },
                after: function(slider){
                    slider.stop();
                    if(slider.currentSlide == 0){
                        slider.vars.slideshowSpeed = 3000;
                    } else {
                        slider.vars.slideshowSpeed = 4000;
                    }
                    var $item = $(slider).find('img.lz:eq('+ (slider.currentSlide+1) +')');
                    if ($item.attr('data-lzsrc')){
                        $item.one('load', function (){slider.play()});
                        $item.attr+('src', $item.attr('data-lzsrc'));
                        $item.removeAttr('data-lzsrc');
                    }else{
                        slider.play();
                    }
                }
            });
        };

        if($('#sliderNewHighend').length){
            setTimeout(function(){
                var slider = $('#sliderNewHighend').data('flexslider');

                slider.resize();
                slider.itemW = iWidth;
                slider.computedW = iWidth;
            }, 50);
        }

        var timer_metaslider_new_highend = function() {
            !window.jQuery ? window.setTimeout(timer_metaslider_new_highend, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_new_highend, 100) : slider_new_highend(window.jQuery);
        };
        timer_metaslider_new_highend();

    });


    /* End: sliderNewHighend */

    /* Begin: wrap-dropdown-booking */
    $('.dropdown-booking-toggle').click(function(){
        $(".block-viewbooking-top-page").slideToggle();
        $(this).find(".toggle-icon-arrow").toggleClass("active");
    });
    /* End: wrap-dropdown-booking */

    /* Show calendar datepicker on top page (not category)*/
    $('#use_date_container').on('click', function (e) {
        $(this).find('.suggest_datepicker').slideToggle();
    });

    /* Show calendar datepicker on category*/
    $('.formal-calendar-cate').on('click', function (e) {
        $(this).closest("li").find('.suggest_datepicker').slideToggle();
    });

	/* Show calendar datepicker on top page*/
	$('.wrap-form-search-top .wrap-choose-calendar, #use_date_container').on('click', function (e) {
	    if(typeof mobile != 'undefined' && mobile == 1){
            // $(".date-time-picker-mobile-popup").addClass("overlay");
            // $(".date-time-picker-mobile-popup").fadeIn();
            // $("body").addClass("fixed-scroll");
            if($('#use_date_picker')){
                $('#use_date_picker').data('anypicker').showOrHidePicker();
            }
        }else{
            $('#search_box_top_date_picker_wrapper').toggleClass('top-date-active');
        }
	});

    $(".wrap-title-list-cart .close").on("click", function(){
        $("#popup-list-cart").removeClass("overlay").hide();
        if(isMobie)
            $("body").removeClass("fixed-scroll");
    });

    /* Begin: Menu Formal */
    $(".item-menu-formal.last-sp > a").click(function (e) {
        e.preventDefault();
    });
    /* End: Menu Formal*/

});




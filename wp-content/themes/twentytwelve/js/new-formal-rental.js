
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
                    $(self).toggleClass('active');
                }
            });
        }
    });
	
	$('.wrap-shoplist .toggle-icon-arrow').trigger('click');

    $('[data-sub-cates]').click(function(){
        var self    = this;
        var target  = $(self).data('sub-cates');
        var $other  = $('[data-sub-cates="'+target+'"]');
        if(target){
            $other.each(function(index, el){
                if(el === self){
                    $(self).parents(".title-category").siblings(target).slideToggle();
                    $(self).parents(".title-category").toggleClass('active');
                }
            });
        }
    });
    /* End : Collapse category */

    //New arrival slides
	if($('.new-arrival').length > 0){
        $('.new-arrival').each(function () {
            var $arrows = $(this).next('.new-arrival-nav');
            var totalItems = $(this).find('.arrival-item').length;
            var items = 0;
            if (totalItems < 3) {
                items = totalItems;
            } else {
                items = 3;
            }
            $(this).slick({
                vertical: true,
                slidesToShow: items,
                slidesToScroll: items,
                infinite: false,
                nextArrow: '<button type="button" class="slick-next">next</button>',
                prevArrow: '<button type="button" class="slick-prev">back</button>',
                appendArrows: $arrows
            });
        })
	}

    /* Begin: Shoplist toggle */
    // $('.wrap-shoplist .title-general, .wrap-topics-banner-widget .title-general').click(function(){
    //     $(this).parent().toggleClass('closed');
    //     $(this).parent().find('.box-category, .wrap-list-banner').slideToggle();
    // });

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
        if(typeof isMobie != 'undefined' && isMobie)
            $("body").removeClass("fixed-scroll");
    });

    /* Begin: Menu Formal */
    $(".item-menu-formal.last-sp > a").click(function (e) {
        e.preventDefault();
    });
    $(".list-menu-formal .sub-item-menu-formal.has-childs").prepend('<p class="wrap-arrow-down-menu"><span class="arrow-down-menu"></span></p>');
    $(".list-menu-formal .sub-item-menu-formal.has-childs .wrap-arrow-down-menu").click(function () {
        $(this).siblings(".sub-menu").toggleClass("menu-active");
    });
    /* End: Menu Formal*/

	//Show the last 3 TopProductFormalCate
	$(".right-column").on("click",".full-top-product-formal-cate-btn", function () {
		$(".widget-top-product-formal-cate-6, .widget-top-product-formal-cate-7, .widget-top-product-formal-cate-10").fadeIn();
		$(this).hide();
	})

    //Toggle footer
    if(isSmartPhone()){
        $('.top-footer-menu-name').click(function(){
            var itemLi = $(this).parent();
            itemLi.toggleClass('active');
            $(itemLi).siblings().removeClass('active');
            $(itemLi).siblings().find('.top-footer-menu-item').removeClass('active');
            $(itemLi).parent().closest('li').siblings().removeClass('active');
        })
    }

});




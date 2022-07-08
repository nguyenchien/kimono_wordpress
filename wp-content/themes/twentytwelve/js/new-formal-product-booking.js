$(document).ready(function () {
    if ( $('#carousel').length ) {
        var containerWidth = $('#carousel').width();
        var itemWidthSliderProduct = containerWidth <=  640 ? (containerWidth -10)/4: (containerWidth-20)/4;
        var itemMarginWidthSliderProduct = 10;
        var minItemsSliderProduct = 4;
        var maxItemsSliderProduct = 4;
        $('#carousel').flexslider({
            slideshowSpeed  : 4000,
            animationSpeed  : 400,
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            prevText: "",
            nextText : "",
            itemWidth: itemWidthSliderProduct,
            itemMargin: itemMarginWidthSliderProduct,
            minItems: minItemsSliderProduct,
            maxItems: maxItemsSliderProduct,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            slideshowSpeed  : 4000,
            animationSpeed  : 400,
            animation: "slide",
            controlNav: true,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel",
            prevText: "",
            nextText : "",
        });
    }

    /* Toggle for wrap-items-info */
    $(document).on('click', "[data-collapse-reserve]", function(e){
        var target = $(this).data("collapse-reserve");
        $(this).toggleClass('active');
        $(this).siblings(target).slideToggle();
        $(this).parent().siblings(target).slideToggle();
    });
    //Toggle options
    $(document).on('click', '.plan-options', function(e){
        $(this).find('.plan-name').toggleClass('collapse');
        $(this).closest('.reserve-product-detail').find('.person-options .list-options').slideToggle();
    });
    //Toggle options
    $(document).on('click', '.person-other-option-plan', function(e){
        $(this).find('.plan-name').toggleClass('collapse');
        $(this).closest('.reserve-product-detail').find('.other-options .list-options').slideToggle();
    });
    
    $('.agreement-condition').on('click', function () {
        var parent = $(this).parents('.clause');
        var parent_agreement_data = parent.data('agreement-condition');
        var closeFocus = $(this);
        var mainContentClass = 'main-content-agreement-condition';
        var dialog_agreement_condition = 'dialog-agreement-condition';

        if (typeof mobile === 'undefined') {
            $('#dialog-agreement-condition').dialog({height: 500, width: 600}).dialog('open');
        } else {
            if (typeof parent_agreement_data.title != 'undefined' && typeof parent_agreement_data.content) {
                var simpleDialog = sweSimpleDialog.init({title:parent_agreement_data.title, closeConfirm:'', mainContentClass: mainContentClass, dialogClass: dialog_agreement_condition});
                simpleDialog.closeFocus = closeFocus;
                // override after close when click on close-icon
                simpleDialog.afterClose = function() {
                    simpleDialog.mainContent.html('');
                };
                simpleDialog.show(parent_agreement_data.content);
                $('.main-content-agreement-condition').css({height: ($(window).height() - 30)});
                $( window ).resize(function() {
                    $('.main-content-agreement-condition').css({height: ($(window).height() - 30)});
                });
            } else {
                console.log('Title and content of rule not defined!');
            }
        }
    });
});

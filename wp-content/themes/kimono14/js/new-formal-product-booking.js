$(document).ready(function () {
    var containerWidth = $('#carousel').width()
    var itemWidthSliderProduct = containerWidth <=  640 ? (containerWidth -10)/4: (containerWidth-20)/4;
    var itemMarginWidthSliderProduct = 10;
    var minItemsSliderProduct = 4;
    var maxItemsSliderProduct = 4;
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: true,
        slideshow: false,
        prevText: "",
        nextText : "",
        itemWidth: itemWidthSliderProduct,
        itemMargin: itemMarginWidthSliderProduct,
        minItems: minItemsSliderProduct,
        maxItems: maxItemsSliderProduct,
        move: 2,
        startAt: 0,
        asNavFor: '#slider'
    });
    var _pos = $("#slider .slides li").length - 1;
    $("#slider").flexslider({
        slideshowSpeed: 2500,
        animationSpeed: 1000,
        pauseOnAction: false,
        after: function(slider) {
            /* auto-restart player if paused after action */
            if (!slider.playing) {
                slider.play();
            }
        },
        initDelay: 0,
        animation: "slide",
        controlNav: true,
        animationLoop: false,
        slideshow: true,
        prevText: "",
        nextText : "",
        startAt: _pos,
        sync: "#carousel"
    })


    /* Toggle for wrap-items-info */
    $(document).on('click', "[data-collapse-reserve]", function(e){
        var target = $(this).data("collapse-reserve");
        $(this).toggleClass('active');
        $(this).siblings(target).slideToggle();
        $(this).parent().siblings(target).slideToggle();
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

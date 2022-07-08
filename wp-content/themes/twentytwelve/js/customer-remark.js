/**
 * Created by PC-06 on 1/18/2018.
 */

$(document).ready(function(){


    //Toggle right sidebar
    
    $('#toggle-sidebar').click(function(){
        $(this).toggleClass('icon-formal-menu-toggle-open icon-formal-menu-toggle-close');
        $(this).parent().toggleClass('close');

        $('#right-sidebar').toggleClass('active');
        $('body').toggleClass('fixed-top');
        $('.customer-remark-wrap').toggleClass('overlay-item');
        $('.customer-remark-wrap').find('img').parent().not('span, .topics-img-item a').toggleClass('overlay-bg');

        var offset = $(this).offset();
        var topHeight = offset.top;
        $('#right-sidebar.active').css('top', topHeight);
    });


    // $(document).on('click', function(e){
    //     var btn = $('#toggle-sidebar')[0];
    //     var target = $(e.target)[0];
    //     var sidebar = $(target).closest('#right-sidebar').length;
    //     console.log(sidebar);
    //
    //     if(target == btn){
    //
    //     } else {
    //         $(btn).parent().removeClass('close');
    //         if($('.menu-toggle').hasClass('close')){
    //             $('#toggle-sidebar').attr('class','icon icon-formal-menu-toggle-close');
    //         } else{
    //             $('#toggle-sidebar').attr('class','icon icon-formal-menu-toggle-open');
    //         }
    //         $('#right-sidebar').removeClass('active');
    //         $('body').removeClass('fixed-top');
    //         $('.customer-remark-wrap').removeClass('overlay');
    //         $('.customer-remark-wrap').find('img').parent().not('span, .topics-img-item a').removeClass('overlay-bg');
    //     }
    //     if(sidebar == 1){
    //         $('.menu-toggle').addClass('close');
    //         if($('.menu-toggle').hasClass('close')){
    //             $('#toggle-sidebar').attr('class','icon icon-formal-menu-toggle-close');
    //         }
    //         $('body').addClass('fixed-top');
    //         $('#right-sidebar').addClass('active');
    //         $('.customer-remark-wrap').addClass('overlay');
    //         $('.customer-remark-wrap').find('img').parent().not('span, .topics-img-item a').addClass('overlay-bg');
    //     }
    // });

})
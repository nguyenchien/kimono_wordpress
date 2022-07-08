
$(document).ready(function(){

    //Toggle right sidebar
    $('#toggle-sidebar').click(function(){
        $(this).toggleClass('icon-formal-menu-toggle-open icon-formal-menu-toggle-close');
        $(this).parent().toggleClass('close');
        $('body').toggleClass('fixed-top-review');
        $('.review-sidebar-overlay').toggleClass('overlay-review');
        $('#right-ctm-review-sidebar').toggleClass('active');

        /*
        $('.wrap-formal-blog').toggleClass('overlay-item');
        $('.wrap-formal-blog').find('img').closest('.wrap-blog-left-content').toggleClass('overlay-bg');
        $('.wrap-formal-blog').find('.wrap-title-tabs, #breadcrumbs').toggleClass('overlay-bg');
        */

        //var offset = $(this).offset();
        //var topHeight = offset.top;

        $('#right-ctm-review-sidebar').css('top', '0');

    });

    //Right sidebar category
    $('.title-dropdown').click(function(e){
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).next().slideToggle();
    });

    //Show Kimono-Yukata banner
    var today = new Date();
    var currentMonth = today.getMonth() + 1;

    if(currentMonth >= 6 && currentMonth <= 9){
        $('.list-banner .item-2').show();
    } else{
        $('.list-banner .item-1').show();
    }

});
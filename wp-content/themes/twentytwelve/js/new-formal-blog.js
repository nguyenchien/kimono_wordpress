/**
 * Created by PC-06 on 1/30/2018.
 */

$(document).ready(function(){

    //Toggle right sidebar
    $('#toggle-sidebar').click(function(){
        $(this).toggleClass('icon-formal-menu-toggle-open icon-formal-menu-toggle-close');
        $(this).parent().toggleClass('close');
        $('body').toggleClass('fixed-top');
        $('.wrap-sidebar-overlay').toggleClass('overlay');
        $('#right-blog-sidebar').toggleClass('active');

        /*
        $('.wrap-formal-blog').toggleClass('overlay-item');
        $('.wrap-formal-blog').find('img').closest('.wrap-blog-left-content').toggleClass('overlay-bg');
        $('.wrap-formal-blog').find('.wrap-title-tabs, #breadcrumbs').toggleClass('overlay-bg');
        */

        //var offset = $(this).offset();
        //var topHeight = offset.top;

        $('#right-blog-sidebar.active').css('top', '0');


    });

    //Right sidebar category
    $('.title-dropdown').click(function(e){
        e.preventDefault();
        $(this).parent().toggleClass('active');
        $(this).next().slideToggle();
    });

    //Tab content
    $('.tab-item a').click(function(e){
        e.preventDefault();
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        var tabName = $(this).attr('href');
        $('.wrap-blog-left-content ' +  tabName).addClass('active');
        $('.wrap-blog-left-content ' +  tabName).siblings().removeClass('active');
    })
    $('.tab-item.active a').click();

})
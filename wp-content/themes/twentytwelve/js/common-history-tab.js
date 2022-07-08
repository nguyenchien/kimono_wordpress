$(document).ready(function () {
    //Order history tab
    $('.wrap-left-common-sidebar .info-item a').click(function(e){
        if(isSmartPhone()){
            e.preventDefault();
        }
        var tabName = $(this).attr('data-tab');
        $('.tab-order .tab-item[href="#'+ tabName +'"]').click();
    });

     $('.tab-order .tab-item').click(function(e){
         if(isSmartPhone()){
             e.preventDefault();
         }
         var tabActive = $(this).attr('href').replace('#', '');
         $(this).addClass('active').siblings().removeClass('active');
         $('.history-box').find('#' + tabActive).fadeIn().siblings().hide();
     })
});






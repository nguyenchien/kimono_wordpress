/**
 * Created by PC-06 on 2/26/2018.
 */
$(document).ready(function(){
    function tabElement(ele, index){
        ele.addClass('active');
        ele.siblings().removeClass('active');
        ele.closest('.last').siblings().removeClass('active');
        ele.siblings().find('.fm-ranking-tab-item').removeClass('active');
        ele.closest('.wrap-fm-ranking-tab').siblings('.fm-ranking-tab-list');

        var contentList = $('.fm-ranking-content-list');
        var contentShow = $(contentList).find('.fm-ranking-content:eq(' + index +')');
        var otherTab = ele.closest('.wrap-fm-ranking-content').siblings('.wrap-fm-ranking-content').find('.fm-ranking-tab-list > .fm-ranking-tab-item:not(.last):eq('+index+')');
        console.log(otherTab);
        otherTab.addClass('active');
        $(otherTab).siblings().removeClass('active');

        $(contentShow).show();
        $(contentShow).siblings().hide();
    }

    if(isSmartPhone()){
        $('.fm-ranking-tab-list .fm-ranking-tab-item').not('.last').click(function(){
            var index = $(this).index();
            if($(this).parent().hasClass('fm-ranking-sub-list')){
                index = index + 3;
            }

            tabElement($(this), index);

        })

    } else{
        $('.fm-ranking-tab-list .fm-ranking-tab-item').click(function(){
            var index = $(this).index();
            if(index >= 4){
                index = index - 1;
            }
            console.log(index);
            tabElement($(this), index);
        });
    }

    $('.fm-ranking-tab-item.last').click(function(){
        $(this).find('.fm-ranking-sub-list').toggle();
    });

    $('.fm-ranking-tab-list > .fm-ranking-tab-item:first-child').click();

});
/**
 * Created by chienvn on 04/04/2018.
 */
        $(document).ready(function(){
            if($(window).width() < 750){
                var listExpand = [];
                $('.wrap-group-hairset-plan .group-images-new-hairset-plan .list-group-hairset-plan').each(function(i, val){
                    if($(val).find('.link-list-images-hairset').length){
                        listExpand.push($(val));
                    }
                });

                $(listExpand).each(function(i, val){
                    var listExpandItem = $(val).find('.item-group-hairset-plan');
                    $(listExpandItem).each(function(i, val){
                        if(i > 3){
                            var itemHide = $(listExpandItem)[i];
                            $(itemHide).hide();
                        }
                    })
                });
            }
            $('.list-group-hairset-plan .text-view-more').click(function(){
                $(this).closest('.list-group-hairset-plan').find('.item-group-hairset-plan').each(function(i, val){
                    $(val).fadeIn();
                });
                $(this).hide();
            });

            //Change image gallery\
            $(".list-item-image-new-hairset .sub-item-image-new-hairset-plan:first-of-type img").addClass('active');
            $(".list-item-image-new-hairset .sub-item-image-new-hairset-plan img").click(function(){
                $(this).addClass('active');
                $(this).parent().siblings('.sub-item-image-new-hairset-plan').find('img').removeClass('active');
                var thumb_img = $(this).attr('src');
                var main_img = $(this).parents(".list-item-image-new-hairset").siblings(".main-image-hairset-plan");
                main_img.find('img').attr('src',thumb_img);
            });

        });





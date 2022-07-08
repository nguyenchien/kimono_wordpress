/**
 * Created by chienvn on 28/02/2018.
 */

$(document).ready(function () {
    /* Begin: Widget Top Shoplist */
    $('[data-sub-shop]').click(function(){
        var self    = this;
        var target  = $(self).data('sub-shop');
        var $other  = $('[data-sub-shop="'+target+'"]');
        if(target){
            $other.each(function(index, el){
                if(el !== self){
                    $(el).siblings(target).slideUp();
                    $(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
                }else{
                    $(self).siblings(target).slideToggle();
                    $(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
                }
            });
        }
    });
    /* End: Widget Top Shoplist */
});






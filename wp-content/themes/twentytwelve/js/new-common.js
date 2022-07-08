$(document).ready(function () {
    console.log(123);
        $('[data-show-content]').click(function(){
            console.log(123);
            var self    = this;
            var target  = $(self).data('show-content');
            var $other  = $('[data-show-content="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el !== self){
                        $(el).siblings(target).slideUp();
                        $(el).find('.title-cm-user').removeClass('active');
                    }else{
                        $(self).siblings(target).slideToggle();
                        $(self).find('.title-cm-user').toggleClass('active');
                    }
                });
            }
        });

});






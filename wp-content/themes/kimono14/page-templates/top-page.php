<?php
/**
 * Template Name: Kimono Top Page Template
 * Link: top page kyotokimono-rental.com/
 */
wp_register_style('access-style-flexslider', get_template_directory_uri() . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-flexslider');
wp_enqueue_script('access-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
wp_enqueue_style('top-style', get_template_directory_uri() . '/css/top.css', array('twentytwelve-style'));
$styleCss = '';
if(!$isSmartPhone){
    $styleCss = '-pc';
    wp_enqueue_style('top-pc-style', get_template_directory_uri() . '/css/top-pc.css', array('twentytwelve-style'));
}
get_header();
global $language;
if ($language != 'ja') {
    $styleCss .= '-'.$language;
    wp_enqueue_style('top'.$styleCss.'-style', get_template_directory_uri() . '/css/top'.$styleCss.'.css', array('twentytwelve-style'));
}

$lang = Yii::app()->language;
wp_register_style('swe-popup', WP_HOME . '/css/swe-popup.css', array('twentytwelve-style'));
wp_enqueue_style('swe-popup');
wp_enqueue_script('swe-popup', WP_HOME. '/js/swe-popup.js');

$target_lang = 'ja';
$page = get_page_by_path('yukata');
$title = get_the_title($page->ID);
$link_to = WP_HOME.'/'.$lang.'/yukata';
$isSmartphone = Yii::app()->mobileDetect->isSmartPhone();

if ($lang == 'vi') {
    $target_lang = 'vi';
}
$img_url = WP_HOME.'/images/banners/yukata-popup-'.$target_lang.'.png';

if ($isSmartphone) {
    $img_url = WP_HOME.'/images/banners/yukata-popup-sp-'.$target_lang.'.png';
}

?>
<script>
    /*$(function() {
	    var yukata_visited = Swe_Cookies.get("yukata_visited");
	    //if (null == yukata_visited) {
		    var options = {
			    img_url: '<?php //echo $img_url;?>',
			    link_to: '<?php //echo $link_to;?>',
			    title_link: '<?php //echo $title;?>',
			    alt_link: '<?php //echo $title;?>',
			    lang: '<?php //echo $target_lang;?>'
		    };
		    swe_popup.init(options);
	    //}
	    
	    $('.popup .popup-inner a').click(function(){
		    if(!$(this).is('.popup-close')){
			    Swe_Cookies.set("yukata_visited", true, 3650);
		    }
	    })
    });*/
</script>
<?php

if ($lang != 'ja') {
    ?>
    <?php
}
    while ( have_posts() ) : the_post();
        the_content();
    ?>
        <script type="text/javascript">
            var metaslider_46 = function($) {
                $('#metaslider_46').flexslider({
                    slideshowSpeed:3000,
                    animationSpeed:400,
                    animation:"slide",
                    controlNav:true,
                    directionNav:true,
                    pauseOnHover:true,
                    direction:"horizontal",
                    reverse:false,
                    prevText:"",
                    nextText:"",
                    easing:"linear",
                    slideshow:true,
                    useCSS:false,
                    initDelay:2000,
                    iLoad : function (item){
                        var $it = $(item).find('img');
                        $it.length && $it.attr('data-lzsrc') && $it.attr('src', $it.attr('data-lzsrc')).removeAttr('data-lzsrc');

                    },
                    start: function(slider){
                        setTimeout(
                            function(){ slider.vars.iLoad(slider.slides[slider.getTarget("next")]) }
                            ,slider.vars.initDelay
                        );
                    },
                    before: function(slider){
                        slider.vars.iLoad(slider.slides[slider.animatingTo]);
                    },
                    after: function(slider){
                        slider.vars.iLoad(slider.slides[slider.getTarget("next")]);

                        slider.stop();

                        if(slider.currentSlide == 0){
                            slider.vars.slideshowSpeed = 3000;
                        } else {
                            slider.vars.slideshowSpeed = 4000;
                        }

                        slider.play();
                    }
                });
            };
            var timer_metaslider_46 = function() {
                var slider = !window.jQuery ? window.setTimeout(timer_metaslider_46, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_46, 100) : metaslider_46(window.jQuery);
            };
            timer_metaslider_46();
            $(document).ready(function () {
                if(curLang == 'ko'){
                    $(".block-for-top-page").appendTo("#box-footer");
                    $(".block-for-top-page").show();
                    $(".plan-page").before($(".socialTop"));
                    $(".socialTop").show();
                    $(".box-customer-gallery").appendTo($(".socialTop"));

                    if( isSmartPhone()){
                        $(".block-for-top-page").appendTo($(".main-content"));
                        $(".block-for-top-page").show();
                    }

                }

            });
        </script>
<?php
    endwhile; // end of the loop.
get_footer();
?>
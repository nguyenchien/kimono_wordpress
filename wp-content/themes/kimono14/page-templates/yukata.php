<?php
/**
 * Template Name: Yukata Template
 * Links: /yukata
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
global $language, $is_yukata;
if ($language != 'ja') {
    $styleCss .= '-'.$language;
    wp_enqueue_style('top'.$styleCss.'-style', get_template_directory_uri() . '/css/top'.$styleCss.'.css', array('twentytwelve-style'));
}
if ($is_yukata) {
    wp_register_style('top-yukata-fix', get_template_directory_uri() . '/css/top-yukata.css');
    wp_enqueue_style('top-yukata-fix');
}
if(!$isSmartPhone){
    wp_register_style('top-yukata-pc', get_template_directory_uri() . '/css/top-yukata-pc.css');
    wp_enqueue_style('top-yukata-pc');
}
?>
<div class="content-yukata">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div><!-- end content-yukata -->
<?php get_footer(); ?>

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
            after: function(slider){
                slider.stop();
                if(slider.currentSlide == 0){
                    slider.vars.slideshowSpeed = 3000;
                } else {
                    slider.vars.slideshowSpeed = 4000;
                }
                slider.play();
//                        console.log('Current Slide: ' + slider.currentSlide + '; slide show Speed: ' + slider.vars.slideshowSpeed);
            }
        });
    };
    var timer_metaslider_46 = function() {
        var slider = !window.jQuery ? window.setTimeout(timer_metaslider_46, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_46, 100) : metaslider_46(window.jQuery);
    };
    timer_metaslider_46();
</script>

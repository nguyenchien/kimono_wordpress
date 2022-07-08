<?php
/**
 * Template Name: New Tourist Spots
 * Links: /tourist-spots
 */
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
wp_register_style('access-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-slick');
wp_register_style('access-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-slick-theme');
wp_register_style('tourist-spots', get_template_directory_uri() . '/css/tourist-spots.css', array('twentytwelve-style'), '20201029');
wp_enqueue_style('tourist-spots');
wp_register_style('new-tourist-spots', get_template_directory_uri() . '/css/new-tourist-spots.css', array('twentytwelve-style'), '20201029');
wp_enqueue_style('new-tourist-spots');
//wp_register_style('widget-top-shop-list-style', get_template_directory_uri() . '/css/widget-top-shoplist.css', array('twentytwelve-style'));
//wp_enqueue_style('widget-top-shop-list-style');
wp_register_style('tourist-flexslider', get_template_directory_uri() . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('tourist-flexslider');
wp_enqueue_script('tourist-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
if($isSmartPhone){
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-sp.css', array('twentytwelve-style'));
} else{
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-pc.css', array('twentytwelve-style'));
}
wp_register_style('new-access-style', get_template_directory_uri() . '/css/new-access.css', array('twentytwelve-style'));
wp_enqueue_style('new-access-style');
wp_enqueue_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css');
wp_enqueue_script('access-script-slick', WP_HOME . '/js/slick.min.js');


global $post;
Yii::app()->language == 'ja' ? get_header('new-kimono') : get_header();
?>
    <div class="container-box clearfix">
        <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        } ?>
        <?php if(get_field('page_h1')): ?>
		    <h1 class="page-title">
                <?php the_field('page_h1'); ?>
		    </h1>
		    <style>
			    .page-title {font-size: 14px;margin: 10px 0;letter-spacing: 1px;}
		    </style>
        <?php endif; ?>
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <?php the_excerpt(); ?>
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php get_sidebar('top-page-left') ?>
                                </div>
                                <div class="right-column">
                                    <div class="container clearfix new-tourist-page">
                                        <?php while (have_posts()) : the_post(); ?>
                                            <div class="box-content-page page-<?php echo basename(get_permalink()); ?> clearfix">
                                                <?php
                                                    the_content();
                                                ?>
                                                <?php echo php_set_base_url(get_field('tourist_shop_list')); ?>
                                                <?php the_field('tourist_shop_desc'); ?>
                                                <?php echo php_set_base_url(get_field('tourist_map')); ?>
                                                <div class="wrap-btn-reserve flexbox justify-content-center">
                                                    <a href="/kimono" class="btn-formal btn-color-pink btn-reserve">予約に進む</a>
                                                </div>
                                                <?php echo php_set_base_url(get_field('tourist_slider')); ?>
                                                <div class="wrap-banner-tourist-spots" id="other-area-banner">
                                                    <h2 class="title-general text-center title-general-icon align-items-center">
                                                        <span class="icon icon-formal-search flexbox"></span>
                                                        <span class="text-title-general">他の地域を観光する</span>
                                                    </h2>
                                                    <ul class="list-banner-tourist flex-tourist">
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/kyoto-area/station-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-kyoto.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/kyoto-area/gion-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-gionshijo.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/kyoto-area/kiyomizu-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-kiyomizu.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/kyoto-area/arashiyama-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-arashiyama.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/osaka-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-osaka.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/asakusa-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-asakusa.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/kamakura-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-kamakura.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/kanazawa-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-kanazawa.png" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="item-banner-tourist">
                                                            <a href="<?php echo home_url()?>/access/fukuoka-area/tourist-spots">
                                                                <img src="<?php echo WP_HOME ?>/images/new-kimono/access/banner-map-dazaifu.png" alt="">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php the_field('shop_intro'); ?>

                                                <script type="text/javascript">
                                                    $(document).ready(function(){

                                                        //Shoplist
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


                                                        $('.slick-slider-tourist').slick({
                                                            vertical: true,
                                                            slidesToShow: 1,
                                                            slidesToScroll: 1,
                                                            speed: 300,
                                                            draggable: false,
                                                            dots: false,
                                                            arrows: true,
                                                            appendArrows: $('.slick-slider-tourist'),
                                                            responsive: [
                                                                {
                                                                    breakpoint: 750,
                                                                    settings: {
                                                                        vertical: false,
                                                                        slidesToShow: 1,
                                                                        slidesToScroll: 1,
                                                                        draggable: true,
                                                                        dots: true,
                                                                        arrows: true
                                                                    }
                                                                }
                                                            ]
                                                        });

                                                        //Link to top
                                                        $('#toCart').html('きものレンタルを予約する');
                                                        $('#toCart').attr('href', '/reserve');
                                                        $('#toCart').fadeIn();

                                                            //Place slider
                                                            if(isSmartPhone()){
                                                                $('#flex-slider-tourist').flexslider({
                                                                    animation: "slide",
                                                                    animationLoop: false,
                                                                    slideshow: true,
                                                                    minItems: 1,
                                                                    maxItems: 1,
                                                                    prevText:"",
                                                                    nextText:"",
                                                                    directionNav: true,
                                                                    pausePlay: false,
                                                                    controlNav: true,
                                                                    slideshowSpeed: 4000,
                                                                    animationSpeed: 400
                                                                });
                                                            } else{
                                                                $('#flex-slider-tourist').flexslider({
                                                                    animation: "slide",
                                                                    animationLoop: false,
                                                                    slideshow: true,
                                                                    itemWidth: 408,
                                                                    itemMargin: 20,
                                                                    minItems: 3,
                                                                    maxItems: 3,
                                                                    prevText:"",
                                                                    nextText:"",
                                                                    directionNav: true,
                                                                    pausePlay: false,
                                                                    controlNav: true,
                                                                    slideshowSpeed: 4000,
                                                                    animationSpeed: 400
                                                                });
                                                            }
                                                        });

                                                    </script>
                                                    <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
                                                </div><!-- end div.box-content-page -->
                                            <?php Yii::app()->controller->widget('application.components.widgets.EventTrackingContactForm'); ?>
                                        <?php endwhile; // end of the loop. ?>
                                    </div><!-- end container -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end wrap-highend-v2 -->
    </div><!-- end container -->

<?php Yii::app()->language == 'ja' ? get_footer('new-kimono') : get_footer();?>
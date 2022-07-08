<?php
/**
 * Template Name: Yukata Template
 * Links: /yukata
 */
global $post, $language;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
get_header('new-kimono');
wp_enqueue_style( 'kimono-news-style' , get_template_directory_uri()  . '/css/kimono-news.css', array('twentytwelve-style'),$date);
if($isSmartPhone){ ?>
    <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_YUKATA_TOP_SP?>" rel="stylesheet" type="text/css" />
<?php } else{ ?>
    <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_YUKATA_TOP_PC?>" rel="stylesheet" type="text/css" />
<?php }
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');

?>
<div class="container-box clearfix">
    <?php echo do_shortcode('[ShopListMenuAccessTop]'); ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php get_sidebar('top-page-left') ?>
                            </div>
                            <div class="right-column">
                                <?php
                                while (have_posts()) : the_post();
                                    the_content();
                                endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="right-column-content">
                        <?php get_sidebar('top-page-right') ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end wrap-highend-v2 -->
</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
<?php if($isSmartPhone) : ?>
    <script>
        $(document).ready(function(){
            if($('.slider-gallery').length > 0){
                $('.slider-gallery').not('.slick-initialized').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    arrows: true,
                    lazyLoad: 'ondemand'
                });
            }
        })
    </script>
<?php else: ?>
    <script>
        $(document).ready(function(){
            if($('.slider-gallery').length > 0){
                $('.slider-gallery').not('.slick-initialized').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    arrows: true,
                    lazyLoad: 'ondemand'
                });
            }
        })
    </script>
<?php endif; ?>

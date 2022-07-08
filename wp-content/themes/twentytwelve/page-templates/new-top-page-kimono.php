<?php
/**
 * Template Name: New Top Page Kimono
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url, 'access') !== false) {
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}

wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_style( 'kimono-news-style' , get_template_directory_uri()  . '/css/kimono-news.css', array('twentytwelve-style'),$date);
if (!is_front_page()) {
    wp_enqueue_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css');
}
wp_enqueue_script('new-top-page-kimono-script', get_template_directory_uri() . '/js/new-top-page-kimono.js');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if($isSmartPhone){ ?>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/widget-top-shoplist-sp.css">
<?php } else{ ?>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/widget-top-shoplist-pc.css">
<?php }
if (is_front_page()) {
    if($isSmartPhone){ ?>
        <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_KIMONO_TOP_SP?>" rel="stylesheet" type="text/css" />
    <?php } else{ ?>
        <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_KIMONO_TOP_PC?>" rel="stylesheet" type="text/css" />
    <?php }
} else {
    if($isSmartPhone){ ?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/widget-top-shoplist-other-sp.css">
        <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_KIMONO_TOP_AREA_SP?>" rel="stylesheet" type="text/css" />
    <?php } else{ ?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/widget-top-shoplist-other-pc.css">
        <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_KIMONO_TOP_AREA_PC?>" rel="stylesheet" type="text/css" />
    <?php }
}

$baseUrl = Yii::app()->baseUrl;
global $post, $language;
$language = Yii::app()->language;

?>
    <?php
        $lang = Yii::app()->language;
    ?>
    <div class="container-box clearfix">
        <?php
        $slider_banner = get_field('slider_banner');
        ?>
        <?php if( !empty($slider_banner)) : ?>
			<style>
				.slider-banner .flexslider{
					max-height: initial !important;
				}
			</style>
			<div class="banner-top-highend-v2 area">
				<div class="container-box">
                    <?php echo htmlspecialchars_decode($slider_banner); ?>
				</div>
			</div>
        <?php endif; ?>
        <?php
        if (function_exists('yoast_breadcrumb') && !is_front_page()) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
        <?php if(get_field('page_h1')): ?>
		    <!--<h1 class="page-title">
                <?php /*the_field('page_h1'); */?>
		    </h1>
	        <style>
		        .page-title {font-size: 14px;margin: 10px 0;letter-spacing: 1px;}
	        </style>-->
        <?php endif; ?>
        <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <?php if(!$isSmartPhone) : ?>
                                    <div class="left-column">
                                        <?php get_sidebar('top-page-left-v3') ?>
                                    </div>
                                <?php endif; ?>
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
<script>
    $(document).ready(function(){
        $('body').each(function(){
            $('.slider-banner').addClass('imagesLoaded');
        });
        //Instagram gallery slider
        if($('.slider-gallery').length > 0){
            $('.slider-gallery').not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                lazyLoad: 'ondemand'
            });
        }
        <?php if($lang == 'ja') : ?>
        $.ajax({
            url: '/ajaxContent/getABTestSession',
            dataType: "json",
            success: function(data) {
                if(data.abTestSession) {
                    $('.btn-formal').text('着物レンタルプランを見てみる');
                    $('.btn-formal').attr('href','/kimono?btn=b');
                }
                $('.btn-formal').eventTrackingAnalytics({
                    eventCategory: "「予約する」OR 「着物レンタルプランを見てみる",
                    eventAction: $('.btn-formal').first().text(),
                    eventLabel: $('.btn-formal').first().text(),
                    unloaded: 'auto'
                });
            }
        });
        <?php endif; ?>
        // Custom FAQ
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
    })
</script>

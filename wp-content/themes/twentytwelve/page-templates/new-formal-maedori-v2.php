<?php
/**
 * Template Name: New Formal Maedori V2
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
global $language, $post;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$postName = $post->post_name;
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
get_header('formal');

if($isSmartPhone){
    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-formal-maedori-v2-sp-style', get_template_directory_uri() . '/css/new-formal-maedori-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-maedori-v2-sp-style');
}else{
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-formal-maedori-v2-pc-style', get_template_directory_uri() . '/css/new-formal-maedori-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-maedori-v2-pc-style');
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
    }
    ?>

    <?php if($isSmartPhone) : ?>
        <?php if(get_field('title_cate_sp')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_cate_sp'); ?>
            </h1>
        <?php endif; ?>
    <?php else: ?>
        <?php if(get_field('title_cate_pc')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_cate_pc'); ?>
            </h1>
        <?php endif; ?>
    <?php endif; ?>


    <div class="main-baner-top-v2">
        <?php if($isSmartPhone) : ?>
            <div class="banner-top-v2">
                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-<?= $postName; ?>.jpg">
            </div>
        <?php else: ?>
            <div class="banner-top-v2">
                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-pc-<?= $postName; ?>.jpg">
            </div>
        <?php endif; ?>
        <?php if($isSmartPhone) : ?>
            <?php the_field('cate_desc'); ?>
        <?php endif ?>

    </div><!--end main-baner-top-v2-->

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCodeNewStyle(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-cate-list-v2 <?= $postName?>">
                                <div class="padding-v2">
                                    <!-- Shop intro -->
                                    <?php
                                    $shop_intro = get_field('shop_intro');
                                    if ($shop_intro) {
                                        echo do_shortcode($shop_intro);
                                    }
                                    ?>

                                    <!-- Rental plan -->
                                    <?php
                                    $rental_plan = get_field('rental_plan');
                                    if ($rental_plan) {
                                        echo do_shortcode(php_set_base_url(get_field('rental_plan')));
                                    }
                                    ?>

                                    <!-- Furisode lineup -->
                                    <div class="wrap-slider-v2 wrap-slider-furisode-first wrap-slider-maedori-first">
                                        <div class="wrap-title-v2 flexbox">
                                                    <span class="icon-circle">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                    </span>
                                            <div class="wrap-text-title">
                                                <h2 class="lbl-title">振袖人気ランキング</h2>
                                                <span class="des-sm-title">Furisode lineup</span>
                                            </div>
                                        </div>
                                        <div class="slider-ranking wrap-slider-product slider-ranking-maedori" id="slider-ranking">
                                            <?php
                                            $list_popular_products = get_field('slider_product_list_top');
                                            ?>
                                            <?php if ($list_popular_products) : ?>
                                                <div class="wrap-list-formal-product">
                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div><!--end slider-->
                                        <div class="wrap-btn-v2 flexbox">
                                            <div class="btn-v2 pink-maedori btn-v2-maedori btn-v2-irotomesode btn-v2-furisode">
                                                <a href="<?= home_url(); ?>/formal/furisode/list">
                                                    <div class="pattern"></div>
                                                    <div class="text">
                                                        <span class="text-link">すべての商品を見る</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern last"></div>
                                                </a>
                                            </div>
                                            <div class="btn-v2 btn-v2-maedori btn-v2-irotomesode formal-preview-popup-handle">
                                                <div class="btn-v2-reserve">
                                                    <div class="pattern"></div>
                                                    <div class="text">
                                                        <span class="text-link">下見の予約をする</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern last"></div>
                                                </div>
                                            </div>
                                        </div><!--end wrap-btn-v2-->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div><!--end wrap-line-v2-->
                                    </div ><!--endwrap-slider-v2-->

                                    <div class="wrap-title-your-choice-furisode">
                                        <div class="intro-title-your-choice">
                                            <div class="wrap-title-your-choice">
                                                <p class="title-your-choice sm-title-your-choice">Your Choice!</p>
                                                <p class="title-your-choice big-title-your-choice">私らしい最高の一着を<br class="sp">見つける</p>
                                            </div>
                                        </div>
                                        <div class="intro-img-your-choice">
                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/arrow-down-furisode.svg">
                                        </div>
                                    </div>
                                    <div class="group-wrap-slider-v2-furisode">
                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $list_best_clothes_sp = get_field('slider_product_list_best_clothes_sp');
                                            if($list_best_clothes_sp):?>
                                                <?= do_shortcode(php_set_base_url($list_best_clothes_sp));?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php
                                            $list_best_clothes_pc = get_field('slider_product_list_best_clothes_pc');
                                            if($list_best_clothes_pc):?>
                                                <?= do_shortcode(php_set_base_url($list_best_clothes_pc));?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div><!-- End group-wrap-slider-v2-furisode-->
                                    <div class="wrap-line-v2 wrap-line-v2-maedori">
                                        <div class="line-v2 line-v2-double"></div>
                                    </div>

                                    <!-- Describe Reserve Information -->
                                    <?php if($isSmartPhone): ?>
                                        <?php if(get_field('describe_reserve_information_sp')): ?>
                                             <?php echo php_set_base_url(get_field('describe_reserve_information_sp')); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(get_field('describe_reserve_information_pc')): ?>
                                             <?php echo php_set_base_url(get_field('describe_reserve_information_pc')); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- QA Question -->
                                    <?php
                                    $qa_question = get_field('qa_question');
                                    if ($qa_question) {
                                        echo do_shortcode($qa_question);
                                    }
                                    ?>

                                    <!-- List Shop Info -->
                                    <?php
                                    $list_shop_info = get_field('list_shop_info');
                                    if ($list_shop_info) {
                                        echo php_set_base_url(get_field('list_shop_info'));
                                    }
                                    ?>

                                    <!-- Banner Bottom Maedori -->
                                    <?php
                                    $banner_bottom_maedori = get_field('banner_bottom_maedori');
                                    if ($banner_bottom_maedori) {
                                        echo php_set_base_url(get_field('banner_bottom_maedori'));
                                    }
                                    ?>

                                    <!-- Intro Bottom -->
                                    <?php
                                    $intro_bottom = get_field('intro_bottom');
                                    if ($intro_bottom) {
                                        echo do_shortcode($intro_bottom);
                                    }
                                    ?>

                                </div><!--end padding-v2-->
                            </div><!--end right-column right-cate-list-v2-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php get_footer('formal') ;?>
<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
))
?>
<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script>
    $(document).ready(function(){
        // MINH
        if ($('.slider-ranking').length > 0) {
            $('.slider-ranking .list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
            });
        }


        $('.wrap-slider-v2-furisode').each(function(i, val){
            $(val).find('.list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            });
        });

        // Slider ubugi
        $('.wrap-slider-product .list').not('.slick-initialized').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: true,
            lazyLoad: 'ondemand',
            responsive: [{
                breakpoint: 750,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
        });

        /* Show formal popup - start */
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        $(document).ready(function(){
            /* Begin: faqs */
            $(".box-faqs-item").click(function(){
                $(this).find(".icon-fa").toggleClass("icon-fa-collapsed-down-faqs icon-fa-collapsed-top-faqs")
                $(this).siblings(".box-faqs-item-content").slideToggle();
            });
            /* End: faqs */
        });
    })
</script>


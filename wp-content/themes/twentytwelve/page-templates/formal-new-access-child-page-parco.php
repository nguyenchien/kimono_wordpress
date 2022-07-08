<?php
/**
 * Template Name: Formal New Access Child Page Parco
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
global $language, $post, $custom_taxonomies, $custom_post_type;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$postName = $post->post_name;
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
get_header('formal');
?>
<link rel="preload" href="<?= get_template_directory_uri() ?>/css/grid-booking-status-new-<?=$isSmartPhone?'sp':'pc'?>.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/grid-booking-status-new-<?=$isSmartPhone?'sp':'pc'?>.css"></noscript>
<link rel="preload" href="<?= get_template_directory_uri() ?>/css/grid-booking-status-new-<?=$isSmartPhone?'sp':'pc'?>.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/new-formal-popup-preview-<?=$isSmartPhone?'sp':'pc'?>.css"></noscript>
<?php
$postName = $post->post_name;
$shop_id = get_field('shop_id');
$post_parent = get_post($post->post_parent)->post_name;
$post_parent = isset( $post_parent ) ? $post_parent : '';
/*
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
} else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
 */
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js');
?>
<link rel="preload" href="/css/searchform.css?v=21062021" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=21062021"></noscript>
<link rel="preload" href="<?= get_template_directory_uri() ?>/css/font-icon-shop.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/font-icon-shop.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>
<?php
    wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
    wp_enqueue_script('jquery-visible', WP_HOME . '/js/jquery.visible.min.js');
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2 breadcrumbs-fm-v2-parco">', '</div>');
    }
    ?>
    <?php if($isSmartPhone) : ?>
        <?php
        $title_cate_sp = get_field('title_cate_sp');
        if ($title_cate_sp) {
            echo $title_cate_sp;
        }
        ?>
    <?php else: ?>
        <?php
        $title_cate_pc = get_field('title_cate_pc');
        if ($title_cate_pc) {
            echo $title_cate_pc;
        }
        ?>
    <?php endif; ?>
    <?php if($isSmartPhone) : ?>
        <?php
        $main_banner_sp = get_field('main_banner_sp');
        if ($main_banner_sp) {
            echo do_shortcode(php_set_base_url($main_banner_sp));
        }
        ?>
    <?php else: ?>
        <?php
        $main_banner_pc = get_field('main_banner_pc');
        if ($main_banner_pc) {
            echo do_shortcode(php_set_base_url($main_banner_pc));
        }
        ?>
    <?php endif; ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
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

                            <div class="right-column right-column-list right-cate-list-v2 right-new-shop-formal-v2 right-column-sendai-parco2">
                                <div class="padding-v2">
                                    <div class="new-access-child-page  hd-access asakusa <?php echo $post->post_name; ?>">
                                        <div class="container-box top-shop">
                                            <!-- Banner top + slider -->
                                            <div class="shop-info">
                                                <?php
                                                $listGalery = getGaleryFromPost($post);
                                                if (!empty($post->post_content)):
                                                    $content = strip_shortcode_gallery(get_the_content());
                                                    ?>
                                                    <?php /* ?>
                                                    <div class="shop-list">
                                                        <div class="slide-images">
                                                            <div class="gallery-item">
                                                                <div class="main-image">
                                                                    <?php echo php_set_base_url($content); ?>
                                                                </div><!-- end main-image -->
                                                                <?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
                                                                    <div class="list-image right">
                                                                        <ul class="clearfix">
                                                                            <?php
                                                                            $shop_title = strip_tags(get_the_title());
                                                                            if (!empty($listGalery) && is_array($listGalery)) :
                                                                                foreach ($listGalery as $galery) :
                                                                                    $galery = $galery['ids'];

                                                                                    if (!empty($galery) && count($galery) != 0) :
                                                                                        $i = 0;
                                                                                        foreach ($galery as $attachment_id):

                                                                                            $ok = swe_wp_get_attachment_image_src($attachment_id);
                                                                                            if (!empty($ok)) {
                                                                                                $image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
                                                                                                $thumb = swe_wp_get_attachment_image_src($attachment_id, array(133, 100));
                                                                                            }
                                                                                            if (!empty($ok)) {
                                                                                                $i = $i + 1;
                                                                                                ?><li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
                                                                                                <a href="#">
                                                                                                    <img data-src="<?php echo $thumb[0]; ?>"
                                                                                                         alt="<?php echo $shop_title; ?>"/>
                                                                                                </a>
                                                                                                </li>
                                                                                            <?php } ?>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </ul>
                                                                    </div><!-- end list-image -->
                                                                <?php
                                                                else:
                                                                    wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
                                                                    wp_enqueue_style('box-slider');
                                                                    if (!$isSmartPhone) {
                                                                        wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
                                                                        wp_enqueue_style('box-slider-pc');
                                                                    }
                                                                    ?>
                                                                    <?php if(in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE) && !empty($listGalery)){ ?>
                                                                    <div class="shop-has-slide flexslider <?php echo (in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)?'shop-has-slide-text':'');?>" id="slide_shop_<?= $shop_id; ?>">
                                                                        <ul class="slides">
                                                                            <?php
                                                                            if (!empty($listGalery) && is_array($listGalery)) :
                                                                                foreach ($listGalery as $galery) :
                                                                                    $galery = $galery['ids'];

                                                                                    if (!empty($galery) && count($galery) != 0) :
                                                                                        $i = 0;
                                                                                        foreach ($galery as $attachment_id):
                                                                                            ?>
                                                                                            <?php
                                                                                            $ok = swe_wp_get_attachment_image($attachment_id);

                                                                                            // Get image alt of gallery
                                                                                            $image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);

                                                                                            if(checkPostIDInSiteMedia($attachment_id)){
                                                                                                switch_to_blog($sites['blog_media']);
                                                                                                //Get title, description image
                                                                                                $attachment = get_post($attachment_id);
                                                                                                $title = get_the_title($attachment_id);
                                                                                                $description = getTranslateContent($attachment->post_content);
                                                                                                restore_current_blog();
                                                                                            } else {
                                                                                                //Get title, description image
                                                                                                $attachment = get_post($attachment_id);
                                                                                                $title = get_the_title($attachment_id);
                                                                                                $description = getTranslateContent($attachment->post_content);
                                                                                            }
                                                                                            if (!empty($ok)) {
                                                                                                $i = $i + 1;
                                                                                                $image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
                                                                                                $thumb = swe_wp_get_attachment_image_src($attachment_id, array(230, 173));
                                                                                                ?>
                                                                                                <li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
                                                                                                    <a href="#">
                                                                                                        <img data-src="<?php echo $thumb[0]; ?>"
                                                                                                             alt="<?php echo $image_alt; ?>"/>
                                                                                                    </a>
                                                                                                </li>
                                                                                            <?php } ?>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach;
                                                                            endif; ?>

                                                                        </ul>
                                                                    </div>
                                                                    <!-- Style and JS for slider banner access -->
                                                                    <style>
                                                                        .shop-has-slide .slides {
                                                                            opacity: 0;
                                                                            visibility: hidden;
                                                                            transition: opacity 0.3s ease;
                                                                        }
                                                                        .shop-has-slide .slides.slick-initialized {
                                                                            opacity: 1;
                                                                            visibility: visible;
                                                                        }
                                                                        .shop-has-slide .slick-slide {
                                                                            margin: 0 5px;
                                                                        }
                                                                        .shop-has-slide .slick-list {
                                                                            margin: 0 -5px;
                                                                        }
                                                                        .shop-has-slide .slick-dotted.slick-slider{
                                                                            margin-bottom: 50px;
                                                                        }
                                                                    </style>
                                                                    <?php if($isSmartPhone) : ?>
                                                                        <style>
                                                                            .shop-has-slide .slick-dots{
                                                                                bottom: -35px;
                                                                            }
                                                                            .shop-has-slide .slick-dots li{
                                                                                margin: 0;
                                                                            }
                                                                            .shop-has-slide .slick-dots li button:before{
                                                                                font-size: 30px;
                                                                            }
                                                                        </style>
                                                                    <?php else: ?>
                                                                        <style>
                                                                            .shop-has-slide .slick-slide img{
                                                                                width: 100%;
                                                                            }
                                                                            .slides-access-shop .slick-slide {
                                                                                margin: 0 5px;
                                                                            }
                                                                            .slides-access-shop .slick-list {
                                                                                margin: 0 -5px;
                                                                            }
                                                                        </style>
                                                                    <?php endif; ?>
                                                                <?php } ?>

                                                                <?php endif; ?>
                                                            </div><!-- gallery-item -->
                                                        </div><!-- end slide-images -->
                                                    </div><!-- end shop-list -->
                                                    <?php */ ?>
                                                <?php
                                                else:
                                                    if (!empty($post->post_excerpt)):
                                                        ?>
                                                        <div class="page-excerpt no-gallery"><?php the_excerpt(); ?></div>
                                                    <?php
                                                    endif;
                                                endif; // end if($listGalery){
                                                ?>
                                                <?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
                                                    <div class="shop-detail">
                                                        <div class="title"><?php echo Yii::t('wp_theme', '店舗情報'); ?></div>
                                                        <?php echo do_shortcode(get_field('shop_detail_3')); ?>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                            <!-- Refund Banner -->
                                            <?php
                                            $refund_banner = get_field('refund_banner');
                                            if ($refund_banner) {
                                                echo do_shortcode($refund_banner);
                                            }
                                            ?>

                                            <!-- Shop intro -->
                                            <?php
                                            $shop_intro = get_field('shop_intro');
                                            if ($shop_intro) {
                                                echo do_shortcode($shop_intro);
                                            }
                                            ?>

                                            <!-- Box circle -->
                                            <div class="wrap-top-plan-circle-fm-v2 asakusa <?= $postName; ?>">
                                                <?php
                                                $top_plan_circle = get_field('top_plan_circle');
                                                if ($top_plan_circle) {
                                                    echo do_shortcode(php_set_base_url($top_plan_circle));
                                                }
                                                ?>
                                            </div>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-double"></div>
                                                </div>

                                                <!-- Product list -->
                                                <div class="wrap-ginza-store wrap-products-shop-store asakusa <?= $postName; ?>">
                                                    <?php
                                                    $products_shop_store = get_field('products_shop_store');
                                                    if ($products_shop_store) {
                                                        echo do_shortcode(php_set_base_url($products_shop_store));
                                                    }
                                                    ?>
                                                </div>
                                            <!-- Access map -->
                                            <div class="wrap-google-map-fm-v2 asakusa sendai-parco2 <?= $postName; ?>">
                                                <?php
                                                $google_map = get_field('google_map');
                                                if ($google_map) {
                                                    echo do_shortcode(php_set_base_url($google_map));
                                                }
                                                ?>
                                            </div>

                                            <div class="wrap-general-google-map-btn asakusa  sendai-parco2 flexbox <?= $postName; ?>">
                                                <?php
                                                $google_map_banner = get_field('google_map_banner');
                                                if ($google_map_banner) {
                                                    echo do_shortcode(php_set_base_url($google_map_banner));
                                                }
                                                ?>
                                            </div>

                                            <!-- Rental plan -->
                                            <?php
                                            if($isSmartPhone){
                                                echo do_shortcode(php_set_base_url(get_field('rental_plan_sp')));
                                            } else{
                                                echo do_shortcode(php_set_base_url(get_field('rental_plan_pc')));
                                            }
                                            ?>

                                            <!-- Banner photo session -->
                                            <div class="section-banner-photo-session asakusa <?= $postName; ?>">
                                                <?php if(get_field('banner_photo_session')): ?>
                                                    <?php echo php_set_base_url(get_field('banner_photo_session')); ?>
                                                <?php endif; ?>
                                            </div>
                                            <!-- NewThai -->
                                            <div class="wrap-product-kid-content">
                                                <?php
                                                $product_kid_content = get_field('product_kid_content');
                                                if(!empty($product_kid_content)){
                                                    echo do_shortcode(php_set_base_url($product_kid_content ));
                                                }
                                                ?>
                                            </div>
                                            <!-- Slider ranking -->
                                            <?php
                                            $product_by_shop_v2 = get_field('product_by_shop_v2');
                                            if(!empty($product_by_shop_v2)){
                                                echo do_shortcode(php_set_base_url($product_by_shop_v2));
                                            }
                                            ?>

                                            <!-- Video experience -->
                                            <?= do_shortcode(get_field('video_experience')); ?>

                                            <!-- Grid booking -->
                                            <div id="grid-booking" class="wrap-reservation-status-fm-v2 asakusa <?= $postName; ?>">
                                                <div class="container-box section-booking-top-page">
                                                    <section class="block-viewbooking-top-page">
                                                        <div class="wrap-title-v2 flexbox">
                                                            <span class="icon-circle"><img data-src="<?= WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
                                                            <div class="wrap-text-title">
                                                                <h2 class="lbl-title">店舗予約状況</h2>
                                                                <span class="des-sm-title">Reservation status</span>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-text-obove-grid-booking"><?= Yii::t('access','text-above-grid-booking')?>
                                                            <p style="color:red; font-size: 16px"><?=Yii::t('wp_theme.access','9時台より早い時間帯のご予約はコールセンター までお問い合わせくださいませ。');?></p>
                                                        </div>
                                                        <div id="box-calendar" class="sixteen columns row"></div>
                                                    </section>
                                                </div>
                                            </div>

                                            <!-- Spots -->
                                            <div class="wrap-spots-shop-fm-v2 asakusa <?= $postName; ?>">
                                                <?php
                                                $spots_shop = get_field('spots_shop');
                                                if ($spots_shop) {
                                                    echo do_shortcode(php_set_base_url($spots_shop));
                                                }
                                                ?>
                                            </div>
                                            <!-- Columns -->
                                            <div class="wrap-column-post wrap-column-post-<?= $postName; ?>">
                                                <?php if($isSmartPhone) : ?>
                                                    <?php echo php_set_base_url(get_field('column_spot_title_sp')); ?>
                                                <?php else: ?>
                                                    <?php echo php_set_base_url(get_field('column_spot_title_pc')); ?>
                                                <?php endif; ?>
                                                <?php
                                                $spots_shop_mode_2 = get_field('spots_shop_mode_2');
                                                if ($spots_shop_mode_2) {
                                                    echo do_shortcode(php_set_base_url($spots_shop_mode_2));
                                                }
                                                ?>
                                            </div>
                                            <!-- Instagram -->
                                                <?php
                                                $instagram_gallery = get_field('instagram_gallery');
                                                echo do_shortcode(php_set_base_url($instagram_gallery));
                                                ?>
                                            <!-- Blogs -->
                                            <div class="wrap-blog-shop-fm-v2 ginza-honten asakusa <?= $postName; ?>">
                                                <div class="wrap-blog-and-banner-plan">
                                                    <div class="wrap-title-v2 flexbox"><span class="icon-circle"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
                                                        <div class="wrap-text-title">
                                                            <h2 class="lbl-title"><?= Yii::t('wp_theme.access', '新着ブログ')?></h2>
                                                            <span class="des-sm-title">Blog</span>
                                                        </div>
                                                    </div>
                                                    <?php if (Yii::app()->language === 'ja'): ?>
                                                        <?php
                                                        if ($shop_blog = get_field('shop_blog')):
                                                            $taxonomy = $custom_taxonomies['blog'];
                                                            $post_type = $custom_post_type['blog'];
                                                            $term = get_term_by('slug', $shop_blog, $taxonomy);
                                                            $data = get_category_data($term);
                                                            global $isSmartPhone;

                                                            // Restore original Post Data
                                                            wp_reset_postdata();
                                                            // WP_Query arguments
                                                            $args = array(
                                                                $taxonomy => $shop_blog,
                                                                'post_type' => $post_type,
                                                                'post_status' => 'publish',
                                                                'posts_per_page' => $isSmartPhone ? 2 : 3,
                                                                'order' => 'DESC',
                                                                'orderby' => 'date',
                                                            );

                                                            // The Query
                                                            $my_query = new WP_Query($args);

                                                            // The Loop
                                                            if ($my_query->have_posts()) {
                                                                $i = 1;
                                                                $title = $data['shop'];
                                                                ?>
                                                                <div class="content-new-info wrap-wg-fm-information wrap-wg-fm-information-access">
                                                                    <div class="item-info item-info-work">
                                                                        <ul class="list-info flexbox">
                                                                            <?php
                                                                            while ($my_query->have_posts()) {
                                                                                $my_query->the_post();
                                                                                ?>
                                                                                <li class="sub-item-info">
                                                                                    <a href="<?php the_permalink(); ?>">
                                                                                        <div class="image"><?php echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?></div>
                                                                                        <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
                                                                                        <p class="name"><?php echo  wp_trim_words(get_the_title(), 30); ?></p>
                                                                                        <div class="status-view"><a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span class="text-view"><?php echo $data['name']; ?></span></a> <span class="num-view" style="display:none;">29371 view</span></div>
                                                                                        <div class="wrap-link-to"><span class="link-to"><a href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', 'つづきを見る') ?></a></span></div>
                                                                                    </a>
                                                                                </li>
                                                                                <?php
                                                                                $i++;
                                                                            }
                                                                            ?>
                                                                            <?php if(!$isSmartPhone){?>
                                                                                <li class="sub-item-info sub-item-info-other">
                                                                                    <div class="bg-item-outside">
                                                                                        <div class="bg-item-inside">
                                                                                            <a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                        <?php if($isSmartPhone){?>
                                                                            <li class="sub-item-info sub-item-info-other">
                                                                                <div class="bg-item-outside">
                                                                                    <div class="bg-item-inside">
                                                                                        <a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                // no posts found
                                                            }
                                                            // Restore original Post Data
                                                            wp_reset_postdata();
                                                            ?>
                                                        <?php endif; //get_field('shop_blog')?>
                                                    <?php endif; ?>
                                                    <?php //echo php_set_base_url(do_shortcode(get_field('banner_plan')));?>
                                                </div>
                                            </div>

                                        </div>

                                    </div><!-- end new-access-child-page -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('formal'); ?>
<div id="wrap-formal-preview-popup"></div>
<style type="text/css">
    *{
        min-height: 0;
        min-width: 0;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('body').each(function(){
            $('.main-banner-top-page,.left-column').addClass('imagesLoaded');
        });
        var shop_id = '<?php echo $shop_id; ?>';
        var shop_name = '<?php echo $postName; ?>';

        $('iframe#map').Lazy();

        // Get grid booking
        var calendarLoaded = false;
        var productByShopLoaded = false;
        $(window).scroll(function () {
            if ($("#box-calendar").visible() && calendarLoaded == false) {
                calendarLoaded = true;
                console.log('box-calendar loaded');
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCalendar/' + shop_id + '?is_formal=1',
                    success: function(data) {
                        if (data != null && data != "") {
                            $("#box-calendar").html(data);
                        }
                    }
                });
            }

            // Custom Field: Product By Shop V2
            <?php if ('sendai-parco2' == $postName) : ?>
            if ($("#product_by_shop_23_plan_group_5_6_7").visible() && productByShopLoaded == false) {
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=5&plan_group=5,6,7&list_product_id=list_view_s_23_pg_5_6_7',
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#product_by_shop_23_plan_group_5_6_7").html(data);
                        }
                    }
                });
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=8&plan_group=8,18&list_product_id=list_view_s_23_pg_8_18',
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#product_by_shop_23_plan_group_8_18").html(data);
                        }
                    }
                });
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=10&plan_group=10,21&list_product_id=list_view_s_23_pg_10_21',
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#product_by_shop_23_plan_group_10_21").html(data);
                        }
                    }
                });
                productByShopLoaded = true;
            }
            <?php elseif ('sapporo-susukinostation' == $postName) : ?>
            if ($("#product_by_shop_21_plan_group_5_6_7").visible() && productByShopLoaded == false) {
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=5&plan_group=5,6,7&list_product_id=list_view_s_21_pg_5_6_7',
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#product_by_shop_21_plan_group_5_6_7").html(data);
                        }
                    }
                });
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=8&plan_group=8,18&list_product_id=list_view_s_21_pg_8_18',
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#product_by_shop_21_plan_group_8_18").html(data);
                        }
                    }
                });
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=10&plan_group=10,21&list_product_id=list_view_s_21_pg_10_21',
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#product_by_shop_21_plan_group_10_21").html(data);
                        }
                    }
                });
                productByShopLoaded = true;
            }
            <?php endif; ?>

        });

        /* Show formal popup - start */
        $(document).on('click', '.formal-preview-popup-handle', function(){
            event.preventDefault();
            if ($("#wrap-formal-preview-popup").is(':empty')) {
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getFormalPreview?shop_id=' + shop_id,
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#wrap-formal-preview-popup").html(data);
                            openPreviewPopup();
                        }							                        }
                });
            } else {
                openPreviewPopup();
            }

        });

        function openPreviewPopup() {
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                } else {
                    $("#formal-preview-popup input.preview-shops:checked").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        }

        <?php if($isSmartPhone) : ?>

        //Slider banner
        var shopId = $(".shop-has-slide").attr("id");
        $('#' +  shopId  + ' .slides').slick({
            arrows: false,
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 2
        });
        $('.list-reason .item-reason').click(function(){
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            this.scrollIntoView();
        });
        <?php else: ?>
        //Slider banner
        var shopId = $(".shop-has-slide").attr("id");
        $('#' +  shopId  + ' .slides').slick({
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 4
        });
        $('.list-reason .item-reason').click(function(){
            var index = $(this).index();
            var target = $('.wrap-content-reason .content-reason').eq(index);
            target.siblings().hide();
            target.show();

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
        <?php endif; ?>

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        /* Slick slider product */
        if ($('.sidebar-products-fm-v2').length > 0) {
            $('.sidebar-products-fm-v2 .list').not('.slick-initialized').slick({
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

        // Slider access shop
        if ($('#slider .list-access-shop').length > 0) {
            $('#slider .list-access-shop').not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: true,
                    }
                }]
            });
        }

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

        //Show more plan
        $('.plan-img').click(function(){
            var detail = $(this).next();
            detail.addClass('open');
        });

        $('.show-less').click(function(){
            $(this).closest('.plan-info').removeClass('open');
        });

    })
</script>

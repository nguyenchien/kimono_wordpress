<?php
/**
 * Template Name: New Area Template
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
global $post, $custom_post_type, $custom_taxonomies, $is_yukata, $sites, $language;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$shop_id = get_field('shop_id');
$planList = get_field('plan_list');
if (is_page('check-booking')) {
    $shop_id = 5;
}
get_header('new-kimono-landing-page');

$planList = get_field('plan_list');
if (is_page('check-booking')) {
    $shop_id = 5;
}

if($isSmartPhone){
    wp_register_style('grid-booking-status-new-sp-style', get_template_directory_uri() . '/css/grid-booking-status-new-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('grid-booking-status-new-sp-style');
    wp_register_style('new-formal-popup-preview-sp-style', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp-style');
}else{
    wp_register_style('grid-booking-status-new-pc-style', get_template_directory_uri() . '/css/grid-booking-status-new-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('grid-booking-status-new-pc-style');
    wp_register_style('new-formal-popup-preview-pc-style', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc-style');
}

wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('jquery-lazy-youtube', WP_HOME . '/js/jquery.lazy.youtube.min.js');
wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js');

wp_enqueue_script('jquery-visible', 'https://kyotokimono-rental.com/js/jquery.visible.min.js');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');


$reserve_link_access = '';
if ($shop_id == 14 || $shop_id == 15) {
    $reserve_link_access = home_url() . '/petit';
} else{
    $reserve_link_access = home_url() . '/kimono';
}
if ($shop_id == 25) {
    $reserve_link_access = home_url() . '/formal';
}
$postName = $post->post_name;
if ($postName == "kanazawa-area") {
    $shop_id = 10;
}
$shop_id_formal = array(16,27);
?>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>
<?php if($isSmartPhone) : ?>
    <div class="container-box">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
        <!-- Title page -->
        <?php
        /*$titlepage_h1_sp = get_field('title_page_h1_sp');
        echo do_shortcode(php_set_base_url($titlepage_h1_sp));*/
        ?>
        <div class="wrap-column-content flexbox kana">
            <div class="left-column-content">
                <div class="wrap-boths-column flexbox">
                    <div class="left-column hidden-sidebar">
                        <?php get_sidebar('top-page-left-v3') ?>
                    </div>
                    <div class="right-column right-column-<?php echo $post->post_name; ?>">
                        <div class="padding-v2">
                            <!-- Banner -->
                            <?php
                            $bannerSP = get_field('banner_sp');
                            echo do_shortcode(php_set_base_url($bannerSP));
                            ?>

                            <!-- Intro -->
                            <section class="intro-section">
                                <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/access/kanazawa-area/pattern-kanazawa-top-pc.png">
                                    <p class="main-title">wargoを選ぶ<span>6</span>つの理由</p>
                                </h2>
                                <?php
                                $intro = get_field('intro');
                                echo do_shortcode(php_set_base_url($intro));
                                ?>
                            </section>
                            <!-- banner-campaign open -->
                            <?php
                            $campaign_banner_sp = get_field('campaign_banner_sp');
                            echo do_shortcode(php_set_base_url($campaign_banner_sp));
                            ?>
                            <!-- Shop info -->
                            <?php
                            $shopInfoSP = get_field('shop_info_sp');
                            echo do_shortcode(php_set_base_url($shopInfoSP));
                            ?>

                            <!-- Rental plan -->
                            <?php
                            $rentalPlanSP = get_field('rental_plan_sp');
                            echo do_shortcode(php_set_base_url($rentalPlanSP));
                            ?>
                            <?php
                                $custom_faq = get_field('custom_faq');
                                echo do_shortcode(php_set_base_url($custom_faq));
                            ?>
                            <?php
                            // Instagram gallery
                            $instagramGallerySP = get_field('instagram_gallery_sp');
                            if ($instagramGallerySP) {
                                echo do_shortcode(php_set_base_url($instagramGallerySP));
                            }
                            ?>

                            <!-- Reservation -->
                            <section class="reserve-section wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                <h2 class="boxTitle">
                                    <span>金沢香林坊店・金沢兼六園店の</span>
                                    <span class="fix">予約状況をチェック</span>
                                </h2>
                                <ul class="tabList">
                                    <li><a id="10" data-name="kanazawa-kenrokuen" href="#booking-tab-2" class="active">金沢香林坊店</a></li>
                                    <li><a id="27" data-name="kanazawa" href="#booking-tab-1">金沢兼六園店</a></li>
                                </ul>
                                <div class="tabDesc" id="booking-tab-1">
                                    <div class="wrap-access-booking">
                                        <div id="box-calendar" class="sixteen columns row">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <a id="reserve_button" href="<?= home_url()?>/kimono?shop_id=27" class="main-btn btn-link">レンタルプラン一覧はこちら</a>
                                    </div>
                                </div>
                                <div class="tabDesc" id="booking-tab-2">
                                    <div class="wrap-access-booking">
                                        <div id="box-calendar" class="sixteen columns row">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <a id="reserve_button" href="<?= home_url()?>/kimono?shop_id=10" class="main-btn btn-link">レンタルプラン一覧はこちら</a>
                                    </div>
                                </div>

                            </section>

                            <!-- Point -->
                            <?php
                            $pointSP = get_field('reason_point_sp');
                            echo do_shortcode(php_set_base_url($pointSP));
                            ?>

                            <!-- Experience -->
                            <?php
                            $experience = get_field('experience');
                            echo do_shortcode(php_set_base_url($experience));
                            ?>

                            <!-- Column + spot -->
                            <?php
                            $columnSpot = get_field('column_spot');
                            echo do_shortcode(php_set_base_url($columnSpot));
                            ?>

                            <!-- Customer gallery -->
                            <section class="gallery-section">
                                <div class="row">
                                    <div class="wrap-title">
                                        <img data-src="<?= WP_HOME ?>/images/access/kanazawa-area/bg-title-gallery.png" alt="お客様ギャラリー">
                                        <h2 class="title">お客様ギャラリー</h2>
                                    </div>
                                    <div class="wrap-customer-gallery">
                                        <?php echo do_shortcode('[WidgetPhotoGalleryTopPageV3]'); ?>
                                        <a class="main-btn gallery-btn" href="<?= home_url()?>/gallery">お客様ギャラリーをもっと見る</a>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <!-- Customer review -->
                        <!--<section class="review-section">
                            <div class="wrap-title">
                                <span class="icon"></span>
                                <h2 class="review-title">浅草店をご利用いただいたお客様のお声</h2>
                            </div>
                            <div class="wrap-box-review">
                                <?php /*// echo do_shortcode('[customer_review_content_shop_v1 shop_id=8]'); */?>
                            </div>
                        </section>-->

                        <!-- Blog -->
                        <section class="blog-section">
                            <div class="row">
                                <h2 class="blog-title">店舗ブログ</h2>

                                <?php
                                $taxonomy = $custom_taxonomies['blog'];
                                $post_type = $custom_post_type['blog'];
                                global $isSmartPhone;

                                // Restore original Post Data
                                wp_reset_postdata();
                                // WP_Query arguments
                                $blogs = array(
                                    'ja'=>'blog',
                                    'en'=>'english-blog',
                                    'vi'=>'vietnamese-blog',
                                    'tw'=>'traditionalchinese-blog',
                                    'ko'=>'korean-blog',
                                    'ru'=>'russian-blog',
                                    'th'=>'thailand-blog',
                                    'id'=>'indonesia-blog',
                                    'ms'=>'malaysia-blog',
                                    'fr' => 'french-blog',
                                    'cn' => 'simplified-chinese-blog',
                                    'hi' => 'hindi-blog'
                                );
                                $args = array(
                                    'post_type' => $post_type,
                                    'post_status' => 'publish',
                                    'posts_per_page' => $isSmartPhone ? 2 : 4,
                                    'order' => 'DESC',
                                    'orderby' => 'date',
                                    'tax_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => $taxonomy,
                                            'field'    => 'slug',
                                            'terms' =>  array('kanazawa', 'kanazawa-kenrokuen'),
                                        ),
                                    ),
                                );

                                // The Query
                                $my_query = new WP_Query($args);

                                // The Loop
                                if ($my_query->have_posts()) {
                                    $i = 1;
                                    $title = $data['shop'];
                                    ?>
                                    <ul class="list-blog flexbox">
                                        <?php
                                        while ($my_query->have_posts()) {
                                            $my_query->the_post();
                                            ?>
                                            <li class="item-blog">
                                                <a class="link-href-blog" href="<?php the_permalink(); ?>">
                                                    <div class="image-blog">
                                                        <?php
                                                        if ( has_post_thumbnail() ) {
                                                            echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title())));
                                                        } else {
                                                            echo '<img src="'.WP_HOME.'/images/no-image.png">';
                                                        }
                                                        ?>
                                                    </div>
                                                </a>
                                                <p class="date">ご来店日: <?php echo get_the_date('Y.m.d'); ?></p>
                                                <div class="title-name-blog"><?php echo  wp_trim_words(get_the_title(), 30); ?></div>
                                                <div class="wrap-permalink-blog"><a class="link-to-item" href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', '続きを見る') ?></a></div>
                                            </li>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                } else {
                                    // no posts found
                                }
                                // Restore original Post Data
                                wp_reset_postdata();
                                ?>
                                <div class="wrap-link-to-blog">
                                    <?php if($postName == "kanazawa-area") :?>
                                        <a class="link-to-blog-page main-btn blog-btn" href="https://kyotokimono-rental.com/access/kanazawa-area/kanazawa/blog">もっとブログを読む</a>
                                    <?php else :?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/blog">店舗ブログを見る</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </section>

                        <?php
                        $aboutArea = get_field('about_area');
                        if ($aboutArea) {
                            echo do_shortcode(php_set_base_url($aboutArea));
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="wrap-content-access">
        <div class="container-box">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
            }
            ?>
            <!-- Title page -->
            <?php
            /*$titlepage_h1_pc = get_field('title_page_h1_pc');
            echo do_shortcode(php_set_base_url($titlepage_h1_pc));*/
            ?>
            <!-- Banner -->
            <?php
            $bannerPC = get_field('banner_pc');
            echo do_shortcode(php_set_base_url($bannerPC));
            ?>

            <!-- Intro -->
            <section class="intro-section">
                <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/access/kanazawa-area/pattern-kanazawa-top-pc.png">
                    <p class="main-title">wargoを選ぶ<span>6</span>つの理由</p>
                </h2>
                <?php
                $intro = get_field('intro');
                // $intro = str_replace("color-banner-bottom-sp","color-banner-bottom-pc",$intro);
                echo do_shortcode(php_set_base_url($intro));
                ?>
            </section>
            <!-- banner-campaign open -->
            <?php
            $campaign_banner_pc = get_field('campaign_banner_pc');
            echo do_shortcode(php_set_base_url($campaign_banner_pc));
            ?>
            <div class="wrap-column-content flexbox kana">
                <div class="left-column-content">
                    <div class="wrap-boths-column flexbox">
                        <div class="left-column">
                            <?php get_sidebar('top-page-left-v3') ?>
                        </div>
                        <div class="right-column right-column-access-v3">
                            <!-- Shop info -->
                            <?php
                            $shopInfoPC = get_field('shop_info_pc');
                            echo do_shortcode(php_set_base_url($shopInfoPC));
                            ?>

                            <!-- Rental plan -->
                            <?php
                            $rentalPlanPC = get_field('rental_plan_pc');
                            echo do_shortcode(php_set_base_url($rentalPlanPC));
                            ?>
                            <?php
                                $custom_faq = get_field('custom_faq');
                                echo do_shortcode(php_set_base_url($custom_faq));
                            ?>
                            <?php
                            // Instagram gallery
                            $instagramGalleryPC = get_field('instagram_gallery_pc');
                            if ($instagramGalleryPC) {
                                echo do_shortcode(php_set_base_url($instagramGalleryPC));
                            }
                            ?>

                            <!-- Reservation -->
                            <section class="reserve-section wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                <h2 class="boxTitle">
                                    <span>金沢香林坊店・金沢兼六園店の</span>
                                    <span class="fix">予約状況をチェック</span>
                                </h2>
                                <ul class="tabList">
                                    <li><a id="10" data-name="kanazawa-kenrokuen" href="#booking-tab-2" class="active">金沢香林坊店</a></li>
                                    <li><a id="27" data-name="kanazawa" href="#booking-tab-1">金沢兼六園店</a></li>
                                </ul>
                                <div class="tabDesc" id="booking-tab-1">
                                    <div class="wrap-access-booking">
                                        <div id="box-calendar" class="sixteen columns row">

                                        </div>
                                    </div>
                                    <div class="wrap-main-btn flexbox justify-content-center">
                                        <a id="reserve_button" href="<?= home_url()?>/kimono?shop_id=27" class="main-btn btn-link fullwidth">レンタルプラン一覧はこちら</a>
                                    </div>
                                </div>
                                <div class="tabDesc" id="booking-tab-2">
                                    <div class="wrap-access-booking">
                                        <div id="box-calendar" class="sixteen columns row">

                                        </div>
                                    </div>
                                    <div class="wrap-main-btn flexbox justify-content-center">
                                        <a id="reserve_button" href="<?= home_url()?>/kimono?shop_id=10" class="main-btn btn-link fullwidth">レンタルプラン一覧はこちら</a>
                                    </div>
                                </div>
                            </section>

                            <!-- Point -->
                            <?php
                            $pointPC = get_field('reason_point_pc');
                            echo do_shortcode(php_set_base_url($pointPC));
                            ?>

                            <!-- Experience -->
                            <?php
                            $experience = get_field('experience');
                            echo do_shortcode(php_set_base_url($experience));
                            ?>


                            <!-- Column + spot -->
                            <?php
                            $columnSpot = get_field('column_spot');
                            echo do_shortcode(php_set_base_url($columnSpot));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-box -->
        <section class="gallery-section">
            <div class="container-box">
                <div class="wrap-title-other">
                    <p class="main-title">Photo Gallery</p>
                    <h2 class="title">きものレンタル wargo をご利用 いただお客様や<br/>コーディネートをご紹介いたします。</h2>
                </div>
            </div>
            <div class="wrap-customer-gallery wrap-slider-photo-gallery">
                <?php echo do_shortcode('[WidgetPhotoGalleryTopPageV3]'); ?>
                <div class="wrap-link-btn flexbox justify-content-center">
                    <a class="link-to" href="<?= home_url()?>/gallery">お客様のコーディネートをもっと見る</a>
                </div>
            </div>
        </section>
        <!--<section class="review-section">
                <div class="container-box">
                    <div class="wrap-title-other">
                        <p class="main-title">Voice</p>
                        <h2 class="title">きものレンタル wargo をご利用 いただお客様の<br/>お声になりますのでご参考下さい。</h2>
                    </div>
                    <div class="wrap-box-review">
                        <?php /*// echo do_shortcode('[customer_review_content_shop_v1 shop_id=8]'); */?>
                    </div>
                    <div class="wrap-btn-v2 wrap-btn-review flexbox">
                        <a href="<?/*= home_url(); */?>/access/asakusa-area/asakusa/review" class="btn-v2 btn-review">
                            <span class="icon"></span>
                            <div class="text">
                                <span class="text-link">すべてのお客様の声を見る</span>
                            </div>
                        </a>
                    </div>
                </div>
            </section>-->
        <section class="blog-section">
            <div class="container-box">
                <div class="wrap-title-other">
                    <p class="main-title">Shop Blog</p>
                    <h2 class="title">店舗ブログ</h2>
                </div>
                <?php
                $taxonomy = $custom_taxonomies['blog'];
                $post_type = $custom_post_type['blog'];
                global $isSmartPhone;

                // Restore original Post Data
                wp_reset_postdata();
                // WP_Query arguments
                $blogs = array(
                    'ja'=>'blog',
                    'en'=>'english-blog',
                    'vi'=>'vietnamese-blog',
                    'tw'=>'traditionalchinese-blog',
                    'ko'=>'korean-blog',
                    'ru'=>'russian-blog',
                    'th'=>'thailand-blog',
                    'id'=>'indonesia-blog',
                    'ms'=>'malaysia-blog',
                    'fr' => 'french-blog',
                    'cn' => 'simplified-chinese-blog',
                    'hi' => 'hindi-blog'
                );
                $args = array(
                    'post_type' => $post_type,
                    'post_status' => 'publish',
                    'posts_per_page' => $isSmartPhone ? 2 : 4,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'slug',
                            'terms' =>  array('kanazawa', 'kanazawa-kenrokuen'),
                        ),
                    ),
                );

                // The Query
                $my_query = new WP_Query($args);

                // The Loop
                if ($my_query->have_posts()) {
                    $i = 1;
                    $title = $data['shop'];
                    ?>
                    <ul class="list-blog flexbox">
                        <?php
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            ?>
                            <li class="item-blog">
                                <a class="link-href-blog" href="<?php the_permalink(); ?>">
                                    <div class="image-blog">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                            echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title())));
                                        } else {
                                            echo '<img src="'.WP_HOME.'/images/no-image.png">';
                                        }
                                        ?>
                                    </div>
                                </a>
                                <div class="title-name-blog"><?php echo  wp_trim_words(get_the_title(), 30); ?></div>
                                <div class="wrap-permalink-blog"><a class="link-to-item flexbox" href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', 'つづきを見る') ?><span class="arrow-link"></span></a></div>
                            </li>
                            <?php
                            $i++;
                        }
                        ?>
                    </ul>
                    <?php
                } else {
                    // no posts found
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
                <div class="wrap-link-to-blog flexbox align-items-center justify-content-center">
                    <?php if($postName == "kanazawa-area") :?>
                        <a class="link-to-blog-page" href="https://kyotokimono-rental.com/access/kanazawa-area/kanazawa/blog">もっとブログを読む</a>
                    <?php else :?>
                        <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/blog">もっとブログを読む</a>
                    <?php endif ?>
                </div>
            </div>
        </section>
        <section class="about-section">
            <div class="container-box">
                <div class="box-content-about">
                    <div class="wrap-title">
                        <p class="sub-title">ABOUT</p>
                        <h2 class="main-title">私たちについて</h2>
                    </div>
                    <div class="detail-about">
                        <p class="text-1">
                            きものレンタルwargoを運営する株式会社和心は <br>
                            呉服業界では珍しく、東証マザーズに上場し信頼の <br>
                            おける企業運営を行っています。
                        </p>
                        <p class="text-2">
                            着物レンタル以外にも、かんざし・帯留や和傘といった <br>
                            和装小物の専門店を多数う
                        </p>
                    </div>
                    <div class="about-opera text-center">
                        運営会社「株式会社和心」について
                    </div>
                    <div class="name-company text-center">
                        <<東証マザーズ上場企業>>
                    </div>
                    <div class="list-content-about flexbox">
                        <div class="item-list">
                            <p class="title-header">
                                着物レンタル（年間着付人数）
                            </p>
                            <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-about-v3.svg" alt="">
                            <p class="data-number">
                                <var>154,384</var> 人 <br>（2018年実績）
                            </p>
                        </div>
                        <div class="item-list">
                            <p class="title-header">
                                店舗数
                            </p>
                            <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-home-about-v3.svg" alt="">
                            <p class="data-number">
                                <var>89</var> 店 <br>（2018年現在）
                            </p>
                        </div>
                    </div>
                    <div class="wrap-bottom-about">
                        <div class="wrap-logo-confidence">
                            <ul class="list-logo-confidence">
                                <li class="item-logo-confidence item-logo-confidence-01">
                                    <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt="<?= Yii::t('formal_v2','観光着物・浴衣・冠婚葬祭着物レンタル きものレンタルwargo')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-02">
                                    <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt="<?= Yii::t('formal_v2','かんざし専門店 かんざし屋wargo')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-03">
                                    <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt="<?= Yii::t('formal_v2','帯留専門店 おびどめ屋wargo')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-04">
                                    <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt="<?= Yii::t('formal_v2','箸・箸置き専門店 箸や万作')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-05">
                                    <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt="<?= Yii::t('formal_v2','うつわ専門店 万作ギャラリー')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-06">
                                    <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt="<?= Yii::t('formal_v2','和傘・和柄傘専門店 北斎グラフィック')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-07">
                                    <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt="<?= Yii::t('formal_v2','和アクセサリー専門店 かすう工房')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-08">
                                    <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt="<?= Yii::t('formal_v2','和装・着付け小物専門店 和装問屋wargo')?>"></a>
                                </li>
                                <li class="item-logo-confidence item-logo-confidence-09">
                                    <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt="<?= Yii::t('formal_v2','浴衣専門店 ゆかた屋hiyori')?>"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="des-intro-about">
                            「日本のカルチャーを世界へ」をキャッチフレーズに、古くて新しいい和の心を<br>
                            Total Creative Produceし世界に誇るべき日本の伝統文化の楽しい発信基地と<br>
                            なることを目指しています。
                        </div>
                    </div>
                    <?php
                    $aboutArea = get_field('about_area');
                    if ($aboutArea) {
                        echo do_shortcode(php_set_base_url($aboutArea));
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function(){

        var idTab = $('.tabList a.active').attr('href');
        $('.tabDesc'+idTab).addClass('active');
        var box_will_show = $('.tabDesc.active').find('#box-calendar');

        var shop_id = 10;//金沢兼六園店=27,金沢香林坊店=10
        var calendarLoaded = false;
        var galleryLoaded = false;

        $(window).scroll(function () {
            // Get grid booking
            if (box_will_show.visible() && calendarLoaded == false) {
                calendarLoaded = true;
                console.log('box-calendar loaded');
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCalendar/' + shop_id+'?post_name=kanazawa-kenrokuen',
                    success: function(data) {
                        if (data != null && data != "") {
                            box_will_show.html(data);
                        }}
                });
            }

            //Get Instagram gallery slider
            if ($(".wrap-instagram-gallery").visible() && galleryLoaded == false) {
                galleryLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getInstagramGallery?template=gallery_v3',
                    success: function(data) {
                        if (data != null && data != "") {
                            $(".wrap-instagram-gallery .access-loader").replaceWith(data);
                        }
                    }
                });
            }
        });

        $(document).on('click','.text-date-choosed',function () {
            $(".tabDesc.active").find('.dropdown-content').toggle();
        });

        $('.tabList a').click(function(e){
            e.preventDefault();
            $('.tabDesc #box-calendar').html('');
            $('.tabDesc').addClass('loading');
            //active tab
            $('.tabList a,.tabDesc').removeClass('active');
            $(this).addClass('active');
            var idTab = $('.tabList a.active').attr('href');
            $('.tabDesc'+idTab).addClass('active');
            // call shop
            var shop_id_click = $(this).attr('id');
            var post_name = $(this).data('name');
            var box_will_show = $('.tabDesc'+idTab).find('#box-calendar');
            jQuery.ajax({
                type: 'GET',
                url: '/api/booking/getCalendar/' + shop_id_click + '?post_name='+post_name,
                success: function (data) {
                    $('.tabDesc').removeClass('loading');
                    if (data != null && data != "") {
                        box_will_show.html(data);
                        $(document).on('click','.text-date-choosed',function () {
                            $(".tabDesc.active").find('.dropdown-content').toggle();
                        });
                    }
                    $(document).on('click','.text-date-choosed',function () {
                        $(".tabDesc.active").find('.dropdown-content').toggle();
                    });
                }
            });
        });
        //
        //var shop_id = '<?php echo $shop_id; ?>';
        //if (shop_id !== '') {
        //changeReserveLink(shop_id);
        //}

        //Gallery slider
        if(isSmartPhone()){
            $('#slider-photo-gallery').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                lazyLoad: 'ondemand'
            });
        }

        $(".lazy").lazy();

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
        // Custom FAQ
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
    });

    <?php if($isSmartPhone) : ?>
    $('.list-reason .item-reason').click(function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        this.scrollIntoView();
    });
    <?php else: ?>
    $('.list-reason .item-reason').click(function(){
        var index = $(this).index();
        var target = $('.wrap-content-reason .content-reason').eq(index);
        target.siblings().hide();
        target.show();

        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });
    <?php endif; ?>

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

    var shop_id = '<?php echo $shop_id; ?>';
    $(document).on('click', '.formal-preview-popup-handle', function(event){
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
</script>
<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
    'selectedShop' => $shop_id,
))
?>
<?php get_footer('new-kimono-landing-page') ;?>

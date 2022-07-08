<?php
/**
 * Template Name: New Access Child Page v3
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
$arrInPreview = array(
    'kanazawa',
    'kamakura',
    'asakusa',
    'shinjuku-station',
    'dazaifu',
    'ito',
    'sendagaya'
);
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
if($isSmartPhone){
    wp_register_style('grid-booking-status-new-sp-style', get_template_directory_uri() . '/css/grid-booking-status-new-sp.css', array('twentytwelve-style'),'2021012815');
    wp_enqueue_style('grid-booking-status-new-sp-style');
}else{
    wp_register_style('grid-booking-status-new-pc-style', get_template_directory_uri() . '/css/grid-booking-status-new-pc.css', array('twentytwelve-style'), '2021012815');
    wp_enqueue_style('grid-booking-status-new-pc-style');
}

wp_enqueue_script('jquery-lazy-youtube', WP_HOME . '/js/jquery.lazy.youtube.min.js',array('jquery-lazy'));
wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js',array('jquery-lazy'));


wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('jquery-visible', 'https://kyotokimono-rental.com/js/jquery.visible.min.js');


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
$shop_id_formal = array(16,27);
//get_sidebar('top-page-left-v3');
//get_footer('new-kimono-landing-page');

//return;

if(in_array($postName, $arrInPreview)){
    if($isSmartPhone){
        wp_register_style('new-formal-popup-preview-sp-style', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
        wp_enqueue_style('new-formal-popup-preview-sp-style');
    }else{
        wp_register_style('new-formal-popup-preview-pc-style', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
        wp_enqueue_style('new-formal-popup-preview-pc-style');
    }

}
    $SEX_AGE_TYPE = array(
        'women' => 1, // Women's kimono
        'men' => 2, // Men's kimono
        'kids' => 3, // Kids kimono
        'couple' => 4 // Couple kimono
    );
    $SHOP_FILTER = MasterValues::normalShopList();
    $planShopList = MasterValues::planShopList();
    $planTypeKimonoMap = array(
        'mamechiyo-kimono' => '豆千代モダン着物',
        'antique-kimono' => 'アンティーク着物',
    );
?>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>
<?php if($postName=="ninenzaka"): ?>
    <style>
        .rental-plan-section {
            margin-bottom: 0;
        }
        .wrap-list-plan-wg .btn-formal {
            width: 100%;
            font-size: 18px;
            color: #fff;
            padding: 20px 25px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            line-height: 1;
            display: block;
            text-align: center;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .wrap-list-plan-wg .btn-color-pink:not(:disabled) {
            background-color: #d2003e;
        }
        .col-gallery .slick-prev {
            left: -15px;
        }
        .col-gallery .slick-next {
            right: -15px;
        }
        .col-gallery .slick-prev:before, .col-gallery .slick-next:before {
            font-family: inherit;
            display: inline-block;
            content: '';
            color: #000;
            border-width: 0 0 2px 2px;
            border-style: solid;
            width: 10px;
            height: 10px;
        }
        .col-gallery .slick-prev:before {
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .col-gallery .slick-next:before {
            -webkit-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }
        .btn-formal {
            width: 100%;
            font-size: 18px;
            color: #fff;
            padding: 20px 25px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            line-height: 1;
            display: block;
            text-align: center;
            font-weight: 700;
            border: none;
            cursor: pointer
        }

        .btn-formal.store {
            margin-bottom: 20px
        }

        .btn-formal.store.disabled {
            pointer-events: none;
            opacity: .7
        }

        .btn-formal.delivery.disabled {
            pointer-events: none;
            opacity: .7
        }

        .btn-color-red {
            background-color: #e50011
        }

        .btn-color-pink:not(:disabled) {
            background-color: #d2003e
        }

        .btn-color-grey {
            background-color: #a8a8a8
        }
        @media (min-width:750px) {

        }
    </style>
<?php endif; ?>
<?php if($isSmartPhone) : ?>
    <div class="container-box">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
        <!-- Title page -->
        <?php
        //$titlepage_h1_sp = get_field('title_page_h1_sp');
        //echo do_shortcode(php_set_base_url($titlepage_h1_sp));
        ?>
        <div class="wrap-column-content flexbox">
            <div class="left-column-content">
                <div class="wrap-boths-column flexbox">
                    <div class="right-column right-column-<?php echo $post->post_name; ?>">
                        <div class="padding-v2">
                            <?php
                            $campaign_banner_sp = get_field('campaign_banner_sp');
                            echo do_shortcode(php_set_base_url($campaign_banner_sp));
                            ?>
                            <!-- Banner -->
                            <?php
                            $bannerSP = get_field('banner_sp');
                            echo do_shortcode(php_set_base_url($bannerSP));
                            ?>

                            <!-- Intro -->
                            <section class="intro-section">
                                <?php if($postName=="kamakura"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title">鎌倉エリア最大級！</p>
                                        <p class="title">鎌倉で着物街ブラ</p>
                                    </h2>
                                <?php elseif($postName=="kanazawa"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title">金沢エリア最大級！</p>
                                        <p class="title">金沢で着物街ブラ</p>
                                    </h2>
                                <?php elseif($postName=="shinjuku-station"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title">新宿エリア最大級！</p>
                                        <p class="title">新宿駅前店</p>
                                    </h2>
                                <?php elseif($postName=="kanazawa-kenrokuen"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title">金沢エリア最大級！</p>
                                        <p class="title">兼六園で着物街ブラ</p>
                                    </h2>
                                <?php elseif($postName=="dazaifu"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title"><?= Yii::t('new-access-child-page-v3', '太宰府エリア最大級！'); ?></p>
                                        <p class="title"><?= Yii::t('new-access-child-page-v3', '太宰府で着物街ブラ'); ?></p>
                                    </h2>
                                <?php elseif($postName=="ito"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                                        <p class="main-title"><?= Yii::t('new-access-child-page-v3', '伊豆エリア最大級！'); ?></p>
                                        <p class="title"><?= Yii::t('new-access-child-page-v3', '伊東で着物街ブラ'); ?></p>
                                    </h2>
                                <?php elseif($postName=="ninenzaka"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title"><?= Yii::t('new-access-child-page-v3', '清水エリア最大級！'); ?></p>
                                        <p class="title"><?= Yii::t('new-access-child-page-v3', 'アンティーク着物専門店'); ?></p>
                                    </h2>
                                <?php elseif($postName=="sendagaya"):?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="title"><?= Yii::t('new-access-child-page-v3', '原宿・千駄ヶ谷で着物街ブラ'); ?></p>
                                    </h2>
                                <?php else: ?>
                                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                        <p class="main-title">浅草エリア最大級！</p>
                                        <p class="title">浅草で着物街ブラ</p>
                                    </h2>
                                <?php endif ?>
                                <?php
                                $intro = get_field('intro');
                                echo do_shortcode(php_set_base_url($intro));
                                ?>
                            </section>

                            <!-- Shop info -->
                            <?php
                            $shopInfoSP = get_field('shop_info_sp');
                            echo do_shortcode(php_set_base_url($shopInfoSP));
                            ?>
                            <?php
                            $info_direction = get_field('info_direction');
                            if ($info_direction) {
                                echo do_shortcode(php_set_base_url($info_direction));
                            }
                            ?>
                            <?php
                            $slider_popup_sp = get_field('slider_popup_sp');
                            if ($slider_popup_sp) {
                                echo do_shortcode(php_set_base_url($slider_popup_sp));
                            }
                            ?>

                            <!-- Rental plan -->
                            <?php
                            $rentalPlanSP = get_field('rental_plan_sp');
			                echo do_shortcode(php_set_base_url($rentalPlanSP));
                            ?>
                            <?php if($postName == 'ninenzaka'):?>
                                <div class="wrap-new-plan-list">
                                    <?php getTemplatePart('temp-small/kimono-list-ninenzaka', null, array('groupedMetaKimonoPlans' => $groupedMetaPlans[MasterValues::MV_GROUP_KIMONO], 'sexAgeType' => $SEX_AGE_TYPE, 'planShopList' => $planShopList, 'planTypeKimonoMap' => $planTypeKimonoMap));?>
                                </div><div id="quick_booking"></div>
                                <?php
                                $rentalPlanTwoSP = get_field('rental_plan_two_sp');
                                echo do_shortcode(php_set_base_url($rentalPlanTwoSP));
                                ?>
                            <?php endif; ?>
                            <?php
                                $custom_faq = get_field('custom_faq');
                                echo do_shortcode(php_set_base_url($custom_faq));
                            ?>
                            <!-- Instagram gallery -->
                            <?php if($postName == 'asakusa' or $postName == 'kanazawa' or $postName == 'ito' or $postName == 'ninenzaka' or $postName == 'sendagaya') : ?>
                                <section class="instagram-section">
                                    <h2 class="ins-title">
                                        <span>
                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-instagram.svg">
                                        </span>Instagram <br>#きものレンタルwargo
                                    </h2>
                                    <div class="wrap-instagram-gallery">
                                        <div class="access-loader <?= $postName?>"></div>
                                    </div>
                                </section>
                            <?php endif; ?>

                            <!-- Reservation -->
                            <section class="reserve-section wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                <div class="wrap-reserve-title" id="grid-booking">
                                    <img data-src="<?= WP_HOME ?>/images/new-access/bubble-reserve.svg" class="bubble">
                                    <?php if($postName == 'shinjuku-station'):?>
                                        <h2 class="title">新宿店 予約状況</h2>
                                    <?php elseif ($postName == 'kamakura'): ?>
                                        <h2 class="title">鎌倉店 予約状況</h2>
                                    <?php elseif ($postName == 'kanazawa'): ?>
                                        <h2 class="title">金沢店 予約状況</h2>
                                    <?php elseif ($postName == 'kanazawa-kenrokuen'): ?>
                                        <h2 class="title">兼六園店 予約状況</h2>
                                    <?php elseif ($postName == 'dazaifu'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '太宰府店 予約状況'); ?></h2>
                                    <?php elseif ($postName == 'ito'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '伊東店 予約状況'); ?></h2>
                                    <?php elseif ($postName == 'ninenzaka'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '二年坂店　予約状況'); ?></h2>
                                    <?php elseif ($postName == 'sendagaya'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '明治神宮北参道店 予約状況'); ?></h2>
                                    <?php else: ?>
                                        <h2 class="title"><?= Yii::t('access-v2','店舗予約状況')?></h2>
                                    <?php endif;?>
                                    <img data-src="<?= WP_HOME ?>/images/new-kimono/img-women-opt.png" class="girl">
                                </div>
                                <div class="wrap-access-booking">
                                    <div id="box-calendar" class="sixteen columns row">
                                    </div>
                                </div>
                                <?php if($shop_id != 20) :?>
                                <div class="row">
                                    <?php if($postName=='kanazawa-kenrokuen' or $postName=='dazaifu'): ?>
                                        <a id="reserve_button" href="<?= home_url() ?>/yukata/plan" class="main-btn btn-link formal-preview-popup-handle"><?= Yii::t('new-access-child-page-v3', '浴衣レンタルの予約はこちら'); ?></a>
                                    <?php elseif($postName=='kamakura' or $postName=='kanazawa' or $postName=='ito'): ?>
                                        <a id="reserve_button" href="javascrip:void(0)" class="main-btn btn-link formal-preview-popup-handle"><?= Yii::t('new-access-child-page-v3', '下見の来店予約はこちら'); ?></a>
                                    <?php elseif($postName=='asakusa'): ?>
                                        <a id="reserve_button" href="<?= home_url() ?>/kimono" class="main-btn btn-link"><?= Yii::t('new-access-child-page-v3', '着物レンタルの予約はこちら'); ?></a>
                                    <?php elseif($postName == 'ninenzaka'): ?>
                                        <a id="reserve_button" href="#data-plan-id-39" class="main-btn btn-link"><?= Yii::t('new-access-child-page-v3', '着物レンタルを予約する'); ?></a>
                                    <?php else: ?>
                                        <a id="reserve_button" href="javascrip:void(0)" class="main-btn btn-link formal-preview-popup-handle"><?= Yii::t('new-access-child-page-v3', '着物レンタルの予約はこちら'); ?></a>
                                    <?php endif;?>
                                </div>
                                <?php endif?>
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
                            <section class="gallery-section shin">
                                <div class="row">
                                    <div class="wrap-title">
                                        <img data-src="<?= WP_HOME ?>/images/new-access/bg-title-gallery.png" alt="お客様ギャラリー">
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
<!--                        <section class="review-section">-->
<!--                            <div class="wrap-title">-->
<!--                                <span class="icon"></span>-->
<!--                                <h2 class="review-title">浅草店をご利用いただいたお客様のお声</h2>-->
<!--                            </div>-->
<!--                            <div class="wrap-box-review">-->
<!--                                --><?php //echo do_shortcode('[customer_review_content_shop_v1 shop_id=8]'); ?>
<!--                            </div>-->
<!--                        </section>-->

                        <!-- Blog -->
                        <section class="blog-section">
                            <div class="row">
                                <?php if($postName == 'shinjuku-station'):?>
                                    <h2 class="blog-title">新宿店 スタッフブログ</h2>
                                <?php elseif ($postName == 'kamakura'): ?>
                                    <h2 class="blog-title">鎌倉店 スタッフブログ</h2>
                                <?php elseif ($postName == 'kanazawa'): ?>
                                    <h2 class="blog-title">金沢店 スタッフブログ</h2>
                                <?php elseif ($postName == 'kanazawa-kenrokuen'): ?>
                                    <h2 class="blog-title">金沢兼六園店 店舗ブログ</h2>
                                <?php elseif ($postName == 'dazaifu'): ?>
                                    <h2 class="blog-title"><?= Yii::t('new-access-child-page-v3', '太宰府店 スタッフブログ'); ?></h2>
                                <?php elseif ($postName == 'ito'): ?>
                                    <h2 class="blog-title"><?= Yii::t('new-access-child-page-v3', '伊東店 スタッフブログ'); ?></h2>
                                <?php elseif ($postName == 'ninenzaka'): ?>
                                    <h2 class="blog-title"><?= Yii::t('new-access-child-page-v3', '清水寺二年坂店 店舗ブログ'); ?></h2>
                                <?php else: ?>
                                    <h2 class="blog-title"><?= Yii::t('new-access-child-page-v3', '浅草店 スタッフブログ'); ?></h2>
                                <?php endif;?>


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

                                    if($postName == 'ninenzaka'){
                                        $args = array(
                                            "tax_query" => array(
                                                array(
                                                    "taxonomy" => "shop-blog",
                                                    "field" => "slug",
                                                    "terms" => array( "kiyomizu-area", "kiyomizudera" ),
                                                )
                                            ),
                                            'post_type' => 'staff-blog',
                                            'post_status' => 'publish',
                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                            'order'   => 'DESC',
                                            'orderby' => 'date',
                                        );
                                    }elseif($postName = 'kanazawa-kenrokuen'){
                                        $args = array(
                                            "tax_query" => array(
                                                array(
                                                    "taxonomy" => "shop-blog",
                                                    "field" => "slug",
                                                    "terms" => array( "kanazawa-area", "kanazawa-kenrokuen" ),
                                                )
                                            ),
                                            'post_type' => 'staff-blog',
                                            'post_status' => 'publish',
                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                            'order'   => 'DESC',
                                            'orderby' => 'date',
                                        );
                                    }else{
                                        $args = array(
                                            $taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
                                            'post_type' => $post_type,
                                            'post_status' => 'publish',
                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                        );
                                    }

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
                                                                echo '<img data-src="'.WP_HOME.'/images/no-image.png">';
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
                                <?php endif; //get_field('shop_blog')?>
                                <div class="wrap-link-to-blog">
                                    <?php if($postName=="asakusa"):?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/access/asakusa-area/asakusa/blog">店舗ブログを見る</a>
                                    <?php endif; ?>
                                    <?php if($postName=="kamakura"):?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/access/kamakura-area/kamakura/blog">店舗ブログを見る</a>
                                    <?php endif; ?>
                                    <?php if($postName=="kanazawa"):?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/access/kanazawa-area/kanazawa/blog">店舗ブログを見る</a>
                                    <?php endif; ?>
                                    <?php if($postName=="shinjuku-station"):?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/access/tokyo-area/shinjuku-area/shinjuku-station/blog">店舗ブログを見る</a>
                                    <?php endif; ?>
                                    <?php if($postName=="dazaifu"):?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/access/fukuoka-area/dazaifu/blog"><?= Yii::t('new-access-child-page-v3', '店舗ブログを見る'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>
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
                //$titlepage_h1_pc = get_field('title_page_h1_pc');
                //echo do_shortcode(php_set_base_url($titlepage_h1_pc));
                ?>
                <!-- Banner -->
                <?php
                    $bannerPC = get_field('banner_pc');
                    echo do_shortcode(php_set_base_url($bannerPC));
                ?>

                <!-- Intro -->
                <section class="intro-section">
                    <?php if($postName=="kamakura"):?>
                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                        <p class="main-title">鎌倉エリア最大級！</p>
                        <p class="title">鎌倉で着物街ブラ</p>
                    </h2>
                    <?php elseif($postName=="kanazawa"):?>
                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                        <p class="main-title">金沢エリア最大級！</p>
                        <p class="title">金沢で着物街ブラ</p>
                    </h2>
                    <?php elseif($postName=="kanazawa-kenrokuen"):?>
                        <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                            <p class="main-title">金沢エリア最大級！</p>
                            <p class="title">兼六園で着物街ブラ</p>
                        </h2>
                    <?php elseif($postName=="shinjuku-station"):?>
                        <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                            <p class="main-title">新宿エリア最大級！</p>
                            <p class="title">新宿駅前店</p>
                        </h2>
                    <?php elseif($postName=="dazaifu"):?>
                        <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                            <p class="main-title"><?= Yii::t('new-access-child-page-v3', '太宰府エリア最大級！'); ?></p>
                            <p class="title"><?= Yii::t('new-access-child-page-v3', '太宰府で着物街ブラ'); ?></p>
                        </h2>
                    <?php elseif($postName=="ito"):?>
                        <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                            <p class="main-title"><?= Yii::t('new-access-child-page-v3', '伊豆エリア最大級！'); ?></p>
                            <p class="title"><?= Yii::t('new-access-child-page-v3', '伊東で着物街ブラ'); ?></p>
                        </h2>
                    <?php elseif($postName=="ninenzaka"):?>
                        <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                            <p class="main-title"><?= Yii::t('new-access-child-page-v3', '清水エリア最大級！'); ?></p>
                            <p class="title"><?= Yii::t('new-access-child-page-v3', 'アンティーク着物専門店'); ?></p>
                        </h2>
                    <?php elseif($postName=="sendagaya"):?>
                        <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                            <p class="title"><?= Yii::t('new-access-child-page-v3', '原宿・千駄ヶ谷で着物街ブラ'); ?></p>
                        </h2>
                    <?php else: ?>
                    <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                        <p class="main-title">浅草エリア最大級！</p>
                        <p class="title">浅草で着物街ブラ</p>

                    </h2>
                <?php endif ?>
                <?php
                $intro = get_field('intro');
                // $intro = str_replace("color-banner-bottom-sp","color-banner-bottom-pc",$intro);
                echo do_shortcode(php_set_base_url($intro));
                ?>
            </section>
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
                            <?php
                            $slider_popup_pc = get_field('slider_popup_pc');
                            if ($slider_popup_pc) {
                                echo do_shortcode(php_set_base_url($slider_popup_pc));
                            }
                            ?>

                            <!-- Shop info -->
                            <?php
                            $shopInfoPC = get_field('shop_info_pc');
                            echo do_shortcode(php_set_base_url($shopInfoPC));
                            ?>
                            <?php
                            $info_direction = get_field('info_direction');
                            if ($info_direction) {
                                echo do_shortcode(php_set_base_url($info_direction));
                            }
                            ?>
                                <!-- Rental plan -->
                                <?php
                                $rentalPlanPC = get_field('rental_plan_pc');
                                echo do_shortcode(php_set_base_url($rentalPlanPC));
                                ?>
                            <?php if($postName == 'ninenzaka'):?>
                                <div class="wrap-new-plan-list">
                                    <?php getTemplatePart('temp-small/kimono-list-ninenzaka', null, array('groupedMetaKimonoPlans' => $groupedMetaPlans[MasterValues::MV_GROUP_KIMONO], 'sexAgeType' => $SEX_AGE_TYPE, 'planShopList' => $planShopList, 'planTypeKimonoMap' => $planTypeKimonoMap));?>
                                </div><div id="quick_booking"></div>
                                <?php
                                $rentalPlanTwoPC = get_field('rental_plan_two_pc');
                                echo do_shortcode(php_set_base_url($rentalPlanTwoPC));
                                ?>
                            <?php endif?>
                            <?php
                                $custom_faq = get_field('custom_faq');
                                echo do_shortcode(php_set_base_url($custom_faq));
                            ?>
                            <!-- Instagram gallery -->
                            <?php if($postName == 'asakusa' or $postName == 'kanazawa' or $postName == 'ito' or $postName == 'ninenzaka' or $postName == 'sendagaya') : ?>
                                <section class="instagram-section">
                                    <h2 class="ins-title">
                                        <span>
                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-instagram.svg">
                                        </span>Instagram <br>#きものレンタルwargo
                                    </h2>
                                    <div class="wrap-instagram-gallery">
                                        <div class="access-loader <?= $postName?>"></div>
                                    </div>
                                </section>
                            <?php endif; ?>
                            <!-- Reservation -->
                            <section class="reserve-section wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                <div class="wrap-reserve-title" id="grid-booking">
                                    <img data-src="<?= WP_HOME ?>/images/new-access/bubble-reserve.svg" class="bubble">
                                    <?php if($postName == 'shinjuku-station'):?>
                                        <h2 class="title">新宿店 予約状況</h2>
                                    <?php elseif ($postName == 'kamakura'): ?>
                                        <h2 class="title">鎌倉店 予約状況</h2>
                                    <?php elseif ($postName == 'kanazawa'): ?>
                                        <h2 class="title">金沢店 予約状況</h2>
                                    <?php elseif ($postName == 'kanazawa-kenrokuen'): ?>
                                        <h2 class="title">兼六園店 予約状況</h2>
                                    <?php elseif ($postName == 'dazaifu'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '太宰府店 予約状況'); ?></h2>
                                    <?php elseif ($postName == 'ito'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '伊東店 予約状況'); ?></h2>
                                    <?php elseif ($postName == 'ninenzaka'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '二年坂店　予約状況'); ?></h2>
                                    <?php elseif ($postName == 'sendagaya'): ?>
                                        <h2 class="title"><?= Yii::t('new-access-child-page-v3', '明治神宮北参道店 予約状況'); ?></h2>
                                    <?php else: ?>
                                        <h2 class="title"><?= Yii::t('access-v2','店舗予約状況')?></h2>
                                    <?php endif;?>
                                    <img data-src="<?= WP_HOME ?>/images/new-kimono/img-women-opt.png" class="girl">
                                </div>
                                <div class="wrap-access-booking">
                                    <div id="box-calendar" class="sixteen columns row">
                                    </div>
                                </div>
                                <?php if($shop_id != 20):?>
                                <div class="wrap-main-btn flexbox justify-content-center">
                                    <?php if($postName=='kanazawa-kenrokuen' or $postName=='dazaifu'): ?>
                                        <a id="reserve_button" href="<?= home_url() ?>/yukata/plan" class="main-btn btn-link formal-preview-popup-handle"><?= Yii::t('new-access-child-page-v3', '浴衣レンタルの予約はこちら'); ?></a>
                                    <?php elseif($postName=='kamakura' or $postName=='kanazawa' or $postName=='ito'): ?>
                                        <a id="reserve_button" href="javascrip:void(0)" class="main-btn btn-link formal-preview-popup-handle"><?= Yii::t('new-access-child-page-v3', '下見の来店予約はこちら'); ?></a>
                                    <?php elseif($postName=='asakusa'): ?>
                                        <a id="reserve_button" href="<?= home_url() ?>/kimono" class="main-btn btn-link"><?= Yii::t('new-access-child-page-v3', '着物レンタルの予約はこちら'); ?></a>
                                    <?php elseif($postName == 'ninenzaka'): ?>
                                        <a id="reserve_button" href="#data-plan-id-39" class="main-btn btn-link"><?= Yii::t('new-access-child-page-v3', '着物レンタルを予約する'); ?></a>
                                    <?php else: ?>
                                        <a id="reserve_button" href="javascrip:void(0)" class="main-btn btn-link formal-preview-popup-handle"><?= Yii::t('new-access-child-page-v3', '着物レンタルの予約はこちら'); ?></a>
                                    <?php endif;?>
                                </div>
                                <?php endif?>

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
                                <?php if($postName == 'shinjuku-station'): ?>
                                    <section class="gallery-section shin">
                                        <div class="row">
                                            <div class="wrap-title">
                                                <img class="lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-title-gallery.png" alt="お客様ギャラリー">
                                                <h2 class="title">お客様ギャラリー</h2>
                                            </div>
                                            <div class="wrap-customer-gallery">
                                                <?php echo do_shortcode('[instagram_gallery]'); ?>
                                            </div>
                                            <div class="wrap-main-btn flexbox justify-content-center">
                                                <a class="main-btn gallery-btn" href="<?= home_url()?>/gallery">お客様ギャラリーをもっと見る</a>
                                            </div>
                                        </div>
                                    </section>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-box -->
            <?php if($postName != 'shinjuku-station'): ?>
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
            <?php endif; ?>
<!--            --><?php //if($postName != 'shinjuku-station'): ?>
<!--                <section class="review-section">-->
<!--                    <div class="container-box">-->
<!--                        <div class="wrap-title-other">-->
<!--                            <p class="main-title">Voice</p>-->
<!--                            <h2 class="title">きものレンタル wargo をご利用 いただお客様の<br/>お声になりますのでご参考下さい。</h2>-->
<!--                        </div>-->
<!--                        <div class="wrap-box-review">-->
<!--                            --><?php //echo do_shortcode('[customer_review_content_shop_v1 shop_id=8]'); ?>
<!--                        </div>-->
<!--                        <div class="wrap-btn-v2 wrap-btn-review flexbox">-->
<!--                            <a href="--><?//= home_url(); ?><!--/access/asakusa-area/asakusa/review" class="btn-v2 btn-review">-->
<!--                                <span class="icon"></span>-->
<!--                                <div class="text">-->
<!--                                    <span class="text-link">すべてのお客様の声を見る</span>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </section>-->
<!--            --><?php //endif; ?>
            <section class="blog-section">
                <div class="container-box">
                    <div class="wrap-title-other">
                        <p class="main-title">Shop Blog</p>
                        <?php if($postName == 'shinjuku-station'):?>
                            <h2 class="title">新宿店 スタッフブログ</h2>
                        <?php elseif ($postName == 'kamakura'): ?>
                            <h2 class="title">鎌倉店 スタッフブログ</h2>
                        <?php elseif ($postName == 'kanazawa'): ?>
                            <h2 class="title">金沢店 スタッフブログ</h2>
                        <?php elseif ($postName == 'kanazawa-kenrokuen'): ?>
                            <h2 class="title">金沢兼六園店 店舗ブログ</h2>
                        <?php elseif ($postName == 'dazaifu'): ?>
                            <h2 class="title"><?= Yii::t('new-access-child-page-v3', '太宰府店 スタッフブログ'); ?></h2>
                        <?php elseif ($postName == 'ito'): ?>
                            <h2 class="title"><?= Yii::t('new-access-child-page-v3', '伊東店 スタッフブログ'); ?></h2>
                        <?php elseif ($postName == 'ninenzaka'): ?>
                            <h2 class="title"><?= Yii::t('new-access-child-page-v3', '清水寺二年坂店 店舗ブログ'); ?></h2>
                        <?php else: ?>
                            <h2 class="title"><?= Yii::t('new-access-child-page-v3', '浅草店 スタッフブログ'); ?></h2>
                        <?php endif;?>
                    </div>
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

                        if($postName == 'ninenzaka'){
                            $args = array(
                                "tax_query" => array(
                                    array(
                                        "taxonomy" => "shop-blog",
                                        "field" => "slug",
                                        "terms" => array( "kiyomizu-area", "kiyomizudera" ),
                                    )
                                ),
                                'post_type' => 'staff-blog',
                                'post_status' => 'publish',
                                'posts_per_page' => $isSmartPhone ? 2 : 4,
                                'order'   => 'DESC',
                                'orderby' => 'date',
                            );
                        }elseif($postName = 'kanazawa-kenrokuen'){
                            $args = array(
                                "tax_query" => array(
                                    array(
                                        "taxonomy" => "shop-blog",
                                        "field" => "slug",
                                        "terms" => array( "kanazawa-area", "kanazawa-kenrokuen" ),
                                    )
                                ),
                                'post_type' => 'staff-blog',
                                'post_status' => 'publish',
                                'posts_per_page' => $isSmartPhone ? 2 : 4,
                                'order'   => 'DESC',
                                'orderby' => 'date',
                            );
                        }else{
                            $args = array(
                                $taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
                                'post_type' => $post_type,
                                'post_status' => 'publish',
                                'posts_per_page' => $isSmartPhone ? 2 : 4,
                                'order' => 'DESC',
                                'orderby' => 'date',
                            );
                        }

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
                                                    echo '<img data-src="'.WP_HOME.'/images/no-image.png">';
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
                    <?php endif; //get_field('shop_blog')?>
                    <div class="wrap-link-to-blog flexbox align-items-center justify-content-center">
                        <?php if($postName=="asakusa"):?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/access/asakusa-area/asakusa/blog">もっとブログを読む</a>
                        <?php endif; ?>
                        <?php if($postName=="kamakura"):?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/access/kamakura-area/kamakura/blog">もっとブログを読む</a>
                        <?php endif; ?>
                        <?php if($postName=="kanazawa"):?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/access/kanazawa-area/kanazawa/blog">もっとブログを読む</a>
                        <?php endif; ?>
                        <?php if($postName=="shinjuku-station"):?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/access/tokyo-area/shinjuku-area/shinjuku-station/blog">もっとブログを読む</a>
                        <?php endif; ?>
                        <?php if($postName=="dazaifu"):?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/access/fukuoka-area/dazaifu/blog"><?= Yii::t('new-access-child-page-v3', 'もっとブログを読む'); ?></a>
                        <?php endif; ?>
                    </div>

                </div>
            </section>
            <?php if($postName != 'shinjuku-station'): ?>
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
                                <img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-about-v3.svg" alt="">
                                <p class="data-number">
                                    <var>154,384</var> 人 <br>（2018年実績）
                                </p>
                            </div>
                            <div class="item-list">
                                <p class="title-header">
                                    店舗数
                                </p>
                                <img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-home-about-v3.svg" alt="">
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
                    </div>
                </div>
            </section>
            <?php endif; ?>
        </div>
<?php endif; ?>
<?php
$intro_bottom = get_field('intro_bottom');
echo do_shortcode(php_set_base_url($intro_bottom));
?>
<div id="wrap-formal-preview-popup"></div>
<script>
        $(document).ready(function(){
            $('body').each(function(){
                $('.banner-section').addClass('imagesLoaded');
            });
            var shop_id = '<?php echo $shop_id; ?>';

            //Gallery slider
            if(isSmartPhone()){
                $('#slider-photo-gallery').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    lazyLoad: 'ondemand'
                });
                $('.col-gallery .slides').not('.slick-initialized').slick({
                    slidesToShow: 3,
                    slidesToScroll: 3
                });
            }

	    	$(".lazy").lazy();
	    	$("img").lazy();

            // Checking in view and loading for calendar
            var calendarLoaded = false;
            var galleryLoaded = false;

            $(window).scroll(function () {
                if ($("#box-calendar").visible() && calendarLoaded == false) {
			calendarLoaded = true;
                    console.log('box-calendar loaded');jQuery.ajax({
                        type: 'GET',
				url: '/api/booking/getCalendar/' + shop_id+'?post_name=<?=$post->post_name?>',
                        success: function(data) {
                            if (data != null && data != "") {
                                $("#box-calendar").html(data);
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
            <?php
            if(
            $postName=='kyotostation'||
            $postName=='ninenzaka'||
            $postName=='osaka-shinsaibashi-opa'||
            $postName=='asakusa'||
            $postName=='ginza-honten'||
            $postName=='sendagaya'||
            $postName=='kanazawa'||
            $postName=='kanazawa-kenrokuen'||
            $postName=='hakata') :
            ?>
            $('.instruction-shop,.shop-video').addClass('hidden');
            $('.wrap-info-direction .wrap-info-title').click(function(){
                $('.instruction-shop,.shop-video').toggleClass('hidden');
            });
            <?php endif;?>
            //Instagram gallery slider
            $('#slider-gallery').not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                lazyLoad: 'ondemand'
            });


            // Slider popup lightbox
            const popupOverlay = '<div id="popup-overlay" class="popup-overlay"></div>'
            if ($('#slider-content .item').length > 1) {
                $('#slider-content').not('.slick-initialized').slick({
                    adaptiveHeight: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true
                });
            };

            $('#slider-content .item').click(function() {
                if(!$('#popup-overlay').length) {
                    $('body').append(popupOverlay);
                } else {
                    $('#popup-overlay').show();
                }

                if (isSmartPhone()){
                    $('body, html').css('overflow', 'hidden');
                }

                $('.wrap-slider-popup').show().removeClass('zoomOut').addClass('animated zoomIn').delay(600).queue(function(){
                    $('.wrap-slider-popup').removeClass('animated zoomIn');
                });

                $('#slider-content .slick-arrow').hide();

                let index = $(this).index();

                if ($('#slider-popup .item').length > 1) {
                    if (!$('#slider-popup').hasClass('slick-initialized')) {
                        $('#slider-popup').not('.slick-initialized').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            dots: true,
							adaptiveHeight: true
                        });
                    } else {
                        $('#slider-popup').slick('slickGoTo', index - 1);
                    }
                }
            });

            $('.wrap-slider-popup .close-popup').click(function(){
                $('.wrap-slider-popup').removeClass('zoomIn').addClass('animated zoomOut');
                setTimeout(function(){
                    $('.wrap-slider-popup').removeClass('animated zoomOut');
                    $('.wrap-slider-popup').hide();
                }, 600);
                $('#popup-overlay').hide();
                $('#slider-content .slick-arrow').show();
                $('body, html').removeAttr('style');
            });
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

        <?php if(in_array($postName, $arrInPreview)) : ?>
        /* Show formal popup - start */
        var shop_id = '<?php echo $shop_id; ?>';
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
        <?php endif; ?>
        $('.wrap-title-plan').click(function(){
            var target = $(this).attr('data-target');
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                $('#' + target).slideDown('fast');
            } else {
                $('#' + target).slideUp('fast')
            }
        })
    </script>
<?php
if(in_array($postName, $arrInPreview)){
    Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
        'id' => 'formal-preview-popup',
        'htmlOptions' => array(
            'style' => 'display: none'
        ),
        'selectedShop' => $shop_id,
    ));
}
?>
<?php get_footer('new-kimono-landing-page') ;?>

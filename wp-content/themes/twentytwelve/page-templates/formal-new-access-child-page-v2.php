<?php
/**
 * Template Name: Formal New Access Child Page v2
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
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$shop_id = get_field('shop_id');
if($language == 'ja'){get_header('formal');}
else{ get_header('new-kimono');}
wp_register_style('new-access-style', get_template_directory_uri() . '/css/new-access.css', array('twentytwelve-style'));
wp_enqueue_style('new-access-style');
if($isSmartPhone){
    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-shop-formal-detail-v2-sp-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-sp-style');
}else{
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-shop-formal-detail-v2-pc-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-pc-style');
}
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
} else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
if($language != "ja"){
    if($isSmartPhone){
        wp_register_style('new-shop-formal-detail-v2-sp-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-shop-formal-detail-v2-sp'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-shop-formal-detail-v2-sp-style'.$cssLanguage);
    }else{
        wp_register_style('new-shop-formal-detail-v2-pc-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-shop-formal-detail-v2-pc'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-shop-formal-detail-v2-pc-style'.$cssLanguage);
    }
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('jquery-visible', WP_HOME . '/js/jquery.visible.min.js');

?>
<?php if($isSmartPhone && $language == 'ja'):?>
    <div class="wrap-overlay-filter">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar toggle-filter-list-sidebar">
                <div class="box-filter-list-sidebar">
                    <div class="toggle-filter-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarFilter]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp">
                <span class="closed-filter"></span>
            </div>
        </div>
    </div>
<?php endif;?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
    }
    ?>
    <?php if($isSmartPhone) : ?>
        <?php
            $title_cate_sp = get_field('title_cate_sp');
            if ($title_cate_sp) {
                echo do_shortcode(php_set_base_url($title_cate_sp));
            }
        ?>
    <?php else: ?>
        <?php
            $title_cate_pc = get_field('title_cate_pc');
            if ($title_cate_pc) {
                echo do_shortcode(php_set_base_url($title_cate_pc));
            }
        ?>
    <?php endif; ?>
    <div class="main-baner-top-v2">
        <?php if($isSmartPhone) : ?>
            <?php
            $main_banner_top_sp = get_field('main_banner_top_sp');
            if ($main_banner_top_sp) {
                echo do_shortcode(php_set_base_url($main_banner_top_sp));
            }
            ?>
        <?php else: ?>
            <?php
            $main_banner_top_pc = get_field('main_banner_top_pc');
            if ($main_banner_top_pc) {
                echo do_shortcode(php_set_base_url($main_banner_top_pc));
            }
            ?>
        <?php endif; ?>
    </div><!--end main-baner-top-v2-->
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if ($language == 'ja'){
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
                                }else{
                                    get_sidebar('top-page-left');
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-cate-list-v2 right-new-shop-formal-v2">
                                <div class="padding-v2">
                                    <?php
                                        if($language == 'ja'){
                                        $banner_customer_thanksgiving = get_field('banner_customer_thanksgiving');
                                        if ($banner_customer_thanksgiving) {
                                            echo do_shortcode(php_set_base_url($banner_customer_thanksgiving));
                                        }
                                    }
                                    ?>
                                    <div class="wrap-photos-shop-fm-v2 <?= $postName; ?>">
                                        <ul class="list-photos flexbox">
                                            <?php
                                            $listGalery = getGaleryFromPost($post);
                                            if (!empty($listGalery) && is_array($listGalery)) :
                                                foreach ($listGalery as $galery) :
                                                    $galery = $galery['ids'];
                                                    if (!empty($galery) && count($galery) != 0) :
                                                        $i = 0;
                                                        foreach ($galery as $attachment_id):
                                                            ?>
                                                            <?php
                                                            $ok = swe_wp_get_attachment_image($attachment_id);
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
                                                                    <a href="<?php echo $image[0]; ?>" rel="lightbox">
                                                                        <img data-src="<?php echo $thumb[0]; ?>"
                                                                             alt="<?php echo strip_tags(get_the_title()) ?>"/>
                                                                    </a>
                                                                </li>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endforeach;
                                            endif; ?>
                                        </ul>
                                    </div>

                                    <div class="wrap-top-plan-circle-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $top_plan_circle = get_field('top_plan_circle');
                                            if ($top_plan_circle) {
                                                echo do_shortcode(php_set_base_url($top_plan_circle));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-google-map-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $google_map = get_field('google_map');
                                            if ($google_map) {
                                                echo do_shortcode(php_set_base_url($google_map));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox">
                                        <div class="btn-v2 btn-v2-01 formal-preview-popup-handle">
                                            <div class="btn-v2-reserve">
                                                <div class="pattern <?= $postName; ?>"></div>
                                                <div class="text">
                                                    <span class="text-link"><?= Yii::t('formal-access-v2', '下見を予約する')?></span>
                                                    <span class="icon-arrow-r-link"></span>
                                                </div>
                                                <div class="pattern <?= $postName; ?> last"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrap-link-btn">
                                        <div class="box-link-btn">
                                            <a href="<?= WP_HOME; ?>/formal/howto" class="link-to-btn">
                                                <span class="link-name"><?= Yii::t('formal-access-v2', '店舗レンタルの流れはこちら')?></span><var class="read-more-link">READ MORE</var>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="wrap-line-v2 wrap-line-v2-ginza line-ginza-readmore-howto"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-intro-wargo-fm-v2 <?= $postName; ?>">
                                        <p class="des-intro-wargo"><?= Yii::t('formal-access-v2', 'きものレンタルwargoは全国19店舗。')?><br class="sp"><?= Yii::t('formal-access-v2', '豊富な柄からお選びいただけます。')?></p>
                                        <div class="wrap-banner-intro-wargo">
                                            <?php if($isSmartPhone) :?>
                                                <?php
                                                $image_intro_sp = get_field('image_intro_sp');
                                                if ($image_intro_sp) {
                                                    echo do_shortcode(php_set_base_url($image_intro_sp));
                                                }
                                                ?>
                                            <?php else: ?>
                                                <?php
                                                $image_intro_pc = get_field('image_intro_pc');
                                                if ($image_intro_pc) {
                                                    echo do_shortcode(php_set_base_url($image_intro_pc));
                                                }
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $intro_wargo = get_field('intro_wargo');
                                            if ($intro_wargo) {
                                                echo do_shortcode(php_set_base_url($intro_wargo));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-sidebar-products-fm-v2 wrap-sidebar-products-pr-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $products_popular_ranking = get_field('products_popular_ranking');
                                            if ($products_popular_ranking) {
                                                echo do_shortcode(php_set_base_url($products_popular_ranking));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-line-v2 wrap-line-v2-ginza"><div class="line-v2 line-v2-single"></div></div>
<style>
		.wrap-plans-shop-fm-v2 .plan-text span {
    color: #674e9f;
    border: 1px solid #674e9f;
    border-radius: 50px;
    padding: 9px 3px 10px;
    font-size: 18px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    display: block;
    line-height: 1;
    text-align: center;
    letter-spacing: 2px;
}
		</style>
                                    <div class="wrap-plans-shop-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $plans_shop = get_field('plans_shop');
                                            if ($plans_shop) {
                                                echo do_shortcode(php_set_base_url($plans_shop));
                                            }
                                        ?>

                                        <?php if($isSmartPhone) :?>
                                            <?php
                                            $list_plan_image_sp = get_field('list_plan_image_sp');
                                            if ($list_plan_image_sp) {
                                                echo do_shortcode(php_set_base_url($list_plan_image_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $list_plan_image_pc = get_field('list_plan_image_pc');
                                            if ($list_plan_image_pc) {
                                                echo do_shortcode(php_set_base_url($list_plan_image_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                    </div>

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-special-event-fm-v2 ginza-honten">
                                        <?php
                                            $special_event = get_field('special_event');
                                            if ($special_event) {
                                                echo do_shortcode(php_set_base_url($special_event));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-line-v2 wrap-line-v2-ginza"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-sidebar-products-fm-v2 wrap-sidebar-products-pkr-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $products_popular_ranking_wedding = get_field('products_popular_ranking_wedding');
                                            if ($products_popular_ranking_wedding) {
                                                echo do_shortcode(php_set_base_url($products_popular_ranking_wedding));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-reason-choose wrap-reason-choose-fm-v2 <?= $postName; ?>">
                                        <div class="wrap-title-v2 wrap-title-v2-other-ginza flexbox">
                                            <span class="icon-circle"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
                                            <div class="wrap-text-title">
                                                <h2 class="lbl-title"><?= Yii::t('formal-access-v2', '選ばれる理由')?>
                                                </h2>
                                                <span class="des-sm-title">Reason why people choose</span>
                                            </div>
                                        </div>
                                        <div class="wrap-order-reason wrap-order-reason-ginza-shop">
                                            <?php if($isSmartPhone) :?>
                                                <?php
                                                    $reason_choose_sp = get_field('reason_choose_sp');
                                                    if ($reason_choose_sp) {
                                                        echo do_shortcode(php_set_base_url($reason_choose_sp));
                                                    }
                                                ?>
                                            <?php else: ?>
                                                <?php
                                                    $reason_choose_pc = get_field('reason_choose_pc');
                                                    if ($reason_choose_pc) {
                                                        echo do_shortcode(php_set_base_url($reason_choose_pc));
                                                    }
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="wrap-btn-v2 wrap-btn-v2-ginza-reason flexbox">
                                            <div class="btn-v2 btn-v2-01 btn-v2-01 formal-preview-popup-handle">
                                                <div class="btn-v2-reserve">
                                                    <div class="pattern <?= $postName ?>"></div>
                                                    <div class="text">
                                                        <span class="text-link"><?= Yii::t('formal-access-v2', '下見を予約する')?></span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern <?= $postName ?> last"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>
                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $confidence_sp = get_field('confidence_sp');
                                        if ($confidence_sp) {
                                            echo do_shortcode(php_set_base_url($confidence_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $confidence_pc = get_field('confidence_pc');
                                        if ($confidence_pc) {
                                            echo do_shortcode(php_set_base_url($confidence_pc));
                                        }
                                        ?>
                                    <?php endif; ?>
                                    <div class="wrap-spots-shop-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $spots_shop = get_field('spots_shop');
                                            if ($spots_shop) {
                                                echo do_shortcode(php_set_base_url($spots_shop));
                                            }
                                        ?>
                                    </div>

                                    <div id="wrap_access_to_shop" class="wrap-access-to-shop-fm-v2 <?= $postName; ?>">
                                        <?php
                                            $access_to_shop = get_field('access_to_shop');
                                            if ($access_to_shop) {
                                                echo do_shortcode(php_set_base_url($access_to_shop));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-double"></div></div>

                                    <div class="wrap-ginza-store wrap-products-shop-store <?= $postName; ?>">
                                        <?php
                                            $products_shop_store = get_field('products_shop_store');
                                            if ($products_shop_store) {
                                                echo do_shortcode(php_set_base_url($products_shop_store));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                        <?php if($shop_id) { ?>
                                            <div class="container-box section-booking-top-page">
                                                <section class="block-viewbooking-top-page">
                                                    <div class="wrap-title-v2 wrap-title-v2-other-ginza flexbox">
                                                        <span class="icon-circle"><img data-src="<?= WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
                                                        <div class="wrap-text-title">
                                                            <h2 class="lbl-title"><?= Yii::t('formal-access-v2', '店舗予約状況')?>
                                                            </h2>
                                                            <span class="des-sm-title">Reservation status</span>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-text-obove-grid-booking"><?= Yii::t('access','text-above-grid-booking')?></div>
                                                    <div id="box-calendar" class="sixteen columns row"></div>
                                                </section>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!-- Video experience -->
                                    <?= do_shortcode(get_field('video_experience')); ?>

                                    <div class="wrap-gallery-shop-fm-v2 list-access-shop <?= $postName; ?>">
                                        <?php
                                            $photo_gallery_shop = get_field('photo_gallery_shop');
                                            if ($photo_gallery_shop) {
                                                echo do_shortcode(php_set_base_url($photo_gallery_shop));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-review bg-light-purple wrap-review-<?= $postName ?>">
                                        <?php
                                            $review_shop = get_field('review_shop');
                                            if ($review_shop) {
                                                echo do_shortcode(php_set_base_url($review_shop));
                                            }
                                        ?>
                                    </div>

                                    <div class="wrap-blog-shop-fm-v2 <?= $postName; ?>">
                                        <div class="wrap-blog-and-banner-plan">
                                            <div class="wrap-title-v2 wrap-title-v2-other-ginza flexbox"><span class="icon-circle"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
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
                                                        $taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
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
                                                                            <a href="<?php the_permalink(); ?>" style="display: block;">
                                                                                <div class="image">
                                                                                    <?php
                                                                                    if ( has_post_thumbnail() ) {
                                                                                        echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title())));
                                                                                    } else {
                                                                                        echo '<img src="'.WP_HOME.'/images/no-image.png">';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
                                                                                <p class="name"><?php echo  wp_trim_words(get_the_title(), 30); ?></p>
                                                                            </a>
                                                                            <?php if ($language == 'ja') : ?>
                                                                                <div class="status-view"><a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span class="text-view"><?php echo $data['name']; ?></span></a></div>
                                                                            <?php endif; ?>
                                                                            <div class="wrap-link-to"><span class="link-to"><a href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', 'つづきを見る') ?></a></span></div>
                                                                        </li>
                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                    ?>
                                                                    <?php if(!$isSmartPhone){?>
                                                                        <li class="sub-item-info sub-item-info-other">
                                                                            <div class="bg-item-outside">
                                                                                <div class="bg-item-inside">
                                                                                    <?php if ($language == 'ja') : ?>
                                                                                        <a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
                                                                                    <?php else: ?>
                                                                                        <a href="<?php echo home_url(); ?>/<?php echo $blogs[$language]; ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
                                                                                    <?php endif; ?>
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

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $how_to_reserve_sp = get_field('how_to_reserve_sp');
                                        if ($how_to_reserve_sp) {
                                            echo do_shortcode(php_set_base_url($how_to_reserve_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $how_to_reserve_pc = get_field('how_to_reserve_pc');
                                        if ($how_to_reserve_pc) {
                                            echo do_shortcode(php_set_base_url($how_to_reserve_pc));
                                        }
                                        ?>
                                    <?php endif; ?>
                                    <div class="wrap-set-content wrap-set-content-fm-v2 <?= $postName; ?>">
                                        <?php if($isSmartPhone): ?>
                                            <?php
                                                $set_content_sp = get_field('set_content_sp');
                                                if ($set_content_sp) {
                                                    echo do_shortcode(php_set_base_url($set_content_sp));
                                                }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                                $set_content_pc = get_field('set_content_pc');
                                                if ($set_content_pc) {
                                                    echo do_shortcode(php_set_base_url($set_content_pc));
                                                }
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($language == 'ja') : ?>
    <?php get_footer('formal'); ?>
<?php else: ?>
    <?php get_footer('new-kimono') ;?>
<?php endif; ?>
<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
'selectedShop' => $shop_id
))
?>
<style type="text/css">
    *{
        min-height: 0;
        min-width: 0;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        var shop_id = '<?php echo $shop_id; ?>';
        // Get grid booking
        var calendarLoaded = false;
        $(window).scroll(function () {
            if ($("#box-calendar").visible() && calendarLoaded == false) {
                calendarLoaded = true;
                console.log('box-calendar loaded');
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCalendar/' + shop_id,
                    success: function(data) {
                        if (data != null && data != "") {
                            $("#box-calendar").html(data);
                        }
                    }
                });
            }
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

        /* Show formal popup - start */
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
		} else {
			$("#formal-preview-popup input.preview-shops:checked").trigger('change');
		}
            });
            $('#botDiv').hide();
        });

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

    })
</script>

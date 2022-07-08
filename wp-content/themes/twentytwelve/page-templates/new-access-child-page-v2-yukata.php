<?php
/**
 * Template Name: New Access Child Page v2 Yukata
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
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-access-style', get_template_directory_uri() . '/css/new-access.css', array('twentytwelve-style'));
wp_enqueue_style('new-access-style');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
if($isSmartPhone){
    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-shop-formal-detail-v2-sp-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-sp-style');
    wp_register_style('formal-new-access-yukata-sp-style', get_template_directory_uri() . '/css/formal-new-access-yukata-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('formal-new-access-yukata-sp-style');
    wp_register_style('new-access-child-page-v2-yukata-sp-style', get_template_directory_uri() . '/css/new-access-child-page-v2-yukata-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-child-page-v2-yukata-sp-style');
}else{
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-shop-formal-detail-v2-pc-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-pc-style');
    wp_register_style('formal-new-access-yukata-pc-style', get_template_directory_uri() . '/css/formal-new-access-yukata-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('formal-new-access-yukata-pc-style');
    wp_register_style('new-access-child-page-v2-yukata-pc-style', get_template_directory_uri() . '/css/new-access-child-page-v2-yukata-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-child-page-v2-yukata-pc-style');
}

$shop_id = get_field('shop_id');
?>
<link href=“https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap” rel=“stylesheet”>
<?php if($isSmartPhone):?>
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
    <?php
    $title_cate_sp = get_field('title_cate_sp');
    $title_cate_pc = get_field('title_cate_pc');
    if ($isSmartPhone) {
        if ($title_cate_sp) {
            echo do_shortcode(php_set_base_url($title_cate_sp));
        }
    } else {
        if ($title_cate_pc) {
            echo do_shortcode(php_set_base_url($title_cate_pc));
        }
    }
    ?>
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

                            <div class="right-column right-column-list right-cate-list-v2 right-new-shop-formal-v2 right-new-shop-formal-v2-yukata right-new-access-v2-yukata right-access-yukata-<?= $shop_id; ?>">
                                <div class="padding-v2">
                                    <div class="wrap-intro-wargo-fm-v2 wrap-intro-wargo-fm-v2-yukata <?= $postName; ?>">
                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $intro_wargo_sp = get_field('intro_wargo_sp');
                                            if ($intro_wargo_sp) {
                                                echo do_shortcode(php_set_base_url($intro_wargo_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $intro_wargo_pc = get_field('intro_wargo_pc');
                                            if ($intro_wargo_pc) {
                                                echo do_shortcode(php_set_base_url($intro_wargo_pc));
                                            }
                                            ?>
                                        <?php endif;?>
                                    </div>

                                    <div class="wrap-sidebar-products-fm-v2 wrap-sidebar-products-pr-fm-v2 <?= $postName; ?>">
                                        <?php
                                        $products_popular_ranking = get_field('products_popular_ranking');
                                        if ($products_popular_ranking) {
                                            echo do_shortcode(php_set_base_url($products_popular_ranking));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-line-v2 wrap-line-v2-yukata line-ginza-readmore-howto"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-top-plan-circle-fm-v2 wrap-top-plan-circle-fm-v2-yukata <?= $postName; ?>">
                                        <?php
                                        $top_plan_circle = get_field('top_plan_circle');
                                        if ($top_plan_circle) {
                                            echo do_shortcode(php_set_base_url($top_plan_circle));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-intro-hiyori-fm-v2 flexbox justify-content-between <?= $postName; ?>">
                                        <?php
                                        $intro_hiyori = get_field('intro_hiyori');
                                        if ($intro_hiyori) {
                                            echo do_shortcode(php_set_base_url($intro_hiyori));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-plans-shop-fm-v2 wrap-plans-shop-fm-v2-yukata <?= $postName; ?>">
                                        <?php if ($isSmartPhone) : ?>
                                            <?php
                                            $plans_shop_sp = get_field('plans_shop_sp');
                                            if ($plans_shop_sp) {
                                                echo do_shortcode(php_set_base_url($plans_shop_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $plans_shop_pc = get_field('plans_shop_pc');
                                            if ($plans_shop_pc) {
                                                echo do_shortcode(php_set_base_url($plans_shop_pc));
                                            }
                                            ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="wrap-line-v2 wrap-line-v2-yukata wrap-line-v2-ginza line-ginza-readmore-howto"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-top-plan-circle-fm-v2 wrap-top-plan-circle-yukata-second <?= $postName; ?>">
                                        <?php
                                        $top_plan_circle_second = get_field('top_plan_circle_second');
                                        if ($top_plan_circle_second) {
                                            echo do_shortcode(php_set_base_url($top_plan_circle_second));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-photos-shop-fm-v2 wrap-photos-shop-fm-v2-yukata <?= $postName; ?>">
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
                                                                    <!--<a href="<?php /*echo $image[0]; */?>" rel="lightbox"><img src="<?php /*echo $thumb[0]; */?>" alt="<?php /*echo strip_tags(get_the_title()) */?>"/></a>-->
                                                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php echo strip_tags(get_the_title()); ?>"/>
                                                                </li>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endforeach;
                                            endif; ?>
                                        </ul>
                                    </div>

                                    <!-- Shop intro -->
                                    <?php
                                    $shop_intro = get_field('shop_intro');
                                    if ($shop_intro) {
                                        echo do_shortcode(php_set_base_url($shop_intro));
                                    }
                                    ?>

                                    <div class="wrap-google-map-fm-v2 wrap-google-map-fm-v2-yukata <?= $postName; ?>">
                                        <?php
                                        $google_map = get_field('google_map');
                                        if ($google_map) {
                                            echo do_shortcode(php_set_base_url($google_map));
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    $google_map_banner = get_field('google_map_banner');
                                    if ($google_map_banner) {
                                        echo do_shortcode(php_set_base_url($google_map_banner));
                                    }
                                    ?>
                                    <!-- Rental plan -->
                                    <?php
                                    if($isSmartPhone){
                                        echo do_shortcode(php_set_base_url(get_field('rental_plan_sp')));
                                    } else{
                                        echo do_shortcode(php_set_base_url(get_field('rental_plan_pc')));
                                    }
                                    ?>

                                    <div class="wrap-list-info-r6 wrap-list-info-r6-ginza wrap-list-info-r6-ginza-yukata <?= $postName; ?>">
                                        <?php
                                        $list_info_r6 = get_field('list_info_r6');
                                        if ($list_info_r6) {
                                            echo do_shortcode(php_set_base_url($list_info_r6));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-hairset-yukata <?= $postName; ?>">
                                        <?php
                                        $hairset_yukata = get_field('hairset_yukata');
                                        if ($hairset_yukata) {
                                            echo do_shortcode(php_set_base_url($hairset_yukata));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop wrap-btn-v2-ginza-shop-yukata flexbox">
                                        <?php if($shop_id == 25) : ?>
                                            <div class="btn-v2 btn-v2-01 bg-ginza-yukata">
                                                <a href="<?= home_url();?>/yukata/plan?shop_id=25" class="btn-v2-reserve">
                                                    <div class="pattern ginza-honten <?= $postName; ?>"></div>
                                                    <div class="text">
                                                        <span class="text-link">浴衣レンタルを予約する</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern ginza-honten <?= $postName; ?> last"></div>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="btn-v2 btn-v2-01 bg-ginza-yukata">
                                                <a href="<?= home_url();?>/yukata/plan?shop_id=<?= $shop_id; ?>" class="btn-v2-reserve">
                                                    <div class="pattern ginza-honten <?= $postName; ?>"></div>
                                                    <div class="text">
                                                        <span class="text-link">浴衣レンタルを予約をする</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern ginza-honten <?= $postName; ?> last"></div>
                                                </a>
                                            </div>
                                        <?php endif;?>
                                    </div>

                                    <div class="wrap-banner-shoukai-ibento-natsu <?= $postName; ?>">
                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $banner_shoukai_ibento_sp = get_field('banner_shoukai_ibento_sp');
                                            if ($banner_shoukai_ibento_sp) {
                                                echo do_shortcode(php_set_base_url($banner_shoukai_ibento_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $banner_shoukai_ibento_pc = get_field('banner_shoukai_ibento_pc');
                                            if ($banner_shoukai_ibento_pc) {
                                                echo do_shortcode(php_set_base_url($banner_shoukai_ibento_pc));
                                            }
                                            ?>
                                        <?php endif;?>
                                    </div>

                                    <div class="wrap-spots-shop-fm-v2 wrap-spots-shop-fm-v2-yukata <?= $postName; ?>">
                                        <?php
                                        $spots_shop = get_field('spots_shop');
                                        if ($spots_shop) {
                                            echo do_shortcode(php_set_base_url($spots_shop));
                                        }
                                        ?>
                                    </div>

                                    <div id="wrap_access_to_shop" class="wrap-access-to-shop-fm-v2 wrap-access-to-shop-fm-v2-yukata <?= $postName; ?>">
                                        <?php
                                        $access_to_shop = get_field('access_to_shop');
                                        if ($access_to_shop) {
                                            echo do_shortcode(php_set_base_url($access_to_shop));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-line-v2">
                                        <div class="line-v2 line-v2-single"></div>
                                    </div><!--end wrap-line-v2-->

                                    <div class="wrap-reservation-status-fm-v2 ginza-honten <?= $postName; ?>">
                                        <?php if($shop_id) { ?>
                                            <div class="container-box section-booking-top-page">
                                                <section class="block-viewbooking-top-page">
                                                    <div class="wrap-title-v2 flexbox">
                                                        <span class="icon-circle"><img src="<?= WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
                                                        <div class="wrap-text-title">
                                                            <h2 class="lbl-title">店舗予約状況</h2>
                                                            <span class="des-sm-title">Reservation status</span>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-text-obove-grid-booking"><?= Yii::t('access','text-above-grid-booking')?></div>
                                                    <div id="box-calendar" class="sixteen columns row">
                                                        <?php
                                                        $shopId = get_field('shop_id');
                                                        echo  NewReserveStatus(array('selected_shop'=>$shopId, 'list_plan_ids'=>$planList));
                                                        ?>
                                                    </div>
                                                </section>
                                            </div>
                                        <?php } ?>
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

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-double"></div></div>

                                    <div class="wrap-ginza-store wrap-products-shop-store <?= $postName; ?>">
                                        <?php
                                        $products_shop_store = get_field('products_shop_store');
                                        if ($products_shop_store) {
                                            echo do_shortcode(php_set_base_url($products_shop_store));
                                        }
                                        ?>
                                    </div>

                                    <div class="wrap-line-v2">
                                        <div class="line-v2 line-v2-single"></div>
                                    </div><!--end wrap-line-v2-->

                                    <div class="wrap-gallery-shop-fm-v2 list-access-shop <?= $postName; ?>">
                                        <?php
                                        $gallery_shop = get_field('gallery_shop');
                                        if ($gallery_shop) {
                                            echo do_shortcode(php_set_base_url($gallery_shop));
                                        }
                                        ?>
                                    </div>
                                    <div class="wrap-blog-shop-fm-v2 ginza-honten wrap-blog-shop-fm-v2-yukata <?= $postName; ?>">
                                        <div class="wrap-blog-and-banner-plan">
                                            <div class="wrap-title-v2 flexbox"><span class="icon-circle"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
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
                                                                    <li class="sub-item-info sub-item-info-box sub-item-info-other">
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

                                    <div class="wrap-howto-reserve wrap-howto-reserve-fm-v2 <?= $postName; ?>">
                                        <div class="wrap-title">
                                            <h2 class="title-howto-reserve">レンタルご予約方法</h2>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div>
                                        </div>
                                        <div class="wrap-content-howto-reserve <?= $postName; ?>">
                                            <div class="box-howto-reserve">
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="group-icon flexbox">
                                                        <div class="wrap-l-icon">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-shinjuku-<?php echo $post->post_name;?>.svg" alt="">
                                                        </div>
                                                        <div class="wrap-r-icon bg-shop wrap-r-icon-<?php echo $post->post_name;?>">
                                                            <p>ご来店でご予約</p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="group-all-icon-text">
                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-shinjuku-<?php echo $post->post_name;?>.svg" alt="">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="group-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-<?php echo $post->post_name;?>">
                                                                <p>ご来店でご予約</p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="para-text">
                                                            <p>きものレンタルwargo フォーマル着物取扱店では下見および
                                                                ご来店でのご予約も承っております。</p>
                                                            <p><strong>下見（30分まで無料）</strong>をご予約いただき、お着物を選んでいた
                                                                だいた上で、配送のご予約をいただくことが可能です。店頭で
                                                                の現金払い、クレジットカード払いも選択していただけます。</p>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-circle-link bg-shop wrap-circle-link-<?php echo $post->post_name;?> flexbox justify-content-center align-items-center">
                                                        <a href="<?=home_url()?>/howto" class="bg-skyblue circle-link flexbox justify-content-center align-items-center">
                                                            <p class="des-circle">来店レンタルの<br>詳しい流れは<br>コチラ</p>
                                                            <span class="arrow-r"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--<div class="wrap-btn-v2 wrap-btn-v2-ginza flexbox">
                                                    <div class="btn-v2 formal-preview-popup-handle">
                                                        <div class="btn-v2-reserve btn-step-01">
                                                            <div class="pattern ginza-honten yukata"></div>
                                                            <div class="text">
                                                                <span class="text-link">浴衣レンタルを予約する</span>
                                                                <span class="icon-arrow-r-link"></span>
                                                            </div>
                                                            <div class="pattern ginza-honten yukata last"></div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <div class="box-howto-reserve box-howto-reserve-<?= $postName; ?> last">
                                                <div class="wrap-all-group">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-shinjuku-<?php echo $post->post_name;?>.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-web wrap-r-icon-ginza-honten wrap-r-icon-<?php echo $post->post_name;?>">
                                                                <p>WEBでご予約</p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-shinjuku-<?php echo $post->post_name;?>.svg" alt="">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-ginza-honten wrap-r-icon-<?php echo $post->post_name;?>">
                                                                    <p>WEBでご予約</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>宅配着物レンタルwargoのウェブサイトからお着物を選んで</p>
                                                                <p>いただき、ご予約をいただくことが可能です。スマートフォン・</p>
                                                                <p>パソコンからご予約いただけます。</p>
                                                                <p>お申し込みにはクレジットカードが必要です。</p>
                                                            </div>
                                                        </div>
                                                        <a href="<?=home_url()?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-<?php echo $post->post_name;?> flexbox justify-content-center align-items-center">
                                                            <div class="circle-link bg-skypink flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">宅配レンタルの<br>詳しい流れは<br>コチラ</p>
                                                                <span class="arrow-r"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-flow-delivery <?= $postName; ?>">
                                                    <div class="title-flow-delivery title-sub-slug-ginza-honten title-sub-slug-<?php echo $post->post_name;?>">宅配レンタルの流れ</div>
                                                    <div class="text-flow-deivery">
                                                        <p>宅配着物レンタルwargoは、必要なものをすべてセットにしてご自宅にお届けいたします。</p>
                                                        <p>ご予約は、ご自宅のパソコンやスマートフォンからはもちろん、対応店舗にご来店いただき、着物を下見していただいてからご予約をいただくこともできます。</p>
                                                        <p>余裕の2日前配達や、簡単な返却方法など、着物を手軽にお楽しみいだけるサービスをご用意しています。</p>
                                                    </div>
                                                    <div class="group-step-flow">
                                                        <div class="title-group-step"><span class="step-num">01</span><var></var>お届け日程</div>
                                                        <div class="des-group-step"><p>お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p></div>
                                                    </div>

                                                    <div class="group-step-flow">
                                                        <div class="title-group-step"><span class="step-num">02</span><var></var>お届け日の例</div>
                                                        <div class="des-group-step des-group-step-other"><p>ご利用日が5月10日の場合</p></div>
                                                        <ul class="list-step-num list-step-num-<?php echo $post->post_name;?> flexbox">
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-blue flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                </div>
                                                                <div class="des-sm-circle">お客様到着日</div>
                                                            </li>
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-grey flexbox align-items-center justify-content-center"><span class="sm-num">5/9</span></div>
                                                                </div>
                                                            </li>
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-gold flexbox align-items-center justify-content-center"><span class="sm-num">5/10</span></div>
                                                                </div>
                                                                <div class="des-sm-circle">ご利用日 </div>
                                                            </li>
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-reason-pink-ginza flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                </div>
                                                                <div class="des-sm-circle">ご返送日</div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="group-step-flow last">
                                                        <div class="title-group-step"><span class="step-num">03</span><var></var>レンタルの延長</div>
                                                        <div class="des-group-step">
                                                            <p>お貸し出し期間の延長をご希望の場合は、申し込み時にカレンダーよりご指定ください。</p>
                                                            <p>1日につき1,000円（＋tax）で延長を承ります。</p>
                                                        </div>
                                                    </div>

                                                    <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                        <div class="btn-v2 btn-v2-02 btn-step-02 bg-blue">
                                                            <a href="<?= home_url(); ?>/takuhai/howto">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">宅配レンタルの流れをもっと詳しく見る</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrap-set-content wrap-set-content-fm-v2 ginza-honten <?= $postName; ?>">
                                        <div class="title-set-content title-set-content-other-ginza">セット内容</div>
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
<?php get_footer('formal'); ?>
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
        if($('.wrap-photos-shop-fm-v2-yukata .list-photos').length > 0){
            $('.wrap-photos-shop-fm-v2-yukata .list-photos').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: true
                    }
                }]
            });
        }
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
                        fade: true
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

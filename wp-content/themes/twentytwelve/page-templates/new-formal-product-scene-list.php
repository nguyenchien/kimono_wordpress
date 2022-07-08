<?php
/**
 * Template Name: New Formal Product Scene List
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

wp_register_style('new-formal-cate-list-style', get_template_directory_uri() . '/css/new-formal-cate-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-cate-list-style');

wp_register_style('new-formal-scene-list-style', get_template_directory_uri() . '/css/new-formal-scene-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-scene-list-style');

if($language !="ja"){
    wp_register_style('style-customer-review'.$cssLanguage.'', get_template_directory_uri() . '/css/customer-review'.$cssLanguage.'.css' , array('twentytwelve-style'));
    wp_enqueue_style('style-customer-review'.$cssLanguage);
}
if($language == "ja"){
    wp_register_style('kimono-letter-spacing-style', get_template_directory_uri() . '/css/kimono-letter-spacing-ja.css', array('twentytwelve-style'));
    wp_enqueue_style('kimono-letter-spacing-style');
}
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

//TEST
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
?>
<link rel="preload" href="/css/searchform.css?v=21062021" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=21062021"></noscript>
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
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal">', '</div>');
        }
    ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php echo FormalSidebarLeftCode(array());?>
                                <?php echo do_shortcode('[FormalBannerTopic direction="left" custom=true]'); ?>
                            </div>
                            <div class="right-column right-column-list right-cate-list right-scene-list">
                                <?php if (!empty($postName)): ?>
                                    <div class="banner-top-highend-v2">
                                        <div class="container-box">
                                            <div class="wrap-main-banner-fm">
                                                <div class="main-baner-fm">
                                                    <h1 class="main-title"><?php the_title(); ?></h1>
                                                    <div class="main-image"><img width="930" height="233" src="<?= WP_HOME; ?>/images/formal-rental/main-banner-fm-scene-<?= $post->post_name; ?>.jpg"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-btn-detail">
                                        <a href="<?=$postName?>/list"><?=Yii::t('wp_theme','View list page of ' . $postName);?></a>
                                    </div>
                                <?php endif; ?>
                                <div class="wrap-list-cate-wg">
                                    <h2 class="title-general title-general-catelist text-center title-general-icon">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <span class="text-title-general"><?= Yii::t('new-formal', $post->post_name); ?>の着物かんたん検索</span>
                                    </h2>
                                    <?php if (get_field('sub_list_scene_banners_1')) { echo php_set_base_url(get_field('sub_list_scene_banners_1')); } ?>
                                    <?php if (get_field('sub_list_scene_banners_2')) { echo php_set_base_url(get_field('sub_list_scene_banners_2')); } ?>
                                    <div class="wrap-btn-detail">
                                        <a href="<?=$postName?>/list"><?=Yii::t('wp_theme','View list page of ' . $postName);?></a>
                                    </div>
                                </div>
                                <div class="wrap-banner-topics wrap-banner-topics-cate-list wrap-banner-topics-scene-list">
                                    <h2 class="title-general title-general-catelist text-center title-general-icon">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <span class="text-title-general"><?= Yii::t('new-formal', $post->post_name); ?>の着物人気ランキング</span>
                                    </h2>
                                    <?php
                                        $list_product_1 = get_field('list_product_1');
                                        $list_product_2 = get_field('list_product_2');
                                        $list_product_3 = get_field('list_product_3');
                                    ?>
                                    <?php if ($list_product_1) : ?>
                                        <div class="wrap-list-formal-product">
                                            <?php echo do_shortcode(php_set_base_url($list_product_1)); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($list_product_2) : ?>
                                        <div class="wrap-list-formal-product">
                                            <?php echo do_shortcode(php_set_base_url($list_product_2)); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($list_product_3) : ?>
                                        <div class="wrap-list-formal-product">
                                            <?php echo do_shortcode(php_set_base_url($list_product_3)); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div id="box-access" class="box-new-pro-list">
                                    <?php include('list-shop-formal.php');?>
                                    <?php
                                        if ( $postName != 'shichigosanscene' ) {
                                            echo do_shortcode('[customer_review_content_scene]');
                                        }
                                    ?>
                                </div>
                                <?php if (get_field('list_banner_topic_scene')) echo php_set_base_url(get_field('list_banner_topic_scene')); ?>
                                <div class="wrap-rental-payment">
                                    <h2 class="title-general text-center title-general-icon">
                                        <span class="text-title-general">レンタルご予約方法</span>
                                    </h2>
                                    <div class="rental-payment-container">
                                        <div>
                                            <h4 class="payment-name">Webでご予約</h4>
                                            <p>宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただく事が可能です。スマートフォン・パソコンからご予約いただけます。<br>お申し込みにはクレジットカードが必要です。</p>
                                        </div>
                                        <div>
                                            <h4 class="payment-name">ご来店でご予約</h4>
                                            <p>京都着物レンタルwargo 京都駅前京都タワー店・祇園四条店・大阪心斎橋店・東京浅草寺店では下見およびご来店でのご予約も承っております。<br><a href="/formal/preview">下見（30分まで無料）をご予約いただき</a>、お着物を選んでいただいた上で、配送のご予約をいただく事が可能です。店頭 での現金払い、クレジットカード払いも選択していただけます。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-rental-calendar">
                                    <h2 class="title-general text-center">
                                        <span class="text-title-general">お届け日程</span>
                                    </h2>
                                    <div class="rental-calendar-container">
                                        <p>お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p>
                                        <table class="payment-calendar">
                                            <tr>
                                                <th>5/8</th>
                                                <th>5/9</th>
                                                <th>5/10</th>
                                                <th>5/11</th>
                                            </tr>
                                            <tr>
                                                <td>お客様到着日</td>
                                                <td></td>
                                                <td>ご利用日</td>
                                                <td>ご返送日</td>
                                            </tr>
                                        </table>
                                        <div>
                                            <h4 class="calendar-title"> お届け日の例</h4>
                                            <p>ご利用日が5月10日の場合</p>
                                        </div>
                                        <div>
                                            <h4 class="calendar-title">レンタルの延長</h4>
                                            <p>お貸し出し期間の延長をご希望の場合は、申し込み時にカレンダーよりご指定ください。1日につき1,000円で延長を承ります。</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-btn-detail"><a href="/takuhai/howto">宅配レンタルの流れをもっと詳しく見る</a></div>
                                <?php if($post->post_name == 'ubugi') : ?>
                                    <div class="bt-banner-shop bt-banner-shop-<?php echo $post->post_name;?>">
                                        <a href="/formal/homongi">
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/banner-bottom-shop-ubugi-sp.jpg" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/banner-bottom-shop-ubugi.jpg" alt="">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_field('intro_top')): ?>
                                    <div class="wrap-into-plan">
                                        <?php the_field('intro_top'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->
</div><!-- end container -->
<?php get_footer('formal'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php
        if($isSmartPhone):
        ?>
        var num_scroll = $(".closed-filter").outerHeight();
        console.log(num_scroll);
        $(window).on("scroll", function(){
            if($(this).scrollTop() > num_scroll){
                $(".closed-filter").addClass("fixed-icon-filter");
                $(".wrap-header").hide();
            }else{
                $(".closed-filter").removeClass("fixed-icon-filter");
                $(".wrap-header").show();
            }
        });
        var numHeight = $(".num-height").outerHeight();
        $(".icon-toggle-filter-sidebar").on('click', function () {
            $(".toggle-filter-list-sidebar").addClass("active").css("top", + numHeight);
            $("body, .wrap-overlay-filter").addClass("fixed-scroll overlay-toggle-filter");
            $(".closed-filter").addClass("icon-formal-check-ok");
        });
        $(".close-sidebar .closed-filter").on("click", function(){
            $("body, .toggle-filter-list-sidebar, .wrap-overlay-filter, .closed-filter").removeClass("active fixed-scroll overlay-toggle-filter icon-formal-check-ok");
        });

        var calendarWidth = $(window).width();
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').width(calendarWidth - 10);

        var calendarLeftPos = $('.item-nav-top-search').width() - 3;
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').css('left', "-" + calendarLeftPos + 'px');

        <?php endif?>
    })
</script>

<?php
/**
 * Template Name: New Formal Product Cate List v2
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
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
} else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
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
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>
        <?php if($isSmartPhone) : ?>
            <?php if(get_field('title_list_cate_sp')): ?>
                <h1 class="title-name-formal">
                    <?php the_field('title_list_cate_sp'); ?>
                </h1>
            <?php endif; ?>
        <?php else: ?>
            <?php if(get_field('title_list_cate_pc')): ?>
                <h1 class="title-name-formal">
                    <?php the_field('title_list_cate_pc'); ?>
                </h1>
            <?php endif; ?>
        <?php endif; ?>
    <div class="main-baner-top-v2">
        <?php
            $shopArr = array("homongi", "irotomesode", "ubugi-lp");
        ?>
        <?php if($isSmartPhone) : ?>
            <?php if($postName == "furisode") : ?>
                <div class="banner-top-v2">
                    <a href="https://kyotokimono-rental.com/news/furisodefair2022.html">
	                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-furisode.jpg?ver=20220707" width="750" height="1040">
                    </a>
                </div>
            <?php elseif ($postName == "hakama") :?>
                <div class="banner-top-v2">
	                <a href="https://kyotokimono-rental.com/news/sotsugyoushiki2022.html">
                        <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-hakama.jpg?ver=20220401" width="750" height="1034">
	                </a>
                </div>
            <?php elseif ($postName == "mofuku") :?>
                <div class="banner-top-v2">
                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-mofuku.jpg?ver=20210712" width="482" height="651">
                </div>
            <?php elseif ($postName == "shichigosan") :?>
                <div class="banner-top-v2">
                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-shichigosan.jpg?ver=20210712" width="750" height="837">
                </div>
            <?php elseif ($postName == "kids-hakama") :?>
                <div class="banner-top-v2">
                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-kids-hakama.jpg?ver=20210712" width="1215" height="492">
                </div>
            <?php else: ?>
                <div class="banner-top-v2">
                    <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-sp-<?= $postName; ?>.jpg?ver=20210712"">
                </div>
            <?php endif ;?>
        <?php else: ?>
            <div class="banner-top-v2">
                <?php if($postName == "hakama") : ?>
	                <a href="https://kyotokimono-rental.com/news/sotsugyoushiki2022.html">
                        <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-pc-<?= $postName; ?>.jpg?ver=20220401">
	                </a>
                <?php elseif ($postName == "furisode") :?>
                    <div class="banner-top-v2">
                        <a href="https://kyotokimono-rental.com/news/furisodefair2022.html">
                            <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-pc-furisode.jpg?ver=20220707">
                        </a>
                    </div>
                <?php else: ?>
	                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/main-banner-fm-v2-pc-<?= $postName; ?>.jpg?ver=20220207">
                <?php endif ;?>
            </div>
        <?php endif; ?>
        <?php if($isSmartPhone) : ?>
            <?php the_field('cate_desc'); ?>
        <?php endif ?>
    </div><!--end main-baner-top-v2-->


    <?php if($isSmartPhone): ?>
        <?php if(get_field('refund_banner_sp')): ?>
            <?php the_field('refund_banner_sp'); ?>
        <?php endif; ?>
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
                                    //echo FormalSidebarLeftCodeNewStyle(array());
                                }else{
									if($postName != 'list'){
										echo FormalSidebarLeftCodeNewStyle(array());
									} else if($postName == 'list'){
										echo FormalSidebarLeftCodeNewStyle(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-cate-list-v2 <?= $postName?>">
                                <div class="padding-v2">
                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $des_list_cate_sp = get_field('des_list_cate_sp');
                                        if ($des_list_cate_sp) {
                                            echo do_shortcode(php_set_base_url($des_list_cate_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $des_list_cate_pc = get_field('des_list_cate_pc');
                                        if ($des_list_cate_pc) {
                                            echo do_shortcode(php_set_base_url($des_list_cate_pc));
                                        }
                                        ?>
                                        <?php if(get_field('refund_banner_pc')): ?>
                                            <?php the_field('refund_banner_pc'); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($postName == 'homongi') : ?>
                                        <!-- Homongi -->
                                        <div class="wrap-slider-v2 wrap-slider-v2-homongi">
                                            <div class="slider-ranking wrap-slider-product" id="slider-ranking">
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
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/homongi/list">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-homongi formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????????????????</span>
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
                                        <?php if(get_field('search_scene')): ?>
                                            <?php
                                                $search_scene = get_field('search_scene');
                                            ?>

                                            <div class="wrap-search-scene-v2">
                                                <?php
                                                    echo do_shortcode(php_set_base_url($search_scene));
                                                ?>
                                            </div >
                                        <?php endif; ?>
                                        <?php if($isSmartPhone) : ?>
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
                                        <?php if(get_field('visit_arrival')): ?>
                                            <div class="wrap-list-info-r6">
                                                <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="wrap-set-content">
                                            <div class="title-set-content title-sub-slug-homongi">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <div class="wrap-confidence">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
                                        <div class="wrap-shop-list-v2">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=homongi]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>??????????????????????????????????????? </p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/homongi">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-homongi">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <?php if($isSmartPhone) : ?>
                                                        <h2 class="review-title">?????????????????????<br>??????????????????????????????</h2>
                                                    <?php else: ?>
                                                        <h2 class="review-title">???????????????????????????????????????????????????</h2>
                                                    <?php endif; ?>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-homongi">
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-->
                                        <div class="wrap-howto-reserve">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve homongi">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-homongi.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-homongi.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>?????????????????????wargo ??????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????</p>
                                                                <p><strong>?????????30??????????????????</strong>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-homongi.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-homongi.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery">
                                                        <div class="title-flow-delivery title-sub-slug-homongi">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-orange-homongi flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-emerald flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>
                                                            </div>
                                                            <div class="btn-v2 btn-non-link">
                                                                <a href="<?= home_url(); ?>/takuhai">
                                                                    <div class="text">
                                                                        <span class="text-link">?????????????????????????????????????????????</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    <?php elseif($postName == 'monpuku') : ?>
                                        <!-- Monpuki -->
                                        <div class="wrap-slider-v2">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">??????????????????????????????????????????</h2>
                                                    <span class="des-sm-title">Popularity ranking</span>
                                                </div>
                                            </div>
                                            <div class="slider-ranking slider-ranking-monpuku wrap-slider-product" id="slider-ranking">
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
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/monpuku/list">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-homongi btn-v2-monpuku formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
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
                                        <?php
                                        $search_scene = get_field('search_scene');
                                        if ($search_scene) {
                                            echo do_shortcode(php_set_base_url($search_scene));
                                        }
                                        ?>
                                        <div class="wrap-reason-choose wrap-reason-choose-monpuku">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title"><span class="text-small">wargo????????????????????????</span> <br> ??????????????????</h2>
                                                    <span class="des-sm-title">Reason why people choose</span>
                                                </div>
                                            </div>
                                            <div class="wrap-order-reason">

                                                <div class="wrap-list-reason homongi flexbox">
                                                    <?php if($isSmartPhone) : ?>
                                                        <?php if(get_field('reason_choose_sp')): ?>
                                                            <div class="wrap-list-reason-sp">
                                                                <?php echo php_set_base_url(get_field('reason_choose_sp')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(get_field('reason_choose_pc')): ?>
                                                            <div class="wrap-list-reason-pc">
                                                                <?php echo php_set_base_url(get_field('reason_choose_pc')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div><!--end wrap-list-reason-->
                                                <?php if(get_field('visit_arrival')): ?>
                                                    <div class="wrap-list-info-r6">
                                                        <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-order-reason-->
                                            <div class="wrap-set-content wrap-set-content-monpuku">
                                                <div class="title-set-content title-sub-slug-homongi">???????????? ???</div>
                                                <?php if($isSmartPhone): ?>
                                                    <?php if(get_field('set_content_sp')): ?>
                                                        <div class="wrap-set-content-sp">
                                                            <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                        </div >
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(get_field('set_content_pc')): ?>
                                                        <div class="wrap-set-content-pc">
                                                            <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                        </div >
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div><!--end wrap-set-content-->
                                        </div><!--end wrap-reason-choose-->
                                        <div class="wrap-confidence">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02-monpuku.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03-monpuku.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
										<section class="section-faq">
											<div class="wrap-title">
												<p class="main-title">FAQ</p>
												<h2 class="sub-title">??????????????????</h2>
											</div>
											<div class="wrap-faq">
												<div class="faq-content">
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content"><p class="text-item-content">??????????????????????????? ?????????????????????????????? ??????????????????????????????????????????????????? ?????????????????????????????????????????? ?????????????????????????????????????????????T?????????????????????????????????????????????????????????????????????????????????????????????</p></div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content"><?php echo Yii::t('new-top-page-kimono-v3', '??????????????????????????????????????????????????????????????????????????????????????????????????????3??????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????2?????????????????????????????????????????????????????????<br/>??????????????????500???(??????)??????????????????<br/>?????????????????????????????????????????????????????????????????????????????????100???'); ?></p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">??????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content"><p class="text-item-content">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<a href="<?php echo WP_HOME; ?>/kimono/hairset">?????????????????????????????????</a>????????????????????????</p></div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content"><p class="text-item-content">????????????????????????1??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<a href="<?php echo WP_HOME; ?>/howto">???????????????????????????</a>?????????????????????</p></div>
													</div>
												</div>
											</div>
										</section>
                                        <div class="wrap-shop-list-v2 wrap-shop-list-v2-monpuku">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">?????????????????????????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????20?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
<!--                                                        <div class="list-item list-04">-->
<!--                                                            <h3 class="area-name">??????????????????</h3>-->
<!--                                                            <ul class="list-shop">-->
<!--                                                                <li>-->
<!--                                                                    <a href="--><?//= home_url(); ?><!--/access/okinawa-area/okinawa-naha">-->
<!--                                                                        <span class="shop-name">??????????????????</span>-->
<!--                                                                        <span class="arrow"></span>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-monpuku formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=monpuku]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/monpuku">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-homongi wrap-review-monpuku">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <?php if($isSmartPhone) : ?>
                                                        <h2 class="review-title">???????????????????????????????????????</h2>
                                                    <?php else: ?>
                                                        <h2 class="review-title">???????????????????????????????????????</h2>
                                                    <?php endif; ?>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-monpuku">
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-monpuku">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve homongi monpuku">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-monpuku.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-monpuku">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-monpuku.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-monpuku">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>?????????????????????wargo ??????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????</p>
                                                                <p><strong>?????????30??????????????????</strong>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link wrap-circle-link-monpuku bg-shop wrap-circle-link-homongi flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/howto" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-monpuku formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-monpuku.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-monpuku">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-monpuku.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link wrap-circle-link-monpuku bg-web wrap-circle-link-homongi flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery">
                                                        <div class="title-flow-delivery title-sub-slug-homongi">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-orange-monpuku flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-emerald-monpuku flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                                <p>1????????????1,000?????????tax??????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                            <div class="btn-v2 btn-v2-monpuku btn-v2-02 btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    <?php elseif($postName == 'ubugi-lp') : ?>
                                        <!-- Ubugi -->
                                        <?php if(get_field('visit_arrival')): ?>
                                            <div class="wrap-list-info-r6">
                                                <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php echo do_shortcode(php_set_base_url(get_field('slider_product_ubugi'))) ;?>
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>
                                        <div class="wrap-reason-choose wrap-reason-choose-ubugi">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">??????????????????wargo????????????????????????<br class="sp">??????????????????</h2>
                                                    <span class="des-sm-title">Reason why people choose</span>
                                                </div>
                                            </div>
                                            <div class="wrap-order-reason">
                                                <div class="wrap-list-reason flexbox">
                                                    <?php if($isSmartPhone) : ?>
                                                        <?php if(get_field('reason_choose_sp')): ?>
                                                            <div class="wrap-list-reason-sp">
                                                                <?php echo php_set_base_url(get_field('reason_choose_sp')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(get_field('reason_choose_pc')): ?>
                                                            <div class="wrap-list-reason-pc">
                                                                <?php echo php_set_base_url(get_field('reason_choose_pc')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div><!--end wrap-list-reason-->
                                            </div><!--end wrap-order-reason-->
                                        </div><!--end wrap-reason-choose-->
                                        <div class="wrap-btn-v2 flexbox">
                                            <div class="btn-v2 btn-v2-ubugi formal-preview-popup-handle">
                                                <a href="<?= WP_HOME;?>/takuhai" class="btn-v2-reserve">
                                                    <div class="pattern"></div>
                                                    <div class="text">
                                                        <span class="text-link">?????????????????????????????????</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern last"></div>
                                                </a>
                                            </div>
                                            <div class="btn-v2 btn-v2-ubugi formal-preview-popup-handle">
                                                <div class="btn-v2-reserve">
                                                    <div class="pattern"></div>
                                                    <div class="text">
                                                        <span class="text-link">?????????????????????????????????</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern last"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-gift-child" id="free-ubugi">
                                            <?php if($isSmartPhone) : ?>
                                                <?php if(get_field('parent_child_gift_sp')): ?>
                                                    <?php echo php_set_base_url(get_field('parent_child_gift_sp')); ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('parent_child_gift_pc')): ?>
                                                    <?php echo php_set_base_url(get_field('parent_child_gift_pc')); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
										<div class="wrap-line-v2">
										<div class="line-v2 line-v2-single"></div>
                                    	</div>
                                        <div class="wrap-confidence">
                                        <div class="wrap-title-v2-other">
                                            <div class="wrap-title-v2 flexbox">
                                                    <span class="icon-circle"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt=""></span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????<br>?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
                                        <div class="wrap-shop-list-v2">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">?????????????????? ????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-04">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-ubugi formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge wrap-knowledge-ubugi">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=ubugi]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>??????????????????????????????????????? </p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="btn-v2 btn-v2-ubugi btn-non-link">
                                                        <a href="<?= home_url(); ?>/column/ubugi">
                                                            <div class="text">
                                                                <span class="text-link">??????????????????????????????</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="btn-v2 btn-v2-ubugi btn-non-link">
                                                        <a href="<?= home_url(); ?>/column/ubugi">
                                                            <div class="text">
                                                                <span class="text-link">??????????????????????????????</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrapper-recommend-plan">
                                            <div class="title-recommend-plan">
                                                <span class="recommend-name">Recommended Plan</span>
                                            </div>
                                            <div class="group-recommend-plan">
                                                <div class="women-recommend-plan">
                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/women-standing-ubugi.png" alt="">
                                                </div>
                                                <div class="info-recommend-plan">
                                                    <div class="group-text">
                                                        <p class="txt-text">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="txt-text">???????????????????????????????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                    <div class="box-recommend-free">
                                                        <div class="group-top-free-text">
                                                            <p class="sm-text">??????????????????????????????????????????????????????</p>
                                                            <p class="lg-text">??????????????????????????????</p>
                                                        </div>
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="line-recommend-free">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/line-recommend-free-sp.svg" alt="">
                                                            </div>
                                                        <?php else: ?>
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/line-recommend-free-pc.svg" alt="">
                                                        <?php endif; ?>
                                                        <div class="group-bottom-free-text">
                                                            <p>????????????&?????????<br/>
                                                                ????????????????????????</p>
                                                        </div>
                                                    </div>
                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="wrap-link-recommend-plan">
                                                            <div class="link-recommend-plan">
                                                                <a href="<?= home_url(); ?>/formal/homongi">?????????????????????????????????</a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end group-recommend-plan-->
                                            <?php if($isSmartPhone) : ?>
                                                <div class="wrap-link-recommend-plan">
                                                    <div class="link-recommend-plan">
                                                        <a href="<?= home_url(); ?>/formal/homongi">?????????????????????????????????</a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div><!--end wrapper-recommend-plan-->
                                        <div class="wrap-howto-reserve">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve ubugi ubugi-lp">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-ubugi.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-ubugi">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-ubugi.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-ubugi">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>?????????????????????wargo ???????????????????????????????????????????????????<br/>???????????????????????????????????????????????????</p>
                                                                <p><strong>?????????30??????????????????</strong>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-ubugi flexbox justify-content-center align-items-center">
                                                            <a href="<?= home_url(); ?>/howto" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve btn-step-01">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last" id="home-delivery">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-ubugi.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-ubugi">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-ubugi.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-ubugi">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?= home_url(); ?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-ubugi flexbox justify-content-center align-items-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery">
                                                        <div class="title-flow-delivery title-sub-slug-ubugi">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-ubugi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-pink flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-blue flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-set-content ubugi ubugi-lp">
                                            <div class="title-set-content title-sub-slug-ubugi">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>
                                    <?php elseif($postName == 'irotomesode') : ?>
                                        <!-- Irotomesode -->
                                        <div class="wrap-slider-v2 wrap-slider-v2-irotomesode">
                                            <div class="slider-ranking wrap-slider-product slider-ranking-irotomesode" id="slider-ranking">
                                                <?php
                                                $list_popular_products_2 = get_field('slider_product_list_top_2');
                                                ?>
                                                <?php if ($list_popular_products_2) : ?>
                                                    <div class="wrap-list-formal-product">
                                                        <?php echo do_shortcode(php_set_base_url($list_popular_products_2)); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end slider-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/irotomesode/iro_tomesode">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-irotomesode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
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
                                        <?php
                                        $search_scene = get_field('search_scene');
                                        if ($search_scene) {
                                            echo do_shortcode(php_set_base_url($search_scene));
                                        }
                                        ?>
                                        <?php if($isSmartPhone) : ?>
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
                                        <?php if(get_field('visit_arrival')): ?>
                                            <div class="wrap-list-info-r6">
                                                <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="wrap-confidence">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
                                        <div class="wrap-shop-list-v2">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist wrap-shoplist-irotomesode">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
<!--                                                        <div class="list-item list-04">-->
<!--                                                            <h3 class="area-name">??????????????????</h3>-->
<!--                                                            <ul class="list-shop">-->
<!--                                                                <li>-->
<!--                                                                    <a href="--><?//= home_url(); ?><!--/access/okinawa-area/okinawa-naha">-->
<!--                                                                        <span class="shop-name">??????????????????</span>-->
<!--                                                                        <span class="arrow"></span>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-irotomesode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge wrap-knowledge-irotomesode">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????? </h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=irotomesode]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/tomesode">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-irotomesode">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <h2 class="review-title">?????????????????????<br class="sp">??????????????????????????????</h2>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-irotomesode">
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-irotomesode">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve irotomesode">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-irotomesode.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-irotomesode.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-irotomesode wrap-r-icon-irotomesode">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
	                                                            <p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
	                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
		                                                            ????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-irotomesode flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-irotomesode formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-irotomesode.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-irotomesode.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi wrap-circle-link-irotomesode flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery">
                                                        <div class="title-flow-delivery title-sub-slug-irotomesode">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-green-irotomesode flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-dark-pink flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other btn-last-irotomesode flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-v2-irotomesode btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-set-content wrap-set-content-irotomesode">
                                            <div class="title-set-content title-sub-slug-irotomesode">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    <?php elseif($postName == 'furisode') : ?>
                                        <!-- furisode -->
                                        <div class="wrap-slider-v2 wrap-slider-furisode-first">
                                            <div class="wrap-title-v2 flexbox">
                                                    <span class="icon-circle">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                    </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">???????????????????????????????????????</h2>
                                                    <span class="des-sm-title">Popularity ranking</span>
                                                </div>
                                            </div>
                                            <div class="slider-ranking wrap-slider-product slider-ranking-furisode" id="slider-ranking">
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
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/furisode/list">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-irotomesode btn-v2-furisode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div ><!--endwrap-slider-v2-->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>
                                        <div class="wrap-title-your-choice-furisode">
                                            <div class="intro-title-your-choice">
                                                <div class="wrap-title-your-choice">
                                                    <p class="title-your-choice sm-title-your-choice">Your Choice!</p>
                                                    <h2 class="title-your-choice big-title-your-choice">?????????????????????????????????</h2>
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
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-double"></div>
                                        </div>
                                        <?php if(get_field('search_scene')): ?>
                                        <?php endif; ?>
                                        <div class="wrap-reason-choose wrap-reason-choose-furisode">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title"><span class="text-small">wargo?????????????????????</span> <br> ??????????????????</h2>
                                                    <span class="des-sm-title">Reason why people choose</span>
                                                </div>
                                            </div>
                                            <div class="wrap-order-reason">

                                                <div class="wrap-list-reason homongi flexbox">
                                                    <?php if($isSmartPhone) : ?>
                                                        <?php if(get_field('reason_choose_sp')): ?>
                                                            <div class="wrap-list-reason-sp">
                                                                <?php echo php_set_base_url(get_field('reason_choose_sp')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(get_field('reason_choose_pc')): ?>
                                                            <div class="wrap-list-reason-pc">
                                                                <?php echo php_set_base_url(get_field('reason_choose_pc')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div><!--end wrap-list-reason-->
                                                <?php if(get_field('visit_arrival')): ?>
                                                    <div class="wrap-list-info-r6">
                                                        <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-order-reason-->
                                        </div><!--end wrap-reason-choose-->
                                        <?php if($isSmartPhone) : ?>
                                            <?php echo php_set_base_url(get_field('hairset_yukata_sp')); ?>
                                        <?php else: ?>
                                            <?php echo php_set_base_url(get_field('hairset_yukata_pc')); ?>
                                        <?php endif; ?>
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>
                                        <div class="wrap-confidence wrap-confidence-furisode">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
										<section class="section-faq">
											<div class="wrap-title">
												<p class="main-title">FAQ</p>
												<h2 class="sub-title">??????????????????</h2>
											</div>
											<div class="wrap-faq">
												<div class="faq-content">
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????</p>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????????????????????????? ?????????????????????100???</p>
															<br>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????7???????????????????????????????????????????????????30???</p>
															<p class="text-item-content">[????????????]??????6??????????????????????????? ?????????????????????100???</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????????????????????????????????????????????????? <a href="<?= WP_HOME; ?>/faq/contactwp">??????????????????????????????</a>?????????????????????????????????</p>
															<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', '??????????????????????????????????????????????????????????????????????????????????????????????????????3??????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????2?????????????????????????????????????????????????????????<br/>??????????????????500???(??????)??????????????????<br/>?????????????????????????????????????????????????????????????????????????????????100???'); ?><!--</p>-->
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">??????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																???????????????????????????????????????????????????????????????????????????<br>
																??????????????????????????????????????????????????????
															</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;???????????????????????????????????????</a>
															</p>
														</div>
													</div>
												</div>
											</div>
										</section>
                                        <div class="wrap-shop-list-v2 wrap-shop-list-v2-furisode">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">??????????????????????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist wrap-shoplist-irotomesode">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
<!--                                                        <div class="list-item list-04">-->
<!--                                                            <h3 class="area-name">??????????????????</h3>-->
<!--                                                            <ul class="list-shop">-->
<!--                                                                <li>-->
<!--                                                                    <a href="--><?//= home_url(); ?><!--/access/okinawa-area/okinawa-naha">-->
<!--                                                                        <span class="shop-name">??????????????????</span>-->
<!--                                                                        <span class="arrow"></span>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-furisode btn-v2-irotomesode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge wrap-knowledge-irotomesode">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????? </h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>?????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>?????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=furisode]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/furisode">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-irotomesode wrap-review-furisode">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <h2 class="review-title">????????????????????????????????????????????????</h2>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-seijin">
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-->
                                        <?php if($postName=='furisode'):?>
	                                    <style>
		                                    .faq-section {
			                                    margin: 40px 0 50px 0;
		                                    }
		                                    @media screen and (max-width:767px){
			                                    .faq-section {
				                                    margin: 40px 0;
			                                    }
		                                    }
		                                    .faq-section .title-high-end {
			                                    background-color: #C1A530;
			                                    color: #fff;
			                                    font-size: 24px;
			                                    padding: 12px 15px;
			                                    letter-spacing: 3px;
			                                    margin-bottom: 17px;
			                                    font-weight: bold;
		                                    }
		                                    .wrap-item-high-end-title {
			                                    justify-content: space-between;
			                                    align-items: center;
			                                    background-color: #f4f4f4;
			                                    margin: 15px 0 10px;
			                                    padding: 5px 10px 5px 15px;
			                                    cursor: pointer;
		                                    }
		                                    .wrap-item-high-end-title .left-item-high-end {
			                                    width: 100%;
			                                    align-items: center;
		                                    }
		                                    .wrap-item-high-end-title .left-item-high-end img {
			                                    margin-right: 10px;
			                                    width: 20px;
			                                    height: 20px;
		                                    }
		                                    .wrap-item-high-end-title .test-item-high-end {
			                                    font-size: 18px;
			                                    width: 97.5%;
		                                    }
		                                    .wrap-item-high-end-title .right-item-high-end {
			                                    border: 1px solid #b48c00;
			                                    height: 25px;
			                                    width: 25px;
			                                    border-radius: 50%;
			                                    display: flex;
			                                    align-items: center;
			                                    justify-content: center;
		                                    }
		                                    .wrap-item-high-end-title .arrow-circle {
			                                    content: "";
			                                    right: 0;
			                                    width: 10px;
			                                    height: 10px;
			                                    transform: rotate(45deg);
			                                    border-right: 1px solid #b48c00;
			                                    border-bottom: 1px solid #b48c00;
			                                    cursor: pointer;
			                                    -webkit-transform: rotate(45deg);
			                                    position: relative;
			                                    top: -2px;
		                                    }
		                                    .wrap-item-high-end-des {
			                                    display: none;
			                                    padding: 5px 10px 5px 15px;
		                                    }
		                                    .wrap-item-high-end-des .test-item-high-end p, .wrap-item-high-end-des .test-item-high-end {
			                                    font-size: 13px;
			                                    line-height: 1.8;
		                                    }
		                                    .wrap-item-high-end-des .left-item-high-end {
			                                    align-items: start;
		                                    }
		                                    .wrap-item-high-end-des .left-item-high-end img {
			                                    margin-right: 10px;
			                                    width: 20px;
			                                    height: 20px;
		                                    }
		                                    .wrap-item-high-end-des .test-item-high-end {
			                                    width: 97%;
		                                    }
	                                    </style>
	                                    <section class="faq-section">
		                                    <div class="wrap-des-high-end">
			                                    <h3 class="title-high-end">FAQ</h3>
			                                    <ul class="list-hight-end">
				                                    <li class="item-high-end">
					                                    <div class="wrap-item-high-end-title flexbox">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-q-faq.svg">
							                                    <div class="test-item-high-end">???????????????</div>
						                                    </div>
						                                    <div class="right-item-high-end">
							                                    <span class="arrow-circle"></span>
						                                    </div>
					                                    </div>
					                                    <div class="wrap-item-high-end-des">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-a-faq.svg">
							                                    <div class="test-item-high-end">
								                                    ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????   ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????  ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????    ????????????????????????3?????????????????????????????????????????????????????????????????????????????????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
							                                    </div>
						                                    </div>
					                                    </div>
				                                    </li>
				                                    <li class="item-high-end">
					                                    <div class="wrap-item-high-end-title flexbox">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-q-faq.svg">
							                                    <div class="test-item-high-end">???????????????????????????</div>
						                                    </div>
						                                    <div class="right-item-high-end">
							                                    <span class="arrow-circle"></span>
						                                    </div>
					                                    </div>
					                                    <div class="wrap-item-high-end-des">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-a-faq.svg">
							                                    <div class="test-item-high-end">
								                                    ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????9?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
							                                    </div>
						                                    </div>
					                                    </div>
				                                    </li>
				                                    <li class="item-high-end">
					                                    <div class="wrap-item-high-end-title flexbox">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-q-faq.svg">
							                                    <div class="test-item-high-end">??????????????????????????????????????????????????????????????????</div>
						                                    </div>
						                                    <div class="right-item-high-end">
							                                    <span class="arrow-circle"></span>
						                                    </div>
					                                    </div>
					                                    <div class="wrap-item-high-end-des">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-a-faq.svg">
							                                    <div class="test-item-high-end">
								                                    ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????1????????????????????????????????????????????????????????????????????????????????????????????????1???????????????????????????????????????????????????2???????????????????????????????????????????????????????????????????????????????????????????????????????????????
							                                    </div>
						                                    </div>
					                                    </div>
				                                    </li>
				                                    <li class="item-high-end">
					                                    <div class="wrap-item-high-end-title flexbox">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-q-faq.svg">
							                                    <div class="test-item-high-end">??????????????????</div>
						                                    </div>
						                                    <div class="right-item-high-end">
							                                    <span class="arrow-circle"></span>
						                                    </div>
					                                    </div>
					                                    <div class="wrap-item-high-end-des">
						                                    <div class="left-item-high-end flexbox">
							                                    <img src="https://kyotokimono-rental.com/images/new-kimono-v3/word-a-faq.svg">
							                                    <div class="test-item-high-end">
								                                    ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
							                                    </div>
						                                    </div>
					                                    </div>
				                                    </li>
			                                    </ul>
		                                    </div>
	                                    </section>
	                                    <script>
                                            $(document).ready(function(){
                                                $(".wrap-item-high-end-title").click(function(){
                                                    $(this).siblings('.wrap-item-high-end-des').slideToggle();
                                                    $(this).find('.arrow-circle').toggleClass('active');
                                                });
                                                $(".wrap-item-high-end-title:eq(0)").trigger('click');
                                            })
	                                    </script>
	                                    <!--end Custom FAQ-->
	                                    <?php endif;?>
                                        <div class="wrap-howto-reserve wrap-howto-reserve-furisode wrap-howto-reserve-irotomesode">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve furisode irotomesode">
                                                <div class="box-howto-reserve box-howto-reserve-furisode">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-furisode.svg" width="206" height="150" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-furisode wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-furisode.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-furisode wrap-r-icon-irotomesode">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
																<p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
																????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-furisode flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-furisode btn-v2-irotomesode formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve box-howto-reserve-furisode last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-furisode.svg" width="129" height="150" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-furisode wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-furisode.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-furisode wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-furisode wrap-circle-link-homongi wrap-circle-link-irotomesode flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery wrap-flow-delivery-furisode">
                                                        <div class="title-flow-delivery title-sub-slug-furisode">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-pink-bold-furisode flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-green-furisode flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other btn-last-irotomesode flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-v2-furisode btn-v2-irotomesode btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-set-content wrap-set-content-irotomesode wrap-set-content-furisode">
                                            <div class="title-set-content title-sub-slug-furisode">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>
                                        <!--end section-intro-bottom shichigosan-->
                                    <?php elseif($postName == 'hakama') : ?>
                                        <!-- Hakama -->
                                        <div class="wrap-slider-v2 wrap-slider-furisode-first">
                                            <div class="wrap-title-v2 flexbox">
                                                    <span class="icon-circle">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                    </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">?????????????????????????????????????????????</h2>
                                                    <span class="des-sm-title">Popularity ranking</span>
                                                </div>
                                            </div>
                                            <div class="slider-ranking wrap-slider-product slider-ranking-hakama" id="slider-ranking">
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
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/hakama/list">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-irotomesode btn-v2-hakama formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div ><!--endwrap-slider-v2-->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>
                                        <?php if(get_field('search_scene')): ?>
                                            <div class="box-search-scene-v2-hakama">
                                                <div class="wrap-search-scene-v2 hakama">
                                                    <?php the_field('search_scene'); ?>
                                                </div >
                                            </div>
                                        <?php endif; ?>
                                        <div class="wrap-title-your-choice-furisode">
                                            <div class="intro-title-your-choice">
                                                <div class="wrap-title-your-choice">
                                                    <p class="title-your-choice sm-title-your-choice">Your Choice!</p>
                                                    <p class="title-your-choice big-title-your-choice">??????????????????????????????????????????</p>
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
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-double"></div>
                                        </div>
                                        <div class="wrap-reason-choose wrap-reason-choose-hakama">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title"><span class="text-small">wargo??????????????????????????????</span> <br> ??????????????????</h2>
                                                    <span class="des-sm-title">Reason why people choose</span>
                                                </div>
                                            </div>
                                            <div class="wrap-order-reason">

                                                <div class="wrap-list-reason homongi flexbox">
                                                    <?php if($isSmartPhone) : ?>
                                                        <?php if(get_field('reason_choose_sp')): ?>
                                                            <div class="wrap-list-reason-sp">
                                                                <?php echo php_set_base_url(get_field('reason_choose_sp')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(get_field('reason_choose_pc')): ?>
                                                            <div class="wrap-list-reason-pc">
                                                                <?php echo php_set_base_url(get_field('reason_choose_pc')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div><!--end wrap-list-reason-->
                                                <?php if(get_field('visit_arrival')): ?>
                                                    <div class="wrap-list-info-r6">
                                                        <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-order-reason-->
                                        </div><!--end wrap-reason-choose-->

                                        <?php if($isSmartPhone) : ?>
                                            <?php echo php_set_base_url(get_field('hairset_yukata_sp')); ?>
                                        <?php else: ?>
                                            <?php echo php_set_base_url(get_field('hairset_yukata_pc')); ?>
                                        <?php endif; ?>

                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>
                                        <div class="wrap-confidence wrap-confidence-furisode">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
										<section class="section-faq">
											<div class="wrap-title">
												<p class="main-title">FAQ</p>
												<h2 class="sub-title">??????????????????</h2>
											</div>
											<div class="wrap-faq">
												<div class="faq-content">
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????</p>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????????????????????????? ?????????????????????100???</p>
															<br>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????7???????????????????????????????????????????????????30???</p>
															<p class="text-item-content">[????????????]??????6??????????????????????????? ?????????????????????100???</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????????????????????????????????????????????????? <a href="<?= WP_HOME; ?>/faq/contactwp">??????????????????????????????</a>?????????????????????????????????</p>
															<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', '??????????????????????????????????????????????????????????????????????????????????????????????????????3??????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????2?????????????????????????????????????????????????????????<br/>??????????????????500???(??????)??????????????????<br/>?????????????????????????????????????????????????????????????????????????????????100???'); ?><!--</p>-->
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">??????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																???????????????????????????????????????????????????????????????????????????<br>
																??????????????????????????????????????????????????????
															</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;???????????????????????????????????????</a>
															</p>
														</div>
													</div>
												</div>
											</div>
										</section>
                                        <div class="wrap-shop-list-v2 wrap-shop-list-v2-furisode">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">???????????????????????????????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist wrap-shoplist-irotomesode">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
<!--                                                        <div class="list-item list-04">-->
<!--                                                            <h3 class="area-name">??????????????????</h3>-->
<!--                                                            <ul class="list-shop">-->
<!--                                                                <li>-->
<!--                                                                    <a href="--><?//= home_url(); ?><!--/access/okinawa-area/okinawa-naha">-->
<!--                                                                        <span class="shop-name">??????????????????</span>-->
<!--                                                                        <span class="arrow"></span>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-hakama btn-v2-irotomesode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge wrap-knowledge-irotomesode">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                                </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">?????????????????????????????????????????? </h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>?????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>???????????????????????????????????????????????????????????????????????????</p>
                                                <p>?????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=hakama]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/hakama">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-irotomesode wrap-review-hakama">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <h2 class="review-title">?????????????????????????????????????????????????????????</h2>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-sotsugyou">
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-hakama">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve hakama">
                                                <div class="box-howto-reserve box-howto-reserve-hakama">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-hakama.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-hakama">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-hakama.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-hakama">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
																<p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-hakama flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-hakama btn-v2-irotomesode formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve box-howto-reserve-hakama last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-hakama.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-hakama">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-hakama.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-hakama">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi wrap-circle-link-hakama flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery wrap-flow-delivery-hakama">
                                                        <div class="title-flow-delivery title-sub-slug-hakama">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-strong-pink-hakama flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-green-hakama flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????
                                                                </p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other btn-last-irotomesode flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-v2-hakama  btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-set-content wrap-set-content-irotomesode wrap-set-content-hakama">
                                            <div class="title-set-content title-sub-slug-hakama">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>
                                        <!--end section-intro-bottom-->
                                    <?php elseif($postName == 'shichigosan') : ?>
                                        <!-- Shichigosan -->
                                        <div class="wrap-slider-v2 wrap-slider-v2-shichigosan wrap-slider-furisode-first">
                                            <div class="wrap-title-v2 flexbox">
                                                    <span class="icon-circle">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                    </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">??????????????????????????????????????????</h2>
                                                    <span class="des-sm-title">Popularity ranking</span>
                                                </div>
                                            </div>
                                            <div class="group-items-shichigosan">
                                                <div class="wrap-items-shichigosan shichigosan-items-03">
                                                    <div class="wrap-img-shichigosan">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/banner-shichigosan-3.jpg" width="837" height="182" alt="????????? ?????????(??????)?????????????????????????????????">
                                                    </div>
                                                    <h3 class="lbl-title-shichigosan">????????? ?????????(??????)?????????????????????????????????</h3>
                                                    <div class="slider-ranking slider-ranking-shichigosan" id="slider-ranking">
                                                        <?php if($isSmartPhone) :?>
                                                            <?php
                                                            $list_popular_products = get_field('slider_product_list_top_03_sp');
                                                            ?>
                                                            <?php if ($list_popular_products) : ?>
                                                                <div class="wrap-list-formal-product">
                                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php
                                                            $list_popular_products = get_field('slider_product_list_top_03_pc');
                                                            ?>
                                                            <?php if ($list_popular_products) : ?>
                                                                <div class="wrap-list-formal-product">
                                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div><!--end slider-->
                                                    <div class="wrap-btn-v2 shichigosan flexbox">
                                                        <div class="btn-v2 btn-non-link">
                                                            <a href="<?= home_url(); ?>/formal/shichigosan/shichigosan3years">
                                                                <div class="text">
                                                                    <span class="text-link">3??????????????????????????????</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="btn-v2 btn-v2-irotomesode btn-v2-shichigosan formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->
                                                </div>
                                                <div class="wrap-items-shichigosan shichigosan-items-05">
                                                    <div class="wrap-img-shichigosan">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/banner-shichigosan-5.jpg" width="838" height="182" alt="????????? ?????????(??????)?????????????????????????????????">
                                                    </div>
                                                    <h3 class="lbl-title-shichigosan">????????? ?????????(??????)?????????????????????????????????</h3>
                                                    <div class="slider-ranking slider-ranking-shichigosan slider-ranking-hakama" id="slider-ranking">
                                                        <?php if($isSmartPhone) :?>
                                                            <?php
                                                            $list_popular_products = get_field('slider_product_list_top_05_sp');
                                                            ?>
                                                            <?php if ($list_popular_products) : ?>
                                                                <div class="wrap-list-formal-product">
                                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php
                                                            $list_popular_products = get_field('slider_product_list_top_05_pc');
                                                            ?>
                                                            <?php if ($list_popular_products) : ?>
                                                                <div class="wrap-list-formal-product">
                                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div><!--end slider-->
                                                    <div class="wrap-btn-v2 shichigosan flexbox">
                                                        <div class="btn-v2 btn-non-link">
                                                            <a href="<?= home_url(); ?>/formal/shichigosan/shichigosan5years">
                                                                <div class="text">
                                                                    <span class="text-link">5???????????????????????????</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="btn-v2 btn-v2-irotomesode btn-v2-shichigosan formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->
                                                </div>
                                                <div class="wrap-items-shichigosan shichigosan-items-07">
                                                    <div class="wrap-img-shichigosan">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/banner-shichigosan-7.jpg" width="838" height="182" alt="????????? ?????????(??????)?????????????????????????????????">
                                                    </div>
                                                    <h3 class="lbl-title-shichigosan">????????? ?????????(??????)?????????????????????????????????</h3>
                                                    <div class="slider-ranking slider-ranking-shichigosan slider-ranking-hakama" id="slider-ranking">
                                                        <?php if($isSmartPhone) :?>
                                                            <?php
                                                            $list_popular_products = get_field('slider_product_list_top_07_sp');
                                                            ?>
                                                            <?php if ($list_popular_products) : ?>
                                                                <div class="wrap-list-formal-product">
                                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php
                                                            $list_popular_products = get_field('slider_product_list_top_07_pc');
                                                            ?>
                                                            <?php if ($list_popular_products) : ?>
                                                                <div class="wrap-list-formal-product">
                                                                    <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div><!--end slider-->
                                                    <div class="wrap-btn-v2 shichigosan last flexbox">
                                                        <div class="btn-v2 btn-non-link">
                                                            <a href="<?= home_url(); ?>/formal/shichigosan/shichigosan7years">
                                                                <div class="text">
                                                                    <span class="text-link">7??????????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="btn-v2 btn-v2-irotomesode btn-v2-shichigosan formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->
                                                </div>
                                                <?php
                                                $list_product_ranking_sp = get_field('list_product_ranking_sp');
                                                $list_product_ranking_pc = get_field('list_product_ranking_pc');
                                                ?>
                                                <?php if($isSmartPhone) :?>
                                                    <?php echo do_shortcode(php_set_base_url($list_product_ranking_sp)); ?>
                                                <?php else: ?>
                                                    <?php echo do_shortcode(php_set_base_url($list_product_ranking_pc)); ?>
                                                <?php endif; ?>

                                            </div>
                                        </div ><!--end wrap-slider-v2-shichigosan-->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-shichigosan">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve hakama">
                                                <div class="box-howto-reserve box-howto-reserve-shichigosan">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-shichigosan.svg" width="236" height="173" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-shichigosan">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-shichigosan.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-shichigosan">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
																<p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-hakama flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-shichigosan btn-v2-irotomesode formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve box-howto-reserve-shichigosan last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-shichigosan.svg" width="148" height="173" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-shichigosan">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-shichigosan.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-shichigosan">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi wrap-circle-link-hakama flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery wrap-flow-delivery-shichigosan">
                                                        <div class="title-flow-delivery title-sub-slug-shichigosan">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-red-shichigosan flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-blue-shichigosan flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-v2-hakama btn-v2-shichigosan  btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-shichigosan-->
                                        <div class="wrap-set-content wrap-set-content-irotomesode wrap-set-content-shichigosan">
                                            <div class="title-set-content title-sub-slug-shichigosan">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-shichigosan-->
                                        <div class="wrap-line-v2 custom-shichigosan">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div><!--end wrap-line-v2-->
										<section class="section-faq">
											<div class="wrap-title">
												<p class="main-title">FAQ</p>
												<h2 class="sub-title">??????????????????</h2>
											</div>
											<div class="wrap-faq">
												<div class="faq-content">
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????</p>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????????????????????????? ?????????????????????100???</p>
															<br>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????7???????????????????????????????????????????????????30???</p>
															<p class="text-item-content">[????????????]??????6??????????????????????????? ?????????????????????100???</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????????????????????????????????????????????????? <a href="<?= WP_HOME; ?>/faq/contactwp">??????????????????????????????</a>?????????????????????????????????</p>
															<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', '??????????????????????????????????????????????????????????????????????????????????????????????????????3??????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????2?????????????????????????????????????????????????????????<br/>??????????????????500???(??????)??????????????????<br/>?????????????????????????????????????????????????????????????????????????????????100???'); ?><!--</p>-->
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">??????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																???????????????????????????????????????????????????????????????????????????<br>
																??????????????????????????????????????????????????????
															</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;???????????????????????????????????????</a>
															</p>
														</div>
													</div>
												</div>
											</div>
										</section>
                                        <div class="wrap-shop-list-v2 wrap-shop-list-shichigosan">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">?????????????????????????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                               <!-- <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
<!--                                                        <div class="list-item list-04">-->
<!--                                                            <h3 class="area-name">??????????????????</h3>-->
<!--                                                            <ul class="list-shop">-->
<!--                                                                <li>-->
<!--                                                                    <a href="--><?//= home_url(); ?><!--/access/okinawa-area/okinawa-naha">-->
<!--                                                                        <span class="shop-name">??????????????????</span>-->
<!--                                                                        <span class="arrow"></span>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-shichigosan formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-shichigosan-->
                                        <div class="wrap-confidence wrap-confidence-shichigosan">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-shichigosan-->
                                        <div class="wrap-knowledge shichigosan">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>???????????????????????????????????????????????????????????????????????????</p>
                                                <p>???????????????????????????????????????????????????????????????5???????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>?????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=shichigosan]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>??????????????????????????????????????? </p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/shichigosan">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-shichigosan">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <h2 class="review-title">?????????????????????????????????<br class="sp">??????????????????????????????</h2>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-shichigosan">
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-shichigosan-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>
                                        <!--end section-intro-bottom shichigosan-->

                                    <?php elseif($postName == 'mofuku') : ?>
                                        <!-- Mofuku -->
                                        <div class="wraper-intro-top-mofuku">
                                            <?php
                                            $shipping_area = get_field('shipping_area');
                                            if($shipping_area):?>
                                                <?= do_shortcode(php_set_base_url($shipping_area));?>
                                            <?php endif; ?>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                            <div class="group-wrap-slider-v2-mofuku">
                                                <?php
                                                $slider_product_mofuku = get_field('slider_product_mofuku');
                                                if($slider_product_mofuku):?>
                                                    <?= do_shortcode(php_set_base_url($slider_product_mofuku));?>
                                                <?php endif; ?>
                                            </div><!-- group-wrap-slider-v2-mofuku-->
                                        </div><!--end wraper-intro-top-mofuku-->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-double"></div>
                                        </div><!--end wrap-line-v2-->
                                        <div class="wrap-reason-choose">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title wrap-text-title-reason-mofuku wrap-col-mofuku">
                                                    <h2>
                                                        <span class="des-sm-title des-title-reason des-title-new">Wargo??????????????????????????????????????????</span>
                                                        <span class="lbl-title">??????????????????</span>
                                                    </h2>
                                                    <span class="des-sm-title des-title-new">Reason why people choose</span>
                                                </div>
                                            </div>
                                            <div class="wrap-order-reason">

                                                <div class="wrap-list-reason homongi flexbox">
                                                    <?php if($isSmartPhone) : ?>
                                                        <?php if(get_field('reason_choose_sp')): ?>
                                                            <div class="wrap-list-reason-sp">
                                                                <?php echo php_set_base_url(get_field('reason_choose_sp')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(get_field('reason_choose_pc')): ?>
                                                            <div class="wrap-list-reason-pc">
                                                                <?php echo php_set_base_url(get_field('reason_choose_pc')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div><!--end wrap-list-reason-->
                                                <?php if(get_field('visit_arrival')): ?>
                                                    <div class="wrap-list-info-r6">
                                                        <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-order-reason-->
                                        </div><!--end wrap-reason-choose-->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div><!--end wrap-line-v2-->
                                        <div class="wrap-knowledge">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title sm-text-mofuku">??????????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=mofuku]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????  </p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/mofuku">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div><!--end wrap-line-v2-->
                                        <div class="wrap-confidence">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
										<section class="section-faq">
											<div class="wrap-title">
												<p class="main-title">FAQ</p>
												<h2 class="sub-title">??????????????????</h2>
											</div>
											<div class="wrap-faq">
												<div class="faq-content">
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????</p>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????????????????????????? ?????????????????????100???</p>
															<br>
															<p class="text-item-content">????????????????????????????????????????????????????????????</p>
															<p class="text-item-content">[????????????]??????30?????????????????????????????? ?????????</p>
															<p class="text-item-content">[????????????]??????29??????7???????????????????????????????????????????????????30???</p>
															<p class="text-item-content">[????????????]??????6??????????????????????????? ?????????????????????100???</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">???????????????????????????????????????????????????????????????????????? <a href="<?= WP_HOME; ?>/faq/contactwp">??????????????????????????????</a>?????????????????????????????????</p>
															<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', '??????????????????????????????????????????????????????????????????????????????????????????????????????3??????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????2?????????????????????????????????????????????????????????<br/>??????????????????500???(??????)??????????????????<br/>?????????????????????????????????????????????????????????????????????????????????100???'); ?><!--</p>-->
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">??????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																???????????????????????????????????????????????????????????????????????????<br>
																??????????????????????????????????????????????????????
															</p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">???????????????????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content">
																????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;???????????????????????????????????????</a>
															</p>
														</div>
													</div>
												</div>
											</div>
										</section>
                                        <div class="wrap-shop-list-v2 mofuku">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title wrap-col-mofuku">
                                                    <h2 class="lbl-title">???????????????????????????????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist mofuku">
                                                <div class="shoplist-intro">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="text-intro mofuku mofuku-sp">
                                                            <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                            <p>????????????????????????????????????????????????????????????</p>
                                                            <span><var>???</var>???????????????????????????????????????</span>
                                                            <div class="shop-name-link">??? ?????????????????? ???</div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="text-intro mofuku">
                                                            <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                            <p>????????????????????????????????????????????????????????????<span class="float-right"><var>???</var>???????????????????????????????????????</span></p>
                                                            <div class="shop-name-link clearfix">??? ?????????????????? ???</div>
                                                        </div>
                                                    <?php endif;?>
                                                </div>
                                                <div class="wrap-list-area mofuku">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????<var class="text-red-mofuku">???16???????????????????????????????????????????????????</var></span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li class="star">
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????<var class="text-red-mofuku">???16???????????????????????????????????????????????????</var></span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name flex-column">?????????????????????????????????<var class="text-red-mofuku">???16???????????????????????????????????????????????????</var></span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li class="star">
                                                                    <a href="<?= home_url(); ?>/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-04">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <li class="star">
                                                                    <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????<var class="text-red-mofuku">???16???????????????????????????????????????????????????</var></span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li class="star">
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????<var class="text-red-mofuku">???16???????????????????????????????????????????????????</var></span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li class="star">
                                                                        <a href="<?= home_url(); ?>/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name flex-column">?????????????????????????????????<var class="text-red-mofuku pd-t">???16???????????????????????????????????????????????????</var></span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi formal-preview-popup-handle btn-v2-mofuku">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-howto-reserve mofuku">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve homongi mofuku">
                                                <div class="box-howto-reserve mofuku">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-mofuku.svg" width="203" height="150" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-mofuku.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
																<p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-mofuku formal-preview-popup-handle btn-v2-mofuku-sp">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last mofuku">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-mofuku.svg" width="129" height="150" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-mofuku.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery mofuku">
                                                        <div class="title-flow-delivery title-sub-slug-homongi">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-purple-mofuku flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-emerald-mofuku flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                                <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-step-02 btn-v2-mofuku">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-set-content mofuku">
                                            <div class="title-set-content title-sub-slug-homongi bg-css-mofuku">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    <?php elseif($postName == 'kurotomesode') : ?>
                                        <!-- Kurotomesode -->
                                        <div class="wrap-slider-v2 wrap-slider-v2-irotomesode wrap-slider-irotomesode-first">
                                            <div class="slider-ranking wrap-slider-product slider-ranking-kurotomesode" id="slider-ranking">
                                                <?php
                                                $list_popular_products = get_field('slider_product_list_top');
                                                ?>
                                                <?php if ($list_popular_products) : ?>
                                                    <div class="wrap-list-formal-product">
                                                        <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end slider-->
                                        </div ><!--endwrap-slider-v2-->
                                        <div class="wrap-slider-v2 wrap-slider-v2-kurotomesode">
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/kurotomesode/list">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-irotomesode btn-v2-kurotomesode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
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
                                        <?php if(get_field('search_scene')): ?>
                                            <div class="wrap-search-scene-v2">
                                                <?php the_field('search_scene'); ?>
                                            </div >
                                        <?php endif; ?>
                                        <?php if($isSmartPhone) : ?>
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
                                        <?php if(get_field('visit_arrival')): ?>
                                            <div class="wrap-list-info-r6">
                                                <?php echo php_set_base_url(get_field('visit_arrival')); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="wrap-confidence wrap-confidence-kurotomesode">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
                                        <div class="wrap-shop-list-v2 wrap-shop-list-v2-kurotomesode">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">?????????????????????????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist wrap-shoplist-kurotomesode">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????20?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-04">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-irotomesode btn-v2-kurotomesode formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-knowledge wrap-knowledge-irotomesode">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=kurotomesode]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/tomesode">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <div class="wrap-review wrap-review-kurotomesode">
                                            <div class="intro">
                                                <div class="intro-bg"></div>
                                                <div class="intro-content">
                                                    <p>Thank you! message</p>
                                                    <h2 class="review-title">?????????????????????????????????<br class="sp">??????????????????????????????</h2>
                                                    <div class="wrap-line-v2 wrap-line-v2-other">
                                                        <div class="line-v2 line-v2-single"></div>
                                                    </div>
                                                </div>
                                                <div class="intro-bg last"></div>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                            </div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-kurotomesode">
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-review-->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-kurotomesode">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve kurotomesode">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-kurotomesode.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-kurotomesode">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-kurotomesode.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-kurotomesode">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
																<p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
																<p>????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-kurotomesode flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/preview" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-irotomesode btn-v2-kurotomesode formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-irotomesode.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-irotomesode.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-irotomesode">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi wrap-circle-link-irotomesode flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery">
                                                        <div class="title-flow-delivery title-sub-slug-kurotomesode">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-perple flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-dark-pink flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                                <p>1????????????1,000?????????tax??????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other btn-last-irotomesode flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-v2-irotomesode btn-v2-kurotomesode btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-set-content wrap-set-content-kurotomesode">
                                            <div class="title-set-content title-sub-slug-kurotomesode">???????????? ???</div>
                                            <?php if($isSmartPhone): ?>
                                                <?php if(get_field('set_content_sp')): ?>
                                                    <div class="wrap-set-content-sp">
                                                        <?php echo php_set_base_url(get_field('set_content_sp')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(get_field('set_content_pc')): ?>
                                                    <div class="wrap-set-content-pc">
                                                        <?php echo php_set_base_url(get_field('set_content_pc')); ?>
                                                    </div >
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div><!--end wrap-set-content-->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    <?php elseif($postName == 'kids-hakama') : ?>
                                        <!-- kids-hakama -->
                                        <?php
                                        $visit_arrival = get_field('visit_arrival');
                                        if ($visit_arrival) {
                                            echo do_shortcode(php_set_base_url($visit_arrival));
                                        }
                                        ?>
                                        <div class="wrap-slider-v2 wrap-slider-v2-irotomesode wrap-slider-irotomesode-first">
                                            <div class="slider-ranking wrap-slider-product slider-ranking-kids-hakama" id="slider-ranking">
                                                <?php
                                                $list_popular_products = get_field('slider_product_list_top');
                                                ?>
                                                <?php if ($list_popular_products) : ?>
                                                    <div class="wrap-list-formal-product">
                                                        <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end slider-->
                                        </div ><!--endwrap-slider-v2-->
                                        <div class="wrap-slider-v2">
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/kids-hakama/girl">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-irotomesode btn-v2-kids-hakama">
                                                    <div class="btn-v2-reserve formal-preview-popup-handle">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div ><!--endwrap-slider-v2-->
                                        <div class="wrap-slider-v2 wrap-slider-v2-irotomesode wrap-slider-irotomesode-first">
                                            <div class="slider-ranking wrap-slider-product slider-ranking-kids-hakama" id="slider-ranking">
                                                <?php
                                                $list_popular_products = get_field('slider_product_list_top_2');
                                                ?>
                                                <?php if ($list_popular_products) : ?>
                                                    <div class="wrap-list-formal-product">
                                                        <?php echo do_shortcode(php_set_base_url($list_popular_products)); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end slider-->
                                        </div ><!--endwrap-slider-v2-->
                                        <div class="wrap-slider-v2 wrap-slider-v2-kids-hakama">
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/formal/kids-hakama/boy">
                                                        <div class="text">
                                                            <span class="text-link">???????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="btn-v2 btn-v2-irotomesode btn-v2-kids-hakama">
                                                    <div class="btn-v2-reserve formal-preview-popup-handle">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-double"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div ><!--endwrap-slider-v2-->
                                        <?php if($isSmartPhone) : ?>
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
                                        <?php
                                        $search_scene = get_field('search_scene');
                                        if ($search_scene) {
                                            echo do_shortcode(php_set_base_url($search_scene));
                                        }
                                        ?>
                                        <?php if($isSmartPhone) : ?>
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
										<section class="section-faq">
											<div class="wrap-title">
												<p class="main-title">FAQ</p>
												<h2 class="sub-title">??????????????????</h2>
											</div>
											<div class="wrap-faq">
												<div class="faq-content">
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content"><p class="text-item-content">??????????????????????????? ?????????????????????????????? ??????????????????????????????????????????????????? ?????????????????????????????????????????? ?????????????????????????????????????????????T?????????????????????????????????????????????????????????????????????????????????????????????</p></div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content">
															<p class="text-item-content"><?php echo Yii::t('new-top-page-kimono-v3', '??????????????????????????????????????????????????????????????????????????????????????????????????????3??????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????????????????????????????????????????????????????????????????????????????<br/>?????????????????????2?????????????????????????????????????????????????????????<br/>??????????????????500???(??????)??????????????????<br/>?????????????????????????????????????????????????????????????????????????????????100???'); ?></p>
														</div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">??????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content"><p class="text-item-content">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<a href="<?php echo WP_HOME; ?>/kimono/hairset">?????????????????????????????????</a>????????????????????????</p></div>
													</div>
													<div class="box-faqs-item-container items">
														<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
															<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">????????????????????????????????????????????????</p>
																<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
															</div>
														</div>
														<div class="box-faqs-item-content"><p class="text-item-content">????????????????????????1??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<a href="<?php echo WP_HOME; ?>/howto">???????????????????????????</a>?????????????????????</p></div>
													</div>
												</div>
											</div>
										</section>
                                        <div class="wrap-shop-list-v2 wrap-shop-list-v2-kids-hakama">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">????????????</h2>
                                                    <span class="des-sm-title">Shop list</span>
                                                </div>
                                            </div>
                                            <div class="wrap-shoplist wrap-shoplist-kids-hakama">
                                                <div class="shoplist-intro">
                                                    <div class="shoplist-img">
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                        </div>
                                                        <div class="img">
                                                            <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-intro">
                                                        <p>?????????????????????wargo?????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????19?????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????</p>
                                                        <p><var>???</var>...????????????????????????????????????</p>
                                                    </div>
                                                </div>
                                                <div class="wrap-list-area">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">????????????????????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">???????????????</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">?????????????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">??????????????????</h3>
                                                            <ul class="list-shop">
                                                                <!--<li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">???????????????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">???????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">??????????????????</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
<!--                                                        <div class="list-item list-04">-->
<!--                                                            <h3 class="area-name">??????????????????</h3>-->
<!--                                                            <ul class="list-shop">-->
<!--                                                                <li>-->
<!--                                                                    <a href="--><?//= home_url(); ?><!--/access/okinawa-area/okinawa-naha">-->
<!--                                                                        <span class="shop-name">??????????????????</span>-->
<!--                                                                        <span class="arrow"></span>-->
<!--                                                                    </a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
<!--                                                        </div>-->
                                                    <?php else: ?>
                                                        <div class="left-list">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">????????????????????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <!--<li>
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">???????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">???????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>-->
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="right-list">
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">???????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">?????????????????????????????????</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">??????????????????</h3>
                                                                <ul class="list-shop">
                                                                    <li>
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                            <span class="shop-name">??????????????????</span>
                                                                            <span class="arrow mofuku"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div><!--end wrap-shop-list-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-v2-homongi btn-v2-irotomesode btn-v2-kids-hakama formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern"></div>
                                                        <div class="text">
                                                            <span class="text-link">?????????????????????????????????</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern last"></div>
                                                    </div>
                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!--end wrap-shop-list-v2-->
                                        <div class="wrap-howto-reserve wrap-howto-reserve-kids-hakama">
                                            <div class="wrap-title">
                                                <h2 class="title-howto-reserve">???????????????????????????</h2>
                                                <div class="wrap-line-v2">
                                                    <div class="line-v2 line-v2-single"></div>
                                                </div><!--end wrap-line-v2-->
                                            </div>
                                            <div class="wrap-content-howto-reserve kids-hakama">
                                                <div class="box-howto-reserve">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-kids-hakama.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-kids-hakama">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        </div><!--end group-icon-->
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-shop-kids-hakama.svg" alt="">
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-shop wrap-r-icon-homongi wrap-r-icon-kids-hakama">
                                                                    <p>?????????????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>?????????????????????wargo ??????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????</p>
                                                                <p><strong>?????????30??????????????????</strong>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="wrap-circle-link bg-shop wrap-circle-link-homongi wrap-circle-link-kids-hakama flexbox justify-content-center">
                                                            <a href="<?php echo WP_HOME ;?>/formal/howto" class="circle-link flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </a>
                                                        </div>
                                                    </div><!--end group-all-icon-text-->

                                                    <div class="wrap-btn-v2 flexbox">
                                                        <div class="btn-v2 btn-v2-homongi btn-v2-irotomesode btn-v2-kids-hakama formal-preview-popup-handle">
                                                            <div class="btn-v2-reserve">
                                                                <div class="pattern"></div>
                                                                <div class="text">
                                                                    <span class="text-link">?????????????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern last"></div>
                                                            </div>
                                                        </div>
                                                    </div><!--end wrap-btn-v2-->

                                                </div><!--end box-howto-reserve-->
                                                <div class="box-howto-reserve last">
                                                    <div class="wrap-all-group">
                                                        <?php if($isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-shichigosan.svg" alt="">
                                                                </div>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-kids-hakama">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            </div><!--end group-icon-->
                                                        <?php endif; ?>
                                                        <div class="group-all-icon-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="group-icon flexbox">
                                                                    <div class="wrap-l-icon">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-web-shichigosan.svg" alt="">
                                                                    </div>
                                                                </div><!--end group-icon-->
                                                            <?php endif; ?>
                                                            <div class="group-text">
                                                                <?php if(!$isSmartPhone) : ?>
                                                                    <div class="wrap-r-icon bg-web wrap-r-icon-homongi wrap-r-icon-kids-hakama">
                                                                        <p>WEB????????????</p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="para-text">
                                                                    <p>????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br/>???????????????????????????????????????????????????????????????</p>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo WP_HOME ;?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-homongi wrap-circle-link-kids-hakama flexbox justify-content-center">
                                                                <div class="circle-link flexbox justify-content-center align-items-center">
                                                                    <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                    <span class="arrow-r"></span>
                                                                </div>
                                                            </a>
                                                        </div><!--end group-all-icon-text-->
                                                    </div><!---end wrap-all-group-->
                                                    <div class="wrap-flow-delivery wrap-flow-delivery-kids-hakama">
                                                        <div class="title-flow-delivery title-sub-slug-homongi title-sub-slug-kids-hakama">???????????????????????????</div>
                                                        <div class="text-flow-deivery">
                                                            <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                            <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow">
                                                            <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                            <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                            <ul class="list-step-num list-step-num-homongi flexbox">
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-orange-kids-hakama flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">??????????????????</div>
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
                                                                    <div class="des-sm-circle">???????????? </div>
                                                                </li>
                                                                <li class="item-step-num">
                                                                    <div class="wrap-sm-circle">
                                                                        <div class="sm-circle bg-blue-shichigosan flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                    </div>
                                                                    <div class="des-sm-circle">????????????</div>
                                                                </li>
                                                            </ul><!--end list-step-num-->
                                                        </div><!--end group-step-flow-->

                                                        <div class="group-step-flow last">
                                                            <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                            <div class="des-group-step">
                                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                                <p>1????????????1,000?????????tax??????????????????????????????</p>
                                                            </div>
                                                        </div><!--end group-step-flow-->

                                                        <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                            <div class="btn-v2 btn-v2-02 btn-v2-irotomesode btn-v2-kids-hakama btn-step-02">
                                                                <a href="<?= home_url(); ?>/takuhai/howto">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                        <span class="icon-arrow-r-link"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>

                                                            </div>
                                                        </div><!--end wrap-btn-v2-->

                                                    </div><!--end wrap-flow-delivery-->

                                                </div><!--end box-howto-reserve-->
                                            </div><!--end wrap-content-howto-reserve-->
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-howto-reserve-->
                                        <div class="wrap-confidence wrap-confidence-kids-hakama">
                                            <div class="wrap-title-v2-other">
                                                <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                    <div class="wrap-text-title">
                                                        <h2 class="lbl-title">?????????????????????</h2>
                                                        <span class="des-sm-title">Reason for confidence</span>
                                                    </div>
                                                </div>
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" width="191" height="222" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div><!--end wrap-title-v2-other-->
                                            <div class="wrap-content-confidence">
                                                <div class="des-confidence">
                                                    <?php if($isSmartPhone) : ?>
                                                        <p class="text-confidence">?????????????????????wargo????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????</p>
                                                        <p class="text-confidence">????????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">??????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????????????????????????????????????????????????????????????????</p>
                                                        <p class="text-confidence">?????????</p>
                                                    <?php else: ?>
                                                        <p>?????????????????????wargo????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????????????????????????????</p>
                                                        <p>???????????????????????????????????????????????????</p>
                                                        <p>??????????????????????????????????????????????????????????????????????????????</p>
                                                    <?php endif; ?>


                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="right-pic-title">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <ul class="list-img-confidence flexbox">
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" width="544" height="332" alt="">
                                                    </li>
                                                    <li class="item-img-confidence">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" width="544" height="332" alt="">
                                                    </li>
                                                </ul>
                                                <div class="text-big-confidence">
                                                    <p>??????????????????????????? ?????????????????????</p>
                                                    <p class="yellow text-gold">????????????????????????????????????</p>
                                                </div>
                                                <div class="wrap-data-confidence">
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">??????????????????????????????????????????</div>
                                                        <div class="content-data-confidence text-gold">154,384<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????????</div>
                                                    </div>
                                                    <div class="data-confidence-01">
                                                        <div class="title-data-confidence">?????????</div>
                                                        <div class="content-data-confidence text-gold">89<small>???</small></div>
                                                        <div class="years-data-confidence">??? 2018????????? ???</div>
                                                    </div>
                                                </div>
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" width="300" height="37" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" width="300" height="61" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" width="300" height="42" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" width="300" height="84" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" width="300" height="26" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" width="300" height="85" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" width="300" height="63" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" width="300" height="120" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end-confidence">
                                                    <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                    <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                                </div>
                                            </div>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div><!--end wrap-line-v2-->
                                        </div><!--end wrap-confidence-->
                                        <div class="wrap-knowledge wrap-knowledge-kids-hakama">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">???????????????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=kids-hakama]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>???????????????????????????????????????</p>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/kids-hakama">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div><!--end wrap-btn-v2-->
                                        </div><!-- End wrap knowledge -->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    <?php endif ?>



                                </div><!--end padding-v2-->
                            </div><!--end right-column right-cate-list-v2-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php get_footer('formal'); ?>
<div id="wrap-formal-preview-popup"></div>
<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script>
    $(document).ready(function(){
        $('body').each(function(){
            $('.banner-top-v2').addClass('imagesLoaded');
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

        var shop_id = '<?php echo $shop_id; ?>';
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

        // MINH
        <?php if($postName != 'shichigosan' && $postName != 'homongi' && $postName != 'irotomesode' && $postName != 'kurotomesode' && $postName != 'kids-hakama'): ?>
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
        <?php endif; ?>


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
//        $('.wrap-slider-product .list').not('.slick-initialized').slick({
//            infinite: false,
//            slidesToShow: 4,
//            slidesToScroll: 4,
//            arrows: true,
//            lazyLoad: 'ondemand',
//            responsive: [{
//                breakpoint: 750,
//                settings: {
//                    slidesToShow: 2,
//                    slidesToScroll: 2
//                }
//            }]
//        });

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

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
    })
</script>



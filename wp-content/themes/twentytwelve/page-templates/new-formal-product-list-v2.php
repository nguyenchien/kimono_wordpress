<?php
/**
 * Template Name: New Formal Product List V2
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
    wp_register_style('takuhai-yukata-sp-style', get_template_directory_uri() . '/css/takuhai-yukata-sp.css', array('twentytwelve-style'), '20211013');
    wp_enqueue_style('takuhai-yukata-sp-style');
}else{
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-shop-formal-detail-v2-pc-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-pc-style');
    wp_register_style('formal-new-access-yukata-pc-style', get_template_directory_uri() . '/css/formal-new-access-yukata-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('formal-new-access-yukata-pc-style');
    wp_register_style('takuhai-yukata-pc-style', get_template_directory_uri() . '/css/takuhai-yukata-pc.css', array('twentytwelve-style'), '20211013');
    wp_enqueue_style('takuhai-yukata-pc-style');
}
$shop_id = get_field('shop_id');
?>
<link href=???https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap??? rel=???stylesheet???>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
<?php if($isSmartPhone):?>
    <style>
        .wrap-overlay-filter{
            display: none !important;
        }
    </style>
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2 breadcrumbs-tkh">', '</div>');
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
            <div class="banner-top-v2 <?= $postName; ?>">
                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/main-banner-top-takuhai-yukata-v3-sp.jpg">
            </div>
        <?php else: ?>
            <div class="banner-top-v2 <?= $postName; ?>">
                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/main-banner-top-takuhai-yukata-v3-pc.jpg">
            </div>
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
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCodeNewStyle(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
									}else if($postName == 'list'){
										echo FormalSidebarLeftCodeNewStyle(array());
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-cate-list-v2 right-new-shop-formal-v2 right-new-shop-formal-v2-yukata new-formal-takuhai-yukata">
                                <div class="padding-v2">
                                    <div class="wrap-intro-wargo-fm-v2 wrap-intro-wargo-fm-v2-tkh-yukata">
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

                                    <div class="wrap-sidebar-products-fm-v2 wrap-sidebar-products-fm-v2-tkh-yukata">
                                        <?php
                                        $slider_rental_delivery_sp = get_field('slider_rental_delivery_sp');
                                        $slider_rental_delivery_pc = get_field('slider_rental_delivery_pc');
                                        ?>
                                        <?php if($isSmartPhone) : ?>
                                            <?php if($slider_rental_delivery_sp):
                                                echo do_shortcode(php_set_base_url($slider_rental_delivery_sp));?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($slider_rental_delivery_pc): ?>
                                                <div class="wrap-tkh-yukata-products-pc">
                                                    <?php echo do_shortcode(php_set_base_url($slider_rental_delivery_pc));?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <?php
                                    $isPageTakuhaiYukata = is_page('takuhai/yukata');
                                    if($isPageTakuhaiYukata):?>
                                    <div class="section-banner-adv section-banner-ykt-contest takuhai-yukata row-padding">
                                        <a href="<?php echo WP_HOME; ?>/yukata-girl-contest">
                                            <?php if($isSmartPhone) :?>
                                                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/yukata-girl-contest-banner-SP.jpg" alt="">
                                            <?php else: ?>
                                                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/yukata-girl-contest-banner-PC.jpg" alt="">
                                            <?php endif; ?>
                                        </a>
                                    </div><!--end section-banner-ykt-contest-->
                                    <?php endif?>
                                    <?php
                                    $about_wargo = get_field('about_wargo');
                                    if ($about_wargo) {
                                        echo do_shortcode(php_set_base_url($about_wargo));
                                    }
                                    ?>

                                    <div class="wrap-howto-reserve wrap-howto-reserve-fm-v2 <?= $postName; ?>">
                                        <div class="wrap-title">
                                            <h2 class="title-howto-reserve">???????????????????????????</h2>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div>
                                        </div>
                                        <div class="wrap-content-howto-reserve tkh-yukata">
                                            <div class="box-howto-reserve">
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="group-icon flexbox">
                                                        <div class="wrap-l-icon">
                                                            <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-shop-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                        </div>
                                                        <div class="wrap-r-icon bg-shop wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                            <p>?????????????????????</p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="group-all-icon-text">
                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-shop-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="group-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                                <p>?????????????????????</p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="para-text">
	                                                        <p>?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
	                                                        <p>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
		                                                        ????????????30????????????????????????????????????????????????30?????????????????????????????????????????????????????????</p>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-circle-link bg-shop wrap-circle-link-takuhai-<?php echo $post->post_name;?> flexbox justify-content-center align-items-center">
                                                        <a href="<?=home_url()?>/howto" class="bg-l-blue circle-link flexbox justify-content-center align-items-center">
                                                            <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                            <span class="arrow-r"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <div class="btn-v2 bg-tkh-yukata">
                                                        <a href="/yukata/plan" class="btn-v2-reserve btn-step-01">
                                                            <div class="pattern tkh-yukata"></div>
                                                            <div class="text">
                                                                <span class="text-link">?????????????????????</span>
                                                                <span class="icon-arrow-r-link"></span>
                                                            </div>
                                                            <div class="pattern tkh-yukata last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-howto-reserve box-howto-reserve-takuhai-<?= $postName; ?> last">
                                                <div class="wrap-all-group">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-web-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-web wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                                <p>WEB????????????</p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-web-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                                    <p>WEB????????????</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>????????????????????????wargo????????????????????????????????????????????????</p>
                                                                <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                                <p>????????????????????????????????????????????????</p>
                                                                <p>???????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <a href="<?=home_url()?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-<?php echo $post->post_name;?> flexbox justify-content-center align-items-center">
                                                            <div class="circle-link bg-dark-blue flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">?????????????????????<br>??????????????????<br>?????????</p>
                                                                <span class="arrow-r"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-flow-delivery <?= $postName; ?>">
                                                    <div class="title-flow-delivery title-sub-slug-tkh-yukata">???????????????????????????</div>
                                                    <div class="text-flow-deivery">
                                                        <p>????????????????????????wargo??????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        <p>?????????2????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                    <div class="group-step-flow">
                                                        <div class="title-group-step"><span class="step-num">01</span><var></var>???????????????</div>
                                                        <div class="des-group-step"><p>??????????????????3???4????????????????????????2????????????????????????????????????</p></div>
                                                    </div>

                                                    <div class="group-step-flow">
                                                        <div class="title-group-step"><span class="step-num">02</span><var></var>??????????????????</div>
                                                        <div class="des-group-step des-group-step-other"><p>???????????????5???10????????????</p></div>
                                                        <ul class="list-step-num list-step-num-<?php echo $post->post_name;?> flexbox">
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-l-blue flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
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
                                                                    <div class="sm-circle bg-dark-blue flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                </div>
                                                                <div class="des-sm-circle">????????????</div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="group-step-flow last">
                                                        <div class="title-group-step"><span class="step-num">03</span><var></var>?????????????????????</div>
                                                        <div class="des-group-step">
                                                            <p>???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????</p>
                                                            <p>3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                        </div>
                                                    </div>

                                                    <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                        <div class="btn-v2 btn-v2-02 bg-tkh-yukata btn-step-01 bg-blue">
                                                            <a href="<?= home_url(); ?>/takuhai/howto">
                                                                <div class="pattern tkh-yukata"></div>
                                                                <div class="text">
                                                                    <span class="text-link">??????????????????????????????????????????????????????</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern tkh-yukata last"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrap-set-content wrap-set-content-fm-v2 tkh-yukata">
                                        <div class="title-set-content title-set-content-other-ginza">???????????????</div>
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

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <?php if($isSmartPhone) : ?>
                                        <?php
                                        $yukata_plan_group_sp = get_field('yukata_plan_group_sp');
                                        if ($yukata_plan_group_sp) {
                                            echo do_shortcode(php_set_base_url($yukata_plan_group_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $yukata_plan_group_pc = get_field('yukata_plan_group_pc');
                                        if ($yukata_plan_group_pc) {
                                            echo do_shortcode(php_set_base_url($yukata_plan_group_pc));
                                        }
                                        ?>
                                    <?php endif;?>
                                    <?php if(!$isPageTakuhaiYukata) : ?>
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
                                    <?php endif; ?>
                                    <?php
                                        $shop_list = get_field('shop_list');
                                        if ($shop_list) {
                                            echo do_shortcode(php_set_base_url($shop_list));
                                        }
                                    ?>

                                    <div class="section-column-spot row-padding">
                                        <div class="wrap-column-post wrap-column-post-top-page">
                                            <div class="title-column-top">
                                                <div class="wrap-main-title flexbox">
                                                    <div class="image image-left"><img data-src="<?php echo WP_HOME; ?>/images/takuhai/yukata-v2/title-column-top-left-tkh-yukata.svg" alt=""></div>
                                                    <h2 class="title-main">??????????????????</h2>
                                                    <div class="image image-right"><img data-src="<?php echo WP_HOME; ?>/images/takuhai/yukata-v2/title-column-top-right-tkh-yukata.svg" alt=""></div>
                                                </div>
                                                <p class="sub-title">???????????????????????????????????????</p>
                                            </div>
                                            <?php echo do_shortcode('[kimono_column_v2]'); ?>
                                        </div>
                                    </div>

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-confidence wrap-confidence-fm-v2 <?= $postName; ?>">
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
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="wrap-content-confidence">
                                            <div class="des-confidence">
                                                <?php if($isSmartPhone) : ?>
                                                    <p class="text-confidence">
                                                        ?????????????????????wargo????????????????????????????????????
                                                    </p>
                                                    <p class="text-confidence">
                                                        ?????????????????????????????????????????????????????????????????????
                                                    </p>
                                                    <p class="text-confidence">
                                                        ?????????????????????????????????????????????
                                                    </p>
                                                    <p class="text-confidence">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </p>
                                                    <p class="text-confidence">
                                                        ??????????????????????????????????????????????????????
                                                    </p>
                                                    <p class="text-confidence">
                                                        ?????????????????????????????????????????????????????????????????????
                                                    </p>
                                                    <p class="text-confidence">
                                                        ?????????
                                                    </p>
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
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" alt="">
                                                </li>
                                                <li class="item-img-confidence">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" alt="">
                                                </li>
                                                <li class="item-img-confidence">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" alt="">
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
                                                        <a href="<?= WP_HOME; ?>/"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-02">
                                                        <a href="https://www.wargo.jp/products/list86.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-03">
                                                        <a href="https://www.wargo.jp/products/list633.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-04">
                                                        <a href="https://www.wargo.jp/products/list939.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-05">
                                                        <a href="https://shop-list.wargo.jp/hashi-mansaku"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-06">
                                                        <a href="https://www.wargo.jp/products/list626.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-07">
                                                        <a href="https://www.wargo.jp/products/list85.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-08">
                                                        <a href="https://www.wargo.jp/products/list823.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-09">
                                                        <a href="https://www.wargo.jp/products/list718.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end-confidence">
                                                <p>??????????????????????????????????????????????????????????????????????????? <br>??????????????????????????????Total Creative Produce???</p>
                                                <p>????????????????????????????????????????????????????????????????????? <br>???????????????????????????????????????</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $section_intro_bottom = get_field('section_intro_bottom');
                                        if ($section_intro_bottom) {
                                            echo do_shortcode(php_set_base_url($section_intro_bottom));
                                        }
                                    ?>
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

        //Show more plan
        $('.plan-img').click(function(){
            var detail = $(this).next();
            detail.addClass('open');
        });
        $('.show-less').click(function(){
            $(this).closest('.plan-info').removeClass('open');
        });

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });

    })
</script>

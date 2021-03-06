<?php
/**
 * Template Name: New Formal Cate List Ceremony
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
    wp_register_style('new-formal-cate-list-ceremony-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-ceremony-sp.css', array('twentytwelve-style'), '20210125');
    wp_enqueue_style('new-formal-cate-list-ceremony-sp-style');
    wp_register_style('footer-formal-v2-sp-style', get_template_directory_uri() . '/css/footer-formal-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('footer-formal-v2-sp-style');
}else{
    wp_register_style('new-formal-cate-list-ceremony-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-ceremony-pc.css', array('twentytwelve-style'),'20210125');
    wp_enqueue_style('new-formal-cate-list-ceremony-pc-style');
    wp_register_style('footer-formal-v2-pc-style', get_template_directory_uri() . '/css/footer-formal-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('footer-formal-v2-pc-style');
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
    <?php
    $title_h1_pc = get_field('title_h1_pc');
    if ($title_h1_pc) {
        echo do_shortcode(php_set_base_url($title_h1_pc));
    }
    ?>
</div>
<?php if($isSmartPhone):?>
    <div class="container-box clearfix">
        <section class="banner-section">
            <div class="container-box">
                <div class="wrap-banner-top">
                    <ul class="list-banner-fm" id="list-banner-fm">
                        <li class="item">
                            <img src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/banner-ceremony-sp.jpg?ver=20210125" width="750" height="1000" alt="????????????????????? 16???????????????????????????????????? | ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????!">
                        </li>
                    </ul>
                </div>
            </div>
        </section>
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

                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <?php
                                        $des_list_cate_sp = get_field('des_list_cate_sp');
                                        if ($des_list_cate_sp) {
                                            echo do_shortcode(php_set_base_url($des_list_cate_sp));
                                        }
                                        ?>
                                        <?php
                                        $list_people_sp_01 = get_field('list_people_sp_01');
                                        if ($list_people_sp_01) {
                                            echo do_shortcode(php_set_base_url($list_people_sp_01));
                                        }
                                        ?>
                                        <?php
                                        $wedding_shiki_sp_01 = get_field('wedding_shiki_sp_01');
                                        if ($wedding_shiki_sp_01) {
                                            echo do_shortcode(php_set_base_url($wedding_shiki_sp_01));
                                        }
                                        ?>
                                        <?php
                                        $list_people_sp_02 = get_field('list_people_sp_02');
                                        if ($list_people_sp_02) {
                                            echo do_shortcode(php_set_base_url($list_people_sp_02));
                                        }
                                        ?>
                                        <section class="banner-checking-section">
                                            <?php
                                            $banner_checking_pc = get_field('banner_checking_pc');
                                            if ($banner_checking_pc) {
                                                echo do_shortcode(php_set_base_url($banner_checking_pc));
                                            }
                                            ?>
                                        </section>
                                        <?php
                                        $ranking_wedding = get_field('ranking_wedding');
                                        if ($ranking_wedding) {
                                            echo do_shortcode(php_set_base_url($ranking_wedding));
                                        }
                                        ?>
                                        <?php
                                        $ranking_wedding_02 = get_field('ranking_wedding_02');
                                        if ($ranking_wedding_02) {
                                            echo do_shortcode(php_set_base_url($ranking_wedding_02));
                                        }
                                        ?>
                                        <?php
                                        $special_event = get_field('special_event');
                                        if ($special_event) {
                                            echo do_shortcode(php_set_base_url($special_event));
                                        }
                                        ?>
                                        <section class="reason-point-section">
                                            <?php
                                            $reason_choose_sp = get_field('reason_choose_sp');
                                            if ($reason_choose_sp) {
                                                echo do_shortcode(php_set_base_url($reason_choose_sp));
                                            }
                                            ?>
                                        </section>
                                        <section class="shoplist-section">
                                            <?php
                                            $shop_list_sp = get_field('shop_list_sp');
                                            if ($shop_list_sp) {
                                                echo do_shortcode(php_set_base_url($shop_list_sp));
                                            }
                                            ?>
                                        </section>
                                        <section class="set-content-section">
                                            <?php
                                            $set_content_sp = get_field('set_content_sp');
                                            if ($set_content_sp) {
                                                echo do_shortcode(php_set_base_url($set_content_sp));
                                            }
                                            ?>
                                        </section>
                                        <section class="voice-section voice-section-homongi">
                                            <div class="title-checking review-title">
                                                <span class="icon"></span>
                                                <h2 class="text-title-checking">??????????????????????????????????????????????????????</h2>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal_v3]'); ?>
                                            </div>
                                            <div class="wrap-btn-v2 wrap-btn-review flexbox">
                                                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-homongi" class="btn-v2 btn-review">
                                                    <span class="icon"></span>
                                                    <div class="text">
                                                        <span class="text-link">????????????????????????????????????</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <section class="rental-section">
                                            <div class="wrap-content-rental">
                                                <div class="list-content flexbox">
                                                    <div class="item-content web-store">
                                                        <h3 class="title-item">WEB????????????</h3>
                                                        <div class="detail-item">
                                                            ????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
                                                            ???????????????????????????????????????????????????????????????
                                                        </div>
                                                        <div class="wrap-rental-flow">
                                                            <div class="wrap-title-delivery flexbox align-items-center justify-content-between">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-rental-delivery.svg" alt="">
                                                                </span>
                                                                <h4 class="title">???????????????????????????</h4>
                                                            </div>
                                                            <div class="group-step-flow">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">01</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">???????????????</h5>
                                                                </div>
                                                                <p class="desc-step desc-center">??????????????????3???4????????????????????????2????????????????????????????????????</p>
                                                            </div>
                                                            <div class="group-step-flow">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">02</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">??????????????????</h5>
                                                                </div>
                                                                <p class="desc-step desc-center">???????????????5???10????????????</p>
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
                                                                </ul>
                                                            </div>
                                                            <div class="group-step-flow last">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">03</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">?????????????????????</h5>
                                                                </div>
                                                                <p class="desc-step">???????????????????????????????????????????????????????????? 1????????????2,000???(+tax)???????????????????????????
                                                                    3??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                            </div>
                                                        </div>
                                                        <div class="group-btn">
                                                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                                                <a href="<?= home_url() ?>/formal/homongi/list" class="link-to">
                                                                    <span class="btn-icon">
                                                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                                                    </span>
                                                                    ????????????????????????????????????????????????
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="column-section">
                                            <div class="container-box">
                                                <div class="wrap-text-banner-checking">
                                                    <div class="title-checking">
                                                        <h2 class="text-title-checking">????????????????????????????????????</h2>
                                                    </div>
                                                </div>
                                                <div class="wrap-content-column">
                                                    <?php echo do_shortcode('[list_product_formal_from_column category=homongi]'); ?>
                                                </div>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <a href="javascrip:void(0)" class="btn-v2">
                                                        <div class="text">
                                                            <span class="text-link">??????????????????????????????</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="about-section">
                                            <div class="wrap-title-fm">
                                                <p class="main-title">ABOUT</p>
                                            </div>
                                            <div class="intro-title">
                                                ?????????????????????
                                            </div>
                                            <div class="detail-about">
                                                <p class="text-1">
                                                    ?????????????????????wargo???????????????????????????????????? <br>
                                                    ????????????????????????????????????????????????????????????????????? <br>
                                                    ?????????????????????????????????????????????
                                                </p>
                                                <p class="text-2">
                                                    ??????????????????????????????????????????????????????????????????????????? <br>
                                                    ????????????????????????????????????
                                                </p>
                                            </div>
                                            <div class="about-opera">
                                                ????????????????????????????????????????????????
                                            </div>
                                            <div class="name-company">
                                                <<??????????????????????????????>>
                                            </div>
                                            <div class="list-content-about flexbox">
                                                <div class="item-list">
                                                    <p class="title-header">
                                                        ??????????????????????????????????????????
                                                    </p>
                                                    <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-about-v3.svg" alt="">
                                                    <p class="data-number">
                                                        <var>154,384</var> ??? <br>???2018????????????
                                                    </p>
                                                </div>
                                                <div class="item-list">
                                                    <p class="title-header">
                                                        ?????????
                                                    </p>
                                                    <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-home-about-v3.svg" alt="">
                                                    <p class="data-number">
                                                        <var>89</var> ??? <br>???2018????????????
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="wrap-bottom-about-homongi pc">
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="des-intro-about">
                                                    ????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
                                                    Total Creative Produce????????????????????????????????????????????????????????????????????????<br>
                                                    ???????????????????????????????????????
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <section class="banner-section">
        <div class="container-box">
            <div class="wrap-banner-top">
                <ul class="list-banner-fm" id="list-banner-fm">
                    <li class="item">
                        <img src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/banner-ceremony-pc.jpg?ver=03022020" alt="????????????????????? 16???????????????????????????????????? | ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????!">
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container-box clearfix">
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
                                            echo FormalSidebarLeftCodeNewStyle(array());
                                        }else if($postName == 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array());
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
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
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) :?>
                                            <?php
                                            $list_people_sp_01 = get_field('list_people_sp_01');
                                            if ($list_people_sp_01) {
                                                echo do_shortcode(php_set_base_url($list_people_sp_01));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $list_people_pc_01 = get_field('list_people_pc_01');
                                            if ($list_people_pc_01) {
                                                echo do_shortcode(php_set_base_url($list_people_pc_01));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) :?>
                                            <?php
                                            $wedding_shiki_sp_01 = get_field('wedding_shiki_sp_01');
                                            if ($wedding_shiki_sp_01) {
                                                echo do_shortcode(php_set_base_url($wedding_shiki_sp_01));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $wedding_shiki_pc_01 = get_field('wedding_shiki_pc_01');
                                            if ($wedding_shiki_pc_01) {
                                                echo do_shortcode(php_set_base_url($wedding_shiki_pc_01));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) :?>
                                            <?php
                                            $list_people_sp_02 = get_field('list_people_sp_02');
                                            if ($list_people_sp_02) {
                                                echo do_shortcode(php_set_base_url($list_people_sp_02));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $list_people_pc_02 = get_field('list_people_pc_02');
                                            if ($list_people_pc_02) {
                                                echo do_shortcode(php_set_base_url($list_people_pc_02));
                                            }
                                            ?>
                                        <?php endif; ?>
                                        <section class="banner-checking-section">
                                            <?php
                                            $banner_checking_pc = get_field('banner_checking_pc');
                                            if ($banner_checking_pc) {
                                                echo do_shortcode(php_set_base_url($banner_checking_pc));
                                            }
                                            ?>
                                        </section>
                                        <?php
                                        $ranking_wedding = get_field('ranking_wedding');
                                        if ($ranking_wedding) {
                                            echo do_shortcode(php_set_base_url($ranking_wedding));
                                        }
                                        ?>
                                        <?php
                                        $ranking_wedding_02 = get_field('ranking_wedding_02');
                                        if ($ranking_wedding_02) {
                                            echo do_shortcode(php_set_base_url($ranking_wedding_02));
                                        }
                                        ?>
                                        <?php
                                        $special_event = get_field('special_event');
                                        if ($special_event) {
                                            echo do_shortcode(php_set_base_url($special_event));
                                        }
                                        ?>
                                        <section class="age-group-section">
                                            <div class="banner-header-general">
                                                <div class="wrap-title-fm">
                                                    <p class="sub-title">Age group</p>
                                                    <h2 class="main-title">??????????????????????????????</h2>
                                                </div>
                                            </div>
                                            <div class="des-title">
                                                ??????????????????-????????????????????????20????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
                                            </div>
                                            <div class="wrap-content-color">
                                                <ul class="list-item-content flexbox">
                                                    <li class="item-content">
                                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/img-age-for20s-pc.jpg?ver=09012020" alt="">
                                                    </li>
                                                    <li class="item-content">
                                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/img-age-for30s-pc.jpg?ver=09012020" alt="">
                                                    </li>
                                                    <li class="item-content">
                                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/img-age-for40s-pc.jpg?ver=09012020" alt="">
                                                    </li>
                                                    <li class="item-content">
                                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/img-age-for50s-pc.jpg?ver=09012020" alt="">
                                                    </li>
                                                </ul>
                                            </div>
                                        </section>
                                        <section class="set-content-section">
                                            <?php
                                            $set_content_pc = get_field('set_content_pc');
                                            if ($set_content_pc) {
                                                echo do_shortcode(php_set_base_url($set_content_pc));
                                            }
                                            ?>
                                        </section>

                                        <section class="reason-point-section">
                                            <?php
                                            $reason_choose_pc = get_field('reason_choose_pc');
                                            if ($reason_choose_pc) {
                                                echo do_shortcode(php_set_base_url($reason_choose_pc));
                                            }
                                            ?>
                                        </section>
                                        <section class="shoplist-section">
                                            <?php
                                            $shop_list_pc = get_field('shop_list_pc');
                                            if ($shop_list_pc) {
                                                echo do_shortcode(php_set_base_url($shop_list_pc));
                                            }
                                            ?>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="voice-section voice-section-homongi">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Voice</p>
                <h2 class="main-title">?????????????????????wargo?????????????????????????????????<br>????????????????????????????????????????????????</h2>
            </div>
            <div class="wrap-box-review">
                <?php echo do_shortcode('[customer_review_content_formal_v3]'); ?>
            </div><!--end wrap-box-review-->
            <div class="wrap-btn-v2 flexbox">
                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-ceremony" class="btn-v2 btn-review">
                    <span class="icon"></span>
                    <div class="text">
                        <span class="text-link">????????????????????????????????????</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="rental-section">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Rental</p>
                <h2 class="main-title">??????????????????????????????</h2>
            </div>
            <div class="wrap-content-rental">
                <div class="list-content flexbox">
                    <div class="item-content reservation-store">
                        <div class="detail item">
                            <h3 class="title-item">?????????????????????</h3>
                            <div class="detail-item">
                                ?????????????????????wargo ?????????????????????????????????????????????????????????????????????????????????????????????????????????
                                <br>
                                ?????????30????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
                            </div>
                        </div>
                        <div class="group-btn">
                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                <a href="<?= home_url() ?>/formal/howto" class="link-to">
                                    ???????????????????????????????????????
                                </a>
                            </div>
                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                <a href="javascrip:void(0)" class="link-to formal-preview-popup-handle">
                                    <span class="btn-icon">
                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-calendar-v3.svg" alt="">
                                    </span>
                                    ??????????????????????????????
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item-content web-store">
                        <div class="detail-item">
                            <h3 class="title-item">
                                WEB????????????
                            </h3>
                            <div class="detail-item">
                                ????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
                                <br>
                                ???????????????????????????????????????????????????????????????
                            </div>
                        </div>
                        <div class="group-btn">
                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                <a href="<?= home_url() ?>/takuhai/howto" class="link-to">
                                    ???????????????????????????????????????
                                </a>
                            </div>
                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                <a href="<?= home_url() ?>/formal/homongi/list" class="link-to">
                                    <span class="btn-icon">
                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                    </span>
                                    ????????????????????????????????????????????????
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="column-section">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Kimono Column</p>
                <h2 class="main-title">??????????????????????????????????????????????????????????????????</h2>
            </div>
            <div class="wrap-content-column">
                <?php echo do_shortcode('[list_product_formal_from_column category=ceremony]'); ?>
            </div>
            <div class="wrap-btn-link flexbox justify-content-center">
                <a href="<?= home_url() ?>/column/homongi" class="link-to">
                    ????????????????????????????????????
                </a>
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="container-box">
            <div class="box-content-about">
                <div class="wrap-title">
                    <p class="sub-title">ABOUT</p>
                    <h2 class="main-title">?????????????????????</h2>
                </div>
                <div class="detail-about">
                    <p class="text-1">
                        ?????????????????????wargo???????????????????????????????????? <br>
                        ????????????????????????????????????????????????????????????????????? <br>
                        ?????????????????????????????????????????????
                    </p>
                    <p class="text-2">
                        ??????????????????????????????????????????????????????????????????????????? <br>
                        ????????????????????????????????????
                    </p>
                </div>
                <div class="about-opera text-center">
                    ??????????????????????????? ?????????????????????
                </div>
                <div class="name-company text-center">
                    <<??????????????????????????????>>
                </div>
                <div class="list-content-about flexbox">
                    <div class="item-list">
                        <p class="title-header">
                            ??????????????????????????????????????????
                        </p>
                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-about-v3.svg" alt="">
                        <p class="data-number">
                            <var>154,384</var> ??? <br>???2018????????????
                        </p>
                    </div>
                    <div class="item-list">
                        <p class="title-header">
                            ?????????
                        </p>
                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-home-about-v3.svg" alt="">
                        <p class="data-number">
                            <var>89</var> ??? <br>???2018????????????
                        </p>
                    </div>
                </div>
                <div class="wrap-bottom-about-homongi">
                    <div class="wrap-logo-confidence">
                        <ul class="list-logo-confidence">
                            <li class="item-logo-confidence item-logo-confidence-01">
                                <a href="<?= WP_HOME; ?>/"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt="<?= Yii::t('formal_v2','?????????????????????????????????????????????????????? ?????????????????????wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-02">
                                <a href="https://www.wargo.jp/products/list86.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt="<?= Yii::t('formal_v2','????????????????????? ???????????????wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-03">
                                <a href="https://www.wargo.jp/products/list633.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt="<?= Yii::t('formal_v2','??????????????? ???????????????wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-04">
                                <a href="https://www.wargo.jp/products/list939.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt="<?= Yii::t('formal_v2','???????????????????????? ????????????')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-05">
                                <a href="https://shop-list.wargo.jp/hashi-mansaku"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt="<?= Yii::t('formal_v2','?????????????????? ?????????????????????')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-06">
                                <a href="https://www.wargo.jp/products/list626.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt="<?= Yii::t('formal_v2','??????????????????????????? ????????????????????????')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-07">
                                <a href="https://www.wargo.jp/products/list85.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt="<?= Yii::t('formal_v2','?????????????????????????????? ???????????????')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-08">
                                <a href="https://www.wargo.jp/products/list823.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt="<?= Yii::t('formal_v2','????????????????????????????????? ????????????wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-09">
                                <a href="https://www.wargo.jp/products/list718.html"><img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt="<?= Yii::t('formal_v2','??????????????? ????????????hiyori')?>"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="des-intro-about">
                        ??????????????????????????????????????????????????????????????????????????? ??????????????????????????????<br>
                        Total Creative Produce????????????????????????????????????????????????????????????????????????<br>
                        ???????????????????????????????????????
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_footer('formal'); ?>
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

        //Top banner slider
        /* setTimeout(function(){
            $('#list-banner-fm').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                centerMode: true,
                centerPadding: '20%',
                responsive: [
                    {
                        breakpoint: 1600,
                        settings: {
                            centerPadding: '10%',
                        }
                    },
                    {
                        breakpoint: 750,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: false
                        }
                    }
                ]
            });
        }, 2000); */

        /* Slick slider product  */
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

        //Toggle sidebar
		$('[data-sub-shop]').click(function(){
			var self    = this;
			var target  = $(self).data('sub-shop');
			var $other  = $('[data-sub-shop="'+target+'"]');
			if(target){
				$other.each(function(index, el){
					if(el !== self){
						$(el).siblings(target).slideUp();
						$(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
					}else{
						$(self).siblings(target).slideToggle();
						$(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
					}
				});
			}
		});
		$('[data-collapse-cate]').click(function(){
			var self    = this;
			var target  = $(self).data('collapse-cate');
			var $other  = $('[data-collapse-cate="'+target+'"]');
			if(target){
				$other.each(function(index, el){
					if(el === self){
						$(self).siblings(target).slideToggle();
						$(self).parent().toggleClass('active');
						$(self).toggleClass('active');
					}
				});
			}
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

        //Toggle reason point
        <?php if($isSmartPhone) : ?>
        $('.list-reason .item-reason .title-item-reason').click(function(){
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
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

        //Toggle shop list
        $('.search-list').click(function(){
            $(this).toggleClass('active');
            $(this).closest('.area-item').find('.list-shop').slideToggle('fast');
        })
    })
</script>



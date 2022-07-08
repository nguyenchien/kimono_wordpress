<?php
/**
 * Template Name: New Formal Ceremony
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
if($language == 'ja'){get_header('formal');}
else{ get_header('new-kimono');}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
if($isSmartPhone){
//    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-shop-formal-detail-v2-sp-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-sp-style');
    wp_register_style('new-formal-cate-list-ceremony-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-ceremony-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-ceremony-sp-style');
//    wp_register_style('new-formal-wedding-v2-sp-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-formal-wedding-v2-sp.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-formal-wedding-v2-sp-style'.$cssLanguage);
}else{
//    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
//    wp_register_style('new-shop-formal-detail-v2-pc-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-pc.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-shop-formal-detail-v2-pc-style');
    wp_register_style('new-formal-cate-list-ceremony-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-ceremony-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-ceremony-pc-style');
//    wp_register_style('new-formal-wedding-v2-pc-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-formal-wedding-v2-pc.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-formal-wedding-v2-pc-style'.$cssLanguage);
}

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
<?php if($isSmartPhone):?>
    <div class="container-box clearfix">
        <section class="banner-section">
            <div class="container-box">
                <div class="wrap-banner-top">
                    <ul class="list-banner-fm" id="list-banner-fm">
                        <li class="item">
                            <img src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/banner-ceremony-new-sp.jpg?ver=20220207" width="750" height="1000" alt="訪問着レンタル 16点フルセット・着付け込み | 結婚式・入学式・卒業式・お宮参り・七五三・お茶会・パーティーに安心のフルセット!">
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
                                                <h2 class="text-title-checking">訪問着をご利用いただいたお客様のお声</h2>
                                            </div>
                                            <div class="wrap-box-review">
                                                <?php echo do_shortcode('[customer_review_content_formal_v3]'); ?>
                                            </div>
                                            <div class="wrap-btn-v2 wrap-btn-review flexbox">
                                                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-homongi" class="btn-v2 btn-review">
                                                    <span class="icon"></span>
                                                    <div class="text">
                                                        <span class="text-link">すべてのお客様の声を見る</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <section class="rental-section">
                                            <div class="wrap-content-rental">
                                                <div class="list-content flexbox">
                                                    <div class="item-content web-store">
                                                        <h3 class="title-item">WEBでご予約</h3>
                                                        <div class="detail-item">
                                                            宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただくことが可能です。スマートフォン・パソコンからご予約いただけます。<br>
                                                            お申し込みにはクレジットカードが必要です。
                                                        </div>
                                                        <div class="wrap-rental-flow">
                                                            <div class="wrap-title-delivery flexbox align-items-center justify-content-between">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-rental-delivery.svg" alt="">
                                                                </span>
                                                                <h4 class="title">宅配レンタルの流れ</h4>
                                                            </div>
                                                            <div class="group-step-flow">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">01</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">お届け日程</h5>
                                                                </div>
                                                                <p class="desc-step desc-center">お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p>
                                                            </div>
                                                            <div class="group-step-flow">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">02</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">お届け日の例</h5>
                                                                </div>
                                                                <p class="desc-step desc-center">ご利用日が5月10日の場合</p>
                                                                <ul class="list-step-num list-step-num-homongi flexbox">
                                                                    <li class="item-step-num">
                                                                        <div class="wrap-sm-circle">
                                                                            <div class="sm-circle bg-orange-homongi flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
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
                                                                            <div class="sm-circle bg-emerald flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                        </div>
                                                                        <div class="des-sm-circle">ご返送日</div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="group-step-flow last">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">03</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">レンタルの延長</h5>
                                                                </div>
                                                                <p class="desc-step">お貸出期間のご延長をご希望の場合の料金は 1日につき2,000円(+tax)となっております。
                                                                    3日以上延泊をご希望のお客様は別途お問い合わせフォームよりご連絡くださいませ。</p>
                                                            </div>
                                                        </div>
                                                        <div class="group-btn">
                                                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                                                <a href="<?= home_url() ?>/formal/homongi/list" class="link-to">
                                                                    <span class="btn-icon">
                                                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                                                    </span>
                                                                    宅配レンタルの訪問着一覧はこちら
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
                                                        <h2 class="text-title-checking">訪問着についての基本知識</h2>
                                                    </div>
                                                </div>
                                                <div class="wrap-content-column">
                                                    <?php echo do_shortcode('[list_product_formal_from_column category=homongi]'); ?>
                                                </div>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <a href="javascrip:void(0)" class="btn-v2">
                                                        <div class="text">
                                                            <span class="text-link">その他のコラムを見る</span>
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
                                                私たちについて
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
                                            <div class="about-opera">
                                                運営会社「株式会社和心」について
                                            </div>
                                            <div class="name-company">
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
                                            <div class="wrap-bottom-about-homongi pc">
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
                        <img src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/banner-ceremony-new-pc.jpg?ver=20220207" alt="訪問着レンタル 16点フルセット・着付け込み | 結婚式・入学式・卒業式・お宮参り・七五三・お茶会・パーティーに安心のフルセット!">
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
                                                    <h2 class="main-title">年代別で訪問着を探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title">
                                                訪問着は既婚-独身に関係なく、20代から高齢者まで、さまざまな年齢の女性が対象となる着物であり、留袖の次に格式の高い着物になります。ここではわかりやすく皆様の年代別で商品が検索できます！
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
                <h2 class="main-title">きものレンタルwargoをご利用いただいたお客様の<br>お声になりますのでご参考下さい。</h2>
            </div>
            <div class="wrap-box-review">
                <?php echo do_shortcode('[customer_review_content_formal_v3]'); ?>
            </div><!--end wrap-box-review-->
            <div class="wrap-btn-v2 flexbox">
                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-homongi" class="btn-v2 btn-review">
                    <span class="icon"></span>
                    <div class="text">
                        <span class="text-link">すべてのお客様の声を見る</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="rental-section">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Rental</p>
                <h2 class="main-title">レンタルのご予約方法</h2>
            </div>
            <div class="wrap-content-rental">
                <div class="list-content flexbox">
                    <div class="item-content reservation-store">
                        <div class="detail item">
                            <h3 class="title-item">ご来店でご予約</h3>
                            <div class="detail-item">
                                きものレンタルwargo フォーマル着物取扱店舗では下見およびご来店でのご予約も承っております。
                                <br>
                                下見（30分まで無料）をご予約いただき、お着物を選んでいただいた上で、配送のご予約をいただくことが可能です。店頭での現金払い、クレジットカード払いも選択していただけます。
                            </div>
                        </div>
                        <div class="group-btn">
                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                <a href="<?= home_url() ?>/formal/howto" class="link-to">
                                    来店レンタルの流れはこちら
                                </a>
                            </div>
                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                <a href="javascrip:void(0)" class="link-to formal-preview-popup-handle">
                                    <span class="btn-icon">
                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-calendar-v3.svg" alt="">
                                    </span>
                                    下見の来店予約をする
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item-content web-store">
                        <div class="detail-item">
                            <h3 class="title-item">
                                WEBでご予約
                            </h3>
                            <div class="detail-item">
                                宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただくことが可能です。スマートフォン・パソコンからご予約いただけます。
                                <br>
                                お申し込みにはクレジットカードが必要です。
                            </div>
                        </div>
                        <div class="group-btn">
                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                <a href="<?= home_url() ?>/takuhai/howto" class="link-to">
                                    宅配レンタルの流れはこちら
                                </a>
                            </div>
                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                <a href="<?= home_url() ?>/formal/homongi/list" class="link-to">
                                    <span class="btn-icon">
                                        <img src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                    </span>
                                    宅配レンタルの訪問着一覧はこちら
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
                <h2 class="main-title">入学式・卒業式に来ていく着物に役立つ基礎知識</h2>
            </div>
            <div class="wrap-content-column">
                <?php echo do_shortcode('[list_product_formal_from_column category=ceremony]'); ?>
            </div>
            <div class="wrap-btn-link flexbox justify-content-center">
                <a href="<?= home_url() ?>/column/homongi" class="link-to">
                    もっと着物のコラムを読む
                </a>
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
                    運営会社「株式会社 和心」について
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
                <div class="wrap-bottom-about-homongi">
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
                        「日本のカルチャーを世界へ」をキャッチフレーズに、 古くて新しい和の心を<br>
                        Total Creative Produceし世界に誇るべき日本の伝統文化の楽しい発信基地と<br>
                        なることを目指しています。
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

        //Toggle shop list
        $('.search-list').click(function(){
            $(this).toggleClass('active');
            $(this).closest('.area-item').find('.list-shop').slideToggle('fast');
        })
    })
</script>

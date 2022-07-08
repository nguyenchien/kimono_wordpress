<?php
/**
 * Template Name: Yukata page v2
 */
global $post;
global $is_yukata;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
get_header('new-kimono');

wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
wp_register_style('new-kimono-popup', get_template_directory_uri() . '/css/new-kimono-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-popup');
wp_register_style('new-formal-product-cart', get_template_directory_uri() . '/css/new-formal-product-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-cart');
wp_register_style('new-kimono-reserve-cart', get_template_directory_uri() . '/css/new-kimono-reserve-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-reserve-cart');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js');
if ($isSmartPhone) {
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_register_style('yukata-page-v2-sp-style', get_template_directory_uri() . '/css/yukata-page-v2-sp.css', array('twentytwelve-style'),'20200606');
    wp_enqueue_style('yukata-page-v2-sp-style');
} else {
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_register_style('yukata-page-v2-pc-style', get_template_directory_uri() . '/css/yukata-page-v2-pc.css', array('twentytwelve-style'), '20200606');
    wp_enqueue_style('yukata-page-v2-pc-style');
}

if($language != "ja"){
    wp_register_style('new-kimono-popup'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-popup'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup'.$cssLanguage);
    wp_register_style('new-kimono-reserve-cart'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-reserve-cart'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-reserve-cart'.$cssLanguage);
}

$SEX_AGE_TYPE = array(
    'women' => 1, // Women's kimono
    'men' => 2, // Men's kimono
    'kids' => 3, // Kids kimono
    'couple' => 4 // Couple kimono
);
$SHOP_FILTER = MasterValues::normalShopList();
$planShopList = MasterValues::planShopList();
$isYukataChildrenPage = is_page('yukata/plan/children');

// Meta data for yukata plan
$meta_plans_yukata = array(
    12 => array(
        'id' => 'Standard-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_12'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_12'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_12'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_12'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_12'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
//    13 => array(
//        'id' => 'Premium-Yukata',
//        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_13'),
//        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_13'),
//        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_13'),
//        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_13'),
//        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_13'),
//        'sex_age_type' => 1,
//        'female_allow' => 1,
//        'male_allow' => 0,
//    ),
    14 => array(
        'id' => 'High-end-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_14'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_14'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_14'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_14'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_14'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    15 => array(
        'id' => 'Mamechiyo-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_15'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_15'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_15'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_15'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_15'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    79 => array(
        'id' => 'Brand-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_79'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_79'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_79'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_79'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_79'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    244 => array(
        'id' => 'Bingata-Kimono',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_244'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_244'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_244'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_244'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_244'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
//    16 => array(
//        'id' => 'Summer-Kimono',
//        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_16'),
//        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_16'),
//        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_16'),
//        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_16'),
//        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_16'),
//        'sex_age_type' => 1,
//        'female_allow' => 1,
//        'male_allow' => 0,
//    ),
    18 => array( // Form Men
        'id' => 'Men-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_18'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_18'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_18'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_18'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_18'),
        'sex_age_type' => 2,
        'female_allow' => 0,
        'male_allow' => 1,
    ),
    17 => array( // For Children
        'id' => 'Girl-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_17'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_17'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_17'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_17'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_17'),
        'sex_age_type' => 3,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    //For Couple
    20 => array(
        'id' => 'Couple-Standard-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_20'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_20'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_20'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_20'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_20'),
        'sex_age_type' => 4,
        'female_allow' => 1,
        'male_allow' => 1,
    ),
//    21 => array(
//        'id' => 'Couple-Premium-Yukata',
//        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_21'),
//        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_21'),
//        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_21'),
//        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_21'),
//        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_21'),
//        'sex_age_type' => 4,
//        'female_allow' => 1,
//        'male_allow' => 1,
//    ),
    22 => array(
        'id' => 'Couple-High-end-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_22'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_22'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_22'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_22'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_22'),
        'sex_age_type' => 4,
        'female_allow' => 1,
        'male_allow' => 1,
    ),
    23 => array(
        'id' => 'Couple-Mamechiyo-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_23'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_23'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_23'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_23'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_23'),
        'sex_age_type' => 4,
        'female_allow' => 1,
        'male_allow' => 1,
    ),
);

?>
<script>
    var JQLBSettings = {"fitToScreen":"1","resizeSpeed":"300","displayDownloadLink":"0","navbarOnTop":"0","loopImages":"","resizeCenter":"","marginSize":"0","linkTarget":"_self","help":"","prevLinkTitle":"\u524d\u306e\u753b\u50cf","nextLinkTitle":"\u6b21\u306e\u753b\u50cf","prevLinkText":"\u00ab \u524d\u3078","nextLinkText":"\u6b21\u3078 \u00bb","closeTitle":"\u30ae\u30e3\u30e9\u30ea\u30fc\u3092\u9589\u3058\u308b","image":"\u753b\u50cf ","of":"\u306e","download":"\u30c0\u30a6\u30f3\u30ed\u30fc\u30c9"};
    var KimonoMessage = <?php echo json_encode(JsResources::jsMessage('booking_msg')); ?>;
</script>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2 wrap-content-yukata-plan-v2">
            <div class="container-box">
                <?php
                if ($isSmartPhone) {
                    if ( get_field('title_h1_page_sp') ) {
                        echo get_field('title_h1_page_sp');
                    }
                } else {
                    if ( get_field('title_h1_page_pc') ) {
                        echo get_field('title_h1_page_pc');
                    }
                }
                ?>
                <div class="wrap-main-banner-yukata-page-v2">
                    <?php if($isSmartPhone) : ?>
                        <div class="main-banner-yukata-page-v2" id="yukata-plan-slider">
                            <a href="#">
                                <img alt="京都で浴⾐レンタル2,900円〜｜着物レンタルwargoは京都で7店舗" src="<?= WP_HOME; ?>/images/new-yukata/new_yukata_rental_plan_banner_800_800_SP">
                            </a>
                            <a href="<?= home_url() ?>/lesson/online_lesson">
                                <img src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/06/banner-lesson-sp-yukata.jpg">
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="main-banner-yukata-page-v2" id="yukata-plan-slider">
                            <a href="#">
                                <img alt="京都で浴⾐レンタル2,900円〜｜着物レンタルwargoは京都で7店舗" src="<?= WP_HOME; ?>/images/new-yukata/new-banner-plan-top-yukata-pc.jpg">
                            </a>
                            <a href="<?= home_url() ?>/lesson/online_lesson">
                                <img src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/06/banner-lesson-pc-min.jpg">
                            </a>
                        </div>
                    <?php endif; ?>
                </div><!--end wrap-main-baner-yukata-page-v2-->
                <div class="wrap-shop-list-yukata-page-v2">
                    <?php
                    $shop_list = get_field('shop_list');
                    if ($shop_list) {
                        echo do_shortcode(php_set_base_url($shop_list));
                    }
                    ?>
                </div><!--end wrap-shop-list-yukata-page-v2-->
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php get_sidebar('top-page-left-v3') ?>
                            </div>

                            <div class="right-column right-column-list right-column-list-new-kimono right-column-list-yukata-plan">
                                <div class="padding-v2 padding-yukata-v2">
                                    <div class="wrap-yukata-page-v2 wrap-new-plan-list">

<!--                                        <div class="section-banner-adv section-banner-ykt-contest yukata-plan row-padding">-->
<!--                                            <a href="--><?php //echo WP_HOME; ?><!--/yukata-girl-contest">-->
<!--                                                --><?php //if($isSmartPhone) :?>
<!--                                                    <img data-src="--><?php //echo WP_HOME; ?><!--/images/new-kimono-v2/yukata-girl-contest-banner-SP.jpg" alt="">-->
<!--                                                --><?php //else: ?>
<!--                                                    <img data-src="--><?php //echo WP_HOME; ?><!--/images/new-kimono-v2/yukata-girl-contest-banner-PC.jpg" alt="">-->
<!--                                                --><?php //endif; ?>
<!--                                            </a>-->
<!--                                        </div><!--end section-banner-ykt-contest-->

                                        <div class="section-list-image row-padding">
                                            <ul class="list-img flexbox">
                                                <li class="item-img">
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/machigi03_kyototower-4.png" alt="京都浴衣レンタルwargo 店舗イメージ1">
                                                </li>
                                                <li class="item-img">
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/machigi03_kyototower-1.png" alt="京都浴衣レンタルwargo 店舗イメージ2">
                                                </li>
                                                <li class="item-img">
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/machigi03_Gionshijo-4.png" alt="京都浴衣レンタルwargo 店舗イメージ3">
                                                </li>
                                                <li class="item-img">
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/machigi03_Gionshijo-2.png" alt="京都浴衣レンタルwargo 店舗イメージ4">
                                                </li>
                                            </ul>
                                        </div>

                                        <?php
                                        $intro_yukata_plan = get_field('intro_yukata_plan');
                                        if ($intro_yukata_plan) {
                                            echo do_shortcode(php_set_base_url($intro_yukata_plan));
                                        }
                                        ?>

                                        <?php
                                        if ($isSmartPhone) {
                                            $top_yukata_plan_list_sp = get_field('top_yukata_plan_list_sp');
                                            if ($top_yukata_plan_list_sp) {
                                                echo do_shortcode(php_set_base_url($top_yukata_plan_list_sp));
                                            }
                                        } else {
                                            $top_yukata_plan_list_pc = get_field('top_yukata_plan_list_pc');
                                            if ($top_yukata_plan_list_pc) {
                                                echo do_shortcode(php_set_base_url($top_yukata_plan_list_pc));
                                            }
                                        }
                                        ?>

                                        <div class="wrap-filter-widget-yukata-plan">
                                            <div class="wrap-new-title-filter-wg-pl">
                                                <h2 class="new-title-filter-wg-pl title-pickup-yukata">浴衣レンタルプラン一覧</h2>
                                            </div>
                                            <div class="wrap-box-filter-wg-pl-v2">
                                                <div class="sub-title-filter-wg-pl">絞り込み検索</div>
                                                <ul class="list-filter-wg-pl-v2 flexbox">
                                                    <?php foreach ($SEX_AGE_TYPE as $name => $type){ ?>
                                                        <li class="item-filter-wg-pl-v2 item-sex-age-type flexbox">
                                                            <input style="display: none" type="checkbox" id="sex_age_type_<?= $type ?>" name="sex_age_type" data-sex-age-type="<?= $type ?>" class="item-sex-age-type-filter hidden" <?php echo $isYukataChildrenPage && $type == 3 ? 'checked': ''?>>
                                                            <label class="sm-title-filter-v2" for="sex_age_type_<?= $type ?>"><?= Yii::t("new-kimono-pl","filter_".$name."_yukata") ?></label>
                                                        </li>
                                                    <?php } ?>
                                                    <li class="item-filter-wg-pl-v2 other-filter flexbox">
                                                        <div class="wrap-search-wg-pl flexbox">
                                                            <select name="shop_plan" class="sl-search-shop">
                                                                <option value="0"><?= Yii::t("new-kimono-pl",'店舗') ?></option>
                                                                <?php foreach ($SHOP_FILTER as $shopId => $nameShop) { ?>
                                                                    <option value="<?=$shopId?>"><?= Yii::t("new-kimono-pl",$nameShop) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!--================== if smartphone is show, if PC is hide ======================-->
                                                <?php if($isSmartPhone):?>
                                                    <ul class="list-filter-wg-pl-v2 filter-plan-shop-sp flexbox" style="display: none; position: fixed; top: 67px; z-index: 2; background-color:#e8e8e8;">
                                                        <li class="item-filter-wg-pl-v2 other-filter-sp flexbox">
                                                            <div class="wrap-search-wg-pl-sp flexbox">
                                                                <select id="check-select-plan" name="plan_type" class="sl-search-shop plan-search">
                                                                    <option value="0"><?= Yii::t("new-kimono-pl",'プラン') ?></option>
                                                                    <?php foreach ($SEX_AGE_TYPE as $name => $type) { ?>
                                                                        <option value="<?=$type?>"><?= Yii::t("new-kimono-pl","filter_".$name."_yukata") ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li class="item-filter-wg-pl-v2 other-filter-sp flexbox">
                                                            <div class="wrap-search-wg-pl-sp flexbox">
                                                                <select name="shop_plan" class="sl-search-shop shop-search">
                                                                    <option value="0"><?= Yii::t("new-kimono-pl",'店舗') ?></option>
                                                                    <?php foreach ($SHOP_FILTER as $shopId => $nameShop) { ?>
                                                                        <option value="<?=$shopId?>"><?= Yii::t("new-kimono-pl",$nameShop) ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php endif?>
                                                <!--=============================================================================-->

                                            </div>
                                        </div><!-- End wrap-filter-widget-yukata-plan-->

                                        <?php
                                        $i = 0;
                                        foreach ($meta_plans_yukata as $plan_id => $plan_info) {
                                            $i++;

                                            // Plan Couple
                                            $list_plans_couple = array(20, 21, 22, 23);

                                            // Get plan shop list
                                            $shopsOfRegion = array();
                                            foreach (MasterValues::$SHOPS_OF_REGION as $regionId => $shopIds){
                                                if(!empty($shopIds)){
                                                    foreach ($planShopList[$plan_id] as $shopId){
                                                        if(in_array($shopId,$shopIds)){
                                                            $shopsOfRegion[$regionId][] = $shopId;
                                                        }
                                                    }
                                                }
                                            }

                                            //Main image plan
                                            $main_image_plan = '<img data-src="'.WP_HOME.'/images/new-yukata/main-image-yukata-plan-'.$plan_id.'.jpg?ver= '. time().'" alt="'.$plan_info['name'].'">';

                                            ?>
                                            <div id="<?= $plan_info['id']; ?>" class="wrap-new-list-plan-wg-v2 list-plan-filter group-plan-yukata-<?= $plan_id; ?>" data-plan-id="<?= $plan_id; ?>" data-sex-age="<?= $plan_info['sex_age_type']; ?>" data-list-shop="<?= implode(",",$planShopList[$plan_id]); ?>" data-plan-name="<?= $plan_info['name']; ?>">
                                                <div class="wrap-title-yukata-plan-v2 flexbox">
                                                    <span class="icon-title-yukata-v2 icon icon-prize"> <img class="img-icon-title-v2" src="<?= WP_HOME; ?>/images/new-yukata/icon-title-yukata-plan-v2.svg" alt=""></span>
                                                    <h3 class="new-sub-title-list-v2">
                                                        <span class="new-text-title-general-v2"><?= $plan_info['name']; ?></span>
                                                    </h3>
                                                </div>
                                                <div class="group-wrap-plan-yukata-v2">
                                                    <div class="wrap-info-items-plan-v2 flexbox">
                                                        <div class="wrap-info-image-v2">
                                                            <div class="new-pic-info-slide"><?= $main_image_plan; ?></div>
                                                        </div>
                                                        <div class="wrap-info-des-plan-v2">
                                                            <div class="title-describe-yukata-plan-v2"><?= $plan_info['brief']; ?></div>
                                                            <div class="wrap-new-web-price-info-v2">
                                                                <div class="wg-webpirce-box-new-v2 flexbox">
                                                                    <div class="new-box-webprice-v2">
                                                                        <p class="web title-new-box-v2">web</p>
                                                                        <p class="bt-text title-new-box-v2">
                                                                            <span class="lg-text">決済で</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="new-box-price-v2">
                                                                        <p class="sm-price">¥<?= $plan_info['price']; ?>- ↓</p>
                                                                        <p class="lg-pirce">¥<?= $plan_info['web_price']; ?>-</p>
                                                                    </div>
                                                                </div>
                                                                <div class="wrap-des-bottom-price">
                                                                    <div class="sub-des">すべてセッ ト追加料金一切不要。着付け代・小物代を含みます。</div>
                                                                    <?php if ($plan_id == 12) { ?>
                                                                        <div class="title-more-describe-plan">
                                                                            <span class="item-title-bg-v2">迷ったらこのプラン！</span>
                                                                            <span class="item-title-bg-v2 other-style"> 店舗でプラン変更可能！</span>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-des-describe-new-yukata-plan"><?= $plan_info['description']; ?></div>
<?php if ($plan_id != 244) : ?>
						<div class="list-gallery-for-yukata-plan">
                                                        <div class="title-list-gallery-yukata"><span class="text-sub-line">お客様ギャラリー</span></div>
                                                        <div class="plan-gallery kimono-gallery">
                                                            <?= do_shortcode('[gallery_for_plan_yukata plan_type_id="'.$plan_id.'" plan_type_name="'.$plan_info['name'].'"]'); ?>
							</div>
<?php endif; ?>
                                                    </div>
                                                    <div class="wrap-new-yukata-choose-sl-wg flexbox">
                                                        <div class="wraper-sl-yukata-v2 flexbox">
                                                            <div class="box-sl-choose-people-yukata-v2 flexbox">
                                                                <div class="wraper-sl-choose-pepple-yukata-plan flexbox">
                                                                    <?php if ($plan_id == 17) { // For Children ?>
                                                                        <div class="wraper-sl-children-yukata wraper-sl wraper-sl-g-b flexbox">
                                                                            <!-- For Girl -->
                                                                            <div class="wrap-select flexbox">
                                                                                <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".$plan_id) ?></div>
                                                                                <div class="wraper-sl-choose-pepple wraper-sl-choose-pepple-yukata-plan flexbox">
                                                                                    <select class="sl-choose-people-yukata-v2 list_plans" data-plan_type_id="<?=$plan_id?>" data-female-allow="1" data-male-allow="0">
                                                                                        <?php
                                                                                        for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                                            $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                                            ?>
                                                                                            <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                                        <?php }?>
                                                                                    </select>
                                                                                    <div class="name-sl-people name-sl-people-yukata-v2 flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- For Boy -->
                                                                            <div class="wrap-select flexbox">
                                                                                <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_19"); ?></div>
                                                                                <div class="wraper-sl-choose-pepple wraper-sl-choose-pepple-yukata-plan flexbox">
                                                                                    <select class="sl-choose-people-yukata-v2 list_plans" data-plan_type_id="19" data-female-allow="0" data-male-allow="1">
                                                                                        <?php
                                                                                        for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                                            $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                                            ?>
                                                                                            <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                                        <?php }?>
                                                                                    </select>
                                                                                    <div class="name-sl-people name-sl-people-yukata-v2 flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } elseif ( in_array($plan_id, $list_plans_couple) ) { // For Couple  ?>
                                                                        <select class="sl-choose-people-yukata-v2 list_plans" data-plan_type_id="<?=$plan_id?>" data-female-allow="<?= $plan_info['female_allow']; ?>" data-male-allow="<?= $plan_info['male_allow']; ?>">
                                                                            <?php
                                                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']/2; $iloop++) {
                                                                                $textSex = $iloop > 1 ? Yii::t('booking', 'couple(s)') : Yii::t('booking', 'couple');
                                                                                ?>
                                                                                <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                        <div class="name-sl-people-yukata-v2 flexbox align-self-end"> <?= Yii::t('new-kimono-pl','組'); ?></div>
                                                                    <?php } else { ?>
                                                                        <select class="sl-choose-people-yukata-v2 list_plans" data-plan_type_id="<?=$plan_id?>" data-female-allow="<?= $plan_info['female_allow']; ?>" data-male-allow="<?= $plan_info['male_allow']; ?>">
                                                                            <?php
                                                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                                ?>
                                                                                <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                        <div class="name-sl-people-yukata-v2 flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wraper-btn-reserve-yukata flexbox align-items-center">
                                                            <button class="new-btn-yukata-v2 btn-reserve">このプランを予約する<span class="arrow-btn-white"></span></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        $pickup_yukata = get_field('pickup_yukata');
                                        if ($pickup_yukata) {
                                            echo do_shortcode(php_set_base_url($pickup_yukata));
                                        }
                                        ?>
                                        <!-- QA Question -->
                                        <?php
                                        $qa_question = get_field('qa_question');
                                        if ($qa_question) {
                                            echo do_shortcode($qa_question);
                                        }
                                        ?>
                                        <div class="wrap-column-post wrap-column-post-yukata-plan">
                                            <div class="title">
                                                <?php if($isSmartPhone) : ?>
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-yukata/title-column-yukata-plan-pc.svg" alt="浴⾐で街へ！浴⾐のあれこれ">
                                                    <h2 class="column-title">京都きものレンタルwargoの<br/>おすすめコラムをご紹介！</h2>
                                                <?php else: ?>
                                                    <h2 class="column-title">京都きものレンタルwargoのおすすめコラムをご紹介！</h2>
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-yukata/title-column-yukata-plan-pc.svg" alt="浴⾐で街へ！浴⾐のあれこれ">
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                            $column_post_yukata = get_field('column_post_yukata');
                                            if ($column_post_yukata) {
                                                echo do_shortcode(php_set_base_url($column_post_yukata));
                                            }
                                            ?>
                                        </div>
                                        <!-- Topics Yukata -->
                                        <?php
                                        $topics_yukata = get_field('topics_yukata');
                                        if ($topics_yukata) {
                                            echo do_shortcode(php_set_base_url($topics_yukata));
                                        }
                                        ?>

                                        <!-- Intro Bottom -->
                                        <?php
                                        $intro_bottom = get_field('intro_bottom');
                                        if ($intro_bottom) {
                                            echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>

                                    </div><!-- End wrap-yukata-page-v2 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end wrap-highend-v2 -->
</div><!-- end container -->

<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>

<div class="wrap-booking-flow wrap-booking-flow-new-kimono wrap-sub-popup" style="display: none;" id="shops-by-plan">
    <div class="sub-popup-correspond-store">
        <div class="booking-flow-title booking-flow-title-sub">
            <div class="title-step title-step-sub"><?php echo Yii::t('new-kimono-quick-booking', '詳細店舗')?></div>
            <a id="shops-by-plan-close" class="btn-link-step btn-close-step btn-link-step-sub" href="javascript:void(0);"><span class="icon icon-formal-popup-close"></span><?php echo Yii::t('new-kimono-quick-booking', '閉じる')?></a>
        </div>
        <div class="wrap-correspond-store-list">
            <?php foreach (MasterValues::$SHOPS_OF_REGION as $region => $shops):?>
                <ul class="store-lists region-item" id="region-item-<?php echo $region?>" style="display: none">
                    <li class="store-item flexbox">
                        <p class="store-area"><?php echo Yii::t('shop','shop-region-name-'.$region)?></p>
                        <p class="store-list">
                            <?php foreach ($shops as $shopId):?>
                                <?php
                                $modelShop = Shop::getShopById($shopId);
                                if(empty($modelShop))
                                    continue;
                                ?>
                                <span class="shop-item" id="shop-item-<?php echo $shopId?>"><?php echo $modelShop->shop_name?></span>
                            <?php endforeach?>
                        </p>
                    </li>
                </ul>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php Yii::app()->controller->widget('application.components.widgets.newBooking.QuickBooking', array('id'=>'quick_booking', 'isKimono'=>true, 'bookType' => MasterValues::MV_BOOK_TYPE_YUKATA, 'isPreview' => false));?>

<div class="modal-yukata">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">
        <div class="modal-header"><p class="modal-close modal-toggle"><img src="<?= WP_HOME; ?>/images/new-yukata/close-popup-yukata.png"></p></div>
        <div class="modal-body">
            <div class="modal-content">
                <div class="wrap-pickup-yukata popup">
                    <ul class="list-pickup-yukata">
                        <li class="item-pickup-yukata">
                            <p class="title-item"><a id="shopName" href="/access/kyoto-area/station-area/kyotostation">京都タワー店</a></p>
                            <div class="image-item">
                                <a id="shopImageLink" href="/access/kyoto-area/station-area/kyotostation">
                                    <img id="shopImage" class="shopAlt" src="<?= WP_HOME; ?>/images/new-yukata/image-pickup-1.jpg">
                                </a>
                            </div>
                            <ul class="list-info">
                                <li id="shopBrief" class="item-info item-info-address">京都駅徒歩2分京都タワービル3F</li>
                                <li id="shopOpenHour" class="item-info"><span class="label">営業時間：</span>09:00～19:00</li>
                                <li id="shopCloseHour" class="item-info"><span class="label">着付け最終受付時間：</span>18:00</li>
                                <li id="shopReturnHour" class="item-info"><span class="label">返却締め切り時間：</span>18:30</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="link-to-shop"><a id="linkToShop" href="#">店舗ページを見る</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Slider top
        $('#yukata-plan-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true
        });

        // Slider list img
        if(isSmartPhone()){
            $('.section-list-image .list-img').slick({
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                arrows: false
            });
        }

        // Gallery Yukata Plan
        $('.wrap-slider-gallery-yukata .slides').slick({
            rows: 0,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 3
        });

        //Filter for Kimono plan - start
        $('.sl-search-shop, .item-sex-age-type-filter').on('change',function(){
            var shopId = $('.sl-search-shop').val();
            if (parseInt(shopId) == 0){
                shopId = null;
            }

            var listSexAgeType = [];
            var listSexAgeTypeFilter = $('.item-sex-age-type-filter');
            $.each(listSexAgeTypeFilter, function () {
                if($(this).is(":checked")){
                    var sexAgeTypeVal = parseInt($(this).attr('data-sex-age-type'));
                    listSexAgeType.push(sexAgeTypeVal);
                    $(this).parent('.item-sex-age-type').addClass('active');
                }else{
                    $(this).parent('.item-sex-age-type').removeClass('active');
                }

            });

            if(listSexAgeType.length == 0){
                listSexAgeType = null;
            }

            KimonoPlansDisplay(listSexAgeType, shopId);
        });

        $('.item-sex-age-type-filter:checked').trigger('change');
        //Filter for Kimono plan - end

        //Count Kimono plan type - start
        var countPlanType = $('.list-plan-filter:visible').length;
        $('.total-yukata-plan-number').html(countPlanType);
        //Count Kimono plan type - end

        // ================== Begin - Filter for Kimono by plan and shop when user scroll==================

        $('.plan-search, .shop-search').on('change', function () {
            var shopId = $('.shop-search').val();
            if (parseInt(shopId) == 0){
                shopId = null;
            }
            var planId = $('.plan-search').val();
            if (parseInt(planId) == 0){
                planId = null;
            }

            KimonoPlansDisplayOnSP(planId, shopId);
        });

        // ================= End - Filter for Kimono by plan and shop when user scroll====================


        //Count Yukata plan type - start
        var countPlanType = $('.list-plan-filter:visible').length;
        $('.total-kimono-plan-number').html(countPlanType);
        //Count Kimono plan type - end

        $('.wrap-new-plan-list .btn-link-more').click(function (event) {

            event.preventDefault();
            var $warpPlan = $(this).parents('.list-plan-filter');
            var listShop = $warpPlan.data('listShop').split(',');
            if(listShop.length){
                $('#shops-by-plan .region-item').hide();
                $('#shops-by-plan .shop-item').removeClass('last').hide();
                $.each(listShop, function (index, shop) {
                    var $shopShow = $("#shops-by-plan #shop-item-"+shop);
                    $shopShow.show();
                    $shopShow.parents('.region-item').show();
                });
                $("#shops-by-plan").fadeIn();
                $("html").addClass("modal-open");
            }

            //Style last shop
            $('.store-lists:visible .store-item .store-list').each(function(i, val){
                $(val).find('.shop-item:visible:last').addClass('last');
            });

        });

        $('#shops-by-plan-close').click(function (event) {
            event.preventDefault();
            $("#shops-by-plan").hide();
            $("html").removeClass("modal-open");
        });

        $('.list-plan-filter .btn-reserve').click(function (event) {
            $('#botDiv').hide();
            event.preventDefault();
            var selectedPlan = {};
            var hasPlan = false;
            var bookingPlanData = [];
            $('.list-plan-filter').each(function () {
                var $warpPlan = $(this);
		var planName = $warpPlan.attr('data-plan-name');
                $warpPlan.find('select.list_plans').each(function () {
                    var planTypeId = $(this).attr('data-plan_type_id');
                    var femaleAllow = $(this).data('femaleAllow') ? true : false;
                    var maleAllow = $(this).data('maleAllow') ? true : false;
		    var val = parseInt($(this).val());
                    if(planTypeId && val){
                        for(var i = 1; i <= val; i++){
                            if(femaleAllow && maleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 2,
                                    persons: {
                                        1: {sex:1, options:{}},
                                        2: {sex:2, options:{}}
                                    },
                                });
                            }else if(femaleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 1,
                                    persons: {
                                        1: {sex:1, options:{}}
                                    },
                                });
                            }else if(maleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 1,
                                    persons: {
                                        2: {sex:2, options:{}}
                                    }
                                });
                            }
                        }
                        selectedPlan[planTypeId] = val;
                        hasPlan = true;
                    }
                })
            });
            if (!hasPlan || $.isEmptyObject(selectedPlan)) {
                alert('<?php echo Yii::t('js_msg','Just only male or female can zero!')?>');
                return false;
            }
            if(typeof PopupTab == 'undefined') {
                BarPopup.init();
                BarPopup.enable(true);
                window.templockForAddPlan = true;
                window.tempBookingPlanData = bookingPlanData;
                window.templistPlanIds = selectedPlan;
                return false;
            }else{
                NewReserveStatus.clearSelected();
                NewReserveStatus.listPlanIds = selectedPlan;
                if (prepareChooseShopTab(bookingPlanData)) {
                    PopupTab.current_tab = CONFIG_POPUP.two_step;
                    PopupTab.showPopup(CONFIG_POPUP.two_step);
                }
            }
        });

        // Widget shop list
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

        /* BEGIN: Popup when click on shop list */
        var shop_list = {
            5 : {
                'name' : '京都駅前京都タワー店',
                'link' : '/access/kyoto-area/station-area/kyotostation',
                'image' : '/images/new-yukata/image-pickup-1.jpg',
                'brief' : '京都駅徒歩2分京都タワービル3F',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>18:30'
            },
            6 : {
                'name' : '京都祇園四条店',
                'link' : '/access/kyoto-area/gion-area/gion-shijo',
                'image' : '/images/new-yukata/image-pickup-2.jpg',
                'brief' : '祇園四条駅徒歩1分',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>18:30'
            },
            11 : {
                'name' : '京都嵐山駅前店',
                'link' : '/access/kyoto-area/arashiyama-area/arashiyama',
                'image' : '/images/new-yukata/image-pickup-3.jpg',
                'brief' : '嵯峨嵐山駅前徒歩30秒',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            2 : {
                'name' : '京都清水坂店',
                'link' : '/access/kyoto-area/kiyomizu-area/kiyomizuzaka',
                'image' : '/images/new-yukata/image-pickup-6.jpg',
                'brief' : '清水寺まで徒歩５分！',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            26 : {
                'name' : '清水寺ちゃわん坂店',
                'link' : '/access/kyoto-area/kiyomizu-area/chawanzaka',
                'image' : '/images/new-yukata/image-pickup-5.jpg',
                'brief' : '清水寺まで徒歩５分！',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            16 : {
                'name' : 'フォーマル<br>京都タワー店',
                'link' : '/access/kyoto-area/station-area/formal-kyototower',
                'image' : '/images/new-yukata/formal-kyototower.jpg',
                'brief' : 'フォーマル用お着物専門店!<br>京都タワー2F',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>18:30'
            },
            18 : {
                'name' : '京都嵐山渡月橋店',
                'link' : '/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo',
                'image' : '/images/new-yukata/image-pickup-4.jpg',
                'brief' : '嵐電嵐山駅すぐそば！',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            7 : {
                'name' : '大阪大丸心斎橋店',
                'link' : '/access/osaka-area/osaka-shinsaibashi',
                'image' : '/images/new-yukata/image-pickup-7.jpg',
                'brief' : '心斎橋駅すぐ！<br>大丸心斎橋店南館中２階',
                'open_hour' : '<span class="label">営業時間：</span>10:30～19:30',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:30',
                'return_hour' : '<span class="label">返却締め切り時間：</span>19:00'
            },
            9 : {
                'name' : '鎌倉小町店',
                'link' : '/access/kamakura-area/kamakura',
                'image' : '/images/new-yukata/image-pickup-10.jpg',
                'brief' : '鎌倉駅徒歩2分',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            10 : {
                'name' : '金沢店',
                'link' : '/access/kanazawa-area/kanazawa',
                'image' : '/images/new-yukata/image-pickup-12.jpg',
                'brief' : '金沢市街散策の中心地',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            27 : {
                'name' : '金沢兼六園店',
                'link' : '/access/kanazawa-area/kanazawa-kenrokuen',
                'image' : '/images/new-yukata/image-pickup-11.jpg',
                'brief' : '兼六園すぐ近く！兼六園から徒歩1分',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            22 : {
                'name' : '銀座本店',
                'link' : '/formal/access/tokyo-area/ginza-honten',
                'image' : '/images/new-yukata/ginza-honten.jpg',
                'brief' : '銀座中央通り沿い、GINZA SIX目の前!!',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>18:30'
            },
            25 : {
                'name': '新宿駅前店',
                'link': '/access/tokyo-area/shinjuku-area/shinjuku-station',
                'image' : '/images/new-yukata/image-pickup-8.jpg',
                'brief' : '新宿駅東口から徒歩1分',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>18:30'
            },
            8 : {
                'name' : '東京浅草店',
                'link' : '/access/asakusa-area/asakusa',
                'image' : '/images/new-yukata/asakusa.jpg',
                'brief' : '浅草寺まで徒歩3分!!',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            17 : {
                'name' : '東京スカイツリータウンソラマチ店',
                'link' : '/access/asakusa-area/tokyoskytree',
                'image' : '/images/new-yukata/image-pickup-9.jpg',
                'brief' : '東京スカイツリーすぐ！',
                'open_hour' : '<span class="label">営業時間：</span>10:00～21:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:30',
                'return_hour' : '<span class="label">返却締め切り時間：</span>19:00'
            },
            21 : {
                'name' : '札幌すすきの駅前店',
                'link' : '/formal/access/sapporo-area/sapporo-susukinostation',
                'image' : '/images/new-yukata/sapporo-susukinostation.jpg',
                'brief' : 'すすきの駅から徒歩2分!!<br>すすきの交差点角',
                'open_hour' : '<span class="label">営業時間：</span>09:00～19:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>18:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>18:30'
            },
            20 : {
                'name' : '太宰府天満宮前店',
                'link' : '/access/fukuoka-area/dazaifu',
                'image' : '/images/new-yukata/image-pickup-13.jpg',
                'brief' : '太宰府駅から徒歩1分！',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            },
            23 : {
                'name' : '仙台駅PARCO2店',
                'link' : '/formal/access/tohoku-area/sendai-parco2',
                'image' : '/images/new-yukata/sendai-parco2.jpg',
                'brief' : '仙台駅から徒歩3分!!<br>PARCO2-5F',
                'open_hour' : '<span class="label">営業時間：</span>10:00～21:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:30',
                'return_hour' : '<span class="label">返却締め切り時間：</span>19:00'
            },
            24 : {
                'name' : '倉敷美観地区店',
                'link' : '/access/okayama-area/kurashiki',
                'image' : '/images/new-yukata/image-pickup-14.jpg',
                'brief' : '観光地、美観地区から徒歩1分!',
                'open_hour' : '<span class="label">営業時間：</span>09:00～18:00',
                'close_hour' : '<span class="label">着付け最終受付時間：</span>17:00',
                'return_hour' : '<span class="label">返却締め切り時間：</span>17:30'
            }
        };
        //Object.keys(shop_list).length

        //Close popup
        $('.modal-toggle').click(function (event) {
            $('.modal-yukata').toggleClass('is-visible');
        });

        //Fill data for shop item
        $('.item-shoplist-wg:not(:last-child), .sub-item-shop-wg, .modal-toggle').click(function (event) {
            var shopID = $(this).data('shop-id');
            var base_url = '<?= WP_HOME; ?>';
            $.each(shop_list, function (shop_id) {
                if (shopID == shop_id) {
                    event.preventDefault();
                    $('.modal-yukata').toggleClass('is-visible');
                    var shop_image = shop_list[shop_id].image;
                    if (shop_image == '') {
                        shop_image = '/images/no-image.png';
                    }
                    $('#shopName').html(shop_list[shop_id].name).attr('href', shop_list[shop_id].link);
                    $('#shopImageLink').attr('href', shop_list[shop_id].link);
                    $('#shopImage').attr('src', base_url + shop_image);
                    $('.shopAlt').attr('alt', (shop_list[shop_id].name));
                    $('#shopBrief').html(shop_list[shop_id].brief);
                    $('#shopOpenHour').html(shop_list[shop_id].open_hour);
                    $('#shopCloseHour').html(shop_list[shop_id].close_hour);
                    $('#shopReturnHour').html(shop_list[shop_id].return_hour);
                    $('#linkToShop').attr('href', shop_list[shop_id].link);
                }
            });
        });
        /* END: Popup when click on shop list */

        /* Begin: faqs */
        $(".box-faqs-item").click(function(){
            $(this).find(".icon-fa").toggleClass("icon-fa-collapsed-down-faqs icon-fa-collapsed-top-faqs")
            $(this).siblings(".box-faqs-item-content").slideToggle();
        });
        /* End: faqs */

    });
    /**
     * @param sexAgeTypeList
     * @param shopId
     * @constructor
     */
    function KimonoPlansDisplay(sexAgeTypeList, shopId){
        var listPlanKimono = $('.list-plan-filter');
        var countPlanType = 0;
        $('.wrap-list-plan-wg.couple').show(); // wrap of couple plan
        if(sexAgeTypeList == null && shopId == null){
            listPlanKimono.show();
            countPlanType = listPlanKimono.length;
        }else{
            $.each(listPlanKimono, function () {
                var planKimonoEl = $(this);
                var sexAgeT = parseInt(planKimonoEl.attr("data-sex-age"));
                var shopIdList = JSON.parse("[" + planKimonoEl.attr("data-list-shop") + "]");

                if(sexAgeTypeList != null && sexAgeTypeList.length >0 && shopId != null){
                    if($.inArray(sexAgeT, sexAgeTypeList) !== -1 && $.inArray(parseInt(shopId), shopIdList) !== -1){
                        planKimonoEl.show();
                        countPlanType++;
                    }else{
                        planKimonoEl.hide();
                    }
                }else if(shopId == null && sexAgeTypeList != null && sexAgeTypeList.length >0){
                    if($.inArray(sexAgeT, sexAgeTypeList) !== -1){
                        planKimonoEl.show();
                        countPlanType++;
                    }else{
                        planKimonoEl.hide();
                    }
                }else if(sexAgeTypeList == null && shopId != null){
                    if($.inArray(parseInt(shopId), shopIdList) !== -1){
                        planKimonoEl.show();
                        countPlanType++;
                    }else{
                        planKimonoEl.hide();
                    }
                }
            })
        }

        // show/hide wrap of couple plan
        if($('.wrap-list-plan-wg.couple').find('.list-plan-filter').is(":visible") == false){
            $('.wrap-list-plan-wg.couple').hide();
        }else{
            $('.wrap-list-plan-wg.couple').show();
        }

        $('.total-kimono-plan-number').html(countPlanType);
    }

    function KimonoPlansDisplayOnSP(planId, shopId){
        var listPlanKimono = $('.list-plan-filter');
        var countPlanType = 0;
        $('.wrap-list-plan-wg.couple').show(); // wrap of couple plan
        if(planId == null && shopId == null){
            listPlanKimono.show();
            countPlanType = listPlanKimono.length;
        }else{
            $.each(listPlanKimono, function () {
                var planKimonoEl = $(this);
                var sexAgeT = parseInt(planKimonoEl.attr("data-sex-age")); // 1
                var shopIdList = JSON.parse("[" + planKimonoEl.attr("data-list-shop") + "]");

                if(planId != null && shopId != null){
                    if(parseInt(sexAgeT)== planId && $.inArray(parseInt(shopId), shopIdList) !== -1){
                        planKimonoEl.show();
                        countPlanType++;
                    }else{
                        planKimonoEl.hide();
                    }
                }else if(shopId == null && planId != null){
                    if(parseInt(sexAgeT)== planId){
                        planKimonoEl.show();
                        countPlanType++;
                    }else{
                        planKimonoEl.hide();
                    }
                }else if(planId == null && shopId != null){
                    if($.inArray(parseInt(shopId), shopIdList) !== -1){
                        planKimonoEl.show();
                        countPlanType++;
                    }else{
                        planKimonoEl.hide();
                    }
                }
            })
        }

        // show/hide wrap of couple plan
        if($('.wrap-list-plan-wg.couple').find('.list-plan-filter').is(":visible") == false){
            $('.wrap-list-plan-wg.couple').hide();
        }else{
            $('.wrap-list-plan-wg.couple').show();
        }

        $('.total-kimono-plan-number').html(countPlanType);
    }

    // Show filter Plan and Shop when user scrolling and hide when user stop scroll

    var initVal = 0;
    var staticFilter = false;

    window.setInterval(function(){
        if (initVal == 2 && staticFilter) {
            $('.filter-plan-shop-sp').hide();
        }
        initVal++;
    }, 1000);

    $('.filter-plan-shop-sp').focusin(function(e) {
        initVal = 0;
        staticFilter = false;
    });

    $('.filter-plan-shop-sp').focusout(function(e) {
        initVal = 0;
        staticFilter = true;
    });

    $(document).scroll(function() {
        var y = $(this).scrollTop();
        var time = new Date().getTime();
        staticFilter = true;
        initVal = 0;
        var el = $('.filter-plan-shop-sp');
        if (y > 2200) {
            el.stop(true, true).show('fast');
            showFilter(el,time);
        }
        else if(y <= 2200){
            el.stop(true, true).hide();
        }
    });

    function showFilter(el,time) {
        var time = new Date().getTime();
        el.on('click', function () {
            el.stop(true, true).show('fast').data('showing-time', time);
        });
    }
    $('#check-select-plan').change(function () {
        $( '#check-select-plan option:selected' ).each(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $('.list-filter-wg-pl-v2').offset().top
            }, 3000);
        });
    });

</script>

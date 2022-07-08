<?php
/**
 * Template Name: Yukata page v3
 */
global $post;
global $is_yukata;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
get_header('new-kimono-landing-page');

wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js');
//wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');

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
    79 => array(
        'id' => 'Brand-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_79'),
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_79'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_79'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_79'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_79'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_79'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    268 => array(
        'id' => 'Yukata-Rent',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_268'),
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_268'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_268'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_268'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_268'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_268'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    12 => array(
        'id' => 'Standard-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_12'),
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_12'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_14'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_15'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_15'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_15'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_15'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_15'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
    244 => array(
        'id' => 'Bingata-Kimono',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_244'),
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_244'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_18'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_17'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_20'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_22'),
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
        'sub' => Yii::t('new-yukata-v2', 'sub_plan_yukata_23'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_23'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_23'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_23'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_23'),
        'sex_age_type' => 4,
        'female_allow' => 1,
        'male_allow' => 1,
    ),
);
$subBannersSP = get_field('sub_banner_sp');
$subBannersPC = get_field('sub_banner_pc');

$classEx = $isSmartPhone ? "sp" : "pc";
?>

<link rel="preload" href="<?=WP_HOME?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=WP_HOME?>/css/slick.css"></noscript>

<link rel="preload" href="<?=WP_HOME?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=WP_HOME?>/css/slick-theme.css"></noscript>

<link rel="preload" href="<?= get_template_directory_uri()?>/css/yukata-page-v3-<?=$classEx?>.css?ver=20210702" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-<?=$classEx?>.css"></noscript>

<?php if ($isSmartPhone == false) : ?>
<link rel="preload" href="<?= get_template_directory_uri()?>/css/widget-top-shoplist-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/widget-top-shoplist-pc.css"></noscript>
<?php endif; ?>

<script id="lazy" src="<?php echo WP_HOME; ?>/js/lib/lazyload.utils.js?v=12125" type="text/javascript" defer="defer"></script>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
</div>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2 wrap-content-yukata-plan-v2">
            <div class="container-box">
                <?php
                $title_page_h1 = get_field('title_page_h1');
                if ($title_page_h1) {
                    echo str_replace('h1','h2',do_shortcode(php_set_base_url($title_page_h1)));
                }
                ?>
                <div class="wrap-main-banner-yukata-page-v2">
                    <?php if($isSmartPhone) : ?>
                        <div class="main-banner-yukata-page-v2" id="yukata-plan-slider">
                            <?php
                            $main_banner_sp = get_field('main_banner_sp');
                            if ($main_banner_sp) {
                                echo do_shortcode(php_set_base_url($main_banner_sp));
                            }
                            ?>
                        </div>
                    <?php else: ?>
                        <div class="main-banner-yukata-page-v2" id="yukata-plan-slider">
                            <?php
                            $main_banner_pc = get_field('main_banner_pc');
                            if ($main_banner_pc) {
                                echo do_shortcode(php_set_base_url($main_banner_pc));
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div><!--end wrap-main-baner-yukata-page-v2-->
            </div><!--/container-box-->
            <?php if($isSmartPhone) : ?>
                <?php
                $set_intro_sp = get_field('set_intro_sp');
                if ($set_intro_sp) {
                    echo do_shortcode(php_set_base_url($set_intro_sp));
                }
                ?>
            <?php else: ?>
                <?php
                $set_intro_pc = get_field('set_intro_pc');
                if ($set_intro_pc) {
                    echo do_shortcode(php_set_base_url($set_intro_pc));
                }
                ?>
                <?php
                $shop_list = get_field('shop_list');
                if ($shop_list) {
                    echo do_shortcode(php_set_base_url($shop_list));
                }
                ?>
            <?php endif; ?>
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <?php if(!$isSmartPhone):?>
                            <div class="left-column hidden-sidebar">
                                <?php get_sidebar('top-page-left-v3') ?>
                            </div>
                            <?php endif; ?>
                            <div class="right-column right-column-list right-column-list-new-kimono right-column-list-yukata-plan">
                                <div class="padding-v2 padding-yukata-v2">
                                    <div class="wrap-yukata-page-v2 wrap-new-plan-list">
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
                                            <div class="wrap-title">
                                                <p class="main-title">YUKATA PLAN</p>
                                                <h2 class="sub-title">浴衣レンタルプラン一覧</h2>
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
<!--                                                    <li class="item-filter-wg-pl-v2 other-filter flexbox">-->
<!--                                                        <div class="wrap-search-wg-pl flexbox">-->
<!--                                                            <select name="shop_plan" class="sl-search-shop">-->
<!--                                                                <option value="0">--><?//= Yii::t("new-kimono-pl",'店舗') ?><!--</option>-->
<!--                                                                --><?php //foreach ($SHOP_FILTER as $shopId => $nameShop) { ?>
<!--                                                                    <option value="--><?//=$shopId?><!--">--><?//= Yii::t("new-kimono-pl",$nameShop) ?><!--</option>-->
<!--                                                                --><?php //} ?>
<!--                                                            </select>-->
<!--                                                        </div>-->
<!--                                                    </li>-->
                                                </ul>
                                                <li class="item-shop no-border item-show-total-plan">
                                                    <span class="total-kimono-plan-number"></span> <?= Yii::t("new-kimono-pl","plans") ?>
                                                </li>
                                                <!--================== if smartphone is show, if PC is hide ======================-->
                                                <?php if($isSmartPhone):?>
                                                    <ul class="list-filter-wg-pl-v2 filter-plan-shop-sp flexbox" style="display: none; position: fixed; top: 41px; z-index: 20; background-color:#e8e8e8;">
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
                                                if(!empty($shopIds) && !empty($planShopList) && !empty($planShopList[$plan_id])){
                                                    foreach ($planShopList[$plan_id] as $shopId){
                                                        if(in_array($shopId,$shopIds)){
                                                            $shopsOfRegion[$regionId][] = $shopId;
                                                        }
                                                    }
                                                }
                                            }

                                            //Main image plan
                                            $main_image_plan = '<img data-src="'.WP_HOME.'/images/yukata-v3/main-image-yukata-plan-'.$plan_id.'.jpg?ver= '. time().'" alt="'.$plan_info['name'].'">';

                                            ?>
                                            <div id="<?= $plan_info['id']; ?>" class="wrap-new-list-plan-wg-v2 list-plan-filter group-plan-yukata-<?= $plan_id; ?>" data-plan-id="<?= $plan_id; ?>" data-sex-age="<?= $plan_info['sex_age_type']; ?>" data-list-shop="<?= implode(",",$planShopList[$plan_id]); ?>" data-plan-name="<?= $plan_info['name']; ?>">
                                                <div class="group-wrap-plan-yukata-v2">
                                                    <div class="wrap-info-items-plan-v2 flexbox">
                                                        <div class="wrap-info-image-v2">
                                                            <div class="new-pic-info-slide"><?= $main_image_plan; ?></div>
                                                        </div>
                                                        <div class="wrap-info-des-plan-v2">
                                                            <div class="info-title">
                                                                <span class="sub"><?= $plan_info['sub']; ?></span>
                                                                <h3 class="title-describe-yukata-plan-v2"><?= $plan_info['brief']; ?></h3>
                                                            </div>
                                                            <?php if ($plan_id == 12) { ?>
                                                                <div class="title-more-describe-plan">
                                                                    <span class="item-title-bg-v2">浴衣人気No,1！</span>
                                                                    <span class="item-title-bg-v2 other-style">店舗でプラン変更可能！</span>
                                                                </div>
                                                            <?php }elseif ($plan_id == 15){ ?>
                                                                <div class="title-more-describe-plan">
                                                                    <span class="item-title-bg-v2">wargoだけ！</span>
                                                                </div>
                                                            <?php }elseif ($plan_id == 244){ ?>
                                                                <div class="title-more-describe-plan">
                                                                    <span class="item-title-bg-v2">太宰府天満宮店限定</span>
                                                                </div>
                                                            <?php }elseif ($plan_id == 20){ ?>
                                                                <div class="title-more-describe-plan">
                                                                    <span class="item-title-bg-v2">2人でお得！</span>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="wrap-new-web-price-info-v2">
                                                                <div class="wg-webpirce-box-new-v2 flexbox">
                                                                    <div class="new-box-webprice-v2">
                                                                        <p class="web title-new-box-v2">web</p>
                                                                        <p class="bt-text title-new-box-v2">
                                                                            <span class="lg-text">決済で</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="new-box-price-v2">
                                                                        <p class="lg-pirce">¥<?= $plan_info['web_price']; ?>-</p>
																		<p class="sm-price">(税込 ¥<?= $plan_info['price']; ?>-)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="wrap-des-bottom-price">
                                                                    <div class="sub-des">※すべてセット追加料金一切不要。着付け代・小物代を含みます。</div>
                                                                </div>
                                                                <?php if($plan_id == 268) : ?>
                                                                    <div class="add-text-268">
                                                                        レース浴衣ご希望のお客様はスタンダード浴衣プランをお選びください。人気プランのため当日店舗にてレースプランに変更、その際に差額分をお支払頂きます。数量限定のため早めのお時間にご予約ををお勧めいたします。レース浴衣取扱い店舗：京都タワーサンド店、金沢香林坊店、金沢兼六園店、大阪心斎橋店、東京浅草店
                                                                    </div>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-des-describe-new-yukata-plan dai"><?= $plan_info['description']; ?></div>
                                                    <?php if ($plan_id != 244 && $plan_id != 268) : ?>
                                                    <div class="list-gallery-for-yukata-plan">
                                                        <div class="title-list-gallery-yukata-v3">Photo Gallery</div>
                                                        <div class="plan-gallery kimono-gallery">
                                                            <?= do_shortcode('[gallery_for_plan_yukata plan_lazy="lazy" plan_type_id="'.$plan_id.'" plan_type_name="'.$plan_info['name'].'"]'); ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                            <?php if ($plan_id != 268) : ?>
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
                                                                                    <div class="name-sl-people name-sl-people-yukata-v2 flexbox"> <?= Yii::t('new-kimono-pl','名'); ?></div>
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
                                                                                    <div class="name-sl-people name-sl-people-yukata-v2 flexbox"> <?= Yii::t('new-kimono-pl','名'); ?></div>
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
                                                                        <div class="name-sl-people-yukata-v2 flexbox"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wraper-btn-reserve-yukata flexbox align-items-center">
                                                            <button class="new-btn-yukata-v2 btn-reserve">このプランを予約する</button>
                                                        </div>
                                                    </div>
                                            <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if($isSmartPhone){
                                            $pickup_yukata_sp = get_field('pickup_yukata_sp');
                                            if ($pickup_yukata_sp) {
                                                echo do_shortcode(php_set_base_url($pickup_yukata_sp));
                                            }
                                        }else{
                                            $pickup_yukata_pc = get_field('pickup_yukata_pc');
                                            if ($pickup_yukata_pc) {
                                                echo do_shortcode(php_set_base_url($pickup_yukata_pc));
                                            }
                                        }
                                        ?>
                                        <!-- QA Question -->
                                        <?php
                                        $qa_question = get_field('qa_question');
                                        if ($qa_question) {
                                            echo do_shortcode($qa_question);
                                        }
                                        ?>
                                        <!-- Topics Yukata -->
                                        <?php
                                        $topics_yukata = get_field('topics_yukata');
                                        if ($topics_yukata) {
                                            echo do_shortcode(php_set_base_url($topics_yukata));
                                        }
                                        ?>
                                    </div><!-- End wrap-yukata-page-v2 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="section-kimono-column">
                    <div class="container-box">
                        <div class="wrap-title-other">
                            <p class="main-title">Yukata Column</p>
                            <h2 class="title">正しく、美しく、浴衣を着るために</h2>
                        </div>
                        <?php echo do_shortcode('[kimono_column_v3]'); ?>
                    </div>
                </section>
            </div>
        </div>
    </div><!-- end wrap-highend-v2 -->

<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>

<div id="quick_booking"></div>
<script>
    $(document).ready(function() {
        // Slider top
        var subBannersSP = '<?php echo $subBannersSP; ?>';
        var subBannersPC = '<?php echo $subBannersPC; ?>';
        var slider = $('#yukata-plan-slider');

        setTimeout(function() {
            <?php if ($isSmartPhone) { ?>
            if (subBannersSP) {
                var els = $(subBannersSP);
                $.each(els, function () {
                    slider.append($(this));
                });
            }
            <?php } else { ?>
            if (subBannersPC) {
                var els = $(subBannersPC);
                $.each(els, function () {
                    slider.append($(this));
                });
            }
            <?php } ?>
            slider.slick({
                lazyLoad: 'ondemand',
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: true
            });
        }, 5000);

        $('.open-map').click(function(e){
            e.preventDefault();
            var parent = $(this).parents('.item-pickup-yukata');
            var src_map = parent.find('iframe').data('src');
            $('.item-pickup-yukata').removeClass('open');
            parent.addClass('open');
            parent.find('iframe').attr('src',src_map);
        });
        $('.close-map').click(function(){
            $('.item-pickup-yukata').removeClass('open');
        });
        // Slider list img
        if(isSmartPhone()){
            $('.section-list-image .list-img').slick({
                lazyLoad: 'ondemand',
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                arrows: false
            });
        }

        // Gallery Yukata Plan
        if(isSmartPhone()) {
            $('.wrap-slider-gallery-yukata .slides').slick({
                lazyLoad: 'ondemand',
                rows: 0,
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                dots: true,
                arrows: false
	});
        }else{
            $('.wrap-slider-gallery-yukata .slides').slick({
                lazyLoad: 'ondemand',
                rows: 0,
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        }
        <?php if ($isSmartPhone) : ?>
        $('#slider-photo-gallery, #kimono-column').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '20%',
            autoplay: false,
            dots: true,
            arrows: false,
            lazyLoad: 'ondemand',
        });
        $('#kyoto-column').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '30%',
            autoplay: false,
            dots: true,
            arrows: false,
            lazyLoad: 'ondemand',
        });
        <?php else: ?>
        $('#kyoto-column').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            autoplay: false,
            dots: true,
            arrows: false,
            lazyLoad: 'ondemand',
        });
        <?php endif; ?>

        $('.list-plan-filter .btn-reserve').click(function (event) {
            if ($("#quick_booking").is(':empty')) {
                BarPopup.init();
                BarPopup.enable(true);
                callQuickBooking();
            } else {
                actionPopup();
            }
        });

        /* Begin: faqs */
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
        /* End: faqs */
    });

    function actionPopup() {
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
                if (planTypeId && val) {
                    for (var i = 1; i <= val; i++) {
                        if (femaleAllow && maleAllow) {
                            bookingPlanData.push({
                                plan_type_id: planTypeId,
                                plan_name: planName,
                                count_person: 2,
                                persons: {
                                    1: {sex: 1, options: {}},
                                    2: {sex: 2, options: {}}
                                },
                            });
                        } else if (femaleAllow) {
                            bookingPlanData.push({
                                plan_type_id: planTypeId,
                                plan_name: planName,
                                count_person: 1,
                                persons: {
                                    1: {sex: 1, options: {}}
                                },
                            });
                        } else if (maleAllow) {
                            bookingPlanData.push({
                                plan_type_id: planTypeId,
                                plan_name: planName,
                                count_person: 1,
                                persons: {
                                    2: {sex: 2, options: {}}
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
            alert('<?php echo Yii::t('js_msg', 'Just only male or female can zero!')?>');
            return false;
        }
        if (typeof PopupTab == 'undefined') {
            BarPopup.init();
            BarPopup.enable(true);
            window.templockForAddPlan = true;
            window.tempBookingPlanData = bookingPlanData;
            window.templistPlanIds = selectedPlan;
            return false;
        } else {
            NewReserveStatus.clearSelected();
            NewReserveStatus.listPlanIds = selectedPlan;
            if (prepareChooseShopTab(bookingPlanData)) {
                PopupTab.current_tab = CONFIG_POPUP.two_step;
                PopupTab.showPopup(CONFIG_POPUP.two_step);
            }
        }
    }

    function callQuickBooking() {
        $.ajax({
            url:'/api/booking/getQuickBooking',
            type: "get",
            data:{isKimono:true},
            success: function(result) {
                $("#quick_booking").html(result);
                BarPopup.enable(false);
                actionPopup();
            }
        });
    }

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
</script>

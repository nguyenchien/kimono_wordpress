<?php
/**
 * Template Name: Kimono page
 * Links: /kimono, /yukata/plan, kimono/mamechiyo
 */
global $post, $is_yukata, $language;
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();

if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}

// Calendar
$useDate = null;
$useDateObj = null;
$useDateDisplay = Yii::t('formal','ご利用日');
if(!empty($_GET['use_date'])){
    try{
        $useDateObj = DateTime::createFromFormat(DateTimeUtils::DEV_DATE_FORMAT, $_GET['use_date']);
        $useDate = $useDateObj->format(DateTimeUtils::getPhpDateFormat());
        $useDateDisplay = $useDateObj->format(DateTimeUtils::getDateFormat('php', '', 'month_current'));
    }catch (Exception $e){
        $useDate = null;
    }
}

/* Get meta Plans from database - start */
$modelMetaPlans = PlanType::getMetaPlans();
$groupedMetaPlans = array();
$YUKATA_GROUP_MERGE = MasterValues::$YUKATA_GROUP_MERGE;
$KIMONO_GROUP_MERGE = MasterValues::$KIMONO_GROUP_MERGE;
foreach ($modelMetaPlans as $metaPlan) {
    //remove
    if($metaPlan->plan_type_id == MasterValues::PLAN_PETIT_LADIES_ASSOCIATION_KIMONO_ID || $metaPlan->plan_type_id == MasterValues::PLAN_NEW_PETIT_LADIES_ASSOCIATION_KIMONO_ID){
        continue;
    }
    //Soften plan price via pattern
    PricePattern::planPriceViaPattern('B', $metaPlan);

    //prepare plan price for couple
    $metaPlan->preparePriceForCouple();

    // if plan exist in merge meta
    if( array_key_exists($metaPlan->plan_type_id, $YUKATA_GROUP_MERGE) || array_key_exists($metaPlan->plan_type_id, $KIMONO_GROUP_MERGE) ){
        $mergintoId = array_key_exists($metaPlan->plan_type_id, $YUKATA_GROUP_MERGE) ? $YUKATA_GROUP_MERGE[$metaPlan->plan_type_id] : $KIMONO_GROUP_MERGE[$metaPlan->plan_type_id];
        // check if merged id had add into groupedMeta
        if(isset($groupedMetaPlans[$metaPlan->for_group][$mergintoId])){
            // append groupMergeIds
            $groupedMetaPlans[$metaPlan->for_group][$mergintoId]->groupMergeIds[$metaPlan->plan_type_id] = $metaPlan;
        }else {
            $metaPlan->groupMergeIds[$metaPlan->plan_type_id] = $metaPlan;
            $metaPlan->plan_type_id = $mergintoId;
            $groupedMetaPlans[$metaPlan->for_group][$mergintoId] = $metaPlan;
        }
    }else{
        $groupedMetaPlans[$metaPlan->for_group][$metaPlan->plan_type_id] = $metaPlan;
    }
}

if ($isSmartPhone) {
    wp_register_style('yukata-page-v2-sp-style', get_template_directory_uri() . '/css/yukata-page-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata-page-v2-sp-style');
    wp_register_style('new-kimono-popup-v2-sp', get_template_directory_uri() . '/css/new-kimono-popup-v2-sp.css', array('twentytwelve-style'), '20211216');
    wp_enqueue_style('new-kimono-popup-v2-sp');
} else {
    wp_register_style('yukata-page-v2-pc-style', get_template_directory_uri() . '/css/yukata-page-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata-page-v2-pc-style');
    wp_register_style('new-kimono-popup-v2-pc', get_template_directory_uri() . '/css/new-kimono-popup-v2-pc.css', array('twentytwelve-style'), '20211216');
    wp_enqueue_style('new-kimono-popup-v2-pc');
}

//var_dump($groupedMetaPlans[MasterValues::MV_GROUP_KIMONO]);
/* Get meta Plans from database - end */

$SEX_AGE_TYPE = array(
    'women' => 1, // Women's kimono
    'men' => 2, // Men's kimono
    'kids' => 3, // Kids kimono
    'couple' => 4 // Couple kimono
);
$SHOP_FILTER = MasterValues::normalShopList();
$planShopList = MasterValues::planShopList();
$planTypeKimonoMap = array(
    'all-kimono-plan' => '全てのスラン',
    'standard-kimono' => 'スタンダード着物',
    'premium-kimono' => 'プレミアム着物',
    'mamechiyo-kimono' => '豆千代モダン着物',
    'men-kimono' => 'メンズ着物',
    'high-end-kimono' => 'ハイエンド着物',
    'furisode-hanhaba' => '振袖お散歩半幅帯',
    'furisode-fukuro' => '振袖お散歩袋帯',
    'antique-kimono' => 'アンティーク着物',
    'kimono-girl' => '子供着物',
    'couple-standard-kimono' => 'カップル着物',
    'Denim-Kimono' => 'デニム着物プラン',
    'Couple-Denim' => 'カップルデニム着物プラン',
    'bingata-kimono' => '紅型着物プラン',
    'couple-bingata-kimono' => 'カップル紅型着物プラン',
);
$isKimonoChildrenPage = is_page('kimono/children');
$isMenKimonoPage = is_page('kimono/men-kimono');
$isAntiqueKimono = is_page('kimono/antique-kimono');
$isCoupleAntiqueKimono = is_page('kimono/couple-antique-kimono');

$shop_id = $_GET['shop_id'];

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
    13 => array(
        'id' => 'Premium-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_13'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_13'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_13'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_13'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_13'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
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
    16 => array(
        'id' => 'Summer-Kimono',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_16'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_16'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_16'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_16'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_16'),
        'sex_age_type' => 1,
        'female_allow' => 1,
        'male_allow' => 0,
    ),
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
    21 => array(
        'id' => 'Couple-Premium-Yukata',
        'name' => Yii::t('new-yukata-v2', 'name_plan_yukata_21'),
        'brief' => Yii::t('new-yukata-v2', 'brief_plan_yukata_21'),
        'price' => Yii::t('new-yukata-v2', 'price_plan_yukata_21'),
        'web_price' => Yii::t('new-yukata-v2', 'web_price_plan_yukata_21'),
        'description' => Yii::t('new-yukata-v2', 'description_plan_yukata_21'),
        'sex_age_type' => 4,
        'female_allow' => 1,
        'male_allow' => 1,
    ),
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
<link rel="preload" href="<?= get_template_directory_uri()?>/css/new-kimono-reserve-cart.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-kimono-reserve-cart.css"></noscript>

<link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-product-cart.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-product-cart.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>

<link rel="preload" href="<?= $baseUrl.'/wordpress/wp-content/themes/twentytwelve/css/new-kimono-plan-list.css?ver=202201111525' ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= $baseUrl.'/wordpress/wp-content/themes/twentytwelve/css/new-kimono-plan-list.css?ver=202201111525' ?>"></noscript>
<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->

<?php
if ($isSmartPhone) {
    wp_register_style('new-kimono-popup-v2-sp', get_template_directory_uri() . '/css/new-kimono-popup-v2-sp.css', array('twentytwelve-style'),'20210913');
    wp_enqueue_style('new-kimono-popup-v2-sp');
} else {
    wp_register_style('new-kimono-popup-v2-pc', get_template_directory_uri() . '/css/new-kimono-popup-v2-pc.css', array('twentytwelve-style'),'20210913');
    wp_enqueue_style('new-kimono-popup-v2-pc');
}
if($language != "ja"){
    wp_register_style('new-kimono-plan-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-plan-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-plan-list-style'.$cssLanguage);
    wp_register_style('new-kimono-popup'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-popup'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup'.$cssLanguage);
    wp_register_style('new-kimono-reserve-cart'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-reserve-cart'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-reserve-cart'.$cssLanguage);
}
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js');
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
                            <?php if(!$isSmartPhone) : ?>
								<div class="left-column">
                                    <?php get_sidebar('top-page-left-v3') ?>
								</div>
                            <?php endif; ?>
							<div class="right-column right-column-list right-column-list-new-kimono">

								<div class="wrap-new-plan-list <?= $isKimonoChildrenPage?'wrap-new-plan-list-children':'';?>">
                                    <?php while (have_posts()) : the_post(); ?>
										<div class="title-general title-list text-center flexbox margin-bt10">
											<h1 class="sub-title-list">
                                                <span class="text-title-general">
													<?php
                                                    if ($isMenKimonoPage) {
                                                        echo "安くて手軽！男性着物レンタル";
                                                    } else if ($isAntiqueKimono) {
                                                        echo "レトロなアンティーク着物レンタル";
                                                    } else if ($isCoupleAntiqueKimono) {
                                                        echo "カップルで満喫！アンティーク着物レンタル";
                                                    } else {
                                                        if (wp_nonce_field('page_h1')) {
                                                            the_title();
                                                        } else {
                                                            the_field('page_h1');
                                                        }
                                                    }
                                                    ?>
												</span>
											</h1>
										</div>
										<div class="content-wrap-top-new-plan-list">
                                            <?php echo php_set_base_url(get_the_content()); ?>
										</div>
	                                    <div id="retro"></div>
                                        <?php if(!is_page(array('kimono/couple','plan'))): ?>
											<div class="wrap-filter-widget-pl">
												<div class="row">
													<h2 class="title-filter-wg-pl"><?= Yii::t('new-kimono-pl', '絞り込み検索'); ?></h2>
													<div class="box-filter-wg-pl">
														<ul class="list-filter-wg-pl flexbox">
                                                            <?php foreach ($SEX_AGE_TYPE as $name => $type){ ?>
																<li class="item-shop item-sex-age-type flexbox justify-content-center align-items-center <?php echo $isKimonoChildrenPage && $type == 3 || $isMenKimonoPage && $type == 2? 'active': ''?>">
																	<input type="checkbox" id="sex_age_type_<?= $type ?>" name="sex_age_type" data-sex-age-type="<?= $type ?>" class="item-sex-age-type-filter hidden" <?php echo $isKimonoChildrenPage && $type == 3 || $isMenKimonoPage && $type == 2 ? 'checked': ''?>>
																	<label class="sex-age-type flexbox" for="sex_age_type_<?= $type ?>"><?= Yii::t("new-kimono-pl","filter_".$name) ?></label>
																</li>
                                                            <?php	} ?>
															<!--                                                            <li class="item-shop item-search">-->
															<!--                                                                <div class="wrap-search-wg-pl flexbox">-->
															<!--                                                                    <select name="shop_plan" class="sl-search-shop">-->
															<!--                                                                        <option value="0">--><?//= Yii::t("new-kimono-pl",'店舗') ?><!--</option>-->
															<!--                                                                        --><?php //foreach ($SHOP_FILTER as $shopId => $nameShop) { ?>
															<!--                                                                        <option value="--><?//=$shopId?><!--">--><?//= $nameShop ?><!--</option>-->
															<!--                                                                        --><?php //} ?>
															<!--                                                                   </select>-->
															<!--                                                                </div>-->
															<!--                                                            </li>-->
															<!--                                                            <li class="item-shop item-search item-search-date">-->
															<!---->
															<!--                                                                <div id="use_date_container" class="wrap-choose-calendar flexbox justify-content-between align-items-center dropdown-search">-->
															<!--                                                                    <span class="text-date-calendar">--><?php //echo $useDateDisplay?><!--</span>-->
															<!--                                                                    <span class="icon icon-formal-calendar arrow-down flexbox"></span>-->
															<!--                                                                </div><!--end wrap-choose-calendar-->
															<!--                                                                --><?php //if(!$isSmartPhone) { ?>
															<!--                                                                    <div id="search_box_top_date_picker_wrapper"-->
															<!--                                                                         class="search_box_top_date_picker_wrapper">-->
															<!--                                                                        --><?php
                                                            //                                                                        $minimumDate = new DateTime();
                                                            //                                                                        $maximumDate = new DateTime('2099/12/31');
                                                            //                                                                        $arg = array(
                                                            //                                                                            'htmlOptions' => array(
                                                            //                                                                                'id' => 'search_box_top_date_picker',
                                                            //                                                                                'name' => 'use_date'
                                                            //                                                                            ),
                                                            //                                                                            'language' => Yii::app()->language,
                                                            //                                                                            'value' => $useDate,
                                                            //                                                                            'flat' => true,
                                                            //                                                                            'options' => array(
                                                            //                                                                                'numberOfMonths' => 2,
                                                            //                                                                                'altFormat' => 'yymmdd',
                                                            //                                                                                'dateFormat' => DateTimeUtils::getJuiDateFormat(),
                                                            //                                                                                'showAnim' => 'slideDown',
                                                            //                                                                                'changeYear' => true,
                                                            //                                                                                'changeMonth' => true,
                                                            //                                                                                'yearRange' => '2000:2099',
                                                            //                                                                                'minDate' => $minimumDate->format(DateTimeUtils::getPhpDateFormat()),
                                                            //                                                                                'maxDate' => $maximumDate->format(DateTimeUtils::getPhpDateFormat()),
                                                            //                                                                                'dayNamesMin' => Yii::app()->locale->getWeekDayNames('narrow'),
                                                            //                                                                                'monthNamesShort' => ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
                                                            //                                                                                'monthNames' => ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
                                                            //                                                                                'showMonthAfterYear' => true,
                                                            //                                                                                'yearSuffix' => Yii::t('formal_booking', ' 年'),
                                                            //                                                                                'monthSuffix' => Yii::t('formal_booking', ' 月'),
                                                            //                                                                                'onSelect' => 'js:function(value){
                                                            //                                                                                checkYukataDate(value);
                                                            //                                                                                $("#search_box_top_date_picker_wrapper").toggleClass("top-date-active");
                                                            //                                                                                $(".text-date-calendar").text($.datepicker.formatDate( "' . DateTimeUtils::getDateFormat('jui', '', 'month_current') . '", $(this).datepicker("getDate")))
                                                            //                                                                                }'
                                                            //                                                                            ),
                                                            //                                                                        );
                                                            //                                                                        Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', $arg);
                                                            //                                                                        ?>
															<!--                                                                    </div>-->
															<!--                                                                    --><?php
                                                            //                                                                }else{
                                                            //
                                                            //                                                                }
                                                            //                                                                ?>
															<!---->
															<!--                                                            </li>-->
															<li class="item-shop no-border item-show-total-plan">
																<span class="total-kimono-plan-number"></span> <?= Yii::t("new-kimono-pl","plans") ?>
															</li>
														</ul>
													</div>

												</div>
											</div>
                                        <?php endif; ?>

										<div class="wrap-kimono-yukata-plans">
											<div class="wrap-kimono-plans">
                                                <?php
                                                if (is_page(array('kimono','plan')) || $isKimonoChildrenPage || $isMenKimonoPage || $isAntiqueKimono) { // for kimono page
                                                    getTemplatePart('temp-small/kimono-list', null, array('groupedMetaKimonoPlans' => $groupedMetaPlans[MasterValues::MV_GROUP_KIMONO], 'sexAgeType' => $SEX_AGE_TYPE, 'planShopList' => $planShopList, 'planTypeKimonoMap' => $planTypeKimonoMap));
                                                }elseif(is_page(array('kimono/couple','plan')) || $isCoupleAntiqueKimono){ // for kimono couple page
                                                    getTemplatePart('temp-small/kimono-couple-list', null, array('groupedMetaKimonoPlans'=>$groupedMetaKimonoPlans, 'sexAgeType'=> $SEX_AGE_TYPE, 'planShopList'=>$planShopList, 'planTypeKimonoMap'=>$planTypeKimonoMap));
                                                }
                                                ?>
											</div>
										</div>

                                        <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>

										<div class="entry-meta sixteen columns">
                                            <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
										</div>
                                    <?php endwhile; // end of the loop.  ?>
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

<?php if (!$isSmartPhone) : ?>
	<style type="text/css">
		/* Begin: Calendar */
		#search_box_top_date_picker_wrapper{
			display: none;
		}
		#search_box_top_date_picker_wrapper.top-date-active{
			display: block;
			z-index: 999;
			position: relative;
			margin-top: 15px;
			margin-left: -60px;
		}
		#use_date_container {
			height: 100%;
			justify-content: space-between;
			font-size: 13px;
		}
		.text-date-calendar{
			margin-left: 10px;
		}
		.icon-formal-calendar{
			margin-right: 10px;
		}

		@media (min-width: 750px){
			.wrap-boths-column .right-column-list {
				margin-left: 20px;
			}
			.ui-datepicker.ui-datepicker-multi{
				width: 650px!important;
			}
			.ui-datepicker-multi .ui-datepicker-group table{
				width: 100%!important;
			}
			#use_date_container {
				font-size: 14px;
				padding: 0 10px;
			}
			.ui-datepicker .ui-datepicker-header{
				margin-bottom: 5px;
			}
			.ui-datepicker-multi-2 .ui-datepicker-group{
				width: 45%!important;
			}
			.ui-datepicker-multi-2 .ui-datepicker-group-last{
				margin-left: 10px!important;
			}
			.ui-datepicker .ui-datepicker-prev,
			.ui-datepicker .ui-datepicker-next{
				width: 22px ;
				height: 26px;
			}
			.ui-datepicker .ui-datepicker-prev{
				top: 1px !important;
				left: 1px !important;
			}
			.ui-datepicker .ui-datepicker-prev-hover{
				top:1px !important;
				left: 1px !important;
			}
			.ui-datepicker .ui-datepicker-next-hover {
				top: 2px !important;
				right: 2px !important;
			}
			.ui-state-hover,
			.ui-widget-header .ui-state-hover,
			.ui-widget-content .ui-state-hover{
				background: none !important;
			}
			.ui-datepicker .ui-corner-right{
				height: 22px;
				border: 1px solid #aaa!important;
				border-radius: 2px!important;
			}
			.ui-datepicker .ui-corner-right .ui-datepicker-title{
				padding-top: 3px;
			}
			.ui-datepicker .ui-datepicker-title select{
				background-size: 13%;
			}
			.wrap-btn-change{
				margin: 10px auto 25px;
				width: 50%;
			}
		}
		/* End: Calendar */
		.wrap-yukata-plans{
			overflow: hidden;
		}
		.notice-for-yukata{
			font-size: 16px;
			color: red;
			margin-bottom: 30px;
		}

		@media (max-width: 767px) {
			.notice-for-yukata{
				font-size: 13px;
				padding: 0 7px;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			.wrap-yukata-plans{
				padding: 0 7px;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}

			/* Custom Slider Gallery Kimono */
			.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-prev{
				left: -15px;
			}
			.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-next{
				right: -15px;
			}
			.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-prev:before,
			.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-next:before{
				font-family: inherit;
				display: inline-block;
				content: '';
				color: #000;
				border-width: 0 0 2px 2px;
				border-style: solid;
				width: 10px;
				height: 10px;
			}
			.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-prev:before{
				-webkit-transform: rotate(45deg);
				-ms-transform: rotate(45deg);
				transform: rotate(45deg);
			}
			.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-next:before{
				-webkit-transform: rotate(-135deg);
				-ms-transform: rotate(-135deg);
				transform: rotate(-135deg);
			}
		}

	</style>
<?php endif; ?>
<?php if ($isSmartPhone) : // Style custom slider gallery SP ?>
	<style type="text/css">
		.kimono-plan-gallery-slider .slick-slide {
			margin: 0 5px
		}
		.kimono-plan-gallery-slider .slick-dots{
			text-align: left;
			bottom: -35px;
		}
		.kimono-plan-gallery-slider .slick-dots li{
			margin: 0;
		}
		.kimono-plan-gallery-slider .slick-dots li button:before{
			font-size: 25px;
		}
		/* Custom Slider Gallery Kimono */
		.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-prev{
			left: -15px;
		}
		.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-next{
			right: -15px;
		}
		.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-prev:before,
		.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-next:before{
			font-family: inherit;
			display: inline-block;
			content: '';
			color: #000;
			border-width: 0 0 2px 2px;
			border-style: solid;
			width: 10px;
			height: 10px;
		}
		.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-prev:before{
			-webkit-transform: rotate(45deg);
			-ms-transform: rotate(45deg);
			transform: rotate(45deg);
		}
		.kimono-plan-gallery-slider .list-slide-gallery-pl .slick-next:before{
			-webkit-transform: rotate(-135deg);
			-ms-transform: rotate(-135deg);
			transform: rotate(-135deg);
		}
	</style>
<?php endif; ?>

<div class="wrap-booking-flow wrap-booking-flow-new-kimono wrap-sub-popup" style="display: none;" id="shops-by-plan">
	<div class="sub-popup-correspond-store">
		<div class="booking-flow-title booking-flow-title-sub">
			<h3 class="title-step title-step-sub"><?php echo Yii::t('new-kimono-quick-booking', '詳細店舗')?></h3>
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
<div id="quick_booking"></div>

<script>
    $(document).ready(function(){

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
                    var sexAgeTypeVal = parseInt($(this).attr('data-sex-age-type'))
                    listSexAgeType.push(sexAgeTypeVal);
                    $(this).parent('.item-sex-age-type').addClass('active');
                }else{
                    $(this).parent('.item-sex-age-type').removeClass('active');
                }

            });

            if(listSexAgeType.length == 0){
                listSexAgeType = null;
            }

//			console.log('listSexAgeType, shopId',listSexAgeType, shopId);
            KimonoPlansDisplay(listSexAgeType, shopId);
        });

        var shop_id = '<?php echo !empty($shop_id) ? $shop_id : 0; ?>';
        if (shop_id != undefined && shop_id != 0) {
            $(".wrap-search-wg-pl select.sl-search-shop").val(shop_id).trigger('change');
        }

        $('.item-sex-age-type-filter:checked').trigger('change');
        //Filter for Kimono plan - end

        //Count Kimono plan type - start
        var countPlanType = $('.list-plan-filter:visible').length;
        $('.total-kimono-plan-number').html(countPlanType);
        //Count Kimono plan type - end

        $('.wrap-new-plan-list .btn-link-more').click(function (event) {

            event.preventDefault();
            var $warpPlan = $(this).parents('.list-plan-filter');
            var listShop = $warpPlan.data('listShop').toString().split(',');
            if(listShop.length){
                $('#shops-by-plan .region-item').hide();
                $('#shops-by-plan .shop-item').removeClass('last').hide();
                $.each(listShop, function (index, shop) {
                    var $shopShow = $("#shops-by-plan #shop-item-"+shop);
                    $shopShow.show();
                    $shopShow.parents('.region-item').show();
                })
                $("#shops-by-plan").fadeIn();
                $("html").addClass("modal-open");
            }

            //Style last shop
            $('.store-lists:visible .store-item .store-list').each(function(i, val){
                $(val).find('.shop-item:visible:last').addClass('last');
            });

        })
        $('#shops-by-plan-close').click(function (event) {
            event.preventDefault();
            $("#shops-by-plan").hide();
            $("html").removeClass("modal-open");
        })
        $('.wrap-new-plan-list .btn-reserve').click(function (event) {
            if ($("#quick_booking").is(':empty')) {
                BarPopup.init();
                BarPopup.enable(true);
                callQuickBooking();
            } else {
                actionPopup();
            }
        });

        // Selected shop name from shop_id param
        var shop_id_url = '<?php echo $shopIdUrl; ?>';
        $('select[name=shop_plan] option').each(function (index, elem) {
            var shop_id = $(elem).val();
            if (shop_id === shop_id_url) {
                $('select[name=shop_plan]').val(shop_id).change();
            }
        });

        // Call gallery for plan kimono
        if(isSmartPhone()){
            $('.wrap-kimono-plans .slides').not('.slick-initialized').slick({
                slidesToShow: 3,
                slidesToScroll: 3
            });
        }

        $('[data-src]').lazy();
        $(window).load(function(){
            $('[data-src]').lazy();
            $('body').addClass('image-loaded');
        });
        $(window).scroll(function(){
            if($('body').is('image-loaded')){
                //
            }else{
                $('[data-src]').lazy();
                $('body').addClass('image-loaded');
            }
        });

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

    /**
     * Check Date For Yukata
     * @param currentDateSelected: date, format (yy/mm/dd)
     */
    function checkYukataDate(currentDateSelected) {
        var currentDateObj = new Date(currentDateSelected);
        NewReserveStatus.jumpToDate = currentDateObj.dateFormat("Y-m-d");
        $(".text-date-choosed").text(currentDateObj.dateFormat("Y年m月d日"));
        var startDateYukata = new Date("2021-07-01").dateFormat("Y/m/d");
        var endDateYukata = new Date("2021-08-31").dateFormat("Y/m/d");
        if(currentDateSelected >= startDateYukata && currentDateSelected <= endDateYukata){
            window.location.href = "/yukata/plan";
            NewReserveStatus.callBarLoadingBookingJs();
        }
    }

    // /**
    //  * Show Yukata Plans
    //  * @param is_yukata_date: boolean
    //  */
    // function showYukataPlans( is_yukata_date ) {
    //     if (is_yukata_date) {
    //         // Reset select choose people
    //         $(".wrap-kimono-plans select").val(0);
    //
    //         // For Yukata Plans
    //         $('.wrap-yukata-plans').show();
    //         $('.wrap-yukata-plans img').lazy();
    //         $('.wrap-kimono-plans').find('.sl-choose-people, .btn-color-pink').attr('disabled', 'disabled').css('background-color', '#ccc');
    //
    //         // Call gallery for plan yukata
    //         if(isSmartPhone()){
    //             $('.wrap-yukata-plans .slides').not('.slick-initialized').slick({
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3
    //             });
    //         } else {
    //             $('.wrap-yukata-plans .slides').not('.slick-initialized').slick({
    //                 rows: 0,
    //                 infinite: false,
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3
    //             });
    //         }
    //     } else {
    //         // Reset select choose people
    //         $(".wrap-yukata-plans select").val(0);
    //
    //         // For Kimono Plans
    //         $('.wrap-yukata-plans').hide();
    //         $('.wrap-kimono-plans').find('.btn-color-pink').removeAttr('disabled').css('background-color', '#d2003e');
    //         $('.wrap-kimono-plans').find('.sl-choose-people').removeAttr('disabled').css('background-color', '#fff');
    //     }
    // }

    function actionPopup() {
        $('#botDiv').hide();
        event.preventDefault();
        var selectedPlan = {};
        var hasPlan = false;
        var bookingPlanData = [];
        $('.wrap-new-plan-list').find('.list-plan-filter').each(function () {
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
                                    2: {sex:2, options:{}},
                                },
                            });
                        } else if (femaleAllow) {
                            bookingPlanData.push({
                                plan_type_id: planTypeId,
                                plan_name: planName,
                                count_person: 1,
                                persons: {
                                    1: {sex:1, options:{}},
                                },
                            });
                        } else if (maleAllow) {
                            bookingPlanData.push({
                                plan_type_id: planTypeId,
                                plan_name: planName,
                                count_person: 1,
                                persons: {
                                    2: {sex:2, options:{}},
                                },
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
            url:'/api/booking/getQuickBooking?bookType=1',
            type: "get",
            data:{isKimono:true},
            success: function(result) {
                $("#quick_booking").html(result);
                BarPopup.enable(false);
                actionPopup();
            }
        });
    }
</script>

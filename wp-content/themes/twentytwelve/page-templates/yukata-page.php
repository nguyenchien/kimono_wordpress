<?php
/**
 * Template Name: Yukata page
 * Links: /kimono, /yukata/plan, kimono/mamechiyo
 */
global $post;
global $is_yukata;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
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
wp_register_style('new-kimono-plan-list-style', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-plan-list-style');
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
if($language != "ja"){
    wp_register_style('new-kimono-plan-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-plan-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-plan-list-style'.$cssLanguage);
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

$shop_id = $_GET['shop_id'];
?>
<script>
    var KimonoMessage = <?php echo json_encode(JsResources::jsMessage('booking_msg')); ?>;
</script>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <?php
            if ($isSmartPhone) {
                $title_top_sp = get_field('title_top_sp');
                if ($title_top_sp) {
                    echo do_shortcode(php_set_base_url($title_top_sp));
                }
            } else {
                $title_top_pc = get_field('title_top_pc');
                if ($title_top_pc) {
                    echo do_shortcode(php_set_base_url($title_top_pc));
                }
            }
            ?>
            <div class="banner-top-highend-v2">
                <div class="container-box">
                    <div class="slider-banner <?= $is_yukata ? 'slider-banner-yukata' : ''; ?>">
                        <div id="sliderNewKimono" class="sliderNewKimono slider-new-highend slider-new-kimono-top">
                            <ul class="list-slider-banner slides">
                                <li class="item-slider-banner">
                                        <?php if($language == 'ja'): ?>
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-sp.png" alt="<?php echo Yii::t('new-kimono-header', '京都で浴衣レンタルなら、京都きものレンタルwargo')?>"/>
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-pc.png" alt="<?php echo Yii::t('new-kimono-header', '京都で浴衣レンタルなら、京都きものレンタルwargo')?>"/>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-sp-<?= $language; ?>.png" alt=""/>
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-pc-<?= $language; ?>.png" alt=""/>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end wrap-form--top-->
                </div>
            </div><!--end banner-top-highend-v2-->
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php get_sidebar('top-page-left') ?>
                            </div>
                            <div class="right-column right-column-list right-column-list-new-kimono">
                                <div class="wrap-new-plan-list">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="title-general title-list text-center flexbox margin-bt10">
                                            <?php if($language == 'ja'): ?>
                                                <h2 class="sub-title-list">
                                                    <span class="text-title-general">
                                                        <?php
                                                        if (wp_nonce_field('page_h1')) {
                                                            the_title();
                                                        } else {
                                                            the_field('page_h1');
                                                        }
                                                        ?>
                                                    </span>
                                                </h2>
                                            <?php else: ?>
                                                <h1 class="sub-title-list">
                                                    <span class="text-title-general">
                                                        <?php
                                                        if (wp_nonce_field('page_h1')) {
                                                            the_title();
                                                        } else {
                                                            the_field('page_h1');
                                                        }
                                                        ?>
                                                    </span>
                                                </h1>
                                            <?php endif; ?>
                                        </div>
                                        <div class="content-wrap-top-new-plan-list">
                                            <?php the_content(); ?>
                                        </div>
                                        <?php if(is_page(array('new-yukata','plan')) || $isYukataChildrenPage) { ?>
                                            <div class="wrap-filter-widget-pl">
                                                <div class="row">
                                                    <div class="title-filter-wg-pl"><?= Yii::t('new-kimono-pl', '絞り込み検索'); ?></div>
                                                    <div class="box-filter-wg-pl">
                                                        <ul class="list-filter-wg-pl flexbox">
                                                            <?php foreach ($SEX_AGE_TYPE as $name => $type){ ?>
                                                                <li class="item-shop item-sex-age-type flexbox justify-content-center align-items-center <?php echo $isYukataChildrenPage && $type == 3 ? 'active': ''?>">
                                                                    <input type="checkbox" id="sex_age_type_<?= $type ?>" name="sex_age_type" data-sex-age-type="<?= $type ?>" class="item-sex-age-type-filter hidden" <?php echo $isYukataChildrenPage && $type == 3 ? 'checked': ''?>>
                                                                    <label class="sex-age-type flexbox" for="sex_age_type_<?= $type ?>"><?= Yii::t("new-kimono-pl","filter_".$name."_yukata") ?></label>
                                                                </li>
                                                            <?php	} ?>
                                                            <li class="item-shop item-search">
                                                                <div class="wrap-search-wg-pl flexbox">
                                                                    <select name="shop_plan" class="sl-search-shop">
                                                                        <option value="0"><?= Yii::t("new-kimono-pl",'店舗') ?></option>
                                                                        <?php foreach ($SHOP_FILTER as $shopId => $nameShop) { ?>
                                                                            <option value="<?=$shopId?>"><?= Yii::t("new-kimono-pl",$nameShop) ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <li class="item-shop no-border item-show-total-plan">
                                                                <span class="total-kimono-plan-number"></span> <?= Yii::t("new-kimono-pl","plans") ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if (is_page(array('new-yukata','plan')) || $isYukataChildrenPage) {
                                            getTemplatePart('temp-small/yukata-list', null, array('sexAgeType' => $SEX_AGE_TYPE, 'planShopList' => $planShopList));
                                        }elseif(is_page(array('yukata/plan/couple','plan'))){ // for yukata couple page
                                            getTemplatePart('temp-small/yukata-couple-list', null, array('sexAgeType' => $SEX_AGE_TYPE, 'planShopList' => $planShopList));
                                        }
                                        ?>

                                        <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>

                                        <div class="intro-top-general">
                                            <h2 class="title-intro-top"><?php echo Yii::t('intro-top-general', '浴衣で花火、夏祭り 京都きものレンタルwargo のご紹介')?></h2>
                                            <div class="content-intro-top">
                                                <p class="intro-text"><?php echo Yii::t('intro-top-general', '京都はもちろん北は北海道・札幌から南は九州・福岡太宰府まで全19店舗を展開している京都きものレンタルwargoがご提案する【夏のレンタル浴衣全7種類】のご案内です。</br>夏といえば花火大会、夏祭り、盆踊りにサマフェス！？まで全国各地で浴衣にピッタリのイベントが目白押し！！普段は観光にお越しのお客様で賑わう店内も、夏は浴衣でイベントにおでかけの地元のお客様が大勢ご来店くださいます。全7店舗を数える京都では特に祇園祭、びわ湖大花火大会の日は夜まで隙間なく浴衣のレンタルご予約をいただき、スタッフも総力を上げていつもよりたくさんのお客様をお出迎えさせていただいております。ぜひ皆様もこの夏は京都きものレンタルwargoで浴衣をお楽しみください！')?></p>
                                            </div>
                                        </div>

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
    </style>
<script>
    $(document).ready(function(){
if(isSmartPhone()){
            // Call slick slider gallery
            $('.kimono-plan-gallery-slider .slides').slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true
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
                    if(planTypeId && val){
                        for(var i = 1; i <= val; i++){
                            if(femaleAllow && maleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 2,
                                    persons: {
                                        1: {sex:1, options:{}},
                                        2: {sex:2, options:{}},
                                    },
                                });
                            }else if(femaleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 1,
                                    persons: {
                                        1: {sex:1, options:{}},
                                    },
                                });
                            }else if(maleAllow){
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
            })
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
        })
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

</script>

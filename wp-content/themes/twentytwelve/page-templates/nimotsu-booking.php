<?php
/**
 * Template Name: Nimotsu booking
 * Links: /nimotsu/booking
 */
global $post, $language;
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$date = date('Ymd');
get_header('luggage-service');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
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
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js', array('jquery'));
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js', array('jquery'));
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-top-page-kimono-style', get_template_directory_uri() . '/css/new-top-page-kimono.css', array('twentytwelve-style'), '201805160921');
wp_enqueue_style('new-top-page-kimono-style');

if($language != "ja"){
    wp_register_style('new-kimono-plan-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-plan-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-plan-list-style'.$cssLanguage);
    wp_register_style('new-kimono-popup'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-popup'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup'.$cssLanguage);
    wp_register_style('new-kimono-reserve-cart'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-reserve-cart'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-reserve-cart'.$cssLanguage);
}

$planShopList = MasterValues::luggagePlanShopList();
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
							<div class="left-column hidden-sidebar">
								<?php get_sidebar('top-page-left') ?>
							</div>
							<div class="right-column right-column-list right-column-list-new-kimono">
                                <div class="wrap-new-plan-list">
                                    <div class="title-general title-list text-center flexbox margin-bt10">
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
                                    </div>
                                    <div class="content-wrap-top-new-plan-list">
                                        <div class="wrap-banner-lug">
                                            <div class="container-box">
                                                <div class="wrap-banner-big">
                                                    <?php if($isSmartPhone):?>
                                                        <img src="<?php echo WP_HOME; ?>/images/luggage-service/banner-lugg-sp.jpg" alt="荷物預かりサービス">
                                                    <?php else:?>
                                                        <img src="<?php echo WP_HOME; ?>/images/luggage-service/banner-lugg-pc.jpg" alt="荷物預かりサービス">
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $modelPlanTypes = LuggagePlanType::getMetaPlans(true);
                                    foreach ($modelPlanTypes as $planTypeId => $modelPlanType) {
                                        $plan_type_name = $modelPlanType->plan_type_name
                                    ?>
                                    <div class="wrap-list-plan-wg list-plan-filter " data-plan-id="<?php echo $planTypeId ?>" data-list-shop="<?= implode(",",$planShopList[$planTypeId])?>" data-plan-name="<?php echo $plan_type_name ?>">
                                        <div class="title-general title-list text-center flexbox margin-bt20">
                                            <span class="icon-title-general icon icon-prize"> <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt="" src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" class="lazy-loaded"> </span>
                                            <h2 class="sub-title-list" id="<?php echo $plan_type_name ?>"><span class="text-title-general"><span class="name"><?php echo $plan_type_name ?></span></span></h2>
                                        </div>
                                        <div class="box-banner-top-pl">
                                            <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-01.png" alt="スタンダード着物レンタルプラン" src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-01.png" class="lazy-loaded">
                                        </div>
                                        <div class="wrap-col-gallery-col-info row flexbox">
                                            <div class="col-gallery">
                                                <div class="wrap-slider-gallery-pl kimono-plan-gallery-slider flexslider">
                                                    <ul class="list-slide-gallery-pl slides">
                                                        <li class="item-gallery-pl">
                                                            <div class="pic-info-slide">
                                                                <img src="<?php echo WP_HOME; ?>/images/gallery_kimono/gallery_1_1.jpg">
                                                            </div>
                                                        </li>
                                                        <li class="item-gallery-pl">
                                                            <div class="pic-info-slide">
                                                                <img src="<?php echo WP_HOME; ?>/images/gallery_kimono/gallery_1_2.jpg">
                                                            </div>
                                                        </li>
                                                        <li class="item-gallery-pl">
                                                            <div class="pic-info-slide">
                                                                <img src="<?php echo WP_HOME; ?>/images/gallery_kimono/gallery_1_3.jpg">
                                                            </div>
                                                        </li>
                                                        <li class="item-gallery-pl">
                                                            <div class="pic-info-slide">
                                                                <img src="<?php echo WP_HOME; ?>/images/gallery_kimono/gallery_1_4.jpg">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-link-to-gallery flexbox justify-content-end">
                                                    <a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?>"><?php echo Yii::t('new-kimono-pl','このプランでお客様ギャラリー画面へ');  ?></a>
                                                </div>
                                            </div>
                                            <div class="col-info-plan-list">
                                                <div class="wrap-web-price-info flexbox">
                                                    <div class="wg-webpirce-box flexbox">
                                                        <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                                        <div class="box-price">
                                                            <p class="sm-price">¥<?php echo $modelPlanType->price ?>- ↓</p>
                                                            <p class="lg-pirce">¥<?php echo $modelPlanType->price_reduced ?><var class="line-price">-</var><span class="sm-sub-price">税抜</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="sub-des"><?= Yii::t('new-kimono-pl','すべてセッ ト追加料金一切不要。<br/>着付け代・小物代を含みます。'); ?></div>
                                                </div>
                                                <div class="wrap-des-wg-pl">
                                                    <p>学生さん一番人気のプチプラ最安プラン。初めて着物をレンタルする、安く手軽に着物を体験したいというお客様におすすめです。「着物」らしいベーシックなデザインと、可愛らしくも落ち着いた雰囲気にもなれる幅広い色展開が特徴です。帯や小物の組み合わせで、ピリッと挿し色の効いたコーディネートを楽しみたい方にも人気です。</p>
                                                </div>
                                                <div class="wrap-corresponding-store-wg">
                                                    <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more">取扱店舗はこちら</a></div>
                                                </div>
                                                <div class="wrap-choose-sl-wg flexbox">
                                                    <div class="wraper-sl flexbox">
                                                        <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                            <div class="wraper-sl-choose-pepple flexbox">
                                                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?php echo $planTypeId; ?>">
                                                                    <?php
                                                                    for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) { ?>
                                                                        <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                    <?php }?>
                                                                </select>
                                                                <div class="name-sl-people flexbox align-self-end"> 名</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								    <?php } ?>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end wrap-highend-v2 -->
</div><!-- end container -->
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
    </style>
<?php endif; ?>

<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    if (typeof curLang === 'undefined') {
        var curLang = 0;
    }
    function isSmartPhone(){
        return ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/Android/i)));
    }

	$(document).ready(function(){
		if(isSmartPhone()){
		    // Call slick slider gallery
            $('.kimono-plan-gallery-slider .slides').slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true
            });
		}

        $('.wrap-new-plan-list .btn-link-more').click(function (event) {

            event.preventDefault();
            var $warpPlan = $(this).parents('.list-plan-filter');
            var listShop = $warpPlan.data('listShop').split(',');
            console.log(listShop);
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
                    var val = parseInt($(this).val());
                    if(planTypeId && val){
                        bookingPlanData.push({
                            plan_type_id: planTypeId,
                            plan_name: planName,
                            count_person: val,
                            plans: {
                                planTypeId : val
                            },
                        });
                        selectedPlan[planTypeId] = val;
                        hasPlan = true;
                    }
                })
            });

            if (!hasPlan || $.isEmptyObject(selectedPlan)) {
                alert('<?php echo Yii::t('js_msg','預けたいお荷物の個数を、１つ以上で指定してください')?>');
                return false;
            };

            if(typeof PopupTab == 'undefined') {
                BarPopup.init();
                BarPopup.enable(true);
                window.templockForAddPlan = true;
                window.tempBookingPlanData = bookingPlanData;
                window.templistPlanIds = selectedPlan;
                return false;
            }else{
                LuggageDatePicker.planList = selectedPlan;
                if (prepareChooseShopTab(bookingPlanData)) {
                    PopupTab.current_tab = CONFIG_POPUP.two_step;
                    PopupTab.showPopup(CONFIG_POPUP.two_step);
                }
            }
        });
	});
</script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('kimono-page',$js, CClientScript::POS_END);
?>
<?php get_footer('luggage-service') ; ?>
<?php Yii::app()->controller->widget('application.components.widgets.nimotsu.QuickLuggageBooking', array('id'=>'quick_booking'));?>


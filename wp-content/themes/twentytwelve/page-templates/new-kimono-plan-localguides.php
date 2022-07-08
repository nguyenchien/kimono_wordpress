<?php
/**
 * Template Name: New Kimono Plan Localguides
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

// Get page parent's slug
global $post, $language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$post_data = get_post($post->post_parent);
$parent_slug = $post_data->post_name;
$postName = $post->post_name;

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

wp_register_style('new-kimono-localguides-style', get_template_directory_uri() . '/css/new-kimono-localguides.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-localguides-style');

$SHOP_FILTER = MasterValues::normalShopList();
$planShopList = MasterValues::planShopList();

$localPlBookSlot = LocalPlanCampaign::localPlBookSlot();
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono hidden-sidebar">
                                <?php get_sidebar('top-page-left') ?>
                            </div>

                            <div class="right-column right-column-list">
								<div class="wrap-localguides">
                                <?php
                                while (have_posts()) : the_post(); ?>
	                                <div>
		                                <?php the_content(); ?>
	                                </div>

	                                <div class="wrap-new-plan-list">
                                    <?php
	                                $planTypeId = 170;
	                                $modelPlanType = PlanType::getPlanByPk($planTypeId);
	                                if(empty($modelPlanType)){
		                                continue;
	                                }

	                                $plan_type_name = $modelPlanType->plan_type_name;

	                                $shopsOfRegion = array();
	                                foreach (MasterValues::$SHOPS_OF_REGION as $regionId => $shopIds){
		                                if(!empty($shopIds)){
			                                foreach ($planShopList[$planTypeId] as $shopId){
				                                if(in_array($shopId,$shopIds)){
					                                $shopsOfRegion[$regionId][] = $shopId;
				                                }
			                                }
		                                }
	                                }

	                                $femaleAllow = (int)($modelPlanType->female_allow);
	                                $maleAllow = (int)($modelPlanType->male_allow);

	                                $price = $femaleAllow * $modelPlanType->female_price + $maleAllow * $modelPlanType->male_price;
	                                $webPrice = $femaleAllow * $modelPlanType->female_price_reduced + $maleAllow * $modelPlanType->male_price_reduced;
	                                ?>
		                                <div class="wrap-list-plan-wg list-plan-filter" data-plan-id="<?=$planTypeId?>" data-list-shop="<?= implode(",",$planShopList[$planTypeId])?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
			                                <div class="title-general title-list text-center flexbox margin-bt20">
				                                <span class="icon-title-general icon icon-prize"> <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
				                                <h2 class="sub-title-list" id="<?= $plan_type_name; ?>">
						                            <span class="text-title-general">ローカルガイドプランを予約する</span>
				                                </h2>
			                                </div>
			                                <div class="wrap-col-gallery-col-info row flexbox">
				                                <div class="col-gallery">
					                                <div class="wrap-slider-gallery-pl kimono-plan-gallery-slider flexslider">
						                                <ul class="list-slide-gallery-pl slides">
							                                <?php for($i=1; $i<=4 ; $i++): ?>
								                                <li class="item-gallery-pl">
									                                <div class="pic-info-slide">
										                                <img src="<?= WP_HOME; ?>/images/gallery_kimono/gallery_<?= $planTypeId; ?>_<?= $i; ?>.jpg" alt="" />
									                                </div>
								                                </li>
							                                <?php endfor; ?>
						                                </ul>
					                                </div>
				                                </div>
				                                <div class="col-info-plan-list">
					                                <div class="wrap-web-price-info flexbox">
						                                <div class="wg-webpirce-box flexbox">
							                                <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
							                                <div class="box-price">
								                                <p class="sm-price"><?php echo $price ?>- ↓</p>
								                                <p class="lg-pirce"><?php echo $webPrice ?>-<span class="sm-sub-price"><?= Yii::t('new-kimono-pl', '税抜'); ?></span></p>
							                                </div>
						                                </div>
						                                <div class="sub-des"><?= Yii::t('new-kimono-pl','すべてセッ ト追加料金一切不要。<br/>着付け代・小物代を含みます。'); ?></div>
					                                </div>
					                                <div class="wrap-des-wg-pl">
														<div class="sub-des"><?= Yii::t('new-kimono-pl','ローカルガイドの皆様への特別限定プラン！着物をレンタルして友達と写真を撮りませんか？<br/>浅草、東京スカイツリー、鎌倉で着物レンタルを一日体験。ローカルガイド特典クーポンをご利用いただくことで、<br/>きものレンタルwargoで着物を1着レンタルすると、2着目のレンタル料が無料になります。<br/>2018年6月18日までに特典をご利用ください(特典数に限りがございます）'); ?></div>
					                                </div>
					                                <div class="wrap-corresponding-store-wg">
						                                <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more" data-shop-region='<?= json_encode($shopsOfRegion); ?>'><?= Yii::t('new-kimono-pl','詳細店舗はこちら'); ?></a></div>
					                                </div>
					                                <div class="wrap-choose-sl-wg flexbox">
						                                <div class="wraper-sl wraper-sl-g-b flexbox">
							                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox"> <!-- Female plan-->
								                                <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".$planTypeId) ?></div>
								                                <div class="wraper-sl-choose-pepple flexbox">
									                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $femaleAllow?>" data-male-allow="<?php echo $maleAllow?>">
										                                <?php
										                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
											                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
											                                ?>
											                                <option value="<?=$iloop?>"><?= $iloop?></option>
										                                <?php }?>
									                                </select>
									                                <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
								                                </div>
							                                </div>
							                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox"> <!-- Male plan-->
								                                <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_171") ?></div>
								                                <div class="wraper-sl-choose-pepple flexbox">
									                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="171" data-female-allow="0" data-male-allow="1">
										                                <?php
										                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
											                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
											                                ?>
											                                <option value="<?=$iloop?>"><?= $iloop?></option>
										                                <?php }?>
									                                </select>
									                                <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
								                                </div>
							                                </div>
						                                </div>
						                                <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
					                                </div>
				                                </div>
			                                </div>
											<div class="wrap-infor-price-date-child">
												<div class="price-kimono-chil">ローカルガイド特典ご利用状況<span class="date-now-child"></span></div>
												<div class="price-child"><span class="wrap-price-bigger-child">残り <var class="price-bigger-child"><?php echo $localPlBookSlot ?></var> 着</span></div>
											</div>
		                                </div>
	                                </div>
	                                <div class="entry-meta sixteen columns">
		                                <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
	                                </div>
                                <?php endwhile;
                                ?>
								</div>
                            </div><!--end right-column-->
                        </div><!--end wrap-boths-column-->
                    </div><!--end left-column-content-->
                </div><!--end wrap-column-content-->
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
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
<?php Yii::app()->controller->widget('application.components.widgets.newBooking.QuickBooking', array('id'=>'quick_booking', 'isKimono'=>true, 'bookType' => MasterValues::MV_BOOK_TYPE_YUKATA));?>
<script>
	$(document).ready(function(){
		if(isSmartPhone()){
			var slider_gallery_pl = function($) {
				$('.kimono-plan-gallery-slider').flexslider({
					slideshowSpeed  : 4000,
					animationSpeed  : 400,
					animation       : "slide",
					directionNav    : false,
					animation       : "slide",
					itemWidth       : 125,
					itemMargin      : 10,
					prevText        : "",
					nextText        : "",
					minItems        : 2,
					maxItems        : 2,
					useCSS          : false
				});
			};
			var timer_metaslider_gallery_pl = function() {
				!window.jQuery ? window.setTimeout(timer_metaslider_gallery_pl, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_gallery_pl, 100) : slider_gallery_pl(window.jQuery);
			};
			timer_metaslider_gallery_pl();
		}

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
			var numPeople = 0;
			$('.wrap-new-plan-list').find('.list-plan-filter').each(function () {
				var $warpPlan = $(this);
				var planName = $warpPlan.attr('data-plan-name');
				$warpPlan.find('select.list_plans').each(function () {
					var planTypeId = $(this).attr('data-plan_type_id');
					var femaleAllow = $(this).data('femaleAllow') ? true : false;
					var maleAllow = $(this).data('maleAllow') ? true : false;
					var val = parseInt($(this).val());
					numPeople = numPeople + val;
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
			} else if(hasPlan && numPeople < 2){
				alert('<?php echo Yii::t('js_msg','Choose a minimum of 2 people!')?>');
				return false;
			}
			if(typeof PopupTab == 'undefined') {
				BarPopup.init();
				BarPopup.enable(true);
				window.templockForAddPlan = true;
				window.tempBackStep = true;
				window.tempBookingPlanData = bookingPlanData;
				window.templistPlanIds = selectedPlan;
				return false;
			}else{
				NewReserveStatus.clearSelected();
				NewReserveStatus.listPlanIds = selectedPlan;
				if (prepareChooseShopTab(bookingPlanData)) {
					PopupTab.current_tab = CONFIG_POPUP.two_step;
					/*remove back step button*/
					$('#backStep').remove();
					PopupTab.showPopup(CONFIG_POPUP.two_step);
				}
			}
		})

		var dateNow = new Date;
		var month = dateNow.getMonth() + 1;
		var dateNowFormat = dateNow.getFullYear() + '/' + month + '/' + dateNow.getDate();
		$('.date-now-child').html("("+dateNowFormat+")");
	});
</script>



<?php
/**
 * Template Name: New Bring page
 * Links: /bring
 */
global $post, $language;
global $is_yukata;

$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
	$cssLanguage = "-".$language;
}

get_header('new-kimono');

wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');
wp_register_style('new-kimono-plan-list-style', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'), '201803181620');
wp_enqueue_style('new-kimono-plan-list-style');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
wp_register_style('new-kimono-popup', get_template_directory_uri() . '/css/new-kimono-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-popup');

wp_register_style('new-formal-product-cart', get_template_directory_uri() . '/css/new-formal-product-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-cart');
wp_register_style('new-kimono-reserve-cart', get_template_directory_uri() . '/css/new-kimono-reserve-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-reserve-cart');
wp_register_style('new-kimono-bring', get_template_directory_uri() . '/css/new-kimono-bring.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-bring');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js');
if($language != 'ja'){
	wp_register_style('new-kimono-plan-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-plan-list'.$cssLanguage.'.css', array('twentytwelve-style'));
	wp_enqueue_style('new-kimono-plan-list-style'.$cssLanguage);
	wp_register_style('new-kimono-popup'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-popup'.$cssLanguage.'.css', array('twentytwelve-style'));
	wp_enqueue_style('new-kimono-popup'.$cssLanguage);
	wp_register_style('new-kimono-reserve-cart'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-reserve-cart'.$cssLanguage.'.css', array('twentytwelve-style'));
	wp_enqueue_style('new-kimono-reserve-cart'.$cssLanguage);
	wp_register_style('new-kimono-bring'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-bring'.$cssLanguage.'.css', array('twentytwelve-style'));
	wp_enqueue_style('new-kimono-bring'.$cssLanguage);
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
//var_dump($groupedMetaPlans[MasterValues::MV_GROUP_KIMONO]);
/* Get meta Plans from database - end */

$SEX_AGE_TYPE = array(
	'women' => 1, // Women's kimono
	'men' => 2, // Men's kimono
	'kids' => 3, // Kids kimono
);
//$SHOP_FILTER = MasterValues::normalShopList();
//$planShopList = MasterValues::planShopList();
$planTypeBringMap = array(
	27 => '浴衣',
	28 => '夏着物・小紋',
	29 => '紬',
	30 => '色無地',
	31 => '訪問着',
	32 => '附下',
	33 => '留袖',
	96 => '振袖',
	34 => 'メンズ着物-長着',
	97 => 'メンズ浴衣',
    266 => '二尺袖＋袴',
	105 => '七五三着物'
);

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
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
							<div class="left-column hidden-sidebar">
								<?php get_sidebar('top-page-left') ?>
							</div>
							<div class="right-column right-column-list all-kimono-bring-plan all-kimono-bring-plan-new-bring">

								<div class="wrap-new-plan-list wrap-new-plan-list-new-bring">
									<?php while (have_posts()) : the_post(); ?>
										<div class="title-general title-list text-center flexbox margin-bt10">
											<h1 class="sub-title-list"><span class="text-title-general">
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
										<div class="wrap-top-new-plan-list wrap-top-new-plan-list-bring">
											<?php the_content(); ?>
										</div>
										<div class="wrap-filter-widget-pl">
											<div class="row">
												<h2 class="wrap-title-bring-common title-filter-widget"><?= Yii::t('new-kimono-pl', '絞り込み検索'); ?></h2>
												<div class="box-filter-wg-pl">
													<ul class="list-filter-wg-pl flexbox">
														<?php foreach ($SEX_AGE_TYPE as $name => $type){ ?>
															<li class="item-shop item-sex-age-type flexbox justify-content-center align-items-center">
																<input type="checkbox" id="sex_age_type_<?= $type ?>" name="sex_age_type" data-sex-age-type="<?= $type ?>" class="item-sex-age-type-filter hidden">
																<label class="sex-age-type flexbox" for="sex_age_type_<?= $type ?>"><?= Yii::t("new-kimono-pl","filter_".$name) ?></label>
															</li>
														<?php	} ?>
													</ul>
												</div>
											</div>
										</div>
										<?php
										getTemplatePart('temp-small/bring-list', null, array('sexAgeType' => $SEX_AGE_TYPE, 'planTypeBringMap'=>$planTypeBringMap));
										?>
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
<?php Yii::app()->controller->widget('application.components.widgets.newBooking.QuickBooking', array('id'=>'quick_booking','isBring'=>true));?>
<script>
	$(document).ready(function(){
		/** Begin: Options Bring **/
		var heightContentOpts = $(".wrap-options .content-item");
		var maxHeightOpt = 0;
		$.each(heightContentOpts, function (keyOpt, valOpt) {
			if($(valOpt).outerHeight() > maxHeightOpt){
				maxHeightOpt = $(valOpt).outerHeight();
			}
		});
		heightContentOpts.css("height", maxHeightOpt);
		$(".wrap-options .title-item").click(function () {
			$(this).siblings(".content-item").slideToggle();
			$(this).toggleClass("arrow-top");
		});
		/** End: Options Bring **/

		//Filter for Kimono plan - start
		$('.item-sex-age-type-filter').on('change',function(){
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

			BringPlansDisplay(listSexAgeType);
		});
		//Filter for Kimono plan - end

		//Count Kimono plan type - start
		var countPlanType = $('.list-plan-filter').length;
		$('.total-kimono-plan-number').html(countPlanType);
		//Count Kimono plan type - end

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
					var femaleAllow = $(this).data('femaleAllow') ? true : false;
					var maleAllow = $(this).data('maleAllow') ? true : false;
					var selfPlanName = planName;
					if($(this).data('planName')){
						selfPlanName = $(this).data('planName');
					}
					var val = parseInt($(this).val());
					if(planTypeId && val){
						for(var i = 1; i <= val; i++){
							if(femaleAllow && maleAllow){
								bookingPlanData.push({
									plan_type_id: planTypeId,
									plan_name: selfPlanName,
									count_person: 2,
									persons: {
										1: {sex:1, options:{}},
										2: {sex:2, options:{}},
									},
								});
							}else if(femaleAllow){
								bookingPlanData.push({
									plan_type_id: planTypeId,
									plan_name: selfPlanName,
									count_person: 1,
									persons: {
										1: {sex:1, options:{}},
									},
								});
							}else if(maleAllow){
								bookingPlanData.push({
									plan_type_id: planTypeId,
									plan_name: selfPlanName,
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
			console.log(hasPlan,selectedPlan);
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
	 * @constructor
	 */
	function BringPlansDisplay(sexAgeTypeList){
		var listPlanKimono = $('.list-plan-filter');
		$('.wrap-list-plan-wg.yukata-plan').show(); // wrap of couple plan
//		var countPlanType = 0;
		if(sexAgeTypeList === null){
			listPlanKimono.show();
//			countPlanType = listPlanKimono.length;
		}else{
			$.each(listPlanKimono, function () {
				var planKimonoEl = $(this);
				var sexAgeT = parseInt(planKimonoEl.attr("data-sex-age"));
				if(sexAgeTypeList.length >0){
					if($.inArray(sexAgeT, sexAgeTypeList) !== -1){
						planKimonoEl.show();
					}else{
						planKimonoEl.hide();
					}
				}
			})
		}

		// show/hide wrap of yukata plan
		if($('.wrap-list-plan-wg.yukata-plan').find('.list-plan-filter').is(":visible") === false){
			$('.wrap-list-plan-wg.yukata-plan').hide();
		}else{
			$('.wrap-list-plan-wg.yukata-plan').show();
		}
//		$('.total-kimono-plan-number').html(countPlanType);
	}

</script>
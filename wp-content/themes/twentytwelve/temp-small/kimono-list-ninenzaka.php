<?php
global $post;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
//var_dump($groupedMetaKimonoPlans);die;
$kimono_page = get_page_by_path('kimono');

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

if ($isSmartPhone) {
    wp_register_style('yukata-page-v2-sp-style', get_template_directory_uri() . '/css/yukata-page-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata-page-v2-sp-style');
    wp_register_style('new-kimono-popup-v2-sp', get_template_directory_uri() . '/css/new-kimono-popup-v2-sp.css', array('twentytwelve-style'), '20210202');
    wp_enqueue_style('new-kimono-popup-v2-sp');
} else {
    wp_register_style('yukata-page-v2-pc-style', get_template_directory_uri() . '/css/yukata-page-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata-page-v2-pc-style');
    wp_register_style('new-kimono-popup-v2-pc', get_template_directory_uri() . '/css/new-kimono-popup-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup-v2-pc');
}
if ($isSmartPhone) {
    wp_register_style('new-kimono-popup-v2-sp', get_template_directory_uri() . '/css/new-kimono-popup-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup-v2-sp');
} else {
    wp_register_style('new-kimono-popup-v2-pc', get_template_directory_uri() . '/css/new-kimono-popup-v2-pc.css', array('twentytwelve-style'));
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
<link rel="preload" href="<?= get_template_directory_uri()?>/css/new-kimono-reserve-cart.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-kimono-reserve-cart.css"></noscript>

<link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-product-cart.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-product-cart.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>

<link rel="preload" href="<?= $baseUrl.'/wordpress/wp-content/themes/twentytwelve/css/new-kimono-plan-list.css?ver=202011241605' ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= $baseUrl.'/wordpress/wp-content/themes/twentytwelve/css/new-kimono-plan-list.css?ver=202011241605' ?>"></noscript>
<?php
// show single plans by order
$args = array(
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_type' => 'page', //selects pages
	'post_parent' => $kimono_page->ID,
	'post_status' => 'publish',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'is_plan_page',
			'value' => 1,
		),
		array(
			'key' => 'is_plan_not_couple',
			'value' => 1,
		),
	),
	'posts_per_page' => 22,
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$planTypeId = get_field('plan_type_id');
		$modelPlanType = PlanType::getPlanByPk($planTypeId);
		if(empty($modelPlanType)){
			continue;
		}
        if($planTypeId != 39 && $planTypeId != 3){
            continue;
        }
		//Get plan name form ACF
		$arr_plan_type_names = get_field_object('plan_type_id');
		$plan_type_name = str_replace(" ","-",$arr_plan_type_names['choices'][$planTypeId]);
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

		if (get_field('is_plan_page') === true) {

			$metaPlan = $groupedMetaKimonoPlans[$planTypeId];
			$femaleAllow = (int)($metaPlan->female_allow);
			$maleAllow = (int)($metaPlan->male_allow);
			$forAge = (int)($metaPlan->for_ages);

			$sexAgeT = $sexAgeType['women'];
			if($forAge == 1 && $maleAllow && !$femaleAllow){
				$sexAgeT = $sexAgeType['men'];
			}elseif ($forAge == 2){
				$sexAgeT = $sexAgeType['kids'];
			}
			if ($planTypeId == 246) {
				$plan_type_name = "Denim-Kimono";
			} else if ($planTypeId == 247) {
				$plan_type_name = "Couple-Denim";
			}
			?>
            <?php if($planTypeId==246 || $planTypeId==244){

            }else{ ?>
			<div class="wrap-list-plan-wg list-plan-filter <?php echo ($planTypeId == 82)?'wrap-list-plan-wg-children':''; ?>" data-plan-id="<?=$planTypeId?>" data-sex-age="<?= $sexAgeT ?>" data-list-shop="<?= implode(",",$planShopList[$planTypeId])?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
				<?php if ($planTypeId != 36) { ?>
					<div class="title-general title-list text-center flexbox margin-bt20">
						<span class="icon-title-general icon icon-prize"> <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
<!--						<h2 class="sub-title-list" id="--><?//= $plan_type_name; ?><!--"><span class="text-title-general">-->
<!--							--><?php
//							$planTitle = "";
//							if ($planTypeId == 35) {
//								echo Yii::t('new-kimono-pl', 'お散歩振袖プラン');
//							} else if (get_field('page_h1') == '') {
//								the_title();
//							} else {
//								the_field('page_h1');
//							}
//							?>
<!--						</span>-->
<!--						</h2>-->
					</div>
                    <div class="box-banner-top-pl">
                        <?php if ($planTypeId == 39):?>
                            <img alt="レトロなアンティーク着物レンタルプラン" src="<?=WP_HOME ?>/images/new-kimono/banner-ninenzaka-202107-01.jpg" style="display: inline;" />
                        <?php elseif($planTypeId == 3):?>
                            <img alt="レトロなアンティーク着物レンタルプラン" src="<?=WP_HOME ?>/images/new-kimono/banner-ninenzaka-202107-02.jpg" style="display: inline;" />
                        <?php endif?>
                    </div>

					<?php if (!in_array($planTypeId, array(2,244))) { ?>
<!--						<div class="box-banner-top-pl">-->
<!--							--><?php //if($language == 'ja'): ?>
<!--                                --><?php //if($isSmartPhone) {?>
<!--                                        <img data-src="--><?php //echo WP_HOME; ?><!--/images/new-kimono/banner-pl---><?//= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?><!---sp.png?ver=20200306653" alt="--><?//= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?><!--">-->
<!--                                    --><?php //} else{ ?>
<!--                                        <img data-src="--><?php //echo WP_HOME; ?><!--/images/new-kimono/banner-pl---><?//= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?><!--.png?ver=20200228" alt="--><?//= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?><!--">-->
<!--                                --><?php //} ?>
<!--							--><?php //else: ?>
<!--								<img data-src="--><?php //echo WP_HOME; ?><!--/images/new-kimono/banner-pl---><?//= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?><!-----><?//= $language ?><!--.png?ver=20200116" alt="--><?//= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?><!--">-->
<!--							--><?php //endif; ?>
<!--						</div>-->
					<?php } ?>
				<?php } ?>
				<?php if (in_array($planTypeId, array(35,36))) { ?>
					<div class="row sub-multi-title-pl">
						<div class="wrap-sub-title-pl">
							<h3 class="sub-title-pl">
								<?php
								if (get_field('page_h1') == '') {
									the_title();
								} else {
									the_field('page_h1');
								}
								?>
							</h3>
						</div>
					</div>
				<?php } ?>
				<div class="wrap-col-gallery-col-info row flexbox">
					<div class="col-gallery">
						<?php
						$planType = $planTypeKimonoMap[strtolower($plan_type_name)];
						echo do_shortcode('[gallery_for_plan_kimono plan_type="'.$planType.'" plan_type_id="'.$planTypeId.'"]');
						?>
<!--						<div class="wrap-link-to-gallery flexbox justify-content-end">-->
<!--							<a class="linkto-gallery" href="--><?php //echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?><!--">--><?php //echo Yii::t('new-kimono-pl','このプランでお客様ギャラリー画面へ');  ?><!--</a>-->
<!--						</div>-->
					</div>
					<div class="col-info-plan-list">
						<div class="wrap-web-price-info flexbox">
							<div class="wg-webpirce-box flexbox">
								<?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
								<div class="box-price">
									<?php if (get_field('price') != '') { ?>
										<p class="sm-price"><?php the_field('price') ?>- ↓</p>
									<?php } ?>
									<?php if (get_field('webprice') != '') { ?>
										<p class="lg-pirce"><?php the_field('webprice') ?><var class="line-price">-</var><span class="sm-sub-price"><?= Yii::t('new-kimono-pl', '税抜'); ?></span></p>
									<?php } ?>
								</div>
							</div>
							<div class="sub-des"><?= Yii::t('new-kimono-pl','すべてセッ ト追加料金一切不要。<br/>着付け代・小物代を含みます。'); ?></div>
						</div>
						<div class="wrap-des-wg-pl">
                            <?php if ($planTypeId == 39): ?>
                                <p>
                                    「アンティーク着物プラン」は高級感あふれる正絹着物のレンタルプラン。ロマンチックで大胆な柄行の着物や、江戸小紋風な柄もありちょっとしたパーティにもお召しいただけます。個性溢れる着物は街並みに華やかな色を添えること間違いなし!!もちろん着物・帯を含む8点の着付け小物や姉妹店「かんざし屋wargo」のかんざしや着付け料金込み!!
                                </p>
                            <?php elseif($planTypeId == 3):?>
                                <p>
                                    レンタル着物を扱うお店はあまたあれど、豆千代モダンの着物がレンタルできるのはwargoだけ！定番の花柄からリボンや抽象画など、実に多彩なモチーフと革新的なデザインで、戦後最大の着物リバイバル牽引者と言われる豆千代様デザインによる着物ブランド「豆千代モダン」の着物を公式レンタルできる地域限定特別プラン。着物を日常着の一部に取り入れる、着物女子に大人気のプランです。
                                </p>
                            <?php endif?>
<!--							--><?php //if (!empty($post->post_excerpt)): ?>
<!--								--><?php //the_excerpt(); ?>
<!--							--><?php //endif; ?>
						</div>
<!--						<div class="wrap-corresponding-store-wg">-->
<!--							<div class="wrap-link-more-wg"> <a href="#" class="btn-link-more" data-shop-region='--><?//= json_encode($shopsOfRegion); ?><!--'>--><?//= Yii::t('new-kimono-pl','詳細店舗はこちら'); ?><!--</a></div>-->
<!--						</div>-->
                        <?php if ($planTypeId == 3): ?>
<!--                            <p class="note" style="color:red;font-size:15px;margin-bottom:20px;">京都タワー店・清水坂店・大阪心斎橋店・金沢店 限定のお着物</p>-->
                        <?php elseif ($planTypeId == 39): ?>
<!--                            <p class="note" style="color:red;font-size:15px;margin-bottom:20px;">京都タワー店・浅草店・金沢店限定のお着物。</p>-->
                        <?php elseif ($planTypeId == 267): ?>
                            <p class="note" style="color:red;font-size:15px;margin-bottom:20px;">京都タワー店・金沢店 限定のお着物。</p>
                        <?php endif; ?>

						<div class="wrap-choose-sl-wg flexbox">
							<?php if($planTypeId == MasterValues::PLAN_TYPE_ID_KIMONO_FOR_CHILDREN){ ?>
								<div class="wraper-sl wraper-sl-g-b flexbox">
									<div class="box-sl-choose-people box-sl-choose-g-b flexbox">
										<div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".$planTypeId) ?></div>
										<div class="wraper-sl-choose-pepple flexbox">
											<select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
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
									<div class="box-sl-choose-people box-sl-choose-g-b flexbox">
										<div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_83") ?></div>
										<div class="wraper-sl-choose-pepple flexbox">
											<select name="" class="sl-choose-people list_plans" data-plan_type_id="83" data-female-allow="0" data-male-allow="1">
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
							<?php } else { ?>
								<div class="wraper-sl flexbox">
									<div class="box-sl-choose-people box-sl-choose-g-b flexbox">
										<div class="wraper-sl-choose-pepple flexbox">
											<select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
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
							<?php } ?>
							<div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
						</div>
					</div>
				</div>
			</div>
            <?php if($planTypeId == 4): ?>
                <div class="wrap-banner-bt-pl">
                    <ul class="list-banner-bt-pl flexbox">
                        <li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a></li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php } ?>
			<?php
		}
	}
	wp_reset_postdata();
}?>
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
        var startDateYukata = new Date("2020-07-01").dateFormat("Y/m/d");
        var endDateYukata = new Date("2020-08-31").dateFormat("Y/m/d");
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



<?php
$language = Yii::app()->language;
global $post;
$kimono_page = get_page_by_path('kimono');

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
	'posts_per_page' => 12,
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

		if (get_field('is_plan_page') === true && $planTypeId == MasterValues::PLAN_TYPE_ID_KIMONO_FOR_CHILDREN) {
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
			?>
			<div class="wrap-list-plan-wg list-plan-filter wrap-list-plan-wg-children" data-plan-id="<?=$planTypeId?>" data-sex-age="<?= $sexAgeT ?>" data-list-shop="<?= implode(",",$planShopList[$planTypeId])?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
				<div class="title-general title-list text-center flexbox margin-bt20">
					<span class="icon-title-general icon icon-prize"> <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
					<h2 class="sub-title-list" id="<?= $plan_type_name; ?>"><span class="text-title-general">
						<?php
						if (get_field('page_h1') == '') {
							the_title();
						} else {
							the_field('page_h1');
						}
						?>
					</span>
					</h2>
				</div>
				<div class="box-banner-top-pl">
					<?php if($language == 'ja'): ?>
						<img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>.png" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
					<?php else: ?>
						<img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>-<?= $language ?>.png" alt="">
					<?php endif; ?>
				</div>

				<div class="wrap-col-gallery-col-info row flexbox">
					<div class="col-gallery">
						<?php
						$planType = $planTypeKimonoMap[strtolower($plan_type_name)];
						echo do_shortcode('[gallery_for_plan_kimono plan_type="'.$planType.'" plan_type_id="'.$planTypeId.'"]');
						?>
						<div class="wrap-link-to-gallery flexbox justify-content-end">
							<a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?>"><?php echo Yii::t('new-kimono-pl','このプランでお客様ギャラリー画面へ');  ?></a>
						</div>
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
							<?php if (!empty($post->post_excerpt)): ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>
						</div>
						<div class="wrap-corresponding-store-wg">
							<div class="wrap-link-more-wg"> <a href="#" class="btn-link-more" data-shop-region='<?= json_encode($shopsOfRegion); ?>'><?= Yii::t('new-kimono-pl','詳細店舗はこちら'); ?></a></div>
						</div>
						<div class="wrap-choose-sl-wg flexbox">
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
							<div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
						</div>
					</div>
				</div>
			</div>
			<?php
			break;
		}

	}
	wp_reset_postdata();
} ?>
<div class="wrap-banner-bt-pl">
    <ul class="list-banner-bt-pl flexbox">
        <?php if($language == 'ja'): ?>
<!--		<li class="item-banner-bt-pl"><a href="/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01.png" alt="女子会割引・学割ありのプチ着物レンタルプラン"></a></li>-->
		<li class="item-banner-bt-pl"><a href="/vip"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-02.png" alt="最高級のおもてなし VIP着物レンタルプラン"></a></li>
		<li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a></li>
		<?php else: ?>
<!--		<li class="item-banner-bt-pl"><a href="--><?php //echo home_url() ?><!--/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01---><?//= $language; ?><!--.png" alt=""></a></li>-->
		<li class="item-banner-bt-pl"><a href="<?php echo home_url() ;?>/vip"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-02-<?= $language; ?>.png" alt=""></a></li>
		<li class="item-banner-bt-pl"><a href="<?php echo home_url() ;?>/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-<?= $language; ?>.png" alt=""></a></li>
		<?php endif; ?>
	</ul>
</div>

<div class="intro-top-general pc">
    <h3 class="title-intro-top"><?= Yii::t('new-kimono-pl', 'キモノで観光 きものレンタルwargoのご紹介'); ?></h3>
    <div class="content-intro-top">
        <p class="intro-text"><?= Yii::t('new-kimono-pl', '金沢兼六園すぐの香林坊東急スクエアGF、せせらぎ通り沿いにあるレンタル着物・レンタル浴衣のお店『きものレンタルwargo』金沢香林坊店の、着付け師とスタッフが綴る着物と京都のブログ。金沢市日本三大名園の一つ、金沢の観光名所の代表である兼六園の桜・紅葉・雪景色・ライトアップなど兼六園の季節ごとの景色など、金沢に暮らしているローカルならではの旬でミクロな金沢便りをお届けします。'); ?></p>
    </div>
</div>
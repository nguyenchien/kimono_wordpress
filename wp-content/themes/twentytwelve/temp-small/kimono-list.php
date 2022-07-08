<?php
global $post;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$numberFormatter = Yii::app()->numberFormatter;
$currencyFormat = DateTimeUtils::getCurrencyFormat();
$currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
$kimono_page = get_page_by_path('kimono');
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
			} else if ($planTypeId == 269) {
                $plan_type_name = "Kimono-Roin";
            } else if ($planTypeId == 270) {
                $plan_type_name = "retro-modern";
            }
			?>
            <?php if($planTypeId==246 || $planTypeId==244 || $planTypeId==269 || $planTypeId==36){

            }else{ ?>
			<div class="wrap-list-plan-wg list-plan-filter <?php echo ($planTypeId == 82)?'wrap-list-plan-wg-children':''; ?>" data-plan-id="<?=$planTypeId?>" data-sex-age="<?= $sexAgeT ?>" data-list-shop="<?= implode(",",$planShopList[$planTypeId])?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
				<?php if ($planTypeId != 36) { ?>
					<div class="title-general title-list text-center flexbox margin-bt20">
						<span class="icon-title-general icon icon-prize"> <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
						<h2 class="sub-title-list" id="<?= $plan_type_name; ?>"><span class="text-title-general">
							<?php
							$planTitle = "";
							if ($planTypeId == 35) {
								echo Yii::t('new-kimono-pl', 'お散歩振袖プラン');
							} else if (get_field('page_h1') == '') {
								the_title();
							} else {
								the_field('page_h1');
							}
							?>
						</span>
						</h2>
					</div>
					<?php if (!in_array($planTypeId, array(2,244))) { ?>
						<div class="box-banner-top-pl">
							<?php if($language == 'ja'): ?>
                                <?php if($isSmartPhone) {?>
                                        <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>-sp.png?ver=20211217" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
                                    <?php } else{ ?>
                                        <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>.png?ver=20211217" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
                                <?php } ?>
							<?php else: ?>
								<img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>-<?= $language ?>.png?ver=20211217" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
							<?php endif; ?>
						</div>
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
				<style>
					.wrap-list-plan-wg[data-plan-id="269"] .wrap-col-gallery-col-info .col-info-plan-list,
					.wrap-list-plan-wg[data-plan-id="270"] .wrap-col-gallery-col-info .col-info-plan-list{
						width: 100%;
					}
					@media (min-width: 750px){
						.wrap-list-plan-wg[data-plan-id="269"] .wrap-choose-sl-wg,
						.wrap-list-plan-wg[data-plan-id="270"] .wrap-choose-sl-wg{
							width: 60%;
							align-self: flex-end;
						}
					}
				</style>
				<div class="wrap-col-gallery-col-info row flexbox">
                	<?php if (!in_array($planTypeId, array(269, 270))): ?>
						<div class="col-gallery">
							<?php
							$planType = $planTypeKimonoMap[strtolower($plan_type_name)];
							echo do_shortcode('[gallery_for_plan_kimono plan_type="'.$planType.'" plan_type_id="'.$planTypeId.'"]');
							?>
							<div class="wrap-link-to-gallery flexbox justify-content-end">
								<a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?>"><?php echo Yii::t('new-kimono-pl','このプランでお客様ギャラリー画面へ');  ?></a>
							</div>
						</div>
                    <?php endif; ?>
					<div class="col-info-plan-list">
						<div class="wrap-web-price-info flexbox">
                            <?php
								$price = (int) filter_var(get_field('webprice'), FILTER_SANITIZE_NUMBER_INT);
								$finalPrice =  $numberFormatter->format($currencyFormat, $price + Utils::getTax($price), $currencySymbol);
                            ?>
                            <?php if (in_array($planTypeId, array(269, 270))): ?>
								<div class="wg-webpirce-box flexbox">
									<div class="box-price">
                                        <?php if (get_field('webprice') != '') { ?>
											<p class="lg-pirce">
												<?php the_field('webprice') ?>
												<var class="line-price">-</var>
												<span class="final-price">(<?= Yii::t('new-kimono-pl', '税込') . $finalPrice; ?> )</span>
											</p>
                                        <?php } ?>
									</div>
								</div>
							<?php else : ?>
								<div class="wg-webpirce-box flexbox">
<!--                                    --><?//= Yii::t('new-kimono-pl', 'box-webprice'); ?>
									<div class="box-price">
                                        <?php if (get_field('webprice') != '') { ?>
											<p class="lg-pirce"><?php the_field('webprice') ?></p>
                                        <?php } ?>
										<span class="line-price">-</span>
                                        <?php if (get_field('price') != '') { ?>
											<p class="sm-price"><span>(<?= Yii::t('new-kimono-pl', '税込') . $finalPrice; ?> )</p>
                                        <?php } ?>
									</div>
								</div>
                            <?php endif; ?>
						</div>
						<div class="sub-des"><?= Yii::t('new-kimono-pl','すべてセット追加料金一切不要。着付け代・小物代を含みます。'); ?></div>
						<div class="wrap-des-wg-pl">
							<?php if (!empty($post->post_excerpt)): ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>
						</div>
<!--						<div class="wrap-corresponding-store-wg">-->
<!--							<div class="wrap-link-more-wg"> <a href="#" class="btn-link-more" data-shop-region='--><?//= json_encode($shopsOfRegion); ?><!--'>--><?//= Yii::t('new-kimono-pl','詳細店舗はこちら'); ?><!--</a></div>-->
<!--						</div>-->
                        <?php if ($planTypeId == 3): ?>
                            <p class="note" style="color:red;font-size:15px;margin-bottom:20px;">京都タワー店・清水坂店・大阪心斎橋店・金沢店 限定のお着物</p>
                        <?php elseif ($planTypeId == 39): ?>
                            <p class="note" style="color:red;font-size:15px;margin-bottom:20px;">京都タワー店・二年坂店・浅草店・金沢店 限定のお着物。</p>
                        <?php elseif ($planTypeId == 267): ?>
                            <p class="note" style="color:red;font-size:15px;margin-bottom:20px;">京都タワー店・浅草店・金沢店 限定のお着物。</p>
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
											<?php
                                            	$maxPersonInABook = $planTypeId == 269 ? 2 : Yii::app()->params['maxPersonInABook'];
											?>
											<select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
												<?php
												for ($iloop = 0; $iloop <= $maxPersonInABook; $iloop++) {
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
<!--            --><?php //if($planTypeId == 4): ?>
<!--                <div class="wrap-banner-bt-pl">-->
<!--					<div class="title-general title-list text-center flexbox">-->
<!--						<h2 class="sub-title-list">冠婚葬祭用の着物レンタルはこちら</h2>-->
<!--					</div>-->
<!--                    <ul class="list-banner-bt-pl flexbox">-->
<!--                        <li class="item-banner-bt-pl"><a href="/formal"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-03.png" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
            <?php } ?>
			<?php
		}
	}
	wp_reset_postdata();
}
/* END show single plans */

/* START show couple plans*/
getTemplatePart('temp-small/kimono-couple-list', null, array('plantype' => $planTypeId, 'groupedMetaKimonoPlans'=>$groupedMetaKimonoPlans, 'sexAgeType'=> $sexAgeType, 'planShopList'=>$planShopList, 'planTypeKimonoMap'=>$planTypeKimonoMap));
/* END show couple plans*/


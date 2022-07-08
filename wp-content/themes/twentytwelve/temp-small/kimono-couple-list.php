<?php
global $language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$plantype = isset($plantype) ? $plantype : 0;
$coupleKimono = array(6, 7, 8, 87, 92);
$generaltitlebox = Yii::t('wp_theme', '選べるカップルプラン四種');
$forgroup = MasterValues::MV_GROUP_YUKATA;
if (in_array($plantype, $coupleKimono)) {
	$generaltitlebox = Yii::t('wp_theme', '選べるカップルプラン三種');
	$forgroup = MasterValues::MV_GROUP_KIMONO;
}
$plantypeMaps = wpdbGetResults("SELECT `plan_type_id`, `for_book` FROM `plan_type` WHERE `for_group` = $forgroup", 'plan_type_id');
?>
<?php
global $post, $is_yukata;
$kimono = get_page_by_path('kimono');
$kimono_couple = get_page_by_path('kimono/couple');
$kimono_couple_antique = get_page_by_path('kimono/couple-antique-kimono');
$kimono_children = get_page_by_path('kimono/children');
$yukata_plan = get_page_by_path('yukata/plan');
$yukata_plan_couple = get_page_by_path('yukata/plan/couple');
$kimono_child_ids = array(
    $kimono->ID,
    $kimono_couple->ID,
    $kimono_children->ID,
    $kimono_couple_antique->ID
);
if(in_array($post->ID, $kimono_child_ids)){
    $id = $kimono->ID;
}elseif($post->ID == $yukata_plan ->ID || $post->ID == $yukata_plan_couple ->ID){
	$id = $yukata_plan->ID;
}else{
	return;
}

$planCoupleGallery = $is_yukata ? 'couple-standard-yukata' : 'couple-standard-kimono';

$numberFormatter = Yii::app()->numberFormatter;
$currencyFormat = DateTimeUtils::getCurrencyFormat();
$currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');

$args=array(
	'orderby'   => 'menu_order',
	'order'    => 'ASC',
	'post_type'     => 'page', //selects pages
	'post_parent'   => $id,
	'post_status'   => 'publish',
	'meta_key'      => 'couple',
	'meta_value'    => 1,
	'posts_per_page'=> 10,
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ) { ?>
	<div class="wrap-list-plan-wg couple">
		<div class="title-general title-list text-center flexbox margin-bt20">
			<span class="icon-title-general icon icon-prize"> <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
			<h2 class="sub-title-list"><span class="text-title-general"><?= Yii::t('new-kimono-pl', 'カップル着物プラン'); ?></span></h2>
		</div>

<?php
		$i = 0;
		while ( $the_query->have_posts() ) {
			$i++;
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
			if (!empty($planShopList)) {
				foreach (MasterValues::$SHOPS_OF_REGION as $regionId => $shopIds){
					if(!empty($shopIds)){
						foreach ($planShopList[$planTypeId] as $shopId){
							if(in_array($shopId,$shopIds)){
								$shopsOfRegion[$regionId][] = $shopId;
							}
						}
					}
				}
			}

			if(get_field('is_plan_page') === true){
				?>
				<?php if($i==1 || $planTypeId==40) { ?>
					<div class="box-banner-top-pl">
						<?php if($language == 'ja'): ?>
                            <?php if($isSmartPhone) {?>
                                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>-sp.png?ver=20200214" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
                            <?php } else{ ?>
                                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>.png?ver=20200214" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
                            <?php } ?>
						<?php else: ?>
							<img data-src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>-<?= $language ?>.png" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>">
						<?php endif;?>
					</div>
				<?php } ?>
                <?php if($planTypeId==245 || $planTypeId==247){

                }else{ ?>
				<div class="list-plan-filter list-plan-filter-couple" data-plan-id="<?=$planTypeId?>" data-sex-age="<?= $sexAgeType['couple']?>" data-list-shop="<?= !empty($planShopList)?implode(",",$planShopList[$planTypeId]):""?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">

					<?php if($isSmartPhone): ?>
						<div class="row sub-multi-title-pl">
							<div class="wrap-sub-title-pl">
								<h3 class="sub-title-pl" id="<?= $plan_type_name; ?>"><?php the_title(); ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<div class="wrap-col-gallery-col-info row flexbox">
						<div class="col-gallery">
							<?php
							$planType = !empty($planTypeKimonoMap[strtolower($plan_type_name)]) ? $planTypeKimonoMap[strtolower($plan_type_name)] : null;
							echo do_shortcode('[gallery_for_plan_kimono plan_type="'.$planType.'" plan_type_id="'.$planTypeId.'"]');
							?>
							<div class="wrap-link-to-gallery flexbox justify-content-end">
								<a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/'.$planCoupleGallery)); ?>"><?= Yii::t('new-kimono-pl', 'こちらのプランをご利用のお客様を見る>'); ?></a>
							</div>
						</div>
						<div class="col-info-plan-list">
							<?php if(!$isSmartPhone): ?>
								<div class="row sub-multi-title-pl">
									<div class="wrap-sub-title-pl">
										<h3 class="sub-title-pl" id="<?= $plan_type_name; ?>"><?php the_title(); ?></h3>
									</div>
								</div>
							<?php endif; ?>
							<div class="wrap-web-price-info flexbox">
                                <?php
									$price = (int) filter_var(get_field('webprice'), FILTER_SANITIZE_NUMBER_INT);
									$finalPrice =  $numberFormatter->format($currencyFormat, $price + Utils::getTax($price), $currencySymbol);
                                ?>
								<div class="wg-webpirce-box flexbox">
<!--									--><?//= Yii::t('new-kimono-pl', 'box-webprice'); ?>
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
							</div>
							<div class="sub-des"><?= Yii::t('new-kimono-pl', 'すべてセット追加料金一切不要。着付け代・小物代を含みます。'); ?></div>
							<div class="wrap-des-wg-pl">
								<?php echo get_plan_description(get_field('plan_description')); ?>
							</div>
<!--							<div class="wrap-corresponding-store-wg">-->
<!--								<div class="wrap-link-more-wg"> <a href="#" class="btn-link-more" data-shop-region='--><?//= json_encode($shopsOfRegion); ?><!--'>--><?//= Yii::t('new-kimono-pl', '詳細店舗はこちら'); ?><!--</a></div>-->
<!--							</div>-->
							<div class="wrap-choose-sl-wg flexbox">
								<div class="wraper-sl flexbox">
									<div class="box-sl-choose-people box-sl-choose-g-b flexbox">
										<div class="wraper-sl-choose-pepple flexbox">
											<select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
												<?php
												for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']/2; $iloop++) {
													$textSex = $iloop > 1 ? Yii::t('booking', 'couple(s)') : Yii::t('booking', 'couple')
													?>
													<option value="<?=$iloop?>"><?= $iloop?></option>
												<?php }?>
											</select>
											<div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '組'); ?></div>
										</div>
									</div>
								</div>
								<div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve', '予約に進む'); ?></button></div>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
                    <?php
			}
		} ?>
	</div>
	<?php
}
wp_reset_postdata();

?>
<div class="wrap-banner-bt-pl">
	<div class="title-general title-list text-center flexbox">
		<h2 class="sub-title-list">冠婚葬祭用の着物レンタルはこちら</h2>
	</div>
	<ul class="list-banner-bt-pl flexbox">
		<?php if($language == 'ja'): ?>
            <?php if($isSmartPhone) {?>
                <li class="item-banner-bt-pl"><a href="/formal"><img data-src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-sp.png?ver=20200306653" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a></li>
            <?php } else{ ?>
                <li class="item-banner-bt-pl"><a href="/formal"><img data-src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png?ver=20200214" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a></li>
            <?php } ?>
		<?php else: ?>
<!--			<li class="item-banner-bt-pl"><a href="--><?php //echo home_url() ?><!--/petit"><img data-src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01---><?//= $language; ?><!--.png" alt=""></a></li>-->
			<li class="item-banner-bt-pl"><a href="<?php echo home_url() ;?>/formal"><img data-src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-<?= $language; ?>.png" alt=""></a></li>
		<?php endif; ?>
	</ul>
</div>


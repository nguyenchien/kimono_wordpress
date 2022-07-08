<?php
$clientScript = Yii::app()->clientScript;
$baseUrl = Yii::app()->getBaseUrl(true);
$clientScript->registerCssFile($baseUrl.'/css/booking.css', '', true);
// show single plans by order
$args = array(
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_type' => 'page', //selects pages
	'post_parent' => $post->ID,
	'post_status' => 'publish',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key' => 'is_plan_page',
			'value' => 1,
		)
	),
	'posts_per_page' => 12,
);
$the_query = new WP_Query($args);
$listpageTitle = Yii::t('wp_theme', 'VIPプラン価格一覧');
global $is_yukata;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
//$linkYukataVip = str_replace(get_home_url(), '',get_permalink());
if ($the_query->have_posts()) {
	?>
	<div class="general_title_box">
		<img src="<?php echo WP_HOME; ?>/images/icons/icon-kimono-vip.png" alt="<?php echo $listpageTitle; ?>" />
		<h2 class="title-plan-<?php echo Yii::app()->language; ?>"><?php echo $listpageTitle; ?></h2>
	</div>
	<?php
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$planTypeId = get_field('plan_type_id');
		if (get_field('is_plan_page') === true) {
			?>
			<section class="section_general section-kimono plan-list-kimono">
				<div class="kimono-couple-page">
					<div class="box-general-kimono-couple-page kimono-list clearfix">					
						<div class="image image-kimono image-pc forpc">
                            <?php swe_the_post_thumbnail($post,'full',array('alt'=>strip_tags(get_the_title()))); ?>
						</div><!-- end image -->					
						<div class="info info-kimono <?php echo !is_page('couple') ? 'plan-page' : 'couple'; ?> info-<?php echo Yii::app()->language; ?>">
							<?php if (is_page('couple')): //couple detail ?>
								<div class="wrap couple">								
									<?php echo '<h1>' . get_the_title() . '</h1>'; ?>
									<?php if (!empty($post->post_excerpt)): ?>
										<?php the_excerpt(); ?>
									<?php endif; ?>
									<div class="image image-kimono forsp">
                                        <?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
									</div><!-- end image -->								
								</div><!-- end wrap -->							
								<?php //option for couple ?>
								<div class="option-kimono-couple">
									<?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?> 
								</div><!-- end div.option-kimono-couple -->
							<?php else:  ?>
								<div class="title">
									<h3 class="clearfix">
										<?php
										if (get_field('page_h1') == '') {
											the_title();
										} else {
											the_field('page_h1');
										}
										?>
									</h3>
								</div><!-- end title -->

								<div class="prices clearfix">
									<div class="p-left">
										<ul class="price clearfix">
											<li>
												<p class="text"><?php echo Yii::t('wp_theme', '1日限定5組まで'); ?></p>
											</li>
											<li class="price_large">
												<?php if (get_field('webprice') != '') { ?>
													<p><?php the_field('webprice') ?></p>
												<?php } ?>
											</li>
										</ul>
									</div><!-- end p-left -->
								</div><!-- end prices -->

								<div class="excerpt excerpt-list-kimono">
									<?php if (!empty($post->post_excerpt)): ?>
										<?php the_excerpt(); ?>
									<?php endif; ?>
									<div class="image image-sp forsp">
										<?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
									</div><!-- end image -->
								</div><!-- end excerpt -->

								<?php if($planTypeId == MasterValues::PLAN_VIP_LADIES_ID || $planTypeId == MasterValues::PLAN_VIP_MEN_ID): ?>
									<div class="opt-return-service-vip">
										<p class="popup" id="vip_return_service_notify"><?php echo Yii::t('wp_theme', '※お一人様でのみのご利用の場合、ホテル返却サービスは 注意文言追加 別途￥2,000の料金が発生いたします。'); ?></p>
									</div>
								<?php endif; ?>

								<div class="option-kimono-couple">
									<?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?> 
								</div><!-- end option-kimono-couple -->
								<?php $plandetailLebel = Yii::t('wp_theme', 'このプランで選べる着物一覧へ'); ?>
								<div id="link_gotopage" class="wrap-vip-reserve">
									<?php if($isSmartPhone):?>
										<?php
										$datasizeSelectPerson = 6;
										if($planTypeId == MasterValues::PLAN_VIP_GIRL_ID){
											//Girl
											$plan = PlanType::getPlanByPk(MasterValues::PLAN_VIP_GIRL_ID);
											$endloop = Yii::app()->params['maxPersonInABook'] / ($plan->female_allow + $plan->male_allow);
											$selectGirlHtml = '<div class="children clearfix"><span class="sex">'.Yii::t('booking','merge_sex_'.$planTypeId).'</span>';
											$selectGirlHtml .= Utils::format_string(
												'<select id="list_plans_{0}" name="list_plans[{0}]" last-val="{1}" male-price="{2}" female-price="{3}" class="dropdown list_plans" data-size="{4}" data-couple="{5}">',
												array($plan->plan_type_id, 0, $plan->male_allow ? $plan->male_price_reduced : 0, $plan->female_allow ? $plan->female_price_reduced : 0, $datasizeSelectPerson,$plan->female_allow && $plan->male_allow?1:0));

											for ($iloop = 0; $iloop <= $endloop; $iloop++) {
												$selectGirlHtml .= Utils::format_string('<option value="{0}" data-text="<span class=\'number\'>{0}</span><span class=\'text\'>{1}</span>">{0} {1}</option>', array($iloop, $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')));
											}
											$selectGirlHtml .= '</select></div>';

											//Boy
											$plan = PlanType::getPlanByPk(MasterValues::PLAN_VIP_BOY_ID);
											$endloop = Yii::app()->params['maxPersonInABook'] / ($plan->female_allow + $plan->male_allow);
											$selectBoyHtml = '<div class="children clearfix"><span class="sex sex-boy">'.Yii::t('booking','merge_sex_'.$planTypeId).'</span>';
											$selectBoyHtml .= Utils::format_string(
												'<select id="list_plans_{0}" name="list_plans[{0}]" last-val="{1}" male-price="{2}" female-price="{3}" class="dropdown list_plans" data-size="{4}" data-couple="{5}">',
												array($plan->plan_type_id, 0, $plan->male_allow ? $plan->male_price_reduced : 0, $plan->female_allow ? $plan->female_price_reduced : 0, $datasizeSelectPerson,$plan->female_allow && $plan->male_allow?1:0));

											for ($iloop = 0; $iloop <= $endloop; $iloop++) {
												$selectBoyHtml .= Utils::format_string('<option value="{0}" data-text="<span class=\'number\'>{0}</span><span class=\'text\'>{1}</span>">{0} {1}</option>', array($iloop, $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')));
											}
											$selectBoyHtml .= '</select></div>';
											$selectPersonHtml = $selectGirlHtml.$selectBoyHtml;
											$child = 'yukata-child kimono-child';
											$planType = '<span class="dark_blue">'. Yii::t('booking','Children') .'</span>';
										}else{
											$plan = PlanType::getPlanByPk(intval($planTypeId));
											$endloop = Yii::app()->params['maxPersonInABook'] / ($plan->female_allow + $plan->male_allow);
											if($plan->female_allow && $plan->male_allow){
												$planType = '<span class="green">'. Yii::t('booking','カップル') .'</span>';
											}else{
												if ($plan->female_allow){
													$planType = $plan->for_ages == MasterValues::MV_ADULT?'<span class="pink">'. Yii::t('booking','女性') .'</span>':'<span class="pink">'. Yii::t('booking','Girl') .'</span>';
												} else{
													$planType = $plan->for_ages == MasterValues::MV_ADULT?'<span class="blue">'. Yii::t('booking','男性') .'</span>':'<span class="blue">'. Yii::t('booking','Boy') .'</span>';
												}
											}
											$selectPersonHtml = Utils::format_string(
												'<select id="list_plans_{0}" name="list_plans[{0}]" last-val="{1}" male-price="{2}" female-price="{3}" class="dropdown list_plans" data-size="{4}" data-couple="{5}">',
												array($plan->plan_type_id, 0, $plan->male_allow ? $plan->male_price_reduced : 0, $plan->female_allow ? $plan->female_price_reduced : 0, $datasizeSelectPerson,$plan->female_allow && $plan->male_allow?1:0));

											if ($plan->female_allow && $plan->male_allow) {
												for ($iloop = 0; $iloop <= $endloop; $iloop++) {
													$selectPersonHtml .= Utils::format_string('<option value="{0}" data-text="<span class=\'number\'>{0}</span><span class=\'text\'>{1}</span>">{0} {1}</option>', array($iloop, $iloop > 1 ? Yii::t('booking', 'couple(s)') : Yii::t('booking', 'couple')));
												}
											} else {
												for ($iloop = 0; $iloop <= $endloop; $iloop++) {
													$selectPersonHtml .= Utils::format_string('<option value="{0}" data-text="<span class=\'number\'>{0}</span><span class=\'text\'>{1}</span>">{0} {1}</option>', array($iloop, $iloop > 1 ? Yii::t('booking', 'alone(s)') : Yii::t('booking', 'alone')));
												}
											}
											$selectPersonHtml .= '</select>';
											$child = '';
										}
										?>
										<div class="list-choose vip-choose">
											<div class="time-selected <?= $child?>">
												<?php echo $selectPersonHtml; ?>
											</div>
											<div class="reserve-next next-<?= $child?>">
												<a href="javascript:void(0);" onclick="BookingUI.ajaxAddPlan(this);" class="go-to-page" title="<?php echo Yii::t('booking','予約する'); ?>"><?php echo Yii::t('booking','予約する'); ?></a>
											</div>
										</div>
									<?php else:?>
									<a class="vip-reserve" href="<?php echo esc_url(home_url()); ?>/vip/reserve"><?php echo Yii::t('wp_theme','ご予約はこちらから') ?></a>
									<a href="<?php the_permalink() ?>"><?php echo "<span>$plandetailLebel</span>"; ?></a>
									<?php endif;?>
								</div>
							<?php endif; ?>

					</div><!-- end info -->
				</div><!-- end box-overview-kimono-page -->
			</div><!--end kimono-couple-page-->
			</section><!-- end section.section_general -->
			<?php
		}
	}
	wp_reset_postdata();
}
/* END show single plans */
?>

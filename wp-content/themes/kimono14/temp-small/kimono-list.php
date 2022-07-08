<?php
global $post;
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
		),
		array(
			'key' => 'is_plan_not_couple',
			'value' => 1,
		),
	),
	'posts_per_page' => 12,
);
$the_query = new WP_Query($args);

//default setting for yukata
$listpageTitle = Yii::t('wp_theme', '浴衣プラン一覧');
$forgroup = MasterValues::MV_GROUP_YUKATA;
if (is_page('kimono')) {
	$listpageTitle = Yii::t('wp_theme', '着物プラン一覧');
	$forgroup = MasterValues::MV_GROUP_KIMONO;
}

$plantypeMaps = wpdbGetResults('SELECT `plan_type_id`, `for_book` FROM `plan_type` WHERE `for_group` = '.$forgroup, 'plan_type_id');

if ($the_query->have_posts()) {
	?>
	<div class="general_title_box">
		<img src="<?php echo WP_HOME; ?>/images/icons/icon-kimono.png" alt="<?php echo $listpageTitle; ?>" />
		<h3 class="title-plan-<?php echo Yii::app()->language; ?>"><?php echo $listpageTitle; ?></h3>
	</div>
	<?php
//	if ($forgroup == MasterValues::MV_GROUP_YUKATA) {    echo "<a href='".esc_attr(home_url('yukata/petit'))."'><img class='pc' src='".Yii::t('wp_theme', 'banner-yukata-petit')."' alt='".Yii::t('wp_theme', 'プチ浴衣')."' /></a>";
//	}
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$planTypeId = get_field('plan_type_id');
		//Get plan name form ACF
		$arr_plan_type_names = get_field_object('plan_type_id');
		$plan_type_name = str_replace(" ","-",$arr_plan_type_names['choices'][$planTypeId]);

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
									<?php echo '<h2 class="title-plan">' . get_the_title() . '</h2>'; ?>
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
									<h2 class="title-plan clearfix">
										<?php
										if (get_field('page_h1') == '') {
											the_title();
										} else {
											the_field('page_h1');
										}
										?>
									</h2>
                                    <?php
                                        if(get_field('page_h1_bubble')){
                                            the_field('page_h1_bubble');
                                        }
                                    ?>
								</div><!-- end title -->

								<div class="prices clearfix">
									<div class="p-left">
										<ul class="price clearfix">
											<li>
												<?php if (get_field('price') != '') { ?>
													<p class="bg_red"><?php echo Yii::t('wp_theme', 'Web決済で'); ?></p>
													<p class="price_small"><?php the_field('price') ?></p>
												<?php } ?>
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

								<div class="option-kimono-couple">
									<?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?> 
								</div><!-- end option-kimono-couple -->

								<div class="option-kimono-reserve-link">
									<a href="<?php echo esc_attr(home_url('reserve'))?>#<?= $plan_type_name?>">
										<p><?= Yii::t('wp_theme','予約する')?></p>
									</a>
								</div><!-- end option-kimono-couple -->
							<?php endif; ?>

					</div><!-- end info -->
				</div><!-- end box-overview-kimono-page -->
			</div><!--end kimono-couple-page-->
			</section><!-- end section.section_general -->
			<?php $plandetailLebel = $plantypeMaps[$planTypeId]->for_book == MasterValues::MV_BOOK_TYPE_KIMONO ? Yii::t('wp_theme', 'このプランで選べる着物一覧へ') : Yii::t('wp_theme', 'このプランで選べる浴衣一覧へ'); ?>
			<div id="link_gotopage">
				<a href="<?php echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?>"><?php echo "<span>".Yii::t('wp_theme','このプランでお客様ギャラリー画面へ')."</span>"; ?></a>
			</div>
			<?php
		}
	}
	wp_reset_postdata();
}
/* END show single plans */
/* START show page couple */
?>	
			
<section class="section_general section-kimono list-icon-couple">
	<div class="kimono-couple-page">
		<div class="box-general-kimono-couple-page kimono-list clearfix">
			<?php
			if (is_page('kimono')) {				
				$couple_page = get_page_by_path('kimono/couple');				
			} else {				
				$couple_page = get_page_by_path('yukata/plan/couple');
			}
			$post = $couple_page;
			setup_postdata($post); 
			$planTypeId = get_field('plan_type_id');			
			?>			
			<div class="image image-kimono image-pc forpc">
				<?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
			</div><!-- end image -->

			<div class="info info-kimono info-<?php echo Yii::app()->language ?>">
				<div class="title">
					<h2 class="title-list-option-kimono">
						<?php the_title() ?>
						<?php if (is_page('kimono')): ?>
							<var class="title-var-kimono"><?php echo Yii::t('wp_theme', '三種プラン'); ?></var>
						<?php else: ?>
							<var class="title-var-kimono"><?php echo Yii::t('wp_theme', '四種プラン'); ?></var>
						<?php endif; ?>
					</h2>
				</div> <!-- end title --> 
				<div class="excerpt excerpt-list-kimono">
					<?php if (!empty($post->post_excerpt)): ?>
						<?php the_excerpt(); ?>
					<?php endif; ?>					
					<div class="image image-sp forsp">
						<?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
					</div><!-- end image -->
				</div><!-- end excerpt -->
				<div class="option-kimono-couple">
					<?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?>
				</div>
			</div>
			<?php				
			wp_reset_postdata();						
			?>
		</div>
	</div>
</section>		

<?php
/* END show page couple */
/* START show couple plans*/
getTemplatePart('temp-small/kimono-couple-list', null, array('plantype' => $planTypeId));
/*
$args = array(
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_type' => 'page', //selects pages
	'post_parent' => $post->ID,
	'post_status' => 'publish',
	'meta_key' => 'couple',
	'meta_value' => 1,
	'posts_per_page' => 10,
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
	while ($the_query->have_posts()) {
		$the_query->the_post();
		if (get_field('is_plan_page') === true) {
			?>
			<section class="section_general couple-<?php echo Yii::app()->language ?>">

				<div class="content_box">
					<div class="content_box_gell">
						<?php
						$listGalery = getGaleryFromPost($post);
						if ($listGalery[0]) {
							foreach ($listGalery[0]['ids'] as $k => $galery) {
								if ($k == 1) {
									echo swe_wp_get_attachment_image($galery, $size = array(231, 204), $icon = 1, $attr = array(
										//	'src' => $src,
										'class' => 'forpc box-main-' . implode('x', $size) . ' ' . $galery,
										'id' => 'id_' . $galery,
										'alt' => trim(strip_tags(get_post_meta($galery, '_wp_attachment_image_alt', true))),
									));
								}
							}
						}

						the_post_thumbnail('full', $attr = array(
							'class' => 'forsp the_post_thumbnail attachment-full wp-post-image',
						));
						?>
					</div>

					<div class="content_box_info_subpage">
						<div class="title-box-couple">							
							<p><?php the_title(); ?></p>
						</div>
						<ul class="view_price clearfix">
							<li>
								<?php if (get_field('price') != '') { ?>
									<p class="bg_red"><?php echo Yii::t('wp_theme', 'Web決済で'); ?></p>
									<p class="price_small"><?php the_field('price') ?></p>
								<?php } ?>
								<span class="diagonal"></span>
							</li>
							<li class="price_large">
								<?php if (get_field('webprice') != '') { ?>
									<p><?php the_field('webprice') ?></p>
								<?php } ?>
							</li>
							<div class="clearAll"></div>
						</ul>
						<div class="sub-link clearfix">

							<p class="sub_description"><?php
								echo Yii::t('plan_type', get_field('plan_description'));
								?>
							</p>							
							<div class="view_link_goto_page">
								<a href="<?php the_permalink() ?>" class="goto_page">
									<?php $plandetailLebel = $plantypeMaps[get_field('plan_type_id')]->for_book == MasterValues::MV_BOOK_TYPE_KIMONO ? Yii::t('wp_theme', 'このプランで選べる着物一覧へ') : Yii::t('wp_theme', 'このプランで選べる浴衣一覧へ'); ?>
									<span class="text-view-link"><?php echo $plandetailLebel; ?></span>
								</a>
							</div>
						</div><!--end div sub-link-->
						<div class="clearAll"></div>
					</div>
			</section><!-- end section.section_general -->
			<?php
		}
	}
	wp_reset_postdata();
}*/
/* END show couple plans*/


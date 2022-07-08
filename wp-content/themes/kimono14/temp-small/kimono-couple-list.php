<?php
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
<?php if(is_page('couple')):?>
<div class="general_title_box">
	<h3 class="selected_title"><?php echo $generaltitlebox; ?></h3>
</div>
<?php endif; ?>
<?php
global $post, $is_yukata;
$kimono = get_page_by_path('kimono');
$kimono_couple = get_page_by_path('kimono/couple');
$yukata_plan = get_page_by_path('yukata/plan');
$yukata_plan_couple = get_page_by_path('yukata/plan/couple');
if($post->ID == $kimono->ID || $post->ID == $kimono_couple->ID){
	$id = $kimono->ID;
}elseif($post->ID == $yukata_plan ->ID || $post->ID == $yukata_plan_couple ->ID){
	$id = $yukata_plan->ID;
}else{
	return;
}

$planCoupleGallery = $is_yukata ? 'couple-standard-yukata' : 'couple-standard-kimono';

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
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$planTypeId = get_field('plan_type_id');
		//Get plan name form ACF
		$arr_plan_type_names = get_field_object('plan_type_id');
		$plan_type_name = str_replace(" ","-",$arr_plan_type_names['choices'][$planTypeId]);

		if(get_field('is_plan_page') === true){
			?>
			<section class="section_general <?php echo 'plan-'.$planTypeId; ?>">

				<div class="content_box content_box_more">
					<div class="title-box-couple">
						<p><?php the_title(); ?></p>
					</div>
					<div class="both-box clearfix">
						<div class="content_box_gell content_box_gell_more">
							<?php swe_the_post_thumbnail($post,'full',array('alt'=>strip_tags(get_the_title()))); ?>
						</div>

						<div class="content_box_info_subpage content_box_info_subpage_more">
							<div class="title-box-couple">
								<p><?php the_title(); ?></p>
							</div>
							<ul class="view_price clearfix">
								<li>
									<?php if(get_field('price') != ''){ ?>
										<p class="bg_red"><?php echo Yii::t('wp_theme', 'Web決済で');?></p>
										<p class="price_small"><?php the_field('price')?></p>
									<?php } ?>
									<span class="diagonal"></span>
								</li>
								<li class="price_large">
									<?php if(get_field('webprice') != ''){ ?>
										<p><?php the_field('webprice')?></p>
									<?php } ?>
								</li>
								<div class="clearAll"></div>
							</ul>
							<div class="sub-link clearfix">

								<p class="sub_description"><?php
                                    echo get_plan_description(get_field('plan_description'));
									?>
								</p>


							</div><!--end div sub-link-->
							<div class="clearAll"></div>

							<div class="option-kimono-reserve-link pc">
								<a href="<?php echo esc_attr(home_url('reserve'))?>#<?= $plan_type_name?>">
									<p><?= Yii::t('wp_theme','予約する')?></p>
								</a>
							</div>
						</div>
					</div>
					<div class="option-kimono-reserve-link sp">
						<a href="<?php echo esc_attr(home_url('reserve'))?>#<?= $plan_type_name?>">
							<p><?= Yii::t('wp_theme','予約する')?></p>
						</a>
					</div>

				<!--new design shop-couple-->

				<div class="wrap-shop-couple">
					<?php if(!Yii::app()->mobileDetect->isSmartPhone()): ?>
					<div class="view_link_goto_page view_link_goto_page_more">
<!--						<a href="--><?php //the_permalink()?><!--" class="goto_page">-->
						<a href="<?php echo esc_attr(home_url('gallery/'.$planCoupleGallery)); ?>" class="goto_page">
							<?php $plandetailLebel = $plantypeMaps[get_field('plan_type_id')]->for_book == MasterValues::MV_BOOK_TYPE_KIMONO ? Yii::t('wp_theme','このプランで選べる着物一覧へ') : Yii::t('wp_theme','このプランで選べる浴衣一覧へ'); ?>
							<span class="text-view-link"><?php echo $plandetailLebel; ?></span>
						</a>
					</div>

				</div>
				<!--end new design shop-couple-->
				<?php endif; ?>


			</section><!-- end section.section_general -->
			<?php if(Yii::app()->mobileDetect->isSmartPhone()): ?>
			<section class="view_link_goto_page_sp clearfix">
			<div class="view_link_goto_page view_link_goto_page_more">
<!--				<a href="--><?php //the_permalink()?><!--" class="goto_page">-->
				<a href="<?php echo esc_attr(home_url('gallery/'.$planCoupleGallery)); ?>" class="goto_page">
					<?php $plandetailLebel = $plantypeMaps[get_field('plan_type_id')]->for_book == MasterValues::MV_BOOK_TYPE_KIMONO ? Yii::t('wp_theme','このプランで選べる着物一覧へ') : Yii::t('wp_theme','このプランで選べる浴衣一覧へ'); ?>
					<span class="text-view-link"><?php echo $plandetailLebel; ?></span>
				</a>
			</div>
			<?php endif; ?>
			</section>
		<?php
		}
	}
}
wp_reset_postdata();

?>
<div class="plan_banner list">
	<div class="banner banner-left">
		<a href="<?php echo esc_url(home_url('/petit')); ?>">
			<img src="<?php echo Yii::t('wp_theme','banner-petit-src') ?>" alt="<?php echo Yii::t('wp_theme','banner-petit-alt') ?>" />
		</a>
	</div>
	<div class="banner banner-right">
		<a href="<?php echo esc_url(home_url('vip')); ?>">
			<img src="<?php echo Yii::t('wp_theme','banner-vip-src') ?>" alt="<?php echo Yii::t('wp_theme','banner-vip-alt') ?>" />
		</a>
	</div>
</div>
<?php if(!Yii::app()->mobileDetect->isSmartPhone()): ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$num = 0;
		$('.content_box_more').each(function(index, el) {
			$height = $(this).innerHeight();
			if($height > $num){
			$num = $height;
		}
		});
//		$('.content_box_more').css('height', $num);
	});
</script>
<?php endif; ?>

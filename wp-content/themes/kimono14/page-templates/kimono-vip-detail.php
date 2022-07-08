<?php
/**
 * Template Name: Kimono VIP Detail
 */
global $post;
global $is_yukata, $isSmartPhone;
get_header();
wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');
wp_register_style('kimono-vip-detail', get_template_directory_uri() . '/css/kimono-vip-detail.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-vip-detail');
wp_register_style('kimono-vip-plans', get_template_directory_uri() . '/css/kimono-vip-plans.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-vip-plans');

if($is_yukata){
	wp_register_style('yukata_plan', get_template_directory_uri() . '/css/yukata_plan.css', array('twentytwelve-style'));
	wp_enqueue_style('yukata_plan');
}
?>

<div class="container kimono-couple-page kimono-vip-plans kimono-vip-detail clearfix">
	<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
	?>
	<?php while (have_posts()) : the_post(); ?>
		<?php $planTypeId = get_field('plan_type_id');?>
		<article class="kimono-vip-detail-post <?php echo $post->post_name; ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if(!$isSmartPhone){?>
			<div class="plan-couple-detail-page plan-pc">
				<div class="couple-page-detail image-thumb">
					<div class="image">
						<?php swe_the_post_thumbnail($post,'full',array('alt'=>strip_tags(get_the_title()))); ?>
					</div><!-- end image -->
				</div>
				<div class="plan-couple-content">
					<div class="box-general-kimono-couple-page clearfix">
						<div class="info plan-page">
								<div class="title">
									<h1 class="clearfix">
										<?php
										if (get_field('page_h1') == '') {
											the_title();
										} else {
											the_field('page_h1');
										}
										?>
									</h1>
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

								<div class="excerpt">
									<?php if (!empty($post->post_excerpt)): ?>
										<?php the_excerpt(); ?>
									<?php endif; ?>
								</div><!-- end excerpt -->
								<div class="option-kimono-couple option-kimono-vip <?php echo ($planTypeId==MasterValues::PLAN_VIP_BOY_ID || $planTypeId==MasterValues::PLAN_VIP_GIRL_ID)?'children':''; ?>">
									<?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?>
								</div><!-- end option-kimono-vip -->

						</div><!-- end info -->
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="box-general-kimono-couple-page clearfix plan-sp">
				<div class="info plan-page">
						<div class="title">
							<h1 class="clearfix">
								<?php
								if (get_field('page_h1') == '') {
									the_title();
								} else {
									the_field('page_h1');
								}
								?>
							</h1>
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

						<div class="excerpt">
							<?php if (!empty($post->post_excerpt)): ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>
							<div class="image forsp">
								<?php get_image_plan_by_order($post, 1, 'full', true); ?>
							</div><!-- end image -->
						</div><!-- end excerpt -->

						<div class="option-kimono-couple option-kimono-vip">
							<?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?>
						</div><!-- end option-kimono-vip -->

				</div><!-- end info -->
			</div><!-- end box-overview-kimono-page -->
			<?php }?>

			<?php
			/*
			 * BEGIN - Render kimono plan note with all kimono plan page except couple page.
			 */
				?>
				<p class="note"><?php echo Yii::t('kimono', '※現在、着物大量入荷中にて更新が間に合っておりません。店舗にはさらに沢山の着物をご用意。ご来店時に選んで頂くことも可能です。是非店頭へお越しください！！'); ?></p>

			/*
			 * END - Render kimono plan note
			 */
			?>
			<div class="box-content-page content-<?php echo $post->post_name; ?> clearfix">
				<div class="cont-page-left clearfix">
					<?php
					if (get_field('is_plan_page') === true) :
						// plan pages
						Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id'),'back_link' => get_permalink( $post->post_parent ),'item_link'=>get_permalink( $post->post_parent ).'/reserve'));
					else:
						echo strip_shortcodes(get_the_content());
					endif;
					?>
				</div><!-- end cont-page-left -->
				<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
			</div><!-- .box-content-page -->

			<div class="entry-meta sixteen columns">
				<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
			</div><!-- .entry-meta -->
		</article><!-- #post -->

	<?php endwhile; // end of the loop.  ?>

	<div class="wrap-banner-bt-vip">
		<ul class="banner-bt-vip">
			<li><a href="<?php echo esc_url(home_url('/kimono')); ?>"><img src="<?php echo Yii::t('wp_theme','banner-regular-src') ?>" alt="<?php echo Yii::t('wp_theme','banner-regular-alt') ?>"></a></li>
			<li><a href="<?php echo esc_url(home_url('/petit')); ?>"><img src="<?php echo Yii::t('wp_theme','banner-petit-src') ?>" alt="<?php echo Yii::t('wp_theme','banner-petit-alt') ?>"></a></li>
		</ul>
	</div>

</div><!-- end container -->
<?php get_footer(); ?>
<script>
	jQuery(document).ready(function ($) {
		$('.plan-couple-content .name').insertAfter('.plan-couple-content .bubble');
	});
</script>

<?php
/**
 * Template Name: Kimono petit
 * links: /kimono-petit, /kimono-petit/girl-petit, /kimono-petit/men-petit, /kimono-petit/couple-petit
 */
global $post, $language;
$language = Yii::app()->language;
get_header('new-kimono');
wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');

wp_register_style('kimono-petit', get_template_directory_uri() . '/css/kimono-petit.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-petit');
?>
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
							<div class="right-column">
								<div class="container kimono-couple-page petit-<?= is_page('standard') ? 'standard' : 'couple' ?> clearfix">
									<?php while (have_posts()) : the_post(); ?>
										<?php $planTypeId = get_field('plan_type_id'); ?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="wrap-content-petit-detail">
												<section
														class="section_general section-kimono plan-list-kimono plan-list-petit">
													<div class="kimono-couple-page kimono-petit-page">
														<div class="box-general-kimono-couple-page kimono-list clearfix">
															<div class="image image-kimono image-pc forpc">
																<?php swe_the_post_thumbnail($post, 'full', array('alt' => strip_tags(get_the_title()))); ?>
															</div><!-- end image -->
															<div class="info info-kimono plan-page <?php echo get_field('couple') ? 'couple' : ''; ?> info-<?php echo Yii::app()->language; ?>">
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
																		<?php swe_the_post_thumbnail($post, 'full', array('alt' => strip_tags(get_the_title()))); ?>
																	</div><!-- end image -->

																</div><!-- end excerpt -->

																<div class="option-kimono-couple">
																	<?php
																	$kimonoSetThings = get_field('kimono_set_things');
																	if (!empty($kimonoSetThings)) {
																		echo htmlspecialchars_decode($kimonoSetThings);
																	} else {
																		getTemplatePart('include/plan-option-petit', null, array('plantype' => $planTypeId));
																	} ?>
																</div><!-- end option-kimono-couple -->
															</div><!-- end info -->
														</div><!-- end box-overview-kimono-page -->
													</div><!--end kimono-couple-page-->
												</section><!-- end section.section_general -->
											</div>


											<div class="box-content-page box-content-petit-page content-<?php echo $post->post_name; ?> clearfix">
												<div class="cont-page-left clearfix">
													<?php
													//					if (is_page('couple')) :
													//						getTemplatePart('temp-small/kimono-couple-list', null, array('plantype' => $planTypeId));
													//					endif;
													if (get_field('is_plan_page') === true) :
														// plan pages
														Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id'), 'back_link' => get_permalink($post->post_parent)));
													else:
														echo strip_shortcodes(get_the_content());
													endif;
													?>
												</div><!-- end cont-page-left -->
												<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
											</div><!-- .box-content-page -->

											<?php Yii::app()->controller->widget('application.components.widgets.petitAddPlan.PetitAddPlan', array('isCouple' => get_field('couple'))); ?>

											<!-- button link page petit and vip -->
											<div class="input-person-container">
												<div class="wrap-dx-flex wrap-dx-flex-button-petit">
													<div class="col-input-left button-new-shop">
														<a class="button-regular"
														   href="<?php echo esc_url(home_url('/kimono')); ?>"><img
																	alt="<?php echo Yii::t('wp_theme', 'banner-regular-alt'); ?>"
																	src="<?php echo Yii::t('wp_theme', 'banner-regular-src'); ?>"></a>
													</div>
													<div class="col-input-right button-new-shop">
														<a class="button-vip"
														   href="<?php echo esc_url(home_url('/vip')); ?>"><img
																	alt="<?php echo Yii::t('wp_theme', 'banner-vip-alt'); ?>"
																	src="<?php echo Yii::t('wp_theme', 'banner-vip-src') ?>"></a>
													</div>
												</div><!--end wrap-dx-flex-->
											</div>

											<div class="entry-meta sixteen columns">
												<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
											</div><!-- .entry-meta -->

										</article><!-- #post -->

									<?php endwhile; // end of the loop.  ?>

								</div><!-- end container -->
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
<script>
	jQuery(document).ready(function ($) {
		$('.plan-couple-content .name').insertAfter('.plan-couple-content .bubble');
	});
</script>

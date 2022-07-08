<?php
/**
* Template Name: Highend Reserve
* Pages apply: /homongi/reserve
*/

global $post, $language;
$language = Yii::app()->language;
wp_register_style('style-single_plan', get_template_directory_uri() . '/css/high-grade-plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
wp_register_style('style-kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('style-kimono');
wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
wp_enqueue_style('style-highend-furisode');

get_header('new-kimono');
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
									<div class="container">
										<div class="highend-addplan-wrapper wrap-filter-product">
											<?php echo the_content();?>
											<?php
											$planTypeIds = get_field('plan_type_ids');
											$planTypeIds = explode(',', get_field('plan_type_ids'));
											Yii::app()->controller->widget('application.components.widgets.highendAddPlan.HighendAddPlan', array('planTypeIds' => $planTypeIds));
											?>
										</div>

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
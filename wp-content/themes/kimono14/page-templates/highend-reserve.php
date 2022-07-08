<?php
/**
* Template Name: Highend Reserve
* Pages apply: /homongi/reserve
*/

global $post;

wp_register_style('style-single_plan', get_template_directory_uri() . '/css/high-grade-plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
wp_register_style('style-kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('style-kimono');
wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
wp_enqueue_style('style-highend-furisode');

get_header();
?>
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

<?php get_footer(); ?>
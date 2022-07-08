	<?php
/**
 * Template Name: Before Taking
 * Pages apply: /homongi, kurotomesode, irotomesode, seijin, sotsugyou, shichigosan
 */
global $post;

wp_register_style('style-single_plan', get_template_directory_uri() . '/css/high-grade-plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
	wp_register_style('style-kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
	wp_enqueue_style('style-kimono');
	wp_register_style('style-before-taking', get_template_directory_uri() .'/css/before-taking.css', array('twentytwelve-style'));
	wp_enqueue_style('style-before-taking');
	wp_register_style('howto-faq', get_template_directory_uri() .'/css/howto-faq.css', array('twentytwelve-style'));
	wp_enqueue_style('howto-faq');
get_header();
?>
<script>
	// Set is_admin default value
	var is_admin = '';
</script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/booking.js"></script>
<div class="before-taking">
     <?php the_content(); ?>
</div><!--end before taking-->
<?php echo get_render_template('footer_purple.php'); ?>

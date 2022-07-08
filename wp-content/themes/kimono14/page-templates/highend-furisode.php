	<?php
/**
 * Template Name: Highend Furisode
 * Pages apply: /seijin, shichigosan, homongi
 */
global $post, $isSmartPhone;

wp_register_style('style-single_plan', get_template_directory_uri() . '/css/high-grade-plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
	wp_register_style('style-kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
	wp_enqueue_style('style-kimono');
	wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
	wp_enqueue_style('style-highend-furisode');
	if (is_page('seijin')) {
		wp_register_style('access-style-flexslider', get_template_directory_uri() . '/css/flexslider.css', array('twentytwelve-style'));
		wp_enqueue_style('access-style-flexslider');
		wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
		wp_enqueue_style('box-slider');
		if (!$isSmartPhone) {
			wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
			wp_enqueue_style('box-slider-pc');
		}
		wp_enqueue_script('access-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
	}
get_header();
	if($isSmartPhone){
		wp_enqueue_script('sonar', get_template_directory_uri() . '/js/jquery.sonar.js');
		wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');
	}
?>
<style>
.list-view-loading {
	background: none!important;
	background-color: #fff;
	opacity: 0.5;
	position: relative;
}

.list-view-loading .loading-icon{
	display: block;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	background-size: contain;
	background: url('../images/reserve/ajax-loader.gif') no-repeat;
	height: 55px;
	width: 54px;
}
.link-to-page {visibility:hidden;}
</style>
<script>
	// Set is_admin default value
	var is_admin = '';
</script>
<!--<script type="text/javascript" src="--><?php //echo Yii::app()->getBaseUrl(true); ?><!--/js/booking.js"></script>-->
	<?php echo the_content(); ?>
<?php echo get_render_template('footer_purple.php'); ?>
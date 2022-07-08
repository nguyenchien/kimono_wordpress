	<?php
/**
 * Template Name: Before Taking
 * Pages apply: /homongi, kurotomesode, irotomesode, seijin, sotsugyou, shichigosan
 */
global $post, $isSmartPhone;
    if($isSmartPhone){
        wp_enqueue_style( 'header-style' , get_template_directory_uri()  . '/css/header.css', array('twentytwelve-style'),$date);
        wp_enqueue_style( 'footer-style' , get_template_directory_uri()  . '/css/footer.css', array('twentytwelve-style'),$date);
    }else{
        wp_enqueue_style( 'header-pc-style' , get_template_directory_uri()  . '/css/header-pc.css', array('twentytwelve-style'),$date);
        wp_enqueue_style( 'footer-pc-style' , get_template_directory_uri()  . '/css/footer-pc.css', array('twentytwelve-style'),$date);
    }
wp_register_style('style-single_plan', get_template_directory_uri() . '/css/high-grade-plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
	wp_register_style('style-kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
	wp_enqueue_style('style-kimono');
	wp_register_style('style-before-taking', get_template_directory_uri() .'/css/before-taking.css', array('twentytwelve-style'));
	wp_enqueue_style('style-before-taking');
	wp_register_style('howto-faq', get_template_directory_uri() .'/css/howto-faq.css', array('twentytwelve-style'));
	wp_enqueue_style('howto-faq');
    get_header('new-kimono');
?>
<script>
	// Set is_admin default value
	var is_admin = '';
</script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/booking.js"></script>
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
									<div class="before-taking container clearfix">
										<?php the_content(); ?>
									</div><!--end before taking-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->
<?php echo get_render_template('footer_purple.php'); ?>

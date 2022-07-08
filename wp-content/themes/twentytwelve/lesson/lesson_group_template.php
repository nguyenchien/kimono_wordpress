<?php
/*
 * Template Name: Lesson Group
 */
global $post, $isSmartPhone;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if($isSmartPhone){
    wp_enqueue_style( 'header-style' , get_template_directory_uri()  . '/css/header.css', array('twentytwelve-style'),$date);
    wp_enqueue_style( 'footer-kimono-landing-page-sp-style' , get_template_directory_uri()  . '/css/footer-kimono-landing-page-sp.css', array('twentytwelve-style'),$date);
}else{
    wp_enqueue_style( 'header-pc-style' , get_template_directory_uri()  . '/css/header-pc.css', array('twentytwelve-style'),$date);
    wp_enqueue_style( 'footer-kimono-landing-page-pc-style' , get_template_directory_uri()  . '/css/footer-kimono-landing-page-pc.css', array('twentytwelve-style'),$date);
}
wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
wp_enqueue_style('style-highend-furisode');
wp_register_style('style-lesson-group', get_template_directory_uri() . '/lesson/css/lesson-group.css', array('twentytwelve-style'));
wp_enqueue_style('style-lesson-group');
get_header('new-kimono');
?>
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
								<div class="lesson-group-layout">
									<div class="container">
										<?php the_content(); ?>
									</div>
								</div><!-- end .lesson-group-layout -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end wrap-highend-v2 -->
</div><!-- end container -->
<?php get_footer('new-kimono-landing-page'); ?>

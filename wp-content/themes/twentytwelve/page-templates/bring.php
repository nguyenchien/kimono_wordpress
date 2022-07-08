<?php
/**
 * Template Name: Content Only
 * Links: /bring, /kimono/tenimotsu, /kimono/photo-studio, /caricature, /yokuhen_muryo, /staff_voice
 */
global $post, $language;
$language = Yii::app()->language;
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');
wp_register_style('bring', get_template_directory_uri() . '/css/bring.css', array('twentytwelve-style'));
wp_enqueue_style('bring');
wp_register_style('caricature', get_template_directory_uri() . '/css/caricature.css', array('twentytwelve-style'));
wp_enqueue_style('caricature');
wp_register_style('umbrella', get_template_directory_uri() . '/css/umbrella.css', array('twentytwelve-style'));
wp_enqueue_style('umbrella');
wp_register_style('yokuhen_muryo', get_template_directory_uri() . '/css/yokuhen_muryo.css', array('twentytwelve-style'));
wp_enqueue_style('yokuhen_muryo');
wp_register_style('staff_voice', get_template_directory_uri() . '/css/staff_voice.css', array('twentytwelve-style'));
wp_enqueue_style('staff_voice');
wp_enqueue_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css');
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
?>
<script>
    var KimonoMessage = <?php echo json_encode(JsResources::jsMessage('booking_msg')); ?>;
</script>
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
								<?php get_sidebar('top-page-left-v3') ?>
							</div>
							<div class="right-column">
								<div class="container content-only clearfix <?php echo $post->post_name ?>">
									<?php while ( have_posts() ) : the_post();
										the_content();
									endwhile; // end of the loop. ?>
								</div><!-- end container.kimono-group -->
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

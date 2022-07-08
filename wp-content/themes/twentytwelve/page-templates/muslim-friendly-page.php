<?php
/**
 * Template Name: Muslim Friendly Page
 * Links: /muslim-friendly
 */

wp_register_style('muslim-friendly', get_template_directory_uri() . '/css/muslim-friendly.css', array('twentytwelve-style'));
wp_enqueue_style('muslim-friendly');
global $post, $language;
$language = Yii::app()->language;
get_header('new-kimono');
if(is_page('contactwp') || is_page('reserve')){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin ='contact-form-7/wp-contact-form-7.php';
	if(is_plugin_active($plugin)){
		wp_enqueue_style( 'contact-form-7',wpcf7_plugin_url( 'includes/css/styles.css' ), array(), WPCF7_VERSION, 'all' );
	}
}
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
									<div class="container clearfix">
										<div class="box-overview-page-howto-faq clearfix">
											<div class="section-top">
												<div><?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?></div>
												<div class="text-h1">
													<h1>
														<?php the_title(); ?>
													</h1>
													<?php if (!empty($post->post_excerpt)): ?>
														<?php the_excerpt(); ?>
													<?php endif; ?>
												</div>
											</div>
										</div><!-- end box-overview-page-howto-faq -->

										<div class="cont-page-lef cont-friendly-page">
											<?php the_content(); ?>
										</div><!-- end cont-page-left -->
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
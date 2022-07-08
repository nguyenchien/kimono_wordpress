<?php
	/**
	 * Template Name: Registration
	 * Links: /event/registration, ...
	 */
	get_header('new-kimono');
	wp_register_style('style-registration', get_template_directory_uri() . '/css/registration.css', array('twentytwelve-style'));
	wp_enqueue_style('style-registration');
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
										<div class="event-page">
											<?php while ( have_posts() ) : the_post(); ?>
												<?php the_content(); ?>
											<?php endwhile; ?>
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

<?php echo get_render_template('footer_purple.php'); ?>
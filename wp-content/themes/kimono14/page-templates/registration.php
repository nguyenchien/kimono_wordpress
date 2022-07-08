<?php
	/**
	 * Template Name: Registration
	 * Links: /event/registration, ...
	 */
	get_header();
	wp_register_style('style-registration', get_template_directory_uri() . '/css/registration.css', array('twentytwelve-style'));
	wp_enqueue_style('style-registration');
?>
<div class="container clearfix">
	<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
	?>
	<div class="event-page">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php echo get_render_template('footer_purple.php'); ?>
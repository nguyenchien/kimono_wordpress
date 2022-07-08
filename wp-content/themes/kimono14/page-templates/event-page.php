<?php
	/**
	 * Template Name: Event Page
	 * Links: /event/kamakura, ...
	 */
	get_header();
	wp_register_style('style-event', get_template_directory_uri() . '/css/event.css', array('twentytwelve-style'));
	wp_enqueue_style('style-event');
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
<?php get_footer(); ?>

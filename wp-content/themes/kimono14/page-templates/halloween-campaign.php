<?php
/**
 * Template Name: Kimono Halloween Campaign page
 * Links: /kimono, kimono/campaign
 */
get_header();
wp_register_style('style-halloween-campaign', get_template_directory_uri() . '/css/halloween.css', array('twentytwelve-style'));
wp_enqueue_style('style-halloween-campaign');
?>
<div class="container clearfix">
<?php
if (function_exists('yoast_breadcrumb')) {
	yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
}
?>
<div>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; // end of the loop. ?>
</div><!-- end content-halloween campaign -->
</div>
<?php get_footer(); ?>

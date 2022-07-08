<?php
/**
 * Template Name: Single Plan page
 * Pages apply: /seijin, /sotsugyou, /homongi, /shichigosan, /irotomesode,/kurotomesode
 */
global $post;

wp_register_style('style-single_plan', get_template_directory_uri() . '/css/single_plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
get_header();
?>

<div class="container">
	<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
	?>
</div>
<div class="container content-only clearfix <?php echo $post->post_name ?>">
	<?php while ( have_posts() ) : the_post(); 
		the_content();
	endwhile; // end of the loop. ?>
</div><!-- end container.kimono-group -->
<?php get_footer(); ?>

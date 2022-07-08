<?php
/**
 * Template Name: Content Only
 * Links: /bring, /kimono/tenimotsu, /kimono/photo-studio, /caricature, /yokuhen_muryo, /staff_voice
 */
global $post;
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
